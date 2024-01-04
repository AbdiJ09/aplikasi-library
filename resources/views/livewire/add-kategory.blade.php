<div>
    <dialog id="add_kategory" class="modal" wire:ignore.self>
        <div class="modal-box">
            <form wire:submit.prevent="save">
                <label for="kode_kategory">
                    <span class="label-text  block">Kode Kategory</span>
                    <input type="text" id="kode_kategory" placeholder="Kode Kategory"
                        class="input bg-white text-black w-full my-2" wire:model.blur="form.kode_kategory">
                    @error('form.kode_kategory')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </label>
                <label for="nama_kategory">
                    <span class="label-text  block">Nama Kategory</span>
                    <input type="text" id="nama_kategory" placeholder="Nama Kategory"
                        class="input bg-white text-black my-2 w-full" wire:model.blur="form.nama_kategory">
                    @error('form.nama_kategory')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </label>
                <button type="submit" class="btn btn-primary w-full mt-4">Save</button>
            </form>
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Close</button>
                </form>
            </div>
        </div>
    </dialog>

</div>
@script
<script>
        Livewire.on('closeModal', () => {
            document.getElementById('add_kategory').close();
        });
</script>
@endscript
