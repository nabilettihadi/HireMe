<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier une offre d'emploi</title>
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
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Publier une offre d'emploi</h1>
        <form action="{{ route('companies.publishJob', ['companyId' => auth()->user()->company->id]) }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Titre de l'Offre</label>
                <input type="text" name="title" id="title" class="form-input" placeholder="Titre de l'Offre" required>
            </div>
            <div>
                <label for="description" class="block text-sm font-bold text-gray-700 mb-2">Description de l'Offre</label>
                <textarea name="description" id="description" class="form-textarea" rows="5" placeholder="Description de l'Offre" required></textarea>
            </div>
            <div>
                <label for="skills" class="block text-sm font-bold text-gray-700 mb-2">Compétences Requises</label>
                <input type="text" name="required_skills" id="skills" class="form-input" placeholder="Compétences Requises" required>
            </div>
            <div>
                <label for="contract_type" class="block text-sm font-bold text-gray-700 mb-2">Type de Contrat</label>
                <select name="contract_type" id="contract_type" class="form-select" required>
                    <option value="à distance">À Distance</option>
                    <option value="hybride">Hybride</option>
                    <option value="à temps plein">À Temps Plein</option>
                </select>
            </div>
            <div>
                <label for="location" class="block text-sm font-bold text-gray-700 mb-2">Emplacement</label>
                <input type="text" name="location" id="location" class="form-input" placeholder="Emplacement" required>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="py-3 px-6 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-100">Publier</button>
            </div>
        </form>
    </div>
</body>
</html>




