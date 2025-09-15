/* MerchantHaus shared client script: modal + booking submission */
(function(){
  const onReady = (fn) => document.readyState !== 'loading' ? fn() : document.addEventListener('DOMContentLoaded', fn);
  onReady(() => {
    if (window.lucide && lucide.createIcons) try { lucide.createIcons(); } catch(e) {}
    const modal = document.getElementById('book-modal');
    const out   = document.getElementById('book-out');
    const form  = document.getElementById('book-form');

    function openModal(){ if(modal) modal.classList.remove('hidden'); }
    function closeModal(){ if(modal){ modal.classList.add('hidden'); if(out) out.textContent = ''; } }

    document.addEventListener('click', (e) => {
      if (e.target.closest && e.target.closest('.js-cta')) openModal();
      if (e.target.dataset && e.target.dataset.close !== undefined) closeModal();
    });

    function getUTM() {
      try {
        const p = new URLSearchParams(location.search);
        return {
          source: p.get('utm_source') || '',
          medium: p.get('utm_medium') || '',
          campaign: p.get('utm_campaign') || '',
          term: p.get('utm_term') || '',
          content: p.get('utm_content') || '',
          ref: document.referrer || ''
        };
      } catch { return {}; }
    }

    if (form) {
      form.addEventListener('submit', async (e) => {
        e.preventDefault();
        if (form.hp && form.hp.value) return; // honeypot
        if (out) out.textContent = 'Sending…';
        try {
          const data = Object.fromEntries(new FormData(form).entries());
          data.utm = getUTM();
          const res = await fetch('/.netlify/functions/request-demo', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(data)
          });
          if (!res.ok) throw new Error('Request failed');
          if (out) out.textContent = "Thanks! Check your email for your private booking link.";
          form.reset();
        } catch (err) {
          if (out) out.textContent = "Hmm—something went wrong. Please try again or email hello@merchant.haus.";
        }
      });
    }
  });
})();
