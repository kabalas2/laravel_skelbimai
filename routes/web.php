<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'landingpage'])->name('homepage');
Route::get('/profile/ads', [App\Http\Controllers\UserPanelController::class, 'myAds'])->name('profile.ads');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/ad', 'App\Http\Controllers\AdController');


// Messages

Route::get('/messages/send/{reseiverId}', [App\Http\Controllers\MessageController::class, 'create'])->name('messages.create');
Route::get('/messages/read/{chatFrienId}', [App\Http\Controllers\MessageController::class, 'read'])->name('messages.read');
Route::get('/messages', [App\Http\Controllers\MessageController::class, 'inbox'])->name('messages.inbox');
Route::post('/messages/send', [App\Http\Controllers\MessageController::class, 'send'])->name('messages.send');
