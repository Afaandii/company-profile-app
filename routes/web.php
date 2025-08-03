<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserAccessController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return view('welcome');
// });

// FE route page group
Route::group([], function () {
    Route::get('/', function () {
        return Inertia::render('Home', ['name' => 'Afandi']);
    })->name('homepage');
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

    Route::prefix('settings')->group(function () {
        // role tabel
        Route::get('/role', [RoleController::class, 'index'])->name('role_home');
        Route::get('/create-role', [RoleController::class, 'create'])->name('form_create_role');
        Route::post('/store-role', [RoleController::class, 'store'])->name('store_role');
        Route::get('/edit-role/{id}', [RoleController::class, 'edit'])->name('form-edit-role');
        Route::put('/update-role/{id}', [RoleController::class, 'update'])->name('update-role');
        Route::delete('/delete-role/{id}', [RoleController::class, 'destroy'])->name('delete_role');
        Route::get('/role-permission/{id}', [RoleController::class, 'permission'])->name('role-permission');
        Route::post('/user-access-permission-toggle', [RoleController::class, 'toggle'])->name('role.permission.toggle');

        // user access
        Route::get('/user-access', [UserAccessController::class, 'index'])->name('user-access');
        Route::get('/edit-user-access/{id}', [UserAccessController::class, 'edit'])->name('form-edit-user-access');
        Route::put('update-user-access/{id}', [UserAccessController::class, 'update'])->name('update-user-access');
        Route::delete('delete-user-access/{id}', [UserAccessController::class, 'destroy'])->name('delete-user-access');
    });

    // master
    // prefix buat open-menu dan activce class sidebar
    Route::prefix('master')->group(function () {
        Route::get('/category',  [CategoryController::class, 'index'])->name('category_home');
        Route::get('/create-category', [CategoryController::class, 'create'])->name('form-create-kategori');
        Route::post('/store-category', [CategoryController::class, 'store'])->name('store-category');
        Route::get('/checkSlug', [CategoryController::class, 'checkSlug']);
        Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('form-edit-category');
        Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('update-category');
        Route::delete('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('delete-category');
    });

    // Transaksi
    Route::prefix('transaksi')->group(function () {
        Route::get('/news', [NewsController::class, 'index'])->name('news-home');
        Route::get('/create-news', [NewsController::class, 'create'])->name('form-create-news');
        Route::post('/store-news', [NewsController::class, 'store'])->name('store-news');
        Route::get('/edit-news/{id}', [NewsController::class, 'edit'])->name('form-edit-news');
        Route::put('/update-news/{id}', [NewsController::class, 'update'])->name('update-news');
        Route::delete('/delete-news/{id}', [NewsController::class, 'destroy'])->name('delete-news');
        Route::get('/checkSlug', [NewsController::class, 'checkSlug']);
    });
});

require __DIR__ . '/auth.php';
