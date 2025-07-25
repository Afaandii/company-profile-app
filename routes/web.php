<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return view('welcome');
// });

// FE route page group
Route::group([], function () {
    Route::get('/', function () {
        return Inertia::render('Home', ['name' => 'Afandi']);
    });
    Route::get('/about-us', function () {
        return Inertia::render('About-us');
    });
    Route::get('/news', function () {
        return Inertia::render('News');
    });
    Route::get('/produk', function () {
        return Inertia::render('Product');
    });
    Route::get('/test', function () {
        return Inertia::render('Test');
    });
    Route::get('/login', function () {
        return view('auth.login');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
