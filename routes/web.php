<?php

use App\Http\Controllers\AdminPanelFunctionality;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserProfileController;
use App\Http\Middleware\AdminDashboard;
use Illuminate\Support\Facades\Route;

//Load Home Page
Route::view('/','pages.home.welcome');

//User Controller Route Create, Read, Update, Delete
Route::resource('userProfile', UserProfileController::class);
//add a custom methos to resouce controller
Route::get('post/public/{id}',[PostController::class,'showPostPublic'])->name('post.showPostPublic');
Route::resource('post', PostController::class);

//Attach Middleware on Resouce Controller with only Index Method On UserProfile Controller
Route::resource('userProfile', UserProfileController::class)->only('index')->middleware(AdminDashboard::class);
Route::resource('post', PostController::class)->only('create')->middleware('auth');


//Authtication Route
Route::controller(AuthController::class)->group(function(){
    Route::get('/auth/login/page', 'loginPage')->name('login.page');
    Route::post('/auth/login', 'login')->name('login');
    Route::post('/auth/logout', 'Logout')->name('logout');
});

//Search for User
Route::get('/serach',[AdminPanelFunctionality::class, 'searchUser'])->name('searchuser');

//Comment on Post
Route::post('/post/comments',[CommentController::class,'PostComment'])->name('comment');