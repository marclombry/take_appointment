<!-- resources/views/appointment/create.blade.php -->

@extends('base') <!-- Si vous utilisez un layout -->
@php
    $userId = auth()->user()->id;
@endphp
@section('content')
    <main class="bg-white p-4 mt-10 rounded-md shadow-md mx-auto my-auto w-96">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

    <h1>Créer un rendez vous</h1>
    <form class="bg-blue p-6 rounded-md shadow-md" method="POST" action="{{ route('appointment.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="firstname">
                Prénom
            </label>
            <input type="text" name="firstname" class="w-full" value="{{ old('firstname') }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="lastname">
                Nom
            </label>
            <input type="text" name="lastname" class="w-full" value="{{ old('lastname') }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input type="text" name="email" class="w-full" value="{{ old('email') }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="tel">
                Phone
            </label>
            <input type="text" name="tel" class="w-full" value="{{ old('tel') }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="company">
                Company
            </label>
            <input type="text" name="company" class="w-full" value="{{ old('company') }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="service">
                Choix du service
            </label>
            <select id="service_id" name="service_id" class="w-full border border-gray-300 p-2 rounded-md">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="date_begin">
                Date de début
            </label>
            <input type="text" name="date_begin" id="datePickerBegin" class="date-picker w-full" value="{{ old('date_begin') }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="date_end">
                Date de fin
            </label>
            <input type="text" name="date_end" id="datePickerEnd" class="date-picker w-full" value="{{ old('date_end') }}">
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 text-grey py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                Prendre rendez-vous
            </button>
        </div>
    </form>
    </main>
@endsection
