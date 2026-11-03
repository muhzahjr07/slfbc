<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Models\Member;
use App\Models\News;
use App\Models\Event;

class SitemapController
{
    public function xml(Request $request, Response $response): string
    {
        $baseUrl = rtrim(View::url(''), '/');

        $staticRoutes = [
            '',
            'about',
            'governance',
            'ambassador-message',
            'membership',
            'membership/apply',
            'members',
            'news',
            'events',
            'opportunities',
            'france',
            'sri-lanka',
            'gallery',
            'contact',
            'sitemap',
            'terms',
            'privacy',
        ];

        $members = Member::allActive(null, null, 1, 1000);
        $articles = News::allPublished(null, null, 1, 1000);
        $events = array_merge(Event::getUpcoming(100), Event::getPast(100));

        $response->header('Content-Type', 'application/xml; charset=utf-8');

        $out = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $out .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($staticRoutes as $route) {
            $loc = $baseUrl . ($route ? '/' . $route : '');
            $out .= "  <url>\n";
            $out .= "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
            $out .= "    <changefreq>" . ($route === '' ? 'daily' : 'weekly') . "</changefreq>\n";
            $out .= "    <priority>" . ($route === '' ? '1.0' : '0.8') . "</priority>\n";
            $out .= "  </url>\n";
        }

        foreach ($members as $m) {
            $loc = $baseUrl . '/members/' . rawurlencode($m['slug']);
            $out .= "  <url>\n";
            $out .= "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
            $out .= "    <changefreq>monthly</changefreq>\n";
            $out .= "    <priority>0.7</priority>\n";
            $out .= "  </url>\n";
        }

        foreach ($articles as $a) {
            $loc = $baseUrl . '/news/' . rawurlencode($a['slug']);
            $lastmod = date('Y-m-d', strtotime($a['published_at'] ?? 'now'));
            $out .= "  <url>\n";
            $out .= "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
            $out .= "    <lastmod>{$lastmod}</lastmod>\n";
            $out .= "    <changefreq>monthly</changefreq>\n";
            $out .= "    <priority>0.7</priority>\n";
            $out .= "  </url>\n";
        }

        foreach ($events as $e) {
            $loc = $baseUrl . '/events/' . rawurlencode($e['slug']);
            $out .= "  <url>\n";
            $out .= "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
            $out .= "    <changefreq>monthly</changefreq>\n";
            $out .= "    <priority>0.6</priority>\n";
            $out .= "  </url>\n";
        }

        $out .= '</urlset>';
        return $out;
    }

    public function robots(Request $request, Response $response): string
    {
        $baseUrl = rtrim(View::url(''), '/');
        $response->header('Content-Type', 'text/plain; charset=utf-8');

        $out = "User-agent: *\n";
        $out .= "Disallow: /admin\n";
        $out .= "Disallow: /admin/\n";
        $out .= "Disallow: /storage/\n";
        $out .= "\n";
        $out .= "Sitemap: {$baseUrl}/sitemap.xml\n";
        return $out;
    }

    /**
     * Visual HTML Sitemap with categorized openable links
     */
    public function html(Request $request, Response $response): string
    {
        $members = Member::allActive(null, null, 1, 100);
        $articles = News::allPublished(null, null, 1, 50);
        $upcomingEvents = Event::getUpcoming(20);
        $pastEvents = Event::getPast(20);

        return View::render('sitemap.index', [
            'pageTitle' => 'Visual Sitemap & Directory Map | Sri Lanka–France Business Council',
            'metaDescription' => 'Explore the complete directory structure and page index of the official Sri Lanka–France Business Council portal under The Ceylon Chamber of Commerce.',
            'members' => $members,
            'articles' => $articles,
            'upcomingEvents' => $upcomingEvents,
            'pastEvents' => $pastEvents,
        ]);
    }
}
