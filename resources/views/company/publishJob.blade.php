@extends('layouts.app')

@section('content')
    <h1>Publier une offre d'emploi</h1>

    <!-- Formulaire pour publier une offre d'emploi -->
    <form action="{{ route('company.publishJob', $company->id) }}" method="POST">
        @csrf
        
        <!-- Ajouter les champs du formulaire pour publier une offre d'emploi -->
    </form>
@endsection