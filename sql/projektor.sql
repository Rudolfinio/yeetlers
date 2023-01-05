-- --------------------------------------------------------
-- Host:                         localhost
-- Wersja serwera:               5.1.72-community - MySQL Community Server (GPL)
-- Serwer OS:                    Win32
-- HeidiSQL Wersja:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Zrzut struktury bazy danych projekt
CREATE DATABASE IF NOT EXISTS `projekt` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci */;
USE `projekt`;

-- Zrzut struktury tabela projekt.budynek
CREATE TABLE IF NOT EXISTS `budynek` (
  `budynek_id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(50) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `ulica` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `nr_budynku` int(11) NOT NULL,
  `kod_pocztowy` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `miasto` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `kraj` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`budynek_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Zrzucanie danych dla tabeli projekt.budynek: ~1 rows (około)
/*!40000 ALTER TABLE `budynek` DISABLE KEYS */;
INSERT IGNORE INTO `budynek` (`budynek_id`, `nazwa`, `ulica`, `nr_budynku`, `kod_pocztowy`, `miasto`, `kraj`) VALUES
	(1, 'wi1', 'Żołnierska', 49, '71-210', 'Szczecin', 'Polska');
/*!40000 ALTER TABLE `budynek` ENABLE KEYS */;

-- Zrzut struktury tabela projekt.pietro
CREATE TABLE IF NOT EXISTS `pietro` (
  `pietro_id` int(11) NOT NULL AUTO_INCREMENT,
  `budynek_id` int(11) NOT NULL,
  `nazwa` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`pietro_id`),
  KEY `FK_pietro_budynek` (`budynek_id`),
  CONSTRAINT `FK_pietro_budynek` FOREIGN KEY (`budynek_id`) REFERENCES `budynek` (`budynek_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Zrzucanie danych dla tabeli projekt.pietro: ~4 rows (około)
/*!40000 ALTER TABLE `pietro` DISABLE KEYS */;
INSERT IGNORE INTO `pietro` (`pietro_id`, `budynek_id`, `nazwa`) VALUES
	(1, 1, 'wi1-0'),
	(2, 1, 'w1-1'),
	(3, 1, 'wi1-2'),
	(4, 1, 'wi1-00');
/*!40000 ALTER TABLE `pietro` ENABLE KEYS */;

-- Zrzut struktury tabela projekt.pomieszczenie
CREATE TABLE IF NOT EXISTS `pomieszczenie` (
  `pomieszczenie_id` int(11) NOT NULL AUTO_INCREMENT,
  `pietro_id` int(11) NOT NULL,
  `numer` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`pomieszczenie_id`),
  KEY `FK_pomieszczenie_pietro` (`pietro_id`),
  CONSTRAINT `FK_pomieszczenie_pietro` FOREIGN KEY (`pietro_id`) REFERENCES `pietro` (`pietro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Zrzucanie danych dla tabeli projekt.pomieszczenie: ~9 rows (około)
/*!40000 ALTER TABLE `pomieszczenie` DISABLE KEYS */;
INSERT IGNORE INTO `pomieszczenie` (`pomieszczenie_id`, `pietro_id`, `numer`) VALUES
	(1, 1, '1'),
	(2, 1, '2'),
	(3, 1, '3'),
	(4, 2, '104'),
	(5, 2, '120'),
	(6, 3, '207'),
	(7, 3, '211'),
	(8, 4, '012'),
	(9, 4, '010');
/*!40000 ALTER TABLE `pomieszczenie` ENABLE KEYS */;

-- Zrzut struktury tabela projekt.pracownik
CREATE TABLE IF NOT EXISTS `pracownik` (
  `pracownik_id` int(11) NOT NULL AUTO_INCREMENT,
  `imie` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `tytul` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`pracownik_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Zrzucanie danych dla tabeli projekt.pracownik: ~4 rows (około)
/*!40000 ALTER TABLE `pracownik` DISABLE KEYS */;
INSERT IGNORE INTO `pracownik` (`pracownik_id`, `imie`, `nazwisko`, `tytul`) VALUES
	(1, 'Artur', 'Karczmarczyk', 'dr inż.'),
	(2, 'Aneta', 'Bera', 'dr inż.'),
	(3, 'Dariusz', 'Sychel', 'dr inż.'),
	(4, 'Sławomir', 'Wernikowski', 'mgr inż.');
/*!40000 ALTER TABLE `pracownik` ENABLE KEYS */;

-- Zrzut struktury tabela projekt.pracownik-pomieszczenie
CREATE TABLE IF NOT EXISTS `pracownik_pomieszczenie` (
  `pracownik_pomieszczenie_id` int(11) NOT NULL AUTO_INCREMENT,
  `pracownik_id` int(11) NOT NULL,
  `pomieszczenie_id` int(11) NOT NULL,
  PRIMARY KEY (`pracownik_pomieszczenie_id`),
  KEY `FK_pracownik_pomieszczenie_pracownik` (`pracownik_id`),
  KEY `FK_pracownik_pomieszczenie_pomieszczenie` (`pomieszczenie_id`),
  CONSTRAINT `FK_pracownik_pomieszczenie_pomieszczenie` FOREIGN KEY (`pomieszczenie_id`) REFERENCES `pomieszczenie` (`pomieszczenie_id`),
  CONSTRAINT `FK_pracownik_pomieszczenie_pracownik` FOREIGN KEY (`pracownik_id`) REFERENCES `pracownik` (`pracownik_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Zrzucanie danych dla tabeli projekt.pracownik-pomieszczenie: ~5 rows (około)
/*!40000 ALTER TABLE `pracownik-pomieszczenie` DISABLE KEYS */;
INSERT IGNORE INTO `pracownik_pomieszczenie` (`pracownik_pomieszczenie_id`, `pracownik_id`, `pomieszczenie_id`) VALUES
	(1, 1, 7),
	(2, 2, 6),
	(3, 4, 8),
	(5, 3, 6),
	(7, 1, 1);
/*!40000 ALTER TABLE `pracownik-pomieszczenie` ENABLE KEYS */;

-- Zrzut struktury tabela projekt.uzytkownik
CREATE TABLE IF NOT EXISTS `uzytkownik` (
  `uzytkownik_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`uzytkownik_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Zrzucanie danych dla tabeli projekt.uzytkownik: ~1 rows (około)
/*!40000 ALTER TABLE `uzytkownik` DISABLE KEYS */;
INSERT IGNORE INTO `uzytkownik` (`uzytkownik_id`, `login`, `haslo`) VALUES
	(1, 'admin\r\n', 'Admin1!');
/*!40000 ALTER TABLE `uzytkownik` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
