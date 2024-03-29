<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

/*
|--------------------------------------------------------------------------
| auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register auth routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');

// Route::post('/register', [RegisteredUserController::class, 'store']);

// Route::get('/owner/register', [RegisteredUserController::class, 'create'])
//                 ->middleware('guest')
//                 ->name('owner.register.create');

// Route::post('/owner/register', [RegisteredUserController::class, 'storeOwner'])
//                 ->middleware('guest')
//                 ->name('owner.register.store');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
//                 ->middleware('guest')
//                 ->name('password.request');

// Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
//                 ->middleware('guest')
//                 ->name('password.email');

// Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
//                 ->middleware('guest')
//                 ->name('password.reset');

// Route::post('/reset-password', [NewPasswordController::class, 'store'])
//                 ->middleware('guest')
//                 ->name('password.update');

// Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
//                 ->middleware('auth')
//                 ->withoutMiddleware(['guest'])
//                 ->name('verification.notice');

// Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
//                 ->middleware(['auth', 'signed', 'throttle:6,1'])
//                 ->withoutMiddleware(['guest'])
//                 ->name('verification.verify');

// Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//                 ->middleware(['auth', 'throttle:6,1'])
//                 ->withoutMiddleware(['guest'])
//                 ->name('verification.send');

// Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
//                 ->middleware('auth')
//                 ->withoutMiddleware(['guest'])
//                 ->name('password.confirm');

// Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
//                 ->middleware('auth')
//                 ->withoutMiddleware(['guest']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->withoutMiddleware(['guest'])
                ->name('logout');
