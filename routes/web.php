<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TestController; // N'oubliez pas d'importer le contrôleur ici
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DemandeCongeController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'Login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//Route::post('/users', [UserController::class, 'createUser']);

Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard'); // Vue pour le dashboard admin
    })->name('admin.dashboard');

    Route::get('employee/dashboard', function () {
        return view('user.dashboard'); // Vue pour le dashboard employee
    })->name('user.dashboard');
});



Route::middleware('auth')->group(function () {
    Route::prefix('admin/gereEmpl')->name('admin.gereEmpl.')->group(function () {
        Route::get('/index', [EmployeeController::class, 'index'])->name('index'); // Liste des employés
        Route::get('/create', [EmployeeController::class, 'create'])->name('create'); // Formulaire d'ajout
        Route::post('/', [EmployeeController::class, 'store'])->name('store'); // Ajout d'un employé
        Route::get('/{employeeId}/edit', [EmployeeController::class, 'edit'])->name('edit'); // Formulaire de modification
        Route::put('/{employeeId}', [EmployeeController::class, 'update'])->name('update'); // Mise à jour d'un employé
        Route::delete('/{employeeId}', [EmployeeController::class, 'destroy'])->name('destroy'); // Suppression
    });    
});

Route::middleware('auth')->group(function () {
    Route::prefix('user')->name('user.')->group(function () {
        // Formulaire de soumission de congé
        Route::get('/demande-conge/create', [DemandeCongeController::class, 'create'])->name('demande_conge.create');
        
        // Liste des demandes
        Route::get('/demande-conge', [DemandeCongeController::class, 'index'])->name('demande_conge.index');
        
        // Enregistrement d'une demande
        Route::post('/demande-conge', [DemandeCongeController::class, 'store'])->name('demande_conge.store');
    });

   
});

    
 

