<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Models\Event;

class EventController
{
    public function index(Request $request, Response $response): string
    {
        $upcomingEvents = Event::getUpcoming(12);
        $pastEvents = Event::getPast(20);

        return View::render('events.index', [
            'pageTitle' => 'Bilateral Events, Summits & Delegations | SLFBC',
            'metaDescription' => 'Discover upcoming and archived bilateral business summits, AGM assemblies, networking dialogues, and French trade delegations.',
            'upcomingEvents' => $upcomingEvents,
            'pastEvents' => $pastEvents,
        ]);
    }

    public function detail(Request $request, Response $response): string
    {
        $slug = $request->param('slug');
        if (!$slug) {
            $response->setStatusCode(404);
            return View::render('errors.404', ['pageTitle' => 'Event Not Found']);
        }

        $event = Event::findBySlug($slug);
        if (!$event) {
            $response->setStatusCode(404);
            return View::render('errors.404', ['pageTitle' => 'Event Not Found']);
        }

        return View::render('events.detail', [
            'pageTitle' => ($event['meta_title'] ?: $event['title']) . ' | SLFBC Events',
            'metaDescription' => $event['meta_description'] ?: ($event['summary'] ?: 'Official event organized by the Sri Lanka–France Business Council.'),
            'event' => $event,
        ]);
    }
}
