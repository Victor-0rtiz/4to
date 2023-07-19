-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: isim_sc
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `asignatura`
--

DROP TABLE IF EXISTS `asignatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asignatura` (
  `idAsignatura` int NOT NULL AUTO_INCREMENT,
  `NombreAsignatura` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAsignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignatura`
--

LOCK TABLES `asignatura` WRITE;
/*!40000 ALTER TABLE `asignatura` DISABLE KEYS */;
INSERT INTO `asignatura` VALUES (1,'fisica'),(2,'matematicas'),(3,'lengua y literatura'),(4,'ciencias sociales'),(5,'historia'),(6,'ciencias naturales'),(7,'lengua extranjera');
/*!40000 ALTER TABLE `asignatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calificaciones`
--

DROP TABLE IF EXISTS `calificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `calificaciones` (
  `idCalificacione` int NOT NULL AUTO_INCREMENT,
  `Asignatura_idAsignatura` int NOT NULL,
  `Docente_idDocente` int NOT NULL,
  `Estudiantes_idEstudiantes` int NOT NULL,
  `AnioLectivo` int DEFAULT NULL,
  `IP` int DEFAULT NULL,
  `IIP` int DEFAULT NULL,
  `NIS` int DEFAULT NULL,
  `IIIP` int DEFAULT NULL,
  `IVP` int DEFAULT NULL,
  `NSS` int DEFAULT NULL,
  `NF` int DEFAULT NULL,
  PRIMARY KEY (`idCalificacione`),
  KEY `fk_Calificaciones_Estudiantes1_idx` (`Estudiantes_idEstudiantes`),
  KEY `fk_Calificaciones_Docente1_idx` (`Docente_idDocente`),
  KEY `fk_Calificaciones_Asignatura1_idx` (`Asignatura_idAsignatura`),
  CONSTRAINT `fk_Calificaciones_Asignatura1` FOREIGN KEY (`Asignatura_idAsignatura`) REFERENCES `asignatura` (`idAsignatura`),
  CONSTRAINT `fk_Calificaciones_Docente1` FOREIGN KEY (`Docente_idDocente`) REFERENCES `docente` (`idDocente`),
  CONSTRAINT `fk_Calificaciones_Estudiantes1` FOREIGN KEY (`Estudiantes_idEstudiantes`) REFERENCES `datosacademicosestudiante` (`idEstudiantes`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificaciones`
--

LOCK TABLES `calificaciones` WRITE;
/*!40000 ALTER TABLE `calificaciones` DISABLE KEYS */;
INSERT INTO `calificaciones` VALUES (3,1,1,3,2023,1,2,2,2,2,3,5),(4,2,1,2,2023,1,2,2,2,2,3,5);
/*!40000 ALTER TABLE `calificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datosacademicosestudiante`
--

DROP TABLE IF EXISTS `datosacademicosestudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `datosacademicosestudiante` (
  `idEstudiantes` int NOT NULL AUTO_INCREMENT,
  `codigo_estudiante` varchar(45) NOT NULL,
  `Usuario_idUsuario` int NOT NULL,
  `Grado` varchar(30) DEFAULT NULL,
  `Seccion` varchar(45) DEFAULT NULL,
  `Padre_idPadre` int NOT NULL,
  PRIMARY KEY (`idEstudiantes`),
  KEY `fk_Estudiantes_Usuario1_idx` (`Usuario_idUsuario`),
  KEY `fk_DatosAcademicosEstudiante_Padre1_idx` (`Padre_idPadre`),
  CONSTRAINT `fk_DatosAcademicosEstudiante_Padre1` FOREIGN KEY (`Padre_idPadre`) REFERENCES `padre` (`idPadre`),
  CONSTRAINT `fk_Estudiantes_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datosacademicosestudiante`
--

LOCK TABLES `datosacademicosestudiante` WRITE;
/*!40000 ALTER TABLE `datosacademicosestudiante` DISABLE KEYS */;
INSERT INTO `datosacademicosestudiante` VALUES (2,'asdfgh',2,'5to año','A',1),(3,'ahhhhh',3,'5to año','B',1);
/*!40000 ALTER TABLE `datosacademicosestudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docente`
--

DROP TABLE IF EXISTS `docente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `docente` (
  `idDocente` int NOT NULL AUTO_INCREMENT,
  `inns` varchar(45) NOT NULL,
  `Usuario_idUsuario` int NOT NULL,
  PRIMARY KEY (`idDocente`),
  KEY `fk_Docente_Usuario1_idx` (`Usuario_idUsuario`),
  CONSTRAINT `fk_Docente_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docente`
--

LOCK TABLES `docente` WRITE;
/*!40000 ALTER TABLE `docente` DISABLE KEYS */;
INSERT INTO `docente` VALUES (1,'alalalalal',1);
/*!40000 ALTER TABLE `docente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `padre`
--

DROP TABLE IF EXISTS `padre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `padre` (
  `idPadre` int NOT NULL AUTO_INCREMENT,
  `Cedula` varchar(45) DEFAULT NULL,
  `Usuario_idUsuario` int NOT NULL,
  PRIMARY KEY (`idPadre`),
  KEY `fk_Padre_Usuario1_idx` (`Usuario_idUsuario`),
  CONSTRAINT `fk_Padre_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `padre`
--

LOCK TABLES `padre` WRITE;
/*!40000 ALTER TABLE `padre` DISABLE KEYS */;
INSERT INTO `padre` VALUES (1,'001-0101010',2);
/*!40000 ALTER TABLE `padre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `Pnombre` varchar(45) NOT NULL,
  `Papellido` varchar(45) NOT NULL,
  `Usuario` varchar(45) DEFAULT NULL,
  `Contra` varchar(45) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `Celular` varchar(45) DEFAULT NULL,
  `Tipo_usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Adolfo','Urbina','aurbina','1234','2023-07-10','80808080','docente'),(2,'Juan','Perez','jp','1234','2023-07-10','88888888','estudiante'),(3,'pedro','perez','pp','1234','2023-07-10','88888888','estudiantes'),(4,'Arellys','Madrigal','madriga02','1234','2023-07-11','88888888','padre');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'isim_sc'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-11  1:25:13
