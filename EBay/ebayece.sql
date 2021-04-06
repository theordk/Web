-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 20 avr. 2020 à 18:05
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ebayece`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheteur`
--

DROP TABLE IF EXISTS `acheteur`;
CREATE TABLE IF NOT EXISTS `acheteur` (
  `ID_Acheteur` int(11) NOT NULL AUTO_INCREMENT,
  `NomAcheteur` varchar(20) NOT NULL,
  `PrenomAcheteur` varchar(20) NOT NULL,
  `MailAcheteur` varchar(30) NOT NULL,
  `MdpAcheteur` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_Acheteur`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`ID_Acheteur`, `NomAcheteur`, `PrenomAcheteur`, `MailAcheteur`, `MdpAcheteur`) VALUES
(1, 'Boyer', 'Baptiste', 'baptiste.boyer@edu.ece.fr', 'bap'),
(2, 'Colin', 'Diego', 'diego.colin@edu.ece.fr', 'dieg'),
(3, 'Tarbé', 'Théophile', 'theophile.tarbe@edu.ece.fr', 'theo'),
(8, 'SuperAcheteur', 'acheteur', 'acheteur@gmail.com', 'ach'),
(9, 'CreerAch', 'Ach', 'new@gamil.com', 'new');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `ID_Article` int(11) NOT NULL AUTO_INCREMENT,
  `NomArticle` varchar(50) NOT NULL,
  `Annee` int(11) NOT NULL,
  `Categorie` varchar(20) NOT NULL,
  `DateMiseEnVente` date NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Prix` float NOT NULL,
  `TypeVente` varchar(15) NOT NULL,
  `ID_Acheteur` int(11) DEFAULT NULL,
  `ID_Vendeur` int(11) NOT NULL,
  `PhotoArticle` varchar(300) NOT NULL,
  `VideoArticle` varchar(500) NOT NULL,
  `Bool` int(11) NOT NULL,
  PRIMARY KEY (`ID_Article`),
  KEY `Article_Acheteur_FK` (`ID_Acheteur`),
  KEY `Article_Vendeur0_FK` (`ID_Vendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`ID_Article`, `NomArticle`, `Annee`, `Categorie`, `DateMiseEnVente`, `Description`, `Prix`, `TypeVente`, `ID_Acheteur`, `ID_Vendeur`, `PhotoArticle`, `VideoArticle`, `Bool`) VALUES
(1, 'Montre', 2011, 'Bon pour le Musée', '2020-04-15', 'Je vends la Lune. Prix raisonnable', 100, '011', 8, 1, 'miniatures/Moon.jpg', '', 1),
(2, 'Guernica - Picasso', 1937, 'Bon pour le Musée', '2020-04-01', 'Tableau un peu moche trouvé dans ma cave', 200, '010', 8, 2, 'https://cdn.radiofrance.fr/s3/cruiser-production/2018/03/d39a48ab-435b-46fe-9974-1c95f2a46b62/1280x680_043_dpa-pa_180327-99-658524_dpai.jpg', '', 1),
(109, 'testvente', 1987, 'Accessoires VIP', '2020-04-19', 'sarcus vente', 100, '110', 8, 17, 'miniatures/Moon.jpg', '', 1),
(110, 'Bague', 2010, 'Ferraille et Tresor', '2020-04-19', 'Bague avec diamants', 1000, '100', 8, 1, 'miniatures/BAGUE-HELENE-COURTAIGNE-DELALANDE-LUXE-INFINITY.3-1.jpg-1.jpg', '', 1),
(111, 'sac a main', 2012, 'Accessoires VIP', '2020-04-20', 'cuire neuf', 999, '001', NULL, 17, 'miniatures/club-des-cotonettes-mode-sacs-luxe-Vuitton.jpg', '', 0),
(112, 'Statue', 1800, 'Bon pour le Musée', '2020-04-20', 'En pierre blanche', 259, '010', NULL, 2, 'miniatures/Sculpture-visage-musee-louvre.jpg', '', 0),
(113, 'Tableau', 1345, 'Bon pour le Musée', '2020-04-20', 'Magnifique peinture', 1500, '011', NULL, 1, 'miniatures/20170407_175815_resized.jpg', '', 0),
(114, 'Montre Rolex', 2013, 'Accessoires VIP', '2020-04-20', 'Un peu portée mais bon etat', 1200, '110', NULL, 1, 'miniatures/Montre_luxe_Rollex_image.jpg', '', 0),
(115, 'Collier', 2019, 'Ferraille et Tresor', '2020-04-20', 'Avec des billes en argent', 199, '110', NULL, 17, 'miniatures/bijoux 2-.jpg', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `banque`
--

DROP TABLE IF EXISTS `banque`;
CREATE TABLE IF NOT EXISTS `banque` (
  `ID_CB` int(11) NOT NULL AUTO_INCREMENT,
  `NumCB` int(11) NOT NULL,
  `CVV` int(11) NOT NULL,
  `ID_Acheteur` int(11) NOT NULL,
  `AdresseLivraison` varchar(255) NOT NULL,
  `Solde` int(11) NOT NULL,
  PRIMARY KEY (`ID_CB`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `banque`
--

INSERT INTO `banque` (`ID_CB`, `NumCB`, `CVV`, `ID_Acheteur`, `AdresseLivraison`, `Solde`) VALUES
(1, 123456789, 123, 1, 'rue du fort', 1000),
(7, 1234567890, 111, 7, 'rue des lilas', 200),
(8, 101010101, 999, 8, 'boulevard legrand', 68200),
(2, 987654321, 123, 2, 'rue general de gaulle', 5000);

-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

DROP TABLE IF EXISTS `contient`;
CREATE TABLE IF NOT EXISTS `contient` (
  `ID_Panier` int(11) NOT NULL,
  `ID_Article` int(11) NOT NULL,
  PRIMARY KEY (`ID_Panier`,`ID_Article`),
  KEY `contient_Article0_FK` (`ID_Article`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `negocie`
--

DROP TABLE IF EXISTS `negocie`;
CREATE TABLE IF NOT EXISTS `negocie` (
  `ID_Article` int(11) NOT NULL,
  `ID_Acheteur` int(11) NOT NULL,
  `prixFinal` float NOT NULL,
  `ID_Vendeur` int(11) NOT NULL,
  `Bool` int(11) NOT NULL,
  PRIMARY KEY (`ID_Article`,`ID_Acheteur`),
  KEY `negocie_Acheteur0_FK` (`ID_Acheteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `negocie`
--

INSERT INTO `negocie` (`ID_Article`, `ID_Acheteur`, `prixFinal`, `ID_Vendeur`, `Bool`) VALUES
(1, 1, 150, 1, 0),
(1, 3, 5, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `ID_Panier` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Acheteur` int(11) NOT NULL,
  PRIMARY KEY (`ID_Panier`),
  UNIQUE KEY `Panier_Acheteur_AK` (`ID_Acheteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `proposeenchere`
--

DROP TABLE IF EXISTS `proposeenchere`;
CREATE TABLE IF NOT EXISTS `proposeenchere` (
  `ID_Article` int(11) NOT NULL,
  `ID_Acheteur` int(11) NOT NULL,
  `PrixActuel` float NOT NULL,
  `DateDebut` date NOT NULL,
  `DateFin` varchar(11) NOT NULL,
  `OffreMax` int(11) NOT NULL,
  PRIMARY KEY (`ID_Article`,`ID_Acheteur`),
  KEY `proposeEchere_Acheteur0_FK` (`ID_Acheteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `proposeenchere`
--

INSERT INTO `proposeenchere` (`ID_Article`, `ID_Acheteur`, `PrixActuel`, `DateDebut`, `DateFin`, `OffreMax`) VALUES
(109, 1, 1, '2020-04-19', '2020-5-19', 1),
(110, 2, 51, '2020-04-19', '2020-5-19', 70),
(114, 1, 1, '2020-04-20', '2020-5-20', 1),
(115, 1, 1, '2020-04-20', '2020-5-20', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `ID_Vendeur` int(11) NOT NULL AUTO_INCREMENT,
  `NomVendeur` varchar(20) NOT NULL,
  `PrenomVendeur` varchar(20) NOT NULL,
  `PhotoVendeur` varchar(300) NOT NULL,
  `MailVendeur` varchar(30) NOT NULL,
  `MdpVendeur` varchar(30) NOT NULL,
  `PhotoEcran` varchar(500) NOT NULL,
  PRIMARY KEY (`ID_Vendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`ID_Vendeur`, `NomVendeur`, `PrenomVendeur`, `PhotoVendeur`, `MailVendeur`, `MdpVendeur`, `PhotoEcran`) VALUES
(1, 'Admin', 'SuperAdmin', 'ad_pp', 'admin@ebayece.fr', 'adminmdp', 'photoEcran/bleue.jpg'),
(2, 'Nadal', 'Rafael', 'photoVendeur/161b7.jpg', 'RafaNadal@gmail.com', 'rapha', 'photoEcran/banc1.jpg'),
(17, 'team', 'sarcus', 'photoVendeur/10724.jpg', 'sarcus@gmail.com', 'sarcus', 'photoEcran/banc3.jpg'),
(31, 'test', 'test', 'photoVendeur/161b7.jpg', 'test@gmail.com', 'test', 'photoEcran/minion.jpg'),
(32, 'testad', 'testad', 'photoVendeur/161b7.jpg', 'testad@gmail.com', 'testad', 'photoEcran/minion.jpg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `Article_Acheteur_FK` FOREIGN KEY (`ID_Acheteur`) REFERENCES `acheteur` (`ID_Acheteur`),
  ADD CONSTRAINT `Article_Vendeur0_FK` FOREIGN KEY (`ID_Vendeur`) REFERENCES `vendeur` (`ID_Vendeur`);

--
-- Contraintes pour la table `contient`
--
ALTER TABLE `contient`
  ADD CONSTRAINT `contient_Article0_FK` FOREIGN KEY (`ID_Article`) REFERENCES `article` (`ID_Article`),
  ADD CONSTRAINT `contient_Panier_FK` FOREIGN KEY (`ID_Panier`) REFERENCES `panier` (`ID_Panier`);

--
-- Contraintes pour la table `negocie`
--
ALTER TABLE `negocie`
  ADD CONSTRAINT `negocie_Acheteur0_FK` FOREIGN KEY (`ID_Acheteur`) REFERENCES `acheteur` (`ID_Acheteur`),
  ADD CONSTRAINT `negocie_Article_FK` FOREIGN KEY (`ID_Article`) REFERENCES `article` (`ID_Article`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `Panier_Acheteur_FK` FOREIGN KEY (`ID_Acheteur`) REFERENCES `acheteur` (`ID_Acheteur`);

--
-- Contraintes pour la table `proposeenchere`
--
ALTER TABLE `proposeenchere`
  ADD CONSTRAINT `proposeEchere_Acheteur0_FK` FOREIGN KEY (`ID_Acheteur`) REFERENCES `acheteur` (`ID_Acheteur`),
  ADD CONSTRAINT `proposeEchere_Article_FK` FOREIGN KEY (`ID_Article`) REFERENCES `article` (`ID_Article`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
