<?php
    $pageTitle = 'MerchantHaus – Frequently Asked Questions';
    $pageDescription = 'Answers to common questions about MerchantHaus payment services.';
    require_once __DIR__ . '/src/includes/header.php';
?>

<main class="min-h-screen pt-12 pb-16 flex flex-col items-center justify-start p-6">
    <div class="w-full max-w-3xl bg-white/80 dark:bg-[#1c1c1c]/80 backdrop-blur-sm p-8 rounded-xl shadow-lg border border-slate-200/70 dark:border-slate-800">
        <h1 class="text-4xl font-extrabold font-ubuntu mb-6 text-center">Frequently Asked Questions</h1>
        <div class="space-y-8">
            <section>
                <h2 class="text-2xl font-bold font-ubuntu mb-3 border-b border-slate-200 dark:border-slate-800 pb-2">What is MerchantHaus?</h2>
                <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                    MerchantHaus provides secure and affordable payment services tailored for online businesses.
                </p>
            </section>
            <section>
                <h2 class="text-2xl font-bold font-ubuntu mb-3 border-b border-slate-200 dark:border-slate-800 pb-2">How quickly can I start processing payments?</h2>
                <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                    Most accounts are approved within one business day so you can begin accepting payments right away.
                </p>
            </section>
            <section>
                <h2 class="text-2xl font-bold font-ubuntu mb-3 border-b border-slate-200 dark:border-slate-800 pb-2">Who do I contact for support?</h2>
                <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                    Reach our team at <a href="mailto:support@merchanthaus.io" class="text-brand-crimson hover:underline">support@merchanthaus.io</a> or call <a href="tel:15056006042" class="text-brand-crimson hover:underline">1-505-600-6042</a>.
                </p>
            </section>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (window.lucide) lucide.createIcons();
        document.getElementById('year').textContent = new Date().getFullYear();

        // --- Pop-out Menu & Modal Logic ---
        const menuBtn = document.getElementById('open-menu-btn');
        const popoutMenu = document.getElementById('popout-menu');
        if (menuBtn && popoutMenu) {
            menuBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                popoutMenu.classList.toggle('hidden');
                setTimeout(() => popoutMenu.classList.toggle('opacity-0'), 10);
            });
            document.addEventListener('click', (e) => {
                if (!popoutMenu.classList.contains('hidden') && !popoutMenu.contains(e.target) && !menuBtn.contains(e.target)) {
                    popoutMenu.classList.add('opacity-0');
                    setTimeout(() => popoutMenu.classList.add('hidden'), 300);
                }
            });
            popoutMenu.querySelectorAll('a[data-close]').forEach(link => {
                link.addEventListener('click', () => {
                    popoutMenu.classList.add('opacity-0');
                    setTimeout(() => popoutMenu.classList.add('hidden'), 300);
                });
            });
        }
    });
</script>

<?php require_once __DIR__ . '/src/includes/footer.php'; ?>

