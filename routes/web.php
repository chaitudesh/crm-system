<?php

use App\Http\Controllers\AdminController;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\OpportunitiesController;
use App\Http\Controllers\RegisterController;


Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::get('/admin', [AdminController::class, 'index']);

Route::post('adminsubmit', [AdminController::class, 'submit'])->name('admin.submit');

Route::resource('tasks', TaskController::class)->middleware(ValidUser::class);

//Route::resource('register', RegisterController::class);
Route::resource('contacts', ContactController::class)->middleware(ValidUser::class);

Route::resource('leads', LeadsController::class)->middleware(ValidUser::class);


Route::resource('opportunities', OpportunitiesController::class)->middleware(ValidUser::class);


Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard')->middleware(ValidUser::class);

Route::resource('customers', CustomerController::class)->middleware(ValidUser::class);

Route::get('login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
Route::get('logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});


Route::get('password/reset', [App\Http\Controllers\AuthController::class, 'showResetForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\AuthController::class, 'sendResetLinkEmail'])->name('password.email');


Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
});

// Route::get('/', function () {
//     return view('welcome');
// });
