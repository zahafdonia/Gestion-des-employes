<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoanController;

// Routes d'authentification
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Routes accessibles uniquement aux utilisateurs connectés
Route::middleware('auth')->group(function () {
    // Dashboard selon le rôle
    Route::get('admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    Route::get('employee/dashboard', fn() => view('user.dashboard'))->name('user.dashboard');

    // Gestion des employés (Admin)
    Route::prefix('admin/gereEmpl')->name('admin.gereEmpl.')->group(function () {
        Route::get('/index', [EmployeeController::class, 'index'])->name('index');
        Route::get('/create', [EmployeeController::class, 'create'])->name('create');
        Route::post('/', [EmployeeController::class, 'store'])->name('store');
        Route::get('/{employeeId}/edit', [EmployeeController::class, 'edit'])->name('edit');
        Route::put('/{employeeId}', [EmployeeController::class, 'update'])->name('update');
        Route::delete('/{employeeId}', [EmployeeController::class, 'destroy'])->name('destroy');
    });

    // Routes des prêts pour les utilisateurs
    Route::prefix('loans')->name('loans.')->group(function () {
        Route::get('/', [LoanController::class, 'index'])->name('index'); // Liste des prêts
        Route::get('/create', [LoanController::class, 'create'])->name('create'); // Formulaire de création de prêt
        Route::post('/', [LoanController::class, 'store'])->name('store'); // Soumettre une nouvelle demande de prêt
    });

    // Administration des prêts (Admin)
    Route::prefix('admin/loans')->name('admin.loans.')->group(function () {
        Route::get('/', [LoanController::class, 'adminIndex'])->name('index');
        Route::post('/{loan}/approve', [LoanController::class, 'approve'])->name('approve');
        Route::post('/{loan}/reject', [LoanController::class, 'reject'])->name('reject');

        // Historique des prêts
        Route::get('/history', [LoanController::class, 'loanHistory'])->name('history');

        // Téléchargement CSV des prêts
        Route::get('/downloadCSV', [LoanController::class, 'downloadCSV'])->name('downloadCSV');
    });
});

