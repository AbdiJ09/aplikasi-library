<div>
    <div class="my-3 grid grid-cols-1 lg:grid-cols-3 gap-5 justify-items-center p-4">
        @foreach ($namaKelas as $kelass)
            <x-buku.jurusan :kelass="$kelass" />
        @endforeach
    </div>
    @if ($showSuccessAlert)
        <div id="alert-success"
            class="flex items-center p-4 mb-4 text-green-800 rounded-lg w-2/4 bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
            </div>
            <button type="button" wire:click="$set('showSuccessAlert', false)"
                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
    <div class="w-full h-auto bg-zinc-300 rounded-2xl px-4 py-4">
        <div class="flex items-center space-x-2">
            <h1 class="text-neutral-700 text-xl font-semibold  tracking-widest">Data Buku</h1>
            <button class="bg-purple-900 p-2 rounded-lg w-10 text-center text-white"
                x-on:click="addBukuKelas.showModal()">
                <span><i class="fa-solid fa-plus"></i></span>
            </button>
            <livewire:modal-add-buku-kelas />
            <a href="/buku-export">

                <button class="bg-green-600 p-2 rounded-lg w-10 text-center text-white">
                    <span><i class="fa-solid fa-file-export"></i></span>
                </button>
            </a>
            <form action="{{ route('buku-import') }}" method="post" enctype="multipart/form-data" id="import-buku">
                @csrf
                <input class="import w-10" name="file" type="file" onchange="importBuku()">
                <button class="bg-green-600 p-2 rounded-lg w-10 text-center text-white"><i
                        class="fa-solid fa-file-import"></i></button>
            </form>
        </div>
        <div class="grid grid-cols-5 justify-items-center content-center mt-3">
            <span></span>
            <h4 class="text-xs text-neutral-700">Judul</h4>
            <h4 class="text-xs text-neutral-700">Kelas</h4>
            <h4 class="text-xs text-neutral-700">Jurusan</h4>
            <h4 class="text-xs text-neutral-700">Action</h4>
        </div>
        @foreach ($bookss as $item)
            <x-buku.kelas :item="$item" />
        @endforeach
    </div>
</div>
