-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2016 at 08:03 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `revista`
--
DROP DATABASE `revista`;
CREATE DATABASE IF NOT EXISTS `revista` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `revista`;

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

DROP TABLE IF EXISTS `markers`;
CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(20,6) NOT NULL,
  `lng` float(20,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, 'Pan Africa Market', '1521 1st Ave, Seattle, WA', 47.608940, -122.340141, 'restaurant'),
(2, 'Buddha Thai & Bar', '2222 2nd Ave, Seatt+-------le, WA', 47.613590, -122.344391, 'bar'),
(3, 'The Melting Pot', '14 Mercer St, Seattle, WA', 47.624561, -122.356445, 'restaurant'),
(4, 'Ipanema Grill', '1225 1st Ave, Seattle, WA', 47.606365, -122.337654, 'restaurant'),
(5, 'Sake House', '2230 1st Ave, Seattle, WA', 47.612823, -122.345673, 'bar'),
(6, 'Crab Pot', '1301 Alaskan Way, Seattle, WA', 47.605961, -122.340363, 'restaurant'),
(7, 'Mama''s Mexican Kitchen', '2234 2nd Ave, Seattle, WA', 47.613976, -122.345467, 'bar'),
(8, 'Wingdome', '1416 E Olive Way, Seattle, WA', 47.617214, -122.326584, 'bar'),
(9, 'Piroshky Piroshky', '1908 Pike pl, Seattle, WA', 47.610126, -122.342834, 'restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `medicos`
--

DROP TABLE IF EXISTS `medicos`;
CREATE TABLE IF NOT EXISTS `medicos` (
  `id_medico` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `telefono` int(10) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `lat` float(20,10) DEFAULT NULL,
  `lng` float(20,10) DEFAULT NULL,
  `imagen` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id_medico`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicos`
--

Gral. Emiliano Zapata 24, Col del Pacífico, 28879 Manzanill

INSERT INTO `medicos` (`id_medico`, `nombre`, `apellido`, `correo`, `telefono`, `direccion`, `lat`, `lng`, `imagen`) VALUES
(7, 'Figo', 'Gonzalez', 'figo@rev.com', 321241323, '', 19.083418, -104.306290, NULL),
(8, '123123', '12313', '123', 123123, '', 0.000000, 0.000000, NULL),
(9, '', '', '', 0, '', 0.000000, 0.000000, NULL),
(10, '', '', '', 0, '', 19.069017, -104.262611, NULL),
(11, 'fsafsadf', 'fasfasd', 'dfasfa', 123123, '12313', 19.085417, -104.293510, NULL),
(13, '123131', '1231', '123123', 1231313, '123213', 19.089304, -104.291969, NULL),
(14, '14', '14', '14', 14, '4', 19.114117, -104.331879, NULL),
(15, '15', '15', '15', 15, '14', 19.088053, -104.297455, '/images/medicos/default.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
