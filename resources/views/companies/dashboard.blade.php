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
        /* Custom styles */
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

        /* Contenu principal */
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

        /* Footer */
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
                <img src="{{ asset('images/' . auth()->user()->company->logo) }}" alt="Profile Image" class="hidden absolute top-full right-0 transform translate-x-1/2 -translate-y-1/2 bg-white border border-gray-300 shadow-lg rounded-full w-10 h-10">
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

<main class="container mx-auto">

    <!-- Contenu principal -->

    <div class="card max-w-2xl mx-auto">
        <div class="rounded-t-lg overflow-hidden">
            <img class="object-cover object-top w-full" src='https://images.unsplash.com/photo-1549880338-65ddcdfd017b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ' alt='Mountain'>
        </div>
        <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
            <img class="object-cover object-center h-32" src="{{ asset('images/' . auth()->user()->company->logo) }}" alt='Woman looking front'>
        </div>
        <div class="text-center mt-2">
            <h2 class="font-semibold">{{ auth()->user()->name }}</h2> <!-- Afficher le nom de l'utilisateur connecté -->
            <p class="text-gray-500">{{ auth()->user()->role }}</p> <!-- Afficher le rôle de l'utilisateur connecté -->
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
    </div>

    <!-- Sections suivantes -->

</main>

<!-- Pied de page -->
<footer class="bg-gray-900 text-white py-4">
    <div class="container mx-auto">
        <p class="text-center">Contactez-nous: <a href="mailto:{{ auth()->user()->email }}" class="underline">{{ auth()->user()->email }}</a></p>
    </div>
</footer>


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

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau de Bord de l'Entreprise</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<body class="h-screen">

    <!-- header section -->
    <header>
        <div class="container mx-auto">
            <nav class="sm:hidden pt-3 pb-2">
                <ul class="flex justify-center gap-10">
                    <li class="hover:text-gray-500"><a href="#about">About</a></li>
                    <li class="hover:text-gray-500"><a href="#services">Services</a></li>
                    <li class="hover:text-gray-500"><a href="#portfolio">Portfolio</a></li>
                    <li class="hover:text-gray-500"><a href="#contact">Contact</a></li>
                </ul>
            </nav>
            <nav class="justify-between items-center h-10 p-10 hidden sm:flex">
                <!-- images -->
                <img class="h-5" src="https://avatars.githubusercontent.com/u/8538468?v=4" />

                <!-- menu -->
                <ul class="flex gap-10">
                    <li class="hover:text-gray-500"><a href="#about">About</a></li>
                    <li class="hover:text-gray-500"><a href="#services">Services</a></li>
                    <li class="hover:text-gray-500"><a href="#portfolio">Portfolio</a></li>
                    <li class="hover:text-gray-500"><a href="#contact">Contact</a></li>
                </ul>

                <!-- auth -->
                <a class="px-5 py-1 bg-gray-50 rounded-full ring-1 ring-gray-100 hover:bg-white"
                    href="#">Hire Me</a>
            </nav>
        </div>
    </header>

    <!-- main content -->
    <main>
        <section class="p-20">
            <div class="container mx-auto">
                <div class="flex justify-center">
                    <div class="flex flex-col gap-5 text-center">
                        <img class="rounded-full bg-gray-50 h-52 w-56 mx-auto" src="https://avatars.githubusercontent.com/u/8538468?v=4" />
                        <div class="flex flex-col gap-3">
                            <h1 class="font-bold text-6xl">Maruf Sharia</h1>
                            <p class="text-gray-500 text-sm">Senior Full Stack Web Developer (Laravel, Vue, MySql)</p>
                        </div>
                        <a href="#" class="bg-gray-50 mx-auto w-32 text-center rounded-md p-2 border border-1 border-gray-100 hover:bg-white">Hire me</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- about me -->
        <section id="about" class="sm:p-10 lg:p-20 bg-gray-50">
            <div class="container mx-auto">
                <div class="sm:columns-2">
                    <img class="sm:w-1/2 mb-10 sm:mb-0" src="https://th.bing.com/th/id/OIG..x5DGrfb1HXjpZELjMgm?pid=ImgGn" />
                    <div>
                        <h2 class="text-bold text-2xl mb-3">Full Stack Web Developer</h2>
                        <p class="mb-5 text-sm text-gray-400">Providing web solutions</p>
                        <p class="text-gray-500 text-justify leading-10">
                            Hello there! I'm a full stack web developer, and I'm very passionate and dedicated to my
                            work.
                            With more than 5 years of experience as a professional web developer,
                            With this time period I have acquired the skills and knowledge necessary to make your
                            project a success.
                            I enjoy every step of the development process, from discussion and collaboration.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- services -->
        <section id="services" class="sm:p-10 lg:p-20 p-5">
            <div class="sm:container mx-auto">
                <h2 class="text-center text-4xl font-bold pt-10 sm:pt-0 pb-10">Services</h2>
                <div class="sm:grid grid-cols-2">
                    <div class="sm:p-10 p-5 bg-gray-50 sm:me-5 mb-10 rounded-md hover:shadow-md">
                        <h3 class="text-xl mb-5 font-bold">Web Design</h3>
                        <p class="leading-10 text-gray-500 text-justify">
                            As a dedicated web design professional,
                            I bring a creative and strategic approach to crafting visually stunning and user-centric
                            websites.
                            With a keen eye for aesthetics and a commitment to delivering exceptional user experiences,
                            my goal is to translate your brand identity into a captivating online presence.
                        </p>
                    </div>

                    <div class="sm:p-10 p-5 bg-gray-50 sm:me-5 mb-10 rounded-md hover:shadow-md">
                        <h3 class="text-xl mb-5 font-bold">Web Development</h3>
                        <p class="leading-10 text-gray-500 text-justify">
                            As a seasoned web development professional,
                            I offer comprehensive and tailored services to meet the diverse needs of businesses seeking
                            a strong online presence.
                            With a rich background in both front-end and back-end technologies,
                            I specialize in crafting visually appealing and highly functional websites and web
                            applications.
                        </p>
                    </div>

                    <div class="sm:p-10 p-5 bg-gray-50 sm:me-5 mb-10 rounded-md hover:shadow-md">
                        <h3 class="text-xl mb-5 font-bold">Issue Fixing</h3>
                        <p class="leading-10 text-gray-500 text-justify">
                            Offering dedicated issue-fixing services,
                            I bring a meticulous and solutions-oriented approach to address and resolve a wide array of
                            challenges that may arise in your digital landscape. With a focus on efficiency and
                            precision,
                            I specialize in diagnosing and remedying issues across web applications, websites, and
                            software systems.
                        </p>
                    </div>

                    <div class="sm:p-10 p-5 bg-gray-50 sm:me-5 mb-10 rounded-md hover:shadow-md">
                        <h3 class="text-xl mb-5 font-bold">Server Management</h3>
                        <p class="leading-10 text-gray-500 text-justify">
                            Specializing in server management services,
                            I offer a comprehensive solution to ensure the seamless and secure operation of your digital
                            infrastructure.
                            With expertise in configuring, monitoring, and optimizing server environments,
                            I am committed to enhancing the reliability and performance of your servers.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- portfolio -->
        <section class="lg:p-20 p-5" id="portfolio">
            <div class="lg:container mx-auto">
                <h2 class="text-center text-4xl font-bold pb-10">Portfolio</h2>
                <div class="lg:columns-4 sm:columns-2">
                    <div class="p-5 bg-gray-50 sm:me-5 sm:mb-10 mb-5 rounded-md hover:shadow-md">
                        <h3 class="text-xl mb-5">Food Delivery</h3>
                        <img class="rounded-md h-48 max-h-48 w-full" src="https://rabiulislam.dev/documents/images/portfolio/food-delivery.jpg" />
                    </div>

                    <div class="p-5 bg-gray-50 sm:me-5 sm:mb-10 mb-5 rounded-md hover:shadow-md">
                        <h3 class="text-xl mb-5">CMS</h3>
                        <img class="rounded-md h-48 max-h-48 w-full" src="https://rabiulislam.dev/documents/images/portfolio/cms.jpg" />
                    </div>

                    <div class="p-5 bg-gray-50 sm:me-5 sm:mb-10 mb-5 rounded-md hover:shadow-md">
                        <h3 class="text-xl mb-5">LMS</h3>
                        <img class="rounded-md h-48 max-h-48 w-full" src="https://rabiulislam.dev/documents/images/portfolio/lms.jpg" />
                    </div>

                    <div class="p-5 bg-gray-50 sm:me-5 sm:mb-10 mb-5 rounded-md hover:shadow-md">
                        <h3 class="text-xl mb-5">SDR</h3>
                        <img class="rounded-md h-48 max-h-48 w-full" src="https://rabiulislam.dev/documents/images/portfolio/sdr.jpg" />
                    </div>

                    <div class="p-5 bg-gray-50 sm:me-5 sm:mb-10 mb-5 rounded-md hover:shadow-md">
                        <h3 class="text-xl mb-5">VetQ</h3>
                        <img class="rounded-md h-48 max-h-48 w-full" src="https://rabiulislam.dev/documents/images/portfolio/vetq.jpg" />
                    </div>

                    <div class="p-5 bg-gray-50 sm:me-5 sm:mb-10 mb-5 rounded-md hover:shadow-md">
                        <h3 class="text-xl mb-5">Ismile</h3>
                        <img class="rounded-md h-48 max-h-48 w-full" src="https://rabiulislam.dev/documents/images/portfolio/ismile.jpg" />
                    </div>

                    <div class="p-5 bg-gray-50 sm:me-5 sm:mb-10 mb-5 rounded-md hover:shadow-md">
                        <h3 class="text-xl mb-5">Ehaul</h3>
                        <img class="rounded-md h-48 max-h-48 w-full" src="https://rabiulislam.dev/documents/images/portfolio/ecommerce.jpg" />
                    </div>

                    <div class="p-5 bg-gray-50 sm:me-5 sm:mb-10 mb-5 rounded-md hover:shadow-md">
                        <h3 class="text-xl mb-5">Feedback</h3>
                        <img class="rounded-md h-48 max-h-48 w-full" src="https://rabiulislam.dev/documents/images/portfolio/feedback.jpg" />
                    </div>
                </div>
            </div>
        </section>

        <!-- section -->
        <section class="sm:p-20 p-5" id="contact">
            <div class="sm:container mx-auto">
                <h2 class="text-center text-4xl font-bold pb-10">Contact</h2>
                <div class="w-full sm:flex">
                    <div class="sm:w-1/2 w-full">
                        <div class="mb-5">
                            <h3 class="text-xl">Address</h3>
                            <p class="text-gray-500">Khulna, Bangladesh</p>
                        </div>

                        <div class="mb-5">
                            <h3 class="text-xl">Email</h3>
                            <a class="text-gray-500" href="mailto:rir.cse.71@gmail.com">rir.cse.71@gmail.com</a>
                        </div>

                        <div class="mb-5">
                            <h3 class="text-xl">Email</h3>
                            <a class="text-gray-500" href="https:wa.me/01750009149">+8801750009149</a>
                        </div>
                    </div>

                    <div class="sm:w-1/2 w-full bg-gray-50 p-10 rounded-md">
                        <form action="#">
                            <div class="mt-5 grid grid-cols-1 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-4">
                                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                    <input type="text" name="username" id="username" autocomplete="username" class="block w-full outline-1 border border-1 flex-1 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 sm:text-sm sm:leading-6" placeholder="Rabiul Islam">
                                </div>
                            </div>

                            <div class="mt-5 grid grid-cols-1  gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-4">
                                    <label for="subject" class="block text-sm font-medium leading-6 text-gray-900">Subject</label>
                                    <input type="text" name="subject" id="subject" autocomplete="subject" class="block w-full outline-1 border border-1 flex-1 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 sm:text-sm sm:leading-6" placeholder="Hiring">
                                </div>
                            </div>

                            <div class="mt-5 grid grid-cols-1  gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-4">
                                    <label for="message" class="block text-sm font-medium leading-6 text-gray-900">Message</label>
                                    <textarea name="message" id="message" autocomplete="message" class="block w-full outline-1 border border-1 flex-1 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 sm:text-sm sm:leading-6" placeholder="Message"></textarea>
                                </div>
                            </div>

                            <div class="mt-5 grid grid-cols-1 gap-y-8 sm:grid-cols-6">
                                <a href="#" class="bg-gray-200 mx-auto w-32 text-center rounded-md p-2 border border-1 border-gray-100 hover:bg-white">Submit</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="bg-gray-50 lg:p-20 p-10">
        <section class="container mx-auto">
            <div class="sm:grid justify-between sm:grid-cols-2 lg:grid-cols-4">
                <div class="flex gap-5 flex-col">
                    <img class="h-6 w-1/2" src="https://rabiulislam.dev/documents/images/portfolio/portfolio.png" alt="logo" />
                    <p>Portfolio is a kind of identity of yourself</p>
                </div>

                <div class="mt-10 sm:mt-0">
                    <h3 class="text-xl font-bold">Quick links</h3>
                    <ul>
                        <li class="m-3 hover:text-gray-500"><a href="#about">About</a></li>
                        <li class="m-3 hover:text-gray-500"><a href="#services">Services</a></li>
                        <li class="m-3 hover:text-gray-500"><a href="#portfolio">Portfolio</a></li>
                        <li class="m-3 hover:text-gray-500"><a href="#contact">Contact</a></li>
                    </ul>
                </div>

                <div class="mt-10 sm:mt-0">
                    <h3 class="text-xl font-bold">Quick links</h3>
                    <ul>
                        <li class="m-3 hover:text-gray-500"><a href="#about">About</a></li>
                        <li class="m-3 hover:text-gray-500"><a href="#services">Services</a></li>
                        <li class="m-3 hover:text-gray-500"><a href="#portfolio">Portfolio</a></li>
                        <li class="m-3 hover:text-gray-500"><a href="#contact">Contact</a></li>
                    </ul>
                </div>

                <div class="mt-10 sm:mt-0">
                    <h3 class="text-xl font-bold">Quick links</h3>
                    <ul>
                        <li class="m-3 hover:text-gray-500"><a href="#about">About</a></li>
                        <li class="m-3 hover:text-gray-500"><a href="#services">Services</a></li>
                        <li class="m-3 hover:text-gray-500"><a href="#portfolio">Portfolio</a></li>
                        <li class="m-3 hover:text-gray-500"><a href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </section>
    </footer>


</body>
