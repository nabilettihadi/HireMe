<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    public function index()
    {
        // Récupérer toutes les offres d'emploi avec pagination
        $jobOffers = JobOffer::paginate(10);
        
        // Afficher la vue avec la liste paginée des offres d'emploi
        return view('job_offers.index', compact('jobOffers'));
    }

    public function show($id)
    {
        // Récupérer l'offre d'emploi avec l'identifiant $id
        $jobOffer = JobOffer::findOrFail($id);
        
        // Afficher la vue avec les détails de l'offre d'emploi
        return view('job_offers.show', compact('jobOffer'));
    }

    function create()
   {
       return view('job_offers.create');
   }

   /**
    * Stocke une nouvelle offre d'emploi dans la base de données.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\RedirectResponse
    */
    function store(Request $request)
   {
       // Validation des données du formulaire
       $validatedData = $request->validate([
           'title' => 'required|string|max:255',
           'description' => 'required|string',
           // Ajoutez ici d'autres règles de validation pour les champs de votre formulaire
       ]);

       // Création de l'offre d'emploi dans la base de données
       JobOffer::create($validatedData);

       // Redirection avec un message de succès
       return redirect()->route('job_offers.index')->with('success', 'L\'offre d\'emploi a été créée avec succès.');
   }
}


     function search(Request $request)
    {
        // Récupérer les paramètres de recherche
        $title = $request->input('title');
        $skills = $request->input('skills');
        $contractType = $request->input('contract_type');
        $location = $request->input('location');

        // Commencer la requête de recherche
        $jobs = JobOffer::query();

        // Appliquer les filtres de recherche
        if ($title) {
            $jobs->where('title', 'like', '%' . $title . '%');
        }

        if ($skills) {
            $jobs->where('skills', 'like', '%' . $skills . '%');
        }

        if ($contractType) {
            $jobs->where('contract_type', $contractType);
        }

        if ($location) {
            $jobs->where('location', 'like', '%' . $location . '%');
        }

        // Exécuter la requête et récupérer les résultats
        $results = $jobs->paginate(10);

        // Retourner les résultats de la recherche à la vue
        return view('jobs.search', ['results' => $results]);
    }


