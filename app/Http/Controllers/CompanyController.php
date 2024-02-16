<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Support\Facades\Redirect;

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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'industry' => ['required', 'string', 'max:255'],
            'slogan' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'logo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'], // Validate the logo field
        ]);
    
        // Handle file upload
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }
    
        // Recherchez si l'entreprise existe déjà
        $company = Company::where('user_id', auth()->user()->id)->first();
    
        // Mettre à jour ou créer une nouvelle entreprise
        if ($company) {
            $company->update([
                'name' => $request->name,
                'industry' => $request->industry,
                'slogan' => $request->slogan,
                'description' => $request->description,
                'logo' => $imageName ?? null, // Use the uploaded image name if available
            ]);
        } else {
            $company = new Company([
                'user_id' => auth()->user()->id,
                'name' => $request->name,
                'industry' => $request->industry,
                'slogan' => $request->slogan,
                'description' => $request->description,
                'logo' => $imageName ?? null, // Use the uploaded image name if available
            ]);
            $company->save();
        }
    
        return redirect()->route('profile')->with('success', 'Profil complété avec succès !');
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

    public function publishJob(Request $request, $companyId)
    {
        $company = Company::findOrFail($companyId);
        
        // Valider les données du formulaire
        $request->validate([
            // Ajoutez les règles de validation nécessaires ici
        ]);
        
        $job = new JobOffer($request->all());
        $company->jobs()->save($job);
        
        return response()->json(['message' => 'Job published successfully'], 200);
    }

    public function viewApplications($companyId)
    {
        $company = Company::findOrFail($companyId);
        $applications = $company->applications;
        return view('companies.applications', ['company' => $company, 'applications' => $applications]);
    }
}


