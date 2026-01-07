<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LoL Top Lane Helper</title>
  <!-- Google Fonts : Pour inclure des polices de texte-->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto&display=swap" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!-- HEADER -->
  <header>
    <h1>LoL Top Lane Helper</h1>
    <nav>
      <ul>
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="prep.php">Préparer un Match</a></li>
        <li><a href="login.php">Connexion</a></li>
        <li><a href="register.php">Inscription</a></li>
      </ul>
    </nav>
  </header>

  <!-- HERO SECTION -->
  <section class="hero">
    <h2>Maîtrise la Top Lane comme Warwick</h2>
    <p>Prépare tes matchs, connais tes matchups et domine la lane !</p>
    <a href="prep.php">Commencer</a>
  </section>

  <!-- FEATURES SECTION -->
  <section>
    <h3>Fonctionnalités</h3>
    <div class="features">
      <div class="feature-card">
        <img src="media/champion-icon.png" alt="Sélecteur champion">
        <h4>Sélecteur de champion</h4>
        <p>Choisis ton champion Top et découvre ses forces et faiblesses contre tes adversaires.</p>
      </div>
      <div class="feature-card">
        <img src="media/matchup-icon.png" alt="Matchups Top Lane">
        <h4>Matchups Top Lane</h4>
        <p>Affiche la difficulté des lanes et reçois des conseils stratégiques adaptés.</p>
      </div>
      <div class="feature-card">
        <img src="media/dashboard-icon.png" alt="Dashboard personnalisé">
        <h4>Dashboard personnalisé</h4>
        <p>Suis tes champions favoris et retrouve tes derniers matchups préparés.</p>
      </div>
    </div>

    <!-- AUDIO & VIDEO -->
    <div class="media">
      <audio controls>
        <source src="media/focus.mp3" type="audio/mpeg">
        Votre navigateur ne supporte pas l'audio.
      </audio>

      <video controls>
        <source src="media/guide.mp4" type="video/mp4">
        Votre navigateur ne supporte pas la vidéo.
      </video>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    &copy; 2026 LoL Top Lane Helper | <a href="#">Mentions légales</a> | <a href="#">Contact</a>
  </footer>

</body>
</html>
