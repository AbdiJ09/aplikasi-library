<dialog id="update{{ $anggota->id }}" class="modal">
    <div class="modal-box w-11/12 max-w-5xl lg:overflow-hidden">
        <h3 class="font-bold text-xl text-center text-white uppercase tracking-wide">Update Anggota</h3>
        <hr class="border-neutral-500 my-2 border-dashed">
        <form action="/dashboard/anggota/{{ $anggota->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $anggota->id }}" id="">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                <div>
                    <label for="kode_anggota" class="block mb-2 text-sm font-medium text-white ">Kode
                        Anggota</label>
                    <input type="text" id="kode_anggota"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="55AABH" required name="kode_anggota" value="{{ $anggota->kode_anggota }}">
                </div>
                <div>
                    <label for="nama" class="block mb-2 text-sm font-medium text-white ">Nama</label>
                    <input type="text" id="nama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="John" required name="nama" value="{{ $anggota->nama }}">
                </div>
                <div>
                    <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-white ">Kelamin</label>
                    <input type="text" id="jenis_kelamin"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="John" required name="jenis_kelamin" value="{{ $anggota->jenis_kelamin }}">
                </div>
                <div>
                    <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-white ">Tempat
                        Lahir</label>
                    <input type="text" id="tempat_lahir"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="John" required name="tempat_lahir" value="{{ $anggota->tempat_lahir }}">
                </div>
                <div>
                    <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-white ">Tanggal
                        lahir</label>
                    <input type="date" id="tanggal_lahir"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="John" required name="tanggal_lahir" value="{{ $anggota->tanggal_lahir }}">
                </div>
                <div>
                    <label for="telpon" class="block mb-2 text-sm font-medium text-white ">Telpon</label>
                    <input type="number" id="telpon"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="John" required name="telpon" value="{{ $anggota->telpon }}">
                </div>
                <div class="lg:col-span-3">

                    <label for="alamat"
                        class="block mb-2 text-sm font-medium text-white dark:text-white">Alamat</label>
                    <textarea id="alamat" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here..." name="alamat">{{ $anggota->alamat }}</textarea>

                </div>
            </div>
            <div class="flex justify-center my-3">
                <input type="hidden" name="oldFoto" id="oldFoto" value="{{ $anggota->foto }}">
                <input type="file" class="file-input file-input-bordered file-input-primary w-full max-w-xs"
                    name="foto" value="{{ $anggota->foto }}" />
            </div>
            <button class="btn btn-primary w-full my-4" data-modal-target="popup-modal{{ $anggota->id }}"
                data-modal-toggle="popup-modal{{ $anggota->id }}" type="button">Submit</button>
            <div id="popup-modal{{ $anggota->id }}" tabindex="-1"
                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="popup-modal{{ $anggota->id }}">
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
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want
                                to update this anggota?</h3>
                            <button data-modal-hide="popup-modal{{ $anggota->id }}" type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </button>
                            <button data-modal-hide="popup-modal{{ $anggota->id }}" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button, it will close the modal -->
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
        </div>
    </div>
</dialog>
