CREATE SCHEMA IF NOT EXISTS `projetbdd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projetbdd`;


--  --------------------------------------------------------------------------------------
--  Lignes par défaut de la table gender
--  --------------------------------------------------------------------------------------

INSERT INTO `gender` (`id_gender`, `description`) VALUES
(1, 'Homme');
INSERT INTO `gender` (`id_gender`, `description`) VALUES
(2, 'Femme');
INSERT INTO `gender` (`id_gender`, `description`) VALUES
(3, 'Autres');


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table users
--  --------------------------------------------------------------------------------------

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `firstname`, `lastname`, `tel`, `birthday`, `id_gender`, `is_admin`) VALUES
(1, 'Zorehi', 'jeremy284@hotmail.com', '$argon2i$v=19$m=65536,t=4,p=1$YjNtV3F2aTRyWndhOUp5ZQ$Pjf2aDcV5EPwNeSdqDEBeeg+52jukZih7lUSCGuTO3Y', 'Jeremy', 'Legrix', '0681104817', '2000-07-22', 1, 1);
