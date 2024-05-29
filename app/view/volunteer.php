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
    <div class="volunteer-error">
    <?php
    require_once  BASE_PATH . "/vendor/autoload.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $mail = new PHPMailer (true);
    if (isset($_POST["more-information"])) {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo 'Email is not valid!';
        }
        if (empty($_POST['email']) || empty($_POST['name']) || empty($_POST['more-information'])) {
            echo 'Please complete all fields!';
        } 
        try {
            $mail->SMTPDebug = 0;    
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';  
            $mail->Username = "leeliandu973@gmail.com";
            $mail->Password = "iifa rdcx yqwf eqki";
            $mail->setFrom("leeliandu973@gmail.com", '');
            $mail->addAddress('leeliandu973@gmail.com');
            $mail->addCC($_POST["email"], 'Volunteer');
            $mail->isHTML(true);
            $mail->Subject = 'Volunteer proposal';
            $mail->Body = $_POST['more-information'];
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';
            $mail->send();
            echo "Mail has been sent successfully!";
            header("Location: /volunteer");
            exit();
        } catch (Exception $e) {
            echo "Mailer Error:please retry or contact the support.";
        }
    }
    /*
    $responses = [];
    // Check if the form was submitted
    if (isset($_POST['email'], $_POST['name'], $_POST['more-information'])) {
        // Validate email adress
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $responses[] = 'Email is not valid!';
        }
        // Make sure the form fields are not empty
        if (empty($_POST['email']) || empty($_POST['name']) || empty($_POST['more-information'])) {
            $responses[] = 'Please complete all fields!';
        } 
        // If there are no errors
        if (!$responses) {
            // Where to send the mail? It should be your email address
            $to      = 'leeliandu972@gmail.com';
            // Send mail from which email address?
            $from = 'leeliandu973@gmail.com';
            // Mail subject
            $subject = "Volunteer";
            // Mail message
            $message = $_POST['more-information'];
            // Mail headers
            $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $_POST['email'] . "\r\n" . 'X-Mailer: PHP/' . phpversion();
            // Try to send the mail
            if (mail($to, $subject, $message, $headers)) {
                // Success
                $responses[] = 'Message sent!';		
            } else {
                // Fail
                $responses[] = 'Message could not be sent! Please check your mail server settings!';
            }
        }
    */
    ?>
    </div>
</section>