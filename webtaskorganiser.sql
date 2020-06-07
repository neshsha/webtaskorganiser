-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 11:41 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtaskorganiser`
--
CREATE DATABASE IF NOT EXISTS `webtaskorganiser` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `webtaskorganiser`;

-- --------------------------------------------------------

--
-- Table structure for table `aktivnosti`
--

CREATE TABLE `aktivnosti` (
  `id` int(10) UNSIGNED NOT NULL,
  `naziv` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `aktivnost` text COLLATE utf8_unicode_ci NOT NULL,
  `namenjena` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prioritet` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `rok_izvrsenja` date NOT NULL,
  `vreme_slanja` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `korisnik_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(10) UNSIGNED NOT NULL,
  `korisnicko_ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ime_prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prioritet_korisnika` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status_korisnika` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivnosti`
--
ALTER TABLE `aktivnosti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `korisnik_id` (`korisnik_id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktivnosti`
--
ALTER TABLE `aktivnosti`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktivnosti`
--
ALTER TABLE `aktivnosti`
  ADD CONSTRAINT `aktivnosti_ibfk_1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnici` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
