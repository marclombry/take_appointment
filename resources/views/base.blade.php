@php
$type ='danger'
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>
    <title>Prise de rendez vous</title>

</head>

@include('layouts.navigation')

<!-- Page Heading -->
@if (isset($header))
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>
@endif

<body class="base-app">
@if(Session::has('success'))
    <div  class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
        {{ Session::get('success') }}
    </div>
@endif
@if(Session::has('error'))
    <div  class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
        {{ Session::get('error') }}
    </div>
@endif
@yield('content')
<script>

    flatpickr('.date-picker', {
        locale:'fr',
        altInput: true,
        altFormat: "j F Y : H.i",
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
</script>
</body>
</html>
