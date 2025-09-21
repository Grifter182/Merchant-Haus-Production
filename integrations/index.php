<?php
    $pageTitle = 'MerchantHaus – Integrations Directory';
    $pageDescription = 'A showcase of our trusted partners and integrated platforms.';
    include __DIR__ . '/../Header.php';
?>

<style>
.integrations-page {
    font-family: 'Inter', sans-serif;
}
.integrations-page .card-hover-effect {
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}
.integrations-page .card-hover-effect:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}
.dark .integrations-page .card-hover-effect:hover {
    box-shadow: 0 10px 20px rgba(0, 206, 219, 0.1);
}
.integrations-page .mh-aurora {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: -1;
}
.integrations-page .mh-aurora__glow {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 200%;
    padding-bottom: 200%;
    border-radius: 50%;
    background-image: radial-gradient(circle, rgba(0, 206, 219, 0.1), transparent 45%),
                      radial-gradient(circle, rgba(220, 20, 60, 0.1), transparent 45%);
    transform: translate(-50%, -50%);
    animation: aurora-glow 20s linear infinite;
    will-change: transform;
}
.dark .integrations-page .mh-aurora__glow {
    background-image: radial-gradient(circle, rgba(0, 206, 219, 0.15), transparent 45%),
                      radial-gradient(circle, rgba(220, 20, 60, 0.15), transparent 45%);
}
@keyframes aurora-glow {
    0% { transform: translate(-50%, -50%) rotate(0deg); }
    100% { transform: translate(-50%, -50%) rotate(360deg); }
}
</style>

<main class="integrations-page relative overflow-hidden py-16 min-h-screen">
    <div aria-hidden="true" class="mh-aurora pointer-events-none">
        <canvas class="absolute inset-0 w-full h-full" id="mh-stars"></canvas>
        <div class="mh-aurora__glow"></div>
    </div>

    <div class="container mx-auto px-4 py-16 relative z-10">
        <div class="text-center mb-16">
            <h1 class="text-4xl sm:text-5xl font-extrabold font-ubuntu text-brand-dark dark:text-white">Integrations</h1>
            <p class="mt-4 text-xl text-slate-600 dark:text-slate-300 max-w-2xl mx-auto">
                A showcase of our trusted partners and integrated platforms.
            </p>
        </div>

        <?php
            $integrationShowcase = [
                [
                    'name' => 'Salesforce',
                    'href' => 'https://www.salesforce.com/',
                    'logo' => 'https://www.salesforce.com/content/dam/sfdc-docs/www/logos/logo-salesforce.svg',
                ],
                [
                    'name' => 'QuickBooks',
                    'href' => 'https://quickbooks.intuit.com/',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/commons/7/79/Intuit_QuickBooks_logo.svg',
                ],
                [
                    'name' => 'HubSpot',
                    'href' => 'https://www.hubspot.com/',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/commons/3/3f/HubSpot_Logo.svg',
                ],
                [
                    'name' => 'Vend',
                    'href' => 'https://www.vendhq.com/',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Vend-logo.svg/512px-Vend-logo.svg.png',
                ],
                [
                    'name' => 'Squarespace',
                    'href' => 'https://www.squarespace.com/',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/en/5/53/Squarespace_Logo.svg',
                ],
                [
                    'name' => 'MemberPress',
                    'href' => 'https://memberpress.com/',
                    'logo' => 'https://memberpress.com/wp-content/uploads/2023/07/memberpress-by-awesome-motive-logo-flame-blue-rgb.svg',
                ],
                [
                    'name' => 'WooCommerce',
                    'href' => 'https://woocommerce.com/',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/WooCommerce_logo.svg/512px-WooCommerce_logo.svg.png',
                ],
                [
                    'name' => 'Zoho CRM',
                    'href' => 'https://www.zoho.com/crm/',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/commons/3/30/ZOHO_logo_2023.svg',
                ],
                [
                    'name' => 'Lightspeed',
                    'href' => 'https://www.lightspeedhq.com/',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/commons/3/38/Lightspeed_-_logo.png',
                ],
                [
                    'name' => 'Wix',
                    'href' => 'https://www.wix.com/',
                    'logo' => 'https://static.wixstatic.com/media/de991a_321c4356214644169542e724ef57529b~mv2.png',
                ],
                [
                    'name' => 'Keap',
                    'href' => 'https://keap.com/',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/commons/e/e0/Logo_of_Keap_Company.svg',
                ],
                [
                    'name' => 'Clover',
                    'href' => 'https://www.clover.com/',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Clover_logo.svg/512px-Clover_logo.svg.png',
                ],
                [
                    'name' => 'FreshBooks',
                    'href' => 'https://www.freshbooks.com/',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/commons/1/17/FreshBooks_logo_%282020%29.svg',
                ],
                [
                    'name' => 'Magento',
                    'href' => 'https://magento.com/',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Magento_Logo.svg/512px-Magento_Logo.svg.png',
                ],
                [
                    'name' => 'BigCommerce',
                    'href' => 'https://www.bigcommerce.com/',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/commons/c/c4/Bc-logo-dark.svg',
                ],
                [
                    'name' => 'NCR',
                    'href' => 'https://www.ncr.com/',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/commons/9/92/NCR_logo_color.svg',
                ],
                [
                    'name' => 'Visa',
                    'href' => 'https://www.visa.com/',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_2021.svg',
                ],
                [
                    'name' => 'Mastercard',
                    'href' => 'https://www.mastercard.us/',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/commons/a/a4/Mastercard_2019_logo.svg',
                ],
            ];
        ?>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6 md:gap-8">
            <?php foreach ($integrationShowcase as $integration) :
                $logoSrc = $integration['logo'] ?? null;
                if (!$logoSrc) {
                    continue;
                }
                $name = $integration['name'] ?? 'Integration';
                $href = $integration['href'] ?? '#';
            ?>
                <a
                    href="<?php echo htmlspecialchars($href); ?>"
                    class="p-6 rounded-2xl bg-white/10 dark:bg-gray-800/50 backdrop-blur-lg border border-white/10 shadow-lg flex flex-col items-center justify-center aspect-square card-hover-effect"
                    target="_blank"
                    rel="noopener"
                >
                    <img
                        src="<?php echo htmlspecialchars($logoSrc); ?>"
                        alt="<?php echo htmlspecialchars($name . ' Logo'); ?>"
                        class="max-h-16 object-contain"
                        onerror="this.onerror=null;this.src='https://placehold.co/200x100/e2e8f0/e2e8f0?text=Logo';"
                    >
                    <p class="mt-4 text-sm font-medium text-slate-700 dark:text-slate-300"><?php echo htmlspecialchars($name); ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../Footer.php'; ?>
