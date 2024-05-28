<section class="volunteer-details">
    <h2 class="volunteer-title">Volunteer</h2>
    <form method="post">
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
            <label for="date">Birth date:</label>
            <input type="date" id="date" name="date" required>
        </div>
        <div>
            <label for="roles">Roles:</label>
            <fieldset class="fieldset" name="roles" required>
                <div>
                    <input type="radio" class="role" name="role" value="guide" required>
                    <label for="guide">Guide</label>
                </div>
                <div>
                    <input type="radio" class="role" name="role" value="cleaner" required>
                    <label for="cleaner">Cleaner</label>
                </div>
                <div>
                    <input type="radio" class="role" name="role" value="reception" required>
                    <label for="reception">Reception</label>
                </div>
                <div>
                    <input type="radio" class="role" name="role" value="security" required>
                    <label for="security">Security</label>
                </div>
            </fieldset>
        </div>
        <div style="grid-column: span 2;">
            <label for="complement">More information:</label>
            <textarea name="more-information" id="complement"></textarea>
        </div>
        <div style="grid-column: span 2;">
            <input type="submit" value="Send">
        </div>
    </form>
    <?php
    if (isset($POST_["more-information"])){
        $message = "This message has been sent from the Volunteer Page of the site WW1 Remembrance Centre
        Name : " . $POST_["name"] . "
        Email : " . $POST_["email"] . "
        Phone : " . $POST_["phone"] . "
        address : " . $POST_["address"] . "
        Birth date : " . $POST_["date"] . "
        Message : " . $POST["more-information"];
        $retour = mail("leeliandu973@gmail.com", "Volunteer", $POST_["more-information"], "From:contact@exemplesite.fr" . "\r\n" . "Reply-To" . $POST_["email"]);
        if ($retour) {
            echo "<p>Le mail a bien été envoyé</p>";
        }
    }
    ?>
</section>