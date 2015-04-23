-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE DATABASE "wwc" -----------------------------------
CREATE DATABASE IF NOT EXISTS `wwc` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `wwc`;
-- ---------------------------------------------------------


-- CREATE TABLE "users" ------------------------------------
CREATE TABLE `users` ( 
	`id` Int( 255 ) UNSIGNED AUTO_INCREMENT NOT NULL, 
	`firstName` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`lastname` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`password` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`email` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`role` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
, 
	CONSTRAINT `id` UNIQUE( `id` ), 
	CONSTRAINT `unique_email` UNIQUE( `email` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 9;
-- ---------------------------------------------------------


-- CREATE TABLE "users_workshops" --------------------------
CREATE TABLE `users_workshops` ( 
	`id` Int( 255 ) UNSIGNED AUTO_INCREMENT NOT NULL, 
	`user_id` Int( 255 ) UNSIGNED NOT NULL, 
	`workshop_id` Int( 255 ) UNSIGNED NOT NULL, 
	`inscription_date` Timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT '0000-00-00 00:00:00'
, 
	CONSTRAINT `unique_id` UNIQUE( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- ---------------------------------------------------------


-- CREATE TABLE "workshops" --------------------------------
CREATE TABLE `workshops` ( 
	`id` Int( 255 ) UNSIGNED AUTO_INCREMENT NOT NULL, 
	`title` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`description` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`begin_date` Date NOT NULL, 
	`end_date` Date NOT NULL
, 
	CONSTRAINT `unique_id` UNIQUE( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 6;
-- ---------------------------------------------------------


-- Dump data of "users" ------------------------------------
BEGIN;

INSERT INTO `users`(`id`,`firstName`,`lastname`,`password`,`email`,`role`) VALUES ( '3', 'Administrador', 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@admin.com', 'admin' );
INSERT INTO `users`(`id`,`firstName`,`lastname`,`password`,`email`,`role`) VALUES ( '7', 'Rodrigo', 'Esparza', 'e6abb836789b89c12f5123d810ce6dab8127b7d0', 'rodrigo@esparza.com.mx', 'user' );
INSERT INTO `users`(`id`,`firstName`,`lastname`,`password`,`email`,`role`) VALUES ( '8', 'Yuceli', 'Polanco', '9fdb4ad46c3ac32a93815ca54255b1a2bdc26994', 'yucelip@gg.com', 'admin' );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "users_workshops" --------------------------
BEGIN;

INSERT INTO `users_workshops`(`id`,`user_id`,`workshop_id`,`inscription_date`) VALUES ( '1', '3', '5', '2015-04-22 13:38:36' );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "workshops" --------------------------------
BEGIN;

INSERT INTO `workshops`(`id`,`title`,`description`,`begin_date`,`end_date`) VALUES ( '4', 'MEAN Stack', 'Curso para aprender sobre Mongo, Express, Angular y Node (MEAN)', '2015-02-11', '2015-02-12' );
INSERT INTO `workshops`(`id`,`title`,`description`,`begin_date`,`end_date`) VALUES ( '5', 'Angular JS', 'Nuevo curso de Angular', '2015-02-16', '2015-02-16' );
COMMIT;
-- ---------------------------------------------------------


-- CREATE INDEX "fk_user_workshop" -------------------------
CREATE INDEX `fk_user_workshop` USING BTREE ON `users_workshops`( `user_id` );
-- ---------------------------------------------------------


-- CREATE INDEX "fk_workshops" -----------------------------
CREATE INDEX `fk_workshops` USING BTREE ON `users_workshops`( `workshop_id` );
-- ---------------------------------------------------------


-- CREATE INDEX "index_id" ---------------------------------
CREATE INDEX `index_id` USING BTREE ON `workshops`( `id` );
-- ---------------------------------------------------------


-- CREATE LINK "fk_user_workshop" --------------------------
ALTER TABLE `users_workshops` ADD CONSTRAINT `fk_user_workshop` FOREIGN KEY ( `user_id` ) REFERENCES `users`( `id` ) ON DELETE Cascade ON UPDATE Cascade;
-- ---------------------------------------------------------


-- CREATE LINK "fk_workshops" ------------------------------
ALTER TABLE `users_workshops` ADD CONSTRAINT `fk_workshops` FOREIGN KEY ( `workshop_id` ) REFERENCES `workshops`( `id` ) ON DELETE Cascade ON UPDATE Cascade;
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


