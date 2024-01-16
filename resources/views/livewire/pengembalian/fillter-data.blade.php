<div class="absolute left-4 top-4">
    <select class="select select-primary fillter w-full max-w-xs  bg-purple-500 text-white border-none"
        wire:change='fillter' wire:model='selectedOption'>
        <option value="" class="text-xs lg:text-lg text-white">Semua data</option>
        <option value="dikembalikan" class="text-xs lg:text-lg">Dikembalikan</option>
        <option value="belum-dikembalikan" {{ request('fillter') == 'belum-dikembalikan' ? 'selected' : '' }}
            class="text-xs lg:text-lg">
            Belum
            dikembalikan</option>
        <option value="telat" class="text-xs lg:text-lg">
            Telat</option>
        <option value="aman" class="text-xs lg:text-lg">
            Aman</option>
    </select>
</div>
