<?php

$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];
$remember_me = isset($_POST['remember_me']);  // Check if "Remember Me" checkbox is checked

// Prepare the SQL statement
$sql = $conn->prepare('SELECT * FROM users WHERE email = ?');
$sql->bind_param('s', $email);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        if ($remember_me) {
            // Create a secure cookie valid for 30 days
            setcookie('email', $email, time() + (15 * 24 * 60 * 60), "/", "", false, true);
            setcookie('password_hash', $user['password'], time() + (15 * 24 * 60 * 60), "/", "", false, true);
        }
        header("Location: index.html");
        exit();
    } else {
        header("Location: login.html?message=Connection failed&color=red");
        exit();
    }
} else {
    header("Location: login.html?message=Connection failed&color=red");
    exit();
}

$sql->close();
$conn->close();

?>
