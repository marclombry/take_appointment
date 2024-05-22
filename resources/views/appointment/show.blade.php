@extends('base') <!-- Si vous utilisez un layout -->

@section('content')
    <div class="max-w-2xl mx-auto mt-10 p-8 bg-white rounded-md shadow-md">
        <h1 class="text-3xl font-bold mb-6">Détails du rendez-vous avec {{ $appointment->email }}</h1>

        <div class="mb-4">
            <p class="text-gray-700"><span class="font-bold">Nom :</span> {{ $appointment->firstname }}</p>
        </div>

        <div class="mb-4">
            <p class="text-gray-700"><span class="font-bold">Nom de famille :</span> {{ $appointment->lastname }}</p>
        </div>

        <div class="mb-4">
            <p class="text-gray-700"><span class="font-bold">Entreprise :</span> {{ $appointment->company }}</p>
        </div>

        <div class="mb-4">
            <p class="text-gray-700">
                <span class="font-bold">Email :</span>
                <a href="mailto:{{ $appointment->email }}" class="text-blue-500 hover:underline">
                    <i class="fas fa-eye"></i> <!-- Icône "eye" (œil) de Font Awesome -->
                    {{ $appointment->email }}
                </a>
            </p>
        </div>

        <div class="mb-4">
            <p class="text-gray-700"><span class="font-bold">ID de l'utilisateur :</span> {{ $appointment->user_id }}</p>
        </div>
        <div class="mb-4">
            <p class="text-gray-700"><span class="font-bold">Nom du service :</span> {{ $service->name }}</p>
        </div>
        <div class="mb-4">
            <p class="text-gray-700"><span class="font-bold">Nom du service :</span> {{ $appointment->tel }}</p>
        </div>
        <div class="mb-4">
            <p class="text-gray-700"><span class="font-bold">Date de début :</span> {{ $appointment->date_begin }}</p>
        </div>

        <div class="mb-4">
            <p class="text-gray-700"><span class="font-bold">Date de fin :</span> {{ $appointment->date_end }}</p>
        </div>

        <div class="flex items-center space-x-4">
            <a href="{{ route('appointment.edit', $appointment) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Éditer
            </a>

            <form action="{{ route('appointment.destroy', $appointment) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce rendez-vous?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                    Supprimer
                </button>
            </form>
        </div>
    </div>
@endsection
