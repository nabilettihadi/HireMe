@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Créer une Offre d'Emploi</h1>
        <form action="{{ route('job_offers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <!-- Ajoutez d'autres champs pour les détails de l'offre d'emploi -->
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
@endsection
