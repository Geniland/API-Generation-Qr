<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmergencyController;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('/emergency/{uuid}', [EmergencyController::class, 'show']);

require __DIR__.'/auth.php';



