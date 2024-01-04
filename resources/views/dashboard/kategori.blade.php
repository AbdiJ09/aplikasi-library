@extends('dashboard.layout.main')
@section('content')
    <div class="relative w-full">
        <div class="py-10">
            <h1 class="text-white my-4"><i class="fa-solid fa-table-columns"></i> Page
                /
                {{ Request::is('dashboard/kategori') ? 'Kategori' : '' }}</h1>
            <livewire:kategori>
        </div>
    </div>
@endsection
