CREATE SCHEMA IF NOT EXISTS `projetbdd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projetbdd`;


--  --------------------------------------------------------------------------------------
--  Structure de la table users
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users`(
   `id_user` INT AUTO_INCREMENT,
   `username` VARCHAR(50) NOT NULL,
   `email` VARCHAR(128) DEFAULT NULL,
   `password` VARCHAR(128) NOT NULL,
   `firstname` VARCHAR(50) NOT NULL,
   `lastname` VARCHAR(50) NOT NULL,
   `tel` VARCHAR(50) NOT NULL,
   `birthday` DATE NOT NULL,
   `id_gender` INT NOT NULL,
   `is_admin` TINYINT(1) DEFAULT 0,
   `state` TINYINT(1) DEFAULT 1,
   `create_time` DATETIME DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(`id_user`),
   FOREIGN KEY(`id_gender`) REFERENCES gender(`id_gender`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table users
--  --------------------------------------------------------------------------------------

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `firstname`, `lastname`, `tel`, `birthday`, `id_gender`, `is_admin`) VALUES
(1, 'Zorehi', 'jeremy284@hotmail.com', '$argon2i$v=19$m=65536,t=4,p=1$YjNtV3F2aTRyWndhOUp5ZQ$Pjf2aDcV5EPwNeSdqDEBeeg+52jukZih7lUSCGuTO3Y', 'Jeremy', 'Legrix', '0681104817', '2000-07-22', 1, 1);

--  --------------------------------------------------------------------------------------
--  Structure de la table gender
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `gender`;
CREATE TABLE `gender`(
   `id_gender` INT AUTO_INCREMENT,
   `description` VARCHAR(50) ,
   PRIMARY KEY(`id_gender`)
);

--  --------------------------------------------------------------------------------------
--  Lignes par défaut de la table gender
--  --------------------------------------------------------------------------------------

INSERT INTO `gender` (`id_gender`, `description`) VALUES
(1, 'Homme');
INSERT INTO `gender` (`id_gender`, `description`) VALUES
(2, 'Femme');
INSERT INTO `gender` (`id_gender`, `description`) VALUES
(3, 'Autres');
