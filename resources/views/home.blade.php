@extends('layout.main')
@section('content')
    <img src="/img/satur.png" class="fixed -z-10 md:-right-48 md:-bottom-28 animate-spin-slow" alt="">
    @if (session()->has('success'))
        <div class="alert alert-success absolute top-20 rounded-full w-2/4">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    <x-home.heroHome />
    <x-book />
@endsection
