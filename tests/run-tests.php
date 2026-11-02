<?php

declare(strict_types=1);

/**
 * SLFBC Automated QA & Security Verification Test Suite
 * Sri Lanka–France Business Council Portal
 * 
 * Run via terminal:
 *   php tests/run-tests.php
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');

define('TEST_RUNNING', true);
$rootDir = dirname(__DIR__);

// Bootstrap App & Config
$config = require $rootDir . '/config/config.php';
require_once $rootDir . '/app/Core/App.php';

$app = new \App\Core\App($config);

class TestRunner
{
    private int $passed = 0;
    private int $failed = 0;
    private array $failures = [];

    public function assert(string $description, bool $condition, string $detail = ''): void
    {
        if ($condition) {
            $this->passed++;
            echo "  [\033[32mPASS\033[0m] {$description}\n";
        } else {
            $this->failed++;
            $msg = "  [\033[31mFAIL\033[0m] {$description}";
            if ($detail) {
                $msg .= " - {$detail}";
            }
            echo $msg . "\n";
            $this->failures[] = $description . ($detail ? " ({$detail})" : '');
        }
    }

    public function report(): int
    {
        echo "\n=======================================================\n";
        echo " TEST EXECUTION SUMMARY\n";
        echo "=======================================================\n";
        echo " Total Tests Run : " . ($this->passed + $this->failed) . "\n";
        echo " Passed          : \033[32m{$this->passed}\033[0m\n";
        echo " Failed          : " . ($this->failed > 0 ? "\033[31m{$this->failed}\033[0m" : "0") . "\n";
        
        if ($this->failed > 0) {
            echo "\nFailures:\n";
            foreach ($this->failures as $f) {
                echo " - {$f}\n";
            }
            echo "\n";
            return 1;
        }

        echo "\nAll test suites passed successfully!\n\n";
        return 0;
    }
}

$t = new TestRunner();

echo "\n=======================================================\n";
echo " Sri Lanka–France Business Council - Test Suite\n";
echo "=======================================================\n\n";

/* -------------------------------------------------------------
 * 1. DATABASE & CONNECTION
 * ------------------------------------------------------------- */
echo "1. Database Infrastructure & Schema\n";
try {
    $pdo = \App\Core\Database::getConnection();
    $driver = $pdo->getAttribute(\PDO::ATTR_DRIVER_NAME);
    $t->assert("Database PDO connection initialized", $pdo instanceof \PDO, "Driver: {$driver}");
    
    // Check tables exist
    $tables = ['admins', 'members', 'sectors', 'news', 'events', 'membership_applications', 'application_documents', 'contact_enquiries', 'leadership', 'business_opportunities', 'site_settings'];
    foreach ($tables as $tbl) {
        $stmt = $pdo->query("SELECT 1 FROM {$tbl} LIMIT 1");
        $t->assert("Table '{$tbl}' exists and is queryable", $stmt !== false);
    }
} catch (\Throwable $e) {
    $t->assert("Database initialization failed", false, $e->getMessage());
}

/* -------------------------------------------------------------
 * 2. MODEL CRUD & DATA INTEGRITY
 * ------------------------------------------------------------- */
echo "\n2. Model Operations & Prepared Statements\n";
try {
    // Member model
    $members = \App\Models\Member::allActive();
    $t->assert("Member::allActive() returns array", is_array($members) && count($members) > 0, "Count: " . count($members));
    
    $michelin = \App\Models\Member::findBySlug('michelin-lanka');
    $t->assert("Member::findBySlug('michelin-lanka') found", $michelin !== null && $michelin['name'] === 'Michelin Lanka (Pvt) Ltd');

    // News model
    $latestNews = \App\Models\News::getLatest(5);
    $t->assert("News::getLatest() returns published articles", is_array($latestNews) && count($latestNews) > 0);

    // Event model
    $upcoming = \App\Models\Event::getUpcoming(5);
    $past = \App\Models\Event::getPast(5);
    $t->assert("Event::getUpcoming() executed without SQL error", is_array($upcoming));
    $t->assert("Event::getPast() executed without SQL error", is_array($past));

    // Leadership model
    $president = \App\Models\Leadership::getPresident();
    $t->assert("Leadership::getPresident() returns verified officer", $president !== null, $president['name'] ?? 'Not found');
    
    // SiteSetting
    $siteName = \App\Models\SiteSetting::get('site_name');
    $t->assert("SiteSetting::get('site_name') loaded correctly", !empty($siteName), (string)$siteName);
} catch (\Throwable $e) {
    $t->assert("Model operations failed", false, $e->getMessage());
}

/* -------------------------------------------------------------
 * 3. PUBLIC ROUTE DISPATCHING (200 OK)
 * ------------------------------------------------------------- */
echo "\n3. Public Page Rendering & Controllers\n";

$publicRoutes = [
    '/' => 'Homepage',
    '/about' => 'About the Council',
    '/governance' => 'Leadership & Governance',
    '/leadership' => 'Leadership & Governance Alias',
    '/ambassador-message' => 'Ambassador Message',
    '/membership' => 'Membership Overview',
    '/membership/apply' => 'Membership Application Form',
    '/apply' => 'Membership Application Direct Route',
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

$router = $app->getRouter();

foreach ($publicRoutes as $path => $name) {
    ob_start();
    $req = new \App\Core\Request([], [], ['REQUEST_METHOD' => 'GET', 'REQUEST_URI' => $path]);
    $res = new \App\Core\Response();
    
    try {
        $router->dispatch($req, $res);
        $output = ob_get_clean();
        $code = $res->getStatusCode();
        
        $t->assert("Route '{$path}' ({$name}) returns HTTP {$code}", $code === 200, "Output length: " . strlen($output));
    } catch (\Throwable $e) {
        ob_end_clean();
        $t->assert("Route '{$path}' ({$name}) threw exception", false, $e->getMessage());
    }
}

/* -------------------------------------------------------------
 * 4. SEARCH, FILTERING, & EMPTY STATES
 * ------------------------------------------------------------- */
echo "\n4. Search & Filter Precision\n";

$michelinSearch = \App\Models\Member::allActive(null, 'Michelin');
$t->assert("Member search for 'Michelin' returns matching company", count($michelinSearch) >= 1 && str_contains($michelinSearch[0]['name'], 'Michelin'));

$bogusSearch = \App\Models\Member::allActive(null, 'NonExistentFabricatedCompanyXYZ123');
$t->assert("Member search for non-existent company returns 0 results", count($bogusSearch) === 0);

/* -------------------------------------------------------------
 * 5. DRAFT ISOLATION (DRAFT ARTICLE MUST NOT BE ACCESSIBLE PUBLICLY)
 * ------------------------------------------------------------- */
echo "\n5. Editorial Governance & Draft Isolation\n";

// Insert a draft article
$draftSlug = 'internal-unapproved-draft-article-' . bin2hex(random_bytes(4));
$draftId = \App\Models\News::create([
    'title' => 'Internal Draft Announcement',
    'slug' => $draftSlug,
    'content' => 'This is a draft that must not be published to the public internet.',
    'status' => 'draft',
]);

$publicDraftLookup = \App\Models\News::findPublishedBySlug($draftSlug);
$t->assert("Draft article is NOT returned by News::findPublishedBySlug()", $publicDraftLookup === null);

// Clean up draft
\App\Models\News::delete($draftId);

/* -------------------------------------------------------------
 * 6. LEGACY 301 REDIRECTS
 * ------------------------------------------------------------- */
echo "\n6. Legacy URL 301 Redirections\n";

$legacyRedirects = [
    '/index.php' => '/',
    '/about_layout.php' => '/about',
    '/members.php' => '/members',
    '/events.php' => '/events',
    '/application.php' => '/apply',
    '/contact.php' => '/contact',
    '/faq' => '/membership#faqs',
    '/constitution' => '/about#constitution',
];

foreach ($legacyRedirects as $oldUrl => $target) {
    ob_start();
    $req = new \App\Core\Request([], [], ['REQUEST_METHOD' => 'GET', 'REQUEST_URI' => $oldUrl]);
    $res = new \App\Core\Response();
    $router->dispatch($req, $res);
    ob_end_clean();

    $t->assert("Legacy '{$oldUrl}' triggers 301 redirect", $res->getStatusCode() === 301);
}

/* -------------------------------------------------------------
 * 7. CSRF TOKEN & SECURITY PROTECTION
 * ------------------------------------------------------------- */
echo "\n7. CSRF Validation & Honeypot Defense\n";

// Generate token
$validToken = \App\Core\CSRF::getToken();
$t->assert("CSRF token generated and non-empty", !empty($validToken) && strlen($validToken) >= 32);
$t->assert("CSRF::validateToken() accepts valid token", \App\Core\CSRF::validateToken($validToken));
$t->assert("CSRF::validateToken() rejects forged token", !\App\Core\CSRF::validateToken('forged-attack-token-12345'));

// Test POST /contact without CSRF -> should trigger 403 Forbidden
ob_start();
$postReq = new \App\Core\Request([], ['name' => 'Attacker', 'message' => 'spam'], ['REQUEST_METHOD' => 'POST', 'REQUEST_URI' => '/contact']);
$postRes = new \App\Core\Response();
$router->dispatch($postReq, $postRes);
$postOut = ob_get_clean();
$t->assert("POST /contact without CSRF token is blocked with HTTP 403", $postRes->getStatusCode() === 403);

/* -------------------------------------------------------------
 * 8. FILE UPLOAD SECURITY (MIME & EXTENSION ENFORCEMENT)
 * ------------------------------------------------------------- */
echo "\n8. File Upload Validation\n";

$allowedExtensions = ['pdf', 'doc', 'docx', 'jpg', 'png'];
$allowedMimes = ['application/pdf', 'image/jpeg', 'image/png'];

// Safe file simulation
$safeFile = [
    'name' => 'annual_report.pdf',
    'type' => 'application/pdf',
    'size' => 1024 * 500, // 500KB
    'error' => UPLOAD_ERR_OK,
];
$safeErr = \App\Core\Validator::validateFile($safeFile, $allowedExtensions, 10 * 1024 * 1024, $allowedMimes);
$t->assert("Valid PDF file is accepted", $safeErr === null);

// Dangerous executable file simulation
$maliciousFile = [
    'name' => 'shell.php',
    'type' => 'application/x-php',
    'size' => 1024,
    'error' => UPLOAD_ERR_OK,
];
$maliciousErr = \App\Core\Validator::validateFile($maliciousFile, $allowedExtensions, 10 * 1024 * 1024, $allowedMimes);
$t->assert("Prohibited .php executable file is rejected", $maliciousErr !== null);

// Oversized file simulation
$oversizedFile = [
    'name' => 'huge_video.pdf',
    'type' => 'application/pdf',
    'size' => 50 * 1024 * 1024, // 50MB (max is 10MB)
    'error' => UPLOAD_ERR_OK,
];
$oversizedErr = \App\Core\Validator::validateFile($oversizedFile, $allowedExtensions, 10 * 1024 * 1024, $allowedMimes);
$t->assert("Oversized file exceeding size limit is rejected", $oversizedErr !== null);

/* -------------------------------------------------------------
 * 9. AUTHENTICATION & LOGIN THROTTLING
 * ------------------------------------------------------------- */
echo "\n9. Administrative Authentication & Brute-Force Rate Limiting\n";

$testIp = '192.168.100.' . rand(1, 254);

// Clear attempts
\App\Core\Auth::clearAttempts($testIp);
$t->assert("Initial rate limit status is clean", !\App\Core\Auth::isRateLimited($testIp));

// Test failed login with invalid credentials
$attempt1 = \App\Core\Auth::attempt('nonexistent@slfbc.lk', 'WrongPass123!', $testIp);
$t->assert("Invalid login attempt is rejected", $attempt1 === false);

// Test rate limiting threshold (5 attempts)
for ($i = 0; $i < 5; $i++) {
    \App\Core\Auth::recordAttempt($testIp);
}
$t->assert("Auth::isRateLimited() activates after failed attempts threshold", \App\Core\Auth::isRateLimited($testIp));

// Cleanup test IP
\App\Core\Auth::clearAttempts($testIp);

// Test valid admin authentication
$validAdminAuth = \App\Core\Auth::attempt('admin@slfbc.lk', 'Admin@SLFBC2026!', '127.0.0.1');
$t->assert("Default seeded administrator authenticates successfully", $validAdminAuth === true);
$t->assert("Auth::check() returns true after session establishment", \App\Core\Auth::check() === true);
$t->assert("Auth::user() contains admin details", \App\Core\Auth::user()['email'] === 'admin@slfbc.lk');

// Test logout
\App\Core\Auth::logout();
$t->assert("Auth::check() returns false after logout", \App\Core\Auth::check() === false);

/* -------------------------------------------------------------
 * 10. PROTECTED ADMIN ROUTE ACCESS CONTROL
 * ------------------------------------------------------------- */
echo "\n10. Access Control & Authorization Middleware\n";

// Attempt to access /admin as guest (logged out)
ob_start();
$guestReq = new \App\Core\Request([], [], ['REQUEST_METHOD' => 'GET', 'REQUEST_URI' => '/admin']);
$guestRes = new \App\Core\Response();
$router->dispatch($guestReq, $guestRes);
ob_end_clean();

$t->assert("Unauthenticated visitor to /admin is redirected (HTTP 302)", $guestRes->getStatusCode() === 302);

/* -------------------------------------------------------------
 * 11. FORM SUBMISSION & DATA PERSISTENCE
 * ------------------------------------------------------------- */
echo "\n11. Form Validation & Database Persistence\n";

// Contact enquiry persistence test
$enquiryData = [
    'name' => 'Jean-Luc Picard',
    'company' => 'CMA CGM Lanka',
    'email' => 'jean-luc@cmacgm.test',
    'phone' => '+94 11 2345678',
    'subject_category' => 'Bilateral Trade Delegation',
    'message' => 'We are interested in participating in the upcoming maritime logistics delegation to Marseille.',
    'ip_address' => '127.0.0.1',
];

$enquiryId = \App\Models\ContactEnquiry::create($enquiryData);
$t->assert("Contact enquiry persisted to database", $enquiryId > 0);

$fetchedEnquiry = \App\Models\ContactEnquiry::find($enquiryId);
$t->assert("Persisted enquiry can be retrieved", $fetchedEnquiry !== null && $fetchedEnquiry['name'] === 'Jean-Luc Picard');
$t->assert("Unread enquiries counter tracks new submissions", \App\Models\ContactEnquiry::countUnread() > 0);

// Mark read
\App\Models\ContactEnquiry::markAsRead($enquiryId);
$updatedEnquiry = \App\Models\ContactEnquiry::find($enquiryId);
$t->assert("Enquiry successfully marked as read", (int)$updatedEnquiry['is_read'] === 1);

// Membership application persistence test
$appData = [
    'company_name' => 'Saint-Gobain Sri Lanka JV',
    'business_reg_no' => 'PV-998877',
    'year_established' => 2012,
    'sector' => 'Manufacturing & Industrial Goods',
    'origin' => 'Bilateral Joint Venture',
    'primary_corridor' => 'Investment & JVs',
    'membership_tier_requested' => 'Corporate',
    'corporate_email' => 'info@saint-gobain.test',
    'phone' => '+94 11 9876543',
    'website' => 'https://www.saint-gobain.test',
    'registered_address' => 'No. 120, Industrial Zone, Biyagama, Sri Lanka.',
    'contact_person_name' => 'Claire Dupont',
    'contact_person_designation' => 'Country Director',
    'contact_person_email' => 'claire.dupont@saint-gobain.test',
    'contact_person_phone' => '+94 77 1234567',
    'recommender_1_name' => 'Mr. Asitha Rajapakse',
    'recommender_1_company' => 'D.L. & F. De Saram',
];

$applicationId = \App\Models\MembershipApplication::create($appData);
$t->assert("Membership application persisted with reference code", $applicationId > 0);

$savedApp = \App\Models\MembershipApplication::find($applicationId);
$t->assert("Application reference format verified", str_starts_with($savedApp['reference_no'], 'SLFBC-APP-'));
$t->assert("Initial application status is 'pending'", $savedApp['status'] === 'pending');

// Update application review decision
\App\Models\MembershipApplication::updateStatus($applicationId, 'under_review', 'Checked incorporation credentials with ROC.', 1);
$updatedApp = \App\Models\MembershipApplication::find($applicationId);
$t->assert("Application status updated to 'under_review' with audit note", $updatedApp['status'] === 'under_review' && !empty($updatedApp['admin_notes']));

/* -------------------------------------------------------------
 * 12. FINISH REPORT
 * ------------------------------------------------------------- */
$exitCode = $t->report();
exit($exitCode);
