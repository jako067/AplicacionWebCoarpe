<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Controllers\MaterialController;


//se puede usar ya el middleware ('is_admin');

Route::get('/', IndexController::class)->name('index');

Route::get('/signup', [LoginController::class, 'signupForm'])->name('signup.form');
Route::post('/signup', [LoginController::class, 'signup'])->name('signup');
Route::get('/login', [LoginController::class, 'loginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('account',[UserController::class,'account'])->name('users.account')->middleware('auth');

Route::resource('materials', MaterialController::class);
