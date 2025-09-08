<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Homepage → QR create form
Route::get('/', function () {
    return view('qr.create'); // Blade view: resources/views/qr/create.blade.php
})->name('qr.create');

// Handle form submission (generate QR)
Route::post('/qr-codes', [QrCodeController::class, 'store'])->name('qr.store');

// Optional: show a list of generated QR codes (if you want history)
Route::get('/qr-codes', [QrCodeController::class, 'index'])->name('qr.index');
