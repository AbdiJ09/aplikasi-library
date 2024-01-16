@extends('layouts.profile')
@section('content')
    <!-- component -->
    <main class="profile-page">
        <section class="bg-[url('../../public/img/perpus1.jpg')] bg-cover bg-bottom w-full h-96 brightness-75"></section>
        <section class="relative py-16 bg-slate-200">
            <div class="container mx-auto px-4">
                <div class="relative  min-w-0 break-words bg-slate-200 w-full mb-6 shadow-xl rounded-lg -mt-64">
                    <div class="px-6">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                                <div class="relative">
                                    <img alt="..." src="/img/logo/logo_tamsis.png"
                                        class="shadow-xl rounded-full h-auto align-middle border-none max-w-[150px] -mt-10">
                                </div>
                            </div>
                            <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                                <div class="py-6 px-3 sm:mt-0">
                                    <a href="/home" wire:navigate>
                                        <button
                                            class="bg-green-500 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150 m-auto block"
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
                                            class="text-3xl font-bold block uppercase tracking-wide text-gray-600">{{ $petugas->count() }}</span><span
                                            class="text-xl text-gray-600"><a href="#petugas">Petugas</a></span>
                                    </div>
                                    <div class="mr-4 p-3 text-center">
                                        <span
                                            class="text-3xl font-bold block uppercase tracking-wide text-gray-600">{{ $admin }}</span><span
                                            class="text-xl text-gray-600">Admin</span>
                                    </div>
                                    <div class="lg:mr-4 p-3 text-center">
                                        <span
                                            class="text-3xl font-bold block uppercase tracking-wide text-gray-600">{{ $buku }}</span><span
                                            class="text-xl text-gray-600">Buku</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-12">
                            <h3 class="text-4xl font-bold  mb-2 text-gray-700 ">
                                Taman Siswa 2 Jakarta
                            </h3>
                            <div
                                class="text-sm leading-normal mt-0 mb-2 text-gray-400 font-medium uppercase lg:w-2/4 m-auto">
                                <i class="fas fa-map-marker-alt mr-2 text-lg text-gray-400"></i>
                                <a href="https://maps.app.goo.gl/p5VkRNuSLGftung67">SMK Tamansiswa 2
                                    SMK Tamansiswa 2 Jakarta, Jl. Garuda No.44, RT.1/RW.5, Kemayoran, Kec. Kemayoran, Kota
                                    Jakarta Pusat, Daerah Khusus
                                    Ibukota Jakarta 10610</a>
                            </div>
                        </div>
                        <div class="mt-4 py-5 text-center">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-9/12">
                                    <p class="mb-4 text-lg leading-relaxed text-gray-700">
                                        "Perpustakaan Sekolah Taman Siswa adalah pusat pengetahuan yang membuka pintu ke
                                        dunia beragam cerita, ilmu, dan petualangan bagi para siswa. Dengan koleksi buku
                                        yang kaya dan berbagai sumber belajar, perpustakaan ini menjadi tempat inspirasi dan
                                        pengetahuan, membantu siswa meraih mimpi dan pencapaian mereka di sekolah Taman
                                        Siswa."
                                    </p>
                                    <hr class="border-gray-200 mb-3">
                                    <h1 class="font-bold text-xl uppercase">Petugas</h1>
                                </div>
                                <div class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-2 gap-8">
                                    @foreach ($petugas as $item)
                                        <a href="/petugas/{{ $item->username }}" wire:navigate>
                                            <div
                                                class=" w-[190px] h-[254px]  bg-gray-300 shadow-xl rounded-xl hover:shadow-lg hover:shadow-gray-400 transition duration-300 ease-in-out py-3 px-2 overflow-hidden my-3">
                                                <div class="flex flex-col gap-y-4 justify-center items-center">
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
                                                        <h3 class="text-gray-700 font-bold text-lg">
                                                            {{ $item->name }}
                                                        </h3>
                                                        <p class="text-center text-gray-600">{{ $item->level }}</p>
                                                    </div>
                                                    <button
                                                        class="bg-purple-600 rounded-lg py-0 px-3 w-2/4 mt-9 text-white font-bold">Click</button>
                                                </div>
                                            </div>
                                        </a>
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
