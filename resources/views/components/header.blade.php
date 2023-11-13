<header class="bg-gradient-to-r from-neutral-200 via-purple-200 to-neutral-100   w-full fixed top-0 left-0 z-50">
    <div
        class="flex md:justify-center lg:justify-between justify-center py-2 px-5 md:px-10 space-x-3 md:space-x-10 md:py-3  items-center lg:px-20 lg:py-2">
        <div class="flex  lg:space-x-7 lg:-ms-12">
            <button type="button" id="menu"
                class="hidden lg:block items-center p-2 text-sm text-gray-500 rounded-lg  hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>
            <a href="#"><img src="/img/logo/logo_tamsis.png" class="w-8 md:w-10 lg:w-10" alt=""></a>
        </div>
        <form class="search-buku" method="get" action="/buku" id="form">
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
                    class="block w-full md:w-[30rem] lg:w-[40rem] p-2 pl-10 text-sm text-black border border-neutral-700 rounded-full bg-transparent focus:ring-purple-800 focus:border-purple-800 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-800 dark:focus:border-purple-800"
                    placeholder="Search Mockups, Logos..." name="search" value="{{ request('search') }}">

            </div>
        </form>
        <x-hamburgerMenu />
        <div class="flex space-x-4 text-center items-center ">
            <x-navbarMobile />
            <span class="hidden lg:block"><i class="fa-regular fa-bookmark text-2xl " style="color:#000"></i></span>
            <button type="button"
                class="relative hidden lg:inline-flex items-center mb-1 text-sm font-medium text-center text-white">
                <i class="fa-regular fa-bell lg:text-2xl" style="color:#000"></i>

                <div
                    class="absolute inline-flex items-center justify-center w-6 only:h-6 text-xs font-bold text-white bg-red-500 rounded-full -top-2 -right-2 dark:border-gray-900">
                    8+</div>
            </button>
            @if (Auth::check())
                <div class="dropdown dropdown-end hidden lg:block">
                    <label tabindex="0" class="">

                        <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>

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
                            <form action="{{ route('logout') }}">
                                @csrf
                                @method('delete')
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <button
                    class="btn bg-green-500 border-0 text-white rounded-full hover:bg-green-700 transition duration-300 ease-in hidden lg:flex"
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
        $(".search-buku").submit(function(event) {
            event.preventDefault();
        });
    });
</script>
