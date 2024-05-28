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

        // Envoyer le nouveau mot de passe par e-mail
        $to = $email;
        $subject = "Mot de passe sécurisé généré automatiquement";
        $message = "Votre nouveau mot de passe est : " . $new_password;
        $headers = "From: your-email@example.com";

        if (mail($to, $subject, $message, $headers)) {
            // Mettre à jour le mot de passe de l'utilisateur dans la base de données
            $stmt->bind_result($username);
            $stmt->fetch();
            $update_sql = "UPDATE users SET password = ? WHERE username = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("ss", $hashed_password, $username);

            if ($update_stmt->execute()) {
                echo "Mot de passe mis à jour avec succès dans la base de données";
                // Rediriger vers une page de succès
                header("Location: success.html");
                exit();
            } else {
                echo "Erreur lors de la mise à jour du mot de passe : " . $conn->error;
                // Rediriger vers une page d'erreur
                header("Location: error.html");
                exit();
            }

            $update_stmt->close();
        } else {
            echo "Erreur lors de l'envoi de l'e-mail";
            // Rediriger vers une page d'erreur
            header("Location: error.html");
            exit();
        }
    } else {
        echo "Adresse e-mail non trouvée dans la base de données";
        // Rediriger vers une page d'erreur
        header("Location: error.html");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
