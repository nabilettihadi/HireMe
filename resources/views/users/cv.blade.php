<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae</title>
    <!-- Intégration de Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Contenu principal -->
        <div class="px-4 py-6 sm:px-0">
            <!-- Titre -->
            <h1 class="text-2xl font-semibold text-gray-900">Curriculum Vitae</h1>
            <!-- Formulaire pour ajouter des compétences -->
            <form action="{{ route('cv.save') }}" method="POST">
                @csrf
                
                <!-- Champs pour les compétences -->
                <div class="mb-4">
                    <label for="skills" class="block text-sm font-medium text-gray-700">Compétences:</label>
                    <div class="mt-1 grid grid-cols-2 gap-4">
                        <input type="text" name="skills[]" id="skills" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Compétence 1">
                        <input type="text" name="skills[]" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Compétence 2">
                        <!-- Ajoutez plus de champs si nécessaire -->
                    </div>
                </div>

                <!-- Champs pour les expériences professionnelles -->
                <div class="mb-4">
                    <label for="experiences" class="block text-sm font-medium text-gray-700">Expériences professionnelles:</label>
                    <div class="mt-1">
                        <textarea id="experiences" name="experiences" rows="3" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Entrez vos expériences professionnelles"></textarea>
                    </div>
                </div>

                <!-- Champs pour les cursus éducatifs -->
                <div class="mb-4">
                    <label for="education" class="block text-sm font-medium text-gray-700">Cursus éducatifs:</label>
                    <div class="mt-1">
                        <textarea id="education" name="education" rows="3" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Entrez votre cursus éducatif"></textarea>
                    </div>
                </div>

                <!-- Champs pour les langues maîtrisées -->
                <div class="mb-4">
                    <label for="languages" class="block text-sm font-medium text-gray-700">Langues maîtrisées:</label>
                    <div class="mt-1 grid grid-cols-2 gap-4">
                        <input type="text" name="languages[]" id="languages" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Langue 1">
                        <input type="text" name="languages[]" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Langue 2">
                        <!-- Ajoutez plus de champs si nécessaire -->
                    </div>
                </div>

                <!-- Bouton pour ajouter plus d'entrées -->
                <button type="button" class="text-sm font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline">Ajouter plus d'entrées</button>
                <!-- Bouton pour télécharger le CV -->
                <button type="submit" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Télécharger le CV</button>
            </form>
        </div>
    </div>

</body>

</html>