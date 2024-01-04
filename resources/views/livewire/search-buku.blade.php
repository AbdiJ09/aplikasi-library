<div class="relative">
    <div class="relative">
        <button @click="$wire.boxSearch = true"
            class="bg-transparent border-purple-600 rounded-full w-[13rem] lg:w-[50rem] p-2 border text-start font-medium">
            <i class="fa-solid fa-magnifying-glass ms-2 me-1"></i> Search buku...
        </button>
        <x-mary-modal wire:model="boxSearch" class="bg-gray-900">
            <div class="flex gap-2 items-center mb-3 border-b border-gray-300">
                <span class="text-black text-lg me-3 md:hidden" @click="$wire.boxSearch = false"><i
                        class="fa-solid fa-arrow-left"></i></span>
                <input type="text" wire:model.live.throttle='query' wire:keyup.enter='handleEnter'
                    class="bg-slate-200 w-full text-black border-0 outline-0 focus:ring-0 focus:outline-0 input placeholder:text-gray-500"
                    placeholder="cari buku...">
            </div>
            <div class="absolute top-16 left-0 bottom-0 -right-[17px] overflow-y-scroll p-4 me-3 mt-3 md:me-0">
                @foreach ($bukus as $item)
                    <button wire:click="showBuku('{{ $item->slug }}')"
                        class="w-full bg-slate-200 shadow-sm p-4 rounded-md text-start text-black font-normal my-2">
                        <i class="fa-solid fa-magnifying-glass me-2"></i> {{ $item->judul }}
                    </button>
                @endforeach
            </div>
        </x-mary-modal>
        <style>
            .modal-box {
                position: relative;
                overflow: hidden;
                width: 100%;
                height: 100%;
                max-width: 33rem;
                background: #e2e8f0;
            }
        </style>
    </div>
</div>
