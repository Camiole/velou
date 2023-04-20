-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 18 avr. 2023 à 20:08
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `velou`
--

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `ID_location` int(11) AUTO_INCREMENT,
  `Debut` datetime(6) NOT NULL,
  `Fin` datetime(6) NOT NULL,
  `ID_velo` int(11) NOT NULL,
  PRIMARY KEY (`ID_location`),
  KEY `ID_velo` (`ID_velo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_utilisateur` int(11) AUTO_INCREMENT,
  `Username` varchar(15) UNIQUE,
  `Password` varchar(20) NOT NULL,
  `Admin` int(11) NOT NULL,
  PRIMARY KEY (`ID_utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Username`, `Password`, `Admin`) VALUES
('admin', 'admin', 1),
('louis', 'siuol', 0),
('camille', 'ellimac', 0),
('clement', 'tnemelc', 0),
('silvia', 'aivlis', 0);

-- --------------------------------------------------------

--
-- Structure de la table `velo`
--

DROP TABLE IF EXISTS `velo`;
CREATE TABLE IF NOT EXISTS `velo` (
  `ID_velo` int(11) AUTO_INCREMENT,
  `Modele` varchar(20) NOT NULL,
  `Tarif` int(11) NOT NULL,
  `Image` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_velo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `velo`
--

INSERT INTO `velo` (`Modele`, `Tarif`, `Image`) VALUES
('vtt', 10, '/images/velo1.jpg'),
('ville', 15, '/images/velo2.jpg'),
('cargo', 20, '/images/velo3.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
