<div>
    <header class="w-full fixed top-0 left-0 z-50  bg-transparent transition-all duration-500 ease-in-out"
        id="header-sticky">
        <div class="flex justify-between  items-center py-4 px-4 lg:px-10">
            <a href="/home">
                <button>
                    <span><i class="fa-solid fa-chevron-left text-black transition duration-500 ease-in-out"></i></span>
                </button>
            </a>
            <h1
                class="opacity-0 peminjaman transition duration-500 text-lg ease-in-out lg:text-2xl tracking-wide text-black font-bold">
                Peminjaman
            </h1>
            <span></span>
            <livewire:peminjaman.search-peminjaman wire:model.live='query' />
        </div>
    </header>
    <div
        class="absolute left-0 top-0 w-full h-[12rem] lg:h-[15rem] bg-sticky bg-white  transition duration-300 ease-in-out">
        <div class="w-36 h-36 md:w-40 md:h-40 bg-white absolute -top-12 -left-12"
            style="clip-path: circle(45.7% at 49% 50%);">
        </div>
        <div class="w-44 h-44 bg-white absolute
            top-14 md:top-20 left-0"
            style="clip-path: circle(14.7% at 0 21%);">
        </div>
        <div class="w-96 h-96 bg-white absolute bottom-6 right-0" style="clip-path: circle(16.4% at 93% 100%);">
        </div>
        <h1
            class="absolute left-2/4 text-center  -translate-x-2/4 top-20 text-2xl lg:text-5xl font-bold uppercase tracking-wider transition duration-500 delay-300 ease-in-out p text-white  ">
            Peminjaman</h1>
    </div>
    <div
        class="w-full mx-auto z-[20]  relative  my-40 {{ $peminjaman->count() < 1 ? 'h-32' : '' }} lg:my-52 md:grid md:grid-cols-2 md:gap-6 lg:grid  lg:grid-cols-3 lg:gap-4 peminjaman-container bg-slate-200 p-5 lg:p-10 rounded-t-lg overflow-hidden">

        @forelse ($peminjaman as $item)
            @foreach ($item->PeminjamanDetail as $i)
                <div
                    class="w-full bg-slate-100  relative  shadow-xl rounded-lg  h-44 flex m-auto items-center px-3 mb-5 mt-3 overflow-hidden pt-2">
                    <div class="w-52 h-52 bg-purple-500 absolute left-0 bottom-0"
                        style="clip-path: circle(54.6% at 5% 100%)"></div>
                    <div class="w-52 h-52 bg-purple-500 absolute -right-3 -top-3"
                        style="clip-path: circle(48.0% at 100% 0);"></div>
                    <img class="w-24 rounded-lg border z-50 border-purple-500"
                        src="{{ '../storage/buku/' . $i->Buku->gambar }}" class="object-cover object-center" alt />
                    <div class="px-3 w-full">
                        <div class="-mt-14">
                            <h1 class="font-bold text-black w-[80%]">
                                {{ $i->Buku->judul }} </h1>
                            <h4
                                class="text-gray-800 capitalize font-medium decoration-purple-500 text-lg tracking-wide">
                                {{ $item->Anggota->nama }}
                            </h4>
                        </div>
                        <div class="flex items-center justify-between absolute bottom-2 right-2 gap-2 md:gap-10">
                            <div class="w-fit">
                                <p class="text-black font-medium text-xs md:text-sm">
                                    Pinjam : {{ $item->tanggal_pinjam }}
                                </p>
                            </div>
                            <span
                                class=" bg-purple-500 text-black text-xs md:text-sm border-none py-1 px-2 md:px-3 rounded-lg uppercase font-bold ">
                                {{ $item->status }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        @empty
            <h1 class="text-black/80 font-bold text-2xl text-center tracking-wide absolute inset-0 mt-3 uppercase">
                Peminjaman
                Tidak Ada</h1>
        @endforelse
    </div>
</div>
