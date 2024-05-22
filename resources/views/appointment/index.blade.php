@extends('base') <!-- Si vous utilisez un layout -->

@section('content')
    <div class="max-w-3xl mx-auto py-8 mt-10"> <!-- Centrage et espacement maximum -->
        <h1 class="text-3xl font-bold mb-6 text-center">Liste des rendez-vous</h1>

        <a href="{{ route('appointment.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4 inline-block">
            Créer un nouveau rendez-vous
        </a>

        <table class="min-w-full border border-gray-300">
            <thead>
            <tr>
                <th class="border-b px-4 py-2">Email</th>
                <th class="border-b px-4 py-2">Prénom</th>
                <th class="border-b px-4 py-2">Nom</th>
                <th class="border-b px-4 py-2">Société</th>
                <th class="border-b px-4 py-2">Date début</th>
                <th class="border-b px-4 py-2">Date fin</th>
                <th class="border-b px-4 py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($appointments as $index => $appointment)
                <tr class="{{ $index % 2 === 0 ? 'bg-gray-100' : 'bg-gray-200' }}">
                    <td class="border-b px-4 py-2">
                        <a href="{{ route('appointment.show', $appointment) }}" class="text-blue-500 hover:underline">
                            <i class="fas fa-eye"></i> <!-- Icône "eye" (œil) de Font Awesome -->
                            {{ $appointment->email }}
                        </a>
                    </td>
                    <td class="border-b px-4 py-2">{{ $appointment->firstname }}</td>
                    <td class="border-b px-4 py-2">{{ $appointment->lastname }}</td>
                    <td class="border-b px-4 py-2">{{ $appointment->tel }}</td>
                    <td class="border-b px-4 py-2">{{ $appointment->company }}</td>
                    <td class="border-b px-4 py-2">{{ $appointment->date_begin }}</td>
                    <td class="border-b px-4 py-2">{{ $appointment->date_end }}</td>
                    <td class="border-b px-4 py-2">
                        <a href="{{ route('appointment.edit', $appointment) }}" class="text-yellow-500 hover:underline">
                            <i class="fas fa-edit"></i> <!-- Icône "edit" (éditer) de Font Awesome -->
                            Éditer
                        </a>
                        <form action="{{ route('appointment.destroy', $appointment) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce rendez-vous?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">
                                <i class="fas fa-trash-alt"></i> <!-- Icône "trash-alt" (corbeille) de Font Awesome -->
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-gray-500 py-3 text-center">Aucun rendez-vous trouvé.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
