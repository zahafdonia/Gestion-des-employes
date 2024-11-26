<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\AbsenceController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MissionInternationalleController;
use App\Http\Controllers\LocalMissionController;


Route::get('/', function () {
    return view('welcome');
});
/*
// Routes d'authentification
Auth::routes();

// Redirection vers la page d'accueil après la connexion
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/

// Routes publiques pour les absences

// Route publique pour accéder aux absences
Route::get('/admin/absences', [AbsenceController::class, 'index'])->name('admin.absences');
Route::post('/admin/absences', [AbsenceController::class, 'store'])->name('admin.absences.store');

Route::get('/status', [StatusController::class, 'index'])->name('status.index');
Route::put('/status', [StatusController::class, 'update'])->name('status.update');


// Routes utilisateur internationnal
Route::get('/missions/international', [MissionInternationalleController::class, 'userIndex'])->name('missions.international.user.index');
Route::get('/missions/international/create-report/{id}', [MissionInternationalleController::class, 'createMissionReportInternational'])->name('missions.international.report.create');
Route::post('/missions/international/submit-report/{id}', [MissionInternationalleController::class, 'submitInternationalMissionReport'])->name('missions.international.report.submit');Route::get('/missions/international/create', [MissionInternationalleController::class, 'create'])->name('missions.international.create');
Route::post('/missions/international/store', [MissionInternationalleController::class, 'store'])->name('missions.international.store');

// Routes administrateur mission internationnal
Route::get('/admin/missions/international', [MissionInternationalleController::class, 'adminIndex'])->name('missions.international.admin.index');
Route::post('/admin/missions/international/approve/{id}', [MissionInternationalleController::class, 'approveMission'])->name('missions.international.approve');
Route::post('/admin/missions/international/reject/{id}', [MissionInternationalleController::class, 'rejectMission'])->name('missions.international.reject');



// Routes pour les missions locales
// Routes pour les utilisateurs
Route::get('/missions/local/create', [LocalMissionController::class, 'createMissionLocale'])->name('local_missions.create'); // Formulaire création
Route::post('/missions/local/store', [LocalMissionController::class, 'store'])->name('local_missions.store'); // Enregistrer mission
Route::get('/missions/local', [LocalMissionController::class, 'index'])->name('local_missions.index'); // Liste des missions utilisateur
Route::get('/missions/local/report/{id}', [LocalMissionController::class, 'createReport'])->name('local_missions.create_report'); // Formulaire rapport
Route::post('/missions/local/report/{id}', [LocalMissionController::class, 'submitReport'])->name('local_missions.submit_report'); // Enregistrer rapport
Route::get('/mission/local/{id}/edit', [LocalMissionController::class, 'edit'])->name('local_missions.edit');
Route::put('/mission/local/{id}', [LocalMissionController::class, 'update'])->name('local_missions.update');
Route::delete('/missions/local/{id}', [LocalMissionController::class, 'destroy'])->name('local_missions.destroy');

// Routes pour les administrateurs
Route::get('/admin/missions/local', [LocalMissionController::class, 'adminIndex'])->name('admin.local_missions.index'); // Liste des missions pour admin
Route::post('/admin/missions/local/{id}/approve', [LocalMissionController::class, 'approve'])->name('admin.local_missions.approve'); // Approuver mission
Route::post('/admin/missions/local/{id}/reject', [LocalMissionController::class, 'reject'])->name('admin.local_missions.reject'); // Rejeter mission
