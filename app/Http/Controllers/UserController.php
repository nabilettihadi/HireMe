<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserProfile;
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
    {$data = $request->all();

        auth()->user()->profile->update($data);
        
        // $user = UserProfile::findOrFail($id);
        // $user->update($request->all());
        return redirect()->route('users.dashboard');
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

    public function viewApplications()
    {
        // Récupérer les candidatures de l'utilisateur avec les détails de l'offre d'emploi
        $user = auth()->user();
        $applications = $user->applications()->with('jobOffer')->get();
        
        // Retourner la vue avec les données des candidatures
        return view('users.applications', compact('applications'));
    }
}


