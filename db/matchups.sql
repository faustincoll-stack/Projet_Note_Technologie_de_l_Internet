-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 11 jan. 2026 à 00:01
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `matchups`
--

-- --------------------------------------------------------

--
-- Structure de la table `matchup_texts`
--

CREATE TABLE `matchup_texts` (
  `id` int(11) NOT NULL,
  `champion_from` varchar(50) NOT NULL,
  `champion_to` varchar(50) NOT NULL,
  `presentation` text NOT NULL,
  `win_conditions` text NOT NULL,
  `early_game` text NOT NULL,
  `mid_game` text NOT NULL,
  `late_game` text NOT NULL,
  `gameplay_tips` text NOT NULL,
  `runes_items` text NOT NULL,
  `summary` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `matchup_texts`
--

INSERT INTO `matchup_texts` (`id`, `champion_from`, `champion_to`, `presentation`, `win_conditions`, `early_game`, `mid_game`, `late_game`, `gameplay_tips`, `runes_items`, `summary`, `created_at`) VALUES
(1, 'Warwick', 'Garen', 'Matchup difficile. Les échanges doivent être prudents lorsque Garen à son ult.', 'Warwick gagne en maintenant la pression avec ses soins et applicant un snowball avant que Garen ai son niveau 6.', 'Niveau 1-5 : Maintenez attant que possible les trades prolongés mais sortez de la zone du E de Garen si possible.', 'Niveau 6+ : Avec votre R (Infinite Duress), cherchez à ult juste après ou avant celui de Garen afin de réduire son burst et se régénérer.', 'Late game : Warwick est rarement assez tanky mais initie mieux les combats. Attention à l ultime et la movement speed de Garen', 'Attention au timing de R et de E. Évitez les duels prolongés si Garen a un avantage d’items.', 'Lethal tempo ou Press the Attack, BOTRK, Stridebreaker, Eventuellement Randuins Omen en early-mid puis tank items.', 'Résumé rapide : Warwick doit jouer agressif early, chercher des trades long sans trop subir le E de Garen, et utiliser R pour cibler les carry en mid-late.', '2026-01-10 20:13:23');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `favorite_top_champion` varchar(50) DEFAULT NULL,
  `last_Ennemie` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_play` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `favorite_top_champion`, `last_Ennemie`, `created_at`, `last_play`) VALUES
(1, 'test', 'test@gmail.com', '$2y$10$GhWb3lP8gJz9qn00w51/P.SIIR2QesJ.2uLDLh4cqmFOYwi2APXd2', 'Warwick', 'Darius', '2026-01-10 22:36:01', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `matchup_texts`
--
ALTER TABLE `matchup_texts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_matchup` (`champion_from`,`champion_to`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `matchup_texts`
--
ALTER TABLE `matchup_texts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
