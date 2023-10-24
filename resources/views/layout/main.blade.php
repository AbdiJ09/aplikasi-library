<!DOCTYPE html>
<html lang="en" data-theme="black">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <title>App library</title>
</head>

<body class="{{ Request::is('/') ? 'overflow-hidden' : '' }} ">
@yield('landingPage')

@if (!Request::is('/'))
@hasSection('detailBuku')
@yield('detailBuku')
       
    @else
        <x-headerDesktop />

        {{-- header khusus desktop --}}
        @if (Route::currentRouteName() === 'profil')
            @yield('profil')
        @else
            <div class="flex">
                <x-sidebar link1="Home" link2="Profil" link3="Buku" link4="Peminjaman" link5="pengembalian" href1="{{ route('home') }}" href2="{{ route('profil') }}" href3="{{ route('buku') }}"/>

                <div class="relative w-full px-5 py-2 mx-auto overflow-x-hidden">
                    @yield('content')
                </div>
            </div>
        @endif
    @endif @endif

{{-- header khusus mobile --}}
<x-header-bottom />




    <script src="/js/script.js"></script>
    <script type="module"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        const profil = () => {
            let swiperOptions = {
                spaceBetween: 30,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            };

            // Cek jika layar adalah perangkat mobile
            if (window.innerWidth < 768) {
                swiperOptions.slidesPerView = 1;
            } else {
                swiperOptions.slidesPerView = 3;
            }

            let swiper = new Swiper(".mySwiper", swiperOptions);
        }
        const rekomdasiBuku = () => {
            let swiperOptions = {
                spaceBetween: 30,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            };

            // Cek jika layar adalah perangkat mobile
            if (window.innerWidth < 768) {
                swiperOptions.slidesPerView = 1;
            } else {
                swiperOptions.slidesPerView = 1;
            }

            let swiper = new Swiper(".rekomendasi-buku", swiperOptions);
        }
        rekomdasiBuku();
        profil();
    </script>
 
</body>

</html>
