<?php
    $pageTitle = 'MerchantHaus – ISO Solutions for U.S. Retail';
    $pageDescription = 'Effortlessly set up your business profile and start taking payments in minutes—cards, ACH, and secure pay links—online, in-store, or on the go.';
    include __DIR__ . '/Header.php';
?>

<style>
.field:focus { outline: none; box-shadow: 0 0 0 3px rgba(239,60,91,.35); }
.cursor { display: inline-block; width: 3px; height: 1em; background-color: #dc2743; animation: blink-caret .75s step-end infinite; vertical-align: bottom; }
@keyframes blink-caret { from, to { background-color: transparent; } 50% { background-color: #dc2743; } }
.loader { width: 16px; height: 16px; border: 2px solid #FFF; border-bottom-color: transparent; border-radius: 50%; display: inline-block; box-sizing: border-box; animation: rotation 1s linear infinite; vertical-align: middle; margin-right: 8px; }
@keyframes rotation { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
.feature-display { display: flex; align-items: center; justify-content: center; min-width: 150px; height: 38px; padding: 0 16px; border-radius: 9999px; background-color: #F3F4F6; color: #111827; font-size: 0.875rem; font-weight: 500; transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out; opacity: 0; transform: translateX(-50%) translateY(10px); position: absolute; left: 50%; white-space: nowrap; }
.dark .feature-display { background-color: #1f2937; color: #f9fafb; }
.feature-display.active { opacity: 1; transform: translateX(-50%) translateY(0); }
.feature-display.exiting { opacity: 0; transform: translateX(-50%) translateY(-10px); }
.marquee-wrapper {
  --marquee-fade: clamp(96px, 8vw, 128px);
  -webkit-mask-image: linear-gradient(to right, transparent 0, #000 var(--marquee-fade), #000 calc(100% - var(--marquee-fade)), transparent 100%);
          mask-image: linear-gradient(to right, transparent 0, #000 var(--marquee-fade), #000 calc(100% - var(--marquee-fade)), transparent 100%);
}
.marquee-track {
  animation: marquee-slide-left 45s linear infinite;
  will-change: transform;
}
.marquee-track--reverse { animation-name: marquee-slide-right; }
.marquee-wrapper:hover .marquee-track { animation-play-state: paused; }
.service-cell { opacity: 0; transition: opacity 0.5s ease-in-out; }
.service-cell.is-visible { opacity: 1; }
.service-cell h3, .service-cell p { opacity: 0; transform: translateY(10px); transition: opacity 0.4s ease-out, transform 0.4s ease-out; }
.service-cell.is-visible h3 { opacity: 1; transform: translateY(0); transition-delay: 0.2s; }
.service-cell.is-visible p { opacity: 1; transform: translateY(0); transition-delay: 0.3s; }
#faq-answer p { margin: 0 0 0.75rem; }
#faq-answer p:last-child { margin-bottom: 0; }
#faq-answer ul { margin: 0; }
.hero-bg-container::before { content: ''; position: absolute; inset: 0; background-image: url('<?php echo htmlspecialchars(mh_asset("public/assets/images/hero.png")); ?>'); background-size: 100%; background-position: center; background-repeat: no-repeat; animation: kenBurns 20s ease-in-out infinite alternate; z-index: -20; }
@keyframes kenBurns { 0% { transform: scale(1) rotate(0deg); background-position: center; } 100% { transform: scale(1.1) rotate(1deg); background-position: top left; } }
@keyframes marquee-slide-left { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
@keyframes marquee-slide-right { 0% { transform: translateX(-50%); } 100% { transform: translateX(0); } }
@media (prefers-reduced-motion: reduce) { .marquee-track { animation: none !important; } }
.panel-overlay, .panel-container { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
#integrations .integration-marquee {
  margin-left: auto;
  margin-right: auto;
}
#integrations .integration-track {
  display: flex;
  align-items: center;
  gap: clamp(2.5rem, 8vw, 4.5rem);
  padding: 0 1rem;
}
#integrations .integration-item {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 0.5rem 0.75rem;
}
#integrations .integration-highlight {
  display: grid;
  gap: clamp(1.5rem, 4vw, 3rem);
  align-items: center;
  justify-items: center;
}
@media (min-width: 768px) {
  #integrations .integration-highlight {
    grid-template-columns: auto 1fr auto;
  }
}
#integrations .integration-highlight .integration-item {
  padding: 0.75rem 1.5rem;
}
#integrations .integration-heading {
  display: grid;
  gap: 0.25rem;
  text-align: center;
}
#integrations .integration-heading .integration-eyebrow {
  font-size: 0.875rem;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: #4b5563;
}
.dark #integrations .integration-heading .integration-eyebrow {
  color: #94a3b8;
}
#integrations .integration-heading .integration-title {
  font-size: clamp(1.75rem, 4vw, 2.5rem);
  font-weight: 700;
  color: #111827;
}
.dark #integrations .integration-heading .integration-title {
  color: #f8fafc;
}
#integrations .integration-logo {
  display: block;
  opacity: 0.95;
  transition: transform 0.3s ease, filter 0.3s ease, opacity 0.3s ease;
}
#integrations a:hover .integration-logo,
#integrations a:focus-visible .integration-logo {
  transform: scale(1.1);
  opacity: 1;
}
.dark #integrations .integration-logo--marquee {
  filter: brightness(1.15) contrast(1.05);
}
</style>

<div class="relative">
  <section class="relative overflow-hidden animate-fadeIn hero-bg-container">
    <div class="absolute inset-0 bg-black/50 -z-10"></div>
    <div class="max-w-7xl mx-auto px-4 pt-16 md:pt-24 pb-28">
      <div class="grid md:grid-cols-2 gap-10 items-center">
        <div class="space-y-6 text-center md:text-left">
          <h1 class="text-3xl sm:text-4xl tracking-tight leading-tight text-white">
            <span class="uppercase font-ubuntu">PAYMENTS EVERYWHERE</span>
            <span id="animated-headline-sub" class="grad-text-static text-2xl sm:text-3xl font-ubuntu block sm:inline-block mt-2 sm:mt-0 h-10 sm:h-auto">Built for Speed, Security, and Scale.</span>
          </h1>
          <p class="text-lg text-gray-200 dark:text-slate-300 font-inter" style="font-weight:100">Effortlessly set up your business profile and start taking payments in minutes—cards, ACH, and secure pay links—online, in-store, or on the go. Enjoy lower costs, fast onboarding, real-time reporting, and tools to reduce fraud and chargebacks.</p>
        </div>
        <div class="relative p-4">
          <div class="w-full space-y-4 relative z-10">
            <div class="relative">
              <input type="text" id="faq-question" placeholder="Ask about pricing, features..." class="field w-full p-4 pr-12 text-lg rounded-full bg-white/20 dark:bg-slate-900/30 border border-slate-300/50 dark:border-slate-700/50 text-white placeholder-slate-300 focus:ring-2 focus:ring-brand-crimson focus:border-transparent transition-all">
              <button id="ask-faq" class="absolute top-1/2 right-2 -translate-y-1/2 p-2 rounded-full bg-brand-crimson text-white hover:bg-brand-crimson transition-colors">
                <i data-lucide="arrow-up" class="h-5 w-5"></i>
              </button>
            </div>
            <div id="hero-actions" class="flex flex-wrap justify-center items-center gap-3">
              <button class="js-signup-cta bg-transparent hover:bg-brand-crimson text-brand-crimson hover:text-white border border-brand-crimson px-4 py-2 rounded-full text-sm font-semibold transition-colors duration-300">Get Started</button>
              <button class="bg-slate-100/20 dark:bg-slate-800/30 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-slate-200/30 dark:hover:bg-slate-700/40 transition-colors">Chargeback Help</button>
              <button class="js-support bg-slate-100/20 dark:bg-slate-800/30 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-slate-200/30 dark:hover:bg-slate-700/40 transition-colors">Contact Support</button>
            </div>
            <div id="faq-answer" class="mt-6 p-4 text-left rounded-lg bg-white/90 dark:bg-slate-900/90 border border-slate-200 dark:border-slate-800 hidden text-slate-800 dark:text-slate-200"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2 z-10 w-full max-w-5xl px-4">
    <div class="bg-white dark:bg-[#1c1c1c] text-slate-800 dark:text-slate-200 px-8 py-4 rounded-xl border-2 border-brand-crimson shadow-lg text-center">
      <h2 class="text-3xl font-ubuntu font-bold">Payment Services Built for You</h2>
    </div>
  </div>
</div>

<section id="payments" class="pt-28 pb-12" style="background-color: #6dffca;">
  <div class="max-w-5xl mx-auto px-4 text-right">
    <p class="text-2xl sm:text-3xl font-ubuntu mb-12" style="color: #524848;">Your complete toolkit for accepting payments and managing your business.</p>
  </div>
  <div class="marquee-wrapper relative w-full overflow-hidden">
    <div class="marquee-track flex">
      <div class="flex-shrink-0 flex items-center space-x-8" id="services-container-1"></div>
      <div class="flex-shrink-0 flex items-center space-x-8" id="services-container-2" aria-hidden="true"></div>
    </div>
  </div>
  <div class="mt-8 sm:mt-10 flex justify-center px-4">
    <button
      type="button"
      class="js-signup-cta inline-flex items-center justify-center rounded-full px-8 py-3 text-lg font-semibold text-white shadow-lg transition-all duration-300 hover:-translate-y-0.5 hover:shadow-xl focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-crimson focus-visible:ring-offset-2 focus-visible:ring-offset-white dark:focus-visible:ring-offset-slate-900"
      style="background-image: linear-gradient(135deg, #dc143c 0%, #f43f5e 50%, #ff758c 100%);"
    >
      Start accepting payments today
    </button>
  </div>
</section>

<section id="integrations" class="py-8 md:py-12">
  <?php
    $shopifyIntegration = [
      'name' => 'Shopify',
      'href' => 'Shopify.html',
      'logos' => [
        'light' => mh_asset('public/assets/images/shopify-green.png'),
        'dark' => mh_asset('public/assets/images/shopifydark.png'),
      ],
    ];

    $goHighLevelIntegration = [
      'name' => 'GoHighLevel',
      'href' => 'gohighlevel.php',
      'logos' => [
        'light' => mh_asset('public/assets/images/gohighleveldark.png'),
        'dark' => mh_asset('public/assets/images/gohighleveldark.png'),
      ],
    ];

    $hasShopifyDarkLogo = !empty($shopifyIntegration['logos']['dark']) && $shopifyIntegration['logos']['dark'] !== $shopifyIntegration['logos']['light'];
    $hasHighLevelDarkLogo = !empty($goHighLevelIntegration['logos']['dark']) && $goHighLevelIntegration['logos']['dark'] !== $goHighLevelIntegration['logos']['light'];

    $integrationLogoGroups = [
      'top' => [
        [
          'name' => 'Salesforce',
          'href' => 'https://www.salesforce.com/',
          'logo' => 'https://www.salesforce.com/content/dam/sfdc-docs/www/logos/logo-salesforce.svg',
        ],
        [
          'name' => 'QuickBooks',
          'href' => 'https://quickbooks.intuit.com/',
          'logo' => 'https://upload.wikimedia.org/wikipedia/commons/7/79/Intuit_QuickBooks_logo.svg',
        ],
        [
          'name' => 'HubSpot',
          'href' => 'https://www.hubspot.com/',
          'logo' => 'https://upload.wikimedia.org/wikipedia/commons/3/3f/HubSpot_Logo.svg',
        ],
        [
          'name' => 'Vend',
          'href' => 'https://www.vendhq.com/',
          'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Vend-logo.svg/512px-Vend-logo.svg.png',
        ],
        [
          'name' => 'Squarespace',
          'href' => 'https://www.squarespace.com/',
          'logo' => 'https://upload.wikimedia.org/wikipedia/en/5/53/Squarespace_Logo.svg',
        ],
        [
          'name' => 'MemberPress',
          'href' => 'https://memberpress.com/',
          'logo' => 'https://memberpress.com/wp-content/uploads/2023/07/memberpress-by-awesome-motive-logo-flame-blue-rgb.svg',
        ],
        [
          'name' => 'WooCommerce',
          'href' => 'https://woocommerce.com/',
          'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/WooCommerce_logo.svg/512px-WooCommerce_logo.svg.png',
        ],
        [
          'name' => 'Zoho CRM',
          'href' => 'https://www.zoho.com/crm/',
          'logo' => 'https://upload.wikimedia.org/wikipedia/commons/3/30/ZOHO_logo_2023.svg',
        ],
      ],
      'bottom' => [
        [
          'name' => 'Lightspeed',
          'href' => 'https://www.lightspeedhq.com/',
          'logo' => 'https://upload.wikimedia.org/wikipedia/commons/3/38/Lightspeed_-_logo.png',
        ],
        [
          'name' => 'Wix',
          'href' => 'https://www.wix.com/',
          'logo' => 'https://static.wixstatic.com/media/de991a_321c4356214644169542e724ef57529b~mv2.png',
        ],
        [
          'name' => 'Keap',
          'href' => 'https://keap.com/',
          'logo' => 'https://upload.wikimedia.org/wikipedia/commons/e/e0/Logo_of_Keap_Company.svg',
        ],
        [
          'name' => 'Clover',
          'href' => 'https://www.clover.com/',
          'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Clover_logo.svg/512px-Clover_logo.svg.png',
        ],
        [
          'name' => 'FreshBooks',
          'href' => 'https://www.freshbooks.com/',
          'logo' => 'https://upload.wikimedia.org/wikipedia/commons/1/17/FreshBooks_logo_%282020%29.svg',
        ],
        [
          'name' => 'Magento',
          'href' => 'https://magento.com/',
          'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Magento_Logo.svg/512px-Magento_Logo.svg.png',
        ],
        [
          'name' => 'BigCommerce',
          'href' => 'https://www.bigcommerce.com/',
          'logo' => 'https://upload.wikimedia.org/wikipedia/commons/c/c4/Bc-logo-dark.svg',
        ],
        [
          'name' => 'NCR',
          'href' => 'https://www.ncr.com/',
          'logo' => 'https://upload.wikimedia.org/wikipedia/commons/9/92/NCR_logo_color.svg',
        ],
        [
          'name' => 'Visa',
          'href' => 'https://www.visa.com/',
          'logo' => 'https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_2021.svg',
        ],
        [
          'name' => 'Mastercard',
          'href' => 'https://www.mastercard.us/',
          'logo' => 'https://upload.wikimedia.org/wikipedia/commons/a/a4/Mastercard_2019_logo.svg',
        ],
      ],
    ];

  ?>
  <div class="max-w-5xl mx-auto px-4 text-center space-y-10">
    <div class="integration-marquee marquee-wrapper">
      <div class="marquee-track integration-track">
        <?php
          $logoFiles = [
            'bigcommerce.webp',
            'clover-logo.5637c88fda21055b797e300e16140c95.svg',
            'clover.webp',
            'freshbooks.webp',
            'gohighlevel.svg',
            'hubspot.webp',
            'keap-infusionsoft.webp',
            'lightspeed.webp',
            'magento.webp',
            'memberpress-logo-color.svg',
            'memberpress.webp',
            'ncr.webp',
            'quickbooks.webp',
            'salesforce.webp',
            'shopify.svg',
            'squarespace.webp',
            'vend.webp',
            'wix.webp',
            'woocommerce.webp',
            'zoho-crm.webp',
          ];
          foreach (array_merge($logoFiles, $logoFiles) as $logoFile) :
            $logoSrc = mh_asset('assets/logos/' . $logoFile);
            $name = pathinfo($logoFile, PATHINFO_FILENAME);
        ?>
          <span class="integration-item">
            <img src="<?php echo htmlspecialchars($logoSrc); ?>" alt="<?php echo htmlspecialchars(ucwords(str_replace(['-', '_'], ' ', $name)) . ' Logo'); ?>" class="integration-logo integration-logo--marquee h-10 sm:h-12 object-contain">
          </span>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="space-y-6">
      <div class="integration-highlight">
        <div class="integration-heading">
          <span class="integration-eyebrow font-semibold">Integrate with</span>
          <h2 class="integration-title font-ubuntu font-bold animate-on-scroll">Your Favorite Tools</h2>
        </div>
        <a href="<?php echo htmlspecialchars($goHighLevelIntegration['href']); ?>" class="integration-item">
          <img src="<?php echo htmlspecialchars($goHighLevelIntegration['logos']['light']); ?>" alt="<?php echo htmlspecialchars($goHighLevelIntegration['name'] . ' Logo'); ?>" class="integration-logo h-14 sm:h-16 object-contain<?php echo $hasHighLevelDarkLogo ? ' block dark:hidden' : ' block'; ?>">
          <?php if ($hasHighLevelDarkLogo) : ?>
            <img src="<?php echo htmlspecialchars($goHighLevelIntegration['logos']['dark']); ?>" alt="<?php echo htmlspecialchars($goHighLevelIntegration['name'] . ' Logo'); ?>" class="integration-logo h-14 sm:h-16 object-contain hidden dark:block">
          <?php endif; ?>
        </a>
      </div>
      <p class="text-lg text-gray-600 dark:text-slate-300">Connect MerchantHaus with the platforms you already use.</p>
    </div>
    <div class="integration-marquee marquee-wrapper">
      <div class="marquee-track marquee-track--reverse integration-track">
        <?php
          $bottomMarqueeLogos = array_merge($integrationLogoGroups['bottom'], $integrationLogoGroups['bottom']);
          foreach ($bottomMarqueeLogos as $logo) :
            $href = $logo['href'] ?? '#';
            $logoSrc = $logo['logo'] ?? null;
            if (!$logoSrc) {
              continue;
            }
            $name = $logo['name'] ?? 'Integration';
            $target = $logo['target'] ?? '_blank';
            $rel = $logo['rel'] ?? ($target === '_blank' ? 'noopener' : null);
            $targetAttr = $target ? ' target="' . htmlspecialchars($target) . '"' : '';
            $relAttr = $rel ? ' rel="' . htmlspecialchars($rel) . '"' : '';
        ?>
          <a href="<?php echo htmlspecialchars($href); ?>" class="integration-item"<?php echo $targetAttr . $relAttr; ?>>
            <img src="<?php echo htmlspecialchars($logoSrc); ?>" alt="<?php echo htmlspecialchars($name . ' Logo'); ?>" class="integration-logo integration-logo--marquee h-10 sm:h-12 object-contain">
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<div class="relative">
  <section id="checklist" class="pt-28 pb-16 bg-slate-50 dark:bg-slate-900/40 border-y border-slate-200/70 dark:border-slate-800">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <p class="mt-4 max-w-3xl mx-auto text-slate-600 dark:text-slate-300">Here’s everything we’ll ask for during setup—business details, security info, documentation. We’ll guide you step‑by‑step.</p>
      <div class="grid md:grid-cols-3 gap-8 mt-12 text-left">
        <div class="bg-white dark:bg-slate-950 p-6 rounded-xl border border-slate-200 dark:border-slate-800 space-y-4">
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-brand-crimson/10 dark:bg-brand-teal/10 flex-shrink-0 flex items-center justify-center text-brand-crimson dark:text-brand-teal">
              <i data-lucide="briefcase" class="w-6 h-6"></i>
            </div>
            <h3 class="text-xl font-ubuntu font-bold">Business Information</h3>
          </div>
          <ul class="list-disc pl-5 space-y-2 text-sm text-slate-600 dark:text-slate-400">
            <li>Business information (name, address, industry)</li>
            <li>Owner/representative info (name, contact, ID)</li>
            <li>Bank account for payouts</li>
            <li>Verification documents (e.g. photo ID, business registration)—upload when prompted</li>
          </ul>
        </div>
        <div class="bg-white dark:bg-slate-950 p-6 rounded-xl border border-slate-200 dark:border-slate-800 space-y-4">
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-brand-crimson/10 dark:bg-brand-teal/10 flex-shrink-0 flex items-center justify-center text-brand-crimson dark:text-brand-teal">
              <i data-lucide="shield-check" class="w-6 h-6"></i>
            </div>
            <h3 class="text-xl font-ubuntu font-bold">Security & Compliance</h3>
          </div>
          <ul class="list-disc pl-5 space-y-2 text-sm text-slate-600 dark:text-slate-400">
            <li>Basic fraud and security setup (required for processing)</li>
            <li>Evidence of PCI DSS certification or self-assessment</li>
            <li>Use of PCI-compliant POS systems or software</li>
            <li>Merchant attestation of cardholder data handling policies</li>
          </ul>
        </div>
        <div class="bg-white dark:bg-slate-950 p-6 rounded-xl border border-slate-200 dark:border-slate-800 space-y-4">
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-brand-crimson/10 dark:bg-brand-teal/10 flex-shrink-0 flex items-center justify-center text-brand-crimson dark:text-brand-teal">
              <i data-lucide="rocket" class="w-6 h-6"></i>
            </div>
            <h3 class="text-xl font-ubuntu font-bold">Platform Readiness</h3>
          </div>
          <ul class="list-disc pl-5 space-y-2 text-sm text-slate-600 dark:text-slate-400">
            <li>User account creation and login testing</li>
            <li>Review of available transaction and reconciliation tools</li>
            <li>Setup of reporting email or dashboard notifications</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 z-10 w-full max-w-5xl px-4">
    <div class="bg-brand-teal px-8 py-4 rounded-xl shadow-lg text-center">
      <h2 class="text-3xl font-ubuntu font-bold" style="color: #524848;">Setup Checklist: What You’ll Need to Begin</h2>
    </div>
  </div>
</div>

<div id="support-modal" class="fixed inset-0 z-[70] hidden">
  <div class="absolute inset-0 bg-black/60" data-close></div>
  <div class="mx-auto mt-[10vh] w-[min(560px,92vw)] rounded-2xl bg-white dark:bg-slate-900 p-6 border border-slate-200 dark:border-slate-800 shadow-2xl">
    <div class="flex items-center justify-between">
      <h3 class="text-xl font-extrabold font-ubuntu">Contact Support</h3>
      <button class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800" data-close aria-label="Close"><i data-lucide="x" class="h-5 w-5"></i></button>
    </div>
    <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Have a question? Fill out the form below or contact us at <a href="tel:15056006042" class="text-brand-crimson dark:text-brand-teal hover:underline">1-505-600-6042</a>.</p>
    <form id="support-form" class="mt-4 grid gap-3">
      <input name="name" placeholder="Your name" class="field rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-950 px-3 py-2" required>
      <input name="email" type="email" placeholder="Work email" class="field rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-950 px-3 py-2" required>
      <textarea name="message" placeholder="Your message..." rows="4" class="field rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-950 px-3 py-2" required></textarea>
      <button class="rounded-lg bg-brand-crimson text-white font-semibold px-4 py-2 hover:bg-brand-crimson" type="submit">Send Message</button>
      <p id="support-out" class="text-xs text-slate-500"></p>
    </form>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  if (window.lucide) lucide.createIcons();

  const services = [
    { icon: "smartphone", title: "Accept Payments Anywhere", description: "Online, in‑store, or on the go." },
    { icon: "git-pull-request-arrow", title: "Smart Processing & Routing", description: "Reduce costs and minimize fraud." },
    { icon: "link", title: "Payment Links & Invoicing", description: "Send secure pay‑by‑link options." },
    { icon: "repeat", title: "Recurring Billing", description: "Automated plans and reminders." },
    { icon: "lock", title: "Secure Tokenization", description: "Protect customer info safely." },
    { icon: "bar-chart-2", title: "Detailed Reporting", description: "Track settlements and insights." },
    { icon: "settings-2", title: "Integration & Automation", description: "APIs and webhooks to connect systems." },
    { icon: "banknote", title: "Bank Payments & ACH", description: "Lower-cost direct transfers." }
  ];
  const container1 = document.getElementById('services-container-1');
  const container2 = document.getElementById('services-container-2');
  if (container1 && container2) {
    const renderServices = (container) => {
      services.forEach(service => {
        const serviceEl = document.createElement('div');
        serviceEl.className = 'service-cell p-4 w-auto flex-shrink-0 flex items-center gap-4';
        serviceEl.innerHTML = `<i data-lucide="${service.icon}" class="w-8 h-8 text-brand-crimson"></i>
          <div class="text-left">
            <h3 class="font-bold text-lg font-ubuntu" style="color: #524848;">${service.title}</h3>
            <p class="text-base" style="color: #524848;">${service.description}</p>
          </div>`;
        container.appendChild(serviceEl);
      });
    };
    renderServices(container1);
    renderServices(container2);
    if (window.lucide) lucide.createIcons();
  }

  const supportModal = document.getElementById('support-modal');
  document.querySelectorAll('.js-support').forEach(el => {
    el.addEventListener('click', (e) => { e.preventDefault(); supportModal.classList.remove('hidden'); });
  });
  supportModal.addEventListener('click', (e) => {
    if (e.target.dataset.close !== undefined) supportModal.classList.add('hidden');
  });

  const headingTexts = { "integrations": "Integrate with Your Favorite Tools" };
  const headingObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const heading = entry.target;
        const sectionId = heading.closest('section').id;
        const text = headingTexts[sectionId];
        if (text && !heading.dataset.animated) {
          heading.dataset.animated = 'true';
          typeWriter(heading, text, 75);
          observer.unobserve(heading);
        }
      }
    });
  }, { threshold: 0.8 });
  document.querySelectorAll('.animate-on-scroll').forEach(el => headingObserver.observe(el));

  const cellObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });
  document.querySelectorAll('.service-cell').forEach(cell => cellObserver.observe(cell));

  const askFaqBtn = document.getElementById('ask-faq');
  const faqQuestionInput = document.getElementById('faq-question');
  const faqAnswerContainer = document.getElementById('faq-answer');

  const createFaqInlineNodes = (text) => {
    const fragment = document.createDocumentFragment();
    if (!text) return fragment;
    const boldRegex = /\*\*(.*?)\*\*/g;
    let lastIndex = 0;
    let match;
    while ((match = boldRegex.exec(text)) !== null) {
      if (match.index > lastIndex) {
        fragment.appendChild(document.createTextNode(text.slice(lastIndex, match.index)));
      }
      const strong = document.createElement('strong');
      strong.textContent = match[1];
      fragment.appendChild(strong);
      lastIndex = boldRegex.lastIndex;
    }
    if (lastIndex < text.length) {
      fragment.appendChild(document.createTextNode(text.slice(lastIndex)));
    }
    return fragment;
  };

  const sanitizeFaqReply = (reply) => {
    if (typeof reply !== 'string') return [];
    const lines = reply.split(/\r?\n/);
    const nodes = [];
    let listEl = null;
    let paragraphBuffer = [];

    const flushList = () => {
      if (listEl) {
        nodes.push(listEl);
        listEl = null;
      }
    };

    const flushParagraph = () => {
      if (!paragraphBuffer.length) return;
      const paragraph = document.createElement('p');
      paragraph.appendChild(createFaqInlineNodes(paragraphBuffer.join(' ')));
      nodes.push(paragraph);
      paragraphBuffer = [];
    };

    lines.forEach((line) => {
      const trimmed = line.trim();
      if (!trimmed) {
        flushParagraph();
        flushList();
        return;
      }
      const bulletMatch = trimmed.match(/^[-*] (.+)$/);
      if (bulletMatch) {
        flushParagraph();
        if (!listEl) {
          listEl = document.createElement('ul');
          listEl.className = 'list-disc pl-5 space-y-2';
        }
        const li = document.createElement('li');
        li.appendChild(createFaqInlineNodes(bulletMatch[1].trim()));
        listEl.appendChild(li);
      } else {
        flushList();
        paragraphBuffer.push(line.trim());
      }
    });

    flushParagraph();
    flushList();
    return nodes;
  };

  const handleFaqSubmit = async () => {
    const question = faqQuestionInput.value.trim();
    if (!question) return;
    faqAnswerContainer.classList.remove('hidden');
    askFaqBtn.disabled = true;
    askFaqBtn.innerHTML = '<span class="loader"></span>';
    faqAnswerContainer.textContent = 'Thinking...';
    try {
      const response = await fetch('/.netlify/functions/gemini-chat', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ prompt: question, history: [] })
      });
      if (!response.ok) throw new Error('API request failed');
      const result = await response.json();
      if (result.reply) {
        const sanitizedNodes = sanitizeFaqReply(result.reply);
        if (sanitizedNodes.length) {
          faqAnswerContainer.replaceChildren(...sanitizedNodes);
        } else {
          faqAnswerContainer.textContent = 'Sorry, I could not find an answer to your question.';
        }
      } else {
        faqAnswerContainer.textContent = 'Sorry, I could not find an answer to your question.';
      }
    } catch (err) {
      console.error('Error fetching AI response:', err);
      faqAnswerContainer.textContent = 'Sorry, something went wrong. Please try again later.';
    } finally {
      askFaqBtn.disabled = false;
      askFaqBtn.innerHTML = '<i data-lucide="arrow-up" class="h-5 w-5"></i>';
      if (window.lucide) lucide.createIcons();
    }
  };
  askFaqBtn.addEventListener('click', handleFaqSubmit);
  faqQuestionInput.addEventListener('keypress', (e) => { if (e.key === 'Enter') handleFaqSubmit(); });

  const supportForm = document.getElementById('support-form');
  const supportOut = document.getElementById('support-out');
  supportForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(supportForm);
    const submitBtn = supportForm.querySelector('button[type="submit"]');
    const originalBtnText = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="loader"></span> Sending...';
    supportOut.textContent = '';
    try {
      const response = await fetch('support.php', { method: 'POST', body: formData });
      if (!response.ok) throw new Error('Network response was not ok');
      const result = await response.json();
      if (result.success) {
        supportOut.style.color = 'green';
        supportOut.textContent = 'Message sent successfully!';
        supportForm.reset();
      } else {
        throw new Error(result.message || 'An unknown error occurred.');
      }
    } catch (error) {
      supportOut.style.color = 'red';
      supportOut.textContent = `Error: ${error.message}`;
    } finally {
      submitBtn.disabled = false;
      submitBtn.innerHTML = originalBtnText;
    }
  });

  function typeWriter(element, text, speed, callback) {
    let i = 0;
    if (!element) return;
    element.innerHTML = '';
    const typingInterval = setInterval(() => {
      if (i < text.length) {
        element.innerHTML = text.substring(0, i + 1) + '<span class="cursor"></span>';
        i++;
      } else {
        clearInterval(typingInterval);
        element.innerHTML = text;
        if (callback) callback();
      }
    }, speed);
  }
});
</script>

<?php include __DIR__ . '/Footer.php'; ?>

