<?php


namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class CompanyController extends Controller
{
    public function profile()
    {
        return view('companies.profile');
    }

    public function dashboard()
    {
        return view('companies.dashboard');
    }
    public function showProfileForm()
{
    return view('companies.profileforme');
}
public function store(Request $request)
{
    // Valider les données de la requête
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'industry' => 'required|string|max:255',
        'slogan' => 'required|string|max:255',
        'description' => 'required|string',
        'logo' => 'required|image|mimes:jpeg,png,jpg,gif',
    ]);

    // Enregistrement du logo
    if ($request->hasFile('logo')) {
        $image = $request->file('logo');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
    }

    $userId = Session::get('user_id');
    
    // Recherchez ou créez le profil de l'entreprise en fonction de l'ID de l'utilisateur
    $companyProfile = Company::firstOrNew(['user_id' => $userId]);

    // Mise à jour ou création du profil de l'entreprise
    $companyProfile->user_id = $userId;
    $companyProfile->name = $validatedData['name'];
    $companyProfile->industry = $validatedData['industry'];
    $companyProfile->slogan = $validatedData['slogan'];
    $companyProfile->description = $validatedData['description'];
    $companyProfile->logo = $imageName ?? null; // Utilisez le nom du logo si disponible

    $companyProfile->save();

    return redirect()->route('login')->with('success', 'Profil d\'entreprise complété avec succès !');
}


    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.show', compact('company'));
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', ['company' => $company]);
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->update($request->all());
        return redirect()->route('companies.show', ['company' => $company->id]);
    }

    public function showPublishJobForm($companyId)
    {
        $company = Company::findOrFail($companyId);
        return view('companies.publishJob_form', compact('company'));
    }
    
    /**
     * Publie une nouvelle offre d'emploi pour une entreprise.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $companyId
     * @return \Illuminate\Http\Response
     */
    public function publishJob(Request $request, $companyId)
{
    // Recherche de l'entreprise
    $company = Company::findOrFail($companyId);
    
    // Validation des données du formulaire
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'required_skills' => 'required|array',
        'contract_type' => 'required|in:à distance,hybride,à temps plein',
        'location' => 'required|string',
        // Ajoutez ici d'autres règles de validation pour les champs de votre formulaire
    ]);
    
    // Création de l'offre d'emploi
    $job = new JobOffer([
        'title' => $request->title,
        'description' => $request->description,
        'required_skills' => $request->required_skills,
        'contract_type' => $request->contract_type,
        'location' => $request->location,
    ]);
    
    // Association de l'offre d'emploi à l'entreprise
    $company->jobOffers()->save($job);
    
    // Redirection avec un message de succès
    return redirect()->route('companies.dashboard')->with('success', 'L\'offre d\'emploi a été publiée avec succès.');
}


    public function viewApplications($companyId)
    {
        $company = Company::findOrFail($companyId);
        $applications = $company->applications;
        return view('companies.applications', ['company' => $company, 'applications' => $applications]);
    }
}


