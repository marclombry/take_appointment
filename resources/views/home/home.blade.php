@extends('base')
@section('content')
    <main class="bg-white p-4 rounded-md shadow-md mx-auto my-auto w-96">
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
        <h1 class="text-2xl font-bold mb-4">Prendre rendez vous</h1>
        <p>Remplir le formulaire : </p>
        @include('form.servicesform')
    </main>
@endsection
