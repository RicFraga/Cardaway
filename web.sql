-- MySQL dump 10.13  Distrib 5.7.26, for Win64 (x86_64)
--
-- Host: localhost    Database: web
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES UTF8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `nombre` varchar(32) NOT NULL,
  `contrasena` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('admin','admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id_categoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(16) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
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
  `fecha_hora` timestamp NOT NULL,
  PRIMARY KEY (`id_postal`,`id_remitente`,`id_destinatario`,`fecha_hora`),
  KEY `id_destinatario` (`id_destinatario`),
  KEY `id_remitente` (`id_remitente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `envios`
--

LOCK TABLES `envios` WRITE;
/*!40000 ALTER TABLE `envios` DISABLE KEYS */;
INSERT INTO `envios` VALUES (6,1,4,'Feliz Dia de Muertos Amiga :)','2019-11-01 21:30:00'),(25,2,6,'Una flor para otra flor','2019-09-28 23:17:00'),(9,4,8,'Feliz Navidad te deseo lo mejor','2018-12-24 05:50:30'),(9,3,9,'Feliz Navidad amiga , hace mucho que no hablas','2018-12-22 22:55:31'),(22,9,11,'Ya comprate unos para ir al centro','2019-06-13 01:43:39'),(10,6,10,'Me gustaria vivri en uno de esos , a ti no?','2018-12-28 21:40:00'),(21,4,5,'Camara sacate una a credito para ir a pistear','2019-04-20 17:45:14'),(2,10,2,NULL,'2018-10-30 20:52:20'),(24,3,5,'Que oferton xD','2019-05-21 18:32:15'),(18,10,1,'Uff...,Pero mira como esta esa piña ','2019-06-29 23:23:49'),(22,10,3,'Tu tenias unos no?,Los vendes?','2019-10-13 14:29:16'),(4,5,1,'Viva MEXICO','2019-09-15 06:28:33'),(9,3,10,'Feliz Navidad y prospero año nuevo','2018-12-25 04:18:34'),(23,2,6,'Para cuando unas partidas','2019-11-01 21:30:00'),(6,7,4,'Y si vamos a pedir calaverita?','2019-11-01 01:21:33'),(3,7,11,NULL,'2019-11-01 21:30:00'),(19,9,10,'Disparame un cafe amiga','2019-08-20 19:07:28'),(17,6,4,'SI DIOS TE HA DADO LIMONES , HAZ LIMONADA','2019-01-24 15:48:32'),(7,11,6,NULL,'2019-10-25 16:22:33'),(20,1,2,'Solia vivir en una calle parecida','2019-05-29 17:21:55'),(2,6,11,'Te amo Princesa, Feliz 14 de Febrero <3 ','2019-02-14 17:45:27'),(13,6,11,'Ahmonos pa la playita','2019-03-23 02:23:08'),(2,3,4,'No te lo habia dicho pero me encantas','2019-02-14 16:25:38'),(18,1,6,'Traete unas piñas para los taquitos','2019-06-20 14:58:56'),(25,7,3,'Imagen Random para tener una escusa de que hablar','2019-08-21 23:20:19'),(21,4,3,'etoy vendiendo una motoneta parecida por ci te interesa compa','2019-11-01 21:30:00'),(18,6,9,'Ahi amiga te desapareces,Se como una piña levantate derecha,Usa crorona y se dulce por dentro','2019-07-05 18:23:33'),(12,10,11,'Esta postal me recuerda cuando ivamos al lago','2018-12-02 02:35:20'),(5,11,10,NULL,'2019-09-16 09:17:32'),(18,3,8,'Esta postal es muy hermosa :3, tenia que compartirla','2019-11-01 21:30:00'),(20,1,4,'Me sentia nostalgico','2019-04-28 23:14:19'),(20,9,2,'Yesterdays Gansos Rosas.jpg','2019-07-01 00:23:59'),(12,3,2,'Vamonos pal laguito','2019-11-01 20:29:10'),(9,9,4,NULL,'2018-12-24 05:59:59'),(6,11,5,'OMG en esta pagina hay postales con extensiones gif','2019-10-20 17:48:45'),(16,4,11,'Recuerdas cuando soliamos ir en ferry','2019-07-13 01:21:22'),(25,6,11,'Que hermoso Girasol , es como hipnotico!!!','2019-02-23 03:00:39'),(2,4,9,'Siempre he sido tu admirador secreto','2019-02-14 02:39:25'),(10,3,11,'Ahora que ya no soy libre me encantaria poder ver ese paisaje','2019-02-22 03:36:09'),(12,4,10,'Bosque , Lago y muchas nenas -niños del bosque 2k19','2019-03-02 16:17:43'),(2,2,1,'Verá usted, estoy convencido de que la confianza se recupera aplicando una política de austeridad, aplicando una Ley de Estabilidad Presupuestaria y haciendo lo que hay que hacer. Esto lo vamos a seguir haciendo y tenemos que seguir haciéndolo.','2019-11-26 16:17:43'),(23,1,8,'- Pues verá, tengo la firme convicción de que pronto la situación estará cambiando de forma sustancial y habrá creación de empleo; las huelgas no crean empleo.','2019-11-25 18:17:43'),(8,10,8,'- No conozco a nadie que no quiera salir de la crisis. Yo le aseguro a usted que una cosa son los derechos sociales y otra cosa son los privilegios. Todos saben que los problemas no se resuelven detrás de una pancarta.','2019-11-27 19:17:43'),(16,3,10,'- Creemos firmemente que sembrar la idea de que Mexico es un país corrupto es profundamente injusto; no hay que sembrar de incertidumbres el futuro. Si no tuviéramos deuda podríamos dedicar un montón de dinero a mejorar la sanidad.','2019-11-25 20:17:43'),(6,7,5,'La ayuda a la enseñanza tiene como razón de ser el actuar como la piedra angular extracurricular en la base de la colocación del proyecto del alumnado en el centro del sistema.','2019-11-25 21:17:43'),(5,4,1,'La enseñanza mediada debe prepararse para ser un corolario intra- y extraescolar indisociable de la colocación del proyecto del alumnado en el centro del sistema.','2019-11-24 22:17:43'),(4,3,4,'- Si la situación no hubiera sido la que es, yo no habría tenido que tomar estas medidas; la situación es de extrema dificultad, pero si hacemos las cosas bien vamos a superar esta situación.','2019-11-26 23:17:43'),(2,7,3,'La ayuda a la enseñanza debe prepararse para ser un crisol transdisciplinario indisociable de la colocación del proyecto del alumnado en el centro del sistema.','2019-11-27 00:17:43'),(6,7,2,'La utilización de las Tecnologías de la Información y la Comunicación no puede entenderse sino como el eje transdisciplinario en el corazón del aprendizaje cotidiano del oficio de estudiante.','2019-11-26 01:17:43'),(6,1,4,'La enseñanza mediada debe convertirse en el eje cívico al servicio del aprendizaje cotidiano del oficio de estudiante.','2019-11-29 02:17:43');
/*!40000 ALTER TABLE `envios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postales`
--

DROP TABLE IF EXISTS `postales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postales` (
  `id_postal` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_categoria` int(10) unsigned NOT NULL,
  `img` varchar(32) NOT NULL,
  PRIMARY KEY (`id_postal`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postales`
--

LOCK TABLES `postales` WRITE;
/*!40000 ALTER TABLE `postales` DISABLE KEYS */;
INSERT INTO `postales` VALUES (1,1,'gato_01.png'),(2,1,'rompecabezas_01.jpg'),(3,1,'te_extrano_01.jpg'),(4,2,'15_sep_01.jpg'),(5,2,'15_sep_02.jpg'),(6,2,'dia_muertos_01.gif'),(7,2,'dia_muertos_02.png'),(8,2,'ets_fest_2019_01.png'),(9,2,'navidad_01.jpg'),(10,3,'edificios_01.jpg'),(11,3,'faro_01.jpg'),(12,3,'lago_01.jpg'),(13,3,'playa_01.jpg'),(14,3,'puente_01.jpg'),(15,3,'vias_01.jpg'),(16,3,'vias_02.jpg'),(17,4,'limones_01.jpg'),(18,4,'pina_01.jpg'),(19,4,'starbucks_01.jpg'),(20,5,'calle_old_01.jpg'),(21,5,'motoneta_01.jpg'),(22,5,'patines_01.jpg'),(23,5,'poker_01.jpg'),(24,6,'el_bromas_01.jpg'),(25,6,'girasol_01.jpg');
/*!40000 ALTER TABLE `postales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) NOT NULL,
  `primer_apellido` varchar(32) NOT NULL,
  `segundo_apellido` varchar(32) DEFAULT NULL,
  `correo` varchar(64) NOT NULL,
  `fecha_nac` date NOT NULL,
  `genero` tinyint(1) NOT NULL,
  `contrasena` varchar(32) NOT NULL,
  PRIMARY KEY (`correo`),
  UNIQUE KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Angel','Ramirez','Ponce','angelito_mix@gmail.com','1999-12-12',1,'d8578edf8458ce06fbc5bb76a58c5ca4'),(2,'Manuel','Jimenez','Gimenez','manuel_jimenez@gmail.com','2000-06-30',1,'d8578edf8458ce06fbc5bb76a58c5ca4'),(3,'Montiel','Navarro','Cabrera','monti_navmx@gmail.com','1985-09-23',1,'d8578edf8458ce06fbc5bb76a58c5ca4'),(4,'Alonso','Campos',NULL,'oso_carinoso64@gmail.com','1973-08-18',1,'d8578edf8458ce06fbc5bb76a58c5ca4'),(5,'Erick','Marquez','Garcia','NoobMaster69@gmail.com','2000-10-15',1,'d8578edf8458ce06fbc5bb76a58c5ca4'),(6,'David','Sierra','Soto','davis_solmayor@hotmail.com','1963-01-07',1,'d8578edf8458ce06fbc5bb76a58c5ca4'),(7,'Laura','Torres','Santos','laura.torres@hotmail.com','1978-02-14',0,'d8578edf8458ce06fbc5bb76a58c5ca4'),(8,'Daniela','Lozano','Campos','dany85@hotmail.com','1985-06-20',0,'d8578edf8458ce06fbc5bb76a58c5ca4'),(9,'Elsa','Mendez','Cortes','Elsa_Cortes@hotmail.com','1965-01-30',0,'d8578edf8458ce06fbc5bb76a58c5ca4'),(10,'Ines','Serrano','Medina','inesserrano@gmail.com','1988-05-26',0,'d8578edf8458ce06fbc5bb76a58c5ca4'),(11,'Carolina','Garcia','Gutierrez','carogg@hotmail.com','1999-03-25',0,'d8578edf8458ce06fbc5bb76a58c5ca4');
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

-- Dump completed on 2019-11-26 23:34:38
