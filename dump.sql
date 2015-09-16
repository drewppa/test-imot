-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.14 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win64
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных test_imot
CREATE DATABASE IF NOT EXISTS `test_imot` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `test_imot`;


-- Дамп структуры для таблица test_imot.author
CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор',
  `name` varchar(100) NOT NULL COMMENT 'Имя',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата создания записи',
  `edited` timestamp NULL DEFAULT NULL COMMENT 'Дата редактирования записи',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Авторы';

-- Экспортируемые данные не выделены.


-- Дамп структуры для таблица test_imot.book
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор',
  `name` varchar(100) NOT NULL COMMENT 'Название',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата создания записи',
  `edited` timestamp NULL DEFAULT NULL COMMENT 'Дата изменения записи',
  `author_count` int(11) DEFAULT '0' COMMENT 'Количество авторов',
  `reader_id` int(11) DEFAULT '0' COMMENT 'Идентификатор читателя, у которого книга на руках в настоящий момент',
  PRIMARY KEY (`id`),
  KEY `fk_book_reader_id_idx` (`reader_id`),
  CONSTRAINT `fk_book_reader_id` FOREIGN KEY (`reader_id`) REFERENCES `reader` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Книги';

-- Экспортируемые данные не выделены.


-- Дамп структуры для таблица test_imot.book_author
CREATE TABLE IF NOT EXISTS `book_author` (
  `book_id` int(11) NOT NULL COMMENT 'Идентификатор книги',
  `author_id` int(11) NOT NULL COMMENT 'Идентификатор автора',
  KEY `fk_book_author_book_id_idx` (`book_id`),
  KEY `fk_book_author_author_id_idx` (`author_id`),
  KEY `book_author_idx` (`book_id`,`author_id`),
  CONSTRAINT `fk_book_author_author_id` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_book_author_book_id` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Отношения авторов к книгам';

-- Экспортируемые данные не выделены.


-- Дамп структуры для таблица test_imot.reader
CREATE TABLE IF NOT EXISTS `reader` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор',
  `name` varchar(100) NOT NULL COMMENT 'Имя',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата создания записи',
  `edited` timestamp NULL DEFAULT NULL COMMENT 'Дата редактирования записи',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Читатели';

-- Экспортируемые данные не выделены.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
