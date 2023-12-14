   <dialog id="add_peminjaman" class="modal">
       <div class="modal-box w-11/12 max-w-5xl lg:overflow-hidden">
           <h3 class="font-bold text-xl text-center text-white uppercase tracking-wide">Peminjaman buku</h3>
           <hr class="border-neutral-500 my-2 border-dashed">
           <form action="{{ route('peminjaman.store') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                   <div>
                       <label for="anggota" class="block mb-2 text-sm font-medium text-white ">anggota</label>
                       <select class="select select-bordered w-full max-w-xs bg-white text-black" name="anggota_id">
                           <option disabled selected>anggota?</option>
                           @foreach ($anggota as $item)
                               <option value="{{ $item->id }}">{{ $item->nama }}</option>
                           @endforeach
                       </select>
                   </div>
                   <div>
                       <label for="tanggal_pinjam" class="block mb-2 text-sm font-medium text-white ">Tanggal
                           pinjem</label>
                       <input type="date" id="disabled-input" aria-label="disabled input"
                           class="mb-6 bg-gray-100 border border-gray-300 h-12 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           value="{{ date('Y-m-d') }}" readonly name="tanggal_pinjam">
                   </div>
                   <div class="w-full">
                       <label for="buku_id" class="block mb-2 text-sm font-medium text-white">Buku</label>
                       <button id="dropdownSearchButton" data-dropdown-placement="bottom"
                           data-dropdown-toggle="dropdownSearch"
                           class="inline-flex items-center px-4 py-2 text-sm font-medium w-full text-center text-black rounded-lg bg-white h-12"
                           type="button">Buku <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                               xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                   stroke-width="2" d="m1 1 4 4 4-4" />
                           </svg></button>
                       <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                           <div class="p-3">
                               <label for="peminjaman-search" class="sr-only">Search</label>
                               <div class="relative">
                                   <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                       <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                           xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                               stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                       </svg>
                                   </div>
                                   <input type="text" id="peminjaman-search"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="Search Buku" name="listBuku">
                               </div>
                           </div>
                           <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200 buku-list"
                               aria-labelledby="dropdownSearchButton">
                               @foreach ($buku as $item)
                                   <li>
                                       <div
                                           class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                           @if ($item->jumlah_stok > 0)
                                               <input id="checkbox-item-{{ $item->id }}" type="checkbox"
                                                   name="buku_id[]" value="{{ $item->id }}"
                                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                               <label for="checkbox-item-{{ $item->id }}"
                                                   class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $item->judul }}</label>
                                           @else
                                               <input id="checkbox-item-{{ $item->id }}" type="checkbox"
                                                   name="buku_id[]" value="{{ $item->id }}"
                                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                   disabled>
                                               <label for="checkbox-item-{{ $item->id }}"
                                                   class="w-full ml-2 text-sm font-medium text-gray-400 rounded dark:text-gray-300">{{ $item->judul }}</label>
                                           @endif

                                       </div>
                                   </li>
                               @endforeach

                           </ul>
                       </div>
                   </div>
                   <div>
                       <label for="lama_pinjam" class="block mb-2 text-sm font-medium text-white ">Lama pinjam</label>
                       <input type="text" id="lama_pinjam"
                           class="bg-gray-50 border border-gray-300 h-12 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           required name="lama_pinjam">
                   </div>


                   <div>
                       <label for="jumlah" class="block mb-2 text-sm font-medium text-white ">Jumlah</label>
                       <input type="number" id="jumlah"
                           class="bg-gray-50 border h-12 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           required name="jumlah" disabled value="1">
                   </div>

                   <div class="lg:col-span-3">

                       <label for="keterangan"
                           class="block mb-2 text-sm font-medium text-white dark:text-white">keterangan</label>
                       <textarea id="keterangan" rows="4"
                           class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Write your thoughts here..." name="keterangan"></textarea>

                   </div>
               </div>

               <button class="btn btn-primary w-full my-4" type="submit">Submit</button>
           </form>
           <div class="modal-action">
               <form method="dialog">
                   <!-- if there is a button, it will close the modal -->
                   <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
               </form>
           </div>
       </div>
   </dialog>
   @vite('resources/js/dashboardPeminjaman.js')
