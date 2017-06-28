DROP DATABASE unetb;
CREATE DATABASE IF NOT EXISTS `unetb` DEFAULT CHARACTER SET utf8;

--
-- Estrutura da tabela `user`
--


CREATE TABLE IF NOT EXISTS `unetb`.`user` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255)  COLLATE utf8_bin NOT NULL,
  `email` VARCHAR(255) COLLATE utf8_bin NOT NULL,
  `password` TEXT      COLLATE utf8_bin NOT NULL,
  `course` VARCHAR(255) COLLATE utf8_bin NOT NULL,
  `matricula`  VARCHAR(10) COLLATE utf8_bin NOT NULL,
  `cellphone` VARCHAR(14) COLLATE utf8_bin NOT NULL, 
  `date_register` datetime default current_timestamp,
   PRIMARY KEY (`user_id`),
   UNIQUE (email)
) ENGINE=MYISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Estrutura da tabela `networking_data`
--

CREATE TABLE IF NOT EXISTS `unetb`.`networking_data` (
  `id`             INT(11) NOT NULL AUTO_INCREMENT,
  `id_user`        DOUBLE  DEFAULT NULL,
  `lat`            DOUBLE  NOT NULL,
  `lng`            DOUBLE  NOT NULL,
  `download_speed` DOUBLE  NOT NULL,
  `upload_speed`   DOUBLE  NOT NULL,
  `intensity`      DOUBLE  NOT NULL,
  `latency`        DOUBLE  NOT NULL,
  `packetloss`     DOUBLE  NOT NULL,
  `jitter`         DOUBLE  NOT NULL,
  `access_point`  VARCHAR(17) COLLATE utf8_bin NOT NULL,
  `date_quality` datetime default current_timestamp,
   PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;