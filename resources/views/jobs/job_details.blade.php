@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Détails de l'Offre d'Emploi</h2>
        <h3>{{ $job->title }}</h3>
        <p>{{ $job->description }}</p>
        <p>Compétences Requises : {{ $job->required_skills }}</p>
        <p>Type de Contrat : {{ $job->contract_type }}</p>
        <p>Lieu : {{ $job->location }}</p>
        <p>Nombre de Visites : {{ $job->visits }}</p>
        <p>Publié par : {{ $job->company->name }}</p>
        <a href="{{ route('jobs.apply', $job->id) }}" class="btn btn-primary">Postuler</a>
    </div>
@endsection
