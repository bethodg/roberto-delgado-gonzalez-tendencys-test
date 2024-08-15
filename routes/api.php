<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CatalogProductController;
use App\Http\Controllers\Api\TokenController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('products')->middleware('auth:sanctum')->group(function () {

    Route::post('batch', [CatalogProductController::class, 'batchStore']);
    Route::put('batch', [CatalogProductController::class, 'batchUpdate']);
    Route::delete('batch', [CatalogProductController::class, 'batchDestroy']);

    Route::get('/', [CatalogProductController::class, 'index']);
    Route::get('{id}', [CatalogProductController::class, 'show']);
    Route::post('/', [CatalogProductController::class, 'store']);
    Route::put('{id}', [CatalogProductController::class, 'update']);
    Route::delete('{id}', [CatalogProductController::class, 'destroy']);
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('{id}', [UserController::class, 'show']);
    Route::post('/', [UserController::class, 'store']);
    Route::put('{id}', [UserController::class, 'update']);
    Route::delete('{id}', [UserController::class, 'destroy'])->middleware('auth:sanctum');
});

Route::prefix('tokens')->group(function () {
    Route::post('/create', [TokenController::class, 'create']);
});
