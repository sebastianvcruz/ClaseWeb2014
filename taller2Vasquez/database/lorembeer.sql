-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2014 at 04:35 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lorembeer`
--

-- --------------------------------------------------------

--
-- Table structure for table `carrito`
--

CREATE TABLE IF NOT EXISTS `carrito` (
  `idProducto` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `comprar`
--

CREATE TABLE IF NOT EXISTS `comprar` (
  `idUsuario` int(255) NOT NULL,
  `idProducto` int(255) NOT NULL,
  `fecha` date NOT NULL,
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `comprar`
--

INSERT INTO `comprar` (`idUsuario`, `idProducto`, `fecha`) VALUES
(3, 3, '2014-10-16'),
(3, 1, '2014-10-16'),
(3, 1, '2014-10-16'),
(3, 1, '2014-10-16'),
(3, 3, '2014-10-16'),
(3, 3, '2014-10-16'),
(3, 2, '2014-10-16'),
(3, 2, '2014-10-16'),
(3, 2, '2014-10-16'),
(3, 2, '2014-10-16'),
(3, 2, '2014-10-16'),
(3, 2, '2014-10-16'),
(3, 2, '2014-10-16'),
(3, 2, '2014-10-16'),
(1, 3, '2014-10-16'),
(1, 3, '2014-10-16'),
(1, 3, '2014-10-16'),
(3, 2, '2014-10-16'),
(3, 3, '2014-10-16'),
(3, 4, '2014-10-16'),
(3, 5, '2014-10-16'),
(1, 1, '2014-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_bin NOT NULL,
  `precio` text COLLATE utf8_bin NOT NULL,
  `imagen` text COLLATE utf8_bin NOT NULL,
  `descripcion` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `imagen`, `descripcion`) VALUES
(1, 'Golden Beer (traditional)', '10.00', 'assets/images/product1.png', 'My money''s in that office, right? If she start giving me some bullshit about it ain''t there, and we got to go someplace else and get it'),
(2, 'Golden Brown Beer (traditional)', '15.00', 'assets/images/product2.png', 'Now that there is the Tec-9, a crappy spray gun from South Miami. This gun is advertised as the most popular gun in American crime. Do you believe that shit?'),
(3, 'Dark (Special)', '17.00', 'assets/images/product3.png', 'Normally, both your asses would be dead as fucking fried chicken, but you happen to pull this shit while I''m in a transitional period so I don''t wanna kill you, I wanna help you'),
(4, 'Golden BeerA (traditional)', '11.00', 'assets/images/product1.png', 'My money''s in that office, right? If she start me some bullshit about it ain''t there, and we got to go someplace else and get it'),
(5, 'DarkA (Special)', '20.00', 'assets/images/product3.png', 'Normally, both your asses would be dead as fucking fried chicken, but you happen to pull this shit while I''m in a transitional period ');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin NOT NULL,
  `imagen` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `imagen`) VALUES
(1, 'thimael', 'thimael', 'assets/imageUsers/2.jpg'),
(2, 'sebastian', 'sebastian', 'assets/imageUsers/1.jpg'),
(3, 'kammil', 'kammil', 'assets/imageUsers/3.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
