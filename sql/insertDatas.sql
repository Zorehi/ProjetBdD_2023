--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table users
--  --------------------------------------------------------------------------------------

-- Mot de passe 'jeje' !
INSERT INTO `users` (`id_users`, `username`, `email`, `password`, `tel`, `firstname`, `lastname`, `birthday`, `is_admin`, `is_active`, `id_gender`) VALUES
(1, 'Zorehi', 'jeremy284@hotmail.com', '$argon2i$v=19$m=65536,t=4,p=1$YjNtV3F2aTRyWndhOUp5ZQ$Pjf2aDcV5EPwNeSdqDEBeeg+52jukZih7lUSCGuTO3Y', '0681104817', 'Jérémy', 'Legrix', '2000-07-22', 1, 1, 1),
(4, 'Moi', 'riafudm@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$YjNtV3F2aTRyWndhOUp5ZQ$Pjf2aDcV5EPwNeSdqDEBeeg+52jukZih7lUSCGuTO3Y', '0633760167', 'Cyril', 'Jacques', '2001-08-29', 1, 1, 1),
(2, 'Princess', 'amandinelegrix@hotmail.com', '$argon2i$v=19$m=65536,t=4,p=1$YjNtV3F2aTRyWndhOUp5ZQ$Pjf2aDcV5EPwNeSdqDEBeeg+52jukZih7lUSCGuTO3Y', '0610101010', 'Amandine', 'Legrix', '2002-04-01', 0, 1, 2);


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table house
--  --------------------------------------------------------------------------------------

INSERT INTO `house` (`id_house`, `house_name`, `isolation_degree`, `eval_eco`, `citizen_degree`, `street`, `house_number`, `id_city`) VALUES
(1, 'Pharmatech', 1, 'ok', 1, 'Avenue Jean Portalis', 64, 1),
(2, 'Moison', 1, 'cool', 1, 'rue Moi', 98, 1);


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table owner
--  --------------------------------------------------------------------------------------

INSERT INTO `owner` (`id_house`, `from_date`, `to_date`, `id_users`) VALUES
(1, '2023-01-01', NULL, 1);
(2, '2023-01-01', NULL, 4);


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table apartment
--  --------------------------------------------------------------------------------------

INSERT INTO `apartment` (`id_apartment`, `num`, `hab`, `citizen_degree`, `security_degree`, `id_security_degree`, `id_house`, `id_apartment_type`) VALUES
(1, 202, 4, 1, NULL, 1, 1, 1),
(2, 4, 5, 2, NULL, 2, 2, 2);


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table room
--  --------------------------------------------------------------------------------------

INSERT INTO `room` (`id_room`, `room_name`, `id_room_type`, `id_apartment`) VALUES
(1, 'Cuisine', 1, 2),
(2, 'Salle à manger', 2, 2),
(3, 'Chambre 1', 4, 2),
(4, 'Chambre 2', 4, 2),
(5, 'Chambre 3', 4, 2),
(6, 'Salle de bain', 5, 2),
(7, 'Moilettes', 6, 2);