DROP DATABASE IF EXISTS tk;
CREATE DATABASE tk;

/* user setup */

SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'ANSI';
USE tk;
DROP PROCEDURE IF EXISTS tk.service_user;

DELIMITER $$
CREATE PROCEDURE tk.service_user()
  BEGIN
    DECLARE c INT DEFAULT 0;
    SELECT
      count(*)
    INTO c
    FROM mysql.user
    WHERE user = 'tk';
    IF c > 0
    THEN
      DROP USER 'tk';
    END IF;

    CREATE USER 'tk';
    UPDATE mysql.user
    SET Password=Password('b4tt13ship#')
    WHERE user = 'tk';
    GRANT ALL ON tk TO 'tk'
    IDENTIFIED BY 'b4tt13ship#';

  END;
$$
DELIMITER ;

CALL tk.service_user();
DROP PROCEDURE IF EXISTS tk.service_user;
SET SQL_MODE = @OLD_SQL_MODE;

/* end user setup */

USE tk;

CREATE TABLE IF NOT EXISTS BS_MAP_NEW
(BS_MAP_ROWID INT     NOT NULL AUTO_INCREMENT PRIMARY KEY,
 CELL_ID      CHAR(2) NOT NULL, /*cells A0 through J9 on the map.*/
 UNIT_ID      CHAR(3) NOT NULL, /*The unit ID located in the cell*/
 UNIT_HEALTH  INT     NOT NULL) /*0-100 if 0 then destroyed image of unit used on map*/
;

CREATE TABLE BUILDINGS (
  ID           INT         NOT NULL PRIMARY KEY AUTO_INCREMENT,
  NAME         VARCHAR(64) NOT NULL DEFAULT '',
  HEALTH       INT         NOT NULL DEFAULT 500,
  CAN_PARENT   BIT         NOT NULL DEFAULT 0,
  POP_PROVIDED INT         NOT NULL DEFAULT 1000
);

CREATE TABLE IF NOT EXISTS BS_UNIT
(
  BS_UNIT_ROWID    INT         NOT NULL AUTO_INCREMENT PRIMARY KEY,
  UNIT_ID          CHAR(3)     NOT NULL,
  UNIT_DESC        VARCHAR(30) NOT NULL,
  HEALTH           INT         NOT NULL DEFAULT 100,
  WEAK_CURSE_MOD   INT         NOT NULL DEFAULT -20,
  STRONG_CURSE_MOD INT         NOT NULL DEFAULT -50,
  WEAK_BUFF_MOD    INT         NOT NULL DEFAULT 20,
  STRONG_BUFF_MOD  INT         NOT NULL DEFAULT 50,
  PARENT_STRUCTURE VARCHAR(32) NOT NULL,
  CAN_FLY          BIT         NOT NULL DEFAULT 0,
  CAN_DRIVE        BIT         NOT NULL DEFAULT 1,
  HAS_SUPER_POWER  BIT         NOT NULL DEFAULT 0
);

CREATE TABLE IF NOT EXISTS BS_USERS (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS BS_MAP_INSTANCE
(BS_MAP_ROWID INT     NOT NULL AUTO_INCREMENT PRIMARY KEY,
 CELL_ID      CHAR(2) NOT NULL, /*cells A0 through J9 on the map.*/
 UNIT_ID      INT     NOT NULL, /*The unit ID located in the cell*/
 UNIT_HEALTH  INT     NOT NULL, /*0-100 if 0 then destroyed image of unit used on map*/
 SAVE_DATE    TIMESTAMP DEFAULT NOW(), /*TIMESTAMP(8),*/
 USER_ID      VARCHAR(30));


CREATE TABLE IF NOT EXISTS MAP
(MAP_ROWID      INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
 MAP_NAME       VARCHAR(100) NOT NULL,
 MAP_ROW        INT          NOT NULL,
 MAP_COLUMN     INT          NOT NULL,
 COLOR          VARCHAR(4)   NOT NULL,
 UNIT           VARCHAR(100) NOT NULL,
 HEALTH         INT          NOT NULL,
 WEAK_CURSE     INT          NOT NULL,
 STRONG_CURSE   INT          NOT NULL,
 WEAK_BUFF      INT          NOT NULL,
 STRONG_BUFF    INT          NOT NULL,
 AIR_ATTACK     INT          NOT NULL,
 AIR_DEFENCE    INT          NOT NULL,
 GROUND_ATTACK  INT          NOT NULL,
 GROUND_DEFENCE INT          NOT NULL,
 ATTACK_RANGE   INT          NOT NULL,
 MOVE_RANGE     INT          NOT NULL,
 SUPER_POWER    INT          NOT NULL);


CREATE TABLE IF NOT EXISTS BUILDING_TYPES
(MAP_ROWID      INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
 BUILDING_TYPE  VARCHAR(100) NOT NULL);

CREATE TABLE IF NOT EXISTS UNIT_TYPES
(MAP_ROWID      INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
 UNIT_TYPE  VARCHAR(100) NOT NULL);

