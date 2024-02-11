@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des Utilisateurs</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Modifier</a>
                        <!-- Ajoutez d'autres actions comme la suppression si nécessaire -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

