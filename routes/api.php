<?php

use App\Http\Controllers\AudioController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::apiResource('projects', ProjectController::class);
Route::apiResource('audios', AudioController::class);
