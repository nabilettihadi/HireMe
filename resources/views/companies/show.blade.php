@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails de l'Entreprise</h1>
        <p><strong>Nom:</strong> {{ $company->name }}</p>
        <p><strong>Industrie:</strong> {{ $company->industry }}</p>
        <!-- Affichez d'autres détails de l'entreprise si nécessaire -->
    </div>
@endsection