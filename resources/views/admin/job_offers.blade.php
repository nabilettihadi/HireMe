@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Job Offers</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Entreprise</th>
                    <th>Titre</th>
                    <th>Type de contrat</th>
                    <!-- Autres colonnes si nécessaire -->
                </tr>
            </thead>
            <tbody>
                @foreach ($jobOffers as $jobOffer)
                <tr>
                    <td>{{ $jobOffer->company->name }}</td>
                    <td>{{ $jobOffer->title }}</td>
                    <td>{{ $jobOffer->contract_type }}</td>
                    <!-- Autres données de l'offre d'emploi si nécessaire -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
