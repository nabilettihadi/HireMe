<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use App\Models\CurriculumVitae;

class CVController extends Controller
{public function save(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'skills' => 'required|array',
            'experiences' => 'required|string',
            'education' => 'required|string',
            'languages' => 'required|array',
        ]);

        // Enregistrer les données du CV dans la base de données
        $cv = new CurriculumVitae();
        $cv->user_id = auth()->id();
        $cv->skills = $request->skills;
        $cv->experiences = $request->experiences;
        $cv->education = $request->education;
        $cv->languages = $request->languages;
        $cv->save();

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'CV enregistré avec succès.');
    }
    /**
     * Affiche la vue pour créer et afficher le CV.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        // Récupérer le CV de l'utilisateur authentifié s'il existe
        $cv = CurriculumVitae::where('user_id', auth()->id())->first();
    
        return view('users.cv', compact('cv'));
    }

    /**
     * Télécharge le CV au format PDF.
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        $user = auth()->user();
        
        // Récupérer les informations du profil de l'utilisateur
        $profileData = [
            'user' => $user,
            'skills' => $user->skills,
            'experiences' => $user->experiences,
            'educations' => $user->educations,
            'languages' => $user->languages,
        ];

        // Générer le PDF du CV en utilisant une vue dédiée
        $pdf = PDF::loadView('cv.pdf', $profileData);

        // Télécharger le PDF
        return $pdf->download('cv.pdf');
    }

    /**
     * Enregistre les données du CV.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
}


