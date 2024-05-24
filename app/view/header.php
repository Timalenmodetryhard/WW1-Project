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
        include_once __DIR__ . '\css\testimony.css';
        include_once __DIR__ . '\css\contactus.css';
      ?>
    </style>
</head>
<body x-data="{openCon: false, openIns: false}"></body>
<header>  
    <div class="top-header">
      <div class="select-wrapper">
        
        <select id="flag-selector">
          <option value="img/flags/uk.png">English</option>
          <option value="img/flags/france.png">Français</option>
          <option value="img/flags/itali.png">Italia</option>
          <option value="img/flags/german.png">Deutsch</option>
          <option value="img/flags/spanish.png">Español</option>
          <option value="img/flags/china.png">中国人</option>
        </select>
        <div class="selected-image">
          <img id="selected-image" src="img/flags/uk.png" alt="Selected Flag">
        </div>
      </div>
      <script>
        document.getElementById('flag-selector').addEventListener('change', function() {
          var selectedValue = this.value;
        ment.getElementById('selected-image').src = selectedValue;
        });
      </script>
      <div class="header-title">
        <h1>WWI REMEMBRANCE CENTER</h1>
      </div>
      <button type="button" id="schedule-tour-popup-button">Book your visit</button> 
      <img src="img/responsive/burgeur_icone.png" alt="responsiv logo">
    </div>
    <nav class="botom-header"> 
      <ul class="menu">
        <li><a href="/">Home</a></li>
        <li>
          <a href="#">Visit</a>
          <ul class="submenu">
            <li><a href="#">Events</a></li>
            <li><a href="#">Booking Planning</a></li>
          </ul>
        </li>
        <li>
          <a href="/praticalinfos">Practical Information</a>
          <ul class="submenu">
            <li><a href="#">How to find Us</a></li>
            <li><a href="#">About the museum</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </li>
        <li>
          <a href="/testimony">Testimony</a>
        </li>
        <li>
          <a href="/helpandvolunteer">Help & Volunteer</a>
          <ol class="submenu">
            <li><a href="#">Voluntary</a></li>
            <li><a href="#">Donation</a></li>
            <li><a href="#">Our gift shop</a></li>
            <li><a href="#">Artifact wanted</a></li>
          </ol>
        </li>
      </ul>      
    </nav>

    <script src="script/burgeur.js"></script>

  </div>
  </header>