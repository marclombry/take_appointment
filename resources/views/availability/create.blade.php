<!-- resources/views/availability/create.blade.php -->

@extends('base')

@section('content')
    <h1>Ajouter une nouvelle disponibilité</h1>

    <form action="{{ route('availability.store') }}" method="POST">
        @csrf
        <label for="date_begin">date de début :</label>
        <input id="datePickerBegin" class="date-picker" type="text" name="date_begin" required>

        <label for="date_end">date de fin :</label>
        <input id="datePickerEnd" class="date-picker" type="text" name="date_end" required>
        <button type="submit">Ajouter</button>
    </form>
@endsection
