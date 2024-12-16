<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\AbsenceController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MissionInternationalleController;
use App\Http\Controllers\LocalMissionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);


});

Route::middleware('auth')->group(function () {
    // Route pour le dashboard de l'administrateur
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Route pour le dashboard de l'utilisateur
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard'); // Assurez-vous que la route porte ce nom

    // Autres routes liées à l'utilisateur
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});





// Redirection vers la page d'accueil après la connexion
    Route::get('/home', [HomeController::class, 'index'])->name('home');

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


// Middleware pour les routes administrateur
    // Routes administrateur - Absences
    Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
        Route::get('absences', [AbsenceController::class, 'index'])->name('absences');
        Route::get('absences/create', [AbsenceController::class, 'create'])->name('absences.create');
        Route::post('absences', [AbsenceController::class, 'store'])->name('absences.store');
        Route::get('absences/{id}/edit', [AbsenceController::class, 'edit'])->name('absences.edit'); // Route d'édition
        Route::put('absences/{id}', [AbsenceController::class, 'update'])->name('absences.update'); // Route de mise à jour
        Route::delete('absences/{id}', [AbsenceController::class, 'destroy'])->name('absences.destroy'); // Route de suppression
    });

    // Routes administrateur - Missions internationales
    Route::get('/admin/missions/international', [MissionInternationalleController::class, 'adminIndex'])->name('missions.international.admin.index');
    Route::post('/admin/missions/international/approve/{id}', [MissionInternationalleController::class, 'approveMission'])->name('missions.international.approve');
    Route::post('/admin/missions/international/reject/{id}', [MissionInternationalleController::class, 'rejectMission'])->name('missions.international.reject');

    // Routes administrateur - Missions locales
    Route::get('/admin/missions/local', [LocalMissionController::class, 'adminIndex'])->name('admin.local_missions.index');
    Route::post('/admin/missions/local/{id}/approve', [LocalMissionController::class, 'approve'])->name('admin.local_missions.approve');
    Route::post('/admin/missions/local/{id}/reject', [LocalMissionController::class, 'reject'])->name('admin.local_missions.reject');
// ajout de la route pour les employés

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/employees', [EmployeeController::class, 'index'])->name('admin.employees.index');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('admin.employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('admin.employees.store');
});
/*
Route::get('employee/notifications', [EmployeeController::class, 'notifications'])->name('employee.notifications');
Route::get('employee/notifications/mark-all-read', [EmployeeController::class, 'markAllAsRead'])->name('employee.notifications.markAllRead');
Route::get('user/dashboard', [EmployeeController::class, 'notifications'])->name('dashboard');

