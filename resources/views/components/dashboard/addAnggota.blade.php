   <dialog id="my_modal_4" class="modal">
       <div class="modal-box w-11/12 max-w-5xl lg:overflow-hidden">
           <h3 class="font-bold text-xl text-center text-white uppercase tracking-wide">Tambah Anggota</h3>
           <hr class="border-neutral-500 my-2 border-dashed">
           <form action="{{ route('anggota.store') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                   <div>
                       <label for="kode_anggota" class="block mb-2 text-sm font-medium text-white ">Kode
                           Anggota</label>
                       <input type="text" id="kode_anggota"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="55AABH" required name="kode_anggota">
                   </div>
                   <div>
                       <label for="nama" class="block mb-2 text-sm font-medium text-white ">Nama</label>
                       <input type="text" id="nama"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="John" required name="nama">
                   </div>
                   <div>
                       <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-white ">Kelamin</label>
                       <input type="text" id="jenis_kelamin"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="John" required name="jenis_kelamin">
                   </div>
                   <div>
                       <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-white ">Tempat
                           Lahir</label>
                       <input type="text" id="tempat_lahir"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="John" required name="tempat_lahir">
                   </div>
                   <div>
                       <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-white ">Tanggal
                           lahir</label>
                       <input type="date" id="tanggal_lahir"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="John" required name="tanggal_lahir">
                   </div>
                   <div>
                       <label for="telpon" class="block mb-2 text-sm font-medium text-white ">Telpon</label>
                       <input type="number" id="telpon"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="John" required name="telpon">
                   </div>
                   <div class="lg:col-span-3">

                       <label for="alamat"
                           class="block mb-2 text-sm font-medium text-white dark:text-white">Alamat</label>
                       <textarea id="alamat" rows="4"
                           class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Write your thoughts here..." name="alamat"></textarea>

                   </div>
               </div>
               <div class="flex justify-center my-3">
                   <input type="file" class="file-input file-input-bordered file-input-primary w-full max-w-xs"
                       name="foto" />
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