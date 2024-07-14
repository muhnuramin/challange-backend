<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BudayaController;
use App\Http\Controllers\Api\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/budayas', [BudayaController::class, 'index']);
Route::post('/add-budayas', [BudayaController::class, 'createCulture']);
Route::post('/login', [AuthController::class, 'login']);
Route::delete('/budayas/{id}', [BudayaController::class, 'destroy']);
Route::put('/budayas/publish/{id}', [BudayaController::class, 'updateStatusPublish']);
