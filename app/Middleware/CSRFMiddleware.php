<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Core\CSRF;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;

/**
 * Validates CSRF token on all state-changing requests (POST)
 */
class CSRFMiddleware
{
    public function handle(Request $request, Response $response): bool
    {
        if ($request->isPost()) {
            $token = (string)$request->post('_csrf_token', '');
            if (!CSRF::validate($token)) {
                if ($request->isAjax()) {
                    $response->json(['error' => 'Security token invalid or expired. Please refresh the page.'], 403);
                    return false;
                }

                $response->setStatusCode(403);
                $response->setContent('<!DOCTYPE html><html><head><title>403 Forbidden</title></head><body style="font-family:sans-serif;padding:3rem;text-align:center;"><h1>403 Forbidden</h1><p>CSRF verification failed. Your session security token was missing or invalid.</p><p><a href="javascript:history.back()">&larr; Return to previous page</a></p></body></html>');
                return false;
            }
        }

        return true;
    }
}
