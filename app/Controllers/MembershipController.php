<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Core\Validator;
use App\Core\Session;
use App\Models\MembershipApplication;
use App\Models\Member;

class MembershipController
{
    public function index(Request $request, Response $response): string
    {
        $sectors = Member::getSectors();

        return View::render('membership.index', [
            'pageTitle' => 'Membership & Bilateral Network | SLFBC',
            'metaDescription' => 'Join the Sri Lanka–France Business Council. Explore membership eligibility, tiers, bilateral trade facilitation, and the application process.',
            'sectors' => $sectors,
        ]);
    }

    public function apply(Request $request, Response $response): string
    {
        $sectors = Member::getSectors();

        return View::render('membership.apply', [
            'pageTitle' => 'Apply for Membership | SLFBC',
            'metaDescription' => 'Official membership application form for corporate entities and enterprises engaging in Sri Lanka–France bilateral trade.',
            'sectors' => $sectors,
            'formData' => Session::getFlash('form_data') ?? [],
            'errors' => Session::getFlash('form_errors') ?? [],
        ]);
    }

    public function submit(Request $request, Response $response): void
    {
        $post = $request->post();

        // 1. Bot honeypot check
        if (!empty($post['website_hp'])) {
            $response->redirect(View::url('membership/apply'));
            return;
        }

        // 2. Validate input
        $rules = [
            'company_name' => ['required', ['max', 255]],
            'business_reg_no' => ['required', ['max', 100]],
            'sector' => ['required', ['max', 100]],
            'primary_corridor' => ['required'],
            'corporate_email' => ['required', 'email', ['max', 190]],
            'phone' => ['required', ['max', 50]],
            'registered_address' => ['required'],
            'contact_person_name' => ['required', ['max', 190]],
            'contact_person_designation' => ['required', ['max', 190]],
            'contact_person_email' => ['required', 'email', ['max', 190]],
            'contact_person_phone' => ['required', ['max', 50]],
        ];

        $validator = new Validator($post, $rules);

        if (!$validator->validate()) {
            Session::flash('form_errors', $validator->errors());
            Session::flash('form_data', $post);
            $response->redirect(View::url('membership/apply'));
            return;
        }

        // 3. Document uploads verification
        $allowedExtensions = ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png'];
        $allowedMimes = [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'image/jpeg',
            'image/png'
        ];
        $maxSize = 10 * 1024 * 1024; // 10MB
        $uploadErrors = [];

        $docTypes = [
            'doc_br' => 'Certificate of Incorporation / Business Registration',
            'doc_profile' => 'Corporate Profile / Capability Statement',
            'doc_accounts' => 'Audited Financial Statements (Last 2 Years)',
        ];

        $uploadedDocs = [];
        $files = $request->files();

        $storageDir = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'documents';
        if (!is_dir($storageDir)) {
            mkdir($storageDir, 0750, true);
        }

        foreach ($docTypes as $key => $label) {
            if (isset($files[$key]) && $files[$key]['error'] === UPLOAD_ERR_OK) {
                $file = $files[$key];
                $error = Validator::validateFile($file, $allowedExtensions, $maxSize, $allowedMimes);
                if ($error) {
                    $uploadErrors[$key] = $label . ': ' . $error;
                } else {
                    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                    $safeFilename = 'doc_' . bin2hex(random_bytes(16)) . '.' . $ext;
                    $targetPath = $storageDir . DIRECTORY_SEPARATOR . $safeFilename;

                    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                        $finfo = finfo_open(FILEINFO_MIME_TYPE);
                        $mime = finfo_file($finfo, $targetPath) ?: 'application/octet-stream';
                        finfo_close($finfo);

                        $uploadedDocs[] = [
                            'type' => $label,
                            'original_name' => basename($file['name']),
                            'stored_filename' => $safeFilename,
                            'file_size' => (int)$file['size'],
                            'mime_type' => $mime,
                        ];
                    }
                }
            }
        }

        if (!empty($uploadErrors)) {
            Session::flash('form_errors', array_merge($validator->errors(), $uploadErrors));
            Session::flash('form_data', $post);
            $response->redirect(View::url('membership/apply'));
            return;
        }

        // 4. Save application
        try {
            $appId = MembershipApplication::create($post);

            foreach ($uploadedDocs as $doc) {
                MembershipApplication::addDocument(
                    $appId,
                    $doc['type'],
                    $doc['original_name'],
                    $doc['stored_filename'],
                    $doc['file_size'],
                    $doc['mime_type']
                );
            }

            $app = MembershipApplication::find($appId);
            Session::flash('application_success', [
                'reference_no' => $app['reference_no'] ?? 'SLFBC-APP-' . $appId,
                'company_name' => $post['company_name'],
                'contact_email' => $post['contact_person_email'],
            ]);

            $response->redirect(View::url('membership/apply/success'));
        } catch (\Throwable $e) {
            error_log('Membership application submission error: ' . $e->getMessage());
            Session::flash('form_errors', ['system' => 'An error occurred while saving your application. Please try again or contact the Secretariat directly.']);
            Session::flash('form_data', $post);
            $response->redirect(View::url('membership/apply'));
        }
    }

    public function success(Request $request, Response $response): string
    {
        $successData = Session::getFlash('application_success');

        if (!$successData) {
            $response->redirect(View::url('membership'));
            return '';
        }

        return View::render('membership.apply_success', [
            'pageTitle' => 'Application Submitted Successfully | SLFBC',
            'metaDescription' => 'Your Sri Lanka–France Business Council membership application has been logged for Secretariat review.',
            'app' => $successData,
        ]);
    }
}
