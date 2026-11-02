# Changelog

All notable changes to the **Sri Lanka–France Business Council (SLFBC) Portal** are documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

---

## [1.0.0] - 2026-11-02

### Added
- **MVC Core Framework:** Modern object-oriented PHP 8.2+ architecture with router, dual PDO MySQL & SQLite database abstraction, session manager, and template engine.
- **Institutional Public Portal:**
  - Dynamic Homepage featuring bilingual diplomatic strip, 4 core pillars, statistical proof counters, bilateral corridor showcase, presidential dispatch, and member emblem grid.
  - About Us section with 20-year historical milestone timeline (2004–2026), Ceylon Chamber strategic anchor, and collapsible statutory constitution by-laws.
  - Governance & Executive Committee directory with officer profiles, terms, and committee rosters.
  - Ambassador of France Official Dispatch page with diplomatic seal and commercial desk contact details.
  - Membership Hub with 3-tier matrix (Patron, Corporate, Associate), statutory admission procedures, and interactive FAQ accordion.
  - 5-step interactive Corporate Membership Application workflow supporting multi-document encrypted uploads.
  - Verified Corporate Member Directory with live search, sector filtering, origin categorization, and dedicated detail profiles.
  - News & Communiqués repository with category taxonomy, featured hero cards, and reader view.
  - Bilateral Events & Summits calendar with flagships, countdown tags, and RSVP reservation handlers.
  - 6 Strategic Bilateral Trade Corridors (Renewable Energy, GI Ceylon Exports, Regulatory Navigation, Maritime Logistics, Luxury Tourism, Tech & AI Ventures).
  - Economic Guides: "Doing Business with France" (EU GSP+) and "Doing Business in Sri Lanka" (BOI Section 17 & port transshipment).
  - Photo Gallery & Media archive showcasing ministerial summits and galas.
  - Contact the Secretariat module with Colombo headquarters and Paris liaison coordinates.
- **Protected Secretariat Administration Panel (`/admin`):**
  - KPI overview dashboard tracking verified members, pending applications, published articles, and unread inquiries.
  - CRUD management for Member Directory profiles.
  - CRUD management for News articles and communiqués.
  - CRUD management for Events, summits, and delegations.
  - Membership Application Review Dossier with status updates (Pending, Under Review, Ratified, Rejected) and authenticated file streaming.
  - Contact Enquiries inbox with audit notes and read receipts.
  - Executive Committee leadership roster manager.
  - Strategic Corridors opportunity manager.
  - Global site settings configuration console.
- **Enterprise Security & Defense:**
  - Cryptographic CSRF token generation and middleware validation.
  - Brute-force rate limiting (5 attempts per 15-minute sliding window) on administrative logins.
  - Strict file upload sanitizer verifying real MIME signatures via `finfo_file` and preventing executable files.
  - Streaming controller for confidential corporate documents located outside the web root (`storage/documents/`).
  - Honeypot spam filters on all public forms.
- **SEO & Performance Engineering:**
  - Automated dynamic XML Sitemap (`/sitemap.xml`) indexing members, news, events, and opportunities.
  - Search engine directives (`/robots.txt`).
  - OpenGraph & Twitter Cards on all public layouts.
  - Structured JSON-LD schema markup (`Organization`, `GovernmentOrganization`, `BreadcrumbList`, `Event`, `NewsArticle`).
  - Legacy 301 canonical redirects for backward compatibility with deprecated flat `.php` endpoints.
- **Automated Verification Suites:**
  - 77-assertion PHP automated unit and integration test suite (`tests/run-tests.php`).
  - 43-endpoint end-to-end HTTP verification test suite (`tests/http-verify.php`).
- **Design & Wireframe Portfolio:**
  - Complete 56-page full-height screenshot archive across all public and admin views (`screenshots/`).
  - Visual layout and copywriting architecture blueprint (`SLFBC_LAYOUT_WIREFRAME_AND_SEO_BLUEPRINT.md`).

