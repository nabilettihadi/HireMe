<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function apply(Request $request, $jobId)
    {
        // Méthode pour permettre à un utilisateur de postuler à une offre d'emploi
    }

    public function viewApplications($userId)
    {
        // Méthode pour afficher les candidatures soumises par un utilisateur
    }
}