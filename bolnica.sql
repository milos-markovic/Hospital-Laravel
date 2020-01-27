-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2020 at 06:55 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bolnica`
--

-- --------------------------------------------------------

--
-- Table structure for table `dijagnoza`
--

CREATE TABLE `dijagnoza` (
  `dijagnoza_id` int(11) NOT NULL,
  `dijagnoza_naziv` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dijagnoza`
--

INSERT INTO `dijagnoza` (`dijagnoza_id`, `dijagnoza_naziv`) VALUES
(1, 'Grip'),
(2, 'Upala krajnika'),
(3, 'Parestezija nerva'),
(4, 'Kardiomiopatija'),
(5, 'Anksioznost'),
(6, 'Neuropatija'),
(7, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `dijagnoza_lek`
--

CREATE TABLE `dijagnoza_lek` (
  `lek_dijagnoza_id` int(11) NOT NULL,
  `dijagnoza_id` int(11) NOT NULL,
  `lek_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dijagnoza_lek`
--

INSERT INTO `dijagnoza_lek` (`lek_dijagnoza_id`, `dijagnoza_id`, `lek_id`) VALUES
(10, 1, 1),
(11, 2, 1),
(12, 1, 2),
(13, 2, 2),
(14, 3, 3),
(15, 4, 4),
(16, 5, 4),
(17, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnik_id` int(11) NOT NULL,
  `ime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vrsta_korisnik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnik_id`, `ime`, `prezime`, `adresa`, `telefon`, `username`, `email`, `password`, `vrsta_korisnik_id`) VALUES
(1, 'Milos', 'Milosevic', 'Milosa Milosevica 56', '1152463', 'milos', 'milos@milos.com', '$2y$10$2iZggubqFDCcayLPa89b.O4vwskJTM5r0gW50BzGGANci0ATXjV8O', 1),
(2, 'Bojana ', 'Bojanic', 'Bojane Bojanic 5', '11824569', 'bojana', 'bojana@bojana.com', '$2y$10$XZ/tspmdSDwMaj8ZPvRE7.5RuW7kRF5fjQTMl5UXyffTV4uSAe73m', 2),
(3, 'Nikola', 'Nikolic', 'Nikole Nikolic 68', '1194862', 'nikola', 'nikola@nikola.com', '$2y$10$WD7HfRAfHxhdNEQo4hX1m.QqdHg/wspGVbE8K8m.8FizSVEJprI6W', 3),
(4, 'Zorana', 'Zoranic', 'Zorane Zoranic 69', '11854962', 'zorana', 'zorana@zorana.com', '$2y$10$qOXsfcqBNlP9cpDGqRBCDOlSSmUjnHvStLNUUm0z1GVgttMyoSQ8G', 2),
(5, 'Ana', 'Anic', 'Ane Anic 75', '11854823', 'ana', 'ana@ana.com', '$2y$10$SioxEyeKHyeKh6KPVuP1Z.upuni9XsjbJIhYRIaCnT.mVmk.NzXJy', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lek`
--

CREATE TABLE `lek` (
  `lek_id` int(11) NOT NULL,
  `lek_naziv` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lek_sifra` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lek_stanje_magacin` int(11) NOT NULL,
  `lek_kategorija_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lek`
--

INSERT INTO `lek` (`lek_id`, `lek_naziv`, `lek_sifra`, `lek_stanje_magacin`, `lek_kategorija_id`) VALUES
(1, 'Brufen', 'B12345', 50, 1),
(2, 'Paracetamol', 'P12345', 80, 2),
(3, 'Milgamma', 'M12345', 200, 3),
(4, 'Bromazepam', 'R12345', 600, 4),
(5, 'Bromizoval', 'B15246', 800, 5),
(6, 'Aspirin', 'A12345', 900, 1),
(7, 'Vitamin C', 'V00548', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lek_kategorija`
--

CREATE TABLE `lek_kategorija` (
  `lek_kategorija_id` int(11) NOT NULL,
  `lek_kategorija_naziv` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lek_kategorija`
--

INSERT INTO `lek_kategorija` (`lek_kategorija_id`, `lek_kategorija_naziv`) VALUES
(1, 'Antipiretici'),
(2, 'Analgetici'),
(3, 'Vitamini'),
(4, 'Sedativi'),
(5, 'Hipnotici'),
(8, 'Test 1'),
(9, 'nova kategorija'),
(10, 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `pacijent`
--

CREATE TABLE `pacijent` (
  `pacijent_id` int(11) NOT NULL,
  `pacijent_ime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pacijent_prezime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pacijent_adresa` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pacijent_telefon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pacijent_datum_rodjenja` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pacijent_pol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pacijent_krvna_grupa` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `pacijent_broj_knjizice` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pacijent_broj_kartona` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `korisnik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pacijent`
--

INSERT INTO `pacijent` (`pacijent_id`, `pacijent_ime`, `pacijent_prezime`, `pacijent_adresa`, `pacijent_telefon`, `pacijent_datum_rodjenja`, `pacijent_pol`, `pacijent_krvna_grupa`, `pacijent_broj_knjizice`, `pacijent_broj_kartona`, `korisnik_id`) VALUES
(1, 'Mirko', 'Pavlovic', 'Pavla Pavlovica 95', '11975842', '2009-12-11', 'M', 'B+', 'P11111', 'P111', 3),
(2, 'Milica', 'Milicevic', 'Milice Milic 56', '11857648', '1955-12-17', 'Ž', 'A+', 'P1112', 'P112', 5),
(7, 'test 1', 'test', 'test', 'test', '12/18/2019', 'Ž', '0-', '324', '565', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pacijent_dijagnoza`
--

CREATE TABLE `pacijent_dijagnoza` (
  `pacijent_dijagnoza_id` int(11) NOT NULL,
  `pacijent_id` int(11) NOT NULL,
  `dijagnoza_id` int(11) NOT NULL,
  `lek_id` int(11) NOT NULL,
  `opis_dijagnoza` text COLLATE utf8_unicode_ci NOT NULL,
  `datum_posete` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pacijent_dijagnoza`
--

INSERT INTO `pacijent_dijagnoza` (`pacijent_dijagnoza_id`, `pacijent_id`, `dijagnoza_id`, `lek_id`, `opis_dijagnoza`, `datum_posete`) VALUES
(1, 1, 1, 1, 'neki opis grip', '2019-12-02'),
(2, 2, 2, 2, 'neki opis upala krajnika', '2019-12-03'),
(3, 1, 4, 3, 'hfdgfdg', '2019-12-24'),
(4, 1, 1, 2, 'fdsfds', '2019-12-24'),
(5, 1, 1, 3, '', '2019-12-24'),
(6, 1, 1, 5, 'hgrh', '2019-12-24'),
(109, 1, 1, 2, 'csad', '2019-12-30'),
(110, 1, 7, 2, 'jghj', '2019-12-30'),
(111, 1, 1, 2, 'Opis bolesti', '2019-12-30'),
(112, 1, 1, 4, 'Opis bolesti', '2019-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `vrsta_korisnik`
--

CREATE TABLE `vrsta_korisnik` (
  `vrsta_korisnik_id` int(11) NOT NULL,
  `vrsta_korisnik_naziv` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vrsta_korisnik`
--

INSERT INTO `vrsta_korisnik` (`vrsta_korisnik_id`, `vrsta_korisnik_naziv`) VALUES
(1, 'Administrator'),
(2, 'Asistent'),
(3, 'Lekar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dijagnoza`
--
ALTER TABLE `dijagnoza`
  ADD PRIMARY KEY (`dijagnoza_id`) USING BTREE;

--
-- Indexes for table `dijagnoza_lek`
--
ALTER TABLE `dijagnoza_lek`
  ADD PRIMARY KEY (`lek_dijagnoza_id`),
  ADD KEY `lek_id` (`lek_id`),
  ADD KEY `dijagnoza_id` (`dijagnoza_id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnik_id`) USING BTREE,
  ADD KEY `vrsta_korisnik_id` (`vrsta_korisnik_id`);

--
-- Indexes for table `lek`
--
ALTER TABLE `lek`
  ADD PRIMARY KEY (`lek_id`) USING BTREE,
  ADD KEY `lek_kategorija_id` (`lek_kategorija_id`) USING BTREE;

--
-- Indexes for table `lek_kategorija`
--
ALTER TABLE `lek_kategorija`
  ADD PRIMARY KEY (`lek_kategorija_id`);

--
-- Indexes for table `pacijent`
--
ALTER TABLE `pacijent`
  ADD PRIMARY KEY (`pacijent_id`),
  ADD KEY `korisnik_id` (`korisnik_id`);

--
-- Indexes for table `pacijent_dijagnoza`
--
ALTER TABLE `pacijent_dijagnoza`
  ADD PRIMARY KEY (`pacijent_dijagnoza_id`),
  ADD KEY `pacijent_id` (`pacijent_id`),
  ADD KEY `dijagnoza_id` (`dijagnoza_id`),
  ADD KEY `lek_id` (`lek_id`);

--
-- Indexes for table `vrsta_korisnik`
--
ALTER TABLE `vrsta_korisnik`
  ADD PRIMARY KEY (`vrsta_korisnik_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dijagnoza`
--
ALTER TABLE `dijagnoza`
  MODIFY `dijagnoza_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dijagnoza_lek`
--
ALTER TABLE `dijagnoza_lek`
  MODIFY `lek_dijagnoza_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lek`
--
ALTER TABLE `lek`
  MODIFY `lek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lek_kategorija`
--
ALTER TABLE `lek_kategorija`
  MODIFY `lek_kategorija_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pacijent`
--
ALTER TABLE `pacijent`
  MODIFY `pacijent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pacijent_dijagnoza`
--
ALTER TABLE `pacijent_dijagnoza`
  MODIFY `pacijent_dijagnoza_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `vrsta_korisnik`
--
ALTER TABLE `vrsta_korisnik`
  MODIFY `vrsta_korisnik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dijagnoza_lek`
--
ALTER TABLE `dijagnoza_lek`
  ADD CONSTRAINT `fk_lek_dij_dijagnoza` FOREIGN KEY (`dijagnoza_id`) REFERENCES `dijagnoza` (`dijagnoza_id`),
  ADD CONSTRAINT `fk_lek_dij_lek` FOREIGN KEY (`lek_id`) REFERENCES `lek` (`lek_id`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `fk_kor_vrsta_kor` FOREIGN KEY (`vrsta_korisnik_id`) REFERENCES `vrsta_korisnik` (`vrsta_korisnik_id`);

--
-- Constraints for table `lek`
--
ALTER TABLE `lek`
  ADD CONSTRAINT `fk_lek_lek_kat` FOREIGN KEY (`lek_kategorija_id`) REFERENCES `lek_kategorija` (`lek_kategorija_id`);

--
-- Constraints for table `pacijent`
--
ALTER TABLE `pacijent`
  ADD CONSTRAINT `fk_pac_korisnik` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`);

--
-- Constraints for table `pacijent_dijagnoza`
--
ALTER TABLE `pacijent_dijagnoza`
  ADD CONSTRAINT `fk_dijagnoza_d` FOREIGN KEY (`dijagnoza_id`) REFERENCES `dijagnoza` (`dijagnoza_id`),
  ADD CONSTRAINT `fx_pacijent_d` FOREIGN KEY (`pacijent_id`) REFERENCES `pacijent` (`pacijent_id`),
  ADD CONSTRAINT `pacijent_dijagnoza_ibfk_1` FOREIGN KEY (`lek_id`) REFERENCES `lek` (`lek_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
