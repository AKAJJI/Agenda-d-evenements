-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 15 oct. 2019 à 12:48
-- Version du serveur :  5.7.20-log
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `agenda`
--

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `Event_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Intitule` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Horaire` varchar(10) NOT NULL,
  `Localisation` varchar(50) NOT NULL,
  `Duree` varchar(10) NOT NULL,
  `Participants` varchar(200) NOT NULL,
  `Createur` varchar(50) NOT NULL,
  PRIMARY KEY (`Event_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`Event_Id`, `Intitule`, `Date`, `Horaire`, `Localisation`, `Duree`, `Participants`, `Createur`) VALUES
(1, 'foot', '2018-11-22', '10:22', 'terrain de foot', '02:00', 'toute l\'equipe', 'BruceWayne'),
(2, 'basket ', '2018-11-23', '20:00', 'terrain de basket', '02:00', 'toute l\'equipe', 'HarveyDent'),
(3, 'handball', '2018-11-24', '20:00', 'terrain de Handball', '01:00', 'toute l\'equipe', 'OswaldCobbelpot'),
(4, 'velo', '2018-11-22', '17:00', 'circuit A', '01:00', 'toute la ville', 'BruceWayne'),
(5, 'foot', '2018-11-25', '12:00', 'terrain de foot', '01:00', 'toute l\'equipe', 'OswaldCobbelpot'),
(6, 'foot', '2018-12-27', '02:00', 'terrain de foot', '02:00', 'toute l\'equipe', 'BruceWayne');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(25) NOT NULL,
  `Prenom` varchar(25) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`Id`, `Nom`, `Prenom`, `Email`, `Password`) VALUES
(6, 'Wayne', 'Bruce', 'TheDarkKnight@gotham.com', 'Azerty'),
(13, 'Cobbelpot', 'Oswald', 'Penguin@gotham.com', 'Azerty'),
(14, 'Dent', 'Harvey', 'Doubleface@gotham.com', 'Azerty'),
(16, 'Kyle', 'Selina', 'Catwoman@gotham.com', 'Azerty'),
(17, 'Valentin', 'Lazlo', 'ThePig@gotham.com', 'Azerty');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
