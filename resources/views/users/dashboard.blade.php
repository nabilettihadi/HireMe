<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Intégration de Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <!-- Barre de navigation -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo et lien vers le dashboard -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="#" class="font-bold text-gray-800">HireMe</a>
                    </div>
                    <!-- Liens de navigation -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-900">Profile</a>
                        <a href="{{ route('job_offers.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-gray-900">Search Jobs</a>
                        <a href="{{ route('companies.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-gray-900">Search Companies</a>
                    </div>
                </div>
                <!-- Boutons d'actions utilisateur -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <a href="{{ route('profile.complete') }}" class="inline-flex items-center px-4 py-2 mr-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100">Complete Profile</a>
                    <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Logout</a>
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
        </div>

        <!-- Menu pour les écrans mobiles -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Profile</a>
                <a href="{{ route('job_offers.index') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Search Jobs</a>
                <a href="{{ route('companies.index') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Search Companies</a>
            </div>
        </div>
    </nav>

    <!-- Contenu du dashboard -->
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Contenu principal -->
        <div class="px-4 py-6 sm:px-0">
            <!-- Titre -->
            <h1 class="text-2xl font-semibold text-gray-900">Welcome to Your Dashboard, [Nom de l'utilisateur]!</h1>
            <!-- Description -->
            <p class="mt-2 text-sm text-gray-600">Here you can update your profile, search for jobs, and more.</p>
            <!-- Cards pour les fonctionnalités principales -->
            <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Card pour la mise à jour du profil -->
                <div class="bg-white overflow-hidden shadow-md rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900">Update Your Profile</h3>
                        <p class="mt-2 text-sm text-gray-600">Keep your profile information up to date.</p>
                        <a href="{{ route('profile.complete') }}" class="mt-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">Complete Profile &rarr;</a>
                    </div>
                </div>
                <!-- Card pour la recherche d'emplois -->
                <div class="bg-white overflow-hidden shadow-md rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900">Search for Jobs</h3>
                        <p class="mt-2 text-sm text-gray-600">Find the perfect job opportunity.</p>
                        <a href="{{ route('job_offers.index') }}" class="mt-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">Start Searching &rarr;</a>
                    </div>
                </div>
                <!-- Card pour la recherche d'entreprises -->
                <div class="bg-white overflow-hidden shadow-md rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900">Search for Companies</h3>
                        <p class="mt-2 text-sm text-gray-600">Discover companies and their job openings.</p>
                        <a href="{{ route('companies.index') }}" class="mt-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">Find Companies &rarr;</a>
                    </div>
                </div>
            </div>
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
