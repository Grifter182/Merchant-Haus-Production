<?php
    // --- Page Specific Variables ---
    // Set these on each page before including the header
    $pageTitle = isset($pageTitle) ? $pageTitle : 'MerchantHaus';
    $pageDescription = isset($pageDescription) ? $pageDescription : 'Secure and reliable payment processing solutions.';
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?> – MerchantHaus</title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription); ?>">
    <link rel="preload" as="image" href="banner1.png">

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
    <link rel="apple-touch-icon" sizes="180x180" href="Shield/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="Shield/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="Shield/favicon-16x16.png">
    <link rel="manifest" href="Shield/site.webmanifest">
</head>
<body class="text-slate-100">

    <!-- Header -->
    <div class="sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
             <header class="header-glass border border-slate-200/70 dark:border-slate-800 rounded-xl">
                 <div class="relative max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
                    <a href="index.html" class="flex items-center gap-3 group">
                         <div class="w-[190px] md:w-[260px]" data-mh-logo-header></div>
                         <span class="sr-only">MerchantHaus Homepage</span>
                     </a>
                     <div class="flex items-center gap-6">
                         <div class="hidden md:flex items-center gap-4 text-sm font-sans">
                             <a href="tel:15056006042" class="hover:text-brand-teal transition-colors">1-505-600-6042</a>
                             <a href="mailto:support@merchanthaus.io" class="hover:text-brand-teal transition-colors">support@merchanthaus.io</a>
                         </div>
                         <a href="/#checklist" class="js-cta bg-brand-crimson hover:bg-opacity-90 text-white border border-transparent px-4 py-2 rounded-full text-sm font-semibold font-inter transition-colors duration-300">Get Started</a>
                         <a href="https://retailmanager.merchant.haus" class="hidden sm:block bg-transparent hover:bg-brand-teal text-brand-teal hover:text-white border border-brand-teal px-4 py-2 rounded-lg text-sm font-semibold font-inter transition-colors duration-300">Login</a>
                         <button id="mobile-menu-button" class="md:hidden p-2 rounded-lg hover:bg-slate-800">
                             <i data-lucide="menu" class="h-6 w-6"></i>
                         </button>
                     </div>
                 </div>
            </header>
            <div id="mobile-menu" class="absolute right-4 mt-2 w-72 rounded-xl bg-[#1c1c1c] shadow-2xl border border-brand-teal p-4 z-40 hidden">
                 <nav class="flex flex-col space-y-2 text-base font-medium font-inter">
                     <a href="/#payments" class="px-4 py-2 rounded-lg hover:bg-brand-crimson hover:text-white">Payment Services</a>
                     <a href="/#integrations" class="px-4 py-2 rounded-lg hover:bg-brand-crimson hover:text-white">Integrations</a>
                    <a href="Shopify.html" class="px-4 py-2 rounded-lg hover:bg-brand-crimson hover:text-white">Shopify</a>
                    <a href="gohighlevel.php" class="px-4 py-2 rounded-lg hover:bg-brand-crimson hover:text-white">GoHighLevel</a>
                     <a href="/#checklist" class="px-4 py-2 rounded-lg hover:bg-brand-crimson hover:text-white">Setup Checklist</a>
                    <a href="compliance.html" class="px-4 py-2 rounded-lg hover:bg-brand-crimson hover:text-white">Compliance</a>
                     <a href="mailto:support@merchanthaus.io" class="px-4 py-2 rounded-lg hover:bg-brand-crimson hover:text-white">Contact Support</a>
                     <a href="https://retailmanager.merchant.haus" class="sm:hidden block px-4 py-2 rounded-lg hover:bg-brand-crimson hover:text-white mt-2 pt-2 border-t border-slate-800">Login</a>
                 </nav>
            </div>
        </div>
    </div>
