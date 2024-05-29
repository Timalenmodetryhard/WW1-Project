 document.addEventListener("DOMContentLoaded", function() {
  const header = document.querySelector("header");
  const headerHeight = header.offsetHeight;
  let lastScrollY = window.scrollY;

  window.addEventListener("scroll", function() {
    if (window.scrollY > headerHeight) {
      if (window.scrollY > lastScrollY) {
        // Scrolling down
        header.classList.add("hide-header");
        header.classList.remove("show-header");
      } else {
        // Scrolling up
        header.classList.remove("hide-header");
        header.classList.add("show-header");
      }
    } else {
      // If the user is above the header height, always show the header
      header.classList.remove("hide-header");
      header.classList.add("show-header");
    }
    lastScrollY = window.scrollY;
  });
});

