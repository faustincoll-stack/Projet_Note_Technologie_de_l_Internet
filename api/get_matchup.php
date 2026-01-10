<?php
// -------------------------------
// get_matchup.php
// -------------------------------

// En-tête pour JSON
header('Content-Type: application/json');

// Inclut la connexion à la base
require 'db.php';

// Récupère les données envoyées depuis JS
$input = json_decode(file_get_contents('php://input'), true);

$championFrom = trim($input['champion'] ?? '');
$championTo   = trim($input['matchup'] ?? '');

// Vérifie que les valeurs existent
if (!$championFrom || !$championTo) {
    echo json_encode(['error' => true, 'message' => 'Champion ou matchup manquant.']);
    exit;
}



try {
    // Prépare la requête pour récupérer le matchup
    $stmt = $conn->prepare("
        SELECT *
        FROM matchup_texts
        WHERE champion_from = :champion_from
          AND champion_to = :champion_to
        LIMIT 1
    ");

    $stmt->execute([
        ':champion_from' => $championFrom,
        ':champion_to'   => $championTo
    ]);

    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si aucun matchup trouvé
    if (!$row) {
        echo json_encode(['error' => true]);
        exit;
    }

    // Structure la réponse pour ton JS
    $response = [
        'presentation'       => $row['presentation'],
        'conditions_victoire'=> $row['win_conditions'],
        'early_game'         => $row['early_game'],
        'mid_game'           => $row['mid_game'],
        'late_game'          => $row['late_game'],
        'conseils'           => $row['gameplay_tips'],
        'runes_objets'       => $row['runes_items'],
        'resume'             => $row['summary']
    ];

    echo json_encode($response);
    exit;

} catch (PDOException $e) {
    // Erreur côté serveur
    echo json_encode(['error' => true, 'message' => 'Erreur DB : ' . $e->getMessage()]);
    exit;
}
