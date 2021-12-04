<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Route::get('/', function () {
//    if(Auth::user())
//    {
//        return redirect()->route('dashboard');
//    }
//    return view('welcome');
//});

Auth::routes();

Route::get('{path}', [App\Http\Controllers\HomeController::class, 'index'])
    ->where('path', '.*');

// USER ROUTE
Route::get('/users', ['\App\Http\Controllers\Admin\UserController', 'getUser']);
