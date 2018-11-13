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
( NULL,'Microsoft Office 2017','Software para manejo de archivos y documentacion, solamente contiene Word, Excel, Power Point, OneNotes, Publisher, Outlook','jcrmq4Fc4bLkCjD5d7w6z3df8MxAyZjOVkbbJJWxtbKCbogK96pOp8sUwgT4hzubDsaBtCxuOn2xGWXBDpFItQcfK5LMLisueI/pbw52CAZM6l0jyTbNTL47uT52zu6Gk0TT1Bu6mEOvQFdUWy1DZc/vajD0hNupfVB/HoP2nn0=','xDCHhxxjT5s1nu3GdszSH+7ARPgUx+VeRYN4OMxQIOp+FSTX5R+UdUvYMWcNgJnq9AffOkVqz763tCDcpPMcaC2owz9LgvQREIhvy/cM4XZIgkl4ccHLkukWGZ54rjwORsDgTGdrGSLjRPd4yA4wYkMEHdh4GrCaU+6WOO7xgJM=','esta clave de producto esta disponible para la cantidad de 50 usuarios'), 
( NULL,'Microsoft Office 2017','Software para manejo de archivos y documentacion, solamente contiene Word, Excel, Power Point, OneNotes, Publisher, Outlook','yX0pSfDc7KqrjMbUWciGIsdrWc6/Uiv4+vCPib/+iA3SSVltGtqHTsRfAv9GiloofMfzSMOqA1Ry5+9jytvTa22eKDFi/dbpstQVVU3Z+ZL17qQjF8sWIoAL17gGz05ExCaE9XvOk+5lcGyOHTRz/aHi6kCHC/0p2w7efb60wM8=','y68UFx3fBwqbnlRlmVbS/A8URbyT3VexZNzp7LVDS0DSo5kmJL+QyXvj7ppSFSkDuMRXHgqOHGnuY8nGmDl9GRrwQHM1isn302AW0NQq2MdT4swzBmCHgi+KuOBuMiSN0jqq5QLMvfq6oNc5KqT4wWGsIHslcrn/zMBYApHPOT0=','esta clave de producto esta disponible para la cantidad de 50 usuarios'), 
( NULL,'Microsoft Autocad 2016','Software para el diseño de fixturas o cambios de lay-out','iVo821ns9kZtHVrgcSz9g2zvwpDHPQQuYwRCI8ntWNEqBvMGGAXq7RT1OaybJtFo1WC/Kg5SJstl6l0HuEajJTL0kiB5S3jj4EONLZlsiRYWXz1EsegpeTNEamfqoOiETuh37Bkf9w8MwwC2UiT3zVMKhPS6YD2BznT4zqRb6B8=','r3tnRqiEi6Ga5idTBbWmQnsIXEDdjOw7Dm3Uwc5v+XeWHzx1vDcf66tY1CDdc1X1f2hIvpW73CWf/JoVB/Ge+3oceXfHLXDXIlw5F14vpc2Tt2PeUMKga7XvFsGcCln0qnkfSq1ljhfY5laRYo4HGWkrC4QZBuylw9xW76QkUEg=','esta clave de producto esta disponible para la cantidad de 2 usuarios'), 
( NULL,'Microsoft Project 2017','Software para el diseño de fixturas o cambios de lay-out','rrhVnY0dN5oVe7n4UDeBGNp2r/uKGm1GqGQUo28lP7/SsLWLUyciCNWtkGPYzOwZtx8ncbonkiqgPuCqIt3MGaAcaTVmE6rNElx2Mq+QLj3fSyknd2E00PUWgTcvK1iCvqk2HsV2mmHh+FSLn5FxSxbDCCFh1Bfl6ddZ9L33iiY=','ri1Lhz5bPDb3WNghkUPF4rivdcxTn0SdGkiEbGFddT9VcQ09ZXkHzyal2AYJBl3RwKQ4BTEy43AJWX7elzVZLCAa8oBdjHxehPACTUg4xd8+OqgmFt7wS8KwYuJLRVZ4hd7l2ChMj40ljffRIK1f+4fLgJtkJgDIidJL9/WIB1U=','esta clave de producto esta disponible para la cantidad de 2 usuarios'), 
( NULL,'Microsoft Visio 2017','Software para el diseño diagramas de flujo o para diagramas de networking','Rba7JPXfu0CALzo0PvoqzoGlVsqXMtYYk+J47JnubiPriur5gihKnBZVMIlxVnOA9yfBxSRli3EfJYuRPK8AD042JvPfiJ5XGSqFLtQDg5746Lpi+uTGqFC7kidC9zGJamIQkGcNs+Fh+dBj0kEWnXJDZT84sYZg+z94N5anP40=','MzCeriwJBF6VQSbNvZZDTNT7RUK8Sr4jq4mQnVLkVnf71Ilrrk1tAJp/cbPMdlUPPgDSBV7drwAlgH1uj8qSxg5eAwP/Ax8ItUn9QDKtLhR7OfOmm8jwh5cljkUIR1ni17usZAEB5hIWKwCgTqA1Pryj7zbSwy6GQTvL8Cjh/yQ=','esta clave de producto esta disponible para la cantidad de 2 usuarios'), 
( NULL,'Windows 7 Enterprise','Sistema operativo para desktops de usuarios administrativos estaticos en oficina','HTpv1QlUeYrasN8ybTcSPynjOnfqHv04cImKMCBxfW+xOblRrZh/5doD5PORWB0F7Eim930D3GO4JFmEPcpmFPbTTDBTLPKZ5us4Iyt8txIm79DocHl7kwLHwqgWBtwparHsRTMwGKyLz+5XWiH1Rj2a7mvMrZMh61F/iuvII20=','6zmX7H8B25hTBLi2Sck6s+p0EzuvrqgLpICMMfOcvE+7vEshF61gTaug9UzaKdpjkqq3uIu3Cy5WE+0EAQCwMc8NaSdDL33/NgzDKnzM4gX4ay3wjM/quGmmgwYlfGY/yBk1K5L3/lvAs69OS6vtLL/+p7J/KhkoOss6uJ9pfYQ=','esta clave de producto esta disponible para la cantidad de 5 usuarios'), 
( NULL,'Windows 7 Enterprise','Sistema operativo para desktops de usuarios administrativos estaticos en oficina','cmRK/xl6TTcXFGnatlyb+7xIGVwPQ6unt+YJ6ImwSGpFPT74HHOz5LbACkZrvRVlDoX0RCMephh3S4NmanV3q1bL7Pshhfuwz9XDjTovf39//Q4/CIaXs+6PDr22b40IlZVAopT4Q65negCq57j3Ty//7b05tGxkANKAlnCsoKw=','uj1ay+fA/WjLbGasj3Hb49J30xD5Ush6Tvkka75SZDeL6gP6WoUeVLKGDVAbarRrPnzIzMzJEFx6gH/KdH2mTwDRhSEp+g8HtXYlV14nXzH5lFJuIx5NoFMeZCiPg+Rc95a5cyqbGn7xKTGJVVxSSKf7HQhqCZGIZQ1zGosBN+Q=','esta clave de producto esta disponible para la cantidad de 5 usuarios');