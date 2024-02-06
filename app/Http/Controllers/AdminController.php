<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Job;

class AdminController extends Controller
{
    public function index()
    {
        // Logique pour afficher le tableau de bord de l'administrateur
        return view('admin.dashboard');
    }

    public function manageUsers()
    {
        // Récupérer tous les utilisateurs
        $users = User::all();
        
        // Afficher la vue avec la liste des utilisateurs
        return view('admin.users.index', compact('users'));
    }

    public function manageCompanies()
    {
        // Récupérer toutes les entreprises
        $companies = Company::all();
        
        // Afficher la vue avec la liste des entreprises
        return view('admin.companies.index', compact('companies'));
    }

    public function manageJobs()
    {
        // Récupérer toutes les offres d'emploi
        $jobs = Job::all();
        
        // Afficher la vue avec la liste des offres d'emploi
        return view('admin.jobs.index', compact('jobs'));
    }

    public function viewStatistics()
    {
        // Logique pour récupérer et afficher les statistiques
        return view('admin.statistics');
    }
}