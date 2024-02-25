<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-semibold text-gray-800 mb-4">Offres d'emploi</h1>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left">Entreprise</th>
                        <th class="px-4 py-2 text-left">Titre</th>
                        <th class="px-4 py-2 text-left">Type de contrat</th>
                        <th class="px-4 py-2 text-left">Actions</th> <!-- Ajout de la colonne des actions -->
                        <!-- Ajoutez d'autres colonnes si nécessaire -->
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($jobOffers as $jobOffer)
                    <tr>
                        <td class="px-4 py-2">{{ $jobOffer->company->name }}</td>
                        <td class="px-4 py-2">{{ $jobOffer->title }}</td>
                        <td class="px-4 py-2">{{ $jobOffer->contract_type }}</td>
                        <td class="px-4 py-2">
                            <form action="{{ route('softDeleteJobOffer', $jobOffer->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Archiver</button>
                            </form>
                        </td>
                        <!-- Ajoutez d'autres données sur l'offre d'emploi si nécessaire -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
