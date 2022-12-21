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

INSERT INTO `users` (`id_users`, `username`, `email`, `password`, `firstname`, `lastname`, `tel`, `birthday`, `id_gender`, `is_admin`) VALUES
(1, 'Zorehi', 'jeremy284@hotmail.com', '$argon2i$v=19$m=65536,t=4,p=1$YjNtV3F2aTRyWndhOUp5ZQ$Pjf2aDcV5EPwNeSdqDEBeeg+52jukZih7lUSCGuTO3Y', 'Jérémy', 'Legrix', '0681104817', '2000-07-22', 1, 1);


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table region
--  --------------------------------------------------------------------------------------

INSERT INTO `region` VALUES (1, 'Alsace');
INSERT INTO `region` VALUES (2, 'Aquitaine');
INSERT INTO `region` VALUES (3, 'Auvergne');
INSERT INTO `region` VALUES (4, 'Basse-Normandie');
INSERT INTO `region` VALUES (5, 'Bourgogne');
INSERT INTO `region` VALUES (6, 'Bretagne');
INSERT INTO `region` VALUES (7, 'Centre');
INSERT INTO `region` VALUES (8, 'Champagne');
INSERT INTO `region` VALUES (9, 'Corse');
INSERT INTO `region` VALUES (10, 'Franche-Comté');
INSERT INTO `region` VALUES (11, 'Haute-Normandie');
INSERT INTO `region` VALUES (12, 'Île-de-France');
INSERT INTO `region` VALUES (13, 'Languedoc-Roussillon');
INSERT INTO `region` VALUES (14, 'Limousin');
INSERT INTO `region` VALUES (15, 'Lorraine');
INSERT INTO `region` VALUES (16, 'Midi-Pyrénées');
INSERT INTO `region` VALUES (17, 'Nord-pas-de-Calais');
INSERT INTO `region` VALUES (18, 'Pays de la Loire');
INSERT INTO `region` VALUES (19, 'Picardie');
INSERT INTO `region` VALUES (20, 'Poitou-Charentes');
INSERT INTO `region` VALUES (21, "Provence-Alpes-Côte-d'Azur");
INSERT INTO `region` VALUES (22, 'Rhône-Alpes');


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table resource
--  --------------------------------------------------------------------------------------

INSERT INTO `resource` (`id_ressource`, `name`, `description`, `min_value`, `max_value`) 
VALUES (NULL, 'Electricite', 'Electricite', '0', '10000');

INSERT INTO `resource` (`id_ressource`, `name`, `description`, `min_value`, `max_value`) 
VALUES (NULL, 'Gaz', 'Gaz', '0', '10000');

INSERT INTO `resource` (`id_ressource`, `name`, `description`, `min_value`, `max_value`) 
VALUES (NULL, 'Eau', 'Eau', '0', '10000');


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table substance
--  --------------------------------------------------------------------------------------

INSERT INTO `substance` (`id_substance`, `name`, `description`, `min_value`, `max_value`, `critical_value`, `model_value`) 
VALUES (NULL, "CO2", 'Dioxyde de Carbone', '0', '10000', '8000', '200');

INSERT INTO `substance` (`id_substance`, `name`, `description`, `min_value`, `max_value`, `critical_value`, `model_value`) 
VALUES (NULL, "NO3-", "Oxyde d'azote", '0', '10000', '8000', '200');


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table apartment_type
--  --------------------------------------------------------------------------------------

INSERT INTO `apartment_type` (`id_apartment_type`, `description`) 
VALUES (NULL, "T1/F1/P1");

INSERT INTO `apartment_type` (`id_apartment_type`, `description`) 
VALUES (NULL, "T2/F2/P2");

INSERT INTO `apartment_type` (`id_apartment_type`, `description`) 
VALUES (NULL, "T3/F3/P3");

INSERT INTO `apartment_type` (`id_apartment_type`, `description`) 
VALUES (NULL, "T4/F4/P4");

INSERT INTO `apartment_type` (`id_apartment_type`, `description`) 
VALUES (NULL, "T5/F5/P5");

INSERT INTO `apartment_type` (`id_apartment_type`, `description`) 
VALUES (NULL, "Studio");

INSERT INTO `apartment_type` (`id_apartment_type`, `description`) 
VALUES (NULL, "Loft");

INSERT INTO `apartment_type` (`id_apartment_type`, `description`) 
VALUES (NULL, "Duplex");

INSERT INTO `apartment_type` (`id_apartment_type`, `description`) 
VALUES (NULL, "Triplex");

INSERT INTO `apartment_type` (`id_apartment_type`, `description`) 
VALUES (NULL, "Souplex");


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table room_type
--  --------------------------------------------------------------------------------------

INSERT INTO `room_type` (`id_room_type`, `description`) 
VALUES (NULL, "Cuisine");

INSERT INTO `room_type` (`id_room_type`, `description`) 
VALUES (NULL, "Salle a Manger");

INSERT INTO `room_type` (`id_room_type`, `description`) 
VALUES (NULL, "Salon");

INSERT INTO `room_type` (`id_room_type`, `description`) 
VALUES (NULL, "Chambre");

INSERT INTO `room_type` (`id_room_type`, `description`) 
VALUES (NULL, "Salle de bain");

INSERT INTO `room_type` (`id_room_type`, `description`) 
VALUES (NULL, "Toilettes");


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table video
--  --------------------------------------------------------------------------------------

INSERT INTO `video` (`id_video`, `web_adress`)
VALUES (NULL, "https://www.youtube.com/chauffage");

INSERT INTO `video` (`id_video`, `web_adress`)
VALUES (NULL, "https://www.youtube.com/lampe");

INSERT INTO `video` (`id_video`, `web_adress`)
VALUES (NULL, "https://www.youtube.com/electroenager");

INSERT INTO `video` (`id_video`, `web_adress`)
VALUES (NULL, "https://www.youtube.com/multimedia");

INSERT INTO `video` (`id_video`, `web_adress`)
VALUES (NULL, "https://www.youtube.com/chauffe-eau");

INSERT INTO `video` (`id_video`, `web_adress`)
VALUES (NULL, "https://www.youtube.com/machine-a-laver");


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table department
--  --------------------------------------------------------------------------------------

INSERT INTO `department` VALUES (NULL, '01', 'Ain', 22);
INSERT INTO `department` VALUES (NULL, '02', 'Aisne', 19);
INSERT INTO `department` VALUES (NULL, '03', 'Allier', 3);
INSERT INTO `department` VALUES (NULL, '04', 'Alpes-de-Haute-Provence', 21);
INSERT INTO `department` VALUES (NULL, '05', 'Hautes-Alpes', 21);
INSERT INTO `department` VALUES (NULL, '06', 'Alpes-Maritimes', 21);
INSERT INTO `department` VALUES (NULL, '07', 'Ardèche', 22);
INSERT INTO `department` VALUES (NULL, '08', 'Ardennes', 8);
INSERT INTO `department` VALUES (NULL, '09', 'Ariège', 16);
INSERT INTO `department` VALUES (NULL, '10', 'Aube', 8);
INSERT INTO `department` VALUES (NULL, '11', 'Aude', 13);
INSERT INTO `department` VALUES (NULL, '12', 'Aveyron', 16);
INSERT INTO `department` VALUES (NULL, '13', 'Bouches-du-Rhône', 21);
INSERT INTO `department` VALUES (NULL, '14', 'Calvados', 4);
INSERT INTO `department` VALUES (NULL, '15', 'Cantal', 3);
INSERT INTO `department` VALUES (NULL, '16', 'Charente', 20);
INSERT INTO `department` VALUES (NULL, '17', 'Charente-Maritime', 20);
INSERT INTO `department` VALUES (NULL, '18', 'Cher', 7);
INSERT INTO `department` VALUES (NULL, '19', 'Corrèze', 14);
INSERT INTO `department` VALUES (NULL, '2A', 'Corse-du-Sud', 9);
INSERT INTO `department` VALUES (NULL, '2B', 'Haute-Corse', 9);
INSERT INTO `department` VALUES (NULL, '21', "Côte-d'Or", 5);
INSERT INTO `department` VALUES (NULL, '22', "Côtes-dArmor", 6);
INSERT INTO `department` VALUES (NULL, '23', 'Creuse', 14);
INSERT INTO `department` VALUES (NULL, '24', 'Dordogne', 2);
INSERT INTO `department` VALUES (NULL, '25', 'Doubs', 10);
INSERT INTO `department` VALUES (NULL, '26', 'Drôme', 22);
INSERT INTO `department` VALUES (NULL, '27', 'Eure', 11);
INSERT INTO `department` VALUES (NULL, '28', 'Eure-et-Loir', 7);
INSERT INTO `department` VALUES (NULL, '29', 'Finistère', 6);
INSERT INTO `department` VALUES (NULL, '30', 'Gard', 13);
INSERT INTO `department` VALUES (NULL, '31', 'Haute-Garonne', 16);
INSERT INTO `department` VALUES (NULL, '32', 'Gers', 16);
INSERT INTO `department` VALUES (NULL, '33', 'Gironde', 2);
INSERT INTO `department` VALUES (NULL, '34', 'Hérault', 13);
INSERT INTO `department` VALUES (NULL, '35', 'Ille-et-Vilaine', 6);
INSERT INTO `department` VALUES (NULL, '36', 'Indre', 7);
INSERT INTO `department` VALUES (NULL, '37', 'Indre-et-Loire', 7);
INSERT INTO `department` VALUES (NULL, '38', 'Isère', 22);
INSERT INTO `department` VALUES (NULL, '39', 'Jura', 10);
INSERT INTO `department` VALUES (NULL, '40', 'Landes', 2);
INSERT INTO `department` VALUES (NULL, '41', 'Loir-et-Cher', 7);
INSERT INTO `department` VALUES (NULL, '42', 'Loire', 22);
INSERT INTO `department` VALUES (NULL, '43', 'Haute-Loire', 3);
INSERT INTO `department` VALUES (NULL, '44', 'Loire-Atlantique', 18);
INSERT INTO `department` VALUES (NULL, '45', 'Loiret', 7);
INSERT INTO `department` VALUES (NULL, '46', 'Lot', 16);
INSERT INTO `department` VALUES (NULL, '47', 'Lot-et-Garonne', 2);
INSERT INTO `department` VALUES (NULL, '48', 'Lozère', 13);
INSERT INTO `department` VALUES (NULL, '49', 'Maine-et-Loire', 18);
INSERT INTO `department` VALUES (NULL, '50', 'Manche', 4);
INSERT INTO `department` VALUES (NULL, '51', 'Marne', 8);
INSERT INTO `department` VALUES (NULL, '52', 'Haute-Marne', 8);
INSERT INTO `department` VALUES (NULL, '53', 'Mayenne', 18);
INSERT INTO `department` VALUES (NULL, '54', 'Meurthe-et-Moselle', 15);
INSERT INTO `department` VALUES (NULL, '55', 'Meuse', 15);
INSERT INTO `department` VALUES (NULL, '56', 'Morbihan', 6);
INSERT INTO `department` VALUES (NULL, '57', 'Moselle', 15);
INSERT INTO `department` VALUES (NULL, '58', 'Nièvre', 5);
INSERT INTO `department` VALUES (NULL, '59', 'Nord', 17);
INSERT INTO `department` VALUES (NULL, '60', 'Oise', 19);
INSERT INTO `department` VALUES (NULL, '61', 'Orne', 4);
INSERT INTO `department` VALUES (NULL, '62', 'Pas-de-Calais', 17);
INSERT INTO `department` VALUES (NULL, '63', 'Puy-de-Dôme', 3);
INSERT INTO `department` VALUES (NULL, '64', 'Pyrénées-Atlantiques', 2);
INSERT INTO `department` VALUES (NULL, '65', 'Hautes-Pyrénées', 16);
INSERT INTO `department` VALUES (NULL, '66', 'Pyrénées-Orientales', 13);
INSERT INTO `department` VALUES (NULL, '67', 'Bas-Rhin', 1);
INSERT INTO `department` VALUES (NULL, '68', 'Haut-Rhin', 1);
INSERT INTO `department` VALUES (NULL, '69', 'Rhône', 22);
INSERT INTO `department` VALUES (NULL, '70', 'Haute-Saône', 10);
INSERT INTO `department` VALUES (NULL, '71', 'Saône-et-Loire', 5);
INSERT INTO `department` VALUES (NULL, '72', 'Sarthe', 18);
INSERT INTO `department` VALUES (NULL, '73', 'Savoie', 22);
INSERT INTO `department` VALUES (NULL, '74', 'Haute-Savoie', 22);
INSERT INTO `department` VALUES (NULL, '75', 'Paris', 12);
INSERT INTO `department` VALUES (NULL, '76', 'Seine-Maritime', 11);
INSERT INTO `department` VALUES (NULL, '77', 'Seine-et-Marne', 12);
INSERT INTO `department` VALUES (NULL, '78', 'Yvelines', 12);
INSERT INTO `department` VALUES (NULL, '79', 'Deux-Sèvres', 20);
INSERT INTO `department` VALUES (NULL, '80', 'Somme', 19);
INSERT INTO `department` VALUES (NULL, '81', 'Tarn', 16);
INSERT INTO `department` VALUES (NULL, '82', 'Tarn-et-Garonne', 16);
INSERT INTO `department` VALUES (NULL, '83', 'Var', 21);
INSERT INTO `department` VALUES (NULL, '84', 'Vaucluse', 21);
INSERT INTO `department` VALUES (NULL, '85', 'Vendée', 18);
INSERT INTO `department` VALUES (NULL, '86', 'Vienne', 20);
INSERT INTO `department` VALUES (NULL, '87', 'Haute-Vienne', 14);
INSERT INTO `department` VALUES (NULL, '88', 'Vosges', 15);
INSERT INTO `department` VALUES (NULL, '89', 'Yonne', 5);
INSERT INTO `department` VALUES (NULL, '90', 'Territoire de Belfort', 10);
INSERT INTO `department` VALUES (NULL, '91', 'Essonne', 12);
INSERT INTO `department` VALUES (NULL, '92', 'Hauts-de-Seine', 12);
INSERT INTO `department` VALUES (NULL, '93', 'Seine-Saint-Denis', 12);
INSERT INTO `department` VALUES (NULL, '94', 'Val-de-Marne', 12);
INSERT INTO `department` VALUES (NULL, '95', "Val-d'Oise", 12);


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table device_type
--  --------------------------------------------------------------------------------------

INSERT INTO `device_type` (`id_device_type`, `type_name`, `id_video`)
VALUES (NULL, "Chauffage", "1");

INSERT INTO `device_type` (`id_device_type`, `type_name`, `id_video`)
VALUES (NULL, "Lampe", "2");

INSERT INTO `device_type` (`id_device_type`, `type_name`, `id_video`)
VALUES (NULL, "Electromenager", "3");

INSERT INTO `device_type` (`id_device_type`, `type_name`, `id_video`)
VALUES (NULL, "Multimedia", "4");

INSERT INTO `device_type` (`id_device_type`, `type_name`, `id_video`)
VALUES (NULL, "Chauffe eau", "5");

INSERT INTO `device_type` (`id_device_type`, `type_name`, `id_video`)
VALUES (NULL, "Machine à laver", "6");


--  --------------------------------------------------------------------------------------
--  Ligne par défaut de la table security_degree
--  --------------------------------------------------------------------------------------

INSERT INTO `security_degree` (`id_security_degree`, `description`)
VALUES (NULL, "Faible");

INSERT INTO `security_degree` (`id_security_degree`, `description`)
VALUES (NULL, "Moyen");

INSERT INTO `security_degree` (`id_security_degree`, `description`)
VALUES (NULL, "Fort");