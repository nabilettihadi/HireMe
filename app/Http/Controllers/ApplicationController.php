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

    public function apply(Request $request, $jobId)
    {
        // Vérifier si l'utilisateur est authentifié (auth middleware)
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Vérifier si l'offre d'emploi existe
        $job = JobOffer::find($jobId);
        if (!$job) {
            return response()->json(['message' => 'Job not found'], 404);
        }

        // Vérifier si l'utilisateur a déjà postulé à cette offre d'emploi
        if ($user->applications->where('job_id', $jobId)->exists()) {
            return response()->json(['message' => 'Already applied to this job'], 400);
        }

        // Créer une nouvelle candidature
        try {
            $application = new Application();
            $application->user_id = $user->id;
            $application->job_id = $jobId;
            // Vous pouvez ajouter d'autres champs ici en fonction de votre modèle Application
            $application->save();
        } catch (\Exception $e) {
            // Gérer l'erreur de création de la candidature
            return response()->json(['message' => 'Failed to submit application'], 500);
        }

        return response()->json(['message' => 'Application submitted successfully'], 200);
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
