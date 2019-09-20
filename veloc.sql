-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 20 sep. 2019 à 09:58
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
-- Base de données :  `veloc`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresses_utilisateurs`
--

DROP TABLE IF EXISTS `adresses_utilisateurs`;
CREATE TABLE IF NOT EXISTS `adresses_utilisateurs` (
  `id_adresses_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `villes_habitations` varchar(255) NOT NULL,
  `numero_habitations` int(11) DEFAULT NULL,
  `rue_habitations` varchar(70) NOT NULL,
  `extension_habitations` varchar(45) DEFAULT NULL,
  `villes_utilisateur_id_ville` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_adresses_utilisateur`),
  UNIQUE KEY `id_adresses_utilisateurs_UNIQUE` (`id_adresses_utilisateur`),
  KEY `fk_adresses_utilisateurs_villes_utilisateur1_idx` (`villes_utilisateur_id_ville`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Structure de la table `bornes_ville`
--

DROP TABLE IF EXISTS `bornes_ville`;
CREATE TABLE IF NOT EXISTS `bornes_ville` (
  `id_bornes_ville` int(11) NOT NULL AUTO_INCREMENT,
  `borne_adresse` varchar(45) NOT NULL,
  `adresses_utilisateurs_id_adresses_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_bornes_ville`),
  UNIQUE KEY `id_bornes_ville_UNIQUE` (`id_bornes_ville`),
  KEY `fk_bornes_ville_adresses_utilisateurs1_idx` (`adresses_utilisateurs_id_adresses_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cb`
--

DROP TABLE IF EXISTS `cb`;
CREATE TABLE IF NOT EXISTS `cb` (
  `idCB` int(11) NOT NULL,
  `CB_number` varchar(45) NOT NULL,
  `CB_name` varchar(45) NOT NULL,
  `CB_validdate` datetime NOT NULL,
  `CB_activite` tinyint(4) NOT NULL,
  PRIMARY KEY (`idCB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

DROP TABLE IF EXISTS `entreprises`;
CREATE TABLE IF NOT EXISTS `entreprises` (
  `identreprise` int(11) NOT NULL,
  `nom_entreprise` varchar(45) NOT NULL,
  `numeroRCS` varchar(45) NOT NULL,
  `adresse_entreprise` varchar(80) DEFAULT NULL,
  `ville_entreprise` varchar(45) DEFAULT NULL,
  `cp_entreprise` int(5) DEFAULT NULL,
  `types_utilisateur_iduser_type` int(11) NOT NULL,
  PRIMARY KEY (`identreprise`),
  KEY `fk_entreprises_types_utilisateur1_idx` (`types_utilisateur_iduser_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `paniers`
--

DROP TABLE IF EXISTS `paniers`;
CREATE TABLE IF NOT EXISTS `paniers` (
  `id_paniers` int(11) NOT NULL AUTO_INCREMENT,
  `prix_total` int(11) DEFAULT NULL,
  `panier_activite` tinyint(4) DEFAULT NULL,
  `panier_litige` varchar(255) DEFAULT NULL,
  `utilisateurs_id_utilisateur` int(11) NOT NULL,
  `articles_idarticles` int(11) NOT NULL,
  PRIMARY KEY (`id_paniers`),
  UNIQUE KEY `id_paniers_UNIQUE` (`id_paniers`),
  KEY `fk_paniers_utilisateurs1_idx` (`utilisateurs_id_utilisateur`),
  KEY `fk_paniers_articles1_idx` (`articles_idarticles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sexe`
--

DROP TABLE IF EXISTS `sexe`;
CREATE TABLE IF NOT EXISTS `sexe` (
  `id_sexe` int(11) NOT NULL AUTO_INCREMENT,
  UNIQUE KEY `id_sexe` (`id_sexe`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id_stock` int(11) NOT NULL AUTO_INCREMENT,
  `date_maj` datetime NOT NULL,
  `nb_velo_elec` int(11) NOT NULL,
  `nb_velo_meca` int(11) NOT NULL,
  `nb_meca_loues` int(11) NOT NULL,
  `nb_elec_loues` int(11) NOT NULL,
  `nb_meca_HS` int(11) NOT NULL,
  `nb_elec_HS` int(11) NOT NULL,
  PRIMARY KEY (`id_stock`),
  UNIQUE KEY `idvelos_UNIQUE` (`id_stock`),
  KEY `fk_stock_articles1_idx` (`nb_meca_loues`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tarifs`
--

DROP TABLE IF EXISTS `tarifs`;
CREATE TABLE IF NOT EXISTS `tarifs` (
  `idtarif` int(11) NOT NULL,
  `tarifscol` varchar(45) DEFAULT NULL,
  `articles_idarticles` int(11) NOT NULL,
  `time_idtime` int(11) NOT NULL,
  PRIMARY KEY (`idtarif`),
  KEY `fk_tarifs_articles1_idx` (`articles_idarticles`),
  KEY `fk_tarifs_time1_idx` (`time_idtime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `time`
--

DROP TABLE IF EXISTS `time`;
CREATE TABLE IF NOT EXISTS `time` (
  `idtime` int(11) NOT NULL,
  `HJSM` varchar(45) NOT NULL,
  `timecol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `types_utilisateur`
--

DROP TABLE IF EXISTS `types_utilisateur`;
CREATE TABLE IF NOT EXISTS `types_utilisateur` (
  `iduser_type` int(11) NOT NULL AUTO_INCREMENT,
  `membre_entreprise` tinyint(4) NOT NULL,
  PRIMARY KEY (`iduser_type`),
  UNIQUE KEY `iduser_type_UNIQUE` (`iduser_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `sexe_utilisateur` varchar(1) NOT NULL COMMENT 'm=Male f=Femelle',
  `type_utilisateur` varchar(55) NOT NULL COMMENT 'part / pro',
  `nom_utilisateur` varchar(45) NOT NULL,
  `prenom_utilisateur` varchar(45) NOT NULL,
  `date_naissance_utilisateur` date NOT NULL,
  `adresse_mail_utilisateur` varchar(255) NOT NULL,
  `password_utilisateur` varchar(255) NOT NULL,
  `date_creation_utilisateurs` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `adresses_utilisateurs_id_adresses_utilisateur` int(11) DEFAULT NULL,
  `sexe_id_sexe` int(11) DEFAULT NULL COMMENT 'A SUPPRIMER',
  `types_utilisateur_iduser_type` int(11) DEFAULT NULL COMMENT 'A SUPPRIMER',
  `CB_idCB` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `idusers_UNIQUE` (`id_utilisateur`),
  KEY `fk_utilisateurs_adresses_utilisateurs_idx` (`adresses_utilisateurs_id_adresses_utilisateur`),
  KEY `fk_utilisateurs_sexe1_idx` (`sexe_id_sexe`),
  KEY `fk_utilisateurs_types_utilisateur1_idx` (`types_utilisateur_iduser_type`),
  KEY `fk_utilisateurs_CB1_idx` (`CB_idCB`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `sexe_utilisateur`, `type_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `date_naissance_utilisateur`, `adresse_mail_utilisateur`, `password_utilisateur`, `date_creation_utilisateurs`, `adresses_utilisateurs_id_adresses_utilisateur`, `sexe_id_sexe`, `types_utilisateur_iduser_type`, `CB_idCB`) VALUES
(1, 'm', '', 'x', 'x', '1994-10-01', 'x@x.fr', '2d711642b726b04401627ca9fbac32f5c8530fb1903cc4db02258717921a4881', '2019-09-19 16:00:41', NULL, NULL, NULL, NULL),
(2, 'f', '', 'Ginette', 'Ginette', '1943-10-01', 'Ginette@GrosseMoula.fr', 'cd2eb0837c9b4c962c22d2ff8b5441b7b45805887f051d39bf133b583baf6860', '2019-09-19 17:27:13', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `villes_utilisateur`
--

DROP TABLE IF EXISTS `villes_utilisateur`;
CREATE TABLE IF NOT EXISTS `villes_utilisateur` (
  `id_ville` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ville` varchar(45) NOT NULL,
  `ville_activite` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_ville`),
  UNIQUE KEY `idville_UNIQUE` (`id_ville`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `villes_utilisateur`
--

INSERT INTO `villes_utilisateur` (`id_ville`, `nom_ville`, `ville_activite`) VALUES
(1, 'Paris', 1),
(2, 'Lille', 1),
(3, 'Lyon', 1),
(4, 'Bordeaux', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adresses_utilisateurs`
--
ALTER TABLE `adresses_utilisateurs`
  ADD CONSTRAINT `fk_adresses_utilisateurs_villes_utilisateur1` FOREIGN KEY (`villes_utilisateur_id_ville`) REFERENCES `villes_utilisateur` (`id_ville`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `bornes_ville`
--
ALTER TABLE `bornes_ville`
  ADD CONSTRAINT `fk_bornes_ville_adresses_utilisateurs1` FOREIGN KEY (`adresses_utilisateurs_id_adresses_utilisateur`) REFERENCES `adresses_utilisateurs` (`id_adresses_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD CONSTRAINT `fk_entreprises_types_utilisateur1` FOREIGN KEY (`types_utilisateur_iduser_type`) REFERENCES `types_utilisateur` (`iduser_type`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `paniers`
--
ALTER TABLE `paniers`
  ADD CONSTRAINT `fk_paniers_articles1` FOREIGN KEY (`articles_idarticles`) REFERENCES `articles` (`idarticles`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_paniers_utilisateurs1` FOREIGN KEY (`utilisateurs_id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_stock_articles1` FOREIGN KEY (`nb_meca_loues`) REFERENCES `articles` (`idarticles`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tarifs`
--
ALTER TABLE `tarifs`
  ADD CONSTRAINT `fk_tarifs_articles1` FOREIGN KEY (`articles_idarticles`) REFERENCES `articles` (`idarticles`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tarifs_time1` FOREIGN KEY (`time_idtime`) REFERENCES `time` (`idtime`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `fk_utilisateurs_CB1` FOREIGN KEY (`CB_idCB`) REFERENCES `cb` (`idCB`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateurs_adresses_utilisateurs` FOREIGN KEY (`adresses_utilisateurs_id_adresses_utilisateur`) REFERENCES `adresses_utilisateurs` (`id_adresses_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateurs_sexe1` FOREIGN KEY (`sexe_id_sexe`) REFERENCES `sexe` (`id_sexe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateurs_types_utilisateur1` FOREIGN KEY (`types_utilisateur_iduser_type`) REFERENCES `types_utilisateur` (`iduser_type`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
