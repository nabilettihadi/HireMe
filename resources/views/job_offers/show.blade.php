<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Offre d'Emploi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-4 py-2">
                <h1 class="text-3xl font-semibold mb-2">{{ $jobOffer->title }}</h1>
                <p class="text-gray-700 mb-4">{{ $jobOffer->description }}</p>
                <div class="flex justify-between items-center mb-4">
                    <p class="text-sm text-gray-600"><strong>Entreprise:</strong> {{ $jobOffer->company->name }}</p>
                    <p class="text-sm text-gray-600"><strong>Type de Contrat:</strong> {{ $jobOffer->contract_type }}</p>
                </div>
                <div class="flex justify-between items-center">
                    <p class="text-sm text-gray-600"><strong>Localisation:</strong> {{ $jobOffer->location }}</p>
                    <p class="text-sm text-gray-600"><strong>Compétences Requises:</strong> {{ $jobOffer->required_skills }}</p>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>

