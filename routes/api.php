<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CatalogProductController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('products')->group(function () {
     // Rutas para operaciones en Batch
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
    Route::get('/', [UserController::class, 'index']);      // Obtener todos los usuarios
    Route::get('{id}', [UserController::class, 'show']);    // Obtener un usuario específico
    Route::post('/', [UserController::class, 'store']);     // Crear un nuevo usuario
    Route::put('{id}', [UserController::class, 'update']);  // Actualizar un usuario existente
    Route::delete('{id}', [UserController::class, 'destroy']); // Eliminar un usuario
});
