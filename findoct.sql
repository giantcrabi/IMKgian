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
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dokter` */

insert  into `dokter`(`Email`,`Nama`,`Foto`) values ('giantcrabi@gmail.com','Gian','profileblank.png');

/*Table structure for table `dokter_gelar` */

DROP TABLE IF EXISTS `dokter_gelar`;

CREATE TABLE `dokter_gelar` (
  `Email` varchar(100) NOT NULL,
  `Gelar` varchar(15) NOT NULL,
  PRIMARY KEY (`Email`,`Gelar`),
  KEY `dokter_gelar_fk2` (`Gelar`),
  CONSTRAINT `dokter_gelar_fk1` FOREIGN KEY (`Email`) REFERENCES `dokter` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dokter_gelar_fk2` FOREIGN KEY (`Gelar`) REFERENCES `gelar` (`Gelar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dokter_gelar` */

insert  into `dokter_gelar`(`Email`,`Gelar`) values ('giantcrabi@gmail.com','Sp.THT-KL');

/*Table structure for table `dokter_penyakit` */

DROP TABLE IF EXISTS `dokter_penyakit`;

CREATE TABLE `dokter_penyakit` (
  `Email` varchar(100) NOT NULL,
  `NamaPenyakit` varchar(50) NOT NULL,
  PRIMARY KEY (`Email`,`NamaPenyakit`),
  KEY `dokter_penyakit_fk2` (`NamaPenyakit`),
  CONSTRAINT `dokter_penyakit_fk1` FOREIGN KEY (`Email`) REFERENCES `dokter` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dokter_penyakit_fk2` FOREIGN KEY (`NamaPenyakit`) REFERENCES `penyakit` (`NamaPenyakit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dokter_penyakit` */

insert  into `dokter_penyakit`(`Email`,`NamaPenyakit`) values ('giantcrabi@gmail.com','Sinusitis');

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

insert  into `dokter_tpraktek`(`Email`,`IDTPraktek`,`Senin`,`Selasa`,`Rabu`,`Kamis`,`Jumat`) values ('giantcrabi@gmail.com',1,'15:00-17:00','13:00-15:00','15:00-17:00','13:00-15:00',NULL);

/*Table structure for table `gelar` */

DROP TABLE IF EXISTS `gelar`;

CREATE TABLE `gelar` (
  `Gelar` varchar(15) NOT NULL,
  `NamaGelar` varchar(100) NOT NULL,
  PRIMARY KEY (`Gelar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gelar` */

insert  into `gelar`(`Gelar`,`NamaGelar`) values ('Sp.THT-KL','Spesialis Telinga Hidung Tenggorok-Bedah Kepala Leher');

/*Table structure for table `penyakit` */

DROP TABLE IF EXISTS `penyakit`;

CREATE TABLE `penyakit` (
  `NamaPenyakit` varchar(50) NOT NULL,
  PRIMARY KEY (`NamaPenyakit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penyakit` */

insert  into `penyakit`(`NamaPenyakit`) values ('Sinusitis');

/*Table structure for table `tpraktek` */

DROP TABLE IF EXISTS `tpraktek`;

CREATE TABLE `tpraktek` (
  `IDTPraktek` int(11) NOT NULL AUTO_INCREMENT,
  `NamaTPraktek` varchar(50) NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Kota` varchar(50) NOT NULL,
  `Provinsi` varchar(50) NOT NULL,
  `KodePos` varchar(10) NOT NULL,
  PRIMARY KEY (`IDTPraktek`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tpraktek` */

insert  into `tpraktek`(`IDTPraktek`,`NamaTPraktek`,`Foto`,`Alamat`,`Kota`,`Provinsi`,`KodePos`) values (1,'Rumah Sakit Mitra Keluarga','noimg.jpg','Jl. Satelit Indah No. 2','Surabaya','Jawa Timur','60187');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
