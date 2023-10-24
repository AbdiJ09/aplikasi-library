@extends('dashboard.layout.main')
@section('content')
    <div class="relative w-full ">
        <div class="py-5  px-5  flex justify-center items-center h-screen">
            <x-dashboard.table :anggota="$anggota" />
        </div>
    </div>
@endsection
