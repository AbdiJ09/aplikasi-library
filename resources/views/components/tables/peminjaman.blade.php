 <div class="flex items-center space-x-2">

     <h1 class="text-neutral-700 text-xl font-semibold  tracking-widest">Data Peminjaman</h1>
     <button class="bg-purple-900 p-2 rounded-lg w-10 text-center text-white" onclick="add_peminjaman.showModal()">
         <span><i class="fa-solid fa-plus"></i></span>
     </button>
     <x-dashboard.addPeminjaman :anggota="$anggota" :buku="$buku" />
     <a href="/buku-export">

         <button class="bg-green-600 p-2 rounded-lg w-10 text-center text-white">
             <span><i class="fa-solid fa-file-export"1e></i></span>
         </button>
     </a>
     <form action="{{ route('peminjaman-import') }}" method="post" enctype="multipart/form-data" id="import">
         @csrf
         <input class="import w-10" name="file" type="file" onchange="submitForm()">
         <button class="bg-green-600 p-2 rounded-lg w-10 text-center text-white"><i
                 class="fa-solid fa-file-import"></i></button>
     </form>

     <form action="{{ route('peminjaman.index') }}" id="formPeminjaman">
         <select name="fillter"
             class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
             <option value="">Semua</option>
             <option value="byAnggota" {{ request('fillter') == 'byAnggota' ? 'selected' : '' }}>Anggota</option>
             <option value="byPetugas" {{ request('fillter') == 'byPetugas' ? 'selected' : '' }}>Petugas</option>
         </select>
     </form>

 </div>
 <div class="grid grid-cols-5 justify-items-center content-center mt-3">
     <span></span>
     <h4 class="text-xs text-neutral-700">Tanggal pinjam</h4>
     <h4 class="text-xs text-neutral-700">Lama pinjam</h4>
     <h4 class="text-xs text-neutral-700">Status</h4>
     <h4 class="text-xs text-neutral-700">Action</h4>

 </div>

 <script>
     function updateStatus(peminjamanId) {
         const newStatus = "dipinjam";
         $(".notifSuccessStatus").html("");
         $("#status_verifikasi" + peminjamanId).val(newStatus);

         $.ajax({
             url: `{{ route('peminjaman.update', ':id') }}`.replace(':id', peminjamanId),
             type: "PATCH",
             data: {
                 status: newStatus,
                 _token: '{{ csrf_token() }}'
             },
             success: function(response) {
                 $(".notifSuccessStatus").html(
                     `
                        <div id="alert-border-3" class="flex items-center rounded-lg p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="ms-3 text-sm font-medium">
                        ${response.message}
                        </div>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        </button>
                    </div>
                    `
                 )
             },
             error: function(error) {
                 console.error('Gagal mengubah status', error);
             }
         });
     }
 </script>
 <div class="notifSuccessStatus absolute top-10 left-0">

 </div>
 @foreach ($peminjaman as $peminjamans)
     <div class="w-full p-1 shadow-xl bg-zinc-200 rounded-xl relative my-3 ">
         <div class="grid grid-cols-5 content-center h-10 justify-items-center">
             @if ($peminjamans->Anggota->foto)
                 <img src="{{ '../storage/anggota/' . $peminjamans->Anggota->foto }}"
                     class="w-8 h-8 absolute top-2/4 -translate-y-2/4 left-2 rounded-full cursor-pointer object-cover object-center"
                     alt="">
             @else
                 @php
                     $nama = $peminjamans->Anggota->nama;
                     $nama_depan = strtok($nama, ' ');
                     $nama_belakang = strtok('');
                     $inisial = strtoupper(substr($nama_depan, 0, 1) . substr($nama_belakang, 0, 1));
                 @endphp
                 <div
                     class="absolute left-2 inline-flex items-center justify-center w-8 h-8 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                     <span class="font-medium text-gray-600 dark:text-gray-300">{{ $inisial }}</span>
                 </div>
             @endif
             <span></span>
             <h4 class="text-xs text-neutral-700">{{ $peminjamans->tanggal_pinjam }}</h4>
             <h4 class="text-xs text-neutral-700">{{ $peminjamans->lama_pinjam }} Hari</h4>
             @if ($peminjamans->status == 'verifikasi')
                 <input type="text" name="status" data-status-id="{{ $peminjamans->id }}"
                     id="status_verifikasi{{ $peminjamans->id }}" value="{{ $peminjamans->status }}"
                     class="badge bg-warning text-white border-0 cursor-pointer w-20" readonly
                     onclick="updateStatus({{ $peminjamans->id }})">
             @else
                 <h4 class="text-white badge bg-purple-500 border-0">{{ $peminjamans->status }}</h4>
             @endif
             <div class="dropdown dropdown-top dropdown-end absolute right-[1.1rem] lg:right-[5.2rem]">
                 <label tabindex="0" class="btn m-1 btn-sm rounded-full">></label>
                 <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                     <li onclick="update_peminjaman{{ $peminjamans->id }}.showModal()"><a>Update</a></li>
                     <x-dashboard.updatePeminjaman :peminjaman="$peminjamans" :anggota="$anggota" :buku="$buku" />
                     <li><button type="button" data-modal-target="delete_peminjaman{{ $peminjamans->id }}"
                             data-modal-toggle="delete_peminjaman{{ $peminjamans->id }}">Delete</button></li>
                     <li onclick="detail_peminjaman{{ $peminjamans->id }}.showModal()"><a>Detail</a></li>
                     <x-dashboard.detailPeminjaman :peminjaman="$peminjamans" />
                 </ul>
             </div>
             <div id="delete_peminjaman{{ $peminjamans->id }}" tabindex="-1"
                 class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                 <div class="relative w-full max-w-md max-h-full">
                     <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                         <button type="button"
                             class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                             data-modal-hide="delete_peminjaman{{ $peminjamans->id }}">
                             <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                             </svg>
                             <span class="sr-only">Close modal</span>
                         </button>
                         <div class="p-6 text-center">
                             <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                             </svg>
                             <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                 Are you sure you want to delete this Peminjaman?</h3>
                             <form action="{{ route('peminjaman.destroy', $peminjamans->id) }}" class="inline-block"
                                 method="post">

                                 <button data-modal-hide="delete_peminjaman{{ $peminjamans->id }}" type="submit"
                                     class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                     @csrf
                                     @method('delete')
                                     Yes, I'm sure
                                 </button>
                             </form>
                             <button data-modal-hide="delete_peminjaman{{ $peminjamans->id }}" type="button"
                                 class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                 cancel</button>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endforeach
