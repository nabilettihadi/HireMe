<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau de Bord de l'Entreprise</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

    <!-- Barre de navigation -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4 py-6 flex justify-between items-center">
            <h1 class="text-lg font-bold text-gray-800">Logo de l'entreprise</h1>
            <button id="menu-toggle" class="lg:hidden focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <ul id="menu" class="hidden lg:flex space-x-4">
                <li><a href="#profil" class="text-gray-800 hover:text-blue-600">Profil</a></li>
                <li><a href="#offres" class="text-gray-800 hover:text-blue-600">Offres d'emploi</a></li>
                <li><a href="#candidatures" class="text-gray-800 hover:text-blue-600">Candidatures</a></li>
                <li><a href="#statistiques" class="text-gray-800 hover:text-blue-600">Statistiques</a></li>
            </ul>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-8">Bienvenue sur votre Tableau de Bord</h1>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Card Profil -->
            <a href="{{ route('companies.show', $company->id) }}" class="bg-white shadow-md rounded-md p-6 flex flex-col justify-between hover:bg-gray-50 transition duration-300 ease-in-out">
                <h2 class="text-xl font-semibold mb-4">Profil de l'entreprise</h2>
                <!-- Ajoutez ici des informations sur le profil de l'entreprise si nécessaire -->
            </a>

            <!-- Card Offres d'emploi -->
            <a href="{{ route('offres.index') }}" class="bg-white shadow-md rounded-md p-6 flex flex-col justify-between hover:bg-gray-50 transition duration-300 ease-in-out">
                <h2 class="text-xl font-semibold mb-4">Gestion des offres d'emploi</h2>
                <!-- Ajoutez ici des informations sur les offres d'emploi si nécessaire -->
            </a>

            <!-- Card Candidatures -->
            <a href="{{ route('candidatures.index') }}" class="bg-white shadow-md rounded-md p-6 flex flex-col justify-between hover:bg-gray-50 transition duration-300 ease-in-out">
                <h2 class="text-xl font-semibold mb-4">Consultation des candidatures reçues</h2>
                <!-- Ajoutez ici des informations sur les candidatures reçues si nécessaire -->
            </a>

            <!-- Card Statistiques -->
            <a href="{{ route('statistiques.index') }}" class="bg-white shadow-md rounded-md p-6 flex flex-col justify-between hover:bg-gray-50 transition duration-300 ease-in-out">
                <h2 class="text-xl font-semibold mb-4">Statistiques</h2>
                <!-- Ajoutez ici des graphiques ou tableaux pour les statistiques si nécessaire -->
            </a>
        </div>
    </div>

    <!-- Pied de page -->
    <footer class="bg-gray-900 text-white py-4">
        <div class="container mx-auto">
            <p class="text-center">Contactez-nous: info@entreprise.com</p>
        </div>
    </footer>

    <!-- Script pour le menu mobile -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');

        menuToggle.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>




