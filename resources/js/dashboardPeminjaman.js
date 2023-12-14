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
                    const isChecked = checkedStatus[item.id] ? "checked" : "";
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
