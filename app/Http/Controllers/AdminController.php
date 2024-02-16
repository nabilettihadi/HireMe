<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
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
        try {
            // Récupérer tous les utilisateurs avec le rôle "Utilisateur" et leurs profils associés
            $users = User::where('role', 'Utilisateur')
                ->join('user_profiles', 'users.id', '=', 'user_profiles.user_id')
                ->select('users.*', 'user_profiles.*')
                ->paginate(10);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la récupération des utilisateurs.');
        }
    
        return view('admin.users', compact('users'));
    }

    public function manageCompanies()
    {
        try {
            // Récupérer toutes les entreprises avec pagination
            $companies = User::where('role', 'Entreprise')->paginate(10);
        } catch (\Exception $e) {
            // Gérer l'erreur de récupération des entreprises
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la récupération des entreprises.');
        }
        
        // Afficher la vue avec la liste paginée des entreprises
        return view('admin.companies', compact('companies'));
    }

    public function manageJobs()
    {
        try {
            // Récupérer toutes les offres d'emploi avec pagination
            $jobs = JobOffer::paginate(10);
        } catch (\Exception $e) {
            // Gérer l'erreur de récupération des offres d'emploi
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la récupération des offres d\'emploi.');
        }
        
        // Afficher la vue avec la liste paginée des offres d'emploi
        return view('admin.job_offers', compact('jobs'));
    }

    public function viewStatistics()
    {
        try {
            // Compter le nombre total d'utilisateurs avec le rôle "Utilisateur"
            $totalUsers = User::where('role', 'Utilisateur')->count();
            
            // Compter le nombre total d'entreprises avec le rôle "Entreprise"
            $totalCompanies = User::where('role', 'Entreprise')->count();
        } catch (\Exception $e) {
            // Gérer l'erreur de comptage des utilisateurs et des entreprises
            return redirect()->back()->with('error', 'Une erreur est survenue lors du calcul des statistiques.');
        }

        return view('admin.statistics', compact('totalUsers', 'totalCompanies'));
    }
}

