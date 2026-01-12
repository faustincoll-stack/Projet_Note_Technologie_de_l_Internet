<?php
// register.php - Page d'inscription des nouveaux utilisateurs

// Vérifie si une session PHP n'est pas déjà active
if (session_status() === PHP_SESSION_NONE) {
    // Démarre une nouvelle session
    session_start();
}

// Inclusion du fichier de connexion à la base de données
require 'api/db.php'; // connexion PDO ($conn)

// Initialisation des variables pour stocker les données du formulaire
// Initialise le nom d'utilisateur à une chaîne vide
$username = $email = $password = $passwordConfirm = '';
// Tableau qui stockera les messages d'erreur
$errors = [];
// Booléen indiquant si l'inscription a réussi
$success = false;

// Traitement du formulaire
// Vérifie si le formulaire a été soumis en méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupération et nettoyage des champs
    // trim() supprime les espaces en début et fin de chaîne
    // ?? '' fournit une valeur par défaut si le champ n'existe pas
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    // Les mots de passe ne sont pas trim() pour préserver les espaces volontaires
    $password = $_POST['password'] ?? '';
    $passwordConfirm = $_POST['password_confirm'] ?? '';

    // Validation des champs
    // Vérifie si le nom d'utilisateur est vide
    if (!$username) {
        // Ajoute un message d'erreur au tableau
        $errors[] = "Le nom d'utilisateur est requis.";
    }
    // Vérifie si l'email est vide OU invalide
    // filter_var() valide le format de l'email
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Un email valide est requis.";
    }
    // Vérifie si le mot de passe est vide
    if (!$password) {
        $errors[] = "Le mot de passe est requis.";
    }
    // Vérifie si les deux mots de passe sont identiques
    if ($password !== $passwordConfirm) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

    // Vérifier si l'utilisateur ou l'email existe déjà
    // Si aucune erreur de validation n'a été trouvée
    if (empty($errors)) {
        // Prépare une requête pour chercher un utilisateur avec ce nom OU cet email
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = :username OR email = :email");
        // Exécute la requête avec les paramètres
        $stmt->execute([':username' => $username, ':email' => $email]);
        // Si un résultat est trouvé (utilisateur ou email existe déjà)
        if ($stmt->fetch()) {
            // Ajoute un message d'erreur
            $errors[] = "Le nom d'utilisateur ou l'email est déjà utilisé.";
        }
    }

    // Si tout est OK, créer l'utilisateur
    // Si aucune erreur n'a été trouvée
    if (empty($errors)) {
        // Hashe le mot de passe avec l'algorithme par défaut (bcrypt)
        // Ne JAMAIS stocker les mots de passe en clair dans la BDD !
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // Prépare la requête d'insertion du nouvel utilisateur
        $stmt = $conn->prepare("
            INSERT INTO users (username, email, password)
            VALUES (:username, :email, :password)
        ");
        // Exécute l'insertion avec les données hashées
        $stmt->execute([
            ':username' => $username,
            ':email'    => $email,
            ':password' => $hashedPassword
        ]);
        // Marque l'inscription comme réussie
        $success = true;
        // Réinitialise tous les champs (vide le formulaire)
        $username = $email = $password = $passwordConfirm = '';
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
    <title>Créer un compte - LoL Top Lane Helper</title>
    
    <!-- CSS -->
    <!-- Charge la feuille de style principale -->
    <link rel="stylesheet" href="css/style.css">
</head>
<!-- Classe register-page pour le style spécifique (fond avec image) -->
<body class="register-page">
    <!-- Bouton retour en haut à gauche -->
    <a href="index.php" class="back-button-auth">← Retour</a>

<!-- Conteneur principal du formulaire d'inscription -->
<div class="register-container">
    <!-- Titre du formulaire -->
    <h2>Créer un compte</h2>

    <!-- Affichage des erreurs s'il y en a -->
    <!-- Vérifie si le tableau d'erreurs n'est pas vide -->
    <?php if (!empty($errors)): ?>
        <!-- Bloc d'erreur avec style CSS -->
        <div class="error">
            <!-- Boucle sur chaque erreur -->
            <?php foreach ($errors as $err) 
                // Affiche l'erreur protégée contre XSS avec un saut de ligne
                echo htmlspecialchars($err) . "<br>"; ?>
        </div>
    <?php endif; ?>

    <!-- Affichage du message de succès -->
    <!-- Vérifie si l'inscription a réussi -->
    <?php if ($success): ?>
        <!-- Bloc de succès avec style CSS -->
        <div class="success">
            <!-- Message de confirmation avec lien vers la connexion -->
            Compte créé avec succès ! Vous pouvez maintenant <a href="login.php">vous connecter</a>.
        </div>
    <?php endif; ?>

    <!-- Formulaire d'inscription -->
    <!-- Envoie les données en POST vers register.php -->
    <form method="POST" action="register.php">
        <!-- Champ nom d'utilisateur -->
        <!-- value conserve la valeur saisie en cas d'erreur -->
        <!-- htmlspecialchars() protège contre les injections XSS -->
        <input type="text" name="username" placeholder="Nom d'utilisateur" value="<?= htmlspecialchars($username) ?>" required>
        <!-- Champ email avec validation HTML5 -->
        <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($email) ?>" required>
        <!-- Champ mot de passe (non pré-rempli pour sécurité) -->
        <input type="password" name="password" placeholder="Mot de passe" required>
        <!-- Champ confirmation du mot de passe -->
        <input type="password" name="password_confirm" placeholder="Confirmer le mot de passe" required>
        <!-- Bouton de soumission du formulaire -->
        <button type="submit">S'inscrire</button>
    </form>

    <!-- Lien vers la page de connexion -->
    <a href="login.php" class="login-link">Déjà un compte ? Connectez-vous ici.</a>
</div>
</body>
</html>