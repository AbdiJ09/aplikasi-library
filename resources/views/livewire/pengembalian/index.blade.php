<div>
    <header class="w-full fixed top-0 left-0 z-50  bg-transparent transition-all duration-500 ease-in-out"
        id="header-sticky">
        <div class="flex justify-between  items-center py-4 px-4 lg:px-10">
            <a href="{{ route('home') }}">
                <button><span><i
                            class="fa-solid fa-chevron-left text-white transition duration-500 ease-in-out"></i></span></button>
            </a>
            <h1
                class="opacity-0 peminjaman transition duration-500 text-lg ease-in-out  lg:text-4xl tracking-wide text-white font-bold">
                Pengembalian
            </h1>
            <span></span>
            <livewire:pengembalian.search />
        </div>
    </header>
    <div
        class="absolute left-0 top-0 w-full h-[12rem] lg:h-[15rem] brightness-90 bg-sticky  bg-[url(../../public/img/pjj.jpg)] bg-cover bg-no-repeat bg-center transition duration-300 ease-in-out">
        <h1
            class="p absolute top-16 left-2/4 text-2xl md:text-3xl transition duration-500 delay-300 ease-in-out -translate-x-2/4 lg:text-4xl tracking-wide text-white font-bold text-center uppercase">
            Pengembalian
        </h1>
    </div>
    <div
        class="w-full mx-auto z-[20]  relative  my-40 lg:my-52 md:grid md:grid-cols-2 md:gap-6 lg:grid lg:grid-cols-3 lg:gap-6  bg-gradient-to-r from-purple-950 via-black to-purple-950 py-5 px-1 lg:p-10 rounded-xl ">
        <livewire:pengembalian.fillter-data>
            @forelse ($pengembalian as $item)
                <div
                    class="w-full bg-black/40 shadow-purple-700 relative  shadow-lg rounded-lg py-7 items-center px-3 mb-5 space-y-2 overflow-hidden mx-auto">
                    <div class="flex justify-between items-center space-x-3">
                        <div class="flex flex-col justify-center items-center space-y-2">
                            @if ($item->Peminjaman->Anggota->foto)
                                <img src="../storage/anggota/{{ $item->Peminjaman->Anggota->foto }}"
                                    class="w-14 h-14 md:w-20 md:h-20 lg:w-20 lg:h-20 object-cover rounded-full"
                                    alt="">
                            @else
                                @php
                                    $nama = $item->Peminjaman->Anggota->nama;
                                    $nama_depan = strtok($nama, ' ');
                                    $nama_belakang = strtok('');
                                    $inisial = strtoupper(substr($nama_depan, 0, 1) . substr($nama_belakang, 0, 1));
                                @endphp
                                <div
                                    class="inline-flex items-center justify-center w-14  h-14 md:w-20 md:h-20 lg:w-20 lg:h-20 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                    <span
                                        class="font-medium text-gray-600 dark:text-gray-300 text-4xl">{{ $inisial }}</span>
                                </div>
                            @endif
                            @if ($item->telat)
                                <span
                                    class=" text-white uppercase text-[8px] md:text-sm bg-error px-1 lg:text-xs rounded-xl">{{ $item->Peminjaman->status }}</span>
                            @else
                                <span
                                    class=" text-black font-medium uppercase text-[8px] md:text-sm lg:text-xs bg-success px-1 rounded-xl">{{ $item->Peminjaman->status }}</span>
                            @endif
                        </div>
                        <div class="w-full">
                            <h5 class="font-semibold leading-6 text-lg md:text-2xl lg:text-2xl text-gray-300 -mt-3 ">
                                {{ $item->Peminjaman->Anggota->nama }}
                            </h5>
                            <div class="flex space-x-3 mt-2">

                                <div class="text-sm md:text-lg lg:text-lg text-gray-400">
                                    <p class="text-xs md:text-sm lg:text-base">Tgl Peminjaman</p>
                                    <p class="text-[12px] md:text-sm lg:text-sm font-semibold text-gray-300">
                                        {{ $item->Peminjaman->tanggal_pinjam }}
                                    </p>
                                </div>
                                <div class="text-sm md:text-lg lg:text-lg text-gray-400">
                                    <p class="text-xs md:text-sm lg:text-base">Tgl Pengembalian</p>
                                    <p class="text-[12px] md:text-sm lg:text-sm font-semibold text-gray-300">
                                        {{ $item->tanggal_kembali }}
                                    </p>
                                </div>
                            </div>
                            <div class="mt-2">
                                <h6 class="text-gray-300 text-xs md:text-base lg:text-base">keterangan</h6>
                                <div class="bg-transparent border rounded-lg border-gray-700 p-1 text-gray-400 w-5/6">
                                    @if ($item->telat)
                                        <p class="text-xs md:text-sm lg:text-sm">Telat mengembalikan Buku</p>
                                    @else
                                        <p class="text-xs md:text-sm lg:text-sm">Tepat Mengembalikan Buku+</p>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div
                            class="absolute -right-6 -top-[4.4rem] bg-white shadow-md shadow-purple-600 rounded-full h-28 w-28 lg:w-28 lg:h-28 overflow-hidden">
                            <p class="text-black text-[8px] lg:text-[10px] mt-[4.5rem]   ms-5 font-bold flex flex-col">
                                Peminjaman<span
                                    class="text-lg lg:text-2xl ms-4 -mt-1">{{ $item->Peminjaman->lama_pinjam }}H</span>
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <h1 class="text-center text-white font-bold text-2xl uppercase lg:absolute inset-0 -z-10 lg:mt-4">
                    Pengembalian belum ada</h1>
            @endforelse
    </div>
</div>
