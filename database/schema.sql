-- ====================================================================
-- Sri Lanka–France Business Council (SLFBC) Portal
-- Production MySQL 8+ / MariaDB Database Schema
-- Affiliated with The Ceylon Chamber of Commerce
-- ====================================================================

SET FOREIGN_KEY_CHECKS = 0;

-- 1. Administrators Table
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(150) NOT NULL,
  `email` VARCHAR(191) NOT NULL UNIQUE,
  `password_hash` VARCHAR(255) NOT NULL,
  `role` ENUM('super_admin', 'editor', 'secretary') NOT NULL DEFAULT 'super_admin',
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `last_login_at` DATETIME NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Login Throttling / Brute Force Protection
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `ip_address` VARCHAR(45) NOT NULL,
  `attempted_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_ip_time` (`ip_address`, `attempted_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Sectors Table
DROP TABLE IF EXISTS `sectors`;
CREATE TABLE `sectors` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(120) NOT NULL UNIQUE,
  `slug` VARCHAR(120) NOT NULL UNIQUE,
  `display_order` INT NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. Member Companies Directory
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL UNIQUE,
  `sector_id` INT UNSIGNED NULL,
  `tier` ENUM('patron', 'corporate', 'associate', 'overseas_affiliate') NOT NULL DEFAULT 'corporate',
  `origin` VARCHAR(100) NOT NULL DEFAULT 'Sri Lanka',
  `logo_path` VARCHAR(255) NULL,
  `short_description` TEXT NULL,
  `full_profile` MEDIUMTEXT NULL,
  `website_url` VARCHAR(255) NULL,
  `contact_email` VARCHAR(191) NULL,
  `contact_phone` VARCHAR(50) NULL,
  `is_featured` TINYINT(1) NOT NULL DEFAULT 0,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `display_order` INT NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT `fk_member_sector` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`) ON DELETE SET NULL,
  INDEX `idx_member_search` (`name`, `is_active`, `is_featured`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. News Categories Table
DROP TABLE IF EXISTS `news_categories`;
CREATE TABLE `news_categories` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL UNIQUE,
  `slug` VARCHAR(100) NOT NULL UNIQUE,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 6. News & Announcements Table
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `category_id` INT UNSIGNED NULL,
  `title` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL UNIQUE,
  `excerpt` TEXT NULL,
  `content` MEDIUMTEXT NOT NULL,
  `cover_image` VARCHAR(255) NULL,
  `author` VARCHAR(150) NOT NULL DEFAULT 'SLFBC Secretariat',
  `published_at` DATETIME NULL,
  `status` ENUM('draft', 'published', 'archived') NOT NULL DEFAULT 'draft',
  `is_featured` TINYINT(1) NOT NULL DEFAULT 0,
  `meta_title` VARCHAR(255) NULL,
  `meta_description` TEXT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT `fk_news_category` FOREIGN KEY (`category_id`) REFERENCES `news_categories` (`id`) ON DELETE SET NULL,
  INDEX `idx_news_status` (`status`, `published_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 7. Events Table
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL UNIQUE,
  `category` VARCHAR(100) NOT NULL DEFAULT 'Summit',
  `start_datetime` DATETIME NOT NULL,
  `end_datetime` DATETIME NULL,
  `venue` VARCHAR(255) NOT NULL,
  `location_city` VARCHAR(100) NOT NULL DEFAULT 'Colombo',
  `summary` TEXT NULL,
  `description` MEDIUMTEXT NOT NULL,
  `cover_image` VARCHAR(255) NULL,
  `registration_url` VARCHAR(255) NULL,
  `registration_status` ENUM('open', 'closed', 'by_invitation') NOT NULL DEFAULT 'open',
  `status` ENUM('draft', 'published', 'archived') NOT NULL DEFAULT 'published',
  `report_summary` TEXT NULL,
  `meta_title` VARCHAR(255) NULL,
  `meta_description` TEXT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_event_schedule` (`status`, `start_datetime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 8. Membership Applications Table
DROP TABLE IF EXISTS `membership_applications`;
CREATE TABLE `membership_applications` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `reference_no` VARCHAR(50) NOT NULL UNIQUE,
  `company_name` VARCHAR(255) NOT NULL,
  `business_reg_no` VARCHAR(100) NOT NULL,
  `year_established` INT NULL,
  `sector` VARCHAR(100) NOT NULL,
  `origin` VARCHAR(100) NOT NULL DEFAULT 'Sri Lanka',
  `primary_corridor` VARCHAR(150) NOT NULL,
  `membership_tier_requested` VARCHAR(50) NOT NULL DEFAULT 'Corporate',
  `corporate_email` VARCHAR(191) NOT NULL,
  `phone` VARCHAR(50) NOT NULL,
  `website` VARCHAR(255) NULL,
  `registered_address` TEXT NOT NULL,
  `contact_person_name` VARCHAR(150) NOT NULL,
  `contact_person_designation` VARCHAR(150) NOT NULL,
  `contact_person_email` VARCHAR(191) NOT NULL,
  `contact_person_phone` VARCHAR(50) NOT NULL,
  `recommender_1_name` VARCHAR(150) NULL,
  `recommender_1_company` VARCHAR(150) NULL,
  `recommender_2_name` VARCHAR(150) NULL,
  `recommender_2_company` VARCHAR(150) NULL,
  `status` ENUM('pending', 'under_review', 'approved', 'rejected') NOT NULL DEFAULT 'pending',
  `admin_notes` TEXT NULL,
  `reviewed_by_admin_id` INT UNSIGNED NULL,
  `decision_date` DATETIME NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT `fk_app_admin` FOREIGN KEY (`reviewed_by_admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  INDEX `idx_app_status` (`status`, `created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 9. Application Documents Table (Secure, non-public storage)
DROP TABLE IF EXISTS `application_documents`;
CREATE TABLE `application_documents` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `application_id` INT UNSIGNED NOT NULL,
  `document_type` VARCHAR(100) NOT NULL,
  `original_name` VARCHAR(255) NOT NULL,
  `stored_filename` VARCHAR(255) NOT NULL,
  `file_size` INT UNSIGNED NOT NULL,
  `mime_type` VARCHAR(100) NOT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT `fk_app_doc_parent` FOREIGN KEY (`application_id`) REFERENCES `membership_applications` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 10. Contact Enquiries Table
DROP TABLE IF EXISTS `contact_enquiries`;
CREATE TABLE `contact_enquiries` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(150) NOT NULL,
  `company` VARCHAR(150) NULL,
  `email` VARCHAR(191) NOT NULL,
  `phone` VARCHAR(50) NULL,
  `subject_category` VARCHAR(100) NOT NULL,
  `message` TEXT NOT NULL,
  `ip_address` VARCHAR(45) NULL,
  `is_read` TINYINT(1) NOT NULL DEFAULT 0,
  `status` ENUM('new', 'in_progress', 'resolved', 'archived') NOT NULL DEFAULT 'new',
  `internal_notes` TEXT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_enquiry_status` (`is_read`, `status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 11. Leadership & Executive Committee Table
DROP TABLE IF EXISTS `leadership`;
CREATE TABLE `leadership` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `term_year` VARCHAR(50) NOT NULL DEFAULT '2025/26',
  `category` ENUM('president', 'vice_president', 'officer', 'committee_member', 'institutional_representative') NOT NULL,
  `role_title` VARCHAR(150) NOT NULL,
  `name` VARCHAR(150) NOT NULL,
  `organization` VARCHAR(200) NOT NULL,
  `bio` TEXT NULL,
  `portrait_path` VARCHAR(255) NULL,
  `display_order` INT NOT NULL DEFAULT 0,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 12. Business Opportunities Table
DROP TABLE IF EXISTS `business_opportunities`;
CREATE TABLE `business_opportunities` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL UNIQUE,
  `track` VARCHAR(100) NOT NULL,
  `icon` VARCHAR(50) NOT NULL DEFAULT 'account_balance',
  `corridor` ENUM('bilateral', 'inward_sri_lanka', 'outward_france') NOT NULL DEFAULT 'bilateral',
  `summary` TEXT NOT NULL,
  `details` MEDIUMTEXT NULL,
  `status_label` VARCHAR(100) NOT NULL DEFAULT 'Active Project Pipeline',
  `is_featured` TINYINT(1) NOT NULL DEFAULT 1,
  `display_order` INT NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 13. Photo Gallery & Media Table
DROP TABLE IF EXISTS `gallery_items`;
CREATE TABLE `gallery_items` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `category` VARCHAR(100) NOT NULL DEFAULT 'Summits',
  `image_path` VARCHAR(255) NOT NULL,
  `caption` TEXT NULL,
  `event_date` DATE NULL,
  `display_order` INT NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 14. Site Settings Key-Value Table
DROP TABLE IF EXISTS `site_settings`;
CREATE TABLE `site_settings` (
  `key_name` VARCHAR(100) PRIMARY KEY,
  `key_value` TEXT NULL,
  `description` VARCHAR(255) NULL,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;
