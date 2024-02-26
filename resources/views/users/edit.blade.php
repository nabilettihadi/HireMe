@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier l'Utilisateur</h1>
        <form action="{{ route('users.update', auth()->user()->id) }}" method="POST">
            @csrf
            @method('PATCH')
                        <div class="mb-4">
                            <label for="photo" class="block text-sm font-medium text-gray-700">Profile Photo</label>
                            <div class="mt-1 flex items-center">
        
                                <input type="file" id="photo" name="photo" class="form-input ml-5">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" id="title" name="title" class="form-input mt-1" value="{{ auth()->user()->profile->title }}">
                        </div>
                        <div class="mb-4">
                            <label for="current_position" class="block text-sm font-medium text-gray-700">Current Position</label>
                            <input type="text" id="current_position" name="current_position" class="form-input mt-1" value="{{ auth()->user()->profile->current_position }}">
                        </div>
                        <div class="mb-4">
                            <label for="industry" class="block text-sm font-medium text-gray-700">Industry</label>
                            <input type="text" id="industry" name="industry" class="form-input mt-1" value="{{ auth()->user()->profile->industry }}">
                        </div>
                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <input type="text" id="address" name="address" class="form-input mt-1" value="{{ auth()->user()->profile->address }}">
                        </div>
                        <div class="mb-4">
                            <label for="contact_information" class="block text-sm font-medium text-gray-700">Contact Information</label>
                            <input type="text" id="contact_information" name="contact_information" class="form-input mt-1" value="{{ auth()->user()->profile->contact_information }}">
                        </div>
                        <div class="mb-4">
                            <label for="about" class="block text-sm font-medium text-gray-700">About Me</label>
                            <textarea id="about" name="about" rows="3" class="form-textarea mt-1" value="{{ auth()->user()->profile->about }}"></textarea>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" class="py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100">Modifier</button>
                        </div>
        </form>
    </div>
@endsection