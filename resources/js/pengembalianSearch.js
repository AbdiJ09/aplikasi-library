$(function () {
    $(".pengembalianSearch").on("input", function () {
        const request = $(".pengembalianSearch").attr("name");
        const query = $(this).val();
        let url = "";

        url = "/pengembalian?" + request + "=" + encodeURIComponent(query);

        history.replaceState(null, null, url);
        $.ajax({
            type: "get",
            url: url,
            data: {
                query: query,
            },
            dataType: "json",
            success: function (data) {
                let pengembalian = data.pengembalian;
                let pengembalianContainer = $(".pengembalianContainer");
                pengembalianContainer.empty();
                if (pengembalian.length === 0) {
                    pengembalianContainer.removeClass("lg:grid-cols-3");
                    pengembalianContainer.addClass("lg:grid-cols-1");
                    pengembalianContainer.append(
                        `  <div class="flex justify-center items-center flex-col  w-full lg:w-full  lg:ms-2/4  space-y-2 ">
                            <span class="text-5xl">😥</span>
                            <h1 class="text-white font-bold tracking-wider text-3xl text-center lg:text-5xl">Peminjaman Tidak Ditemukan</h1>
                            <p class="text-center text-gray-200 font-medium">Kami tidak menemukan peminjaman yang sesuai dengan kata kunci
                                yang anda
                                cari...</p>
                            <button
                                class="bg-white rounded-xl p-2 font-bold border-none active:scale-75 transition duration-300 ease-in-out" id="hapusPencarianBtn"
                                style="box-shadow: 0 4px 0 5px black">Hapus
                                Pencarian</button>
                        </div>`,
                    );
                    $("#hapusPencarianBtn").on("click", function () {
                        const url = new URL(window.location.href);
                        url.searchParams.delete("search");
                        window.location.href = url.toString();
                    });
                } else {
                    pengembalianContainer.removeClass("lg:grid-cols-1");
                    pengembalianContainer.addClass("lg:grid-cols-3");
                    pengembalianContainer.append(`
                        <form action="/pengembalian" id="formPengembalian"
                                class="absolute -top-8 right-2/4 translate-x-2/4" method="get">
                                <select
                                    class="select select-primary fillter w-full max-w-xs  bg-transparent shadow-xl shadow-purple-800 text-white border-none "
                                    name="fillter">
                                    <option value="" class="text-xs lg:text-lg">Semua data</option>
                                    <option value="dikembalikan" class="text-xs lg:text-lg">Dikembalikan</option>
                                    <option value="belum-dikembalikan" class="text-xs lg:text-lg">Belum dikembalikan</option>
                                    <option value="telat" class="text-xs lg:text-lg">Telat</option>
                                    <option value="aman" class="text-xs lg:text-lg">Aman</option>
                                </select>
                            </form>
                    `);
                    $.each(pengembalian, function (key, value) {
                        let nama = value.peminjaman.anggota.nama;
                        let nama_depan = nama.split(" ")[0];
                        let nama_belakang = nama.split(" ")[1] || "";
                        let inisial = (
                            nama_depan.charAt(0) + nama_belakang.charAt(0)
                        ).toUpperCase();
                        pengembalianContainer.append(
                            ` 
                            <div class="w-full bg-black/40 shadow-purple-700 relative  shadow-lg rounded-lg py-7 items-center px-3 mb-5 space-y-2 overflow-hidden mx-auto">
                                        <div class="flex justify-between items-center space-x-3">
                                            <div class="flex flex-col justify-center items-center space-y-2">
                                     ${
                                         value.peminjaman.anggota.foto
                                             ? `
                                                                                                                                                                    <img src="../storage/anggota/${value.peminjaman.anggota.foto}"
                                                                                                                                                                        class="w-14 h-14 lg:w-20 lg:h-20 object-cover rounded-full" alt="">`
                                             : `<div
                                                                                                                                                                    class="inline-flex items-center justify-center w-14  h-14 md:w-20 md:h-20 lg:w-20 lg:h-20 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                                                                                                                                                    <span
                                                                                                                                                                        class="font-medium text-gray-600 dark:text-gray-300 text-4xl">${inisial}</span>
                                                                                                                                                                </div>`
                                     }

                            ${
                                value.telat
                                    ? `<span class=" text-white uppercase text-[8px] bg-error px-1 lg:text-xs rounded-xl">${value.peminjaman.status}</span>`
                                    : ` <span class=" text-black uppercase text-[8px] lg:text-xs bg-success px-1 rounded-xl">${value.peminjaman.status}</span>`
                            }
                    </div>
                    <div class="w-full">
                        <h5 class="font-semibold leading-6 text-lg lg:text-2xl text-gray-300 -mt-3 ">
                            ${value.peminjaman.anggota.nama}
                        </h5>
                        <div class="flex space-x-3 mt-2">

                            <div class="text-sm lg:text-lg text-gray-400">
                                <p class="text-xs lg:text-base">Tgl Peminjaman</p>
                                <p class="text-[12px] lg:text-sm font-semibold text-gray-300">
                                    ${value.peminjaman.tanggal_pinjam}
                                </p>
                            </div>
                            <div class="text-sm lg:text-lg text-gray-400">
                                <p class="text-xs lg:text-base">Tgl Pengembalian</p>
                                <p class="text-[12px] lg:text-sm font-semibold text-gray-300">${
                                    value.tanggal_kembali
                                }
                                </p>
                            </div>
                        </div>
                        <div class="mt-2">
                            <h6 class="text-gray-300 text-xs lg:text-base">keterangan</h6>
                            <div class="bg-transparent border rounded-lg border-gray-700 p-1 text-gray-400 w-5/6">
                                ${
                                    value.telat
                                        ? `<p class="text-xs lg:text-sm">Telat mengembalikan Buku</p>`
                                        : `<p class="text-xs lg:text-sm">Tepat Mengembalikan Buku</p>`
                                }
                            </div>
                        </div>

                    </div>
                     <div
                        class="absolute -right-6 -top-[4.4rem] bg-white shadow-md shadow-purple-600 rounded-full h-28 w-28 lg:w-28 lg:h-28 overflow-hidden">
                        <p class="text-black text-[8px] lg:text-[10px] mt-[4.5rem]   ms-5 font-bold flex flex-col">
                            Peminjaman<span
                                class="text-lg lg:text-2xl ms-4 -mt-1">${
                                    value.peminjaman.lama_pinjam
                                }H</span></p>
                    </div>
                </div>
            </div>`,
                        );
                        $('select[name="fillter"]').on("change", function () {
                            $("#formPengembalian").trigger("submit");
                        });
                    });
                }
            },
        });
    });
});
$('select[name="fillter"]').on("change", function () {
    $("#formPengembalian").trigger("submit");
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
