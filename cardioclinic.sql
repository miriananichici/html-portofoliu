-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3306
-- Timp de generare: iun. 08, 2022 la 08:44 PM
-- Versiune server: 5.7.31
-- Versiune PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `cardioclinic`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$4xREQ/f6.7B4DBeETX7jKu9dOASgEEX.6feRQj.XSckcb0iauHj/G', '2022-04-28 18:48:38');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id_programare` int(11) NOT NULL AUTO_INCREMENT,
  `id_medic` int(11) DEFAULT NULL,
  `nume_medic` varchar(255) NOT NULL,
  `prenume_medic` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `id_pacient` int(11) DEFAULT NULL,
  `name_pacient` varchar(255) NOT NULL,
  `prenume_pacient` varchar(255) NOT NULL,
  `timeslot` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_programare`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `bookings`
--

INSERT INTO `bookings` (`id_programare`, `id_medic`, `nume_medic`, `prenume_medic`, `date`, `id_pacient`, `name_pacient`, `prenume_pacient`, `timeslot`) VALUES
(19, 7, 'Testare', 'Medic', '2022-05-10', 10, 'Nichici', 'Miriana', '16:00PM - 16:30PM'),
(20, 7, 'Testare', 'Medic', '2022-05-11', 8, 'miriana', 'ana', '19:00PM - 19:30PM'),
(25, 7, 'Testare', 'Medic', '2022-05-14', 10, 'Nichici', 'Miriana', '09:30AM - 10:00AM'),
(26, 7, 'Testare', 'Medic', '2022-05-14', 10, 'Nichici', 'Miriana', '11:30AM - 12:00PM'),
(27, 7, 'Testare', 'Medic', '2022-05-14', 10, 'Nichici', 'Miriana', '10:00AM - 10:30AM'),
(28, 7, 'Testare', 'Medic', '2022-05-15', 11, 'Pacient1', 'Prenume', '08:00AM - 08:30AM'),
(29, 8, 'Sandor', 'Anca', '2022-05-15', 8, 'miriana', 'ana', '14:00PM - 14:30PM'),
(30, 8, 'Sandor', 'Anca', '2022-05-15', 8, 'miriana', 'ana', '13:30PM - 14:00PM'),
(31, 8, 'Sandor', 'Anca', '2022-05-17', 8, 'miriana', 'ana', '18:00PM - 18:30PM'),
(32, 8, 'Sandor', 'Anca', '2022-05-17', 8, 'miriana', 'ana', '14:30PM - 15:00PM'),
(33, 7, 'Testare', 'Medic', '2022-05-17', 10, 'Nichici', 'Miriana', '09:00AM - 09:30AM'),
(34, 6, 'Medic', 'Prima', '2022-05-21', 10, 'Nichici', 'Miriana', '15:00PM - 15:30PM'),
(35, 7, 'Testare', 'Medic', '2022-05-18', 12, 'Nichici', 'Branislav', '12:30PM - 13:00PM'),
(36, 7, 'Testare', 'Medic', '2022-05-19', 10, 'Nichici', 'Miriana', '12:00PM - 12:30PM'),
(37, 7, 'Testare', 'Medic', '2022-05-20', 10, 'Nichici', 'Miriana', '08:30AM - 09:00AM'),
(38, 7, 'Testare', 'Medic', '2022-05-28', 10, 'Nichici', 'Miriana', '11:30AM - 12:00PM'),
(39, 7, 'Testare', 'Medic', '2022-05-29', 10, 'Nichici', 'Miriana', '09:00AM - 09:30AM'),
(40, 8, 'Sandor', 'Anca', '2022-06-05', 10, 'Nichici', 'Miriana', '13:30PM - 14:00PM'),
(41, 8, 'Sandor', 'Anca', '2022-06-05', 10, 'Nichici', 'Miriana', '17:30PM - 18:00PM');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `medici`
--

DROP TABLE IF EXISTS `medici`;
CREATE TABLE IF NOT EXISTS `medici` (
  `id_medic` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nume` varchar(30) NOT NULL,
  `prenume` varchar(30) NOT NULL,
  PRIMARY KEY (`id_medic`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `medici`
--

INSERT INTO `medici` (`id_medic`, `username`, `password`, `nume`, `prenume`) VALUES
(8, 'sandoranca', '$2y$10$es6GhBW1TuIDNeJxLMNuxujkGpxHpSodJk67SCDzt9C3m4j2rUtDi', 'Sandor', 'Anca'),
(7, 'test', '$2y$10$0UlFtXTQFQu7Jqhteulp4uDORyFGlucE42qZ0KucwDq0Q45zWR40m', 'Testare', 'Medic'),
(6, 'medicmedic', '$2y$10$31fgbZcDI4QVZT0I68QhbuNWiIEfSnfoqzPvjVwY5yx0FbMQ8T7Ma', 'Medic', 'Prima');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `orar`
--

DROP TABLE IF EXISTS `orar`;
CREATE TABLE IF NOT EXISTS `orar` (
  `id_orar` int(11) NOT NULL AUTO_INCREMENT,
  `id_medic` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `close_time` time NOT NULL,
  `durata` varchar(10) NOT NULL,
  PRIMARY KEY (`id_orar`),
  UNIQUE KEY `id_medic` (`id_medic`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `orar`
--

INSERT INTO `orar` (`id_orar`, `id_medic`, `start_time`, `close_time`, `durata`) VALUES
(6, 6, '10:00:00', '16:00:00', '30'),
(5, 8, '13:00:00', '20:00:00', '30'),
(4, 7, '08:00:00', '13:00:00', '30'),
(7, 9, '12:12:00', '12:01:00', '22');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `pacienti`
--

DROP TABLE IF EXISTS `pacienti`;
CREATE TABLE IF NOT EXISTS `pacienti` (
  `id_pacient` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(30) NOT NULL,
  `sex` varchar(5) NOT NULL,
  `data_nastere` date NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `adresa` varchar(100) NOT NULL,
  `varsta` int(10) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pacient`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `pacienti`
--

INSERT INTO `pacienti` (`id_pacient`, `username`, `password`, `nume`, `prenume`, `sex`, `data_nastere`, `telefon`, `adresa`, `varsta`, `created_at`) VALUES
(8, 'miri11', '$2y$10$yFo1kUyF1q8u3P/4pzG9kucb3uJMVLa5jEyOqSBLtdr7lhut3xZgO', 'miriana', 'ana', 'f', '2000-01-27', '0773944973', 'Arad', 22, '2022-04-27 20:53:43'),
(9, 'miri27', '$2y$10$OanNmnXMNN/QUWnmaY9yqOo0M.oOdTO9HMR.fDmUb7J/I2EIMpa/m', 'Pop', 'Roger', 'm', '1997-05-15', '0774588392', 'Timisoara', 25, '2022-05-02 17:16:25'),
(10, 'miriananichici', '$2y$10$mkSIN6usIBseniRm5LkKCOaCW30zmFbWbR36MIJ/..karotyAtL1m', 'Nichici', 'Miriana', 'f', '1998-05-10', '1234567890', 'Arad', 25, '2022-05-02 22:14:14'),
(11, 'pacient', '$2y$10$3HTEX6.cpPr9EgCJljYs/OhT9sJYc/MpvRahTUWcV2EbuomhhofnK', 'Pacient1', 'Prenume', 'm', '1960-05-03', '0773899234', 'Timisoara', 62, '2022-05-14 19:53:38'),
(12, 'pacient3', '$2y$10$BvwrRL.Myc21mV0TqImrYOOJ9a03BnI0P7mj9q2p2LdGjv1oiq2ta', 'Nichici', 'Branislav', 'm', '1970-07-27', '0732348294', 'Zadareni', 52, '2022-05-16 22:01:28'),
(13, 'pacinet2', '$2y$10$GPjucXOvCG.daHz1ChdDZuUH7nRNf6OhCw2oM8Sqpl/FXgjYuKKI6', 'Stefanescu', 'Marian', 'm', '1981-04-13', '01234576382', 'Arad', 41, '2022-05-24 19:34:41'),
(14, 'abca', '$2y$10$DWvI/L1gT7zqzjIQbQWjo.T3lZ/sXbgWZevIwf9ufn4plwRQ7FJAu', 'abcd', 'abcd', 'm', '2013-04-16', 'abcd', '123', 12, '2022-05-24 19:49:23');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `rezultate`
--

DROP TABLE IF EXISTS `rezultate`;
CREATE TABLE IF NOT EXISTS `rezultate` (
  `id_rezultat` int(11) NOT NULL AUTO_INCREMENT,
  `id_programare` int(11) NOT NULL,
  `ritm_cardiac` int(10) DEFAULT NULL,
  `tensiune_sistolica` int(10) DEFAULT NULL,
  `tensiune_diastolica` int(100) DEFAULT NULL,
  `diagnostic` varchar(255) NOT NULL,
  `tratament` varchar(100) NOT NULL,
  `altele` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_rezultat`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `rezultate`
--

INSERT INTO `rezultate` (`id_rezultat`, `id_programare`, `ritm_cardiac`, `tensiune_sistolica`, `tensiune_diastolica`, `diagnostic`, `tratament`, `altele`) VALUES
(1, 19, 90, 120, 160, 'Anevrism de aorta', 'abcd', NULL),
(2, 28, 100, 190, 170, 'Fibrilatia atriala', 'zxc', NULL),
(3, 28, 88, 190, 210, 'Fibrilatia atriala', 'Eliquist 5mg; Colebil 10mg;', NULL),
(4, 20, 70, 140, 180, 'Hipertensiunea arteriala', 'Magne', NULL),
(5, 35, 100, 200, 260, 'Hipertensiunea arteriala', 'aaa', NULL),
(6, 36, 99, 140, 190, 'Fibrilatia atriala', 'Pastile', NULL),
(7, 39, 100, 200, 180, 'Hipertensiunea arteriala', 'Eliquist 5mg; Colebil 10mg;', 'consult relgat la 1 an');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `servicii`
--

DROP TABLE IF EXISTS `servicii`;
CREATE TABLE IF NOT EXISTS `servicii` (
  `id_serviciu` int(11) NOT NULL AUTO_INCREMENT,
  `tip_serviciu` varchar(50) NOT NULL,
  `cost` varchar(100) NOT NULL,
  PRIMARY KEY (`id_serviciu`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `servicii`
--

INSERT INTO `servicii` (`id_serviciu`, `tip_serviciu`, `cost`) VALUES
(1, 'Consultatie', '50 lei'),
(2, 'EKG', '100'),
(3, 'Ecografie', '200'),
(4, 'Holter', '150');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
