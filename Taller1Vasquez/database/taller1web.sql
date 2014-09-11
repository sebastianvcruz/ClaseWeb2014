-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2014 at 11:50 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `taller1web`
--

-- --------------------------------------------------------

--
-- Table structure for table `listatrabajos`
--

CREATE TABLE IF NOT EXISTS `listatrabajos` (
  `idtrabajo` int(255) NOT NULL AUTO_INCREMENT,
  `idusuario` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idtrabajo`),
  UNIQUE KEY `idtrabajo` (`idtrabajo`),
  FULLTEXT KEY `idusuario` (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Dumping data for table `listatrabajos`
--

INSERT INTO `listatrabajos` (`idtrabajo`, `idusuario`) VALUES
(1, 'sebastianvcruz'),
(2, 'sebastianvcruz'),
(3, 'sebastianvcruz'),
(4, 'sebastianvcruz'),
(5, 'sebastianvcruz'),
(6, 'andresFullHD'),
(7, 'maria88');

-- --------------------------------------------------------

--
-- Table structure for table `trabajos`
--

CREATE TABLE IF NOT EXISTS `trabajos` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_bin NOT NULL,
  `creador` varchar(255) COLLATE utf8_bin NOT NULL,
  `prioridad` int(255) NOT NULL,
  `descripcion` text COLLATE utf8_bin NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafinal` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Dumping data for table `trabajos`
--

INSERT INTO `trabajos` (`id`, `nombre`, `creador`, `prioridad`, `descripcion`, `fechainicio`, `fechafinal`) VALUES
(1, 'Viajar', 'dalisoma', 1, 'lejos', '2014-09-11', '2014-09-12'),
(2, 'Correr', 'dalisoma', 2, 'la mesa', '2014-09-18', '2014-09-19'),
(3, 'Pintar', 'dalisoma', 1, 'cuadro', '2014-09-29', '2014-09-30'),
(4, 'Patinar', 'dalisoma', 1, 'en el parque', '2014-09-23', '2014-09-24'),
(5, 'Dormir', 'dalisoma', 3, 'nunca', '2014-09-04', '2014-09-10'),
(6, 'Dormir', 'sebastianvcruz', 1, 'Nunca', '2014-09-18', '2014-09-19'),
(7, 'Romper', 'sebastianvcruz', 3, 'carton', '2014-09-15', '2014-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(255) COLLATE utf8_bin NOT NULL,
  `nombreUsuario` varchar(255) COLLATE utf8_bin NOT NULL,
  `clave` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `nombreUsuario` (`nombreUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `nombreUsuario`, `clave`) VALUES
(1, 'Sebastian', 'Vasquez', 'sebastianvcruz', 'icesi123'),
(2, 'Juan', 'Ramon', 'pepeRam', 'soygay'),
(3, 'Andres', 'Perez', 'andresFullHD', 'redds'),
(4, 'Andres', 'Perez', 'andresFulldD', 'sd'),
(5, 'Maria', 'Garcia', 'maria88', 'fff'),
(6, 'Maria', 'Clara', 'dalisoma', '1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
