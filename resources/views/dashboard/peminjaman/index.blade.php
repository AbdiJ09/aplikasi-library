@extends('dashboard.layout.main')

@section('content')
    <div class="relative w-full">
        <div class="py-10">
            <x-notif bottom />

            <h1 class="text-white mb-10"><i class="fa-solid fa-table-columns"></i> Page /
                {{ Request::is('dashboard/peminjaman') ? 'Peminjaman' : '' }}</h1>
            <x-dashboard.table :peminjaman="$matchingPeminjaman" :anggota="$anggota" :buku="$buku" />
        </div>
    </div>
@endsection
