<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">
                    Register
                </h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Create an account to get started</p>
            </div>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white dark:bg-gray-800 py-8 px-4 shadow sm:rounded-lg sm:px-10 relative overflow-hidden">
                <div class="absolute top-0 right-0 bg-gradient-to-l from-blue-500 to-indigo-600 w-1/2 h-full"></div>
                <div class="relative z-10">
                    <form method="POST" action="{{ route('register') }}" class="space-y-6">
                        @csrf

                        <!-- Role -->
                        <div class="space-y-2">
                            <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300">I am:</label>
                            <div class="flex items-center space-x-4">
                                <input type="radio" id="role_user" name="role" value="user" checked class="mr-2 text-indigo-600 focus:ring-indigo-500 dark:text-indigo-400 dark:focus:ring-indigo-400">
                                <label for="role_user" class="text-sm font-medium text-gray-700 dark:text-gray-300">Standard User</label>
                                <input type="radio" id="role_company" name="role" value="company" class="mr-2 text-indigo-600 focus:ring-indigo-500 dark:text-indigo-400 dark:focus:ring-indigo-400">
                                <label for="role_company" class="text-sm font-medium text-gray-700 dark:text-gray-300">Company</label>
                            </div>
                        </div>

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
    </div>
</body>

</html>






