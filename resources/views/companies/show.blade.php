@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@section('content')
    <div class="container">
        <h1>Détails de l'Entreprise</h1>
        <p><strong>Nom:</strong> {{ $company->name }}</p>
        <p><strong>Industrie:</strong> {{ $company->industry }}</p>
        <!-- Affichez d'autres détails de l'entreprise si nécessaire -->
    </div>
@endsection