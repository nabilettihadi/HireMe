@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-semibold mb-8">Liste des utilisateurs</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($users as $user)
        <!-- Card for each user -->
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-end px-4 pt-4">


            </div>
            <div class="flex flex-col items-center pb-10">
                <!-- You can replace the image and user details with actual user data -->
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                    src="{{asset('images/' . $user->photo)}}" alt="photo de {{ $user->name }} " />
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $user->name }}</h5>
                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $user->role }}</span>
                <div class="flex mt-4 md:mt-6">
                    <form action="{{ route('admin.archiveUser', ['id' => $user->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Archiver</button>
                    </form>
                    
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
