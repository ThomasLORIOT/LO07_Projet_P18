-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 20 juin 2018 à 16:51
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

--
-- Déchargement des données de la table `nounous`
--

INSERT INTO `nounous` (`idNounous`, `Prénom`, `Portable`, `Age`, `Présentation`, `Expérience`, `Visible`) VALUES
(15, 'Paul', '0675413451', 26, 'Etudiant jeune et dynamique, grand', 'Possède la BAFA et travail dans des colos pendant les vacances', 0),
(16, 'Coline', '0697543164', 21, 'Jeune et pleine de vie parfaite pour garder vos enfants', 'beaucoup beaucoup beaucoup trop', 0);

--
-- Déchargement des données de la table `parents`
--

INSERT INTO `parents` (`idParents`, `Ville`, `Informations Générales`) VALUES
(5, 'Toulouse', 'habite dans la cambrousse à 2 heures de la civilisation'),
(7, 'Marseille', 'beaucoup trop de gamins'),
(9, 'Paris', 'Célibataire');

--
-- Déchargement des données de la table `enfants`
--

INSERT INTO `enfants` (`idEnfants`, `Prénom`, `Date de Naissance`, `Restrictions Alimentaires`, `idParents`) VALUES
(7, 'Karina', '1995-10-08', 'éloigner l\'acool', 5),
(9, 'Thomas', '1997-03-24', 'RAS', 5),
(10, 'Coline', '2007-09-08', 'allergique au chocolat blanc', 7),
(11, 'Caroline', '2008-06-01', 'éloigner l\'alcool', 9),
(12, 'François', '2011-09-15', 'RAS', 9);


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
-- Déchargement des données de la table `garde`
--

INSERT INTO `garde` (`idNounous`, `idHoraires`, `Régulier`, `Date Début`, `Date Fin`, `Langue`, `nbr_enfant_max`, `Prix`, `Note`, `Appreciation`) VALUES
(15, 20, 0, NULL, NULL, 1, 5, NULL, NULL, NULL),
(15, 21, 0, '2018-06-09', '2018-06-21', 1, 5, 16, 4, 'Très gentil'),
(15, 22, 0, '2018-06-04', '2018-06-08', 1, 6, 20, 5, 'Woaaaaaa'),
(16, 23, 0, NULL, NULL, 1, 6, NULL, NULL, NULL),
(16, 24, 0, NULL, NULL, 1, 6, NULL, NULL, NULL),
(16, 25, 0, NULL, NULL, 1, 4, NULL, NULL, NULL);


--
-- Déchargement des données de la table `parle`
--

INSERT INTO `parle` (`idLangue`, `idNounous`, `Niveau`) VALUES
(1, 15, 'C2'),
(2, 15, 'C2'),
(8, 16, 'A2');

--
-- Déchargement des données de la table `enfants_gardé`
--

INSERT INTO `enfants_gardé` (`idEnfants`, `idNounous`, `idHoraires`) VALUES
(11, 15, 20),
(12, 16, 25);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
