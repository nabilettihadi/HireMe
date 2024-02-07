@extends('layouts.app')

@section('content')
    <h1>Détails de l'Utilisateur</h1>
    <p><strong>Nom :</strong> {{ $user->name }}</p>
    <p><strong>Email :</strong> {{ $user->email }}</p>
    <p><strong>Profil :</strong> {{ $user->profile->title ?? 'Non défini' }}</p>
    <p><strong>Compétences :</strong> 
        @foreach ($user->skills as $skill)
            {{ $skill->name }},
        @endforeach
    </p>
    <!-- Ajoutez d'autres détails ici -->
@endsection