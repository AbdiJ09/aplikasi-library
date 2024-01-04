@extends('layouts.mainDetail')
@section('content')
    @php
        $nama = $petugas->name;
        $nama_depan = strtok($nama, ' ');
        $nama_belakang = strtok('');
        $inisial = strtoupper(substr($nama_depan, 0, 1) . substr($nama_belakang, 0, 1));
    @endphp
    <section class="relative w-full h-full bg-transparent">
        <div class="w-full">
            <div
                class="w-full relative h-32 lg:h-40 rounded-b-lg overflow-hidden bg-gradient-to-r from-purple-600 to-black/30">
                <div class="">
                    <span class="block absolute -bottom-10 -left-8 bg-white rounded-full w-24 h-24 lg:w-28 lg:h-28"></span>
                    <span
                        class="block absolute -bottom-10 left-14 bg-transparent border-4 border-white rounded-full w-16 h-16 lg:w-20 lg:h-20"></span>
                </div>
                <div class="relative">
                    <span
                        class="block absolute -top-14 -right-12 bg-transparent border-[17px] border-white rounded-full w-32 h-32 lg:w-36 lg:h-36">
                        <span
                            class="block absolute left-2 top-0 bg-transparent border-[10px] border-white rounded-full w-20 h-20 lg:w-24 lg:h-24"></span>
                    </span>
                </div>
            </div>
            <div class="relative flex justify-center flex-col  items-center gap-y-5 px-4">
                <div class="flex flex-col lg:flex-row items-center lg:justify-start lg:ps-32 w-full gap-5">
                    <span
                        class="w-32 -mt-14 h-32 bg-transparent rounded-full text-center text-white text-5xl font-bold flex items-center justify-center"
                        style="box-shadow: inset 5px 2px 10px rgb(5, 5, 5);text-shadow: 0 0 10px rgba(0, 0, 0, 1);">{{ $inisial }}</span>
                    <div class="text-white text-center ">
                        <h1 class="text-lg font-bold lg:text-2xl">{{ $petugas->name }}</h1>
                        <h5 class="text-[#C0C3CE] lg:text-start lg:text-xl">{{ $petugas->level }}</h5>
                    </div>
                </div>
                <div class="flex gap-10 text-white lg:justify-start lg:ps-72 lg:w-full">
                    <div class="">
                        <h2 class="text-sm mb-1 lg:text-xl">Peminjaman</h2>
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="29" viewBox="0 0 35 29"
                                fill="none">
                                <path
                                    d="M34.7413 17.1515L32.1999 16.309L32.2601 16.3718L18.2019 21.4971L4.74418 7.20558L1.44112 6.11042C-0.226658 7.29624 -0.41317 10.6724 0.707104 11.8473L17.3187 29L34.8893 22.6805C33.2889 21.8017 31.9905 19.3007 34.7413 17.1527V17.1515ZM16.3861 21.7799L2.54334 7.36151H2.95728L16.7387 21.4959L16.3849 21.7799H16.3861ZM17.4438 28.4838C17.4438 28.4838 15.5282 26.2355 18.0106 23.245L33.0531 17.7728C33.0531 17.7728 31.3227 20.7573 33.3479 22.5197L17.4438 28.4851V28.4838ZM4.74418 7.20558L4.28452 6.71723L18.3078 1.71527L32.1999 16.309L34.7401 17.1515C34.7281 17.1611 34.716 17.1708 34.704 17.1805L35 17.0741L18.6074 0L1.5061 6.13097L4.74298 7.20437L4.74418 7.20558Z"
                                    fill="white" />
                            </svg>
                            <span class="font-bold text-xl">{{ $petugas->Peminjaman->count() }}</span>
                        </div>
                    </div>
                    <div class="">
                        <h2 class="text-sm mb-1 lg:text-xl">Pengembalian</h2>
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="29" viewBox="0 0 35 29"
                                fill="none">
                                <path
                                    d="M34.7413 17.1515L32.1999 16.309L32.2601 16.3718L18.2019 21.4971L4.74418 7.20558L1.44112 6.11042C-0.226658 7.29624 -0.41317 10.6724 0.707104 11.8473L17.3187 29L34.8893 22.6805C33.2889 21.8017 31.9905 19.3007 34.7413 17.1527V17.1515ZM16.3861 21.7799L2.54334 7.36151H2.95728L16.7387 21.4959L16.3849 21.7799H16.3861ZM17.4438 28.4838C17.4438 28.4838 15.5282 26.2355 18.0106 23.245L33.0531 17.7728C33.0531 17.7728 31.3227 20.7573 33.3479 22.5197L17.4438 28.4851V28.4838ZM4.74418 7.20558L4.28452 6.71723L18.3078 1.71527L32.1999 16.309L34.7401 17.1515C34.7281 17.1611 34.716 17.1708 34.704 17.1805L35 17.0741L18.6074 0L1.5061 6.13097L4.74298 7.20437L4.74418 7.20558Z"
                                    fill="white" />
                            </svg>
                            <span class="font-bold text-xl">0</span>
                        </div>
                    </div>
                </div>
                <div class="relative bg-slate-200 rounded-2xl w-full py-3 px-3 overflow-hidden">
                    <div class="flex gap-3 justify-center items-center my-3">
                        <button class="bg-black rounded-lg text-[#fff] py-1 px-4">Peminjaman</button>
                        <button
                            class="bg-gradient-to-r from-purple-700 to-purple-900 rounded-lg border-0 text-[#FFFFFF] py-1 px-4">Pengembalian</button>
                    </div>
                    @if ($peminjaman->count())
                        <h5 class="font-semibold text-black mt-7 mb-2">Peminjaman</h5>
                    @else
                        <h5 class="font-semibold text-black uppercase text-center text-sm lg:text-2xl mt-7 mb-2">Petugas
                            belum melakukan peminjaman</h5>
                    @endif
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 ">
                        @forelse ($peminjaman as $item)
                            <div class="bg-[#261D25] shadow-lg shadow-[#261D25] rounded-xl w-full overflow-hidden my-2">
                                <div class="flex justify-between items-center">
                                    <h1 class="p-2 font-bold text-white">{{ $item->Anggota->nama }}</h1>
                                    <h1
                                        class="text-gray-200 font-bold me-3 {{ $item->status == 'dikembalikan' ? 'hidden' : '' }}">
                                        {{ $item->PeminjamanDetail->count() }} <span
                                            class="text-gray-300 font-bold">buku</span></h1>
                                </div>
                                <div class="bg-purple-900 rounded-t-lg w-full flex items-center gap-3 p-3">
                                    @if ($item->Anggota->foto)
                                        <img src="/storage/anggota/{{ $item->Anggota->foto }}"
                                            class="w-14 h-14 rounded-full object-cover" alt="">
                                    @else
                                        @php
                                            $nama = $item->Anggota->nama;
                                            $nama_depan = strtok($nama, ' ');
                                            $nama_belakang = strtok('');
                                            $inisial = strtoupper(substr($nama_depan, 0, 1) . substr($nama_belakang, 0, 1));
                                        @endphp
                                        <span
                                            class="inline-flex items-center justify-center w-14 h-14 overflow-hidden bg-gray-100 rounded-full text-black font-bold text-lg">{{ $inisial }}</span>
                                    @endif
                                    <div class="flex flex-col">
                                        <div class="text-white">
                                            <h4>Tanggal pinjam</h4>
                                            <p class="text-gray-200">{{ $item->tanggal_pinjam }}</p>
                                        </div>
                                        <p class="bg-white rounded-full px-2 py-0 text-black font-semibold text-sm">Status :
                                            {{ $item->status }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
