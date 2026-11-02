<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Models\Member;

class MemberDirectoryController
{
    public function index(Request $request, Response $response): string
    {
        $search = $request->query('search');
        $search = $search !== null ? trim($search) : null;
        if ($search === '') {
            $search = null;
        }

        $sectorId = null;
        $sectorParam = $request->query('sector');
        if (!empty($sectorParam) && is_numeric($sectorParam)) {
            $sectorId = (int)$sectorParam;
        }

        $page = max(1, (int)($request->query('page') ?? 1));
        $perPage = 12;

        $members = Member::allActive($sectorId, $search, $page, $perPage);
        $totalMembers = Member::countActive($sectorId, $search);
        $totalPages = (int)ceil($totalMembers / $perPage);

        $sectors = Member::getAllSectors();

        return View::render('members.index', [
            'pageTitle' => 'Member Directory | Sri Lanka–France Business Council',
            'metaDescription' => 'Explore corporate members of the Sri Lanka–France Business Council. Search across bilateral sectors, trade leaders, and multinational enterprises.',
            'members' => $members,
            'sectors' => $sectors,
            'currentSectorId' => $sectorId,
            'currentSearch' => $search,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'totalMembers' => $totalMembers,
        ]);
    }

    public function detail(Request $request, Response $response): string
    {
        $slug = $request->param('slug');
        if (!$slug) {
            $response->setStatusCode(404);
            return View::render('errors.404', ['pageTitle' => 'Member Not Found']);
        }

        $member = Member::findBySlug($slug);
        if (!$member) {
            $response->setStatusCode(404);
            return View::render('errors.404', ['pageTitle' => 'Member Not Found']);
        }

        return View::render('members.detail', [
            'pageTitle' => $member['name'] . ' | Member Profile | SLFBC',
            'metaDescription' => $member['short_description'] ?? 'Official corporate profile in the Sri Lanka–France Business Council directory.',
            'member' => $member,
        ]);
    }
}
