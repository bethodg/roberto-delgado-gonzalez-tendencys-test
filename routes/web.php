<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogProductController;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});

// Route::prefix('products')->group(function () {
//     Route::get('/', [CatalogProductController::class, 'index']);
//     Route::get('{id}', [CatalogProductController::class, 'show']);
//     Route::post('/', [CatalogProductController::class, 'store']);
//     Route::put('{id}', [CatalogProductController::class, 'update']);
//     Route::delete('{id}', [CatalogProductController::class, 'destroy']);

//     // Rutas para operaciones en Batch
//     Route::post('batch', [CatalogProductController::class, 'batchStore']);
//     Route::put('batch', [CatalogProductController::class, 'batchUpdate']);
//     Route::delete('batch', [CatalogProductController::class, 'batchDestroy']);
// });

// Route::prefix('users')->group(function () {
//     Route::get('/', [UserController::class, 'index']);      // Obtener todos los usuarios
//     Route::get('{id}', [UserController::class, 'show']);    // Obtener un usuario específico
//     Route::post('/', [UserController::class, 'store']);     // Crear un nuevo usuario
//     Route::put('{id}', [UserController::class, 'update']);  // Actualizar un usuario existente
//     Route::delete('{id}', [UserController::class, 'destroy']); // Eliminar un usuario
// });
