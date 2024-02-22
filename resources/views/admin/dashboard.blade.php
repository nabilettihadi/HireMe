<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-semibold">Admin Dashboard</h1>
            <div>
                <a href="#" class="hover:text-gray-300 mr-4">Dashboard</a>
                <a href="#" class="hover:text-gray-300 mr-4">Users</a>
                <a href="#" class="hover:text-gray-300 mr-4">Companies</a>
                <a href="#" class="hover:text-gray-300 mr-4">Jobs</a>
                <a href="#" class="hover:text-gray-300 mr-4">Statistics</a>
                <a href="{{ route('logout') }}" class="hover:text-gray-300" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
    

    <!-- Main Content -->
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-semibold mb-8">Tableau de bord de l'administrateur</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Gérer les utilisateurs -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Gérer les utilisateurs</h2>
                <a href="{{ route('admin.manageUsers') }}" class="text-blue-600 hover:underline">Voir les utilisateurs</a>
            </div>

            <!-- Gérer les entreprises -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Gérer les entreprises</h2>
                <a href="{{ route('admin.manageCompanies') }}" class="text-blue-600 hover:underline">Voir les entreprises</a>
            </div>

            <!-- Gérer les offres d'emploi -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Gérer les offres d'emploi</h2>
                <a href="{{ route('admin.manageJobs') }}" class="text-blue-600 hover:underline">Voir les offres d'emploi</a>
            </div>

            <!-- Voir les statistiques -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Voir les statistiques</h2>
                <a href="{{ route('admin.viewStatistics') }}" class="text-blue-600 hover:underline">Voir les statistiques</a>
            </div>
        </div>
    </div>
</body>
</html>
