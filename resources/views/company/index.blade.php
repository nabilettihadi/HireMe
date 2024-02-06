@extends('layouts.app')

@section('content')
    <h1>Liste des entreprises</h1>

    <!-- Afficher la liste des entreprises -->
    @foreach ($companies as $company)
        <div>
            <h2>{{ $company->name }}</h2>
            <!-- Ajouter d'autres informations de l'entreprise à afficher -->
        </div>
    @endforeach
@endsection