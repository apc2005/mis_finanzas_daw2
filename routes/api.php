<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Income;

Route::get('/incomes', function (Request $request) {
    return Income::all();
  //  return $request->user();
})/**->middleware('auth:sanctum')*/;
