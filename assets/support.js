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

    modal.addEventListener('click', (event) => {
      if (event.target && event.target.dataset && event.target.dataset.close !== undefined) {
        hide();
      }
    });

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
      <div id="support-modal" class="fixed inset-0 z-[70] hidden">
        <div class="absolute inset-0 bg-black/60" data-close></div>
        <div class="mx-auto mt-[10vh] w-[min(560px,92vw)] rounded-2xl bg-white dark:bg-slate-900 p-6 border border-slate-200 dark:border-slate-800 shadow-2xl">
          <div class="flex items-center justify-between">
            <h3 class="text-xl font-extrabold font-ubuntu">Contact Support</h3>
            <button class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800" data-close aria-label="Close">
              <i data-lucide="x" class="h-5 w-5"></i>
            </button>
          </div>
          <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">
            Have a question? Fill out the form below or contact us at
            <a href="tel:15056006042" class="text-brand-crimson dark:text-brand-teal hover:underline">1-505-600-6042</a>.
          </p>
          <form
            id="support-form"
            name="contact"
            method="POST"
            data-netlify="true"
            netlify-honeypot="bot-field"
            class="mt-4 grid gap-3"
          >
            <input type="hidden" name="form-name" value="contact">
            <p class="hidden">
              <label>Don’t fill this out: <input name="bot-field"></label>
            </p>
            <input name="name" placeholder="Your name" class="field rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-950 px-3 py-2" required>
            <input name="email" type="email" placeholder="Work email" class="field rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-950 px-3 py-2" required>
            <textarea name="message" placeholder="Your message..." rows="4" class="field rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-950 px-3 py-2" required></textarea>
            <button class="rounded-lg bg-brand-crimson text-white font-semibold px-4 py-2 hover:bg-brand-crimson" type="submit">Send Message</button>
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
