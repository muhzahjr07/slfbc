<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class MembershipApplication
{
    public static function create(array $data): int
    {
        $pdo = Database::getConnection();
        $ref = 'SLFBC-APP-' . date('Ymd') . '-' . strtoupper(substr(bin2hex(random_bytes(3)), 0, 5));

        $sql = "INSERT INTO membership_applications (
            reference_no, company_name, business_reg_no, year_established, sector, origin,
            primary_corridor, membership_tier_requested, corporate_email, phone, website,
            registered_address, contact_person_name, contact_person_designation, contact_person_email,
            contact_person_phone, recommender_1_name, recommender_1_company, recommender_2_name,
            recommender_2_company, status, created_at
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending', datetime('now'))";

        if ($pdo->getAttribute(PDO::ATTR_DRIVER_NAME) !== 'sqlite') {
            $sql = str_replace("datetime('now')", "NOW()", $sql);
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $ref,
            $data['company_name'],
            $data['business_reg_no'],
            !empty($data['year_established']) ? (int)$data['year_established'] : null,
            $data['sector'],
            $data['origin'] ?? 'Sri Lanka',
            $data['primary_corridor'],
            $data['membership_tier_requested'] ?? 'Corporate',
            $data['corporate_email'],
            $data['phone'],
            $data['website'] ?? null,
            $data['registered_address'],
            $data['contact_person_name'],
            $data['contact_person_designation'],
            $data['contact_person_email'],
            $data['contact_person_phone'],
            $data['recommender_1_name'] ?? null,
            $data['recommender_1_company'] ?? null,
            $data['recommender_2_name'] ?? null,
            $data['recommender_2_company'] ?? null,
        ]);

        return (int)$pdo->lastInsertId();
    }

    public static function addDocument(
        int $applicationId,
        string $type,
        string $originalName,
        string $storedFilename,
        int $fileSize,
        string $mimeType
    ): int {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("INSERT INTO application_documents (application_id, document_type, original_name, stored_filename, file_size, mime_type)
                               VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$applicationId, $type, $originalName, $storedFilename, $fileSize, $mimeType]);
        return (int)$pdo->lastInsertId();
    }

    public static function find(int $id): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT a.*, adm.name as reviewer_name 
                               FROM membership_applications a 
                               LEFT JOIN admins adm ON a.reviewed_by_admin_id = adm.id 
                               WHERE a.id = ? LIMIT 1");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public static function getDocuments(int $applicationId): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM application_documents WHERE application_id = ? ORDER BY id ASC");
        $stmt->execute([$applicationId]);
        return $stmt->fetchAll();
    }

    public static function findDocument(int $docId): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM application_documents WHERE id = ? LIMIT 1");
        $stmt->execute([$docId]);
        return $stmt->fetch() ?: null;
    }

    public static function allAdmin(?string $status = null): array
    {
        $pdo = Database::getConnection();
        $sql = "SELECT a.*, adm.name as reviewer_name 
                FROM membership_applications a 
                LEFT JOIN admins adm ON a.reviewed_by_admin_id = adm.id";
        $params = [];

        if ($status && $status !== 'all') {
            $sql .= " WHERE a.status = ?";
            $params[] = $status;
        }

        $sql .= " ORDER BY a.created_at DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public static function updateStatus(int $id, string $status, ?string $adminNotes = null, ?int $adminId = null): bool
    {
        $pdo = Database::getConnection();
        $driver = $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
        $now = $driver === 'sqlite' ? "datetime('now')" : "NOW()";

        $sql = "UPDATE membership_applications SET 
                status = ?, admin_notes = ?, reviewed_by_admin_id = ?, decision_date = {$now} 
                WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$status, $adminNotes, $adminId, $id]);
    }

    public static function countPending(): int
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT COUNT(*) FROM membership_applications WHERE status = 'pending'");
        return (int)$stmt->fetchColumn();
    }
}
