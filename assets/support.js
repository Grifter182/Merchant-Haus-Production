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
  });
})();
