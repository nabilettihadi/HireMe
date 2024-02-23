@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Liste des Entreprises</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($companies as $company)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="px-6 py-4">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $company->name }}</h2>
                        <p class="mt-2 text-sm text-gray-600">Industrie: {{ $company->industry }}</p>
                        <p class="mt-2 text-sm text-gray-600">Slogan: {{ $company->slogan }}</p>
                        <p class="mt-2 text-sm text-gray-600">Description: {{ $company->description }}</p>
                        <!-- Add other company information here if necessary -->
                        <div class="mt-4">
                            <a href="{{ route('companies.show', $company->id) }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">Voir</a>
                            {{-- <a href="{{ route('companies.edit', $company->id) }}" class="ml-2 text-sm font-semibold text-indigo-600 hover:text-indigo-700">Modifier</a> --}}
                            <!-- Add other actions like deletion if necessary -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


