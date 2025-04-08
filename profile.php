<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Récupération du nom pour l'affichage
$userName = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil Utilisateur</title>
</head>
<body>
    <div class="user-profile">
        <p>Bienvenue,<strong><?= htmlspecialchars($userName) ?></strong></p>

        <div class="dropdown">
            <a href="tickets.php">Mes Tickets</a><br>
            <a href="logout.php">Déconnexion</a>
        </div>
    </div>
</body>
</html>
