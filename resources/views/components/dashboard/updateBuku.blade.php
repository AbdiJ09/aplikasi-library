   <dialog id="update_buku{{ $buku->id }}" class="modal">
       <div class="modal-box w-11/12 max-w-5xl lg:overflow-hidden">
           <h3 class="font-bold text-xl text-center text-white uppercase tracking-wide">Update Buku</h3>
           <hr class="border-neutral-500 my-2 border-dashed">
           <form action="{{ route('buku.update', $buku->id) }}" method="post" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                   <div>
                       <label for="kode_buku" class="block mb-2 text-sm font-medium text-white ">Kode
                           Buku</label>
                       <input type="text" id="kode_buku"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="55AABH" required name="kode_buku"
                           value="{{ old('kode_buku', $buku->kode_buku) }}">
                   </div>
                   <div>
                       <label for="judul" class="block mb-2 text-sm font-medium text-white ">Judul</label>
                       <input type="text" id="judul"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="John" required name="judul" value="{{ old('judul', $buku->judul) }}">
                   </div>
                   <div>
                       <label for="kategory_id" class="block mb-2 text-sm font-medium text-white ">Kategori</label>
                       <select
                           class="border-gray-300 w-full bg-gray-50 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                           name="kategory_id" id="kategory_id">
                           <option disabled selected>Pilih Kategory</option>
                           @foreach ($kategories as $item)
                               <option value="{{ $item->id }}">{{ $item->nama_kategory }}</option>
                           @endforeach
                       </select>
                   </div>
                   <div>
                       <label for="penerbit" class="block mb-2 text-sm font-medium text-white ">Penerbit</label>
                       <input type="text" id="penerbit"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="John" required name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}">
                   </div>
                   <div>
                       <label for="pengarang" class="block mb-2 text-sm font-medium text-white ">Pengarang</label>
                       <input type="text" id="pengarang"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="John" required name="pengarang"
                           value="{{ old('pengarang', $buku->pengarang) }}">
                   </div>
                   <div>
                       <label for="isbn" class="block mb-2 text-sm font-medium text-white ">ISBN</label>
                       <input type="text" id="isbn"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="John" required name="isbn" value="{{ old('isbn', $buku->isbn) }}">
                   </div>
                   <div>
                       <label for="jumlah_stok" class="block mb-2 text-sm font-medium text-white ">Stok</label>
                       <input type="number" id="jumlah_stok"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="John" required name="jumlah_stok"
                           value="{{ old('jumlah_stok', $buku->jumlah_stok) }}">
                   </div>
                   <div>
                       <label for="tahun_terbit" class="block mb-2 text-sm font-medium text-white ">Tahun Terbit</label>
                       <input type="number" id="tahun_terbit"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="John" required name="tahun_terbit"
                           value="{{ old('tahun_terbit', $buku->tahun_terbit) }}">
                   </div>
               </div>
               <div class="flex justify-center my-3">
                   <input type="hidden" name="oldImage" value="{{ $buku->gambar }}" id="">
                   <input type="file" class="file-input file-input-bordered file-input-primary w-full max-w-xs"
                       name="gambar" />
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