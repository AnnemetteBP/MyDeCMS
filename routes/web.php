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

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Auth::routes();

Route::prefix('manage')->middleware('role:superadministrator|administrator')->group(function(){
    Route::get('/', [ManageController::class, 'index'])->name('manage.home');
    Route::get('/dashboard', [ManageController::class, 'dashboard'])->name('manage.dashboard');
    Route::resource('/users', 'UserController');
    Route::resource('/permissions', 'PermissionController');
    Route::resource('/roles', 'RoleController');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
