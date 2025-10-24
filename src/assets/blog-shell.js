 (cd "$(git rev-parse --show-toplevel)" && git apply --3way <<'EOF' 
diff --git a/assets/blog-shell.js b/assets/blog-shell.js
new file mode 100644
index 0000000000000000000000000000000000000000..732805e7885e7583b1261bd558092660d0702bb4
--- /dev/null
+++ b/assets/blog-shell.js
@@ -0,0 +1,253 @@
+(() => {
+  const safeCreateIcons = () => {
+    if (!window.lucide || typeof window.lucide.createIcons !== 'function') return;
+    try {
+      window.lucide.createIcons();
+    } catch (error) {
+      console.warn('Lucide refresh failed', error);
+    }
+  };
+
+  const onReady = (fn) => {
+    if (document.readyState === 'loading') {
+      document.addEventListener('DOMContentLoaded', fn, { once: true });
+    } else {
+      fn();
+    }
+  };
+
+  onReady(() => {
+    safeCreateIcons();
+
+    const yearEl = document.getElementById('year');
+    if (yearEl) {
+      yearEl.textContent = new Date().getFullYear();
+    }
+
+    const themeToggle = document.getElementById('theme-toggle');
+    const mobileThemeToggle = document.getElementById('mobile-theme-toggle');
+    const htmlElement = document.documentElement;
+
+    const applyTheme = (mode) => {
+      if (mode === 'light') {
+        htmlElement.classList.remove('dark');
+      } else {
+        htmlElement.classList.add('dark');
+      }
+      setTimeout(safeCreateIcons, 50);
+    };
+
+    const savedTheme = localStorage.getItem('theme');
+    if (savedTheme === 'light' || savedTheme === 'dark') {
+      applyTheme(savedTheme);
+    } else {
+      localStorage.setItem('theme', 'dark');
+      applyTheme('dark');
+    }
+
+    const toggleTheme = () => {
+      const nextTheme = htmlElement.classList.contains('dark') ? 'light' : 'dark';
+      localStorage.setItem('theme', nextTheme);
+      applyTheme(nextTheme);
+    };
+
+    themeToggle?.addEventListener('click', toggleTheme);
+    mobileThemeToggle?.addEventListener('click', toggleTheme);
+
+    const logoImagePath = '/public/assets/images/Shield.webp';
+    const logoSVG = (id, tagline = true, shimmer = true) => {
+      const letters = ['M', 'e', 'r', 'c', 'h', 'a', 'n', 't', 'H', 'a', 'u', 's'];
+      const letterTags = letters
+        .map((letter, index) => {
+          const delay = index * 0.1;
+          return `<tspan opacity="0" dy="-20">${letter}<animate attributeName="opacity" from="0" to="1" dur="0.2s" begin="${delay}s" fill="freeze"/><animate attributeName="dy" from="-20" to="0" dur="0.2s" begin="${delay}s" fill="freeze" calcMode="discrete"/></tspan>`;
+        })
+        .join('');
+
+      return `
+        <svg viewBox="0 0 600 100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
+          <defs>
+            <linearGradient id="shimmer-${id}" gradientUnits="userSpaceOnUse" x1="120" y1="0" x2="560" y2="0">
+              <stop offset="0%" stop-color="#DC143C" />
+              <stop offset="45%" stop-color="#DC143C">
+                ${shimmer ? `<animate attributeName="stop-color" values="#DC143C; #FFC0CB; #DC143C" keyTimes="0; 0.5; 1" dur="2s" begin="1.5s" fill="freeze" repeatCount="1"/>` : ''}
+              </stop>
+              <stop offset="50%" stop-color="#DC143C">
+                ${shimmer ? `<animate attributeName="stop-color" values="#DC143C; #FFFFFF; #DC143C" keyTimes="0; 0.5; 1" dur="2s" begin="1.5s" fill="freeze" repeatCount="1"/>` : ''}
+              </stop>
+              <stop offset="55%" stop-color="#DC143C">
+                ${shimmer ? `<animate attributeName="stop-color" values="#DC143C; #FFC0CB; #DC143C" keyTimes="0; 0.5; 1" dur="2s" begin="1.5s" fill="freeze" repeatCount="1"/>` : ''}
+              </stop>
+              <stop offset="100%" stop-color="#DC143C" />
+              ${shimmer ? `<animateTransform attributeName="transform" type="translate" from="-600 0" to="600 0" dur="2s" begin="1.5s" fill="freeze" repeatCount="1"/>` : ''}
+            </linearGradient>
+            <style>
+              .mh-text-${id} { font-family: 'Ubuntu', sans-serif; font-size: 50px; font-weight: 700; fill: url(#shimmer-${id}); }
+              .mh-tagline-${id} { font-family: 'Inter', sans-serif; font-size: 18px; font-weight: 500; fill: #A9A9A9; text-anchor: middle; letter-spacing: 4px; }
+            </style>
+          </defs>
+          <image href="${logoImagePath}" x="10" y="10" height="80" width="80" />
+          <text class="mh-text-${id}" y="60" x="110">${letterTags}</text>
+          ${tagline ? `
+            <line x1="160" x2="400" y1="72" y2="72" stroke="#00CEDB" stroke-width="2" opacity="0">
+              <animate attributeName="opacity" from="0" to="1" dur="1s" begin="1.5s" fill="freeze" />
+            </line>
+            <text x="280" y="92" class="mh-tagline-${id}" opacity="0">
+              <animate attributeName="opacity" from="0" to="1" dur="1s" begin="2s" fill="freeze" />plug. play. grow.
+            </text>
+          ` : ''}
+        </svg>`;
+    };
+
+    const headerLogo = document.querySelector('[data-mh-logo-header]');
+    const heroLogo = document.querySelector('[data-mh-logo-hero]');
+    const footerLogo = document.querySelector('[data-mh-logo-footer]');
+    if (headerLogo) headerLogo.innerHTML = logoSVG('header', false, false);
+    if (heroLogo) heroLogo.innerHTML = logoSVG('hero', true, true);
+    if (footerLogo) footerLogo.innerHTML = logoSVG('footer', true, false);
+
+    const setupCollapsibleMenu = (toggleId, menuId) => {
+      const toggle = document.getElementById(toggleId);
+      const menu = document.getElementById(menuId);
+      if (!toggle || !menu) return;
+
+      const icon = toggle.querySelector('[data-collapsible-icon]');
+
+      const openMenu = () => {
+        menu.classList.remove('hidden');
+        toggle.setAttribute('aria-expanded', 'true');
+        icon?.classList.add('rotate-180');
+      };
+
+      const closeMenu = () => {
+        menu.classList.add('hidden');
+        toggle.setAttribute('aria-expanded', 'false');
+        icon?.classList.remove('rotate-180');
+      };
+
+      toggle.addEventListener('click', (event) => {
+        event.preventDefault();
+        if (menu.classList.contains('hidden')) {
+          openMenu();
+        } else {
+          closeMenu();
+        }
+      });
+
+      document.addEventListener('click', (event) => {
+        if (!menu.classList.contains('hidden') && !menu.contains(event.target) && !toggle.contains(event.target)) {
+          closeMenu();
+        }
+      });
+
+      menu.querySelectorAll('a').forEach((link) => {
+        link.addEventListener('click', () => menu.classList.add('hidden'));
+      });
+    };
+
+    setupCollapsibleMenu('footer-integrations-toggle', 'footer-integrations-menu');
+    setupCollapsibleMenu('mobile-integrations-toggle', 'mobile-integrations-menu');
+
+    const mobileMenuButton = document.getElementById('mobile-menu-button');
+    const mobileMenu = document.getElementById('mobile-menu');
+    if (mobileMenuButton && mobileMenu) {
+      mobileMenuButton.addEventListener('click', (event) => {
+        event.stopPropagation();
+        mobileMenu.classList.toggle('hidden');
+      });
+
+      document.addEventListener('click', (event) => {
+        if (!mobileMenu.classList.contains('hidden') && !mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
+          mobileMenu.classList.add('hidden');
+        }
+      });
+
+      mobileMenu.querySelectorAll('a').forEach((link) => {
+        link.addEventListener('click', () => mobileMenu.classList.add('hidden'));
+      });
+    }
+
+    const backToTopButton = document.getElementById('back-to-top');
+    if (backToTopButton) {
+      window.addEventListener('scroll', () => {
+        if (window.scrollY > 300) {
+          backToTopButton.classList.remove('invisible', 'opacity-0');
+        } else {
+          backToTopButton.classList.add('invisible', 'opacity-0');
+        }
+      });
+
+      backToTopButton.addEventListener('click', () => {
+        window.scrollTo({ top: 0, behavior: 'smooth' });
+      });
+    }
+
+    const observerOptions = {
+      root: null,
+      rootMargin: '0px',
+      threshold: 0.1,
+    };
+
+    const observer = new IntersectionObserver((entries, obs) => {
+      entries.forEach((entry) => {
+        if (!entry.isIntersecting) return;
+        const { target } = entry;
+
+        if (target.hasAttribute('data-animate') && !target.hasAttribute('data-animate-pop')) {
+          target.classList.remove('initial-hidden');
+          target.classList.add('fade-up-active');
+          obs.unobserve(target);
+          return;
+        }
+
+        if (target.hasAttribute('data-animate-pop')) {
+          target.classList.remove('initial-hidden');
+          target.classList.add('pop-in-active');
+          obs.unobserve(target);
+          return;
+        }
+
+        if (target.hasAttribute('data-stagger-parent')) {
+          const staggerItems = target.querySelectorAll('.stagger-item');
+          const firstItem = staggerItems[0];
+          if (firstItem && firstItem.classList.contains('fade-up-active')) {
+            obs.unobserve(target);
+            return;
+          }
+
+          staggerItems.forEach((item, index) => {
+            item.classList.add('initial-hidden');
+            setTimeout(() => {
+              item.classList.remove('initial-hidden');
+              item.classList.add('fade-up-active');
+            }, index * 100);
+          });
+          obs.unobserve(target);
+        }
+      });
+    }, observerOptions);
+
+    const animatedElements = document.querySelectorAll('[data-animate]');
+    const popElements = document.querySelectorAll('[data-animate-pop]');
+    const staggerParents = document.querySelectorAll('[data-stagger-parent]');
+
+    const initialDelay = 1.8;
+    let delayCounter = 0;
+
+    animatedElements.forEach((element) => {
+      if (element.hasAttribute('data-animate-pop')) return;
+      element.style.animationDelay = `${initialDelay + delayCounter * 0.15}s`;
+      delayCounter += 1;
+      observer.observe(element);
+    });
+
+    popElements.forEach((element) => {
+      element.style.animationDelay = `${initialDelay + delayCounter * 0.15 + 0.5}s`;
+      observer.observe(element);
+    });
+
+    staggerParents.forEach((element) => {
+      observer.observe(element);
+    });
+  });
+})();
 
EOF
)
