@extends('base') <!-- If you are using a layout -->

@section('content')
    @auth
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
            <h1 class="text-3xl font-semibold mb-6">Créer un Nouveau Service</h1>

            <form action="{{ route('service.store') }}" method="POST" class="space-y-4">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom :</label>
                    <input type="text" name="name" class="w-full" required
                           class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-4">
                    <label for="user_id" class="block text-sm font-medium text-gray-700">Utilisateur :</label>
                    <select name="user_id" required
                            class="w-full mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                    Créer
                </button>
            </form>
        </main>
    @endauth
@endsection
