<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Core\Session;
use App\Core\Validator;
use App\Models\News;

class NewsAdminController
{
    public function index(Request $request, Response $response): string
    {
        $articles = News::allAdmin();

        return View::render('admin.news.index', [
            'pageTitle' => 'News & Communiqués Management | SLFBC Administration',
            'articles' => $articles,
        ], 'admin');
    }

    public function create(Request $request, Response $response): string
    {
        $categories = News::getAllCategories();

        return View::render('admin.news.form', [
            'pageTitle' => 'Publish New Communiqué | SLFBC Administration',
            'categories' => $categories,
            'article' => null,
            'errors' => Session::getFlash('form_errors') ?? [],
            'formData' => Session::getFlash('form_data') ?? ['published_at' => date('Y-m-d H:i'), 'status' => 'published'],
        ], 'admin');
    }

    public function store(Request $request, Response $response): void
    {
        $post = $request->post();

        $rules = [
            'title' => ['required', ['max', 255]],
            'content' => ['required'],
        ];

        $validator = new Validator($post, $rules);
        if (!$validator->validate()) {
            Session::flash('form_errors', $validator->errors());
            Session::flash('form_data', $post);
            $response->redirect(View::url('admin/news/create'));
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
                $filename = 'news_' . bin2hex(random_bytes(8)) . '.' . $ext;
                $targetDir = dirname(__DIR__, 3) . '/public/assets/images/news';
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }
                if (move_uploaded_file($files['cover_image']['tmp_name'], $targetDir . '/' . $filename)) {
                    $coverPath = '/assets/images/news/' . $filename;
                }
            }
        }
        $post['cover_image'] = $coverPath;

        try {
            News::create($post);
            Session::flash('success', 'Article "' . $post['title'] . '" saved successfully.');
            $response->redirect(View::url('admin/news'));
        } catch (\Throwable $e) {
            error_log('News create error: ' . $e->getMessage());
            Session::flash('form_errors', ['system' => 'Database error: ' . $e->getMessage()]);
            Session::flash('form_data', $post);
            $response->redirect(View::url('admin/news/create'));
        }
    }

    public function edit(Request $request, Response $response): string
    {
        $id = (int)$request->param('id');
        $article = News::find($id);

        if (!$article) {
            Session::flash('error', 'Article not found.');
            $response->redirect(View::url('admin/news'));
            return '';
        }

        $categories = News::getAllCategories();

        return View::render('admin.news.form', [
            'pageTitle' => 'Edit Communiqué: ' . $article['title'] . ' | SLFBC Administration',
            'categories' => $categories,
            'article' => $article,
            'errors' => Session::getFlash('form_errors') ?? [],
            'formData' => Session::getFlash('form_data') ?? $article,
        ], 'admin');
    }

    public function update(Request $request, Response $response): void
    {
        $id = (int)$request->param('id');
        $article = News::find($id);

        if (!$article) {
            Session::flash('error', 'Article not found.');
            $response->redirect(View::url('admin/news'));
            return;
        }

        $post = $request->post();

        $rules = [
            'title' => ['required', ['max', 255]],
            'content' => ['required'],
        ];

        $validator = new Validator($post, $rules);
        if (!$validator->validate()) {
            Session::flash('form_errors', $validator->errors());
            Session::flash('form_data', $post);
            $response->redirect(View::url('admin/news/' . $id . '/edit'));
            return;
        }

        $slug = !empty($post['slug']) ? trim($post['slug']) : strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $post['title']), '-'));
        $post['slug'] = $slug;

        $coverPath = $article['cover_image'];
        $files = $request->files();
        if (isset($files['cover_image']) && $files['cover_image']['error'] === UPLOAD_ERR_OK) {
            $imgError = Validator::validateFile($files['cover_image'], ['jpg', 'jpeg', 'png', 'webp'], 3 * 1024 * 1024, ['image/jpeg', 'image/png', 'image/webp']);
            if (!$imgError) {
                $ext = strtolower(pathinfo($files['cover_image']['name'], PATHINFO_EXTENSION));
                $filename = 'news_' . bin2hex(random_bytes(8)) . '.' . $ext;
                $targetDir = dirname(__DIR__, 3) . '/public/assets/images/news';
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }
                if (move_uploaded_file($files['cover_image']['tmp_name'], $targetDir . '/' . $filename)) {
                    $coverPath = '/assets/images/news/' . $filename;
                }
            }
        }
        $post['cover_image'] = $coverPath;

        try {
            News::update($id, $post);
            Session::flash('success', 'Article "' . $post['title'] . '" updated successfully.');
            $response->redirect(View::url('admin/news'));
        } catch (\Throwable $e) {
            error_log('News update error: ' . $e->getMessage());
            Session::flash('form_errors', ['system' => 'Database error: ' . $e->getMessage()]);
            Session::flash('form_data', $post);
            $response->redirect(View::url('admin/news/' . $id . '/edit'));
        }
    }

    public function delete(Request $request, Response $response): void
    {
        $id = (int)$request->param('id');
        $article = News::find($id);

        if ($article) {
            News::delete($id);
            Session::flash('success', 'Article "' . $article['title'] . '" deleted.');
        } else {
            Session::flash('error', 'Article not found.');
        }

        $response->redirect(View::url('admin/news'));
    }
}
