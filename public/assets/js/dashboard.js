let btnToggle = document.querySelector(".toggle-menu");
let mobileToggle = document.querySelector(".mobile-toggle-menu");
let btnClose = document.querySelector(".btn-close");
let sidebar = document.querySelector(".sidebar");
let navlink = document.querySelectorAll(".nav-target");

btnToggle.addEventListener("click", () => {
    sidebar.classList.toggle("collapse");

    if (sidebar.classList.contains("collapse")) {
        navlink.forEach((nav) => {
            nav.classList.remove("nav-target");
        });
    } else {
        navlink.forEach((nav) => {
            nav.classList.add("nav-target");
        });
    }
});

mobileToggle.addEventListener("click", () => {
    sidebar.classList.toggle("show");
});

btnClose.addEventListener("click", () => {
    sidebar.classList.remove("show");
});
