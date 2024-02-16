@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-semibold text-gray-900 mb-6">Liste des Entreprises</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($companies as $company)
                <div class="bg-white overflow-hidden shadow-md rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h2 class="text-lg font-medium text-gray-900">{{ $company->name }}</h2>
                        <p class="mt-2 text-sm text-gray-600">Industrie: {{ $company->industry }}</p>
                        <!-- Ajoutez d'autres informations de l'entreprise ici si nécessaire -->
                        <div class="mt-4">
                            <a href="{{ route('companies.show', $company->id) }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Voir</a>
                            <a href="{{ route('companies.edit', $company->id) }}" class="ml-2 text-sm font-medium text-indigo-600 hover:text-indigo-500">Modifier</a>
                            <!-- Ajoutez d'autres actions comme la suppression si nécessaire -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

