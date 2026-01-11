<?php
// Démarrage de session si nécessaire
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require 'api/db.php';
require 'includes/header.php';

// Redirection si non connecté
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];

/* Mise à jour champion favori */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['favorite_champion'])) {
    $champion = trim($_POST['favorite_champion']);
    $stmt = $conn->prepare("UPDATE users SET favorite_top_champion = ? WHERE username = ?");
    $stmt->execute([$champion, $username]);
}

/* Récupération champion favori actuel */
$stmt = $conn->prepare("SELECT username, favorite_top_champion FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$pseudo=$user['username'];
$currentChampion = $user['favorite_top_champion'] ?? '';
$champ = $currentChampion ?: 'Warwick'; // par défaut
?>

<main class="dashboard-page">

    <!-- HERO -->
    <section class="hero dashboard-hero" style="background-image: url('media/img/<?= htmlspecialchars($champ) ?>_3.jpg');">
        <h1>Bienvenue <?= htmlspecialchars($pseudo) ?> sur votre menu de personalisation</h1>
        <p>Personnalisez votre champion favori et découvrez vos contenus sur mesure !</p>
    </section>

    <!-- SÉLECTION CHAMPION FAVORI -->
    <section class="dashboard-card center">
        <h2>Choisissez votre champion Top préféré</h2>

        <form method="POST" class="champion-form" id="favorite-form">
            <div class="search-wrapper small">
                <input
                    type="text"
                    id="favorite-champion-input"
                    name="favorite_champion"
                    placeholder="Recherchez un champion..."
                    autocomplete="off"
                    value="<?= htmlspecialchars($currentChampion) ?>"
                    required
                >
                <button type="submit" class="search-btn">✓</button>
                <ul id="favorite-champion-list" class="autocomplete-list"></ul>
            </div>
        </form>

        <?php if ($currentChampion): ?>
            <p class="favorite-info">
                Champion actuel : <strong><?= htmlspecialchars($currentChampion) ?></strong>
            </p>
        <?php endif; ?>
    </section>

</main>

<!-- Scripts pour autocomplete (comme sur prep.php) -->
<script src="js/championAutocomplete.js"></script>

