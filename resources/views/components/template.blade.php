@props(['showHeader' => false])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-header></x-header>

<body class="antialiased">
    <div class="w-full" style="height: 100vh;">
        @if ($showHeader)
            <x-header-bar></x-header-bar>
            <div class="h-12 w-full"></div>
        @endif
        {{ $slot }}
    </div>
</body>

</html>
