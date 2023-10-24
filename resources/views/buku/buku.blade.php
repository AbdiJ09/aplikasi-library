@extends('layout.main')
@section('content')
    <div class=" mt-[3rem] py-5 ">
        <x-book :buku="$allBooks" />
        <div class="notFound"></div>
    </div>
@endsection
