 <header class="fixed top-0 left-0 w-full z-50 bg-gray-800">
     <div class="flex justify-between items-center px-3">
         <div>
             <x-dashboard.hamburger />
             <a href="{{ route('home') }}" class="text-white text-2xl  font-bold">Library</a>
         </div>
         <div class="dropdown dropdown-end hidden lg:block">
             <label tabindex="0" class="cursor-pointer">
                 @php
                     $nama = auth()->user()->name;
                     $nama_depan = strtok($nama, ' ');
                     $nama_belakang = strtok('');
                     $inisial = strtoupper(substr($nama_depan, 0, 1) . substr($nama_belakang, 0, 1));
                 @endphp
                 <div
                     class="inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 shadow-lg rounded-full dark:bg-gray-600">
                     <span class="font-medium text-gray-600 dark:text-gray-300">{{ $inisial }}</span>
                 </div>
             </label>
             <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-64">
                 <li @class([
                     'w-full',
                     'bg-gradient-to-r',
                     'from-purple-600',
                     'to-purple-900',
                     'rounded-md',
                     'flex',
                     'relative',
                     'p-2',
                     'overflow-hidden',
                 ])>
                     <div class="flex">
                         <div class="">
                             @php
                                 $nama = auth()->user()->name;
                                 $nama_depan = strtok($nama, ' ');
                                 $nama_belakang = strtok('');
                                 $inisial = strtoupper(substr($nama_depan, 0, 1) . substr($nama_belakang, 0, 1));
                             @endphp
                             <div
                                 class="inline-flex items-center justify-center w-14 h-14 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                 <span
                                     class="font-medium text-gray-600 dark:text-gray-300 text-2xl">{{ $inisial }}</span>
                             </div>
                         </div>
                         <div class="">
                             <h1 class="uppercase text-white font-bold text-xl">{{ auth()->user()->name }}</h1>
                             <h3 class="text-white font-medium text-sm">{{ auth()->user()->email }}</h3>
                         </div>
                     </div>
                 </li>
                 <hr class="my-2 border-gray-300 ">
                 <li><a href="{{ route('home') }}">Home</a>
                 </li>
                 <li>
                     <form action="{{ route('logout') }}">
                         @csrf
                         @method('delete')
                         <button type="submit">Logout</button>
                     </form>
                 </li>
             </ul>
         </div>
     </div>
 </header>
