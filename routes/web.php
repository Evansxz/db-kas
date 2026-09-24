<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
    
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect()->route('siswa.index');
});

Route::resource('siswa', SiswaController::class);

Route::resource('pembayaran', PembayaranController::class);