<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        // Récupérer toutes les langues avec pagination
        $languages = Language::paginate(10);
        
        // Afficher la vue avec la liste paginée des langues
        return view('languages.index', compact('languages'));
    }

    public function show($id)
    {
        // Récupérer la langue avec l'identifiant $id
        $language = Language::findOrFail($id);
        
        // Afficher la vue avec les détails de la langue
        return view('languages.show', compact('language'));
    }
}
