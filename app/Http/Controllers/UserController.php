<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use App\Models\Application;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('users.show', ['user' => $user->id]);
    }

    public function applyJob(Request $request, $jobId)
{
    // Vérifier si l'utilisateur est authentifié
    $user = $request->user();
    if (!$user) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    // Trouver l'offre d'emploi correspondante
    $job = Job::find($jobId);
    if (!$job) {
        return response()->json(['message' => 'Job not found'], 404);
    }

    // Créer une nouvelle candidature
    $application = new Application();
    $application->user_id = $user->id;
    $application->job_id = $jobId;
    // Vous devrez ajouter d'autres champs ici en fonction de votre modèle Application

    // Enregistrer la candidature dans la base de données
    $application->save();

    // Retourner une réponse JSON pour indiquer que la candidature a été soumise avec succès
    return response()->json(['message' => 'Job application submitted successfully'], 200);
}
}
