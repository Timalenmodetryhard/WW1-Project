<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connexion à la base de données
    $servername = "localhost";
    $db_username = "username";
    $db_password = "password";
    $dbname = "myDB";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        header("Location: error.html");
        exit();
    }

    // Adresse e-mail à vérifier
    $email = $conn->real_escape_string($_POST['email']);

    // Vérifier si l'adresse e-mail est dans la base de données
    $sql = "SELECT username FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // L'adresse e-mail est trouvée, générer un nouveau mot de passe sécurisé
        $new_password = bin2hex(random_bytes(10));
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        // Mettre à jour le mot de passe de l'utilisateur dans la base de données
        $stmt->bind_result($username);
        $stmt->fetch();
        $update_sql = "UPDATE users SET password = ? WHERE username = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ss", $hashed_password, $username);
        $update_stmt->execute();
        $update_stmt->close();
    }

    // Envoyer un e-mail neutre
    $to = $email;
    $subject = "Instructions pour réinitialiser votre mot de passe";
    $message = "Si votre adresse e-mail est enregistrée dans notre système, vous recevrez un e-mail avec les instructions pour réinitialiser votre mot de passe.";
    $headers = "From: your-email@example.com";

    if (mail($to, $subject, $message, $headers)) {
        // Rediriger vers une page de succès
        header("Location: login.html");
        exit();
    } else {
        echo "Erreur lors de l'envoi de l'e-mail";
        // Rediriger vers une page d'erreur
        header("Location: error.html");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
