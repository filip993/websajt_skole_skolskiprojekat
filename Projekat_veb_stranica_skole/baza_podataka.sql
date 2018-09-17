-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2016 at 12:58 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekat`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumenti`
--

CREATE TABLE `dokumenti` (
  `id` int(11) NOT NULL,
  `naziv_dokumenta` text COLLATE utf8_unicode_ci NOT NULL,
  `id_vezbe` int(11) NOT NULL,
  `id_saradnika` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dokumenti`
--

INSERT INTO `dokumenti` (`id`, `naziv_dokumenta`, `id_vezbe`, `id_saradnika`) VALUES
(7, 'DOS.pdf', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `predmeti`
--

CREATE TABLE `predmeti` (
  `id_predmeta` int(11) NOT NULL,
  `naziv_predmeta` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `opis_predmeta` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `predmeti`
--

INSERT INTO `predmeti` (`id_predmeta`, `naziv_predmeta`, `opis_predmeta`) VALUES
(33, 'Nemacki', 'K'),
(32, 'Matematika', 'u'),
(35, 'Osnovi elektronike', 'EEEEEEEE'),
(37, 'Elektrotehnika', 'Na ovom predmetu ce se raditi o...');

-- --------------------------------------------------------

--
-- Table structure for table `registracija`
--

CREATE TABLE `registracija` (
  `id` int(11) NOT NULL,
  `ime` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `zanimanje` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `password` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `o_saradniku` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registracija`
--

INSERT INTO `registracija` (`id`, `ime`, `prezime`, `email`, `slika`, `user_name`, `zanimanje`, `status`, `password`, `o_saradniku`) VALUES
(1, 'Nikola', 'Panajotov', 'nikola@gmail.com', '14040211_1098226963580767_2672468583792001087_n.jpg', 'kurac', '2', 0, '1', 'Rodjen je u Beogradu 1992 i zivi u Sremcici trenutno...'),
(5, 'Filip', 'Kurtaj', 'filipkurtaj@gmail.com', '13626621_1031413756914598_7202032802571376292_n.jpg', 'filip93', '1', 1, '1', 'Rodjen 1993. u Beograd...'),
(6, 'Marko ', 'Markovic', 'marko@gmail.com', 'elek.png', 'marko', '2', 1, '1', 'Ja sam kurac'),
(7, 'Vera', 'Kurtaj', 'verakurtaj@gmail.com', NULL, 'vera69', '1', 1, '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `saradnici`
--

CREATE TABLE `saradnici` (
  `id` int(11) NOT NULL,
  `id_korisnika` int(11) NOT NULL,
  `id_predmeta` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `saradnici`
--

INSERT INTO `saradnici` (`id`, `id_korisnika`, `id_predmeta`) VALUES
(77, 1, 32),
(83, 5, 37),
(82, 1, 35),
(81, 1, 32),
(80, 1, 33),
(79, 1, 33),
(78, 5, 32),
(84, 1, 32),
(85, 6, 32);

-- --------------------------------------------------------

--
-- Table structure for table `vezbe`
--

CREATE TABLE `vezbe` (
  `id_vezba` int(255) NOT NULL,
  `id_saradnik` int(255) NOT NULL,
  `ime_vezbe` varchar(1000) NOT NULL,
  `datum_vezbe` varchar(1000) NOT NULL,
  `opis_vezbe` varchar(10000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_predmet` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vezbe`
--

INSERT INTO `vezbe` (`id_vezba`, `id_saradnik`, `ime_vezbe`, `datum_vezbe`, `opis_vezbe`, `id_predmet`) VALUES
(1, 5, 'Vezba 1', '2222-02-22', NULL, 32),
(2, 5, 'Vezba 1', '2016-11-11', 'od...', 37),
(3, 5, 'Vezba 1', '2016-02-22', NULL, 37),
(4, 5, 'Vezba 2', '2222-02-22', NULL, 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumenti`
--
ALTER TABLE `dokumenti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predmeti`
--
ALTER TABLE `predmeti`
  ADD PRIMARY KEY (`id_predmeta`);

--
-- Indexes for table `registracija`
--
ALTER TABLE `registracija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saradnici`
--
ALTER TABLE `saradnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vezbe`
--
ALTER TABLE `vezbe`
  ADD PRIMARY KEY (`id_vezba`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumenti`
--
ALTER TABLE `dokumenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `predmeti`
--
ALTER TABLE `predmeti`
  MODIFY `id_predmeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `registracija`
--
ALTER TABLE `registracija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `saradnici`
--
ALTER TABLE `saradnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `vezbe`
--
ALTER TABLE `vezbe`
  MODIFY `id_vezba` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
