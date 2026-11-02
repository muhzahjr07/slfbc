<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Core\Session;
use App\Core\Validator;
use App\Models\Leadership;

class LeadershipAdminController
{
    public function index(Request $request, Response $response): string
    {
        $leaders = Leadership::allAdmin();

        return View::render('admin.leadership.index', [
            'pageTitle' => 'Governance & Executive Committee | SLFBC Administration',
            'leaders' => $leaders,
        ], 'admin');
    }

    public function create(Request $request, Response $response): string
    {
        return View::render('admin.leadership.form', [
            'pageTitle' => 'Add Committee Officer | SLFBC Administration',
            'leader' => null,
            'errors' => Session::getFlash('form_errors') ?? [],
            'formData' => Session::getFlash('form_data') ?? ['term_year' => '2025/26', 'category' => 'committee', 'is_active' => 1],
        ], 'admin');
    }

    public function store(Request $request, Response $response): void
    {
        $post = $request->post();

        $rules = [
            'name' => ['required', ['max', 255]],
            'role_title' => ['required', ['max', 255]],
            'organization' => ['required', ['max', 255]],
            'category' => ['required'],
        ];

        $validator = new Validator($post, $rules);
        if (!$validator->validate()) {
            Session::flash('form_errors', $validator->errors());
            Session::flash('form_data', $post);
            $response->redirect(View::url('admin/leadership/create'));
            return;
        }

        // Portrait upload
        $portraitPath = null;
        $files = $request->files();
        if (isset($files['portrait']) && $files['portrait']['error'] === UPLOAD_ERR_OK) {
            $imgError = Validator::validateFile($files['portrait'], ['jpg', 'jpeg', 'png', 'webp'], 2 * 1024 * 1024, ['image/jpeg', 'image/png', 'image/webp']);
            if (!$imgError) {
                $ext = strtolower(pathinfo($files['portrait']['name'], PATHINFO_EXTENSION));
                $filename = 'leader_' . bin2hex(random_bytes(8)) . '.' . $ext;
                $targetDir = dirname(__DIR__, 3) . '/public/assets/images/leadership';
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }
                if (move_uploaded_file($files['portrait']['tmp_name'], $targetDir . '/' . $filename)) {
                    $portraitPath = '/assets/images/leadership/' . $filename;
                }
            }
        }
        $post['portrait_path'] = $portraitPath;

        try {
            Leadership::create($post);
            Session::flash('success', 'Officer "' . $post['name'] . '" added to Committee.');
            $response->redirect(View::url('admin/leadership'));
        } catch (\Throwable $e) {
            error_log('Leadership create error: ' . $e->getMessage());
            Session::flash('form_errors', ['system' => 'Database error: ' . $e->getMessage()]);
            Session::flash('form_data', $post);
            $response->redirect(View::url('admin/leadership/create'));
        }
    }

    public function edit(Request $request, Response $response): string
    {
        $id = (int)$request->param('id');
        $leader = Leadership::find($id);

        if (!$leader) {
            Session::flash('error', 'Officer record not found.');
            $response->redirect(View::url('admin/leadership'));
            return '';
        }

        return View::render('admin.leadership.form', [
            'pageTitle' => 'Edit Officer: ' . $leader['name'] . ' | SLFBC Administration',
            'leader' => $leader,
            'errors' => Session::getFlash('form_errors') ?? [],
            'formData' => Session::getFlash('form_data') ?? $leader,
        ], 'admin');
    }

    public function update(Request $request, Response $response): void
    {
        $id = (int)$request->param('id');
        $leader = Leadership::find($id);

        if (!$leader) {
            Session::flash('error', 'Officer record not found.');
            $response->redirect(View::url('admin/leadership'));
            return;
        }

        $post = $request->post();

        $rules = [
            'name' => ['required', ['max', 255]],
            'role_title' => ['required', ['max', 255]],
            'organization' => ['required', ['max', 255]],
            'category' => ['required'],
        ];

        $validator = new Validator($post, $rules);
        if (!$validator->validate()) {
            Session::flash('form_errors', $validator->errors());
            Session::flash('form_data', $post);
            $response->redirect(View::url('admin/leadership/' . $id . '/edit'));
            return;
        }

        $portraitPath = $leader['portrait_path'];
        $files = $request->files();
        if (isset($files['portrait']) && $files['portrait']['error'] === UPLOAD_ERR_OK) {
            $imgError = Validator::validateFile($files['portrait'], ['jpg', 'jpeg', 'png', 'webp'], 2 * 1024 * 1024, ['image/jpeg', 'image/png', 'image/webp']);
            if (!$imgError) {
                $ext = strtolower(pathinfo($files['portrait']['name'], PATHINFO_EXTENSION));
                $filename = 'leader_' . bin2hex(random_bytes(8)) . '.' . $ext;
                $targetDir = dirname(__DIR__, 3) . '/public/assets/images/leadership';
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }
                if (move_uploaded_file($files['portrait']['tmp_name'], $targetDir . '/' . $filename)) {
                    $portraitPath = '/assets/images/leadership/' . $filename;
                }
            }
        }
        $post['portrait_path'] = $portraitPath;

        try {
            Leadership::update($id, $post);
            Session::flash('success', 'Officer "' . $post['name'] . '" updated successfully.');
            $response->redirect(View::url('admin/leadership'));
        } catch (\Throwable $e) {
            error_log('Leadership update error: ' . $e->getMessage());
            Session::flash('form_errors', ['system' => 'Database error: ' . $e->getMessage()]);
            Session::flash('form_data', $post);
            $response->redirect(View::url('admin/leadership/' . $id . '/edit'));
        }
    }

    public function delete(Request $request, Response $response): void
    {
        $id = (int)$request->param('id');
        $leader = Leadership::find($id);

        if ($leader) {
            Leadership::delete($id);
            Session::flash('success', 'Officer record removed.');
        } else {
            Session::flash('error', 'Officer record not found.');
        }

        $response->redirect(View::url('admin/leadership'));
    }
}
