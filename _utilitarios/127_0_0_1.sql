-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Abr-2017 às 20:20
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

CREATE DATABASE IF NOT EXISTS `unetb` DEFAULT CHARACTER SET utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--


CREATE TABLE IF NOT EXISTS `unetb`.`user` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255)  COLLATE utf8_bin NOT NULL,
  `email` VARCHAR(255) COLLATE utf8_bin NOT NULL,
  `password` TEXT      COLLATE utf8_bin NOT NULL,
  `date` datetime default current_timestamp,
   PRIMARY KEY (`user_id`),
   UNIQUE (email)
) ENGINE=MYISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `unetb`.`qualidade` (
  `id`             INT(11) NOT NULL AUTO_INCREMENT,
  `lat`            FLOAT NOT NULL,
  `long`           FLOAT NOT NULL,
  `download_speed` FLOAT NOT NULL,
  `upload_speed`   FLOAT NOT NULL,
  `intensity`    FLOAT NOT NULL,
  `latency`       FLOAT NOT NULL,
  `packetloss`     FLOAT NOT NULL,
  `jitter`         FLOAT NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;