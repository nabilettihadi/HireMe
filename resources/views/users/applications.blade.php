<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Applications</title>
    <!-- Intégration de Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Style pour les liens lorsqu'ils sont survolés */
        a:hover {
            color: #4F46E5; /* Changement de couleur lors du survol */
            transition: color 0.3s ease; /* Animation de transition fluide */
        }
    </style>
</head>

<body class="bg-gray-100">

    <!-- Barre de navigation -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-16">
            <!-- Logo et lien vers le dashboard -->
            <div class="flex-shrink-0 flex items-center">
                <a href="#" class="font-bold text-gray-800">HireMe</a>
            </div>
            <!-- Liens de navigation -->
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <a href="{{ route('users.profile') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-900 hover:text-indigo-500">Profile</a>
                <a href="{{ route('job_offers.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-indigo-500">Search Jobs</a>
                <a href="{{ route('companies.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-indigo-500">Search Companies</a>
            </div>
            <!-- Boutons d'actions utilisateur -->
            <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-2">
                @auth
                    <a href="{{ route('profile.completeForm') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100 hover:text-indigo-600">Complete Profile</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-500">Log in</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-indigo-500">Register</a>
                @endauth
            </div>
            <!-- Burger menu pour les écrans mobiles -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button type="button" class="inline-flex items-center justify-center p-2 text-gray-400 rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Icone de menu -->
                    <!-- Heroicon name: menu -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Menu pour les écrans mobiles -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('users.profile') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-500 hover:bg-gray-50">Profile</a>
                <a href="{{ route('job_offers.index') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-500 hover:bg-gray-50">Search Jobs</a>
                <a href="{{ route('companies.index') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-500 hover:bg-gray-50">Search Companies</a>
            </div>
        </div>
    </nav>

    <!-- Contenu du tableau de bord -->
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Titre -->
        <h1 class="text-3xl font-semibold text-gray-900 px-4">Your Applications</h1>
        <!-- Liste des candidatures -->
        <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 px-4">
            @forelse ($applications as $application)
                <!-- Card pour chaque candidature -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">{{ $application->jobOffer->title }}</h3>
                        <p class="text-gray-600 mb-4">Company: {{ $application->jobOffer->company->name }}</p>
                        <p class="text-gray-600 mb-4">Applied On: {{ $application->created_at }}</p>
                        <!-- Ajoutez d'autres détails de la candidature ici si nécessaire -->
                    </div>
                    <div class="p-4 bg-gray-100 border-t border-gray-200">
                        <!-- Ajoutez des liens ou des boutons pour gérer les candidatures si nécessaire -->
                    </div>
                </div>
            @empty
                <!-- Message si aucune candidature n'est trouvée -->
                <p class="text-gray-600 px-4">No applications found.</p>
            @endforelse
        </div>
    </main>

    <!-- Scripts -->
    <script>
        // Script pour le menu mobile
        const mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            const expanded = mobileMenuButton.getAttribute('aria-expanded') === 'true' || false;
            mobileMenuButton.setAttribute('aria-expanded', !expanded);
            mobileMenu.hidden = !mobileMenu.hidden;
        });
    </script>

</body>

</html>
