<?php

use App\Http\Controllers\AdminPanelFunctionality;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserProfileController;
use App\Http\Middleware\AdminDashboard;
use Illuminate\Support\Facades\Route;

//Load Home Page
Route::get('/', function(){
    return view('pages.home.welcome');
});

//User Controller Route Create, Read, Update, Delete
Route::resource('userProfile',UserProfileController::class);
//Attach Middleware on Resouce Controller with only Index Method On UserProfile Controller
Route::resource('userProfile', UserProfileController::class)->only('index')->middleware(AdminDashboard::class);

//Authtication Route
Route::controller(AuthController::class)->group(function(){
    Route::get('/auth/login/page', 'showLoginPage')->name('loginpage');
    Route::post('/auth/login', 'checkLogin')->name('auth');
    Route::post('/auth/logout', 'Logout')->name('logout');
});

//Search for User
Route::get('/serach',[AdminPanelFunctionality::class, 'searchUser'])->name('searchuser');