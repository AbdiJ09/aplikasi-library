                    <dialog id="my_modal_5{{ $item->id }}" class="modal modal-bottom sm:modal-middle">
                        <div class="modal-box bg-cover bg-center lg:w-full lg:max-w-2xl"
                            style="background-image: url('/img/dashboard/bgg.png'),linear-gradient(rgba(255, 255, 255, 0.801), rgba(121, 29, 226, 0.5))">
                            <div class="flex flex-col space-y-2 justify-center items-center py-3">
                                <img src="{{ '../storage/anggota/' . $item->foto }}"
                                    class="w-32 h-32 rounded-full mx-auto border-2 object-cover object-center"
                                    alt="">
                                <h1 class="text-white font-semibold text-lg tracking-wide">{{ $item->nama }}</h1>
                            </div>
                            <div class="bg-transparent shadow-2xl p-2 rounded-xl w-full border-2 border-purple-600">

                                <div class="grid grid-cols-2 lg:grid-cols-3  justify-items-stretch  gap-3 p-3">
                                    <div class="">
                                        <h1 class="text-white font-medium text-sm">Kode Anggota</h1>
                                        <p class="text-white font-semibold text-lg tracking-wide">
                                            {{ $item->kode_anggota }}
                                        </p>
                                    </div>
                                    <div class="">
                                        <h1 class="text-white font-medium text-sm">Jenis kelamin</h1>
                                        <p class="text-white font-semibold text-lg tracking-wide">
                                            {{ $item->jenis_kelamin }}
                                        </p>
                                    </div>
                                    <div class="">
                                        <h1 class="text-white font-medium text-sm">Tempat lahir</h1>
                                        <p class="text-white font-semibold text-lg tracking-wide">
                                            {{ $item->tempat_lahir }}
                                        </p>
                                    </div>
                                    <div class="">
                                        <h1 class="text-white font-medium text-sm">Tanggal lahir</h1>
                                        <p class="text-white font-semibold text-lg tracking-wide">
                                            {{ $item->tanggal_lahir }}
                                        </p>
                                    </div>
                                    <div class="">
                                        <h1 class="text-white font-medium text-sm">Telepon</h1>
                                        <p class="text-white font-semibold text-lg tracking-wide">
                                            {{ $item->telpon }}
                                        </p>
                                    </div>
                                    <div class="">
                                        <h1 class="text-white font-medium text-sm">Alamat</h1>
                                        <p class="text-white font-semibold text-lg tracking-wide">
                                            {{ $item->alamat }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-action">
                                <form method="dialog">
                                    <button
                                        class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-black">✕</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
