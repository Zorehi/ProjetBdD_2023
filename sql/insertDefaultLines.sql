USE `projetbdd`;

START TRANSACTION;

--  --------------------------------------------------------------------------------------
--  Lignes par défaut de la table gender
--  --------------------------------------------------------------------------------------

INSERT INTO `gender` (`id_gender`, `description`) VALUES
(1, 'Homme'),
(2, 'Femme'),
(3, 'Autres');


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table region
--  --------------------------------------------------------------------------------------

INSERT INTO `region` (`id_region`, `region_name`) VALUES
(1, 'Alsace'),
(2, 'Aquitaine'),
(3, 'Auvergne'),
(4, 'Basse-Normandie'),
(5, 'Bourgogne'),
(6, 'Bretagne'),
(7, 'Centre'),
(8, 'Champagne'),
(9, 'Corse'),
(10, 'Franche-Comté'),
(11, 'Haute-Normandie'),
(12, 'Île-de-France'),
(13, 'Languedoc-Roussillon'),
(14, 'Limousin'),
(15, 'Lorraine'),
(16, 'Midi-Pyrénées'),
(17, 'Nord-pas-de-Calais'),
(18, 'Pays de la Loire'),
(19, 'Picardie'),
(20, 'Poitou-Charentes'),
(21, 'Provence-Alpes-Côte-d\'Azur'),
(22, 'Rhône-Alpes');


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table resource
--  --------------------------------------------------------------------------------------

INSERT INTO `resource` (`id_resource`, `name`, `description`, `min_value`, `max_value`) VALUES
(1, 'Electricite', 'Electricite', 0, 10000),
(2, 'Gaz', 'Gaz', 0, 10000),
(3, 'Eau', 'Eau', 0, 10000),
(4, 'Fioul', 'Fioul', 0, 10000);


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table substance
--  --------------------------------------------------------------------------------------

INSERT INTO `substance` (`id_substance`, `name`, `description`, `min_value`, `max_value`, `critical_value`, `model_value`) VALUES
(1, 'CO2', 'Dioxyde de Carbone', 0, 10000, 8000, 200),
(2, 'NO3-', 'Oxyde d\'azote', 0, 10000, 8000, 200),
(3, 'Eau usée', 'Eau usée', 0, 10000, 8000, 200);


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table apartment_type
--  --------------------------------------------------------------------------------------

INSERT INTO `apartment_type` (`id_apartment_type`, `description`) VALUES
(1, 'T1/F1/P1'),
(2, 'T2/F2/P2'),
(3, 'T3/F3/P3'),
(4, 'T4/F4/P4'),
(5, 'T5/F5/P5'),
(6, 'Studio'),
(7, 'Loft'),
(8, 'Duplex'),
(9, 'Triplex'),
(10, 'Souplex');


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table room_type
--  --------------------------------------------------------------------------------------

INSERT INTO `room_type` (`id_room_type`, `description`, `image_url`) VALUES
(1, 'Cuisine', 'room/cuisine.png'),
(2, 'Salle a Manger', 'room/salle-a-manger.png'),
(3, 'Salon', 'room/salon.png'),
(4, 'Chambre', 'room/chambre.png'),
(5, 'Salle de bain', 'room/salle-de-bain.png'),
(6, 'Toilettes', 'room/toilettes.png');


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table video
--  --------------------------------------------------------------------------------------

INSERT INTO `video` (`id_video`, `web_adress`) VALUES
(1, 'https://www.youtube.com/chauffage'),
(2, 'https://www.youtube.com/lampe'),
(3, 'https://www.youtube.com/electroenager'),
(4, 'https://www.youtube.com/multimedia'),
(5, 'https://www.youtube.com/chauffe-eau'),
(6, 'https://www.youtube.com/machine-a-laver'),
(7, 'https://www.youtube.com/multimedia'),
(8, 'https://www.youtube.com/chauffe-eau'),
(9, 'https://www.youtube.com/machine-a-laver'),
(10, 'https://www.youtube.com/multimedia');


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table department
--  --------------------------------------------------------------------------------------

INSERT INTO `department` (`id_department`, `department_code`, `department_name`, `id_region`) VALUES
(1, '01', 'Ain', 22),
(2, '02', 'Aisne', 19),
(3, '03', 'Allier', 3),
(4, '04', 'Alpes-de-Haute-Provence', 21),
(5, '05', 'Hautes-Alpes', 21),
(6, '06', 'Alpes-Maritimes', 21),
(7, '07', 'Ardèche', 22),
(8, '08', 'Ardennes', 8),
(9, '09', 'Ariège', 16),
(10, '10', 'Aube', 8),
(11, '11', 'Aude', 13),
(12, '12', 'Aveyron', 16),
(13, '13', 'Bouches-du-Rhône', 21),
(14, '14', 'Calvados', 4),
(15, '15', 'Cantal', 3),
(16, '16', 'Charente', 20),
(17, '17', 'Charente-Maritime', 20),
(18, '18', 'Cher', 7),
(19, '19', 'Corrèze', 14),
(20, '2A', 'Corse-du-Sud', 9),
(21, '2B', 'Haute-Corse', 9),
(22, '21', 'Côte-d\'Or', 5),
(23, '22', 'Côtes-dArmor', 6),
(24, '23', 'Creuse', 14),
(25, '24', 'Dordogne', 2),
(26, '25', 'Doubs', 10),
(27, '26', 'Drôme', 22),
(28, '27', 'Eure', 11),
(29, '28', 'Eure-et-Loir', 7),
(30, '29', 'Finistère', 6),
(31, '30', 'Gard', 13),
(32, '31', 'Haute-Garonne', 16),
(33, '32', 'Gers', 16),
(34, '33', 'Gironde', 2),
(35, '34', 'Hérault', 13),
(36, '35', 'Ille-et-Vilaine', 6),
(37, '36', 'Indre', 7),
(38, '37', 'Indre-et-Loire', 7),
(39, '38', 'Isère', 22),
(40, '39', 'Jura', 10),
(41, '40', 'Landes', 2),
(42, '41', 'Loir-et-Cher', 7),
(43, '42', 'Loire', 22),
(44, '43', 'Haute-Loire', 3),
(45, '44', 'Loire-Atlantique', 18),
(46, '45', 'Loiret', 7),
(47, '46', 'Lot', 16),
(48, '47', 'Lot-et-Garonne', 2),
(49, '48', 'Lozère', 13),
(50, '49', 'Maine-et-Loire', 18),
(51, '50', 'Manche', 4),
(52, '51', 'Marne', 8),
(53, '52', 'Haute-Marne', 8),
(54, '53', 'Mayenne', 18),
(55, '54', 'Meurthe-et-Moselle', 15),
(56, '55', 'Meuse', 15),
(57, '56', 'Morbihan', 6),
(58, '57', 'Moselle', 15),
(59, '58', 'Nièvre', 5),
(60, '59', 'Nord', 17),
(61, '60', 'Oise', 19),
(62, '61', 'Orne', 4),
(63, '62', 'Pas-de-Calais', 17),
(64, '63', 'Puy-de-Dôme', 3),
(65, '64', 'Pyrénées-Atlantiques', 2),
(66, '65', 'Hautes-Pyrénées', 16),
(67, '66', 'Pyrénées-Orientales', 13),
(68, '67', 'Bas-Rhin', 1),
(69, '68', 'Haut-Rhin', 1),
(70, '69', 'Rhône', 22),
(71, '70', 'Haute-Saône', 10),
(72, '71', 'Saône-et-Loire', 5),
(73, '72', 'Sarthe', 18),
(74, '73', 'Savoie', 22),
(75, '74', 'Haute-Savoie', 22),
(76, '75', 'Paris', 12),
(77, '76', 'Seine-Maritime', 11),
(78, '77', 'Seine-et-Marne', 12),
(79, '78', 'Yvelines', 12),
(80, '79', 'Deux-Sèvres', 20),
(81, '80', 'Somme', 19),
(82, '81', 'Tarn', 16),
(83, '82', 'Tarn-et-Garonne', 16),
(84, '83', 'Var', 21),
(85, '84', 'Vaucluse', 21),
(86, '85', 'Vendée', 18),
(87, '86', 'Vienne', 20),
(88, '87', 'Haute-Vienne', 14),
(89, '88', 'Vosges', 15),
(90, '89', 'Yonne', 5),
(91, '90', 'Territoire de Belfort', 10),
(92, '91', 'Essonne', 12),
(93, '92', 'Hauts-de-Seine', 12),
(94, '93', 'Seine-Saint-Denis', 12),
(95, '94', 'Val-de-Marne', 12),
(96, '95', 'Val-d\'Oise', 12);


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table device_type
--  --------------------------------------------------------------------------------------

INSERT INTO `device_type` (`id_device_type`, `type_name`,`image_url`, `id_video`) VALUES
(1, 'Chauffe-eau électrique','device/Chauffeau.png', 1),
(2, 'Éclairage','device/Lampe.png', 2),
(3, 'Electromenager','device/Electromenager.png', 3),
(4, 'Multimedia','device/Multimédia.png', 4),
(5, 'Electromenager - Lavage','device/Lavage.png', 5),
(6, 'Chauffage éléctrique','device/Radiateur.png', 6),
(7, 'Chauffage au gaz','device/Radiateur.png', 7),
(8, 'Plaque à gaz','device/Plaque.png', 8),
(9, 'Plaque électrique','device/Plaque.png', 9),
(10, 'Chauffe-eau au fioul','device/Chauffeau.png', 1),
(11, 'Chauffe-eau au gaz','device/Chauffeau.png', 1),
(12, 'Salle de Bain/WC','device/WC.png', 2);


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table security_degree
--  --------------------------------------------------------------------------------------

INSERT INTO `security_degree` (`id_security_degree`, `description`) VALUES
(1, 'Faible'),
(2, 'Moyen'),
(3, 'Fort');

--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table consume
--  --------------------------------------------------------------------------------------

INSERT INTO `consume` (`id_device_type`, `id_resource`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(9, 1),
(7, 2),
(8, 2),
(11, 2),
(1, 3),
(5, 3),
(10, 3),
(11, 3),
(10, 4),
(12, 3);

--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table emit
--  --------------------------------------------------------------------------------------

INSERT INTO `emit` (`id_device_type`, `id_substance`) VALUES
(1, 1),
(6, 1),
(7, 1),
(10, 1),
(11, 1),
(5, 3),
(12, 3);

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `username`, `email`, `password`, `tel`, `firstname`, `lastname`, `birthday`, `is_admin`, `is_active`, `create_time`, `id_gender`) VALUES
(1, 'Admin', 'Admin@Admin.fr', '$argon2i$v=19$m=65536,t=4,p=1$REYudFZiWUZVWUVkekVlRA$uiNr8SJs8FuFXB6XDHajZvZsyiD+t5zma6QpZKXE6sE', '0000000000', 'Admin', 'Admin', '1989-09-15', 1, 1, '2023-01-18 11:11:03', 3),
(2, 'Pierre', 'Pierre@Palmade.fr', '$argon2i$v=19$m=65536,t=4,p=1$cnZZUVE1dTZvaktGcWFTQQ$x+7Y3Uo8UJfBUVgR82dS67aN5VVFzjBGsYQhKn8kdBQ', '1111111111', 'Pierre', 'Palmade', '1975-11-17', 0, 1, '2023-01-18 11:12:35', 1),
(3, 'Seb_la_délire', 'Sebastien@Patoche.fr', '$argon2i$v=19$m=65536,t=4,p=1$Z2ovWHhtQWhZVWlocjZVNQ$LSgnQscBUyD0NNNO3BVUjgbEWTPXTyeJWfykLvgc7tY', '4554545454', 'Sebastien', 'Patoche', '2001-08-17', 0, 1, '2023-01-18 11:47:46', 1),
(4, 'Amandine', 'amandine@hotmail.com', '$argon2i$v=19$m=65536,t=4,p=1$bXl5UTg3QXVKOVV1NjNrNA$yTQ9ViDUB73qVyL1Nu89Dn7GZbELoVwxpnG5FXg6/0U', '0606060606', 'Amandine', 'Lacloche', '2002-04-01', 0, 1, '2023-01-18 11:50:43', 2);

--
-- Déchargement des données de la table `city`
--

INSERT INTO `city` (`id_city`, `postcode`, `city_name`, `id_department`) VALUES
(1, '37000', 'Tours', 38);

--
-- Déchargement des données de la table `house`
--

INSERT INTO `house` (`id_house`, `house_name`, `isolation_degree`, `eval_eco`, `citizen_degree`, `street`, `house_number`, `id_city`) VALUES
(1, 'PierreMaison', 5, 'Ok', 4, 'Rue Pierre Palmade', 18, 1);

--
-- Déchargement des données de la table `owner`
--

INSERT INTO `owner` (`id_house`, `from_date`, `to_date`, `id_users`) VALUES
(1, '2023-01-18', '0000-00-00', 2);

--
-- Déchargement des données de la table `apartment`
--

INSERT INTO `apartment` (`id_apartment`, `num`, `hab`, `citizen_degree`, `id_security_degree`, `id_house`, `id_apartment_type`) VALUES
(1, 9, 5, 1, 3, 1, 4),
(2, 6, 3, 7, 3, 1, 4);

--
-- Déchargement des données de la table `tenant`
--

INSERT INTO `tenant` (`id_apartment`, `from_date`, `to_date`, `id_users`) VALUES
(1, '2023-01-18', '0000-00-00', 3);

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`id_room`, `room_name`, `id_room_type`, `id_apartment`) VALUES
(1, 'Cuisine de Pierre', 1, 1),
(2, 'Salle à Manger de Pierre', 2, 1),
(3, 'Salon de Pierre', 3, 1),
(4, 'Chambre de Pierre', 4, 1),
(5, 'Chambre de Pierre 2', 4, 1),
(6, 'Chambre de Pierre 3', 4, 1),
(7, 'Salle de Bain de Pierre', 5, 1),
(8, 'Toilettes de Pierre', 6, 1),
(9, 'Cuisine', 1, 2),
(10, 'salle à manger', 2, 2),
(11, 'Salon', 3, 2),
(12, 'Chambre', 4, 2),
(13, 'Salle de Bain', 5, 2),
(14, 'Toilettes', 6, 2);

--
-- Déchargement des données de la table `device`
--

INSERT INTO `device` (`id_device`, `device_name`, `description_device`, `description_place`, `id_device_type`, `id_room`) VALUES
(1, 'Lampe', 'Lampe de Salon', 'Au mur', 2, 3),
(2, 'Frigo', 'Un frigo', 'Au sol', 3, 1),
(3, 'Lampe', 'Une lampe', 'Sur un mobilier', 2, 4),
(4, 'Lampe', 'Une lampe', 'Sur un mobilier', 2, 5),
(5, 'Lampe', 'Une lampe', 'Sur un mobilier', 2, 6),
(6, 'Chauffe-eau', 'Chauffe-eau', 'Au sol', 11, 1),
(7, 'Plaque électrique', 'Plaque électrique', 'Sur un meuble', 9, 1),
(8, 'Douche', 'Une douche', 'Au sol', 12, 7),
(9, 'Machine à laver', 'Machine à Laver', 'Au sol', 5, 7),
(10, 'Télé', 'Télé', 'Attaché au mur', 4, 3),
(11, 'Toilettes', 'Toilettes', 'Au sol', 12, 8),
(12, 'Machine à laver', 'Machine à Laver', 'Au sol', 5, 9),
(13, 'Douche', 'Douche', 'Au sol', 12, 13),
(14, 'Chauffe-eau', 'Chauffe-eau', 'Au sol', 10, 9),
(15, 'Télé', 'Tele', 'Au sol', 4, 9),
(16, 'Tele', 'Tele', 'Au sol', 4, 11);

--
-- Déchargement des données de la table `turn_on`
--

INSERT INTO `turn_on` (`id_device`, `from_date`, `to_date`) VALUES
(3, '2023-01-18 11:32:00', '2023-01-18 11:32:01'),
(6, '2023-01-18 11:32:10', '2023-01-18 11:32:12'),
(6, '2023-01-18 11:43:49', '2023-01-18 11:43:51'),
(8, '2023-01-18 11:32:13', '2023-01-18 11:32:14'),
(9, '2023-01-18 11:32:06', '2023-01-18 11:32:06'),
(10, '2023-01-18 11:32:26', '2023-01-18 11:32:30'),
(11, '2023-01-18 11:32:24', '2023-01-18 11:32:24'),
(12, '2023-01-18 11:38:50', '2023-01-18 11:38:51'),
(13, '2023-01-18 11:38:43', '2023-01-18 11:38:45'),
(14, '2023-01-18 11:38:40', '2023-01-18 11:38:44'),
(15, '2023-01-18 11:38:46', '2023-01-18 11:38:49'),
(16, '2023-01-18 11:38:47', '2023-01-18 11:38:48');

--
-- Déchargement des données de la table `emission`
--

INSERT INTO `emission` (`id_device`, `id_substance`, `emission_per_hour`) VALUES
(6, 1, 120),
(8, 3, 50),
(9, 3, 50),
(11, 3, 51),
(12, 3, 60),
(13, 3, 50),
(14, 1, 15);

--
-- Déchargement des données de la table `consumption`
--

INSERT INTO `consumption` (`id_device`, `id_resource`, `consumption_per_hour`) VALUES
(1, 1, 5),
(2, 1, 50),
(3, 1, 50),
(4, 1, 50),
(5, 1, 50),
(6, 2, 10),
(6, 3, 15),
(7, 1, 150),
(8, 3, 50),
(9, 1, 120),
(9, 3, 50),
(10, 1, 150),
(11, 3, 50),
(12, 1, 150),
(12, 3, 60),
(13, 3, 50),
(14, 3, 150),
(14, 4, 25),
(15, 1, 150),
(16, 1, 150);


COMMIT;