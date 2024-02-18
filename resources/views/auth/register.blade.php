<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .bg-container {
            background-image: url('https://source.unsplash.com/800x600/?recruitment');
            background-size: cover;
            background-position: center;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.5);
        }
        .bg-form {
            background-color: rgba(255, 255, 255, 0.8);
        }
        .form-container {
            max-width: 600px; /* Ajustez la largeur maximale selon vos préférences */
            width: 90%; /* Largeur du formulaire */
            padding: 2rem;
            border-radius: 10px;
        }
        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 1rem; /* Augmentez la hauteur des champs */
            margin-top: 1rem; /* Augmentez l'espace entre les champs */
            border-radius: 5px;
            border: 1px solid #d1d5db; /* Couleur de la bordure */
            transition: border-color 0.2s ease-in-out;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-500 to-indigo-600">
    <div class="min-h-screen flex justify-center items-center bg-container">
        <div class="overlay min-h-screen w-full flex justify-center items-center">
            <div class="bg-white dark:bg-gray-800 py-8 px-4 shadow sm:rounded-lg sm:px-10 overflow-hidden bg-form form-container">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-gray-800 dark:text-white">
                        Register
                    </h2>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">Create an account to get started</p>
                </div>
                <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                        <input id="name" name="name" type="text" autocomplete="name" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email
                            Address</label>
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                        <input id="password" name="password" type="password" autocomplete="new-password" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                            autocomplete="new-password" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('login') }}"
                            class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">Already
                            registered?</a>

                        <button type="submit"
                            class="transform hover:scale-105 transition duration-300 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
