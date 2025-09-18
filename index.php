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
#integrations a .integration-logo {
  filter: grayscale(100%) saturate(0) brightness(0.85);
  opacity: 0.6;
  transition: filter 0.4s ease, opacity 0.4s ease;
}
#integrations a:hover .integration-logo,
#integrations a:focus-visible .integration-logo {
  filter: none;
  opacity: 1;
}
.dark #integrations a .integration-logo {
  filter: grayscale(100%) saturate(0.4) brightness(1.35) contrast(0.9);
  opacity: 0.7;
  mix-blend-mode: screen;
}
.dark #integrations a:hover .integration-logo,
.dark #integrations a:focus-visible .integration-logo {
  filter: none;
  opacity: 1;
  mix-blend-mode: normal;
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
  <div class="max-w-5xl mx-auto px-4 text-center">
    <h2 class="text-4xl font-bold mb-4 animate-on-scroll font-ubuntu">Integrate with Your Favorite Tools</h2>
    <p class="text-lg text-gray-600 dark:text-slate-300 mb-12">Connect MerchantHaus with the platforms you already use.</p>
    <?php
      $goHighLevelIntegration = [
        'name' => 'GoHighLevel',
        'href' => 'gohighlevel.php',
        'logos' => [
          'light' => mh_asset('public/assets/images/gohighlevellight.png'),
          'dark' => mh_asset('public/assets/images/gohighleveldark.png'),
        ],
      ];

      $integrationTiles = [
        [
          'name' => 'Shopify',
          'href' => 'Shopify.html',
          'logos' => [
            'light' => mh_asset('public/assets/images/shopifylight.png'),
            'dark' => mh_asset('public/assets/images/shopifydark.png'),
          ],
        ],
        [
          'name' => 'QuickBooks SyncPay',
          'href' => 'https://quickbooks.intuit.com/',
          'target' => '_blank',
          'rel' => 'noopener',
          'logos' => [
            'default' => mh_asset('public/assets/images/quickbooks.svg'),
          ],
        ],
        [
          'name' => 'Squarespace',
          'href' => 'https://www.squarespace.com/',
          'target' => '_blank',
          'rel' => 'noopener',
          'logos' => [
            'light' => mh_asset('public/assets/images/squarespace-light.svg'),
            'dark' => mh_asset('public/assets/images/squarespace-dark.svg'),
          ],
        ],
        $goHighLevelIntegration,
      ];
    ?>
    <div class="flex justify-center items-center gap-8 md:gap-16">
      <?php foreach ($integrationTiles as $integration) : ?>
        <?php
          $href = $integration['href'] ?? '#';
          $logos = $integration['logos'] ?? [];
          $lightLogo = $logos['light'] ?? null;
          $darkLogo = $logos['dark'] ?? null;
          $defaultLogo = $logos['default'] ?? ($integration['logo'] ?? null);
          if (!$lightLogo && !$darkLogo && !$defaultLogo) {
            continue;
          }
          $tileClass = $integration['class'] ?? 'block hover:scale-105 transition-transform duration-300';
          $altText = $integration['alt'] ?? (($integration['name'] ?? 'Integration') . ' Logo');
          $targetAttr = isset($integration['target']) ? ' target="' . htmlspecialchars($integration['target']) . '"' : '';
          $relAttr = isset($integration['rel']) ? ' rel="' . htmlspecialchars($integration['rel']) . '"' : '';
        ?>
        <a href="<?php echo htmlspecialchars($href); ?>" class="<?php echo htmlspecialchars($tileClass); ?>"<?php echo $targetAttr . $relAttr; ?>>
          <?php if ($lightLogo && $darkLogo) : ?>
            <img src="<?php echo htmlspecialchars($lightLogo); ?>" alt="<?php echo htmlspecialchars($altText); ?>" class="integration-logo h-12 md:h-14 block dark:hidden">
            <img src="<?php echo htmlspecialchars($darkLogo); ?>" alt="<?php echo htmlspecialchars($altText); ?>" class="integration-logo h-12 md:h-14 hidden dark:block">
          <?php else : ?>
            <?php $singleLogo = $lightLogo ?? $darkLogo ?? $defaultLogo; ?>
            <img src="<?php echo htmlspecialchars($singleLogo); ?>" alt="<?php echo htmlspecialchars($altText); ?>" class="integration-logo h-12 md:h-14 block">
          <?php endif; ?>
        </a>
      <?php endforeach; ?>
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
      const response = await fetch('support.html', { method: 'POST', body: formData });
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

