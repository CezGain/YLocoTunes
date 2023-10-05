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

        @include('components.background')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-dots-lighter bg-gray-900 dark:bg-dots-lighter dark:bg-gray-900">
        <a href="..">    
            <img src="https://cdn.discordapp.com/attachments/1158671272331460638/1159073991739314206/5dfcbb2ebf5a4492911803a08e44ccc0-removebg-preview.png?ex=651e8f46&is=651d3dc6&hm=f0dea518a8a8a083e98a9be9fd721314bbfeeb666f524350d397a1b9f93b0d94&"
                    alt="logo" border="0" class="w-20 h-20 m-10">
        </a>
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
