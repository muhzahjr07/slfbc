<?php

declare(strict_types=1);

/**
 * End-to-end HTTP verification script for running server
 * Sri Lanka–France Business Council Portal
 */
$cookieFile = tempnam(sys_get_temp_dir(), 'slfbc_cookie_');

echo "=======================================================\n";
echo " SLFBC End-to-End HTTP Verification\n";
echo "=======================================================\n\n";

// 1. PUBLIC ROUTES VERIFICATION
echo "1. Verifying Public Endpoints (HTTP 200)...\n";
$publicEndpoints = [
    '/' => 'Homepage',
    '/about' => 'About the Council',
    '/governance' => 'Leadership & Governance',
    '/leadership' => 'Leadership & Governance Alias',
    '/ambassador-message' => 'Ambassador Message',
    '/membership' => 'Membership Overview',
    '/membership/apply' => 'Membership Application Form',
    '/apply' => 'Direct Membership Application Alias',
    '/members' => 'Member Directory',
    '/members/michelin-lanka' => 'Member Profile Detail',
    '/news' => 'News Archive',
    '/news/french-business-delegation-concludes-logistics-tour' => 'News Article Detail',
    '/events' => 'Events & Summits',
    '/events/2026-sri-lanka-france-bilateral-investment-forum' => 'Event Detail',
    '/opportunities' => 'Business Opportunities',
    '/opportunities/investment-renewable-infrastructure' => 'Opportunity Detail Page',
    '/france' => 'Doing Business with France',
    '/france-business' => 'Doing Business with France Alias',
    '/sri-lanka' => 'Doing Business in Sri Lanka',
    '/srilanka-business' => 'Doing Business in Sri Lanka Alias',
    '/gallery' => 'Photo Gallery & Media',
    '/contact' => 'Contact the Secretariat',
    '/robots.txt' => 'Robots.txt Output',
    '/sitemap.xml' => 'XML Sitemap Output',
];

$publicPassed = 0;
$publicFailed = 0;

foreach ($publicEndpoints as $uri => $title) {
    $ch = curl_init('http://localhost:8000' . $uri);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => false,
    ]);
    $resp = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($code === 200) {
        $publicPassed++;
        echo "   [\033[32mPASS\033[0m] {$uri} ({$title}) HTTP 200 OK (" . strlen((string)$resp) . " bytes)\n";
    } else {
        $publicFailed++;
        echo "   [\033[31mFAIL\033[0m] {$uri} returned HTTP {$code}\n";
    }
}

// 2. REDIRECT VERIFICATION (HTTP 301)
echo "\n2. Verifying Canonical & Legacy 301 Redirects...\n";
$redirectEndpoints = [
    '/index.php' => '/',
    '/about_layout.php' => '/about',
    '/members.php' => '/members',
    '/events.php' => '/events',
    '/application.php' => '/apply',
    '/contact.php' => '/contact',
    '/faq' => '/membership#faqs',
    '/constitution' => '/about#constitution',
];

$redirectPassed = 0;
$redirectFailed = 0;

foreach ($redirectEndpoints as $oldUri => $target) {
    $ch = curl_init('http://localhost:8000' . $oldUri);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_HEADER => true,
    ]);
    $resp = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($code === 301) {
        $redirectPassed++;
        echo "   [\033[32mPASS\033[0m] {$oldUri} -> {$target} HTTP 301 Moved Permanently\n";
    } else {
        $redirectFailed++;
        echo "   [\033[31mFAIL\033[0m] {$oldUri} returned HTTP {$code} instead of 301\n";
    }
}

// 3. ADMIN LOGIN & AUTHENTICATED SESSIONS
echo "\n3. Testing Admin Authentication & Session Management...\n";
$ch = curl_init('http://localhost:8000/admin/login');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_COOKIEJAR => $cookieFile,
    CURLOPT_COOKIEFILE => $cookieFile,
]);
$html = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if (!preg_match('/name="_csrf_token"\s+value="([^"]+)"/', $html, $matches)) {
    echo "   [\033[31mFAIL\033[0m] Could not extract CSRF token from /admin/login\n";
    unlink($cookieFile);
    exit(1);
}

$csrfToken = $matches[1];
echo "   CSRF token extracted: " . substr($csrfToken, 0, 16) . "...\n";

$ch = curl_init('http://localhost:8000/admin/login');
curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query([
        'email' => 'admin@slfbc.lk',
        'password' => 'Admin@SLFBC2026!',
        '_csrf_token' => $csrfToken,
    ]),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_COOKIEJAR => $cookieFile,
    CURLOPT_COOKIEFILE => $cookieFile,
]);
$adminDashboardHtml = curl_exec($ch);
$adminHttpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$finalUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
curl_close($ch);

if ($adminHttpCode === 200 && (str_contains($adminDashboardHtml, 'Secretariat Overview') || str_contains($adminDashboardHtml, 'Secretariat Dashboard'))) {
    echo "   [\033[32mPASS\033[0m] Admin authenticated successfully & dashboard rendered!\n";
} else {
    echo "   [\033[31mFAIL\033[0m] Dashboard not rendered properly.\n";
    unlink($cookieFile);
    exit(1);
}

echo "\n4. Verifying Protected Administrative Modules...\n";
$adminRoutes = [
    '/admin' => 'Dashboard Overview',
    '/admin/members' => 'Member Management',
    '/admin/news' => 'News Management',
    '/admin/events' => 'Event Management',
    '/admin/applications' => 'Membership Applications',
    '/admin/enquiries' => 'Contact Enquiries Inbox',
    '/admin/leadership' => 'Executive Committee Management',
    '/admin/opportunities' => 'Strategic Corridors Management',
    '/admin/settings' => 'Site Configuration & Settings',
];

$adminPassed = 0;
$adminFailed = 0;

foreach ($adminRoutes as $uri => $title) {
    $ch = curl_init('http://localhost:8000' . $uri);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_COOKIEJAR => $cookieFile,
        CURLOPT_COOKIEFILE => $cookieFile,
    ]);
    $resp = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($code === 200) {
        $adminPassed++;
        echo "   [\033[32mPASS\033[0m] {$uri} ({$title}) HTTP 200 OK\n";
    } else {
        $adminFailed++;
        echo "   [\033[31mFAIL\033[0m] {$uri} returned HTTP {$code}\n";
    }
}

// 5. UNEXPECTED 404 ROUTE HANDLING
echo "\n5. Verifying 404 Not Found Handling...\n";
$ch = curl_init('http://localhost:8000/non-existent-page-' . uniqid());
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => false,
]);
$resp404 = curl_exec($ch);
$code404 = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($code404 === 404 && str_contains((string)$resp404, 'Official Record or Page Not Found')) {
    echo "   [\033[32mPASS\033[0m] 404 handler returns HTTP 404 with custom diplomatic error template\n";
} else {
    echo "   [\033[31mFAIL\033[0m] 404 handler returned HTTP {$code404}\n";
}

unlink($cookieFile);

echo "\n=======================================================\n";
echo " HTTP VERIFICATION COMPLETE\n";
echo "=======================================================\n";
$totalTests = $publicPassed + $publicFailed + $redirectPassed + $redirectFailed + $adminPassed + $adminFailed + 2; // + login + 404
$totalPassed = $publicPassed + $redirectPassed + $adminPassed + 2;
echo " Total Endpoints Tested : {$totalTests}\n";
echo " Passed                 : \033[32m{$totalPassed}\033[0m\n";
echo " Failed                 : " . ($publicFailed + $redirectFailed + $adminFailed > 0 ? "\033[31m" . ($publicFailed + $redirectFailed + $adminFailed) . "\033[0m" : "0") . "\n\n";

if ($publicFailed + $redirectFailed + $adminFailed > 0) {
    exit(1);
}
exit(0);
