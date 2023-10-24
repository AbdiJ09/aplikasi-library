@extends('layout.main')
@section('content')
    <img src="/img/satur.png" class="fixed -z-10 md:-right-48 md:-bottom-28 animate-spin-slow" alt="">
    <x-notif />
    <x-home.heroHome />
    <x-book :buku="$books" />
    <div class="mt-14 mb-20">
        <h1 class="text-white font-semibold text-xl tracking-wide ms-5">Rekomendasi Buku</h1>
        <div class="swiper rekomendasi-buku">
            <div class="swiper-wrapper">
                @for ($i = 0; $i < 4; $i++)
                    <div class="swiper-slide md:p-5">
                        <div
                            class="relative w-full lg:mx-auto bg-gradient-to-r from-fuchsia-800 to-purple-800 shadow-lg rounded-lg my-3 py-5 px-4 justify-center items-center flex overflow-hidden">
                            <img src="/img/ufo.png" class="absolute left-0 top-0 hidden lg:block" alt="">
                            <img src="/img/dashboard/planet.png" class="absolute left-0 bottom-0 hidden lg:block"
                                alt="">
                            <div>
                                <p class="text-white text-sm font-medium lg:text-3xl ">Karya AJ Store</p>
                                <h1 class="text-white font-semibold text-xl lg:text-5xl">Melangkah maju</h1>
                                <p class="text-white text-xs lg:text-lg">

                                    "Ayo kembangkan budaya literasi untuk selalu membaca buku agar menjadi generasi
                                    yang hebat sebagai bekal masa
                                    depan bangsa.",

                                </p>
                            </div>
                            <img src="/img/buku/jjk.jpg" class="w-2/6 lg:w-72 rounded-lg shadow-lg" alt="">
                        </div>
                    </div>
                @endfor


            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
@endsection
