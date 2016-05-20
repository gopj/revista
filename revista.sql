-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2016 at 03:30 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `revista`
--
CREATE DATABASE IF NOT EXISTS `revista` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `revista`;

-- --------------------------------------------------------

--
-- Table structure for table `lugares`
--

DROP TABLE IF EXISTS `lugares`;
CREATE TABLE IF NOT EXISTS `lugares` (
  `id_lugar` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `telefono` int(10) NOT NULL,
  `direccion` text NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  PRIMARY KEY (`id_lugar`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lugares`
--

INSERT INTO `lugares` (`id_lugar`, `nombre`, `telefono`, `direccion`, `lat`, `lng`) VALUES
(1, 'Lugar 1', 1, 'Av ElÃ­as Zamora 18, Valle de Las Garzas, I, 28219 Manzanillo, Col., Mexico', 19.088053, -104.297455),
(2, 'Lugar 2', 2, 'Congreso de Chilpancingo 16, Col del PacÃ­fico, 28879 Manzanillo, Col., Mexico', 19.083469, -104.306381);

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
  `imagen` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id_medico`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicos`
--

INSERT INTO `medicos` (`id_medico`, `nombre`, `apellido`, `correo`, `telefono`, `imagen`) VALUES
(2, 'Figo', 'Gonzalez', 'figo@rev.com', 2147483647, '/images/medicos/default.png');

-- --------------------------------------------------------

--
-- Table structure for table `medicos_lugares`
--

DROP TABLE IF EXISTS `medicos_lugares`;
CREATE TABLE IF NOT EXISTS `medicos_lugares` (
  `id_medico_lugar` int(11) NOT NULL AUTO_INCREMENT,
  `id_medico` int(11) NOT NULL,
  `id_lugar` int(11) NOT NULL,
  PRIMARY KEY (`id_medico_lugar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
