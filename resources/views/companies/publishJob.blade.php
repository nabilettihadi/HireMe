@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Publier une offre d'emploi</h1>

        <form action="{{ route('company.publishJob', $company->id) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Titre de l'Offre</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description de l'Offre</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="skills">Compétences Requises</label>
                <input type="text" name="skills" id="skills" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="contract_type">Type de Contrat</label>
                <select name="contract_type" id="contract_type" class="form-control" required>
                    <option value="à distance">À Distance</option>
                    <option value="hybride">Hybride</option>
                    <option value="à temps plein">À Temps Plein</option>
                </select>
            </div>

            <div class="form-group">
                <label for="location">Emplacement</label>
                <input type="text" name="location" id="location" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Publier</button>
        </form>
    </div>
@endsection
