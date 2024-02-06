@extends('layouts.app')

@section('content')
    <h1>Modifier le profil de l'entreprise {{ $company->name }}</h1>

    <!-- Formulaire pour modifier le profil de l'entreprise -->
    <form action="{{ route('company.update', $company->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- Ajouter les champs du formulaire pour éditer les informations de l'entreprise -->
    </form>
@endsection