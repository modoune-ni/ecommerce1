<?php
// Démarrage de la session pour pouvoir accéder aux variables de session
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page d'accueil</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        a { text-decoration: none; color: #00f; }
    </style>
</head>
<body>
    <h1>Bienvenue sur notre site</h1>
    <?php
    // Vérifier si l'utilisateur est connecté (par exemple via une variable de session "user")
    if(isset($_SESSION['user'])) {
        echo 'Bonjour ' . htmlspecialchars($_SESSION['user']['nom']) . ', vous êtes connecté(e).';
        echo '<p><a href="logout.php">Se déconnecter</a></p>';
    } else {
        echo '<p>Vous n\'êtes pas connecté(e).</p>';
        echo '<p><a href="login.php">Se connecter</a></p>';
    }
    ?>
</body>
</html>

