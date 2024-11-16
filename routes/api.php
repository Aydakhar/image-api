<?php

use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/images/upload', [ImageController::class, 'upload']);
Route::get('/images', [ImageController::class, 'index']);
