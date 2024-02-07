<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Job;

class ApplicationController extends Controller
{
    
    public function index()
    {
        $applications = Application::all();
        return view('applications.index', compact('applications'));
    }

    public function show($id)
    {
        $application = Application::findOrFail($id);
        return view('applications.show', compact('application'));
    }
    public function apply(Request $request, $jobId)
    {
        // Vérifier si l'utilisateur est authentifié
        if (!$request->user()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Vérifier si l'offre d'emploi existe
        $job = Job::find($jobId);
        if (!$job) {
            return response()->json(['message' => 'Job not found'], 404);
        }

        // Créer une nouvelle candidature
        $application = new Application();
        $application->user_id = $request->user()->id;
        $application->job_id = $jobId;
        // Vous devrez ajouter d'autres champs ici en fonction de votre modèle Application

        // Enregistrer la candidature dans la base de données
        $application->save();

        return response()->json(['message' => 'Application submitted successfully'], 200);
    }

    public function viewApplications($userId)
    {
        // Récupérer les candidatures de l'utilisateur avec l'identifiant $userId
        $applications = Application::where('user_id', $userId)->get();

        // Retourner les candidatures sous forme de réponse JSON
        return response()->json(['applications' => $applications], 200);
    }
}
