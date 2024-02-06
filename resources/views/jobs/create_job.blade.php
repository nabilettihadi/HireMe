@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Créer une Nouvelle Offre d'Emploi</h2>
        <form action="{{ route('jobs.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Titre de l'Offre</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="required_skills">Compétences Requises</label>
                <input type="text" name="required_skills" class="form-control">
            </div>
            <div class="form-group">
                <label for="contract_type">Type de Contrat</label>
                <select name="contract_type" class="form-control">
                    <option value="full_time">Temps Plein</option>
                    <option value="part_time">Temps Partiel</option>
                    <option value="remote">À Distance</option>
                    <option value="hybrid">Hybride</option>
                </select>
            </div>
            <div class="form-group">
                <label for="location">Lieu</label>
                <input type="text" name="location" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Créer l'Offre</button>
        </form>
    </div>
@endsection