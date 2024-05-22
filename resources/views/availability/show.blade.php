<!-- resources/views/availability/show.blade.php -->

@extends('base')

@section('content')
    <h1>Détails du availability "{{ $availability->date_begin }}"</h1>
    <p>Date de début : {{ $availability->date_begin }}</p>
    <p>Date de fin : {{ $availability->date_end }}</p>

    <a href="{{ route('availability.edit', $availability) }}">Éditer</a>
    <form action="{{ route('availability.destroy', $availability) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>
@endsection
