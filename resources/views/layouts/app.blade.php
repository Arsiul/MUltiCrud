<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="{{ asset('js/alertify.min.js') }}"></script>
        <script src="https://kit.fontawesome.com/abf193e190.js" crossorigin="anonymous"></script>

        <!-- Styles -->
        @livewireStyles
        <link rel="stylesheet" href="{{ asset('css/alertify.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    </head>
    <body>


        <div class="navegation">
            @livewire('navigation-menu')

        </div>
            

            <!-- Page Content -->
            <main class="main">
                {{ $slot }}
            </main>
        

    </body>



</html>



