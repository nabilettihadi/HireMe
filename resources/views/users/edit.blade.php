@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier l'Utilisateur</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <!-- Ajoutez d'autres champs pour les détails de l'utilisateur -->
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endsection