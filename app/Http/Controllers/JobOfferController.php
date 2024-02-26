<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\JobOffer;
use App\Models\Application;
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
    public function applyJob(Request $request, $jobId)
    {
        // Vérifier si l'utilisateur est authentifié
        $user = Auth::user();
        if (!$user) {
            // Retourner une réponse JSON indiquant que l'utilisateur n'est pas autorisé
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    
        // Vérifier si l'offre d'emploi existe
        $jobOffer = JobOffer::find($jobId);
        if (!$jobOffer) {
            // Retourner une réponse JSON indiquant que l'offre d'emploi n'a pas été trouvée
            return response()->json(['message' => 'Job offer not found'], 404);
        }
    
        // Vérifier si l'utilisateur a déjà postulé à cette offre d'emploi
        $existingApplication = Application::where('user_id', $user->id)
                                           ->where('job_offer_id', $jobId)
                                           ->exists();
    
        if ($existingApplication) {
            // Retourner une réponse JSON indiquant que l'utilisateur a déjà postulé à cette offre d'emploi
            return response()->json(['message' => 'Already applied to this job'], 400);
        }
    
        // Créer une nouvelle candidature
        $application = new Application();
        $application->user_id = $user->id;
        $application->job_offer_id = $jobId;
        $application->company_id = $jobOffer->company->id;
    
        // Enregistrer la candidature dans la base de données
        $application->save();
    
        // Retourner une réponse JSON pour indiquer que la candidature a été soumise avec succès
        return response()->json(['message' => 'Job application submitted successfully'], 200);
    }
    /**
     * Recherche des offres d'emploi en fonction des critères spécifiés.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */


     public function search(Request $request)
     {
         $searchTerm = $request->input('term');
     
         $jobOffers = JobOffer::where('title', 'like', '%' . $searchTerm . '%')
                              ->orWhere('company_name', 'like', '%' . $searchTerm . '%')
                              ->orWhere('contract_type', 'like', '%' . $searchTerm . '%')
                              ->orWhere('location', 'like', '%' . $searchTerm . '%')
                              ->orWhere('description', 'like', '%' . $searchTerm . '%')
                              ->orWhere('required_skills', 'like', '%' . $searchTerm . '%')
                              ->get();
     
         return response()->json($jobOffers);
     }


}