/**
 * Netlify Function: POST /.netlify/functions/request-demo
 * Env vars required:
 *  - BOOKING_URL   : your private Google Calendar appointments link
 *  - RESEND_API_KEY: API key from https://resend.com
 *  - FROM_EMAIL    : verified sender, e.g. no-reply@merchant.haus
 *  - TEAM_EMAIL    : (optional) BCC for internal notifications
 */
exports.handler = async (event) => {
  // CORS preflight
  if (event.httpMethod === "OPTIONS") {
    return {
      statusCode: 204,
      headers: {
        "Access-Control-Allow-Origin": "*",
        "Access-Control-Allow-Methods": "POST, OPTIONS",
        "Access-Control-Allow-Headers": "Content-Type",
      },
    };
  }

  if (event.httpMethod !== "POST") {
    return { statusCode: 405, body: "Method Not Allowed" };
  }

  try {
    const body = JSON.parse(event.body || "{}");
    const name = body.name || "";
    const email = body.email || "";
    const company = body.company || "";
    const phone = body.phone || "";
    const notes = body.notes || "";
    const utm = body.utm || {};

    if (!email) {
      return { statusCode: 400, body: JSON.stringify({ error: "Email is required" }) };
    }

    const BOOKING_URL = process.env.BOOKING_URL;
    const FROM_EMAIL  = process.env.FROM_EMAIL || "no-reply@merchant.haus";
    const TEAM_EMAIL  = process.env.TEAM_EMAIL || "";
    const RESEND_API_KEY = process.env.RESEND_API_KEY;

    if (!BOOKING_URL || !RESEND_API_KEY) {
      return { statusCode: 500, body: JSON.stringify({ error: "Missing env configuration" }) };
    }

    const subject = "Your private booking link — MerchantHaus";
    const text = [
      `Hi ${name || "there"},`,
      ``,
      `Thanks for your interest in MerchantHaus.`,
      `Use this private link to book a time:`,
      `${BOOKING_URL}`,
      ``,
      `We’ll provision your Merchant ID (MID) and credentials during onboarding.`,
      ``,
      `Company: ${company}`,
      `Phone: ${phone}`,
      `Notes: ${notes}`,
      ``,
      `UTM: ${JSON.stringify(utm)}`,
    ].join("\n");

    const payload = {
      from: `MerchantHaus <${FROM_EMAIL}>`,
      to: [email],
      subject,
      text,
      ...(TEAM_EMAIL ? { bcc: [TEAM_EMAIL] } : {}),
    };

    const res = await fetch("https://api.resend.com/emails", {
      method: "POST",
      headers: {
        "Authorization": `Bearer ${RESEND_API_KEY}`,
        "Content-Type": "application/json",
      },
      body: JSON.stringify(payload),
    });

    if (!res.ok) {
      const info = await res.text();
      console.error("Email send failed:", info);
      return { statusCode: 502, body: JSON.stringify({ error: "Email failed" }) };
    }

    return {
      statusCode: 200,
      headers: { "Access-Control-Allow-Origin": "*" },
      body: JSON.stringify({ ok: true }),
    };
  } catch (e) {
    console.error(e);
    return { statusCode: 500, body: JSON.stringify({ error: "Server error" }) };
  }
};
