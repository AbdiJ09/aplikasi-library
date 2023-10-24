<header class="bg-black   w-full fixed top-0 left-0 z-50">

    <div class="flex md:justify-between justify-center py-2 px-5 space-x-3  items-center md:px-20 md:py-4">
        <div class="flex  md:space-x-7 ">
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
        <form class="md:block" method="get" action="/buku" id="form">
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search"
                    class="block w-full  md:w-[40rem] p-2 pl-10 text-sm text-white border border-neutral-700 rounded-full bg-transparent focus:ring-purple-800 focus:border-purple-800 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-800 dark:focus:border-purple-800"
                    placeholder="Search Mockups, Logos..." name="search" value="{{ request('search') }}">

            </div>
        </form>
        <x-hamburgerMenu />
        <div class="flex space-x-3 text-center items-center ">
            <x-navbarMobile />
            <span class="hidden md:block"><i class="fa-regular fa-bookmark text-xl " style="color:#fff"></i></span>
            <button type="button"
                class="relative hidden md:inline-flex items-center  px-2 py-1 text-sm font-medium text-center text-white">
                <i class="fa-regular fa-bell md:text-xl" style="color:#fff"></i>

                <div
                    class="absolute inline-flex items-center justify-center w-6 only:h-6 text-xs font-bold text-white bg-red-500 rounded-full -top-2 -right-2 dark:border-gray-900">
                    8+</div>
            </button>
            @if (Auth::check())
                <div class="dropdown dropdown-end hidden md:block">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">

                        <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                            <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>

                    </label>
                    <ul tabindex="0"
                        class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                        <li>
                            <a class="justify-between">
                                Profile
                                <span class="badge">New</span>
                            </a>
                        </li>
                        <li><a>Settings</a></li>
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <button
                    class="btn bg-purple-800 border-0 text-white rounded-full hover:bg-purple-900 transition duration-300 ease-in hidden md:flex"
                    onclick="my_modal_1.showModal()">Login
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d=" M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5
                                21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                    </svg>
                </button>
            @endif

            <x-login />
        </div>
    </div>
</header>
<script type="module">
    $("#hamburger").click(function() {
        $("#hamburger").toggleClass("hamburger-active");
        $("#nav").toggleClass("scale-0 scale-100");
    });
    $(document).ready(function() {
        $("#form").submit(function(event) {
            // Mendapatkan nilai dari input search
            var searchValue = $("#default-search").val().trim();

            // Mengecek apakah input kosong atau panjang stringnya kurang dari 3
            if (searchValue === '' || searchValue.length < 3) {
                event.preventDefault(); // Mencegah pengiriman formulir
            }
        });
    });
</script>
