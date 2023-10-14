const menu = document.querySelector("#menu");
const sidebar = document.querySelector(".sidebar");
const linkMenu = document.querySelector(".link-menu");
menu.addEventListener("click", function () {
    if (sidebar.classList.contains("w-[500px]")) {
        sidebar.classList.replace("w-[500px]", "w-[150px]");
        linkMenu.classList.add("hidden");
    } else {
        sidebar.classList.replace("w-[150px]", "w-[500px]");
        linkMenu.classList.remove("hidden");
    }
});
