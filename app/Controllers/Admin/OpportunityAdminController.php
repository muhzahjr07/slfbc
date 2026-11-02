<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Core\Session;
use App\Core\Validator;
use App\Models\BusinessOpportunity;

class OpportunityAdminController
{
    public function index(Request $request, Response $response): string
    {
        $opportunities = BusinessOpportunity::all();

        return View::render('admin.opportunities.index', [
            'pageTitle' => 'Business Opportunities Management | SLFBC Administration',
            'opportunities' => $opportunities,
        ], 'admin');
    }

    public function create(Request $request, Response $response): string
    {
        return View::render('admin.opportunities.form', [
            'pageTitle' => 'Create Business Opportunity Track | SLFBC Administration',
            'opportunity' => null,
            'errors' => Session::getFlash('form_errors') ?? [],
            'formData' => Session::getFlash('form_data') ?? ['corridor' => 'bilateral', 'status_label' => 'Active Project Pipeline', 'is_featured' => 1],
        ], 'admin');
    }

    public function store(Request $request, Response $response): void
    {
        $post = $request->post();

        $rules = [
            'title' => ['required', ['max', 255]],
            'track' => ['required', ['max', 255]],
            'summary' => ['required'],
        ];

        $validator = new Validator($post, $rules);
        if (!$validator->validate()) {
            Session::flash('form_errors', $validator->errors());
            Session::flash('form_data', $post);
            $response->redirect(View::url('admin/opportunities/create'));
            return;
        }

        $slug = !empty($post['slug']) ? trim($post['slug']) : strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $post['title']), '-'));
        $post['slug'] = $slug;

        try {
            BusinessOpportunity::create($post);
            Session::flash('success', 'Opportunity "' . $post['title'] . '" published.');
            $response->redirect(View::url('admin/opportunities'));
        } catch (\Throwable $e) {
            error_log('Opportunity create error: ' . $e->getMessage());
            Session::flash('form_errors', ['system' => 'Database error: ' . $e->getMessage()]);
            Session::flash('form_data', $post);
            $response->redirect(View::url('admin/opportunities/create'));
        }
    }

    public function edit(Request $request, Response $response): string
    {
        $id = (int)$request->param('id');
        $opportunity = BusinessOpportunity::find($id);

        if (!$opportunity) {
            Session::flash('error', 'Opportunity track not found.');
            $response->redirect(View::url('admin/opportunities'));
            return '';
        }

        return View::render('admin.opportunities.form', [
            'pageTitle' => 'Edit Opportunity Track: ' . $opportunity['title'] . ' | SLFBC Administration',
            'opportunity' => $opportunity,
            'errors' => Session::getFlash('form_errors') ?? [],
            'formData' => Session::getFlash('form_data') ?? $opportunity,
        ], 'admin');
    }

    public function update(Request $request, Response $response): void
    {
        $id = (int)$request->param('id');
        $opportunity = BusinessOpportunity::find($id);

        if (!$opportunity) {
            Session::flash('error', 'Opportunity track not found.');
            $response->redirect(View::url('admin/opportunities'));
            return;
        }

        $post = $request->post();

        $rules = [
            'title' => ['required', ['max', 255]],
            'track' => ['required', ['max', 255]],
            'summary' => ['required'],
        ];

        $validator = new Validator($post, $rules);
        if (!$validator->validate()) {
            Session::flash('form_errors', $validator->errors());
            Session::flash('form_data', $post);
            $response->redirect(View::url('admin/opportunities/' . $id . '/edit'));
            return;
        }

        $slug = !empty($post['slug']) ? trim($post['slug']) : strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $post['title']), '-'));
        $post['slug'] = $slug;

        try {
            BusinessOpportunity::update($id, $post);
            Session::flash('success', 'Opportunity "' . $post['title'] . '" updated successfully.');
            $response->redirect(View::url('admin/opportunities'));
        } catch (\Throwable $e) {
            error_log('Opportunity update error: ' . $e->getMessage());
            Session::flash('form_errors', ['system' => 'Database error: ' . $e->getMessage()]);
            Session::flash('form_data', $post);
            $response->redirect(View::url('admin/opportunities/' . $id . '/edit'));
        }
    }

    public function delete(Request $request, Response $response): void
    {
        $id = (int)$request->param('id');
        $opportunity = BusinessOpportunity::find($id);

        if ($opportunity) {
            BusinessOpportunity::delete($id);
            Session::flash('success', 'Opportunity track removed.');
        } else {
            Session::flash('error', 'Opportunity track not found.');
        }

        $response->redirect(View::url('admin/opportunities'));
    }
}
