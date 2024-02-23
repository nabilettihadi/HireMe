<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .bg-container {
            background-image: url('https://source.unsplash.com/800x600/?recruitment');
            background-size: cover;
            background-position: center;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(5px);
            border-radius: 20px;
            padding: 2rem;
        }

        .form-container button {
            transition: all 0.3s ease;
        }

        .form-container button:hover {
            transform: scale(1.05);
        }

        .form-container label {
            display: block;
            font-size: 0.875rem;
            line-height: 1.25rem;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .form-container input,
        .form-container textarea {
            display: block;
            width: 100%;
            padding: 0.75rem;
            font-size: 1rem;
            line-height: 1.25rem;
            color: #374151;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #e5e7eb;
            border-radius: 0.375rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-container input:focus,
        .form-container textarea:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-500 to-indigo-600 min-h-screen flex justify-center items-center">
    <div class="bg-container absolute inset-0"></div>
    <div class="bg-white bg-opacity-80 shadow-lg rounded-lg p-8 max-w-lg w-full form-container">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Complétez votre profil</h1>
        <form action="{{ route('companies.completeProfile') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom de l'entreprise</label>
                <input type="text" id="name" name="name" class="form-input" placeholder="Nom de l'entreprise">
            </div>
            <div>
                <label for="industry" class="block text-sm font-medium text-gray-700 mb-2">Industrie</label>
                <input type="text" id="industry" name="industry" class="form-input" placeholder="Industrie">
            </div>
            <div>
                <label for="slogan" class="block text-sm font-medium text-gray-700 mb-2">Slogan</label>
                <input type="text" id="slogan" name="slogan" class="form-input" placeholder="Slogan">
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea id="description" name="description" rows="3" class="form-textarea" placeholder="Description"></textarea>
            </div>
            <div>
                <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">Logo</label>
                <input type="file" id="logo" name="logo" class="form-input">
            </div>
            <div class="flex justify-center">
                <button type="submit" class="py-3 px-6 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-100">Enregistrer</button>
            </div>
        </form>
    </div>
</body>

</html>
