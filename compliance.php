<?php
    $pageTitle = 'MerchantHaus | Compliance Checklist & Application';
    $pageDescription = 'Compliance resources and application checklist for MerchantHaus.';
    require_once __DIR__ . '/src/includes/header.php';
?>

<main class="min-h-screen max-w-7xl mx-auto pt-12 pb-16 grid grid-cols-1 lg:grid-cols-2 gap-8 p-6">
        <!-- Compliance Checklist Section -->
        <div class="w-full bg-white/80 dark:bg-[#1c1c1c]/80 backdrop-blur-sm p-8 rounded-xl shadow-lg border border-slate-200/70 dark:border-slate-800">
            <h1 class="text-3xl font-extrabold font-ubuntu text-slate-900 dark:text-slate-100 mb-4 text-center">Merchant Compliance Checklist</h1>
            <p class="text-slate-600 dark:text-slate-300 leading-relaxed mb-10 text-center">
                At Merchant Haus, we make compliance straightforward. This checklist guides our merchants through the steps needed to open and maintain a secure merchant account.
            </p>
            <div class="space-y-4">
                 <!-- Steps 1-7 -->
                <div class="border-b border-slate-200 dark:border-slate-800 pb-4">
                    <h2 class="text-xl font-bold font-ubuntu text-slate-900 dark:text-slate-100 mb-2 flex items-center gap-3"><i data-lucide="file-text" class="w-5 h-5 text-brand-600"></i>Step 1: Application Essentials</h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-3 ml-8">What you’ll need to get started</p>
                    <details class="ml-8"><summary class="font-semibold text-sm text-brand-600 dark:text-brand-400 hover:underline">See details<i data-lucide="chevron-right" class="summary-icon w-4 h-4 ml-auto"></i></summary><ul class="mt-3 pl-5 text-sm list-disc space-y-2 text-slate-600 dark:text-slate-300"><li>Completed and signed merchant application form</li><li>Business formation documents (Articles, LLC Certificate, or state license)</li><li>Proof of address (utility bill or lease; no P.O. boxes)</li><li>Government-issued ID for owners (25%+ ownership)</li><li>Federal Tax ID (EIN) or SSN (sole proprietors)</li><li>U.S. business bank account (voided check or bank letter)</li><li>Business and product description</li><li>Marketing materials (website, social media, or photos)</li></ul></details>
                </div>
                <div class="border-b border-slate-200 dark:border-slate-800 pb-4">
                    <h2 class="text-xl font-bold font-ubuntu text-slate-900 dark:text-slate-100 mb-2 flex items-center gap-3"><i data-lucide="shield-check" class="w-5 h-5 text-brand-600"></i>Step 2: Risk & Compliance Screening</h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-3 ml-8">Checks to protect your business and customers</p>
                    <details class="ml-8"><summary class="font-semibold text-sm text-brand-600 dark:text-brand-400 hover:underline">See details<i data-lucide="chevron-right" class="summary-icon w-4 h-4 ml-auto"></i></summary><ul class="mt-3 pl-5 text-sm list-disc space-y-2 text-slate-600 dark:text-slate-300"><li>KYC / CIP verification</li><li>Background & credit checks</li><li>OFAC sanctions screening</li><li>Business category risk assessment</li><li>Review against restricted/prohibited activities</li></ul></details>
                </div>
                <div class="border-b border-slate-200 dark:border-slate-800 pb-4">
                    <h2 class="text-xl font-bold font-ubuntu text-slate-900 dark:text-slate-100 mb-2 flex items-center gap-3"><i data-lucide="handshake" class="w-5 h-5 text-brand-600"></i>Step 3: Agreements & Onboarding</h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-3 ml-8">Confirming your partnership with us</p>
                    <details class="ml-8"><summary class="font-semibold text-sm text-brand-600 dark:text-brand-400 hover:underline">See details<i data-lucide="chevron-right" class="summary-icon w-4 h-4 ml-auto"></i></summary><ul class="mt-3 pl-5 text-sm list-disc space-y-2 text-slate-600 dark:text-slate-300"><li>Merchant Service Agreement (MSA)</li><li>Acceptable Use Policy (AUP)</li><li>Privacy Policy</li><li>PCI DSS responsibilities acknowledgment</li><li>Legal agreements signed by an authorized officer</li></ul></details>
                </div>
                <div class="border-b border-slate-200 dark:border-slate-800 pb-4">
                    <h2 class="text-xl font-bold font-ubuntu text-slate-900 dark:text-slate-100 mb-2 flex items-center gap-3"><i data-lucide="lock" class="w-5 h-5 text-brand-600"></i>Step 4: PCI & Data Security</h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-3 ml-8">Keeping cardholder data safe</p>
                    <details class="ml-8"><summary class="font-semibold text-sm text-brand-600 dark:text-brand-400 hover:underline">See details<i data-lucide="chevron-right" class="summary-icon w-4 h-4 ml-auto"></i></summary><ul class="mt-3 pl-5 text-sm list-disc space-y-2 text-slate-600 dark:text-slate-300"><li>Proof of PCI DSS compliance (SAQ or AOC)</li><li>Use PCI-approved POS hardware/software</li><li>Written policies for card data handling</li><li>Employee training in fraud and security</li></ul></details>
                </div>
                <div class="border-b border-slate-200 dark:border-slate-800 pb-4">
                    <h2 class="text-xl font-bold font-ubuntu text-slate-900 dark:text-slate-100 mb-2 flex items-center gap-3"><i data-lucide="rocket" class="w-5 h-5 text-brand-600"></i>Step 5: Platform Setup</h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-3 ml-8">Preparing your tools for success</p>
                    <details class="ml-8"><summary class="font-semibold text-sm text-brand-600 dark:text-brand-400 hover:underline">See details<i data-lucide="chevron-right" class="summary-icon w-4 h-4 ml-auto"></i></summary><ul class="mt-3 pl-5 text-sm list-disc space-y-2 text-slate-600 dark:text-slate-300"><li>Gateway or terminal integration</li><li>Merchant portal login testing</li><li>Review of reporting & settlement tools</li><li>Configure chargeback/security notifications</li></ul></details>
                </div>
                <div class="border-b border-slate-200 dark:border-slate-800 pb-4">
                    <h2 class="text-xl font-bold font-ubuntu text-slate-900 dark:text-slate-100 mb-2 flex items-center gap-3"><i data-lucide="refresh-cw" class="w-5 h-5 text-brand-600"></i>Step 6: Ongoing Compliance</h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-3 ml-8">Your responsibility as a merchant</p>
                    <details class="ml-8"><summary class="font-semibold text-sm text-brand-600 dark:text-brand-400 hover:underline">See details<i data-lucide="chevron-right" class="summary-icon w-4 h-4 ml-auto"></i></summary><ul class="mt-3 pl-5 text-sm list-disc space-y-2 text-slate-600 dark:text-slate-300"><li>Annual PCI validation</li><li>Keep business info updated</li><li>Monitor transactions for fraud/chargebacks</li><li>Review policy updates (MSA, AUP, Privacy)</li><li>Respond to compliance reviews quickly</li></ul></details>
                </div>
                <div>
                    <h2 class="text-xl font-bold font-ubuntu text-slate-900 dark:text-slate-100 mb-2 flex items-center gap-3"><i data-lucide="sparkles" class="w-5 h-5 text-brand-600"></i>Step 7: Best Practices (Recommended)</h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-3 ml-8">Extra steps for stronger protection</p>
                    <details class="ml-8"><summary class="font-semibold text-sm text-brand-600 dark:text-brand-400 hover:underline">See details<i data-lucide="chevron-right" class="summary-icon w-4 h-4 ml-auto"></i></summary><ul class="mt-3 pl-5 text-sm list-disc space-y-2 text-slate-600 dark:text-slate-300"><li>Enable AVS, CVV, and 3D Secure</li><li>Use tokenization or secure vaults</li><li>Add fraud prevention tools (velocity checks, geolocation)</li><li>Attend webinars and training sessions</li></ul></details>
                </div>
            </div>
            <p class="text-slate-600 dark:text-slate-300 leading-relaxed mt-10 pt-6 border-t border-slate-200 dark:border-slate-800 text-center">
                 At Merchant Haus, compliance is not just about checking boxes—it’s about protecting your business and giving you peace of mind.
            </p>
        </div>

        <!-- Application Form Section -->
        <div id="apply" class="w-full bg-white/80 dark:bg-[#1c1c1c]/80 backdrop-blur-sm p-8 rounded-xl shadow-lg border border-slate-200/70 dark:border-slate-800">
            <h1 class="text-3xl font-extrabold font-ubuntu">Merchant Application</h1>
            <p class="mt-2 text-slate-600 dark:text-slate-300">U.S. retail only. Provide the details below — we’ll review and issue your Merchant ID (MID) & access credentials during onboarding.</p>
            
            <form class="mt-8 grid gap-6" id="apply-form">
                <!-- Form Sections -->
                <section class="p-6 rounded-2xl border border-slate-200 dark:border-slate-800 bg-white/50 dark:bg-black/20">
                    <h2 class="text-xl font-bold font-ubuntu">Merchant Information</h2>
                    <div class="mt-4 grid md:grid-cols-2 gap-4">
                        <label class="text-sm">Company Name*<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="companyName" required/></label>
                        <label class="text-sm">External Identifier<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="externalId"/></label>
                        <label class="text-sm">Country*<select class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="country" required><option>United States</option></select></label>
                        <label class="text-sm">Timezone*<select class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="timezone" required><option>(GMT-08:00) Pacific Time (US & Canada)</option><option>(GMT-07:00) Mountain Time (US & Canada)</option><option>(GMT-06:00) Central Time (US & Canada)</option><option>(GMT-05:00) Eastern Time (US & Canada)</option></select></label>
                        <label class="text-sm md:col-span-2">Address*<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="address1" required/></label>
                        <label class="text-sm">Address 2<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="address2"/></label>
                        <label class="text-sm">City*<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="city" required/></label>
                        <label class="text-sm">State*<select class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="state" required></select></label>
                        <label class="text-sm">Zip/Postal Code*<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="postalCode" required/></label>
                        <label class="text-sm md:col-span-2">Website<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="website" placeholder="https://example.com" type="url"/></label>
                        <label class="text-sm">Language<select class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="language"><option>English</option></select></label>
                    </div>
                </section>
                <section class="p-6 rounded-2xl border border-slate-200 dark:border-slate-800 bg-white/50 dark:bg-black/20">
                    <h2 class="text-xl font-bold font-ubuntu">Company Contact (Primary User)</h2>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">This person receives the welcome email and appears on receipts if enabled.</p>
                    <div class="mt-4 grid md:grid-cols-2 gap-4">
                        <label class="text-sm">First Name*<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="firstName" required/></label>
                        <label class="text-sm">Last Name*<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="lastName" required/></label>
                        <label class="text-sm">Email Address*<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="email" required type="email"/></label>
                        <label class="text-sm">Phone Number*<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="phone" required/></label>
                        <label class="text-sm">Fax Number<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" name="fax"/></label>
                    </div>
                </section>
                <section class="p-6 rounded-2xl border border-slate-200 dark:border-slate-800 bg-white/50 dark:bg-black/20">
                    <h2 class="text-xl font-bold font-ubuntu">Account Setup</h2>
                    <div class="mt-4 grid md:grid-cols-2 gap-4">
                        <label class="text-sm md:col-span-2">Primary Username*<input class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 px-3 py-2" maxlength="32" minlength="4" name="username" pattern="[A-Za-z0-9]+" placeholder="letters and numbers only" required/></label>
                    </div>
                    <h3 class="mt-4 font-semibold">Processing Services</h3>
                    <div class="mt-2 grid md:grid-cols-3 gap-3 text-sm"><label class="inline-flex items-center gap-2"><input checked class="accent-brand-600" name="svcCredit" type="checkbox"/>Credit Card</label><label class="inline-flex items-center gap-2"><input class="accent-brand-600" name="svcAch" type="checkbox"/>ACH / eCheck</label><label class="inline-flex items-center gap-2"><input class="accent-brand-600" name="svcCash" type="checkbox"/>Cash</label></div>
                    <h3 class="mt-4 font-semibold">Value‑added Services</h3>
                    <div class="mt-2 grid md:grid-cols-3 gap-3 text-sm"><label class="inline-flex items-center gap-2"><input class="accent-brand-600" name="valEncryption" type="checkbox"/>Encryption</label><label class="inline-flex items-center gap-2"><input checked class="accent-brand-600" name="valInvoice" type="checkbox"/>Invoice</label><label class="inline-flex items-center gap-2"><input class="accent-brand-600" name="valLevel3" type="checkbox"/>Level III Advantage</label><label class="inline-flex items-center gap-2"><input class="accent-brand-600" name="valMobile" type="checkbox"/>Mobile Payments</label><label class="inline-flex items-center gap-2"><input checked class="accent-brand-600" name="valVault" type="checkbox"/>Customer Vault</label></div>
                    <div class="mt-4 text-xs text-slate-600 dark:text-slate-300">By submitting, you agree to our <a class="underline text-brand-600 dark:text-brand-400" href="terms.php" rel="noopener" target="_blank">Terms & Conditions</a> and <a class="underline text-brand-600 dark:text-brand-400" href="privacy.php" rel="noopener" target="_blank">Privacy Policy</a>.</div>
                </section>
                <div class="flex items-center gap-3">
                    <button class="px-5 py-3 rounded-lg bg-brand-600 text-white font-semibold hover:bg-brand-700 transition-colors" type="submit">Submit Application</button>
                    <span class="text-sm text-slate-600 dark:text-slate-300" id="apply-out"></span>
                </div>
            </form>
        </div>
    </main>
    
    <!-- Footer -->
    <footer class="border-t border-slate-200 dark:border-slate-800 py-10">
        <div class="max-w-7xl mx-auto px-4 grid sm:grid-cols-2 lg:grid-cols-4 gap-8 text-sm">
            <div class="space-y-3">
<script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.lucide) lucide.createIcons();
            document.getElementById('year').textContent = new Date().getFullYear();

            // --- Pop-out Menu & Modal Logic ---
            const menuBtn = document.getElementById('open-menu-btn');
            const popoutMenu = document.getElementById('popout-menu');
            if (menuBtn && popoutMenu) {
                menuBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const isHidden = popoutMenu.classList.contains('hidden');
                    if (isHidden) {
                        popoutMenu.classList.remove('hidden');
                        setTimeout(() => popoutMenu.classList.remove('opacity-0'), 10);
                    } else {
                        popoutMenu.classList.add('opacity-0');
                        setTimeout(() => popoutMenu.classList.add('hidden'), 300);
                    }
                });
                document.addEventListener('click', (e) => {
                    if (!popoutMenu.classList.contains('hidden') && !popoutMenu.contains(e.target) && !menuBtn.contains(e.target)) {
                        popoutMenu.classList.add('opacity-0');
                        setTimeout(() => popoutMenu.classList.add('hidden'), 300);
                    }
                });
                popoutMenu.querySelectorAll('a[data-close]').forEach(link => {
                    link.addEventListener('click', () => {
                        popoutMenu.classList.add('opacity-0');
                        setTimeout(() => popoutMenu.classList.add('hidden'), 300);
                    });
                });
            }

            const openPanel = (overlayId, panelId) => {
                const overlay = document.getElementById(overlayId);
                const panel = document.getElementById(panelId);
                if(overlay) overlay.classList.remove('invisible', 'opacity-0');
                if(panel) panel.classList.remove('translate-x-full');
            };
            const closePanel = (overlayId, panelId) => {
                const panel = document.getElementById(panelId);
                if(panel) panel.classList.add('translate-x-full');
                const overlay = document.getElementById(overlayId);
                if(overlay) setTimeout(() => overlay.classList.add('invisible', 'opacity-0'), 300);
            };

            document.querySelectorAll('.js-cta').forEach(el => {
                el.addEventListener('click', (e) => {
                    e.preventDefault();
                    openPanel('signup-panel-overlay', 'signup-panel');
                    initializeForm();
                });
            });
            document.getElementById('close-signup-panel-btn')?.addEventListener('click', () => closePanel('signup-panel-overlay', 'signup-panel'));
            const signupOverlay = document.getElementById('signup-panel-overlay');
            if(signupOverlay) signupOverlay.addEventListener('click', (e) => {
                if (e.target.id === 'signup-panel-overlay') closePanel('signup-panel-overlay', 'signup-panel');
            });

            const supportModal = document.getElementById('support-modal');
            document.querySelectorAll('.js-support').forEach(el => {
                el.addEventListener('click', (e) => { e.preventDefault(); if(supportModal) supportModal.classList.remove('hidden'); });
            });
            if(supportModal) supportModal.addEventListener('click', (e) => {
                if (e.target.dataset.close !== undefined) supportModal.classList.add('hidden');
            });
            
            // --- Application Form JavaScript ---
            const states = ["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","District of Columbia","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Carolina","North Dakota","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"];
            const stateSelect = document.querySelector('select[name="state"]');
            if (stateSelect) { states.forEach(s => { const opt=document.createElement('option'); opt.textContent=opt.value=s; stateSelect.appendChild(opt); }); }

            const form = document.getElementById('apply-form');
            const out = document.getElementById('apply-out');
            const LS_KEY = 'mh_apply_draft';

            function saveDraft(){ if(!form) return; const data = Object.fromEntries(new FormData(form).entries()); localStorage.setItem(LS_KEY, JSON.stringify(data)); }
            function loadDraft(){ if(!form) return; try { const d = JSON.parse(localStorage.getItem(LS_KEY)||'{}'); for (const k in d){ const el = form.elements[k]; if (!el) continue; if (el.type==='checkbox'){ el.checked = !!d[k]; } else { el.value = d[k]; } } } catch(e){} }
            
            if (form) {
                form.addEventListener('input', saveDraft);
                loadDraft();
                form.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    if(out) out.textContent = 'Submitting…';
                    try {
                        const data = Object.fromEntries(new FormData(form).entries());
                        ['svcCredit','svcAch','svcCash','valEncryption','valInvoice','valLevel3','valMobile','valVault'].forEach(k => { data[k] = form.elements[k] ? !!form.elements[k].checked : false; });
                        console.log("Form data to be submitted:", data);
                        
                        setTimeout(() => { 
                            if(out) out.textContent = 'Thanks — we emailed you next steps and sent your application to our team.';
                            localStorage.removeItem(LS_KEY);
                            form.reset();
                        }, 1500);

                    } catch (err) {
                        console.error(err);
                        if(out) out.textContent = 'Something went wrong. Please try again or email hello@merchant.haus.';
                    }
                });
            }

            // --- Multi-step form logic ---
            function initializeForm() {
                const formContainer = document.getElementById('signup-panel');
                if (!formContainer) return;
                // Full multi-step form HTML and logic would be injected here
            }
        });
    </script>

<?php require_once __DIR__ . '/src/includes/footer.php'; ?>
