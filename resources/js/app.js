import "./bootstrap";
import "flowbite";
import jQuery from "jquery";
import Alpine from "alpinejs";
import { doc } from "prettier";

window.Alpine = Alpine;

Alpine.start();

window.$ = jQuery;
$(document).ready(function () {
    $("#default-search").on("keyup", function () {
        const query = $(this).val();
        $.ajax({
            type: "get",
            url: "/search",
            data: {
                search: query,
            },
            dataType: "json",
            success: function (data) {
                let buku = data.buku;
                let bukuContainer = $(".buku");
                let notFound = $(".notFound");
                notFound.empty();
                bukuContainer.empty();
                if (buku.length === 0) {
                    let notFoundHtml = `
                        <div class="bg-transparent overflow-hidden h-auto flex flex-col items-center justify-center ">
                           <div class="mt-24 m-auto overflow-hidden">
         <svg class="emoji-404 w-2/4 mx-auto" enable-background="new 0 0 226 249.135" height="249.135" id="Layer_1"
             overflow="visible" version="1.1" viewBox="0 0 226 249.135" width="226" xml:space="preserve">
             <circle cx="113" cy="113" fill="#FFE585" r="109" />
             <line enable-background="new    " fill="none" opacity="0.29" stroke="#6E6E96" stroke-linecap="round"
                 stroke-linejoin="round" stroke-width="8" x1="88.866" x2="136.866" y1="245.135" y2="245.135" />
             <line enable-background="new    " fill="none" opacity="0.17" stroke="#6E6E96" stroke-linecap="round"
                 stroke-linejoin="round" stroke-width="8" x1="154.732" x2="168.732" y1="245.135" y2="245.135" />
             <line enable-background="new    " fill="none" opacity="0.17" stroke="#6E6E96" stroke-linecap="round"
                 stroke-linejoin="round" stroke-width="8" x1="69.732" x2="58.732" y1="245.135" y2="245.135" />
             <circle cx="68.732" cy="93" fill="#6E6E96" r="9" />
             <path
                 d="M115.568,5.947c-1.026,0-2.049,0.017-3.069,0.045  c54.425,1.551,98.069,46.155,98.069,100.955c0,55.781-45.219,101-101,101c-55.781,0-101-45.219-101-101  c0-8.786,1.124-17.309,3.232-25.436c-3.393,10.536-5.232,21.771-5.232,33.436c0,60.199,48.801,109,109,109s109-48.801,109-109  S175.768,5.947,115.568,5.947z"
                 enable-background="new    " fill="#FF9900" opacity="0.24" />
             <circle cx="156.398" cy="93" fill="#6E6E96" r="9" />
             <ellipse cx="67.732" cy="140.894" enable-background="new    " fill="#FF0000" opacity="0.18"
                 rx="17.372" ry="8.106" />
             <ellipse cx="154.88" cy="140.894" enable-background="new    " fill="#FF0000" opacity="0.18"
                 rx="17.371" ry="8.106" />
             <path
                 d="M13,118.5C13,61.338,59.338,15,116.5,15c55.922,0,101.477,44.353,103.427,99.797  c0.044-1.261,0.073-2.525,0.073-3.797C220,50.802,171.199,2,111,2S2,50.802,2,111c0,50.111,33.818,92.318,79.876,105.06  C41.743,201.814,13,163.518,13,118.5z"
                 fill="#FFEFB5" />
             <circle cx="113" cy="113" fill="none" r="109" stroke="#6E6E96" stroke-width="8" />
         </svg>
         <div class=" tracking-widest m-auto">
             <span class="text-gray-500 text-6xl text-center block"><span>4 0 4</span></span>
             <span class="text-gray-500 text-xl text-center block">Sorry, We couldn't find what you are looking
                 for!</span>

         </div>
         <div class="mt-10 mx-auto block text-center">
             <a href="/buku" class="text-gray-500 font-mono text-xl bg-gray-200 p-3 rounded-md hover:shadow-md">Go
                 back </a>
         </div>
     </div>
                        </div>`;
                    notFound.append(notFoundHtml);
                } else {
                    $.each(buku, function (index, item) {
                        // Buat tampilan buku sesuai kebutuhan
                        let bukuHtml = `<div class="group  relative cursor-pointer items-center justify-center overflow-hidden transition-shadow hover:shadow-xl hover:shadow-black/30 rounded-lg lg:w-4/5">
                                        <div class="h-full w-full">
                                            <img class="h-full w-full object-cover  transition-transform duration-500 group-hover:rotate-3 group-hover:scale-125" src="storage/buku/${item.gambar}" alt="" />
                                        </div>
                                            <div
                                                class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/80 group-hover:from-black/70 group-hover:via-black/60  group-hover:to-black/70">
                                            </div>
                                             <div
                            class="absolute inset-0 flex translate-y-[100%] flex-col items-center justify-center  md:px-0 text-center transition-all duration-500 group-hover:translate-y-0">
                            <h1 class="font-dmserif text-sm md:text-xl font-bold text-white">${item.judul}</h1>
    
                            <div class="flex items-center mt-2">
                                <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <p class="ml-2  text-sm font-bold text-white dark:text-white">4.95</p>
                                <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                                <a href="#"
                                    class="text-sm font-medium text-white underline hover:no-underline dark:text-white">73
                                    reviews</a>
                            </div>
                            <a href="/book/${item.slug}">
    
                                <button
                                    class="rounded-full bg-neutral-900 py-2 px-3.5 font-com text-sm capitalize text-white shadow shadow-black/60 mt-2">See
                                    More</button>
                            </a>
    
                        </div>
                                    </div>`;
                        bukuContainer.append(bukuHtml);
                    });
                }
            },
        });
    });
});
