<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\JobOffer;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Vérifier si l'utilisateur est authentifié pour accéder à ces fonctionnalités
    }

    public function index()
    {
        try {
            // Récupérer toutes les candidatures avec pagination
            $applications = Application::paginate(10);
        } catch (\Exception $e) {
            // Gérer l'erreur de récupération des candidatures
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la récupération des candidatures.');
        }
        
        // Afficher la vue avec la liste paginée des candidatures
        return view('applications.index', compact('applications'));
    }

    public function show($id)
    {
        try {
            // Récupérer la candidature avec l'identifiant $id
            $application = Application::findOrFail($id);
        } catch (\Exception $e) {
            // Gérer l'erreur de récupération de la candidature
            return redirect()->back()->with('error', 'Candidature non trouvée.');
        }
        
        // Afficher la vue avec les détails de la candidature
        return view('applications.show', compact('application'));
    }

    

    public function viewApplications($userId)
    {
        try {
            // Récupérer les candidatures de l'utilisateur avec l'identifiant $userId
            $applications = Application::where('user_id', $userId)->paginate(10);
        } catch (\Exception $e) {
            // Gérer l'erreur de récupération des candidatures
            return response()->json(['message' => 'Failed to retrieve applications'], 500);
        }

        // Retourner les candidatures sous forme de réponse JSON paginée
        return response()->json(['applications' => $applications], 200);
    }
}
