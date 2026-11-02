<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Core\Session;
use App\Core\Validator;
use App\Models\Event;

class EventAdminController
{
    public function index(Request $request, Response $response): string
    {
        $events = Event::allAdmin();

        return View::render('admin.events.index', [
            'pageTitle' => 'Events & Summits Management | SLFBC Administration',
            'events' => $events,
        ], 'admin');
    }

    public function create(Request $request, Response $response): string
    {
        return View::render('admin.events.form', [
            'pageTitle' => 'Create Bilateral Event | SLFBC Administration',
            'event' => null,
            'errors' => Session::getFlash('form_errors') ?? [],
            'formData' => Session::getFlash('form_data') ?? [
                'start_datetime' => date('Y-m-d 09:00:00', strtotime('+14 days')),
                'category' => 'Summit',
                'status' => 'published',
                'location_city' => 'Colombo'
            ],
        ], 'admin');
    }

    public function store(Request $request, Response $response): void
    {
        $post = $request->post();

        $rules = [
            'title' => ['required', ['max', 255]],
            'venue' => ['required', ['max', 255]],
            'start_datetime' => ['required'],
            'description' => ['required'],
        ];

        $validator = new Validator($post, $rules);
        if (!$validator->validate()) {
            Session::flash('form_errors', $validator->errors());
            Session::flash('form_data', $post);
            $response->redirect(View::url('admin/events/create'));
            return;
        }

        $slug = !empty($post['slug']) ? trim($post['slug']) : strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $post['title']), '-'));
        $post['slug'] = $slug;

        // Image upload
        $coverPath = null;
        $files = $request->files();
        if (isset($files['cover_image']) && $files['cover_image']['error'] === UPLOAD_ERR_OK) {
            $imgError = Validator::validateFile($files['cover_image'], ['jpg', 'jpeg', 'png', 'webp'], 3 * 1024 * 1024, ['image/jpeg', 'image/png', 'image/webp']);
            if (!$imgError) {
                $ext = strtolower(pathinfo($files['cover_image']['name'], PATHINFO_EXTENSION));
                $filename = 'event_' . bin2hex(random_bytes(8)) . '.' . $ext;
                $targetDir = dirname(__DIR__, 3) . '/public/assets/images/events';
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }
                if (move_uploaded_file($files['cover_image']['tmp_name'], $targetDir . '/' . $filename)) {
                    $coverPath = '/assets/images/events/' . $filename;
                }
            }
        }
        $post['cover_image'] = $coverPath;

        try {
            Event::create($post);
            Session::flash('success', 'Event "' . $post['title'] . '" created successfully.');
            $response->redirect(View::url('admin/events'));
        } catch (\Throwable $e) {
            error_log('Event create error: ' . $e->getMessage());
            Session::flash('form_errors', ['system' => 'Database error: ' . $e->getMessage()]);
            Session::flash('form_data', $post);
            $response->redirect(View::url('admin/events/create'));
        }
    }

    public function edit(Request $request, Response $response): string
    {
        $id = (int)$request->param('id');
        $event = Event::find($id);

        if (!$event) {
            Session::flash('error', 'Event record not found.');
            $response->redirect(View::url('admin/events'));
            return '';
        }

        return View::render('admin.events.form', [
            'pageTitle' => 'Edit Event: ' . $event['title'] . ' | SLFBC Administration',
            'event' => $event,
            'errors' => Session::getFlash('form_errors') ?? [],
            'formData' => Session::getFlash('form_data') ?? $event,
        ], 'admin');
    }

    public function update(Request $request, Response $response): void
    {
        $id = (int)$request->param('id');
        $event = Event::find($id);

        if (!$event) {
            Session::flash('error', 'Event record not found.');
            $response->redirect(View::url('admin/events'));
            return;
        }

        $post = $request->post();

        $rules = [
            'title' => ['required', ['max', 255]],
            'venue' => ['required', ['max', 255]],
            'start_datetime' => ['required'],
            'description' => ['required'],
        ];

        $validator = new Validator($post, $rules);
        if (!$validator->validate()) {
            Session::flash('form_errors', $validator->errors());
            Session::flash('form_data', $post);
            $response->redirect(View::url('admin/events/' . $id . '/edit'));
            return;
        }

        $slug = !empty($post['slug']) ? trim($post['slug']) : strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $post['title']), '-'));
        $post['slug'] = $slug;

        $coverPath = $event['cover_image'];
        $files = $request->files();
        if (isset($files['cover_image']) && $files['cover_image']['error'] === UPLOAD_ERR_OK) {
            $imgError = Validator::validateFile($files['cover_image'], ['jpg', 'jpeg', 'png', 'webp'], 3 * 1024 * 1024, ['image/jpeg', 'image/png', 'image/webp']);
            if (!$imgError) {
                $ext = strtolower(pathinfo($files['cover_image']['name'], PATHINFO_EXTENSION));
                $filename = 'event_' . bin2hex(random_bytes(8)) . '.' . $ext;
                $targetDir = dirname(__DIR__, 3) . '/public/assets/images/events';
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }
                if (move_uploaded_file($files['cover_image']['tmp_name'], $targetDir . '/' . $filename)) {
                    $coverPath = '/assets/images/events/' . $filename;
                }
            }
        }
        $post['cover_image'] = $coverPath;

        try {
            Event::update($id, $post);
            Session::flash('success', 'Event "' . $post['title'] . '" updated successfully.');
            $response->redirect(View::url('admin/events'));
        } catch (\Throwable $e) {
            error_log('Event update error: ' . $e->getMessage());
            Session::flash('form_errors', ['system' => 'Database error: ' . $e->getMessage()]);
            Session::flash('form_data', $post);
            $response->redirect(View::url('admin/events/' . $id . '/edit'));
        }
    }

    public function delete(Request $request, Response $response): void
    {
        $id = (int)$request->param('id');
        $event = Event::find($id);

        if ($event) {
            Event::delete($id);
            Session::flash('success', 'Event "' . $event['title'] . '" deleted.');
        } else {
            Session::flash('error', 'Event record not found.');
        }

        $response->redirect(View::url('admin/events'));
    }
}
