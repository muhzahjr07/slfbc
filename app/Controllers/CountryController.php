<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;

class CountryController
{
    public function france(Request $request, Response $response): string
    {
        return View::render('country.france', [
            'pageTitle' => 'Doing Business with France | Market & Trade Briefing | SLFBC',
            'metaDescription' => 'Comprehensive bilateral business guide for Sri Lankan exporters, investors, and corporate leaders engaging with the French market.',
            'lastUpdated' => 'October 2026',
        ]);
    }

    public function srilanka(Request $request, Response $response): string
    {
        return View::render('country.srilanka', [
            'pageTitle' => 'Doing Business in Sri Lanka | Investment & Trade Guide | SLFBC',
            'metaDescription' => 'Strategic guide for French multinationals, industrial partners, and institutional investors exploring Sri Lankan commercial opportunities.',
            'lastUpdated' => 'October 2026',
        ]);
    }
}
