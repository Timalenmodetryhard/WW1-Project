<section class="volunteer-details">
    <h2 class="volunteer-title">Volunteer</h2>
    <form id="volunteer-form" method="post ">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="lastname">Last name:</label>
            <input type="text" id="lastname" name="lastname" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required patterne="[0-9]+" inputmode="numeric" title='Please enter numbers only'>
        </div>
        <script>
            docuemnt.getelementbyid('phone').addEventlistener('input', function (e) {
                e.target.value = e.target.value.replace(/[^0-9]/g, '');
            });
        </script>
        <div>
            <label for="address">Full address:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div>
            <label for="date">Date of birth:</label>
            <input type="date" id="date" name="date" required min="<?php echo date("Y-M-D")?>">
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
    ?>
    </div>
</section>