-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour forum_roman
CREATE DATABASE IF NOT EXISTS `forum_roman` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `forum_roman`;

-- Listage de la structure de la table forum_roman. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nomCategorie` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_roman.categorie : ~2 rows (environ)
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` (`id_categorie`, `nomCategorie`) VALUES
	(1, 'categorie 1'),
	(2, 'categorie 3'),
	(3, 'categorie 4');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Listage de la structure de la table forum_roman. message
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `visiteur_id` int(11) NOT NULL,
  `sujet_id` int(11) NOT NULL,
  `texte` text NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_message`),
  KEY `FK_message_visiteur` (`visiteur_id`),
  KEY `FK_message_sujet` (`sujet_id`),
  CONSTRAINT `FK_message_sujet` FOREIGN KEY (`sujet_id`) REFERENCES `sujet` (`id_sujet`),
  CONSTRAINT `FK_message_visiteur` FOREIGN KEY (`visiteur_id`) REFERENCES `visiteur` (`id_visiteur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_roman.message : ~4 rows (environ)
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` (`id_message`, `visiteur_id`, `sujet_id`, `texte`, `dateCreation`) VALUES
	(1, 1, 1, 'message 1', '2022-11-29 10:28:45'),
	(2, 2, 1, 'message 2', '2022-11-29 10:28:54'),
	(3, 3, 1, 'message 3', '2022-11-29 10:29:05'),
	(4, 2, 2, 'message 4', '2022-11-29 10:29:13'),
	(5, 4, 2, 'message 5', '2022-11-29 10:29:24');
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- Listage de la structure de la table forum_roman. sujet
CREATE TABLE IF NOT EXISTS `sujet` (
  `id_sujet` int(11) NOT NULL AUTO_INCREMENT,
  `visiteur_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_sujet`),
  KEY `FK_sujet_visiteur` (`visiteur_id`),
  KEY `FK_sujet_categorie` (`categorie_id`),
  CONSTRAINT `FK_sujet_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id_categorie`),
  CONSTRAINT `FK_sujet_visiteur` FOREIGN KEY (`visiteur_id`) REFERENCES `visiteur` (`id_visiteur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_roman.sujet : ~4 rows (environ)
/*!40000 ALTER TABLE `sujet` DISABLE KEYS */;
INSERT INTO `sujet` (`id_sujet`, `visiteur_id`, `categorie_id`, `titre`, `dateCreation`) VALUES
	(1, 1, 1, 'sujet 1', '2022-11-29 10:27:56'),
	(2, 1, 2, 'sujet 2', '2022-11-29 10:28:07'),
	(3, 2, 1, 'sujet 3', '2022-11-29 10:28:15'),
	(4, 3, 1, 'sujet 4', '2022-11-29 10:28:24'),
	(5, 4, 2, 'sujet 5', '2022-11-29 10:28:34');
/*!40000 ALTER TABLE `sujet` ENABLE KEYS */;

-- Listage de la structure de la table forum_roman. visiteur
CREATE TABLE IF NOT EXISTS `visiteur` (
  `id_visiteur` int(11) NOT NULL AUTO_INCREMENT,
  `pseudonyme` varchar(16) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `dateInscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_visiteur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_roman.visiteur : ~4 rows (environ)
/*!40000 ALTER TABLE `visiteur` DISABLE KEYS */;
INSERT INTO `visiteur` (`id_visiteur`, `pseudonyme`, `motDePasse`, `dateInscription`) VALUES
	(1, 'user 1', '1234', '2022-11-29 10:27:07'),
	(2, 'user 2', '1234', '2022-11-29 10:27:14'),
	(3, 'user 3', '1234', '2022-11-29 10:27:21'),
	(4, 'user 4', '1234', '2022-11-29 10:27:28');
/*!40000 ALTER TABLE `visiteur` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
