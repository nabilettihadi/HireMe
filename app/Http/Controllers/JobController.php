<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        // Méthode pour afficher la liste des offres d'emploi
    }

    public function show($id)
    {
        // Méthode pour afficher les détails d'une offre d'emploi
    }

    public function search(Request $request)
    {
        // Méthode pour permettre à un utilisateur de rechercher des offres d'emploi
    }
}