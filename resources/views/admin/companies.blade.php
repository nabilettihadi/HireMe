@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Companies</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Industrie</th>
                    <!-- Autres colonnes si nécessaire -->
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->industry }}</td>
                    <!-- Autres données d'entreprise si nécessaire -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
