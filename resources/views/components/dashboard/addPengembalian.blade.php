<dialog id="add_pengembalian" class="modal">
    <div class="modal-box w-11/12 max-w-5xl lg:overflow-hidden">
        <h3 class="font-bold text-xl text-center text-white uppercase tracking-wide">Balikin buku</h3>
        <hr class="border-neutral-500 my-2 border-dashed">
        <form action="{{ route('pengembalian.store') }}" method="post" enctype="multipart/form-data"
            id="pengembalian-form">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div>
                    <label for="anggota" class="block mb-2 text-sm font-medium text-white ">anggota</label>
                    <select class="select select-bordered w-full max-w-xs bg-white text-black" name="anggota_id"
                        id="pengembalian">
                        <option disabled selected>anggota?</option>
                        @foreach ($peminjaman as $item)
                            <option
                                value="{{ date('Y-m-d', strtotime($item->tanggal_pinjam . '+' . $item->lama_pinjam . ' days')) }}"
                                data-peminjaman-id="{{ $item->id }}">
                                {{ !$item->user_id && $item->petugas_id ? $item->Anggota->nama : $item->Anggota->nama . ' (personal)' }}
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="tanggal_kembali" class="block mb-2 text-sm font-medium text-white ">Tanggal
                        Kembali</label>
                    <input type="date" id="tanggal_kembali" aria-label="disabled input"
                        class="mb-6 bg-gray-100 border border-gray-300 h-12 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ date('Y-m-d') }}" readonly name="tanggal_kembali">
                </div>
                <div id="alasan"></div>
                <button class="btn btn-primary w-full mt-7 lg:col-start-3  lg:row-start-1" type="submit"
                    id='balikin'>Balikin</button>
            </div>
        </form>


        <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button, it will close the modal -->
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
        </div>
    </div>
</dialog>
<script>
    document.addEventListener('livewire:navigated', () => {
        const selectElement = document.querySelector('#pengembalian');
        const tanggalKembali = document.querySelector('#tanggal_kembali');
        const form = document.querySelector('#pengembalian-form');
        const btnBalikin = document.querySelector('#balikin');
        const message = document.querySelector('.message');
        const confirmasi = document.querySelector('.confirmasi');
        selectElement.addEventListener('change', () => {
            const selectedTanggalPinjam = new Date(selectElement.value);

            const currentDate = new Date(tanggalKembali.value);

            const selisihWaktu = selectedTanggalPinjam.getTime() - currentDate.getTime();
            const selisihHari = Math.floor(selisihWaktu / (1000 * 60 * 60 * 24));
            const dateObj = new Date(selectedTanggalPinjam);
            const tanggal = dateObj.getDate();
            if (selectedTanggalPinjam < currentDate) {
                const inputTelat = document.createElement('input');
                inputTelat.type = 'hidden';
                inputTelat.name = 'telat';
                alert("siswa telat mengumpulkan buku")
                inputTelat.value = 1;
                form.appendChild(inputTelat);
            } else {
                console.log('Anda ga telat')
            }
        });
    })
</script>
<script>
    document.addEventListener("livewire:navigated", () => {
        const selectElement = document.getElementById('pengembalian');
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'peminjaman_id';

        selectElement.addEventListener('change', function() {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const peminjamanId = selectedOption.getAttribute('data-peminjaman-id');
            hiddenInput.value = peminjamanId;
        });

        const form = document.querySelector('#pengembalian-form');
        form.appendChild(hiddenInput);
    })
</script>
