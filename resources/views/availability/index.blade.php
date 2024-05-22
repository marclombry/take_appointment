<!-- resources/views/availability/index.blade.php -->

@extends('base')

@section('content')
    <div class="divide-y divide-gray-200">
        <h1>Liste des availability</h1>

        <a href="{{ route('availability.create') }}">Créer un nouveau availability</a>

        <ul>
            @foreach ($availabilities as $availability)
                <li>
                    <a href="{{ route('availability.show', $availability) }}">{{ $availability->date_begin }}</a>
                    <a href="{{ route('availability.edit', $availability) }}">Éditer</a>
                    <form action="{{ route('availability.destroy', $availability) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
