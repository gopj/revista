
--
-- Table structure for table `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;

CREATE TABLE `especialidades` (
  `id_especialidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_especialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `especialidades`
--

LOCK TABLES `especialidades` WRITE;
INSERT INTO `especialidades` VALUES (2,'PediatrÃ­a'),(3,'CirugÃ­a'),(4,'Chuy');
UNLOCK TABLES;

--
-- Table structure for table `lugares`
--

DROP TABLE IF EXISTS `lugares`;
CREATE TABLE `lugares` (
  `id_lugar` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `telefono` int(10) NOT NULL,
  `direccion` text NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  PRIMARY KEY (`id_lugar`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lugares`
--

LOCK TABLES `lugares` WRITE;
INSERT INTO `lugares` VALUES (1,'Lugar 1',1,'Av ElÃ­as Zamora 18, Valle de Las Garzas, I, 28219 Manzanillo, Col., Mexico',19.088053,-104.297455),(2,'Lugar 2',2,'Miguel Hidalgo 54, Col del PacÃ­fico, 28879 Manzanillo, Col., Mexico',19.082760,-104.305702),(3,'Clinica del Gera',2147483647,'Miguel de la Madrid 9, Fovissste, 28878 Manzanillo, Col., Mexico',19.091946,-104.314796);
UNLOCK TABLES;

--
-- Table structure for table `markers`
--

DROP TABLE IF EXISTS `markers`;
CREATE TABLE `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `markers`
--

LOCK TABLES `markers` WRITE;
INSERT INTO `markers` VALUES (1,'Pan Africa Market','1521 1st Ave, Seattle, WA',47.608940,-122.340141,'restaurant'),(2,'Buddha Thai & Bar','2222 2nd Ave, Seattle, WA',47.613590,-122.344391,'bar'),(3,'The Melting Pot','14 Mercer St, Seattle, WA',47.624561,-122.356445,'restaurant'),(4,'Ipanema Grill','1225 1st Ave, Seattle, WA',47.606365,-122.337654,'restaurant'),(5,'Sake House','2230 1st Ave, Seattle, WA',47.612823,-122.345673,'bar'),(6,'Crab Pot','1301 Alaskan Way, Seattle, WA',47.605961,-122.340363,'restaurant'),(7,'Mama\'s Mexican Kitchen','2234 2nd Ave, Seattle, WA',47.613976,-122.345467,'bar'),(8,'Wingdome','1416 E Olive Way, Seattle, WA',47.617214,-122.326584,'bar'),(9,'Piroshky Piroshky','1908 Pike pl, Seattle, WA',47.610126,-122.342834,'restaurant');
UNLOCK TABLES;

--
-- Table structure for table `medico_especialidades`
--

DROP TABLE IF EXISTS `medico_especialidades`;
CREATE TABLE `medico_especialidades` (
  `id_medico_especialidad` int(11) NOT NULL AUTO_INCREMENT,
  `id_medico` varchar(45) DEFAULT NULL,
  `id_especialidad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_medico_especialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medico_especialidades`
--

LOCK TABLES `medico_especialidades` WRITE;
INSERT INTO `medico_especialidades` VALUES (15,'3','2'),(16,'3','3'),(17,'3','4');
UNLOCK TABLES;

--
-- Table structure for table `medico_lugares`
--

DROP TABLE IF EXISTS `medico_lugares`;
CREATE TABLE `medico_lugares` (
  `id_medico_lugar` int(11) NOT NULL AUTO_INCREMENT,
  `id_medico` int(11) NOT NULL,
  `id_lugar` int(11) NOT NULL,
  PRIMARY KEY (`id_medico_lugar`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medico_lugares`
--

LOCK TABLES `medico_lugares` WRITE;
INSERT INTO `medico_lugares` VALUES (43,3,1),(44,3,2);
UNLOCK TABLES;

--
-- Table structure for table `medicos`
--

DROP TABLE IF EXISTS `medicos`;
CREATE TABLE `medicos` (
  `id_medico` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `imagen` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id_medico`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicos`
--

LOCK TABLES `medicos` WRITE;
INSERT INTO `medicos` VALUES (2,'Figo','Gonzalez','figo@rev.com','/images/medicos/default.png'),(3,'3','3','3','/images/medicos/default.png');
UNLOCK TABLES;