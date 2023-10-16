import "./bootstrap";
import "flowbite";
const menu = document.querySelector("#menu");
const sidebar = document.querySelector(".sidebar");
const linkMenu = document.querySelectorAll(".link-menu");

// Cek apakah status sidebar sudah tersimpan di localStorage
const sidebarWidth = localStorage.getItem("sidebarWidth");
if (sidebarWidth) {
    sidebar.classList.add(sidebarWidth);
    if (sidebarWidth === "w-[150px]") {
        sidebar.classList.replace("w-[500px]", "w-[150px]");
        linkMenu.forEach((item) => {
            item.classList.add("hidden");
        });
    }
}

menu.addEventListener("click", function () {
    if (sidebar.classList.contains("w-[500px]")) {
        sidebar.classList.replace("w-[500px]", "w-[150px]");
        linkMenu.forEach((item) => {
            item.classList.add("hidden");
        });
        // Simpan status sidebar ke localStorage
        localStorage.setItem("sidebarWidth", "w-[150px]");
    } else {
        sidebar.classList.replace("w-[150px]", "w-[500px]");
        linkMenu.forEach((item) => {
            item.classList.remove("hidden");
        });
        // Simpan status sidebar ke localStorage
        localStorage.setItem("sidebarWidth", "w-[500px]");
    }
});
