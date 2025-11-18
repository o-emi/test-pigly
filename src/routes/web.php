<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightLogController;


// STEP1
Route::get('/register/step1', [WeightLogController::class, 'showStep1']);
Route::post('/register/step1', [WeightLogController::class, 'postStep1']);

Route::get('/register/step2', [WeightLogController::class, 'showStep2']);
Route::post('/register/step2', [WeightLogController::class, 'postStep2']);
