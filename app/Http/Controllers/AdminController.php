<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\JobOffer;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Assurez-vous que l'administrateur est authentifié pour accéder à ces fonctionnalités
        $this->middleware('admin'); // Assurez-vous que l'utilisateur authentifié a le rôle d'administrateur
    }

    public function index()
    {
        // Logique pour afficher le tableau de bord de l'administrateur
        return view('admin.dashboard');
    }

    public function manageUsers()
    {
        // Récupérer tous les utilisateurs avec pagination
        $users = User::paginate(10);
        
        // Afficher la vue avec la liste paginée des utilisateurs
        return view('admin.users.index', compact('users'));
    }

    public function manageCompanies()
    {
        // Récupérer toutes les entreprises avec pagination
        $companies = Company::paginate(10);
        
        // Afficher la vue avec la liste paginée des entreprises
        return view('admin.companies.index', compact('companies'));
    }

    public function manageJobs()
    {
        // Récupérer toutes les offres d'emploi avec pagination
        $jobs = JobOffer::paginate(10);
        
        // Afficher la vue avec la liste paginée des offres d'emploi
        return view('admin.jobs.index', compact('jobs'));
    }

    public function viewStatistics()
    {
        // Logique pour récupérer et afficher les statistiques
        return view('admin.statistics');
    }
}
