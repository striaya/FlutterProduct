<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/tungtung', function() {
    return response()->json([
        'message' => 'API Laravel berhasil'
    ]);
});

Route::apiResource('products', ProductController::class);