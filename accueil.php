<?php
require 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="fr">
<?php
//si la session n'est pas démarer, le faire

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require 'api/db.php';

$favChampion = null;

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $stmt = $conn->prepare("SELECT favorite_top_champion FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $favChampion = $user['favorite_top_champion'] ?? null;
}

$champ = $favChampion ?: 'Warwick';
?>

<body>

  <!-- HERO SECTION -->
  <section class="hero" style="background-image: url('media/img/<?= htmlspecialchars($champ) ?>_1.jpg');">
    <h1>Maîtrise la Top Lane avec <?= htmlspecialchars($champ) ?> !</h1>
    <p>Prépare tes matchs, connais tes matchups et domine la lane !</p>
    <a href="prep.php">Commencer</a>
  </section>

  <!-- FEATURES SECTION -->
  <section>
    <h3>Fonctionnalités</h3>
    <div class="features">
      <div class="feature-card">
        <h4>Sélecteur de champion</h4>
        <p>Choisis ton champion Top et découvre ses forces et faiblesses contre tes adversaires.</p>
      </div>
      <div class="feature-card">
        <h4>Matchups Top Lane</h4>
        <p>Affiche la difficulté des lanes et reçois des conseils stratégiques adaptés.</p>
      </div>
      <div class="feature-card">
        <h4>Dashboard personnalisé</h4>
        <p>Suis tes champions favoris et retrouve tes derniers matchups préparés.</p>
      </div>
    </div>

    <!-- AUDIO & VIDEO -->
    <div class="video-container">
      <iframe 
          src="https://www.youtube.com/embed/FS1DNNnU9n8" 
          title="TOUT SAVOIR EN TOPLANE EN 15 MINUTES" 
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
          allowfullscreen>
      </iframe>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    &copy; 2026 LoL Top Lane Helper | <a href="legal.html">Mentions légales</a> | <a href="moi.html">Contact</a>
  </footer>

</body>


</html>
