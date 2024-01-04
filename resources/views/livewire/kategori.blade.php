<div>
    <div class="w-full h-auto bg-zinc-300 rounded-2xl px-4 py-4">
        @if (session('status'))
            <<div role="alert" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('status') }}</span>
    </div>
    @endif
    <div class="flex items-center space-x-2">
        <h1 class="text-neutral-700 text-xl font-semibold  tracking-widest">Data Kategori
        </h1>
        <button class="bg-purple-900 p-2 rounded-lg w-10 text-center text-white" onclick="add_kategory.showModal()">
            <span>
                <i class="fa-solid fa-plus lg:text-xl "></i>
            </span>
        </button>
        <livewire:add-kategory>
    </div>
    <div class="grid grid-cols-3 justify-items-center content-center mt-3">
        <h4 class="text-xs text-neutral-700">Kode kategori</h4>
        <h4 class="text-xs text-neutral-700">Nama kategori</h4>
        <h4 class="text-xs text-neutral-700">Action</h4>
    </div>
    @foreach ($kategoris as $data)
        <div wire:key="{{ $data->id }}" class="w-full p-1 shadow-xl bg-zinc-200 rounded-xl relative my-3 ">
            <div class="grid grid-cols-3 content-center h-10 justify-items-center">
                <h4 class="text-xs text-neutral-700 text-center mt-2">{{ $data->kode_kategory }}</h4>
                <h4 class="text-xs text-neutral-700 text-center mt-2">{{ $data->nama_kategory }}</h4>
                <div class="dropdown dropdown-top dropdown-end">
                    <label tabindex="0" class="btn m-1 btn-sm rounded-full">></label>
                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                        <li>
                            <button onclick="update_kategory{{ $data->id }}.showModal()">Update</button>
                        </li>
                        <livewire:update-kategori :data="$data" :key="$data->id">
                            <li><button wire:click="delete({{ $data->id }})"
                                    wire:confirm='Are you sure'>Delete</button></li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
</div>
@script
    <script>
        $wire.on('close-modal', () => {
            add_kategory.close();
        });
    </script>
@endscript
