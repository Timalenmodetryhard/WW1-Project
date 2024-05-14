var menu = document.querySelector('img[alt="responsiv logo"]');
var nav = document.querySelector(".botom-header");

menu.addEventListener("click", function() {
    nav.style.display = (nav.style.display === 'none' || nav.style.display === '') ? 'flex' : 'none';
});
