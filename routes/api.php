<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarrerasController;
use App\Http\Controllers\UnidadesCurricularesController;
use App\Models\UnidadesCurriculares;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Authenticated Routes (Requires Sanctum token)
Route::middleware('auth:sanctum')->group(function () {
     Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);

    // Carrera Routes
    Route::middleware('role:admin')->group(function () {
        Route::post('carreras', [CarrerasController::class, 'store']);
        Route::put('carreras/{id}', [CarrerasController::class, 'update']);
        Route::delete('carreras/{id}', [CarrerasController::class, 'destroy']);

        Route::post('unidadesCurriculares', [UnidadesCurricularesController::class, 'store']);
        Route::put('unidadesCurriculares/{id}', [UnidadesCurricularesController::class, 'update']);
        Route::delete('unidadesCurriculares/{id}', [UnidadesCurricularesController::class, 'destroy']);
    });

    Route::middleware('role:admin|profesor|estudiante')->group(function () {
        // Rutas para Carreras
        Route::get('carreras', [CarrerasController::class, 'index']);
        Route::get('carrerasWithUC', [CarrerasController::class, 'showWithUC']);
        Route::get('/carreras/{id}', [CarrerasController::class, 'show']);


        // Rutas para Unidades Curriculares
        Route::get('unidadesCurriculares', [UnidadesCurricularesController::class, 'index']);
        
    });


});


