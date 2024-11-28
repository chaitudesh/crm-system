<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\OpportunitiesController;
use App\Http\Controllers\RegisterController;



Route::resource('register', RegisterController::class);
// Route::post('register', [RegisterController::class, 'register']);

Route::resource('tasks', TaskController::class);

//Route::resource('register', RegisterController::class);
Route::resource('contacts', ContactController::class);

Route::resource('leads', LeadsController::class);


Route::resource('opportunities', OpportunitiesController::class);


Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::resource('customers', CustomerController::class);

Route::get('login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
Route::get('logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});


Route::get('password/reset', [App\Http\Controllers\AuthController::class, 'showResetForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\AuthController::class, 'sendResetLinkEmail'])->name('password.email');


// Route::get('/', function () {
//     return view('welcome');
// });
