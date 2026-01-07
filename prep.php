<?php
require 'includes/db.php';
require 'includes/header.php';

$connected = isset($_SESSION['username']);
$username = $connected ? $_SESSION['username'] : null;

$currentChampion = '';
$currentMatchup = '';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['champion'])) {
    $champion = $_POST['champion'];
    if($connected) {
        $stmt = $conn->prepare("UPDATE users SET favorite_top_champion = ?, last_matchup = '' WHERE username = ?");
        $stmt->execute([$champion, $username]);
    }
    $currentChampion = $champion;
} else {
    if($connected){
        $stmt = $conn->prepare("SELECT favorite_top_champion, last_matchup FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $currentChampion = $user['favorite_top_champion'];
        $currentMatchup = $user['last_matchup'];
    }
}
?>



<script src="js/topMatchups.js"></script>
<script src="js/matchup.js"></script>
<script src="js/championAutocomplete.js"></script>

<main class="prep-page">
    <section ><!--class="hero"-->
        <h1>Préparation Top Lane</h1>
        <p>Sélectionnez votre champion Top pour voir les matchups et conseils.</p>
        <?php if(!$connected): ?>
            <p class="note">Vous n'êtes pas connecté : vos préférences ne seront pas sauvegardées.</p>
        <?php endif; ?>
    </section>

    <section class="champion-selection">
        <form method="POST" action="prep.php" class="champion-form">
            <label for="champion-input">Champion Top :</label>
            <input type="text" id="champion-input" name="champion" placeholder="Tapez un champion..." autocomplete="off" value="<?= htmlspecialchars($currentChampion) ?>">
            <ul id="champion-list" class="autocomplete-list"></ul>
            <button type="submit">Valider</button>
        </form>
    </section>


    <section class="matchup-display">
        <h2>Matchups pour <?= htmlspecialchars($currentChampion) ?: 'votre champion' ?></h2>
        <div id="matchups" class="matchups-container">
            <!-- Les matchups seront injectés par JS -->
        </div>
    </section>
</main>


<?php
require 'includes/footer.php';
?>
