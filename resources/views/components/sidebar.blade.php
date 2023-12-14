  <div class="w-[300px] hidden  lg:z-0 lg:block sidebar lg:relative transition-all">
      <ul
          class="fixed py-28 px-8 left-0 flex flex-col z-40 space-y-3 items-center bg-black md:bg-transparent  h-screen
          [&>li>a:hover]:bg-purple-500
      ">
          <li>

              <a href="{{ route('home') }}"
                  class="flex items-center p-2 w-44 conss transition ease-in-out duration-300  absolute left-8 text-gray-900 rounded-lg dark:text-white   group">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                      @if (Request::is('home')) fill="currentColor" @else stroke="currentColor" @endif
                      class="w-6 h-6 text-black group-hover:text-white">
                      <path
                          d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                      <path
                          d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                  </svg>


                  <span class="ml-5 text-black link-menu group-hover:text-white">Home</span>
              </a>
          </li>
          <li>

              <a href="{{ route('profil') }}"
                  class="flex items-center p-2 w-44 conss transition ease-in-out duration-300 absolute left-8 mt-10 text-gray-900 rounded-lg dark:text-white  group">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-6 h-6 text-black group-hover:text-white">
                      <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                  </svg>

                  <span class="ml-5 text-black link-menu group-hover:text-white">Profil</span>
              </a>
          </li>
          <li>

              <a href="{{ route('buku') }}"
                  class="flex items-center p-2 w-44 conss transition ease-in-out duration-300 absolute left-8 mt-20 text-gray-900 rounded-lg dark:text-white  group">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-6 h-6 text-black  group-hover:text-white">
                      <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                  </svg>


                  <span class="ml-5 text-black link-menu  group-hover:text-white">Buku</span>
              </a>
          </li>
          <li>

              <a href="{{ route('peminjaman') }}"
                  class="flex items-center p-2 w-44 conss transition ease-in-out duration-300 absolute left-8 mt-[7.5rem] text-gray-900 rounded-lg dark:text-white  group">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-6 h-6  group-hover:text-white text-black">
                      <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3" />
                  </svg>



                  <span class="ml-5 text-black link-menu  group-hover:text-white">Peminjaman</span>
              </a>
          </li>
          <li>

              <a href="{{ route('pengembalian') }}"
                  class="flex items-center p-2 w-44 conss transition ease-in-out duration-300 absolute left-8 mt-40 text-gray-900 rounded-lg dark:text-white  group">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-6 h-6  group-hover:text-white text-black">
                      <path stroke-linecap="round" stroke-linejoin="round"
                          d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3" />
                  </svg>




                  <span class="ml-5 text-black link-menu  group-hover:text-white">Pengembalian</span>
              </a>
          </li>
      </ul>
  </div>
