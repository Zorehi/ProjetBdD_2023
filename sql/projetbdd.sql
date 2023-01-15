CREATE SCHEMA IF NOT EXISTS `projetbdd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projetbdd`;


--  --------------------------------------------------------------------------------------
--  Structure de la table apartment_type
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `apartment_type`;
CREATE TABLE apartment_type(
   `id_apartment_type` INT AUTO_INCREMENT,
   `description` VARCHAR(50)  NOT NULL,
   PRIMARY KEY(`id_apartment_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table room_typea
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `room_type`;
CREATE TABLE room_type(
   `id_room_type` INT AUTO_INCREMENT,
   `description` VARCHAR(50)  NOT NULL,
   `image_url` VARCHAR(50)  NOT NULL,
   PRIMARY KEY(`id_room_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table region
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `region`;
CREATE TABLE region(
   `id_region` INT AUTO_INCREMENT,
   `region_name` VARCHAR(50)  NOT NULL,
   PRIMARY KEY(`id_region`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table resource
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `resource`;
CREATE TABLE resource(
   `id_resource` INT AUTO_INCREMENT,
   `name` VARCHAR(50)  NOT NULL,
   `description` VARCHAR(50)  NOT NULL,
   `min_value` DOUBLE NOT NULL,
   `max_value` DOUBLE NOT NULL,
   PRIMARY KEY(`id_resource`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table substance
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `substance`;
CREATE TABLE `substance`(
   `id_substance` INT AUTO_INCREMENT,
   `name` VARCHAR(50)  NOT NULL,
   `description` VARCHAR(50)  NOT NULL,
   `min_value` DOUBLE NOT NULL,
   `max_value` DOUBLE NOT NULL,
   `critical_value` DOUBLE NOT NULL,
   `model_value` DOUBLE NOT NULL,
   PRIMARY KEY(`id_substance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table security_degree
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `security_degree`;
CREATE TABLE `security_degree`(
   `id_security_degree` INT AUTO_INCREMENT,
   `description` VARCHAR(50)  NOT NULL,
   PRIMARY KEY(`id_security_degree`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table video
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `video`;
CREATE TABLE `video`(
   `id_video` INT AUTO_INCREMENT,
   `web_adress` VARCHAR(70)  NOT NULL,
   PRIMARY KEY(`id_video`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table gender
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `gender`;
CREATE TABLE `gender`(
   `id_gender` INT AUTO_INCREMENT,
   `description` VARCHAR(50) ,
   PRIMARY KEY(`id_gender`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table users
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`(
   `id_users` INT AUTO_INCREMENT,
   `username` VARCHAR(50)  NOT NULL,
   `email` VARCHAR(255)  NOT NULL,
   `password` VARCHAR(128)  NOT NULL,
   `tel` VARCHAR(10)  NOT NULL,
   `firstname` VARCHAR(50)  NOT NULL,
   `lastname` VARCHAR(50)  NOT NULL,
   `birthday` DATE NOT NULL,
   `is_admin` TINYINT(1) NOT NULL DEFAULT 0,
   `is_active` TINYINT(1) NOT NULL DEFAULT 1,
   `create_time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   `id_gender` INT NOT NULL,
   PRIMARY KEY(`id_users`),
   FOREIGN KEY(`id_gender`) REFERENCES gender(`id_gender`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table department
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `department`;
CREATE TABLE department(
   `id_department` INT AUTO_INCREMENT,
   `department_code` VARCHAR(3)  NOT NULL,
   `department_name` VARCHAR(50)  NOT NULL,
   `id_region` INT NOT NULL,
   PRIMARY KEY(`id_department`),
   FOREIGN KEY(`id_region`) REFERENCES region(`id_region`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table device_type
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `device_type`;
CREATE TABLE device_type(
   `id_device_type` INT AUTO_INCREMENT,
   `type_name` VARCHAR(50)  NOT NULL,
   `id_video` INT NOT NULL,
   PRIMARY KEY(`id_device_type`),
   FOREIGN KEY(`id_video`) REFERENCES video(`id_video`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table city
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `city`;
CREATE TABLE city(
   `id_city` INT AUTO_INCREMENT,
   `postcode` DECIMAL(5,0)   NOT NULL,
   `city_name` VARCHAR(50)  NOT NULL,
   `id_department` INT NOT NULL,
   PRIMARY KEY(`id_city`),
   FOREIGN KEY(`id_department`) REFERENCES department(`id_department`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table house
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `house`;
CREATE TABLE house(
   `id_house` INT AUTO_INCREMENT,
   `house_name` VARCHAR(50)  NOT NULL,
   `isolation_degree` INT NOT NULL,
   `eval_eco` VARCHAR(50)  NOT NULL,
   `citizen_degree` INT NOT NULL,
   `street` VARCHAR(50) ,
   `house_number` INT,
   `id_city` INT NOT NULL,
   PRIMARY KEY(`id_house`),
   FOREIGN KEY(`id_city`) REFERENCES city(`id_city`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table apartment
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `apartment`;
CREATE TABLE apartment(
   `id_apartment` INT AUTO_INCREMENT,
   `num` INT NOT NULL,
   `hab` INT NOT NULL,
   `citizen_degree` INT NOT NULL,
   `security_degree` INT,
   `id_security_degree` INT NOT NULL,
   `id_house` INT NOT NULL,
   `id_apartment_type` INT NOT NULL,
   PRIMARY KEY(`id_apartment`),
   FOREIGN KEY(`id_security_degree`) REFERENCES security_degree(`id_security_degree`),
   FOREIGN KEY(`id_house`) REFERENCES house(`id_house`),
   FOREIGN KEY(`id_apartment_type`) REFERENCES apartment_type(`id_apartment_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table room
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `room`;
CREATE TABLE room(
   `id_room` INT AUTO_INCREMENT,
   `room_name` VARCHAR(50)  NOT NULL,
   `id_room_type` INT NOT NULL,
   `id_apartment` INT NOT NULL,
   PRIMARY KEY(`id_room`),
   FOREIGN KEY(`id_room_type`) REFERENCES room_type(`id_room_type`),
   FOREIGN KEY(`id_apartment`) REFERENCES apartment(`id_apartment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table device
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `device`;
CREATE TABLE device(
   `id_device` INT AUTO_INCREMENT,
   `device_name` VARCHAR(50)  NOT NULL,
   `description_device` VARCHAR(50)  NOT NULL,
   `description_place` VARCHAR(30) ,
   `id_device_type` INT NOT NULL,
   `id_room` INT NOT NULL,
   PRIMARY KEY(`id_device`),
   FOREIGN KEY(`id_room`) REFERENCES room(`id_room`),
   FOREIGN KEY(`id_device_type`) REFERENCES device_type(`id_device_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table owner
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `owner`;
CREATE TABLE owner(
   `id_house` INT,
   `from_date` DATE,
   `to_date` DATE NOT NULL DEFAULT '0000-00-00',
   `id_users` INT,
   PRIMARY KEY(`id_house`, `from_date`),
   FOREIGN KEY(`id_house`) REFERENCES house(`id_house`),
   FOREIGN KEY(`id_users`) REFERENCES users(`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table tenant
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `tenant`;
CREATE TABLE tenant(
   `id_apartment` INT,
   `from_date` DATE,
   `to_date` DATE NOT NULL DEFAULT '0000-00-00',
   `id_users` INT,
   PRIMARY KEY(`id_apartment`, `from_date`),
   FOREIGN KEY(`id_apartment`) REFERENCES apartment(`id_apartment`),
   FOREIGN KEY(`id_users`) REFERENCES users(`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table has_room_type
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `has_room_type`;
CREATE TABLE has_room_type(
   `id_apartment_type` INT,
   `id_room_type` INT,
   PRIMARY KEY(`id_apartment_type`, `id_room_type`),
   FOREIGN KEY(`id_apartment_type`) REFERENCES apartment_type(`id_apartment_type`),
   FOREIGN KEY(`id_room_type`) REFERENCES room_type(`id_room_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table emit
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `emit`;
CREATE TABLE emit(
   `id_device_type` INT,
   `id_substance` INT,
   PRIMARY KEY(`id_device_type`, `id_substance`),
   FOREIGN KEY(`id_device_type`) REFERENCES device_type(`id_device_type`),
   FOREIGN KEY(`id_substance`) REFERENCES substance(`id_substance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table consume
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `consume`;
CREATE TABLE consume(
   `id_device_type` INT,
   `id_resource` INT,
   PRIMARY KEY(`id_device_type`, `id_resource`),
   FOREIGN KEY(`id_device_type`) REFERENCES device_type(`id_device_type`),
   FOREIGN KEY(`id_resource`) REFERENCES resource(`id_resource`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table turn_on
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `turn_on`;
CREATE TABLE turn_on(
   `id_device` INT,
   `from_date` DATETIME,
   `to_date` DATETIME,
   PRIMARY KEY(`id_device`, `from_date`),
   FOREIGN KEY(`id_device`) REFERENCES device(`id_device`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table emission
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `emission`;
CREATE TABLE emission(
   `id_device` INT,
   `id_substance` INT,
   `emission_per_hour` DOUBLE NOT NULL,
   PRIMARY KEY(`id_device`, `id_substance`),
   FOREIGN KEY(`id_device`) REFERENCES device(`id_device`),
   FOREIGN KEY(`id_substance`) REFERENCES substance(`id_substance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  --------------------------------------------------------------------------------------
--  Structure de la table consumption
--  --------------------------------------------------------------------------------------

DROP TABLE IF EXISTS `consumption`;
CREATE TABLE consumption(
   `id_device` INT,
   `id_resource` INT,
   `consumption_per_hour` DOUBLE NOT NULL,
   PRIMARY KEY(`id_device`, `id_resource`),
   FOREIGN KEY(`id_device`) REFERENCES device(`id_device`),
   FOREIGN KEY(`id_resource`) REFERENCES resource(`id_resource`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--  --------------------------------------------------------------------------------------
--  Structure de la vue turn_on_desc
--  --------------------------------------------------------------------------------------

CREATE OR REPLACE VIEW search_device AS
SELECT R.id_apartment, D.id_device, D.id_device_name, D.description_device, D.description_place, D.id_device_type, DT.type_name, D.id_room, R.room_name, T.from_date, T.to_date
FROM device AS D LEFT OUTER JOIN room R ON(D.id_room = R.id_room)
				     LEFT OUTER JOIN device_type AS DT ON(D.id_device_type = DT.id_device_type)
                 LEFT OUTER JOIN turn_on_desc AS T ON(D.id_device = T.id_device);


--  --------------------------------------------------------------------------------------
--  Structure de la vue turn_on_desc
--  --------------------------------------------------------------------------------------

CREATE OR REPLACE VIEW turn_on_desc AS
SELECT id_device, from_date, to_date
FROM turn_on
GROUP BY id_device
ORDER BY id_device DESC;

--  --------------------------------------------------------------------------------------
--  Structure de la vue uptime_by_device
--  --------------------------------------------------------------------------------------

CREATE OR REPLACE VIEW uptime_by_device AS
SELECT D.id_device,
       DATE(T.from_date) AS date,
       D.id_room,
       SUM(TO_SECONDS(IF(T.to_date = '0000-00-00 00:00:00', SYSDATE(), T.to_date)) - TO_SECONDS(T.from_date)) AS uptime
FROM device AS D LEFT OUTER JOIN turn_on AS T ON(D.id_device = T.id_device)
WHERE DATEDIFF(T.from_date, SYSDATE()) < 30
GROUP BY D.id_device, date;


--  --------------------------------------------------------------------------------------
--  Structure de la vue uptime_by_device_with_emission
--  --------------------------------------------------------------------------------------

CREATE OR REPLACE VIEW uptime_by_device_with_emission AS
SELECT UP.id_device,
	    E.id_substance,
       E.emission_per_hour,
       UP.date,
       UP.id_room,
       UP.uptime
FROM uptime_by_device AS UP LEFT OUTER JOIN emission AS E ON(UP.id_device = E.id_device)
GROUP BY UP.id_device, E.id_substance, UP.date;


--  --------------------------------------------------------------------------------------
--  Structure de la vue uptime_by_device_with_consumption
--  --------------------------------------------------------------------------------------

CREATE OR REPLACE VIEW uptime_by_device_with_consumption AS
SELECT UP.id_device,
	    C.id_resource,
       C.consumption_per_hour,
       UP.date,
       UP.id_room,
       UP.uptime
FROM uptime_by_device AS UP LEFT OUTER JOIN consumption AS C ON(UP.id_device = C.id_device)
GROUP BY UP.id_device, C.id_resource, UP.date;


--  --------------------------------------------------------------------------------------
--  Structure de la vue uptime_by_apartment_with_emission
--  --------------------------------------------------------------------------------------

CREATE OR REPLACE VIEW uptime_by_apartment_with_emission AS
SELECT R.id_apartment,
       UP.id_substance,
       UP.date,
       A.id_house,
       UP.emission_per_hour,
       SUM(UP.uptime) AS uptime
FROM uptime_by_device_with_emission AS UP LEFT OUTER JOIN room AS R ON (UP.id_room = R.id_room)
							                     LEFT OUTER JOIN apartment AS A ON(R.id_apartment = A.id_apartment)
GROUP BY R.id_apartment, UP.id_substance, UP.date;


--  --------------------------------------------------------------------------------------
--  Structure de la vue uptime_by_apartment_with_consumption
--  --------------------------------------------------------------------------------------

CREATE OR REPLACE VIEW uptime_by_apartment_with_consumption AS
SELECT R.id_apartment,
       UP.id_resource,
       UP.date,
       A.id_house,
       UP.consumption_per_hour,
       SUM(UP.uptime) AS uptime
FROM uptime_by_device_with_consumption AS UP LEFT OUTER JOIN room AS R ON (UP.id_room = R.id_room)
							                        LEFT OUTER JOIN apartment AS A ON(R.id_apartment = A.id_apartment)
GROUP BY R.id_apartment, UP.id_resource, UP.date;


--  --------------------------------------------------------------------------------------
--  Structure de la vue uptime_by_house_with_emission
--  --------------------------------------------------------------------------------------

CREATE OR REPLACE VIEW uptime_by_house_with_emission AS
SELECT H.id_house,
       UP.id_substance,
       UP.date,
       UP.emission_per_hour,
       SUM(UP.uptime)
FROM uptime_by_apartment_with_emission AS UP LEFT OUTER JOIN house AS H ON(UP.id_house = H.id_house)
GROUP BY H.id_house, UP.id_substance, UP.date


--  --------------------------------------------------------------------------------------
--  Structure de la vue uptime_by_house_with_consumption
--  --------------------------------------------------------------------------------------

CREATE OR REPLACE VIEW uptime_by_house_with_consumption AS
SELECT H.id_house,
       UP.id_resource,
       UP.date,
       UP.consumption_per_hour,
       SUM(UP.uptime)
FROM uptime_by_apartment_with_consumption AS UP LEFT OUTER JOIN house AS H ON(UP.id_house = H.id_house)
GROUP BY H.id_house, UP.id_resource, UP.date