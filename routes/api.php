<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Api\EmergencyContactController;
use App\Http\Controllers\QrCodeController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/contacts', [EmergencyContactController::class, 'index']);
    Route::post('/contacts', [EmergencyContactController::class, 'store']);
    Route::delete('/contacts/{contact}', [EmergencyContactController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->get('/qrcode', [QrCodeController::class, 'show']);
