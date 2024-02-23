<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau de Bord de l'Entreprise</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Styles personnalisés */

        /* Styles du corps et de la barre de navigation */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f2ef; /* Couleur de fond */
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #4a5568; /* Couleur de fond de la barre de navigation */
        }

        nav .text-gray-800 {
            color: #ffffff; /* Couleur du texte des liens */
        }

        nav .text-gray-800:hover {
            color: #d1d5db; /* Couleur du texte des liens au survol */
        }

        nav .fa-user-circle {
            color: #ffffff; /* Couleur de l'icône de profil */
        }

        /* Styles du contenu principal */
        main {
            padding: 20px;
        }

        .card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .card img {
            border-radius: 8px;
            width: 100%;
        }

        .card h2 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #4a5568; /* Couleur du titre */
        }

        .card p {
            font-size: 1rem;
            color: #4a5568; /* Couleur du texte */
            margin-bottom: 20px;
        }

        .card button {
            background-color: #4a5568; /* Couleur du bouton */
            color: #ffffff; /* Couleur du texte du bouton */
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .card button:hover {
            background-color: #718096; /* Couleur du bouton au survol */
        }

        /* Styles du pied de page */
        footer {
            background-color: #2d3748; /* Couleur de fond du pied de page */
            color: #ffffff; /* Couleur du texte du pied de page */
            text-align: center;
            padding: 20px 0;
        }
    </style>
</head>
<body>
<!-- Barre de navigation -->
<nav class="bg-gray-900">
    <div class="container mx-auto px-4 py-6 flex justify-between items-center">
        <h1 class="text-lg font-bold text-white">HireMe</h1>
        <ul id="menu" class="hidden lg:flex space-x-4">
            <li><a href="{{ route('companies.profile') }}" class="text-white hover:text-blue-600">Profil</a></li>
            <li><a href="{{ route('companies.jobOffersForCompany') }}" class="text-white hover:text-blue-600">Offres d'emploi</a></li>
            <li><a href="{{ route('applications.index') }}" class="text-white hover:text-blue-600">Candidatures</a></li>
        </ul>
        <div class="flex items-center space-x-4">
            <button id="menu-toggle" class="lg:hidden focus:outline-none">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <div class="relative">
                <button id="profile-toggle" class="text-white focus:outline-none">
                    <i class="fas fa-user-circle fa-lg"></i>
                </button>
            </div>
        </div>
    </div>
    <div id="dropdown-menu" class="hidden absolute bg-gray-900 shadow-lg rounded-lg mt-2 py-2 w-32 right-0">
        <ul>
            <li><a href="{{ route('companies.profile') }}" class="block px-4 py-2 text-white hover:bg-gray-800">Profil</a></li>
            {{-- <li><a href="#" class="block px-4 py-2 text-white hover:bg-gray-800">Paramètres</a></li> --}}
            <li><a href="{{ route('logout') }}" class="block px-4 py-2 text-white hover:bg-gray-800" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a></li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    
    
</nav>


<main class="container mx-auto">

    <!-- Carte du profil de l'entreprise -->
    <div class="card mx-auto max-w-screen-md mb-8">
        <div class="rounded-t-lg overflow-hidden">
            <img class="object-cover object-top w-full" src='https://images.unsplash.com/photo-1549880338-65ddcdfd017b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ' alt='Mountain'>
        </div>
        <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
            @if(auth()->user()->company && auth()->user()->company->logo)
                <img class="object-cover object-center h-32" src="{{ asset('images/' . auth()->user()->company->logo) }}" alt='Logo'>
            @else
                <div class="flex items-center justify-center h-32 bg-gray-200 text-gray-600">No Logo</div>
            @endif
        </div>
        <div class="text-center mt-2">
            <h2 class="font-semibold">{{ auth()->user()->name }}</h2> <!-- Afficher le nom de l'utilisateur connecté -->
            <p class="text-gray-500">{{ auth()->user()->role }}</p> <!-- Afficher le rôle de l'utilisateur connecté -->
            <p class="text-gray-500">{{ auth()->user()->company->slogan }}</p> <!-- Afficher le rôle de l'utilisateur connecté -->
            <p class="text-gray-500">{{ auth()->user()->company->industry }}</p> <!-- Afficher le rôle de l'utilisateur connecté -->
            <p class="text-gray-500">{{ auth()->user()->company->description }}</p> <!-- Afficher le rôle de l'utilisateur connecté -->
            <p class="text-gray-500">{{ auth()->user()->company->created_at }}</p> <!-- Afficher le rôle de l'utilisateur connecté -->
        </div>
        <ul class="py-4 mt-2 text-gray-700 flex items-center justify-around">
            <!-- Informations supplémentaires -->
        </ul>
        <div class="p-4 border-t mx-8 mt-2">
            <button class="w-1/2 block mx-auto rounded-full bg-gray-900 hover:shadow-lg font-semibold text-white px-6 py-2">Follow</button>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('companies.showPublishJobForm', ['companyId' => auth()->user()->company->id]) }}" class="text-blue-600 hover:underline">Créer une offre d'emploi</a>
        </div>
        
    </div>


<!-- Carte des offres d'emploi de l'entreprise -->
<div class="card mx-auto max-w-screen-md mb-8">
    <div class="text-center mb-4">
        <h2 class="text-xl font-semibold">Offres d'emploi</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <?php
        // Supposons que vous ayez un tableau d'offres d'emploi $jobOffers
        foreach ($jobOffers as $offer) {
        ?>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2"><?= $offer['title'] ?></h3>
                    <p class="text-gray-600 mb-4"><?= $offer['description'] ?></p>
                    <p class="text-gray-500"><?= $offer['posted_at'] ?></p>
                </div>
                <div class="p-4 bg-gray-100 border-t border-gray-200">
                    <a href="<?= $offer['link'] ?>" class="text-blue-500 font-semibold hover:text-blue-600">Voir plus</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

    <!-- Carte des candidatures des utilisateurs -->
    <div class="card mx-auto max-w-screen-md mb-8">
        <!-- Contenu des candidatures -->
    </div>

</main>

<!-- Pied de page -->
<footer class="bg-gray-900 text-white py-4">
    <div class="container mx-auto">
        <p class="text-center">Contactez-nous: <a href="mailto:{{ auth()->user()->email }}" class="underline">{{ auth()->user()->email }}</a></p>
    </div>
</footer>

<!-- Script JavaScript -->
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

</body>
</html>
