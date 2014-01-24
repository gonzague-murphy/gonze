-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 19, 2014 at 12:24 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lokisalle`
--
CREATE DATABASE IF NOT EXISTS `lokisalle` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lokisalle`;

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE IF NOT EXISTS `avis` (
  `id_avis` int(5) NOT NULL AUTO_INCREMENT,
  `commentaire` text NOT NULL,
  `note` int(2) NOT NULL,
  `date` datetime NOT NULL,
  `id_salle` int(5) NOT NULL,
  `id_membre` int(5) NOT NULL,
  PRIMARY KEY (`id_avis`),
  KEY `fk_avis_salle1_idx` (`id_salle`),
  KEY `fk_avis_membre1_idx` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(6) NOT NULL AUTO_INCREMENT,
  `montant` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `id_membre` int(5) NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `fk_commande_membre1_idx` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `details_commande`
--

CREATE TABLE IF NOT EXISTS `details_commande` (
  `id_details_commande` int(6) NOT NULL AUTO_INCREMENT,
  `id_commande` int(6) NOT NULL,
  `id_produit` int(5) NOT NULL,
  PRIMARY KEY (`id_details_commande`),
  KEY `fk_details_commande_commande1_idx` (`id_commande`),
  KEY `fk_details_commande_produit1_idx` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int(5) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(15) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sexe` varchar(45) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `cp` int(5) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `statut` int(1) NOT NULL,
  PRIMARY KEY (`id_membre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `sexe`, `ville`, `cp`, `adresse`, `statut`) VALUES
(1, 'LaGlibette', 'starcraft', 'Wurst', 'Mina', 'admin@oncesbo.com', 'f', 'Paris', 75008, '7, Easy Street', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id_newsletter` int(5) NOT NULL AUTO_INCREMENT,
  `id_membre` int(5) NOT NULL,
  PRIMARY KEY (`id_newsletter`),
  KEY `fk_newsletter_membre1_idx` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(5) NOT NULL AUTO_INCREMENT,
  `date_arrivee` datetime NOT NULL,
  `date_depart` datetime NOT NULL,
  `prix` int(5) NOT NULL,
  `etat` int(1) NOT NULL,
  `id_salle` int(5) NOT NULL,
  `id_promo` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `fk_produit_salle_idx` (`id_salle`),
  KEY `fk_produit_promotion1_idx` (`id_promo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `id_promo` int(2) NOT NULL AUTO_INCREMENT,
  `code_promo` varchar(6) NOT NULL,
  `reduction` int(5) NOT NULL,
  PRIMARY KEY (`id_promo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE IF NOT EXISTS `salle` (
  `id_salle` int(5) NOT NULL AUTO_INCREMENT,
  `pays` varchar(20) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `adresse` text NOT NULL,
  `cp` varchar(5) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `capacite` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_salle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`id_salle`, `pays`, `ville`, `adresse`, `cp`, `titre`, `description`, `photo`, `capacite`) VALUES
(1, 'France', 'Paris', '11 rue Alibert', '75011', 'Salle Balkins', 'Lorem the bizzle my shizz sit mammasay mammasa mamma oo sa, away adipiscing dope. Nullam sapizzle velizzle, for sure volutpizzle, check it out ma nizzle, we gonna chung i''m in the shizzle, ma nizzle. Pellentesque tellivizzle tortizzle. Sed eros. Fizzle fo shizzle dope dapibizzle you son of a bizzle fo shizzle fizzle. I''m in the shizzle stuff nibh izzle turpizzle. Stuff izzle boofron. Pellentesque bizzle rhoncizzle shut the shizzle up. In hac dang platea dictumst. Nizzle dapibizzle. Bow wow wow fo shizzle urna, pretizzle dizzle, check out this izzle, that''s the shizzle vitae, nunc. Mofo suscipizzle. Uhuh ... yih! fo shizzle my nizzle velizzle get down get down mah nizzle.', NULL, 50),
(2, 'France', 'Paris', '8, boulevard des Filles du Calvaire', '75003', 'Salle Dewitt Yancey', 'Lorem the bizzle my shizz sit mammasay mammasa mamma oo sa, away adipiscing dope. Nullam sapizzle velizzle, for sure volutpizzle, check it out ma nizzle, we gonna chung i''m in the shizzle, ma nizzle. Pellentesque tellivizzle tortizzle. Sed eros. Fizzle fo shizzle dope dapibizzle you son of a bizzle fo shizzle fizzle. I''m in the shizzle stuff nibh izzle turpizzle. Stuff izzle boofron. Pellentesque bizzle rhoncizzle shut the shizzle up. In hac dang platea dictumst. Nizzle dapibizzle. Bow wow wow fo shizzle urna, pretizzle dizzle, check out this izzle, that''s the shizzle vitae, nunc. Mofo suscipizzle. Uhuh ... yih! fo shizzle my nizzle velizzle get down get down mah nizzle.', NULL, 75);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `fk_avis_membre1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_avis_salle1` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_commande_membre1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `details_commande`
--
ALTER TABLE `details_commande`
  ADD CONSTRAINT `fk_details_commande_commande1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_details_commande_produit1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD CONSTRAINT `fk_newsletter_membre1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_produit_promotion1` FOREIGN KEY (`id_promo`) REFERENCES `promotion` (`id_promo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produit_salle` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
