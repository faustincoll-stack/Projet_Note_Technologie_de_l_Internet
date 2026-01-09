<?php
require 'includes/db.php';
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
        $currentEnnemie = trim($_POST['ennemie']); // <-- bonne variable
        if ($connected) {
            $stmt = $conn->prepare("UPDATE users SET last_matchup = ? WHERE username = ?");
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
        "SELECT favorite_top_champion, last_Ennemie FROM users WHERE username = ?");
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
    </section>

    

<!-- RECHERCHE CHAMPIONS -->
<section class="champion-selection">
    <form method="POST" action="prep.php" class="champion-form">

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

        <div id="matchups" class="matchups-container">
            <!-- Injecté par JS -->
        </div>
    </section>

</main>


<!-- SCRIPTS (TOUJOURS À LA FIN) -->
<script src="js/topMatchups.js"></script>
<script src="js/matchup.js"></script>
<script src="js/championAutocomplete.js"></script>

<?php require 'includes/footer.php'; ?>
