@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des Entreprises</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Industrie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->industry }}</td>
                    <td>
                        <a href="{{ route('companies.show', $company->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Modifier</a>
                        <!-- Ajoutez d'autres actions comme la suppression si nécessaire -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
