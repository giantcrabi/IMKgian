/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.1.10-MariaDB : Database - findoct
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`findoct` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `findoct`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

/*Table structure for table `dokter` */

DROP TABLE IF EXISTS `dokter`;

CREATE TABLE `dokter` (
  `Email` varchar(100) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `Gelar` varchar(20) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dokter` */

insert  into `dokter`(`Email`,`Nama`,`Foto`,`Gelar`) values ('dokterarya@gmail.com','Arya','arya.jpg','dr.Umum'),('dokterdewa@gmail.com','Dewa','dewa.jpg','Sp.Bedah'),('dokterdwi@gmail.com','Dwi','dwi.jpg','dr.Umum'),('dokterwawan@gmail.com','Wawan','wawan.jpg','Sp.Anak'),('giantcrabi@gmail.com','Gian','gian.jpg','Sp.THT-KL');

/*Table structure for table `dokter_tpraktek` */

DROP TABLE IF EXISTS `dokter_tpraktek`;

CREATE TABLE `dokter_tpraktek` (
  `Email` varchar(100) NOT NULL,
  `IDTPraktek` int(11) NOT NULL,
  `Senin` varchar(15) DEFAULT NULL,
  `Selasa` varchar(15) DEFAULT NULL,
  `Rabu` varchar(15) DEFAULT NULL,
  `Kamis` varchar(15) DEFAULT NULL,
  `Jumat` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Email`,`IDTPraktek`),
  KEY `dokter_tpraktek_fk2` (`IDTPraktek`),
  CONSTRAINT `dokter_tpraktek_fk1` FOREIGN KEY (`Email`) REFERENCES `dokter` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dokter_tpraktek_fk2` FOREIGN KEY (`IDTPraktek`) REFERENCES `tpraktek` (`IDTPraktek`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dokter_tpraktek` */

insert  into `dokter_tpraktek`(`Email`,`IDTPraktek`,`Senin`,`Selasa`,`Rabu`,`Kamis`,`Jumat`) values ('dokterarya@gmail.com',1,'09:00 - 15:00','09:00 - 15:00','09:00 - 15:00','09:00 - 15:00','-'),('dokterdewa@gmail.com',6,'10:00 - 16:00','10:00 - 16:00','10:00 - 16:00','10:00 - 16:00','10:00 - 16:00'),('dokterdwi@gmail.com',3,'10:00 - 16:00','10:00 - 16:00','10:00 - 16:00','10:00 - 16:00','10:00 - 16:00'),('dokterwawan@gmail.com',5,'13:00 - 15:00','15:00 - 17:00','13:00 - 15:00','15:00 - 17:00','-'),('dokterwawan@gmail.com',7,'16:00 - 20:00','10:00 - 14:00','16:00 - 20:00','10:00 - 14:00','16:00 - 20:00'),('giantcrabi@gmail.com',1,'15:00 - 17:00','13:00 - 15:00','15:00 - 17:00','13:00 - 15:00','-');

/*Table structure for table `tpraktek` */

DROP TABLE IF EXISTS `tpraktek`;

CREATE TABLE `tpraktek` (
  `IDTPraktek` int(11) NOT NULL AUTO_INCREMENT,
  `NamaTPraktek` varchar(50) NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Kota` varchar(50) NOT NULL,
  `Provinsi` varchar(50) NOT NULL,
  `KodePos` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`IDTPraktek`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tpraktek` */

insert  into `tpraktek`(`IDTPraktek`,`NamaTPraktek`,`Foto`,`Alamat`,`Kota`,`Provinsi`,`KodePos`) values (1,'Siloam Hospital','siloam.jpg','Jl. Karimun Jawa No.3, Gubeng','Surabaya','Jawa Timur',NULL),(3,'Rumah Sakit Umum Haji Surabaya','rs-haji.jpg','Jl. Manyar Kertoadi No.11, Klampis Ngasem','Surabaya','Jawa Timur',NULL),(5,'Rumah Sakit Premier Surabaya','RSU_Soetomo.jpg','Nginden Intan Barat Blok C1 No.54','Surabaya','Jawa Timur',NULL),(6,'Rumah Sakit Husada Utama','RS-husada-utama.jpg','Jl. Dharmawangsa No.10, Airlangga, Gubeng','Surabaya','Jawa Timur',NULL),(7,'Rumah Sakit William Booth','william.jpg','Jl. Raya Diponegoro No.34, Darmo, Wonokromo','Surabaya','Jawa Timur',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
