<div class="absolute -top-8 right-2/4 translate-x-2/4">
    <select
        class="select select-primary fillter w-full max-w-xs bg-transparent shadow-xl shadow-purple-800 text-white border-none"
        wire:change='fillter' wire:model='selectedOption'>
        <option value="" class="text-xs lg:text-lg">Semua data</option>
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
