@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails de l'Offre d'Emploi</h1>
        <p><strong>Titre:</strong> {{ $jobOffer->title }}</p>
        <p><strong>Description:</strong> {{ $jobOffer->description }}</p>
        <!-- Affichez d'autres détails de l'offre d'emploi si nécessaire -->
    </div>
@endsection
