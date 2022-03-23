<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\LocaleController;

use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});*/

/*Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

//Route::get('/dashboard', [UserController::class, 'getDashboard'])->middleware(['auth', 'verified'])->name('dashboard');
//Route::get('/entities', [UserController::class, 'getEntities'])->middleware(['auth', 'verified'])->name('entities');

Route::middleware(['auth:web'])->group(function () {
	Route::get('/', function () {
	        return redirect()->route('dashboard');
	    })->name('home');

Route::get('/dashboard', [UserController::class, 'getDashboard'])->name('dashboard');
Route::get('/entities', [UserController::class, 'getEntities'])->name('entities');
Route::get('/entities/{id}', [UserController::class, 'getEntity'])->name('entities.entity');
Route::patch('/entities/{id}', [UserController::class, 'patchEntity'])->name('entities.entity.patch');

});

/*Route::middleware(['auth:admin'])->group(function () {
	Route::get('/admin', function () {
	        return redirect()->route('admin.dashboard');
	    })->name('admin.home');

Route::get('/admin/dashboard', [AdminController::class, 'getDashboard'])->name('admin.dashboard');

});*/

Route::get('/locale/{locale?}',[LocaleController::class, 'getLocale'])->name('locale.get');
Route::post('/locale/{locale?}',[LocaleController::class, 'postLocale'])->name('locale.post');

/**
 * Authentication routes
 */

//Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

/*Route::get('/admin/login', [AuthenticationController::class, 'getLogin'])->name('admin.login');
Route::post('/admin/login', [AuthenticationController::class, 'postLogin'])->name('admin.login.post');
Route::post('/admin/logout', [AuthenticationController::class, 'postLogout'])->name('admin.logout.post');
*/

require __DIR__.'/auth.php';
