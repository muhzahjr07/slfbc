# MySQL & MariaDB Database Operations Manual
## Sri Lanka–France Business Council (SLFBC) Portal

This guide details database architecture, installation, schema migration, scheduled backup procedures, and disaster recovery for the **Sri Lanka–France Business Council (SLFBC)** portal.

---

## 1. Database Architecture & Schema Overview

The database is built on a normalized relational schema designed for MySQL 8.0+ and MariaDB 10.4+, using the `InnoDB` storage engine and `utf8mb4` character set (`utf8mb4_unicode_ci` collation) for full multilingual character support.

### Table Inventory

| Table Name | Primary Purpose | Key Relationships / Foreign Keys |
|---|---|---|
| `admins` | Administrative personnel authorized to access `/admin` | Used in audit notes |
| `login_attempts` | IP-based tracking for brute-force rate-limiting | Indexed by `(ip_address, attempted_at)` |
| `sectors` | Industry and commercial classifications | Referenced by `members.sector_id` |
| `members` | Corporate members directory and profiles | Foreign key &rarr; `sectors.id` (ON DELETE SET NULL) |
| `news_categories` | Communiqué classifications | Referenced by `news.category_id` |
| `news` | Chamber announcements, dispatches, and reports | Foreign key &rarr; `news_categories.id` (ON DELETE SET NULL) |
| `events` | Bilateral summits, forums, and networking sessions | Indexed by `start_datetime`, `status` |
| `membership_applications` | Inbound corporate membership applications | Referenced by `application_documents.application_id` |
| `application_documents` | Confidential uploaded registration documents | Foreign key &rarr; `membership_applications.id` (ON DELETE CASCADE) |
| `contact_enquiries` | General public and trade facilitation inquiries | Indexed by `is_read`, `created_at` |
| `leadership` | Executive Committee members, officers, and terms | Indexed by `term_year`, `display_order` |
| `business_opportunities` | Priority investment and commercial project tracks | Indexed by `is_featured`, `display_order` |
| `gallery_items` | Protocol media, delegation photos, and captions | Indexed by `category`, `event_date` |
| `site_settings` | Global Secretariat telephone, address, and alerts | Key-value store (`key_name` PRIMARY KEY) |

---

## 2. Installation & Import Instructions

### Via Command-Line Interface (CLI / SSH)

1. Log into your server terminal via SSH.
2. Create the target database (if not already provisioned):
   ```bash
   mysql -u root -p -e "CREATE DATABASE slfbc_portal CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
   ```
3. Import the database schema:
   ```bash
   mysql -u root -p slfbc_portal < database/schema.sql
   ```
4. Import the verified seed dataset:
   ```bash
   mysql -u root -p slfbc_portal < database/seeds.sql
   ```

### Via phpMyAdmin (cPanel Web Interface)

1. Open **phpMyAdmin** from your cPanel home screen.
2. Click on the target database name in the left panel.
3. Click the **Import** tab at the top.
4. Select `database/schema.sql` and click **Import**.
5. Repeat for `database/seeds.sql` to populate verified members, initial events, and news records.

---

## 3. Automated Backup Procedures

To guarantee business continuity and protect corporate membership registers, configure an automated daily database backup via cPanel Cron Jobs or server cron:

### Recommended Daily Cron Command
In cPanel **Cron Jobs**, set the schedule to run daily at 02:00 AM:

```bash
/usr/bin/mysqldump --defaults-extra-file=/home/username/.my.cnf --single-transaction --quick --lock-tables=false username_slfbc_portal | gzip > /home/username/backups/slfbc_db_$(date +\%F_\%H\%M).sql.gz
```

### Secure Credentials File (`~/.my.cnf`)
Avoid embedding cleartext database passwords directly into cron commands. Create a protected configuration file at `/home/username/.my.cnf` (permission `0600`):

```ini
[client]
user = "username_slfbc_usr"
password = "your-secure-mysql-password"
host = "localhost"
```

### Rotating Retention Script
To automatically purge backups older than 30 days and save disk space, add this secondary cron command:

```bash
find /home/username/backups/ -type f -name "slfbc_db_*.sql.gz" -mtime +30 -delete
```

---

## 4. Disaster Recovery & Database Restoration

In the event of hardware failure, database corruption, or accidental deletion:

1. Decompress and restore the latest verified backup file:
   ```bash
   gunzip < /home/username/backups/slfbc_db_2026-10-28_0200.sql.gz | mysql --defaults-extra-file=/home/username/.my.cnf username_slfbc_portal
   ```
2. Verify table integrity:
   ```bash
   mysqlcheck --defaults-extra-file=/home/username/.my.cnf --check --optimize --auto-repair username_slfbc_portal
   ```
3. Test administrative login and public directory loading to confirm that foreign key constraints and collation are intact.

---

## 5. Dual Database Engine Support (MySQL & SQLite)

The application includes an abstraction layer in `app/Core/Database.php` that dynamically supports:
- **MySQL / MariaDB (`DB_CONNECTION=mysql`):** Used in staging and production environments.
- **SQLite (`DB_CONNECTION=sqlite`):** Automatically initializes schema and seeds in `storage/database.sqlite` for zero-dependency local testing, CI/CD pipelines, and development without requiring an active MySQL daemon.

To toggle database engines, simply update `DB_CONNECTION` in your `.env` file.
