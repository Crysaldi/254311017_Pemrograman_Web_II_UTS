<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SumberEnergiController;

Route::get('/', function () {
    return redirect()->route('sumber-energi.index');
});

Route::resource('sumber-energi', SumberEnergiController::class);