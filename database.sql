-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.20-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for kanban_app_php_mvc
CREATE DATABASE IF NOT EXISTS `kanban_app_php_mvc` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `kanban_app_php_mvc`;

-- Dumping structure for table kanban_app_php_mvc.boards
CREATE TABLE IF NOT EXISTS `boards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk__boards__user_id` (`user_id`),
  CONSTRAINT `fk__boards__user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- Dumping data for table kanban_app_php_mvc.boards: ~2 rows (approximately)
/*!40000 ALTER TABLE `boards` DISABLE KEYS */;
INSERT INTO `boards` (`id`, `name`, `user_id`) VALUES
	(29, 'Web Development & Programming', 1),
	(30, 'Business & Marketing', 1),
	(31, 'Test', 1);
/*!40000 ALTER TABLE `boards` ENABLE KEYS */;

-- Dumping structure for table kanban_app_php_mvc.cards
CREATE TABLE IF NOT EXISTS `cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `list_id` int(11) NOT NULL,
  `board_id` int(11) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk__cards__board_id` (`board_id`),
  KEY `fk__cards__list_id` (`list_id`),
  CONSTRAINT `fk__cards__board_id` FOREIGN KEY (`board_id`) REFERENCES `boards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk__cards__list_id` FOREIGN KEY (`list_id`) REFERENCES `lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- Dumping data for table kanban_app_php_mvc.cards: ~9 rows (approximately)
/*!40000 ALTER TABLE `cards` DISABLE KEYS */;
INSERT INTO `cards` (`id`, `title`, `list_id`, `board_id`, `description`) VALUES
	(38, 'Learn CSS Grid', 113, 29, 'Learn - resources below\nImplement - create own layouts'),
	(40, 'Learn Laravel', 113, 29, NULL),
	(43, 'php mvc kanban app project', 114, 29, 'Tech used - PHP, Ajax, Javascript and Material Design Bootstrap\nUtilises MVC architecture'),
	(44, 'Php mvc course', 115, 29, 'Creating his own MVC framework in PHP'),
	(45, 'Learn flexbox', 115, 29, NULL),
	(47, 'SQL Crash Course Beginner - Intermediate', 115, 29, NULL),
	(48, 'Complete Javascript Course - Udemy', 115, 29, NULL),
	(50, 'Laravel blog project', 113, 29, NULL),
	(51, 'Learn Git', 114, 29, 'Learn how git works and how to use it'),
	(52, 'Card 1', 119, 31, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'),
	(53, 'Card 2', 119, 31, 'card 2 description'),
	(54, 'Card 3', 119, 31, NULL),
	(55, 'Card 4', 120, 31, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum');
/*!40000 ALTER TABLE `cards` ENABLE KEYS */;

-- Dumping structure for table kanban_app_php_mvc.card_checklist_items
CREATE TABLE IF NOT EXISTS `card_checklist_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `is_completed` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk__card_checklist_items__card_id` (`card_id`),
  CONSTRAINT `fk__card_checklist_items__card_id` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- Dumping data for table kanban_app_php_mvc.card_checklist_items: ~26 rows (approximately)
/*!40000 ALTER TABLE `card_checklist_items` DISABLE KEYS */;
INSERT INTO `card_checklist_items` (`id`, `card_id`, `text`, `is_completed`) VALUES
	(31, 40, 'go through laravel documentation', 0),
	(32, 40, 'install laravel', 1),
	(33, 38, 'w3schools', 0),
	(34, 38, 'css-tricks', 0),
	(35, 38, 'mdn', 0),
	(36, 43, 'create prototype', 1),
	(37, 43, 'config file', 1),
	(38, 43, 'DB and Model core classes', 1),
	(39, 43, 'controllers', 0),
	(40, 43, 'views', 1),
	(41, 43, 'validation', 0),
	(42, 43, 'login, register and users', 0),
	(43, 43, 'cookies and sessions', 0),
	(44, 43, 'create database', 1),
	(45, 43, 'htaccess / web config', 1),
	(46, 43, 'layout', 1),
	(47, 43, 'modal', 1),
	(48, 43, 'javascript', 1),
	(49, 43, 'ajax', 1),
	(50, 43, 'models', 0),
	(51, 44, 'watch all videos. take notes. write code.', 1),
	(52, 44, 'review notes and code', 1),
	(53, 51, 'atlassian.com tutorial', 0),
	(54, 51, 'learning git & github lynda', 0),
	(55, 45, 'Bootstrap tutorial', 1),
	(56, 45, 'created own layouts', 1),
	(57, 52, 'item 1', 0),
	(58, 53, 'item 1', 0),
	(59, 53, 'item 2', 0);
/*!40000 ALTER TABLE `card_checklist_items` ENABLE KEYS */;

-- Dumping structure for table kanban_app_php_mvc.card_comments
CREATE TABLE IF NOT EXISTS `card_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk__card_comments__card_id` (`card_id`),
  KEY `fk__card_comments__user_id` (`user_id`),
  CONSTRAINT `fk__card_comments__card_id` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk__card_comments__user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- Dumping data for table kanban_app_php_mvc.card_comments: ~4 rows (approximately)
/*!40000 ALTER TABLE `card_comments` DISABLE KEYS */;
INSERT INTO `card_comments` (`id`, `user_id`, `card_id`, `text`) VALUES
	(31, 1, 40, 'Laracasts - best resource. Paid subscription'),
	(32, 1, 43, 'features missing - deadlines and coloured labels'),
	(33, 1, 43, 'look at promises and async/await'),
	(34, 1, 51, 'Check out Brad\'s crash course on youtube'),
	(39, 1, 52, 'comment 1'),
	(40, 1, 53, 'comment 1'),
	(41, 1, 53, 'comment 2'),
	(42, 1, 53, 'comment 3'),
	(44, 1, 53, 'After you install composer. Setup global path if you want global composer in another location via environment variables and add the executable bin path of composer to PATH environment variables.\nfdggfh');
/*!40000 ALTER TABLE `card_comments` ENABLE KEYS */;

-- Dumping structure for table kanban_app_php_mvc.lists
CREATE TABLE IF NOT EXISTS `lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `board_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk__lists__board_id` (`board_id`),
  CONSTRAINT `fk__lists__board_id` FOREIGN KEY (`board_id`) REFERENCES `boards` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

-- Dumping data for table kanban_app_php_mvc.lists: ~3 rows (approximately)
/*!40000 ALTER TABLE `lists` DISABLE KEYS */;
INSERT INTO `lists` (`id`, `title`, `board_id`) VALUES
	(113, 'Things To Do', 29),
	(114, 'Doing', 29),
	(115, 'Done', 29),
	(116, 'SEO', 30),
	(117, 'Content Marketing', 30),
	(118, 'Email Marketing', 30),
	(119, 'List1', 31),
	(120, 'List 2', 31);
/*!40000 ALTER TABLE `lists` ENABLE KEYS */;

-- Dumping structure for table kanban_app_php_mvc.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table kanban_app_php_mvc.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`) VALUES
	(1, 'user1', 'password'),
	(39, 'admin', 'admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table kanban_app_php_mvc.user_sessions
CREATE TABLE IF NOT EXISTS `user_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table kanban_app_php_mvc.user_sessions: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_sessions` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
