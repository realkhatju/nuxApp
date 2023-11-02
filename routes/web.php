<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('../admin.layouts.app');
    // })->name('dashboard');

    //Dashboard
    Route::get('profile',[ProfileController::class,'index'])->name('admin#profile');

    //List
    Route::get('admin/list',[ListController::class,'index'])->name('admin#list');
    Route::post('admin/list',[ListController::class,'adminListSearch'])->name('admin#listSearch');

    //Home
    Route::get('home',[HomeController::class,'index'])->name('admin#home');

    //Notifications
    Route::get('notifications',[NotificationController::class,'index'])->name('admin#notifications');

    //Post
    Route::get('post',[PostController::class,'index'])->name('admin#post');
    Route::post('post/create',[PostController::class, 'createPost'])->name('admin#createPost');

    //Change Password
    Route::get('admin/changePassword',[ProfileController::class,'directChangePassword'])->name('admin#directChangePassword');
    Route::post('admin/changePassword',[ProfileController::class,'changePassword'])->name('admin#changePassword');

    //Account Update
    Route::post('admin/accountUpdate',[ProfileController::class,'adminAccountUpdate'])->name('admin#adminAccountUpdate');

    //Delete User Account
    Route::get('admin/accountDelete/{id}',[ListController::class,'deleteUserAccount'])->name('admin#deleteAccount');

    //Message
    Route::get('admin/message',[ProfileController::class,'messageApp'])->name('admin#message');

});
