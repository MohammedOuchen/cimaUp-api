<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest as AdminLoginRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


class AuthenticatedSessionController extends Controller
{

     /**
     * Display the login view.
     *
     * @return \Inertia\Response
     */
    public function create(Request $request)
    {
        switch (Route::currentRouteName()) {
            case 'partner.login':
                $route = 'partner';
                break;
            case 'admin.login':
                $route = 'admin';
                break;
            default:
                $route = 'client';
                break;
        }

        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
            'route' => $route,
        ]);
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminLoginRequest $request)
    {

        $request->authenticate();

        switch ($request->route) {
            case 'admin.login':

                if (Auth::user()->hasRole(Config::get('role.super_admin'))) {
                    $redirect = route('admin.user.index');
                    break;
                } else {
                    Auth::logout();
                    return redirect()->back()->withErrors([
                        'email' => __('auth.failed')
                     ]);
                }
            // case 'partner.login':
            //     if (Auth::user()->hasRole(Config::get('role.group_owner'))) {
            //         auth()->user()->load(['group']);
            //         $redirect = route('partner.index');
            //         break;
            //     } else {
            //         Auth::logout();
            //         return redirect()->back()->withErrors([
            //             'email' => __('auth.failed')
            //          ]);
            //     }
            default:
                if (Auth::user()->hasRole(Config::get('role.super_admin'))) {
                    Auth::logout();
                    return redirect()->back()->withErrors([
                        'email' => __('auth.failed')
                     ]);
                }
                if (Auth::user()->hasRole(Config::get('role.group_owner')) ) {
                    Auth::logout();
                    return redirect()->back()->withErrors([
                        'email' => __('auth.failed')
                     ]);
                }
                $redirect = route('admin.user.index');
                break;
        }

        return redirect($redirect);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return back();
    }
}
