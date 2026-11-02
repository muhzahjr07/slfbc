<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Core\Validator;
use App\Core\Session;
use App\Models\ContactEnquiry;

class ContactController
{
    public function index(Request $request, Response $response): string
    {
        $subjectParam = $request->query('subject') ?? '';

        return View::render('contact.index', [
            'pageTitle' => 'Contact the Secretariat | Sri Lanka–France Business Council',
            'metaDescription' => 'Get in touch with the Secretariat of the Sri Lanka–France Business Council at the Ceylon Chamber of Commerce in Colombo.',
            'prefilledSubject' => $subjectParam,
            'formData' => Session::getFlash('contact_data') ?? [],
            'errors' => Session::getFlash('contact_errors') ?? [],
            'successMessage' => Session::getFlash('contact_success'),
        ]);
    }

    public function submit(Request $request, Response $response): void
    {
        $post = $request->post();

        // 1. Honeypot check
        if (!empty($post['company_url_hp'])) {
            $response->redirect(View::url('contact'));
            return;
        }

        // 2. Validate
        $rules = [
            'name' => ['required', ['max', 190]],
            'email' => ['required', 'email', ['max', 190]],
            'subject_category' => ['required'],
            'message' => ['required', ['min', 10], ['max', 5000]],
        ];

        $validator = new Validator($post, $rules);

        if (!$validator->validate()) {
            Session::flash('contact_errors', $validator->errors());
            Session::flash('contact_data', $post);
            $response->redirect(View::url('contact'));
            return;
        }

        // 3. Persist enquiry
        try {
            $data = [
                'name' => $post['name'],
                'company' => !empty($post['company']) ? $post['company'] : null,
                'email' => $post['email'],
                'phone' => !empty($post['phone']) ? $post['phone'] : null,
                'subject_category' => $post['subject_category'],
                'message' => $post['message'],
                'ip_address' => $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1',
            ];

            ContactEnquiry::create($data);

            Session::flash('contact_success', 'Thank you. Your enquiry has been securely logged with the Secretariat of the Ceylon Chamber of Commerce. A designated officer will respond to you shortly.');
            $response->redirect(View::url('contact'));
        } catch (\Throwable $e) {
            error_log('Contact form error: ' . $e->getMessage());
            Session::flash('contact_errors', ['system' => 'An error occurred while transmitting your enquiry. Please reach out to the Secretariat via telephone or direct email.']);
            Session::flash('contact_data', $post);
            $response->redirect(View::url('contact'));
        }
    }
}
