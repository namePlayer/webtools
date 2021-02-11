-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server Version:               10.4.17-MariaDB - mariadb.org binary distribution
-- Server Betriebssystem:        Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Exportiere Datenbank Struktur für webtools
CREATE DATABASE IF NOT EXISTS `webtools` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `webtools`;

-- Exportiere Struktur von Tabelle webtools.account
CREATE TABLE IF NOT EXISTS `account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL DEFAULT '',
  `password` text NOT NULL DEFAULT '',
  `firstname` text NOT NULL DEFAULT '',
  `lastname` text NOT NULL DEFAULT '',
  `role` enum('ROOT','ADMIN','USER') NOT NULL DEFAULT 'USER',
  `active` enum('true','false') NOT NULL DEFAULT 'false',
  `premium` int(11) DEFAULT 0,
  `adminnotes` text DEFAULT '',
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Daten Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle webtools.changelog
CREATE TABLE IF NOT EXISTS `changelog` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `version` text NOT NULL DEFAULT 'v0.0.0',
  `released` int(11) NOT NULL DEFAULT 0,
  `releasenotes` text NOT NULL DEFAULT '',
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Daten Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle webtools.files
CREATE TABLE IF NOT EXISTS `files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` text NOT NULL,
  `storagename` text NOT NULL,
  `owner` int(11) DEFAULT 0,
  `proccesed` enum('true','false') NOT NULL DEFAULT 'false',
  PRIMARY KEY (`file_id`),
  KEY `FK_owner` (`owner`),
  CONSTRAINT `FK_owner` FOREIGN KEY (`owner`) REFERENCES `account` (`account_id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Daten Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle webtools.server
CREATE TABLE IF NOT EXISTS `server` (
  `server_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text DEFAULT NULL,
  `ipaddress` text NOT NULL DEFAULT '',
  `port` text NOT NULL DEFAULT '',
  `process_documents` int(11) NOT NULL DEFAULT 0,
  `process_pictures` int(11) NOT NULL DEFAULT 0,
  `status` enum('online','offline') DEFAULT NULL,
  `ping` int(11) unsigned DEFAULT NULL,
  `user` text NOT NULL,
  `sshkey` text NOT NULL,
  `password` text DEFAULT NULL,
  PRIMARY KEY (`server_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Daten Export vom Benutzer nicht ausgewählt

-- Exportiere Struktur von Tabelle webtools.status
CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL DEFAULT 0,
  `title` text NOT NULL DEFAULT '',
  `description` text NOT NULL DEFAULT '',
  `status` enum('open','monitoring','maintenance','closed') NOT NULL DEFAULT 'open',
  `dash_message` tinytext NOT NULL DEFAULT '',
  `lastupdate` int(11) NOT NULL DEFAULT 0,
  `updates` longtext DEFAULT NULL,
  `automtical` enum('true','false') DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Daten Export vom Benutzer nicht ausgewählt

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
