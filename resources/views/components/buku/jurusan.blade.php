<div x-data="{ listVisible: false.defer }"
    class="bg-gray-900/50 shadow-inner shadow-purple-400 w-full h-fit rounded-2xl overflow-hidden">
    <div class="p-5 relative">
        <h1 class="font-extrabold uppercase text-2xl lg:text-xl text-white text-left">Buku Kelas
            {{ $kelass->nama }}</h1>
        <button x-on:click="listVisible = !listVisible"
            class="bg-purple-500 p-2 rounded-full w-5 h-5 absolute top-2/4 -translate-y-2/4 right-8 flex justify-center items-center btn-jurusan">
            <span><i class="fa-solid fa-chevron-down text-xs text-white font-bold"></i></span>
        </button>
        <p class="text-white text-lg font-medium">Jurusan</p>
    </div>
    <div x-show="listVisible" x-on:click.outside="listVisible = false" x-cloak class="bg-transparent w-full">
        <div class="bg-purple-700 rounded-t-lg w-full p-2">
            <ul class="flex items-center justify-center gap-4">
                @foreach ($kelass->jurusanKelas as $jurusanss)
                    <li><button wire:click='setkelas({{ $jurusanss->id }}, {{ $kelass->id }})'
                            class="text-white font-bold hover:bg-white hover:text-black rounded-lg transition duration-300 ease-in w-full text-lg text-start p-1">{{ $jurusanss->nama }}</button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
