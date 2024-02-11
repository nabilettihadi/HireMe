@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des Offres d'Emploi</h1>
        <a href="{{ route('job_offers.create') }}" class="btn btn-primary">Créer une Offre d'Emploi</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Entreprise</th>
                    <th>Type de Contrat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobOffers as $jobOffer)
                <tr>
                    <td>{{ $jobOffer->title }}</td>
                    <td>{{ $jobOffer->company->name }}</td>
                    <td>{{ $jobOffer->contract_type }}</td>
                    <td>
                        <a href="{{ route('job_offers.show', $jobOffer->id) }}" class="btn btn-info">Voir</a>
                        <!-- Ajoutez d'autres actions comme l'édition ou la suppression si nécessaire -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection