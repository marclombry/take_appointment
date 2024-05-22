<!-- resources/views/availability/edit.blade.php -->

@extends('base')

@section('content')
    <h1>Éditer le availability "{{ $availability->date_begin }}"</h1>

    <form action="{{ route('availability.update', $availability) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="date_begin">Date de debut :</label>
        <input type="text" id="datePickerBegin" class="date-picker" name="date_begin" value="{{ $availability->date_begin }}" required>

        <label for="date_begin">Date de fin :</label>
        <input type="text" id="datePickerEnd" class="date-picker" name="date_end" value="{{ $availability->date_end }}" required>
        <button type="submit">Mettre à Jour</button>
    </form>
@endsection
