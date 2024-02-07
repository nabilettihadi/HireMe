<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    public function index()
    {
        $jobOffers = JobOffer::all();
        return view('job_offers.index', compact('jobOffers'));
    }

    public function show($id)
    {
        $jobOffer = JobOffer::findOrFail($id);
        return view('job_offers.show', compact('jobOffer'));
    }

}
