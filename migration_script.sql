SET NAMES utf8;
SET time_zone = '+00:00';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `migration_page`;
CREATE DATABASE `migration_page` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `migration_page`;

DROP TABLE IF EXISTS `migration_sql_file_tbl`;
CREATE TABLE `migration_sql_file_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `sql_file` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `runwhen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `markwhen` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `projects_menu_tbl`;
CREATE TABLE `projects_menu_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `user_login_tbl`;
CREATE TABLE `user_login_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- 2019-12-05 01:31:47