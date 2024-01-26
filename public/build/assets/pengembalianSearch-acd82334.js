import{j as p}from"./jquery-5af47638.js";window.$=p;$(function(){$(".pengembalianSearch").on("input",function(){const n=$(".pengembalianSearch").attr("name"),s=$(this).val();let l="";const d=new URLSearchParams(window.location.search).get("fillter");l="/pengembalian?"+n+"="+encodeURIComponent(s),d==="belum-dikembalikan"&&(l="/pengembalian?fillter=belum-dikembalikan&"+n+"="+encodeURIComponent(s)),history.replaceState(null,null,l),$.ajax({type:"get",url:l,data:{query:s},dataType:"json",success:function(x){let t=x,a=$(".pengembalianContainer");a.empty(),t&&t.tidakDikembalikan&&t.tidakDikembalikan.length===0||t.pengembalian&&t.pengembalian.length===0?(a.removeClass("lg:grid-cols-3"),a.addClass("lg:grid-cols-1"),a.append(`  <div class="flex justify-center items-center flex-col  w-full lg:w-full  lg:ms-2/4  space-y-2 ">
                            <span class="text-5xl">😥</span>
                            <h1 class="text-white font-bold tracking-wider text-3xl text-center lg:text-5xl">Peminjaman Tidak Ditemukan</h1>
                            <p class="text-center text-gray-200 font-medium">Kami tidak menemukan peminjaman yang sesuai dengan kata kunci
                                yang anda
                                cari...</p>
                            <button
                                class="bg-white rounded-xl p-2 font-bold border-none active:scale-75 transition duration-300 ease-in-out" id="hapusPencarianBtn"
                                style="box-shadow: 0 4px 0 5px black">Hapus
                                Pencarian</button>
                        </div>`),$("#hapusPencarianBtn").on("click",function(){const o=new URL(window.location.href);o.searchParams.delete("search"),window.location.href=o.toString()})):(a.removeClass("lg:grid-cols-1"),a.addClass("lg:grid-cols-3"),a.append(`
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
                    `),t.pengembalian?$.each(t.pengembalian,function(o,e){let i=e.peminjaman.anggota.nama,c=i.split(" ")[0],r=i.split(" ")[1]||"",m=(c.charAt(0)+r.charAt(0)).toUpperCase();a.append(`
                                <div class="w-full bg-black/40 shadow-purple-700 relative  shadow-lg rounded-lg py-7 items-center px-3 mb-5 space-y-2 overflow-hidden mx-auto">
                                            <div class="flex justify-between items-center space-x-3">
                                                <div class="flex flex-col justify-center items-center space-y-2">
                                         ${e.peminjaman.anggota.foto?`
                                                                                                                                                                        <img src="../storage/anggota/${e.peminjaman.anggota.foto}"
                                                                                                                                                                            class="w-14 h-14 lg:w-20 lg:h-20 object-cover rounded-full" alt="">`:`<div
                                                                                                                                                                        class="inline-flex items-center justify-center w-14  h-14 md:w-20 md:h-20 lg:w-20 lg:h-20 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                                                                                                                                                        <span
                                                                                                                                                                            class="font-medium text-gray-600 dark:text-gray-300 text-4xl">${m}</span>
                                                                                                                                                                    </div>`}
    
                                ${e.telat?`<span class=" text-white uppercase text-[8px] bg-error px-1 lg:text-xs rounded-xl">${e.peminjaman.status}</span>`:` <span class=" text-black uppercase text-[8px] lg:text-xs bg-success px-1 rounded-xl">${e.peminjaman.status}</span>`}
                        </div>
                        <div class="w-full">
                            <h5 class="font-semibold leading-6 text-lg lg:text-2xl text-gray-300 -mt-3 ">
                                ${e.peminjaman.anggota.nama}
                            </h5>
                            <div class="flex space-x-3 mt-2">
    
                                <div class="text-sm lg:text-lg text-gray-400">
                                    <p class="text-xs lg:text-base">Tgl Peminjaman</p>
                                    <p class="text-[12px] lg:text-sm font-semibold text-gray-300">
                                        ${e.peminjaman.tanggal_pinjam}
                                    </p>
                                </div>
                                <div class="text-sm lg:text-lg text-gray-400">
                                    <p class="text-xs lg:text-base">Tgl Pengembalian</p>
                                    <p class="text-[12px] lg:text-sm font-semibold text-gray-300">${e.tanggal_kembali}
                                    </p>
                                </div>
                            </div>
                            <div class="mt-2">
                                <h6 class="text-gray-300 text-xs lg:text-base">keterangan</h6>
                                <div class="bg-transparent border rounded-lg border-gray-700 p-1 text-gray-400 w-5/6">
                                    ${e.telat?'<p class="text-xs lg:text-sm">Telat mengembalikan Buku</p>':'<p class="text-xs lg:text-sm">Tepat Mengembalikan Buku</p>'}
                                </div>
                            </div>
    
                        </div>
                         <div
                            class="absolute -right-6 -top-[4.4rem] bg-white shadow-md shadow-purple-600 rounded-full h-28 w-28 lg:w-28 lg:h-28 overflow-hidden">
                            <p class="text-black text-[8px] lg:text-[10px] mt-[4.5rem]   ms-5 font-bold flex flex-col">
                                Peminjaman<span
                                    class="text-lg lg:text-2xl ms-4 -mt-1">${e.peminjaman.lama_pinjam}H</span></p>
                        </div>
                    </div>
                </div>`),$('select[name="fillter"]').on("change",function(){$("#formPengembalian").trigger("submit")})}):t.tidakDikembalikan&&$.each(t.tidakDikembalikan,function(o,e){let i=e.anggota.nama,c=i.split(" ")[0],r=i.split(" ")[1]||"",m=(c.charAt(0)+r.charAt(0)).toUpperCase();a.append(`
                                <div class="w-full bg-black/40 shadow-purple-700 relative  shadow-lg rounded-lg py-7 items-center px-3 mb-5 space-y-2 overflow-hidden mx-auto">
                                            <div class="flex justify-between items-center space-x-3">
                                                <div class="flex flex-col justify-center items-center space-y-2">
                                         ${e.anggota.foto?`
                                                                                                                                                                        <img src="../storage/anggota/${e.anggota.foto}"
                                                                                                                                                                            class="w-14 h-14 lg:w-20 lg:h-20 object-cover rounded-full" alt="">`:`<div
                                                                                                                                                                        class="inline-flex items-center justify-center w-14  h-14 md:w-20 md:h-20 lg:w-20 lg:h-20 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                                                                                                                                                        <span
                                                                                                                                                                            class="font-medium text-gray-600 dark:text-gray-300 text-4xl">${m}</span>
                                                                                                                                                                    </div>`}
    
                               
                                        <span class=" text-black uppercase text-[8px] lg:text-xs bg-error text-center font-medium px-1 rounded-xl">Balikin ganteng/cantik</span>
                         </div>
                        <div class="w-full">
                            <h5 class="font-semibold leading-6 text-lg lg:text-2xl text-gray-300 -mt-3 ">
                                ${e.anggota.nama}
                            </h5>
                            <div class="flex space-x-3 mt-2">
    
                                <div class="text-sm lg:text-lg text-gray-400">
                                    <p class="text-xs lg:text-base">Tgl Peminjaman</p>
                                    <p class="text-[12px] lg:text-sm font-semibold text-gray-300">
                                        ${e.tanggal_pinjam}
                                    </p>
                                </div>
                                <div class="text-sm lg:text-lg text-gray-400">
                                    <p class="text-xs lg:text-base">Tgl Pengembalian</p>
                                    <p class="text-[12px] lg:text-sm font-semibold text-gray-300">${e.tanggal_kembali}
                                    </p>
                                </div>
                            </div>
                            <div class="mt-2">
                                <h6 class="text-gray-300 text-xs lg:text-base">keterangan</h6>
                                <div class="bg-transparent border rounded-lg border-gray-700 p-1 text-gray-400 w-5/6">
                                    ${e.telat?'<p class="text-xs lg:text-sm">Telat mengembalikan Buku</p>':'<p class="text-xs lg:text-sm">Tepat Mengembalikan Buku</p>'}
                                </div>
                            </div>
    
                        </div>
                         <div
                            class="absolute -right-6 -top-[4.4rem] bg-white shadow-md shadow-purple-600 rounded-full h-28 w-28 lg:w-28 lg:h-28 overflow-hidden">
                            <p class="text-black text-[8px] lg:text-[10px] mt-[4.5rem]   ms-5 font-bold flex flex-col">
                                Peminjaman<span
                                    class="text-lg lg:text-2xl ms-4 -mt-1">${e.lama_pinjam}H</span></p>
                        </div>
                    </div>
                </div>`),$('select[name="fillter"]').on("change",function(){$("#formPengembalian").trigger("submit")})}))}})})});$('select[name="fillter"]').on("change",function(){$("#formPengembalian").trigger("submit")});window.onscroll=function(){const n=document.querySelector("#header-sticky"),s=document.querySelector(".peminjaman"),l=document.querySelector(".bg-sticky"),g=document.querySelector(".p");window.scrollY>60?(l.classList.add("bgg"),g.classList.add("opacity-0")):(l.classList.remove("bgg"),g.classList.remove("opacity-0")),window.scrollY>80?(n.classList.add("nav-sticky"),s.classList.remove("opacity-0")):(n.classList.remove("nav-sticky"),s.classList.add("opacity-0"))};
