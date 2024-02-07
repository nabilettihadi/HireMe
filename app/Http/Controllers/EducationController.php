<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::all();
        return view('educations.index', compact('educations'));
    }

    public function show($id)
    {
        $education = Education::findOrFail($id);
        return view('educations.show', compact('education'));
    }


}