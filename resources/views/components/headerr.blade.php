<header class="bg-slate-200 w-full fixed top-0 left-0 z-50">
    <div
        class="flex md:justify-center lg:justify-between justify-between py-2 px-5 md:px-10 space-x-3 md:space-x-10 md:py-3  items-center lg:px-20 lg:py-2">
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
        </div>
        <a href="/home" aria-label="logo"><img src="/img/logo/logo_tamsis.png"
                class="w-10 lg:-translate-x-16 object-cover" alt=""></a>
        <livewire:search-buku />
        <x-hamburgerMenu />
        <div class="flex space-x-4 text-center items-center ">
            <x-navbarMobile />
            <x-navbarDesktop />
        </div>
    </div>
</header>
