<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LanguageController extends Controller
{
    /**
     * Affiche une liste paginée de toutes les langues.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Récupérer toutes les langues avec pagination
        $languages = Language::paginate(10);
        
        // Afficher la vue avec la liste paginée des langues
        return view('languages.index', compact('languages'));
    }

    /**
     * Affiche les détails d'une langue spécifique.
     *
     * @param  int  $id L'identifiant de la langue
     * @return \Illuminate\View\View
     */
    public function show($id): View
    {
        // Récupérer la langue avec l'identifiant $id
        $language = Language::findOrFail($id);
        
        // Afficher la vue avec les détails de la langue
        return view('languages.show', compact('language'));
    }
}
