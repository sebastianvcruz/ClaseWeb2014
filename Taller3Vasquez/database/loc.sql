-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2014 at 06:35 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loc`
--

-- --------------------------------------------------------

--
-- Table structure for table `locaciones`
--

CREATE TABLE IF NOT EXISTS `locaciones` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(255) COLLATE utf8_bin NOT NULL,
  `latitud` double NOT NULL,
  `longitud` double NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Dumping data for table `locaciones`
--

INSERT INTO `locaciones` (`id`, `tipo`, `nombre`, `latitud`, `longitud`) VALUES
(1, 'restaurante', 'la vaca rola, seeebero ', 4.692072868347168, -74.10310363769531),
(2, 'parque', 'parque el iguaso', 4.776926569829032, -74.03169039306637),
(3, 'museo', 'Museo del robo', 4.635270173793831, -74.0605295043945),
(4, 'hotel', 'Hotel pulgoso, 5 estrellas', 4.6284261435632175, -74.11134127197262),
(5, 'restaurante', 'otra vaca', 4.753661321190027, -74.08662203369137),
(6, 'restaurante', 'Sopita Feliz', 4.579831631437265, -74.12919405517574),
(7, 'hotel', 'duerma feliz', 4.727658054959997, -74.087995324707);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
