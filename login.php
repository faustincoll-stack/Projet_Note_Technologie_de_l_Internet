<?php
// login.php
// Démarre une session pour stocker les données utilisateur
session_start();
// Inclusion du fichier de connexion à la base de données
require 'api/db.php'; // connexion PDO ($conn)

// Variables
// Stocke le login saisi (username ou email)
$login = $password = '';
// Tableau qui stockera les messages d'erreur
$errors = [];

// Traitement du formulaire
// Vérifie si le formulaire a été soumis en méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère et nettoie le login (username ou email)
    $login = trim($_POST['login'] ?? ''); // username ou email
    // Récupère le mot de passe (non trim pour préserver espaces)
    $password = $_POST['password'] ?? '';

    // Validation des champs
    // Vérifie si le login est vide
    if (!$login) $errors[] = "Nom d'utilisateur ou email requis.";
    // Vérifie si le mot de passe est vide
    if (!$password) $errors[] = "Mot de passe requis.";

    // Si aucune erreur de validation
    if (empty($errors)) {
        // Recherche l'utilisateur par username ou email
        // Prépare une requête pour chercher l'utilisateur
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :login OR email = :login");
        // Exécute la requête avec le login
        $stmt->execute([':login' => $login]);
        // Récupère le résultat sous forme de tableau associatif
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifie si l'utilisateur existe ET si le mot de passe est correct
        // password_verify() compare le mot de passe saisi avec le hash en BDD
        if (!$user || !password_verify($password, $user['password'])) {
            // Ajoute un message d'erreur générique (pour ne pas révéler si username existe)
            $errors[] = "Nom d'utilisateur/email ou mot de passe incorrect.";
        } else {
            // Connexion réussie : créer session
            // Stocke l'ID de l'utilisateur dans la session
            $_SESSION['user_id'] = $user['id'];
            // Stocke le nom d'utilisateur dans la session
            $_SESSION['username'] = $user['username'];
            // Redirige vers la page de préparation
            header("Location: prep.php"); // redirection vers la page principale
            // Arrête l'exécution du script
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<!-- Déclaration du type de document HTML5 -->
<html lang="fr">
<!-- Langue française pour l'accessibilité -->
<head>
    <!-- Encodage des caractères en UTF-8 -->
    <meta charset="UTF-8">
    <!-- Responsive : adapte la page aux mobiles et tablettes -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Titre de la page affiché dans l'onglet du navigateur -->
    <title>Connexion - LoL Top Lane Helper</title>
    
    <!-- CSS -->
    <!-- Charge la feuille de style principale -->
    <link rel="stylesheet" href="css/style.css">
</head>
<!-- Classe login-page pour le style spécifique (fond avec image) -->
<body class="login-page">
    <!-- Bouton retour en haut à gauche -->
    <a href="index.php" class="back-button-auth">← Retour</a>

<!-- Conteneur principal du formulaire de connexion -->
<div class="login-container">
    <!-- Titre du formulaire -->
    <h2>Connexion</h2>

    <!-- Affichage des erreurs s'il y en a -->
    <!-- Vérifie si le tableau d'erreurs n'est pas vide -->
    <?php if (!empty($errors)): ?>
        <!-- Bloc d'erreur avec style CSS -->
        <div class="error">
            <!-- Boucle sur chaque erreur et l'affiche protégée contre XSS -->
            <?php foreach ($errors as $err) echo htmlspecialchars($err) . "<br>"; ?>
        </div>
    <?php endif; ?>

    <!-- Formulaire de connexion -->
    <!-- Envoie les données en POST vers login.php -->
    <form method="POST" action="login.php">
        <!-- Champ login (username ou email) -->
        <!-- value conserve la valeur saisie en cas d'erreur -->
        <input type="text" name="login" placeholder="Nom d'utilisateur ou Email" value="<?= htmlspecialchars($login) ?>" required>
        <!-- Champ mot de passe -->
        <input type="password" name="password" placeholder="Mot de passe" required>
        <!-- Bouton de soumission du formulaire -->
        <button type="submit">Se connecter</button>
    </form>

    <!-- Lien vers la page d'inscription -->
    <a href="register.php" class="register-link">Pas de compte ? Créez-en un ici.</a>
</div>
</body>
</html>