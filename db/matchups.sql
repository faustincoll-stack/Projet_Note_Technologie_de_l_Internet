-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 10 jan. 2026 à 16:27
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
-- Index pour les tables déchargées
--

--
-- Index pour la table `matchup_texts`
--
ALTER TABLE `matchup_texts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_matchup` (`champion_from`,`champion_to`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `matchup_texts`
--
ALTER TABLE `matchup_texts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
