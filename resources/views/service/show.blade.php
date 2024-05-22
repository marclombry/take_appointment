@extends('base') <!-- If you are using a layout -->

@section('content')
    @auth
    <div class="bg-white p-4 mt-10 rounded-md shadow-md mx-auto my-auto w-96">
        <h1 class="text-3xl font-semibold mb-6">Détails du Service "{{ $service->name }}"</h1>

        <p class="mb-4">Nom : {{ $service->name }}</p>
        <p class="mb-4">Utilisateur : {{ $service->user->name }}</p>
        <!-- Add other details as needed -->

        <a href="{{ route('service.edit', $service) }}" class="text-blue-500 hover:underline">Éditer</a>

        <form action="{{ route('service.destroy', $service) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:underline ml-4">Supprimer</button>
        </form>
    </div>
    @endauth
@endsection
