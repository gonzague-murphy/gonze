-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 30 Janvier 2014 à 17:09
-- Version du serveur: 5.5.33
-- Version de PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `lokisalleti`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id_avis` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `commentaire` text NOT NULL,
  `note` int(2) NOT NULL,
  `date` datetime NOT NULL,
  `id_membre` int(5) unsigned NOT NULL,
  `id_salle` int(5) unsigned NOT NULL,
  PRIMARY KEY (`id_avis`),
  KEY `fk_avis_membres1_idx` (`id_membre`),
  KEY `fk_avis_salles1_idx` (`id_salle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id_commande` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `montant` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `id_membre` int(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `fk_commandes_membres1_idx` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `detais_commandes`
--

CREATE TABLE `detais_commandes` (
  `id_detail_commande` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_commande` int(6) unsigned NOT NULL,
  `id_produit` int(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_detail_commande`),
  KEY `fk_detais_commandes_commandes1_idx` (`id_commande`),
  KEY `fk_detais_commandes_produits1_idx` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id_membre` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(5) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sexe` enum('M','F') NOT NULL,
  `ville` varchar(20) NOT NULL,
  `cp` int(5) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `statut` int(1) NOT NULL,
  PRIMARY KEY (`id_membre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `sexe`, `ville`, `cp`, `adresse`, `statut`) VALUES
(2, 'ogrul', 'ogrula123', 'Lobula', 'Ogrula', 'ogrula@tutuvoila.fr', 'F', 'Paris', 75012, '2, rue Parla', 0),
(3, 'attil', 'attila123', 'Le Hun', 'Attila', 'adelante@enavant.fr', 'M', 'Marseille', 13012, '3, rue Ici', 1),
(4, 'frank', 'frankiki', 'Heaulme', 'Francis', 'lamort@enroute.fr', 'M', 'Lyon', 69006, '4, Impasse de l''espoir', 0),
(5, 'dort', 'dortbien', 'Hari', 'Mata', 'mata@hari.cz', 'F', 'Paris', 75016, '5, rue Vivante', 1),
(16, 'fjdgy', 'dtjtdyj', 'dtyjftyj', 'tjyftyj', 'tdyjdtyj', 'F', 'dtjydtyj', 4534, 'fndfj', 1);

-- --------------------------------------------------------

--
-- Structure de la table `newsletters`
--

CREATE TABLE `newsletters` (
  `id_newsletter` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_membre` int(5) unsigned NOT NULL,
  PRIMARY KEY (`id_newsletter`),
  KEY `fk_newsletters_membres1_idx` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `date_arrivee` datetime NOT NULL,
  `date_depart` datetime NOT NULL,
  `prix` int(5) NOT NULL,
  `etat` int(1) NOT NULL,
  `id_salle` int(5) unsigned NOT NULL,
  `id_promotion` int(2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `fk_produits_salles_idx` (`id_salle`),
  KEY `fk_produits_promotions1_idx` (`id_promotion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `date_arrivee`, `date_depart`, `prix`, `etat`, `id_salle`, `id_promotion`) VALUES
(1, '2014-05-24 09:00:00', '2014-05-24 18:00:00', 750, 1, 3, 2),
(2, '2014-04-02 09:00:00', '2014-04-02 18:00:00', 250, 1, 1, 3),
(3, '2014-05-08 09:00:00', '2014-05-08 18:00:00', 78, 1, 2, 4),
(4, '2014-03-22 09:00:00', '2014-03-22 18:00:00', 15, 0, 4, 3),
(5, '2014-07-17 09:00:00', '2014-07-17 18:00:00', 150, 1, 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

CREATE TABLE `promotions` (
  `id_promotion` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `code_promo` varchar(6) NOT NULL,
  `reduction` int(5) NOT NULL,
  PRIMARY KEY (`id_promotion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `promotions`
--

INSERT INTO `promotions` (`id_promotion`, `code_promo`, `reduction`) VALUES
(2, 'O', 0),
(3, 'XXX', 30),
(4, 'L', 50);

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

CREATE TABLE `salles` (
  `id_salle` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `pays` varchar(20) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `adresse` text NOT NULL,
  `cp` int(5) unsigned zerofill NOT NULL,
  `titre` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `capacite` int(5) NOT NULL,
  `categorie` enum('1','2','3') NOT NULL,
  PRIMARY KEY (`id_salle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;

--
-- Contenu de la table `salles`
--

INSERT INTO `salles` (`id_salle`, `pays`, `ville`, `adresse`, `cp`, `titre`, `description`, `photo`, `capacite`, `categorie`) VALUES
(1, 'France', 'Paris', '10, rue de Paradis', 75010, 'Salle Duval', 'La salle Duval, la plus belle des salles.', 'salle_duval.jpg', 50, '1'),
(2, 'France', 'Paris', 'place Louis Armand', 75012, 'Salle des Pas Perdus', 'Pour vos réunions mondaines, la salles des Pas Perdus vous acceuille en nombre avec vos bagages.', 'salle_pas_perdus.jpg', 120, '1'),
(3, 'France', 'Paris', 'place de l''Hôtel de Ville', 75004, 'Salle du conseil', 'La salle du conseil est la salle idéale pour vos réunions officielles ou solennelles.', 'salle_cons.jpg', 70, '1'),
(4, 'France', 'Paris', 'rue Réaumur', 75004, 'Salle Nautilus', 'Cette salle conviendra parfaitement aux petits budgets. Aisément accessible par les transports en commun, vos collaborateurs\r\napprécieront l''originalité du lieu et le design du mobilier.', 'salle_Nautilus.jpg', 80, '1'),
(5, 'France', 'Paris', '113, boulevard Haussmann', 75008, 'Salle Mon Dentiste', 'Pour vos réunion en petit commité dans une ambiance chaleureuse et décontractée.', 'salle_dentiste.jpg', 13, '1');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `fk_avis_membres1` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id_membre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_avis_salles1` FOREIGN KEY (`id_salle`) REFERENCES `salles` (`id_salle`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `fk_commandes_membres1` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id_membre`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `detais_commandes`
--
ALTER TABLE `detais_commandes`
  ADD CONSTRAINT `fk_detais_commandes_commandes1` FOREIGN KEY (`id_commande`) REFERENCES `commandes` (`id_commande`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detais_commandes_produits1` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `newsletters`
--
ALTER TABLE `newsletters`
  ADD CONSTRAINT `fk_newsletters_membres1` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id_membre`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `fk_produits_promotions1` FOREIGN KEY (`id_promotion`) REFERENCES `promotions` (`id_promotion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produits_salles` FOREIGN KEY (`id_salle`) REFERENCES `salles` (`id_salle`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
