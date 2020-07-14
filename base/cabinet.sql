-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 14, 2020 at 01:25 PM
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
-- Table structure for table `bordereau`
--

DROP TABLE IF EXISTS `bordereau`;
CREATE TABLE IF NOT EXISTS `bordereau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `annee` int(11) NOT NULL,
  `n_bord` varchar(100) NOT NULL,
  `datee` varchar(100) NOT NULL,
  `total_ttc` float NOT NULL,
  `ttc_lettre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`annee`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bordereau`
--

INSERT INTO `bordereau` (`id`, `annee`, `n_bord`, `datee`, `total_ttc`, `ttc_lettre`) VALUES
(51, 2020, '001/2020', '04/06/2020', 931.5, 'neuf cent trente et un ');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`n_decision`, `indice`, `nom_jour`, `date_jour`, `date_premier`) VALUES
('30/2020/3630', 12, 'nhar mel nharat', '30/04/2020', '2020-03-03'),
('30/2020/3630', 11, 'nhar mel nharat', '28/04/2020', '2020-03-03'),
('30/2020/3630', 10, 'nhar mel nharat', '25/04/2020', '2020-03-03'),
('30/2020/3630', 9, 'nhar mel nharat', '23/04/2020', '2020-03-03'),
('30/2020/3630', 8, 'nhar mel nharat', '21/04/2020', '2020-03-03'),
('30/2020/3630', 7, 'nhar mel nharat', '18/04/2020', '2020-03-03'),
('30/2020/3630', 6, 'nhar mel nharat', '16/04/2020', '2020-03-03'),
('30/2020/3630', 5, 'nhar mel nharat', '12/03/2020', '2020-03-03'),
('30/2020/3630', 4, 'nhar mel nharat', '10/03/2020', '2020-03-03'),
('30/2020/3630', 3, 'nhar mel nharat', '07/03/2020', '2020-03-03'),
('30/2020/3630', 2, 'nhar mel nharat', '05/03/2020', '2020-03-03'),
('30/2020/3630', 1, 'nhar mel nharat', '03/03/2020', '2020-03-03'),
('30/2020/3269', 15, 'nhar mel nharat', '29/04/2020', '2020-02-26'),
('30/2020/3269', 14, 'nhar mel nharat', '27/04/2020', '2020-02-26'),
('30/2020/3269', 13, 'nhar mel nharat', '24/04/2020', '2020-02-26'),
('30/2020/3269', 12, 'nhar mel nharat', '22/04/2020', '2020-02-26'),
('30/2020/3269', 11, 'nhar mel nharat', '20/04/2020', '2020-02-26'),
('30/2020/3269', 10, 'nhar mel nharat', '17/04/2020', '2020-02-26'),
('30/2020/3269', 9, 'nhar mel nharat', '15/04/2020', '2020-02-26'),
('30/2020/3269', 8, 'nhar mel nharat', '13/03/2020', '2020-02-26'),
('30/2020/3269', 7, 'nhar mel nharat', '11/03/2020', '2020-02-26'),
('30/2020/3269', 6, 'nhar mel nharat', '09/03/2020', '2020-02-26'),
('30/2020/3269', 5, 'nhar mel nharat', '06/03/2020', '2020-02-26'),
('30/2020/3269', 4, 'nhar mel nharat', '04/03/2020', '2020-02-26'),
('30/2020/3269', 3, 'nhar mel nharat', '02/03/2020', '2020-02-26'),
('30/2020/3269', 2, 'nhar mel nharat', '28/02/2020', '2020-02-26'),
('30/2020/3269', 1, 'nhar mel nharat', '26/02/2020', '2020-02-26'),
('30/2020/2669', 12, 'nhar mel nharat', '10/03/2020', '2020-02-13'),
('30/2020/2669', 11, 'nhar mel nharat', '07/03/2020', '2020-02-13'),
('30/2020/2669', 10, 'nhar mel nharat', '05/03/2020', '2020-02-13'),
('30/2020/2669', 9, 'nhar mel nharat', '03/03/2020', '2020-02-13'),
('30/2020/2669', 8, 'nhar mel nharat', '29/02/2020', '2020-02-13'),
('30/2020/2669', 7, 'nhar mel nharat', '27/02/2020', '2020-02-13'),
('30/2020/2669', 6, 'nhar mel nharat', '25/02/2020', '2020-02-13'),
('30/2020/2669', 5, 'nhar mel nharat', '22/02/2020', '2020-02-13'),
('30/2020/2669', 4, 'nhar mel nharat', '20/02/2020', '2020-02-13'),
('30/2020/2669', 3, 'nhar mel nharat', '18/02/2020', '2020-02-13'),
('30/2020/2669', 2, 'nhar mel nharat', '15/02/2020', '2020-02-13'),
('30/2020/2669', 1, 'nhar mel nharat', '13/02/2020', '2020-02-13'),
('30/2020/2359', 18, 'nhar mel nharat', '17/04/2020', '2020-02-07'),
('30/2020/2359', 17, 'nhar mel nharat', '15/04/2020', '2020-02-07'),
('30/2020/2359', 16, 'nhar mel nharat', '13/03/2020', '2020-02-07'),
('30/2020/2359', 15, 'nhar mel nharat', '11/03/2020', '2020-02-07'),
('30/2020/2359', 14, 'nhar mel nharat', '09/03/2020', '2020-02-07'),
('30/2020/2359', 13, 'nhar mel nharat', '06/03/2020', '2020-02-07'),
('30/2020/2359', 12, 'nhar mel nharat', '04/03/2020', '2020-02-07'),
('30/2020/2359', 11, 'nhar mel nharat', '02/03/2020', '2020-02-07'),
('30/2020/2359', 10, 'nhar mel nharat', '28/02/2020', '2020-02-07'),
('30/2020/2359', 9, 'nhar mel nharat', '26/02/2020', '2020-02-07'),
('30/2020/2359', 8, 'nhar mel nharat', '24/02/2020', '2020-02-07'),
('30/2020/2359', 7, 'nhar mel nharat', '21/02/2020', '2020-02-07'),
('30/2020/2359', 6, 'nhar mel nharat', '19/02/2020', '2020-02-07'),
('30/2020/2359', 5, 'nhar mel nharat', '17/02/2020', '2020-02-07'),
('30/2020/2359', 4, 'nhar mel nharat', '14/02/2020', '2020-02-07'),
('30/2020/2359', 3, 'nhar mel nharat', '12/02/2020', '2020-02-07'),
('30/2020/2359', 2, 'nhar mel nharat', '10/02/2020', '2020-02-07'),
('30/2020/2359', 1, 'nhar mel nharat', '07/02/2020', '2020-02-07'),
('30/2020/2199', 12, 'nhar mel nharat', '14/03/2020', '2020-02-05'),
('30/2020/2199', 11, 'nhar mel nharat', '11/03/2020', '2020-02-05'),
('30/2020/2199', 10, 'nhar mel nharat', '07/03/2020', '2020-02-05'),
('30/2020/2199', 9, 'nhar mel nharat', '04/03/2020', '2020-02-05'),
('30/2020/2199', 8, 'nhar mel nharat', '29/02/2020', '2020-02-05'),
('30/2020/2199', 7, 'nhar mel nharat', '26/02/2020', '2020-02-05'),
('30/2020/2199', 6, 'nhar mel nharat', '22/02/2020', '2020-02-05'),
('30/2020/2199', 5, 'nhar mel nharat', '19/02/2020', '2020-02-05'),
('30/2020/2199', 4, 'nhar mel nharat', '15/02/2020', '2020-02-05'),
('30/2020/2199', 3, 'nhar mel nharat', '12/02/2020', '2020-02-05'),
('30/2020/2199', 2, 'nhar mel nharat', '08/02/2020', '2020-02-05'),
('30/2020/2199', 1, 'nhar mel nharat', '05/02/2020', '2020-02-05'),
('30/2020/1848', 18, 'nhar mel nharat', '10/03/2020', '2020-01-30'),
('30/2020/1848', 17, 'nhar mel nharat', '07/03/2020', '2020-01-30'),
('30/2020/1848', 16, 'nhar mel nharat', '05/03/2020', '2020-01-30'),
('30/2020/1848', 15, 'nhar mel nharat', '03/03/2020', '2020-01-30'),
('30/2020/1848', 14, 'nhar mel nharat', '29/02/2020', '2020-01-30'),
('30/2020/1848', 13, 'nhar mel nharat', '27/02/2020', '2020-01-30'),
('30/2020/1848', 12, 'nhar mel nharat', '25/02/2020', '2020-01-30'),
('30/2020/1848', 11, 'nhar mel nharat', '22/02/2020', '2020-01-30'),
('30/2020/1848', 10, 'nhar mel nharat', '20/02/2020', '2020-01-30'),
('30/2020/1848', 9, 'nhar mel nharat', '18/02/2020', '2020-01-30'),
('30/2020/1848', 8, 'nhar mel nharat', '15/02/2020', '2020-01-30'),
('30/2020/1848', 7, 'nhar mel nharat', '13/02/2020', '2020-01-30'),
('30/2020/1848', 6, 'nhar mel nharat', '11/02/2020', '2020-01-30'),
('30/2020/1848', 5, 'nhar mel nharat', '08/02/2020', '2020-01-30'),
('30/2020/1848', 4, 'nhar mel nharat', '06/02/2020', '2020-01-30'),
('30/2020/1848', 3, 'nhar mel nharat', '04/02/2020', '2020-01-30'),
('30/2020/1848', 2, 'nhar mel nharat', '01/02/2020', '2020-01-30'),
('30/2020/1848', 1, 'nhar mel nharat', '30/01/2020', '2020-01-30'),
('30/2020/1456', 12, 'nhar mel nharat', '21/02/2020', '2020-01-27'),
('30/2020/1456', 11, 'nhar mel nharat', '19/02/2020', '2020-01-27'),
('30/2020/1456', 10, 'nhar mel nharat', '17/02/2020', '2020-01-27'),
('30/2020/1456', 9, 'nhar mel nharat', '14/02/2020', '2020-01-27'),
('30/2020/1456', 8, 'nhar mel nharat', '12/02/2020', '2020-01-27'),
('30/2020/1456', 7, 'nhar mel nharat', '10/02/2020', '2020-01-27'),
('30/2020/1456', 6, 'nhar mel nharat', '07/02/2020', '2020-01-27'),
('30/2020/1456', 5, 'nhar mel nharat', '05/02/2020', '2020-01-27'),
('30/2020/1456', 4, 'nhar mel nharat', '03/02/2020', '2020-01-27'),
('30/2020/1456', 3, 'nhar mel nharat', '31/01/2020', '2020-01-27'),
('30/2020/1456', 2, 'nhar mel nharat', '29/01/2020', '2020-01-27'),
('30/2020/1456', 1, 'nhar mel nharat', '27/01/2020', '2020-01-27'),
('30/2020/1402', 15, 'nhar mel nharat', '26/02/2020', '2020-01-24'),
('30/2020/1402', 14, 'nhar mel nharat', '24/02/2020', '2020-01-24'),
('30/2020/1402', 13, 'nhar mel nharat', '21/02/2020', '2020-01-24'),
('30/2020/1402', 12, 'nhar mel nharat', '19/02/2020', '2020-01-24'),
('30/2020/1402', 11, 'nhar mel nharat', '17/02/2020', '2020-01-24'),
('30/2020/1402', 10, 'nhar mel nharat', '14/02/2020', '2020-01-24'),
('30/2020/1402', 9, 'nhar mel nharat', '12/02/2020', '2020-01-24'),
('30/2020/1402', 8, 'nhar mel nharat', '10/02/2020', '2020-01-24'),
('30/2020/1402', 7, 'nhar mel nharat', '07/02/2020', '2020-01-24'),
('30/2020/1402', 6, 'nhar mel nharat', '05/02/2020', '2020-01-24'),
('30/2020/1402', 5, 'nhar mel nharat', '03/02/2020', '2020-01-24'),
('30/2020/1402', 4, 'nhar mel nharat', '31/01/2020', '2020-01-24'),
('30/2020/1402', 3, 'nhar mel nharat', '29/01/2020', '2020-01-24'),
('30/2020/1402', 2, 'nhar mel nharat', '27/01/2020', '2020-01-24'),
('30/2020/1402', 1, 'nhar mel nharat', '24/01/2020', '2020-01-24'),
('30/2020/1313', 12, 'nhar mel nharat', '18/02/2020', '2020-01-23'),
('30/2020/1313', 11, 'nhar mel nharat', '15/02/2020', '2020-01-23'),
('30/2020/1313', 10, 'nhar mel nharat', '13/02/2020', '2020-01-23'),
('30/2020/1313', 9, 'nhar mel nharat', '11/02/2020', '2020-01-23'),
('30/2020/1313', 8, 'nhar mel nharat', '08/02/2020', '2020-01-23'),
('30/2020/1313', 7, 'nhar mel nharat', '06/02/2020', '2020-01-23'),
('30/2020/1313', 6, 'nhar mel nharat', '04/02/2020', '2020-01-23'),
('30/2020/1313', 5, 'nhar mel nharat', '01/02/2020', '2020-01-23'),
('30/2020/1313', 4, 'nhar mel nharat', '30/01/2020', '2020-01-23'),
('30/2020/1313', 3, 'nhar mel nharat', '28/01/2020', '2020-01-23'),
('30/2020/1313', 2, 'nhar mel nharat', '25/01/2020', '2020-01-23'),
('30/2020/1313', 1, 'nhar mel nharat', '23/01/2020', '2020-01-23'),
('30/2020/1025', 12, 'nhar mel nharat', '14/02/2020', '2020-01-20'),
('30/2020/1025', 11, 'nhar mel nharat', '12/02/2020', '2020-01-20'),
('30/2020/1025', 10, 'nhar mel nharat', '10/02/2020', '2020-01-20'),
('30/2020/1025', 7, 'nhar mel nharat', '03/02/2020', '2020-01-20'),
('30/2020/1025', 8, 'nhar mel nharat', '05/02/2020', '2020-01-20'),
('30/2020/1025', 9, 'nhar mel nharat', '07/02/2020', '2020-01-20'),
('30/2020/1025', 6, 'nhar mel nharat', '31/01/2020', '2020-01-20'),
('30/2020/1025', 4, 'nhar mel nharat', '27/01/2020', '2020-01-20'),
('30/2020/1025', 5, 'nhar mel nharat', '29/01/2020', '2020-01-20'),
('30/2020/1025', 3, 'nhar mel nharat', '24/01/2020', '2020-01-20'),
('30/2020/1025', 1, 'nhar mel nharat', '20/01/2020', '2020-01-20'),
('30/2020/1025', 2, 'nhar mel nharat', '22/01/2020', '2020-01-20');

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
  `date_fin` varchar(20) NOT NULL,
  PRIMARY KEY (`n_assure`,`n_decision`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `decision`
--

INSERT INTO `decision` (`n_assure`, `n_decision`, `nbr_s`, `nb_s_sem`, `dat_deb`, `pu`, `bord`, `date_fin`) VALUES
('40356698/5', '30/2020/1848', 18, 3, '2020-01-30', 11.5, 1, '10/03/2020'),
('16608338/5', '30/2020/1456', 12, 3, '2020-01-27', 11.5, 1, '21/02/2020'),
('57773503/3', '30/2020/1402', 15, 3, '2020-01-24', 11.5, 1, '26/02/2020'),
('12508448/8', '30/2020/1313', 12, 3, '2020-01-23', 11.5, 1, '18/02/2020'),
('11518765/3', '30/2020/1025', 12, 3, '2020-01-20', 11.5, 1, '14/02/2020'),
('11377086/86', '30/2020/2199', 12, 2, '2020-02-05', 11.5, 1, '14/03/2020'),
('376145/0', '30/2020/2359', 18, 3, '2020-02-07', 11.5, 0, '17/04/2020'),
('51238881/8', '30/2020/2669', 12, 3, '2020-02-13', 11.5, 0, '10/03/2020'),
('644899/0', '30/2020/3269', 15, 3, '2020-02-26', 11.5, 0, '29/04/2020'),
('80647416/16', '30/2020/3630', 12, 3, '2020-03-03', 11.5, 0, '30/04/2020');

-- --------------------------------------------------------

--
-- Table structure for table `detail_bord`
--

DROP TABLE IF EXISTS `detail_bord`;
CREATE TABLE IF NOT EXISTS `detail_bord` (
  `n_bord` varchar(100) NOT NULL,
  `n_decision` varchar(100) NOT NULL,
  PRIMARY KEY (`n_bord`,`n_decision`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_bord`
--

INSERT INTO `detail_bord` (`n_bord`, `n_decision`) VALUES
('001/2020', '30/2020/1025'),
('001/2020', '30/2020/1313'),
('001/2020', '30/2020/1402'),
('001/2020', '30/2020/1456'),
('001/2020', '30/2020/1848'),
('001/2020', '30/2020/2199');

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
  `datee` varchar(100) NOT NULL,
  `date_premier` date NOT NULL,
  `date_fin` varchar(100) NOT NULL,
  `pu` float NOT NULL,
  `total_ht` float NOT NULL,
  `tva` float NOT NULL,
  `mnt_tva` float NOT NULL,
  `total_ttc` float NOT NULL,
  `ttc_lettre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `facture`
--

INSERT INTO `facture` (`id`, `annee`, `n_decision`, `n_fac`, `datee`, `date_premier`, `date_fin`, `pu`, `total_ht`, `tva`, `mnt_tva`, `total_ttc`, `ttc_lettre`) VALUES
(94, 2020, '30/2020/3630', '10/2020', '04/06/2020', '2020-03-03', '30/04/2020', 11.5, 128.34, 7, 9.66, 138, 'cent trente-huit '),
(93, 2020, '30/2020/3269', '09/2020', '04/06/2020', '2020-02-26', '29/04/2020', 11.5, 160.425, 7, 12.075, 172.5, 'cent soixante-douze '),
(92, 2020, '30/2020/2669', '08/2020', '04/06/2020', '2020-02-13', '10/03/2020', 11.5, 128.34, 7, 9.66, 138, 'cent trente-huit '),
(91, 2020, '30/2020/2359', '07/2020', '04/06/2020', '2020-02-07', '17/04/2020', 11.5, 192.51, 7, 14.49, 207, 'deux cent sept '),
(89, 2020, '30/2020/1848', '05/2020', '04/06/2020', '2020-01-30', '10/03/2020', 11.5, 192.51, 7, 14.49, 207, 'deux cent sept '),
(90, 2020, '30/2020/2199', '06/2020', '04/06/2020', '2020-02-05', '14/03/2020', 11.5, 128.34, 7, 9.66, 138, 'cent trente-huit '),
(88, 2020, '30/2020/1456', '04/2020', '04/06/2020', '2020-01-27', '21/02/2020', 11.5, 128.34, 7, 9.66, 138, 'cent trente-huit '),
(85, 2020, '30/2020/1025', '01/2020', '04/06/2020', '2020-01-20', '14/02/2020', 11.5, 128.34, 7, 9.66, 138, 'cent trente-huit '),
(86, 2020, '30/2020/1313', '02/2020', '04/06/2020', '2020-01-23', '18/02/2020', 11.5, 128.34, 7, 9.66, 138, 'cent trente-huit '),
(87, 2020, '30/2020/1402', '03/2020', '04/06/2020', '2020-01-24', '26/02/2020', 11.5, 160.425, 7, 12.075, 172.5, 'cent soixante-douze ');

-- --------------------------------------------------------

--
-- Table structure for table `jour_non_aut`
--

DROP TABLE IF EXISTS `jour_non_aut`;
CREATE TABLE IF NOT EXISTS `jour_non_aut` (
  `jour` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jour_non_aut`
--

INSERT INTO `jour_non_aut` (`jour`) VALUES
('2020-04-14'),
('2020-04-13'),
('2020-04-12'),
('2020-04-11'),
('2020-04-10'),
('2020-04-09'),
('2020-04-08'),
('2020-04-07'),
('2020-04-06'),
('2020-04-05'),
('2020-04-04'),
('2020-04-03'),
('2020-04-02'),
('2020-04-01'),
('2020-03-31'),
('2020-03-30'),
('2020-03-29'),
('2020-03-28'),
('2020-03-27'),
('2020-03-26'),
('2020-03-25'),
('2020-03-24'),
('2020-03-23'),
('2020-03-22'),
('2020-03-21'),
('2020-03-20'),
('2020-03-19'),
('2020-03-18'),
('2020-03-17'),
('2020-03-16'),
('2020-03-15'),
('2020-03-14'),
('2020-01-01'),
('2020-01-14'),
('2020-03-20'),
('2020-04-09'),
('2020-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `kine`
--

DROP TABLE IF EXISTS `kine`;
CREATE TABLE IF NOT EXISTS `kine` (
  `code` varchar(20) NOT NULL,
  `cin` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kine`
--

INSERT INTO `kine` (`code`, `cin`, `email`, `nom`, `prenom`, `uname`, `pwd`, `profeesion`, `centre_ref`, `mobile`, `adresse`, `code_prest`, `mat_fisc`, `banque`, `RIB`) VALUES
('1/27348/91', 9832741, 'derouiche_mouna@live.fr', 'Derouiche', 'Mouna', 'derouiche.mouna', '123456', 'Kinesitherapeute', 'Hammamet', 25456832, 'Avenue de la République Immeuble Les Arcades -2éme étage B4-, Hammamet, 8050.', '75', '1597611/S', 'banque el 5ir', '08909010032001730537');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`n_assure`, `cin_kine`, `nom`, `prenom`, `qualite`, `nom_ass`, `pre_ass`, `diagnostique`, `tel`) VALUES
('80647416/16', '9832741', 'GABSI EP DAOUD', 'OUEJDENE', 'Assure lui meme', 'GABSI EP DAOUD', 'OUEJDENE', '', ''),
('45121026/1', '9832741', 'BARGAOUI', 'GHALIA', 'Enfant', 'BARGAOUI', 'RIADH', '', ''),
('644899/0', '9832741', 'SAADI', 'NAJIBA', 'Conjoint', 'KHEDIRI', 'MOHAMED', '', ''),
('51238881/8', '9832741', 'DAREJ', 'NAJAH', 'Conjoint', 'BASSOUMI', 'SABEUR', '', ''),
('376145/0', '9832741', 'ZAGHOUANI', 'MOHAMED', 'Assure lui meme', 'ZAGHOUANI', 'MOHAMED', '', ''),
('11377086/86', '9832741', 'BOUDHINA', 'JAMILA VEUVE HELOUI', 'Conjoint', 'BOUDHINA', 'JAMILA VEUVE HELOUI', '', ''),
('40356698/5', '9832741', 'TORKI', 'JAMILA', 'Conjoint', 'TURKI', 'MOHAMED', '', ''),
('57773503/3', '9832741', 'SARRAI', 'NAZIHA', 'Conjoint', 'SARRAI', 'NAZIHA', '', ''),
('16608338/5', '9832741', 'GUIZANI', 'ASMA', 'Assure lui meme', 'GUIZANI', 'ASMA', '', ''),
('12508448/8', '9832741', 'B MOHAMED', 'FATEN', 'Conjoint', 'BEN MEFTEH', 'IMED', '', ''),
('11518765/3', '9832741', 'GUEDICHE', 'INTISSAR', 'Assure lui meme', 'GUEDICHE', 'INTISSAR', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
