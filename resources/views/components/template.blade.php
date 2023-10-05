@props(['showHeader' => false])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-header></x-header>

<body class="antialiased">
    <div class="w-full bg-dots-darker bg-center bg-gray-800" style="height: 100vh;">
        @if ($showHeader)
            <x-header-bar></x-header-bar>
            <div class="h-12 w-full"></div>
            <div class="w-full" style="height: 88%">
                {{ $slot }}
            </div>
        @else
            <div class="h-100 w-full">
                {{ $slot }}
            </div>
        @endif
    </div>
</body>

</html>
