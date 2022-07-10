<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Client\HomePageController;

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


Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/show/{id}', [HomePageController::class, 'show'])->name('show.episode');


Route::get('/subscription', function () {
    return Inertia::render('Client/Subscription');
 });

 Route::get('/reservation', function () {
   return Inertia::render('Client/Reservation');
});

 Route::get('/ld', function () {
    return Inertia::render('LandingPage');
 });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// page login for admin
Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])->middleware(['guest'])->name('admin.login');

// Page login for partner
Route::get('/partner/login', [AuthenticatedSessionController::class, 'create'])->middleware(['guest'])->name('partner.login');

