@extends('layout.main')
@section('landingPage')
    <div class="w-full  landing bg-cover bg-bottom flex flex-col justify-center  items-center  h-screen overflow-hidden"
        style="background-image: url('../img/bgg.png')">
        <header class="absolute top-0 left-0 w-full px-8 md:px-48 py-6">
            <div class="flex justify-between">
                <a href="#" class="logo text-white tracking-[.2rem] text-xl">ZULY</a>
            </div>

        </header>
        <section class="relative
                    mx-auto max-w-4xl w-full py-32 px-5 sm:py-48 lg:py-56  overflow-hidden">
            <img src="{{ asset('img/satur.png') }}" alt=""
                class="absolute top-[50%] -translate-y-1/2 -z-20 left-2/4 -translate-x-2/4">
            <div class="text-center">
                <h1 class="text-5xl font-bold md:tracking-[3rem] tracking-[0.5rem]  text-white md:text-8xl library">
                    library
                </h1>
                <p class="mt-4 text-sm md:text-2xl leading-5 text-white">Like the boundless stars in the night sky,
                    knowledge opens
                    a
                    window to infinite wonders in the universe of understanding.</p>
                <div class="button-auth mt-3 flex space-x-5 justify-center">
                    <a href="{{ route('home') }}">

                        <button class="btn btn-primary rounded-full w-32">Get Started</button>
                    </a>
                </div>
            </div>
        </section>

    </div>
@endsection