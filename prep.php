<?php
// Vérifie si une session PHP n'est pas déjà active
if (session_status() === PHP_SESSION_NONE) {
    // Démarre une nouvelle session pour stocker les données utilisateur
    session_start();
}

// Inclusion du fichier de connexion à la base de données
require 'api/db.php';
// Inclusion du header HTML (logo, navigation, etc.)
require 'includes/header.php';

/* Vérifie si l'utilisateur est connecté */
// Vérifie si la variable de session 'username' existe
$connected = isset($_SESSION['username']);
// Récupère le nom d'utilisateur si connecté, sinon null
$username = $connected ? $_SESSION['username'] : null;

/* Variables */
// Stocke le champion actuellement joué
$currentChampion = '';
// Stocke le champion ennemi actuellement affronté
$currentEnnemie = '';
// Stocke le champion préféré de l'utilisateur
$favChampion = null;

/* Récupération de l'utilisateur connecté */
// Si l'utilisateur est connecté
if ($connected) {
    // Prépare une requête SQL pour récupérer les données de l'utilisateur
    $stmt = $conn->prepare("SELECT favorite_top_champion, last_play, last_Ennemie FROM users WHERE username = ?");
    // Exécute la requête avec le nom d'utilisateur
    $stmt->execute([$username]);
    // Récupère le résultat sous forme de tableau associatif
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Récupère le champion favori ou null si non défini
    $favChampion = $user['favorite_top_champion'] ?? null;
    // Récupère le dernier champion joué ou chaîne vide si non défini
    $currentChampion = $user['last_play'] ?? '';
    // Récupère le dernier champion ennemi ou chaîne vide si non défini
    $currentEnnemie = $user['last_Ennemie'] ?? '';
}

/* Traitement du formulaire */
// Vérifie si le formulaire a été soumis en POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Si le champ 'champion' est rempli
    if (!empty($_POST['champion'])) {
        // Nettoie et stocke le champion sélectionné (supprime espaces)
        $currentChampion = trim($_POST['champion']);
        // Si l'utilisateur est connecté
        if ($connected) {
            // Prépare une requête pour mettre à jour le dernier champion joué
            $stmt = $conn->prepare("UPDATE users SET last_play = ? WHERE username = ?");
            // Exécute la mise à jour dans la base de données
            $stmt->execute([$currentChampion, $username]);
        }
    }

    // Si le champ 'ennemie' est rempli
    if (!empty($_POST['ennemie'])) {
        // Nettoie et stocke le champion ennemi sélectionné
        $currentEnnemie = trim($_POST['ennemie']);
        // Si l'utilisateur est connecté
        if ($connected) {
            // Prépare une requête pour mettre à jour le dernier ennemi affronté
            $stmt = $conn->prepare("UPDATE users SET last_Ennemie = ? WHERE username = ?");
            // Exécute la mise à jour dans la base de données
            $stmt->execute([$currentEnnemie, $username]);
        }
    }
}

// Définit l'image de fond : champion favori ou Warwick par défaut
// Opérateur ternaire : si $favChampion existe, l'utiliser, sinon 'Warwick'
$champ = $favChampion ?: 'Warwick';
?>


<main class="prep-page">

    <!-- TITRE -->
    <!-- Section hero avec image de fond dynamique basée sur le champion -->
    <section class="hero hero-prep" style="background-image: url('media/img/<?= htmlspecialchars($champ) ?>_2.jpg');">
        <!-- Titre principal de la page -->
        <h1>Préparation Top Lane</h1>
        <!-- Description de la page -->
        <p>Recherchez votre champion et préparez vos matchups.</p>

        <!-- Affiche une note uniquement si l'utilisateur n'est pas connecté -->
        <?php if (!$connected): ?>
            <p class="note">
                Mode invité : vos préférences ne seront pas sauvegardées.
            </p>
        <?php endif; ?>
    </section>

    

<!-- RECHERCHE CHAMPIONS -->
<!-- Section contenant le formulaire de recherche -->
<section class="champion-selection">
    <!-- Formulaire qui envoie les données en POST vers prep.php -->
    <!-- novalidate désactive la validation HTML5 par défaut -->
    <form method="POST" action="prep.php" class="champion-form" novalidate>

        <!-- Conteneur pour les deux champs de recherche côte à côte -->
        <div class="dual-search-wrapper">

            <!-- Champion joué -->
            <!-- Premier champ de recherche -->
            <div class="search-wrapper">
                <!-- Label du champ -->
                <label for="champion-input">Champion joué</label>
                <!-- Champ de saisie pour le champion joué -->
                <input
                    type="text"
                    id="champion-input"
                    name="champion"
                    placeholder="Tapez votre champion..."
                    autocomplete="off"
                    value="<?= htmlspecialchars($currentChampion) ?>"
                    required
                >
                <!-- Bouton de soumission avec icône de loupe -->
                <button type="submit" class="search-btn">
                    <i class="fa fa-search"></i>
                </button>
                <!-- Liste vide pour l'autocomplétion (remplie par JS) -->
                <ul id="champion-list" class="autocomplete-list"></ul>
            </div>

            <!-- Champion affronté -->
            <!-- Deuxième champ de recherche -->
            <div class="search-wrapper">
                <!-- Label du champ -->
                <label for="matchup-input">Champion affronté</label>
                <!-- Champ de saisie pour le champion adverse -->
                <input
                    type="text"
                    id="matchup-input"
                    name="ennemie"
                    placeholder="Tapez le champion adverse..."
                    autocomplete="off"
                    value="<?= htmlspecialchars($currentEnnemie) ?>"
                >
                <!-- Bouton de soumission avec icône de loupe -->
                <button type="submit" class="search-btn">
                    <i class="fa fa-search"></i>
                </button>
                <!-- Liste vide pour l'autocomplétion (remplie par JS) -->
                <ul id="matchup-list" class="autocomplete-list"></ul>
            </div>

        </div>
    </form>
</section>

    <!-- MATCHUPS -->
    <!-- Section affichant le titre du matchup -->
    <section class="matchup-display">
        <h2>
            Matchups :<br>
            <!-- Affiche "Champion VS Ennemi" ou "— VS —" si vide -->
            <?= ($currentChampion || $currentEnnemie) 
                ? htmlspecialchars($currentChampion) . ' VS ' . htmlspecialchars($currentEnnemie) 
                : '— VS —' ?>
        </h2>
    </section>


    <!-- MATCHUP DISPLAY -->
    <!-- Section où seront injectés les détails du matchup -->
<section class="matchup-display">

    <!-- Conteneur principal pour les résultats -->
    <div id="matchups" class="matchups-container">
        <!-- Message par défaut avant sélection des champions -->
        <p class="matchup-error">Sélectionnez 2 champions pour voir les détails du matchup.</p>
    </div>
</section>


</main>

<!-- Div cachée contenant les données pour JavaScript -->
<!-- Permet de passer les valeurs PHP au JavaScript -->
<div id="matchup-data"
     data-champion="<?= htmlspecialchars($currentChampion) ?>"
     data-matchup="<?= htmlspecialchars($currentEnnemie) ?>"
     style="display:none;">
</div>



<!-- SCRIPTS (TOUJOURS À LA FIN) -->
<!-- Charge le script gérant l'affichage des matchups -->
<script src="js/matchup.js"></script>
<!-- Charge le script gérant l'autocomplétion des champions -->
<script src="js/championAutocomplete.js"></script>