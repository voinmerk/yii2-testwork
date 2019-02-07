-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.20 - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных test_work1
CREATE DATABASE IF NOT EXISTS `test_work1` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `test_work1`;

-- Дамп структуры для таблица test_work1.debt
CREATE TABLE IF NOT EXISTS `debt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `debt_sum` decimal(10,2) DEFAULT NULL,
  `city_name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test_work1.debt: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `debt` DISABLE KEYS */;
INSERT INTO `debt` (`id`, `debt_sum`, `city_name`) VALUES
	(1, 1000.00, 'Novosibirsk'),
	(2, 1500.00, 'Moscow'),
	(3, 4560.00, 'New York');
/*!40000 ALTER TABLE `debt` ENABLE KEYS */;

-- Дамп структуры для таблица test_work1.debt_calc
CREATE TABLE IF NOT EXISTS `debt_calc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `int_sum` decimal(10,2) DEFAULT NULL,
  `calc_date` datetime DEFAULT NULL,
  `is_confirmed` int(11) DEFAULT NULL,
  `is_cancel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test_work1.debt_calc: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `debt_calc` DISABLE KEYS */;
INSERT INTO `debt_calc` (`id`, `parent_id`, `int_sum`, `calc_date`, `is_confirmed`, `is_cancel`) VALUES
	(1, 1, 300.00, '2019-02-04 14:46:55', 1, 0),
	(2, 1, 700.00, '2019-02-05 14:47:13', 1, 0),
	(3, 2, 750.00, '2019-02-04 14:47:35', 1, 1),
	(4, 2, 1500.00, '2019-02-06 14:47:49', 1, 0);
/*!40000 ALTER TABLE `debt_calc` ENABLE KEYS */;

-- Дамп структуры для таблица test_work1.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test_work1.migration: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1549508501),
	('m130524_201442_init', 1549508544),
	('m181223_154332_add_default_user', 1549508545);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;

-- Дамп структуры для таблица test_work1.reporting_period
CREATE TABLE IF NOT EXISTS `reporting_period` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `state` int(3) NOT NULL DEFAULT '1',
  `is_988` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=277 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test_work1.reporting_period: ~10 rows (приблизительно)
/*!40000 ALTER TABLE `reporting_period` DISABLE KEYS */;
INSERT INTO `reporting_period` (`id`, `date_start`, `date_end`, `name`, `state`, `is_988`) VALUES
	(1, '2011-01-01', '2011-12-31', '2011 год', 2, 0),
	(3, '2012-01-01', '2012-12-31', '2012 год', 2, 0),
	(4, '2013-01-01', '2013-12-31', '2013 год', 2, 0),
	(8, '2014-01-01', '2014-12-31', '2014 год', 2, 0),
	(16, '2010-01-01', '2010-12-31', '2010 год', 2, 0),
	(21, '2015-01-01', '2015-05-24', '2015 год', 2, 0),
	(22, '2015-01-01', '2015-12-31', '2015 год по формам Приказа № 882/пр Минстроя РФ', 2, 1),
	(90, '2016-01-01', '2016-12-31', '2016 год', 2, 1),
	(228, '2017-01-01', '2017-12-31', '2017 год', 2, 1),
	(275, '2018-01-01', '2018-12-31', '2018 год', 1, 1),
	(276, '2019-01-01', '2019-12-31', '2019 год', 1, 1);
/*!40000 ALTER TABLE `reporting_period` ENABLE KEYS */;

-- Дамп структуры для таблица test_work1.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы test_work1.user: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'IxXOhOiQ0qfxZk_lKPfiZC89XWSGmUx2', '$2y$13$KfyoKlcNnDsvynW7BxBfX.KDD1BV.IS/CSJcpGeb59R5Yiwax1c36', NULL, 'admin@example.com', 10, 1549508545, 1549508545);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
