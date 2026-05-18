<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\AbsenceController2;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\law;
use App\Http\Controllers\lawController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DailyWork;
use App\Http\Controllers\DailyWorkController;
use App\Http\Controllers\GroupController;

use App\Http\Controllers\GoogleAuthController;

Route::get('/auth/google', [GoogleAuthController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);

Route::get('/', IndexController::class)->name('index');

Route::get('/signup', [LoginController::class, 'signupForm'])->name('signup.form');
Route::post('/signup', [LoginController::class, 'signup'])->name('signup');
Route::get('/login', [LoginController::class, 'loginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('account',[UserController::class,'account'])->name('users.account')->middleware('auth');

Route::resource('materials', MaterialController::class)->middleware('is_admin');
Route::resource('budgets', BudgetController::class)->middleware('is_admin');
Route::resource('tasks', TaskController::class)->middleware('auth');
Route::resource('messages', MessageController::class)->middleware('auth');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/daily-work/fetch', [DailyWorkController::class, 'fetch']);


Route::prefix('users/{user}')->group(function () {
    Route::get('/absences', [AbsenceController2::class, 'index'])->name('absences.index');
    Route::get('/absences/create', [AbsenceController2::class, 'create'])->name('absences.create');
    Route::post('/absences', [AbsenceController2::class, 'store'])->name('absences.store');
});

Route::get('privacity',[lawController::class,'privacity'])->name('privacity');
Route::get('terms',[lawController::class,'terms'])->name('terms');

Route::resource('daily_work',DailyWorkController::class)->middleware('is_admin_or_foreman');

Route::resource('groups', GroupController::class);

// comprobar el registro

Route::post('/check-user-data', [App\Http\Controllers\LoginController::class, 'checkUserData'])
    ->middleware('throttle:5,1')
    ->name('check.user.data');

    // ruta extra para buscar los messages
    Route::get('/messages-filter', [App\Http\Controllers\MessageController::class, 'filter'])->name('messages.filter');
