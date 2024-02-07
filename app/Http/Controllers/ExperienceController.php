<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::all();
        return view('experiences.index', compact('experiences'));
    }

    public function show($id)
    {
        $experience = Experience::findOrFail($id);
        return view('experiences.show', compact('experience'));
    }

}
