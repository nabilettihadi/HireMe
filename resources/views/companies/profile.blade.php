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
            font-family: Arial, sans-serif;
            background-color: #f3f2ef; /* Couleur de fond */
        }

        nav {
            background-color: #ffffff; /* Couleur de fond de la barre de navigation */
        }

        nav .text-gray-800 {
            color: #333333; /* Couleur du texte des liens */
        }

        nav .text-gray-800:hover {
            color: #0073b1; /* Couleur du texte des liens au survol */
        }

        nav .fa-user-circle {
            color: #333333; /* Couleur de l'icône de profil */
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
            color: #333333; /* Couleur du titre */
        }

        .card p {
            font-size: 1rem;
            color: #666666; /* Couleur du texte */
            margin-bottom: 20px;
        }

        .card button {
            background-color: #0073b1; /* Couleur du bouton */
            color: #ffffff; /* Couleur du texte du bouton */
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .card button:hover {
            background-color: #005c8d; /* Couleur du bouton au survol */
        }

        /* Styles du pied de page */
        footer {
            background-color: #333333; /* Couleur de fond du pied de page */
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
            <li><a href="{{ route('job_offers.index') }}" class="text-white hover:text-blue-600">Offres d'emploi</a></li>
            <li><a href="{{ route('applications.index') }}" class="text-white hover:text-blue-600">Candidatures</a></li>
            <li><a href="#statistiques" class="text-white hover:text-blue-600">Statistiques</a></li>
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
    <div id="dropdown-menu" class="hidden absolute bg-gray-900 shadow-lg rounded-lg mt-2 py-2 w-32">
        <ul>
            <li><a href="#" class="block px-4 py-2 text-white hover:bg-gray-800">Profil</a></li>
            <li><a href="#" class="block px-4 py-2 text-white hover:bg-gray-800">Paramètres</a></li>
            <li><a href="#" class="block px-4 py-2 text-white hover:bg-gray-800">Déconnexion</a></li>
        </ul>
    </div>
</nav>

<main class="container mx-auto">

    <div class="text-center mt-4">
        <a href="{{ route('companies.showPublishJobForm', ['companyId' => auth()->user()->company->id]) }}" class="text-blue-600 hover:underline">Créer une offre d'emploi</a>
    </div>
    <!-- Contenu principal -->

    <div class="card max-w-2xl mx-auto">
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
            <li class="flex flex-col items-center justify-around">
                <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                </svg>
                <div>2k</div>
            </li>
            <li class="flex flex-col items-center justify-between">
                <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M7 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0 1c2.15 0 4.2.4 6.1 1.09L12 16h-1.25L10 20H4l-.75-4H2L.9 10.09A17.93 17.93 0 0 1 7 9zm8.31.17c1.32.18 2.59.48 3.8.92L18 16h-1.25L16 20h-3.96l.37-2h1.25l1.65-8.83zM13 0a4 4 0 1 1-1.33 7.76 5.96 5.96 0 0 0 0-7.52C12.1.1 12.53 0 13 0z" />
                </svg>
                <div>10k</div>
            </li>
            <li class="flex flex-col items-center justify-around">
                <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z" />
                </svg>
                <div>15</div>
            </li>
        </ul>
        <div class="p-4 border-t mx-8 mt-2">
            <button class="w-1/2 block mx-auto rounded-full bg-gray-900 hover:shadow-lg font-semibold text-white px-6 py-2">Follow</button>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('companies.profileform') }}" class="text-blue-600 hover:underline">Compléter le profil</a>
        </div>
    </div>

    <!-- Sections suivantes -->

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
