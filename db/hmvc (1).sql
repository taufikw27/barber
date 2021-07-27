-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 03:45 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(12) NOT NULL,
  `nama_artikel` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `nama_artikel`, `gambar`, `link`) VALUES
(2, 'Video Haircut cowo 4', 'download8.jpg', 'https://www.youtube.com/watch?v=UMOSqIkMWuQ');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id_service` int(12) NOT NULL,
  `nama_service` varchar(255) NOT NULL,
  `harga` int(20) NOT NULL,
  `barbershop` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id_service`, `nama_service`, `harga`, `barbershop`, `gambar`, `alamat`, `kategori`) VALUES
(2, 'cukur kumis', 20000, 'barbershop23', 'download_(1)1.jpg', 'JL. Mangga Raya NO.3', 'kumis'),
(3, 'Potong Rambut', 50000, 'Barberian', '1.jpg', 'JL. serigala no. 4', 'rambut'),
(5, 'Warna Rambut', 30000, 'barbershop23', 'zayn-malik-blonde-hair--e15356133519161.jpg', 'JL. Tamangap Raya NO.3', 'rambut'),
(6, 'Cukur kumis', 15000, 'barbershop manggala', 'download_(1)2.jpg', 'JL. Mangga Sunda NO.3', 'kumis');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `password`, `role`, `is_active`, `date`) VALUES
(10, 'rayyan1', 'ray@gmail.com', 'default.jpg', '$2y$10$2ltU0ACeD/s8lN5xyeExGO3bEYNj76aMok.YZvMuwCmD3NAO4zvhO', 'admin', 1, 1625445537),
(14, 'Muh. Taufik Witri', 'taufikwitri@gmail.com', 'IMG_20190509_214901.jpg', '$2y$10$mj9kczeb04UDAIsZyNo1I.GwLI8gxzX2ew3FottZ2KDoqTs/c4m1C', 'admin', 1, 1626016987),
(15, 'neni', 'neni@gmail.com', 'IMG_20190509_2149011.jpg', '$2y$10$00gSvikfofTWf6cwAcWrh.lJOfSldNa2MYqHYkMI/Zk3T7WIYZvla', 'barbershop', 1, 1626017071),
(16, 'nas', 'nas@gmail.com', 'berkah-ilmu.jpg', '$2y$10$U7R/MS5oyEIpzJByw37P5OQ22NchZsFYsttGcprK3.pCAg6T8wrUG', 'costumers', 1, 1626057756);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
