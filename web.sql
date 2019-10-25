-- MySQL dump 10.13  Distrib 5.5.21, for Win64 (x86)
--
-- Host: localhost    Database: web
-- ------------------------------------------------------
-- Server version	5.5.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id_categoria` int(10) unsigned NOT NULL,
  `nombre` varchar(16) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `envios`
--

DROP TABLE IF EXISTS `envios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `envios` (
  `id_postal` int(10) unsigned NOT NULL,
  `destinatario` varchar(32) NOT NULL,
  `remitente` varchar(32) NOT NULL,
  `dedicatoria` varchar(256) DEFAULT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`destinatario`,`remitente`,`fecha_hora`),
  KEY `id_postal` (`id_postal`),
  KEY `remitente` (`remitente`),
  CONSTRAINT `envios_ibfk_1` FOREIGN KEY (`id_postal`) REFERENCES `postales` (`id_postal`),
  CONSTRAINT `envios_ibfk_2` FOREIGN KEY (`destinatario`) REFERENCES `usuarios` (`correo`),
  CONSTRAINT `envios_ibfk_3` FOREIGN KEY (`remitente`) REFERENCES `usuarios` (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `envios`
--

LOCK TABLES `envios` WRITE;
/*!40000 ALTER TABLE `envios` DISABLE KEYS */;
/*!40000 ALTER TABLE `envios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postales`
--

DROP TABLE IF EXISTS `postales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postales` (
  `id_postal` int(10) unsigned NOT NULL,
  `id_categoria` int(10) unsigned NOT NULL,
  `img` varchar(32) NOT NULL,
  PRIMARY KEY (`id_postal`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `postales_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postales`
--

LOCK TABLES `postales` WRITE;
/*!40000 ALTER TABLE `postales` DISABLE KEYS */;
/*!40000 ALTER TABLE `postales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `nombre` varchar(32) NOT NULL,
  `primer_apellido` varchar(32) NOT NULL,
  `segundo_apellido` varchar(32) DEFAULT NULL,
  `correo` varchar(64) NOT NULL,
  `fecha_nac` date NOT NULL,
  `genero` tinyint(1) NOT NULL,
  `contrasena` varchar(32) NOT NULL,
  PRIMARY KEY (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('Angel','Ramirez','Ponce','angelito_mix@gmail.com','1999-12-12',1,'d8578edf8458ce06fbc5bb76a58c5ca4'),('Carolina','Garcia','Gutierrez','carogg@hotmail.com','1999-03-25',0,'d8578edf8458ce06fbc5bb76a58c5ca4'),('Daniela','Lozano','Campos','dany85@hotmail.com','1985-06-20',0,'d8578edf8458ce06fbc5bb76a58c5ca4'),('David','Sierra','Soto','davis_solmayor@hotmail.com','1963-01-07',1,'d8578edf8458ce06fbc5bb76a58c5ca4'),('Elsa','Mendez','Cortes','Elsa_Cortes@hotmail.com','1965-01-30',0,'d8578edf8458ce06fbc5bb76a58c5ca4'),('Ines','Serrano','Medina','inesserrano@gmail.com','1978-05-26',0,'d8578edf8458ce06fbc5bb76a58c5ca4'),('Laura','Torres','Santos','laura.torres@hotmail.com','1978-02-14',0,'d8578edf8458ce06fbc5bb76a58c5ca4'),('Manuel','Jimenez','Gimenez','manuel_jimenez@gmail.com','2000-06-30',1,'d8578edf8458ce06fbc5bb76a58c5ca4'),('Montiel','Navarro','Cabrera','monti_navmx@gmail.com','1985-09-23',1,'d8578edf8458ce06fbc5bb76a58c5ca4'),('Erick','Marquez','Garcia','NoobMaster69@gmail.com','2000-10-15',1,'d8578edf8458ce06fbc5bb76a58c5ca4'),('Alonso','Campos',NULL,'oso_carinoso64@gmail.com','1973-08-18',1,'d8578edf8458ce06fbc5bb76a58c5ca4');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-25 12:52:40
