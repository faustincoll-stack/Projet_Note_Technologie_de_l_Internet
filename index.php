<?php
// Inclusion du fichier header (logo, navigation, balises <head>, etc.)
require 'includes/header.php';
?>
<!DOCTYPE html>
<!-- Déclaration du type de document HTML5 -->
<html lang="fr">
<!-- Balise HTML principale avec langue française -->
<?php
// Vérifie si une session PHP n'est pas déjà active
if (session_status() === PHP_SESSION_NONE) {
    // Démarre une nouvelle session pour accéder aux données utilisateur
    session_start();
}
// Inclusion du fichier de connexion à la base de données
require 'api/db.php';

// Variable qui stockera le champion préféré de l'utilisateur
$favChampion = null;

// Vérifie si l'utilisateur est connecté (variable de session existe)
if (isset($_SESSION['username'])) {
    // Récupère le nom d'utilisateur depuis la session
    $username = $_SESSION['username'];
    // Prépare une requête SQL pour récupérer le champion favori
    $stmt = $conn->prepare("SELECT favorite_top_champion FROM users WHERE username = ?");
    // Exécute la requête avec le nom d'utilisateur
    $stmt->execute([$username]);
    // Récupère le résultat sous forme de tableau associatif
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    // Stocke le champion favori ou null si non défini
    $favChampion = $user['favorite_top_champion'] ?? null;
}

// Définit le champion pour l'affichage : favori ou Warwick par défaut
// Opérateur ternaire : si $favChampion existe, l'utiliser, sinon 'Warwick'
$champ = $favChampion ?: 'Warwick';
?>

<body>

  <!-- HERO SECTION -->
  <!-- Section principale avec image de fond dynamique -->
  <section class="hero" style="background-image: url('media/img/<?= htmlspecialchars($champ) ?>_1.jpg');">
    <!-- Titre principal avec nom du champion -->
    <!-- htmlspecialchars() protège contre les injections XSS -->
    <h1>Maîtrise la Top Lane avec <?= htmlspecialchars($champ) ?> !</h1>
    <!-- Sous-titre descriptif -->
    <p>Prépare tes matchs, connais tes matchups et domine la lane !</p>
    <!-- Bouton/lien vers la page de préparation -->
    <a href="prep.php">Commencer</a>
  </section>

  <!-- FEATURES SECTION -->
  <!-- Section présentant les fonctionnalités du site -->
  <section>
    <!-- Titre de la section -->
    <h3>Fonctionnalités</h3>
    <!-- Conteneur grille pour les cartes de fonctionnalités -->
    <div class="features">
      <!-- Première carte : Sélecteur de champion -->
      <div class="feature-card">
        <!-- Titre de la fonctionnalité -->
        <h4>Sélecteur de champion</h4>
        <!-- Description de la fonctionnalité -->
        <p>Choisis ton champion Top et découvre ses forces et faiblesses contre tes adversaires.</p>
      </div>
      <!-- Deuxième carte : Matchups -->
      <div class="feature-card">
        <!-- Titre de la fonctionnalité -->
        <h4>Matchups Top Lane</h4>
        <!-- Description de la fonctionnalité -->
        <p>Affiche la difficulté des lanes et reçois des conseils stratégiques adaptés.</p>
      </div>
      <!-- Troisième carte : Personnalisation -->
      <div class="feature-card">
        <!-- Titre de la fonctionnalité -->
        <h4>Personalisation du site</h4>
        <!-- Description de la fonctionnalité -->
        <p>Suis tes champions favoris et retrouve tes derniers matchups préparés.</p>
      </div>
    </div>

    <!-- AUDIO & VIDEO -->
    <!-- Conteneur pour la vidéo YouTube -->
    <div class="video-container">
      <!-- iframe : intègre une vidéo YouTube -->
        <!-- URL de la vidéo YouTube en mode embed -->
        <!-- Titre de la vidéo (pour l'accessibilité) -->
        <!-- Permissions accordées à la vidéo (accéléromètre, lecture auto, etc.) -->
        <!-- Autorise le mode plein écran -->
      <iframe 
          src="https://www.youtube.com/embed/FS1DNNnU9n8"            
          title="TOUT SAVOIR EN TOPLANE EN 15 MINUTES"          
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"           
          allowfullscreen>
      </iframe>
    </div>
  </section>

  <!-- FOOTER -->
  <!-- Pied de page du site -->
  <footer>
    <!--Année et nom du site-->
    &copy; 2026 LoL Top Lane Helper | 
    <!-- Lien vers les mentions légales -->
    <a href="legal.html">Mentions légales</a> | 
    <!-- Lien vers la page de contact -->
    <a href="moi.html">Contact</a>
  </footer>

</body>
</html>