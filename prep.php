<?php
session_start();
require 'includes/db.php';
require 'includes/header.php';

// Vérifie si l'utilisateur est connecté
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];

// Récupère le champion préféré actuel
$stmt = $conn->prepare("SELECT favorite_top_champion, last_matchup FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$currentChampion = $user['favorite_top_champion'];
$currentMatchup = $user['last_matchup'];

// Mettre à jour les préférences si le formulaire est soumis
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['champion'])) {
    $champion = $_POST['champion'];

    // Exemple : mettre à jour le dernier matchup à vide pour le moment
    $stmt = $conn->prepare("UPDATE users SET favorite_top_champion = ?, last_matchup = '' WHERE username = ?");
    $stmt->execute([$champion, $username]);

    // Actualiser la page pour afficher les nouvelles données
    header("Location: prep.php");
    exit;
}
?>

<main class="prep-page">
    <section class="hero">
        <h1>Préparation Top Lane</h1>
        <p>Sélectionnez votre champion Top pour voir les matchups et conseils.</p>
    </section>

    <section class="champion-selection">
        <form method="POST" action="prep.php">
            <label for="champion">Champion Top :</label>
            <select name="champion" id="champion" required>
                <option value="">--Choisissez votre champion--</option>
                <option value="Darius" <?= $currentChampion == 'Darius' ? 'selected' : '' ?>>Darius</option>
                <option value="Fiora" <?= $currentChampion == 'Fiora' ? 'selected' : '' ?>>Fiora</option>
                <option value="Garen" <?= $currentChampion == 'Garen' ? 'selected' : '' ?>>Garen</option>
                <option value="Ornn" <?= $currentChampion == 'Ornn' ? 'selected' : '' ?>>Ornn</option>
                <option value="Renekton" <?= $currentChampion == 'Renekton' ? 'selected' : '' ?>>Renekton</option>
                <!-- Ajoute tous les champions Top Lane ici -->
            </select>
            <button type="submit">Valider</button>
        </form>
    </section>

    <section class="matchup-display">
        <h2>Matchups pour <?= htmlspecialchars($currentChampion) ?: 'votre champion' ?></h2>
        <div id="matchups">
            <!-- Les matchups seront injectés par JS -->
        </div>
    </section>
</main>

<script src="js/topMatchups.js"></script>
<script src="js/matchup.js"></script>

<?php
require 'includes/footer.php';
?>
