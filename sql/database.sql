-- ============================================================
-- Base de données : pharmacie
-- Compatible : phpMyAdmin 5.2.1 / MySQL 8.0+
-- ============================================================
 
CREATE DATABASE IF NOT EXISTS `pharmacie`
 CHARACTER SET utf8mb4
 COLLATE utf8mb4_unicode_ci;
 
USE `pharmacie`;
 
-- ------------------------------------------------------------
-- Table : MEDICAMENT
-- ------------------------------------------------------------
CREATE TABLE `MEDICAMENT` (
 `id_medicament` INT          NOT NULL AUTO_INCREMENT,
 `nom`           VARCHAR(150) NOT NULL,
 `description`   TEXT,
 `famille`       VARCHAR(100),
 `image`         VARCHAR(255),
 PRIMARY KEY (`id_medicament`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
 
-- ------------------------------------------------------------
-- Table : EFFET_THERAPEUTIQUE
-- ------------------------------------------------------------
CREATE TABLE `EFFET_THERAPEUTIQUE` (
 `id_effet`      INT          NOT NULL AUTO_INCREMENT,
 `libelle`       VARCHAR(200) NOT NULL,
 `id_medicament` INT          NOT NULL,
 PRIMARY KEY (`id_effet`),
 CONSTRAINT `fk_et_medicament`
   FOREIGN KEY (`id_medicament`)
   REFERENCES `MEDICAMENT` (`id_medicament`)
   ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
 
-- ------------------------------------------------------------
-- Table : EFFET_SECONDAIRE
-- ------------------------------------------------------------
CREATE TABLE `EFFET_SECONDAIRE` (
 `id_effet`      INT          NOT NULL AUTO_INCREMENT,
 `libelle`       VARCHAR(200) NOT NULL,
 `id_medicament` INT          NOT NULL,
 PRIMARY KEY (`id_effet`),
 CONSTRAINT `fk_es_medicament`
   FOREIGN KEY (`id_medicament`)
   REFERENCES `MEDICAMENT` (`id_medicament`)
   ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
 
-- ------------------------------------------------------------
-- Table : INTERACTION
-- (un médicament peut interagir avec plusieurs autres)
-- ------------------------------------------------------------
CREATE TABLE `INTERACTION` (
 `id_interaction`  INT  NOT NULL AUTO_INCREMENT,
 `description`     TEXT,
 `id_medicament1`  INT  NOT NULL,
 `id_medicament2`  INT  NOT NULL,
 PRIMARY KEY (`id_interaction`),
 CONSTRAINT `fk_inter_med1`
   FOREIGN KEY (`id_medicament1`)
   REFERENCES `MEDICAMENT` (`id_medicament`)
   ON DELETE CASCADE ON UPDATE CASCADE,
 CONSTRAINT `fk_inter_med2`
   FOREIGN KEY (`id_medicament2`)
   REFERENCES `MEDICAMENT` (`id_medicament`)
   ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
 
-- ------------------------------------------------------------
-- Table : ACTIVITE
-- ------------------------------------------------------------
CREATE TABLE `ACTIVITE` (
 `id_activite`    INT          NOT NULL AUTO_INCREMENT,
 `nom`            VARCHAR(150) NOT NULL,
 `description`    TEXT,
 `date_activite`  DATE,
 `lieu`           VARCHAR(200),
 `nb_places_max`  INT,
 PRIMARY KEY (`id_activite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
 
-- ------------------------------------------------------------
-- Table : INSCRIPTION
-- ------------------------------------------------------------
CREATE TABLE `INSCRIPTION` (
 `id_inscription`   INT          NOT NULL AUTO_INCREMENT,
 `id_activite`      INT          NOT NULL,
 `nom_participant`  VARCHAR(150) NOT NULL,
 `prenom_participant` VARCHAR(150) NOT NULL,
 `email`            VARCHAR(255),
 `date_inscription` DATE,
 PRIMARY KEY (`id_inscription`),
 CONSTRAINT `fk_inscription_activite`
   FOREIGN KEY (`id_activite`)
   REFERENCES `ACTIVITE` (`id_activite`)
   ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
