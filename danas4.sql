-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 04, 2019 at 07:49 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `danas4`
--

-- --------------------------------------------------------

--
-- Table structure for table `administratori`
--

DROP TABLE IF EXISTS `administratori`;
CREATE TABLE IF NOT EXISTS `administratori` (
  `idadmin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ime` varchar(20) NOT NULL,
  `prezime` varchar(20) NOT NULL,
  `sifra` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`idadmin`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administratori`
--

INSERT INTO `administratori` (`idadmin`, `ime`, `prezime`, `sifra`, `email`) VALUES
(1, 'Ejub', 'Kajan', 'webprogramiranje', 'ejubkajan@npac.rs');

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

DROP TABLE IF EXISTS `anketa`;
CREATE TABLE IF NOT EXISTS `anketa` (
  `idankete` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_ankete` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idankete`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`idankete`, `naziv_ankete`) VALUES
(1, 'pametni transport'),
(2, 'pametno zdravlje'),
(3, 'ocuvanje zivotne sredine');

-- --------------------------------------------------------

--
-- Table structure for table `nagrada`
--

DROP TABLE IF EXISTS `nagrada`;
CREATE TABLE IF NOT EXISTS `nagrada` (
  `idnagrada` int(11) NOT NULL AUTO_INCREMENT,
  `redni_br_nagrade` int(11) NOT NULL,
  `naziv_nagrade` varchar(150) NOT NULL,
  `idankete` int(11) DEFAULT NULL,
  `iducesnici` int(11) DEFAULT NULL,
  `kod_za_nagradu` char(32) DEFAULT NULL,
  `potvrda_koda` int(11) DEFAULT NULL,
  PRIMARY KEY (`idnagrada`),
  KEY `iducesnici` (`iducesnici`),
  KEY `idankete` (`idankete`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nagrada`
--

INSERT INTO `nagrada` (`idnagrada`, `redni_br_nagrade`, `naziv_nagrade`, `idankete`, `iducesnici`, `kod_za_nagradu`, `potvrda_koda`) VALUES
(1, 1, 'besplatno jednodnednevno parkiranje u gradu', 1, NULL, NULL, NULL),
(2, 1, 'besplatan EKG', 2, NULL, NULL, NULL),
(3, 1, 'besplatan jednodnevni ulaz na bazen', 3, NULL, NULL, NULL),
(4, 2, 'jednodnevna putarina na pristupnom\r\nautoputu', 1, NULL, NULL, NULL),
(5, 2, 'besplatni merač krvnog pritiska', 2, NULL, NULL, NULL),
(6, 2, 'besplatan izlet na obližnje izletište', 3, NULL, NULL, NULL),
(7, 3, 'besplatan eho abdomena', 2, 9, '676fd1e3873600dcfbaa3eeeac39cb15', 1),
(8, 3, 'besplatan jedodnedni ulaz u zoološki vrt', 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `odgovor_jeddan`
--

DROP TABLE IF EXISTS `odgovor_jeddan`;
CREATE TABLE IF NOT EXISTS `odgovor_jeddan` (
  `idodgovora` int(11) NOT NULL AUTO_INCREMENT,
  `odgovor_glasi` varchar(45) DEFAULT NULL,
  `pitanja_idpitanja` int(11) NOT NULL,
  PRIMARY KEY (`idodgovora`,`pitanja_idpitanja`),
  KEY `fk_odgovor_jeddan_pitanja_idx` (`pitanja_idpitanja`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `odgovor_jeddan`
--

INSERT INTO `odgovor_jeddan` (`idodgovora`, `odgovor_glasi`, `pitanja_idpitanja`) VALUES
(3, 'kopneni', 1),
(4, 'recni', 1),
(5, 'vazdusni', 1),
(8, 'automobil', 2),
(9, 'bicikl', 2),
(10, 'javni prevoz', 2),
(11, 'brod', 2),
(12, 'gliser', 2),
(13, 'avion', 2),
(16, 'cena', 4),
(17, 'brzina', 4),
(18, 'cena i brzina', 4),
(19, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pitanja`
--

DROP TABLE IF EXISTS `pitanja`;
CREATE TABLE IF NOT EXISTS `pitanja` (
  `idpitanja` int(11) NOT NULL AUTO_INCREMENT,
  `pitanje_glasi` varchar(100) DEFAULT NULL,
  `anketa_idankete` int(11) NOT NULL,
  PRIMARY KEY (`idpitanja`,`anketa_idankete`),
  KEY `fk_pitanja_anketa1_idx` (`anketa_idankete`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pitanja`
--

INSERT INTO `pitanja` (`idpitanja`, `pitanje_glasi`, `anketa_idankete`) VALUES
(1, 'Koju vrstu saobracaja koristite?', 1),
(2, 'Koja prevozna sredstva sve koristite?', 1),
(3, 'Koju aplikaciju koristite za informisanje o transportu?', 1),
(4, 'Sta vam je prilikom trasporta najvaznije?', 1),
(5, 'Sta predlazete kako bi se poboljsao transport?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ucesnici`
--

DROP TABLE IF EXISTS `ucesnici`;
CREATE TABLE IF NOT EXISTS `ucesnici` (
  `iducesnici` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ime` varchar(45) DEFAULT NULL,
  `prezime` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `sifra` varchar(45) DEFAULT NULL,
  `pol` varchar(6) DEFAULT NULL,
  `vreme_registracije` timestamp NULL DEFAULT NULL,
  `datum_rodjenja` date DEFAULT NULL,
  `broj_poena` int(1) DEFAULT NULL,
  PRIMARY KEY (`iducesnici`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ucesnici`
--

INSERT INTO `ucesnici` (`iducesnici`, `ime`, `prezime`, `email`, `sifra`, `pol`, `vreme_registracije`, `datum_rodjenja`, `broj_poena`) VALUES
(2, 'Medved', 'Medo', 'sme@gmail.com', 'suma', 'muski', '2018-12-26 11:47:46', '2000-01-06', 3),
(3, 'Sargarepa', 'Cvekla', 'tropskovoce@gmail.com', 'kajsija', 'drugo', '2019-01-02 17:09:04', '1990-08-07', NULL),
(4, 'Mala', 'Masa', 'masamedved@gmail.com', 'suma', 'drugo', '2019-01-11 23:25:43', '1948-01-12', 3),
(8, 'Slon', 'Trupko', 'lino_choco@hotmail.com', 'dzungla', 'muski', '2019-01-13 17:14:47', '1940-01-01', 2),
(9, 'Em', 'Ge', 'emgegic@gmail.com', 'programiranje', 'muski', '2019-01-14 20:57:13', '1940-01-01', 1),
(10, 'Lezi', 'Lebovic', 'lezilebovic@hotmail.com', 'lezi', 'zenski', '2019-01-26 15:58:19', '1940-01-01', 1),
(11, 'Buba', 'Mara', 'bubamara@gmail.com', 'buba', 'drugo', '2019-01-26 15:59:36', '1940-01-01', 1),
(12, 'Rale', 'Galamdzija', 'ralegalamdzija@gmail.com', 'galamdzija', 'muski', '2019-01-26 16:26:23', '1940-01-01', 1),
(13, 'Patrolne', 'Sape', 'patrolnesape@live.com', 'sape', 'drugo', '2019-01-26 16:28:25', '1955-01-01', 1),
(14, 'Emcan', 'Gegan', 'gegee_e@hotmail.com', 'mojprojekat', 'muski', '2019-02-01 21:10:34', '1989-08-22', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ucesnici_has_anketa`
--

DROP TABLE IF EXISTS `ucesnici_has_anketa`;
CREATE TABLE IF NOT EXISTS `ucesnici_has_anketa` (
  `ucesnici_iducesnici` int(10) UNSIGNED NOT NULL,
  `anketa_idankete` int(11) NOT NULL,
  PRIMARY KEY (`ucesnici_iducesnici`,`anketa_idankete`),
  KEY `fk_ucesnici_has_anketa_anketa1_idx` (`anketa_idankete`),
  KEY `fk_ucesnici_has_anketa_ucesnici1_idx` (`ucesnici_iducesnici`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ucesnici_has_odgovor_jeddan`
--

DROP TABLE IF EXISTS `ucesnici_has_odgovor_jeddan`;
CREATE TABLE IF NOT EXISTS `ucesnici_has_odgovor_jeddan` (
  `idankete` int(11) NOT NULL,
  `ucesnici_iducesnici` int(10) UNSIGNED NOT NULL,
  `odgovor_jeddan_idodgovora` int(11) NOT NULL,
  `odgovor_jeddan_pitanja_idpitanja` int(11) NOT NULL,
  `vreme_upisa` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ucesnici_iducesnici`,`odgovor_jeddan_idodgovora`,`odgovor_jeddan_pitanja_idpitanja`),
  KEY `fk_ucesnici_has_odgovor_jeddan_odgovor_jeddan1_idx` (`odgovor_jeddan_idodgovora`,`odgovor_jeddan_pitanja_idpitanja`),
  KEY `fk_ucesnici_has_odgovor_jeddan_ucesnici1_idx` (`ucesnici_iducesnici`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ucesnici_has_odgovor_jeddan`
--

INSERT INTO `ucesnici_has_odgovor_jeddan` (`idankete`, `ucesnici_iducesnici`, `odgovor_jeddan_idodgovora`, `odgovor_jeddan_pitanja_idpitanja`, `vreme_upisa`) VALUES
(1, 2, 5, 1, '2019-01-08 22:42:24'),
(1, 2, 10, 2, '2019-01-08 22:42:30'),
(1, 2, 13, 2, '2019-01-08 22:42:30'),
(1, 2, 18, 4, '2019-01-08 22:42:33'),
(1, 3, 4, 1, '2019-01-11 23:46:14'),
(1, 3, 11, 2, '2019-01-11 23:46:17'),
(1, 3, 16, 4, '2019-01-11 23:46:20'),
(1, 4, 5, 1, '2019-01-11 23:27:19'),
(1, 4, 10, 2, '2019-01-11 23:27:26'),
(1, 4, 13, 2, '2019-01-11 23:27:26'),
(1, 4, 18, 4, '2019-01-11 23:27:30'),
(1, 9, 5, 1, '2019-01-19 15:12:49'),
(1, 9, 12, 2, '2019-01-19 15:12:51'),
(1, 9, 16, 4, '2019-01-19 15:12:52'),
(1, 10, 5, 1, '2019-01-26 15:58:38'),
(1, 10, 12, 2, '2019-01-26 15:58:41'),
(1, 10, 16, 4, '2019-01-26 15:58:43'),
(1, 11, 3, 1, '2019-01-26 16:23:05'),
(1, 11, 11, 2, '2019-01-26 16:23:09'),
(1, 11, 12, 2, '2019-01-26 16:23:09'),
(1, 11, 13, 2, '2019-01-26 16:23:09'),
(1, 11, 16, 4, '2019-01-26 16:23:10'),
(1, 12, 5, 1, '2019-01-26 16:27:02'),
(1, 12, 10, 2, '2019-01-26 16:27:05'),
(1, 12, 11, 2, '2019-01-26 16:27:05'),
(1, 12, 16, 4, '2019-01-26 16:27:07'),
(1, 13, 3, 1, '2019-01-26 16:28:57'),
(1, 13, 11, 2, '2019-01-26 16:29:00'),
(1, 13, 17, 4, '2019-01-26 16:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `ucesnici_pitanja_text_odgovori`
--

DROP TABLE IF EXISTS `ucesnici_pitanja_text_odgovori`;
CREATE TABLE IF NOT EXISTS `ucesnici_pitanja_text_odgovori` (
  `idankete` int(11) NOT NULL,
  `iducesnici` int(11) NOT NULL,
  `idpitanja` int(11) NOT NULL,
  `odgovor` varchar(100) NOT NULL,
  `vreme_upisa` timestamp NOT NULL,
  PRIMARY KEY (`odgovor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ucesnici_pitanja_text_odgovori`
--

INSERT INTO `ucesnici_pitanja_text_odgovori` (`idankete`, `iducesnici`, `idpitanja`, `odgovor`, `vreme_upisa`) VALUES
(1, 1, 5, 'trupko slon sam ja neko svako zna', '2019-01-04 12:51:41'),
(1, 2, 5, 'Uvodjenje podsticaja za jeftiniji transport', '2019-01-08 22:43:07'),
(1, 4, 5, 'Platne karte', '2019-01-11 23:27:42'),
(1, 3, 5, 'Koristiti yelene resurse', '2019-01-11 23:46:42'),
(1, 9, 5, 'Koriscenje pametnih aplikacija', '2019-01-19 15:13:20'),
(1, 10, 5, 'lenjost', '2019-01-26 15:58:52'),
(1, 11, 5, 'cvetic', '2019-01-26 16:23:20'),
(1, 12, 5, 'banane', '2019-01-26 16:27:12'),
(1, 13, 5, 'upomoc', '2019-01-26 16:29:10');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `odgovor_jeddan`
--
ALTER TABLE `odgovor_jeddan`
  ADD CONSTRAINT `fk_odgovor_jeddan_pitanja` FOREIGN KEY (`pitanja_idpitanja`) REFERENCES `pitanja` (`idpitanja`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pitanja`
--
ALTER TABLE `pitanja`
  ADD CONSTRAINT `fk_pitanja_anketa1` FOREIGN KEY (`anketa_idankete`) REFERENCES `anketa` (`idankete`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ucesnici_has_anketa`
--
ALTER TABLE `ucesnici_has_anketa`
  ADD CONSTRAINT `fk_ucesnici_has_anketa_anketa1` FOREIGN KEY (`anketa_idankete`) REFERENCES `anketa` (`idankete`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ucesnici_has_anketa_ucesnici1` FOREIGN KEY (`ucesnici_iducesnici`) REFERENCES `ucesnici` (`iducesnici`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ucesnici_has_odgovor_jeddan`
--
ALTER TABLE `ucesnici_has_odgovor_jeddan`
  ADD CONSTRAINT `fk_ucesnici_has_odgovor_jeddan_odgovor_jeddan1` FOREIGN KEY (`odgovor_jeddan_idodgovora`,`odgovor_jeddan_pitanja_idpitanja`) REFERENCES `odgovor_jeddan` (`idodgovora`, `pitanja_idpitanja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ucesnici_has_odgovor_jeddan_ucesnici1` FOREIGN KEY (`ucesnici_iducesnici`) REFERENCES `ucesnici` (`iducesnici`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
