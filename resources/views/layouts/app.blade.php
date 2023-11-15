<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-300 h-full">

    {{-- Header --}}
    <header>
        <div class="bg-gray-800">
        @include('layouts.navigation')
        </div>
    </header>

    {{-- Main Content --}}
    <main>
        @yield('page-content')
    </main>

    {{-- Footer --}}
    <footer></footer>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@yield('script')

</html>
