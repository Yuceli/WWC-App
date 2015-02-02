-- Favor de llenar con los datos de los movimientos
-- que hagan en su base de datos.
-- Esto es para poder tener el mismo esqueme conforme se va desarrollando
-- Este archivo se deberia llenar bloque por bloque con la siguiente informacion:
-- Autor:
-- Fecha de push
-- EL bloque de codigo SQL que hace el cambio en la base de datos
-- Breve descripcion de que carajos hace...
-- Gracias
-- --------------------------------------------------------------------------------------------
-- Autor: Arandi López
-- Crear nuevas tablas de usuario, curso y un pivote

-- CREATE DATABASE "wwc" -----------------------------------
CREATE DATABASE IF NOT EXISTS `wwc` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `wwc`;
-- ---------------------------------------------------------

-- ---------------------
-- Autor: Javier Ojeda
-- Fecha: 2 / Feb / 2015 00:04
-- Agrega el valor por defecto a la columna 'admin' de la tabla 'users'. Por alguna razón me daba
-- error solo a mi. 
-- CREATE TABLE "users" ------------------------------------
CREATE TABLE `users` ( 
	`id` Int( 255 ) UNSIGNED AUTO_INCREMENT NOT NULL, 
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`lastname` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`nickname` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`password` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`admin` Smallint( 1 ) UNSIGNED NOT NULL DEFAULT '0', 
	`email` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
, 
	CONSTRAINT `id` UNIQUE( `id` ), 
	CONSTRAINT `unique_email` UNIQUE( `email` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
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
AUTO_INCREMENT = 1;
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
AUTO_INCREMENT = 1;
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


-- CREATE LINK "fk_workshops" ------------------------------
ALTER TABLE `users_workshops` ADD CONSTRAINT `fk_workshops` FOREIGN KEY ( `workshop_id` ) REFERENCES `workshops`( `id` ) ON DELETE Cascade ON UPDATE Cascade;
-- ---------------------------------------------------------


-- CREATE LINK "fk_user_workshop" --------------------------
ALTER TABLE `users_workshops` ADD CONSTRAINT `fk_user_workshop` FOREIGN KEY ( `user_id` ) REFERENCES `users`( `id` ) ON DELETE Cascade ON UPDATE Cascade;
-- ---------------------------------------------------------

-- ----------------------------
-- 	Autor: Javier Ojeda
--	Fecha: 2 / Feb / 2015 00:04
--	Agrega los dos usuarios de pruebas que se usarán en el sistema. Uno administrador y otro un usuario sencillo.
-- ----------------------------
INSERT INTO `users` VALUES ('2', 'Usuario', 'Pruebas', 'user', '9a7defef09195e0ec941fa24d031b57792846fb8', '0', 'user@test.com');
INSERT INTO `users` VALUES ('3', 'Admin', 'Pruebas', 'admin', '94d95ac4b15b3f446726d99290614fb3bb7e0109', '0', 'admin@test.com');
