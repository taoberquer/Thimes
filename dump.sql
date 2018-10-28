-- --------------------------------------------------------
-- Hôte :                        debian.loc
-- Version du serveur:           10.1.26-MariaDB-0+deb9u1 - Debian 9.1
-- SE du serveur:                debian-linux-gnu
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour thimes
CREATE DATABASE IF NOT EXISTS `thimes` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `thimes`;

DELETE FROM `RSSSources`;

CREATE TABLE IF NOT EXISTS `RSSSources` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `website` varchar(255) NOT NULL,
  `timeBtwUpdate` int(11) DEFAULT NULL,
  `lastUpdate` datetime DEFAULT NULL,
  `lastSuccessUpdate` datetime DEFAULT NULL,
  `numberAttemptFailed` int(11) DEFAULT NULL,
  `updateMessage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Export de données de la table thimes.RSSSources : ~1 rows (environ)

DELETE FROM `Articles`;
-- Export de la structure de la table thimes. Articles
CREATE TABLE IF NOT EXISTS `Articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `preview` mediumtext NOT NULL,
  `date` datetime NOT NULL,
  `link` varchar(255) NOT NULL,
  `rssSourceId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rssSourceId` (`rssSourceId`),
  CONSTRAINT `Articles_ibfk_1` FOREIGN KEY (`rssSourceId`) REFERENCES `RSSSources` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Export de données de la table thimes.Articles : ~0 rows (environ)

/*!40000 ALTER TABLE `Articles` DISABLE KEYS */;
/*!40000 ALTER TABLE `Articles` ENABLE KEYS */;

-- Export de la structure de la table thimes. RSSSources

/*!40000 ALTER TABLE `RSSSources` DISABLE KEYS */;
INSERT INTO `RSSSources` (`id`, `name`, `website`, `timeBtwUpdate`, `lastUpdate`, `lastSuccessUpdate`, `numberAttemptFailed`, `updateMessage`) VALUES
	(1, 'figaro actualité', 'http://www.lefigaro.fr/rss/figaro_actualite-france.xml', NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `RSSSources` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
