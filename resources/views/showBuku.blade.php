@extends('layout.main')
@section('content')
    <div class="py-24">
        <div class="flex items-center justify-center relative overflow-hidden pt-5">
            <div class="grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 lg:gap-x-1 gap-y-10 buku w-full grid">
                @foreach ($buku as $item)
                    <div
                        class="group  relative cursor-pointer items-center justify-center overflow-hidden transition-shadow hover:shadow-xl hover:shadow-black/30 rounded-xl shadow-lg  shadow-neutral-500 lg:w-4/5">
                        <div class="h-full w-full">
                            <img class="h-full w-full object-cover  transition-transform duration-500 group-hover:rotate-3 group-hover:scale-125"
                                src="{{ asset('storage/buku/' . $item->gambar) }}" alt="" />
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/70 group-hover:from-black/70 group-hover:via-black/60  group-hover:to-black/70 ">
                        </div>
                        <div
                            class="absolute inset-0 flex translate-y-[100%] flex-col items-center justify-center  md:px-0 text-center transition-all duration-500 group-hover:translate-y-0">
                            <h1 class="md:text-xl font-bold text-white ">
                                {{ $item->judul }}</h1>

                            <a href="/book/{{ $item->slug }}" wire:navigate>
                                <button
                                    class="rounded-full bg-neutral-900 py-2 px-3.5 font-com text-sm capitalize text-white shadow shadow-black/60 mt-2">Detail
                                    buku</button>
                            </a>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
