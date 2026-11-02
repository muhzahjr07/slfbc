<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Core\Session;
use App\Models\SiteSetting;

class SettingsAdminController
{
    public function index(Request $request, Response $response): string
    {
        $settings = SiteSetting::all();

        return View::render('admin.settings.index', [
            'pageTitle' => 'Institutional Site Settings | SLFBC Administration',
            'settings' => $settings,
        ], 'admin');
    }

    public function update(Request $request, Response $response): void
    {
        $post = $request->post();

        $allowedKeys = [
            'site_name',
            'secretariat_address',
            'secretariat_phone',
            'secretariat_email',
            'current_exco_term',
            'membership_fee_note',
            'facebook_url',
            'linkedin_url',
            'twitter_url',
        ];

        foreach ($allowedKeys as $key) {
            if (isset($post[$key])) {
                SiteSetting::set($key, trim($post[$key]));
            }
        }

        Session::flash('success', 'Institutional settings updated successfully.');
        $response->redirect(View::url('admin/settings'));
    }
}
