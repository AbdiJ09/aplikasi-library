@extends('layout.main')
@push('content')
    <div class="w-full invert-0 landing bg-cover bg-bottom flex flex-col justify-center  items-center h-screen overflow-x-hidden"
        style="background-image: url('../img/bgg.png')">
        <header class="absolute top-0 left-0 w-full px-8 md:px-48 py-6">
            <div class="flex justify-between">
                <a href="#" class="logo text-white tracking-[.2rem] text-xl">ZULY</a>
                <button id="hamburger-button">
                    <span
                        class="block w-[20px] h-[2px] bg-white my-1 origin-top-left transition duration-200 ease-in-out"></span>
                    <span class="block w-[20px] h-[2px] bg-white my-1 transition duration-200 ease-in-out"></span>
                    <span
                        class="block w-[20px] h-[2px] bg-white my-1 origin-bottom-left transition duration-200 ease-in-out"></span>
                </button>
            </div>
            <nav class="absolute top-full right-9 md:right-48 scale-0 bg-white p-3 w-[190px] rounded-md transition duration-300 ease-in-out z-50"
                id="hamburger-menu">
                <ul class="space-y-3 ">
                    <li><a href="" class="font-medium text-gray-700"><i class="fa-solid me-2  fa-house"></i>Home</a>
                    </li>
                    <li><a href="" class="font-medium text-gray-700"><i class="fa-solid me-2  fa-book"></i>Buku</a>
                    </li>
                    <li><a href="" class="font-medium text-gray-700"><i
                                class="fa-solid me-2  fa-layer-group"></i>Peminjaman</a></li>
                    <li><a href="" class="font-medium text-gray-700"><i
                                class="fa-solid me-2  fa-repeat"></i>Pengembalian</a></li>
                </ul>
                <hr class="my-3 border-gray-300">
                <button class="btn btn-primary w-full" data-modal-target="authentication-modal"
                    data-modal-toggle="authentication-modal">Login</button>
            </nav>
        </header>

        <section class="relative
                    mx-auto max-w-4xl py-32 px-10 sm:py-48 lg:py-56 ">
            <img src="{{ asset('img/satur.png') }}" alt=""
                class="absolute top-[50%] -translate-y-1/2 -z-20 left-2/4 -translate-x-2/4">
            <div class="text-center">
                <h1 class="text-5xl font-bold md:tracking-[3rem] tracking-[0.5rem]  text-white md:text-8xl">
                    library
                </h1>
                <p class="mt-4 text-sm md:text-2xl leading-5 text-white">Like the boundless stars in the night sky,
                    knowledge opens
                    a
                    window to infinite wonders in the universe of understanding.</p>
                <div class="button-auth mt-3 flex space-x-5 justify-center">

                    <button class="btn btn-primary rounded-full w-32">Get Started</button>
                </div>
            </div>
        </section>

    </div>
    <x-modal-login />
@endpush
