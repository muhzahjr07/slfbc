<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Models\News;

class NewsController
{
    public function index(Request $request, Response $response): string
    {
        $search = $request->query('search');
        $search = $search !== null ? trim($search) : null;
        if ($search === '') {
            $search = null;
        }

        $categoryId = null;
        $categoryParam = $request->query('category');
        if (!empty($categoryParam) && is_numeric($categoryParam)) {
            $categoryId = (int)$categoryParam;
        }

        $page = max(1, (int)($request->query('page') ?? 1));
        $perPage = 6;

        $articles = News::allPublished($categoryId, $search, $page, $perPage);
        $totalArticles = News::countPublished($categoryId, $search);
        $totalPages = (int)ceil($totalArticles / $perPage);

        $categories = News::getAllCategories();

        return View::render('news.index', [
            'pageTitle' => 'News & Bilateral Trade Announcements | SLFBC',
            'metaDescription' => 'Latest news, diplomatic dispatches, commercial policy updates, and bilateral briefings from the Sri Lanka–France Business Council.',
            'articles' => $articles,
            'categories' => $categories,
            'currentCategoryId' => $categoryId,
            'currentSearch' => $search,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'totalArticles' => $totalArticles,
        ]);
    }

    public function detail(Request $request, Response $response): string
    {
        $slug = $request->param('slug');
        if (!$slug) {
            $response->setStatusCode(404);
            return View::render('errors.404', ['pageTitle' => 'Article Not Found']);
        }

        $article = News::findPublishedBySlug($slug);
        if (!$article) {
            $response->setStatusCode(404);
            return View::render('errors.404', ['pageTitle' => 'Article Not Found']);
        }

        return View::render('news.detail', [
            'pageTitle' => ($article['meta_title'] ?: $article['title']) . ' | SLFBC News',
            'metaDescription' => $article['meta_description'] ?: ($article['excerpt'] ?: 'Official announcement from the Sri Lanka–France Business Council.'),
            'article' => $article,
        ]);
    }
}
