@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier l'Entreprise</h1>
        <form action="{{ route('companies.update', $company->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $company->name }}" required>
            </div>
            <div class="form-group">
                <label for="industry">Industrie</label>
                <input type="text" name="industry" id="industry" class="form-control" value="{{ $company->industry }}" required>
            </div>
            <!-- Ajoutez d'autres champs pour les détails de l'entreprise -->
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endsection
