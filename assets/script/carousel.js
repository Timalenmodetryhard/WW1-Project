document.addEventListener("DOMContentLoaded", function () {
  const videos = document.querySelectorAll(".carousel-video");
  let currentVideoIndex = 0;

  function playNextVideo() {
      videos[currentVideoIndex].classList.remove("active");
      currentVideoIndex = (currentVideoIndex + 1) % videos.length;
      videos[currentVideoIndex].classList.add("active");
      videos[currentVideoIndex].play();
  }

  videos.forEach((video, index) => {
      video.addEventListener("ended", playNextVideo);

      if (index === 0) {
          video.classList.add("active");
          video.play();
      }
  });
});