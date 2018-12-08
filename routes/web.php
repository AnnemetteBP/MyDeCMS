<?php

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

use \App\Http\Controllers\ManageController;
use \App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('manage')->group(function(){
    Route::get('/dashboard', [ManageController::class, 'dashboard'])->name('manage.dashboard');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
