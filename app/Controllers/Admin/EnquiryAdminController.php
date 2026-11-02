<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Core\Session;
use App\Models\ContactEnquiry;

class EnquiryAdminController
{
    public function index(Request $request, Response $response): string
    {
        $statusFilter = $request->query('status');
        $enquiries = ContactEnquiry::allAdmin($statusFilter);

        return View::render('admin.enquiries.index', [
            'pageTitle' => 'Secretariat Enquiries Inbox | SLFBC Administration',
            'enquiries' => $enquiries,
            'currentStatus' => $statusFilter,
        ], 'admin');
    }

    public function detail(Request $request, Response $response): string
    {
        $id = (int)$request->param('id');
        $enquiry = ContactEnquiry::find($id);

        if (!$enquiry) {
            Session::flash('error', 'Enquiry record not found.');
            $response->redirect(View::url('admin/enquiries'));
            return '';
        }

        // Mark as read automatically when opened by admin
        ContactEnquiry::markAsRead($id);

        return View::render('admin.enquiries.detail', [
            'pageTitle' => 'Enquiry from ' . $enquiry['name'] . ' | SLFBC Administration',
            'enquiry' => $enquiry,
        ], 'admin');
    }

    public function updateStatus(Request $request, Response $response): void
    {
        $id = (int)$request->param('id');
        $status = $request->post('status') ?? 'in_progress';
        $notes = $request->post('internal_notes') ?? null;

        ContactEnquiry::updateStatus($id, $status, $notes);

        Session::flash('success', 'Enquiry status updated to "' . ucfirst($status) . '".');
        $response->redirect(View::url('admin/enquiries/' . $id));
    }
}
