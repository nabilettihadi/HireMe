<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Job;
use App\Models\Application;

class CompanyController extends Controller
{
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
        $job = new Job();
        $job->fill($request->all());
        $job->company()->associate($company);
        $job->save();
        return response()->json(['message' => 'Job published successfully'], 200);
    }

    public function viewApplications($companyId)
    {
        $company = Company::findOrFail($companyId);
        $applications = $company->applications;
        return view('companies.applications', ['company' => $company, 'applications' => $applications]);
    }
}
