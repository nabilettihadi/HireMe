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

