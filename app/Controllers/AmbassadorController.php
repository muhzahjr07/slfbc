<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;

class AmbassadorController
{
    public function index(Request $request, Response $response): string
    {
        return View::render('ambassador.index', [
            'pageTitle' => 'Message from the Ambassador of France | SLFBC',
            'metaDescription' => 'Official diplomatic dispatch and message on Sri Lanka–France bilateral commercial and economic cooperation.',
        ]);
    }
}
