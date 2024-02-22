<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier une offre d'emploi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-lg mx-auto bg-white rounded-lg overflow-hidden shadow-md">
            <div class="bg-indigo-500 px-6 py-4">
                <h1 class="text-white font-bold text-xl">Publier une offre d'emploi</h1>
            </div>
            <form action="{{ route('companies.publishJob', ['companyId' => auth()->user()->company->id]) }}" method="POST" class="px-6 py-8">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titre de l'Offre</label>
                    <input type="text" name="title" id="title" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description de l'Offre</label>
                    <textarea name="description" id="description" class="resize-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="5" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="skills" class="block text-gray-700 text-sm font-bold mb-2">Compétences Requises</label>
                    <input type="text" name="required_skills" id="skills" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="contract_type" class="block text-gray-700 text-sm font-bold mb-2">Type de Contrat</label>
                    <select name="contract_type" id="contract_type" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="à distance">À Distance</option>
                        <option value="hybride">Hybride</option>
                        <option value="à temps plein">À Temps Plein</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Emplacement</label>
                    <input type="text" name="location" id="location" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Publier</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


