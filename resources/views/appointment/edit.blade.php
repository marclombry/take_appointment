@extends('base') <!-- Si vous utilisez un layout -->
@php
    $userId = auth()->user()->id;
@endphp
@section('content')
    <main class="bg-white mt-10 p-4 rounded-md shadow-md mx-auto my-auto w-96">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <h1>Éditer un rendez-vous</h1>
        <form class="bg-blue p-6 rounded-md shadow-md" method="POST" action="{{ route('appointment.update', $appointment->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="firstname">
                    Prénom
                </label>
                <input type="text" name="firstname" class="w-full" value="{{ $appointment->firstname }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="lastname">
                    Nom
                </label>
                <input type="text" name="lastname" class="w-full" value="{{ $appointment->lastname }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input type="text" name="email" class="w-full" value="{{ $appointment->email }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="tel">
                    Email
                </label>
                <input type="text" name="tel" class="w-full" value="{{ $appointment->tel }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="company">
                    Company
                </label>
                <input type="text" name="company" class="w-full" value="{{ $appointment->company }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="service">
                    Choix du service
                </label>
                <select id="service_id" name="service_id" class="w-full border border-gray-300 p-2 rounded-md">
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}" {{ $service->id == $appointment->service_id ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="date_begin">
                    Date de début
                </label>
                <input type="text" name="date_begin" id="datePickerBegin" class="date-picker w-full" value="{{ $appointment->date_begin }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="date_end">
                    Date de fin
                </label>
                <input type="text" name="date_end" id="datePickerEnd" class="date-picker w-full" value="{{ $appointment->date_end }}">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 text-grey py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                    Mettre à jour le rendez-vous
                </button>
            </div>
        </form>
    </main>
@endsection
