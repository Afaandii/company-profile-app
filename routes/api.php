<?php

use App\Http\Controllers\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/berita', [NewsController::class, 'homeNewsList']);
Route::get('/news', [NewsController::class, 'apiNewsList']);
Route::get('/show-news/{id}', [NewsController::class, 'show']);
