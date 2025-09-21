# MerchantHaus — Plug.Play.Grow

Static site + Netlify Function that emails a **private** booking link (Google Calendar) to prospects — the calendar URL is never exposed in the frontend.

## Deploy

1) **Connect GitHub → Netlify** (New site from Git)
2) Set **Environment variables** in Netlify → Site settings → Environment:
```
BOOKING_URL   = https://calendly.com/merchanthaus
RESEND_API_KEY= re_bGbMpcNW_93iTgbDbhTwDAuXVQiQzUqyz
FROM_EMAIL    = admin@merchant.haus
TEAM_EMAIL    = admin@merchant.haus (optional)
GEMINI_API_KEY= <your-google-generative-ai-key>
GEMINI_MODEL  = gemini-1.5-flash (optional override)
```
3) Deploy

## Local dev
```bash
npx netlify dev
```
This runs the static site and the function at `/.netlify/functions/request-demo`.

## Structure
```
/
├─ netlify.toml
├─ package.json
├─ index.html
├─ apply.html
├─ compliance.html
├─ faq.html
├─ gohighlevel.html
├─ integrations.html
├─ shopify.html
├─ signup.php            # JSON API used by the signup drawer
├─ support.php           # JSON API used by the support form
├─ terms.html
├─ /assets/
│  ├─ app.js                 # modal + booking logic (shared)
│  └─ /logos/                # placeholder SVGs
│     ├─ shopify.svg
│     └─ gohighlevel.svg
├─ /integrations/
│  ├─ index.html
│  ├─ shopify.html
│  └─ gohighlevel.html
└─ /functions/
   └─ request-demo.js        # Netlify Function (CJS) — emails private booking link
```

## Notes
- Tailwind via CDN for zero build
- Light/dark theme with local preference
- Pricing calculator uses U.S. retail assumptions (illustrative)
- All “Request a Demo” CTAs open a modal and **POST** to the Netlify Function
- The function sends the private booking link via email using **Resend**
- Replace placeholder SVGs with approved logos when ready


## Merchant Application
- Page: `/apply.html`
- Function: `/functions/submit-application` (uses Resend to email the team + the applicant)
- Env vars needed: `RESEND_API_KEY`, `FROM_EMAIL`, `TEAM_EMAIL` (required), `BACKOFFICE_WEBHOOK` (optional to post JSON to your custom dashboard)

