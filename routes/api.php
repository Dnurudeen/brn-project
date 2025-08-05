<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::group(['namespace' => 'App\Http\Controllers\API'], function () {
    // --------------- Register and Login ----------------//
    Route::post('register', 'AuthController@register')->name('register');
    Route::post('login', 'AuthController@login')->name('login');

    // ------------------ Get Data ----------------------//
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('get-user', 'AuthController@userInfo')->name('get-user');
        Route::post('logout', 'AuthController@logOut')->name('logout');
    });
});

// Route::group(['namespace' => 'App\Http\Controllers\API'], function () {
//     Route::post('/login', 'AuthController@login')->name('login');
//     Route::post('/register', 'AuthController@register')->name('register');

//     Route::middleware('auth:sanctum')->group(function () {
//         Route::post('logout', 'AuthController@logout')->name('logout');
//         Route::get('user', 'AuthController@user')->name('user');
//     });
// });
