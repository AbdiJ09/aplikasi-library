<div>
    <header class="w-full fixed top-0 left-0 z-50  bg-transparent transition-all duration-500 ease-in-out"
        id="header-sticky">
        <div class="flex justify-between  items-center py-4 px-4 lg:px-10">
            <a href="/home">
                <button>
                    <span><i class="fa-solid fa-chevron-left text-white transition duration-500 ease-in-out"></i></span>
                </button>
            </a>
            <h1
                class="opacity-0 peminjaman transition duration-500 text-lg ease-in-out lg:text-2xl tracking-wide text-white font-bold">
                Peminjaman
            </h1>
            <span></span>
            <livewire:peminjaman.search-peminjaman wire:model.live='query' />
        </div>
    </header>
    <div
        class="absolute left-0 top-0 w-full h-[12rem] lg:h-[15rem] brightness-90 bg-sticky   bg-[url(../../public/img/pjj1.jpg)] bg-cover bg-no-repeat bg-center  transition duration-300 ease-in-out">
        <h1
            class="absolute left-2/4 text-center  -translate-x-2/4 top-20 text-2xl lg:text-5xl font-bold uppercase tracking-wider transition duration-500 delay-300 ease-in-out p text-white  ">
            Peminjaman</h1>
    </div>
    <div
        class="w-full mx-auto z-[20]  relative  my-40 lg:my-52 md:grid md:grid-cols-2 md:gap-6 lg:grid  lg:grid-cols-3 lg:gap-4 peminjaman-container bg-gradient-to-r from-purple-950 via-black to-purple-950 p-5 lg:p-10 rounded-t-lg overflow-hidden">

        @forelse ($peminjaman as $item)
            @foreach ($item->PeminjamanDetail as $i)
                <div
                    class="w-full bg-black/40 shadow-purple-700 relative  shadow-xl rounded-lg  h-44 flex m-auto items-center px-3 mb-5 mt-3 overflow-hidden py-2">
                    <img class="w-20 rounded-lg border border-purple-500"
                        src="{{ '../storage/buku/' . $i->Buku->gambar }}" class="object-cover object-center" alt />
                    <div class="px-3 space-y-2">
                        <h1 class="font-semibold text-white ">
                            {{ $i->Buku->judul }} </h1>
                        <h4 class="text-purple-600 font-semibold  uppercase decoration-purple-500 text-lg tracking-wide"
                            style="text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5)">
                            {{ $item->Anggota->nama }}
                        </h4>
                        <div class="bg-gradient-to-r from-purple-500 to-purple-800 p-1 rounded-lg w-fit">
                            <p class="text-white font-medium">
                                Tgl Pinjam : {{ $item->tanggal_pinjam }}
                            </p>
                        </div>
                        <span class="badge bg-white text-black border-none badge-md uppercase font-bold">
                            {{ $item->status }}
                        </span>
                    </div>
                </div>
            @endforeach
        @empty
            <h1 class="text-white/80 font-bold text-2xl text-center tracking-wide absolute inset-0 uppercase">Peminjaman
                Tidak Ada</h1>
        @endforelse
    </div>
</div>
