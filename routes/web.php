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

Route::get('/companies', [CompanyController::class, 'index'])->name('company.index');
Route::get('/companies/{id}', [CompanyController::class, 'show'])->name('company.show');
Route::get('/companies/{id}/edit', [CompanyController::class, 'edit'])->name('company.edit');
Route::put('/companies/{id}', [CompanyController::class, 'update'])->name('company.update');
Route::post('/companies/{companyId}/publish-job', [CompanyController::class, 'publishJob'])->name('company.publishJob');

// Route pour afficher la liste des offres d'emploi
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');

// Route pour afficher les détails d'une offre d'emploi spécifique
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');

// Route pour afficher le formulaire de création d'une nouvelle offre d'emploi
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');

// Route pour enregistrer une nouvelle offre d'emploi dans la base de données
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');

// Route pour permettre à un utilisateur de postuler à une offre d'emploi
Route::post('/jobs/{id}/apply', [JobController::class, 'apply'])->name('jobs.apply');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
