-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 08:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thecodentest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nume` text NOT NULL,
  `parola` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nume`, `parola`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `noutati`
--

CREATE TABLE `noutati` (
  `id` int(11) NOT NULL,
  `nume_stire` text NOT NULL,
  `text_stire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noutati`
--

INSERT INTO `noutati` (`id`, `nume_stire`, `text_stire`) VALUES
(38, 'Stire 1', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(39, 'Stire 2', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(40, 'Stre 3', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(41, 'Stire 4', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(42, 'Stire 5', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(43, 'Stire 5', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(44, 'Stire 5', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(45, 'Stire 5', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(46, 'Stire 5', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(47, 'Stire 5', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(48, 'Stire 5', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(49, 'Stire 5', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(50, 'Stire 5', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(51, 'Stire 5', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(52, 'Stire 5', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(53, 'Stire 5', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(54, 'Stire 5', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(55, 'Stire 5', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(56, 'Stire 5', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(57, 'Stire 5', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(58, 'Stire 5', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(59, 'Stire 5', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(60, 'Stire 5', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(61, 'Stire 5', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text '),
(62, 'Stire 5', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text ');

-- --------------------------------------------------------

--
-- Table structure for table `participanti`
--

CREATE TABLE `participanti` (
  `id` int(11) NOT NULL,
  `nume` text NOT NULL,
  `varsta` int(2) NOT NULL,
  `loc` text NOT NULL,
  `email` text NOT NULL,
  `punctaj_subiect1` int(2) DEFAULT NULL,
  `punctaj_subiect2` int(2) DEFAULT NULL,
  `punctaj_subiect3` int(2) DEFAULT NULL,
  `punctaj_total` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participanti`
--

INSERT INTO `participanti` (`id`, `nume`, `varsta`, `loc`, `email`, `punctaj_subiect1`, `punctaj_subiect2`, `punctaj_subiect3`, `punctaj_total`) VALUES
(3, 'marcel', 22, 'Facultatea de Automatica si Calculatoare, Universitatea din Craiova', 'marcel@yahoo.com', 25, 20, 30, 75),
(4, 'marcel', 22, 'Facultatea de Automatica si Calculatoare, Universitatea din Craiova', 'marcel@yahoo.com', 25, 20, 30, 75),
(5, 'marcel', 22, 'Facultatea de Automatica si Calculatoare, Universitatea din Craiova', 'marcel@yahoo.com', 25, 20, 30, 75),
(6, 'marcel', 22, 'Facultatea de Automatica si Calculatoare, Universitatea din Craiova', 'marcel@yahoo.com', 25, 20, 30, 75),
(8, 'marcel', 22, 'Facultatea de Automatica si Calculatoare, Universitatea din Craiova', 'marcel@yahoo.com', 25, 20, 30, 75),
(9, 'marcel', 22, 'Facultatea de Automatica si Calculatoare, Universitatea din Craiova', 'marcel@yahoo.com', 25, 20, 30, 75),
(10, 'marcel', 22, 'Facultatea de Automatica si Calculatoare, Universitatea din Craiova', 'marcel@yahoo.com', 25, 20, 30, 75),
(11, 'marcel', 22, 'Facultatea de Automatica si Calculatoare, Universitatea din Craiova', 'marcel@yahoo.com', 25, 20, 30, 75),
(12, 'marcel', 22, 'Facultatea de Automatica si Calculatoare, Universitatea din Craiova', 'marcel@yahoo.com', 25, 20, 30, 75),
(13, 'marcel', 22, 'Facultatea de Automatica si Calculatoare, Universitatea din Craiova', 'marcel@yahoo.com', 25, 20, 30, 75),
(14, 'marcel', 22, 'Facultatea de Automatica si Calculatoare, Universitatea din Craiova', 'marcel@yahoo.com', 25, 20, 30, 75),
(16, 'marcel', 22, 'Facultatea de Automatica si Calculatoare, Universitatea din Craiova', 'marcel@yahoo.com', 25, 20, 30, 75),
(17, 'marcel', 22, 'Facultatea de Automatica si Calculatoare, Universitatea din Craiova', 'marcel@yahoo.com', 25, 20, 30, 75),
(19, 'marcel', 22, 'Facultatea de Automatica si Calculatoare, Universitatea din Craiova', 'marcel@yahoo.com', 25, 20, 30, 75),
(20, 'marcel', 22, 'Facultatea de Automatica si Calculatoare, Universitatea din Craiova', 'marcel@yahoo.com', 25, 20, 30, 75),
(21, 'marcel', 22, 'Facultatea de Automatica si Calculatoare, Universitatea din Craiova', 'marcel@yahoo.com', 25, 20, 30, 75),
(22, 'marcel', 22, 'Facultatea de Automatica si Calculatoare, Universitatea din Craiova', 'marcel@yahoo.com', 25, 20, 30, 75),
(23, 'marcel', 22, 'Facultatea de Automatica si Calculatoare, Universitatea din Craiova', 'marcel@yahoo.com', 25, 20, 30, 75),
(24, 'marcel', 22, 'Facultatea de Automatica si Calculatoare, Universitatea din Craiova', 'marcel@yahoo.com', 25, 20, 30, 75);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noutati`
--
ALTER TABLE `noutati`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participanti`
--
ALTER TABLE `participanti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `noutati`
--
ALTER TABLE `noutati`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `participanti`
--
ALTER TABLE `participanti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
