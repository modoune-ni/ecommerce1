<?php
$conn = new mysqli("localhost", "root", "", "ecommerce1");
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>
