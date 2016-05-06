--
-- Database: `revista`
--
CREATE DATABASE IF NOT EXISTS `revista` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `revista`;

-- --------------------------------------------------------

--
-- Table structure for table `medicos`
--

CREATE TABLE `medicos` (
  `id_medico` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `telefono` int(10) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  `imagen` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicos`
--

INSERT INTO `medicos` (`id_medico`, `nombre`, `apellido`, `correo`, `telefono`, `direccion`, `lat`, `lng`, `imagen`) VALUES
(7, 'Figo', 'Gonzalez', 'figo@rev.com', 321241323, '', 19.083418, -104.306290, NULL),
(8, '123123', '12313', '123', 123123, '', 0.000000, 0.000000, NULL),
(9, '', '', '', 0, '', 0.000000, 0.000000, NULL),
(10, '', '', '', 0, '', 19.069017, -104.262611, NULL),
(11, 'fsafsadf', 'fasfasd', 'dfasfa', 123123, '12313', 19.085417, -104.293510, NULL),
(13, '123131', '1231', '123123', 1231313, '123213', 19.089304, -104.291969, NULL),
(14, '14', '14', '14', 14, '4', 19.114117, -104.331879, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id_medico`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id_medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
