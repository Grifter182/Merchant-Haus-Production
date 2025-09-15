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
.service-cell { opacity: 0; transition: opacity 0.5s ease-in-out; }
.service-cell.is-visible { opacity: 1; }
.service-cell h3, .service-cell p { opacity: 0; transform: translateY(10px); transition: opacity 0.4s ease-out, transform 0.4s ease-out; }
.service-cell.is-visible h3 { opacity: 1; transform: translateY(0); transition-delay: 0.2s; }
.service-cell.is-visible p { opacity: 1; transform: translateY(0); transition-delay: 0.3s; }
.hero-bg-container::before { content: ''; position: absolute; inset: 0; background-image: url('public/assets/images/hero.png'); background-size: 100%; background-position: center; background-repeat: no-repeat; animation: kenBurns 20s ease-in-out infinite alternate; z-index: -20; }
@keyframes kenBurns { 0% { transform: scale(1) rotate(0deg); background-position: center; } 100% { transform: scale(1.1) rotate(1deg); background-position: top left; } }
.panel-overlay, .panel-container { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
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
              <button class="js-cta bg-transparent hover:bg-brand-crimson text-brand-crimson hover:text-white border border-brand-crimson px-4 py-2 rounded-full text-sm font-semibold transition-colors duration-300">Get Started</button>
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
  <div class="relative w-full overflow-hidden group [mask-image:_linear_gradient(to_right,transparent_0,_black_128px,_black_calc(100%-128px),transparent_100%)]">
    <div class="flex animate-scroll group-hover:[animation-play-state:paused]">
      <div class="flex-shrink-0 flex items-center space-x-8" id="services-container-1"></div>
      <div class="flex-shrink-0 flex items-center space-x-8" id="services-container-2" aria-hidden="true"></div>
    </div>
  </div>
</section>

<section id="integrations" class="py-8 md:py-12">
  <div class="max-w-5xl mx-auto px-4 text-center">
    <h2 class="text-4xl font-bold mb-4 animate-on-scroll font-ubuntu">Integrate with Your Favorite Tools</h2>
    <p class="text-lg text-gray-600 dark:text-slate-300 mb-12">Connect MerchantHaus with the platforms you already use.</p>
    <div class="flex justify-center items-center gap-8 md:gap-16">
      <a href="shopify.php" class="block hover:scale-105 transition-transform duration-300">
        <img src="public/assets/images/shopifylight.png" alt="Shopify Logo" class="h-12 md:h-14 block dark:hidden">
        <img src="public/assets/images/shopifydark.png" alt="Shopify Logo" class="h-12 md:h-14 hidden dark:block">
      </a>
      <a href="gohighlevel.php" class="block hover:scale-105 transition-transform duration-300">
        <img src="public/assets/images/gohighlevellight.png" alt="GoHighLevel Logo" class="h-12 md:h-14 block dark:hidden">
        <img src="public/assets/images/gohighleveldark.png" alt="GoHighLevel Logo" class="h-12 md:h-14 hidden dark:block">
      </a>
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

<div id="signup-panel-overlay" class="panel-overlay fixed inset-0 bg-black/60 z-50 opacity-0 invisible">
  <div id="signup-panel" class="panel-container fixed top-0 right-0 h-full w-full max-w-2xl bg-white dark:bg-slate-900 shadow-2xl transform translate-x-full flex flex-col">
    <div class="p-6 sm:p-8 relative flex-shrink-0">
      <button id="close-signup-panel-btn" class="absolute top-4 right-4 text-slate-500 hover:text-slate-800 dark:hover:text-slate-200"><i data-lucide="x" class="h-6 w-6"></i></button>
      <div class="mb-6">
        <div class="flex justify-between mb-2 text-sm font-semibold text-slate-800 dark:text-slate-200">
          <p>Step <span id="current-step-text">1</span> of 3</p>
          <p id="step-name">Account Details</p>
        </div>
        <div class="w-full bg-slate-200 dark:bg-slate-700 rounded-full h-2.5 overflow-hidden">
          <div id="progress-bar" class="bg-brand-crimson h-full rounded-full" style="width: 33%"></div>
        </div>
      </div>
    </div>
    <div class="px-6 sm:px-8 pb-4 flex-grow overflow-y-auto">
      <form id="signup-form" novalidate></form>
      <div id="form-message" class="mt-4 text-center text-sm"></div>
    </div>
    <div class="p-6 sm:p-8 mt-auto pt-6 border-t border-slate-200 dark:border-slate-800 flex justify-between items-center flex-shrink-0">
      <div class="text-sm">
        <p class="font-semibold">Need Help?</p>
        <a href="tel:15056006042" class="text-slate-500 hover:text-brand-crimson dark:hover:text-brand-teal transition-colors">1-505-600-6042</a>
      </div>
      <div class="flex items-center gap-4">
        <button type="button" id="prev-btn" class="bg-slate-200 text-slate-800 dark:bg-slate-700 dark:text-slate-200 px-6 py-2.5 rounded-lg font-semibold hover:bg-slate-300 dark:hover:bg-slate-600 transition-all invisible">Previous</button>
        <button type="button" id="next-btn" class="bg-brand-crimson text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-brand-crimson transition-all shadow-sm hover:shadow-md">Next</button>
        <button type="submit" id="submit-btn" form="signup-form" class="bg-brand-crimson text-white px-6 py-2.5 rounded-lg font-bold hover:bg-brand-crimson transition-all shadow-sm hover:shadow-md hidden">Create Account</button>
      </div>
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

  const openPanel = (overlayId, panelId) => {
    document.getElementById(overlayId).classList.remove('invisible', 'opacity-0');
    document.getElementById(panelId).classList.remove('translate-x-full');
  };
  const closePanel = (overlayId, panelId) => {
    document.getElementById(panelId).classList.add('translate-x-full');
    setTimeout(() => {
      document.getElementById(overlayId).classList.add('invisible', 'opacity-0');
    }, 300);
  };

  document.querySelectorAll('.js-cta').forEach(el => {
    el.addEventListener('click', (e) => {
      e.preventDefault();
      openPanel('signup-panel-overlay', 'signup-panel');
      initializeForm();
    });
  });

  document.getElementById('close-signup-panel-btn').addEventListener('click', () => closePanel('signup-panel-overlay', 'signup-panel'));
  document.getElementById('signup-panel-overlay').addEventListener('click', (e) => {
    if (e.target.id === 'signup-panel-overlay') closePanel('signup-panel-overlay', 'signup-panel');
  });

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

  const handleFaqSubmit = async () => {
    const question = faqQuestionInput.value.trim();
    if (!question) return;
    faqAnswerContainer.classList.remove('hidden');
    askFaqBtn.disabled = true;
    askFaqBtn.innerHTML = '<span class="loader"></span>';
    faqAnswerContainer.innerHTML = 'Thinking...';
    try {
      const response = await fetch('/.netlify/functions/gemini-chat', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ prompt: question, history: [] })
      });
      if (!response.ok) throw new Error('API request failed');
      const result = await response.json();
      if (result.reply) {
        let html = result.reply
          .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
          .replace(/^\* (.*$)/gm, '<li>$1</li>')
          .replace(/<\/li><li>/g, '</li><li>');
        if (html.includes('<li>')) {
          html = `<ul class="list-disc pl-5 space-y-2">${html}</ul>`;
        }
        faqAnswerContainer.innerHTML = html;
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

  let currentStep = 0;
  const stepNames = ["Account Details", "Company Information", "Finalize Account"];

  function initializeForm() {
    const form = document.getElementById('signup-form');
    if (!form) return;
    form.innerHTML = `
      <div id="step-1" class="form-step">
        <h2 class="text-2xl font-bold mb-2">Primary Contact Information</h2>
        <p class="text-sm text-slate-500 mb-6">This person will be the primary user on the account.</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div><label for="firstName" class="block text-sm font-semibold mb-1">First Name*</label><input type="text" id="firstName" name="firstName" class="w-full p-3 rounded-lg bg-slate-100 dark:bg-slate-800" required></div>
          <div><label for="lastName" class="block text-sm font-semibold mb-1">Last Name*</label><input type="text" id="lastName" name="lastName" class="w-full p-3 rounded-lg bg-slate-100 dark:bg-slate-800" required></div>
          <div class="md:col-span-2"><label for="email" class="block text-sm font-semibold mb-1">Email Address*</label><input type="email" id="email" name="email" class="w-full p-3 rounded-lg bg-slate-100 dark:bg-slate-800" required></div>
          <div><label for="phone" class="block text-sm font-semibold mb-1">Phone Number*</label><input type="tel" id="phone" name="phone" class="w-full p-3 rounded-lg bg-slate-100 dark:bg-slate-800" required></div>
          <div><label for="password" class="block text-sm font-semibold mb-1">Password*</label><input type="password" id="password" name="password" class="w-full p-3 rounded-lg bg-slate-100 dark:bg-slate-800" required></div>
        </div>
      </div>
      <div id="step-2" class="form-step hidden">
        <h2 class="text-2xl font-bold mb-6">Company Information</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div class="md:col-span-2"><label for="companyName" class="block text-sm font-semibold mb-1">Company Name*</label><input type="text" id="companyName" name="companyName" class="w-full p-3 rounded-lg bg-slate-100 dark:bg-slate-800" required></div>
        </div>
      </div>
      <div id="step-3" class="form-step hidden">
        <h2 class="text-2xl font-bold mb-2">Finalize Your Account</h2>
        <p class="text-sm text-slate-500 mb-6">Create a username for logging into the gateway and accept the terms.</p>
        <div class="space-y-4">
          <div><label for="username" class="block text-sm font-semibold mb-1">Primary Username*</label><input type="text" id="username" name="username" class="w-full p-3 rounded-lg bg-slate-100 dark:bg-slate-800" required></div>
          <div class="flex items-start pt-4">
            <div class="flex items-center h-5"><input id="terms" name="terms" type="checkbox" class="focus:ring-brand-crimson h-4 w-4 text-brand-crimson rounded" required></div>
            <div class="ml-3 text-sm"><label for="terms">I agree to the <a href="#" class="font-semibold text-brand-crimson hover:underline">Terms and Conditions</a>*</label></div>
          </div>
        </div>
      </div>`;
    const steps = form.querySelectorAll('.form-step');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const submitBtn = document.getElementById('submit-btn');
    const progressBar = document.getElementById('progress-bar');
    const currentStepText = document.getElementById('current-step-text');
    const stepNameEl = document.getElementById('step-name');

    function updateFormStep() {
      steps.forEach((step, index) => {
        step.classList.toggle('hidden', index !== currentStep);
      });
      progressBar.style.width = `${((currentStep + 1) / steps.length) * 100}%`;
      currentStepText.textContent = currentStep + 1;
      stepNameEl.textContent = stepNames[currentStep];
      prevBtn.classList.toggle('invisible', currentStep === 0);
      nextBtn.classList.toggle('hidden', currentStep === steps.length - 1);
      submitBtn.classList.toggle('hidden', currentStep !== steps.length - 1);
    }
    nextBtn.addEventListener('click', () => { if (currentStep < steps.length - 1) { currentStep++; updateFormStep(); } });
    prevBtn.addEventListener('click', () => { if (currentStep > 0) { currentStep--; updateFormStep(); } });
    updateFormStep();
  }

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
