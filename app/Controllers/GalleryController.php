<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Models\GalleryItem;

class GalleryController
{
    public function index(Request $request, Response $response): string
    {
        $items = GalleryItem::all();

        return View::render('gallery.index', [
            'pageTitle' => 'Photo Gallery & Media Archive | SLFBC',
            'metaDescription' => 'Photographic documentation of bilateral trade missions, AGM assemblies, diplomatic receptions, and summit dialogues.',
            'items' => $items,
        ]);
    }
}
