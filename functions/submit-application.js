/**
 * Netlify Function: POST /.netlify/functions/submit-application
 * Collects the merchant application and emails it via Resend.
 * Optionally forwards JSON to a backoffice webhook (e.g., your custom dashboard API).
 *
 * ENV VARS:
 *  - RESEND_API_KEY (required)
 *  - FROM_EMAIL     (required) e.g. no-reply@merchant.haus
 *  - TEAM_EMAIL     (required) e.g. sales@merchant.haus
 *  - BACKOFFICE_WEBHOOK (optional) HTTPS endpoint to receive the payload
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

    // Basic required validations
    const required = ['companyName','country','address1','city','state','postalCode','timezone','firstName','lastName','email','phone','username'];
    const missing = required.filter(k => !body[k] || String(body[k]).trim() === '');
    if (missing.length) {
      return { statusCode: 400, body: JSON.stringify({ error: 'Missing required fields', missing }) };
    }

    // Construct normalized payload mapped to gateway-style fields
    const payload = {
      merchant: {
        companyName: body.companyName,
        externalId: body.externalId || '',
        country: body.country,
        address1: body.address1,
        address2: body.address2 || '',
        city: body.city,
        state: body.state,
        postalCode: body.postalCode,
        website: body.website || '',
        language: body.language || 'English',
        timezone: body.timezone
      },
      contact: {
        firstName: body.firstName,
        lastName: body.lastName,
        email: body.email,
        phone: body.phone,
        fax: body.fax || ''
      },
      account: {
        username: body.username
      },
      services: {
        processing: {
          credit: !!body.svcCredit,
          ach: !!body.svcAch,
          cash: !!body.svcCash
        },
        valueAdded: {
          encryption: !!body.valEncryption,
          invoice: !!body.valInvoice,
          level3: !!body.valLevel3,
          mobile: !!body.valMobile,
          vault: !!body.valVault
        }
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
    const subject = `New Merchant Application: ${payload.merchant.companyName}`;
    const summary = [
      `Company: ${payload.merchant.companyName} (${payload.merchant.externalId || '—'})`,
      `Contact: ${payload.contact.firstName} ${payload.contact.lastName} <${payload.contact.email}>  ${payload.contact.phone}`,
      `Location: ${payload.merchant.city}, ${payload.merchant.state} ${payload.merchant.postalCode}, ${payload.merchant.country}`,
      `Timezone: ${payload.merchant.timezone}`,
      `Website: ${payload.merchant.website || '—'}`,
      `Services: Credit=${payload.services.processing.credit}, ACH=${payload.services.processing.ach}, Cash=${payload.services.processing.cash}`,
      `Value-Added: Encryption=${payload.services.valueAdded.encryption}, Invoice=${payload.services.valueAdded.invoice}, Level3=${payload.services.valueAdded.level3}, Mobile=${payload.services.valueAdded.mobile}, Vault=${payload.services.valueAdded.vault}`,
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
    // Confirmation to applicant
    await sendEmail(payload.contact.email, `Thanks for applying to MerchantHaus. Our team will review and reach out with next steps.\n\nSummary:\n${summary}`);

    // Optional: forward to backoffice webhook
    const webhook = process.env.BACKOFFICE_WEBHOOK;
    if (webhook) {
      try {
        await fetch(webhook, { method:'POST', headers:{'Content-Type':'application/json'}, body: JSON.stringify(payload) });
      } catch (e) {
        console.error('Webhook failed:', e.message);
      }
    }

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
