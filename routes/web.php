<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PembayaranController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect()->route('siswa.index');
});

Route::resource('siswa', SiswaController::class);

Route::resource('pembayaran', PembayaranController::class);