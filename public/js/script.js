const hamburgerButton = document.querySelector("#hamburger-button");
const hamburgerMenu = document.querySelector("#hamburger-menu");

hamburgerButton.addEventListener("click", function () {
    hamburgerButton.classList.toggle("hamburger-active");

    if (hamburgerMenu.classList.contains("scale-0")) {
        hamburgerMenu.classList.replace("scale-0", "scale-1");
    } else {
        hamburgerMenu.classList.replace("scale-1", "scale-0");
    }
});
