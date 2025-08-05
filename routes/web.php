<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/continue/registration', [RegisterController::class, 'continue'])->name('registration.continue');
Route::get('/test-encryption', function () {
    $data = ['name' => 'John Doe', 'email' => 'john@example.com'];
    $encrypted = Crypt::encryptString(json_encode($data));
    $decrypted = Crypt::decryptString($encrypted);

    return response()->json([
        'encrypted' => $encrypted,
        'decrypted' => json_decode($decrypted, true),
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
