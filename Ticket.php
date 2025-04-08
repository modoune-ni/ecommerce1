<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Récupère les infos utilisateur
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page Ticket</title>
</head>
<body>

<!-- Header avec infos utilisateur -->
<div style="display: flex; align-items: center; justify-content: space-between;">
    <div>
        <img src="<?= htmlspecialchars($user['profile_pic']) ?>" alt="Profil" width="50" style="border-radius: 50%;">
        <strong><?= htmlspecialchars($user['name']) ?></strong>
    </div>
    <div>
        <a href="logout.php">Se déconnecter</a>
    </div>
</div>

<hr>

<h1>Bienvenue sur la page des tickets</h1>

<!-- Ici tu peux afficher les tickets ou autres infos -->

</body>
</html>
