<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        // Récupérer toutes les compétences avec pagination
        $skills = Skill::paginate(10);
        
        // Afficher la vue avec la liste paginée des compétences
        return view('skills.index', compact('skills'));
    }

    public function show($id)
    {
        // Récupérer la compétence avec l'identifiant $id
        $skill = Skill::findOrFail($id);
        
        // Afficher la vue avec les détails de la compétence
        return view('skills.show', compact('skill'));
    }
}
