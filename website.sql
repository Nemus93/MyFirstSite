-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 28, 2017 at 06:04 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `kolaci`
--

DROP TABLE IF EXISTS `kolaci`;
CREATE TABLE IF NOT EXISTS `kolaci` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kolaci`
--

INSERT INTO `kolaci` (`id`, `type`, `name`, `price`, `text`, `img`) VALUES
(1, 'cookie', 'Mafini', 3000, 'Mafini su, kao tipicna americka poslastica, sve popularniji kod nas. Jedu se u svim prilikama - kao lagani obrok ili uzina, grickaju se u hodu ili se opusteno degustiraju u omiljenom kaficu. Kada jednom nabavite modlice za mafine, njihove sastojke mozete kombinovati do mile volje. Osnovnom testu mozete dodavati: cokoladu, voce, lesnike, bademe, orahe, kikiriki, a od zacina vanillu, cimet, karanfilic i ostale.', 'mafini.jpg'),
(2, 'cookie', 'Cajno pecivo', 1400, 'Ako su mafini usli u modu od pre par godina, za cajna peciva mozemo reci da nikada nisu ni izasla. Laki za pripremu, a hrskavi pod zubima, najbolje idu uz caj ili kafu, a jos bolje uz razgovor sa komsinicom ili najboljom drugaricom.', 'cajno_pecivo.jpg'),
(3, 'cookie', 'Americke krofne', 1500, 'Americke krofnice su izuzetno popularna poslastica. Ono sto americke krofnice razlikuje od običnih su pre svega oblik, velicina i nacin sluzenja, premda postoje brojne razlike i u tome u različitim delovima Amerike i Kanade.\r\nOne se pripremaju u vrelom ulju.\r\n', 'americke_krofne.jpg'),
(4, 'cake', 'Kikiriki torta', 2400, 'Ova torta je zbog jednog sastojka postala obavezan slatkis svake slave\r\nKikiriki torta je savrsen kolac jer je vole i oni koji poste i oni koji mrse, a lako se pravi u obe varijante. Ukoliko ste ubedjeni da bas nista ne moze zameniti sitne kolace, onda lepo uzmite pa je isecite na manje kockice a mi vam obecavamo da ce je obozavati svi gosti.', 'kikiriki_torta.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `l_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` char(1) COLLATE utf8_unicode_ci DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `f_name`, `l_name`, `email`, `status`) VALUES
(1, 'nemus', 'nemus', 'Nemanja', 'Obrenov', 'nemus.93@hotmail.com', '1'),
(2, 'maja', 'maja', 'Maja', 'Subotic', 'majasubotic@gmail.com', '0'),
(3, 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com', '1'),
(10, 'bane', 'bane', 'Bane', 'Obrenov', 'bane@gmail.com', '0'),
(11, 'maja', 'maja', 'Maja', 'Subotic', 'maja@gmail.com', '0'),
(12, 'srki', 'srki', 'Srdjan', 'Kovacevic', 'srki@gmail.com', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
