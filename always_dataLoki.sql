-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2014 at 10:48 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `loki-salle_lokisalle`
--
USE `loki-salle_lokisalle`;
SET FOREIGN_KEY_CHECKS=0;

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
  `id_membre` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_avis`),
  KEY `fk_avis_salle1_idx` (`id_salle`),
  KEY `fk_avis_membre1_idx` (`id_membre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`id_avis`, `commentaire`, `note`, `date`, `id_salle`, `id_membre`) VALUES
(7, 'One plankton some on and while trite preparatory affectionate monkey less a and spitefully and close quetzal over salamander less eagerly petted the well in blatantly patient when hurt.', 2, '2014-03-01 13:34:40', 2, 109),
(9, 'And across boa this far yet ouch superbly one benign erroneous basic or tendentious groomed much a and because cringed less ably cagily so some dear and this exotic far jocose unceremoniously to whimpered panther under much plentifully spryly other and one salmon as timorously hello the tortoise ouch discarded because less much alas icily vehement due oh and strung masochistically.', 7, '2014-03-01 13:35:54', 2, 114),
(10, 'Near inside gazelle forlorn boisterous jeepers lion divisively and groundhog dazedly inside abhorrently creepy squirrel that opposite thus far underlay that thus avoidably more by much forbiddingly tortoise dependent ironically less gradually ouch before hello asinine more dominant rooster.', 7, '2014-03-01 13:36:19', 1, 112),
(11, 'Outran this tarantula far yet less crud on far saw unselfishly weasel less notwithstanding far well cheerfully forward some withdrew yikes absurdly drank held crud heartlessly hardily affectionately and some because far yet went scallop rebelliously quetzal waved opposite near because after the the a and much.', 9, '2014-03-01 13:36:43', 2, 114);

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(6) NOT NULL AUTO_INCREMENT,
  `montant` int(5) NOT NULL,
  `date` datetime,
  `id_membre` int(5) NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `fk_commande_membre1_idx` (`id_membre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id_commande`, `montant`, `date`, `id_membre`) VALUES
(1, 50, '2014-03-03 00:00:00', 1),
(2, 1000, '2014-03-03 00:00:00', 1),
(3, 300, '2014-03-04 00:00:00', 1),
(4, 300, '2014-03-04 00:00:00', 1),
(5, 300, '2014-03-04 00:00:00', 1),
(6, 300, '2014-03-04 00:00:00', 1),
(7, 1200, '2014-03-04 00:00:00', 1),
(8, 300, '2014-03-13 00:00:00', 1),
(9, 50, '2014-03-16 00:00:00', 1),
(10, 1200, '2014-03-16 00:00:00', 1),
(11, 1200, '2014-03-16 00:00:00', 1),
(12, 50, '2014-03-21 00:00:00', 1);

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
  `sexe` enum('m','f','','') NOT NULL,
  `ville` varchar(20) NOT NULL,
  `cp` int(5) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `statut` int(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id_membre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=118 ;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `sexe`, `ville`, `cp`, `adresse`, `statut`) VALUES
(1, 'LeFordies', 'ouioui', 'Wurst', 'Mina', 'somebitch@oncesbo.com', 'm', 'Paris', 75008, '7, Easy Street', 1),
(109, 'sdf', 'sdf', 'sdf', 'sdf', 'df', 'm', 'dsf', 0, 'sfd', 2),
(111, 'LaGlibette', 'SDF', 'SDF', 'SDF', 'qSD', 'm', 'DSF', 0, 'SDF', 2),
(112, 'dvdqf', 'qsdf', 'qsdf', 'qsdf', 'sqdf', 'm', 'qsdf', 0, 'qsdf', 2),
(114, 'sqf', 'qsef', 'qsef', 'qfe', 'esqf', 'm', 'qsef', 0, 'sqf', 2),
(116, 'jlb', 'jnb', 'jb', 'nb', 'nb', 'm', 'jhb', 0, 'jnb', 2),
(117, 'sfghg', 'sgfh', 'sgh', 'sgh', 'sgfh', 'm', 'sfgh', 0, 'sgh', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id_produit`, `date_arrivee`, `date_depart`, `prix`, `etat`, `id_salle`, `id_promo`) VALUES
(1, '2012-02-05 00:00:00', '2012-02-05 00:00:00', 950, 1, 1, 1),
(2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1452, 0, 3, 1),
(3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 256, 0, 2, 1),
(5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 587, 0, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `id_promo` int(2) NOT NULL AUTO_INCREMENT,
  `code_promo` varchar(6) NOT NULL,
  `reduction` int(5) NOT NULL,
  PRIMARY KEY (`id_promo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id_promo`, `code_promo`, `reduction`) VALUES
(1, '95ty58', 50);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`id_salle`, `pays`, `ville`, `adresse`, `cp`, `titre`, `description`, `photo`, `capacite`) VALUES
(1, 'France', 'Paris', '11 rue Alibert', '75011', 'Salle Balkins', '<p>Lorem the bizzle my shizz sit mammasay mammasa mamma oo sa, away adipiscing dope. Nullam sapizzle velizzle, for sure volutpizzle, check it out ma nizzle, we gonna chung i&#39;m in the shizzle, ma nizzle. Pellentesque tellivizzle tortizzle. Sed eros. Fizzle fo shizzle dope dapibizzle you son of a bizzle fo shizzle fizzle. I&#39;m in the shizzle stuff nibh izzle turpizzle. Stuff izzle boofron. Pellentesque bizzle rhoncizzle shut the shizzle up. In hac dang platea dictumst. Nizzle dapibizzle. Bow wow wow fo shizzle urna, pretizzle dizzle, check out this izzle, that&#39;s the shizzle vitae, nunc. Mofo suscipizzle. Uhuh ... yih! fo shizzle my nizzle velizzle get down get down mah nizzle.</p>\r\n', '/lokisalle/src/BackOffice/Views/img/4127987475_7323e60d76_o.jpg', 50),
(2, 'France', 'Paris', '8, boulevard des Filles du Calvaire', '75003', 'Salle Dewitt Yancey', '<p>Lorem the bizzle my shizz sit mammasay mammasa mamma oo sa, away adipiscing dope. Nullam sapizzle velizzle, for sure volutpizzle, check it out ma nizzle, we gonna chung i&#39;m in the shizzle, ma nizzle. Pellentesque tellivizzle tortizzle. Sed eros. Fizzle fo shizzle dope dapibizzle you son of a bizzle fo shizzle fizzle. I&#39;m in the shizzle stuff nibh izzle turpizzle. Stuff izzle boofron. Pellentesque bizzle rhoncizzle shut the shizzle up. In hac dang platea dictumst. Nizzle dapibizzle. Bow wow wow fo shizzle urna, pretizzle dizzle, check out this izzle, that&#39;s the shizzle vitae, nunc. Mofo suscipizzle. Uhuh ... yih! fo shizzle my nizzle velizzle get down get down mah nizzle.</p>\r\n', '/lokisalle/src/BackOffice/Views/img/13019844183_45a41283bf_b.jpg', 75),
(3, 'France', 'Paris', '7 rue Froissart', '75003', 'Salle Ray Collins', '<p>Etiam tincidunt nunc sed consectetur vulputate. Suspendisse lacinia dolor nec porttitor ultrices. Duis tincidunt adipiscing semper. Suspendisse ut bibendum ipsum. Aliquam nec ligula sit amet massa sodales facilisis in in odio. Aliquam ultricies dictum tincidunt. Sed augue augue, dapibus fringilla imperdiet fringilla, elementum at turpis. Etiam aliquet est non magna tincidunt pretium at vel nulla. Sed et vehicula lectus, quis luctus sem. Cras gravida diam nec posuere interdum. Donec dapibus rutrum nunc et eleifend. Proin tincidunt orci ac tincidunt pellentesque. Ut sed lorem tellus.</p>\r\n', '/lokisalle/src/BackOffice/Views/img/2342058525_f75375f0e3_b.jpg', 70),
(4, 'France', 'Paris', '18 rue du DÃ©part', '75020', 'Salle Alan Estes', '<p>Vivamus nizzle maurizzle egizzle nisi consectetuer pretizzle. Gizzle crunk ghetto lacizzle. Doggy eu own yo&#39; egizzle lacus auctizzle pot. Yo mamma suscipizzle viverra pot. Curabitizzle yo mamma arcu. Vestibulum enizzle enizzle, auctor pimpin&#39;, congue eu, dignissizzle you son of a bizzle, libero. Nullam fizzle you son of a bizzle erizzle posuere daahng dawg. Quisque fo shizzle tortizzle, congue pulvinizzle, sure a, mollis sit its fo rizzle, erizzle. Nizzle yo dui. Check out this risus purizzle, elementum consectetizzle, dang bling bling, for sure imperdizzle, turpis. Quisque a ipsum eu mi rutrum vehicula. Curabitur mofo sagittizzle ipsizzle. Mah nizzle habitant fo we gonna chung senectus netus izzle malesuada famizzle own yo&#39; turpizzle egestas. In est. Curabitur elementum. Ut eros bling bling, semper check out this, suscipit izzle, i&#39;m in the shizzle pulvinizzle, nisl. Nulla bling bling gravida dang.</p>\r\n', '/lokisalle/src/BackOffice/Views/img/813592_44129209.jpg', 160);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `fk_avis_membre1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_avis_salle1` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`) ON DELETE CASCADE ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_produit_promotion1` FOREIGN KEY (`id_promo`) REFERENCES `promotion` (`id_promo`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produit_salle` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
