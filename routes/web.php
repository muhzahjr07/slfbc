<?php

declare(strict_types=1);

use App\Core\Router;
use App\Middleware\AuthMiddleware;
use App\Middleware\CSRFMiddleware;

// Public Controllers
use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\LeadershipController;
use App\Controllers\AmbassadorController;
use App\Controllers\MembershipController;
use App\Controllers\MemberDirectoryController;
use App\Controllers\NewsController;
use App\Controllers\EventController;
use App\Controllers\OpportunityController;
use App\Controllers\CountryController;
use App\Controllers\GalleryController;
use App\Controllers\ContactController;
use App\Controllers\SitemapController;

// Admin Controllers
use App\Controllers\Admin\AuthController;
use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\MemberAdminController;
use App\Controllers\Admin\NewsAdminController;
use App\Controllers\Admin\EventAdminController;
use App\Controllers\Admin\ApplicationAdminController;
use App\Controllers\Admin\EnquiryAdminController;
use App\Controllers\Admin\LeadershipAdminController;
use App\Controllers\Admin\OpportunityAdminController;
use App\Controllers\Admin\SettingsAdminController;

/**
 * Route Declarations for Sri Lanka–France Business Council Portal
 * 
 * @var Router $router
 */

/* =========================================================================
   PUBLIC WEBSITE ROUTES
   ========================================================================= */

$router->get('/', [HomeController::class, 'index']);
$router->get('/about', [AboutController::class, 'index']);
$router->get('/governance', [LeadershipController::class, 'index']);
$router->get('/leadership', [LeadershipController::class, 'index']);
$router->get('/ambassador-message', [AmbassadorController::class, 'index']);

// Membership & Application Journey
$router->get('/membership', [MembershipController::class, 'index']);
$router->get('/membership/apply', [MembershipController::class, 'apply']);
$router->get('/apply', [MembershipController::class, 'apply']);
$router->post('/membership/apply', [MembershipController::class, 'submit'], [CSRFMiddleware::class]);
$router->post('/apply', [MembershipController::class, 'submit'], [CSRFMiddleware::class]);
$router->get('/membership/apply/success', [MembershipController::class, 'success']);

// Member Directory
$router->get('/members', [MemberDirectoryController::class, 'index']);
$router->get('/members/{slug}', [MemberDirectoryController::class, 'detail']);

// News & Communiqués
$router->get('/news', [NewsController::class, 'index']);
$router->get('/news/{slug}', [NewsController::class, 'detail']);

// Events & Summits
$router->get('/events', [EventController::class, 'index']);
$router->get('/events/{slug}', [EventController::class, 'detail']);

// Opportunities & Strategic Corridors
$router->get('/opportunities', [OpportunityController::class, 'index']);
$router->get('/opportunities/{slug}', [OpportunityController::class, 'detail']);

// Country Information
$router->get('/france', [CountryController::class, 'france']);
$router->get('/france-business', [CountryController::class, 'france']);
$router->get('/sri-lanka', [CountryController::class, 'srilanka']);
$router->get('/srilanka-business', [CountryController::class, 'srilanka']);

// Media & Gallery
$router->get('/gallery', [GalleryController::class, 'index']);

// Contact Secretariat
$router->get('/contact', [ContactController::class, 'index']);
$router->post('/contact', [ContactController::class, 'submit'], [CSRFMiddleware::class]);

// Direct Anchor & Section Shortcuts
$router->get('/faq', function ($req, $res) {
    $res->redirect(\App\Core\View::url('membership') . '#faqs', 301);
});
$router->get('/constitution', function ($req, $res) {
    $res->redirect(\App\Core\View::url('about') . '#constitution', 301);
});

// SEO & Search Engine Indexing
$router->get('/sitemap.xml', [SitemapController::class, 'xml']);
$router->get('/robots.txt', [SitemapController::class, 'robots']);


/* =========================================================================
   ADMIN AUTHENTICATION ROUTES
   ========================================================================= */

$router->get('/admin/login', [AuthController::class, 'showLogin']);
$router->post('/admin/login', [AuthController::class, 'login'], [CSRFMiddleware::class]);
$router->get('/admin/logout', [AuthController::class, 'logout']);


/* =========================================================================
   PROTECTED SECRETARIAT ADMINISTRATION PANEL
   ========================================================================= */

// Dashboard
$router->get('/admin', [DashboardController::class, 'index'], [AuthMiddleware::class]);
$router->get('/admin/dashboard', [DashboardController::class, 'index'], [AuthMiddleware::class]);

// Member Management
$router->get('/admin/members', [MemberAdminController::class, 'index'], [AuthMiddleware::class]);
$router->get('/admin/members/create', [MemberAdminController::class, 'create'], [AuthMiddleware::class]);
$router->post('/admin/members/create', [MemberAdminController::class, 'store'], [AuthMiddleware::class, CSRFMiddleware::class]);
$router->get('/admin/members/{id}/edit', [MemberAdminController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/admin/members/{id}/edit', [MemberAdminController::class, 'update'], [AuthMiddleware::class, CSRFMiddleware::class]);
$router->post('/admin/members/{id}/delete', [MemberAdminController::class, 'delete'], [AuthMiddleware::class, CSRFMiddleware::class]);

// News Management
$router->get('/admin/news', [NewsAdminController::class, 'index'], [AuthMiddleware::class]);
$router->get('/admin/news/create', [NewsAdminController::class, 'create'], [AuthMiddleware::class]);
$router->post('/admin/news/create', [NewsAdminController::class, 'store'], [AuthMiddleware::class, CSRFMiddleware::class]);
$router->get('/admin/news/{id}/edit', [NewsAdminController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/admin/news/{id}/edit', [NewsAdminController::class, 'update'], [AuthMiddleware::class, CSRFMiddleware::class]);
$router->post('/admin/news/{id}/delete', [NewsAdminController::class, 'delete'], [AuthMiddleware::class, CSRFMiddleware::class]);

// Event Management
$router->get('/admin/events', [EventAdminController::class, 'index'], [AuthMiddleware::class]);
$router->get('/admin/events/create', [EventAdminController::class, 'create'], [AuthMiddleware::class]);
$router->post('/admin/events/create', [EventAdminController::class, 'store'], [AuthMiddleware::class, CSRFMiddleware::class]);
$router->get('/admin/events/{id}/edit', [EventAdminController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/admin/events/{id}/edit', [EventAdminController::class, 'update'], [AuthMiddleware::class, CSRFMiddleware::class]);
$router->post('/admin/events/{id}/delete', [EventAdminController::class, 'delete'], [AuthMiddleware::class, CSRFMiddleware::class]);

// Membership Applications Management & Document Streaming
$router->get('/admin/applications', [ApplicationAdminController::class, 'index'], [AuthMiddleware::class]);
$router->get('/admin/applications/{id}', [ApplicationAdminController::class, 'detail'], [AuthMiddleware::class]);
$router->post('/admin/applications/{id}/status', [ApplicationAdminController::class, 'updateStatus'], [AuthMiddleware::class, CSRFMiddleware::class]);
$router->get('/admin/applications/documents/{doc_id}', [ApplicationAdminController::class, 'downloadDocument'], [AuthMiddleware::class]);

// Secretariat Enquiries Management
$router->get('/admin/enquiries', [EnquiryAdminController::class, 'index'], [AuthMiddleware::class]);
$router->get('/admin/enquiries/{id}', [EnquiryAdminController::class, 'detail'], [AuthMiddleware::class]);
$router->post('/admin/enquiries/{id}/status', [EnquiryAdminController::class, 'updateStatus'], [AuthMiddleware::class, CSRFMiddleware::class]);

// Governance & Leadership Management
$router->get('/admin/leadership', [LeadershipAdminController::class, 'index'], [AuthMiddleware::class]);
$router->get('/admin/leadership/create', [LeadershipAdminController::class, 'create'], [AuthMiddleware::class]);
$router->post('/admin/leadership/create', [LeadershipAdminController::class, 'store'], [AuthMiddleware::class, CSRFMiddleware::class]);
$router->get('/admin/leadership/{id}/edit', [LeadershipAdminController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/admin/leadership/{id}/edit', [LeadershipAdminController::class, 'update'], [AuthMiddleware::class, CSRFMiddleware::class]);
$router->post('/admin/leadership/{id}/delete', [LeadershipAdminController::class, 'delete'], [AuthMiddleware::class, CSRFMiddleware::class]);

// Opportunities Management
$router->get('/admin/opportunities', [OpportunityAdminController::class, 'index'], [AuthMiddleware::class]);
$router->get('/admin/opportunities/create', [OpportunityAdminController::class, 'create'], [AuthMiddleware::class]);
$router->post('/admin/opportunities/create', [OpportunityAdminController::class, 'store'], [AuthMiddleware::class, CSRFMiddleware::class]);
$router->get('/admin/opportunities/{id}/edit', [OpportunityAdminController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/admin/opportunities/{id}/edit', [OpportunityAdminController::class, 'update'], [AuthMiddleware::class, CSRFMiddleware::class]);
$router->post('/admin/opportunities/{id}/delete', [OpportunityAdminController::class, 'delete'], [AuthMiddleware::class, CSRFMiddleware::class]);

// Site Settings
$router->get('/admin/settings', [SettingsAdminController::class, 'index'], [AuthMiddleware::class]);
$router->post('/admin/settings', [SettingsAdminController::class, 'update'], [AuthMiddleware::class, CSRFMiddleware::class]);
