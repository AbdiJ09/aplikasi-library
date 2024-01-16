@extends('layout.main')
@section('content')
    <x-home.heroHome />
    <x-book :buku="$books" title="Buku" />
    <div class="notFound"></div>
    <div class="mt-14 mb-20">
        <h1 class="text-black font-semibold text-xl tracking-wide ms-5">Rekomendasi Buku</h1>
        <div class="swiper rekomendasi-buku">
            <div class="swiper-wrapper">
                <div class="swiper-slide md:p-5">
                    <img src="/img/banner.jpg" class="rounded-lg shadow-lg shadow-purple-600" alt="">
                </div>
                <div class="swiper-slide md:p-5">
                    <img src="/img/banner1.jpg" class="rounded-lg shadow-lg shadow-purple-600" alt="">
                </div>
                <div class="swiper-slide md:p-5">
                    <img src="/img/imd.jpg" class="rounded-lg shadow-lg shadow-purple-600" alt="">
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
@endsection
