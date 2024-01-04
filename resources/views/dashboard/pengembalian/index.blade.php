@extends('dashboard.layout.main')

@section('content')
    <div class="relative w-full">
        <div class="py-10">
            <x-notif bottom />
            <h1 class="text-white mb-10"><i class="fa-solid fa-table-columns"></i> Page /
                {{ Request::is('dashboard/pengembalian') ? 'Pengembalian' : '' }}</h1>

            <div class="grid grid-cols-2 gap-3 my-4">
                <div class="relative">
                    <div class=" h-auto p-4 bg-zinc-300 rounded-xl">
                        <h3 class="text-center tracking-wide text-neutral-700 mb-1 text-xs lg:text-xl">
                            Belum Dikembalikan</h3>
                        <div class="flex justify-center items-center space-x-3 lg:space-x-6">
                            <div class="relative">
                                <div
                                    class="bg-neutral-700 w-[2px] h-6 lg:h-8 absolute -rotate-45 -top-[1px] lg:-top-[7px] left-[7px] lg:left-[10px]">
                                </div>
                                <i class="fa-solid fa-repeat lg:text-xl text-neutral-700"></i>
                            </div>
                            <div class="bg-neutral-700 w-[2px] h-6"></div>
                            <h3 class="lg:text-xl text-neutral-700">{{ $result->count() }}</h3>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class=" h-auto p-4 bg-zinc-300 rounded-xl">
                        <h3 class="text-center tracking-wide text-neutral-700 mb-1 text-xs lg:text-xl">
                            Dikembalikan</h3>
                        <div class="flex justify-center items-center space-x-2 lg:space-x-6">
                            <i class="fa-solid fa-repeat lg:text-xl text-neutral-700"></i>
                            <div class="bg-neutral-700 w-[2px] h-6"></div>
                            <h3 class="lg:text-xl text-neutral-700">{{ $pengembalian->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-dashboard.table :pengembalian="$pengembalian" :peminjaman="$peminjaman" />
    </div>
@endsection
