-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for ris
CREATE DATABASE IF NOT EXISTS `ris` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ris`;


-- Dumping structure for table ris.note
CREATE TABLE IF NOT EXISTS `note` (
  `note_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`note_id`),
  KEY `FK_note_user` (`user_id`),
  CONSTRAINT `FK_note_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ris.note: ~0 rows (approximately)
/*!40000 ALTER TABLE `note` DISABLE KEYS */;
/*!40000 ALTER TABLE `note` ENABLE KEYS */;


-- Dumping structure for table ris.todo
CREATE TABLE IF NOT EXISTS `todo` (
  `todo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `content` varchar(255) NOT NULL,
  `completed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`todo_id`),
  KEY `FK_todo_user` (`user_id`),
  CONSTRAINT `FK_todo_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ris.todo: ~0 rows (approximately)
/*!40000 ALTER TABLE `todo` DISABLE KEYS */;
/*!40000 ALTER TABLE `todo` ENABLE KEYS */;


-- Dumping structure for table ris.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table ris.user: ~6 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `login`, `password`, `email`, `date_added`, `date_modified`) VALUES
  (1, 'admin', 'pass', 'email', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
  (2, 'tibi', 'passq', 'email2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
  (3, 'Grigore', 'SoparolaCEMo', 'email3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
  (4, 'ATD', 'SoparolaCE', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
  (5, 'Talibanu', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
  (6, 'Talibanu2', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
