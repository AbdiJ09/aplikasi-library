<dialog id="update_pengembalian{{ $data->id }}" class="modal">
    <div class="modal-box lg:overflow-hidden">
        <h3 class="font-bold text-xl text-center text-white uppercase tracking-wide">Update
            Pengembalian
        </h3>
        <hr class="border-neutral-500 my-2 border-dashed">
        <form action="{{ route('pengembalian.update', $data->id) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <label for="anggota" class="block mb-2 text-sm font-medium text-white ">Anggota</label>
                <select class="select select-bordered w-full  bg-white text-black" name="peminjaman_id"
                    id="pengembalian_buku">
                    <option disabled selected>anggota?</option>
                    @foreach ($peminjaman as $item)
                        @if ($item->status == 'dipinjam')
                            <option value="{{ $item->id }}" data-peminjaman-id="{{ $item->id }}">
                                {{ !$item->user_id && $item->petugas_id ? $item->Anggota->nama : $item->Anggota->nama . ' (personal)' }}
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full btn btn-primary my-3">Submit</button>
        </form>
        <div class="modal-action">
            <button onclick="update_pengembalian{{ $data->id }}.close()"
                class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </div>
    </div>
</dialog>
