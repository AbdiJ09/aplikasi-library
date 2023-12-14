 <span class="hidden lg:block"><i class="fa-regular fa-bookmark text-2xl " style="color:#000"></i></span>
 @if (Auth::check())
     <div class="dropdown dropdown-end hidden lg:block">
         <label tabindex="0" class="cursor-pointer">
             @if (auth()->check() && auth()->user()->level === 'user' && auth()->user()->anggota->foto)
                 <img src="{{ '../storage/anggota/' . auth()->user()->anggota->foto }}"
                     class="w-8 h-8  rounded-full cursor-pointer object-cover object-center" alt="">
             @else
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
             @endif
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
                         @if (auth()->user()->level === 'user' && auth()->user()->anggota->foto)
                             <img src="{{ '../storage/anggota/' . $peminjamans->Anggota->foto }}"
                                 class="w-20 h-20  rounded-full cursor-pointer object-cover object-center"
                                 alt="">
                         @else
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
                         @endif
                     </div>
                     <div class="">
                         <h1 class="uppercase text-white font-bold text-xl">{{ auth()->user()->name }}</h1>
                         <h3 class="text-white font-medium text-sm">{{ auth()->user()->email }}</h3>
                     </div>
                 </div>
             </li>
             <hr class="my-2 border-gray-300 ">
             <li><a
                     href="{{ auth()->user()->level === 'user' ? '' : route('dashboard') }}">{{ auth()->user()->level === 'user' ? 'My Book' : 'Dashboard' }}</a>
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
 @else
     <button
         class="btn bg-gradient-to-r from-purple-600 to-purple-900 border-0 text-white rounded-full hover:bg-green-700 transition duration-300 ease-in hidden lg:flex"
         onclick="my_modal_1.showModal()">Login
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
             stroke="currentColor" class="w-6 h-6">
             <path stroke-linecap="round" stroke-linejoin="round" d=" M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5
                                        21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
         </svg>
     </button>
 @endif

 <x-login />
