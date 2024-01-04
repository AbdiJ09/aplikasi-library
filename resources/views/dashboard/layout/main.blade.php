<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/img/logo/logo_tamsis.png" type="image/x-icon">
    @livewireStyles 
    @vite(['resources/css/app.css', 'resources/js/dashboard.js','resources/js/dashboardPeminjaman.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;800&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;1,600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <style>
        :root {
            background-color: #1f2937;
        }
    </style>
    <title>Dashboard | {{ Auth::user()->level == 'admin' ? 'Admin' : 'Petugas'}}</title>
</head>

<body>
    <x-dashboard.header />
    <x-dashboard.image />
    <div class="block  md:flex">
        <x-dashboard.sidebar />
        <div class="relative w-full lg:px-5 lg:py-10 py-10">
            @yield('content')
        </div>
    </div>
    @livewireScripts
</body>

</html>
