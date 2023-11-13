@extends('layout.main')
@section('detailBuku')
    <header class="w-full fixed top-0 left-0 z-50  bg-transparent transition-all duration-500 ease-in-out" id="header-sticky">
        <div class="flex justify-between  items-center py-4 px-4 lg:px-10">
            <a href="{{ route('home') }}">
                <button><span><i
                            class="fa-solid fa-chevron-left text-white transition duration-500 ease-in-out"></i></span></button>
            </a>
            <h1
                class="opacity-0 peminjaman transition duration-500 text-lg ease-in-out  lg:text-4xl tracking-wide text-white font-bold">
                Pengembalian
            </h1>
            <span></span>
            <div class="absolute right-5">
                <div class="input-container">
                    <input type="hidden" name="anggota" value="{{ request('anggota') }}" id="anggota">
                    <input placeholder="Search something..." class="input pengembalianSearch" name="search" type="text">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon">
                        <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                        <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                        <g id="SVGRepo_iconCarrier">
                            <rect fill="white"></rect>
                            <path
                                d="M7.25007 2.38782C8.54878 2.0992 10.1243 2 12 2C13.8757 2 15.4512 2.0992 16.7499 2.38782C18.06 2.67897 19.1488 3.176 19.9864 4.01358C20.824 4.85116 21.321 5.94002 21.6122 7.25007C21.9008 8.54878 22 10.1243 22 12C22 13.8757 21.9008 15.4512 21.6122 16.7499C21.321 18.06 20.824 19.1488 19.9864 19.9864C19.1488 20.824 18.06 21.321 16.7499 21.6122C15.4512 21.9008 13.8757 22 12 22C10.1243 22 8.54878 21.9008 7.25007 21.6122C5.94002 21.321 4.85116 20.824 4.01358 19.9864C3.176 19.1488 2.67897 18.06 2.38782 16.7499C2.0992 15.4512 2 13.8757 2 12C2 10.1243 2.0992 8.54878 2.38782 7.25007C2.67897 5.94002 3.176 4.85116 4.01358 4.01358C4.85116 3.176 5.94002 2.67897 7.25007 2.38782ZM9 11.5C9 10.1193 10.1193 9 11.5 9C12.8807 9 14 10.1193 14 11.5C14 12.8807 12.8807 14 11.5 14C10.1193 14 9 12.8807 9 11.5ZM11.5 7C9.01472 7 7 9.01472 7 11.5C7 13.9853 9.01472 16 11.5 16C12.3805 16 13.202 15.7471 13.8957 15.31L15.2929 16.7071C15.6834 17.0976 16.3166 17.0976 16.7071 16.7071C17.0976 16.3166 17.0976 15.6834 16.7071 15.2929L15.31 13.8957C15.7471 13.202 16 12.3805 16 11.5C16 9.01472 13.9853 7 11.5 7Z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </g>
                    </svg>

                </div>
            </div>

        </div>
    </header>
    <div
        class="absolute left-0 top-0 w-full h-[12rem] lg:h-[15rem] brightness-90 bg-sticky  bg-[url(../../public/img/pjj.jpg)] bg-cover bg-no-repeat bg-center transition duration-300 ease-in-out">
        <h1
            class="p absolute top-16 left-2/4 text-2xl md:text-3xl transition duration-500 delay-300 ease-in-out -translate-x-2/4 lg:text-4xl tracking-wide text-white font-bold text-center uppercase">
            Pengembalian
        </h1>
    </div>
    <div
        class ="w-full mx-auto z-[20]  relative  my-40 lg:my-52 md:grid md:grid-cols-2 md:gap-6 lg:grid lg:grid-cols-3 lg:gap-6 pengembalianContainer bg-gradient-to-r from-purple-950 via-black to-purple-950 py-5 px-1 lg:p-8 rounded-xl ">
        @foreach ($pengembalian as $item)
            <div
                class="w-full bg-black/40 shadow-purple-700 relative  shadow-lg rounded-lg py-7 items-center px-3 mb-5 space-y-2 overflow-hidden mx-auto">
                <div class="flex justify-between items-center space-x-3">
                    <div class="flex flex-col justify-center items-center space-y-2">
                        <img src="../storage/anggota/{{ $item->Peminjaman->Anggota->foto }}"
                            class="w-14 h-14 md:w-20 md:h-20 lg:w-20 lg:h-20 object-cover rounded-full" alt="">
                        @if ($item->telat)
                            <span
                                class=" text-white uppercase text-[8px] md:text-sm bg-error px-1 lg:text-xs rounded-xl">{{ $item->Peminjaman->status }}</span>
                        @else
                            <span
                                class=" text-black uppercase text-[8px] md:text-sm lg:text-xs bg-success px-1 rounded-xl">{{ $item->Peminjaman->status }}</span>
                        @endif
                    </div>
                    <div class="w-full">
                        <h5 class="font-semibold leading-6 text-lg md:text-2xl lg:text-2xl text-gray-300 -mt-3 ">
                            {{ $item->Peminjaman->Anggota->nama }}
                        </h5>
                        <div class="flex space-x-3 mt-2">

                            <div class="text-sm md:text-lg lg:text-lg text-gray-400">
                                <p class="text-xs md:text-sm lg:text-base">Tgl Peminjaman</p>
                                <p class="text-[12px] md:text-sm lg:text-sm font-semibold text-gray-300">
                                    {{ $item->Peminjaman->tanggal_pinjam }}
                                </p>
                            </div>
                            <div class="text-sm md:text-lg lg:text-lg text-gray-400">
                                <p class="text-xs md:text-sm lg:text-base">Tgl Pengembalian</p>
                                <p class="text-[12px] md:text-sm lg:text-sm font-semibold text-gray-300">
                                    {{ $item->tanggal_kembali }}
                                </p>
                            </div>
                        </div>
                        <div class="mt-2">
                            <h6 class="text-gray-300 text-xs md:text-base lg:text-base">keterangan</h6>
                            <div class="bg-transparent border rounded-lg border-gray-700 p-1 text-gray-400 w-5/6">
                                @if ($item->telat)
                                    <p class="text-xs md:text-sm lg:text-sm">Telat mengembalikan Buku</p>
                                @else
                                    <p class="text-xs md:text-sm lg:text-sm">Tepat Mengembalikan Buku+</p>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div
                        class="absolute -right-6 -top-[4.4rem] bg-white shadow-md shadow-purple-600 rounded-full h-28 w-28 lg:w-28 lg:h-28 overflow-hidden">
                        <p class="text-black text-[8px] lg:text-[10px] mt-[4.5rem]   ms-5 font-bold flex flex-col">
                            Peminjaman<span
                                class="text-lg lg:text-2xl ms-4 -mt-1">{{ $item->Peminjaman->lama_pinjam }}H</span></p>
                    </div>
                </div>
            </div>
        @endforeach
        <script type="module">
            $(document).ready(function() {
                $(".pengembalianSearch").on("input", function() {
                    const request = $('.pengembalianSearch').attr("name")
                    const anggota = $('#anggota').val().trim();
                    const query = $(this).val();
                    let url = ''
                    if (anggota === '') {
                        url = "/pengembalian?" + request + "=" + encodeURIComponent(query);
                    } else {
                        url =
                            `/pengembalian?anggota=${anggota}&${request}=${encodeURIComponent(query)}`;

                    }
                    history.replaceState(null, null, url);
                    $.ajax({
                        type: "get",
                        url: url,
                        data: {
                            query: query,
                        },
                        dataType: "json",
                        success: function(data) {
                            let pengembalian = data.pengembalian;
                            let pengembalianContainer = $(".pengembalianContainer");
                            pengembalianContainer.empty()
                            if (pengembalian.length === 0) {
                                pengembalianContainer.append(
                                    `  <div class="flex justify-center items-center flex-col  w-full lg:w-full  lg:ms-2/4  space-y-2 ">
                            <span class="text-5xl">😥</span>
                            <h1 class="text-white font-bold tracking-wider text-3xl text-center lg:text-5xl">Peminjaman Tidak Ditemukan</h1>
                            <p class="text-center text-gray-200 font-medium">Kami tidak menemukan peminjaman yang sesuai dengan kata kunci
                                yang anda
                                cari...</p>
                            <button
                                class="bg-white rounded-xl p-2 font-bold border-none active:scale-75 transition duration-300 ease-in-out" id="hapusPencarianBtn"
                                style="box-shadow: 0 4px 0 5px black">Hapus
                                Pencarian</button>
                        </div>`
                                )
                                $("#hapusPencarianBtn").on("click", function() {
                                    const url = new URL(window.location.href);
                                    url.searchParams.delete("search");

                                    // Memuat ulang halaman dengan URL yang sudah diubah
                                    window.location.href = url.toString();
                                });
                            } else {

                                $.each(pengembalian, function(key, value) {
                                    pengembalianContainer.append(
                                        ` <div
                class="w-full bg-black/40 shadow-purple-700 relative  shadow-lg rounded-lg py-7 items-center px-3 mb-5 space-y-2 overflow-hidden mx-auto">
                <div class="flex justify-between items-center space-x-3">
                    <div class="flex flex-col justify-center items-center space-y-2">
                        <img src="../storage/anggota/${value.peminjaman.anggota.foto}"
                            class="w-14 h-14 lg:w-20 lg:h-20 object-cover rounded-full" alt="">
                            ${value.telat ? `<span class=" text-white uppercase text-[8px] bg-error px-1 lg:text-xs rounded-xl">${value.peminjaman.status}</span>` : ` <span class=" text-black uppercase text-[8px] lg:text-xs bg-success px-1 rounded-xl">${value.peminjaman.status}</span>`}
                    </div>
                    <div class="w-full">
                        <h5 class="font-semibold leading-6 text-lg lg:text-2xl text-gray-300 -mt-3 ">
                            ${value.peminjaman.anggota.nama}
                        </h5>
                        <div class="flex space-x-3 mt-2">

                            <div class="text-sm lg:text-lg text-gray-400">
                                <p class="text-xs lg:text-base">Tgl Peminjaman</p>
                                <p class="text-[12px] lg:text-sm font-semibold text-gray-300">
                                    ${value.peminjaman.tanggal_pinjam}
                                </p>
                            </div>
                            <div class="text-sm lg:text-lg text-gray-400">
                                <p class="text-xs lg:text-base">Tgl Pengembalian</p>
                                <p class="text-[12px] lg:text-sm font-semibold text-gray-300">${value.tanggal_kembali}
                                </p>
                            </div>
                        </div>
                        <div class="mt-2">
                            <h6 class="text-gray-300 text-xs lg:text-base">keterangan</h6>
                            <div class="bg-transparent border rounded-lg border-gray-700 p-1 text-gray-400 w-5/6">
                                ${value.telat ? `<p class="text-xs lg:text-sm">Telat mengembalikan Buku</p>` : `<p class="text-xs lg:text-sm">Tepat Mengembalikan Buku</p>`}
                            </div>
                        </div>

                    </div>
                    <div
                        class="absolute -right-6 -top-[4.4rem] bg-white shadow-md shadow-purple-600 rounded-full h-28 w-28 lg:w-36 lg:h-36 overflow-hidden">
                        <p class="text-black text-[8px] lg:text-xs mt-[4.5rem]   ms-7 font-bold flex flex-col">
                            Peminjaman<span
                                class="text-lg lg:text-3xl ms-2 -mt-1">${value.peminjaman.lama_pinjam}H</span></p>
                    </div>
                </div>
            </div>`
                                    )
                                })

                            }
                        },
                    });
                });
            });
        </script>
    @endsection
