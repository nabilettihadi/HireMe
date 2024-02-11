<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Job;
use App\Models\JobOffer;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Vérifier si l'utilisateur est authentifié pour accéder à ces fonctionnalités
    }

    public function index()
    {
        // Récupérer toutes les candidatures avec pagination
        $applications = Application::paginate(10);
        
        // Afficher la vue avec la liste paginée des candidatures
        return view('applications.index', compact('applications'));
    }

    public function show($id)
    {
        // Récupérer la candidature avec l'identifiant $id
        $application = Application::findOrFail($id);
        
        // Afficher la vue avec les détails de la candidature
        return view('applications.show', compact('application'));
    }

    public function apply(Request $request, $jobId)
    {
        // Vérifier si l'utilisateur est authentifié (auth middleware)
        $user = $request->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Vérifier si l'offre d'emploi existe
        $job = JobOffer::find($jobId);
        if (!$job) {
            return response()->json(['message' => 'Job not found'], 404);
        }

        // Vérifier si l'utilisateur a déjà postulé à cette offre d'emploi
        if ($user->applications()->where('job_id', $jobId)->exists()) {
            return response()->json(['message' => 'Already applied to this job'], 400);
        }

        // Créer une nouvelle candidature
        $application = new Application();
        $application->user_id = $user->id;
        $application->job_id = $jobId;
        // Vous pouvez ajouter d'autres champs ici en fonction de votre modèle Application

        // Enregistrer la candidature dans la base de données
        $application->save();

        return response()->json(['message' => 'Application submitted successfully'], 200);
    }

    public function viewApplications($userId)
    {
        // Récupérer les candidatures de l'utilisateur avec l'identifiant $userId
        $applications = Application::where('user_id', $userId)->paginate(10);

        // Retourner les candidatures sous forme de réponse JSON paginée
        return response()->json(['applications' => $applications], 200);
    }
}
