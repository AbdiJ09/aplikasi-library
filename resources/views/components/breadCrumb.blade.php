<div class="w-full mx-auto  flex justify-center">

    <ol class="flex items-center whitespace-nowrap min-w-0" aria-label="Breadcrumb">
        <li class="text-sm">
            <a class="flex items-center text-white hover:text-blue-600" href="/buku">
                Buku
                <svg class="flex-shrink-0 mx-3 overflow-visible h-2.5 w-2.5 text-gray-400 dark:text-gray-600"
                    width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </a>
        </li>
        @if (Route::currentRouteName() === 'buku')
            <li class="text-sm">
                <a class="flex items-center text-white hover:text-blue-600" href="#">
                    Buku
                    <svg class="flex-shrink-0 mx-3 overflow-visible h-2.5 w-2.5 text-gray-400 dark:text-gray-600"
                        width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </a>
            </li>
        @elseif (Route::currentRouteName() == 'detail-buku')
            <li class="text-sm font-semibold flex items-center text-white truncate dark:text-gray-200"
                aria-current="page">
                Detail buku <svg
                    class="flex-shrink-0 mx-3 overflow-visible h-2.5 w-2.5 text-gray-400 dark:text-gray-600"
                    width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg> {{ $detail }}
            </li>
        @endif
    </ol>
</div>
