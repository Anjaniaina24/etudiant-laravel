<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LanguageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirection racine - VÉRIFIER SI L'UTILISATEUR EST CONNECTÉ
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

// Routes d'authentification (accessibles sans être connecté)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Déconnexion (accessible quand connecté)
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Changement de langue (accessible partout)
Route::get('/change-language', [LanguageController::class, 'change'])->name('language.change');

// Routes protégées par authentification
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Gestion des étudiants
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/add', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::post('/students/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::get('/students/{id}/delete', [StudentController::class, 'destroy'])->name('students.destroy');
});