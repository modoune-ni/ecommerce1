<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


session_start();

// // Supposons que la vérification du mot de passe est réussie
// $_SESSION['username'] = "momar daff"; // Tu peux récupérer ça depuis la base de données

// header("Location: profile.php");
// exit();


session_start();

// Simulation : tu vérifies le login ici
// En vrai, tu fais une vérification en base de données
$email = $_POST['email'];
$password = $_POST['password'];

// Supposons que c'est bon :
$_SESSION['user'] = [
    'name' => 'Jean Dupont',
    'email' => $email,
    'profile_pic' => 'images/jean.png' // chemin vers la photo de profil
];

// Redirection vers la page ticket
header('Location: ticket.php');
exit;



include 'config.php'; // Ce fichier contient SEULEMENT la connexion MySQL

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            header("Location: dashboard.php");
            exit();
        } else {
            echo "❌ Mot de passe incorrect.";
        }
    } else {
        echo "❌ Utilisateur non trouvé.";
    }

    $stmt->close();
    $conn->close();
}
?>

<div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="width: 350px;">
            <h3 class="text-center">login</h3>
            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-warning w-100">Sign In</button>
            </form>
            <div class="text-center mt-3">
                <a href="#">Forgot your password?</a> | 
                <a href="register.html">Sign Up</a>
            </div>