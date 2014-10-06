-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 06 Octobre 2014 à 12:06
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activitie` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `activities`
--

INSERT INTO `activities` (`id`, `activitie`) VALUES
(1, 'Athl&eacute;tisme'),
(2, 'Badminton'),
(3, 'Basket'),
(4, 'Danse'),
(5, 'Fitness'),
(6, 'Football'),
(7, 'Golf'),
(8, 'Handball'),
(9, 'Natation'),
(10, 'Poker'),
(11, 'Randonn&eacute;e'),
(12, 'Roller'),
(13, 'Rugby'),
(14, 'Running'),
(15, 'Ski'),
(16, 'Squash'),
(17, 'Stretching'),
(18, 'Tennis'),
(19, 'Tennis de table'),
(20, 'V&eacute;lo'),
(21, 'VTT'),
(22, 'Yoga');

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE IF NOT EXISTS `departements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dep` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=96 ;

--
-- Contenu de la table `departements`
--

INSERT INTO `departements` (`id`, `dep`) VALUES
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `codePostal` int(5) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `sport` varchar(50) DEFAULT NULL,
  `niveau` varchar(50) DEFAULT NULL,
  `description` text,
  `jour` date DEFAULT NULL,
  `plage` varchar(255) DEFAULT NULL,
  `afficheEmail` tinyint(1) DEFAULT NULL,
  `AfficheTel` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `birth`, `mdp`, `sexe`, `email`, `avatar`, `ville`, `codePostal`, `tel`, `sport`, `niveau`, `description`, `jour`, `plage`, `afficheEmail`, `AfficheTel`) VALUES
(1, 'Boudy', 'Guillaume', '1992-05-23', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'Homme', 'guillaume.boudy@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'user', 'user', '2012-11-12', '12dea96fec20593566ab75692c9949596833adc9', 'Homme', 'guillaume.wesley@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
