<?php
require 'api/db.php';
require 'includes/header.php';

/* Vérifie si l'utilisateur est connecté */
$connected = isset($_SESSION['username']);
$username = $connected ? $_SESSION['username'] : null;

/* Champions sélectionnés */
$currentChampion = '';
$currentEnnemie = '';

/* Traitement du formulaire */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['champion'])) {
        $currentChampion = trim($_POST['champion']);
        if ($connected) {
            $stmt = $conn->prepare("UPDATE users SET favorite_top_champion = ? WHERE username = ?");
            $stmt->execute([$currentChampion, $username]);
        }
    }

    if (!empty($_POST['ennemie'])) {
        $currentEnnemie = trim($_POST['ennemie']);
        if ($connected) {
            $stmt = $conn->prepare("UPDATE users SET last_Ennemie = ? WHERE username = ?");
            $stmt->execute([$currentEnnemie, $username]);
        }
    }
}

/* Récupération du champion sauvegardé */
if ($connected && empty($currentChampion)) {
    $stmt = $conn->prepare("SELECT favorite_top_champion FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $currentChampion = $user['favorite_top_champion'] ?? '';
}

/* Récupération du champion et matchup sauvegardés */
if ($connected) {
    $stmt = $conn->prepare(
        "SELECT favorite_top_champion, last_Ennemie FROM users WHERE username = ?"
    );
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $currentChampion = $user['favorite_top_champion'] ?? '';
    $currentEnnemie = $user['last_Ennemie'] ?? '';
}
?>

<main class="prep-page">

    <!-- TITRE -->
    <section class="hero hero-prep">
        <h1>Préparation Top Lane</h1>
        <p>Recherchez votre champion et préparez vos matchups.</p>

        <?php if (!$connected): ?>
            <p class="note">
                Mode invité : vos préférences ne seront pas sauvegardées.
            </p>
        <?php endif; ?>
        <p></p>
    </section>

    

<!-- RECHERCHE CHAMPIONS -->
<section class="champion-selection">
    <form method="POST" action="prep.php" class="champion-form" novalidate>

        <div class="dual-search-wrapper">

            <!-- Champion joué -->
            <div class="search-wrapper">
                <label for="champion-input">Champion joué</label>
                <input
                    type="text"
                    id="champion-input"
                    name="champion"
                    placeholder="Tapez votre champion..."
                    autocomplete="off"
                    value="<?= htmlspecialchars($currentChampion) ?>"
                    required
                >
                <button type="submit" class="search-btn">
                    <i class="fa fa-search"></i>
                </button>
                <ul id="champion-list" class="autocomplete-list"></ul>
            </div>

            <!-- Champion affronté -->
            <div class="search-wrapper">
                <label for="matchup-input">Champion affronté</label>
                <input
                    type="text"
                    id="matchup-input"
                    name="ennemie"
                    placeholder="Tapez le champion adverse..."
                    autocomplete="off"
                    value="<?= htmlspecialchars($currentEnnemie) ?>"
                >
                <button type="submit" class="search-btn">
                    <i class="fa fa-search"></i>
                </button>
                <ul id="matchup-list" class="autocomplete-list"></ul>
            </div>

        </div>
    </form>
</section>

    <!-- MATCHUPS -->
    <section class="matchup-display">
        <h2>
            Matchups :<br>
            <?= ($currentChampion || $currentEnnemie) 
                ? htmlspecialchars($currentChampion) . ' VS ' . htmlspecialchars($currentEnnemie) 
                : '— VS —' ?>
        </h2>

       <!-- <div id="matchups" class="matchups-container">-->
            <!-- Injecté par JS -->
       <!-- </div>-->
    </section>


    <!-- MATCHUP DISPLAY -->
<section class="matchup-display">

    <div id="matchups" class="matchups-container">
        <!-- Chaque section du matchup sera injectée ici par JS -->
        <!-- Exemple de structure si aucun matchup n'est sélectionné -->
        <p class="matchup-error">Sélectionnez 2 champions pour voir les détails du matchup.</p>
    </div>
</section>


</main>

<!-- Div contenant les données pour JS -->
<div id="matchup-data"
     data-champion="<?= htmlspecialchars($currentChampion) ?>"
     data-matchup="<?= htmlspecialchars($currentEnnemie) ?>"
     style="display:none;">
</div>



<!-- SCRIPTS (TOUJOURS À LA FIN) -->
<script src="js/matchup.js"></script>
<script src="js/championAutocomplete.js"></script>

<?php require 'includes/footer.php'; ?>
