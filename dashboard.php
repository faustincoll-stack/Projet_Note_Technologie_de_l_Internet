<?php
// Vérifie si une session PHP n'est pas déjà active
if (session_status() === PHP_SESSION_NONE) {
    // Démarre une nouvelle session pour accéder aux données utilisateur
    session_start();
}

// Inclusion du fichier de connexion à la base de données
require 'api/db.php';
// Inclusion du header HTML (logo, navigation, etc.)
require 'includes/header.php';

// Redirection si non connecté
// Vérifie si l'utilisateur est connecté (variable de session existe)
if (!isset($_SESSION['username'])) {
    // Redirige vers la page de connexion si non connecté
    header('Location: login.php');
    // Arrête l'exécution du script (important après une redirection)
    exit;
}

// Récupère le nom d'utilisateur depuis la session
$username = $_SESSION['username'];

/* Mise à jour champion favori */
// Vérifie si le formulaire a été soumis ET que le champ n'est pas vide
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['favorite_champion'])) {
    // Récupère et nettoie le nom du champion sélectionné
    $champion = trim($_POST['favorite_champion']);
    // Prépare une requête pour mettre à jour le champion favori
    $stmt = $conn->prepare("UPDATE users SET favorite_top_champion = ? WHERE username = ?");
    // Exécute la mise à jour dans la base de données
    $stmt->execute([$champion, $username]);
}

/* Récupération champion favori actuel */
// Prépare une requête pour récupérer les données de l'utilisateur
$stmt = $conn->prepare("SELECT username, favorite_top_champion FROM users WHERE username = ?");
// Exécute la requête avec le nom d'utilisateur
$stmt->execute([$username]);
// Récupère le résultat sous forme de tableau associatif
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Récupère le pseudo de l'utilisateur
$pseudo=$user['username'];
// Récupère le champion favori ou chaîne vide si non défini
$currentChampion = $user['favorite_top_champion'] ?? '';
// Définit le champion pour l'image : favori ou Warwick par défaut
$champ = $currentChampion ?: 'Warwick'; // par défaut
?>

<main class="dashboard-page">

    <!-- HERO -->
    <!-- Section hero avec image de fond dynamique basée sur le champion -->
    <section class="hero dashboard-hero" style="background-image: url('media/img/<?= htmlspecialchars($champ) ?>_3.jpg');">
        <!-- Titre personnalisé avec le pseudo de l'utilisateur -->
        <!-- htmlspecialchars() protège contre les injections XSS -->
        <h1>Bienvenue <?= htmlspecialchars($pseudo) ?> sur votre menu de personalisation</h1>
        <!-- Description de la page -->
        <p>Personnalisez votre champion favori et découvrez vos contenus sur mesure !</p>
    </section>

    <!-- SÉLECTION CHAMPION FAVORI -->
    <!-- Section pour choisir le champion préféré -->
    <!-- Classes : dashboard-card pour le style, center pour centrer -->
    <section class="dashboard-card center">
        <!-- Titre de la section -->
        <h2>Choisissez votre champion Top préféré</h2>

        <!-- Formulaire de sélection du champion -->
        <!-- Envoie en POST et se soumet à lui-même (pas d'action définie) -->
        <form method="POST" class="champion-form" id="favorite-form">
            <!-- Conteneur de recherche avec classe "small" pour taille réduite -->
            <div class="search-wrapper small">
                <!-- Champ de recherche avec autocomplétion -->
                <input
                    type="text"
                    id="favorite-champion-input"
                    name="favorite_champion"
                    placeholder="Recherchez un champion..."
                    autocomplete="off"
                    value="<?= htmlspecialchars($currentChampion) ?>"
                    required
                >
                <!-- Bouton de validation avec symbole ✓ -->
                <button type="submit" class="search-btn">✓</button>
                <!-- Liste vide pour l'autocomplétion (remplie par JS) -->
                <ul id="favorite-champion-list" class="autocomplete-list"></ul>
            </div>
        </form>

        <!-- Affichage du champion actuel si défini -->
        <!-- Vérifie si un champion favori existe -->
        <?php if ($currentChampion): ?>
            <!-- Paragraphe affichant le champion actuel -->
            <p class="favorite-info">
                Champion actuel : <strong><?= htmlspecialchars($currentChampion) ?></strong>
            </p>
        <?php endif; ?>
    </section>

</main>

<!-- Scripts pour autocomplete (comme sur prep.php) -->
<!-- Charge le script qui gère l'autocomplétion des champions -->
<script src="js/championAutocomplete.js"></script>  