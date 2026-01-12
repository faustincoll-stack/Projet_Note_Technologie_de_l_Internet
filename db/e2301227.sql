-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 11 jan. 2026 à 19:19
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
(1, 'Warwick', 'Garen', 'Matchup difficile. Les échanges doivent être prudents lorsque Garen à son ult.', 'Warwick gagne en maintenant la pression avec ses soins et applicant un snowball avant que Garen ai son niveau 6.', 'Niveau 1-5 : Maintenez attant que possible les trades prolongés mais sortez de la zone du E de Garen si possible.', 'Niveau 6+ : Avec votre R (Infinite Duress), cherchez à ult juste après ou avant celui de Garen afin de réduire son burst et se régénérer.', 'Late game : Warwick est rarement assez tanky mais initie mieux les combats. Attention à l ultime et la movement speed de Garen', 'Attention au timing de R et de E. Évitez les duels prolongés si Garen a un avantage d’items.', 'Lethal tempo ou Press the Attack, BOTRK, Stridebreaker, Eventuellement Randuins Omen en early-mid puis tank items.', 'Résumé rapide : Warwick doit jouer agressif early, chercher des trades long sans trop subir le E de Garen, et utiliser R pour cibler les carry en mid-late.', '2026-01-10 20:13:23'),
(23, 'Warwick', 'Aatrox', 'Matchup Warwick contre Aatrox, duel de sustain et de timing.', 'Warwick doit profiter des erreurs de positionnement d’Aatrox.', 'Jouer prudemment avant le niveau 6, éviter les trades prolongés.', 'Forcer des combats courts et utiliser l’ultime pour engager.', 'Warwick devient un bon frontline mais doit éviter les teamfights longs.', 'Attendre le Q d’Aatrox avant d’engager.', 'Conquérant, objets anti-soin recommandés.', 'Matchup équilibré basé sur le timing.', '2026-01-11 17:23:35'),
(24, 'Warwick', 'Akali', 'Matchup difficile contre Akali, très mobile.', 'Révéler Akali et forcer les combats prolongés.', 'Ne pas sur-push, respecter son burst.', 'Utiliser l’ultime pour l’empêcher de s’échapper.', 'Warwick résiste mieux mais Akali reste dangereuse.', 'Garder la vision et engager après son dash.', 'Volonté + ténacité, items MR.', 'Matchup technique demandant patience.', '2026-01-11 17:23:35'),
(25, 'Warwick', 'Camille', 'Matchup exigeant face à la mobilité de Camille.', 'Punir Camille quand son E est en cooldown.', 'Éviter les trades courts.', 'Warwick peut dominer les escarmouches.', 'Camille scale très bien, attention au splitpush.', 'Engager après son hookshot.', 'Plaque du mort, anti-burst.', 'Matchup skill-based.', '2026-01-11 17:23:35'),
(26, 'Warwick', 'Darius', 'Matchup brutal contre Darius.', 'Éviter les trades prolongés.', 'Respecter le niveau 1-3.', 'Warwick peut gagner avec un bon timing d’ultime.', 'Darius devient dangereux en teamfight.', 'Engager uniquement avec l’ultime.', 'Anti-soin obligatoire.', 'Matchup défavorable.', '2026-01-11 17:23:35'),
(27, 'Warwick', 'Fiora', 'Matchup très difficile contre Fiora.', 'Empêcher Fiora de proquer ses vitaux.', 'Jouer safe et demander de l’aide.', 'Warwick peut catch Fiora en roaming.', 'Fiora domine en splitpush.', 'Forcer les teamfights.', 'Armure + anti-soin.', 'Matchup compliqué.', '2026-01-11 17:23:35'),
(28, 'Warwick', 'Gnar', 'Matchup basé sur la gestion de la rage.', 'Engager Gnar hors forme méga.', 'Ne pas chase en mini.', 'Warwick peut contrôler les fights.', 'Attention aux teamfights méga.', 'Observer la barre de rage.', 'Tenacité recommandée.', 'Matchup équilibré.', '2026-01-11 17:23:35'),
(29, 'Warwick', 'Irelia', 'Matchup très dangereux.', 'Éviter les waves favorables à Irelia.', 'Respecter son passif.', 'Ultime crucial pour la contrôler.', 'Irelia domine en duel.', 'Ne jamais engager sans ulti.', 'Armure + PV.', 'Matchup défavorable.', '2026-01-11 17:23:35'),
(30, 'Warwick', 'Jax', 'Matchup difficile après niveau 6.', 'Punir Jax avant son scaling.', 'Trades prudents.', 'Warwick utile en teamfight.', 'Jax devient monstrueux en late.', 'Forcer les fights groupés.', 'Anti-on-hit.', 'Matchup scaling défavorable.', '2026-01-11 17:23:35'),
(31, 'Warwick', 'Jayce', 'Matchup poke.', 'Survivre au poke.', 'Farm sous tour.', 'Engager avec l’ultime.', 'Jayce perd en impact.', 'Timing d’engage.', 'MR recommandée.', 'Matchup correct.', '2026-01-11 17:23:35'),
(32, 'Warwick', 'Kennen', 'Matchup magique.', 'Respecter le poke.', 'Ne pas chase.', 'Warwick peut interrompre Kennen.', 'Attention aux ultimates.', 'Engager après R.', 'MR + ténacité.', 'Matchup dangereux.', '2026-01-11 17:23:35'),
(33, 'Warwick', 'Malphite', 'Matchup tank.', 'Peu d’agression possible.', 'Farm tranquille.', 'Warwick sustain bien.', 'Malphite utile en teamfight.', 'Ne pas forcer.', 'Objets PV.', 'Matchup neutre.', '2026-01-11 17:23:35'),
(34, 'Warwick', 'Nasus', 'Matchup early favorable.', 'Empêcher Nasus de stack.', 'Harceler constamment.', 'Warwick doit snowball.', 'Nasus scale très fort.', 'Roam si nécessaire.', 'Anti-slow.', 'Matchup à tempo.', '2026-01-11 17:23:35'),
(35, 'Warwick', 'Ornn', 'Matchup tank.', 'Peu de kill pressure.', 'Farm.', 'Warwick utile en fight.', 'Ornn apporte beaucoup d’utilité.', 'Peel l’équipe.', 'PV + MR.', 'Matchup tranquille.', '2026-01-11 17:23:35'),
(36, 'Warwick', 'Renekton', 'Matchup early violent.', 'Éviter les trades prolongés.', 'Respecter le burst.', 'Warwick peut retourner les fights.', 'Renekton perd en late.', 'Attendre cooldowns.', 'Armure recommandée.', 'Matchup skill-based.', '2026-01-11 17:23:35'),
(37, 'Warwick', 'Riven', 'Matchup mécanique.', 'Punir ses erreurs.', 'Trades courts.', 'Ultime décisif.', 'Riven reste dangereuse.', 'Ne pas chase.', 'Armure.', 'Matchup difficile.', '2026-01-11 17:23:35'),
(38, 'Warwick', 'Sett', 'Matchup physique.', 'Éviter le true damage.', 'Trades calculés.', 'Warwick peut sustain.', 'Sett fort en teamfight.', 'Spacing important.', 'Armure + PV.', 'Matchup équilibré.', '2026-01-11 17:23:35'),
(39, 'Warwick', 'Shen', 'Matchup macro.', 'Punir avant niveau 6.', 'Farm.', 'Warwick roam mieux.', 'Shen apporte de l’utilité.', 'Ping son ultime.', 'PV.', 'Matchup stratégique.', '2026-01-11 17:23:35'),
(40, 'Warwick', 'Teemo', 'Matchup poke.', 'Survivre early.', 'Ne pas chase.', 'Warwick peut all-in.', 'Teemo devient pénible.', 'Vision importante.', 'MR.', 'Matchup irritant.', '2026-01-11 17:23:35'),
(41, 'Warwick', 'Yone', 'Matchup dangereux.', 'Éviter les trades prolongés.', 'Respecter son E.', 'Ultime pour l’attraper.', 'Yone scale très fort.', 'Engager après E.', 'Armure.', 'Matchup difficile.', '2026-01-11 17:23:35'),
(42, 'Warwick', 'Yorick', 'Matchup splitpush.', 'Empêcher la Maiden.', 'Trades avant niveau 6.', 'Warwick doit roam.', 'Yorick domine en side.', 'Forcer les teamfights.', 'Anti-push.', 'Matchup macro.', '2026-01-11 17:23:35'),
(43, 'Aatrox', 'Warwick', 'Aatrox affronte Warwick dans un duel de sustain.', 'Forcer des trades longs.', 'Utiliser la portée.', 'Attention à l’ultime de Warwick.', 'Aatrox fort en teamfight.', 'Ne pas se faire attraper.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:30:52'),
(44, 'Akali', 'Warwick', 'Akali affronte un bruiser tanky.', 'Burst rapide.', 'Jouer avec la mobilité.', 'Éviter le fear.', 'Akali domine en late.', 'Forcer les picks.', 'AP burst.', 'Matchup favorable.', '2026-01-11 17:30:52'),
(45, 'Camille', 'Warwick', 'Camille contre un duelliste sustain.', 'Trades courts.', 'Utiliser E intelligemment.', 'Splitpush.', 'Camille excelle en side.', 'Forcer le 1v1.', 'Conquérant.', 'Matchup skill-based.', '2026-01-11 17:30:52'),
(46, 'Darius', 'Warwick', 'Darius affronte un champion tanky.', 'Stacker le passif.', 'Dominer early.', 'Attention à l’ultime.', 'Darius très fort.', 'Trades longs.', 'Conquérant.', 'Matchup favorable.', '2026-01-11 17:30:52'),
(47, 'Fiora', 'Warwick', 'Fiora domine le duel.', 'Jouer le split.', 'Punir les erreurs.', 'Win en 1v1.', 'Fiora imbattable.', 'Jouer les vitaux.', 'Conquérant.', 'Matchup très favorable.', '2026-01-11 17:30:52'),
(48, 'Garen', 'Warwick', 'Garen face à un sustain.', 'Burst puis reculer.', 'Farm.', 'Moins d’impact.', 'Garen chute.', 'Jouer le silence.', 'PV.', 'Matchup défavorable.', '2026-01-11 17:30:52'),
(49, 'Gnar', 'Warwick', 'Gnar doit gérer sa rage.', 'Kite Warwick.', 'Poke en mini.', 'Teamfight.', 'Attention à l’engage.', 'Spacing.', 'Vitesse.', 'Matchup équilibré.', '2026-01-11 17:30:52'),
(50, 'Irelia', 'Warwick', 'Irelia affronte un bruiser.', 'Stacker les sbires.', 'Trades explosifs.', 'Contrôle difficile.', 'Irelia scale.', 'Dash intelligents.', 'Conquérant.', 'Matchup favorable.', '2026-01-11 17:30:52'),
(51, 'Jax', 'Warwick', 'Jax joue le scaling.', 'Farm.', 'Respecter early.', 'Splitpush.', 'Jax domine.', 'Jouer le counter strike.', 'On-hit.', 'Matchup favorable late.', '2026-01-11 17:30:52'),
(52, 'Jayce', 'Warwick', 'Jayce poke Warwick.', 'Poke constant.', 'Avantage early.', 'Moins d’impact.', 'Jayce chute.', 'Kite.', 'Létalité.', 'Matchup skill-based.', '2026-01-11 17:30:52'),
(53, 'Kennen', 'Warwick', 'Kennen poke.', 'Harass.', 'Jouer la distance.', 'Ultime décisif.', 'Teamfight fort.', 'Engage multi.', 'AP.', 'Matchup favorable.', '2026-01-11 17:30:52'),
(54, 'Malphite', 'Warwick', 'Malphite joue défensif.', 'Survivre.', 'Farm.', 'Engage teamfight.', 'Très utile.', 'Ultime clé.', 'Armure.', 'Matchup neutre.', '2026-01-11 17:30:52'),
(55, 'Nasus', 'Warwick', 'Nasus scale.', 'Stacker.', 'Souffrir early.', 'Midgame solide.', 'Nasus domine.', 'Splitpush.', 'Tenacité.', 'Matchup scaling.', '2026-01-11 17:30:52'),
(56, 'Ornn', 'Warwick', 'Ornn tank.', 'Farm.', 'Survivre.', 'Teamfight.', 'Utilité.', 'Peel.', 'Tank.', 'Matchup neutre.', '2026-01-11 17:30:52'),
(57, 'Renekton', 'Warwick', 'Renekton early.', 'Burst.', 'Dominer lane.', 'Chute.', 'Faible late.', 'Cooldowns.', 'AD.', 'Matchup early favorable.', '2026-01-11 17:30:52'),
(58, 'Riven', 'Warwick', 'Riven mécanique.', 'Punir.', 'Trades courts.', 'Burst.', 'Très dangereuse.', 'Mobility.', 'Conquérant.', 'Matchup skill-based.', '2026-01-11 17:30:52'),
(59, 'Sett', 'Warwick', 'Sett tanky.', 'Trades puissants.', 'Respecter le true damage.', 'Teamfight.', 'Bon impact.', 'Positionnement.', 'PV.', 'Matchup équilibré.', '2026-01-11 17:30:52'),
(60, 'Shen', 'Warwick', 'Shen macro.', 'Roam.', 'Farm.', 'Ultime global.', 'Support.', 'Map awareness.', 'Tank.', 'Matchup stratégique.', '2026-01-11 17:30:52'),
(61, 'Teemo', 'Warwick', 'Teemo poke.', 'Harass.', 'Zone.', 'Champignons.', 'Irritant.', 'Vision.', 'AP.', 'Matchup favorable early.', '2026-01-11 17:30:52'),
(62, 'Yone', 'Warwick', 'Yone scaling.', 'Trades agressifs.', 'Respect early.', 'Burst.', 'Très fort late.', 'Timing E.', 'Crit.', 'Matchup favorable.', '2026-01-11 17:30:52'),
(63, 'Yorick', 'Warwick', 'Yorick splitpush.', 'Pousser.', 'Maiden.', 'Side lane.', 'Très fort.', 'Macro.', 'Push.', 'Matchup favorable.', '2026-01-11 17:30:52'),
(105, 'Aatrox', 'Akali', 'Aatrox affronte une assassine mobile.', 'Forcer des trades prolongés.', 'Poke avec Q.', 'Attention au burst.', 'Aatrox utile en teamfight.', 'Prédire les dashs.', 'Conquérant.', 'Matchup skill-based.', '2026-01-11 17:35:10'),
(106, 'Aatrox', 'Camille', 'Camille cherche des trades courts.', 'Punir les erreurs.', 'Respecter le hook.', 'Splitpush dangereux.', 'Aatrox fort en fight.', 'Forcer les combats groupés.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:35:10'),
(107, 'Aatrox', 'Darius', 'Duel de bruisers.', 'Éviter les stacks.', 'Spacing important.', 'Très dangereux.', 'Darius fort en duel.', 'Jouer la portée.', 'Conquérant.', 'Matchup difficile.', '2026-01-11 17:35:10'),
(108, 'Aatrox', 'Fiora', 'Fiora domine le 1v1.', 'Éviter les duels.', 'Jouer safe.', 'Splitpush constant.', 'Aatrox moins fort.', 'Teamfight.', 'Conquérant.', 'Matchup défavorable.', '2026-01-11 17:35:10'),
(109, 'Aatrox', 'Garen', 'Garen simple mais solide.', 'Trades longs.', 'Harass.', 'Attention au silence.', 'Aatrox scale mieux.', 'Jouer la portée.', 'Conquérant.', 'Matchup favorable.', '2026-01-11 17:35:10'),
(110, 'Aatrox', 'Gnar', 'Gnar poke en mini.', 'Attraper en mega.', 'Respect early.', 'Teamfight.', 'Aatrox très fort.', 'Timing de rage.', 'Conquérant.', 'Matchup favorable.', '2026-01-11 17:35:10'),
(111, 'Aatrox', 'Irelia', 'Irelia explosive.', 'Punir early.', 'Éviter les resets.', 'Très mobile.', 'Irelia scale.', 'Contrôler la wave.', 'Conquérant.', 'Matchup difficile.', '2026-01-11 17:35:10'),
(112, 'Aatrox', 'Jax', 'Jax joue le scaling.', 'Dominer early.', 'Trades prolongés.', 'Splitpush.', 'Jax fort late.', 'Forcer midgame.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:35:10'),
(113, 'Aatrox', 'Jayce', 'Jayce poke à distance.', 'Engage.', 'Souffrir early.', 'Moins de pression.', 'Aatrox domine.', 'Tenir la lane.', 'Conquérant.', 'Matchup favorable.', '2026-01-11 17:35:10'),
(114, 'Aatrox', 'Kennen', 'Kennen poke.', 'Attraper.', 'Attention au harass.', 'Ultime décisif.', 'Teamfight clé.', 'Flank.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:35:10'),
(115, 'Aatrox', 'Malphite', 'Malphite tank.', 'Farm.', 'Trades limités.', 'Engage.', 'Aatrox fait des dégâts.', 'Split ou flank.', 'Conquérant.', 'Matchup neutre.', '2026-01-11 17:35:10'),
(116, 'Aatrox', 'Nasus', 'Nasus scale.', 'Punir early.', 'Zone.', 'Stack dangereux.', 'Nasus devient fort.', 'Finir tôt.', 'Conquérant.', 'Matchup favorable early.', '2026-01-11 17:35:10'),
(117, 'Aatrox', 'Ornn', 'Ornn tank utilitaire.', 'Poke.', 'Farm.', 'Teamfight.', 'Ornn très utile.', 'Splitpush.', 'Conquérant.', 'Matchup neutre.', '2026-01-11 17:35:10'),
(118, 'Aatrox', 'Renekton', 'Duel early violent.', 'Spacing.', 'Respecter fury.', 'Chute.', 'Aatrox scale.', 'Jouer midgame.', 'Conquérant.', 'Matchup skill-based.', '2026-01-11 17:35:10'),
(119, 'Aatrox', 'Riven', 'Riven mécanique.', 'Punir les erreurs.', 'Trades courts.', 'Très dangereuse.', 'Teamfight.', 'Zoning.', 'Conquérant.', 'Matchup difficile.', '2026-01-11 17:35:10'),
(120, 'Aatrox', 'Sett', 'Sett très tanky.', 'Trades longs.', 'Attention true damage.', 'Teamfight.', 'Aatrox utile.', 'Positionnement.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:35:10'),
(121, 'Aatrox', 'Shen', 'Shen macro.', 'Push.', 'Farm.', 'Ultime global.', 'Aatrox plus fort en fight.', 'Forcer les combats.', 'Conquérant.', 'Matchup favorable.', '2026-01-11 17:35:10'),
(122, 'Aatrox', 'Teemo', 'Teemo poke.', 'Attraper.', 'Attention aveuglement.', 'Champignons.', 'Aatrox résistant.', 'Vision.', 'Conquérant.', 'Matchup favorable.', '2026-01-11 17:35:10'),
(123, 'Aatrox', 'Yone', 'Yone scaling.', 'Punir early.', 'Trades explosifs.', 'Très fort late.', 'Aatrox midgame.', 'Timing.', 'Conquérant.', 'Matchup skill-based.', '2026-01-11 17:35:10'),
(124, 'Aatrox', 'Yorick', 'Yorick splitpush.', 'Punir early.', 'Éviter la cage.', 'Side lane.', 'Yorick fort.', 'Teamfight.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:35:10'),
(125, 'Akali', 'Aatrox', 'Akali affronte un bruiser à grande portée.', 'Trades courts et burst.', 'Harass puis disengage.', 'Aatrox devient tanky.', 'Akali forte en pick.', 'Abuser de la mobilité.', 'Électrocution.', 'Matchup skill-based.', '2026-01-11 17:38:51'),
(126, 'Akali', 'Camille', 'Camille cherche des trades précis.', 'Éviter les engages.', 'Respect du hook.', 'Duel dangereux.', 'Akali meilleure en flank.', 'Roam.', 'Électrocution.', 'Matchup équilibré.', '2026-01-11 17:38:51'),
(127, 'Akali', 'Darius', 'Darius domine les trades longs.', 'Burst rapide.', 'Très dangereux.', 'Darius snowball.', 'Akali évite le 1v1.', 'Poke.', 'Électrocution.', 'Matchup difficile.', '2026-01-11 17:38:51'),
(128, 'Akali', 'Fiora', 'Fiora excelle en duel.', 'Éviter le 1v1.', 'Trades rapides.', 'Splitpush.', 'Akali utile en teamfight.', 'Ne pas all-in.', 'Électrocution.', 'Matchup défavorable.', '2026-01-11 17:38:51'),
(129, 'Akali', 'Garen', 'Garen simple mais résistant.', 'Harass constant.', 'Attention au silence.', 'Ultime dangereux.', 'Akali peut pick.', 'Spacing.', 'Électrocution.', 'Matchup favorable.', '2026-01-11 17:38:51'),
(130, 'Akali', 'Gnar', 'Gnar poke à distance.', 'All-in mini.', 'Respect early.', 'Mega Gnar fort.', 'Akali flank.', 'Timing rage.', 'Électrocution.', 'Matchup équilibré.', '2026-01-11 17:38:51'),
(131, 'Akali', 'Irelia', 'Irelia très mobile.', 'Trades courts.', 'Très agressif.', 'Irelia snowball.', 'Akali évite les duels.', 'Wave control.', 'Électrocution.', 'Matchup difficile.', '2026-01-11 17:38:51'),
(132, 'Akali', 'Jax', 'Jax scale très fort.', 'Punir early.', 'Attention E.', 'Splitpush.', 'Akali roam.', 'Pick off.', 'Électrocution.', 'Matchup équilibré.', '2026-01-11 17:38:51'),
(133, 'Akali', 'Jayce', 'Jayce poke à distance.', 'All-in rapide.', 'Subir early.', 'Jayce chute.', 'Akali domine.', 'Engage.', 'Électrocution.', 'Matchup favorable.', '2026-01-11 17:38:51'),
(134, 'Akali', 'Kennen', 'Kennen poke et AoE.', 'Trades courts.', 'Attention ulti.', 'Teamfight clé.', 'Akali flank.', 'Positionnement.', 'Électrocution.', 'Matchup équilibré.', '2026-01-11 17:38:51'),
(135, 'Akali', 'Malphite', 'Malphite très tanky.', 'Farm.', 'Peu d’ouvertures.', 'Engage décisif.', 'Akali évite.', 'Split.', 'Électrocution.', 'Matchup défavorable.', '2026-01-11 17:38:51'),
(136, 'Akali', 'Nasus', 'Nasus scale lentement.', 'Harass early.', 'Zone.', 'Nasus devient fort.', 'Akali roam.', 'Punir tôt.', 'Électrocution.', 'Matchup favorable early.', '2026-01-11 17:38:51'),
(137, 'Akali', 'Ornn', 'Ornn tank utilitaire.', 'Poke.', 'Farm.', 'Teamfight.', 'Akali pick.', 'Éviter groupé.', 'Électrocution.', 'Matchup neutre.', '2026-01-11 17:38:51'),
(138, 'Akali', 'Renekton', 'Renekton très fort early.', 'Éviter trades.', 'Survivre.', 'Chute midgame.', 'Akali scale.', 'Patience.', 'Électrocution.', 'Matchup difficile.', '2026-01-11 17:38:51'),
(139, 'Akali', 'Riven', 'Riven explosive.', 'Trades rapides.', 'Très dangereux.', 'Snowball.', 'Akali flank.', 'Éviter all-in.', 'Électrocution.', 'Matchup skill-based.', '2026-01-11 17:38:51'),
(140, 'Akali', 'Sett', 'Sett tanky avec burst.', 'Trades courts.', 'Attention true damage.', 'Teamfight.', 'Akali pick.', 'Spacing.', 'Électrocution.', 'Matchup difficile.', '2026-01-11 17:38:51'),
(141, 'Akali', 'Shen', 'Shen macro-oriented.', 'Push.', 'Harass.', 'Ultime global.', 'Akali roam.', 'Forcer fights.', 'Électrocution.', 'Matchup favorable.', '2026-01-11 17:38:51'),
(142, 'Akali', 'Teemo', 'Teemo poke constant.', 'All-in.', 'Attention aveuglement.', 'Champignons.', 'Akali élimine.', 'Vision.', 'Électrocution.', 'Matchup favorable.', '2026-01-11 17:38:51'),
(143, 'Akali', 'Yone', 'Yone scaling fort.', 'Punir early.', 'Trades explosifs.', 'Late game dangereux.', 'Akali pick.', 'Timing.', 'Électrocution.', 'Matchup skill-based.', '2026-01-11 17:38:51'),
(144, 'Akali', 'Yorick', 'Yorick splitpush.', 'Harass early.', 'Éviter la cage.', 'Side lane.', 'Akali roam.', 'Ne pas rester.', 'Électrocution.', 'Matchup équilibré.', '2026-01-11 17:38:51'),
(145, 'Camille', 'Aatrox', 'Camille affronte un bruiser à grande portée.', 'Trades courts et burst.', 'Harass puis disengage.', 'Aatrox devient tanky.', 'Akali forte en pick.', 'Abuser de la mobilité.', 'Électrocution.', 'Matchup skill-based.', '2026-01-11 17:41:57'),
(146, 'Camille', 'Akali', 'Camille cherche des trades précis.', 'Éviter les engages.', 'Respect du hook.', 'Duel dangereux.', 'Akali meilleure en flank.', 'Roam.', 'Électrocution.', 'Matchup équilibré.', '2026-01-11 17:41:57'),
(147, 'Camille', 'Darius', 'Darius domine les trades prolongés.', 'Trades courts et mobilité.', 'Éviter le all-in.', 'Darius très menaçant.', 'Camille splitpush.', 'Spacing.', 'Conquérant.', 'Matchup difficile.', '2026-01-11 17:41:57'),
(148, 'Camille', 'Fiora', 'Duel très technique.', 'Timing des trades.', 'Respect du riposte.', 'Splitpush intense.', 'Macro.', 'Vision.', 'Conquérant.', 'Matchup skill-based.', '2026-01-11 17:41:57'),
(149, 'Camille', 'Garen', 'Garen simple mais résistant.', 'Poke et disengage.', 'Attention silence.', 'Ultime dangereux.', 'Camille outscale.', 'Patience.', 'Conquérant.', 'Matchup favorable.', '2026-01-11 17:41:57'),
(150, 'Camille', 'Gnar', 'Gnar poke à distance.', 'All-in mini.', 'Respect early.', 'Mega Gnar fort.', 'Splitpush.', 'Timing rage.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:41:57'),
(151, 'Camille', 'Irelia', 'Irelia très agressive.', 'Trades courts.', 'Éviter snowball.', 'Duel difficile.', 'Camille macro.', 'Wave control.', 'Conquérant.', 'Matchup difficile.', '2026-01-11 17:41:57'),
(152, 'Camille', 'Jax', 'Jax scale fort.', 'Punir early.', 'Attention E.', 'Splitpush.', 'Camille macro.', 'Vision.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:41:57'),
(153, 'Camille', 'Jayce', 'Jayce poke early.', 'All-in.', 'Subir early.', 'Jayce chute.', 'Camille domine.', 'Engage.', 'Conquérant.', 'Matchup favorable.', '2026-01-11 17:41:57'),
(154, 'Camille', 'Kennen', 'Kennen poke et teamfight.', 'Trades courts.', 'Attention ulti.', 'Teamfight clé.', 'Split.', 'Flank.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:41:57'),
(155, 'Camille', 'Malphite', 'Malphite très tanky.', 'Farm.', 'Peu d’ouvertures.', 'Engage décisif.', 'Camille split.', 'Ne pas group.', 'Conquérant.', 'Matchup défavorable.', '2026-01-11 17:41:57'),
(156, 'Camille', 'Nasus', 'Nasus scale lentement.', 'Punir early.', 'Zone.', 'Nasus devient fort.', 'Camille split.', 'Harass.', 'Conquérant.', 'Matchup favorable early.', '2026-01-11 17:41:57'),
(157, 'Camille', 'Ornn', 'Ornn utilitaire.', 'Farm.', 'Trades courts.', 'Teamfight.', 'Camille split.', 'Macro.', 'Conquérant.', 'Matchup neutre.', '2026-01-11 17:41:57'),
(158, 'Camille', 'Renekton', 'Renekton très fort early.', 'Survivre.', 'Éviter trades.', 'Chute mid.', 'Camille scale.', 'Patience.', 'Conquérant.', 'Matchup difficile.', '2026-01-11 17:41:57'),
(159, 'Camille', 'Riven', 'Riven explosive.', 'Trades courts.', 'Très mécanique.', 'Snowball.', 'Camille macro.', 'Éviter all-in.', 'Conquérant.', 'Matchup skill-based.', '2026-01-11 17:41:57'),
(160, 'Camille', 'Sett', 'Sett tanky et burst.', 'Trades courts.', 'Attention true damage.', 'Teamfight.', 'Camille split.', 'Spacing.', 'Conquérant.', 'Matchup difficile.', '2026-01-11 17:41:57'),
(161, 'Camille', 'Shen', 'Shen macro.', 'Push.', 'Harass.', 'Ultime global.', 'Camille split.', 'Forcer.', 'Conquérant.', 'Matchup favorable.', '2026-01-11 17:41:57'),
(162, 'Camille', 'Teemo', 'Teemo poke.', 'All-in.', 'Éviter blind.', 'Champignons.', 'Camille engage.', 'Vision.', 'Conquérant.', 'Matchup favorable.', '2026-01-11 17:41:57'),
(163, 'Camille', 'Yone', 'Yone scaling fort.', 'Punir early.', 'Trades explosifs.', 'Late game dangereux.', 'Camille split.', 'Timing.', 'Conquérant.', 'Matchup skill-based.', '2026-01-11 17:41:57'),
(164, 'Camille', 'Yorick', 'Yorick splitpush.', 'Harass early.', 'Éviter la cage.', 'Side lane.', 'Camille roam.', 'Macro.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:41:57'),
(165, 'Darius', 'Aatrox', 'Deux bruisers puissants.', 'Trades prolongés.', 'Dominer early.', 'Attention sustain.', 'Frontline.', 'Spacing.', 'Conquérant.', 'Matchup skill-based.', '2026-01-11 17:45:49'),
(166, 'Darius', 'Akali', 'Akali mobile.', 'Punir early.', 'Zone avec pull.', 'Akali one-shot.', 'Peel.', 'Vision.', 'Conquérant.', 'Matchup favorable.', '2026-01-11 17:45:49'),
(167, 'Darius', 'Camille', 'Camille mobile.', 'Forcer trades longs.', 'Punir dash.', 'Splitpush.', 'Teamfight.', 'Attraper Camille.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:45:49'),
(168, 'Darius', 'Fiora', 'Duel très dangereux.', 'Punir erreurs.', 'Respect riposte.', 'Split intense.', '1v1.', 'Mind game.', 'Conquérant.', 'Matchup difficile.', '2026-01-11 17:45:49'),
(169, 'Darius', 'Garen', 'Duel de juggernauts.', 'Trades prolongés.', 'Abuser du passif.', 'Ultime clé.', 'Frontline.', 'Timing R.', 'Conquérant.', 'Matchup favorable.', '2026-01-11 17:45:49'),
(170, 'Darius', 'Gnar', 'Gnar poke.', 'All-in mini.', 'Attraper.', 'Mega Gnar.', 'Teamfight.', 'Timing rage.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:45:49'),
(171, 'Darius', 'Irelia', 'Irelia très mobile.', 'Attraper avec E.', 'Éviter reset.', 'Duel explosif.', 'Frontline.', 'Spacing.', 'Conquérant.', 'Matchup skill-based.', '2026-01-11 17:45:49'),
(172, 'Darius', 'Jax', 'Jax scale.', 'Punir early.', 'Trades longs.', 'Splitpush.', 'Teamfight.', 'Forcer combats.', 'Conquérant.', 'Matchup favorable early.', '2026-01-11 17:45:49'),
(173, 'Darius', 'Jayce', 'Jayce poke.', 'All-in.', 'Subir early.', 'Jayce chute.', 'Frontline.', 'Flash engage.', 'Conquérant.', 'Matchup favorable.', '2026-01-11 17:45:49'),
(174, 'Darius', 'Kennen', 'Kennen poke.', 'Attraper.', 'Respect ulti.', 'Teamfight.', 'Peel.', 'Flash R.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:45:49'),
(175, 'Darius', 'Malphite', 'Malphite très tanky.', 'Farm.', 'Peu d’ouvertures.', 'Ultime engage.', 'Frontline.', 'Anti-armor.', 'Conquérant.', 'Matchup défavorable.', '2026-01-11 17:45:49'),
(176, 'Darius', 'Nasus', 'Nasus scaling.', 'Zone early.', 'Freeze.', 'Nasus très fort.', 'Teamfight.', 'End early.', 'Conquérant.', 'Matchup favorable early.', '2026-01-11 17:45:49'),
(177, 'Darius', 'Ornn', 'Ornn utilitaire.', 'Trades longs.', 'Punir cooldowns.', 'Teamfight.', 'Frontline.', 'Timing.', 'Conquérant.', 'Matchup neutre.', '2026-01-11 17:45:49'),
(178, 'Darius', 'Renekton', 'Renekton fort early.', 'Trades longs.', 'Snowball.', 'Renekton chute.', 'Teamfight.', 'Pression.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:45:49'),
(179, 'Darius', 'Riven', 'Riven burst.', 'Attraper.', 'Éviter short trades.', 'Riven snowball.', 'Frontline.', 'Spacing.', 'Conquérant.', 'Matchup skill-based.', '2026-01-11 17:45:49'),
(180, 'Darius', 'Sett', 'Sett très tanky.', 'Trades prolongés.', 'Attention true damage.', 'Teamfight.', 'Frontline.', 'Timing.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:45:49'),
(181, 'Darius', 'Shen', 'Shen utilitaire.', 'Push.', 'Trades longs.', 'Ultime global.', 'Teamfight.', 'Forcer TP.', 'Conquérant.', 'Matchup favorable.', '2026-01-11 17:45:49'),
(182, 'Darius', 'Teemo', 'Teemo poke.', 'All-in.', 'Éviter blind.', 'Champignons.', 'Frontline.', 'Vision.', 'Conquérant.', 'Matchup favorable.', '2026-01-11 17:45:49'),
(183, 'Darius', 'Yone', 'Yone mobile.', 'Attraper.', 'Trades longs.', 'Late game dangereux.', 'Peel.', 'Spacing.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:45:49'),
(184, 'Darius', 'Yorick', 'Yorick split.', 'Punir early.', 'Briser cage.', 'Side lane.', 'Teamfight.', 'Macro.', 'Conquérant.', 'Matchup favorable.', '2026-01-11 17:45:49'),
(185, 'Fiora', 'Garen', 'Garen tanky et burst.', 'Trades longs, punir Q.', 'Respect passif.', 'All-in quand R dispo.', 'Frontline.', 'Spacing et dodges.', 'Conquérant.', 'Matchup skill-based.', '2026-01-11 17:50:10'),
(186, 'Fiora', 'Gnar', 'Gnar poke.', 'Attendre Mega.', 'All-in mini.', 'Mega Gnar = attention.', 'Teamfight.', 'Peel.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:50:10'),
(187, 'Fiora', 'Irelia', 'Duel skill-based.', 'Trades longs et resets.', 'Patience early.', 'Attraper Irelia.', 'Frontline.', 'Spacing.', 'Conquérant.', 'Matchup difficile.', '2026-01-11 17:50:10'),
(188, 'Fiora', 'Jax', 'Jax scale fort.', 'Attraper early.', 'Respect stun.', '1v1 mid-game.', 'Teamfight.', 'Spacing.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:50:10'),
(189, 'Fiora', 'Jayce', 'Jayce poke et burst.', 'Forcer trades longs.', 'Patience early.', 'All-in si erreur Jayce.', 'Teamfight.', 'Dodge poke.', 'Conquérant.', 'Matchup skill-based.', '2026-01-11 17:50:10'),
(190, 'Fiora', 'Kennen', 'Kennen poke à distance.', 'All-in après poke.', 'Éviter burst.', 'Frontline mid-game.', 'Teamfight.', 'Timing R.', 'Conquérant.', 'Matchup défavorable.', '2026-01-11 17:50:10'),
(191, 'Fiora', 'Malphite', 'Malphite très tanky.', 'Punir early.', 'Trades longs.', 'Ult engage.', 'Teamfight.', 'Spacing et poke.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:50:10'),
(192, 'Fiora', 'Nasus', 'Nasus scale.', 'Punir early trades.', 'Attraper stack.', 'Teamfight mid-late.', 'Frontline.', 'Respect Q.', 'Conquérant.', 'Matchup favorable early.', '2026-01-11 17:50:10'),
(193, 'Fiora', 'Ornn', 'Ornn utilitaire et tanky.', 'Trades longs.', 'Punir cooldowns.', 'Teamfight.', 'Frontline.', 'Spacing.', 'Conquérant.', 'Matchup neutre.', '2026-01-11 17:50:10'),
(194, 'Fiora', 'Renekton', 'Renekton fort early.', 'Trades longs.', 'Punir dash.', 'All-in mid-game.', 'Frontline.', 'Spacing.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:50:10'),
(195, 'Fiora', 'Riven', 'Riven burst et mobility.', 'Trades longs et resets.', 'Éviter combos.', 'All-in mid-game.', 'Teamfight.', 'Spacing.', 'Conquérant.', 'Matchup skill-based.', '2026-01-11 17:50:10'),
(196, 'Fiora', 'Sett', 'Sett tanky et burst.', 'Trades longs.', 'Attention true damage.', 'Teamfight mid-late.', 'Frontline.', 'Timing.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:50:10'),
(197, 'Fiora', 'Shen', 'Shen global ulti.', 'Push early.', 'Punir trades.', 'Teamfight.', 'Frontline.', 'Forcer TP.', 'Conquérant.', 'Matchup favorable.', '2026-01-11 17:50:10'),
(198, 'Fiora', 'Teemo', 'Teemo poke.', 'Attraper early.', 'Éviter mushrooms.', 'All-in mid-game.', 'Teamfight.', 'Vision et position.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:50:10'),
(199, 'Fiora', 'Yone', 'Yone mobile et burst.', 'Punir early.', 'Éviter dash.', 'Frontline mid-game.', 'Teamfight.', 'Spacing.', 'Conquérant.', 'Matchup difficile.', '2026-01-11 17:50:10'),
(200, 'Fiora', 'Yorick', 'Yorick split push.', 'Attraper early.', 'Punir ghouls.', 'Teamfight mid-late.', 'Frontline.', 'Macro et timing.', 'Conquérant.', 'Matchup équilibré.', '2026-01-11 17:50:10'),
(201, 'Fiora', 'Aatrox', 'Matchup skill-based, Aatrox fort early.', 'Punir trades prolongés.', 'Respecter passive.', 'All-in mid-game.', 'Frontline en late.', 'Spacing et dodges.', 'Conquérant.', 'Matchup technique, attention au sustain Aatrox.', '2026-01-11 17:50:35'),
(202, 'Fiora', 'Akali', 'Akali mobile et burst.', 'Trades longs pour reset shroud.', 'Éviter poke early.', 'All-in quand shroud down.', 'Teamfight mid-late.', 'Positioning.', 'Conquérant.', 'Matchup difficile, attention au burst.', '2026-01-11 17:50:35'),
(203, 'Fiora', 'Camille', 'Camille poke et mobility.', 'Punir trades.', 'Respecter hookshot.', 'All-in mid-game.', 'Teamfight.', 'Timing R.', 'Conquérant.', 'Matchup équilibré, skill-based.', '2026-01-11 17:50:35'),
(204, 'Fiora', 'Darius', 'Darius burst et sustain.', 'Trades longs, attention aux stacks.', 'Respecter passif.', 'All-in mid-game.', 'Frontline late-game.', 'Spacing et kiting.', 'Conquérant.', 'Matchup difficile, attention aux reset et ult Darius.', '2026-01-11 17:50:35'),
(221, 'Garen', 'Gnar', 'Matchup vs Gnar avec poke à distance', 'Éviter poke de Gnar', 'Jouer agressif early', 'All-in quand Mega Gnar proche', 'Teamfight, attention stuns', 'Spacing et poke management', 'Conquérant ou Press the Attack', 'Focus sur trades longs, attention aux stuns Gnar', '2026-01-11 17:54:29'),
(222, 'Garen', 'Irelia', 'Irelia mobile et burst', 'Trades longs pour reset passive', 'Respecter dash', 'All-in mid-game', 'Teamfight late-game', 'Positioning et dodges', 'Conquérant', 'Matchup skill-based, attention à l’ulti Irelia', '2026-01-11 17:54:29'),
(223, 'Garen', 'Jax', 'Jax scaling puissant', 'Trades longs early', 'Éviter stun de Jax', 'All-in mid-game', 'Late-game attention split push', 'Spacing et poke', 'Conquérant', 'Matchup technique, patience et timing nécessaire', '2026-01-11 17:54:29'),
(224, 'Garen', 'Jayce', 'Jayce poke ranged', 'Éviter poke early', 'Trades courts', 'All-in mid-game', 'Teamfight mid-late', 'Dodges et timing', 'Conquérant', 'Attention poke et burst', '2026-01-11 17:54:29'),
(225, 'Garen', 'Kennen', 'Kennen poke et stun AOE', 'Éviter AOE', 'Trades courts early', 'All-in mid-game', 'Late-game positionning', 'Spacing et engage', 'Conquérant', 'Attention stun et burst', '2026-01-11 17:54:29'),
(226, 'Garen', 'Malphite', 'Malphite tanky', 'Trades longs', 'Éviter poke et slow', 'All-in mid-game', 'Teamfight front-line', 'Spacing et kiting', 'Conquérant', 'Matchup difficile, patience nécessaire', '2026-01-11 17:54:29'),
(227, 'Garen', 'Nasus', 'Nasus scaling late', 'Punir early', 'Jouer agressif early', 'Mid-game push', 'Late-game éviter duel Nasus', 'Spacing et poke', 'Conquérant', 'Focus early game, éviter trades longs late', '2026-01-11 17:54:29'),
(228, 'Garen', 'Ornn', 'Ornn tanky et engage', 'Trades courts', 'Éviter poke early', 'All-in mid-game', 'Late-game engage', 'Spacing et dodges', 'Conquérant', 'Attention knock-up Ornn', '2026-01-11 17:54:29'),
(229, 'Garen', 'Renekton', 'Renekton burst early', 'Trades courts', 'Éviter stun', 'All-in mid-game', 'Late-game teamfight', 'Spacing et trades', 'Conquérant', 'Attention stun et burst Renekton', '2026-01-11 17:54:29'),
(230, 'Garen', 'Riven', 'Riven burst et mobility', 'Trades longs', 'Éviter combos', 'All-in mid-game', 'Late-game split-push', 'Spacing et dodges', 'Conquérant', 'Matchup skill-based, attention combos Riven', '2026-01-11 17:54:29'),
(231, 'Garen', 'Sett', 'Sett sustain et burst', 'Trades longs', 'Respecter passive', 'All-in mid-game', 'Late-game teamfight', 'Positioning et dodges', 'Conquérant', 'Attention au burst Sett', '2026-01-11 17:54:29'),
(232, 'Garen', 'Shen', 'Shen global ult', 'Trades longs', 'Éviter poke', 'All-in mid-game', 'Late-game teamfight', 'Spacing et engage', 'Conquérant', 'Attention taunt Shen', '2026-01-11 17:54:29'),
(233, 'Garen', 'Teemo', 'Teemo poke', 'Éviter poke early', 'Jouer agressif', 'All-in mid-game', 'Late-game teamfight', 'Dodges et spacing', 'Conquérant', 'Matchup difficile poke et blind', '2026-01-11 17:54:29'),
(234, 'Garen', 'Yone', 'Yone mobility et burst', 'Trades longs', 'Éviter poke early', 'All-in mid-game', 'Late-game split-push', 'Dodges et spacing', 'Conquérant', 'Attention combos et ult Yone', '2026-01-11 17:54:29'),
(235, 'Garen', 'Yorick', 'Yorick push et sustain', 'Trades longs', 'Éviter poke early', 'All-in mid-game', 'Late-game push', 'Spacing et poke', 'Conquérant', 'Attention au push Yorick', '2026-01-11 17:54:29'),
(236, 'Gnar', 'Irelia', 'Irelia mobile et burst', 'Trades longs pour reset passive', 'Respecter dash', 'All-in mid-game', 'Teamfight late-game', 'Positioning et dodges', 'Conquérant', 'Matchup skill-based, attention à l’ulti Irelia', '2026-01-11 17:54:29'),
(237, 'Gnar', 'Jax', 'Jax scaling puissant', 'Trades longs early', 'Éviter stun de Jax', 'All-in mid-game', 'Late-game attention split push', 'Spacing et poke', 'Conquérant', 'Matchup technique, patience et timing nécessaire', '2026-01-11 17:54:29'),
(238, 'Gnar', 'Jayce', 'Jayce poke ranged', 'Éviter poke early', 'Trades courts', 'All-in mid-game', 'Teamfight mid-late', 'Dodges et timing', 'Conquérant', 'Attention poke et burst', '2026-01-11 17:54:29'),
(239, 'Gnar', 'Kennen', 'Kennen poke et stun AOE', 'Éviter AOE', 'Trades courts early', 'All-in mid-game', 'Late-game positionning', 'Spacing et engage', 'Conquérant', 'Attention stun et burst', '2026-01-11 17:54:29'),
(240, 'Gnar', 'Malphite', 'Malphite tanky', 'Trades longs', 'Éviter poke et slow', 'All-in mid-game', 'Teamfight front-line', 'Spacing et kiting', 'Conquérant', 'Matchup difficile, patience nécessaire', '2026-01-11 17:54:29'),
(241, 'Gnar', 'Nasus', 'Nasus scaling late', 'Punir early', 'Jouer agressif early', 'Mid-game push', 'Late-game éviter duel Nasus', 'Spacing et poke', 'Conquérant', 'Focus early game, éviter trades longs late', '2026-01-11 17:54:29'),
(242, 'Gnar', 'Ornn', 'Ornn tanky et engage', 'Trades courts', 'Éviter poke early', 'All-in mid-game', 'Late-game engage', 'Spacing et dodges', 'Conquérant', 'Attention knock-up Ornn', '2026-01-11 17:54:29'),
(243, 'Gnar', 'Renekton', 'Renekton burst early', 'Trades courts', 'Éviter stun', 'All-in mid-game', 'Late-game teamfight', 'Spacing et trades', 'Conquérant', 'Attention stun et burst Renekton', '2026-01-11 17:54:29'),
(244, 'Gnar', 'Riven', 'Riven burst et mobility', 'Trades longs', 'Éviter combos', 'All-in mid-game', 'Late-game split-push', 'Spacing et dodges', 'Conquérant', 'Matchup skill-based, attention combos Riven', '2026-01-11 17:54:29'),
(245, 'Gnar', 'Sett', 'Sett sustain et burst', 'Trades longs', 'Respecter passive', 'All-in mid-game', 'Late-game teamfight', 'Positioning et dodges', 'Conquérant', 'Attention au burst Sett', '2026-01-11 17:54:29'),
(246, 'Gnar', 'Shen', 'Shen global ult', 'Trades longs', 'Éviter poke', 'All-in mid-game', 'Late-game teamfight', 'Spacing et engage', 'Conquérant', 'Attention taunt Shen', '2026-01-11 17:54:29'),
(247, 'Gnar', 'Teemo', 'Teemo poke', 'Éviter poke early', 'Jouer agressif', 'All-in mid-game', 'Late-game teamfight', 'Dodges et spacing', 'Conquérant', 'Matchup difficile poke et blind', '2026-01-11 17:54:29'),
(248, 'Gnar', 'Yone', 'Yone mobility et burst', 'Trades longs', 'Éviter poke early', 'All-in mid-game', 'Late-game split-push', 'Dodges et spacing', 'Conquérant', 'Attention combos et ult Yone', '2026-01-11 17:54:29'),
(249, 'Gnar', 'Yorick', 'Yorick push et sustain', 'Trades longs', 'Éviter poke early', 'All-in mid-game', 'Late-game push', 'Spacing et poke', 'Conquérant', 'Attention au push Yorick', '2026-01-11 17:54:29');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
