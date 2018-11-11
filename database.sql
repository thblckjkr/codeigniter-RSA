-- WARNING: This script deletes the old database. So, use it wisely
DROP DATABASE IF EXISTS securitytest;

CREATE DATABASE securitytest;
USE securitytest;

CREATE TABLE `users` (
	`user_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`user_nickname` VARCHAR(64) NOT NULL UNIQUE,
	`user_password` VARCHAR(255) NOT NULL,
   `user_name` VARCHAR(64) NOT NULL,
   `user_lastname` VARCHAR(64) NOT NULL,

   PRIMARY KEY(`user_id`)
) ENGINE=INNODB;

INSERT INTO `users` VALUES (
   NULL,
   'admin',
   '$2y$10$3FmaVyCh5a0R67FvG2jvAe9go2tPg61RyOk9hhHFVZ09o8HK/qW/e',
   'Teo',
   'Gonzalez Calzada'
);

create table `soft_keys`(
   `soft_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
   `soft_name` VARCHAR (100) NOT NULL,
   `soft_description` VARCHAR (300) NOT NULL,
   `soft_pid` TEXT NOT NULL,
   `soft_key` TEXT NOT NULL,
   `soft_notes` VARCHAR(500),

   PRIMARY KEY(`soft_id`)
) ENGINE=INNODB;

/****** Script for SelectTopNRows command from SSMS  ******/
INSERT INTO `soft_keys` VALUES
(
   NULL,
   'Microsoft Office 2017',
   'ssoftware para manejo de archivos y documentacion, solamente contiene Word, Excel, Power Point, OneNotes, Publisher, Outlook',
   '137681764237865728643',
   '12345-67890-ABCDE-FGHIJ-KLMNO',
   'esta clave de producto esta disponible para la cantidad de 50 usuarios'
),
(
   NULL,
   'Microsoft Office 2017',
   'software para manejo de archivos y documentacion, solamente contiene Word, Excel, Power Point, OneNotes, Publisher, Outlook',
   '238471905873409572345',
   'ABCDE-FGHIJ-12345-67890-11121',
   'esta clave de producto esta disponible para la cantidad de 50 usuarios'
),
(
   NULL,
   'Microsoft Autocad 2016',
   'software para el diseño de fixturas o cambios de lay-out',
   '183791742198748545758',
   'ZYXWV-12345-UTSRQ-67890-POANM',
   'esta clave de producto esta disponible para la cantidad de 2 usuarios'
),
(
   NULL,
   'Microsoft Project 2017',
   'software para el diseño de fixturas o cambios de lay-out',
   '724390754609873496734',
   'ZYXWV-UTSRQ-67890-POÑNM-12345',
   'esta clave de producto esta disponible para la cantidad de 2 usuarios'
),
(
   NULL,
   'Microsoft Visio 2017',
   'software para el diseño diagramas de flujo o para diagramas de networking',
   '872349057230458972093',
   'ZYXWV-UTSRQ-POÑNM-12345-67890',
   'esta clave de producto esta disponible para la cantidad de 2 usuarios'
),
(
   NULL,
   'Windows 7 Enterprise',
   'Sistema operativo para desktops de usuarios administrativos estaticos en oficina',
   '713286948762934876918',
   'ZYXWV-67890-POÑNM-UTSRQ-12345',
   'esta clave de producto esta disponible para la cantidad de 5 usuarios'
),
(
   NULL,
   'Windows 7 Enterprise',
   'Sistema operativo para desktops de usuarios administrativos estaticos en oficina',
   '290347201983740192875',
   'ZYXWV-67890-POÑNM-UTSRQ-12345',
   'esta clave de producto esta disponible para la cantidad de 5 usuarios'
);