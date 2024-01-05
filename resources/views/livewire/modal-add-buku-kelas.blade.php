<div>
    <dialog id="addBukuKelas" class="modal" wire:ignore.self>
        <div class="modal-box relative">
            <form wire:submit='save'>
                <div class="my-2 flex flex-col">
                    <label for="kelas" class="my-2 font-medium text-white text-lg">Kelas :</label>
                    <select class="select select-bordered w-full bg-white text-black" wire:model='kelasId'>
                        <option disabled selected>Who shot first?</option>
                        @foreach ($listKelas as $kelas)
                            <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="my-2 flex flex-col">
                    <label for="kelas" class="my-2 font-medium text-white text-lg">Jurusan :</label>
                    <select class="select select-bordered w-full bg-white text-black" wire:model='jurusanId'>
                        @foreach ($listJurusan as $jurusan)
                            <option value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="button" x-on:click='showBooks.showModal()'
                    class="bg-purple-600 w-full mx-auto block rounded-lg border-0 p-2 my-4 text-white">Pilih Buku <span
                        x-text='$wire.bukuIds.length > 0 ? "(" + $wire.bukuIds.length + ")" : ""'></span></button>
                @error('bukuIds')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
                <dialog id="showBooks" class="modal">
                    <div class="modal-box max-w-3xl bg-black">
                        <div class="grid grid-cols-2 lg:grid-cols-4 md:grid-cols-3 gap-5 lg:gap-3 justify-items-center">
                            @foreach ($books as $item)
                                <div class="flex items-center p-2">
                                    @if ($item->jumlah_stok > 0)
                                        <div
                                            class="relative bg-purple-600 overflow-hidden flex justify-center items-center px-2 rounded-lg h-20 w-36 md:w-40">
                                            <input id="checkbox-item-{{ $item->id }}" wire:model='bukuIds'
                                                type="checkbox" value="{{ $item->id }}"
                                                class="w-4 h-4 text-fuchsia-700 bg-white absolute left-0 top-0  border-0 rounded-br-full focus:ring-fuchsia-500">
                                            <label for="checkbox-item-{{ $item->id }}"
                                                class="w-full ml-2 text-sm font-medium text-white rounded flex items-center h-full ">
                                                {{ $item->judul }}
                                            </label>
                                        </div>
                                    @else
                                        <div
                                            class="relative bg-gray-500 overflow-hidden flex justify-center items-center px-2 rounded-lg h-20 w-36 md:w-40">
                                            <input id="checkbox-item-{{ $item->id }}" wire:model='bukuIds'
                                                type="checkbox" value="{{ $item->id }}" disabled
                                                class="w-4 h-4 text-fuchsia-700 bg-white absolute left-0 top-0  border-0 rounded-br-full focus:ring-fuchsia-500">
                                            <label for="checkbox-item-{{ $item->id }}"
                                                class="w-full ml-2 text-sm font-medium text-white rounded">
                                                {{ $item->judul }}
                                            </label>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <div class="modal-action">
                            <button class="btn bg-purple-500 text-white border-0 hover:bg-purple-600"" type="button"
                                x-on:click='showBooks.close()'>Save</button>
                        </div>
                    </div>
                </dialog>
                <div class="modal-action">
                    <button type="submit"
                        class="btn bg-purple-800 text-white border-0 hover:bg-purple-900">Save</button>
                    <button class="btn" type="button" x-on:click='addBukuKelas.close()'>Close</button>
                </div>
            </form>
        </div>
    </dialog>
</div>
@script
    <script>
        $wire.on('closeModal', () => {
            addBukuKelas.close();
        });
    </script>
@endscript
