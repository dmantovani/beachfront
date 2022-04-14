# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.32)
# Base de datos: beachfront
# Tiempo de Generación: 2022-04-14 21:07:13 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla config
# ------------------------------------------------------------

DROP TABLE IF EXISTS `config`;

CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(250) DEFAULT NULL,
  `page_desc` longtext,
  `hero_title` varchar(250) DEFAULT NULL,
  `hero_desc` varchar(255) DEFAULT NULL,
  `intro_text` varchar(255) DEFAULT NULL,
  `lang` int(11) DEFAULT NULL,
  `uniq` int(11) DEFAULT NULL,
  `our_yatch_title` varchar(255) DEFAULT NULL,
  `our_yatch_desc` varchar(255) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;

INSERT INTO `config` (`id`, `page_title`, `page_desc`, `hero_title`, `hero_desc`, `intro_text`, `lang`, `uniq`, `our_yatch_title`, `our_yatch_desc`)
VALUES
	(1,'Page title','Page desc','EXPERIENCE THE BEACHFRONT MOTORYACHT','ENJOY THE FREEDOM OF CRUSING IN THE BAHAMAS.','Let’s sail, relax and take a dive in the<br> Caribbean Sea. Elevate your next vacation and get <br> away to an unforgettable trip. ',5,1,'OUR<BR> YATCH.','Built in 2006 by Hargrave Yachts <BR> and refitted in 2021, with 108ft. in length <BR>where every comfort is met. <BR> Our crew is ready to make your vacation <BR> as seamless as possible. <BR>'),
	(1,'asd','','','','',9,1,'',''),
	(1,'','','','','',10,1,'','');

/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla contacts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `added_at` int(11) DEFAULT NULL,
  `modified_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `message`, `added_at`, `modified_at`)
VALUES
	(1,'Diego','+5493516664794','diego.mantovani@gmail.com','test',NULL,NULL);

/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla countries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `country` varchar(250) NOT NULL,
  `shortname` varchar(2) NOT NULL,
  `language` varchar(255) NOT NULL,
  `ContactData` text NOT NULL,
  `webEmailContact` varchar(255) NOT NULL,
  `supportEmailContact` varchar(255) NOT NULL,
  `salesEmailContact` varchar(255) NOT NULL,
  `facebookUrl` varchar(255) NOT NULL,
  `twitterUrl` varchar(255) NOT NULL,
  `instagramUrl` varchar(255) NOT NULL,
  `gplusUrl` varchar(255) NOT NULL,
  `youtubeUrl` varchar(255) NOT NULL,
  `newsletter` int(1) NOT NULL DEFAULT '1',
  `product_register` int(1) NOT NULL DEFAULT '1',
  `service_centers` int(1) NOT NULL DEFAULT '1',
  `employ` int(1) NOT NULL DEFAULT '1',
  `center_service` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;

INSERT INTO `countries` (`id`, `country`, `shortname`, `language`, `ContactData`, `webEmailContact`, `supportEmailContact`, `salesEmailContact`, `facebookUrl`, `twitterUrl`, `instagramUrl`, `gplusUrl`, `youtubeUrl`, `newsletter`, `product_register`, `service_centers`, `employ`, `center_service`)
VALUES
	(1,'Mexico','mx','spanish','','','','','','','','','',1,1,1,1,''),
	(2,'Argentina','ar','spanish','','','','','','','','','',1,1,1,1,''),
	(3,'Chile','cl','spanish','','','','','','','','','',1,1,1,1,''),
	(4,'International','us','english','','','','','','','','','',1,1,1,1,''),
	(5,'Brasil','br','portuguese','','','','','','','','','',1,1,1,1,''),
	(6,'Colombia','co','spanish','','','','','','','','','',1,1,1,1,''),
	(7,'Puerto Rico','pr','spanish','','','','','','','','','',1,1,1,1,'');

/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla destinations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `destinations`;

CREATE TABLE `destinations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(100) DEFAULT NULL,
  `image_home` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `added_at` int(11) DEFAULT NULL,
  `modified_at` int(11) DEFAULT NULL,
  `lang` int(11) DEFAULT NULL,
  `uniq` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `destinations` WRITE;
/*!40000 ALTER TABLE `destinations` DISABLE KEYS */;

INSERT INTO `destinations` (`id`, `image`, `image_home`, `title`, `description`, `added_at`, `modified_at`, `lang`, `uniq`)
VALUES
	(5,'1649184136987_destination1.png','1649195487783_home_dest1.png','Destino 1','testo de destino 1',NULL,NULL,5,5),
	(6,'1649184136987_destination1.png','1649195487783_home_dest1.png','','',NULL,NULL,9,5),
	(7,'1649184136987_destination1.png','1649195487783_home_dest1.png','','',NULL,NULL,10,5),
	(11,'1649184147886_destination1.png','1649195650805_home_dest1.png','Destino 2','Texto de destino 2',NULL,NULL,5,11),
	(12,'1649184147886_destination1.png','1649195650805_home_dest1.png','','',NULL,NULL,9,11),
	(13,'1649184147886_destination1.png','1649195650805_home_dest1.png','','',NULL,NULL,10,11),
	(14,'1649184155610_destination1.png','1649195657646_home_dest1.png','Destino 3','Texto de desitno 3',NULL,NULL,5,14),
	(15,'1649184155610_destination1.png','1649195657646_home_dest1.png','','',NULL,NULL,9,14),
	(16,'1649184155610_destination1.png','1649195657646_home_dest1.png','','',NULL,NULL,10,14);

/*!40000 ALTER TABLE `destinations` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla gallery
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(100) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `uniq` int(11) DEFAULT NULL,
  `lang` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `added_at` int(11) DEFAULT NULL,
  `modified_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;

INSERT INTO `gallery` (`id`, `image`, `cat_id`, `uniq`, `lang`, `title`, `description`, `added_at`, `modified_at`)
VALUES
	(1,'1649199742359_gallery1.png',10,1,5,'exterior1','exterior1',NULL,NULL),
	(2,'1649199742359_gallery1.png',10,1,9,'','',NULL,NULL),
	(3,'1649199742359_gallery1.png',10,1,10,'','',NULL,NULL),
	(4,'1649199759388_gallery3.png',10,4,5,'exterior2','exterior2',NULL,NULL),
	(5,'1649199759388_gallery3.png',10,4,9,'','',NULL,NULL),
	(6,'1649199759388_gallery3.png',10,4,10,'','',NULL,NULL),
	(7,'1649199771812_gallery6.png',10,7,5,'exterior3','exterior3',NULL,NULL),
	(8,'1649199771812_gallery6.png',10,7,9,'','',NULL,NULL),
	(9,'1649199771812_gallery6.png',10,7,10,'','',NULL,NULL),
	(10,'1649199786902_gallery2.png',19,10,5,'life1','life1',NULL,NULL),
	(11,'1649199786902_gallery2.png',19,10,9,'','',NULL,NULL),
	(12,'1649199786902_gallery2.png',19,10,10,'','',NULL,NULL),
	(13,'1649199797897_gallery10.png',19,13,5,'life2','life2',NULL,NULL),
	(14,'1649199797897_gallery10.png',19,13,9,'','',NULL,NULL),
	(15,'1649199797897_gallery10.png',19,13,10,'','',NULL,NULL),
	(16,'1649199834790_gallery9.png',13,16,5,'cabin1','cabin1',NULL,NULL),
	(17,'1649199834790_gallery9.png',13,16,9,'','',NULL,NULL),
	(18,'1649199834790_gallery9.png',13,16,10,'','',NULL,NULL),
	(19,'1649199843373_gallery13.png',13,19,5,'cabin2','cabin2',NULL,NULL),
	(20,'1649199843373_gallery13.png',13,19,9,'','',NULL,NULL),
	(21,'1649199843373_gallery13.png',13,19,10,'','',NULL,NULL),
	(22,'1649199852506_gallery14.png',13,22,5,'cabin3','cabin3',NULL,NULL),
	(23,'1649199852506_gallery14.png',13,22,9,'','',NULL,NULL),
	(24,'1649199852506_gallery14.png',13,22,10,'','',NULL,NULL);

/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla gallery_cat
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gallery_cat`;

CREATE TABLE `gallery_cat` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `uniq` int(11) DEFAULT NULL,
  `lang` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `gallery_cat` WRITE;
/*!40000 ALTER TABLE `gallery_cat` DISABLE KEYS */;

INSERT INTO `gallery_cat` (`id`, `title`, `image`, `uniq`, `lang`)
VALUES
	(10,'EXTERIOR DECK','1649197376875_cat_exterior_deck.png',10,5),
	(11,'','1649197376875_cat_exterior_deck.png',10,9),
	(12,'','1649197376875_cat_exterior_deck.png',10,10),
	(13,'CABINS','1649197408476_cat_cabins.png',13,5),
	(14,'','1649197408476_cat_cabins.png',13,9),
	(15,'','1649197408476_cat_cabins.png',13,10),
	(16,'INTERIOR DECK','1649197426766_cat_interior_deck.png',16,5),
	(17,'','1649197426766_cat_interior_deck.png',16,9),
	(18,'','1649197426766_cat_interior_deck.png',16,10),
	(19,'LIFE ON BOARD','1649197439166_cat_life_on_board.png',19,5),
	(20,'','1649197439166_cat_life_on_board.png',19,9),
	(21,'','1649197439166_cat_life_on_board.png',19,10);

/*!40000 ALTER TABLE `gallery_cat` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla lang
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lang`;

CREATE TABLE `lang` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `abr` varchar(55) DEFAULT NULL,
  `lang_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `lang` WRITE;
/*!40000 ALTER TABLE `lang` DISABLE KEYS */;

INSERT INTO `lang` (`id`, `titulo`, `abr`, `lang_name`)
VALUES
	(5,'Español','es','spanish'),
	(9,'Portugues','pt','portuguese'),
	(10,'Ingles','en','english');

/*!40000 ALTER TABLE `lang` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla user_login
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_login`;

CREATE TABLE `user_login` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `administrator` int(1) NOT NULL,
  `provinciaId` int(20) NOT NULL,
  `vendedor_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `user_login` WRITE;
/*!40000 ALTER TABLE `user_login` DISABLE KEYS */;

INSERT INTO `user_login` (`id`, `name`, `lastname`, `rol_id`, `user_name`, `user_password`, `user_email`, `administrator`, `provinciaId`, `vendedor_id`)
VALUES
	(64,'admin','admin',NULL,'admin','1a9450a90520fdc888c3c40a748c453d','NOMODIFICAR@oxford.com',1,11,0);

/*!40000 ALTER TABLE `user_login` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
