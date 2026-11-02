# cPanel & Apache Deployment Guide
## Sri Lanka–France Business Council (SLFBC) Portal

This guide provides step-by-step instructions for deploying the **Sri Lanka–France Business Council (SLFBC)** portal to a standard cPanel / Apache shared, VPS, or dedicated hosting environment running PHP 8.2+ and MySQL 8+ / MariaDB.

---

## 1. Server Prerequisites

Ensure the cPanel hosting account meets the following minimum specifications:

- **Web Server:** Apache 2.4+ with `mod_rewrite`, `mod_headers`, and `mod_expires` enabled.
- **PHP Version:** PHP 8.2 or PHP 8.3 (Selectable via cPanel **MultiPHP Manager**).
- **Required PHP Extensions:**
  - `pdo` and `pdo_mysql` (Database access)
  - `fileinfo` (Strict MIME-type inspection for file uploads)
  - `mbstring` (Multibyte string handling)
  - `openssl` (Cryptographic token generation)
  - `json` (API and configuration parsing)
  - `curl` (External integrations and health verification)
  - `gd` or `imagick` (Image processing)
- **Database Server:** MySQL 8.0+ or MariaDB 10.4+ with `utf8mb4` charset and InnoDB storage engine.
- **SSL Certificate:** Free Let's Encrypt / cPanel AutoSSL certificate active on the domain.

---

## 2. Directory Structure & Document Root Configuration

### Option A: Recommended Approach (Independent Document Root)

If you have cPanel with the ability to define document roots (e.g. Addon Domain, Subdomain, or cPanel with configurable document root):

1. Upload the entire project repository to a directory outside or parallel to `public_html`:
   ```text
   /home/username/slfbc_app/
   ```
2. Configure your domain's document root in cPanel to point directly to the `public/` directory:
   ```text
   Document Root: /home/username/slfbc_app/public
   ```
3. This architecture guarantees that `.env`, application source code (`app/`), database schemas (`database/`), and private documents (`storage/documents/`) are completely inaccessible from the public web.

---

### Option B: Traditional Shared Hosting (`public_html` Root)

If your hosting plan restricts you to a fixed `public_html` document root:

1. Upload the non-public directories to your user home folder (one level above `public_html`):
   ```text
   /home/username/slfbc_core/
   ├── app/
   ├── bin/
   ├── config/
   ├── database/
   ├── routes/
   ├── storage/
   ├── .env
   ```
2. Upload the contents of the `public/` folder directly into `public_html`:
   ```text
   /home/username/public_html/
   ├── .htaccess
   ├── index.php
   ├── assets/
   │   ├── css/
   │   ├── js/
   │   └── images/
   └── uploads/
   ```
3. Update the root path in `/home/username/public_html/index.php`:
   ```php
   // Change:
   $rootDir = dirname(__DIR__);

   // To point to your core directory:
   $rootDir = '/home/username/slfbc_core';
   ```

---

## 3. MySQL Database Setup on cPanel

### Step 1: Create Database & User
1. Log in to your cPanel dashboard.
2. Navigate to **Databases** &rarr; **MySQL Database Wizard**.
3. **Step 1:** Enter a database name (e.g., `username_slfbc_portal`). Click **Next Step**.
4. **Step 2:** Create a dedicated database user (e.g., `username_slfbc_usr`). Generate a strong password (at least 20 characters with uppercase, lowercase, numbers, and symbols). Save this password for your `.env` configuration.
5. **Step 3:** Assign user permissions. Check **ALL PRIVILEGES** and click **Make Changes**.

### Step 2: Import Schema & Initial Seed Data
1. Open **phpMyAdmin** from your cPanel dashboard.
2. Select your newly created database (`username_slfbc_portal`) in the left navigation pane.
3. Click the **Import** tab in the top menu.
4. Click **Choose File** and select `database/schema.sql` from your local copy.
5. Click **Import** at the bottom. Verify that all 11 tables are created successfully:
   - `admins`
   - `login_attempts`
   - `sectors`
   - `members`
   - `news_categories`
   - `news`
   - `events`
   - `membership_applications`
   - `application_documents`
   - `contact_enquiries`
   - `leadership`
   - `business_opportunities`
   - `gallery_items`
   - `site_settings`
6. Repeat the import step for `database/seeds.sql` to populate verified initial members, news, leadership, and site settings.

---

## 4. Environment Configuration (`.env`)

In the application root directory (where `config/` resides), create a production `.env` file based on `.env.example`:

```ini
# Application Configuration
APP_NAME="Sri Lanka–France Business Council"
APP_ENV="production"
APP_DEBUG="false"
APP_URL="https://slfbc.lk"
APP_SECRET="generate-a-random-64-character-hexadecimal-secret-key-here"

# Database Configuration (MySQL / MariaDB)
DB_CONNECTION="mysql"
DB_HOST="localhost"
DB_PORT="3306"
DB_DATABASE="username_slfbc_portal"
DB_USERNAME="username_slfbc_usr"
DB_PASSWORD="your-secure-mysql-password"
DB_CHARSET="utf8mb4"

# Session Security
SESSION_LIFETIME="7200"
SESSION_COOKIE_NAME="slfbc_sess_secure"
SESSION_SECURE="true"

# SMTP Mail Delivery (cPanel Webmail or Corporate SMTP)
MAIL_DRIVER="smtp"
MAIL_HOST="mail.slfbc.lk"
MAIL_PORT="465"
MAIL_USERNAME="info@slfbc.lk"
MAIL_PASSWORD="your-mailbox-password"
MAIL_ENCRYPTION="ssl"
MAIL_FROM_ADDRESS="info@slfbc.lk"
MAIL_FROM_NAME="SLFBC Secretariat"
SECRETARIAT_NOTIFY_EMAIL="slfbc@chamber.lk"

# Security & Rate Limiting
LOGIN_RATE_LIMIT_ATTEMPTS="5"
LOGIN_RATE_LIMIT_MINUTES="15"
MAX_UPLOAD_SIZE_MB="10"
```

> **Security Alert:** Ensure `APP_DEBUG` is set to `false` in production to prevent leaking PHP stack traces or database errors to site visitors.

---

## 5. File System Permissions

Configure the following file permissions in cPanel File Manager or via SSH:

| Directory / File | Recommended Permission | Purpose |
|---|---|---|
| `storage/` | `0755` | Writable by PHP for logs and document storage |
| `storage/documents/` | `0750` | Private applicant files (strictly non-public) |
| `public/uploads/` | `0755` | Writable for member logos and news covers |
| `.env` | `0600` or `0644` | Protected configuration file |
| `app/`, `config/`, `routes/` | `0755` (dirs) / `0644` (files) | Application code |

---

## 6. Apache Rewrite & Security Directives (`.htaccess`)

Verify that the `.htaccess` file in your public document root contains the following directives:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On

    # Enforce HTTPS
    RewriteCond %{HTTPS} !=on
    RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

    # Handle Front Controller
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^ index.php [QSA,L]
</IfModule>

# Security Headers
<IfModule mod_headers.c>
    Header always set X-Content-Type-Options "nosniff"
    Header always set X-Frame-Options "SAMEORIGIN"
    Header always set X-XSS-Protection "1; mode=block"
    Header always set Referrer-Policy "strict-origin-when-cross-origin"
</IfModule>

# Block access to hidden files and directories
<FilesMatch "^\.">
    Order allow,deny
    Deny from all
</FilesMatch>
```

---

## 7. Post-Deployment Verification Checklist

1. [ ] **Public Portal Check:** Navigate to `https://slfbc.lk/` and verify that the homepage loads with bilateral graphics and styling.
2. [ ] **SSL Redirection:** Verify that entering `http://slfbc.lk/` automatically redirects to `https://slfbc.lk/`.
3. [ ] **Member Directory:** Test search and filtering at `https://slfbc.lk/members`.
4. [ ] **Administrative Access:** Navigate to `https://slfbc.lk/admin/login` and log in with the seeded credentials.
5. [ ] **Password Change:** Immediately update the super administrator password in `/admin/settings` or via `bin/create-admin.php`.
6. [ ] **Document Storage Test:** Submit a test membership application with a PDF attachment at `/membership/apply`. Log into `/admin/applications` and verify the file can be downloaded through the secure streaming endpoint.
7. [ ] **Sitemap Verification:** Inspect `https://slfbc.lk/sitemap.xml` and submit to Google Search Console.
8. [ ] **Robots Policy:** Inspect `https://slfbc.lk/robots.txt` to verify crawler access rules.
