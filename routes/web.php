<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/jadwal', [PublicController::class, 'jadwal'])->name('jadwal');
Route::get('/keuangan', [PublicController::class, 'keuangan'])->name('keuangan');
Route::get('/artikel', [PublicController::class, 'artikel'])->name('artikel');
Route::get('/tentang', [PublicController::class, 'tentang'])->name('tentang');
Route::get('/kontak', [PublicController::class, 'kontak'])->name('kontak');

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/login', [AdminController::class, 'loginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login']);
    
    Route::middleware(['auth'])->group(function() {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        
        // Manajemen User
        Route::get('/users', [AdminController::class, 'usersIndex'])->name('users.index');
        Route::post('/users', [AdminController::class, 'usersStore'])->name('users.store');
        Route::delete('/users/{user}', [AdminController::class, 'usersDestroy'])->name('users.destroy');

        // Manajemen Jadwal
        Route::get('/schedules', [AdminController::class, 'schedulesIndex'])->name('schedules.index');
        Route::post('/schedules', [AdminController::class, 'schedulesStore'])->name('schedules.store');
        Route::delete('/schedules/{schedule}', [AdminController::class, 'schedulesDestroy'])->name('schedules.destroy');

        // Manajemen Keuangan
        Route::get('/finances', [AdminController::class, 'financesIndex'])->name('finances.index');
        Route::post('/finances', [AdminController::class, 'financesStore'])->name('finances.store');
        Route::delete('/finances/{finance}', [AdminController::class, 'financesDestroy'])->name('finances.destroy');

        // Manajemen Artikel
        Route::get('/articles', [AdminController::class, 'articlesIndex'])->name('articles.index');
        Route::post('/articles', [AdminController::class, 'articlesStore'])->name('articles.store');
        Route::get('/articles/{article}/edit', [AdminController::class, 'articlesEdit'])->name('articles.edit');
        Route::put('/articles/{article}', [AdminController::class, 'articlesUpdate'])->name('articles.update');
        Route::delete('/articles/{article}', [AdminController::class, 'articlesDestroy'])->name('articles.destroy');
    });
});
