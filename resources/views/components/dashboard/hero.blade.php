<div class="py-8 px-2">
    <h1 class="text-white text-base tracking-[0.080rem] font-medium lg:text-xl">Tamansiswa 2 jakarta</h1>
    <div class="text-white text-5xl mt-2 font-bold lg:text-7xl">Hello {{ auth()->user()->name }}</div>

    <form action="{{ Request::is('dashboard') ? route('dashboard') : route('anggota.index') }}">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-800 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="default-search"
                class="block w-2/4 p-1 pl-10 text-sm my-3 text-gray-900 border border-gray-300 rounded-full bg-zinc-300 focus:ring-violet-500 focus:border-violet-500 dark:bg-gray-700 dark:border-gray-600 placeholder-gray-800 dark:text-white dark:focus:ring-violet-500 dark:focus:border-violet-500"
                placeholder="Cari anggota..." name="searchAnggota" value="{{ request('searchAnggota') }}">

        </div>
    </form>
    <div class="grid grid-cols-3 gap-4 lg:gap-3 py-3">
        <div class="relative">
            <div class=" h-auto p-4 bg-zinc-300 rounded-xl">
                <h3 class="text-center tracking-wide text-neutral-700  text-xs lg:text-xl">
                    Anggota</h3>
                <div class="flex justify-center items-center space-x-2 lg:space-x-4">
                    <i class="fa-solid fa-users lg:text-xl text-neutral-700"></i>
                    <span class="font-bold text-neutral-700">|</span>
                    <h3 class="lg:text-xl text-neutral-700">{{ $anggota->total() }}</h3>
                </div>
            </div>

        </div>
        <div class="relative ">
            <div class=" h-auto p-4  bg-zinc-300 rounded-xl">
                <h3 class="text-center tracking-wide text-neutral-700  text-[10px] lg:text-xl ">
                    Peminjaman</h3>
                <div class="flex justify-center items-center space-x-2 lg:space-x-4">
                    <i class="fa-solid fa-list-check lg:text-xl text-neutral-700"></i>
                    <span class="font-bold text-neutral-700">|</span>
                    <h3 class="lg:text-xl text-neutral-700">{{ auth()->user()->Peminjaman->count() }}</h3>
                </div>
            </div>

        </div>
        <div class="relative">
            <div class=" h-auto p-4 bg-zinc-300 rounded-xl">
                <h3 class="text-center tracking-wide text-neutral-700  text-[10px] lg:text-xl">
                    Pengembalian</h3>
                <div class="flex justify-center items-center space-x-2 lg:space-x-4">
                    <i class="fa-solid fa-file-arrow-down lg:text-xl text-neutral-700"></i>
                    <span class="font-bold text-neutral-700">|</span>
                    <h3 class="lg:text-xl text-neutral-700">{{ auth()->user()->Pengembalian->count() }}</h3>
                </div>
            </div>

        </div>


    </div>
</div>
