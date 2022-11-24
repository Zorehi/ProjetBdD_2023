CREATE SCHEMA IF NOT EXISTS `projetbdd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projetbdd`;

--  --------------------------------------------------------------------------------------
--  Structure de la table sex
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `sex`;
CREATE TABLE IF NOT EXISTS `sex`(
   `id` INT AUTO_INCREMENT,
   `name` VARCHAR(50) ,
   PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

INSERT INTO `sex` (`id`, `name`) VALUES (NULL, 'Femme');
INSERT INTO `sex` (`id`, `name`) VALUES (NULL, 'Homme');
INSERT INTO `sex` (`id`, `name`) VALUES (NULL, 'Personnalisé');


--  --------------------------------------------------------------------------------------
--  Structure de la table users
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users`(
   `id` INT AUTO_INCREMENT,
   `email` VARCHAR(255) ,
   `password` VARCHAR(128)  NOT NULL,
   `firstname` VARCHAR(50) ,
   `lastname` VARCHAR(50) ,
   `create_time` DATETIME,
   `born_date` DATE,
   `tel` VARCHAR(50) ,
   `sex_id` INT NOT NULL,
   PRIMARY KEY(`id`),
   FOREIGN KEY(`sex_id`) REFERENCES sex(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;
