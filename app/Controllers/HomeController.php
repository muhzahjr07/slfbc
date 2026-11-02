<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Models\BusinessOpportunity;
use App\Models\Event;
use App\Models\Leadership;
use App\Models\Member;
use App\Models\News;
use App\Models\SiteSetting;

class HomeController
{
    public function index(Request $request, Response $response): string
    {
        $featuredMembers = Member::getFeatured(8);
        $latestNews = News::getLatest(3);
        $upcomingEvents = Event::getUpcoming(3);
        $opportunities = BusinessOpportunity::allFeatured();
        $president = Leadership::getPresident();
        $committee = Leadership::allActive();

        return View::render('home.index', [
            'pageTitle' => 'Sri Lanka–France Business Council | Ceylon Chamber of Commerce',
            'metaDescription' => 'The Sri Lanka–France Business Council connects businesses, institutions and investors to strengthen commercial relationships between Sri Lanka and France.',
            'featuredMembers' => $featuredMembers,
            'latestNews' => $latestNews,
            'upcomingEvents' => $upcomingEvents,
            'opportunities' => $opportunities,
            'president' => $president,
            'committee' => $committee,
            'settings' => SiteSetting::all(),
        ]);
    }
}
