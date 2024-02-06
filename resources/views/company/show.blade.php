@extends('layouts.app')

@section('content')
    <h1>Profil de l'entreprise {{ $company->name }}</h1>

    <!-- Afficher les détails de l'entreprise -->
    <p>Nom : {{ $company->name }}</p>
    <p>Logo : {{ $company->logo }}</p>
    <p>Slogan : {{ $company->slogan }}</p>
    <!-- Ajouter d'autres informations de l'entreprise à afficher -->
@endsection