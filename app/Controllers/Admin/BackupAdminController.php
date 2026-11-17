<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Database;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Core\View;
use PDO;

class BackupAdminController
{
    private const TABLES = [
        'sectors',
        'members',
        'news_categories',
        'news',
        'events',
        'membership_applications',
        'application_documents',
        'contact_enquiries',
        'leadership',
        'business_opportunities',
        'gallery_items',
        'site_settings',
    ];

    /**
     * Backup & Restore Control Center
     */
    public function index(Request $request, Response $response): string
    {
        $pdo = Database::getConnection();
        $tableCounts = [];
        $totalRecords = 0;

        foreach (self::TABLES as $table) {
            try {
                $stmt = $pdo->query("SELECT COUNT(*) FROM {$table}");
                $count = (int)$stmt->fetchColumn();
                $tableCounts[$table] = $count;
                $totalRecords += $count;
            } catch (\Throwable $e) {
                $tableCounts[$table] = 0;
            }
        }

        $rootDir = $GLOBALS['config']['app']['root_dir'] ?? dirname(__DIR__, 3);
        $siteImages = $this->scanDirectoryFiles($rootDir . '/public/assets/images');
        $uploadFiles = $this->scanDirectoryFiles($rootDir . '/public/uploads');
        $docFiles = $this->scanDirectoryFiles($rootDir . '/storage/documents');
        $snapshots = $this->listSavedSnapshots($rootDir . '/storage/backups');

        $driver = $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
        $sqliteSize = 0;
        $sqlitePath = $rootDir . '/storage/database.sqlite';
        if (file_exists($sqlitePath)) {
            $sqliteSize = (int)filesize($sqlitePath);
        }

        return View::render('admin.backups.index', [
            'pageTitle' => 'All-in-One Backup & Restore | SLFBC Administration',
            'tableCounts' => $tableCounts,
            'totalRecords' => $totalRecords,
            'driver' => strtoupper((string)$driver),
            'sqliteSize' => $sqliteSize,
            'uploadCount' => count($siteImages) + count($uploadFiles),
            'uploadBytes' => array_sum(array_column($siteImages, 'size')) + array_sum(array_column($uploadFiles, 'size')),
            'docCount' => count($docFiles),
            'docBytes' => array_sum(array_column($docFiles, 'size')),
            'snapshots' => $snapshots,
        ], 'admin');
    }

    /**
     * Download Full All-in-One ZIP Archive (Database + SQL Dump + Uploaded Media + Documents)
     */
    public function downloadZip(Request $request, Response $response): void
    {
        $rootDir = $GLOBALS['config']['app']['root_dir'] ?? dirname(__DIR__, 3);
        $bundle = $this->generateMasterBundle($rootDir);
        $sqlDump = $this->generateSqlDump($bundle['tables']);

        $entries = [
            [
                'name' => 'backup_bundle.json',
                'data' => (string)json_encode($bundle, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            ],
            [
                'name' => 'database_dump.sql',
                'data' => $sqlDump,
            ],
        ];

        $sqlitePath = $rootDir . '/storage/database.sqlite';
        if (file_exists($sqlitePath) && is_readable($sqlitePath)) {
            $entries[] = [
                'name' => 'database.sqlite',
                'data' => (string)file_get_contents($sqlitePath),
            ];
        }

        foreach (($bundle['files']['images'] ?? []) as $relPath => $fileInfo) {
            $entries[] = [
                'name' => 'assets/images/' . $relPath,
                'data' => (string)base64_decode($fileInfo['content_base64']),
            ];
        }

        foreach ($bundle['files']['uploads'] as $relPath => $fileInfo) {
            $entries[] = [
                'name' => 'uploads/' . $relPath,
                'data' => (string)base64_decode($fileInfo['content_base64']),
            ];
        }

        foreach ($bundle['files']['documents'] as $relPath => $fileInfo) {
            $entries[] = [
                'name' => 'documents/' . $relPath,
                'data' => (string)base64_decode($fileInfo['content_base64']),
            ];
        }

        $zipBinary = $this->buildZipArchive($entries);
        $filename = 'slfbc-all-in-one-backup-' . date('Y-m-d-His') . '.zip';

        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . strlen($zipBinary));
        header('Cache-Control: no-store, no-cache, must-revalidate');
        echo $zipBinary;
    }

    /**
     * Download Portable All-in-One JSON Bundle (Database + Base64 Embedded Files)
     */
    public function downloadJson(Request $request, Response $response): void
    {
        $rootDir = $GLOBALS['config']['app']['root_dir'] ?? dirname(__DIR__, 3);
        $bundle = $this->generateMasterBundle($rootDir);
        $json = (string)json_encode($bundle, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $filename = 'slfbc-all-in-one-bundle-' . date('Y-m-d-His') . '.json';

        header('Content-Type: application/json; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . strlen($json));
        header('Cache-Control: no-store, no-cache, must-revalidate');
        echo $json;
    }

    /**
     * Download SQL Database Dump (.sql) for cPanel phpMyAdmin / MySQL / SQLite
     */
    public function downloadSql(Request $request, Response $response): void
    {
        $rootDir = $GLOBALS['config']['app']['root_dir'] ?? dirname(__DIR__, 3);
        $bundle = $this->generateMasterBundle($rootDir, false);
        $sql = $this->generateSqlDump($bundle['tables']);
        $filename = 'slfbc-database-dump-' . date('Y-m-d-His') . '.sql';

        header('Content-Type: application/sql; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . strlen($sql));
        header('Cache-Control: no-store, no-cache, must-revalidate');
        echo $sql;
    }

    /**
     * Create an Instant Server Snapshot inside storage/backups/
     */
    public function createSnapshot(Request $request, Response $response): void
    {
        $rootDir = $GLOBALS['config']['app']['root_dir'] ?? dirname(__DIR__, 3);
        $backupDir = $rootDir . '/storage/backups';
        if (!is_dir($backupDir)) {
            mkdir($backupDir, 0775, true);
        }

        $bundle = $this->generateMasterBundle($rootDir);
        $filename = 'snapshot-' . date('Y-m-d-His') . '.json';
        $fullPath = $backupDir . '/' . $filename;

        file_put_contents($fullPath, json_encode($bundle, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));

        Session::flash('success', "Server snapshot '{$filename}' created successfully (Database + Uploaded Files).");
        $response->redirect(View::url('admin/backups'));
    }

    /**
     * Restore from a Saved Server Snapshot or Uploaded Backup File (.json or .zip)
     */
    public function restore(Request $request, Response $response): void
    {
        $rootDir = $GLOBALS['config']['app']['root_dir'] ?? dirname(__DIR__, 3);
        $snapshotName = trim((string)($request->post('snapshot_file') ?? ''));
        $bundleData = null;

        if ($snapshotName !== '') {
            $safeName = basename($snapshotName);
            $snapshotPath = $rootDir . '/storage/backups/' . $safeName;
            if (!file_exists($snapshotPath)) {
                Session::flash('error', 'Selected snapshot file could not be found.');
                $response->redirect(View::url('admin/backups'));
                return;
            }
            $raw = (string)file_get_contents($snapshotPath);
            $bundleData = json_decode($raw, true);
        } else {
            $uploaded = $_FILES['backup_file'] ?? null;
            if (!$uploaded || ($uploaded['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
                Session::flash('error', 'Please select a valid .json or .zip backup file to restore.');
                $response->redirect(View::url('admin/backups'));
                return;
            }

            $raw = (string)file_get_contents($uploaded['tmp_name']);
            $ext = strtolower(pathinfo((string)$uploaded['name'], PATHINFO_EXTENSION));

            if ($ext === 'zip' || str_starts_with($raw, "PK\x03\x04")) {
                $extractedJson = $this->extractFileFromZipBinary($raw, 'backup_bundle.json');
                if ($extractedJson !== null) {
                    $bundleData = json_decode($extractedJson, true);
                }
            } else {
                $bundleData = json_decode($raw, true);
            }
        }

        if (!is_array($bundleData) || empty($bundleData['tables']) || !is_array($bundleData['tables'])) {
            Session::flash('error', 'Invalid or corrupted backup archive. Missing table manifest.');
            $response->redirect(View::url('admin/backups'));
            return;
        }

        try {
            $restoredCounts = $this->applyBundleRestore($bundleData, $rootDir);
            Session::flash('success', sprintf(
                'All-in-One Restore completed: %d database records and %d media/document files restored.',
                $restoredCounts['records'],
                $restoredCounts['files']
            ));
        } catch (\Throwable $e) {
            Session::flash('error', 'Restore failed: ' . $e->getMessage());
        }

        $response->redirect(View::url('admin/backups'));
    }

    /**
     * Download or Delete a Saved Server Snapshot
     */
    public function manageSnapshot(Request $request, Response $response): void
    {
        $rootDir = $GLOBALS['config']['app']['root_dir'] ?? dirname(__DIR__, 3);
        $action = (string)($request->post('action') ?? '');
        $file = basename((string)($request->post('snapshot_file') ?? ''));
        $path = $rootDir . '/storage/backups/' . $file;

        if ($file === '' || !file_exists($path)) {
            Session::flash('error', 'Snapshot file not found.');
            $response->redirect(View::url('admin/backups'));
            return;
        }

        if ($action === 'delete') {
            @unlink($path);
            Session::flash('success', "Snapshot '{$file}' deleted.");
            $response->redirect(View::url('admin/backups'));
            return;
        }

        if ($action === 'download') {
            $data = (string)file_get_contents($path);
            header('Content-Type: application/json; charset=utf-8');
            header('Content-Disposition: attachment; filename="' . $file . '"');
            header('Content-Length: ' . strlen($data));
            echo $data;
            return;
        }

        $response->redirect(View::url('admin/backups'));
    }

    /**
     * Assemble complete Master Bundle (All tables + Base64 uploaded files)
     */
    public function generateMasterBundle(string $rootDir, bool $includeFiles = true): array
    {
        $pdo = Database::getConnection();
        $tablesData = [];

        foreach (self::TABLES as $table) {
            try {
                $stmt = $pdo->query("SELECT * FROM {$table}");
                $tablesData[$table] = $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
            } catch (\Throwable $e) {
                $tablesData[$table] = [];
            }
        }

        $imagesMap = [];
        $uploadsMap = [];
        $docsMap = [];

        if ($includeFiles) {
            foreach ($this->scanDirectoryFiles($rootDir . '/public/assets/images') as $f) {
                $imagesMap[$f['rel']] = [
                    'size' => $f['size'],
                    'content_base64' => base64_encode((string)file_get_contents($f['full'])),
                ];
            }
            foreach ($this->scanDirectoryFiles($rootDir . '/public/uploads') as $f) {
                $uploadsMap[$f['rel']] = [
                    'size' => $f['size'],
                    'content_base64' => base64_encode((string)file_get_contents($f['full'])),
                ];
            }
            foreach ($this->scanDirectoryFiles($rootDir . '/storage/documents') as $f) {
                $docsMap[$f['rel']] = [
                    'size' => $f['size'],
                    'content_base64' => base64_encode((string)file_get_contents($f['full'])),
                ];
            }
        }

        return [
            'meta' => [
                'generator' => 'SLFBC All-in-One Backup Engine v1.0',
                'created_at' => gmdate('Y-m-d\TH:i:s\Z'),
                'app_url' => $GLOBALS['config']['app']['url'] ?? '',
                'tables_count' => count($tablesData),
            ],
            'tables' => $tablesData,
            'files' => [
                'images' => $imagesMap,
                'uploads' => $uploadsMap,
                'documents' => $docsMap,
            ],
        ];
    }

    /**
     * Apply a full restore of database tables and embedded files
     */
    public function applyBundleRestore(array $bundleData, string $rootDir): array
    {
        $pdo = Database::getConnection();
        $driver = $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
        $restoredRecords = 0;
        $restoredFiles = 0;

        if ($driver === 'sqlite') {
            $pdo->exec('PRAGMA foreign_keys = OFF;');
        } else {
            $pdo->exec('SET FOREIGN_KEY_CHECKS = 0;');
        }

        $pdo->beginTransaction();
        try {
            foreach (self::TABLES as $table) {
                if (!isset($bundleData['tables'][$table]) || !is_array($bundleData['tables'][$table])) {
                    continue;
                }

                $rows = $bundleData['tables'][$table];
                $pdo->exec("DELETE FROM {$table}");

                foreach ($rows as $row) {
                    if (!is_array($row) || empty($row)) {
                        continue;
                    }
                    $cols = array_keys($row);
                    $placeholders = implode(', ', array_fill(0, count($cols), '?'));
                    $colList = implode(', ', $cols);
                    $stmt = $pdo->prepare("INSERT INTO {$table} ({$colList}) VALUES ({$placeholders})");
                    $stmt->execute(array_values($row));
                    $restoredRecords++;
                }
            }
            $pdo->commit();
        } catch (\Throwable $e) {
            $pdo->rollBack();
            throw $e;
        } finally {
            if ($driver === 'sqlite') {
                $pdo->exec('PRAGMA foreign_keys = ON;');
            } else {
                $pdo->exec('SET FOREIGN_KEY_CHECKS = 1;');
            }
        }

        // Restore site & uploaded images (public/assets/images/*)
        $images = $bundleData['files']['images'] ?? [];
        if (is_array($images)) {
            foreach ($images as $relPath => $info) {
                $safeRel = ltrim(str_replace(['..', '\\'], ['', '/'], (string)$relPath), '/');
                if ($safeRel === '' || empty($info['content_base64'])) {
                    continue;
                }
                $dest = $rootDir . '/public/assets/images/' . $safeRel;
                if (!is_dir(dirname($dest))) {
                    mkdir(dirname($dest), 0775, true);
                }
                file_put_contents($dest, base64_decode((string)$info['content_base64']));
                $restoredFiles++;
            }
        }

        // Restore uploaded files
        $uploads = $bundleData['files']['uploads'] ?? [];
        if (is_array($uploads)) {
            foreach ($uploads as $relPath => $info) {
                $safeRel = ltrim(str_replace(['..', '\\'], ['', '/'], (string)$relPath), '/');
                if ($safeRel === '' || empty($info['content_base64'])) {
                    continue;
                }
                $dest = $rootDir . '/public/uploads/' . $safeRel;
                if (!is_dir(dirname($dest))) {
                    mkdir(dirname($dest), 0775, true);
                }
                file_put_contents($dest, base64_decode((string)$info['content_base64']));
                $restoredFiles++;
            }
        }

        $docs = $bundleData['files']['documents'] ?? [];
        if (is_array($docs)) {
            foreach ($docs as $relPath => $info) {
                $safeRel = ltrim(str_replace(['..', '\\'], ['', '/'], (string)$relPath), '/');
                if ($safeRel === '' || empty($info['content_base64'])) {
                    continue;
                }
                $dest = $rootDir . '/storage/documents/' . $safeRel;
                if (!is_dir(dirname($dest))) {
                    mkdir(dirname($dest), 0775, true);
                }
                file_put_contents($dest, base64_decode((string)$info['content_base64']));
                $restoredFiles++;
            }
        }

        return [
            'records' => $restoredRecords,
            'files' => $restoredFiles,
        ];
    }

    /**
     * Generate SQL Dump compatible with cPanel phpMyAdmin (MySQL) & SQLite
     */
    private function generateSqlDump(array $tablesData): string
    {
        $pdo = Database::getConnection();
        $out = "-- =========================================================================\n";
        $out .= "-- Sri Lanka-France Business Council (SLFBC) Database Dump\n";
        $out .= "-- Generated: " . gmdate('Y-m-d H:i:s \U\T\C') . "\n";
        $out .= "-- Compatible with cPanel MySQL / MariaDB & SQLite\n";
        $out .= "-- =========================================================================\n\n";

        foreach ($tablesData as $table => $rows) {
            $out .= "-- Table: {$table} (" . count($rows) . " rows)\n";
            $out .= "DELETE FROM {$table};\n";
            foreach ($rows as $row) {
                $cols = implode(', ', array_keys($row));
                $vals = array_map(function ($val) use ($pdo) {
                    if ($val === null) {
                        return 'NULL';
                    }
                    if (is_int($val) || is_float($val)) {
                        return (string)$val;
                    }
                    return $pdo->quote((string)$val);
                }, array_values($row));
                $out .= "INSERT INTO {$table} ({$cols}) VALUES (" . implode(', ', $vals) . ");\n";
            }
            $out .= "\n";
        }

        return $out;
    }

    /**
     * Pure-PHP PKZIP Archive Builder (Works without ext-zip)
     */
    private function buildZipArchive(array $entries): string
    {
        $localParts = [];
        $centralParts = [];
        $offset = 0;
        $count = 0;

        foreach ($entries as $entry) {
            $name = str_replace('\\', '/', (string)$entry['name']);
            $data = (string)$entry['data'];
            $uncLen = strlen($data);
            $crc = crc32($data);
            $compData = gzdeflate($data, 6);
            $compLen = strlen($compData);

            // Local file header
            $localHeader = pack(
                'VvvvvvVVVvv',
                0x04034b50,
                20,
                0,
                8,
                0,
                0,
                $crc,
                $compLen,
                $uncLen,
                strlen($name),
                0
            ) . $name;

            $localParts[] = $localHeader . $compData;

            // Central directory header
            $centralHeader = pack(
                'VvvvvvvVVVvvvvvVV',
                0x02014b50,
                20,
                20,
                0,
                8,
                0,
                0,
                $crc,
                $compLen,
                $uncLen,
                strlen($name),
                0,
                0,
                0,
                0,
                32,
                $offset
            ) . $name;

            $centralParts[] = $centralHeader;
            $offset += strlen($localHeader) + $compLen;
            $count++;
        }

        $centralDir = implode('', $centralParts);
        $endOfCentral = pack(
            'VvvvvVVv',
            0x06054b50,
            0,
            0,
            $count,
            $count,
            strlen($centralDir),
            $offset,
            0
        );

        return implode('', $localParts) . $centralDir . $endOfCentral;
    }

    /**
     * Pure-PHP PKZIP Single File Extractor (Extracts backup_bundle.json without ext-zip)
     */
    private function extractFileFromZipBinary(string $zipBinary, string $targetName): ?string
    {
        $pos = 0;
        $len = strlen($zipBinary);

        while ($pos + 30 <= $len) {
            $sig = substr($zipBinary, $pos, 4);
            if ($sig !== "PK\x03\x04") {
                break;
            }
            $header = unpack('vver/vflag/vmethod/vtime/vdate/Vcrc/VcompSize/VuncSize/vnameLen/vextraLen', substr($zipBinary, $pos + 4, 26));
            $name = substr($zipBinary, $pos + 30, $header['nameLen']);
            $dataPos = $pos + 30 + $header['nameLen'] + $header['extraLen'];
            $compData = substr($zipBinary, $dataPos, $header['compSize']);

            if ($name === $targetName) {
                if ($header['method'] === 0) {
                    return $compData;
                }
                if ($header['method'] === 8) {
                    $inflated = @gzinflate($compData);
                    return $inflated !== false ? $inflated : null;
                }
            }

            $pos = $dataPos + $header['compSize'];
        }

        return null;
    }

    private function scanDirectoryFiles(string $dir): array
    {
        if (!is_dir($dir)) {
            return [];
        }
        $result = [];
        $it = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($dir, \FilesystemIterator::SKIP_DOTS)
        );
        $normDir = rtrim(str_replace('\\', '/', $dir), '/') . '/';
        foreach ($it as $fileInfo) {
            if (!$fileInfo->isFile()) {
                continue;
            }
            $filename = $fileInfo->getFilename();
            if ($filename === '.gitkeep' || $filename === '.htaccess') {
                continue;
            }
            $full = $fileInfo->getPathname();
            $normFull = str_replace('\\', '/', $full);
            $rel = str_starts_with($normFull, $normDir) ? substr($normFull, strlen($normDir)) : $filename;
            $result[] = [
                'full' => $full,
                'rel' => $rel,
                'size' => (int)$fileInfo->getSize(),
            ];
        }
        return $result;
    }

    private function listSavedSnapshots(string $backupDir): array
    {
        if (!is_dir($backupDir)) {
            return [];
        }
        $files = glob($backupDir . '/snapshot-*.json') ?: [];
        rsort($files);
        $list = [];
        foreach ($files as $file) {
            $list[] = [
                'name' => basename($file),
                'size' => (int)filesize($file),
                'modified' => (int)filemtime($file),
            ];
        }
        return $list;
    }
}

