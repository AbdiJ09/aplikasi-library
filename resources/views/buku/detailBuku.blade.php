@extends('layout.main')
@section('detailBuku')
    <header class="absolute top-0 left-0 w-full z-50">
        <div class="flex justify-between items-center p-4">
            <x-breadcrumb :detail="$book->judul" />
        </div>
    </header>
    <section class="bg-cover bg-center  bg-no-repeat w-full  relative overflow-hidden "
        style="background-image: url('/img/bgg.png'),linear-gradient(to right, #1A1938, #532369);">
        <img src="/img/ufo.png" class="absolute top-6 " alt="">

        <div class="w-full flex justify-center items-center lg:space-x-20 flex-col pt-20 lg:flex-row lg:ms-20">
            <img src="/storage/buku/{{ $book->gambar }}" class="w-2/4 lg:w-64 lg:z-30 lg:-mb-20 rounded-lg " alt="">
            <div class="lg:block lg:w-2/4">

                <h1 class="text-white text-center text-2xl lg:text-start tracking-wide font-semibold my-2 lg:text-4xl">
                    {{ $book->judul }}</h1>
                <p class="text-neutral-200 text-center lg:text-start lg:text-2xl lg:underline">{{ $book->penerbit }}</p>
                <div
                    class="flex justify-around flex-initial  w-96 md:w-[30rem]  my-4 bg-gradient-to-r from-purple-950 to-fuchsia-950 shadow-lg rounded-lg mx-4 lg:mx-0 p-2 items-center lg:w-3/4">
                    <div class="">
                        <h4 class="text-white text-lg font-semibold text-center">4.5</h4>
                        <h1 class="text-white text-base font-medium ">Rating</h1>
                    </div>
                    <span class="font-bold text-xl text-white">|</span>
                    <div class="">
                        <h4 class="text-white text-lg font-semibold text-center">300</h4>
                        <h1 class="text-white text-base font-medium ">Views</h1>
                    </div>
                    <span class="font-bold text-xl text-white">|</span>
                    <div class="">
                        <h4 class="text-white text-lg font-semibold text-center">13</h4>
                        <h1 class="text-white text-base font-medium ">Tahun</h1>
                    </div>
                </div>
            </div>

        </div>

        <div
            class="w-full relative  bg-gradient-to-r from-purple-950 to-fuchsia-950 border border-purple-400 rounded-2xl mb-6 p-3 lg:w-[85%] lg:mx-auto lg:px-16 tamsis shadow-lg">
            <h1 class="text-white text-2xl tracking-wide font-semibold lg:mt-28 ">Deskripsi</h1>
            <div class="description text-slate-300">
                {{ $book->deskripsi_buku }}
            </div>
            <button class="bg-transparent
                text-purple-500 underline mt-2" onclick="toggleDescription()"
                id="selengkapnya">Selengkapnya</button>
            <div class="Detail">
                <h1 class="my-2 text-white text-2xl tracking-wide font-semibold">Detail</h1>
                <div class="grid grid-cols-2 lg:grid-cols-3 border lg:border-none rounded-xl p-6 gap-3 mb-10">
                    <div class="">
                        <p class="text-white">Penulis</p>
                        <h4 class="text-white font-medium">{{ $book->penerbit }}</h4>
                    </div>
                    <div class="">
                        <p class="text-white">Tahun terbit</p>
                        <h4 class="text-white font-medium">{{ $book->tahun_terbit }}</h4>
                    </div>
                    <div class="">
                        <p class="text-white">Pengarang</p>
                        <h4 class="text-white font-medium">{{ $book->pengarang }}</h4>
                    </div>

                    <div class="">
                        <p class="text-white">Kategory</p>
                        <h4 class="text-white font-medium">{{ $book->kategory->nama_kategory }}</h4>
                    </div>
                    <div class="">
                        <p class="text-white">Stok</p>
                        <h4 class="text-white font-medium">{{ $book->jumlah_stok }}</h4>
                    </div>
                    <div class="">
                        <p class="text-white">ISBN</p>
                        <h4 class="text-white font-medium">{{ $book->isbn }}</h4>
                    </div>

                </div>
            </div>
            @if (Auth::check())
                <x-SiswaPinjamBuku :buku="$book" :peminjaman="$peminjaman" />
            @endif
        </div>

    </section>
    <script>
        function toggleDescription() {
            const description = document.querySelector('.description');
            const button = document.getElementById('selengkapnya');

            if (description.classList.contains('expanded')) {
                description.classList.remove('expanded');
                button.textContent = 'Selengkapnya';
            } else {
                description.classList.add('expanded');
                button.textContent = 'Sembunyikan';
            }
        }
    </script>
@endsection
