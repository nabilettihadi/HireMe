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
