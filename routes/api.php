<?php

use App\Http\Controllers\QrCodeController;

Route::post('/qr', [QrCodeController::class, 'generateApi']);
