<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>completeProfile</title>
    <!-- Intégration de Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
                <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-900">Profile</a>
                <a href="{{ route('job_offers.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-gray-900">Search Jobs</a>
                <a href="{{ route('companies.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-gray-900">Search Companies</a>
            </div>
            <!-- Boutons d'actions utilisateur -->
            <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-2">
                @auth
                    <a href="{{ route('profile.completeForm') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100">Complete Profile</a>
                    <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Logout</a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700">Log in</a>
                    <a href="{{ route('register') }}" class="text-gray-700">Register</a>
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
                <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Profile</a>
                <a href="{{ route('job_offers.index') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Search Jobs</a>
                <a href="{{ route('companies.index') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Search Companies</a>
            </div>
        </div>
    </nav>
    <div class="container mx-auto py-8">
        <div class="bg-white shadow-md rounded-lg px-8 py-10 mx-auto max-w-lg">
            <h1 class="text-2xl font-bold mb-8 text-center">Complétez votre profil</h1>
            <form action="{{ route('profile.completeProfile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Photo de profil</label>
                    <input type="file" id="photo" name="photo" class="form-input">
                </div>
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Titre</label>
                    <input type="text" id="title" name="title" class="form-input" placeholder="Votre titre">
                </div>
                <div class="mb-6">
                    <label for="current_position" class="block text-sm font-medium text-gray-700 mb-2">Poste actuel</label>
                    <input type="text" id="current_position" name="current_position" class="form-input" placeholder="Votre poste actuel">
                </div>
                <div class="mb-6">
                    <label for="industry" class="block text-sm font-medium text-gray-700 mb-2">Industrie</label>
                    <input type="text" id="industry" name="industry" class="form-input" placeholder="Votre industrie">
                </div>
                <div class="mb-6">
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Adresse</label>
                    <input type="text" id="address" name="address" class="form-input" placeholder="Votre adresse">
                </div>
                <div class="mb-6">
                    <label for="contact_information" class="block text-sm font-medium text-gray-700 mb-2">Informations de contact</label>
                    <input type="text" id="contact_information" name="contact_information" class="form-input" placeholder="Vos informations de contact">
                </div>
                <div class="mb-6">
                    <label for="about" class="block text-sm font-medium text-gray-700 mb-2">À propos de moi</label>
                    <textarea id="about" name="about" rows="3" class="form-textarea" placeholder="Parlez de vous..."></textarea>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-100">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
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
