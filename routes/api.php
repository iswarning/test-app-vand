<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;

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

Route::group([
    'prefix' => 'auth'
], function () {

    // authenticate controller
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        // store controller
        Route::get('stores/list', [StoreController::class, 'list']);
        Route::get('stores/detail/{id}', [StoreController::class, 'detail']);
        Route::post('stores/search', [StoreController::class, 'search']);
        Route::post('stores/create', [StoreController::class, 'create']);
        Route::put('stores/update/{id}', [StoreController::class, 'update']);
        Route::delete('stores/delete/{id}', [StoreController::class, 'delete']);

        // product controller
        Route::get('products/list', [ProductController::class, 'list']);
        Route::get('products/detail/{id}', [ProductController::class, 'detail']);
        Route::post('products/search', [ProductController::class, 'search']);
        Route::post('products/create', [ProductController::class, 'create']);
        Route::put('products/update/{id}', [ProductController::class, 'update']);
        Route::delete('products/delete/{id}', [ProductController::class, 'delete']);
    });

});