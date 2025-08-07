<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserAccessController;
use App\Http\Middleware\CheckPermission;
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
    Route::get('/show-news/{id}', function ($id) {
        return Inertia::render('Show', ['id' => $id]);
    });
});

Route::middleware(['auth', 'verified', 'permission:show-app'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard')->middleware('permission:show-app');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('settings')->group(function () {
        // role tabel
        Route::get('/role', [RoleController::class, 'index'])->name('role_home');
        Route::middleware('permission:create-app', 'permission:delete-app')->group(function () {
            Route::get('/role-permission/{id}', [RoleController::class, 'permission'])->name('role-permission');
            Route::post('/user-access-permission-toggle', [RoleController::class, 'toggle'])->name('role.permission.toggle');
        });

        // user access
        Route::get('/user-access', [UserAccessController::class, 'index'])->name('user-access');

        // middleware access permission create
        Route::middleware('permission:create-app')->group(function () {
            // create tabel role
            Route::get('/create-role', [RoleController::class, 'create'])->name('form_create_role');
            Route::post('/store-role', [RoleController::class, 'store'])->name('store_role');
        });
        // middelware access permission edit-app
        Route::middleware('permission:edit-app')->group(function () {
            // edit tabel role
            Route::get('/edit-role/{id}', [RoleController::class, 'edit'])->name('form-edit-role');
            Route::put('/update-role/{id}', [RoleController::class, 'update'])->name('update-role');

            //edit tabel user
            Route::get('/edit-user-access/{id}', [UserAccessController::class, 'edit'])->name('form-edit-user-access')->middleware('permission:edit-app');
            Route::put('update-user-access/{id}', [UserAccessController::class, 'update'])->name('update-user-access');
        });

        // middleware permission delete-app
        Route::middleware('permission:delete-app')->group(function () {
            // user
            Route::delete('delete-user-access/{id}', [UserAccessController::class, 'destroy'])->name('delete-user-access');

            //role
            Route::delete('/delete-role/{id}', [RoleController::class, 'destroy'])->name('delete_role');
        });
    });

    // master
    // prefix buat open-menu dan activce class sidebar
    Route::prefix('master')->group(function () {
        Route::get('/category',  [CategoryController::class, 'index'])->name('category_home');
        Route::get('/checkSlug', [CategoryController::class, 'checkSlug']);

        // permission access create
        Route::middleware('permission:create-app')->group(function () {
            // category
            Route::get('/create-category', [CategoryController::class, 'create'])->name('form-create-kategori');
            Route::post('/store-category', [CategoryController::class, 'store'])->name('store-category');
        });

        // permission access edit-app 
        Route::middleware('permission:edit-app')->group(function () {
            // category
            Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('form-edit-category');
            Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('update-category');
        });

        // permission access delete-app
        Route::middleware('permission:delete-app')->group(function () {
            // category
            Route::delete('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('delete-category');
        });
    });

    // Transaksi
    Route::prefix('transaksi')->group(function () {
        Route::get('/news', [NewsController::class, 'index'])->name('news-home');
        Route::get('/checkSlug', [NewsController::class, 'checkSlug']);

        // permission access create-app
        Route::middleware('permission:create-app')->group(function () {
            // news
            Route::get('/create-news', [NewsController::class, 'create'])->name('form-create-news');
            Route::post('/store-news', [NewsController::class, 'store'])->name('store-news');
        });

        // permission access edit-app
        Route::middleware('permission:edit-app')->group(function () {
            // news
            Route::get('/edit-news/{id}', [NewsController::class, 'edit'])->name('form-edit-news');
            Route::put('/update-news/{id}', [NewsController::class, 'update'])->name('update-news');
        });

        // permission access delete-app
        Route::middleware('permission:delete-app')->group(function () {
            // news
            Route::delete('/delete-news/{id}', [NewsController::class, 'destroy'])->name('delete-news');
        });
    });
});

require __DIR__ . '/auth.php';