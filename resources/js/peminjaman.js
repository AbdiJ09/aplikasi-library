$(function () {
    $(".formPeminjaman").on("submit", function (e) {
        e.preventDefault();
    });
    $(".peminjamanSearch").on("input", function () {
        const request = $(".peminjamanSearch").attr("name");
        const anggota = $("#anggota").val().trim();
        const query = $(this).val();
        let url = "peminjaman";
        if (anggota === "") {
            url = `/peminjaman?${request}=${encodeURIComponent(query)}`;
        } else {
            url = `/peminjaman?anggota=${anggota}&${request}=${encodeURIComponent(
                query,
            )}`;
        }
        history.replaceState(null, null, url);
        $.ajax({
            type: "get",
            url: url,
            data: {
                q: query,
            },
            dataType: "json",
            success: function (data) {
                let peminjaman = data.peminjaman;
                let peminjamanContainer = $(".peminjaman-container");
                peminjamanContainer.empty();
                if (peminjaman.length === 0) {
                    peminjamanContainer.removeClass("lg:grid-cols-3");
                    peminjamanContainer.addClass("lg:grid-cols-1");
                    peminjamanContainer.append(
                        `  <div class="flex justify-center items-center flex-col  w-full lg:w-full     space-y-2 ">
                            <span class="text-5xl">😥</span>
                            <h1 class="text-white font-bold tracking-wider text-3xl text-center lg:text-5xl">Peminjaman Tidak Ditemukan</h1>
                            <p class="text-center text-gray-200 font-medium">Kami tidak menemukan peminjaman yang sesuai dengan kata kunci
                                yang anda
                                cari...</p>
                            <button
                                class="bg-white rounded-xl p-2 font-bold border-none active:scale-75 transition duration-300 ease-in-out" id="hapusPencarianBtn"
                                style="box-shadow: 0 4px 0 5px #480777">Hapus
                                Pencarian</button>
                        </div>`,
                    );
                    $("#hapusPencarianBtn").on("click", function () {
                        const url = new URL(window.location.href);
                        url.searchParams.delete("search");

                        // Memuat ulang halaman dengan URL yang sudah diubah
                        window.location.href = url.toString();
                    });
                } else {
                    $.each(peminjaman, function (key, value) {
                        peminjamanContainer.removeClass("lg:grid-cols-1");
                        peminjamanContainer.addClass("lg:grid-cols-3");
                        $.each(value.peminjaman_detail, function (index, buku) {
                            const gambar = buku.buku.gambar
                                ? "../storage/buku/" + buku.buku.gambar
                                : "";
                            peminjamanContainer.append(`
                                                    <div class ="w-full bg-black/40 shadow-purple-700 relative  shadow-xl rounded-lg  h-44 flex m-auto items-center px-3 mb-5 mt-3 overflow-hidden py-2">
                                                        <img class="w-20 rounded-lg border border-purple-500" src="${gambar}" class="object-cover object-center" alt />
                                                        <div class="px-3 space-y-2">
                                                            <span class="font-semibold text-white ">${buku.buku.judul}</span>
                                                                    <h4 class = "text-purple-600 font-semibold uppercase decoration-purple-500 text-lg tracking-wide"
                                                                        style="text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5)">
                                                                        ${value.anggota.nama}
                                                                    </h4>
                                                            <div class="w-fit bg-gradient-to-r from-purple-500 to-purple-800 p-1 rounded-lg">
                                                            <p class="text-white font-medium">Tgl Pinjam : ${value.tanggal_pinjam}</p>
                                                                </div>

                                                            <span class="badge bg-white border-none badge-md font-bold uppercase">${value.status}</button>
                                                        </div>
                                                    </div>
                                                `);
                        });
                    });
                }
            },
        });
    });
});

$('select[name="fillter"]').on("change", function () {
    // Check if the selected value is empty
    if ($(this).val() === "") {
        const url = new URL(window.location.href);
        url.searchParams.delete("fillter");

        window.location.href = url.toString();
    } else {
        // If not empty, submit the form
        $("#formPeminjaman").trigger("submit");
    }
});
window.onscroll = function () {
    const headerSticky = document.querySelector("#header-sticky");
    const peminjaman = document.querySelector(".peminjaman");
    const bgSticky = document.querySelector(".bg-sticky");
    const textPeminjaman = document.querySelector(".p");
    if (window.scrollY > 60) {
        bgSticky.classList.add("bgg");
        textPeminjaman.classList.add("opacity-0");
    } else {
        bgSticky.classList.remove("bgg");
        textPeminjaman.classList.remove("opacity-0");
    }
    if (window.scrollY > 80) {
        headerSticky.classList.add("nav-sticky");
        peminjaman.classList.remove("opacity-0");
    } else {
        headerSticky.classList.remove("nav-sticky");
        peminjaman.classList.add("opacity-0");
    }
};
