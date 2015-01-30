--- Favor de llenar con los datos de los movimientos
--- que hagan en su base de datos.
--- Esto es para poder tener el mismo esqueme conforme se va desarrollando
--- Este archivo se deberia llenar bloque por bloque con la siguiente informacion:
--- Autor:
--- Fecha de push
--- EL bloque de codigo SQL que hace el cambio en la base de datos
--- Breve descripcion de que carajos hace...
--- Gracias
----------------------------------------------------------------------------------------------
-- Autor: Arandi López
-- Crear nuevas tablas de usuario, curso y un pivote

-- CREATE DATABASE "wwc" -----------------------------------
CREATE DATABASE IF NOT EXISTS `wwc` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `wwc`;
-- ---------------------------------------------------------


-- CREATE TABLE "users" ------------------------------------
CREATE TABLE `users` ( 
	`id` Int( 255 ) UNSIGNED AUTO_INCREMENT NOT NULL, 
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`lastname` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`nickname` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`password` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`admin` Smallint( 1 ) UNSIGNED NOT NULL, 
	`email` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
, 
	CONSTRAINT `id` UNIQUE( `id` ), 
	CONSTRAINT `unique_email` UNIQUE( `email` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- ---------------------------------------------------------


-- CREATE TABLE "users_workshops" --------------------------
CREATE TABLE `users_workshops` ( 
	`id` Int( 255 ) UNSIGNED AUTO_INCREMENT NOT NULL, 
	`user_id` Int( 255 ) UNSIGNED NOT NULL, 
	`workshop_id` Int( 255 ) UNSIGNED NOT NULL
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


-- CREATE INDEX "index_id1" --------------------------------
CREATE INDEX `index_id1` USING BTREE ON `users_workshops`( `id` );
-- ---------------------------------------------------------


-- CREATE INDEX "index_user_id" ----------------------------
CREATE INDEX `index_user_id` USING BTREE ON `users_workshops`( `user_id` );
-- ---------------------------------------------------------


-- CREATE INDEX "index_workshop_id" ------------------------
CREATE INDEX `index_workshop_id` USING BTREE ON `users_workshops`( `workshop_id` );
-- ---------------------------------------------------------


-- CREATE INDEX "index_id" ---------------------------------
CREATE INDEX `index_id` USING BTREE ON `workshops`( `id` );
-- ---------------------------------------------------------
--------------------------------- FIN --------------------------------------------------------



