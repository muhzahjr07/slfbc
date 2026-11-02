<?php

declare(strict_types=1);

/**
 * Secure Administrative User Creation Utility
 * Sri Lanka–France Business Council
 * 
 * Usage:
 *   php bin/create-admin.php "Officer Name" "officer@chamber.lk" "StrongPassword123!" [role]
 * Or execute interactively:
 *   php bin/create-admin.php
 */

if (php_sapi_name() !== 'cli') {
    die("This security script can only be executed via the command line interface.\n");
}

$rootDir = dirname(__DIR__);
$config = require $rootDir . '/config/config.php';
require_once $rootDir . '/app/Core/App.php';

// Bootstrap environment
$app = new \App\Core\App($config);

echo "\n=======================================================\n";
echo " SLFBC Secretariat - Administrator Provisioning Tool\n";
echo "=======================================================\n\n";

$name = $argv[1] ?? null;
$email = $argv[2] ?? null;
$password = $argv[3] ?? null;
$role = $argv[4] ?? 'super_admin';

if (!$name || !$email || !$password) {
    echo "Interactive Provisioning Mode:\n";
    echo "-------------------------------\n";
    
    echo "Full Officer Name: ";
    $name = trim((string)fgets(STDIN));

    echo "Official Email Address: ";
    $email = trim((string)fgets(STDIN));

    echo "Administrative Password: ";
    $password = trim((string)fgets(STDIN));

    echo "Role (super_admin / editor / reviewer) [default: super_admin]: ";
    $inputRole = trim((string)fgets(STDIN));
    if (!empty($inputRole)) {
        $role = $inputRole;
    }
}

if (empty($name) || empty($email) || empty($password)) {
    echo "\n[ERROR] Name, email, and password are required to provision an administrator.\n";
    exit(1);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "\n[ERROR] Invalid email address format: {$email}\n";
    exit(1);
}

if (strlen($password) < 8) {
    echo "\n[ERROR] Password must be at least 8 characters long for institutional security.\n";
    exit(1);
}

try {
    $pdo = \App\Core\Database::getConnection();
    
    // Check if email already exists
    $stmt = $pdo->prepare("SELECT id FROM admins WHERE email = ? LIMIT 1");
    $stmt->execute([$email]);
    $existing = $stmt->fetch();

    if ($existing) {
        // Update password
        \App\Models\AdminUser::updatePassword((int)$existing['id'], $password);
        echo "\n[SUCCESS] Administrator account {$email} already existed. Password updated successfully.\n";
    } else {
        $id = \App\Models\AdminUser::create($name, $email, $password, $role);
        echo "\n[SUCCESS] Administrator account successfully created!\n";
        echo " - Admin ID : {$id}\n";
        echo " - Name     : {$name}\n";
        echo " - Email    : {$email}\n";
        echo " - Role     : {$role}\n";
    }

    echo "\nYou may now log in securely at: " . $config['app']['url'] . "/admin/login\n\n";
    exit(0);
} catch (\Throwable $e) {
    echo "\n[FATAL ERROR] Failed to provision administrator: " . $e->getMessage() . "\n\n";
    exit(1);
}
