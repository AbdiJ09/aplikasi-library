@extends('layout.main')
@section('content')
    <header class="bg-black  w-full fixed top-0 left-0 z-50">

        <div class="flex justify-between py-2 px-2  items-center md:px-20 md:py-4">
            <div class="flex space-x-7">
                <button type="button" id="menu"
                    class="hidden md:block items-center p-2 text-sm text-gray-500 rounded-lg  hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="#"><img src="/img/logo/logo_tamsis.png" class="w-8" alt=""></a>
            </div>
            <form class="hidden md:block">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 right-0 flex items-center me-4 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-[33rem]  p-2 text-sm text-gray-900 border border-neutral-700 rounded-full bg-black focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 placeholder:text-neutral-500"
                        placeholder="Search book" required>

                </div>
            </form>
            <div class="flex space-x-3 text-center items-center">
                <ul class="flex space-x-2 md:space-x-6 md:hidden">
                    <li><a href="" class="nav-hover">Profil</a>
                    </li>
                    <li><a href="" class="nav-hover">Buku</a></li>
                    <li><a href="" class="nav-hover">Peminjaman</a></li>
                    <li><a href="" class="nav-hover">Pengembalian</a></li>
                </ul>
                <span class="hidden md:block"><i class="fa-regular fa-bookmark text-xl " style="color:#fff"></i></span>
                <button type="button"
                    class="relative inline-flex items-center px-2 py-1 text-sm font-medium text-center text-white">
                    <i class="fa-regular fa-bell md:text-xl" style="color:#fff"></i>

                    <div
                        class="absolute inline-flex items-center justify-center w-6 only:h-6 text-xs font-bold text-white bg-red-500 rounded-full -top-2 -right-2 dark:border-gray-900">
                        8+</div>
                </button>
                <img class="w-10 h-10 p-1 md:w-12 md:h-12 rounded-full hidden md:block" src="/img/freya.jpg" alt="">

            </div>
        </div>
    </header>

    <div class="flex">
        <div class="w-[500px] bg-transparent hidden md:block sidebar relative">
            <ul class="fixed py-28 px-12 left-0 ">
                <li><a href=""><i class="fa-solid fa-house -ms-6 text-xl" style="color:#fff"></i> <span
                            class="text-white link-menu ms-3">Home</span></a></li>
            </ul>
        </div>
        <div>
            <x-home.heroHome />
            <x-book />
        </div>
    </div>


    <x-header-bottom />
@endsection
