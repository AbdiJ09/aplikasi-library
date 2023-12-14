  <div class="flex items-center space-x-2">
      <h1 class="text-neutral-700 text-xl font-semibold  tracking-widest">Data Pengembalian
      </h1>
      <button class="bg-purple-900 p-2 rounded-lg w-10 text-center text-white" onclick="add_pengembalian.showModal()">
          <span>
              <i class="fa-solid fa-repeat lg:text-xl "></i>
          </span>
      </button>
      <x-dashboard.addPengembalian :peminjaman="$peminjaman" />
      <a href="/buku-export">
          <button class="bg-green-600 p-2 rounded-lg w-10 text-center text-white">
              <span><i class="fa-solid fa-file-export"></i></span>
          </button>
      </a>
  </div>
  <div class="grid grid-cols-3 justify-items-center content-center mt-3">
      <h4 class="text-xs text-neutral-700">Nama</h4>
      <h4 class="text-xs text-neutral-700">Tanggal Kembali</h4>
      <h4 class="text-xs text-neutral-700">Action</h4>
  </div>
  @foreach ($pengembalian as $data)
      <div class="w-full p-1 shadow-xl bg-zinc-200 rounded-xl relative my-3 ">
          <div class="grid grid-cols-3 content-center h-10 justify-items-center">
              <h4 class="text-xs text-neutral-700 text-center mt-2">{{ $data->Peminjaman->Anggota->nama }}</h4>
              <h4 class="text-xs text-neutral-700 text-center mt-2">{{ $data->tanggal_kembali }}</h4>
              <div class="dropdown dropdown-top dropdown-end">
                  <label tabindex="0" class="btn m-1 btn-sm rounded-full">></label>
                  <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                      <li onclick="update_petugas.showModal()"><a>Update</a></li>
                      <li><button type="button" data-modal-target="delete_petugas"
                              data-modal-toggle="delete_petugas">Delete</button></li>
                      <li onclick="detail_buku.showModal()"><a>Detail</a></li>
                  </ul>
              </div>
              <div id="delete_petugas" tabindex="-1"
                  class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                  <div class="relative w-full max-w-md max-h-full">
                      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                          <button type="button"
                              class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                              data-modal-hide="delete_petugas">
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
                                  Are you sure you want to delete this petugas?</h3>
                              <form action="" class="inline-block" method="post">

                                  <button data-modal-hide="delete_petugas" type="submit"
                                      class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                      @csrf
                                      @method('delete')
                                      Yes, I'm sure
                                  </button>
                              </form>
                              <button data-modal-hide="delete_petugas" type="button"
                                  class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                  cancel</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  @endforeach
