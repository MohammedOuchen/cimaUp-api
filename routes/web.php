<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return view('Client.homePage');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// page login for admin
Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])->middleware(['guest'])->name('admin.login');

// Page login for partner
Route::get('/partner/login', [AuthenticatedSessionController::class, 'create'])->middleware(['guest'])->name('partner.login');


// Route::post('/login-user', [AuthenticatedSessionController::class, 'store'])->middleware('guest')->name('auth.user.login');

// Route::post('/login', [AuthenticatedSessionController::class, 'store']);

