<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Models\Member;
use App\Models\News;
use App\Models\Event;
use App\Models\MembershipApplication;
use App\Models\ContactEnquiry;

class DashboardController
{
    public function index(Request $request, Response $response): string
    {
        $metrics = [
            'total_members' => Member::countActive(),
            'published_news' => News::countPublished(),
            'upcoming_events' => count(Event::getUpcoming(50)),
            'pending_applications' => MembershipApplication::countPending(),
            'unread_enquiries' => ContactEnquiry::countUnread(),
        ];

        $recentApplications = array_slice(MembershipApplication::allAdmin('pending'), 0, 5);
        $recentEnquiries = array_slice(ContactEnquiry::allAdmin('new'), 0, 5);

        return View::render('admin.dashboard', [
            'pageTitle' => 'Secretariat Dashboard | SLFBC Administration',
            'metrics' => $metrics,
            'recentApplications' => $recentApplications,
            'recentEnquiries' => $recentEnquiries,
        ], 'admin');
    }
}
