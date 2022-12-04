CREATE SCHEMA IF NOT EXISTS `projetbdd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projetbdd`;


--  --------------------------------------------------------------------------------------
--  Structure de la table users
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users`(
   `id` INT AUTO_INCREMENT,
   `email` VARCHAR(255) DEFAULT NULL,
   `tel` VARCHAR(50) DEFAULT NULL,
   `password` VARCHAR(128) NOT NULL,
   `firstname` VARCHAR(50) DEFAULT NULL,
   `lastname` VARCHAR(50) DEFAULT NULL,
   `born_date` DATE DEFAULT NULL,
   `sex` VARCHAR(50) DEFAULT NULL,
   `type` VARCHAR(50) DEFAULT NULL,
   `create_time` DATETIME DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

INSERT INTO `users` (`id`, `email`, `tel`, `password`, `firstname`, `lastname`, `born_date`, `sex`, `type`) VALUES
(1, 'jeremy284@hotmail.com', '0681104817', '$argon2i$v=19$m=65536,t=4,p=1$YjNtV3F2aTRyWndhOUp5ZQ$Pjf2aDcV5EPwNeSdqDEBeeg+52jukZih7lUSCGuTO3Y', 'JÃ©rÃ©my', 'Legrix', '2000-07-22', 'man', 'admin');