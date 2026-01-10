<?php
session_start();
require 'api/db.php';
require 'includes/header.php';

// Si l'utilisateur est déjà connecté, redirige vers le dashboard
if(isset($_SESSION['username'])){
    header("Location: dashboard.php");
    exit;
}

$error = ''; // Message d'erreur

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Vérifie que les champs ne sont pas vides
    if(empty($username) || empty($password)){
        $error = "Veuillez remplir tous les champs.";
    } else {
        // Cherche l'utilisateur dans la base
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifie le mot de passe
        if($user && password_verify($password, $user['password'])){
            // Connexion réussie
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Identifiant ou mot de passe incorrect.";
        }
    }
}
?>

<main class="login-page">
    <section class="hero">
        <h1>Connexion LoL Top Lane Helper</h1>
        <p>Connectez-vous pour accéder à vos préférences et dashboards.</p>
    </section>

    <section class="login-form">
        <?php if($error): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <label for="username">Pseudo :</label>
            <input type="text" name="username" id="username" placeholder="Entrez votre pseudo" required>

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe" required>

            <button type="submit">Se connecter</button>
        </form>

        <p>Pas encore inscrit ? <a href="register.php">Créez un compte</a></p>
    </section>
</main>

<?php
require 'includes/footer.php';
?>
