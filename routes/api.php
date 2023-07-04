<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\productController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function() {
    return response()->json([
        'status' => false,
        'message' => 'akses tidak diperbolehkan'
    ], 401);
})->name('login');

//agar melalui token api
Route::get('product', [productController::class, 'index'])->middleware('auth:sanctum');
Route::post('product', [productController::class, 'store'])->middleware('auth:sanctum');
Route::post('registerUser', [authController::class, 'registerUser']);
Route::get('loginUser', [authController::class, 'loginUser']);
