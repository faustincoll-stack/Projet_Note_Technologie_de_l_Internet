-- Création de la base
CREATE DATABASE IF NOT EXISTS lol_helper;
USE lol_helper;

-- Table users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    favorite_top_champion VARCHAR(50),
    last_matchup VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Données initiales (optionnel)
INSERT INTO users (username, email, password, favorite_top_champion, last_matchup)
VALUES ('testuser', 'test@lol.com', '$2y$10$examplehash', 'Darius', 'Darius vs Garen');