<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Voici où vous pouvez enregistrer les routes Web pour votre application.
| Ces routes sont chargées par RouteServiceProvider et toutes seront
| attribuées au groupe de middleware "web". Faites quelque chose de génial!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Routes pour les utilisateurs
Route::get('/users/dashboard', [UserController::class, 'dashboard'])->name('users.dashboard');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/profile', [UserController::class, 'profile'])->name('users.profile');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// Routes pour l'administration
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/users', [AdminController::class, 'manageUsers'])->name('manageUsers');
        Route::get('/companies', [AdminController::class, 'manageCompanies'])->name('manageCompanies');
        Route::get('/job_offers', [AdminController::class, 'manageJobs'])->name('manageJobs');
        Route::get('/statistics', [AdminController::class, 'viewStatistics'])->name('viewStatistics');
    });
});

// Routes pour les compétences
Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
Route::get('/skills/{id}', [SkillController::class, 'show'])->name('skills.show');

// Routes pour les expériences
Route::get('/experiences', [ExperienceController::class, 'index'])->name('experiences.index');
Route::get('/experiences/{id}', [ExperienceController::class, 'show'])->name('experiences.show');

// Routes pour l'éducation
Route::get('/educations', [EducationController::class, 'index'])->name('educations.index');
Route::get('/educations/{id}', [EducationController::class, 'show'])->name('educations.show');

// Routes pour les langues
Route::get('/languages', [LanguageController::class, 'index'])->name('languages.index');
Route::get('/languages/{id}', [LanguageController::class, 'show'])->name('languages.show');

// Routes pour les entreprises
Route::prefix('companies')->name('companies.')->group(function () {
    Route::get('/profileform', [CompanyController::class, 'showProfileForm'])->name('profileform');
    Route::post('/complete-profile', [CompanyController::class, 'companyProfile'])->name('completeProfile');
    Route::get('/profile', [CompanyController::class, 'profile'])->name('profile');
    Route::get('/dashboard', [CompanyController::class, 'dashboard'])->name('dashboard');
    Route::get('/', [CompanyController::class, 'index'])->name('index');
    Route::get('/{id}', [CompanyController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [CompanyController::class, 'edit'])->name('edit');
    Route::put('/{id}', [CompanyController::class, 'update'])->name('update');
});


// Routes pour les offres d'emploi
Route::prefix('job_offers')->name('job_offers.')->group(function () {
    Route::get('/', [JobOfferController::class, 'index'])->name('index');
    Route::get('/{id}', [JobOfferController::class, 'show'])->name('show');
    Route::get('/create', [JobOfferController::class, 'create'])->name('create');
    Route::post('/', [JobOfferController::class, 'store'])->name('store');
});

// Routes pour les candidatures
Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
Route::get('/applications/{id}', [ApplicationController::class, 'show'])->name('applications.show');

// Routes pour le tableau de bord
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Routes pour le profil utilisateur
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/completeForm', function () {
            return view('users.profile.completeForm');
        })->name('completeForm');
    
        Route::post('/complete', [ProfileController::class, 'completeProfile'])->name('completeProfile'); // Ajout de la route POST pour la soumission du formulaire
    
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__.'/auth.php';
