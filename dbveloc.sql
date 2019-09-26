-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 26 sep. 2019 à 14:23
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbveloc`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `idarticles` int(11) NOT NULL AUTO_INCREMENT,
  `nom_article` varchar(45) NOT NULL,
  `description_article` varchar(45) NOT NULL,
  `prix_article_HT` int(11) NOT NULL,
  `taux_tva` int(11) NOT NULL,
  `type_article` tinyint(1) NOT NULL COMMENT '0 = meca; 1=elec',
  PRIMARY KEY (`idarticles`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`idarticles`, `nom_article`, `description_article`, `prix_article_HT`, `taux_tva`, `type_article`) VALUES
(9, 'Vélo2', 'Vélo elec', 3, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contactez_nous`
--

DROP TABLE IF EXISTS `contactez_nous`;
CREATE TABLE IF NOT EXISTS `contactez_nous` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `nom_contact` varchar(100) NOT NULL,
  `email_contact` varchar(255) NOT NULL,
  `message_contact` varchar(255) NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `sexe_utilisateur` varchar(45) NOT NULL,
  `type_utilisateur` varchar(45) NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `prenom_utilisateur` varchar(255) NOT NULL,
  `date_naissance_utilisateur` datetime NOT NULL,
  `adresse_mail_utilisateur` varchar(255) NOT NULL,
  `password_utilisateur` varchar(255) NOT NULL,
  `date-creation_utilisateur` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `villes_habitations` varchar(255) DEFAULT NULL,
  `code_postal_habitations` varchar(255) DEFAULT NULL,
  `numero_habitations` varchar(255) DEFAULT NULL,
  `rue_habitations` varchar(255) DEFAULT NULL,
  `extension_habitations` varchar(45) DEFAULT NULL,
  `CB_number` bigint(20) DEFAULT NULL,
  `CB_name` varchar(255) DEFAULT NULL,
  `CB_validate` datetime DEFAULT NULL,
  `CB_activite` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `sexe_utilisateur`, `type_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `date_naissance_utilisateur`, `adresse_mail_utilisateur`, `password_utilisateur`, `date-creation_utilisateur`, `villes_habitations`, `code_postal_habitations`, `numero_habitations`, `rue_habitations`, `extension_habitations`, `CB_number`, `CB_name`, `CB_validate`, `CB_activite`) VALUES
(2, 'm', 'part', 'rr', 'rr', '2000-01-01 00:00:00', 'Ginette@GrosseMoula.fr', '2d711642b726b04401627ca9fbac32f5c8530fb1903cc4db02258717921a4881', '2019-09-24 16:59:53', 'LENS', '62750', '1', 'x', 'x', 1234567890123456, 'x', '2000-01-01 00:00:00', NULL),
(3, 'm', 'part', 'test', 'test', '2000-01-01 00:00:00', 'test@test.fr', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '2019-09-24 18:09:57', 'test', '00000', '1', 'test', 'test', 1, 'test', '2000-01-01 00:00:00', NULL),
(4, 'm', 'part', 'test3', 'test3', '1994-10-01 00:00:00', 'test3@x.fr', '2d711642b726b04401627ca9fbac32f5c8530fb1903cc4db02258717921a4881', '2019-09-26 14:22:10', 'Lens', '62750', '144', 'Rue léon Blum', '', 1234564, 'Richards', '1994-10-01 00:00:00', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
