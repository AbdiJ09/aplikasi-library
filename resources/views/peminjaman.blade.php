@extends('layout.main')
@section('detailBuku')
    <header class="w-full fixed top-0 left-0 z-50  bg-transparent transition-all duration-500 ease-in-out" id="header-sticky">
        <div class="flex justify-between  items-center py-4 px-4 lg:px-10">
            <button onclick="window.history.back()">
                <span><i class="fa-solid fa-chevron-left text-white transition duration-500 ease-in-out"></i></span>
            </button>
            <h1
                class="opacity-0 peminjaman transition duration-500 text-lg ease-in-out lg:text-2xl tracking-wide text-white font-bold">
                Peminjaman
            </h1>
            <span></span>
            <div class="absolute right-5">
                <div class="input-container">
                    <input type="hidden" name="anggota" value="{{ request('anggota') }}" id="anggota">
                    <input placeholder="Search something..." class="inputSearch peminjamanSearch" name="search"
                        type="text">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon">
                        <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                        <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                        <g id="SVGRepo_iconCarrier">
                            <rect fill="white"></rect>
                            <path
                                d="M7.25007 2.38782C8.54878 2.0992 10.1243 2 12 2C13.8757 2 15.4512 2.0992 16.7499 2.38782C18.06 2.67897 19.1488 3.176 19.9864 4.01358C20.824 4.85116 21.321 5.94002 21.6122 7.25007C21.9008 8.54878 22 10.1243 22 12C22 13.8757 21.9008 15.4512 21.6122 16.7499C21.321 18.06 20.824 19.1488 19.9864 19.9864C19.1488 20.824 18.06 21.321 16.7499 21.6122C15.4512 21.9008 13.8757 22 12 22C10.1243 22 8.54878 21.9008 7.25007 21.6122C5.94002 21.321 4.85116 20.824 4.01358 19.9864C3.176 19.1488 2.67897 18.06 2.38782 16.7499C2.0992 15.4512 2 13.8757 2 12C2 10.1243 2.0992 8.54878 2.38782 7.25007C2.67897 5.94002 3.176 4.85116 4.01358 4.01358C4.85116 3.176 5.94002 2.67897 7.25007 2.38782ZM9 11.5C9 10.1193 10.1193 9 11.5 9C12.8807 9 14 10.1193 14 11.5C14 12.8807 12.8807 14 11.5 14C10.1193 14 9 12.8807 9 11.5ZM11.5 7C9.01472 7 7 9.01472 7 11.5C7 13.9853 9.01472 16 11.5 16C12.3805 16 13.202 15.7471 13.8957 15.31L15.2929 16.7071C15.6834 17.0976 16.3166 17.0976 16.7071 16.7071C17.0976 16.3166 17.0976 15.6834 16.7071 15.2929L15.31 13.8957C15.7471 13.202 16 12.3805 16 11.5C16 9.01472 13.9853 7 11.5 7Z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </g>
                    </svg>

                </div>
            </div>

        </div>
    </header>
    <div
        class="absolute left-0 top-0 w-full h-[12rem] lg:h-[15rem] brightness-90 bg-sticky   bg-[url(../../public/img/pjj.jpg)] bg-cover bg-no-repeat bg-center  transition duration-300 ease-in-out">
        <h1
            class="absolute left-2/4 text-center  -translate-x-2/4 top-20 text-2xl lg:text-5xl font-bold uppercase tracking-wider transition duration-500 delay-300 ease-in-out p text-white">
            Peminjaman</h1>

    </div>
    <div
        class ="w-full mx-auto z-[20]  relative  my-40 lg:my-52 md:grid md:grid-cols-2 md:gap-6 lg:grid  lg:grid-cols-3 lg:gap-4 peminjaman-container bg-gradient-to-r from-purple-950 via-black to-purple-950 p-5 lg:p-8 rounded-xl overflow-hidden">
        @foreach ($peminjaman as $item)
            @foreach ($item->PeminjamanDetail as $i)
                <div
                    class ="w-full bg-black/40 shadow-purple-700 relative  shadow-xl rounded-lg  h-44 flex m-auto items-center px-3 mb-5 mt-3 overflow-hidden py-2">
                    <img class = "w-20 rounded-lg border border-purple-500"
                        src = "{{ '../storage/buku/' . $i->Buku->gambar }}" class = "object-cover object-center" alt />
                    <div class = "px-3 space-y-2">
                        <h1 class = "font-semibold text-white ">
                            {{ $i->Buku->judul }} </h1>
                        <h4 class = "text-purple-600 font-semibold  uppercase decoration-purple-500 text-lg tracking-wide"
                            style="text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5)">
                            {{ $item->Anggota->nama }}
                        </h4>
                        <div class="bg-gradient-to-r from-purple-500 to-purple-800 p-1 rounded-lg w-fit">
                            <p class = "text-white font-medium">
                                Tgl Pinjam : {{ $item->tanggal_pinjam }}
                            </p>
                        </div>
                        <span class = "badge bg-white border-none badge-md uppercase font-bold">
                            {{ $item->status }}
                        </span>
                    </div>
                </div>
            @endforeach
        @endforeach

    </div>
    @vite('resources/js/peminjaman.js')
@endsection
