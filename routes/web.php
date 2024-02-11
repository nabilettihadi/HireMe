<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\ApplicationController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// Routes pour l'administration
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');
Route::get('/admin/companies', [AdminController::class, 'manageCompanies'])->name('admin.manageCompanies');
Route::get('/admin/job_offers', [AdminController::class, 'manageJobs'])->name('admin.manageJobs');
Route::get('/admin/statistics', [AdminController::class, 'viewStatistics'])->name('admin.viewStatistics');

Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
Route::get('/skills/{id}', [SkillController::class, 'show'])->name('skills.show');

Route::get('/experiences', [ExperienceController::class, 'index'])->name('experiences.index');
Route::get('/experiences/{id}', [ExperienceController::class, 'show'])->name('experiences.show');

Route::get('/educations', [EducationController::class, 'index'])->name('educations.index');
Route::get('/educations/{id}', [EducationController::class, 'show'])->name('educations.show');

Route::get('/languages', [LanguageController::class, 'index'])->name('languages.index');
Route::get('/languages/{id}', [LanguageController::class, 'show'])->name('languages.show');

// Routes pour les entreprises
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/{id}', [CompanyController::class, 'show'])->name('companies.show');
Route::get('/companies/{id}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
Route::put('/companies/{id}', [CompanyController::class, 'update'])->name('companies.update');

// Routes pour les offres d'emploi
Route::get('/job_offers', [JobOfferController::class, 'index'])->name('job_offers.index');
Route::get('/job_offers/{id}', [JobOfferController::class, 'show'])->name('job_offers.show');
Route::get('/job_offers/create', [JobOfferController::class, 'create'])->name('job_offers.create');
Route::post('/job_offers', [JobOfferController::class, 'store'])->name('job_offers.store');

Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
Route::get('/applications/{id}', [ApplicationController::class, 'show'])->name('applications.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
