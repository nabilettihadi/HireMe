@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Complétez votre profil</h1>
        <form action="{{ route('profile.completeProfile') }}" method="POST"  class="max-w-md mx-auto" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label for="photo" class="block mb-2">Photo de profil:</label>
                <input type="file" id="photo" name="photo" class="form-input">
            </div>

            <div class="mb-4">
                <label for="title" class="block mb-2">Titre:</label>
                <input type="text" id="title" name="title" class="form-input">
            </div>

            <div class="mb-4">
                <label for="current_position" class="block mb-2">Poste actuel:</label>
                <input type="text" id="current_position" name="current_position" class="form-input">
            </div>

            <div class="mb-4">
                <label for="industry" class="block mb-2">Industrie:</label>
                <input type="text" id="industry" name="industry" class="form-input">
            </div>

            <div class="mb-4">
                <label for="address" class="block mb-2">Adresse:</label>
                <input type="text" id="address" name="address" class="form-input">
            </div>

            <div class="mb-4">
                <label for="contact_information" class="block mb-2">Informations de contact:</label>
                <input type="text" id="contact_information" name="contact_information" class="form-input">
            </div>

            <div class="mb-4">
                <label for="about" class="block mb-2">À propos de moi:</label>
                <textarea id="about" name="about" rows="3" class="form-textarea"></textarea>
            </div>

            <div class="mb-4">
                <label for="resume" class="block mb-2">CV:</label>
                <input type="file" id="resume" name="resume" class="form-input">
            </div>

            <x-primary-button class="ms-3">
                {{ __('enregister') }}
            </x-primary-button>
        </form>
    </div>
@endsection

