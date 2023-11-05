@extends('layout.main')
@section('profil')
    <!-- component -->
    <main class="profile-page">
        <section class="relative block h-500-px">
            <div class="absolute top-0 w-full h-full bg-center bg-cover"
                style="
            background-image: url('/img/perpus.jpg');
          ">
                <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
            </div>
            <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px"
                style="transform: translateZ(0px)">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                    version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </section>
        <section class="relative py-16 bg-blueGray-200">
            <div class="container mx-auto px-4">
                <div class="relative  min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
                    <div class="px-6">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                                <div class="relative">
                                    <img alt="..." src="/img/logo/logo_tamsis.png"
                                        class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
                                </div>
                            </div>
                            <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                                <div class="py-6 px-3 mt-32 sm:mt-0">
                                    <a href="/home">

                                        <button
                                            class="bg-green-500 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150"
                                            type="button">
                                            Back to perpustakaan
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="w-full lg:w-4/12 px-4 lg:order-1">
                                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                    <div class="mr-4 p-3 text-center">
                                        <span
                                            class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">22</span><span
                                            class="text-sm text-blueGray-400">Petugas</span>
                                    </div>
                                    <div class="mr-4 p-3 text-center">
                                        <span
                                            class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">1</span><span
                                            class="text-sm text-blueGray-400">Admin</span>
                                    </div>
                                    <div class="lg:mr-4 p-3 text-center">
                                        <span
                                            class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">200++</span><span
                                            class="text-sm text-blueGray-400">Buku</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-12">
                            <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 ">
                                Taman Siswa 2 Jakarta
                            </h3>
                            <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                                <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                                Jakarta Pusat Kemayoran
                            </div>

                        </div>
                        <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-9/12 px-4">
                                    <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                                        "Perpustakaan Sekolah Taman Siswa adalah pusat pengetahuan yang membuka pintu ke
                                        dunia beragam cerita, ilmu, dan petualangan bagi para siswa. Dengan koleksi buku
                                        yang kaya dan berbagai sumber belajar, perpustakaan ini menjadi tempat inspirasi dan
                                        pengetahuan, membantu siswa meraih mimpi dan pencapaian mereka di sekolah Taman
                                        Siswa."
                                    </p>
                                    <hr class="my-2 border border-gray-800">
                                    <h1 class="font-bold text-xl uppercase">Petugas</h1>
                                </div>
                                <div class="grid lg:grid-cols-3 grid-cols-1 lg:gap-6">
                                    @foreach ($petugas as $item)
                                        <div class=" w-full shadow-xl bg-white rounded-xl py-3 px-0 overflow-hidden my-3">
                                            <div class="flex justify-between space-x-5 items-center">
                                                <div class="flex space-x-3">
                                                    <div
                                                        class="relative w-14 h-14 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                                        <svg class="absolute w-16 h-16 text-gray-400 -left-1"
                                                            fill="currentColor" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="space-y-2">
                                                        <h3 class="text-gray-700 text-start font-bold text-lg">
                                                            {{ $item->name }}
                                                        </h3>
                                                        <button
                                                            class="badge badge-primary font-bold text-white badge-lg">{{ $item->level }}</button>
                                                    </div>
                                                </div>
                                                <span class="text-black text-lg">|</span>
                                                <div class="text-black">
                                                    <div class="text-sm">
                                                        <span
                                                            class="font-bold lg:text-lg">{{ $item->Peminjaman->count() }}</span>
                                                        <h5 class="font-medium lg:text-lg text-gray-600">Peminjaman</h5>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
