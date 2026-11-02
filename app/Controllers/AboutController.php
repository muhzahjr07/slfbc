<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;

class AboutController
{
    public function index(Request $request, Response $response): string
    {
        return View::render('about.index', [
            'pageTitle' => 'About the Sri Lanka–France Business Council | SLFBC',
            'metaDescription' => 'Learn about the mission, history, objectives and institutional framework of the Sri Lanka–France Business Council under the Ceylon Chamber of Commerce.',
        ]);
    }
}
