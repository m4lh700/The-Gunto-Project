<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="@if(isset($metadescription)) {{ $metadescription }} @else The gunto project aims to register and honor all Japanese smiths that worked from 1876-1945 @endif"/>
        <meta property="title" content="@if(isset($metatitle)) {{$metatitle}} - @endif{{ config('app.name', 'Laravel') }}" />
        <title>@if(isset($metatitle)) {{$metatitle}} - @endif{{ config('app.name', 'Laravel') }}</title>

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
            <main class="bg-gray-100 dark:bg-gray-800 bg-white dark:text-white">
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
