<?php
    $pageTitle = 'MerchantHaus × GoHighLevel — Retail Payments';
    $pageDescription = 'Accept payments in GoHighLevel with MerchantHaus.';
    include __DIR__ . '/../Header.php';
?>

<style>
    .mh-aurora {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .mh-aurora__glow {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 200%;
        padding-bottom: 200%;
        border-radius: 50%;
        background-image: radial-gradient(circle, rgba(0, 206, 219, 0.15), transparent 45%),
                          radial-gradient(circle, rgba(220, 20, 60, 0.15), transparent 45%);
        transform: translate(-50%, -50%);
        animation: aurora-glow 20s linear infinite;
        will-change: transform;
    }

    .dark .mh-aurora__glow {
        background-image: radial-gradient(circle, rgba(0, 206, 219, 0.2), transparent 45%),
                          radial-gradient(circle, rgba(220, 20, 60, 0.2), transparent 45%);
    }

    @keyframes aurora-glow {
        0% {
            transform: translate(-50%, -50%) rotate(0deg);
        }
        100% {
            transform: translate(-50%, -50%) rotate(360deg);
        }
    }

    .ghl-hero {
        color: #e2e8f0;
        background: linear-gradient(135deg, #0f172a 0%, #1f2937 40%, #172135 100%);
    }

    .ghl-hero__link {
        color: rgba(226, 232, 240, 0.85);
        text-decoration: none;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: color 0.2s ease;
    }

    .ghl-hero__link:hover {
        color: #ffffff;
    }

    .ghl-hero__nav {
        display: flex;
        gap: 1.5rem;
        align-items: center;
    }

    .ghl-hero__nav a {
        color: rgba(226, 232, 240, 0.85);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s ease;
    }

    .ghl-hero__nav a:hover {
        color: #ffffff;
    }

    .ghl-hero__secondary {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.2rem;
        border-radius: 9999px;
        border: 1px solid rgba(226, 232, 240, 0.3);
        color: rgba(226, 232, 240, 0.88);
        text-decoration: none;
        font-weight: 500;
        transition: border-color 0.2s ease, color 0.2s ease, background 0.2s ease;
    }

    .ghl-hero__secondary:hover {
        border-color: rgba(255, 255, 255, 0.55);
        color: #ffffff;
        background: rgba(148, 163, 184, 0.18);
    }

    .ghl-highlight {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.4rem 0.9rem;
        border-radius: 9999px;
        border: 1px solid rgba(226, 232, 240, 0.35);
        background: rgba(15, 23, 42, 0.55);
        font-size: 0.75rem;
        letter-spacing: 0.22em;
        text-transform: uppercase;
        color: rgba(226, 232, 240, 0.85);
    }

    .dark .ghl-highlight {
        background: rgba(30, 41, 59, 0.65);
        border-color: rgba(148, 163, 184, 0.45);
    }

    .ghl-feature-tile {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem 1.2rem;
        border-radius: 1.25rem;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.15);
        box-shadow: 0 12px 32px rgba(15, 23, 42, 0.25);
        color: rgba(226, 232, 240, 0.9);
        font-weight: 500;
    }

    .dark .ghl-feature-tile {
        background: rgba(15, 23, 42, 0.7);
        border-color: rgba(51, 65, 85, 0.6);
    }

    .ghl-feature-tile i {
        color: #00cedb;
    }

    .ghl-card {
        position: relative;
        overflow: hidden;
        border-radius: 1.5rem;
        border: 1px solid rgba(255, 255, 255, 0.18);
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.92), rgba(30, 41, 59, 0.75));
        backdrop-filter: blur(24px);
        box-shadow: 0 25px 60px rgba(15, 23, 42, 0.4);
        color: rgba(226, 232, 240, 0.9);
    }

    .dark .ghl-card {
        border-color: rgba(51, 65, 85, 0.7);
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.88), rgba(15, 23, 42, 0.65));
    }

    .ghl-card::before,
    .ghl-card::after {
        content: '';
        position: absolute;
        border-radius: 9999px;
        pointer-events: none;
        opacity: 0.75;
    }

    .ghl-card::before {
        top: -45%;
        left: -20%;
        width: 60%;
        height: 60%;
        background: radial-gradient(circle, rgba(0, 206, 219, 0.45), transparent 60%);
        filter: blur(60px);
    }

    .ghl-card::after {
        bottom: -40%;
        right: -15%;
        width: 55%;
        height: 55%;
        background: radial-gradient(circle, rgba(220, 20, 60, 0.4), transparent 60%);
        filter: blur(70px);
    }

    .ghl-card > * {
        position: relative;
        z-index: 1;
    }

    .ghl-card h2,
    .ghl-card h3 {
        color: #ffffff;
    }

    .ghl-card strong {
        color: #ffffff;
    }

    .ghl-tracking {
        letter-spacing: 0.25em;
    }

    .ghl-divider {
        flex: 1;
        height: 1px;
        background: rgba(226, 232, 240, 0.3);
    }

    .ghl-section {
        background: linear-gradient(180deg, rgba(11, 18, 32, 0.98) 0%, rgba(7, 11, 22, 1) 100%);
    }

    .ghl-blob {
        position: absolute;
        border-radius: 9999px;
        filter: blur(100px);
        opacity: 0.7;
        pointer-events: none;
    }

    .ghl-blob--crimson {
        background: rgba(220, 20, 60, 0.55);
    }

    .ghl-blob--teal {
        background: rgba(0, 206, 219, 0.55);
    }
</style>

<main class="min-h-screen flex flex-col">
    <section class="ghl-hero relative overflow-hidden w-full">
        <div aria-hidden="true" class="mh-aurora pointer-events-none">
            <canvas class="absolute inset-0 w-full h-full" id="mh-stars"></canvas>
            <div class="mh-aurora__glow"></div>
        </div>
        <div class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
            <div class="flex flex-wrap items-center justify-between gap-3 text-sm">
                <a class="ghl-hero__link" href="/">
                    <i class="h-4 w-4" data-lucide="arrow-left"></i>
                    <span>Back to MerchantHaus</span>
                </a>
                <nav class="ghl-hero__nav">
                    <a href="mailto:support@merchanthaus.io">Contact Us</a>
                    <a href="/privacy">Privacy Policy</a>
                    <a href="/terms">Terms &amp; Conditions</a>
                </nav>
            </div>
            <div class="mt-12 grid items-center gap-12 md:grid-cols-2">
                <div class="space-y-8 text-center md:text-left">
                    <div class="flex flex-wrap items-center justify-center gap-x-6 gap-y-4 text-white md:justify-start">
                        <div class="flex items-center gap-3">
                            <img alt="MerchantHaus shield" class="h-14 w-14" src="<?php echo htmlspecialchars(mh_asset('public/assets/images/Shield.png')); ?>"/>
                            <span class="text-3xl font-extrabold tracking-wide font-ubuntu md:text-4xl">MerchantHaus</span>
                        </div>
                        <span class="text-2xl opacity-75">for</span>
                        <div class="flex items-center gap-3">
                            <img alt="GoHighLevel" class="h-14" src="<?php echo htmlspecialchars(mh_asset('public/assets/images/gohighleveldark.png')); ?>"/>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <span class="ghl-highlight">Funnels • SaaS • Agencies</span>
                        <h1 class="text-4xl font-extrabold leading-tight text-white font-ubuntu md:text-5xl">MerchantHaus for GoHighLevel</h1>
                        <p class="text-lg text-slate-200 md:max-w-xl md:text-left mx-auto md:mx-0">Accept payments in GHL funnels &amp; snapshots, with routing freedom, built-in vaulting, and merchant-friendly controls.</p>
                    </div>
                    <div class="flex flex-wrap items-center justify-center gap-4 md:justify-start">
                        <button class="js-cta bg-brand-crimson hover:bg-opacity-90 text-white border border-transparent px-8 py-3 rounded-full text-lg font-semibold transition-colors duration-300">Request a Demo</button>
                        <a class="ghl-hero__secondary" href="#ghl-learn-more">
                            <span>Explore capabilities</span>
                            <i class="h-4 w-4" data-lucide="arrow-down-right"></i>
                        </a>
                    </div>
                    <div class="grid gap-3 text-left sm:grid-cols-3">
                        <div class="ghl-feature-tile">
                            <i class="h-5 w-5" data-lucide="wand-2"></i>
                            <span>No-code funnel embeds</span>
                        </div>
                        <div class="ghl-feature-tile">
                            <i class="h-5 w-5" data-lucide="git-branch"></i>
                            <span>Adaptive routing logic</span>
                        </div>
                        <div class="ghl-feature-tile">
                            <i class="h-5 w-5" data-lucide="shield"></i>
                            <span>3-D Secure &amp; vaulting</span>
                        </div>
                    </div>
                </div>
                <div class="relative mx-auto w-full max-w-md md:ml-auto">
                    <div class="ghl-blob ghl-blob--crimson h-44 w-44 -top-20 -left-16"></div>
                    <div class="ghl-blob ghl-blob--teal h-52 w-52 -bottom-24 -right-12"></div>
                    <div class="ghl-card p-6 space-y-5 md:p-8">
                        <div class="space-y-3">
                            <h2 class="text-2xl font-bold">Snapshot-ready payments</h2>
                            <p class="text-sm leading-relaxed">Launch funnels with prebuilt MerchantHaus components tuned for high-volume agency workflows.</p>
                        </div>
                        <ul class="space-y-3 text-sm leading-relaxed list-disc list-inside">
                            <li>Invoices, pay links, and subscriptions baked into any step.</li>
                            <li>Multi-processor routing + fallback to keep conversion humming.</li>
                            <li>Tokenization that syncs across upsells, downsells, and customer vaults.</li>
                        </ul>
                        <div class="flex items-center gap-3 pt-2 text-xs uppercase ghl-tracking">
                            <span>Go live fast</span>
                            <span class="ghl-divider"></span>
                            <span>Scale with control</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ghl-section relative z-20 w-full -mt-10 pb-20 pt-24" id="ghl-learn-more">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-6 md:grid-cols-2">
                <article class="ghl-card p-6 space-y-4 md:p-8">
                    <h2 class="text-xl font-bold">What you get</h2>
                    <ul class="space-y-3 text-sm leading-relaxed list-disc list-inside">
                        <li>Invoices, pay links, and recurring billing embedded in funnels.</li>
                        <li>Multi‑processor routing + fallback for uptime.</li>
                        <li>Tokenization &amp; customer vault across offers.</li>
                        <li>3‑D Secure &amp; fraud heuristics for card‑not‑present.</li>
                    </ul>
                </article>
                <article class="ghl-card p-6 space-y-4 md:p-8">
                    <h2 class="text-xl font-bold">Implementation</h2>
                    <ol class="space-y-3 text-sm leading-relaxed list-decimal list-inside">
                        <li>Book a demo and share a recent processing statement.</li>
                        <li>We issue your <strong>MID + access details</strong>.</li>
                        <li>Add credentials in GHL &amp; test charges end‑to‑end.</li>
                        <li>Go live and tune fraud/routing with our team.</li>
                    </ol>
                </article>
            </div>
            <article class="ghl-card mt-6 space-y-4 p-6 md:mt-8 md:p-8">
                <h3 class="text-xl font-bold">Pricing</h3>
                <p class="text-sm leading-relaxed">Interchange++ with volume-based discounts. Effective rates depend on card mix and ticket size. Get a tailored quote.</p>
                <button class="js-cta inline-flex items-center justify-center rounded-full bg-brand-crimson px-6 py-2.5 text-sm font-semibold text-white transition-colors duration-300 hover:bg-opacity-90">Request a Demo</button>
            </article>
        </div>
    </section>
</main>
<!-- Shared modal -->
<div class="fixed inset-0 z-[70] hidden" id="book-modal">
<div class="absolute inset-0 bg-black/60" data-close=""></div>
<div class="mx-auto mt-[10vh] w-[min(560px,92vw)] rounded-2xl bg-white dark:bg-slate-900 p-6 border border-slate-200 dark:border-slate-800 shadow-2xl">
<div class="flex items-center justify-between">
<h3 class="text-xl font-extrabold">Book a 20-minute consultation</h3>
<button aria-label="Close" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800" data-close="">
<i class="h-5 w-5" data-lucide="x"></i>
</button>
</div>
<p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Tell us a bit about you and we’ll send a private booking link immediately.</p>
<form class="mt-4 grid gap-3" id="book-form">
<input class="field rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-950 px-3 py-2" name="name" placeholder="Your name" required=""/>
<input class="field rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-950 px-3 py-2" name="email" placeholder="Work email" required="" type="email"/>
<input class="field rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-950 px-3 py-2" name="company" placeholder="Company"/>
<input class="field rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-950 px-3 py-2" name="phone" placeholder="Phone (optional)"/>
<textarea class="field rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-950 px-3 py-2" name="notes" placeholder="Anything specific you want to cover?" rows="3"></textarea>
<input autocomplete="off" class="hidden" name="hp" tabindex="-1" type="text"/>
<button class="rounded-lg bg-brand-600 text-white font-semibold px-4 py-2 hover:bg-brand-700" type="submit">Send me the booking link</button>
<p class="text-xs text-slate-500" id="book-out"></p>
</form>
</div>
</div>
<script src="<?php echo htmlspecialchars(mh_asset('assets/app.js')); ?>"></script>

<?php include __DIR__ . '/../Footer.php'; ?>
