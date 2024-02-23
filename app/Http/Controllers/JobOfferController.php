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
    public function jobOffersForCompany()
{
    // Récupérer l'utilisateur connecté
    $user = auth()->user()->company->id;
    
    // Récupérer les offres d'emploi de l'utilisateur connecté
    $jobOffers = $user->jobOffers; // jobOffers est la relation définie dans votre modèle User
    
    return view('job_offers.index', ['jobOffers' => $jobOffers]);
}

    public function show($id)
    {
        // Récupérer l'offre d'emploi avec l'identifiant $id
        $jobOffer = JobOffer::findOrFail($id);
        
        // Afficher la vue avec les détails de l'offre d'emploi
        return view('job_offers.show', compact('jobOffer'));
    }

    public function create()
    {
        return view('job_offers.create');
    }

    /**
     * Stocke une nouvelle offre d'emploi dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'required_skills' => 'required|array', // Assurez-vous que le nom correspond à celui dans le formulaire
            // Ajoutez ici d'autres règles de validation pour les champs de votre formulaire
        ]);

        // Création de l'offre d'emploi dans la base de données
        JobOffer::create($validatedData);

        // Redirection avec un message de succès
        return redirect()->route('job_offers.index')->with('success', 'L\'offre d\'emploi a été créée avec succès.');
    }

    /**
     * Recherche des offres d'emploi en fonction des critères spécifiés.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request): \Illuminate\View\View
    {
        // Récupérer les paramètres de recherche
        $title = $request->input('title');
        $skills = $request->input('skills');
        $contractType = $request->input('contract_type');
        $location = $request->input('location');

        // Commencer la requête de recherche
        $jobOffers = JobOffer::query();

        // Appliquer les filtres de recherche
        if ($title) {
            $jobOffers->where('title', 'like', '%' . $title . '%');
        }

        if ($skills) {
            $jobOffers->where('skills', 'like', '%' . $skills . '%');
        }

        if ($contractType) {
            $jobOffers->where('contract_type', $contractType);
        }

        if ($location) {
            $jobOffers->where('location', 'like', '%' . $location . '%');
        }

        // Exécuter la requête et récupérer les résultats paginés
        $results = $jobOffers->paginate(10);

        // Retourner les résultats de la recherche à la vue
        return view('jobs.search', ['results' => $results]);
    }
    /**
     * Soft delete a job offer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    