<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Database;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Core\Validator;
use App\Core\View;
use PDO;

class MediaAdminController
{
    private const CORE_SLOTS = [
        'bilateral-summit.jpg' => 'Hero Slide 1 / Summit Banner',
        'agm-governance.jpg' => 'Hero Slide 2 / 22nd AGM & Governance Banner',
        'corridor-maritime.jpg' => 'Hero Slide 3 / Maritime Corridor Banner',
        'investment-forum.jpg' => 'Hero Slide 4 / 2026 Investment Forum Banner',
        'president-shaameel.jpg' => 'President Shaameel Mohideen Official Portrait',
        'corridor-srilanka.jpg' => 'Why Sri Lanka Corridor Banner',
        'corridor-france.jpg' => 'Why France Corridor Banner',
        'chamber-building.jpg' => 'Ceylon Chamber Secretariat Building',
        'hero-bilateral.jpg' => 'About Us & Directory Hero Banner',
        'gallery-embassy.jpg' => 'French Embassy Diplomatic Reception',
        'gallery-b2b.jpg' => 'B2B Matchmaking & Membership Banner',
        'gallery-delegation.jpg' => 'Trade Delegation Photo',
        'opp-energy.jpg' => 'Opportunity Track: Renewable Energy',
        'opp-maritime.jpg' => 'Opportunity Track: Maritime Logistics',
        'opp-apparel.jpg' => 'Opportunity Track: Ethical Apparel',
        'opp-tourism.jpg' => 'Opportunity Track: Luxury Hospitality',
        'opp-tech.jpg' => 'Opportunity Track: ICT & AI Engineering',
        'opp-agri.jpg' => 'Opportunity Track: Ceylon Tea & Agribusiness',
        'news-logistics.jpg' => 'News Dispatch Cover Image',
        'event-gala.jpg' => 'Annual Gala Dinner Cover Image',
        'slfbc-logo.png' => 'Official SLFBC Header & Footer Logo (PNG)',
    ];

    public function index(Request $request, Response $response): string
    {
        $rootDir = $GLOBALS['config']['app']['root_dir'] ?? dirname(__DIR__, 3);
        $imgDir = $rootDir . '/public/assets/images';

        $slotItems = [];
        foreach (self::CORE_SLOTS as $filename => $label) {
            $fullPath = $imgDir . '/' . $filename;
            $exists = file_exists($fullPath);
            $slotItems[] = [
                'filename' => $filename,
                'label' => $label,
                'exists' => $exists,
                'size' => $exists ? (int)filesize($fullPath) : 0,
                'modified' => $exists ? (int)filemtime($fullPath) : 0,
            ];
        }

        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM gallery_items ORDER BY display_order ASC, id DESC");
        $galleryItems = $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];

        return View::render('admin.media.index', [
            'pageTitle' => 'Site Images & Media Gallery Manager | SLFBC Administration',
            'slotItems' => $slotItems,
            'galleryItems' => $galleryItems,
        ], 'admin');
    }

    /**
     * Replace a core site banner / hero / portrait image slot in-place
     */
    public function replaceSlot(Request $request, Response $response): void
    {
        $slotName = basename((string)($request->post('slot_filename') ?? ''));
        if (!array_key_exists($slotName, self::CORE_SLOTS)) {
            Session::flash('error', 'Invalid image slot selected.');
            $response->redirect(View::url('admin/media'));
            return;
        }

        $files = $request->files();
        if (!isset($files['replacement_image']) || $files['replacement_image']['error'] !== UPLOAD_ERR_OK) {
            Session::flash('error', 'Please select a valid image file to upload.');
            $response->redirect(View::url('admin/media'));
            return;
        }

        $err = Validator::validateFile(
            $files['replacement_image'],
            ['jpg', 'jpeg', 'png', 'webp'],
            5 * 1024 * 1024,
            ['image/jpeg', 'image/png', 'image/webp']
        );
        if ($err) {
            Session::flash('error', $err);
            $response->redirect(View::url('admin/media'));
            return;
        }

        $rootDir = $GLOBALS['config']['app']['root_dir'] ?? dirname(__DIR__, 3);
        $destPath = $rootDir . '/public/assets/images/' . $slotName;

        if (move_uploaded_file($files['replacement_image']['tmp_name'], $destPath)) {
            Session::flash('success', 'Replaced site image "' . self::CORE_SLOTS[$slotName] . '" (' . $slotName . ') successfully.');
        } else {
            Session::flash('error', 'Could not write replacement image to disk.');
        }

        $response->redirect(View::url('admin/media'));
    }

    /**
     * Add a new photo to the public Photo Gallery (/gallery)
     */
    public function storeGallery(Request $request, Response $response): void
    {
        $title = trim((string)($request->post('title') ?? ''));
        $category = trim((string)($request->post('category') ?? 'Summits'));
        $caption = trim((string)($request->post('caption') ?? ''));
        $eventDate = trim((string)($request->post('event_date') ?? date('Y-m-d')));

        if ($title === '') {
            Session::flash('error', 'Photo title is required.');
            $response->redirect(View::url('admin/media'));
            return;
        }

        $files = $request->files();
        if (!isset($files['gallery_image']) || $files['gallery_image']['error'] !== UPLOAD_ERR_OK) {
            Session::flash('error', 'Please select a photo file to upload.');
            $response->redirect(View::url('admin/media'));
            return;
        }

        $err = Validator::validateFile(
            $files['gallery_image'],
            ['jpg', 'jpeg', 'png', 'webp'],
            5 * 1024 * 1024,
            ['image/jpeg', 'image/png', 'image/webp']
        );
        if ($err) {
            Session::flash('error', $err);
            $response->redirect(View::url('admin/media'));
            return;
        }

        $ext = strtolower(pathinfo($files['gallery_image']['name'], PATHINFO_EXTENSION));
        $filename = 'gallery_' . bin2hex(random_bytes(6)) . '.' . $ext;
        $rootDir = $GLOBALS['config']['app']['root_dir'] ?? dirname(__DIR__, 3);
        $targetDir = $rootDir . '/public/assets/images/gallery';
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0775, true);
        }

        if (!move_uploaded_file($files['gallery_image']['tmp_name'], $targetDir . '/' . $filename)) {
            Session::flash('error', 'Failed to save uploaded gallery image.');
            $response->redirect(View::url('admin/media'));
            return;
        }

        $relPath = 'assets/images/gallery/' . $filename;
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("INSERT INTO gallery_items (title, category, image_path, caption, event_date, display_order) VALUES (?, ?, ?, ?, ?, 0)");
        $stmt->execute([$title, $category, $relPath, $caption, $eventDate ?: null]);

        Session::flash('success', "Photo '{$title}' added to the public Photo Gallery and included in All-in-One Backups.");
        $response->redirect(View::url('admin/media'));
    }

    /**
     * Delete a gallery item
     */
    public function deleteGallery(Request $request, Response $response): void
    {
        $id = (int)$request->param('id');
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM gallery_items WHERE id = ?");
        $stmt->execute([$id]);

        Session::flash('success', 'Gallery photo item removed.');
        $response->redirect(View::url('admin/media'));
    }
}
