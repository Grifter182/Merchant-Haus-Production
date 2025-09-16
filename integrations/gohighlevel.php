<?php
    $pageTitle = 'MerchantHaus × GoHighLevel — Retail Payments';
    $pageDescription = 'Accept payments in GoHighLevel with MerchantHaus.';
    include __DIR__ . '/../Header.php';
?>

<main class="max-w-5xl mx-auto px-4 py-12">
<a class="text-sm text-brand-600" href="/">← Back to MerchantHaus</a>
<header class="mt-4 flex items-center gap-4">
<img alt="GoHighLevel" class="h-10 w-auto" src="<?php echo htmlspecialchars(mh_asset('public/assets/images/Shield.png')); ?>"/>
<h1 class="text-3xl font-extrabold">MerchantHaus for GoHighLevel</h1>
<nav><a href="mailto:support@merchanthaus.io">Contact Us</a><a href="/privacy">Privacy Policy</a><a href="/terms">Terms &amp; Conditions</a></nav></header>
<p class="mt-3 text-slate-600 dark:text-slate-300">Accept payments in GHL funnels &amp; snapshots, with routing freedom and merchant‑friendly controls.</p>
<section class="mt-8 grid md:grid-cols-2 gap-6">
<div class="p-6 rounded-2xl border border-slate-200 dark:border-slate-800">
<h2 class="font-bold">What you get</h2>
<ul class="mt-2 text-sm list-disc list-inside space-y-1 text-slate-700 dark:text-slate-300">
<li>Invoices, pay links, and recurring billing in funnels</li>
<li>Multi‑processor routing + fallback for uptime</li>
<li>Tokenization &amp; customer vault across offers</li>
<li>3‑D Secure &amp; fraud heuristics for card‑not‑present</li>
</ul>
</div>
<div class="p-6 rounded-2xl border border-slate-200 dark:border-slate-800">
<h2 class="font-bold">Implementation</h2>
<ol class="mt-2 text-sm list-decimal list-inside space-y-1 text-slate-700 dark:text-slate-300">
<li>Book a demo and share a recent processing statement</li>
<li>We issue your <strong>MID + access details</strong></li>
<li>Add credentials in GHL &amp; test charges end‑to‑end</li>
<li>Go live and tune fraud/routing with our team</li>
</ol>
</div>
</section>
<div class="mt-8 p-6 rounded-2xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-800">
<h3 class="font-bold">Pricing</h3>
<p class="text-sm mt-2 text-slate-700 dark:text-slate-300">Interchange++ with volume-based discounts. Effective rates depend on card mix and ticket size. Get a tailored quote.</p>
<button class="js-cta inline-block mt-4 px-4 py-2 rounded-lg bg-brand-600 text-white font-semibold">Request a Demo</button>
</div>
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
