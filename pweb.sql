/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.5.36 : Database - contoh
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`contoh` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `contoh`;

/*Table structure for table `anggota` */

DROP TABLE IF EXISTS `anggota`;

CREATE TABLE `anggota` (
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `previllage` varchar(1) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `anggota` */

insert  into `anggota`(`firstname`,`lastname`,`birthday`,`gender`,`username`,`password`,`previllage`) values ('Gian','Sebastian','0000-00-00','1','giantcrabi@gmail.com','123','U');

/*Table structure for table `articles` */

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `username` varchar(15) DEFAULT NULL,
  `title` varchar(15) NOT NULL,
  `isi` varchar(20000) DEFAULT NULL,
  UNIQUE KEY `NewIndex1` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `articles` */

insert  into `articles`(`username`,`title`,`isi`) values (NULL,'',''),(NULL,'0','0');

/*Table structure for table `dokter` */

DROP TABLE IF EXISTS `dokter`;

CREATE TABLE `dokter` (
  `KTP` char(16) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `Gelar` varchar(30) NOT NULL,
  `Bidang` varchar(50) NOT NULL,
  `Info` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`KTP`),
  UNIQUE KEY `UNIQUE` (`Username`,`KTP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dokter` */

insert  into `dokter`(`KTP`,`Username`,`Password`,`Email`,`Nama`,`Foto`,`Gelar`,`Bidang`,`Info`) values ('1234567890123455','dok10','12345','giantcrabi@gmail.com','Shiba','1429793592786s1.jpg','Sp. Bedah','ENT/THT','HAHA'),('1234567890123456','dok18','12345','giant_crabi@yahoo.com','Gian','profileblank.png','Sp. Bedah','ENT/THT','abc');

/*Table structure for table `dokter_penyakit` */

DROP TABLE IF EXISTS `dokter_penyakit`;

CREATE TABLE `dokter_penyakit` (
  `KTP` char(16) NOT NULL,
  `id_artikel` int(3) NOT NULL,
  PRIMARY KEY (`KTP`,`id_artikel`),
  KEY `id_artikel` (`id_artikel`),
  CONSTRAINT `dokter_penyakit_ibfk_1` FOREIGN KEY (`KTP`) REFERENCES `dokter` (`KTP`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dokter_penyakit_ibfk_2` FOREIGN KEY (`id_artikel`) REFERENCES `penyakit` (`id_artikel`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dokter_penyakit` */

insert  into `dokter_penyakit`(`KTP`,`id_artikel`) values ('1234567890123456',8);

/*Table structure for table `dokter_praktek` */

DROP TABLE IF EXISTS `dokter_praktek`;

CREATE TABLE `dokter_praktek` (
  `KTP` char(16) NOT NULL,
  `IDTPraktek` int(11) NOT NULL,
  `Senin` varchar(12) DEFAULT NULL,
  `Selasa` varchar(12) DEFAULT NULL,
  `Rabu` varchar(12) DEFAULT NULL,
  `Kamis` varchar(12) DEFAULT NULL,
  `Jumat` varchar(12) DEFAULT NULL,
  `Sabtu` varchar(12) DEFAULT NULL,
  `Minggu` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`KTP`,`IDTPraktek`),
  KEY `IDTPraktek` (`IDTPraktek`),
  CONSTRAINT `dokter_praktek_ibfk_1` FOREIGN KEY (`KTP`) REFERENCES `dokter` (`KTP`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dokter_praktek_ibfk_2` FOREIGN KEY (`IDTPraktek`) REFERENCES `tpraktek` (`IDTPraktek`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dokter_praktek` */

insert  into `dokter_praktek`(`KTP`,`IDTPraktek`,`Senin`,`Selasa`,`Rabu`,`Kamis`,`Jumat`,`Sabtu`,`Minggu`) values ('1234567890123456',1,'15:00-17:00','17:00-19:00','15:00-17:00','17:00-19:00','15:00-17:00','',''),('1234567890123456',2,'','','','','','','');

/*Table structure for table `donation` */

DROP TABLE IF EXISTS `donation`;

CREATE TABLE `donation` (
  `firstname` varchar(15) DEFAULT NULL,
  `lastname` varchar(15) DEFAULT NULL,
  `countrycode` varchar(5) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `jumlahuang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `donation` */

insert  into `donation`(`firstname`,`lastname`,`countrycode`,`city`,`email`,`phonenumber`,`jumlahuang`) values ('','',NULL,NULL,NULL,NULL,NULL),('dfgfd','fgf','US','dfgdg','dgdg','3424',34552),('asdf','asd','US','rete','rte','ret3',12313);

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `news` */

insert  into `news`(`id`,`title`,`slug`,`text`) values (1,'Hello World','hello-world','halo'),(2,'Ali Baba','ali-baba','hahahahaha'),(3,'HA LO','ha-lo','LO HA'),(4,'HOHOHO','hohoho','BOR'),(5,'LOL','lol','LALO'),(6,'123','123','123'),(7,'1234','1234','1234'),(8,'dewa','dewa','dewa');

/*Table structure for table `penyakit` */

DROP TABLE IF EXISTS `penyakit`;

CREATE TABLE `penyakit` (
  `id_artikel` int(3) NOT NULL AUTO_INCREMENT,
  `judul_artikel` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `deskripsi_artikel` text,
  PRIMARY KEY (`id_artikel`),
  KEY `id_artikel` (`id_artikel`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `penyakit` */

insert  into `penyakit`(`id_artikel`,`judul_artikel`,`foto`,`deskripsi_artikel`) values (8,'Rabies','noimg.jpg','abcde');

/*Table structure for table `tpraktek` */

DROP TABLE IF EXISTS `tpraktek`;

CREATE TABLE `tpraktek` (
  `IDTPraktek` int(11) NOT NULL AUTO_INCREMENT,
  `NamaT` varchar(50) NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Kota` varchar(50) NOT NULL,
  `Provinsi` varchar(50) NOT NULL,
  `KodePos` varchar(10) NOT NULL,
  PRIMARY KEY (`IDTPraktek`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tpraktek` */

insert  into `tpraktek`(`IDTPraktek`,`NamaT`,`Foto`,`Alamat`,`Kota`,`Provinsi`,`KodePos`) values (1,'Rumah Sakit Mitra Keluarga','noimg.jpg','Jl. Satelit Indah No. 2','Surabaya','Jawa Timur','60187'),(2,'Rumah Sakit Umum Haji Surabaya','noimg.jpg','Klampis Ngasem','Surabaya','Jawa Timur','60116');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `phonenumber` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `country` varchar(15) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`username`,`password`,`firstname`,`lastname`,`email`,`phonenumber`,`gender`,`birthdate`,`country`,`city`) values ('hari','asa','sdfsgdsagsadg',';ndf;','jndkvjnq','nksjdn','woman','2015-05-05','jwqdn','dsf');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
