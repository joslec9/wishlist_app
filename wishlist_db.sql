-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema wishlist_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema wishlist_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `wishlist_db` DEFAULT CHARACTER SET utf8 ;
USE `wishlist_db` ;

-- -----------------------------------------------------
-- Table `wishlist_db`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wishlist_db`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `name` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  `username` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `date_hired` DATETIME NULL DEFAULT NULL COMMENT '',
  `password` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `created_at` DATETIME NULL DEFAULT NULL COMMENT '',
  `updated_at` DATETIME NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 25
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `wishlist_db`.`quotes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wishlist_db`.`quotes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `author` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `message` TEXT NULL DEFAULT NULL COMMENT '',
  `postedby` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `created_at` DATETIME NULL DEFAULT NULL COMMENT '',
  `updated_at` DATETIME NULL DEFAULT NULL COMMENT '',
  `user_id` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_quotes_user_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_quotes_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `wishlist_db`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `wishlist_db`.`favorites`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wishlist_db`.`favorites` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `user_id` INT(11) NOT NULL COMMENT '',
  `quotes_id` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_favorites_user1_idx` (`user_id` ASC)  COMMENT '',
  INDEX `fk_favorites_quotes1_idx` (`quotes_id` ASC)  COMMENT '',
  CONSTRAINT `fk_favorites_quotes1`
    FOREIGN KEY (`quotes_id`)
    REFERENCES `wishlist_db`.`quotes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_favorites_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `wishlist_db`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `wishlist_db`.`items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wishlist_db`.`items` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `item_name` VARCHAR(75) NULL DEFAULT NULL COMMENT '',
  `added_by` INT(11) NULL DEFAULT NULL COMMENT '',
  `created_at` DATETIME NULL DEFAULT NULL COMMENT '',
  `updated_at` DATETIME NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `id__idx` (`added_by` ASC)  COMMENT '',
  CONSTRAINT `id_`
    FOREIGN KEY (`added_by`)
    REFERENCES `wishlist_db`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 25
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `wishlist_db`.`wishlists`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wishlist_db`.`wishlists` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `user_id` INT(11) NULL DEFAULT NULL COMMENT '',
  `item_id` INT(11) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `id_idx` (`item_id` ASC)  COMMENT '',
  INDEX `user_id_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `id`
    FOREIGN KEY (`item_id`)
    REFERENCES `wishlist_db`.`items` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `wishlist_db`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
