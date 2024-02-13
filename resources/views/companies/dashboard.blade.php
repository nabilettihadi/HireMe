<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau de Bord de l'Entreprise</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100 font-sans">

    <!-- Barre de navigation -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4 py-6 flex justify-between items-center">
            <h1 class="text-lg font-bold text-gray-800">HireMe</h1>
            <ul id="menu" class="hidden lg:flex space-x-4">
                <li><a href="#profil" class="text-gray-800 hover:text-blue-600">Profil</a></li>
                <li><a href="#offres" class="text-gray-800 hover:text-blue-600">Offres d'emploi</a></li>
                <li><a href="#candidatures" class="text-gray-800 hover:text-blue-600">Candidatures</a></li>
                <li><a href="#statistiques" class="text-gray-800 hover:text-blue-600">Statistiques</a></li>
            </ul>
            <div class="flex items-center space-x-4">
                <button id="menu-toggle" class="lg:hidden focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <div class="relative">
                    <button id="profile-toggle" class="text-gray-800 hover:text-blue-600 focus:outline-none">
                        <i class="fas fa-user-circle fa-lg"></i>
                    </button>
                    <!-- Image de profil -->
                    <img src="path_to_your_profile_image.jpg" alt="Profile Image" class="hidden absolute top-full right-0 transform translate-x-1/2 -translate-y-1/2 bg-white border border-gray-300 shadow-lg rounded-full w-10 h-10">
                </div>
            </div>
        </div>
        <div id="dropdown-menu" class="hidden absolute bg-white shadow-lg rounded-lg mt-2 py-2 w-32">
            <ul>
                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profil</a></li>
                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Paramètres</a></li>
                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Déconnexion</a></li>
            </ul>
        </div>
    </nav>
    
    
    

    
    <script>
        const profileToggle = document.getElementById('profile-toggle');
        const profileDropdown = document.getElementById('dropdown-menu');
        const menuToggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');
        const dropdownToggle = document.getElementById('dropdown-toggle');
    
        profileToggle.addEventListener('click', () => {
            profileDropdown.classList.toggle('hidden');
        });
    
        menuToggle.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    
        dropdownToggle.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });
    </script>
    
    
    
    

    <!-- Contenu principal -->
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-8">Bienvenue sur votre Tableau de Bord</h1>

        <!-- Section Profil de l'entreprise -->
        <section id="profil" class="mb-8 bg-white shadow-md rounded-md p-6">
            <h2 class="text-xl font-semibold mb-4">Profil de l'entreprise</h2>
            <form>
                <label class="block mb-2" for="nom">Nom de l'entreprise:</label>
                <input type="text" id="nom" name="nom" placeholder="Nom de l'entreprise" class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4">

                <label class="block mb-2" for="logo">Logo de l'entreprise:</label>
                <input type="file" id="logo" name="logo" class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4">

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Enregistrer</button>
            </form>
        </section>

        <!-- Section Gestion des offres d'emploi -->
        <section id="offres" class="mb-8 bg-white shadow-md rounded-md p-6">
            <h2 class="text-xl font-semibold mb-4">Gestion des offres d'emploi</h2>
            <ul>
                <li class="mb-2">Nom de l'offre d'emploi - Poste</li>
            </ul>
            <form class="mt-4">
                <label class="block mb-2" for="titre">Titre de l'offre:</label>
                <input type="text" id="titre" name="titre" placeholder="Titre de l'offre" class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4">

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Créer</button>
            </form>
        </section>

        <!-- Section Consultation des candidatures reçues -->
        <section id="candidatures" class="mb-8 bg-white shadow-md rounded-md p-6">
            <h2 class="text-xl font-semibold mb-4">Consultation des candidatures reçues</h2>
            <ul>
                <li class="mb-2">Nom du candidat - Poste</li>
            </ul>
        </section>

        <!-- Section Statistiques -->
        <section id="statistiques" class="mb-8 bg-white shadow-md rounded-md p-6">
            <h2 class="text-xl font-semibold mb-4">Statistiques</h2>
            <!-- Graphiques ou tableaux pour visualiser les statistiques sur les performances des offres d'emploi -->
        </section>

        <!-- Section Abonnement à la newsletter -->
        <section id="newsletter" class="bg-white shadow-md rounded-md p-6">
            <h2 class="text-xl font-semibold mb-4">Abonnement à la newsletter</h2>
            <form>
                <label class="block mb-2" for="email">Adresse email:</label>
                <input type="email" id="email" name="email" placeholder="Adresse email" class="w-full px-4 py-2 border border-gray-300 rounded-md mb-4">

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">S'abonner</button>
            </form>
        </section>
    </div>

    <!-- Pied de page -->
    <footer class="bg-gray-900 text-white py-4">
        <div class="container mx-auto">
            <p class="text-center">Contactez-nous: info@entreprise.com</p>
        </div>
    </footer>
</body>
</html>
