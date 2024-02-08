<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;


use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\LanguageController;

use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\ApplicationController;

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/profiles/{id}/edit', [UserProfileController::class, 'edit'])->name('profiles.edit');
Route::put('/profiles/{id}', [UserProfileController::class, 'update'])->name('profiles.update');

Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
Route::get('/skills/{id}', [SkillController::class, 'show'])->name('skills.show');

Route::get('/experiences', [ExperienceController::class, 'index'])->name('experiences.index');
Route::get('/experiences/{id}', [ExperienceController::class, 'show'])->name('experiences.show');

Route::get('/educations', [EducationController::class, 'index'])->name('educations.index');
Route::get('/educations/{id}', [EducationController::class, 'show'])->name('educations.show');

Route::get('/languages', [LanguageController::class, 'index'])->name('languages.index');
Route::get('/languages/{id}', [LanguageController::class, 'show'])->name('languages.show');

Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/{id}', [CompanyController::class, 'show'])->name('companies.show');

Route::get('/job-offers', [JobOfferController::class, 'index'])->name('job_offers.index');
Route::get('/job-offers/{id}', [JobOfferController::class, 'show'])->name('job_offers.show');

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
