document.addEventListener("livewire:navigated", () => {
    const menu = document.querySelector("#menu");
    const sidebar = document.querySelector(".sidebar");
    const linkMenu = document.querySelectorAll(".link-menu");
    const navBar = document.querySelectorAll(".navBar");
    const sidebarWidth = localStorage.getItem("sidebarWidth");
    const linkItem = localStorage.getItem("navBar");
    if (sidebarWidth && linkItem) {
        if (window.innerWidth < 768) {
            localStorage.removeItem("sidebarWidth");
        } else {
            sidebar.classList.add(sidebarWidth);
            navBar.forEach((item) => {
                item.classList.add(linkItem);
            });
            if (sidebarWidth === "w-[100px]") {
                sidebar.classList.replace("w-[300px]", "w-[100px]");
                navBar.forEach((item) => {
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
                navBar.forEach((item) => {
                    item.classList.replace("w-44", "w-fit");
                });
                linkMenu.forEach((item) => {
                    item.classList.add("hidden");
                });
                localStorage.setItem("navBar", "w-fit");
                localStorage.setItem("sidebarWidth", "w-[100px]");
            } else {
                sidebar.classList.replace("w-[100px]", "w-[300px]");
                navBar.forEach((item) => {
                    item.classList.replace("w-fit", "w-44");
                });
                linkMenu.forEach((item) => {
                    item.classList.remove("hidden");
                });
                localStorage.setItem("navBar", "w-44");
                localStorage.setItem("sidebarWidth", "w-[300px]");
            }
        }
    });
});
