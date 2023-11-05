@extends('dashboard.layout.main')
@section('content')
    <div class="relative w-full">
        <div class="py-5  px-5">
            <x-notif />
            <h1 class="text-white my-4"><i class="fa-solid fa-table-columns"></i> Page /
                {{ Request::is('dashboard') ? 'Dashboard' : '' }}</h1>
            <x-notif />
            <x-dashboard.hero :anggota="$anggota" />
        </div>
        <x-dashboard.table :anggota="$anggota" />
    </div>
@endsection
