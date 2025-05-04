function toggleMenu() {
    const menu = document.getElementById("navMenu");
    if (menu.style.display === "flex") {
        menu.style.display = "none";
    } else {
        menu.style.display = "flex";
        menu.style.flexDirection = "column";
        menu.style.gap = "10px";
        menu.style.marginTop = "10px";
    }
}


function checkWidth() {
    const w = window.innerWidth;
    const menu = document.getElementById("navMenu");
    const hamburger = document.getElementById("hamburger");

    if (w <= 768) {
        hamburger.style.display = "block";
        menu.style.display = "none";
    } else {
        hamburger.style.display = "none";
        menu.style.display = "flex";
        menu.style.flexDirection = "row";
    }
}

window.addEventListener("resize", checkWidth);
window.addEventListener("load", checkWidth);
