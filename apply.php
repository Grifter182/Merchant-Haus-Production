<?php
    $pageTitle = 'Apply — MerchantHaus (U.S. Retail ISO)';
    $pageDescription = 'Merchant application for U.S. retail merchants.';
    include __DIR__ . '/Header.php';
?>

<main class="max-w-5xl mx-auto px-4 py-10">
    <h1 class="text-3xl md:text-4xl font-extrabold">Merchant Application</h1>
    <p class="mt-2 text-slate-600 dark:text-slate-300">U.S. retail only. Provide the details below — we’ll review and issue your Merchant ID (MID) &amp; access credentials during onboarding.</p>

    <form class="mt-8 grid gap-6" id="apply-form">
        <!-- Merchant Information -->
        <section class="p-6 rounded-2xl border border-slate-200 dark:border-slate-800">
            <h2 class="text-xl font-bold">Merchant Information</h2>
            <div class="mt-4 grid md:grid-cols-2 gap-4">
                <label class="text-sm">Company Name*<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="companyName" required /></label>
                <label class="text-sm">External Identifier<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="externalId" /></label>
                <label class="text-sm">Country*<select class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="country" required><option>United States</option></select></label>
                <label class="text-sm">Timezone*<select class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="timezone" required>
                    <option>(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                    <option>(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                    <option>(GMT-06:00) Central Time (US &amp; Canada)</option>
                    <option>(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                </select></label>
                <label class="text-sm md:col-span-2">Address*<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="address1" required /></label>
                <label class="text-sm">Address 2<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="address2" /></label>
                <label class="text-sm">City*<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="city" required /></label>
                <label class="text-sm">State*<select class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="state" required></select></label>
                <label class="text-sm">Zip/Postal Code*<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="postalCode" required /></label>
                <label class="text-sm md:col-span-2">Website<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="website" placeholder="https://example.com" type="url" /></label>
                <label class="text-sm">Language<select class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="language"><option>English</option></select></label>
            </div>
        </section>

        <!-- Company Contact -->
        <section class="p-6 rounded-2xl border border-slate-200 dark:border-slate-800">
            <h2 class="text-xl font-bold">Company Contact (Primary User)</h2>
            <p class="text-xs text-slate-500 mt-1">This person receives the welcome email and appears on receipts if enabled.</p>
            <div class="mt-4 grid md:grid-cols-2 gap-4">
                <label class="text-sm">First Name*<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="firstName" required /></label>
                <label class="text-sm">Last Name*<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="lastName" required /></label>
                <label class="text-sm">Email Address*<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="email" required type="email" /></label>
                <label class="text-sm">Phone Number*<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="phone" required /></label>
                <label class="text-sm">Fax Number<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="fax" /></label>
            </div>
        </section>

        <!-- Account Setup & Services -->
        <section class="p-6 rounded-2xl border border-slate-200 dark:border-slate-800">
            <h2 class="text-xl font-bold">Account Setup</h2>
            <div class="mt-4 grid md:grid-cols-2 gap-4">
                <label class="text-sm md:col-span-2">Primary Username*<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" maxlength="32" minlength="4" name="username" pattern="[A-Za-z0-9]+" placeholder="letters and numbers only" required /></label>
            </div>
            <h3 class="mt-4 font-semibold">Processing Services</h3>
            <div class="mt-2 grid md:grid-cols-3 gap-3 text-sm">
                <label class="inline-flex items-center gap-2"><input checked class="accent-red-600" name="svcCredit" type="checkbox" />Credit Card</label>
                <label class="inline-flex items-center gap-2"><input class="accent-red-600" name="svcAch" type="checkbox" />ACH / eCheck</label>
                <label class="inline-flex items-center gap-2"><input class="accent-red-600" name="svcCash" type="checkbox" />Cash</label>
            </div>
            <h3 class="mt-4 font-semibold">Value‑added Services</h3>
            <div class="mt-2 grid md:grid-cols-3 gap-3 text-sm">
                <label class="inline-flex items-center gap-2"><input class="accent-red-600" name="valEncryption" type="checkbox" />Encryption (Encrypted Devices)</label>
                <label class="inline-flex items-center gap-2"><input checked class="accent-red-600" name="valInvoice" type="checkbox" />Invoice</label>
                <label class="inline-flex items-center gap-2"><input class="accent-red-600" name="valLevel3" type="checkbox" />Level III Advantage</label>
            </div>
            <div class="mt-2 grid md:grid-cols-3 gap-3 text-sm">
                <label class="inline-flex items-center gap-2"><input class="accent-red-600" name="valMobile" type="checkbox" />Mobile Reader</label>
                <label class="inline-flex items-center gap-2"><input class="accent-red-600" name="valVault" type="checkbox" />Vault Storage</label>
            </div>
        </section>

        <button class="mt-6 bg-brand-crimson text-white px-4 py-2 rounded-lg" type="submit">Submit Application</button>
        <p id="apply-out" class="mt-2 text-sm"></p>
    </form>
</main>

<script>
  const form = document.getElementById('apply-form');
  const out = document.getElementById('apply-out');

  const LS_KEY = 'mh_apply_draft';
  function saveDraft(){ const data = Object.fromEntries(new FormData(form).entries()); localStorage.setItem(LS_KEY, JSON.stringify(data)); }
  function loadDraft(){ try { const d = JSON.parse(localStorage.getItem(LS_KEY)||'{}'); for (const k in d){ const el = form.elements[k]; if (!el) continue; if (el.type==='checkbox'){ el.checked = !!d[k]; } else { el.value = d[k]; } } } catch(e){} }
  form.addEventListener('input', saveDraft);
  loadDraft();

  function getUTM(){
    const p = new URLSearchParams(location.search);
    return {source:p.get('utm_source')||'',medium:p.get('utm_medium')||'',campaign:p.get('utm_campaign')||'',term:p.get('utm_term')||'',content:p.get('utm_content')||'',ref:document.referrer||''};
  }

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    out.textContent = 'Submitting…';
    try {
      const data = Object.fromEntries(new FormData(form).entries());
      ['svcCredit','svcAch','svcCash','valEncryption','valInvoice','valLevel3','valMobile','valVault'].forEach(k => { data[k] = !!form.elements[k].checked; });
      data.utm = getUTM();

      const res = await fetch('/.netlify/functions/submit-application', {
        method: 'POST',
        headers: {'Content-Type':'application/json'},
        body: JSON.stringify(data)
      });
      if (!res.ok) throw new Error('Request failed');
      out.textContent = 'Thanks — we emailed you next steps and sent your application to our team.';
      localStorage.removeItem(LS_KEY);
      form.reset();
    } catch (err) {
      console.error(err);
      out.textContent = 'Something went wrong. Please try again or email hello@merchant.haus.';
    }
  });
</script>

<?php include __DIR__ . '/Footer.php'; ?>

