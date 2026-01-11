<?php
// register.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require 'api/db.php'; // connexion PDO ($conn)

// Initialisation des variables
$username = $email = $password = $passwordConfirm = '';
$errors = [];
$success = false;

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupération et nettoyage des champs
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $passwordConfirm = $_POST['password_confirm'] ?? '';

    // Validation
    if (!$username) {
        $errors[] = "Le nom d'utilisateur est requis.";
    }
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Un email valide est requis.";
    }
    if (!$password) {
        $errors[] = "Le mot de passe est requis.";
    }
    if ($password !== $passwordConfirm) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

    // Vérifier si l'utilisateur ou l'email existe déjà
    if (empty($errors)) {
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = :username OR email = :email");
        $stmt->execute([':username' => $username, ':email' => $email]);
        if ($stmt->fetch()) {
            $errors[] = "Le nom d'utilisateur ou l'email est déjà utilisé.";
        }
    }

    // Si tout est OK, créer l'utilisateur
    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("
            INSERT INTO users (username, email, password)
            VALUES (:username, :email, :password)
        ");
        $stmt->execute([
            ':username' => $username,
            ':email'    => $email,
            ':password' => $hashedPassword
        ]);
        $success = true;
        $username = $email = $password = $passwordConfirm = ''; // reset form
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte - LoL Top Lane Helper</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="register-page">
<div class="register-container">
    <h2>Créer un compte</h2>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <?php foreach ($errors as $err) echo htmlspecialchars($err) . "<br>"; ?>
        </div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="success">
            Compte créé avec succès ! Vous pouvez maintenant <a href="login.php">vous connecter</a>.
        </div>
    <?php endif; ?>

    <form method="POST" action="register.php">
        <input type="text" name="username" placeholder="Nom d'utilisateur" value="<?= htmlspecialchars($username) ?>" required>
        <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($email) ?>" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="password" name="password_confirm" placeholder="Confirmer le mot de passe" required>
        <button type="submit">S'inscrire</button>
    </form>

    <a href="login.php" class="login-link">Déjà un compte ? Connectez-vous ici.</a>
</div>
</body>
</html>