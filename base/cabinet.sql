-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 17, 2020 at 01:39 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cabinet`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

DROP TABLE IF EXISTS `consultation`;
CREATE TABLE IF NOT EXISTS `consultation` (
  `n_decision` varchar(100) NOT NULL,
  `indice` int(11) NOT NULL,
  `nom_jour` varchar(100) NOT NULL,
  `date_jour` varchar(100) NOT NULL,
  `date_premier` date NOT NULL,
  PRIMARY KEY (`n_decision`,`indice`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`n_decision`, `indice`, `nom_jour`, `date_jour`, `date_premier`) VALUES
('1922/22/22', 9, 'nhar mel nharat', '03/06/2020', '2020-05-15'),
('1922/22/22', 8, 'nhar mel nharat', '01/06/2020', '2020-05-15'),
('1922/22/22', 7, 'nhar mel nharat', '29/05/2020', '2020-05-15'),
('1922/22/22', 6, 'nhar mel nharat', '27/05/2020', '2020-05-15'),
('1922/22/22', 5, 'nhar mel nharat', '25/05/2020', '2020-05-15'),
('1922/22/22', 4, 'nhar mel nharat', '22/05/2020', '2020-05-15'),
('1922/22/22', 3, 'nhar mel nharat', '20/05/2020', '2020-05-15'),
('1922/22/22', 2, 'nhar mel nharat', '18/05/2020', '2020-05-15'),
('1922/22/22', 1, 'nhar mel nharat', '15/05/2020', '2020-05-15'),
('66999666/55/55', 12, 'nhar mel nharat', '02/06/2020', '2020-05-07'),
('66999666/55/55', 11, 'nhar mel nharat', '30/05/2020', '2020-05-07'),
('66999666/55/55', 10, 'nhar mel nharat', '28/05/2020', '2020-05-07'),
('66999666/55/55', 9, 'nhar mel nharat', '26/05/2020', '2020-05-07'),
('66999666/55/55', 8, 'nhar mel nharat', '23/05/2020', '2020-05-07'),
('66999666/55/55', 7, 'nhar mel nharat', '21/05/2020', '2020-05-07'),
('66999666/55/55', 6, 'nhar mel nharat', '19/05/2020', '2020-05-07'),
('66999666/55/55', 5, 'nhar mel nharat', '16/05/2020', '2020-05-07'),
('66999666/55/55', 4, 'nhar mel nharat', '14/05/2020', '2020-05-07'),
('66999666/55/55', 3, 'nhar mel nharat', '12/05/2020', '2020-05-07'),
('30/2019/16607', 6, 'nhar mel nharat', '03/12/2019', '2019-11-21'),
('30/2019/16607', 5, 'nhar mel nharat', '30/11/2019', '2019-11-21'),
('30/2019/16607', 4, 'nhar mel nharat', '28/11/2019', '2019-11-21'),
('30/2019/16607', 3, 'nhar mel nharat', '26/11/2019', '2019-11-21'),
('30/2019/16607', 2, 'nhar mel nharat', '23/11/2019', '2019-11-21'),
('30/2019/16607', 1, 'nhar mel nharat', '21/11/2019', '2019-11-21'),
('66999666/55/55', 2, 'nhar mel nharat', '09/05/2020', '2020-05-07'),
('66999666/55/55', 1, 'nhar mel nharat', '07/05/2020', '2020-05-07'),
('1922/22/22', 10, 'nhar mel nharat', '05/06/2020', '2020-05-15'),
('1922/22/22', 11, 'nhar mel nharat', '08/06/2020', '2020-05-15'),
('1922/22/22', 12, 'nhar mel nharat', '10/06/2020', '2020-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `decision`
--

DROP TABLE IF EXISTS `decision`;
CREATE TABLE IF NOT EXISTS `decision` (
  `n_assure` varchar(100) NOT NULL,
  `n_decision` varchar(100) NOT NULL,
  `nbr_s` int(11) NOT NULL,
  `nb_s_sem` int(11) NOT NULL,
  `dat_deb` date NOT NULL,
  `pu` float NOT NULL,
  `bord` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`n_assure`,`n_decision`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci;

--
-- Dumping data for table `decision`
--

INSERT INTO `decision` (`n_assure`, `n_decision`, `nbr_s`, `nb_s_sem`, `dat_deb`, `pu`, `bord`) VALUES
('199501/01', '1922/22/22', 12, 3, '2020-05-15', 11.5, 0),
('17010416/8', '30/2019/16607', 6, 3, '2019-11-21', 11.5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `annee` int(11) NOT NULL,
  `n_decision` varchar(255) NOT NULL,
  `n_fac` varchar(255) NOT NULL,
  `datee` date NOT NULL,
  `date_premier` date NOT NULL,
  `date_fin` date NOT NULL,
  `pu` float NOT NULL,
  `total_ht` float NOT NULL,
  `tva` float NOT NULL,
  `mnt_tva` float NOT NULL,
  `total_ttc` float NOT NULL,
  `ttc_lettre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci;

--
-- Dumping data for table `facture`
--

INSERT INTO `facture` (`id`, `annee`, `n_decision`, `n_fac`, `datee`, `date_premier`, `date_fin`, `pu`, `total_ht`, `tva`, `mnt_tva`, `total_ttc`, `ttc_lettre`) VALUES
(46, 2020, '1922/22/22', '03/2020', '2020-05-17', '2020-05-15', '0000-00-00', 11.5, 128.34, 7, 9.66, 138, 'cent trente-huit '),
(45, 2020, '66999666/55/55', '02/2020', '2020-05-17', '2020-05-07', '0000-00-00', 11.5, 128.34, 7, 9.66, 138, 'cent trente-huit '),
(43, 2020, '30/2019/16607', '01/2020', '2020-05-16', '2019-11-21', '0000-00-00', 11.5, 64.17, 7, 4.83, 69, 'soixante-neuf ');

-- --------------------------------------------------------

--
-- Table structure for table `jour_non_aut`
--

DROP TABLE IF EXISTS `jour_non_aut`;
CREATE TABLE IF NOT EXISTS `jour_non_aut` (
  `jour` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci;

--
-- Dumping data for table `jour_non_aut`
--

INSERT INTO `jour_non_aut` (`jour`) VALUES
('2020-01-01'),
('2020-01-14'),
('2020-03-12'),
('2020-04-09'),
('2020-05-01'),
('2020-05-24'),
('2020-07-25'),
('2020-07-31'),
('2020-08-13'),
('2020-10-15'),
('2020-01-01'),
('2020-01-14'),
('2020-03-12'),
('2020-04-09'),
('2020-05-01'),
('2020-05-24'),
('2020-07-25'),
('2020-07-31'),
('2020-08-13'),
('2020-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `kine`
--

DROP TABLE IF EXISTS `kine`;
CREATE TABLE IF NOT EXISTS `kine` (
  `code` varchar(20) NOT NULL,
  `cin` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8_general_ci NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `profeesion` varchar(20) NOT NULL DEFAULT 'Kinesitherapeute',
  `centre_ref` varchar(20) NOT NULL DEFAULT 'Hammamet',
  `mobile` int(11) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `code_prest` varchar(255) NOT NULL,
  `mat_fisc` varchar(255) NOT NULL,
  `banque` varchar(255) NOT NULL,
  `RIB` varchar(255) NOT NULL,
  PRIMARY KEY (`code`),
  UNIQUE KEY `cin` (`cin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kine`
--

INSERT INTO `kine` (`code`, `cin`, `email`, `nom`, `prenom`, `uname`, `pwd`, `profeesion`, `centre_ref`, `mobile`, `adresse`, `code_prest`, `mat_fisc`, `banque`, `RIB`) VALUES
('1/27348/91', 9832741, 'derouiche_mouna@live.fr', 'Derouiche', 'Mouna', 'derouiche.mouna', '123456', 'Kinesitherapeute', 'Hammamet', 25456832, 'Avenue de la République Immeuble Les Arcades -2éme étage B4-, Hammamet, 8050.', '75', 'xxxxxxx/x', 'banque el 5ir', '555555555555.');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `n_assure` varchar(100) NOT NULL,
  `cin_kine` varchar(100) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `qualite` varchar(255) NOT NULL,
  `nom_ass` varchar(255) NOT NULL,
  `pre_ass` varchar(255) NOT NULL,
  `diagnostique` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  PRIMARY KEY (`n_assure`,`cin_kine`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`n_assure`, `cin_kine`, `nom`, `prenom`, `qualite`, `nom_ass`, `pre_ass`, `diagnostique`, `tel`) VALUES
('199501/01', '9832741', 'saaf', 'ghassen', 'Assure lui meme', 'saaf', 'ghassen', 'kerch kbira', '21509309'),
('17010416/8', '9832741', 'Darraj', 'Amira', 'Assure lui meme', 'Darraj', 'Amira', 'Reeducation', ''),
('80647416/16', '9832741', 'Gabsi EP Daoud', 'Ouejdene', 'Assure lui meme', 'Gabsi EP Daoud', 'Ouejdene', 'Reeducation', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
