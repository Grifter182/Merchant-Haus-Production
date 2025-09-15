<?php
    $pageTitle = 'MerchantHaus – Shopify Payment Processing';
    $pageDescription = 'Seamless Shopify integration with MerchantHaus payments.';
    require_once __DIR__ . '/bootstrap.php';
    Renderer::header($pageTitle, $pageDescription);
?>

<main class="min-h-screen flex flex-col items-center justify-start">
        <!-- Cell 1: Hero and Benefits -->
        <section class="relative overflow-hidden w-full">
            <!-- AURORA BG -->
            <div class="mh-aurora pointer-events-none" aria-hidden="true">
                <canvas id="mh-stars" class="absolute inset-0 w-full h-full"></canvas>
                <div class="mh-aurora__glow"></div>
            </div>

            <!-- Hero Content -->
            <div class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                 <!-- Hero Section -->
                <section class="text-center pt-16 md:pt-24 pb-20">
                     <div class="grid md:grid-cols-2 items-center gap-8 mb-8">
                         <div class="flex justify-center md:justify-end">
                            <svg width="500" height="100" viewBox="0 0 500 100" xmlns="http://www.w3.org/2000/svg">
                               <image href="Shield.png" x="10" y="10" height="80" width="80" />
                               <g fill="#DC143C" class="dark:fill-white" style="font-family: 'Ubuntu', sans-serif; font-size: 50px; font-weight: 600;">
                                  <text y="60" x="120">MerchantHaus</text>
                               </g>
                            </svg>
                         </div>
                         <div class="flex justify-center md:justify-start">
                            <img src="shopifylight.png" alt="Shopify Logo" class="h-16 rounded-lg block dark:hidden">
                            <img src="shopifydark.png" alt="Shopify Logo" class="h-16 rounded-lg hidden dark:block">
                         </div>
                    </div>

                    <h1 class="text-4xl md:text-5xl font-extrabold font-ubuntu mb-4 flex items-center justify-center flex-wrap gap-x-3">
                        <span>Seamless</span>
                        <div class="scrolling-words-container">
                            <ul class="scrolling-words-box text-brand-teal">
                                <li>Payments</li>
                                <li>Integration</li>
                                <li>Processing</li>
                                <li>Security</li>
                                <li>Payments</li> <!-- Loop back to start -->
                            </ul>
                        </div>
                        <span>for Shopify</span>
                    </h1>
                    <p class="text-lg text-slate-600 dark:text-slate-300 max-w-3xl mx-auto">
                         Integrate MerchantHaus directly with your Shopify store to lower your processing costs, reduce fraud, and simplify your operations. Get the no-code, fast, secure, and affordable payment solution your business deserves.
                    </p>
                    <div class="mt-8">
                        <a href="#application-form" class="js-cta bg-brand-crimson hover:bg-opacity-90 text-white border border-transparent px-8 py-3 rounded-full text-lg font-semibold transition-colors duration-300 scroll-link">Get Started Today</a>
                    </div>
                </section>

                <!-- Benefits Section -->
                <section id="benefits" class="pb-28 text-left">
                    <div class="grid md:grid-cols-3 gap-12">
                         <div class="flex items-start gap-4 p-6 rounded-lg card-hover-effect bg-white/5 dark:bg-black/10 backdrop-blur-sm">
                             <i data-lucide="trending-down" class="w-12 h-12 text-brand-teal flex-shrink-0 mt-1"></i>
                             <div>
                                <h3 class="text-xl font-bold font-ubuntu">Lower Your Costs</h3>
                                <p class="text-slate-600 dark:text-slate-400 mt-2">Keep more of your revenue with our competitive, transparent pricing. We help you reduce transaction fees without sacrificing performance.</p>
                             </div>
                         </div>
                         <div class="flex items-start gap-4 p-6 rounded-lg card-hover-effect bg-white/5 dark:bg-black/10 backdrop-blur-sm">
                             <i data-lucide="shield-check" class="w-12 h-12 text-brand-teal flex-shrink-0 mt-1"></i>
                             <div>
                                <h3 class="text-xl font-bold font-ubuntu">Reduce Fraud & Chargebacks</h3>
                                <p class="text-slate-600 dark:text-slate-400 mt-2">Our advanced security tools, including AVS, CVV checks, and 3D Secure, protect your business from fraudulent transactions and costly chargebacks.</p>
                             </div>
                         </div>
                         <div class="flex items-start gap-4 p-6 rounded-lg card-hover-effect bg-white/5 dark:bg-black/10 backdrop-blur-sm">
                             <i data-lucide="zap" class="w-12 h-12 text-brand-teal flex-shrink-0 mt-1"></i>
                             <div>
                                <h3 class="text-xl font-bold font-ubuntu">Streamline Operations</h3>
                                <p class="text-slate-600 dark:text-slate-400 mt-2">Manage all your payments, view real-time reports, and handle disputes from a single, easy-to-use dashboard. Simple, smart, and secure.</p>
                             </div>
                         </div>
                    </div>
                </section>
            </div>
        </section>


        <!-- Cell 2: How It Works, CTA, NMI -->
        <div class="relative w-full max-w-6xl rounded-xl shadow-lg -mt-16 z-10 mb-16 overflow-hidden border border-slate-200/70 dark:border-slate-800"
             style="background-image: url('banner1.png'); background-size: cover; background-position: center;">
            <div class="bg-brand-light/80 dark:bg-brand-dark/80 backdrop-blur-sm p-6 sm:p-8">
                <!-- How It Works Section -->
                <section id="how-it-works" class="pt-10 text-center">
                     <h2 class="text-3xl font-extrabold font-ubuntu mb-4">Simple Setup in 3 Steps</h2>
                     <p class="text-slate-600 dark:text-slate-300 max-w-2xl mx-auto mb-12">Get up and running with MerchantHaus on your Shopify store in minutes.</p>
                     <div class="grid md:grid-cols-3 gap-8">
                         <div class="p-6 rounded-lg bg-white/50 dark:bg-black/20 card-hover-effect text-left">
                             <div id="step-1-number" class="w-12 h-12 bg-brand-crimson text-white rounded-full flex items-center justify-center font-bold text-xl mx-auto mb-4 animate-on-scroll">1</div>
                             <h3 class="text-lg font-bold text-center">Apply for an Account</h3>
                             <p id="step-1-text" class="text-slate-600 dark:text-slate-400 mt-2 text-sm min-h-[100px]"></p>
                         </div>
                         <div class="p-6 rounded-lg bg-white/50 dark:bg-black/20 card-hover-effect text-left">
                             <div id="step-2-number" class="w-12 h-12 bg-brand-teal text-white rounded-full flex items-center justify-center font-bold text-xl mx-auto mb-4 animate-on-scroll">2</div>
                             <h3 class="text-lg font-bold text-center">Connect to Shopify</h3>
                             <p id="step-2-text" class="text-slate-600 dark:text-slate-400 mt-2 text-sm min-h-[100px]"></p>
                         </div>
                         <div class="p-6 rounded-lg bg-white/50 dark:bg-black/20 card-hover-effect text-left">
                             <div id="step-3-number" class="w-12 h-12 bg-brand-silver text-white rounded-full flex items-center justify-center font-bold text-xl mx-auto mb-4 animate-on-scroll">3</div>
                             <h3 class="text-lg font-bold text-center">Start Processing</h3>
                             <p id="step-3-text" class="text-slate-600 dark:text-slate-400 mt-2 text-sm min-h-[100px]"></p>
                         </div>
                     </div>
                </section>

                 <!-- Final CTA -->
                <section id="application-form" class="mt-20 text-center bg-brand-crimson/10 dark:bg-brand-teal/10 p-8 rounded-xl">
                     <h2 class="text-3xl font-extrabold font-ubuntu mb-4">Why Wait? Start Processing Today</h2>
                     <p class="text-slate-600 dark:text-slate-300 max-w-3xl mx-auto mb-8">
                         Make the smart move and join hundreds of Shopify merchants who use MerchantHaus, powered by the might of the NMI Gateway, for their payment processing needs.
                     </p>
                     <a href="#application-form" class="js-cta bg-brand-crimson hover:bg-opacity-90 text-white border border-transparent px-8 py-3 rounded-full text-lg font-semibold transition-colors duration-300 scroll-link">Apply Now</a>
                </section>

                 <!-- Powered By NMI -->
                <section class="mt-16 text-center">
                     <p class="text-gray-500 text-sm font-medium mb-2 tracking-wider">POWERED BY</p>
                     <a href="https://www.nmi.com/" target="_blank" rel="noopener noreferrer">
                        <img src="nmi.png" alt="NMI Logo" class="h-10 mx-auto">
                     </a>
                </section>
            </div>
        </div>
    </main>

    <!-- Footer -->
    

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.lucide) lucide.createIcons();
            document.getElementById('year').textContent = new Date().getFullYear();

            // Smooth scrolling for anchor links
            document.querySelectorAll('a.scroll-link').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        const mobileMenu = document.getElementById('mobile-menu');
                        if(mobileMenu && !mobileMenu.classList.contains('hidden')) {
                            mobileMenu.classList.add('hidden');
                        }
                        targetElement.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Back to Top button logic
            const backToTopButton = document.getElementById('back-to-top');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    backToTopButton.classList.remove('hidden');
                } else {
                    backToTopButton.classList.add('hidden');
                }
            });
            backToTopButton.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
            
            // --- Mobile Menu Logic ---
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', (e) => {
                    e.stopPropagation();
                    mobileMenu.classList.toggle('hidden');
                });

                document.addEventListener('click', (e) => {
                    if (!mobileMenu.classList.contains('hidden') && !mobileMenu.contains(e.target) && !mobileMenuButton.contains(e.target)) {
                        mobileMenu.classList.add('hidden');
                    }
                });
            }
            
            // --- Stars Canvas Logic ---
            const canvas = document.getElementById('mh-stars');
            if (canvas) {
                const ctx = canvas.getContext('2d');
                let stars;
                let animationFrameId;

                const setupStars = () => {
                    const parent = canvas.parentElement;
                    canvas.width = parent.offsetWidth;
                    canvas.height = parent.offsetHeight;
                    stars = [];
                    const numStars = Math.floor((canvas.width * canvas.height) / 10000);
                    for (let i = 0; i < numStars; i++) {
                        stars.push({
                            x: Math.random() * canvas.width,
                            y: Math.random() * canvas.height,
                            radius: Math.random() * 1.2 + 0.3,
                            alpha: Math.random(),
                            dAlpha: Math.random() * 0.02 - 0.01
                        });
                    }
                };

                const drawStars = () => {
                    if(!ctx) return;
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    stars.forEach(star => {
                        ctx.beginPath();
                        ctx.arc(star.x, star.y, star.radius, 0, Math.PI * 2);
                        ctx.fillStyle = `rgba(255, 255, 255, ${star.alpha})`;
                        ctx.fill();

                        star.alpha += star.dAlpha;
                        if (star.alpha <= 0.1 || star.alpha >= 1) {
                            star.dAlpha *= -1;
                        }
                    });
                    animationFrameId = requestAnimationFrame(drawStars);
                };
                
                let resizeTimeout;
                const initCanvas = () => {
                    if (animationFrameId) {
                        cancelAnimationFrame(animationFrameId);
                    }
                    clearTimeout(resizeTimeout);
                    resizeTimeout = setTimeout(() => {
                       setupStars();
                       drawStars();
                    }, 250);
                };

                initCanvas();
                window.addEventListener('resize', initCanvas);
            }


            // Sequential Typewriter Animation
            const steps = [
                { number: 'step-1-number', textEl: 'step-1-text', text: "Fill out our simple application form. Our team will review your details and get you approved quickly." },
                { number: 'step-2-number', textEl: 'step-2-text', text: "Once approved, we'll provide you with API keys to easily connect MerchantHaus as your payment provider in your Shopify admin." },
                { number: 'step-3-number', textEl: 'step-3-text', text: "That's it! You're ready to accept payments securely and affordably, with all your transaction data synced to your MerchantHaus dashboard." }
            ];

            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.4 
            };
            
            let animationQueue = Promise.resolve();

            const typewriter = (element, text, duration) => {
                return new Promise(resolve => {
                    let i = 0;
                    element.innerHTML = '<span class="typewriter-text"></span>';
                    const span = element.querySelector('.typewriter-text');
                    element.style.opacity = '1';
                    
                    function type() {
                        if (i < text.length) {
                            span.innerHTML += text.charAt(i);
                            i++;
                            setTimeout(type, duration / text.length);
                        } else {
                           span.style.borderRight = 'none'; // Remove cursor at the end
                           resolve();
                        }
                    }
                    type();
                });
            };

            const animateStep = (entry, observer) => {
                if (entry.isIntersecting) {
                    const stepIndex = steps.findIndex(s => s.number === entry.target.id);
                    if (stepIndex !== -1 && !entry.target.dataset.animated) {
                        entry.target.dataset.animated = true; // Mark as animated
                        
                        animationQueue = animationQueue.then(() => {
                           entry.target.classList.add('fade-in');
                           const step = steps[stepIndex];
                           const textElement = document.getElementById(step.textEl);
                           return typewriter(textElement, step.text, 4000);
                        });
                        
                        observer.unobserve(entry.target);
                    }
                }
            };
            
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => animateStep(entry, observer));
            }, observerOptions);

            steps.forEach(step => {
                const el = document.getElementById(step.number);
                if (el) observer.observe(el);
            });
        });
    </script>

<?php Renderer::footer(); ?>



