<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightLogController;


Route::get('/register/step1', [WeightLogController::class, 'showStep1']);
Route::post('/register/step1', [WeightLogController::class, 'postStep1']);

Route::get('/register/step2', [WeightLogController::class, 'showStep2']);
Route::post('/register/step2', [WeightLogController::class, 'postStep2']);

Route::get('/', [WeightLogController::class, 'index']);

Route::get('/login', [WeightLogController::class, 'showLogin']);
Route::post('/login', [WeightLogController::class, 'login']);