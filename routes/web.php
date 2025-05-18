<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TamuController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [TamuController::class, 'index'])->name('tamu.index');
Route::post('/tambah', [TamuController::class, 'addData'])->name('tamu.add');
