(function () {
  const ready = (fn) => (document.readyState !== 'loading' ? fn() : document.addEventListener('DOMContentLoaded', fn));

  ready(() => {
    const overlay = document.getElementById('signup-panel-overlay');
    const panel = document.getElementById('signup-panel');
    if (!overlay || !panel) return;

    const closeButton = document.getElementById('close-signup-panel-btn');
    const triggers = document.querySelectorAll('.js-signup-cta');

    const stepNames = ['Account Details', 'Company Information', 'Finalize Account'];
    let currentStep = 0;
    let steps = [];
    let prevBtn;
    let nextBtn;
    let submitBtn;
    let progressBar;
    let currentStepText;
    let stepNameEl;
    let formInitialized = false;

    const setStep = (index) => {
      if (!steps.length) return;
      currentStep = Math.max(0, Math.min(index, steps.length - 1));
      steps.forEach((step, idx) => {
        step.classList.toggle('hidden', idx !== currentStep);
      });
      if (progressBar) {
        const width = ((currentStep + 1) / steps.length) * 100;
        progressBar.style.width = `${width}%`;
      }
      if (currentStepText) currentStepText.textContent = currentStep + 1;
      if (stepNameEl) stepNameEl.textContent = stepNames[currentStep] || '';
      if (prevBtn) prevBtn.classList.toggle('invisible', currentStep === 0);
      if (nextBtn) nextBtn.classList.toggle('hidden', currentStep === steps.length - 1);
      if (submitBtn) submitBtn.classList.toggle('hidden', currentStep !== steps.length - 1);
    };

    const ensureForm = () => {
      const form = document.getElementById('signup-form');
      if (!form) return;

      // Add Netlify Forms attributes
      if (!form.hasAttribute('name')) {
        form.setAttribute('name', 'signup');
        form.setAttribute('method', 'POST');
        form.setAttribute('data-netlify', 'true');
        form.setAttribute('netlify-honeypot', 'bot-field');
        form.setAttribute('action', '/thankyou.html');
      }

      if (!formInitialized) {
        form.innerHTML = `
      <input type="hidden" name="form-name" value="signup">
      <p class="hidden">
        <label>Don't fill this out if you're human: <input name="bot-field"></label>
      </p>
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

        steps = Array.from(form.querySelectorAll('.form-step'));
        prevBtn = document.getElementById('prev-btn');
        nextBtn = document.getElementById('next-btn');
        submitBtn = document.getElementById('submit-btn');
        progressBar = document.getElementById('progress-bar');
        currentStepText = document.getElementById('current-step-text');
        stepNameEl = document.getElementById('step-name');

        const goNext = (event) => {
          event.preventDefault();
          if (currentStep < steps.length - 1) setStep(currentStep + 1);
        };

        const goPrev = (event) => {
          event.preventDefault();
          if (currentStep > 0) setStep(currentStep - 1);
        };

        nextBtn?.addEventListener('click', goNext);
        prevBtn?.addEventListener('click', goPrev);

        // Add form submission handling
        form.addEventListener('submit', async (event) => {
          event.preventDefault();
          
          const formData = new FormData(form);
          const data = Object.fromEntries(formData.entries());
          
          // Get message div for status updates
          const messageDiv = document.getElementById('form-message');
          if (messageDiv) {
            messageDiv.textContent = 'Submitting...';
            messageDiv.className = 'mt-4 text-center text-sm text-slate-600';
          }
          
          try {
            // Try Netlify Function first
            try {
              const functionRes = await fetch('/.netlify/functions/submit-signup', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(data)
              });
              
              if (functionRes.ok) {
                if (messageDiv) {
                  messageDiv.textContent = 'Thanks for signing up! Our team will review and reach out with next steps.';
                  messageDiv.className = 'mt-4 text-center text-sm text-green-600';
                }
                setTimeout(() => closePanel(), 2000);
                return;
              }
              throw new Error('Function failed');
            } catch (functionError) {
              console.warn('Netlify Function failed, falling back to Netlify Forms:', functionError);
              
              // Fallback to Netlify Forms
              const netlifyRes = await fetch('/', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams(formData).toString()
              });
              
              if (!netlifyRes.ok) throw new Error('Netlify Forms submission failed');
              
              // Redirect to thank you page for Netlify Forms
              window.location.href = '/thankyou.html';
              return;
            }
          } catch (error) {
            console.error('Form submission error:', error);
            if (messageDiv) {
              messageDiv.textContent = 'Something went wrong. Please try again.';
              messageDiv.className = 'mt-4 text-center text-sm text-red-600';
            }
          }
        });

        formInitialized = true;
      }

      setStep(0);
    };

    const openPanel = () => {
      ensureForm();
      overlay.classList.remove('invisible', 'opacity-0');
      panel.classList.remove('translate-x-full');
    };

    const closePanel = () => {
      panel.classList.add('translate-x-full');
      setTimeout(() => {
        overlay.classList.add('invisible', 'opacity-0');
      }, 300);
    };

    triggers.forEach((trigger) => {
      trigger.addEventListener('click', (event) => {
        event.preventDefault();
        openPanel();
      });
    });

    closeButton?.addEventListener('click', (event) => {
      event.preventDefault();
      closePanel();
    });

    overlay.addEventListener('click', (event) => {
      if (event.target === overlay) closePanel();
    });

    document.addEventListener('keydown', (event) => {
      if (event.key === 'Escape' && !overlay.classList.contains('invisible')) {
        closePanel();
      }
    });
  });
})();
