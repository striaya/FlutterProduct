<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/tungtung', function () {
    return response()->json([
        'message' => 'API Laravel berhasil'
    ]);
});

Route::post('/login', [AuthController::class, 'login']);
Route::apiResource('/products', ProductController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});
