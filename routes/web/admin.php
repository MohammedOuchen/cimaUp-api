<?php

use App\Http\Controllers\Admin\CinemaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EpisodeController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\Participant\UserController as ParticipantUserController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('home', [DashboardController::class, 'index'])->name('home');

Route::resource('user', UserController::class);

//cinnema
Route::resource('cinema' , CinemaController::class);

//Room
Route::resource('room', RoomController::class);

//Participant
Route::resource('participant' , ParticipantUserController::class);

//episode
Route::resource('episode' , EpisodeController::class);

//offer
Route::resource('offer' , OfferController::class);

