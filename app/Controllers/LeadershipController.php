<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Models\Leadership;
use App\Models\SiteSetting;

class LeadershipController
{
    public function index(Request $request, Response $response): string
    {
        $termYear = SiteSetting::get('committee_term', '2025/26');
        $president = Leadership::getPresident($termYear);
        $committee = Leadership::allActive($termYear);

        return View::render('leadership.index', [
            'pageTitle' => 'Leadership & Governance | Sri Lanka–France Business Council',
            'metaDescription' => "Executive Committee and governance leadership of the Sri Lanka–France Business Council for the {$termYear} term.",
            'president' => $president,
            'committee' => $committee,
            'termYear' => $termYear,
            'presidentQuote' => SiteSetting::get('president_quote', ''),
        ]);
    }
}
