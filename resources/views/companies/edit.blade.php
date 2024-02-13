@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Éditer l'entreprise {{ $company->name }}</h1>
        <form action="{{ route('companies.update', $company->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Champs de formulaire pour éditer les informations de l'entreprise -->
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}">
            </div>
            <div class="form-group">
                <label for="slogan">Slogan:</label>
                <input type="text" class="form-control" id="slogan" name="slogan" value="{{ $company->slogan }}">
            </div>
            <!-- Autres champs de formulaire pour les autres informations de l'entreprise -->
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection

