<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\ProfileEmployeeController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Employee\DemandeCongeController;





use App\Http\Controllers\StatusController;
use App\Http\Controllers\AbsenceController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MissionInternationalleController;
use App\Http\Controllers\LocalMissionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\HomeController;



Route::prefix('employee')->group(function () {
    Route::get('/dashboard', [EmployeeController::class,'index'])->middleware(['auth', 'verified'])->name('employee.dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileEmployeeController::class, 'edit'])->name('employee.profile.edit');
        Route::patch('/profile', [ProfileEmployeeController::class, 'update'])->name('employee.profile.update');
        Route::delete('/profile', [ProfileEmployeeController::class, 'destroy'])->name('employee.profile.destroy');
    });
});




// donia 
// Dashboard Employee

// Gestion des congés pour les utilisateurs
Route::middleware('auth')->prefix('employee')->name('employee.')->group(function () {
    Route::get('/demande-conge/create', [DemandeCongeController::class, 'create'])->name('demande_conge.create');
    Route::get('/demande-conge', [DemandeCongeController::class, 'index'])->name('demande_conge.index');
    Route::post('/demande-conge', [DemandeCongeController::class, 'store'])->name('demande_conge.store');
});





// ajout de la route pour les employés
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/employees', [EmployeeController::class, 'index'])->name('admin.employees.index');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('admin.employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('admin.employees.store');
});



// Middleware pour les routes utilisateur
    // Routes pour les absences
    Route::get('/status', [StatusController::class, 'index'])->name('status.index');
    Route::put('/status', [StatusController::class, 'update'])->name('status.update');

    // Routes utilisateur - Missions internationales
    Route::get('/missions/international', [MissionInternationalleController::class, 'userIndex'])->name('missions.international.user.index');
    Route::get('/missions/international/create', [MissionInternationalleController::class, 'create'])->name('missions.international.create');
    Route::post('/missions/international/store', [MissionInternationalleController::class, 'store'])->name('missions.international.store');
    Route::get('/missions/international/create-report/{id}', [MissionInternationalleController::class, 'createMissionReportInternational'])->name('missions.international.report.create');
    Route::post('/missions/international/submit-report/{id}', [MissionInternationalleController::class, 'submitInternationalMissionReport'])->name('missions.international.report.submit');

    // Routes utilisateur - Missions locales
    Route::get('/missions/local/create', [LocalMissionController::class, 'createMissionLocale'])->name('local_missions.create');
    Route::post('/missions/local/store', [LocalMissionController::class, 'store'])->name('local_missions.store');
    Route::get('/missions/local', [LocalMissionController::class, 'index'])->name('local_missions.index');
    Route::get('/missions/local/report/{id}', [LocalMissionController::class, 'createReport'])->name('local_missions.create_report');
    Route::post('/missions/local/report/{id}', [LocalMissionController::class, 'submitReport'])->name('local_missions.submit_report');
    Route::get('/mission/local/{id}/edit', [LocalMissionController::class, 'edit'])->name('local_missions.edit');
    Route::put('/mission/local/{id}', [LocalMissionController::class, 'update'])->name('local_missions.update');
    Route::delete('/missions/local/{id}', [LocalMissionController::class, 'destroy'])->name('local_missions.destroy');


