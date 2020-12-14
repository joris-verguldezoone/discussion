-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 14 déc. 2020 à 16:02
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `discussion`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `messages` varchar(140) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `messages`, `id_utilisateur`, `date`) VALUES
(56, 'TÌ®Ì€Ì’Í…hÌ¨Ì¨Ì©ÌœÌ†Ì…Ì†Ì…e Ì¢Ì›Ì’ÌˆÌÌŽCÌÍÌ³Ì½ÌhÍ–Ì­Ì½á»Ì§Ì†Ì€Í sÍ”Ì¥ÌŸÍšÌ¿Í¢È©ÌºÍ”ÌÌ“nÍ•ÍˆÍŒÌ¾ Ì©OÌŸÍnÍ‚ÌˆÌÌ‰Íœe', 18, '2020-12-07 08:25:03'),
(54, 'NOOOOOOOOON', 15, '2020-12-07 08:19:11'),
(55, 'Cc je suis nÃ©e dans une marre de sang mais o final jsuis grave trauma qqn connait un bon psy ?', 16, '2020-12-07 08:21:53'),
(53, 'On va faire une chaine pour les enfants et on va tout faire pour passer inaperÃ§u', 14, '2020-12-07 08:18:29'),
(57, 'Who\'s coming to the disco toninght ???', 19, '2020-12-07 08:25:45'),
(52, 'cococo !', 9, '2020-12-07 08:17:27'),
(59, 'ous ces moments se perdront dans le temps... comme... les larmes dans la pluie... Il est temps de mourir.', 13, '2020-12-07 08:26:53');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'Joris', '5'),
(9, 'cococo', '$2y$10$IEBLqg30fNvIJeLhN6We/eTCaziLIEmRizMqAmDBiQVQFiwUK.v3.'),
(12, 'hereisnissa', '$2y$10$rWfDUTYRY.eWPn7o3fo2L.Z3yvndJOZXjL/pUcD1Bh6NA8HerOeiy'),
(13, 'Roy Batty', '$2y$10$Ibt.zne90NT1u84LEmTRouAHHgWrOOKwdy6UHEx47r9/FyhzxZFXi'),
(14, 'disneyxD', '$2y$10$w1DhzvM6lYL.MQtO0Tq2x.auKjxKdNvHHeFE81st0oG3jZPu2.ZoS'),
(15, 'HARDJOJOJ', '$2y$10$FlUbQNFZd.jyw/HlRKxbyOJ819xy8FiqDCY8NnRQsWo/tj8OCU5DC'),
(16, 'Guts', '$2y$10$tdqGhJ7lle6VVdYgxYLUwuSGGfAv.Nt0m4rtFm79gkMGtwZpCI6Ei'),
(17, 'Le Rieur', '$2y$10$Om.QTlwLmyWi9qSS6gwPZehsU.TtZ.a2kWcg10FMGMcQhCwu1CyIe'),
(18, 'Le @Rieur', '$2y$10$bqbVpvEtX8qCVDMe1yKDueJEHnEZnY9FdF80Ek2jaDwsICTUMlUxO'),
(19, 'Ricardo', '$2y$10$x/tknirgaQgAbPbg8alNkOBS2TecLfYmJWz3lAJ8/oYJ4D0mI43j6'),
(20, 'jesappel', '$2y$10$M6x/.bLRIhsCiRhH6HhFbevW.9Tc/FZYznpSoe3yJ6uDwXkPF0/FO'),
(21, 'okokokokokk', '$2y$10$u2TGxFk9FGrUL5C6mvOZoOQmCJfz7N5WIbo65bWuqmmFZZM.Q/V/i'),
(22, 'yesyesyes', '$2y$10$ukZjcRxcaBzoa3LIeAhDnOsxLRd8XDqj0Y1kuVDVrLuO5nfsA7hBO'),
(23, 'azazer', '$2y$10$Zt.d66bNHe0nV1oFn51oCul9cVwlS48.bpWWCiPz3.faYBOoeqy9u'),
(24, 'yesyesyesyesyesyes', '$2y$10$j8lsFw8jGJ1PMg/VNglwbOT6yvM52i9oPN442S2I0yqh/bYe0DpR6'),
(25, 'yesyesyesyesyesyes', '$2y$10$j8lsFw8jGJ1PMg/VNglwbOT6yvM52i9oPN442S2I0yqh/bYe0DpR6'),
(26, 'yesyesyesyesyesyesyesyesyes', '$2y$10$y4Shy6BcQeVaPgsmvuzI7OAe19EYCYTbMxJMNipjCySIx8ZXRuDuK'),
(27, 'hjhjhjhjhjhj', '$2y$10$5itRtSKaw62PP9ZP5VmHM.97sL5YK32QbdZgoTdbDlcLzV0I4tOOy');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
