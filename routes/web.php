<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\BudgetController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('borrar', function () {
    return view('index');
});
Route::resource('materials', MaterialController::class);
Route::resource('budgets', BudgetController::class);
