<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('pages.home.welcome');
});

Route::resource('userProfile',UserProfileController::class);

Route::controller(AuthController::class)->group(function(){
    Route::get('/auth/login/page', 'showLoginPage')->name('loginpage');
    Route::post('/auth/login', 'checkLogin')->name('auth');
});

// Route::get('admin/dashboard', function(){
//     return view('pages.admin.Dashboard');
// })->name('admindash');