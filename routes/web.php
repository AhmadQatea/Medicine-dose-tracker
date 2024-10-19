<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\medicineControler;
use App\Http\Controllers\SmsController;

Route::get('/', function () {
    return redirect('/home'); // إعادة توجيه إلى /home
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('medicines', medicineControler::class);

// Route::get('/sendsms', [SmsController::class, 'sendSms']);
