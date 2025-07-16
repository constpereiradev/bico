<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Client;
use App\Models\Professional;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Show the login page.
     */
    public function create(Request $request): Response
    {
        return Inertia::render('auth/Login', [
            //'canResetPassword' => Route::has('password.request'),
            'canResetPassword' => false,
            'status' => $request->session()->get('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $userType = $this->checkUserType(Auth::user()->id);
        $route = 'dashboard';

        if ($userType) {
            if ($userType == 'client') {
                $route = 'client.dashboard';
            }

            if ($userType == 'professional') {
                $route = 'professional.dashboard';
            }
        }

        return redirect()->intended(route($route, absolute: false))
            ->with('user', Auth::user());
    }

    public function checkUserType(int $userId)
    {
        $client = Client::where('user_id', $userId)->first();

        if ($client) {
            return 'client';
        }

        $professional = Professional::where('user_id', $userId)->first();

        if ($professional) {
            return 'professional';
        }

        return false;
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
