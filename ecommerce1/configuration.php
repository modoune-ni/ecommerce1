<?php
$servername = "localhost";  // ou l'adresse de ton serveur de base de données
$username = "root";         // ton utilisateur MySQL
$password = "";             // ton mot de passe MySQL (si nécessaire)
$dbname = "nom_de_ta_base"; // le nom de ta base de données

// Crée la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
