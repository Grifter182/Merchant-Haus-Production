<?php

namespace MerchantHaus\Templates;

class Renderer
{
    public static function header(string $pageTitle = 'MerchantHaus', string $pageDescription = 'Secure and reliable payment processing solutions.'): void
    {
        $pageTitle = $pageTitle;
        $pageDescription = $pageDescription;
        include __DIR__ . '/header.php';
    }

    public static function footer(): void
    {
        include __DIR__ . '/footer.php';
    }
}

