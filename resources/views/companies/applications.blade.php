<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Candidatures des Utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-8">Candidatures des Utilisateurs</h1>

    @foreach ($applications as $application)
        <div class="bg-white shadow-md rounded-lg overflow-hidden mb-4">
            <div class="p-4">
                <h3 class="text-lg font-semibold mb-2">{{ $application->user->name }}</h3>
                <p class="text-gray-600 mb-4">Postulé le: {{ $application->created_at }}</p>
                <p class="text-gray-600 mb-4">Offre d'emploi: {{ $application->jobOffer->title }}</p>
                <!-- Ajoutez d'autres détails de la candidature ici si nécessaire -->
            </div>
            <div class="p-4 bg-gray-100 border-t border-gray-200">
                <!-- Ajoutez des liens ou des boutons pour gérer les candidatures si nécessaire -->
            </div>
        </div>
    @endforeach

    @if ($applications->isEmpty())
        <p class="text-gray-600">Aucune candidature trouvée pour le moment.</p>
    @endif
</div>

</body>
</html>

