<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\OutcomeController;
use App\Http\Controllers\CategoryController;
use App\Models\Income;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('incomes', IncomeController::class);
Route::resource('incomes', IncomeController::class);

Route::resource('outcomes', OutcomeController::class);

Route::resource('categories', CategoryController::class);

