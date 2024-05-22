<!-- resources/views/service/index.blade.php -->

@extends('base') <!-- Si vous utilisez un layout -->

@section('content')
    @auth
    <div class="max-w-3xl mx-auto py-8"> <!-- Centrage et espacement maximum -->
        <h1 class="text-3xl font-bold mb-6 text-center">Liste des Services</h1>

        <a href="{{ route('service.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4 inline-block">
            Créer un nouveau service
        </a>

        <ul class="list-none p-0">
            @forelse ($services as $service)
                <li class="border-b border-gray-300 py-3 flex items-center justify-between bg-blue-100 rounded-md mb-3 px-4">
                    <div>
                        <a href="{{ route('service.show', $service) }}" class="text-blue-500 hover:underline">
                            <i class="fas fa-eye"></i> <!-- Icône "eye" (œil) de Font Awesome -->
                            {{ $service->name }}
                        </a>
                    </div>
                    <div class="">
                        <a href="{{ route('service.edit', $service) }}" class="text-yellow-500 hover:underline">
                            <i class="fas fa-edit"></i> <!-- Icône "edit" (éditer) de Font Awesome -->
                            Éditer
                        </a>
                        <form action="{{ route('service.destroy', $service) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce service?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">
                                <i class="fas fa-trash-alt"></i> <!-- Icône "trash-alt" (corbeille) de Font Awesome -->
                                Supprimer
                            </button>
                        </form>
                    </div>
                </li>
            @empty
                <li class="text-gray-500 py-3 text-center">Aucun service trouvé.</li>
            @endforelse
        </ul>
    </div>
    @endauth
@endsection
