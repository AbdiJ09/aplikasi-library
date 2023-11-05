<dialog id="detail_peminjaman{{ $peminjaman->id }}" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box bg-cover bg-center lg:w-full lg:max-w-2xl overflow-x-hidden"
        style="background-image: url('/img/dashboard/bgg.png'),linear-gradient(rgba(255, 255, 255, 0.801), rgba(121, 29, 226, 0.5))">
        <div class="flex flex-col space-y-2 justify-center items-center py-3">
            <img src="{{ '../storage/anggota/' . $peminjaman->Anggota->foto }}"
                class="w-24 h-24 rounded-full mx-auto border-2 object-cover object-center" alt="">
            <h1 class="text-white font-semibold text-lg tracking-wide uppercase">{{ $peminjaman->Anggota->nama }}</h1>
        </div>
        <div class="grid grid-cols-4 justify-items-center content-center mt-3 bg-white rounded-xl p-2">
            <span></span>
            <h4 class="text-xs
            text-neutral-700 font-bold">Tanggal pinjam</h4>
            <h4 class="text-xs text-neutral-700 font-bold">Lama pinjam</h4>
            <h4 class="text-xs text-neutral-700 font-bold">Status</h4>

        </div>
        @foreach ($peminjaman->PeminjamanDetail as $item)
            <div class="w-full p-1 shadow-xl bg-zinc-200 rounded-xl relative my-3 ">
                <div class="grid grid-cols-4 content-center h-10 justify-items-center">
                    <img src="{{ '../storage/buku/' . $item->Buku->gambar }}"
                        class="w-8 h-8 absolute top-2/4 -translate-y-2/4 left-2 rounded-full cursor-pointer object-cover object-center"
                        alt="">
                    <span></span>
                    <h4 class="text-xs text-neutral-700">{{ $item->Buku->judul }}</h4>
                    <h4 class="text-xs text-neutral-700">{{ $peminjaman->lama_pinjam }}</h4>
                    <h4 class="text-xs text-neutral-700">{{ $peminjaman->status }}</h4>

                </div>
            </div>
        @endforeach

        <div class="modal-action">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-black">✕</button>
            </form>
        </div>
    </div>
</dialog>
