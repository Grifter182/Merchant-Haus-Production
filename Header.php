<?php
    // --- Page Specific Variables ---
    // Set these on each page before including the header
    $pageTitle = isset($pageTitle) ? $pageTitle : 'MerchantHaus';
    $pageDescription = isset($pageDescription) ? $pageDescription : 'Secure and reliable payment processing solutions.';

    // Determine the base path for assets so images work from any directory depth
    $documentRoot = isset($_SERVER['DOCUMENT_ROOT']) ? str_replace('\\', '/', rtrim($_SERVER['DOCUMENT_ROOT'], '/')) : '';
    $projectRoot = str_replace('\\', '/', rtrim(__DIR__, '/'));
    $mhBasePath = '';

    if ($documentRoot && strpos($projectRoot, $documentRoot) === 0) {
        $mhBasePath = trim(substr($projectRoot, strlen($documentRoot)), '/');
    }

    if (!function_exists('mh_asset')) {
        function mh_asset(string $path): string
        {
            global $mhBasePath;

            $normalized = '/' . ltrim($path, '/');

            if (!empty($mhBasePath)) {
                return '/' . $mhBasePath . $normalized;
            }

            return $normalized;
        }
    }

    if (!function_exists('mh_page_link')) {
        function mh_page_link(string $page): string
        {
            $hasLeadingSlash = isset($page[0]) && $page[0] === '/';
            $normalized = ltrim($page, '/');
            $normalized = preg_replace('/\.(html|php)$/', '', $normalized);
            $extension = PHP_SAPI === 'cli' ? 'html' : 'php';

            return ($hasLeadingSlash ? '/' : '') . $normalized . '.' . $extension;
        }
    }
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?> – MerchantHaus</title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription); ?>">
    <link rel="preload" as="image" href="<?php echo htmlspecialchars(mh_asset('public/assets/images/banner1.png')); ?>">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&family=Vollkorn:wght@400&family=Inter:wght@500&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Vollkorn', 'serif'],
                        ubuntu: ['Ubuntu', 'sans-serif'],
                        inter: ['Inter', 'sans-serif']
                    },
                    colors: {
                        'brand-crimson': '#DC143C',
                        'brand-teal': '#00CEDB',
                        'brand-silver': '#A9A9A9',
                        'brand-dark': '#1A1A1A',
                        'brand-light': '#F8F9FA',
                    }
                }
            }
        }
    </script>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Custom Styles -->
    <style>
        html {
            scroll-behavior: smooth;
        }
        body {
            font-family: 'Vollkorn', serif;
            position: relative;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            background-color: #1c1c1c;
            color: #f5f5f5;
        }
        body::before {
            content: '';
            position: fixed;
            top: 0; left: 0;
            width: 100vw; height: 100vh;
            z-index: -1;
            background: 
                radial-gradient(circle at 15% 25%, rgba(220, 20, 60, 0.25), transparent 40%),
                radial-gradient(circle at 85% 75%, rgba(0, 206, 219, 0.2), transparent 40%);
            animation: bloom 25s linear infinite alternate;
        }
        @keyframes bloom {
            0% { background-position: 0% 0%, 0% 0%; }
            100% { background-position: 50% -50%, -50% 50%; }
        }
        .header-glass {
            background-color: rgba(28, 28, 28, 0.8);
            backdrop-filter: blur(10px);
        }
        .dark .border-slate-800 { border-color: #2a2a2a !important; }

        /* Headline scroller */
        .scrolling-words-container {
            height: 4.5rem; 
            line-height: 4.5rem;
            overflow: hidden;
            position: relative;
            display: inline-block;
        }
        @media (min-width: 768px) {
            .scrolling-words-container {
                height: 3.75rem;
                line-height: 3.75rem;
            }
        }
        .scrolling-words-box {
            display: inline-block;
            list-style: none;
            padding: 0;
            margin: 0;
            animation: spin-words 10s ease-in-out infinite;
        }
        @keyframes spin-words {
            0%, 20% { transform: translateY(0); }
            25%, 45% { transform: translateY(-4.5rem); }
            50%, 70% { transform: translateY(-9rem); }
            75%, 95% { transform: translateY(-13.5rem); }
            100% { transform: translateY(-18rem); }
        }
        @media (min-width: 768px) {
           @keyframes spin-words {
                0%, 20% { transform: translateY(0); }
                25%, 45% { transform: translateY(-3.75rem); }
                50%, 70% { transform: translateY(-7.5rem); }
                75%, 95% { transform: translateY(-11.25rem); }
                100% { transform: translateY(-15rem); }
            }
        }

        /* Typewriter effect */
        .typewriter-text {
            border-right: .15em solid #00CEDB;
            white-space: pre-wrap;
            animation: blink-caret .75s step-end infinite;
        }
        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: #00CEDB; }
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0,0,0,0);
            border: 0;
        }
    </style>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo htmlspecialchars(mh_asset('Shield/apple-touch-icon.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo htmlspecialchars(mh_asset('Shield/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo htmlspecialchars(mh_asset('Shield/favicon-16x16.png')); ?>">
    <link rel="manifest" href="<?php echo htmlspecialchars(mh_asset('Shield/site.webmanifest')); ?>">
</head>
<body class="text-slate-100">

    <!-- Header -->
    <div class="sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 pb-6">
             <header class="header-glass border border-slate-200/70 dark:border-slate-800 rounded-full shadow-lg">
                 <div class="relative max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
                    <a href="<?php echo htmlspecialchars(mh_page_link('index')); ?>" class="flex items-center gap-3 group">
                         <div class="w-[190px] md:w-[260px]" data-mh-logo-header></div>
                         <span class="sr-only">MerchantHaus Homepage</span>
                     </a>
                     <div class="flex items-center gap-6">
                         <div class="hidden md:flex items-center gap-4 text-sm font-sans">
                             <a href="tel:15056006042" class="hover:text-brand-teal transition-colors">1-505-600-6042</a>
                             <a href="mailto:support@merchanthaus.io" class="hover:text-brand-teal transition-colors">support@merchanthaus.io</a>
                         </div>
                         <button type="button" class="js-signup-cta bg-brand-crimson hover:bg-opacity-90 text-white border border-transparent px-4 py-2 rounded-full text-sm font-semibold font-inter transition-colors duration-300">Get Started</button>
                         <a href="https://retailmanager.merchant.haus" class="hidden sm:block bg-transparent hover:bg-brand-teal text-brand-teal hover:text-white border border-brand-teal px-4 py-2 rounded-lg text-sm font-semibold font-inter transition-colors duration-300">Login</a>
                         <button id="mobile-menu-button" class="md:hidden p-2 rounded-lg hover:bg-slate-800">
                             <i data-lucide="menu" class="h-6 w-6"></i>
                         </button>
                     </div>
                 </div>
            </header>
            <div id="mobile-menu" class="absolute right-4 mt-2 w-72 rounded-xl bg-[#1c1c1c] shadow-2xl border border-brand-teal p-4 z-40 hidden">
                 <nav class="flex flex-col space-y-6 text-base font-medium font-inter">
                     <div class="space-y-2">
                         <h4 class="text-sm font-semibold text-brand-teal uppercase tracking-[0.2em]">Product</h4>
                         <a href="/#payments" class="block w-full px-4 py-2 text-left rounded-full border border-brand-teal bg-[#262626] text-white transition-colors duration-200 hover:bg-brand-teal">Payment Services</a>
                         <button
                             type="button"
                             id="mobile-integrations-toggle"
                             aria-expanded="false"
                             aria-controls="mobile-integrations-menu"
                             class="flex items-center justify-between w-full px-4 py-2 text-left rounded-full border border-brand-teal bg-[#262626] text-white transition-colors duration-200 hover:bg-brand-teal"
                         >
                             <span>Integrations</span>
                             <span class="ml-2 text-brand-teal">
                                 <svg data-collapsible-icon class="w-4 h-4 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                     <polyline points="6 9 12 15 18 9" />
                                 </svg>
                             </span>
                         </button>
                        <div id="mobile-integrations-menu" class="mt-2 space-y-2 pl-3 hidden">
                            <a href="<?php echo htmlspecialchars(mh_page_link('integrations')); ?>" class="block w-full px-4 py-2 text-left rounded-full border border-brand-teal bg-[#1f1f1f] text-white transition-colors duration-200 hover:bg-brand-teal">Integrations Directory</a>
                            <a href="Shopify.html" class="block w-full px-4 py-2 text-left rounded-full border border-brand-teal bg-[#1f1f1f] text-white transition-colors duration-200 hover:bg-brand-teal">Shopify Integration</a>
                            <a href="gohighlevel.php" class="block w-full px-4 py-2 text-left rounded-full border border-brand-teal bg-[#1f1f1f] text-white transition-colors duration-200 hover:bg-brand-teal">GoHighLevel Integration</a>
                        </div>
                         <a href="/#checklist" class="block w-full px-4 py-2 text-left rounded-full border border-brand-teal bg-[#262626] text-white transition-colors duration-200 hover:bg-brand-teal">Setup Checklist</a>
                     </div>
                     <div class="space-y-2">
                         <h4 class="text-sm font-semibold text-brand-teal uppercase tracking-[0.2em]">Support</h4>
                         <a href="mailto:support@merchanthaus.io" class="block w-full px-4 py-2 text-left rounded-full border border-brand-teal bg-[#262626] text-white transition-colors duration-200 hover:bg-brand-teal">Contact Support</a>
                         <a href="/faq.html" class="block w-full px-4 py-2 text-left rounded-full border border-brand-teal bg-[#262626] text-white transition-colors duration-200 hover:bg-brand-teal">FAQ</a>
                     </div>
                     <div class="space-y-2">
                         <h4 class="text-sm font-semibold text-brand-teal uppercase tracking-[0.2em]">Legal</h4>
                         <a href="/privacy.html" class="block w-full px-4 py-2 text-left rounded-full border border-brand-teal bg-[#262626] text-white transition-colors duration-200 hover:bg-brand-teal">Privacy Policy</a>
                         <a href="/terms.html" class="block w-full px-4 py-2 text-left rounded-full border border-brand-teal bg-[#262626] text-white transition-colors duration-200 hover:bg-brand-teal">Terms &amp; Conditions</a>
                         <a href="compliance.html" class="block w-full px-4 py-2 text-left rounded-full border border-brand-teal bg-[#262626] text-white transition-colors duration-200 hover:bg-brand-teal">Compliance</a>
                     </div>
                     <a href="https://retailmanager.merchant.haus" class="sm:hidden block w-full px-4 py-2 text-center rounded-full border border-brand-teal bg-[#262626] text-white transition-colors duration-200 hover:bg-brand-teal">Login</a>
                 </nav>
            </div>
        </div>
    </div>

    <div id="signup-panel-overlay" class="panel-overlay fixed inset-0 bg-black/60 z-50 opacity-0 invisible">
        <div id="signup-panel" class="panel-container fixed top-0 right-0 h-full w-full max-w-2xl bg-white dark:bg-slate-900 shadow-2xl transform translate-x-full flex flex-col">
            <div class="p-6 sm:p-8 relative flex-shrink-0">
                <button id="close-signup-panel-btn" class="absolute top-4 right-4 text-slate-500 hover:text-slate-800 dark:hover:text-slate-200">
                    <i data-lucide="x" class="h-6 w-6"></i>
                </button>
                <div class="mb-6">
                    <div class="flex justify-between mb-2 text-sm font-semibold text-slate-800 dark:text-slate-200">
                        <p>Step <span id="current-step-text">1</span> of 3</p>
                        <p id="step-name">Account Details</p>
                    </div>
                    <div class="w-full bg-slate-200 dark:bg-slate-700 rounded-full h-2.5 overflow-hidden">
                        <div id="progress-bar" class="bg-brand-crimson h-full rounded-full" style="width: 33%"></div>
                    </div>
                </div>
            </div>
            <div class="px-6 sm:px-8 pb-4 flex-grow overflow-y-auto">
                <form id="signup-form" novalidate></form>
                <div id="form-message" class="mt-4 text-center text-sm"></div>
            </div>
            <div class="p-6 sm:p-8 mt-auto pt-6 border-t border-slate-200 dark:border-slate-800 flex justify-between items-center flex-shrink-0">
                <div class="text-sm">
                    <p class="font-semibold">Need Help?</p>
                    <a href="tel:15056006042" class="text-slate-500 hover:text-brand-crimson dark:hover:text-brand-teal transition-colors">1-505-600-6042</a>
                </div>
                <div class="flex items-center gap-4">
                    <button type="button" id="prev-btn" class="bg-slate-200 text-slate-800 dark:bg-slate-700 dark:text-slate-200 px-6 py-2.5 rounded-lg font-semibold hover:bg-slate-300 dark:hover:bg-slate-600 transition-all invisible">Previous</button>
                    <button type="button" id="next-btn" class="bg-brand-crimson text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-brand-crimson transition-all shadow-sm hover:shadow-md">Next</button>
                    <button type="submit" id="submit-btn" form="signup-form" class="bg-brand-crimson text-white px-6 py-2.5 rounded-lg font-bold hover:bg-brand-crimson transition-all shadow-sm hover:shadow-md hidden">Create Account</button>
                </div>
            </div>
        </div>
    </div>
