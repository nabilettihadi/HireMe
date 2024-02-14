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

    <div class="container mx-auto py-8">
        <div class="bg-white shadow-md rounded-lg px-8 py-10 mx-auto max-w-lg">
            <h1 class="text-2xl font-bold mb-8 text-center">Complétez votre profil</h1>
            <form action="{{ route('companies.companyProfile') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-6">
        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom de l'entreprise</label>
        <input type="text" id="name" name="name" class="form-input" placeholder="Nom de l'entreprise">
    </div>
    <div class="mb-6">
        <label for="industry" class="block text-sm font-medium text-gray-700 mb-2">Industrie</label>
        <input type="text" id="industry" name="industry" class="form-input" placeholder="Industrie">
    </div>
    <div class="mb-6">
        <label for="slogan" class="block text-sm font-medium text-gray-700 mb-2">Slogan</label>
        <input type="text" id="slogan" name="slogan" class="form-input" placeholder="Slogan">
    </div>
    <div class="mb-6">
        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
        <textarea id="description" name="description" rows="3" class="form-textarea" placeholder="Description"></textarea>
    </div>
    <div class="mb-6">
        <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">Logo</label>
        <input type="file" id="logo" name="logo" class="form-input">
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