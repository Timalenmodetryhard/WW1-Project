<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connexion to the data base
    $servername = "localhost";
    $db_username = "username";
    $db_password = "password";
    $dbname = "myDB";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Verification of the connection
    if ($conn->connect_error) {
        header("Location: error.html");
        exit();
    }

    // verification of email
    $email = $conn->real_escape_string($_POST['email']);

    // Verification if the email is in the database
    $sql = "SELECT username FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // generate a new password
        $new_password = bin2hex(random_bytes(10));
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        // send the new password by email
        $to = $email;
        $subject = "new password request";
        $message = "You password hase been update. Now it is : " . $new_password;
        $headers = "From: your-email@example.com";

        if (mail($to, $subject, $message, $headers)) {
            // update the password in the database
            $stmt->bind_result($username);
            $stmt->fetch();
            $update_sql = "UPDATE users SET password = ? WHERE username = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("ss", $hashed_password, $username);

            if ($update_stmt->execute()) {
                echo "Mot de passe mis à jour avec succès dans la base de données";
                // reduction to the success page
                header("Location: index.html")
                echo "Paswword updated";
                exit();
            } else {
                echo "Erreur lors de la mise à jour du mot de passe : " . $conn->error;
                // redirection to the error page
                header("Location: index.html");
                echo("it simce to be an error ... please verify the information enter and retry.")
                exit();
            }

            $update_stmt->close();
        } else {
            echo "Erreur lors de l'envoi de l'e-mail";
            // redirection to the error page
            header("Location: index.html");
            echo("it simce to be an error ... please verify the information enter and retry.")
            exit();
        }
    } else {
        echo "Adresse e-mail non trouvée dans la base de données";
        // redirection to the error page
        header("Location: index.html");
        echo("it simce to be an error ... please verify the information enter and retry.")
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
