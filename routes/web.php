<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CustomerPanel\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, "index"])->name('home');
Route::get('/cours', [HomeController::class, "cours"])->name('cours');
Route::get('/cours/{id}', [HomeController::class, "detail"])->name('cours.voir');
Route::get('/contact', [HomeController::class, "contact"])->name('contact');


Route::middleware(['auth', 'verified'])->prefix('eleve')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('dashboard');
        Route::get('/mes_cours', [CustomerController::class, 'cours'])->name('mes_cours');
        Route::get('/mes_cours/{id}', [CustomerController::class, 'detail'])->name('detail');
        Route::get('/mes_cours/{cour}/{id}', [CustomerController::class, 'chapitre'])->name('chapitre');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('souscrire/{id}', [HomeController::class, 'souscrire'])->name('souscrire');
});

require_once __DIR__ . '/auth.php';
