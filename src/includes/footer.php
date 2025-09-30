    <!-- Footer -->
    <footer class="border-t border-slate-800 py-10 mt-16">
        <div class="max-w-7xl mx-auto px-4 grid sm:grid-cols-2 lg:grid-cols-4 gap-8 text-sm" >
            <div class="space-y-4">
                <a href="/index.html" class="flex items-center gap-3">
                    <div class="w-[220px]" data-mh-logo-footer></div>
                     <span class="sr-only">MerchantHaus Homepage</span>
                </a>
                <div class="text-sm">
                    <a href="tel:15056006042" class="block text-slate-300 hover:text-brand-teal">1-505-600-6042</a>
                    <a href="mailto:support@merchanthaus.io" class="block text-slate-300 hover:text-brand-teal">support@merchanthaus.io</a>
                </div>
            </div>
            <nav class="space-y-2">
                <h3 class="font-semibold font-ubuntu text-white">Product</h3>
                <a href="/#payments" class="block text-slate-300 hover:text-brand-teal">Payment Services</a>
                <a href="/#integrations" class="block text-slate-300 hover:text-brand-teal">Integrations</a>
                <a href="/shopify.html" class="block text-slate-300 hover:text-brand-teal">Shopify Integration</a>
                <a href="/gohighlevel.html" class="block text-slate-300 hover:text-brand-teal">GoHighLevel Integration</a>
                <a href="/#checklist" class="block text-slate-300 hover:text-brand-teal">Setup Checklist</a>
            </nav>
            <nav class="space-y-2">
                <h3 class="font-semibold font-ubuntu text-white">Support</h3>
                <a
                    href="mailto:support@merchanthaus.io"
                    class="js-support block text-slate-300 hover:text-brand-teal"
                    data-cta="contact-support"
                    data-cta-location="footer"
                >Contact Support</a>
                <a href="/faq.html" class="block text-slate-300 hover:text-brand-teal">FAQ</a>
            </nav>
            <nav class="space-y-2">
                <h3 class="font-semibold font-ubuntu text-white">Legal</h3>
                <a href="/privacy.html" class="block text-slate-300 hover:text-brand-teal">Privacy Policy</a>
                <a href="/terms.html" class="block text-slate-300 hover:text-brand-teal">Terms & Conditions</a>
            </nav>
        </div>
        <div class="text-center text-xs pt-8 mt-8 border-t border-slate-800 text-slate-500 font-inter">
            © <span id="year"></span> Merchant Haus. All rights reserved.
        </div>
    </footer>
    
    <!-- Back to Top Button -->
    <button id="back-to-top" class="fixed bottom-6 right-6 bg-brand-crimson text-white p-3 rounded-full shadow-lg opacity-0 invisible transition-all duration-300 z-50 hover:bg-opacity-90">
        <i data-lucide="arrow-up" class="h-6 w-6"></i>
        <span class="sr-only">Back to top</span>
    </button>


    <script src="/assets/support.js" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.lucide) lucide.createIcons();
            document.getElementById('year').textContent = new Date().getFullYear();

            // --- Animated Logo Injection ---
            const logoSVG = (id, tagline = true, shimmer = true) => {
                const letters = ['M','e','r','c','h','a','n','t','H','a','u','s'];
                let letterTags = '';
                letters.forEach((letter, index) => {
                    const delay = index * 0.1;
                    letterTags += `<tspan opacity="0" dy="-20">${letter}<animate attributeName="opacity" from="0" to="1" dur="0.2s" begin="${delay}s" fill="freeze"/><animate attributeName="dy" from="-20" to="0" dur="0.2s" begin="${delay}s" fill="freeze" calcMode="discrete"/></tspan>`;
                });

                return `
                <svg viewBox="0 0 450 100" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <defs>
                        <linearGradient id="shimmer-${id}" gradientUnits="userSpaceOnUse" x1="120" y1="0" x2="420" y2="0">
                            <stop offset="0%" stop-color="#DC143C" />
                            <stop offset="45%" stop-color="#DC143C">
                                ${shimmer ? `<animate attributeName="stop-color" values="#DC143C; #FFC0CB; #DC143C" keyTimes="0; 0.5; 1" dur="2s" begin="1.5s" fill="freeze" repeatCount="1"/>` : ''}
                            </stop>
                            <stop offset="50%" stop-color="#DC143C">
                                ${shimmer ? `<animate attributeName="stop-color" values="#DC143C; #FFFFFF; #DC143C" keyTimes="0; 0.5; 1" dur="2s" begin="1.5s" fill="freeze" repeatCount="1"/>` : ''}
                            </stop>
                            <stop offset="55%" stop-color="#DC143C">
                                ${shimmer ? `<animate attributeName="stop-color" values="#DC143C; #FFC0CB; #DC143C" keyTimes="0; 0.5; 1" dur="2s" begin="1.5s" fill="freeze" repeatCount="1"/>` : ''}
                            </stop>
                            <stop offset="100%" stop-color="#DC143C" />
                            ${shimmer ? `<animateTransform attributeName="transform" type="translate" from="-450 0" to="450 0" dur="2s" begin="1.5s" fill="freeze" repeatCount="1"/>` : ''}
                        </linearGradient>
                        <style>
                            .mh-text-${id} { font-family: 'Ubuntu', sans-serif; font-size: 50px; font-weight: 700; fill: url(#shimmer-${id}); }
                            .mh-tagline-${id} { font-family: 'Inter', sans-serif; font-size: 18px; font-weight: 500; fill: #A9A9A9; text-anchor: middle; letter-spacing: 4px; }
                        </style>
                    </defs>
                    <image href="/public/assets/images/Shield.png" x="12" y="6" height="76" width="76" />
                    <text class="mh-text-${id}" y="60" x="110">${letterTags}</text>
                    ${tagline ? `
                        <line x1="160" x2="400" y1="72" y2="72" stroke="#00CEDB" stroke-width="2" opacity="0">
                            <animate attributeName="opacity" from="0" to="1" dur="1s" begin="1.5s" fill="freeze" />
                        </line>
                        <text x="280" y="92" class="mh-tagline-${id}" opacity="0">
                            <animate attributeName="opacity" from="0" to="1" dur="1s" begin="2s" fill="freeze" />plug. play. grow.
                        </text>
                    ` : ''}
                </svg>`;
            };
            
            // Only select and inject logos if the placeholder exists on the current page
            if (document.querySelector('[data-mh-logo-header]')) {
                document.querySelector('[data-mh-logo-header]').innerHTML = logoSVG('header', false, false);
            }
            if (document.querySelector('[data-mh-logo-hero]')) {
                document.querySelector('[data-mh-logo-hero]').innerHTML = logoSVG('hero', true, true);
            }
            if (document.querySelector('[data-mh-logo-footer]')) {
                 document.querySelector('[data-mh-logo-footer]').innerHTML = logoSVG('footer', true, false);
            }


            // --- Mobile Menu ---
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            if(mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', (e) => {
                    e.stopPropagation();
                    mobileMenu.classList.toggle('hidden');
                });
                document.addEventListener('click', (e) => {
                    if (!mobileMenu.classList.contains('hidden') && !mobileMenu.contains(e.target) && !mobileMenuButton.contains(e.target)) {
                        mobileMenu.classList.add('hidden');
                    }
                });
                mobileMenu.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', () => mobileMenu.classList.add('hidden'));
                });
            }

            // --- Stars Canvas Logic (if canvas exists) ---
            const canvas = document.getElementById('mh-stars');
            if (canvas) {
                const ctx = canvas.getContext('2d');
                let stars;
                let animationFrameId;
                const starColors = [
                    'rgba(255, 255, 255,', 'rgba(230, 230, 250,',
                    'rgba(255, 250, 205,', 'rgba(240, 255, 255,'
                ];

                const setupStars = () => {
                    const parent = canvas.parentElement;
                    canvas.width = parent.offsetWidth;
                    canvas.height = parent.offsetHeight;
                    stars = [];
                    const numStars = Math.floor((canvas.width * canvas.height) / 8000);
                    for (let i = 0; i < numStars; i++) {
                        stars.push({
                            x: Math.random() * canvas.width,
                            y: Math.random() * canvas.height,
                            radius: Math.random() * 1.2 + 0.3,
                            alpha: Math.random(),
                            dAlpha: Math.random() * 0.02 - 0.01,
                            color: starColors[Math.floor(Math.random() * starColors.length)],
                            vx: (Math.random() - 0.5) * 0.1,
                            vy: (Math.random() - 0.5) * 0.1
                        });
                    }
                };

                const drawStars = () => {
                    if(!ctx) return;
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    stars.forEach(star => {
                        star.x += star.vx;
                        star.y += star.vy;
                        if (star.x < 0) star.x = canvas.width;
                        if (star.x > canvas.width) star.x = 0;
                        if (star.y < 0) star.y = canvas.height;
                        if (star.y > canvas.height) star.y = 0;

                        star.alpha += star.dAlpha;
                        if (star.alpha <= 0.1 || star.alpha >= 1) { star.dAlpha *= -1; }
                        
                        ctx.beginPath();
                        ctx.arc(star.x, star.y, star.radius, 0, Math.PI * 2);
                        ctx.fillStyle = star.color + star.alpha + ')';
                        ctx.fill();
                    });
                    animationFrameId = requestAnimationFrame(drawStars);
                };
                
                let resizeTimeout;
                const initCanvas = () => {
                    cancelAnimationFrame(animationFrameId);
                    clearTimeout(resizeTimeout);
                    resizeTimeout = setTimeout(() => {
                        setupStars();
                        drawStars();
                    }, 100);
                };

                initCanvas();
                window.addEventListener('resize', initCanvas);
            }

            // --- Sequential Typewriter Animation on Scroll (if steps exist) ---
            const steps = [
                { id: 'step-1', text: "Fill out our simple application form. Our team will review your details and get you approved quickly." },
                { id: 'step-2', text: "Once approved, we'll provide you with API keys to easily connect MerchantHaus as your payment provider in your Shopify admin." },
                { id: 'step-3', text: "That's it! You're ready to accept payments securely and affordably, with all your transaction data synced to your MerchantHaus dashboard." }
            ];
            
            const stepElements = document.querySelectorAll('.step-card');

            if(stepElements.length > 0) {
                let animationQueue = Promise.resolve();
                let animatedSteps = new Set();

                const typewriter = (element, text, duration) => {
                    return new Promise(resolve => {
                        let i = 0;
                        element.innerHTML = '<span class="typewriter-text"></span>';
                        const span = element.querySelector('.typewriter-text');
                        
                        function type() {
                            if (i < text.length) {
                                span.textContent += text.charAt(i);
                                i++;
                                setTimeout(type, duration / text.length);
                            } else {
                            if (span) span.style.borderRight = 'none';
                            resolve();
                            }
                        }
                        type();
                    });
                };

                const animateStep = (entry) => {
                    if (entry.isIntersecting && !animatedSteps.has(entry.target.id)) {
                        const stepConf = steps.find(s => s.id === entry.target.id);
                        if (stepConf) {
                            animatedSteps.add(stepConf.id);
                            const pElement = entry.target.querySelector('p');
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                            animationQueue = animationQueue.then(() => typewriter(pElement, stepConf.text, 2000));
                        }
                    }
                };
                
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(animateStep);
                }, { threshold: 0.8 });

                steps.forEach(step => {
                    const el = document.getElementById(step.id);
                    if (el) observer.observe(el);
                });
            }

            // --- Back to Top Button ---
            const backToTopButton = document.getElementById('back-to-top');
            if(backToTopButton) {
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 300) {
                        backToTopButton.classList.remove('invisible', 'opacity-0');
                    } else {
                        backToTopButton.classList.add('invisible', 'opacity-0');
                    }
                });
                backToTopButton.addEventListener('click', () => {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            }
        });
    </script>
</body>
</html>
