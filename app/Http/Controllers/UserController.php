<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\JobOffer;
use App\Models\Skill;
use App\Models\Application;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('users.dashboard');
    }

    public function profile()
    {
        $user = auth()->user();

        // Vérifier si un utilisateur est connecté
        if ($user) {
            // Si un utilisateur est connecté, renvoyer la vue avec les détails de l'utilisateur
            return view('users.profile', compact('user'));
        } else {
            // Si aucun utilisateur n'est connecté, rediriger vers la page de connexion
            return redirect()->route('login');
        }
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('users.show', compact('user'));
    }

    public function applyJob(Request $request, $jobId)
    {
        // Vérifier si l'utilisateur est authentifié
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Vérifier si l'offre d'emploi existe
        $job = JobOffer::find($jobId);
        if (!$job) {
            return response()->json(['message' => 'Job not found'], 404);
        }

        // Valider les données du formulaire de candidature
        $request->validate([
            // Ajoutez les règles de validation nécessaires ici
        ]);

        // Créer une nouvelle candidature
        $application = new Application();
        $application->user_id = $user->id;
        $application->job_id = $jobId;
        // Assignez d'autres champs de la demande ici

        // Enregistrer la candidature dans la base de données
        $application->save();

        // Retourner une réponse JSON pour indiquer que la candidature a été soumise avec succès
        return response()->json(['message' => 'Job application submitted successfully'], 200);
    }


    public function addSkill(Request $request)
    {
        // Récupérer l'utilisateur authentifié
        $user = Auth::user();
        if (!$user) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        // Vérifier si l'utilisateur a un CV
        if (!$user->resume) {
            return redirect()->back()->with('error', 'User does not have a resume');
        }

        // Valider les données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            // Ajoutez d'autres règles de validation au besoin
        ]);

        // Créer une nouvelle compétence
        $skill = new Skill();
        $skill->name = $request->input('name');
        // Assigner d'autres attributs

        // Enregistrer la compétence dans le CV de l'utilisateur
        $user->resume->skills()->save($skill);

        return redirect()->back()->with('success', 'Skill added successfully');
    }
}


