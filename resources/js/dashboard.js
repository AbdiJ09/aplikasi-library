const menu = document.querySelector("#menu");
const sidebar = document.querySelector(".sidebar");
const linkMenu = document.querySelectorAll(".link-menu");
const conss = document.querySelectorAll(".conss");
const sidebarWidth = localStorage.getItem("sidebarWidth");
const linkItem = localStorage.getItem("conss");
if (sidebarWidth && linkItem) {
    if (window.innerWidth < 768) {
        localStorage.removeItem("sidebarWidth");
    } else {
        sidebar.classList.add(sidebarWidth);
        conss.forEach((item) => {
            item.classList.add(linkItem);
        });
        if (sidebarWidth === "w-[100px]") {
            sidebar.classList.replace("w-[300px]", "w-[100px]");
            conss.forEach((item) => {
                item.classList.replace("w-44", "w-fit");
            });
            linkMenu.forEach((item) => {
                item.classList.add("hidden");
            });
        }
    }
}

menu.addEventListener("click", function () {
    if (window.innerWidth < 768) {
        sidebar.classList.toggle("hidden");
    } else if (window.innerWidth >= 768) {
        sidebar.classList.toggle("hidden");
        if (sidebar.classList.contains("w-[300px]")) {
            sidebar.classList.replace("w-[300px]", "w-[100px]");
            conss.forEach((item) => {
                item.classList.replace("w-44", "w-fit");
            });
            linkMenu.forEach((item) => {
                item.classList.add("hidden");
            });
            localStorage.setItem("conss", "w-fit");
            localStorage.setItem("sidebarWidth", "w-[100px]");
        } else {
            sidebar.classList.replace("w-[100px]", "w-[300px]");
            conss.forEach((item) => {
                item.classList.replace("w-fit", "w-44");
            });
            linkMenu.forEach((item) => {
                item.classList.remove("hidden");
            });
            localStorage.setItem("conss", "w-44");
            localStorage.setItem("sidebarWidth", "w-[300px]");
        }
    }
});
