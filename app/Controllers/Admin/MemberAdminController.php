<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Core\Session;
use App\Core\Validator;
use App\Models\Member;

class MemberAdminController
{
    public function index(Request $request, Response $response): string
    {
        $members = Member::allAdmin();

        return View::render('admin.members.index', [
            'pageTitle' => 'Member Management | SLFBC Administration',
            'members' => $members,
        ], 'admin');
    }

    public function create(Request $request, Response $response): string
    {
        $sectors = Member::getAllSectors();

        return View::render('admin.members.form', [
            'pageTitle' => 'Add New Member Entity | SLFBC Administration',
            'sectors' => $sectors,
            'member' => null,
            'errors' => Session::getFlash('form_errors') ?? [],
            'formData' => Session::getFlash('form_data') ?? [],
        ], 'admin');
    }

    public function store(Request $request, Response $response): void
    {
        $post = $request->post();

        $rules = [
            'name' => ['required', ['max', 255]],
            'tier' => ['required'],
        ];

        $validator = new Validator($post, $rules);
        if (!$validator->validate()) {
            Session::flash('form_errors', $validator->errors());
            Session::flash('form_data', $post);
            $response->redirect(View::url('admin/members/create'));
            return;
        }

        // Generate slug
        $slug = !empty($post['slug']) ? trim($post['slug']) : strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $post['name']), '-'));
        $post['slug'] = $slug;

        // Handle Logo Upload if present
        $logoPath = null;
        $files = $request->files();
        if (isset($files['logo']) && $files['logo']['error'] === UPLOAD_ERR_OK) {
            $logoError = Validator::validateFile($files['logo'], ['jpg', 'jpeg', 'png', 'svg', 'webp'], 2 * 1024 * 1024, ['image/jpeg', 'image/png', 'image/svg+xml', 'image/webp']);
            if (!$logoError) {
                $ext = strtolower(pathinfo($files['logo']['name'], PATHINFO_EXTENSION));
                $filename = 'member_' . bin2hex(random_bytes(8)) . '.' . $ext;
                $targetDir = dirname(__DIR__, 3) . '/public/assets/images/members';
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }
                if (move_uploaded_file($files['logo']['tmp_name'], $targetDir . '/' . $filename)) {
                    $logoPath = '/assets/images/members/' . $filename;
                }
            }
        }
        $post['logo_path'] = $logoPath;

        try {
            Member::create($post);
            Session::flash('success', 'Member entity "' . $post['name'] . '" successfully created and verified.');
            $response->redirect(View::url('admin/members'));
        } catch (\Throwable $e) {
            error_log('Member create error: ' . $e->getMessage());
            Session::flash('form_errors', ['system' => 'Database error: ' . $e->getMessage()]);
            Session::flash('form_data', $post);
            $response->redirect(View::url('admin/members/create'));
        }
    }

    public function edit(Request $request, Response $response): string
    {
        $id = (int)$request->param('id');
        $member = Member::find($id);

        if (!$member) {
            Session::flash('error', 'Member record not found.');
            $response->redirect(View::url('admin/members'));
            return '';
        }

        $sectors = Member::getAllSectors();

        return View::render('admin.members.form', [
            'pageTitle' => 'Edit Member: ' . $member['name'] . ' | SLFBC Administration',
            'sectors' => $sectors,
            'member' => $member,
            'errors' => Session::getFlash('form_errors') ?? [],
            'formData' => Session::getFlash('form_data') ?? $member,
        ], 'admin');
    }

    public function update(Request $request, Response $response): void
    {
        $id = (int)$request->param('id');
        $member = Member::find($id);

        if (!$member) {
            Session::flash('error', 'Member record not found.');
            $response->redirect(View::url('admin/members'));
            return;
        }

        $post = $request->post();

        $rules = [
            'name' => ['required', ['max', 255]],
            'tier' => ['required'],
        ];

        $validator = new Validator($post, $rules);
        if (!$validator->validate()) {
            Session::flash('form_errors', $validator->errors());
            Session::flash('form_data', $post);
            $response->redirect(View::url('admin/members/' . $id . '/edit'));
            return;
        }

        $slug = !empty($post['slug']) ? trim($post['slug']) : strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $post['name']), '-'));
        $post['slug'] = $slug;

        $logoPath = $member['logo_path'];
        $files = $request->files();
        if (isset($files['logo']) && $files['logo']['error'] === UPLOAD_ERR_OK) {
            $logoError = Validator::validateFile($files['logo'], ['jpg', 'jpeg', 'png', 'svg', 'webp'], 2 * 1024 * 1024, ['image/jpeg', 'image/png', 'image/svg+xml', 'image/webp']);
            if (!$logoError) {
                $ext = strtolower(pathinfo($files['logo']['name'], PATHINFO_EXTENSION));
                $filename = 'member_' . bin2hex(random_bytes(8)) . '.' . $ext;
                $targetDir = dirname(__DIR__, 3) . '/public/assets/images/members';
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }
                if (move_uploaded_file($files['logo']['tmp_name'], $targetDir . '/' . $filename)) {
                    $logoPath = '/assets/images/members/' . $filename;
                }
            }
        }
        $post['logo_path'] = $logoPath;

        try {
            Member::update($id, $post);
            Session::flash('success', 'Member record "' . $post['name'] . '" updated successfully.');
            $response->redirect(View::url('admin/members'));
        } catch (\Throwable $e) {
            error_log('Member update error: ' . $e->getMessage());
            Session::flash('form_errors', ['system' => 'Database error: ' . $e->getMessage()]);
            Session::flash('form_data', $post);
            $response->redirect(View::url('admin/members/' . $id . '/edit'));
        }
    }

    public function delete(Request $request, Response $response): void
    {
        $id = (int)$request->param('id');
        $member = Member::find($id);

        if ($member) {
            Member::delete($id);
            Session::flash('success', 'Member "' . $member['name'] . '" has been permanently removed.');
        } else {
            Session::flash('error', 'Member record could not be found.');
        }

        $response->redirect(View::url('admin/members'));
    }
}
