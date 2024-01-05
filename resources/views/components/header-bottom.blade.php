   <header
       class="fixed bottom-0 left-0 w-full z-40 md:h-20 bg-white border-t-2 border-neutral-200 py-1 rounded-lg lg:hidden
       {{ Route::currentRouteName() == 'peminjaman' || Route::currentRouteName() == 'pengembalian' || Route::currentRouteName() == 'profile' || Route::currentRouteName() == 'detail-buku' || Route::currentRouteName() == 'profil' ? 'hidden' : '' }}
       ">
       <div class="flex justify-center items-center">
           <ul class="flex space-x-14 md:space-x-20 items-center mt-1 justify-center">
               <li><a href="{{ route('home') }}" wire:navigate class="flex flex-col items-center justify-center"><i
                           class="fa-solid fa-house text-2xl md:text-4xl" style="color: #000"></i><span
                           class="font-medium text-xs text-black">Home</span></a></li>
               <li>
                   <a href="" class="flex flex-col items-center justify-center">
                       <i class="fa-solid fa-book text-2xl md:text-4xl" style="color:#000"></i>
                       <span class="font-medium text-xs text-black">My Book</span>
                   </a>
               </li>
               <li><a href="" class="flex flex-col items-center justify-center"><i
                           class="fa-solid fa-bookmark text-2xl  md:text-4xl" style="color:#000"></i>
                       <span class="font-medium text-xs text-black">Bookmark</span>
                   </a>
               </li>
               <li>
                   @if (Auth::check())
                       <div class="dropdown dropdown-top dropdown-end w-10">
                           <div tabindex="0" role="button">
                               @if (auth()->check() && auth()->user()->level === 'user' && auth()->user()->anggota->foto)
                                   <img src="{{ '../storage/anggota/' . auth()->user()->anggota->foto }}"
                                       class="w-10 h-10  rounded-full cursor-pointer object-cover object-center"
                                       alt="">
                               @else
                                   @php
                                       $nama = auth()->user()->name;
                                       $nama_depan = strtok($nama, ' ');
                                       $nama_belakang = strtok('');
                                       $inisial = strtoupper(substr($nama_depan, 0, 1) . substr($nama_belakang, 0, 1));
                                   @endphp
                                   <div class="flex flex-col items-center">

                                       <div
                                           class="inline-flex -mt-14 -ms-10 items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 shadow-md shadow-black/20 rounded-full">
                                           <span
                                               class="font-medium text-gray-600 dark:text-gray-300">{{ $inisial }}</span>
                                       </div>
                                       <span class="text-xs font-medium -ms-10 -mt-1 text-black">Anda</span>
                                   </div>
                               @endif
                           </div>
                           <ul tabindex="0"
                               class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-60">
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
                                               class="inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                               <span
                                                   class="font-medium text-gray-600 dark:text-gray-300 text-2xl">{{ $inisial }}</span>
                                           </div>
                                       </div>
                                       <div class="">
                                           <h1 class="uppercase text-white font-bold text-xl">
                                               {{ auth()->user()->name }}</h1>
                                           <h3 class="text-white font-medium text-sm">{{ auth()->user()->email }}
                                           </h3>
                                       </div>
                                   </div>
                               </li>
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
                       <button class="text-black" onclick="modalLogin.showModal()">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                               stroke="currentColor" class="w-9 h-9 mt-[2px] md:w-14 md:h-14">
                               <path stroke-linecap="round" stroke-linejoin="round"
                                   d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                           </svg>
                       </button>
                   @endif
               </li>
           </ul>
       </div>
   </header>
