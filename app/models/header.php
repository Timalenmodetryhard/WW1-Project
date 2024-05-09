<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WW1 Remembrance Center</title>
  <link rel="stylesheet" href="/css/styletest.css">
  <link rel="icon" href="/img/logo/favicon.png">
  <meta name="keyword" content="portsmouth,ww1,world,war,one,testimony,history,remembrance ">
  <meta name="author" content="WW1 Remembrance Centre">
</head>
<body>
  <header>
    <div class="slideshow-container">
      <div class="mySlides fade">
        <div class="numbertext"></div>
        <img src="/img/caroussel/slideshow1.jpg" style="width:100% ;height:400px">
        <div class="text"></div>
      </div>
      
      <div class="mySlides fade">
        <div class="numbertext"></div>
        <img src="/img/caroussel/slideshow2.jpg" style="width:100%;height:400px">
        <div class="text"></div>
      </div>
      
      <div class="mySlides fade">
        <div class="numbertext"></div>
        <img src="/img/caroussel/slideshow3.jpg" style="width:100%;height:400px">
        <div class="text"></div>
      </div>
      
      </div>
      <br>
      
      <div style="/text-align:center">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
      </div>
      
      <script>
      let slideIndex = 0;
      showSlides();
      
      function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 5000); // Change image every 2 seconds
      }
      </script>
  </header>
  <nav>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Visite</a>
            <ul>
                <li><a href="#">About the Museum</a>
                <li><a href="#">Events</a></li>
                <li><a href="#">Booking & Planning</a></li>
            </ul>
        </li>
        <li><a href="#">Practical Information</a>
            <ul>
                <li><a href="#">How to Find Us</a>
                <li><a href="#">Contact</a></li>
            </ul>
        </li>          
        <li><a href="#">Testimony</a></li>
            <ul>
                <li><a href="#">Battlefield Trips</a>
            </ul>
        </li>  
        <li><a href="#">Help & Volunteer</a>
            <ul>
                <li><a href="#">Volunteering</a></li>
                <li><a href="#">Donation</a></li>
                <li><a href="#">Our Gift Shop</a></li>
                <li><a href="#">Artefact Wanted</a></li>
            </ul>
        </li>
    </ul>
</nav>
