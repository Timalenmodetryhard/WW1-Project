<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <style>
      <?php
        include_once __DIR__ . '\css\header.css';
        include_once __DIR__ . '\css\footer.css';
        include_once __DIR__ . '\css\home.css';
        include_once __DIR__ . '\css\event.css';
        include_once __DIR__ . '\css\donation.css';
        include_once __DIR__ . '\css\helpandvolunteer.css';
        include_once __DIR__ . '\css\volunteer.css';
        include_once __DIR__ . '\css\testimony.css';
        include_once __DIR__ . '\css\contactus.css';
        include_once __DIR__ . '\css\praticalinfos.css';
        include_once __DIR__ . '\css\booking.css';
      ?>
    </style>
</head>
<body x-data="{openCon: false, openIns: false}"></body>
<header>  
    <div class="top-header">
      <div class="select-wrapper">
        
        <select id="flag-selector">
          <option value="/img/flags/uk.png">English</option>
          <option value="/img/flags/france.png">Français</option>
          <option value="/img/flags/itali.png">Italia</option>
          <option value="/img/flags/german.png">Deutsch</option>
          <option value="/img/flags/spanish.png">Español</option>
          <option value="/img/flags/china.png">中国人</option>
        </select>
        <div class="selected-image">
          <img id="selected-image" src="/img/flags/uk.png" alt="Selected Flag">
        </div>
      </div>
      <script>
        document.getElementById('flag-selector').addEventListener('change', function() {
          var selectedValue = this.value;
        ment.getElementById('selected-image').src = selectedValue;
        });
      </script>
      <div class="header-title">
        <h1>WWI REMEMBRANCE CENTRE</h1>
      </div>
      <a id="schedule-tour-popup-button" href="/booking#booking-form">Book your visit</a> 
      <img src="img/responsive/burgeur_icone.png" alt="responsiv logo">
    </div>
    <nav class="botom-header"> 
      <ul class="menu">
        <li><a href="/">Home</a></li>
        <li class="menu-option">
          <a>Visit</a>
          <ul class="submenu">

            <li><a href="/booking">Booking Planning</a></li>
          </ul>
        </li>
        <li class="menu-option">
          <a>Practical Information</a>
          <ul class="submenu">
            <li><a href="/praticalinfos">Contact</a></li>
          </ul>
        </li>
        <li>
          <a href="/testimony">Testimony</a>
        </li>
        <li class="menu-option">
          <a>Help & Volunteer</a>
          <ul class="submenu">
            <li><a href="/helpandvolunteer">Guideline</a></li>
            <li><a href="/volunteer">Volunteer</a></li>
            <li><a href="#">Our Gift Shop</a></li>
          </ul>
        </li>
      </ul>      
    </nav>

    <script src="script/burgeur.js"></script>
    <script src="script/header_scroll.js"></script>
  </div>
  </header>
  <div class="fake-header"></div>