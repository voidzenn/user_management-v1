<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// REGISTER ROUTE
Route::post('/register', ['\App\Http\Controllers\Api\ApiController', 'register']);

// USER ROUTE
Route::group(['prefix' => 'users'], function(){
    Route::get('/', ['\App\Http\Controllers\Admin\UserController', 'get_user']);
     // sample
    Route::get('/paginate', ['\App\Http\Controllers\Admin\UserController', 'get_user_paginate']);
    Route::get('/{user}', ['\App\Http\Controllers\Admin\UserController', 'get_single_user']);
    Route::post('/store', ['\App\Http\Controllers\Admin\UserController', 'store']);
    Route::put('/{user}', ['\App\Http\Controllers\Admin\UserController', 'update']);
    Route::put('/{user}/update_pass', ['\App\Http\Controllers\Admin\UserController', 'update_pass']);
    Route::delete('/{user}', ['\App\Http\Controllers\Admin\UserController', 'destroy']);
});


// ROLE ROUTE
Route::get('/roles', ['\App\Http\Controllers\Admin\RoleController', 'get_role']);

// CAR ROUTE
Route::middleware('auth:sanctum')->get('/cars', ['\App\Http\Controllers\Api\CarController', 'getCars']);
Route::get('/cars/data', ['\App\Http\Controllers\Api\CarController', 'getCarsData']);
