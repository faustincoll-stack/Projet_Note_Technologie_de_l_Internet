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
    <title>Connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 50px;
        }
        .login-container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 350px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type=text], input[type=email], input[type=password] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #007BFF;
            border: none;
            color: #fff;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .error {
            color: #d8000c;
            background-color: #ffd2d2;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .success {
            color: #4F8A10;
            background-color: #DFF2BF;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .register-link {
            display: block;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
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
