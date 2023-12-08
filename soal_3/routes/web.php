<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\PegawaiController::class, 'index'])->name('pegawai.index');

Route::prefix('pegawai')->group(function () {
    Route::get('/', [App\Http\Controllers\PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/create', [App\Http\Controllers\PegawaiController::class, 'create'])->name('pegawai.create');
    Route::post('/store', [App\Http\Controllers\PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('/edit/{id}', [App\Http\Controllers\PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::post('/update/{id}', [App\Http\Controllers\PegawaiController::class, 'update'])->name('pegawai.update');
    Route::get('/destroy/{id}', [App\Http\Controllers\PegawaiController::class, 'destroy'])->name('pegawai.destroy');
});