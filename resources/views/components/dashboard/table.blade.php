@if (Request::is('dashboard/anggota') || Request::is('dashboard'))
    <div class="w-full h-auto bg-zinc-300 rounded-2xl px-4 py-4">
        <x-tables.anggota :anggota="$anggota" />
    </div>
@elseif (Request::is('dashboard/buku'))
    <div class="w-full h-auto bg-zinc-300 rounded-2xl px-4 py-4">
        <x-tables.buku :books="$books" :kategories="$kategories" />
    </div>
@elseif(Request::is('dashboard/peminjaman'))
    <div class="w-full h-auto bg-zinc-300 rounded-2xl px-4 py-4">
        <x-tables.peminjaman :buku="$buku" :anggota="$anggota" :peminjaman="$peminjaman" />
    </div>
@elseif (Request::is('dashboard/petugas'))
    <div class="w-full h-auto bg-zinc-300 rounded-2xl px-4 py-4">
        <x-tables.petugas :petugas="$petugas" />
    </div>
@elseif (Request::is('dashboard/pengembalian'))
    <div class="w-full h-auto bg-zinc-300 rounded-2xl px-4 py-4">
        <x-tables.pengembalian :pengembalian="$pengembalian" :peminjaman="$peminjaman" />
    </div>
@endif
