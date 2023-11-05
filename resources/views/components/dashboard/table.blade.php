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
            <div class="absolute right-4">

                <div class="join">
                    @if ($anggota->previousPageUrl())
                        <a href="{{ $anggota->previousPageUrl() }}">
                            <button class="join-item btn">«</button>
                        </a>
                    @else
                        <button class="join-item btn" disabled="disabled ">«</button>
                    @endif

                    <button class="join-item btn">{{ $anggota->currentPage() }}</button>

                    @if ($anggota->nextPageUrl())
                        <a href="{{ $anggota->nextPageUrl() }}">
                            <button class="join-item btn">»</button>
                        </a>
                    @else
                        <button class="join-item btn" disabled>»</button>
                    @endif
                </div>
            </div>
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
                    @if ($item->foto)
                        <img src="{{ '../storage/anggota/' . $item->foto }}"
                            class="w-8 h-8 absolute top-2/4 -translate-y-2/4 left-2 rounded-full cursor-pointer object-cover object-center"
                            alt="" onclick="my_modal_5{{ $item->id }}.showModal()">
                    @else
                        <div class="absolute w-8 h-8 left-2 top-2/4 -translate-y-2/4  overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 cursor-pointer"
                            onclick="my_modal_5{{ $item->id }}.showModal()">
                            <svg class=" w-8 h-8 text-gray-400 " fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    @endif
                    <span></span>

                    <h4 class="text-xs text-neutral-700">{{ $item->nama }}</h4>
                    <h4 class="text-xs text-neutral-700">{{ $item->jenis_kelamin }}</h4>
                    <h4 class="text-xs text-neutral-700">{{ $item->tempat_lahir }}</h4>
                    <h4 class="text-xs text-neutral-700 ms-2">{{ $item->tanggal_lahir }}</h4>
                    <div class="dropdown dropdown-top dropdown-end absolute right-4">
                        <label tabindex="0" class="btn ms-4 btn-sm rounded-full w-8 h-8">></label>
                        <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                            <li onclick="update{{ $item->id }}.showModal()"><a>Update</a></li>
                            <x-dashboard.updateAnggota :anggota="$item" />
                            <li><button type="button" data-modal-target="delete_modal{{ $item->id }}"
                                    data-modal-toggle="delete_modal{{ $item->id }}">Delete</button></li>
                        </ul>
                    </div>
                    <div id="delete_modal{{ $item->id }}" tabindex="-1"
                        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="delete_modal{{ $item->id }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                                        you
                                        sure you want
                                        to delete this anggota?</h3>
                                    <form action="{{ route('anggota.destroy', $item->id) }}" class="inline-block"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button data-modal-hide="popup-modal" type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            Yes, I'm sure
                                        </button>
                                    </form>
                                    <button data-modal-hide="delete_modal{{ $item->id }}" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                        cancel</button>
                                </div>
                            </div>
                        </div>
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
            <div class="absolute right-4">

                <div class="join">
                    @if ($books->previousPageUrl())
                        <a href="{{ $books->previousPageUrl() }}">
                            <button class="join-item btn">«</button>
                        </a>
                    @else
                        <button class="join-item btn" disabled="disabled ">«</button>
                    @endif

                    <button class="join-item btn">{{ $books->currentPage() }}</button>

                    @if ($books->nextPageUrl())
                        <a href="{{ $books->nextPageUrl() }}">
                            <button class="join-item btn">»</button>
                        </a>
                    @else
                        <button class="join-item btn" disabled>»</button>
                    @endif
                </div>
            </div>

        </div>
        <div class="grid grid-cols-5 justify-items-center content-center mt-3">
            <span></span>
            <h4 class="text-xs text-neutral-700">Judul</h4>
            <h4 class="text-xs text-neutral-700">Kategori</h4>
            <h4 class="text-xs text-neutral-700">Stok</h4>
            <h4 class="text-xs text-neutral-700">Action</h4>

        </div>
        @foreach ($books as $item)
            <div class="w-full p-1 shadow-xl bg-zinc-200 rounded-xl relative my-3">

                <div class="grid grid-cols-5 content-center h-10 justify-items-center">
                    <h4 class="text-xs text-neutral-700 absolute left-4 top-2/4 -translate-y-2/4">
                        {{ $item->kode_buku }}</h4>
                    <span></span>
                    <h4 class="text-xs text-neutral-700">{{ Str::limit($item->judul, 10) }}</h4>
                    <h4 class="text-xs text-neutral-700">{{ $item->kategory->nama_kategory }}</h4>
                    <h4 class="text-xs text-neutral-700">{{ $item->jumlah_stok }}</h4>
                    <div class="dropdown dropdown-top dropdown-end absolute right-4">
                        <label tabindex="0" class="btn m-1 btn-sm rounded-full">></label>
                        <ul tabindex="0" class="dropdown-content z-50 menu p-2 shadow bg-base-100 rounded-box w-52">
                            <li onclick="update_buku{{ $item->id }}.showModal()"><a>Update</a></li>
                            <x-dashboard.updateBuku :buku="$item" :kategories="$kategories" />
                            <li><button type="button" data-modal-target="delete_buku{{ $item->id }}"
                                    data-modal-toggle="delete_buku{{ $item->id }}">Delete</button></li>
                            <li onclick="detail_buku{{ $item->id }}.showModal()"><a>Detail</a></li>
                        </ul>
                    </div>
                    <div id="delete_buku{{ $item->id }}" tabindex="-1"
                        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="delete_buku{{ $item->id }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                        Are you sure you want to delete this buku?</h3>
                                    <form action="{{ route('buku.destroy', $item->id) }}" class="inline-block"
                                        method="post">

                                        <button data-modal-hide="delete_buku{{ $item->id }}" type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            @csrf
                                            @method('delete')
                                            Yes, I'm sure
                                        </button>
                                    </form>
                                    <button data-modal-hide="delete_buku{{ $item->id }}" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                        cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-dashboard.detailBuku :item="$item" />
                </div>
            </div>
        @endforeach
    </div>
@elseif(Request::is('dashboard/peminjaman'))
    <div class="w-full h-auto bg-zinc-300 rounded-2xl px-4 py-4">
        <div class="flex items-center space-x-2">

            <h1 class="text-neutral-700 text-xl font-semibold  tracking-widest">Data Peminjaman</h1>
            <button class="bg-purple-900 p-2 rounded-lg w-10 text-center text-white"
                onclick="add_peminjaman.showModal()">
                <span><i class="fa-solid fa-plus"></i></span>
            </button>
            <x-dashboard.addPeminjaman :anggota="$anggota" :buku="$buku" />
            <a href="/buku-export">

                <button class="bg-green-600 p-2 rounded-lg w-10 text-center text-white">
                    <span><i class="fa-solid fa-file-export"></i></span>
                </button>
            </a>
        </div>
        <div class="grid grid-cols-5 justify-items-center content-center mt-3">
            <span></span>
            <h4 class="text-xs text-neutral-700">Tanggal pinjam</h4>
            <h4 class="text-xs text-neutral-700">Lama pinjam</h4>
            <h4 class="text-xs text-neutral-700">Status</h4>
            <h4 class="text-xs text-neutral-700">Action</h4>

        </div>
        @foreach ($peminjaman as $peminjamans)
            <div class="w-full p-1 shadow-xl bg-zinc-200 rounded-xl relative my-3 ">
                <div class="grid grid-cols-5 content-center h-10 justify-items-center">
                    <img src="{{ '../storage/anggota/' . $peminjamans->Anggota->foto }}"
                        class="w-8 h-8 absolute top-2/4 -translate-y-2/4 left-2 rounded-full cursor-pointer object-cover object-center"
                        alt="">
                    <span></span>
                    <h4 class="text-xs text-neutral-700">{{ $peminjamans->tanggal_pinjam }}</h4>
                    <h4 class="text-xs text-neutral-700">{{ $peminjamans->lama_pinjam }} Hari</h4>
                    <h4 class="text-xs text-neutral-700">{{ $peminjamans->status }}</h4>
                    <div class="dropdown dropdown-top dropdown-end absolute right-[1.1rem] lg:right-[5.2rem]">
                        <label tabindex="0" class="btn m-1 btn-sm rounded-full">></label>
                        <ul tabindex="0"
                            class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                            <li onclick="update_peminjaman{{ $peminjamans->id }}.showModal()"><a>Update</a></li>
                            <x-dashboard.updatePeminjaman :peminjaman="$peminjamans" :anggota="$anggota" :buku="$buku" />
                            <li><button type="button" data-modal-target="delete_peminjaman{{ $peminjamans->id }}"
                                    data-modal-toggle="delete_peminjaman{{ $peminjamans->id }}">Delete</button></li>
                            <li onclick="detail_peminjaman{{ $peminjamans->id }}.showModal()"><a>Detail</a></li>
                        </ul>
                        <x-dashboard.detailPeminjaman :peminjaman="$peminjamans" />
                    </div>
                    <div id="delete_peminjaman{{ $peminjamans->id }}" tabindex="-1"
                        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="delete_peminjaman{{ $peminjamans->id }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                        Are you sure you want to delete this Peminjaman?</h3>
                                    <form action="{{ route('peminjaman.destroy', $peminjamans->id) }}"
                                        class="inline-block" method="post">

                                        <button data-modal-hide="delete_peminjaman{{ $peminjamans->id }}"
                                            type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            @csrf
                                            @method('delete')
                                            Yes, I'm sure
                                        </button>
                                    </form>
                                    <button data-modal-hide="delete_peminjaman{{ $peminjamans->id }}" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                        cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@elseif (Request::is('dashboard/petugas'))
    <div class="w-full h-auto bg-zinc-300 rounded-2xl px-4 py-4">
        <div class="flex items-center space-x-2">
            <h1 class="text-neutral-700 text-xl font-semibold  tracking-widest">Data Petugas</h1>
            <button class="bg-purple-900 p-2 rounded-lg w-10 text-center text-white"
                onclick="add_petugas.showModal()">
                <span><i class="fa-solid fa-plus"></i></span>
            </button>
            <x-dashboard.addPetugas />
            {{-- <x-dashboard.addPeminjaman :anggota="$anggota" :buku="$buku" /> --}}
            <a href="/buku-export">
                <button class="bg-green-600 p-2 rounded-lg w-10 text-center text-white">
                    <span><i class="fa-solid fa-file-export"></i></span>
                </button>
            </a>
        </div>
        <div class="grid grid-cols-5 justify-items-center content-center mt-3">
            <h4 class="text-xs text-neutral-700">Name</h4>
            <h4 class="text-xs text-neutral-700">Username</h4>
            <h4 class="text-xs text-neutral-700">Email</h4>
            <h4 class="text-xs text-neutral-700">Level</h4>
            <h4 class="text-xs text-neutral-700">Action</h4>

        </div>
        @foreach ($petugas as $item)
            <div class="w-full p-1 shadow-xl bg-zinc-200 rounded-xl relative my-3 ">
                <div class="grid grid-cols-5 content-center h-10 justify-items-center">
                    <h4 class="text-xs text-neutral-700 text-center mt-2">{{ $item->name }}</h4>
                    <h4 class="text-xs text-neutral-700 text-center mt-2">{{ $item->username }}</h4>
                    <h4 class="text-xs text-neutral-700 mt-2">{{ $item->email }}</h4>
                    <button class="badge text-center mt-2">{{ $item->level }}</button>
                    <div class="dropdown dropdown-top dropdown-end">
                        <label tabindex="0" class="btn m-1 btn-sm rounded-full">></label>
                        <ul tabindex="0"
                            class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                            <li onclick="update_petugas{{ $item->id }}.showModal()"><a>Update</a></li>
                            <x-dashboard.updatePetugas :item="$item" />
                            <li><button type="button" data-modal-target="delete_petugas{{ $item->id }}"
                                    data-modal-toggle="delete_petugas{{ $item->id }}">Delete</button></li>
                            <li onclick="detail_buku.showModal()"><a>Detail</a></li>
                        </ul>
                    </div>
                    <div id="delete_petugas{{ $item->id }}" tabindex="-1"
                        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="delete_petugas{{ $item->id }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                        Are you sure you want to delete this petugas?</h3>
                                    <form action="{{ route('petugas.destroy', $item->id) }}" class="inline-block"
                                        method="post">

                                        <button data-modal-hide="delete_petugas{{ $item->id }}" type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            @csrf
                                            @method('delete')
                                            Yes, I'm sure
                                        </button>
                                    </form>
                                    <button data-modal-hide="delete_petugas{{ $item->id }}" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                        cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@elseif (Request::is('dashboard/pengembalian'))
    <div class="w-full h-auto bg-zinc-300 rounded-2xl px-4 py-4">
        <div class="flex items-center space-x-2">
            <h1 class="text-neutral-700 text-xl font-semibold  tracking-widest">Data Pengembalian
            </h1>
            <button class="bg-purple-900 p-2 rounded-lg w-10 text-center text-white"
                onclick="add_pengembalian.showModal()">
                <span>
                    <i class="fa-solid fa-repeat lg:text-xl "></i>
                </span>
            </button>
            <x-dashboard.addPengembalian :peminjaman="$peminjaman" />
            <a href="/buku-export">
                <button class="bg-green-600 p-2 rounded-lg w-10 text-center text-white">
                    <span><i class="fa-solid fa-file-export"></i></span>
                </button>
            </a>
        </div>
        <div class="grid grid-cols-3 justify-items-center content-center mt-3">
            <h4 class="text-xs text-neutral-700">Nama</h4>
            <h4 class="text-xs text-neutral-700">Tanggal Kembali</h4>
            <h4 class="text-xs text-neutral-700">Action</h4>
        </div>
        @foreach ($pengembalian as $data)
            <div class="w-full p-1 shadow-xl bg-zinc-200 rounded-xl relative my-3 ">
                <div class="grid grid-cols-3 content-center h-10 justify-items-center">
                    <h4 class="text-xs text-neutral-700 text-center mt-2">{{ $data->Peminjaman->Anggota->nama }}</h4>
                    <h4 class="text-xs text-neutral-700 text-center mt-2">{{ $data->tanggal_kembali }}</h4>
                    <div class="dropdown dropdown-top dropdown-end">
                        <label tabindex="0" class="btn m-1 btn-sm rounded-full">></label>
                        <ul tabindex="0"
                            class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                            <li onclick="update_petugas.showModal()"><a>Update</a></li>
                            <li><button type="button" data-modal-target="delete_petugas"
                                    data-modal-toggle="delete_petugas">Delete</button></li>
                            <li onclick="detail_buku.showModal()"><a>Detail</a></li>
                        </ul>
                    </div>
                    <div id="delete_petugas" tabindex="-1"
                        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="delete_petugas">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                        Are you sure you want to delete this petugas?</h3>
                                    <form action="" class="inline-block" method="post">

                                        <button data-modal-hide="delete_petugas" type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            @csrf
                                            @method('delete')
                                            Yes, I'm sure
                                        </button>
                                    </form>
                                    <button data-modal-hide="delete_petugas" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                        cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
