  <div class="flex justify-end mb-10 mt-4 lg:mb-0 lg:mt-4 ">
      <nav aria-label="Page navigation example">
          <ul class="inline-flex -space-x-px text-base h-10">
              @if ($buku->onFirstPage())
                  <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                      <span
                          class="flex items-center justify-center px-4 h-10 ms-0 leading-tight border border-purple-500  bg-transparent rounded-s-lg  text-gray-400 ">Previous</span>
                  </li>
              @else
                  <li>
                      <a href="{{ $buku->previousPageUrl() }}"
                          class="flex items-center justify-center px-4 h-10 ms-0 border border-purple-500 leading-tight text-white bg-gradient-to-r from-purple-500 to-purple-800  rounded-s-lg hover:bg-gray-100 hover:text-gray-400"
                          rel="prev">Previous</a>
                  </li>
              @endif

              @for ($i = 1; $i <= $buku->lastPage(); $i++)
                  <li>
                      <a href="{{ $buku->url($i) }}"
                          class="flex items-center justify-center px-4 h-10 leading-tight  bg-white border border-purple-500   text-gray-400 hover:bg-purple-700 hover:text-white{{ $i == $buku->currentPage() ? ' text-blue-600 border-blue-600 bg-blue-50 hover:bg-blue-100 hover:text-white  ' : '' }}">
                          {{ $i }}
                      </a>
                  </li>
              @endfor
              @if ($buku->hasMorePages())
                  <li>
                      <a href="{{ $buku->nextPageUrl() }}"
                          class="flex items-center justify-center px-4 h-10 leading-tight text-white bg-gradient-to-r from-purple-500 to-purple-800 border border-purple-500 rounded-e-lg hover:bg-gray-100 hover:text-gray-400 "
                          rel="next">Next</a>
                  </li>
              @else
                  <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                      <span
                          class="flex items-center justify-center px-4 h-10 leading-tight  bg-transparent border border-purple-500 rounded-e-lg hover:bg-gray-100 text-gray-400 ">Next</span>
                  </li>
              @endif
          </ul>
      </nav>
  </div>
