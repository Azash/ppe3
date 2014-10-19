-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 19 Octobre 2014 à 19:13
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `sos_partenaire`
--
CREATE DATABASE IF NOT EXISTS `sos_partenaire` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sos_partenaire`;

-- --------------------------------------------------------

--
-- Structure de la table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `actId` int(11) NOT NULL AUTO_INCREMENT,
  `activitie` varchar(50) NOT NULL,
  PRIMARY KEY (`actId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `activities`
--

INSERT INTO `activities` (`actId`, `activitie`) VALUES
(1, 'Athletisme'),
(2, 'Badminton'),
(3, 'Basket'),
(4, 'Danse'),
(5, 'Fitness'),
(6, 'Football'),
(7, 'Golf'),
(8, 'Handball'),
(9, 'Natation'),
(10, 'Poker'),
(11, 'Randonnee'),
(12, 'Roller'),
(13, 'Rugby'),
(14, 'Running'),
(15, 'Ski'),
(16, 'Squash'),
(17, 'Stretching'),
(18, 'Tennis'),
(19, 'Tennis de table'),
(20, 'Velo'),
(21, 'VTT'),
(22, 'Yoga');

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE IF NOT EXISTS `departements` (
  `depId` int(11) NOT NULL AUTO_INCREMENT,
  `dep` varchar(5) NOT NULL,
  PRIMARY KEY (`depId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=96 ;

--
-- Contenu de la table `departements`
--

INSERT INTO `departements` (`depId`, `dep`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10'),
(11, '11'),
(12, '12'),
(13, '13'),
(14, '14'),
(15, '15'),
(16, '16'),
(17, '17'),
(18, '18'),
(19, '19'),
(20, '20'),
(21, '21'),
(22, '22'),
(23, '23'),
(24, '24'),
(25, '25'),
(26, '26'),
(27, '27'),
(28, '28'),
(29, '29'),
(30, '30'),
(31, '31'),
(32, '32'),
(33, '33'),
(34, '34'),
(35, '35'),
(36, '36'),
(37, '37'),
(38, '38'),
(39, '39'),
(40, '40'),
(41, '41'),
(42, '42'),
(43, '43'),
(44, '44'),
(45, '45'),
(46, '46'),
(47, '47'),
(48, '48'),
(49, '49'),
(50, '50'),
(51, '51'),
(52, '52'),
(53, '53'),
(54, '54'),
(55, '55'),
(56, '56'),
(57, '57'),
(58, '58'),
(59, '59'),
(60, '60'),
(61, '61'),
(62, '62'),
(63, '63'),
(64, '64'),
(65, '65'),
(66, '66'),
(67, '67'),
(68, '68'),
(69, '69'),
(70, '70'),
(71, '71'),
(72, '72'),
(73, '73'),
(74, '74'),
(75, '75'),
(76, '76'),
(77, '77'),
(78, '78'),
(79, '79'),
(80, '80'),
(81, '81'),
(82, '82'),
(83, '83'),
(84, '84'),
(85, '85'),
(86, '86'),
(87, '87'),
(88, '88'),
(89, '89'),
(90, '90'),
(91, '91'),
(92, '92'),
(93, '93'),
(94, '94'),
(95, '95');

-- --------------------------------------------------------

--
-- Structure de la table `dispo`
--

CREATE TABLE IF NOT EXISTS `dispo` (
  `idUser` int(11) NOT NULL,
  `L1` tinyint(1) NOT NULL,
  `L2` tinyint(1) NOT NULL,
  `L3` tinyint(1) NOT NULL,
  `Ma1` tinyint(1) NOT NULL,
  `Ma2` tinyint(1) NOT NULL,
  `Ma3` tinyint(1) NOT NULL,
  `Me1` tinyint(1) NOT NULL,
  `Me2` tinyint(1) NOT NULL,
  `Me3` tinyint(1) NOT NULL,
  `J1` tinyint(1) NOT NULL,
  `J2` tinyint(1) NOT NULL,
  `J3` tinyint(1) NOT NULL,
  `V1` tinyint(1) NOT NULL,
  `V2` tinyint(1) NOT NULL,
  `V3` tinyint(1) NOT NULL,
  `S1` tinyint(1) NOT NULL,
  `S2` tinyint(1) NOT NULL,
  `S3` tinyint(1) NOT NULL,
  `D1` tinyint(1) NOT NULL,
  `D2` tinyint(1) NOT NULL,
  `D3` tinyint(1) NOT NULL,
  UNIQUE KEY `email` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `dispo`
--

INSERT INTO `dispo` (`idUser`, `L1`, `L2`, `L3`, `Ma1`, `Ma2`, `Ma3`, `Me1`, `Me2`, `Me3`, `J1`, `J2`, `J3`, `V1`, `V2`, `V3`, `S1`, `S2`, `S3`, `D1`, `D2`, `D3`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `listactivities`
--

CREATE TABLE IF NOT EXISTS `listactivities` (
  `listId` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idActivities` int(11) NOT NULL,
  `lvl` varchar(50) NOT NULL,
  PRIMARY KEY (`listId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `listactivities`
--

INSERT INTO `listactivities` (`listId`, `idUser`, `idActivities`, `lvl`) VALUES
(1, 5, 13, 'D&nbsp;butant'),
(2, 5, 8, 'D&nbsp;butant'),
(3, 5, 1, 'D&nbsp;butant'),
(4, 6, 8, 'D&nbsp;butant'),
(5, 6, 14, 'D&nbsp;butant'),
(6, 6, 3, 'D&nbsp;butant'),
(7, 7, 3, 'D&nbsp;butant'),
(8, 7, 8, 'D&nbsp;butant'),
(9, 7, 11, 'D&nbsp;butant'),
(10, 7, 1, 'D&nbsp;butant'),
(11, 5, 12, 'Deb'),
(12, 6, 12, 'deb'),
(13, 7, 12, 'deb'),
(15, 5, 6, 'deb');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `mdp` char(150) NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `numDep` int(5) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `description` text,
  `afficheEmail` tinyint(1) DEFAULT NULL,
  `AfficheTel` tinyint(1) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `valide` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `birth`, `mdp`, `sexe`, `email`, `avatar`, `ville`, `numDep`, `tel`, `description`, `afficheEmail`, `AfficheTel`, `pass`, `valide`) VALUES
(1, 'Boudy', 'Guillaume', '1992-05-23', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'Homme', 'guillaume.boudy@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'valide'),
(2, 'user', 'user', '2012-11-12', '12dea96fec20593566ab75692c9949596833adc9', 'Homme', 'guillaume.wesley@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'valide'),
(4, 'User', 'User', '1914-01-01', '12dea96fec20593566ab75692c9949596833adc9', 'Homme', 'user@user.user', NULL, 'Paris', 75, '0101010101', 'Je suis un utilisateur lambda.\r\nMon nom est User', 1, 1, 'UAEIGHQN', 'valide'),
(5, 'Boudy', 'Guillaume', '1992-10-09', 'test1', 'Homme', 'test1', NULL, NULL, 75, NULL, NULL, NULL, NULL, NULL, 'valide'),
(6, 'Lemasson', 'Florent', '1990-10-01', 'test2', 'Femme', 'test2', NULL, NULL, 94, NULL, NULL, NULL, NULL, NULL, 'valide'),
(7, 'Messaoudi', 'Hichem', '1994-10-01', 'test3', '', 'test3', NULL, NULL, 94, NULL, NULL, NULL, NULL, NULL, 'valide');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
