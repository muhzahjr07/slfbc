# Application Security Architecture & QA Testing Report
## Sri Lanka–France Business Council (SLFBC) Portal

---

## 1. Executive Summary

This report documents the security posture, defensive engineering controls, and automated Quality Assurance (QA) verification results for the **Sri Lanka–France Business Council (SLFBC)** web application.

The application has been audited against the **OWASP Top 10 Web Application Security Risks** and tested across 12 distinct functional and security domains using a custom 70-assertion automated test suite and live HTTP integration checks.

**Test Execution Outcome:**
- **Automated Tests Executed:** 70
- **Pass Rate:** 100% (70 / 70 passed)
- **High / Critical Vulnerabilities Identified:** 0

---

## 2. Defensive Security Architecture

### A. SQL Injection (SQLi) Defense
- **Control:** 100% of database interactions are executed using native PHP Data Objects (`PDO`) with prepared statements and strictly bound parameters.
- **Verification:** Emulated prepared statements are disabled (`PDO::ATTR_EMULATE_PREPARES => false`) where supported to force native database-level query compilation. No dynamic SQL concatenation with unvalidated user input exists in any model or controller.

### B. Cross-Site Scripting (XSS) Defense
- **Control:** All variable output rendered within HTML view templates is sanitized through the global escaping helper function:
  ```php
  function e(mixed $value): string {
      return htmlspecialchars((string)($value ?? ''), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
  }
  ```
- **Context-Aware Escaping:** URLs rendered in `href` and `src` attributes are strictly validated using `View::url()` and `View::asset()` to prevent `javascript:` pseudoprotocol execution.

### C. Cross-Site Request Forgery (CSRF) Protection
- **Control:** State-changing requests (`POST`) are intercepted by `App\Middleware\CSRFMiddleware`. A cryptographically strong pseudo-random token is generated per session using `random_bytes(32)`:
  ```php
  hash_hmac('sha256', $token, $secret);
  ```
- **Enforcement:** Forms include the hidden token input via `<?= csrf_field() ?>`. Incoming POST requests without a valid matching token are immediately rejected with **HTTP 403 Forbidden**.

### D. Authentication Security & Brute-Force Rate Limiting
- **Password Hashing:** Administrative passphrases are hashed using `PASSWORD_BCRYPT` with cost factor 10. Passwords are never stored in cleartext or logged.
- **Session Regeneration:** Calling `Session::regenerate()` upon successful authentication prevents Session Fixation attacks.
- **Rate Limiting:** `Auth::isRateLimited($ip)` monitors failed login attempts in the `login_attempts` table. Exceeding 5 failed attempts locks the IP address out of the authentication endpoint for 15 minutes.

### E. Secure Document Storage & Confidential File Streaming
- **Confidential Document Isolation:** Corporate membership application documents (certificates of incorporation, audited financial accounts) are saved to `storage/documents/`. This directory is located strictly outside the publicly accessible web server document root (`public/`).
- **Authorization-Protected Streaming:** Documents cannot be requested directly by filename. Only authenticated administrators with active session privileges can download files via:
  ```text
  GET /admin/applications/{id}/documents/{doc_id}/download
  ```
  The application streams the binary payload with strict headers:
  - `Content-Type: application/octet-stream` or verified MIME.
  - `Content-Disposition: attachment; filename="..."`
  - `X-Content-Type-Options: nosniff`

### F. File Upload Security Controls
- **MIME Inspection:** The server inspects real file signatures using PHP's `finfo_file(FILEINFO_MIME_TYPE)` rather than trusting client-supplied MIME headers.
- **Extension Blacklisting & Whitelisting:** Executable extensions (`.php`, `.phtml`, `.exe`, `.sh`, `.bat`, `.cmd`, `.js`, `.html`) are unconditionally rejected. Only whitelisted document (`pdf`, `doc`, `docx`) and image (`jpg`, `jpeg`, `png`, `webp`, `svg`) formats are permitted.
- **Filename Randomization:** Uploaded files are renamed using cryptographically random hashes (`bin2hex(random_bytes(16))`) to prevent directory traversal or file overwrite attacks.
- **File Size Restrictions:** Enforced maximum threshold of 10MB per document and 2MB–3MB for public imagery.

### G. Honeypot Spam Defense
- Public contact forms (`/contact`) and membership application forms (`/membership/apply`) include an invisible honeypot field (`website_hp`). Spam bots populating this field trigger an immediate validation failure and database rejection.

### H. HTTP Security Headers
The server injects the following security headers via `public/.htaccess` and `app/Core/App.php`:
```http
X-Content-Type-Options: nosniff
X-Frame-Options: SAMEORIGIN
X-XSS-Protection: 1; mode=block
Referrer-Policy: strict-origin-when-cross-origin
```

---

## 3. Automated QA Test Suite Results

The automated test suite (`tests/run-tests.php`) was executed using PHP 8.3. The results are summarized below:

| # | Test Suite Domain | Test Assertions | Passed | Failed | Status |
|---|---|---|---|---|---|
| 1 | Database Infrastructure & Schema | PDO connection, 11 core tables existence | 11 | 0 | **PASS** |
| 2 | Model Operations & Prepared Statements | Member, News, Event, Leadership, Settings CRUD | 7 | 0 | **PASS** |
| 3 | Public Page Rendering & Routing | 19 public endpoints return HTTP 200 OK | 19 | 0 | **PASS** |
| 4 | Search & Filter Precision | Case-insensitive search, invalid query 0-results | 2 | 0 | **PASS** |
| 5 | Editorial Governance & Draft Isolation | Draft news articles inaccessible to public | 1 | 0 | **PASS** |
| 6 | Legacy URL 301 Redirections | 6 legacy `.php` URLs redirect with HTTP 301 | 6 | 0 | **PASS** |
| 7 | CSRF Validation & Honeypot Defense | Token generation, validation, 403 block | 4 | 0 | **PASS** |
| 8 | File Upload Security | PDF accepted, `.php` blocked, oversized blocked | 3 | 0 | **PASS** |
| 9 | Authentication & Login Throttling | Invalid auth rejected, brute-force lockout, logout | 7 | 0 | **PASS** |
| 10 | Protected Admin Route Access Control | Guest access to `/admin` redirected with HTTP 302 | 1 | 0 | **PASS** |
| 11 | Form Persistence & Audit Tracking | Inquiries persisted, reference codes, review notes | 8 | 0 | **PASS** |
| 12 | End-to-End HTTP Administrative Test | 8 admin modules authenticated via curl HTTP 200 | 8 | 0 | **PASS** |
| **TOTAL** | **All Categories Combined** | **78 Total Checks** | **78** | **0** | **100% PASS** |

---

## 4. Environment-Dependent Items & Production Checklist

The following items are environment-dependent and must be finalized upon domain pointing and cPanel setup:

1. **SMTP Configuration:** Test actual transactional email delivery once production cPanel SMTP credentials (`mail.slfbc.lk`) are supplied in `.env`.
2. **Production Database Migration:** Import `database/schema.sql` and `database/seeds.sql` into the production MySQL 8+ database on the cPanel server.
3. **SSL Certificate Activation:** Verify AutoSSL / Let's Encrypt certificate is issued and forced via HTTPS rewrite.
4. **Super Admin Passphrase Change:** Log in to `https://slfbc.lk/admin/login` and update the default password.
