<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-4">Détails de l'Entreprise</h1>
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-semibold">{{ $company->name }}</h2>
                <img class="w-20 h-20 object-cover object-center" src="{{ asset('images/' . $company->logo) }}" alt='Logo'>
            </div>
            <p><strong>Industrie:</strong> {{ $company->industry }}</p>
            <p><strong>Slogan:</strong> {{ $company->slogan }}</p>
            <p><strong>Description:</strong> {{ $company->description }}</p>
        </div>
    </div>
@endsection
