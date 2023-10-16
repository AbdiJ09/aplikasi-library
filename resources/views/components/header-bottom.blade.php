   <header class="fixed bottom-0 left-0 w-full bg-gray-300 py-1 rounded-lg md:hidden">
       <div class="flex justify-center items-center">
           <ul class="flex space-x-14 items-center">
               <li><a href=""><i class="fa-solid fa-house text-xl" style="color: #000"></i></a></li>
               <li><a href=""><i class="fa-solid fa-magnifying-glass text-xl" style="color:#000"></i></a></li>
               <li><a href=""><i class="fa-solid fa-bookmark text-xl" style="color:#000"></i></a></li>
               <li>
                   @if (Auth::check())
                       <div class="dropdown dropdown-end">
                           <label tabindex="0" class="btn btn-ghost btn-circle avatar">

                               <div
                                   class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
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
                               <li>
                                   <form action="{{ route('logout') }}" method="post">
                                       @csrf
                                       <button type="submit">Logout</button>
                                   </form>
                               </li>
                           </ul>
                       </div>
                   @else
                       <button class="text-black" onclick="my_modal_1.showModal()">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                               stroke="currentColor" class="w-6 h-6">
                               <path stroke-linecap="round" stroke-linejoin="round"
                                   d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                           </svg>
                       </button>
                   @endif
               </li>
           </ul>
       </div>
   </header>
