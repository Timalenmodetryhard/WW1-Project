<section class="booking-hours">
    <h2 class="booking-title">Booking</h2>
    <article class="opening-hour">
        <div class="open-title">
            <h3 class="hour-title">Opening hours</h3>
        </div>
        <div class="hours">
            <div class="moon-day">
                <p class="day">Monday</p>
                <p class="time">Close</p>
            </div>
            <div class="tue-day">
                <p class="day">Thuesday</p>
                <p class="time">11am - 2pm</p>
            </div>
            <div class="wen-day">
                <p class="day">Wednesday</p>
                <p class="time">11am - 2pm</p>
            </div>
            <div class="thr-day">
                <p class="day">Thursday</p>
                <p class="time">11am - 2pm</p>
            </div>
            <div class="fri-day">
                <p class="day">Friday</p>
                <p class="time">Close</p>
            </div>
            <div class="sat-day">
                <p class="day">Saterday</p>
                <p class="time">Close</p>
            </div>
            <div class="sun-day">
                <p class="day">Sunday</p>
                <p class="time">11am - 2pm</p>
            </div>
        </div>
        <div class="detail-hour">
            <p>Closed Monday, Friday and Saturday, except for special events</p>
        </div>
    </article>
</section>
<?php
    include_once __DIR__ . '\layout\event.php';
?>
<section class="booking-details">
    <h2 class="booking-title">Booking</h2>
    <form action="booking.php" method="post" id="booking-form">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="lastname">Lastname:</label>
            <input type="text" id="lastname" name="lastname" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>
        </div>
        <div>
            <label for="address">Full address:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
        </div>
        <div>
            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>
        </div>
        <div>
            <label for="guests">Guests:</label>
            <input type="number" id="guests" name="guests" required>
        </div>
        <div style="grid-column: span 2;">
            <label for="complement">More information:</label>
            <textarea name="more-information" id="complement"></textarea>
        </div>
        <div style="grid-column: span 2;">
            <input type="submit" value="Book">
        </div>
    </form>
</section>