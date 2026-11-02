# Sri Lanka–France Business Council (SLFBC) Portal

<p align="center">
  <img src="public/assets/images/logo.svg" alt="SLFBC Logo" width="320">
</p>

<p align="center">
  <strong>Official Bilateral Business Portal</strong><br>
  Accredited under the aegis of <strong>The Ceylon Chamber of Commerce</strong> & supported by the <strong>Embassy of France in Colombo</strong>.
</p>

<p align="center">
  <a href="https://github.com/muhzahjr07/slfbc/actions/workflows/ci.yml"><img src="https://img.shields.io/badge/build-passing-brightgreen?style=flat-square&logo=githubactions" alt="Build Status"></a>
  <a href="https://www.php.net/"><img src="https://img.shields.io/badge/php-%3E%3D%208.2-777bb4.svg?style=flat-square&logo=php" alt="PHP Version"></a>
  <a href="LICENSE"><img src="https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square" alt="License"></a>
  <a href="tests/run-tests.php"><img src="https://img.shields.io/badge/tests-77%20passed-success?style=flat-square" alt="Test Suite"></a>
  <a href="tests/http-verify.php"><img src="https://img.shields.io/badge/endpoints-43%20verified-success?style=flat-square" alt="HTTP Endpoints"></a>
</p>

---

## 1. Executive Overview

The **Sri Lanka–France Business Council (SLFBC)** web application is an institutional, multi-page, database-driven PHP 8.2+ platform designed to foster, promote, and expand bilateral trade, investment, joint ventures, and economic cooperation between Sri Lanka and the French Republic.

Developed to replace fragmented legacy endpoints with a modern, high-performance, and mobile-responsive architecture, the platform integrates verified corporate member directories, bilateral summit calendars, strategic trade corridors, presidential and ambassadorial dispatches, and an authenticated administrative management panel for the Ceylon Chamber Secretariat.

---

## 2. Technology Stack & Architectural Patterns

- **Runtime:** PHP 8.2+ (strictly typed `declare(strict_types=1);`, clean object-oriented MVC architecture).
- **Database Layer:** Native PHP Data Objects (`PDO`) with prepared statements and parameter binding. Dual compatibility with MySQL 8+ / MariaDB 10.4+ in production and zero-configuration SQLite for local automated testing.
- **Frontend Layer:** Semantic HTML5, Vanilla CSS + Tailwind utility tokens (zero permanent Node.js runtime dependency in production).
- **Web Server:** Apache 2.4+ (`.htaccess` URL rewriting) or Nginx with standard FastCGI/PHP-FPM directives.
- **Security Engineering:**
  - Cryptographic HMAC-SHA256 CSRF tokens on all state-changing `POST` routes.
  - Brute-force rate limiting (5 attempts per 15-minute sliding window) on administrative authentication.
  - One-way password hashing using `PASSWORD_BCRYPT` with cost factor 10.
  - Protected document storage (`storage/documents/`) with streaming file downloads accessible only to authorized administrators.
  - Context-aware HTML escaping (`e()`) against Stored and Reflected XSS.
  - Strict file upload validation (MIME verification via `finfo`, extension whitelisting, file size caps, and filename sanitization).
  - Honeypot spam defense on all public contact and membership application forms.

---

## 3. Repository Architecture & Directory Structure

```text
slfbc/
├── .github/
│   ├── workflows/ci.yml        # Automated GitHub Actions test workflow
│   └── pull_request_template.md # PR review and verification guidelines
├── app/
│   ├── Controllers/            # Application controllers
│   │   ├── Admin/              # Protected administrative controllers (Dashboard, Members, News, Events, Applications, etc.)
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
│   │   └── helpers.php         # Global template helpers (e, url, asset, csrf_field, etc.)
│   ├── Middleware/
│   │   ├── AuthMiddleware.php  # Protected admin route guard
│   │   └── CSRFMiddleware.php  # State-changing token validator
│   ├── Models/                 # Active-Record style PDO Data Models
│   └── Views/                  # Blade-inspired semantic PHP templates
├── bin/
│   └── create-admin.php        # CLI utility to provision administrative accounts
├── config/
│   ├── config.php              # Global application configuration
│   └── database.php            # Database connections configuration
├── database/
│   ├── schema.sql              # Production MySQL 8+ schema (InnoDB, utf8mb4)
│   └── seeds.sql               # Verified initial seed records
├── docs/                       # Comprehensive documentation & manuals
│   ├── CONTENT_VERIFICATION_CHECKLIST.md
│   ├── CPANEL_DEPLOYMENT_GUIDE.md
│   ├── DATABASE_OPERATIONS.md
│   ├── SECURITY_AND_TESTING_REPORT.md
│   └── SLFBC_LAYOUT_WIREFRAME_AND_SEO_BLUEPRINT.md
├── public/                     # Web server document root
│   ├── .htaccess               # Apache URL rewrite rules & security headers
│   ├── index.php               # Single front controller entrypoint
│   └── assets/                 # CSS, JS, SVG, and optimized imagery
├── routes/
│   └── web.php                 # Route definitions & legacy 301 redirects
├── screenshots/                # 56 Full-page desktop screenshots across all views
├── storage/                    # Non-public application logs & applicant documents
├── tests/
│   ├── run-tests.php           # 77-assertion automated unit & security test suite
│   └── http-verify.php         # 43-endpoint end-to-end HTTP integration test suite
├── CHANGELOG.md                # Detailed release notes and version history
├── composer.json               # Project manifest, PSR-4 autoloading, and metadata
├── CONTRIBUTING.md             # Contribution guidelines
├── LICENSE                     # MIT License
└── SECURITY.md                 # Security vulnerability disclosure policy
```

---

## 4. Local Development Quick Start

### Prerequisites
- PHP 8.2 or 8.3 with extensions: `pdo`, `pdo_mysql`, `pdo_sqlite`, `fileinfo`, `mbstring`, `curl`, `openssl`.

### Installation & Launch
1. **Clone the repository:**
   ```bash
   git clone https://github.com/muhzahjr07/slfbc.git
   cd slfbc
   ```

2. **Configure environment:**
   ```bash
   cp .env.example .env
   ```
   *(By default, `.env` uses `DB_CONNECTION=sqlite`, automatically provisioning `storage/database.sqlite` with seed records on first run).*

3. **Start the local PHP server:**
   ```bash
   php -S localhost:8000 -t public public/index.php
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

*(Important: Change this passphrase immediately upon deployment via `/admin/settings` or CLI).*

### Provisioning Administrators via CLI
To provision an administrator account securely without exposing passwords in source code:
```bash
php bin/create-admin.php "Jane Doe" jane.doe@slfbc.lk "SecurePassphrase123!" super_admin
```

---

## 6. Automated Testing & Verification

The application includes an automated test suite with **77 assertions** covering database integrity, route resolution, legacy 301 redirects, CSRF protection, file upload sanitization, brute-force rate-limiting, and form persistence, plus an end-to-end HTTP verification suite covering **43 endpoints**.

### Run Core Unit & Integration Suite:
```bash
php tests/run-tests.php
```
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
With the server running on `http://localhost:8000`:
```bash
php tests/http-verify.php
```
```text
=======================================================
 HTTP VERIFICATION COMPLETE
=======================================================
 Total Endpoints Tested : 43
 Passed                 : 43
 Failed                 : 0
```

---

## 7. Visual Interface & Screenshot Gallery

A comprehensive 56-page desktop screenshot portfolio is archived in the [`screenshots/`](screenshots/) directory. Below is a curated gallery showcasing key public pages, dynamic directories, and protected administration consoles:

### 7.1 Public Institutional Portal

| Homepage (`/`) | Membership Hub (`/membership`) |
|:---:|:---:|
| <a href="screenshots/01-home.png"><img src="screenshots/01-home.png" alt="Homepage" width="420"/></a> | <a href="screenshots/05-membership-overview.png"><img src="screenshots/05-membership-overview.png" alt="Membership Overview" width="420"/></a> |
| *Diplomatic strip, 4 core pillars, statistics & corridors* | *3-tier corporate matrix, criteria & fee schedules* |

| Corporate Application (`/membership/apply`) | Application Confirmation (`/membership/apply/success`) |
|:---:|:---:|
| <a href="screenshots/06-membership-apply.png"><img src="screenshots/06-membership-apply.png" alt="Membership Application" width="420"/></a> | <a href="screenshots/07-membership-apply-success.png"><img src="screenshots/07-membership-apply-success.png" alt="Application Confirmation Receipt" width="420"/></a> |
| *5-stage verified intake with encrypted file upload* | *Formal Secretariat receipt & tracking reference* |

| Member Directory (`/members`) | Member Profile Detail (`/members/{slug}`) |
|:---:|:---:|
| <a href="screenshots/08-members-directory.png"><img src="screenshots/08-members-directory.png" alt="Member Directory" width="420"/></a> | <a href="screenshots/09-member-detail-cma-cgm-lanka.png"><img src="screenshots/09-member-detail-cma-cgm-lanka.png" alt="Member Detail - CMA CGM" width="420"/></a> |
| *Real-time keyword search & sector filter pills* | *Bilateral trade footprint, operations & contact desks* |

| Governance & ExCo (`/governance`) | Ambassador's Dispatch (`/ambassador-message`) |
|:---:|:---:|
| <a href="screenshots/03-governance-leadership.png"><img src="screenshots/03-governance-leadership.png" alt="Governance & Executive Committee" width="420"/></a> | <a href="screenshots/04-ambassador-message.png"><img src="screenshots/04-ambassador-message.png" alt="Ambassador's Message" width="420"/></a> |
| *Term 2025/26 Executive Committee directory* | *Official diplomatic address & embassy commercial desk* |

| Bilateral Summits & Events (`/events`) | Event Detail (`/events/{slug}`) |
|:---:|:---:|
| <a href="screenshots/20-events-summits.png"><img src="screenshots/20-events-summits.png" alt="Events Calendar" width="420"/></a> | <a href="screenshots/21-event-detail-bilateral-investment-forum.png"><img src="screenshots/21-event-detail-bilateral-investment-forum.png" alt="Event Detail" width="420"/></a> |
| *Summits, delegation itineraries & gala banquets* | *2026 Bilateral Investment Forum (Hôtel de Crillon)* |

---

### 7.2 Protected Secretariat Administration Panel (`/admin`)

| Admin Login (`/admin/login`) | Secretariat Dashboard (`/admin`) |
|:---:|:---:|
| <a href="screenshots/35-admin-login.png"><img src="screenshots/35-admin-login.png" alt="Admin Login" width="420"/></a> | <a href="screenshots/36-admin-dashboard.png"><img src="screenshots/36-admin-dashboard.png" alt="Secretariat Dashboard" width="420"/></a> |
| *Sliding-window rate-limiting & session guards* | *Live KPI metrics, workflow queues & inbox counters* |

| Application Dossier Review (`/admin/applications/1`) | Directory Management (`/admin/members`) |
|:---:|:---:|
| <a href="screenshots/47-admin-application-detail.png"><img src="screenshots/47-admin-application-detail.png" alt="Application Dossier Review" width="420"/></a> | <a href="screenshots/37-admin-members-list.png"><img src="screenshots/37-admin-members-list.png" alt="Member Directory Management" width="420"/></a> |
| *Due diligence notes, ratification & secure document streaming* | *Corporate member CRUD & sector assignments* |

> *Explore the complete collection of all 56 full-page screenshots in the [`screenshots/`](screenshots/) directory.*

---

## 8. SEO, Search Engine Indexing & Wireframe Portfolio

- **Dynamic XML Sitemap:** Automatically generated at [`/sitemap.xml`](http://localhost:8000/sitemap.xml).
- **Search Directives:** Configured at [`/robots.txt`](http://localhost:8000/robots.txt).
- **Metadata Blueprint:** Full copywriting specifications and keyword mappings are detailed in [`docs/SLFBC_LAYOUT_WIREFRAME_AND_SEO_BLUEPRINT.md`](docs/SLFBC_LAYOUT_WIREFRAME_AND_SEO_BLUEPRINT.md).
- **Screenshot Portfolio:** Complete 56-page visual archive available in [`screenshots/`](screenshots/).

---

## 9. Deployment & Production Hosting

- **Render.com Cloud Hosting:** Complete Dockerfile and blueprint definitions are available in [`render.yaml`](render.yaml) and documented in [`docs/RENDER_DEPLOYMENT_GUIDE.md`](docs/RENDER_DEPLOYMENT_GUIDE.md).
- **cPanel / Apache / Nginx Deployment:** Comprehensive step-by-step instructions for deploying to standard cPanel hosting environments are documented in [`docs/CPANEL_DEPLOYMENT_GUIDE.md`](docs/CPANEL_DEPLOYMENT_GUIDE.md).

---

## 10. License & Institutional Attribution

This project is released under the **[MIT License](LICENSE)**.

- **Operating Body:** Sri Lanka–France Business Council (SLFBC)
- **Accredited Chamber:** [The Ceylon Chamber of Commerce](https://www.chamber.lk), 50, Nawam Mawatha, Colombo 02, Sri Lanka.
- **Diplomatic Patronage:** Embassy of the French Republic, Colombo, Sri Lanka.
- **Architect & Engineering:** Spillburg Technologies.
