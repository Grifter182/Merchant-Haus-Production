/* MerchantHaus support CTA + modal handler */
(function() {
  const SUPPORT_EMAIL = 'support@merchanthaus.io';
  const MAILTO_SUBJECT = encodeURIComponent('Merchant Haus Support Request');
  const MAILTO_BODY = encodeURIComponent('Hi Merchant Haus Support,\n\nI need assistance with: ');
  const MAILTO_URL = `mailto:${SUPPORT_EMAIL}?subject=${MAILTO_SUBJECT}&body=${MAILTO_BODY}`;
  const CTA_SELECTOR = '[data-cta="contact-support"]';
  let cachedModal = null;
  let escapeListenerAttached = false;

  const onReady = (fn) => {
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', fn, { once: true });
    } else {
      fn();
    }
  };

  function dispatchAnalytics(target) {
    try {
      const detail = {
        event: 'contact_support_click',
        location: target.getAttribute('data-cta-location') || null,
        text: target.textContent ? target.textContent.trim() : null
      };
      window.dispatchEvent(new CustomEvent('mh:analytics', { detail }));
    } catch (error) {
      console.warn('Support CTA analytics dispatch failed', error);
    }
  }

  function closeModal(modal) {
    if (!modal) return;
    modal.classList.add('hidden');
  }

  function attachFormHandler(modal) {
    const form = modal.querySelector('#support-form');
    const errorEl = modal.querySelector('#support-error');
    if (!form || form.dataset.supportBound === 'true') return;

    form.dataset.supportBound = 'true';
    form.addEventListener('submit', async (event) => {
      event.preventDefault();
      const submitButton = form.querySelector('button[type="submit"]');
      const formData = new FormData(form);
      const originalLabel = submitButton ? submitButton.innerHTML : '';

      if (submitButton) {
        submitButton.disabled = true;
        submitButton.innerHTML = '<span class="loader"></span> Sending...';
      }
      if (errorEl) {
        errorEl.textContent = '';
        errorEl.classList.add('hidden');
      }

      if (!formData.get('form-name')) {
        formData.append('form-name', form.getAttribute('name') || 'contact');
      }

      try {
        const response = await fetch('/', {
          method: 'POST',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body: new URLSearchParams(formData).toString()
        });
        if (!response.ok) throw new Error('Network response was not ok');
        window.location.href = '/thankyou.html';
      } catch (error) {
        if (errorEl) {
          errorEl.textContent = `Error: ${error.message}`;
          errorEl.classList.remove('hidden');
        }
      } finally {
        if (submitButton) {
          submitButton.disabled = false;
          submitButton.innerHTML = originalLabel;
        }
      }
    });
  }

  function attachModalEvents(modal) {
    if (!modal || modal.dataset.supportInitialized === 'true') return;

    modal.dataset.supportInitialized = 'true';

    const hide = () => closeModal(modal);

    modal.querySelectorAll('[data-close]').forEach((el) => {
      el.addEventListener('click', hide);
    });

    const card = modal.querySelector('[data-modal-card]');
    if (card && card.dataset.supportCardBound !== 'true') {
      card.dataset.supportCardBound = 'true';
      card.addEventListener('click', (event) => event.stopPropagation());
    }

    if (!modal.dataset.supportBackdropBound) {
      modal.dataset.supportBackdropBound = 'true';
      modal.addEventListener('click', hide);
    }

    if (!escapeListenerAttached) {
      escapeListenerAttached = true;
      document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
          hide();
        }
      });
    }

    attachFormHandler(modal);
  }

  function injectModal() {
    const wrapper = document.createElement('div');
    wrapper.innerHTML = `
      <div id="support-modal" class="fixed inset-0 z-[70] hidden flex items-center justify-center">
        <div class="absolute inset-0 bg-black/60" data-close></div>
        <div class="relative z-10 w-[min(560px,92vw)] max-h-[90vh] overflow-y-auto rounded-2xl bg-white p-6 shadow-2xl border border-slate-200" data-modal-card>
          <div class="flex items-center justify-between">
            <h3 class="text-xl font-extrabold font-ubuntu text-slate-900">Contact Support</h3>
            <button class="p-2 text-slate-500 hover:text-slate-700" data-close aria-label="Close">
              <i data-lucide="x" class="h-5 w-5"></i>
            </button>
          </div>
          <p class="mt-1 text-sm text-slate-600">
            Have a question? Fill out the form below or contact us at
            <a href="tel:15056006042" class="text-brand-crimson hover:underline">1-505-600-6042</a>.
          </p>
          <form
            id="support-form"
            name="contact"
            method="POST"
            data-netlify="true"
            netlify-honeypot="bot-field"
            action="/thankyou.html"
            class="mt-4 space-y-4"
          >
            <input type="hidden" name="form-name" value="contact">
            <p class="hidden">
              <label>Don’t fill this out: <input name="bot-field"></label>
            </p>
            <div>
              <label for="support-name" class="block text-sm font-medium text-slate-700">Name</label>
              <input id="support-name" name="name" placeholder="Your name" class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-slate-900 shadow-sm focus:border-brand-crimson focus:ring-brand-crimson" required>
            </div>
            <div>
              <label for="support-email" class="block text-sm font-medium text-slate-700">Email</label>
              <input id="support-email" name="email" type="email" placeholder="Work email" class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-slate-900 shadow-sm focus:border-brand-crimson focus:ring-brand-crimson" required>
            </div>
            <div>
              <label for="support-message" class="block text-sm font-medium text-slate-700">Message</label>
              <textarea id="support-message" name="message" placeholder="Your message..." rows="4" class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-slate-900 shadow-sm focus:border-brand-crimson focus:ring-brand-crimson" required></textarea>
            </div>
            <div>
              <button class="inline-flex justify-center rounded-md border border-transparent bg-brand-crimson px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-crimson/90 focus:outline-none focus:ring-2 focus:ring-brand-crimson focus:ring-offset-2" type="submit">Send Message</button>
            </div>
            <p id="support-error" class="text-xs text-red-500 hidden" role="alert" aria-live="polite"></p>
          </form>
        </div>
      </div>
    `;
    return wrapper.firstElementChild;
  }

  function ensureModal() {
    if (cachedModal && document.body.contains(cachedModal)) {
      return cachedModal;
    }

    const existing = document.getElementById('support-modal');
    if (existing) {
      cachedModal = existing;
      attachModalEvents(cachedModal);
      if (window.lucide && lucide.createIcons) {
        try { lucide.createIcons(); } catch (error) { console.warn('Lucide render failed', error); }
      }
      return cachedModal;
    }

    const injected = injectModal();
    if (!injected) return null;
    document.body.appendChild(injected);
    cachedModal = injected;
    attachModalEvents(cachedModal);
    if (window.lucide && lucide.createIcons) {
      try { lucide.createIcons(); } catch (error) { console.warn('Lucide render failed', error); }
    }
    return cachedModal;
  }

  function openModal() {
    const modal = ensureModal();
    if (!modal) return false;
    modal.classList.remove('hidden');
    const focusTarget = modal.querySelector('input[name="name"]');
    if (focusTarget) {
      focusTarget.focus({ preventScroll: true });
    }
    return true;
  }

  const COOKIE_STORAGE_KEY = 'mhCookieConsent';

  function ensureCookieStyles() {
    if (document.getElementById('mh-cookie-styles')) return;
    const style = document.createElement('style');
    style.id = 'mh-cookie-styles';
    style.textContent = `
      .mh-cookie-btn-transition { transition: all 0.2s ease-in-out; }
      .mh-cookie-btn-transition:active { transform: scale(0.98); }
      .mh-cookie-focus-red:focus-visible {
        outline: none;
        box-shadow: 0 0 0 3px rgba(220, 20, 60, 0.45);
      }
      .mh-cookie-focus-cyan:focus-visible {
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 206, 219, 0.45);
      }
      @media (prefers-reduced-motion: reduce) {
        .mh-cookie-btn-transition { transition: none; }
        .mh-cookie-btn-transition:active { transform: none; }
      }
    `;
    document.head.appendChild(style);
  }

  function injectCookieMarkup() {
    if (document.getElementById('mh-cookie-banner') || !document.body) {
      return {
        banner: document.getElementById('mh-cookie-banner'),
        modal: document.getElementById('mh-cookie-modal')
      };
    }

    const template = document.createElement('template');
    template.innerHTML = `
      <div
        id="mh-cookie-banner"
        class="fixed bottom-4 left-4 right-4 mx-auto max-w-xl p-6 bg-slate-900/95 border border-slate-700 shadow-2xl rounded-2xl z-[60] text-center text-sm text-slate-100 backdrop-blur hidden"
        role="region"
        aria-label="Cookie consent banner"
      >
        <p class="mb-4 text-slate-200">
          We use cookies to improve your browsing experience, analyze traffic, and serve personalized content. By clicking
          <span class="font-semibold">Accept All</span>, you consent to our use of cookies. You can manage your preferences at any time.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-3">
          <button
            type="button"
            data-cookie-accept
            class="mh-cookie-btn-transition mh-cookie-focus-red w-full sm:w-auto px-4 py-2 bg-brand-crimson text-white font-semibold rounded-lg cursor-pointer hover:bg-brand-crimson/90"
          >
            Accept All
          </button>
          <button
            type="button"
            data-cookie-reject
            class="mh-cookie-btn-transition mh-cookie-focus-cyan w-full sm:w-auto px-4 py-2 bg-slate-700 text-white font-semibold rounded-lg cursor-pointer hover:bg-slate-600"
          >
            Reject Non-Essential
          </button>
          <button
            type="button"
            data-cookie-manage
            class="mh-cookie-btn-transition mh-cookie-focus-cyan w-full sm:w-auto px-4 py-2 bg-brand-teal text-slate-900 font-semibold rounded-lg cursor-pointer hover:bg-brand-teal/90"
          >
            Manage Preferences
          </button>
        </div>
      </div>
      <div
        id="mh-cookie-modal"
        class="fixed inset-0 flex items-center justify-center z-[80] bg-slate-950/80 hidden"
        role="dialog"
        aria-modal="true"
        aria-labelledby="mh-cookie-modal-title"
      >
        <div class="w-11/12 max-w-md rounded-2xl border border-slate-700 bg-slate-900 p-6 text-left text-slate-100 shadow-2xl" data-cookie-card>
          <h3 id="mh-cookie-modal-title" class="text-xl font-bold text-brand-crimson mb-4">Cookie Preferences</h3>
          <div class="space-y-4 text-sm">
            <section>
              <p class="font-semibold text-slate-100">Essential Cookies</p>
              <p class="text-xs text-slate-400 mt-1">These cookies are required for the website to function and cannot be turned off.</p>
              <label class="mt-2 flex items-center gap-2 text-xs text-slate-300">
                <input type="checkbox" checked disabled class="h-4 w-4 rounded border-slate-600 bg-slate-800 text-brand-crimson cursor-not-allowed">
                Essential (Always Active)
              </label>
            </section>
            <section>
              <p class="font-semibold text-slate-100">Analytics Cookies</p>
              <p class="text-xs text-slate-400 mt-1">Allow us to count visits and traffic sources so we can measure and improve the performance of our site.</p>
              <label class="mt-2 flex items-center gap-2 text-xs text-slate-300">
                <input type="checkbox" data-cookie-analytics class="h-4 w-4 rounded border-slate-600 bg-slate-800 text-brand-crimson">
                Enable Analytics
              </label>
            </section>
            <section>
              <p class="font-semibold text-slate-100">Advertising Cookies</p>
              <p class="text-xs text-slate-400 mt-1">May be set through our site by advertising partners to build a profile of your interests.</p>
              <label class="mt-2 flex items-center gap-2 text-xs text-slate-300">
                <input type="checkbox" data-cookie-ads class="h-4 w-4 rounded border-slate-600 bg-slate-800 text-brand-crimson">
                Enable Advertising
              </label>
            </section>
          </div>
          <div class="mt-6 text-right">
            <button
              type="button"
              data-cookie-save
              class="mh-cookie-btn-transition mh-cookie-focus-red inline-flex items-center justify-center rounded-lg bg-brand-crimson px-4 py-2 text-sm font-semibold text-white hover:bg-brand-crimson/90"
            >
              Save Preferences
            </button>
          </div>
        </div>
      </div>
    `;

    const fragment = template.content.cloneNode(true);
    document.body.appendChild(fragment);

    return {
      banner: document.getElementById('mh-cookie-banner'),
      modal: document.getElementById('mh-cookie-modal')
    };
  }

  function getStoredConsent() {
    try {
      const stored = localStorage.getItem(COOKIE_STORAGE_KEY);
      if (!stored) return null;
      const parsed = JSON.parse(stored);
      if (!parsed || typeof parsed !== 'object') return null;
      return {
        essential: true,
        analytics: Boolean(parsed.analytics),
        ads: Boolean(parsed.ads)
      };
    } catch (error) {
      console.warn('Cookie consent: unable to read stored preferences', error);
      return null;
    }
  }

  function persistConsent(consent) {
    try {
      localStorage.setItem(COOKIE_STORAGE_KEY, JSON.stringify(consent));
    } catch (error) {
      console.warn('Cookie consent: unable to persist preferences', error);
    }
  }

  function dispatchConsent(consent) {
    try {
      window.dispatchEvent(new CustomEvent('mh:cookie-consent-change', { detail: consent }));
    } catch (error) {
      console.warn('Cookie consent: event dispatch failed', error);
    }
  }

  function initCookieConsent() {
    ensureCookieStyles();
    const { banner, modal } = injectCookieMarkup();
    if (!banner || !modal || banner.dataset.cookieBound === 'true') {
      return;
    }

    banner.dataset.cookieBound = 'true';
    modal.dataset.cookieBound = 'true';

    const acceptBtn = banner.querySelector('[data-cookie-accept]');
    const rejectBtn = banner.querySelector('[data-cookie-reject]');
    const manageBtn = banner.querySelector('[data-cookie-manage]');
    const saveBtn = modal.querySelector('[data-cookie-save]');
    const analyticsCheckbox = modal.querySelector('[data-cookie-analytics]');
    const adsCheckbox = modal.querySelector('[data-cookie-ads]');

    const defaultConsent = { essential: true, analytics: false, ads: false };

    const focusFirstInput = () => {
      const target = analyticsCheckbox || adsCheckbox;
      if (target && typeof target.focus === 'function') {
        try { target.focus({ preventScroll: true }); } catch (error) { target.focus(); }
      }
    };

    const hideBanner = () => banner.classList.add('hidden');
    const showBanner = () => banner.classList.remove('hidden');
    const hideModal = () => modal.classList.add('hidden');

    const syncModal = (consent) => {
      const values = consent || getStoredConsent() || defaultConsent;
      if (analyticsCheckbox) analyticsCheckbox.checked = Boolean(values.analytics);
      if (adsCheckbox) adsCheckbox.checked = Boolean(values.ads);
    };

    const showModal = () => {
      syncModal(getStoredConsent());
      modal.classList.remove('hidden');
      focusFirstInput();
    };

    const updateApi = () => {
      window.mhCookieConsent = {
        getConsent: () => ({ ...(getStoredConsent() || defaultConsent) }),
        openPreferences: () => showModal()
      };
    };

    const commitConsent = (consent, logMessage) => {
      persistConsent(consent);
      dispatchConsent(consent);
      hideBanner();
      hideModal();
      if (logMessage) {
        try {
          console.info(`Cookie Consent: ${logMessage}`, consent);
        } catch (error) {
          /* noop */
        }
      }
      updateApi();
    };

    const storedConsent = getStoredConsent();
    if (!storedConsent) {
      showBanner();
    } else {
      dispatchConsent(storedConsent);
    }
    updateApi();

    acceptBtn?.addEventListener('click', () => {
      commitConsent({ essential: true, analytics: true, ads: true }, 'All cookies accepted.');
    });

    rejectBtn?.addEventListener('click', () => {
      commitConsent({ essential: true, analytics: false, ads: false }, 'Only essential cookies accepted.');
    });

    manageBtn?.addEventListener('click', () => {
      showModal();
    });

    saveBtn?.addEventListener('click', () => {
      const consent = {
        essential: true,
        analytics: analyticsCheckbox ? analyticsCheckbox.checked : false,
        ads: adsCheckbox ? adsCheckbox.checked : false
      };
      commitConsent(consent, 'Preferences saved.');
    });

    modal.addEventListener('click', (event) => {
      if (event.target === modal) {
        hideModal();
      }
    });

    if (!modal.dataset.cookieEscapeBound) {
      modal.dataset.cookieEscapeBound = 'true';
      document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
          hideModal();
        }
      });
    }
  }

  function bindCta(element) {
    if (!element || element.dataset.supportCtaBound === 'true') return;

    element.dataset.supportCtaBound = 'true';
    const tag = element.tagName.toLowerCase();
    if (tag === 'a' && !element.getAttribute('href')) {
      element.setAttribute('href', MAILTO_URL);
    }

    element.addEventListener('click', (event) => {
      dispatchAnalytics(element);
      const modalOpened = openModal();
      if (modalOpened) {
        event.preventDefault();
      } else if (tag !== 'a') {
        window.location.href = MAILTO_URL;
      }
    });
  }

  onReady(() => {
    document.querySelectorAll(CTA_SELECTOR).forEach(bindCta);
    const existing = document.getElementById('support-modal');
    if (existing) {
      cachedModal = existing;
      attachModalEvents(existing);
    }
    initCookieConsent();
  });
})();
