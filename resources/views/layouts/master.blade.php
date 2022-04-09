<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="This ultimate guide cover all the important aspects of blogging. Find out how to set up a succesful blog or to make yours even better!"/>

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <livewire:toasts />
        <x-jet-banner />

        <div class="min-h-screen bg-white">

            <!-- Header -->
            @include('layouts.header')
            <!-- End header -->

            <!-- Content -->
            <main class="">
                @yield('body')
            </main>
            <!-- End content -->

            <!-- Footer -->
            @include('layouts.footer')
            <!-- End footer -->

        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
