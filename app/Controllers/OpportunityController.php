<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Models\BusinessOpportunity;

class OpportunityController
{
    public function index(Request $request, Response $response): string
    {
        $opportunities = BusinessOpportunity::all();

        return View::render('opportunities.index', [
            'pageTitle' => 'Bilateral Business & Investment Opportunities | SLFBC',
            'metaDescription' => 'Strategic partnership tracks, trade facilitation corridors, and business exploration opportunities between France and Sri Lanka.',
            'opportunities' => $opportunities,
        ]);
    }

    public function detail(Request $request, Response $response, array $params = []): string
    {
        $slug = $params['slug'] ?? '';
        $opportunity = BusinessOpportunity::findBySlug($slug);

        if (!$opportunity) {
            $response->setStatusCode(404);
            return View::render('errors.404', [
                'pageTitle' => 'Business Opportunity Not Found | SLFBC',
                'message' => 'The requested strategic corridor or investment track could not be located in our active directory.',
            ]);
        }

        $all = BusinessOpportunity::all();
        $related = array_values(array_filter($all, fn($o) => (int)$o['id'] !== (int)$opportunity['id']));
        $related = array_slice($related, 0, 3);

        return View::render('opportunities.detail', [
            'pageTitle' => $opportunity['title'] . ' | SLFBC Opportunities',
            'metaDescription' => $opportunity['summary'],
            'opportunity' => $opportunity,
            'related' => $related,
        ]);
    }
}
