<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthenticationController;

//Route::middleware(['auth:admin'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    })->name('admin.home');
    
    Route::get('/dashboard', [AdminController::class, 'getDashboard'])->name('admin.dashboard');
    Route::get('/entities', [AdminController::class, 'getEntities'])->name('admin.entities');
    Route::get('/entities/{id}', [AdminController::class, 'getEntity'])->name('admin.entities.entity');
    Route::patch('/entities/{id}', [AdminController::class, 'patchEntity'])->name('admin.entities.entity.patch');
//});

/**
 * Authentication routes
 */
Route::get('/login', [AuthenticationController::class, 'getLogin'])->name('admin.login');
Route::post('/login', [AuthenticationController::class, 'postLogin'])->name('admin.login.post');
Route::post('/logout', [AuthenticationController::class, 'postLogout'])->name('admin.logout.post');