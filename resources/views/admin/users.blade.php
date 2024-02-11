@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Users</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <!-- Autres colonnes si nécessaire -->
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <!-- Autres données d'utilisateur si nécessaire -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
