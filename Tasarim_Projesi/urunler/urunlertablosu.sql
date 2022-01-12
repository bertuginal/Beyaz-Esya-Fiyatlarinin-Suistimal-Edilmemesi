-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2022 at 10:23 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urunler`
--

-- --------------------------------------------------------

--
-- Table structure for table `urunlertablosu`
--

CREATE TABLE `urunlertablosu` (
  `id` int(11) NOT NULL,
  `urunAdi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `satici` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `fiyati` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `urunlertablosu`
--

INSERT INTO `urunlertablosu` (`id`, `urunAdi`, `satici`, `fiyati`) VALUES
(1, 'Buzdolabı', 'HEPSİBURADA', 7513),
(2, 'Buzdolabı', 'GİTTİGİDİYOR', 3497),
(5, 'Çamaşır Makinesi', 'HEPSİBURADA', 4788),
(6, 'Çamaşır Makinesi', 'GİTTİGİDİYOR', 5811);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `urunlertablosu`
--
ALTER TABLE `urunlertablosu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `urunlertablosu`
--
ALTER TABLE `urunlertablosu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
