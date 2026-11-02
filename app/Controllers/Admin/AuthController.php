<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Core\Auth;
use App\Core\Session;

class AuthController
{
    public function showLogin(Request $request, Response $response): string
    {
        if (Auth::check()) {
            $response->redirect(View::url('admin/dashboard'));
            return '';
        }

        return View::render('admin.login', [
            'pageTitle' => 'Secretariat Administrative Login | SLFBC',
            'error' => Session::getFlash('login_error'),
            'rateLimited' => Auth::isRateLimited($_SERVER['REMOTE_ADDR'] ?? '127.0.0.1'),
        ], null);
    }

    public function login(Request $request, Response $response): void
    {
        $email = trim($request->post('email') ?? '');
        $password = $request->post('password') ?? '';
        $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';

        if (empty($email) || empty($password)) {
            Session::flash('login_error', 'Please provide both your registered email address and administrative passphrase.');
            $response->redirect(View::url('admin/login'));
            return;
        }

        if (Auth::isRateLimited($ip)) {
            Session::flash('login_error', 'Security alert: Too many unsuccessful login attempts. Access is temporarily restricted for 15 minutes.');
            $response->redirect(View::url('admin/login'));
            return;
        }

        if (!Auth::attempt($email, $password, $ip)) {
            Session::flash('login_error', 'Invalid email credentials or administrative passphrase.');
            $response->redirect(View::url('admin/login'));
            return;
        }

        $response->redirect(View::url('admin/dashboard'));
    }

    public function logout(Request $request, Response $response): void
    {
        Auth::logout();
        $response->redirect(View::url('admin/login'));
    }
}
