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
