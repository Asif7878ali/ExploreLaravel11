<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserProfileController;
use App\Http\Middleware\AdminDashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('pages.home.welcome');
});

Route::resource('userProfile',UserProfileController::class);

Route::resource('userProfile', UserProfileController::class)->only('index')->middleware(AdminDashboard::class);

Route::controller(AuthController::class)->group(function(){
    Route::get('/auth/login/page', 'showLoginPage')->name('loginpage');
    Route::post('/auth/login', 'checkLogin')->name('auth');
    Route::post('/auth/logout', 'Logout')->name('logout');
});
