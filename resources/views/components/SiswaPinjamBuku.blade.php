@php
    $isBookBorrowed = false;
    $arrayData = $peminjaman->toArray();
    foreach ($buku->PeminjamanDetail as $item) {
        if ($item->buku_id === $buku->id && in_array($item->peminjaman_id, array_column($arrayData, 'id'))) {
            $isBookBorrowed = true;
            break;
        }
    }

    $peminjamanIds = array_column($arrayData, 'id');
@endphp

@if ($isBookBorrowed)
    <button
        class="bg-transparent border border-purple-500 text-white rounded-lg py-2 px-3 font-medium uppercase mb-7 w-full ">Di
        Pinjam</button>
@else
    <button class="bg-purple-500 text-white rounded-lg py-2 px-3 font-medium uppercase mb-7 w-full"
        onclick="toggleModalPinjam.showModal()">Pinjam sekarang</button>
    <dialog id="toggleModalPinjam" class="modal">
        <div
            class="modal-box w-11/12 max-w-3xl bg-gradient-to-r from-purple-600 via-purple-800 to-purple-700 text-white">
            <h3 class="font-medium text-lg">Mohon isi data berikut:</h3>
            <form action="/siswa/pinjam/{{ $buku->slug }}" method="post">
                @csrf
                <div class="mt-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2">
                    <div class="flex flex-col my-2">
                        <label for="tanggal_pinjam" class="font-medium text-lg">Tanggal Pinjam:</label>
                        <input type="date" name="tanggal_pinjam" placeholder="Type here" id="tanggal_pinjam"
                            class="input input-bordered input-primary text-black w-full max-w-xs" required />
                    </div>
                    <div class="flex flex-col my-2">
                        <label for="lama_pinjam" class="font-medium text-lg">Lama Pinjam:</label>
                        <input type="number" name="lama_pinjam" id="lama_pinjam"
                            class="input input-bordered input-primary text-black w-full max-w-xs" required />
                    </div>
                </div>
                <div class="my-2">
                    <label for="keterangan" class="font-medium text-lg">Keterangan:</label>
                    <textarea name="keterangan" rows="5" class="text-black rounded-lg border-0 w-full" id="keterangan" required></textarea>
                </div>
                <div class="modal-action">
                    <button type="submit" class="btn">Pinjam</button>
            </form>
            <form method="dialog">
                <button
                    class="absolute top-1 right-1 rounded-full text-white px-3 py-1 text-xl hover:bg-gray-400/40">x</button>
            </form>
        </div>
        </div>
    </dialog>
@endif
