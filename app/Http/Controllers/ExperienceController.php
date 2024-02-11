<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        // Récupérer toutes les expériences avec pagination
        $experiences = Experience::paginate(10);
        
        // Afficher la vue avec la liste paginée des expériences
        return view('experiences.index', compact('experiences'));
    }

    public function show($id)
    {
        // Récupérer l'expérience avec l'identifiant $id
        $experience = Experience::findOrFail($id);
        
        // Afficher la vue avec les détails de l'expérience
        return view('experiences.show', compact('experience'));
    }
}
