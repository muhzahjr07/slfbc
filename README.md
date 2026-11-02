# Sri Lanka–France Business Council (SLFBC) Portal

> **Official Bilateral Business Portal** accredited under the aegis of **The Ceylon Chamber of Commerce** and supported by the **Embassy of France in Colombo**.

---

## 1. Project Overview

The **Sri Lanka–France Business Council (SLFBC)** website is a multi-page, database-driven PHP 8.2+ web application designed to foster, promote, and expand bilateral trade, investment, joint ventures, and economic cooperation between Sri Lanka and the French Republic.

This application has been developed to replace legacy static pages and fragmented registration endpoints with an editorial, secure, and mobile-responsive institutional platform. It integrates verified member directories, bilateral summit calendars, strategic trade corridors, high-level chamber dispatches, and an authenticated secretariat administration panel.

---

## 2. Technology Stack & Architecture

- **Backend Runtime:** PHP 8.2+ (strictly typed, object-oriented MVC architecture).
- **Database Engine:** MySQL 8+ / MariaDB 10.4+ in production (compatible with standard cPanel hosting); built-in SQLite auto-provisioning for automated local testing.
- **Database Layer:** Native PHP Data Objects (`PDO`) with prepared statements and parameter binding.
- **Frontend Layer:** Semantic HTML5, Vanilla CSS + compiled Tailwind design tokens (reused and adapted from the official Stitch prototype), and Vanilla JavaScript (zero permanent Node.js runtime dependency in production).
- **Web Server:** Apache 2.4+ with `mod_rewrite` enabled (`.htaccess` routing) or Nginx with standard FastCGI/PHP-FPM rewrite directives.
- **Security Engineering:**
  - Cryptographic CSRF tokens (`hash_hmac` / `random_bytes`) on all state-changing `POST` routes.
  - Brute-force rate limiting (5 attempts per 15-minute sliding window) on administrative authentication.
  - One-way password hashing using `PASSWORD_BCRYPT` with cost factor 10.
  - Protected document storage (`storage/documents/`) with streaming file downloads accessible only to authorized administrators.
  - Context-aware HTML escaping (`e()`) against Stored and Reflected XSS.
  - Strict file upload validation (MIME verification via `finfo`, extension whitelisting, file size caps, and filename sanitization).
  - Honeypot spam defense on all public contact and membership application forms.

---

## 3. Directory Structure

```text
slfbc/
├── app/
│   ├── Controllers/            # Application controllers
│   │   ├── Admin/              # Protected administrative controllers
│   │   │   ├── ApplicationAdminController.php
│   │   │   ├── AuthController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── EnquiryAdminController.php
│   │   │   ├── EventAdminController.php
│   │   │   ├── LeadershipAdminController.php
│   │   │   ├── MemberAdminController.php
│   │   │   ├── NewsAdminController.php
│   │   │   ├── OpportunityAdminController.php
│   │   │   └── SettingsAdminController.php
│   │   ├── AboutController.php
│   │   ├── AmbassadorController.php
│   │   ├── ContactController.php
│   │   ├── CountryController.php
│   │   ├── EventController.php
│   │   ├── GalleryController.php
│   │   ├── HomeController.php
│   │   ├── LeadershipController.php
│   │   ├── MemberDirectoryController.php
│   │   ├── MembershipController.php
│   │   ├── NewsController.php
│   │   ├── OpportunityController.php
│   │   └── SitemapController.php
│   ├── Core/                   # Application kernel and core services
│   │   ├── App.php             # Kernel bootstrapper & global exception handler
│   │   ├── Auth.php            # Session auth & rate limiting
│   │   ├── CSRF.php            # Cryptographic token generator & validator
│   │   ├── Database.php        # Dual PDO MySQL & SQLite manager
│   │   ├── Request.php         # HTTP request object
│   │   ├── Response.php        # HTTP response object
│   │   ├── Router.php          # Fast regex router with middleware pipeline
│   │   ├── Session.php         # Secure session manager
│   │   ├── Validator.php       # Server-side data & file validator
│   │   └── View.php            # Template rendering engine
│   ├── Helpers/
│   │   └── helpers.php         # Global helpers (e, url, asset, csrf_field, etc.)
│   ├── Middleware/
│   │   ├── AuthMiddleware.php  # Protected admin route guard
│   │   └── CSRFMiddleware.php  # State-changing token validator
│   ├── Models/                 # PDO Active-Record-style Data Models
│   └── Views/                  # Blade-inspired semantic PHP templates
│       ├── admin/              # Admin dashboard and management views
│       ├── layouts/            # Header, footer, and navigation layouts
│       └── [public pages]/     # Home, About, Members, Events, etc.
├── bin/
│   └── create-admin.php        # CLI script to provision administrators
├── config/
│   ├── config.php              # Global application configuration
│   └── database.php            # Database connections configuration
├── database/
│   ├── schema.sql              # Production MySQL 8+ schema (InnoDB, utf8mb4)
│   └── seeds.sql               # Verified initial seed records
├── docs/
│   ├── CONTENT_VERIFICATION_CHECKLIST.md
│   ├── CPANEL_DEPLOYMENT_GUIDE.md
│   ├── DATABASE_OPERATIONS.md
│   └── SECURITY_AND_TESTING_REPORT.md
├── public/                     # Web server document root
│   ├── .htaccess               # Apache URL rewrite rules & security headers
│   ├── index.php               # Single front controller entrypoint
│   ├── assets/                 # CSS, JS, SVG, and optimized imagery
│   └── uploads/                # Publicly served uploads (logos, covers)
├── routes/
│   └── web.php                 # Route definitions & legacy 301 redirects
├── storage/                    # Non-public application logs & documents
│   └── documents/              # Confidential uploaded applicant files
└── tests/
    ├── run-tests.php           # 70-assertion automated QA & security test suite
    └── http-verify.php         # End-to-end HTTP integration test suite
```

---

## 4. Local Development Setup

### Prerequisites
- PHP 8.2 or 8.3 with extensions enabled: `pdo`, `pdo_mysql`, `pdo_sqlite`, `fileinfo`, `mbstring`, `curl`, `openssl`.
- MySQL 8.0+ / MariaDB (or SQLite for automated testing without external server).

### Quick Start (Zero-Configuration Local Server)
1. **Clone or navigate to the project directory:**
   ```bash
   cd "C:\Users\User\Desktop\Spillburg Admin\projects\slfbc"
   ```

2. **Configure environment:**
   Copy the example environment configuration:
   ```bash
   cp .env.example .env
   ```
   *Note: By default, the application is pre-configured to use SQLite (`DB_CONNECTION=sqlite`) for immediate zero-dependency testing, or MySQL (`DB_CONNECTION=mysql`) for production.*

3. **Start the PHP development server:**
   ```bash
   php -S localhost:8000 -t public
   ```

4. **Access the application in your browser:**
   - **Public Portal:** [http://localhost:8000/](http://localhost:8000/)
   - **Member Directory:** [http://localhost:8000/members](http://localhost:8000/members)
   - **Membership Application:** [http://localhost:8000/membership/apply](http://localhost:8000/membership/apply)
   - **Admin Login:** [http://localhost:8000/admin/login](http://localhost:8000/admin/login)

---

## 5. Administrative Credentials & Provisioning

### Default Seeded Administrator
- **Email:** `admin@slfbc.lk`
- **Passphrase:** `Admin@SLFBC2026!`
- **Role:** Super Administrator (`super_admin`)

*(Important: Change this passphrase immediately upon production deployment).*

### Provisioning New Administrators via CLI
To create a new administrator account securely without exposing passwords in source code:
```bash
php bin/create-admin.php "Jane Doe" jane.doe@slfbc.lk "SecurePassphrase123!" super_admin
```

---

## 6. Automated Testing & Verification

The application includes an automated Quality Assurance and Security test suite with **77 assertions** covering database integrity, route resolution, legacy 301 redirects, CSRF protection, file upload sanitization, brute-force rate-limiting, and form persistence, plus an end-to-end HTTP verification suite covering **43 endpoints**.

### Run the Unit & Integration Test Suite:
```bash
php tests/run-tests.php
```
**Test Results:**
```text
=======================================================
 TEST EXECUTION SUMMARY
=======================================================
 Total Tests Run : 77
 Passed          : 77
 Failed          : 0

All test suites passed successfully!
```

### Run End-to-End HTTP Server Verification:
Ensure the server is running on `http://localhost:8000`, then run:
```bash
php tests/http-verify.php
```
**HTTP Results:**
```text
=======================================================
 HTTP VERIFICATION COMPLETE
=======================================================
 Total Endpoints Tested : 43
 Passed                 : 43
 Failed                 : 0
```

---

## 7. Public Website Information Architecture

| Route | Page Title | Purpose / Content |
|---|---|---|
| `/` | Homepage | Hero bilateral section, core pillars, verified members, upcoming events, Chamber affiliation. |
| `/about` | About the Council | History, role within Ceylon Chamber of Commerce, statutory objectives, bilateral ties. |
| `/governance` or `/leadership` | Leadership & Governance | Executive Committee directory, President, VPs, Chamber Secretariat, configurable term. |
| `/ambassador-message`| Ambassador's Message | Official message from the Ambassador of France to Sri Lanka & the Maldives. |
| `/membership` | Membership Overview | Membership tiers, eligibility criteria, corporate requirements, fee schedules. |
| `/membership/apply` or `/apply` | Membership Application | Multi-step corporate application form with secure document uploads and review tracking. |
| `/members` | Member Directory | Real-time database-driven search by company name and live/server filter by industry sector. |
| `/members/{slug}` | Member Profile | Company profile, logo, sector categorization, export corridor, and official website URL. |
| `/news` | News & Communiqués | Chamber news archive with category filters, publication dates, and excerpts. |
| `/news/{slug}` | News Article Detail | Full communiqué text, cover imagery, SEO tags, and related bilateral articles. |
| `/events` | Bilateral Events & Summits | Upcoming forums, ministerial delegations, networking mixers, and past archives. |
| `/events/{slug}` | Event Detail | Event agenda, venue details, calendar dates, and registration links. |
| `/opportunities` | Priority Corridors | Strategic bilateral investment, maritime, green hydrogen, tech, and export opportunities. |
| `/opportunities/{slug}` | Opportunity Detail | Dedicated dossier breakdown, scope, institutional partners (BOI, EDB, Business France). |
| `/france` or `/france-business` | Doing Business with France | Trade environment, French regional hubs, EU regulatory standards, bilateral incentives. |
| `/sri-lanka` or `/srilanka-business` | Doing Business in Sri Lanka | Strategic transshipment location, BOI incentives, Colombo Port City, export corridors. |
| `/gallery` | Photo Gallery & Media | High-resolution photography of delegations, protocol ceremonies, and galas. |
| `/contact` | Contact Secretariat | Official Secretariat address at Ceylon Chamber of Commerce, telephone, email, and inquiry form. |
| `/faq` | FAQs Redirect | 301 Redirect to `/membership#faqs` anchor. |
| `/constitution` | Constitution Redirect | 301 Redirect to `/about#constitution` anchor. |
| `/sitemap.xml` | XML Sitemap | Dynamic search engine index of all active public routes, news, and events. |
| `/robots.txt` | Robots Policy | Crawl directives allowing public indexing while disallowing `/admin/` and `/storage/`. |

---

## 8. Secretariat Administration Panel

Access path: `/admin` (redirects to `/admin/login` if unauthenticated).

- **Dashboard:** Real-time counters (Active Members, Published News, Upcoming Events, Pending Applications, Unread Inquiries).
- **Member Management (`/admin/members`):** Full CRUD, sector assignment, patron/corporate tiering, logo uploads, and homepage featuring toggles.
- **News Management (`/admin/news`):** Editorial drafting, category classification, rich text formatting, cover image uploads, and SEO metadata configuration.
- **Event Management (`/admin/events`):** Date/time scheduling, venue details, registration link management, and automatic upcoming/past archiving.
- **Membership Application Review (`/admin/applications`):** Application inspection, audit notes, review status updates (`pending`, `under_review`, `approved`, `rejected`), and **secure streaming download** of confidential applicant documents (`/admin/applications/{id}/documents/{doc_id}/download`).
- **Inquiry Management (`/admin/enquiries`):** Inbox for incoming public inquiries with read/unread tracking, status tagging, and internal notes.
- **Leadership Management (`/admin/leadership`):** Executive Committee roster editing, portrait uploads, and configurable term year.
- **Business Opportunities (`/admin/opportunities`):** Priority project pipeline management with corridor tagging.
- **Site Settings (`/admin/settings`):** Global contact details, Secretariat address, telephone numbers, and top announcement banner configuration.

---

## 9. Deployment & Operations Documentation

Detailed operational guides are available in the [`docs/`](file:///c:/Users/User/Desktop/Spillburg%20Admin/projects/slfbc/docs) directory:
- [cPanel Deployment Guide](file:///c:/Users/User/Desktop/Spillburg%20Admin/projects/slfbc/docs/CPANEL_DEPLOYMENT_GUIDE.md): Step-by-step instructions for uploading files, configuring MySQL on cPanel, setting up PHP 8.2+, and securing document roots.
- [Database Operations](file:///c:/Users/User/Desktop/Spillburg%20Admin/projects/slfbc/docs/DATABASE_OPERATIONS.md): MySQL schema import, initial seeding, backup/restore procedures, and foreign key indexes.
- [Content Verification Checklist](file:///c:/Users/User/Desktop/Spillburg%20Admin/projects/slfbc/docs/CONTENT_VERIFICATION_CHECKLIST.md): Editorial checklist for Council officials to confirm leadership rosters, membership fee schedules, and ambassador statements prior to launch.
- [Security & Testing Report](file:///c:/Users/User/Desktop/Spillburg%20Admin/projects/slfbc/docs/SECURITY_AND_TESTING_REPORT.md): Full audit report detailing security controls, OWASP protections, and test suite execution logs.

---

## 10. License & Copyright

© 2026 Sri Lanka–France Business Council (SLFBC). Affiliated with The Ceylon Chamber of Commerce. All rights reserved.
