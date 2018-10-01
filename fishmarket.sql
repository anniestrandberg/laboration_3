-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 01 okt 2018 kl 15:27
-- Serverversion: 10.1.31-MariaDB
-- PHP-version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `fishmarket`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `products`
--

CREATE TABLE `products` (
  `name` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `place` varchar(30) NOT NULL,
  `calories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `products`
--

INSERT INTO `products` (`name`, `category`, `price`, `place`, `calories`) VALUES
('torsk', 'fisk', 199, 'alaska', 100),
('lax', 'fisk', 159, 'östersjön', 345),
('hälleflundra', 'fisk', 99, 'atlanten', 12),
('öring', 'fisk', 249, 'medelhavet', 84),
('röding', 'fisk', 199, 'svarta havet', 90),
('makrill', 'fisk', 49, 'alaska', 110),
('sill', 'fisk', 59, 'alaska', 114),
('aborre', 'fisk', 199, 'stilla havet', 180),
('svärdfisk', 'fisk', 189, 'östersjön', 338),
('gädda', 'fisk', 119, 'östersjön', 328),
('plattfisk', 'fisk', 119, 'indiska oceanen', 368),
('clownfisk', 'fisk', 199, 'nordvästatlanten', 199),
('blåsfisk', 'fisk', 299, 'medelhavet', 233),
('haj', 'fisk', 119, 'östersjön', 38),
('tonfisk', 'fisk', 119, 'svarta havet', 188),
('räkor', 'skaldjur', 349, 'alaska', 89),
('monsterkrabba', 'skaldjur', 199, 'svata havet', 78),
('romsås', 'tillbehör', 119, 'västkusten', 339),
('dillsås', 'tillbehör', 119, 'västkusten', 398),
('räkröra', 'tillbehör', 199, 'västkusten', 312);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
