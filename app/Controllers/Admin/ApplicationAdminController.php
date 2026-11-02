<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Core\Session;
use App\Core\Auth;
use App\Models\MembershipApplication;

class ApplicationAdminController
{
    public function index(Request $request, Response $response): string
    {
        $statusFilter = $request->query('status');
        $applications = MembershipApplication::allAdmin($statusFilter);

        return View::render('admin.applications.index', [
            'pageTitle' => 'Membership Applications Review | SLFBC Administration',
            'applications' => $applications,
            'currentStatus' => $statusFilter,
        ], 'admin');
    }

    public function detail(Request $request, Response $response): string
    {
        $id = (int)$request->param('id');
        $app = MembershipApplication::find($id);

        if (!$app) {
            Session::flash('error', 'Membership application not found.');
            $response->redirect(View::url('admin/applications'));
            return '';
        }

        $documents = MembershipApplication::getDocuments($id);

        return View::render('admin.applications.detail', [
            'pageTitle' => 'Application #' . $app['reference_no'] . ' | SLFBC Administration',
            'app' => $app,
            'documents' => $documents,
        ], 'admin');
    }

    public function updateStatus(Request $request, Response $response): void
    {
        $id = (int)$request->param('id');
        $status = $request->post('status') ?? 'pending';
        $notes = $request->post('admin_notes') ?? null;
        $adminId = Auth::id();

        MembershipApplication::updateStatus($id, $status, $notes, $adminId);

        Session::flash('success', 'Application status updated to "' . ucfirst($status) . '".');
        $response->redirect(View::url('admin/applications/' . $id));
    }

    public function downloadDocument(Request $request, Response $response): void
    {
        $docId = (int)$request->param('doc_id');
        $doc = MembershipApplication::findDocument($docId);

        if (!$doc) {
            http_response_code(404);
            echo 'Document record not found.';
            exit;
        }

        // Prevent path traversal
        $storedFile = basename($doc['stored_filename']);
        $filePath = dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR . $storedFile;

        if (!file_exists($filePath)) {
            http_response_code(404);
            echo 'Physical document file missing or inaccessible.';
            exit;
        }

        header('Content-Description: File Transfer');
        header('Content-Type: ' . ($doc['mime_type'] ?: 'application/octet-stream'));
        header('Content-Disposition: attachment; filename="' . addslashes($doc['original_name']) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    }
}
