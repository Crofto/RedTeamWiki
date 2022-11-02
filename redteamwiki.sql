-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 02 nov. 2022 à 11:21
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

--
-- Create a database using `MYSQL_DATABASE` placeholder
--
CREATE DATABASE IF NOT EXISTS `Redteamwiki`;
USE `Redteamwiki`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `redteamwiki`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(25) NOT NULL,
  `Alias` varchar(25) NOT NULL,
  `DescriptionCourte` text NOT NULL,
  `DescriptionLongue` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `Nom`, `Alias`, `DescriptionCourte`, `DescriptionLongue`) VALUES
(1, 'nmap', '', 'scan un réseau', 'je sais pas'),
(2, 'test', 'khbi', 'test d\'insert', 'test d\'insert'),
(8, 'rfs', 'rsv', 'rsz', 'rsz'),
(7, '<sr', '<sfv', 'sf<', 'sf<'),
(6, 'rg', 'er', 'vsfd', 'vsfd'),
(9, 'resd', 'fr', 'rffr', 'rffr'),
(10, 'dwgte', 'wdgt', 'wdgt', 'wdgt'),
(11, 'sr<', 'rw<', 'dgtwx', 'dgtwx'),
(12, 'erdg', 'grdeww', 'w', 'w'),
(13, 'srfvs', 'khbi', 'test d\'insert', 'test d\'insert'),
(14, 'resdd', 'khbi', 'r', 'r'),
(15, 'gde', 'vfd', 'bvdfx', 'bvdfx'),
(16, 'vsf', 'vf', 'test d\'insert', 'test d\'insert'),
(17, 'aaa', 'aaa', 'aaa', 'aaa');

-- --------------------------------------------------------

--
-- Structure de la table `outil`
--

DROP TABLE IF EXISTS `outil`;
CREATE TABLE IF NOT EXISTS `outil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `descriptionCourte` text NOT NULL,
  `descriptionLongue` text,
  `lienGetStarted` text NOT NULL,
  `lienOfficiel` text NOT NULL,
  `lienDoc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `outil`
--

INSERT INTO `outil` (`id`, `nom`, `descriptionCourte`, `descriptionLongue`, `lienGetStarted`, `lienOfficiel`, `lienDoc`) VALUES
(1, 'Kali', 'Système d\'exploitation linux ayant plusieurs outils de PenTest préinstallés', NULL, 'https://null-byte.wonderhowto.com/how-to/get-started-with-kali-linux-2020-0231506/', 'https://www.kali.org/', 'https://www.kali.org/docs/'),
(2, 'HashCat', 'case les mdp', 'fefe', 'fesef', 'sdvsdv', 'sdvsdv');

-- --------------------------------------------------------

--
-- Structure de la table `outilcommande`
--

DROP TABLE IF EXISTS `outilcommande`;
CREATE TABLE IF NOT EXISTS `outilcommande` (
  `idOutil` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  PRIMARY KEY (`idOutil`,`idCommande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `outilcommande`
--

INSERT INTO `outilcommande` (`idOutil`, `idCommande`) VALUES
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16);

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`id`, `nom`) VALUES
(1, 'reseau'),
(2, 'pentest'),
(3, ', '),
(4, ', '),
(5, ', '),
(6, ', '),
(7, ', '),
(8, ', '),
(9, 'test'),
(10, 'test'),
(11, 'fdp');

-- --------------------------------------------------------

--
-- Structure de la table `tagcommande`
--

DROP TABLE IF EXISTS `tagcommande`;
CREATE TABLE IF NOT EXISTS `tagcommande` (
  `idCommande` int(11) NOT NULL,
  `idTag` int(11) NOT NULL,
  PRIMARY KEY (`idCommande`,`idTag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tagcommande`
--

INSERT INTO `tagcommande` (`idCommande`, `idTag`) VALUES
(1, 1),
(9, 1),
(10, 1),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(16, 9),
(16, 11),
(17, 10);

-- --------------------------------------------------------

--
-- Structure de la table `vocabulaire`
--

DROP TABLE IF EXISTS `vocabulaire`;
CREATE TABLE IF NOT EXISTS `vocabulaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `alias` varchar(25) NOT NULL,
  `definition` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vocabulaire`
--

INSERT INTO `vocabulaire` (`id`, `nom`, `alias`, `definition`) VALUES
(1, 'Pentest', 'Test d\'intrusion', 'Un test d\'intrusion est une méthode d\'évaluation de la sécurité d\'un système d\'information ou d\'un réseau informatique ; il est réalisé par un testeur.'),
(2, 'Phishing', 'Hameconnage', 'C\'est un concept qui compte l\'action de cliquer sur un lien factice pour voler les données des victimes'),
(3, 'test vocab', 'tt', 'tmtc');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
