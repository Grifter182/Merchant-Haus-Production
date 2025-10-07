/**
 * Netlify Function: POST /.netlify/functions/submit-signup
 * Handles signup form submissions and emails them via Resend.
 *
 * ENV VARS:
 *  - RESEND_API_KEY (required)
 *  - FROM_EMAIL     (required) e.g. no-reply@merchant.haus
 *  - TEAM_EMAIL     (required) e.g. sales@merchant.haus
 */
exports.handler = async (event) => {
  if (event.httpMethod === 'OPTIONS') {
    return { statusCode: 204, headers: {
      'Access-Control-Allow-Origin': '*',
      'Access-Control-Allow-Methods': 'POST, OPTIONS',
      'Access-Control-Allow-Headers': 'Content-Type'
    }};
  }
  if (event.httpMethod !== 'POST') {
    return { statusCode: 405, body: 'Method Not Allowed' };
  }

  try {
    const body = JSON.parse(event.body || '{}');

    // Trim all string inputs
    Object.keys(body).forEach(k => {
      if (typeof body[k] === 'string') {
        body[k] = body[k].trim();
      }
    });

    // Normalize case
    if (body.email) body.email = body.email.toLowerCase();
    if (body.username) body.username = body.username.toLowerCase();
    if (body.phone) body.phone = body.phone.replace(/\s+/g, '');

    // Basic required validations
    const required = ['firstName','lastName','email','phone','password','companyName','username'];
    const missing = required.filter(k => !body[k]);
    if (missing.length) {
      return { statusCode: 400, body: JSON.stringify({ error: 'Missing required fields', missing }) };
    }

    // Format validations
    const emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    const phoneRegex = /^\+?[1-9]\d{9,14}$/; // E.164
    const usernameRegex = /^[a-zA-Z0-9]+$/;

    if (!emailRegex.test(body.email)) {
      return { statusCode: 400, body: JSON.stringify({ error: 'Invalid email format' }) };
    }
    if (!phoneRegex.test(body.phone)) {
      return { statusCode: 400, body: JSON.stringify({ error: 'Invalid phone format' }) };
    }
    if (!usernameRegex.test(body.username)) {
      return { statusCode: 400, body: JSON.stringify({ error: 'Invalid username format' }) };
    }

    // Construct payload for signup
    const payload = {
      contact: {
        firstName: body.firstName,
        lastName: body.lastName,
        email: body.email,
        phone: body.phone
      },
      company: {
        name: body.companyName
      },
      account: {
        username: body.username,
        // Don't log the password
        passwordSet: true
      },
      meta: {
        receivedAt: new Date().toISOString(),
        ip: event.headers['x-nf-client-connection-ip'] || event.headers['x-forwarded-for'] || '',
        userAgent: event.headers['user-agent'] || '',
        utm: body.utm || {}
      }
    };

    const FROM_EMAIL = process.env.FROM_EMAIL || 'no-reply@merchant.haus';
    const TEAM_EMAIL = process.env.TEAM_EMAIL;
    const RESEND_API_KEY = process.env.RESEND_API_KEY;

    if (!TEAM_EMAIL || !RESEND_API_KEY) {
      return { statusCode: 500, body: JSON.stringify({ error: 'Missing env configuration' }) };
    }

    // Email to team
    const subject = `New Signup: ${payload.contact.firstName} ${payload.contact.lastName} (${payload.company.name})`;
    const summary = [
      `Name: ${payload.contact.firstName} ${payload.contact.lastName}`,
      `Email: ${payload.contact.email}`,
      `Phone: ${payload.contact.phone}`,
      `Company: ${payload.company.name}`,
      `Username: ${payload.account.username}`,
      `Signed up: ${payload.meta.receivedAt}`
    ].join('\n');

    async function sendEmail(to, text) {
      const res = await fetch('https://api.resend.com/emails', {
        method: 'POST',
        headers: {
          'Authorization': `Bearer ${RESEND_API_KEY}`,
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          from: `MerchantHaus <${FROM_EMAIL}>`,
          to: [to],
          subject,
          text: text
        })
      });
      if (!res.ok) {
        const info = await res.text();
        console.error('Resend failed:', info);
        throw new Error('Email failed');
      }
    }

    await sendEmail(TEAM_EMAIL, `${summary}\n\nJSON:\n${JSON.stringify(payload, null, 2)}`);
    // Confirmation to user
    await sendEmail(payload.contact.email, `Thanks for signing up with MerchantHaus! Our team will review your information and reach out with next steps.\n\nSummary:\n${summary}`);

    return {
      statusCode: 200,
      headers: { 'Access-Control-Allow-Origin': '*' },
      body: JSON.stringify({ ok: true })
    };
  } catch (e) {
    console.error(e);
    return { statusCode: 500, body: JSON.stringify({ error: 'Server error' }) };
  }
};