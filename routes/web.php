<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return Inertia::render('Home', ['name' => 'Afandi']);
});

Route::get('/about-us', function () {
    return Inertia::render('About-us');
});

Route::get('/test', function () {
    return Inertia::render('Test');
});
