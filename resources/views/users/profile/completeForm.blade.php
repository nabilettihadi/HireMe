<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Profile</title>
    <!-- Intégration de Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <!-- Barre de navigation -->
    <nav class="bg-indigo-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo et lien vers le dashboard -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="#" class="font-bold text-white">HireMe</a>
                </div>
                <!-- Liens de navigation -->
                <div class="hidden sm:flex sm:items-center sm:space-x-4">
                    <a href="{{ route('users.profile') }}" class="text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">Profile</a>
                    <a href="{{ route('job_offers.index') }}" class="text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">Search Jobs</a>
                    <a href="{{ route('companies.index') }}" class="text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">Search Companies</a>
                </div>
                <!-- Boutons d'actions utilisateur -->
                <div class="hidden sm:flex sm:items-center sm:space-x-4">
                    @auth
                        <a href="{{ route('profile.completeForm') }}" class="bg-white text-indigo-600 px-4 py-2 rounded-md text-sm font-medium hover:bg-indigo-700 hover:text-white">Complete Profile</a>
                        <a href="#" class="text-white bg-indigo-600 px-4 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">Logout</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">Log in</a>
                        <a href="{{ route('register') }}" class="text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">Register</a>
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
        </div>

        <!-- Menu pour les écrans mobiles -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('users.profile') }}" class="block text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-base font-medium">Profile</a>
                <a href="{{ route('job_offers.index') }}" class="block text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-base font-medium">Search Jobs</a>
                <a href="{{ route('companies.index') }}" class="block text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-base font-medium">Search Companies</a>
            </div>
        </div>
    </nav>

    <!-- Formulaire de profil -->
    <div class="container mx-auto py-8">
        <div class="bg-white shadow-md rounded-lg px-8 py-10 mx-auto max-w-lg">
            <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">Complete Your Profile</h1>
            <form action="{{ route('profile.completeProfile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="photo" class="block text-sm font-medium text-gray-700">Profile Photo</label>
                    <div class="mt-1 flex items-center">

                        <input type="file" id="photo" name="photo" class="form-input ml-5">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" id="title" name="title" class="form-input mt-1" placeholder="Your title">
                </div>
                <div class="mb-4">
                    <label for="current_position" class="block text-sm font-medium text-gray-700">Current Position</label>
                    <input type="text" id="current_position" name="current_position" class="form-input mt-1" placeholder="Your current position">
                </div>
                <div class="mb-4">
                    <label for="industry" class="block text-sm font-medium text-gray-700">Industry</label>
                    <input type="text" id="industry" name="industry" class="form-input mt-1" placeholder="Your industry">
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" id="address" name="address" class="form-input mt-1" placeholder="Your address">
                </div>
                <div class="mb-4">
                    <label for="contact_information" class="block text-sm font-medium text-gray-700">Contact Information</label>
                    <input type="text" id="contact_information" name="contact_information" class="form-input mt-1" placeholder="Your contact information">
                </div>
                <div class="mb-4">
                    <label for="about" class="block text-sm font-medium text-gray-700">About Me</label>
                    <textarea id="about" name="about" rows="3" class="form-textarea mt-1" placeholder="Tell about yourself..."></textarea>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100">Save</button>
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

