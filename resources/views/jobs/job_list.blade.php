@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Liste des Offres d'Emploi</h2>
        <ul>
            @foreach ($jobs as $job)
                <li>
                    <a href="{{ route('jobs.show', $job->id) }}">{{ $job->title }}</a> - {{ $job->company->name }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection
