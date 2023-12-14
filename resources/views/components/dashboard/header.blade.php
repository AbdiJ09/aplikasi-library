 <header class="fixed top-0 left-0 w-full z-50 bg-gray-800">
     <div class="flex justify-between items-center px-3">
         <div>
             <x-dashboard.hamburger />
             <a href="/home" class="text-white text-2xl  font-bold">Library</a>
         </div>
         <div class="dropdown dropdown-end">
             <label tabindex="0" class="btn btn-ghost btn-circle avatar">

                 <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                     <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                         <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                             clip-rule="evenodd"></path>
                     </svg>
                 </div>

             </label>
             <ul tabindex="0"
                 class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                 <li>
                     <a class="justify-between">
                         Profile
                         <span class="badge">New</span>
                     </a>
                 </li>
                 <li><a>Settings</a></li>
                 <form action="{{ route('logout') }}">
                     @csrf
                     @method('delete')
                     <li><a><button type="submit">Logout</button></a></li>
                 </form>
             </ul>
         </div>
     </div>
 </header>
