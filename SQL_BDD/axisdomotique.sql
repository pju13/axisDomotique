-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 21 fév. 2020 à 10:52
-- Version du serveur :  5.7.23
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `axisdomotique`
--

-- --------------------------------------------------------

--
-- Structure de la table `connected_object`
--

DROP TABLE IF EXISTS `connected_object`;
CREATE TABLE IF NOT EXISTS `connected_object` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_object` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data1` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data2` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `connected_object`
--

INSERT INTO `connected_object` (`id`, `nom`, `type_object`, `statut`, `data1`, `data2`) VALUES
(1, 'Lumières Salon', 'lumiere', 'allumer', '0', NULL),
(2, 'Lumières Cuisine', 'lumiere', 'eteindre', '34', NULL),
(3, 'Volets chambres', 'volet', 'Entrouvert', NULL, NULL),
(4, 'Volets Salon', 'volet', 'Entrouvert', NULL, NULL),
(5, 'Climatisation Chambres', 'clim', '20', 'min#18', 'max#22'),
(6, 'Climatisation Salon', 'clim', '24', 'min#23', 'max#28'),
(7, 'Chauffage Chambres', 'chauffage', '19', 'min#18', 'max#20'),
(8, 'Chauffage Salon', 'chauffage', '23', 'min#23', 'max#28');

-- --------------------------------------------------------

--
-- Structure de la table `connected_object_scenario`
--

DROP TABLE IF EXISTS `connected_object_scenario`;
CREATE TABLE IF NOT EXISTS `connected_object_scenario` (
  `connected_object_id` int(11) NOT NULL,
  `scenario_id` int(11) NOT NULL,
  PRIMARY KEY (`connected_object_id`,`scenario_id`),
  KEY `IDX_A2F25FFEEB4B1C` (`connected_object_id`),
  KEY `IDX_A2F25FFE04E49DF` (`scenario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `connected_object_scenario`
--

INSERT INTO `connected_object_scenario` (`connected_object_id`, `scenario_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 2),
(6, 2),
(7, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200218160132', '2020-02-18 16:01:52'),
('20200218161411', '2020-02-18 16:14:17');

-- --------------------------------------------------------

--
-- Structure de la table `scenario`
--

DROP TABLE IF EXISTS `scenario`;
CREATE TABLE IF NOT EXISTS `scenario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_creation` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `scenario`
--

INSERT INTO `scenario` (`id`, `nom`, `date_creation`) VALUES
(1, 'Scénario Hiver', '2020-02-18'),
(2, 'Scénario Eté', '2020-02-18'),
(3, 'Scénario Lumières', '2020-02-19');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `connected_object_scenario`
--
ALTER TABLE `connected_object_scenario`
  ADD CONSTRAINT `FK_A2F25FFE04E49DF` FOREIGN KEY (`scenario_id`) REFERENCES `scenario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A2F25FFEEB4B1C` FOREIGN KEY (`connected_object_id`) REFERENCES `connected_object` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
