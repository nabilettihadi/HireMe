<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('jobs.index', ['jobs' => $jobs]);
    }
    public function create()
    {
        return view('jobs.create');
    }
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.show', ['job' => $job]);
    }

    public function search(Request $request)
    {
        $title = $request->input('title');
        $skills = $request->input('skills');
        $contractType = $request->input('contract_type');
        $location = $request->input('location');

        $jobs = Job::query();

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

        $results = $jobs->get();
        return view('jobs.search', ['results' => $results]);
    }
    
}

