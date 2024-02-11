<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        // Récupérer toutes les éducations avec pagination
        $educations = Education::paginate(10);
        
        // Afficher la vue avec la liste paginée des éducations
        return view('educations.index', compact('educations'));
    }

    public function show($id)
    {
        // Récupérer l'éducation avec l'identifiant $id
        $education = Education::findOrFail($id);
        
        // Afficher la vue avec les détails de l'éducation
        return view('educations.show', compact('education'));
    }
}