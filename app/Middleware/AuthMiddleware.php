<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Core\Auth;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;

/**
 * Ensures user is authenticated as an administrator
 */
class AuthMiddleware
{
    public function handle(Request $request, Response $response): bool
    {
        if (!Auth::check()) {
            Session::flash('error', 'Authentication required. Please sign in to access the administration panel.');
            $response->redirect('/admin/login');
            return false;
        }

        return true;
    }
}
