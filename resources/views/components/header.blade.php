<header
    class="bg-gradient-to-r from-neutral-200 via-purple-200 to-neutral-100   w-full fixed top-0 left-0 z-50 @if (Route::currentRouteName() == 'profil' || Route::currentRouteName() == 'profile') hidden @endif">
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
                    placeholder="Cari buku..." name="search" value="{{ request('search') }}">

            </div>
        </form>
        <x-hamburgerMenu />
        <div class="flex space-x-4 text-center items-center ">
            <x-navbarMobile />
            <x-navbarDesktop />
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
