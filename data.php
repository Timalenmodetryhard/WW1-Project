<?php

$host = '51.158.59.186:14301';
$db   = 'ls';
$user = 'phppex';
$pass = 'Supermotdepasse!42';

$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$query = "SELECT * FROM customer WHERE id = '1'";
$statement = $pdo->query($query);
if ($statement) {
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo $row['name'];
    }
}