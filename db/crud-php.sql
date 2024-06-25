-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 25, 2024 at 02:28 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `jumlah`, `harga`, `tanggal`) VALUES
(1, 'Keyboard NYK Nemesis', '10', '100000', '2024-06-24 06:24:25'),
(2, 'Laptop Acer Nitro v15', '5', '10000000', '2024-06-24 06:25:19'),
(3, 'Laptop ASUS TUF F15', '5', '13000000', '2024-06-24 07:08:33'),
(4, 'Mouse Logitech G102', '10', '130000', '2024-06-24 07:08:33'),
(5, 'Kalkulator Value 14 Digit', '8', '120000', '2024-06-24 07:08:33'),
(6, 'Advance Speaker', '3', '110000', '2024-06-24 07:08:33'),
(7, 'Laptop Asus MX550', '6', '10000000', '2024-06-24 07:56:48'),
(9, 'Mouse Gaming Mofi', '10', '89000', '2024-06-24 08:11:09'),
(10, 'Mesin EDC BNI', '3', '100000', '2024-06-24 08:13:50'),
(11, 'Kalkulator Casio DR-120R', '2', '1200000', '2024-06-24 08:24:43'),
(12, 'Jam Tangan Expeditions SM-EXP45', '1', '2500000', '2024-06-24 08:25:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
