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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_roman.categorie : ~4 rows (environ)
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` (`id_categorie`, `nomCategorie`) VALUES
	(1, 'Infos'),
	(2, 'Aide'),
	(3, 'Discussion'),
	(4, 'Annonces');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Listage de la structure de la table forum_roman. message
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `visiteur_id` int(11) NOT NULL,
  `sujet_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nbVote` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_message`),
  KEY `FK_message_visiteur` (`visiteur_id`),
  KEY `FK_message_sujet` (`sujet_id`),
  CONSTRAINT `FK_message_sujet` FOREIGN KEY (`sujet_id`) REFERENCES `sujet` (`id_sujet`),
  CONSTRAINT `FK_message_visiteur` FOREIGN KEY (`visiteur_id`) REFERENCES `visiteur` (`id_visiteur`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_roman.message : ~7 rows (environ)
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` (`id_message`, `visiteur_id`, `sujet_id`, `message`, `dateCreation`, `nbVote`) VALUES
	(4, 2, 2, 'Ut nesciunt galisum quo harum voluptatibus quo dolores voluptatum ut tempore quia est facere totam ut consequatur delectus aut incidunt doloribus. Sed delectus odit hic accusamus iste et omnis quia ut officiis necessitatibus. Nam perferendis numquam est iste distinctio eum reiciendis nulla aut atque porro aut reprehenderit consequatur rem iusto culpa.\r\n\r\nEt dicta temporibus qui temporibus voluptas qui exercitationem molestiae sit quibusdam omnis ut dolorum dolores. Hic voluptas facere et internos quod qui debitis amet et repudiandae voluptatem! Non facilis minima nam aspernatur fugit aut possimus quaerat aut quia aliquid?\r\n\r\nIn unde quaerat et necessitatibus voluptatem eos officia tenetur.', '2022-11-29 08:29:13', 0),
	(5, 4, 2, 'Lorem ipsum dolor sit amet. Aut accusamus dolor sed totam minima ex adipisci autem qui inventore aliquid ab nobis velit aut corporis laborum est dolor Quis. Quo Quis soluta rem deleniti consequuntur aut magnam placeat est amet internos et temporibus iusto 33 odit illum.\r\n\r\nUt nesciunt galisum quo harum voluptatibus quo dolores voluptatum ut tempore quia est facere totam ut consequatur delectus aut incidunt doloribus. Sed delectus odit hic accusamus iste et omnis quia ut officiis necessitatibus. Nam perferendis numquam est iste distinctio eum reiciendis nulla aut atque porro aut reprehenderit consequatur rem iusto culpa.', '2022-11-29 08:29:24', 0),
	(6, 1, 3, 'Nam distinctio mollitia 33 soluta vero qui exercitationem voluptas ut vero facilis vel quos maiores sit nihil totam. Et officiis officiis quo temporibus tenetur eum autem debitis vel quos necessitatibus sed itaque possimus.\r\n\r\nAb neque obcaecati sed blanditiis modi eum nemo iste? Ut quas internos est debitis rerum sed corporis animi.', '2022-12-01 16:19:54', 0),
	(7, 4, 3, 'Et mollitia iste et ducimus dolorum et suscipit laborum. Aut facilis doloribus quo animi dolorem ut unde repellat aut quibusdam omnis! Et voluptatem iure sed iste consequatur et maiores quam.\r\n\r\nCum doloribus tenetur sed quae temporibus qui voluptatem voluptatum ea consequatur omnis. Rem labore velit vel rerum laudantium ut Quis distinctio et nulla temporibus qui voluptatem error sit doloribus dolor. Quo adipisci earum ut nostrum nemo sit rerum modi! Id aspernatur nihil et ipsum unde vel asperiores dolor aut nihil libero vel itaque recusandae aut excepturi officia ab magnam nihil.', '2022-12-01 16:20:20', 0),
	(9, 1, 5, 'Aut nobis eius eos dolor libero eos dolores quis aut quia veritatis et nisi molestias eos commodi impedit. Qui illo perferendis sed beatae beatae aut aspernatur neque ab veritatis quod ex architecto sapiente! Aut autem aperiam rem fugit odit aut dolorem galisum et illum deserunt sit consequatur illo.', '2022-12-01 16:21:01', 0),
	(10, 3, 5, 'Lorem ipsum dolor sit amet. Eos magni quis et eveniet iste ut officia consequatur et voluptate harum ut eveniet perferendis et dignissimos labore ut ipsa quis! In quos minima At maiores dolorem est velit explicabo quo sapiente Quis aut accusantium doloremque cum nihil illo sed vero dolorum.\r\n\r\nQui officiis cupiditate quo tempora maiores id tenetur dolores hic totam dolorem non obcaecati molestiae est recusandae aliquid. Et molestiae explicabo est architecto ratione aut iure blanditiis rem deserunt maxime sit doloribus itaque et dicta fugiat!', '2022-12-01 16:21:12', 0),
	(11, 4, 5, 'Aut nobis eius eos dolor libero eos dolores quis aut quia veritatis et nisi molestias eos commodi impedit. ', '2022-12-01 16:21:35', 0),
	(31, 21, 45, 'test', '2022-12-07 20:52:06', 0);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- Listage de la structure de la table forum_roman. sujet
CREATE TABLE IF NOT EXISTS `sujet` (
  `id_sujet` int(11) NOT NULL AUTO_INCREMENT,
  `visiteur_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statut` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_sujet`),
  KEY `FK_sujet_visiteur` (`visiteur_id`),
  KEY `FK_sujet_categorie` (`categorie_id`),
  CONSTRAINT `FK_sujet_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id_categorie`),
  CONSTRAINT `FK_sujet_visiteur` FOREIGN KEY (`visiteur_id`) REFERENCES `visiteur` (`id_visiteur`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_roman.sujet : ~5 rows (environ)
/*!40000 ALTER TABLE `sujet` DISABLE KEYS */;
INSERT INTO `sujet` (`id_sujet`, `visiteur_id`, `categorie_id`, `titre`, `dateCreation`, `statut`) VALUES
	(2, 1, 2, 'Quis autem est odio fugiat.', '2022-11-29 08:28:07', 1),
	(3, 2, 1, 'Quis et velit obcaecati.', '2022-11-29 08:28:15', 0),
	(5, 4, 2, 'Cum esse doloremque aut atque', '2022-11-29 08:28:34', 0),
	(18, 2, 4, 'Aut nobis eius eos dolor libero', '2022-12-01 16:22:37', 0),
	(19, 4, 3, 'Veritatis et nisi molestias eos commodi impedit. ', '2022-12-01 16:23:05', 0),
	(45, 21, 2, 'test lock', '2022-12-07 20:52:06', 0);
/*!40000 ALTER TABLE `sujet` ENABLE KEYS */;

-- Listage de la structure de la table forum_roman. visiteur
CREATE TABLE IF NOT EXISTS `visiteur` (
  `id_visiteur` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) NOT NULL,
  `pseudonyme` varchar(16) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `dateInscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(50) NOT NULL DEFAULT 'User',
  PRIMARY KEY (`id_visiteur`),
  UNIQUE KEY `pseudonyme` (`mail`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_roman.visiteur : ~5 rows (environ)
/*!40000 ALTER TABLE `visiteur` DISABLE KEYS */;
INSERT INTO `visiteur` (`id_visiteur`, `mail`, `pseudonyme`, `motDePasse`, `dateInscription`, `role`) VALUES
	(1, 'mail1@test.com', 'EpicFish', '1234', '2022-11-29 08:27:07', 'User'),
	(2, 'mail2@test.com', 'PythonLord', '1234', '2022-11-29 08:27:14', 'User'),
	(3, 'mail3@test.com', 'DiabèteWait', '1234', '2022-11-29 08:27:21', 'User'),
	(4, 'mail4@test.com', 'XPickle', '1234', '2022-11-29 08:27:28', 'User'),
	(20, 'test@test.fr', 'Roman', '$2y$10$LA2wXr6x/xg2Wjhxy141gOI0xZsSIsXu2Ml6EsGv4kZsF9PxTcRfS', '2022-12-07 18:13:32', 'Admin'),
	(21, 'test0@test.fr', 'test0', '$2y$10$4SoVAwpa7oM.MGOj.F8HmOQ7DHfAE8Ot7fYYRFU13WU3JGURRhw2i', '2022-12-07 20:49:16', 'User');
/*!40000 ALTER TABLE `visiteur` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
