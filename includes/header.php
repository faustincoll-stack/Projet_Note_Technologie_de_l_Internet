<?php
// Démarrer la session ici si elle ne l'est pas ailleur
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoL Top Lane Helper</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto&display=swap" rel="stylesheet">
    
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS Global -->
    <link rel="stylesheet" href="css/style.css">

    <!-- CSS par device  -->
    <link rel="stylesheet" href="css/tablet.css" media="screen and (min-width: 768px) and (max-width: 1023px)">
    <link rel="stylesheet" href="css/mobile.css" media="screen and (max-width: 767px)">
</head>
<body>
    <header>
        <div class="logo">
            <a href="accueil.php">LoL Top Lane Helper</a>
        </div>
        <nav>
            <ul>
                <li><a href="accueil.php">Accueil</a></li>
                <li><a href="prep.php">Préparation Top Lane</a></li>
                <?php if(isset($_SESSION['username'])): ?>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="login.php">Connexion</a></li>
                    <li><a href="register.php">Inscription</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
