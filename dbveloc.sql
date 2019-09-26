-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 23 sep. 2019 à 14:30
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
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `sexe_utilisateur` varchar(45) NOT NULL,
  `type_utilisateur` varchar(45) NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `prenom_utilisateur` varchar(255) NOT NULL,
  `date_naissance_utilisateur` varchar(255) NOT NULL,
  `adresse_mail_utilisateur` varchar(255) NOT NULL,
  `password_utilisateur` varchar(255) NOT NULL,
  `date-creation_utilisateur` varchar(255) NOT NULL,
  `villes_habitations` varchar(255) DEFAULT NULL,
  `code_postal_habitations` int(11) DEFAULT NULL,
  `numero_habitations` int(11) DEFAULT NULL,
  `rue_habitations` varchar(255) DEFAULT NULL,
  `extension_habitations` varchar(45) DEFAULT NULL,
  `CB_number` int(11) DEFAULT NULL,
  `CB_name` varchar(255) DEFAULT NULL,
  `CB_validate` datetime DEFAULT NULL,
  `CB_activite` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
