-- MySQL dump 10.13  Distrib 8.0.20, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: BIBLIOTECA_UNIVERSITA
-- ------------------------------------------------------
-- Server version	8.0.20-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `AUTORE`
--

DROP TABLE IF EXISTS `AUTORE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `AUTORE` (
  `CodiceAutore` varchar(10) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `DataNascita` date NOT NULL,
  `LuogoNascita` varchar(50) NOT NULL,
  PRIMARY KEY (`CodiceAutore`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AUTORE`
--

LOCK TABLES `AUTORE` WRITE;
/*!40000 ALTER TABLE `AUTORE` DISABLE KEYS */;
INSERT INTO `AUTORE` VALUES ('1','Abey','Crowest','1965-07-20','New York'),('10','Bartolemo','Chadwin','1969-07-22','Pleasantville'),('100','Peri','Maher','1967-04-08','Wilpen'),('11','Betti','Benz','1977-08-05','Berlino'),('12','Beverlee','Jepensen','1976-12-17','Cumberland'),('13','Booth','Belvard','1959-10-11','London'),('14','Boycie','Shorey','1989-11-20','Amsterdam'),('15','Branden','Huffer','1955-01-03','Bloomington'),('16','Breanne','Weben','1989-11-13','London'),('17','Briant','Anespie','1989-01-01','Los Angeles'),('18','Bruno','Goodsall','1963-04-27','London'),('19','Bryanty','Froud','1970-10-30','London'),('2','Adamo','Ligoe','1971-03-26','New York'),('20','Brynn','Semor','1986-05-09','Oslo'),('21','Burk','Torr','1984-08-01','Bloomington'),('22','Cal','Inkin','1969-11-22','Oxford'),('23','Cecile','Follacaro','1986-01-08','New York'),('24','Chelsea','Nannetti','1973-04-14','San Diego'),('25','Cointon','Stranaghan','1963-12-30','New York'),('26','Corri','Gavrieli','1974-06-30','London'),('27','Cristian','Pes','1981-09-10','New York'),('28','De','Wackly','1989-09-17','Bloomington'),('29','Emiline','Greenhough','1982-04-11','Madison'),('3','Alejandrina','Bardell','1962-10-25','Wilpen'),('30','Enrico','Zimuel','1972-04-11','Milan'),('31','Erny','Wrixon','1967-02-25','Nashville'),('32','Eva','Elcum','1956-02-20','Pleasantville'),('33','Fanchon','Bish','1987-08-27','New York'),('34','Farrah','Letham','1962-07-15','Oxford'),('35','Fiorenze','Deluca','1984-07-22','Lawrence'),('36','Gabriella','Orum','1958-11-21','Madison'),('37','Gertrudis','Corzon','1983-06-21','Oxford'),('38','Giffer','Leisman','1959-05-25','Los Angeles'),('39','Gil','Lettington','1974-08-11','Los Angeles'),('4','Alessandro','Oldam','1972-07-09','New York'),('40','Giustina','Jezzard','1969-02-04','Pleasantville'),('41','Gregorius','McPhater','1976-12-04','Pleasantville'),('42','Hirsch','Legging','1961-12-19','Oxford'),('43','Merna','Lambal','1969-09-30','London'),('44','Hortense','Whatson','1978-08-25','Washington'),('45','Reta','Philippsohn','1966-10-08','Washington'),('46','Jasen','Itter','1967-12-24','Madison'),('47','Yancey','Sacher','1961-04-17','Lawrence'),('48','Kerri','Adiscot','1980-06-28','Cumberland'),('49','Rubie','Delgua','1970-06-03','Los Angeles'),('5','Ami','Adamo','1978-08-10','Lawrence'),('50','Perrine','Blagden','1984-01-04','Washington'),('51','Maible','Twidale','1963-01-29','Bloomington'),('52','Sansone','Jansen','1968-05-12','Lawrence'),('53','Ursula','Lockitt','1967-12-14','Liverpool'),('54','Sella','Marriage','1988-12-01','Madison'),('55','Sandro','Wilcher','1990-09-25','Nashville'),('56','Margaretha','Aysik','1973-03-18','Washington'),('57','Margaretta','Pardal','1970-03-08','New York'),('58','Isacco','McSherry','1976-04-17','Edimburg'),('59','Zilvia','Silver','1958-04-25','Nashville'),('6','Andrej','Von Der Empten','1989-12-17','Amsterdam'),('60','Lu','Jenne','1977-01-11','Seul'),('61','Harlene','Tartt','1984-09-20','New York'),('62','Mirelle','Hehnke','1968-06-25','Los Angeles'),('63','Ramez','Elmasri','1970-02-16','Oxford'),('64','Sim','Frondt','1967-05-20','Bloomington'),('65','Ileane','Spurriar','1969-09-03','Los Angeles'),('66','Leroy','Vasiltsov','1976-10-13','San Diego'),('67','Jodee','Westwick','1968-01-23','Liverpool'),('68','Inesita','Dallender','1982-04-05','New York'),('69','Marnie','Spinke','1987-09-07','Los Angeles'),('7','Ange','Symcox','1977-07-01','Paris'),('70','Theo','McLauchlin','1961-03-01','Cardiff'),('71','Russ','Leander','1959-11-16','Oxford'),('72','Jon','Duckett','1978-08-16','Los Angeles'),('73','Merissa','Senechault','1956-02-02','New York'),('74','Xylia','Bendle','1975-01-01','Cumberland'),('75','Jacquenette','Snookes','1973-08-07','Lawrence'),('76','Shamkant','Navathe','1962-11-24','London'),('77','Karie','Bendixen','1969-12-29','Amsterdam'),('78','Hastings','Sweetman','1978-08-13','Los Angeles'),('79','Godwin','Lebbern','1983-11-16','San Diego'),('8','Angil','Beckson','1956-05-01','Oxford'),('80','Lewes','Salsberg','1988-05-18','Cumberland'),('81','Roxy','Burnage','1955-04-13','Oxford'),('82','Petunia','Breznovic','1981-02-19','Prague'),('83','Jefferson','Dewire','1971-02-16','Cardiff'),('84','Gwyneth','Tinsley','1986-05-12','Los Angeles'),('85','Lavena','Capey','1972-02-17','Cumberland'),('86','Shelbi','Wheelton','1987-09-12','Los Angeles'),('87','Ludvig','Callf','1971-06-05','London'),('88','Jermaine','Van Velde','1979-04-23','Los Angeles'),('89','Luciano','Gamberini','1979-11-08','Rome'),('9','Barr','Labbet','1967-07-06','Lawrence'),('90','Junia','Everal','1973-11-09','Los Angeles'),('91','Nicki','Pharrow','1984-09-16','Los Angeles'),('92','Quincey','Franke','1964-10-12','Bloomington'),('93','Walker','Dumberell','1965-12-30','London'),('94','Raquel','Semered','1972-03-21','Bloomington'),('95','Hannah','Bachnic','1956-06-22','Madison'),('96','Merrick','Harbron','1959-11-09','Pleasantville'),('97','Vitia','Douch','1977-08-20','London'),('98','Pincas','Paulisch','1973-12-24','Berlino'),('99','Marja','Rosedale','1989-03-25','New York');
/*!40000 ALTER TABLE `AUTORE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BIBLIOTECA`
--

DROP TABLE IF EXISTS `BIBLIOTECA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `BIBLIOTECA` (
  `CodiceBiblioteca` varchar(10) NOT NULL,
  `Via` varchar(50) NOT NULL,
  `NomeDipartimento` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CodiceBiblioteca`),
  KEY `NomeDipartimento` (`NomeDipartimento`),
  CONSTRAINT `BIBLIOTECA_ibfk_1` FOREIGN KEY (`NomeDipartimento`) REFERENCES `DIPARTIMENTO` (`Nome`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BIBLIOTECA`
--

LOCK TABLES `BIBLIOTECA` WRITE;
/*!40000 ALTER TABLE `BIBLIOTECA` DISABLE KEYS */;
INSERT INTO `BIBLIOTECA` VALUES ('1','Ghiara, 36','Architettura'),('10','Paradiso, 12','Studi Umanistici'),('2','Voltapetto, 11','Economia e management'),('3','Saragat, 1','Fisica e Scienze della terra'),('4','Corso Ercole I d\'Este, 37','Giurisprudenza'),('5','Saragat, 1','Ingegneria'),('6','Macchiavelli, 30','Matematica e Informatica'),('7','Luigi Borsari, 46','Morfologia, chirurgia e medicina sperimentale'),('8','Luigi Borsari, 46','Scienze chimiche e farmaceutiche'),('9','Luigi Borsari, 46','Scienze della vita e biotecniche');
/*!40000 ALTER TABLE `BIBLIOTECA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `COPIA`
--

DROP TABLE IF EXISTS `COPIA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `COPIA` (
  `Numero` int NOT NULL,
  `Scaffale` varchar(20) NOT NULL,
  `ISBN` char(13) NOT NULL,
  `CodiceB` varchar(10) DEFAULT NULL,
  `isDisponibile` tinyint(1) NOT NULL,
  PRIMARY KEY (`Numero`,`ISBN`),
  KEY `ISBN` (`ISBN`),
  KEY `CodiceB` (`CodiceB`),
  CONSTRAINT `COPIA_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `LIBRO` (`ISBN`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `COPIA_ibfk_2` FOREIGN KEY (`CodiceB`) REFERENCES `BIBLIOTECA` (`CodiceBiblioteca`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `COPIA`
--

LOCK TABLES `COPIA` WRITE;
/*!40000 ALTER TABLE `COPIA` DISABLE KEYS */;
INSERT INTO `COPIA` VALUES (1,'B4','000369692-8','4',1),(1,'Z9','004023598-X','4',1),(1,'Z17','006821799-4','2',1),(1,'S18','009047587-9','2',1),(1,'H14','009140312-X','1',1),(1,'B4','014330257-4','6',1),(1,'A11','015674765-0','7',1),(1,'B4','022938411-0','7',1),(1,'S20','023019395-1','6',1),(1,'S15','050916783-7','9',1),(1,'P23','052706515-3','1',1),(1,'D20','055417113-9','2',1),(1,'S24','060088686-7','6',1),(1,'A9','065646345-7','4',1),(1,'D18','068254989-4','4',1),(1,'B4','075305079-X','7',1),(1,'P16','076691563-8','1',1),(1,'B4','083845517-4','6',1),(1,'B4','085745713-6','4',1),(1,'Z16','086031288-7','9',1),(1,'D16','087133062-8','1',1),(1,'B10','093035174-6','5',1),(1,'A15','101215590-0','5',1),(1,'H15','103300276-3','7',1),(1,'A9','129488690-8','7',1),(1,'B4','131544489-5','9',1),(1,'B4','132261731-7','7',1),(1,'H18','136320382-7','3',1),(1,'B12','136964378-0','7',1),(1,'A1','137066182-7','3',1),(1,'P17','147191251-5','9',1),(1,'Z12','158999545-7','5',1),(1,'B4','165632171-8','5',1),(1,'B4','167947701-3','8',1),(1,'P21','168316748-1','3',1),(1,'P26','170243376-5','3',1),(1,'B4','171208472-0','4',1),(1,'B4','175205668-X','5',1),(1,'Z15','179592990-1','6',1),(1,'D13','182342356-6','7',1),(1,'A17','184722570-5','5',1),(1,'H22','190222315-2','5',1),(1,'B4','192373118-1','6',1),(1,'A10','194862546-6','1',1),(1,'B4','214940353-6','9',1),(1,'S14','216013488-0','5',1),(1,'P19','222223087-X','7',1),(1,'A3','226372696-9','9',1),(1,'B11','253760945-X','8',1),(1,'B13','255439894-1','9',1),(1,'A16','256739345-5','7',1),(1,'B4','259418123-4','7',1),(1,'A15','259579784-0','4',1),(1,'A18','264788349-1','1',1),(1,'B4','265972215-3','5',1),(1,'P18','271280652-2','8',1),(1,'Z10','280992700-6','9',1),(1,'B4','284203566-6','5',1),(1,'S16','290005808-2','6',1),(1,'B4','292051296-X','9',1),(1,'D12','296111646-5','2',1),(1,'H16','299282269-8','5',1),(1,'A18','300485539-9','9',1),(1,'B4','301170811-8','2',1),(1,'B4','331424241-7','4',1),(1,'D11','333748888-9','3',1),(1,'A12','343838580-5','7',1),(1,'B4','346481000-3','3',1),(1,'A13','347737564-5','1',1),(1,'A18','351898785-2','1',1),(1,'B4','356414253-3','1',1),(1,'B4','362309208-8','9',1),(1,'S13','364615054-8','9',1),(1,'B4','366292343-2','4',1),(1,'B4','368515943-7','6',1),(1,'B4','368968937-6','8',1),(1,'B4','368990830-2','5',1),(1,'B4','369048652-1','7',1),(1,'B4','371268896-2','4',1),(1,'A17','372098427-3','2',1),(1,'A8','376459959-6','1',1),(1,'B16','384050463-5','9',1),(1,'S22','385828979-5','7',1),(1,'Z1','386397507-3','1',1),(1,'B4','387623794-7','3',1),(1,'B14','389625239-9','3',1),(1,'D19','391578830-9','5',1),(1,'A10','394873350-3','2',1),(1,'D14','404884623-X','3',1),(1,'B4','405663612-5','9',1),(1,'H19','421128511-4','3',1),(1,'B4','421308038-2','2',1),(1,'A15','425111017-X','1',1),(1,'A12','432587582-4','4',1),(1,'H21','435456826-8','4',1),(1,'A5','436501926-0','4',1),(1,'Z11','441842932-8','3',1),(1,'P20','449571196-2','7',1),(1,'H8','457456450-4','1',1),(1,'B4','469785019-X','8',1),(1,'B4','469863297-8','5',1),(1,'B4','492112694-1','4',1),(1,'A17','501862280-6','8',1),(1,'B4','502714957-3','9',1),(1,'Z6','507124152-8','7',1),(1,'B4','509808775-9','6',1),(1,'A11','510453377-8','7',1),(1,'P24','515279116-1','1',1),(1,'Z18','516983356-3','9',1),(1,'B8','517581126-6','5',1),(1,'B4','521329516-9','4',1),(1,'B18','521847642-0','8',1),(1,'B4','526942871-7','8',1),(1,'B3','536751983-0','8',1),(1,'A12','542931356-4','8',1),(1,'B4','554021569-9','3',1),(1,'B4','560211284-7','5',1),(1,'A2','560797299-2','5',1),(1,'B6','565659819-5','1',1),(1,'B4','584224789-5','2',1),(1,'P15','585173205-9','1',1),(1,'D15','594275024-6','2',1),(1,'D17','595626866-2','6',1),(1,'S21','600597433-5','1',1),(1,'B17','601546113-6','2',1),(1,'D6','607745120-7','6',1),(1,'Z13','611928800-7','2',1),(1,'A16','653073623-9','3',1),(1,'A16','653175736-1','3',1),(1,'A6','657583349-7','7',1),(1,'H11','660038142-6','3',1),(1,'B9','661872594-1','6',1),(1,'B4','663119553-5','1',1),(1,'P25','666013383-6','8',1),(1,'A13','671158165-2','6',1),(1,'B19','672217513-8','3',1),(1,'S17','672560381-5','3',1),(1,'H13','698429931-4','6',1),(1,'B4','711604128-1','9',1),(1,'B4','712463375-3','2',1),(1,'S23','733508116-5','8',1),(1,'A8','740153355-3','4',1),(1,'B4','742437654-3','2',1),(1,'A14','744780754-0','4',1),(1,'H17','752213396-3','1',1),(1,'S25','756564271-1','4',1),(1,'B4','760264513-8','1',1),(1,'Z14','768148078-1','8',1),(1,'A14','769740772-8','6',1),(1,'B4','775940054-3','6',1),(1,'A14','786395256-5','4',1),(1,'B4','801081738-4','1',1),(1,'Z8','814543114-X','5',1),(1,'A11','816886703-3','9',1),(1,'B4','825867311-4','1',1),(1,'B5','829509196-4','8',1),(1,'B4','829914597-X','5',1),(1,'B4','836374770-X','5',1),(1,'S10','843331705-9','4',1),(1,'A9','851106761-2','5',1),(1,'B4','857627191-5','3',1),(1,'H23','860964250-X','4',1),(1,'P22','863050834-5','9',1),(1,'A7','867778553-1','3',1),(1,'A1','870560200-9','8',1),(1,'H10','872379238-8','5',1),(1,'D22','875127371-3','6',1),(1,'A13','887526619-0','9',1),(1,'D10','925812482-0','7',1),(1,'B4','927994979-9','2',1),(1,'A19','945660604-X','3',1),(1,'B4','946684198-X','2',1),(1,'B4','947990234-6','5',1),(1,'P14','951964371-0','6',1),(1,'D21','966859767-2','1',1),(1,'B4','970334328-7','4',1),(1,'H20','976860084-5','2',1),(1,'B15','978061177-0','1',1),(1,'S19','989371762-0','5',1),(1,'A10','992229254-8','2',1),(1,'B4','998941371-1','3',1),(2,'Z7','075305079-X','8',1),(2,'H6','137066182-7','1',1),(2,'B4','167947701-3','2',1),(2,'B4','175205668-X','5',1),(2,'B4','226372696-9','9',1),(2,'A4','356414253-3','4',1),(2,'Z5','366292343-2','3',1),(2,'A4','369048652-1','8',1),(2,'S8','386397507-3','8',1),(2,'A6','387623794-7','3',1),(2,'A8','517581126-6','6',1),(2,'A3','536751983-0','9',1),(2,'A6','565659819-5','7',1),(2,'P10','607745120-7','7',1),(2,'B4','657583349-7','8',1),(2,'B7','660038142-6','2',1),(2,'A2','712463375-3','7',1),(2,'A7','825867311-4','7',1),(2,'A5','829509196-4','1',1),(2,'D7','843331705-9','3',1),(2,'B4','867778553-1','4',1),(2,'B4','870560200-9','7',1),(2,'Z3','946684198-X','1',1),(2,'A7','951964371-0','1',1),(3,'B2','137066182-7','4',1),(3,'A5','167947701-3','4',1),(3,'Z2','175205668-X','4',1),(3,'B4','226372696-9','8',1),(3,'H9','356414253-3','1',1),(3,'S12','366292343-2','8',1),(3,'B4','369048652-1','2',1),(3,'D5','386397507-3','2',1),(3,'H7','712463375-3','6',1),(3,'H12','825867311-4','4',1),(3,'B4','829509196-4','5',1),(3,'P11','843331705-9','2',1),(3,'B4','870560200-9','6',1),(3,'B4','951964371-0','3',1),(4,'A2','137066182-7','8',1),(4,'S9','175205668-X','1',1),(4,'A3','226372696-9','9',1),(4,'D9','366292343-2','3',1),(4,'P9','386397507-3','2',1),(4,'B4','829509196-4','1',1),(4,'A4','843331705-9','3',1),(5,'B4','137066182-7','7',1),(5,'P13','366292343-2','4',1),(5,'Z4','829509196-4','7',1),(5,'B4','843331705-9','1',1),(6,'B4','137066182-7','3',1),(6,'S11','829509196-4','8',1),(7,'D8','829509196-4','9',1),(8,'P12','829509196-4','1',1);
/*!40000 ALTER TABLE `COPIA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DIPARTIMENTO`
--

DROP TABLE IF EXISTS `DIPARTIMENTO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `DIPARTIMENTO` (
  `Nome` varchar(50) NOT NULL,
  `Direttore` varchar(100) NOT NULL,
  `Via` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DIPARTIMENTO`
--

LOCK TABLES `DIPARTIMENTO` WRITE;
/*!40000 ALTER TABLE `DIPARTIMENTO` DISABLE KEYS */;
INSERT INTO `DIPARTIMENTO` VALUES ('Architettura','Prof. Alessandro Ippoliti','Ghiara, 36'),('Economia e management','Prof.ssa Laura Ramaciotti','Voltapetto, 11'),('Fisica e Scienze della terra','Prof. Vincenzo Guidi','Saragat, 1'),('Giurisprudenza','Prof. Daniele Negri','Corso Ercole I d\'Este, 37'),('Ingegneria','Prof. Marco Franchini','Saragat, 1'),('Matematica e Informatica','Prof. Massimiliano Mella','Macchiavelli, 30'),('Morfologia, chirurgia e medicina sperimentale','Prof.ssa Paola Secchiero','Luigi Borsari, 46'),('Scienze chimiche e farmaceutiche','Prof.ssa Olga Bortolini','Luigi Borsari, 46'),('Scienze della vita e biotecniche','Prof. Mirko Pinotti','Luigi Borsari, 46'),('Studi Umanistici','Prof. Paolo Tanganelli','Paradiso, 12');
/*!40000 ALTER TABLE `DIPARTIMENTO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EDITORE`
--

DROP TABLE IF EXISTS `EDITORE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `EDITORE` (
  `CodiceEditore` varchar(10) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Via` varchar(50) NOT NULL,
  `Citta` varchar(50) NOT NULL,
  `CAP` char(5) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`CodiceEditore`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EDITORE`
--

LOCK TABLES `EDITORE` WRITE;
/*!40000 ALTER TABLE `EDITORE` DISABLE KEYS */;
INSERT INTO `EDITORE` VALUES ('1','Apogeo','Via Andegari, 6','Milan','20121','editore@apogeoeditore.it','02-3596681'),('10','Meaning','Lakewood Gardens Place, 28063','New York','8734','N/D','309-306-5066'),('2','Pearson Italia','Corso Trapani, 16','Turin','10139','N/D','011-75021510'),('3','Tecniche Nuove','Via Eritrea, 21','Milan','20157','N/D','02-390901'),('4','Packt Publishing','Tennessee Circle, 4','Boston','89654','hub@packtpub.com','903-259-1261'),('5','Addison-Wesley','Coolidge Junction, 12','Oboken','7030','N/D','638-435-4004'),('6','Pst Edizioni','Via degli Editori Riuniti, 8','Milan','20157','N/D','02-546722'),('7','Dunning Editions','Dunning Drive, 988','Lawrance','23445','N/D','16-339-1269'),('8','Europa Edizioni','Via degli Editori Riuniti, 34','Milan','20157','info@europaedizioni.it','02-835610'),('9','Plaza Publicacionès','Strada Grande, 944','Madrid','2264','N/D','03-567234');
/*!40000 ALTER TABLE `EDITORE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LIBRO`
--

DROP TABLE IF EXISTS `LIBRO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `LIBRO` (
  `ISBN` char(13) NOT NULL,
  `Titolo` varchar(100) NOT NULL,
  `AnnoPubblicazione` char(4) NOT NULL,
  `Categoria` varchar(50) NOT NULL,
  `Lingua` varchar(20) NOT NULL,
  `CodiceE` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ISBN`),
  KEY `CodiceE` (`CodiceE`),
  CONSTRAINT `LIBRO_ibfk_1` FOREIGN KEY (`CodiceE`) REFERENCES `EDITORE` (`CodiceEditore`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LIBRO`
--

LOCK TABLES `LIBRO` WRITE;
/*!40000 ALTER TABLE `LIBRO` DISABLE KEYS */;
INSERT INTO `LIBRO` VALUES ('000369692-8','Thief of Hearts','2016','storia','English','10'),('004023598-X','Gingerbread Man The','2012','medicina','Dari','4'),('006821799-4','Counterfeiters The','2018','storia','Estonian','9'),('009047587-9','Life of Another The (La vie d une autre)','2015','medicina','English','5'),('009140312-X','Death Defying Acts','2017','giurisprudenza','Dhivehi','3'),('014330257-4','Longest Yard The','2010','lingue','Georgian','6'),('015674765-0','Children Are Watching Us The (Bambini ci guardano I)','2018','medicina','English','4'),('022938411-0','Almanya - Welcome to Germany','2014','lingue','Guaraní','7'),('023019395-1','Heroine','2013','lingue','Dzongkha','7'),('050916783-7','Inspectors The','2017','giurisprudenza','Catalan','3'),('052706515-3','Dead Man Walking','2011','storia','English','8'),('055417113-9','Private Detective 62','2017','storia','English','9'),('060088686-7','Mondays in the Sun','2019','storia','English','9'),('065646345-7','Phil Spector','2020','giurisprudenza','Irish Gaelic','3'),('068254989-4','Human Failure','2014','lingue','English','8'),('075305079-X','Attack of the 50 Foot Woman','2010','giurisprudenza','Danish','2'),('076691563-8','Bed & Breakfast Love is a Happy Accident (Bed & Breakfast)','2018','giurisprudenza','Dari','3'),('083845517-4','Memory','2014','medicina','Punjabi','5'),('085745713-6','Suit for Wedding A (aka The Wedding Suit) (Lebassi Baraye Arossi)','2020','lingue','English','7'),('086031288-7','Stingray Sam','2019','storia','Polish','9'),('087133062-8','Come Blow Your Horn','2013','lingue','English','6'),('093035174-6','Doc Savage The Man of Bronze','2015','giurisprudenza','English','3'),('101215590-0','Cars','2012','lingue','English','8'),('103300276-3','Sound of Music The','2019','medicina','Khmer','4'),('129488690-8','Family Tree','2017','giurisprudenza','English','3'),('131544489-5','Addams Family The','2019','medicina','English','4'),('132261731-7','The Dark Horse','2018','medicina','Guaraní','3'),('136320382-7','Mon oncle d Amérique','2017','lingue','English','6'),('136964378-0','Maniac','2013','medicina','English','5'),('137066182-7','Gone Fishin ','2012','informatica','Georgian','1'),('147191251-5','You Only Live Once','2018','medicina','Dari','4'),('158999545-7','Rains of Ranchipur The','2012','lingue','English','6'),('165632171-8','Paradise Lost 2 Revelations','2010','giurisprudenza','Italian','2'),('167947701-3','Saboteur','2014','giurisprudenza','English','1'),('168316748-1','Carbon Nation','2012','lingue','Portuguese','7'),('170243376-5','Buddy','2015','storia','English','10'),('171208472-0','The Fourth War','2020','medicina','English','4'),('175205668-X','Gasoline (Benzina)','2019','informatica','English','1'),('179592990-1','Day of the Triffids The','2011','storia','English','8'),('182342356-6','Meet Joe Black','2011','medicina','Japanese','4'),('184722570-5','Ironclad','2011','storia','Kashmiri','9'),('190222315-2','Salvage','2014','storia','Belarusian','9'),('192373118-1','No Distance Left to Run','2019','lingue','English','6'),('194862546-6','Dakota Skye','2011','medicina','English','4'),('214940353-6','Tenchi The Samurai Astronomer','2018','giurisprudenza','English','3'),('216013488-0','Enemy','2012','giurisprudenza','Arabic','2'),('222223087-X','Concrete Night (Betoniyö)','2010','medicina','Irish Gaelic','5'),('226372696-9','State of Siege (État de siège)','2013','informatica','Hindi','1'),('253760945-X','Red White & Blue','2016','medicina','English','4'),('255439894-1','Pitch Black','2015','medicina','English','6'),('256739345-5','High Spirits','2016','storia','Swedish','8'),('259418123-4','Inhale','2011','storia','English','9'),('259579784-0','Waydowntown','2018','lingue','English','7'),('264788349-1','In the Park','2018','storia','Haitian Creole','9'),('265972215-3','Animal House','2017','lingue','English','8'),('271280652-2','Shuttle','2017','medicina','English','4'),('280992700-6','Young Cassidy','2018','medicina','German','4'),('284203566-6','Trial','2013','medicina','Korean','5'),('290005808-2','World of Kanako The (Kawaki)','2020','medicina','Lao','4'),('292051296-X','Purple Rose of Cairo The','2013','giurisprudenza','Guaraní','3'),('296111646-5','Golem','2019','giurisprudenza','Japanese','3'),('299282269-8','Scenic Route','2015','medicina','English','5'),('300485539-9','Wild River','2012','storia','Dzongkha','10'),('301170811-8','Such Is Life (Así es la vida)','2019','giurisprudenza','English','3'),('331424241-7','PHP 7 development','2015','giurisprudenza','Italian','3'),('333748888-9','History Boys The','2017','giurisprudenza','Catalan','2'),('343838580-5','Jubilee','2015','medicina','English','5'),('346481000-3','South of Heaven West of Hell','2015','storia','English','9'),('347737564-5','Last Ride','2019','lingue','Haitian Creole','6'),('351898785-2','Boys from Fengkuei The','2016','storia','Portuguese','10'),('356414253-3','Elizabeth','2012','storia','English','10'),('362309208-8','Nicholas on Holiday','2018','medicina','English','4'),('364615054-8','Human-computer interaction','2017','giurisprudenza','English','2'),('366292343-2','Boys of St Vincent The','2013','giurisprudenza','English','1'),('368515943-7','Love s Labour s Lost','2011','storia','Czech','9'),('368968937-6','Secret Garden The','2014','medicina','English','4'),('368990830-2','Andrei Rublev (Andrey Rublyov)','2017','informatica','English','1'),('369048652-1','Oliver Twist','2020','giurisprudenza','Guaraní','1'),('371268896-2','19th Wife The','2016','medicina','Belarusian','5'),('372098427-3','Sergeant Rutledge','2011','storia','Arabic','9'),('376459959-6','Svidd Neger','2018','giurisprudenza','English','2'),('384050463-5','Ninotchka','2017','storia','Quechua','8'),('385828979-5','Deep Impact','2019','storia','Bengali','8'),('386397507-3','Gunfighter The','2013','informatica','Albanian','1'),('387623794-7','Get Smart','2010','giurisprudenza','English','2'),('389625239-9','Get Bruce','2020','lingue','Hebrew','7'),('391578830-9','Flight of the Living Dead','2014','storia','Kazakh','8'),('394873350-3','Family Life','2014','giurisprudenza','English','3'),('404884623-X','Altman','2010','medicina','Czech','4'),('405663612-5','Open Windows','2015','giurisprudenza','English','2'),('421128511-4','Life is to Whistle (Vida es silbar La)','2012','lingue','English','7'),('421308038-2','LA Without a Map','2014','giurisprudenza','English','1'),('425111017-X','Key Largo','2019','lingue','Estonian','8'),('432587582-4','Rebecca','2015','medicina','Swedish','5'),('435456826-8','Lavender Hill Mob The','2016','storia','English','9'),('436501926-0','Great Expectations','2013','giurisprudenza','Catalan','1'),('441842932-8','Luna de Avellaneda','2018','medicina','Guaraní','5'),('449571196-2','Black Windmill The','2013','lingue','English','6'),('457456450-4','Beefcake','2016','informatica','Aymara','1'),('469785019-X','Wave The (Welle Die)','2014','lingue','English','6'),('469863297-8','Raisin in the Sun A','2015','medicina','Punjabi','5'),('492112694-1','Closure','2018','lingue','English','6'),('501862280-6','Redemption The Stan Tookie Williams Story','2011','storia','Finnish','9'),('502714957-3','Revenge of the Nerds','2019','medicina','Japanese','5'),('507124152-8','Diplomacy (Diplomatie)','2019','giurisprudenza','French','2'),('509808775-9','Vehicle 19','2013','giurisprudenza','English','2'),('510453377-8','Streetcar Named Desire A','2013','medicina','English','5'),('515279116-1','The Frame','2010','storia','English','9'),('516983356-3','Big Squeeze The','2014','storia','English','10'),('517581126-6','Carmen Comes Home (Karumen kokyo ni kaeru)','2020','giurisprudenza','Hindi','2'),('521329516-9','Général Idi Amin Dada A Self Portrait','2015','storia','English','9'),('521847642-0','Holy Flying Circus','2016','storia','English','9'),('526942871-7','Agent Vinod','2017','medicina','Catalan','4'),('536751983-0','Slaves to the Underground','2014','informatica','French','1'),('542931356-4','From the Life of the Marionettes (Aus dem Leben der Marionetten) ','2015','medicina','Italian','5'),('554021569-9','Renaissance','2018','lingue','English','7'),('560211284-7','Tyler Perry s I Can Do Bad All by Myself','2018','lingue','Italian','7'),('560797299-2','Arthur and the Revenge of Maltazard','2017','informatica','English','1'),('565659819-5','Strangers on a Train','2014','giurisprudenza','Dutch','1'),('584224789-5','Teaching Mrs Tingle','2020','storia','English','10'),('585173205-9','Battle Royale 2 Requiem (Batoru rowaiaru II Chinkonka)','2018','giurisprudenza','English','2'),('594275024-6','Memory Keeper s Daughter The','2012','medicina','English','5'),('595626866-2','Rollerball','2014','lingue','Hungarian','7'),('600597433-5','Wall Street','2020','lingue','English','7'),('601546113-6','1208 East of Bucharest','2011','storia','Gujarati','9'),('607745120-7','HTM & CSS','2018','informatica','Italian','1'),('611928800-7','Cyrano de Bergerac','2017','lingue','Korean','7'),('653073623-9','Act Da Fool','2020','storia','English','9'),('653175736-1','Happy People A Year in the Taiga','2012','storia','Swedish','8'),('657583349-7','Knack and How to Get It The','2015','giurisprudenza','English','1'),('660038142-6','Stonewall','2016','giurisprudenza','Icelandic','2'),('661872594-1','Woman on the Beach (Haebyeonui yeoin)','2020','giurisprudenza','English','3'),('663119553-5','Deadline','2015','lingue','Spanish','7'),('666013383-6','Lost City The','2014','storia','English','10'),('671158165-2','Nick and Norah s Infinite Playlist','2019','lingue','Czech','6'),('672217513-8','Heaven s Prisoners','2014','storia','Bengali','10'),('672560381-5','Day the Universe Changed The','2018','medicina','Northern Sotho','4'),('698429931-4','Lone Ranger The','2011','giurisprudenza','Icelandic','3'),('711604128-1','Crocodile Hunter Collision Course The','2014','storia','English','10'),('712463375-3','Fear','2012','informatica','English','1'),('733508116-5','Angels  Share The','2017','storia','English','9'),('740153355-3','Fundamentals of Database Systems','2019','giurisprudenza','Italian','2'),('742437654-3','Under the Bridges','2016','storia','Swedish','9'),('744780754-0','Times Square','2020','lingue','English','7'),('752213396-3','Brides (Nyfes)','2012','medicina','Georgian','6'),('756564271-1','Little Children','2014','storia','English','10'),('760264513-8','Story of My Life The','2012','storia','English','8'),('768148078-1','Kleines Arschloch - Der Film','2017','lingue','Korean','7'),('769740772-8','Hollywood Party','2018','lingue','English','7'),('775940054-3','I m Reed Fish','2017','storia','Kashmiri','10'),('786395256-5','Dragon Ball Z Bio-Broly (Doragon bôru Z 11 Sûpâ senshi gekiha! Katsu no wa ore da)','2019','lingue','English','7'),('801081738-4','Murder by Proxy How America Went Postal','2019','lingue','English','7'),('814543114-X','Ingeborg Holm','2013','giurisprudenza','English','3'),('816886703-3','Split Second','2012','medicina','Italian','4'),('825867311-4','Kairat','2013','giurisprudenza','Hiri Motu','2'),('829509196-4','Shaka Zulu The Citadel','2014','storia','Swedish','10'),('829914597-X','Project X','2019','storia','English','9'),('836374770-X','Wolf Man The','2013','storia','Indonesian','8'),('843331705-9','Avengers The','2012','giurisprudenza','Bengali','1'),('851106761-2','Chronicle of a Summer (Chronique d un été)','2019','giurisprudenza','Italian','3'),('857627191-5','Larceny Inc','2012','storia','English','9'),('860964250-X','Iron Horse The','2013','storia','Japanese','10'),('863050834-5','Richard III','2019','lingue','Chinese','8'),('867778553-1','Hot Fuzz','2012','giurisprudenza','Polish','2'),('870560200-9','Eight Crazy Nights','2018','informatica','English','1'),('872379238-8','From Above','2018','giurisprudenza','English','1'),('875127371-3','Million Ways to Die in the West A','2014','storia','Norwegian','10'),('887526619-0','Thieves The (Dodookdeul)','2011','medicina','Romanian','6'),('925812482-0','Kumail Nanjiani Beta Male ','2010','giurisprudenza','German','2'),('927994979-9','Missionary Man','2017','lingue','Dhivehi','8'),('945660604-X','Cassandra Crossing The','2016','storia','Arabic','10'),('946684198-X','Absolute Power','2016','giurisprudenza','Czech','1'),('947990234-6','Peculiarities of the National Hunt (Osobennosti natsionalnoy okhoty) ','2019','giurisprudenza','English','2'),('951964371-0','Iron Mask The','2014','giurisprudenza','Bengali','2'),('966859767-2','Sting II The','2020','storia','English','9'),('970334328-7','Forbidden Christ The','2019','storia','Danish','9'),('976860084-5','Krrish','2016','storia','English','8'),('978061177-0','Kirikou and the Wild Beast (Kirikou et les bêtes sauvages)','2010','lingue','Khmer','7'),('989371762-0','Convoy','2015','lingue','German','6'),('992229254-8','And Nobody Weeps for Me (Und keiner weint mir nach)','2017','medicina','Italian','4'),('998941371-1','Stupid Boy (Garçon stupide)','2013','medicina','Italian','5');
/*!40000 ALTER TABLE `LIBRO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PRESTITO`
--

DROP TABLE IF EXISTS `PRESTITO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `PRESTITO` (
  `ID` int NOT NULL,
  `DataPrestito` date NOT NULL,
  `ContProroghe` int NOT NULL,
  `NumeroCopia` int DEFAULT NULL,
  `ISBN` char(13) DEFAULT NULL,
  `Matricola` varchar(10) DEFAULT NULL,
  `CodiceB` varchar(10) DEFAULT NULL,
  `isRestituito` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `NumeroCopia` (`NumeroCopia`),
  KEY `ISBN` (`ISBN`),
  KEY `Matricola` (`Matricola`),
  KEY `CodiceB` (`CodiceB`),
  CONSTRAINT `PRESTITO_ibfk_1` FOREIGN KEY (`NumeroCopia`) REFERENCES `COPIA` (`Numero`) ON UPDATE CASCADE,
  CONSTRAINT `PRESTITO_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `LIBRO` (`ISBN`) ON UPDATE CASCADE,
  CONSTRAINT `PRESTITO_ibfk_3` FOREIGN KEY (`Matricola`) REFERENCES `STUDENTE` (`Matricola`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PRESTITO_ibfk_4` FOREIGN KEY (`CodiceB`) REFERENCES `BIBLIOTECA` (`CodiceBiblioteca`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PRESTITO`
--

LOCK TABLES `PRESTITO` WRITE;
/*!40000 ALTER TABLE `PRESTITO` DISABLE KEYS */;
/*!40000 ALTER TABLE `PRESTITO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SCRIVE`
--

DROP TABLE IF EXISTS `SCRIVE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `SCRIVE` (
  `ISBN` char(13) NOT NULL,
  `CodiceA` varchar(10) NOT NULL,
  PRIMARY KEY (`ISBN`,`CodiceA`),
  KEY `CodiceA` (`CodiceA`),
  CONSTRAINT `SCRIVE_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `LIBRO` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `SCRIVE_ibfk_2` FOREIGN KEY (`CodiceA`) REFERENCES `AUTORE` (`CodiceAutore`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SCRIVE`
--

LOCK TABLES `SCRIVE` WRITE;
/*!40000 ALTER TABLE `SCRIVE` DISABLE KEYS */;
INSERT INTO `SCRIVE` VALUES ('052706515-3','1'),('129488690-8','1'),('584224789-5','1'),('843331705-9','1'),('004023598-X','10'),('384050463-5','10'),('389625239-9','10'),('594275024-6','10'),('836374770-X','10'),('970334328-7','10'),('170243376-5','100'),('515279116-1','100'),('666013383-6','100'),('000369692-8','11'),('271280652-2','11'),('507124152-8','11'),('594275024-6','11'),('086031288-7','12'),('394873350-3','12'),('469785019-X','12'),('872379238-8','12'),('947990234-6','12'),('976860084-5','12'),('255439894-1','13'),('404884623-X','13'),('421128511-4','13'),('989371762-0','13'),('023019395-1','14'),('136964378-0','14'),('343838580-5','14'),('368990830-2','14'),('421308038-2','14'),('521329516-9','14'),('554021569-9','14'),('560211284-7','14'),('875127371-3','14'),('101215590-0','15'),('526942871-7','15'),('801081738-4','15'),('343838580-5','16'),('405663612-5','16'),('816886703-3','16'),('843331705-9','16'),('887526619-0','16'),('992229254-8','16'),('255439894-1','17'),('290005808-2','17'),('371268896-2','17'),('372098427-3','17'),('136320382-7','18'),('253760945-X','18'),('256739345-5','18'),('368990830-2','18'),('521329516-9','18'),('536751983-0','18'),('594275024-6','18'),('976860084-5','18'),('022938411-0','19'),('364615054-8','19'),('663119553-5','19'),('875127371-3','19'),('887526619-0','19'),('946684198-X','19'),('989371762-0','19'),('086031288-7','2'),('101215590-0','2'),('226372696-9','2'),('253760945-X','2'),('331424241-7','2'),('384050463-5','2'),('394873350-3','2'),('814543114-X','2'),('184722570-5','20'),('385828979-5','20'),('457456450-4','20'),('536751983-0','20'),('565659819-5','20'),('585173205-9','20'),('666013383-6','20'),('083845517-4','21'),('542931356-4','21'),('595626866-2','21'),('657583349-7','21'),('009140312-X','22'),('214940353-6','22'),('386397507-3','22'),('672560381-5','22'),('860964250-X','22'),('945660604-X','22'),('065646345-7','23'),('368515943-7','23'),('376459959-6','23'),('521847642-0','23'),('657583349-7','23'),('671158165-2','23'),('786395256-5','23'),('004023598-X','24'),('394873350-3','24'),('526942871-7','24'),('756564271-1','24'),('168316748-1','25'),('280992700-6','25'),('672560381-5','25'),('945660604-X','25'),('167947701-3','26'),('372098427-3','26'),('469785019-X','26'),('502714957-3','26'),('769740772-8','26'),('147191251-5','27'),('165632171-8','27'),('368990830-2','27'),('385828979-5','27'),('517581126-6','27'),('584224789-5','27'),('711604128-1','27'),('825867311-4','27'),('851106761-2','27'),('860964250-X','27'),('672560381-5','28'),('698429931-4','28'),('421128511-4','29'),('510453377-8','29'),('542931356-4','29'),('371268896-2','3'),('515279116-1','3'),('829509196-4','3'),('829914597-X','3'),('992229254-8','3'),('093035174-6','30'),('101215590-0','30'),('296111646-5','30'),('584224789-5','30'),('976860084-5','30'),('265972215-3','31'),('356414253-3','31'),('585173205-9','31'),('970334328-7','31'),('436501926-0','32'),('179592990-1','33'),('425111017-X','33'),('565659819-5','33'),('927994979-9','33'),('351898785-2','34'),('510453377-8','34'),('131544489-5','35'),('168316748-1','35'),('216013488-0','35'),('435456826-8','35'),('469863297-8','35'),('554021569-9','35'),('299282269-8','36'),('585173205-9','36'),('801081738-4','36'),('860964250-X','36'),('343838580-5','37'),('421308038-2','37'),('469785019-X','37'),('510453377-8','37'),('517581126-6','37'),('296111646-5','38'),('441842932-8','38'),('457456450-4','38'),('945660604-X','38'),('022938411-0','39'),('167947701-3','39'),('347737564-5','39'),('351898785-2','39'),('280992700-6','4'),('515279116-1','4'),('131544489-5','40'),('296111646-5','40'),('385828979-5','40'),('404884623-X','40'),('925812482-0','40'),('009047587-9','41'),('184722570-5','41'),('432587582-4','41'),('698429931-4','41'),('870560200-9','41'),('887526619-0','41'),('998941371-1','41'),('132261731-7','42'),('386397507-3','42'),('542931356-4','42'),('666013383-6','42'),('752213396-3','42'),('825867311-4','42'),('976860084-5','42'),('992229254-8','42'),('356414253-3','43'),('385828979-5','43'),('386397507-3','43'),('526942871-7','43'),('829509196-4','43'),('857627191-5','43'),('385828979-5','44'),('386397507-3','44'),('536751983-0','44'),('653175736-1','44'),('744780754-0','44'),('006821799-4','45'),('271280652-2','45'),('560797299-2','45'),('711604128-1','45'),('368990830-2','46'),('507124152-8','46'),('600597433-5','46'),('814543114-X','46'),('000369692-8','47'),('015674765-0','47'),('404884623-X','47'),('611928800-7','47'),('711604128-1','47'),('712463375-3','47'),('085745713-6','48'),('226372696-9','48'),('405663612-5','48'),('502714957-3','48'),('521847642-0','48'),('712463375-3','48'),('976860084-5','48'),('175205668-X','49'),('284203566-6','49'),('343838580-5','49'),('347737564-5','49'),('441842932-8','49'),('875127371-3','49'),('978061177-0','49'),('192373118-1','5'),('384050463-5','5'),('653175736-1','5'),('087133062-8','50'),('175205668-X','50'),('253760945-X','50'),('265972215-3','50'),('333748888-9','50'),('435456826-8','50'),('436501926-0','50'),('976860084-5','50'),('175205668-X','51'),('264788349-1','51'),('432587582-4','51'),('515279116-1','51'),('542931356-4','51'),('698429931-4','51'),('860964250-X','51'),('989371762-0','51'),('023019395-1','52'),('184722570-5','52'),('259418123-4','52'),('542931356-4','52'),('607745120-7','52'),('158999545-7','53'),('384050463-5','53'),('391578830-9','53'),('515279116-1','53'),('607745120-7','53'),('863050834-5','53'),('887526619-0','53'),('014330257-4','54'),('226372696-9','54'),('299282269-8','54'),('421128511-4','54'),('740153355-3','54'),('872379238-8','54'),('945660604-X','54'),('226372696-9','55'),('368968937-6','55'),('515279116-1','55'),('666013383-6','55'),('836374770-X','55'),('843331705-9','55'),('050916783-7','56'),('226372696-9','56'),('299282269-8','56'),('331424241-7','56'),('584224789-5','56'),('101215590-0','57'),('331424241-7','57'),('457456450-4','57'),('509808775-9','57'),('698429931-4','57'),('369048652-1','58'),('457456450-4','58'),('653175736-1','58'),('182342356-6','59'),('214940353-6','59'),('368515943-7','59'),('457456450-4','59'),('775940054-3','59'),('190222315-2','6'),('368968937-6','6'),('526942871-7','6'),('925812482-0','6'),('369048652-1','60'),('970334328-7','60'),('050916783-7','61'),('182342356-6','61'),('256739345-5','61'),('271280652-2','61'),('347737564-5','61'),('421128511-4','61'),('672560381-5','61'),('946684198-X','61'),('009140312-X','62'),('103300276-3','62'),('167947701-3','62'),('554021569-9','62'),('970334328-7','62'),('087133062-8','63'),('093035174-6','63'),('346481000-3','63'),('449571196-2','63'),('501862280-6','63'),('516983356-3','63'),('653175736-1','63'),('744780754-0','63'),('872379238-8','63'),('976860084-5','63'),('060088686-7','64'),('065646345-7','64'),('075305079-X','64'),('259579784-0','64'),('284203566-6','64'),('292051296-X','64'),('299282269-8','64'),('769740772-8','64'),('851106761-2','64'),('872379238-8','64'),('006821799-4','65'),('103300276-3','65'),('259579784-0','65'),('343838580-5','65'),('421308038-2','65'),('872379238-8','65'),('970334328-7','65'),('976860084-5','65'),('601546113-6','66'),('825867311-4','66'),('857627191-5','66'),('863050834-5','66'),('872379238-8','66'),('300485539-9','67'),('362309208-8','67'),('387623794-7','67'),('492112694-1','67'),('554021569-9','67'),('740153355-3','67'),('752213396-3','67'),('836374770-X','67'),('872379238-8','67'),('009047587-9','68'),('023019395-1','68'),('264788349-1','68'),('565659819-5','68'),('595626866-2','68'),('023019395-1','69'),('068254989-4','69'),('093035174-6','69'),('526942871-7','69'),('565659819-5','69'),('760264513-8','69'),('769740772-8','69'),('989371762-0','69'),('015674765-0','7'),('060088686-7','7'),('137066182-7','7'),('947990234-6','7'),('182342356-6','70'),('366292343-2','70'),('492112694-1','70'),('006821799-4','71'),('132261731-7','71'),('271280652-2','71'),('300485539-9','71'),('366292343-2','71'),('376459959-6','71'),('441842932-8','71'),('925812482-0','71'),('015674765-0','72'),('103300276-3','72'),('366292343-2','72'),('947990234-6','72'),('022938411-0','73'),('060088686-7','73'),('136320382-7','73'),('147191251-5','73'),('158999545-7','73'),('387623794-7','73'),('004023598-X','74'),('132261731-7','74'),('387623794-7','74'),('425111017-X','74'),('666013383-6','74'),('296111646-5','75'),('660038142-6','75'),('136964378-0','76'),('179592990-1','76'),('405663612-5','76'),('672560381-5','76'),('867778553-1','76'),('014330257-4','77'),('076691563-8','77'),('284203566-6','77'),('594275024-6','77'),('666013383-6','77'),('867778553-1','77'),('875127371-3','77'),('216013488-0','78'),('376459959-6','78'),('469863297-8','78'),('492112694-1','78'),('507124152-8','78'),('752213396-3','78'),('756564271-1','78'),('004023598-X','79'),('055417113-9','79'),('147191251-5','79'),('171208472-0','79'),('507124152-8','79'),('769740772-8','79'),('857627191-5','79'),('065646345-7','8'),('068254989-4','8'),('301170811-8','8'),('385828979-5','8'),('756564271-1','8'),('829914597-X','8'),('976860084-5','8'),('216013488-0','80'),('432587582-4','80'),('502714957-3','80'),('507124152-8','80'),('829914597-X','80'),('190222315-2','81'),('507124152-8','81'),('966859767-2','81'),('009140312-X','82'),('364615054-8','82'),('653073623-9','82'),('296111646-5','83'),('364615054-8','83'),('786395256-5','83'),('052706515-3','84'),('661872594-1','84'),('925812482-0','84'),('970334328-7','84'),('182342356-6','85'),('264788349-1','85'),('857627191-5','85'),('925812482-0','85'),('976860084-5','85'),('101215590-0','86'),('515279116-1','86'),('601546113-6','86'),('925812482-0','86'),('129488690-8','87'),('222223087-X','87'),('368968937-6','87'),('394873350-3','87'),('405663612-5','87'),('661872594-1','87'),('666013383-6','87'),('951964371-0','87'),('000369692-8','88'),('132261731-7','88'),('216013488-0','88'),('405663612-5','88'),('425111017-X','88'),('671158165-2','88'),('742437654-3','88'),('280992700-6','89'),('333748888-9','89'),('515279116-1','89'),('672217513-8','89'),('966859767-2','89'),('300485539-9','9'),('404884623-X','9'),('560211284-7','9'),('672560381-5','9'),('927994979-9','9'),('946684198-X','9'),('376459959-6','90'),('405663612-5','90'),('740153355-3','90'),('851106761-2','90'),('301170811-8','91'),('368968937-6','91'),('945660604-X','91'),('065646345-7','92'),('065646345-7','93'),('259579784-0','93'),('672560381-5','93'),('055417113-9','94'),('093035174-6','94'),('356414253-3','94'),('744780754-0','94'),('887526619-0','94'),('978061177-0','94'),('194862546-6','95'),('860964250-X','95'),('672217513-8','96'),('672560381-5','96'),('775940054-3','96'),('786395256-5','96'),('816886703-3','96'),('863050834-5','96'),('052706515-3','97'),('404884623-X','97'),('768148078-1','97'),('192373118-1','98'),('733508116-5','98'),('168316748-1','99'),('372098427-3','99'),('521329516-9','99'),('760264513-8','99');
/*!40000 ALTER TABLE `SCRIVE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `STUDENTE`
--

DROP TABLE IF EXISTS `STUDENTE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `STUDENTE` (
  `Matricola` varchar(10) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `Sesso` char(2) NOT NULL,
  `CdS` varchar(20) NOT NULL,
  `Via` varchar(50) NOT NULL,
  `Citta` varchar(50) NOT NULL,
  `CAP` char(5) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Data_n` date NOT NULL,
  PRIMARY KEY (`Matricola`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `STUDENTE`
--

LOCK TABLES `STUDENTE` WRITE;
/*!40000 ALTER TABLE `STUDENTE` DISABLE KEYS */;
INSERT INTO `STUDENTE` VALUES ('123456','Giuseppe','Verdi','','Economia','Via G. Verdi, 3','Firenze','12234','giuseppe.verdi@student.unife.it','3823809223','2020-06-03'),('125442','Stella','Mancini','F','Filosofia','Via Santa Teresa degli Scalzi, 73','Collesano','90016','StellaMancini@student.unife.it','0392 8395443','1963-07-23'),('139158','Abelardo ','Esposito','M','Storia','Via Zannoni, 96','Sover','38048','AbelardoEsposito@student.unife.it','0396 8293836','1977-12-07'),('144599','Enrico','Bregoli','','Informatica','Via dei Bersaglieri, 4','Taglio di Po','45019','enrico.bregoli@student.unife.it','3338087889','1999-06-18'),('152707','Nestore','Manna','M','Economia','Via Nicolai, 108','Sovramonte','32030','NestoreManna@student.unife.it','0382 9638543','1997-03-03'),('173402','Vincenza ','Folliero','F','Medicina','Corso Vittorio Emanuale, 89','Massa E Cozzile','51010','VincenzaFolliero@student.unife.it','0384 8175274','1945-04-23'),('175047','Bonifacio','Piccio','M','Economia','Via Longhena, 99','Filacciano','60223','BonifacioPiccio@student.unife.it','0327 0745156','1989-08-18'),('187895','Matteo ','Mazzi ','M','Informatica ','Via Medina, 5  ','Fogliano Redipuglia','34070','MatteoMazzi@student.unife.it','0329 0307181','1993-02-18'),('195414','Cassio ','Sal','M','Matematica','Via Solfatara, 61','Villa San Secondo','14020','CassioSal@student.unife.it','0375 4698144','1950-11-04'),('261109','Veronica ','Trevisan','F','Informatica','Via Campi Flegrei, 13','Bari','70124','VeronicaTrevisan@student.unife.it','0388 4544315','1948-06-21'),('373877','Cettina ','De Luca','F','Storia','Via San Cosmo fuori Porta Nolana, 98','Palazzolo Milanese','20030','CettinaDeLuca@student.unife.it','0345 5468307','1965-04-03'),('426508','Gennaro ','Genovese','M','Matematica','Via Giulio Camuzzoni, 143','Scido','89010','GennaroGenovese@student.unife.it','0312 6532827','2001-05-30'),('470707','Fortunato ','Rossi','M','Storia dell\'Arte','Via Piave, 62','San Mazzeo','88048','FortunatoRossi@student.unife.it','0343 9810011','1976-09-08'),('482958','Aurelio ','Pinto','M','Economia','Via Santa Lucia, 53','Fratticiola Selvatica ','6020','AurelioPinto@student.unife.it','0326 8033560','1948-11-14'),('483978','Olinto ','Padovesi','M','Storia dell\'Arte','Strada Bresciana, 5','Valdidentro','23038','OlintoPadovesi@student.unife.it','0349 2547964','1971-09-09');
/*!40000 ALTER TABLE `STUDENTE` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-03 18:21:50
