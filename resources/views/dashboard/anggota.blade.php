@extends('dashboard.layout.main')
@section('content')
    <div class="relative w-full ">
        <div class="py-5  px-5">
            <x-notif />
            @if ($errors->any())
                <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Danger</span>
                    <div>
                        <span class="font-medium">Error Requirements</span>
                        <ul class="mt-1.5 ml-4 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <h1 class="text-white my-4"><i class="fa-solid fa-table-columns"></i> Page /
                {{ Request::is('dashboard/anggota') ? 'Anggota' : '' }}</h1>
            <form action="{{ Request::is('dashboard') ? route('dashboard') : route('anggota.index') }}">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
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
                            @php
                                $countAnggota = $anggota->count();
                            @endphp
                            <h3 class="lg:text-xl text-neutral-700">{{ $countAnggota }}</h3>
                        </div>
                    </div>

                </div>
                <div class="relative ">
                    <div class=" h-auto p-4  bg-zinc-300 rounded-xl">
                        <h3 class="text-center tracking-wide text-neutral-700  text-[10px] lg:text-xl ">
                            Pria</h3>
                        <div class="flex justify-center items-center space-x-2 lg:space-x-4">
                            <i class="fa-solid fa-user lg:text-xl text-neutral-700"></i>
                            <span class="font-bold text-neutral-700">|</span>
                            @php
                                $priaAnggota = $anggota->groupBy('jenis_kelamin')->get('pria', collect());
                                $wanitaAnggota = $anggota->groupBy('jenis_kelamin')->get('wanita', collect());
                            @endphp
                            <h3 class="lg:text-xl text-neutral-700">
                                {{ $priaAnggota ? $priaAnggota->count() : 0 }}
                            </h3>
                        </div>
                    </div>

                </div>
                <div class="relative">
                    <div class=" h-auto p-4 bg-zinc-300 rounded-xl">
                        <h3 class="text-center tracking-wide text-neutral-700  text-[10px] lg:text-xl">
                            Wanita</h3>
                        <div class="flex justify-center items-center space-x-2 lg:space-x-4">
                            <i class="fa-solid fa-file-arrow-down lg:text-xl text-neutral-700"></i>
                            <span class="font-bold text-neutral-700">|</span>
                            <h3 class="lg:text-xl text-neutral-700">
                                {{ $wanitaAnggota ? $wanitaAnggota->count() : 0 }}
                            </h3>
                        </div>
                    </div>

                </div>


            </div>
            <x-dashboard.table :anggota="$anggota" />
        </div>
    </div>
@endsection
