<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;

class LegalController
{
    /**
     * Terms and Conditions
     */
    public function terms(Request $request, Response $response): string
    {
        return View::render('legal.terms', [
            'pageTitle' => 'Terms and Conditions | Sri Lanka–France Business Council',
            'metaDescription' => 'Terms and conditions governing membership, digital portal usage, and bilateral commercial facilitation under the Sri Lanka–France Business Council and The Ceylon Chamber of Commerce.',
        ]);
    }

    /**
     * Privacy Policy (PDPA & GDPR Aligned)
     */
    public function privacy(Request $request, Response $response): string
    {
        return View::render('legal.privacy', [
            'pageTitle' => 'Privacy Policy | Sri Lanka–France Business Council',
            'metaDescription' => 'Privacy policy detailing the lawful collection, processing, and protection of corporate and personal data under Sri Lanka PDPA and European Union GDPR regulations.',
        ]);
    }
}

