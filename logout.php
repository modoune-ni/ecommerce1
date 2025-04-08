<?php
// Démarrer la session (à placer en toute première ligne)
session_start();

// Vider le tableau des variables de session
$_SESSION = array();

// Supprimer le cookie de session si celui-ci est utilisé
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),   // Nom de la session
        '',               // Valeur vide
        time() - 42000,   // Date d'expiration passée
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Détruire la session sur le serveur
session_destroy();

// Rediriger immédiatement l'utilisateur vers la page d'accueil
header("Location: index.php");
exit();
?>
