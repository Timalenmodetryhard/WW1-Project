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
                <p class="day">Saturday</p>
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
    include_once __DIR__ . '/layout/event.php';
?>

<section id="booking-form" class="booking-details">
    <h2 class="booking-title">Booking</h2>
    <form method="post">
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
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required min="<?php echo date("Y-M-D")?>">
        </div>
        <div>
            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required min="11:00" max="14:00">
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

<?php
require_once BASE_PATH . "/vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifiez que tous les champs requis sont définis et non vides
    $required_fields = ['name', 'lastname', 'email', 'phone', 'address', 'date', 'time', 'guests', 'more-information'];
    $missing_fields = [];

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $missing_fields[] = $field;
        }
    }

    if (count($missing_fields) > 0) {
        echo 'Please complete all fields: ' . implode(', ', $missing_fields);
    } else {
        // Tous les champs requis sont présents et non vides
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $guests = $_POST['guests'];
        $more_information = $_POST['more-information'];

        $message = file_get_contents(BASE_PATH . '/app/view/layout/mail-booking.html'); 
        $message = str_replace('%name%', $name, $message); 
        $message = str_replace('%email%', $email, $message);
        $message = str_replace('%lastname%', $lastname, $message);
        $message = str_replace('%phone%', $phone, $message);
        $message = str_replace('%address%', $address, $message);
        $message = str_replace('%date%', $date, $message);
        $message = str_replace('%time%', $time, $message);
        $message = str_replace('%guests%', $guests, $message);
        $message = str_replace('%more-information%', $more_information, $message);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'Email is not valid!';
        } else {
            try {
                $mail = new PHPMailer(true);
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 465;
                $mail->SMTPSecure = 'ssl';
                $mail->Username = "leeliandu973@gmail.com";
                $mail->Password = "iifa rdcx yqwf eqki";
                $mail->setFrom("leeliandu973@gmail.com", $name);
                $mail->addAddress('leeliandu973@gmail.com');
                $mail->addCC($email, $name);
                $mail->isHTML(true);
                $mail->Subject = 'Booking visit';
                $mail->msgHTML($message);
                $mail->CharSet = 'UTF-8';
                $mail->Encoding = 'base64';
                $mail->send();
                echo "Mail has been sent successfully!";
                ob_end_flush();
                header("Location: /volunteer");
                exit();
            } catch (Exception $e) {
                echo "Mailer Error: please retry or contact the support.";
            }
        }
    }
}
?>
