const btn = document.querySelector("#mobile-btn");
const menu = document.querySelector("#mobile-menu");

btn.addEventListener("click", () => {
    console.log("test");
    menu.classList.toggle("hidden");
});
