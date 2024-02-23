<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Offres d'Emploi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-semibold mb-6 text-center">Liste des Offres d'Emploi</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($jobOffers as $jobOffer)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-48 object-cover object-center" src="https://source.unsplash.com/800x600/?job" alt="Job Image">
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $jobOffer->title }}</h2>
                    <p class="text-gray-600 text-sm mb-2">{{ $jobOffer->company->name }}</p>
                    <p class="text-gray-700 text-sm mb-2">Type de Contrat: {{ $jobOffer->contract_type }}</p>
                    <p class="text-gray-700 text-sm mb-2">Localisation: {{ $jobOffer->location }}</p>
                    <p class="text-gray-700 text-sm mb-2">{{ $jobOffer->description }}</p>
                    <p class="text-gray-700 text-sm mb-2">Compétences Requises: {{ $jobOffer->required_skills }}</p>
                    <a href="{{ route('job_offers.show', $jobOffer->id) }}" class="text-blue-500 hover:text-blue-700">Voir</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>

