@extends('base') <!-- If you are using a layout -->

@section('content')
    @auth
        <div class="bg-white mt-10 p-4 rounded-md shadow-md mx-auto my-auto w-96">
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

            <h1 class="text-3xl font-semibold mb-6">Éditer le Service "{{ $service->name }}"</h1>

            <form action="{{ route('service.update', $service) }}" method="POST" class="bg-blue p-6 rounded-md shadow-md">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nom :</label>
                    <input type="text" name="name" value="{{ $service->name }}" class="w-full" required>
                </div>

                <div class="mb-4">
                    <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">Utilisateur :</label>
                    <select name="user_id" class="w-full border border-gray-300 p-2 rounded-md" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $service->user_id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="bg-blue-500 text-gray-100 py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                    Mettre à Jour
                </button>
            </form>
        </div>
    @endauth
@endsection
