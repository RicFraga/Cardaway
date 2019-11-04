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
INSERT INTO `categorias` VALUES (1,'Amor'),(2,'Fechas_fest'),(3,'Paisajes'),(4,'Comida'),(5,'Vintage'),(6,'Otros');
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
  `id_remitente` int(10) unsigned NOT NULL,
  `id_destinatario` int(10) unsigned NOT NULL,
  `dedicatoria` varchar(256) DEFAULT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_postal`,`id_remitente`,`id_destinatario`,`fecha_hora`),
  KEY `id_destinatario` (`id_destinatario`),
  KEY `id_remitente` (`id_remitente`),
  CONSTRAINT `envios_ibfk_1` FOREIGN KEY (`id_postal`) REFERENCES `postales` (`id_postal`),
  CONSTRAINT `envios_ibfk_2` FOREIGN KEY (`id_destinatario`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `envios_ibfk_3` FOREIGN KEY (`id_remitente`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `envios`
--

LOCK TABLES `envios` WRITE;
/*!40000 ALTER TABLE `envios` DISABLE KEYS */;
INSERT INTO `envios` VALUES (2,3,4,'No te lo habia dicho pero me encantas','2019-02-14 16:25:38'),(2,4,9,'Siempre he sido tu admirador secreto','2019-02-14 02:39:25'),(2,6,11,'Te amo Princesa, Feliz 14 de Febrero <3 ','2019-02-14 17:45:27'),(2,10,2,NULL,'2018-10-30 20:52:20'),(3,7,11,NULL,'2019-11-01 21:30:00'),(4,5,1,'Viva MEXICO','2019-09-15 06:28:33'),(5,11,10,NULL,'2019-09-16 09:17:32'),(6,1,4,'Feliz Dia de Muertos Amiga :)','2019-11-01 21:30:00'),(6,7,4,'Y si vamos a pedir calaverita?','2019-11-01 01:21:33'),(6,11,5,'OMG en esta pagina hay postales con extensiones gif','2019-10-20 17:48:45'),(7,11,6,NULL,'2019-10-25 16:22:33'),(9,3,9,'Feliz Navidad amiga , hace mucho que no hablas','2019-12-22 22:55:31'),(9,3,10,'Feliz Navidad y prospero aÃ±o nuevo','2019-12-25 04:18:34'),(9,4,8,'Feliz Navidad te deseo lo mejor','2019-12-24 05:50:30'),(9,9,4,NULL,'2019-12-24 05:59:59'),(10,3,11,'Ahora que ya no soy libre me encantaria poder ver ese paisaje','2019-02-22 03:36:09'),(10,6,10,'Me gustaria vivri en uno de esos , a ti no?','2018-12-28 21:40:00'),(12,3,2,'Vamonos pal laguito','2019-11-01 20:29:10'),(12,4,10,'Bosque , Lago y muchas nenas -niÃ±os del bosque 2k19','2019-03-02 16:17:43'),(12,10,11,'Esta postal me recuerda cuando ivamos al lago','2019-12-02 02:35:20'),(13,6,11,'Ahmonos pa la playita','2019-03-23 02:23:08'),(16,4,11,'Recuerdas cuando soliamos ir en ferry','2019-07-13 01:21:22'),(17,6,4,'SI DIOS TE HA DADO LIMONES , HAZ LIMONADA','2019-01-24 15:48:32'),(18,1,6,'Traete unas piÃ±as para los taquitos','2019-06-20 14:58:56'),(18,3,8,'Esta postal es muy hermosa :3, tenia que compartirla','2019-11-01 21:30:00'),(18,6,9,'Ahi amiga te desapareces,Se como una piÃ±a levantate derecha,Usa crorona y se dulce por dentro','2019-07-05 18:23:33'),(18,10,1,'Uff...,Pero mira como esta esa piÃ±a ','2019-06-29 23:23:49'),(19,9,10,'Disparame un cafe amiga','2019-08-20 19:07:28'),(20,1,2,'Solia vivir en una calle parecida','2019-05-29 17:21:55'),(20,1,4,'Me sentia nostalgico','2019-04-28 23:14:19'),(20,9,2,'Yesterdays Gansos Rosas.jpg','2019-07-01 00:23:59'),(21,4,3,'etoy vendiendo una motoneta parecida por ci te interesa compa','2019-11-01 21:30:00'),(21,4,5,'Camara sacate una a credito para ir a pistear','2019-04-20 17:45:14'),(22,9,11,'Ya comprate unos para ir al centro','2019-06-13 01:43:39'),(22,10,3,'Tu tenias unos no?,Los vendes?','2019-10-13 14:29:16'),(23,2,6,'Para cuando unas partidas','2019-11-01 21:30:00'),(24,3,5,'Que oferton xD','2019-05-21 18:32:15'),(25,2,6,'Una flor para otra flor','2019-09-28 23:17:00'),(25,6,11,'Que hermoso Girasol , es como hipnotico!!!','2019-02-23 03:00:39'),(25,7,3,'Imagen Random para tener una escusa de que hablar','2019-08-21 23:20:19');
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
INSERT INTO `postales` VALUES (1,1,'gato_01.png'),(2,1,'romecabezas_01.jpg'),(3,1,'te_extrano.jpg'),(4,2,'15_sep_01.jpg'),(5,2,'15_sep_02.jpg'),(6,2,'dia_muertos_01.gif'),(7,2,'dia_muertos_02.png'),(8,2,'ets_fest_2019.png'),(9,2,'navidad.jpg'),(10,3,'edificios_01.jpg'),(11,3,'faro_01.jpg'),(12,3,'lago_01.jpg'),(13,3,'playa_01.jpg'),(14,3,'puente_01.jpg'),(15,3,'vias_01.jpg'),(16,3,'vias_02.jpg'),(17,4,'limones_01.jpg'),(18,4,'pina_01.jpg'),(19,4,'starbucks_01.jpg'),(20,5,'calle_old_01.jpg'),(21,5,'motoneta_01.jpg'),(22,5,'patines_01.jpg'),(23,5,'poker_01.jpg'),(24,6,'el_bromas_01.jpg'),(25,6,'girasol_01.jpg');
/*!40000 ALTER TABLE `postales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(10) unsigned NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `primer_apellido` varchar(32) NOT NULL,
  `segundo_apellido` varchar(32) DEFAULT NULL,
  `correo` varchar(64) NOT NULL,
  `fecha_nac` date NOT NULL,
  `genero` tinyint(1) NOT NULL,
  `contrasena` varchar(32) NOT NULL,
  PRIMARY KEY (`correo`),
  UNIQUE KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Angel','Ramirez','Ponce','angelito_mix@gmail.com','1999-12-12',1,'d8578edf8458ce06fbc5bb76a58c5ca4'),(11,'Carolina','Garcia','Gutierrez','carogg@hotmail.com','1999-03-25',0,'d8578edf8458ce06fbc5bb76a58c5ca4'),(8,'Daniela','Lozano','Campos','dany85@hotmail.com','1985-06-20',0,'d8578edf8458ce06fbc5bb76a58c5ca4'),(6,'David','Sierra','Soto','davis_solmayor@hotmail.com','1963-01-07',1,'d8578edf8458ce06fbc5bb76a58c5ca4'),(9,'Elsa','Mendez','Cortes','Elsa_Cortes@hotmail.com','1965-01-30',0,'d8578edf8458ce06fbc5bb76a58c5ca4'),(10,'Ines','Serrano','Medina','inesserrano@gmail.com','1978-05-26',0,'d8578edf8458ce06fbc5bb76a58c5ca4'),(7,'Laura','Torres','Santos','laura.torres@hotmail.com','1978-02-14',0,'d8578edf8458ce06fbc5bb76a58c5ca4'),(2,'Manuel','Jimenez','Gimenez','manuel_jimenez@gmail.com','2000-06-30',1,'d8578edf8458ce06fbc5bb76a58c5ca4'),(3,'Montiel','Navarro','Cabrera','monti_navmx@gmail.com','1985-09-23',1,'d8578edf8458ce06fbc5bb76a58c5ca4'),(5,'Erick','Marquez','Garcia','NoobMaster69@gmail.com','2000-10-15',1,'d8578edf8458ce06fbc5bb76a58c5ca4'),(4,'Alonso','Campos',NULL,'oso_carinoso64@gmail.com','1973-08-18',1,'d8578edf8458ce06fbc5bb76a58c5ca4');
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

-- Dump completed on 2019-11-03 18:46:43
