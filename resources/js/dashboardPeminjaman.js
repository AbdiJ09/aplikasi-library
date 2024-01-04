import { initFlowbite } from "flowbite";
import jQuery from "jquery";
window.$ = jQuery;
document.addEventListener("livewire:navigated", () => {
    initFlowbite();
    $(function () {
        let statusElements = document.querySelectorAll('input[name="status"]');
        let statusIds = [];
        statusElements.forEach(function (element) {
            let statusId = element.dataset.statusId;
            statusIds.push(statusId);
        });

        statusIds.forEach(function (statusId) {
            let peminjamanId = $(`#status_verifikasi${statusId}`).data(
                "status-id",
            );
            $(`#status_verifikasi${statusId}`).on("click", function () {
                const newStatus = "dipinjam";
                $(".notifSuccessStatus").html("");
                $("#status_verifikasi" + peminjamanId).val(newStatus);

                $.ajax({
                    url: `/dashboard/peminjaman/${peminjamanId}`,
                    type: "PATCH",
                    data: {
                        status: newStatus,
                        _token: $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function (response) {
                        $(".notifSuccessStatus").html(
                            `
                                    <div id="alert-border-3" class="flex items-center rounded-lg p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <div class="ms-3 text-sm font-medium">
                                    ${response.message}
                                    </div>
                                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
                                    <span class="sr-only">Dismiss</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    </button>
                                </div>
                                `,
                        );
                    },
                    error: function (error) {
                        console.error("Gagal mengubah status", error);
                    },
                });
            });
        });
    });
    let checkedStatus = {};

    $(function () {
        $("#peminjaman-search").on("input", function () {
            const value = $(this).val();
            $.ajax({
                url: "/dashboard/peminjaman",
                type: "get",
                data: {
                    query: value,
                },
                dataType: "json",
                success: function (data) {
                    const listBuku = data.buku;
                    $(".buku-list").empty();
                    $.each(listBuku, function (i, item) {
                        const isChecked = checkedStatus[item.id]
                            ? "checked"
                            : "";
                        $(".buku-list").append(
                            `
                                   <li>
                                           <div
                                               class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                               ${
                                                   item.jumlah_stok > 0
                                                       ? `
                                                <input id="checkbox-item-${item.id}" type="checkbox" name="buku_id[]"
                                                       value="${item.id}"
                                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                       ${isChecked}>
                                                   <label for="checkbox-item-${item.id}"
                                                       class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">${item.judul}</label>
                                               `
                                                       : ` <input id="checkbox-item-${item.id}" type="checkbox" name="buku_id[]"
                                                       value="${item.id}"
                                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                       disabled>
                                                   <label for="checkbox-item-${item.id}"
                                                       class="w-full ml-2 text-sm font-medium text-gray-400 rounded dark:text-gray-300">${item.judul}</label>`
                                               }
                                           </div>
                                       </li>
                            `,
                        );
                    });
                },
            });
        });

        $(".buku-list").on("change", "input[type='checkbox']", function () {
            const checkboxId = $(this).attr("id");
            const bookId = checkboxId.split("-")[2];
            checkedStatus[bookId] = $(this).is(":checked");
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
});
