<?php
// login.php
session_start();
require 'api/db.php'; // connexion PDO ($conn)

// Variables
$login = $password = '';
$errors = [];

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? ''); // username ou email
    $password = $_POST['password'] ?? '';

    if (!$login) $errors[] = "Nom d'utilisateur ou email requis.";
    if (!$password) $errors[] = "Mot de passe requis.";

    if (empty($errors)) {
        // Recherche l'utilisateur par username ou email
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :login OR email = :login");
        $stmt->execute([':login' => $login]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user || !password_verify($password, $user['password'])) {
            $errors[] = "Nom d'utilisateur/email ou mot de passe incorrect.";
        } else {
            // Connexion réussie : créer session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: prep.php"); // redirection vers la page principale
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - LoL Top Lane Helper</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="login-page">
<div class="login-container">
    <h2>Connexion</h2>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <?php foreach ($errors as $err) echo htmlspecialchars($err) . "<br>"; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <input type="text" name="login" placeholder="Nom d'utilisateur ou Email" value="<?= htmlspecialchars($login) ?>" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
    </form>

    <a href="register.php" class="register-link">Pas de compte ? Créez-en un ici.</a>
</div>
</body>
</html>