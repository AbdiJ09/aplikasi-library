 <dialog id="detail_buku{{ $item->id }}" class="modal modal-bottom sm:modal-middle">
     <div class="modal-box bg-cover bg-center lg:w-full lg:max-w-2xl overflow-hidden"
         style="background-image: url('/img/dashboard/bgg.png'),linear-gradient(rgba(255, 255, 255, 0.801), rgba(121, 29, 226, 0.5))">
         <div class="flex flex-col space-y-2 justify-center items-center py-3">
             <img src="{{ '../storage/buku/' . $item->gambar }}"
                 class="w-2/4 lg:w-40 rounded-lg mx-auto border-2 object-cover object-center" alt="">
             <h1 class="text-white font-semibold text-lg tracking-wide">{{ $item->judul }}</h1>
             <p class="text-white text-sm">{{ $item->penerbit }}</p>
         </div>
         <div class="bg-transparent shadow-2xl p-2 rounded-xl w-full border-2 border-purple-600">

             <div class="grid grid-cols-2 lg:grid-cols-3  justify-items-stretch  gap-3 p-3">
                 <div class="">
                     <h1 class="text-white font-medium text-sm">Kode buku</h1>
                     <p class="text-white font-semibold text-lg tracking-wide">
                         {{ $item->kode_buku }}
                     </p>
                 </div>
                 <div class="">
                     <h1 class="text-white font-medium text-sm">Kategory</h1>
                     <p class="text-white font-semibold text-lg tracking-wide badge badge-md">
                         {{ $item->kategory->nama_kategory }}
                     </p>
                 </div>
                 <div class="">
                     <h1 class="text-white font-medium text-sm">Pengarang</h1>
                     <p class="text-white font-semibold text-lg tracking-wide">
                         {{ $item->pengarang }}
                     </p>
                 </div>
                 <div class="">
                     <h1 class="text-white font-medium text-sm">Jumlah stok</h1>
                     <p class="text-white font-semibold text-lg tracking-wide">
                         {{ $item->jumlah_stok }}
                     </p>
                 </div>
                 <div class="">
                     <h1 class="text-white font-medium text-sm">Tahun terbit</h1>
                     <p class="text-white font-semibold text-lg tracking-wide">
                         {{ $item->tahun_terbit }}
                     </p>
                 </div>
                 <div class="">
                     <h1 class="text-white font-medium text-sm">ISBN</h1>
                     <p class="text-white font-semibold text-lg tracking-wide">
                         {{ $item->isbn }}
                     </p>
                 </div>
             </div>
         </div>
         <div class="modal-action">
             <form method="dialog">
                 <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-black">✕</button>
             </form>
         </div>
     </div>
 </dialog>
