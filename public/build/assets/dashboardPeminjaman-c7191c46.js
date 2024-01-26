import{i}from"./index-2630c011.js";import{j as d}from"./jquery-5af47638.js";window.$=d;document.addEventListener("livewire:navigated",()=>{i(),$(function(){let t=document.querySelectorAll('input[name="status"]'),a=[];t.forEach(function(r){let s=r.dataset.statusId;a.push(s)}),a.forEach(function(r){let s=$(`#status_verifikasi${r}`).data("status-id");$(`#status_verifikasi${r}`).on("click",function(){const e="dipinjam";$(".notifSuccessStatus").html(""),$("#status_verifikasi"+s).val(e),$.ajax({url:`/dashboard/peminjaman/${s}`,type:"PATCH",data:{status:e,_token:$('meta[name="csrf-token"]').attr("content")},success:function(n){$(".notifSuccessStatus").html(`
                                    <div id="alert-border-3" class="flex items-center rounded-lg p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <div class="ms-3 text-sm font-medium">
                                    ${n.message}
                                    </div>
                                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
                                    <span class="sr-only">Dismiss</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    </button>
                                </div>
                                `)},error:function(n){console.error("Gagal mengubah status",n)}})})})});let o={};$(function(){$("#peminjaman-search").on("input",function(){const t=$(this).val();$.ajax({url:"/dashboard/peminjaman",type:"get",data:{query:t},dataType:"json",success:function(a){const r=a.buku;$(".buku-list").empty(),$.each(r,function(s,e){const n=o[e.id]?"checked":"";$(".buku-list").append(`
                                   <li>
                                           <div
                                               class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                               ${e.jumlah_stok>0?`
                                                <input id="checkbox-item-${e.id}" type="checkbox" name="buku_id[]"
                                                       value="${e.id}"
                                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                       ${n}>
                                                   <label for="checkbox-item-${e.id}"
                                                       class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">${e.judul}</label>
                                               `:` <input id="checkbox-item-${e.id}" type="checkbox" name="buku_id[]"
                                                       value="${e.id}"
                                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                       disabled>
                                                   <label for="checkbox-item-${e.id}"
                                                       class="w-full ml-2 text-sm font-medium text-gray-400 rounded dark:text-gray-300">${e.judul}</label>`}
                                           </div>
                                       </li>
                            `)})}})}),$(".buku-list").on("change","input[type='checkbox']",function(){const a=$(this).attr("id").split("-")[2];o[a]=$(this).is(":checked")})}),$('select[name="fillter"]').on("change",function(){if($(this).val()===""){const t=new URL(window.location.href);t.searchParams.delete("fillter"),window.location.href=t.toString()}else $("#formPeminjaman").trigger("submit")})});
