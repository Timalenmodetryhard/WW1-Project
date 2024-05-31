<section class="contactus">
    <h1 class="title-page">Contact us</h1>
    <div class="elements">
        <form method="post">
            <article>
                <label for="Contact">Contact :</label>

                <div>
                    <label for="phone">Phone number :</label>
                    <input type="tel" id="pnumber" name="pnumber">
                </div>
                <div>
                    <label for="E-mail">E-mail :</label>
                    <input type="email" id="mail" name="email">
                </div>
                <div>
                    <label for="fname">Full name :</label>
                    <input type="text" id="fname" name="fname">
                </div>
                <div>
                    <label for="text">Address :</label>
                    <input type="text" id="maps" name="maps">
                </div>
            </article>
        
            <article>
                <label for="content">Content :</label><br>
                <textarea name="content" id="content"></textarea>
                <input type="submit" id="message" name="message">
            </article>
        </form>
    </div> 

    <article id="map">
        <h2>Localisation :</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2519.967896594537!2d-1.0554378224226981!3d50.8317585598346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48745db817fda771%3A0xecdbe5a7a0e72152!2sThe%20WW1%20Remembrance%20Centre!5e0!3m2!1sfr!2suk!4v1715770722853!5m2!1sfr!2suk" class="map" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </article>
</section>
<?php
require_once  BASE_PATH . "/vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer (true);
if (isset($_POST["content"])) {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo 'Email is not valid!';
    }
    if (empty($_POST['email']) || empty($_POST['fname']) || empty($_POST['content'])) {
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
        $mail->Body = $_POST['content'];
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