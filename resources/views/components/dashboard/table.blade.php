@if (Request::is('dashboard/anggota') || Request::is('dashboard'))
    <div class="w-full h-auto bg-zinc-300 rounded-2xl px-4 py-4">
        <div class="flex items-center space-x-2">

            <h1 class="text-neutral-700 text-xl font-semibold  tracking-widest">Data Anggota</h1>
            <button class="bg-purple-900 p-2 rounded-lg w-10 text-center text-white" onclick="my_modal_4.showModal()">
                <span><i class="fa-solid fa-plus"></i></span>
            </button>
            <a href="/anggota-export">

                <button class="bg-green-600 p-2 rounded-lg w-10 text-center text-white">
                    <span><i class="fa-solid fa-file-export"></i></span>
                </button>
            </a>
            <x-dashboard.addAnggota />
        </div>
        <div class="grid grid-cols-6 justify-items-center content-center mt-3">
            <span></span>
            <h4 class="text-xs text-neutral-700">Nama</h4>
            <h4 class="text-xs text-neutral-700">kelamin</h4>
            <h4 class="text-xs text-neutral-700">lahir</h4>
            <h4 class="text-xs text-neutral-700">Ttl</h4>
            <h4 class="text-xs text-neutral-700">Action</h4>

        </div>
        @foreach ($anggota as $item)
            <div class="w-full p-1 shadow-xl bg-zinc-200 rounded-xl relative my-3 ">

                <div class="grid grid-cols-6 content-center h-10 justify-items-center ">
                    <img src="{{ '../storage/anggota/' . $item->foto }}"
                        class="w-8 h-8 absolute top-2/4 -translate-y-2/4 left-2 rounded-full cursor-pointer object-cover object-center"
                        alt="" onclick="my_modal_5{{ $item->id }}.showModal()">
                    <span></span>
                    <h4 class="text-xs text-neutral-700">{{ $item->nama }}</h4>
                    <h4 class="text-xs text-neutral-700">{{ $item->jenis_kelamin }}</h4>
                    <h4 class="text-xs text-neutral-700">{{ $item->tempat_lahir }}</h4>
                    <h4 class="text-xs text-neutral-700">{{ $item->tanggal_lahir }}</h4>
                    <div class="flex space-x-2">
                        <button onclick="update{{ $item->id }}.showModal()"><i
                                class="fa-solid fa-pen-to-square text-primary"></i></button>
                        <x-dashboard.updateAnggota :anggota="$item" />

                        <form action="{{ route('anggota.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button><i class="fa-solid fa-trash text-error"></i></button>
                        </form>
                    </div>
                    <x-dashboard.detailAnggota :item="$item" />
                </div>
            </div>
        @endforeach
    </div>
    </div>
@elseif (Request::is('dashboard/buku'))
    <div class="w-full h-auto bg-zinc-300 rounded-2xl px-4 py-4">
        <div class="flex items-center space-x-2">

            <h1 class="text-neutral-700 text-xl font-semibold  tracking-widest">Data Buku</h1>
            <button class="bg-purple-900 p-2 rounded-lg w-10 text-center text-white" onclick="my_modal_5.showModal()">
                <span><i class="fa-solid fa-plus"></i></span>
            </button>
            <a href="/buku-export">

                <button class="bg-green-600 p-2 rounded-lg w-10 text-center text-white">
                    <span><i class="fa-solid fa-file-export"></i></span>
                </button>
            </a>
        </div>
        <div class="grid grid-cols-5 justify-items-center content-center mt-3">
            <span></span>
            <h4 class="text-xs text-neutral-700">Judul</h4>
            <h4 class="text-xs text-neutral-700">Kategori</h4>
            <h4 class="text-xs text-neutral-700">Stok</h4>
            <h4 class="text-xs text-neutral-700">Detail</h4>

        </div>
        @foreach ($books as $item)
            <div class="w-full p-1 shadow-xl bg-zinc-200 rounded-xl relative my-3 overflow-hidden">

                <div class="grid grid-cols-5 content-center h-10 justify-items-center">
                    <h4 class="text-xs text-neutral-700 absolute left-4 top-2/4 -translate-y-2/4">
                        {{ $item->kode_buku }}</h4>
                    <span></span>
                    <h4 class="text-xs text-neutral-700">{{ $item->judul }}</h4>
                    <h4 class="text-xs text-neutral-700">{{ $item->kategory->nama_kategory }}</h4>
                    <h4 class="text-xs text-neutral-700">{{ $item->jumlah_stok }}</h4>
                    <button
                        class="text-base bg-purple-700  absolute right-4 lg:right-[5.5rem] top-2/4 -translate-y-2/4 rounded-full w-5 h-5 text-center text-white"
                        onclick="detail_buku{{ $item->id }}.showModal()">
                        >
                    </button>
                    <x-dashboard.detailBuku :item="$item" />
                </div>
            </div>
        @endforeach
    </div>
@endif
