<div>
    <dialog id="update_kategory{{ $data->id }}" class="modal" wire:ignore.self>
        <div class="modal-box">
            <form wire:submit.prevent="update({{ $data->id }})">
                <label for="kode_kategory">
                    <span class="label-text  block">Kode Kategory</span>
                    <input type="text" id="kode_kategory" placeholder="Kode Kategory"
                        class="input bg-white text-black w-full my-2" wire:model.blur="kode_kategory">
                    @error('kode_kategory')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </label>
                <label for="nama_kategory">
                    <span class="label-text  block">Nama Kategory</span>
                    <input type="text" id="nama_kategory" placeholder="Nama Kategory"
                        class="input bg-white text-black my-2 w-full" wire:model.blur="nama_kategory">
                    @error('nama_kategory')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </label>
                <button type="submit" class="btn btn-primary w-full my-3">Save</button>
            </form>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn">Close</button>
                </form>
            </div>
        </div>
    </dialog>
</div>
