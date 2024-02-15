<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau de Bord de l'Entreprise</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body class="h-screen">
<div class="bg-gray-100">
    <div class="container mx-auto py-8">
        <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
            <div class="col-span-4 sm:col-span-3">
                <div class="bg-white shadow rounded-lg p-6">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('images/' . auth()->user()->profile->photo) }}" class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">

                        <!-- Afficher le nom de l'utilisateur -->
                        <h1 class="text-xl font-bold">{{ auth()->user()->name }}</h1>
                        <!-- Afficher le rôle de l'utilisateur -->
                        <p class="text-gray-700">{{ auth()->user()->role }}</p>
                        
                        <!-- Afficher le titre de l'utilisateur -->
                        <p class="text-gray-700">Titre: {{ auth()->user()->profile->title }}</p>
                        <!-- Afficher la position actuelle de l'utilisateur -->
                        <p class="text-gray-700">Position actuelle: {{ auth()->user()->profile->current_position }}</p>
                        <!-- Afficher l'industrie de l'utilisateur -->
                        <p class="text-gray-700">Industrie: {{ auth()->user()->profile->industry }}</p>
                        <!-- Afficher l'adresse de l'utilisateur -->
                        <p class="text-gray-700">Adresse: {{ auth()->user()->profile->address }}</p>
                        <!-- Afficher les informations de contact de l'utilisateur -->
                        <p class="text-gray-700">Contact: {{ auth()->user()->profile->contact_information }}</p>
                        
                        <div class="mt-6 flex flex-wrap gap-4 justify-center">
                            <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Contact</a>
                            <a href="#" class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded">Resume</a>
                        </div>
                    </div>
                    <hr class="my-6 border-t border-gray-300">
                    <div class="flex flex-col">
                        <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Skills</span>
                        <ul>
                            <li class="mb-2">JavaScript</li>
                            <li class="mb-2">React</li>
                            <li class="mb-2">Node.js</li>
                            <li class="mb-2">HTML/CSS</li>
                            <li class="mb-2">Tailwind Css</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-span-4 sm:col-span-9">
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-xl font-bold mb-4">About Me</h2>
                    <p class="text-gray-700">{{ auth()->user()->profile->about }}</p>

                    <h3 class="font-semibold text-center mt-3 -mb-2">
                        Find me on
                    </h3>
                    <!-- Mettez à jour les liens sociaux ici -->

                    <h2 class="text-xl font-bold mt-6 mb-4">Experience</h2>
                    <div class="mb-6">
                        <div class="flex justify-between flex-wrap gap-2 w-full">
                            <span class="text-gray-700 font-bold">Web Developer</span>
                            <p>
                                <span class="text-gray-700 mr-2">at ABC Company</span>
                                <span class="text-gray-700">2017 - 2019</span>
                            </p>
                        </div>
                        <p class="mt-2">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est vitae
                            tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus non velit egestas
                            suscipit.
                        </p>
                    </div>
                    <div class="mb-6">
                        <div class="flex justify-between flex-wrap gap-2 w-full">
                            <span class="text-gray-700 font-bold">Web Developer</span>
                            <p>
                                <span class="text-gray-700 mr-2">at ABC Company</span>
                                <span class="text-gray-700">2017 - 2019</span>
                            </p>
                        </div>
                        <p class="mt-2">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est vitae
                            tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus non velit egestas
                            suscipit.
                        </p>
                    </div>
                    <div class="mb-6">
                        <div class="flex justify-between flex-wrap gap-2 w-full">
                            <span class="text-gray-700 font-bold">Web Developer</span>
                            <p>
                                <span class="text-gray-700 mr-2">at ABC Company</span>
                                <span class="text-gray-700">2017 - 2019</span>
                            </p>
                        </div>
                        <p class="mt-2">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est vitae
                            tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus non velit egestas
                            suscipit.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

