<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\OutcomeController;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('incomes', IncomeController::class);
Route::get('/incomes', [IncomeController::class, 'index'])->name('incomes.index');
Route::get('/outcomes', [OutcomeController::class, 'index'])->name('outcomes.index');


Route::get('/incomes/create', [IncomeController::class, 'create'])->name('incomes.create');
Route::post('/incomes/store', [IncomeController::class, 'store'])->name('incomes.store');
Route::resource('incomes', IncomeController::class);

Route::get('/outcomes/create', [OutcomeController::class, 'create'])->name('outcomes.create');
Route::post('/outcomes/store', [OutcomeController::class, 'store'])->name('outcomes.store');
Route::resource('outcomes', OutcomeController::class);