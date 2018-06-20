-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 20 juin 2018 à 18:46
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `nounou`
--

-- --------------------------------------------------------

--
-- Structure de la table `enfants`
--

DROP TABLE IF EXISTS `enfants`;
CREATE TABLE IF NOT EXISTS `enfants` (
  `idEnfants` int(11) NOT NULL AUTO_INCREMENT,
  `Prénom` varchar(45) NOT NULL,
  `Date de Naissance` date NOT NULL,
  `Restrictions Alimentaires` varchar(200) DEFAULT NULL,
  `idParents` int(11) NOT NULL,
  PRIMARY KEY (`idEnfants`),
  KEY `fk_Enfants_Parents1_idx` (`idParents`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enfants`
--

INSERT INTO `enfants` (`idEnfants`, `Prénom`, `Date de Naissance`, `Restrictions Alimentaires`, `idParents`) VALUES
(7, 'Karina', '1995-10-08', 'éloigner l\'acool', 5),
(9, 'Thomas', '1997-03-24', 'RAS', 5),
(10, 'Coline', '2007-09-08', 'ne rien donner à manger ou elle meurt', 7),
(11, 'Caroline', '2008-06-01', 'éloigner l\'alcool', 9),
(12, 'François', '2011-09-15', 'RAS', 9);

-- --------------------------------------------------------

--
-- Structure de la table `enfants_gardé`
--

DROP TABLE IF EXISTS `enfants_gardé`;
CREATE TABLE IF NOT EXISTS `enfants_gardé` (
  `idEnfants` int(11) NOT NULL,
  `idNounous` int(11) NOT NULL,
  `idHoraires` int(11) NOT NULL,
  PRIMARY KEY (`idEnfants`,`idNounous`,`idHoraires`),
  KEY `fk_Enfants_has_Propose_Propose1_idx` (`idNounous`,`idHoraires`),
  KEY `fk_Enfants_has_Propose_Enfants1_idx` (`idEnfants`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enfants_gardé`
--

INSERT INTO `enfants_gardé` (`idEnfants`, `idNounous`, `idHoraires`) VALUES
(11, 15, 20),
(12, 16, 25);

-- --------------------------------------------------------

--
-- Structure de la table `garde`
--

DROP TABLE IF EXISTS `garde`;
CREATE TABLE IF NOT EXISTS `garde` (
  `idNounous` int(11) NOT NULL,
  `idHoraires` int(11) NOT NULL,
  `Régulier` tinyint(4) NOT NULL,
  `Date Début` date DEFAULT NULL,
  `Date Fin` date DEFAULT NULL,
  `Langue` tinyint(4) DEFAULT NULL,
  `nbr_enfant_max` int(11) DEFAULT NULL,
  `Prix` int(11) DEFAULT NULL,
  `Note` int(11) DEFAULT NULL,
  `Appreciation` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idNounous`,`idHoraires`),
  KEY `fk_Nounous_has_Disponibilités_Disponibilités1_idx` (`idHoraires`),
  KEY `fk_Nounous_has_Disponibilités_Nounous1_idx` (`idNounous`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `garde`
--

INSERT INTO `garde` (`idNounous`, `idHoraires`, `Régulier`, `Date Début`, `Date Fin`, `Langue`, `nbr_enfant_max`, `Prix`, `Note`, `Appreciation`) VALUES
(15, 20, 0, NULL, NULL, 1, 5, NULL, NULL, NULL),
(15, 21, 0, '2018-06-09', '2018-06-21', 1, 5, 16, 4, 'Très gentil'),
(15, 22, 0, '2018-06-04', '2018-06-08', 1, 6, 20, 5, 'Woaaaaaa'),
(16, 23, 0, NULL, NULL, 1, 6, NULL, NULL, NULL),
(16, 24, 0, NULL, NULL, 1, 6, NULL, NULL, NULL),
(16, 25, 0, NULL, NULL, 1, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `horaires`
--

DROP TABLE IF EXISTS `horaires`;
CREATE TABLE IF NOT EXISTS `horaires` (
  `idHoraires` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Heure Début` time NOT NULL,
  `Heure Fin` time NOT NULL,
  PRIMARY KEY (`idHoraires`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `horaires`
--

INSERT INTO `horaires` (`idHoraires`, `Date`, `Heure Début`, `Heure Fin`) VALUES
(14, '2018-12-12', '00:00:00', '24:00:00'),
(20, '2018-07-01', '00:00:00', '24:00:00'),
(21, '2017-01-01', '12:00:00', '16:00:00'),
(22, '2017-02-02', '10:00:00', '12:00:00'),
(23, '2018-07-01', '08:00:00', '12:00:00'),
(24, '2018-07-02', '12:00:00', '20:00:00'),
(25, '2018-07-01', '14:00:00', '20:00:00'),
(26, '2018-07-02', '00:00:00', '23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `langues`
--

DROP TABLE IF EXISTS `langues`;
CREATE TABLE IF NOT EXISTS `langues` (
  `idLangue` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(45) NOT NULL,
  `Visible` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idLangue`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `langues`
--

INSERT INTO `langues` (`idLangue`, `Nom`, `Visible`) VALUES
(1, 'Anglais', 1),
(2, 'Allemand', 1),
(3, 'Espagnole', 1),
(7, 'Italien', 1),
(8, 'Arabe', 1),
(9, 'trop drôle', 0),
(10, 'Hongrois', 0),
(11, '', 0),
(12, 'Danois', 0),
(13, 'haha', 0);

-- --------------------------------------------------------

--
-- Structure de la table `nounous`
--

DROP TABLE IF EXISTS `nounous`;
CREATE TABLE IF NOT EXISTS `nounous` (
  `idNounous` int(11) NOT NULL AUTO_INCREMENT,
  `Prénom` varchar(45) DEFAULT NULL,
  `Portable` varchar(10) DEFAULT NULL,
  `Age` int(2) DEFAULT NULL,
  `Présentation` varchar(200) DEFAULT NULL,
  `Expérience` varchar(100) DEFAULT NULL,
  `Visible` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idNounous`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `nounous`
--

INSERT INTO `nounous` (`idNounous`, `Prénom`, `Portable`, `Age`, `Présentation`, `Expérience`, `Visible`) VALUES
(15, 'Paul', '0675413451', 26, 'Etudiant jeune et dynamique, grand', 'Possède la BAFA et travail dans des colos pendant les vacances', 0),
(16, 'Coline', '0697543164', 21, 'Jeune et pleine de vie parfaite pour garder vos enfants', 'beaucoup beaucoup beaucoup trop', 0);

-- --------------------------------------------------------

--
-- Structure de la table `parents`
--

DROP TABLE IF EXISTS `parents`;
CREATE TABLE IF NOT EXISTS `parents` (
  `idParents` int(11) NOT NULL AUTO_INCREMENT,
  `Ville` varchar(45) NOT NULL,
  `Informations Générales` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idParents`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `parents`
--

INSERT INTO `parents` (`idParents`, `Ville`, `Informations Générales`) VALUES
(5, 'Toulouse', 'habite dans la cambrousse à 2 heures de la civilisation'),
(7, 'Marseille', 'beaucoup trop de gamins'),
(9, 'Paris', 'Célibataire');

-- --------------------------------------------------------

--
-- Structure de la table `parle`
--

DROP TABLE IF EXISTS `parle`;
CREATE TABLE IF NOT EXISTS `parle` (
  `idLangue` int(11) NOT NULL,
  `idNounous` int(11) NOT NULL,
  `Niveau` varchar(45) NOT NULL,
  PRIMARY KEY (`idLangue`,`idNounous`),
  KEY `fk_Langues_has_Nounous_Nounous1_idx` (`idNounous`),
  KEY `fk_Langues_has_Nounous_Langues1_idx` (`idLangue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `parle`
--

INSERT INTO `parle` (`idLangue`, `idNounous`, `Niveau`) VALUES
(1, 15, 'C2'),
(2, 15, 'C2'),
(8, 16, 'A2');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `MDP` varchar(255) NOT NULL,
  `idNounous` int(11) DEFAULT NULL,
  `idParents` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`),
  KEY `fk_Utilisateur_Nounous_idx` (`idNounous`),
  KEY `fk_Utilisateur_Parents1_idx` (`idParents`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `Nom`, `Email`, `MDP`, `idNounous`, `idParents`) VALUES
(0, 'admin', 'admin@admin.fr', '$2y$10$oOejVLiub4wqsALOth.MKOy6RdPcIDZio6h.W1mcCGvtIj84IZ1tm', NULL, NULL),
(6, 'LORIOT', 'jacques@free.fr', '$2y$10$D1ojc48r1HU9j3gQntCjL.M6ALAkisHNMn0v1YRm0.AswIY9L7BeW', NULL, 5),
(9, 'loriot', 'thomas@free.fr', '$2y$10$UllGs9ZNp201n20B58I2GO1enCIm8LgYzs/zYWaezGPHE.HMl23OK', NULL, 7),
(13, 'Parent', 'parent@parent.fr', '$2y$10$x.gWCcuQZRTXbS5nfO6CZ.EaxR01kaXPCV/vC5jWlMxukZgHV/S9e', NULL, 9),
(14, 'Nounou', 'nounou@nounou.fr', '$2y$10$5yZHzOruhXWoLhmiflZiQeAqdoJeeyczIFERCEyKIThRf.ZeeJHn.', 15, NULL),
(15, 'BELTRAMI', 'coline@free.fr', '$2y$10$w2BWwCJmbZ1ppTRtfA6rq.SLeqiYLcXFuD5YlCu/BgB/breHYakIm', 16, NULL),
(16, 'Utilisateur', 'utilisateur@utilisateur.fr', '$2y$10$Gkse7TiTcMN94dq.60qsbOT16WuhxBF3HHRqYhnWISzSx435ZWL8G', NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `enfants`
--
ALTER TABLE `enfants`
  ADD CONSTRAINT `fk_Enfants_Parents1` FOREIGN KEY (`idParents`) REFERENCES `parents` (`idParents`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `enfants_gardé`
--
ALTER TABLE `enfants_gardé`
  ADD CONSTRAINT `fk_Enfants_has_Propose_Enfants1` FOREIGN KEY (`idEnfants`) REFERENCES `enfants` (`idEnfants`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Enfants_has_Propose_Propose1` FOREIGN KEY (`idNounous`,`idHoraires`) REFERENCES `garde` (`idNounous`, `idHoraires`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `garde`
--
ALTER TABLE `garde`
  ADD CONSTRAINT `fk_Nounous_has_Disponibilités_Disponibilités1` FOREIGN KEY (`idHoraires`) REFERENCES `horaires` (`idHoraires`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Nounous_has_Disponibilités_Nounous1` FOREIGN KEY (`idNounous`) REFERENCES `nounous` (`idNounous`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `parle`
--
ALTER TABLE `parle`
  ADD CONSTRAINT `fk_Langues_has_Nounous_Langues1` FOREIGN KEY (`idLangue`) REFERENCES `langues` (`idLangue`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Langues_has_Nounous_Nounous1` FOREIGN KEY (`idNounous`) REFERENCES `nounous` (`idNounous`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_Utilisateur_Nounous` FOREIGN KEY (`idNounous`) REFERENCES `nounous` (`idNounous`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Utilisateur_Parents1` FOREIGN KEY (`idParents`) REFERENCES `parents` (`idParents`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
