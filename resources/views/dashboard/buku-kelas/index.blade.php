@extends('dashboard.layout.main')
@section('content')
    <div class="relative w-full">
        <div class="py-10">
            <h1 class="text-white my-4"><i class="fa-solid fa-table-columns"></i> Page
                /
                {{ Request::is('dashboard/buku-kelas') ? 'Buku kelas' : '' }}</h1>

            <livewire:buku-kelas>
        </div>
    </div>
@endsection
