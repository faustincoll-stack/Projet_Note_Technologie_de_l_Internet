<?php
// Démarre la session si elle ne l'est pas déjà
session_start();

// Supprime toutes les variables de session
$_SESSION = [];

// Détruit la session
session_destroy();

// Redirige vers la page d'accueil ou de login
header('Location: accueil.php');
exit;