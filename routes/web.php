<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('borrar', function () {
    return view('index');
});

Route::resource('materials', MaterialController::class);
