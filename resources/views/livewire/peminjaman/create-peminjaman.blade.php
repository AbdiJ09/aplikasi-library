<div>
    <dialog id="add_peminjaman" class="modal" wire:ignore.self>
        <div class="modal-box w-11/12 max-w-5xl lg:overflow-hidden">
            <h3 class="font-bold text-xl text-center text-white uppercase tracking-wide">Peminjaman buku</h3>
            <hr class="border-neutral-500 my-2 border-dashed">
            <form wire:submit='save'>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                    <div>
                        <label for="anggota" class="block mb-2 text-sm font-medium text-white ">anggota</label>
                        <select class="select select-bordered w-full max-w-xs bg-white text-black"
                            wire:model='anggotaId'>
                            <option disabled selected>anggota?</option>
                            @foreach ($anggota as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('anggotaId')
                            <span class="text-red-500 mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="">
                        <span class="text-white font-medium">Buku</span>
                        <button type="button" x-on:click='showBukuPeminjaamn.showModal()'
                            class="btn w-full bg-white mt-1 text-black hover:bg-white/90">Pilih buku</button>
                        @error('bukuIds')
                            <span class="text-red-500 mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <dialog id="showBukuPeminjaamn" class="modal" wire:ignore.self>
                        <div class="modal-box  max-w-2xl">
                            <input type="text" name="searchBuku" id="searchBuku"
                                wire:model.live.throttle.150ms='query'
                                class="bg-transparent w-full text-white border-0 outline-0 input placeholder:text-gray-300"
                                style="box-shadow: inset 2px 5px 10px rgb(5, 5, 5);" placeholder="cari buku..">
                            <div class="my-3 flex gap-3">
                                <select class="select w-full max-w-xs bg-dark text-white border-0 outline-0"
                                    style="box-shadow: inset 2px 5px 10px rgb(5, 5, 5);" wire:model.lazy='kelasId'>
                                    @foreach ($listKelas as $kelas)
                                        <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                                    @endforeach
                                </select>
                                <select class="select w-full max-w-xs bg-dark text-white border-0 outline-0"
                                    style="box-shadow: inset 2px 5px 10px rgb(5, 5, 5);" wire:model.lazy='jurusanId'>
                                    @foreach ($listJurusan as $jurusan)
                                        <option value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="" x-data="{ selectAll: false }">
                                <button type="button" class="my-3" x-on:click="selectAll = !selectAll"
                                    wire:click='setAll' x-text="selectAll ? 'Unselect All' : 'Select All'"></button>
                                <div
                                    class="grid grid-cols-2 lg:grid-cols-3 md:grid-cols-3 gap-5 lg:gap-3 justify-items-center my-3">
                                    @foreach ($buku as $item)
                                        <div class="flex items-center p-2">
                                            @if ($item->buku->jumlah_stok > 0)
                                                <div
                                                    class="relative bg-transparent shadow-lg overflow-hidden flex justify-center items-center px-2 rounded-lg h-20 w-36 md:w-48">
                                                    <input id="checkbox-item-{{ $item->buku->id }}"
                                                        :checked='selectAll' wire:model='bukuIds' type="checkbox"
                                                        value="{{ $item->buku->id }}"
                                                        class="w-5 h-5 text-green-500 bg-white absolute left-0 top-0  border-0 rounded-br-full focus:ring-green-600">
                                                    <label for="checkbox-item-{{ $item->buku->id }}"
                                                        class="w-full ml-2 text-sm font-medium text-white rounded flex items-center h-full ">
                                                        {{ $item->buku->judul }}
                                                    </label>
                                                </div>
                                            @else
                                                <div
                                                    class="relative bg-gray-500 overflow-hidden flex justify-center items-center px-2 rounded-lg h-20 w-36 md:w-48">
                                                    <input id="checkbox-item-{{ $item->id }}" wire:model='bukuIds'
                                                        type="checkbox" value="{{ $item->id }}" disabled
                                                        class="w-4 h-4 text-fuchsia-700 bg-white absolute left-0 top-0  border-0 rounded-br-full focus:ring-fuchsia-500">
                                                    <label for="checkbox-item-{{ $item->id }}"
                                                        class="w-full ml-2 text-sm font-medium text-white rounded">
                                                        {{ $item->buku->judul }}
                                                    </label>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-action">
                                <button type="button" class="btn btn-primary" onclick="showBukuPeminjaamn.close()">Save
                                    and Close</button>
                            </div>
                        </div>
                    </dialog>
                    <div>
                        <label for="tanggal_pinjam" class="block mb-2 text-sm font-medium text-white ">Tanggal
                            pinjem</label>
                        <input type="date" id="disabled-input" wire:model='tanggal_pinjam'
                            aria-label="disabled input"
                            class="bg-gray-100 border border-gray-300 h-12 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            readonly name="tanggal_pinjam">
                    </div>
                    <div>
                        <label for="lama_pinjam" class="block mb-2 text-sm font-medium text-white ">Lama pinjam</label>
                        <input type="text" wire:model='lama_pinjam'
                            class="bg-gray-50 border border-gray-300 h-12 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('lama_pinjam')
                            <span class="text-red-500 mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="jumlah" class="block mb-2 text-sm font-medium text-white ">Jumlah</label>
                        <input type="number" id="jumlah" wire:model='jumlah'
                            class="bg-gray-50 border h-12 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required name="jumlah" disabled value="1">
                    </div>

                    <div class="lg:col-span-3">

                        <label for="keterangan"
                            class="block mb-2 text-sm font-medium text-white dark:text-white">keterangan</label>
                        <textarea id="keterangan" wire:model='keterangan' rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Write your thoughts here..." name="keterangan"></textarea>
                        @error('keterangan')
                            <span class="text-red-500 mt-2">{{ $message }}</span>
                        @enderror
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
</div>
