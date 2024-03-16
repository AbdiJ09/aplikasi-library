<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;800&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;1,600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/build/assets/app-1b0dea83.css">
    {{-- @vite(['resources/css/app.css', 'resources/js/peminjaman.js']) --}}
    <style>
        :root {
            background-color: #e2e8f0
        }
    </style>
    <title>{{ $title ?? 'Tamsis' }}</title>
    @livewireStyles
</head>

<body>
    {{ $slot }}

    @livewireScripts

    <script type="module" src="/build/assets/app-6dfe5873.js"></script>
    <script src="/build/assets/peminjaman-9ff18922.js"></script>
</body>

</html>
