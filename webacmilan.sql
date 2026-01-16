-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2025 at 01:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webacmilan`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `isi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `gambar` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'Scudetto', 'Serie A adalah Persaingan sepak bola profesional tertinggi di sistem liga sepak bola Italia dan telah berjalan selama sembilan puluh tahun lebih sejak dibentuk dengan format saat ini pada musim 1929–1930', 'seriea.jpg', '2025-12-17 00:00:00', 'ilham'),
(2, 'Coppa Italia', 'Piala Italia dalam bahasa Italia Coppa Italia adalah kompetisi sepak bola di Italia yang pesertanya merupakan tim-tim Serie A dengan Serie B', 'copa.jpg', '2025-12-17 00:00:00', 'ilham'),
(3, 'Champions League', 'Liga Champions UEFA atau Liga Champions Eropa yang sebelumnya bernama Piala Eropa adalah kompetisi sepak bola antarklub oleh UEFA dan diikuti oleh klub dari liga atau divisi tertinggi Eropa', 'cl.jpg', '2025-12-17 00:00:00', 'ilham'),
(4, 'UEFA Super Cup', 'Piala Super UEFA sejak tahun 1972 hingga 1994 bernama Piala Super Eropa adalah pertandingan antar klub sepak bola Eropa yang diperebutkan oleh tim yang merupakan juara Liga Champions UEFA dan juara Liga Eropa UEFA', 'super.jpg', '2025-12-17 00:00:00', 'ilham'),
(5, 'FIFA Club World Cup', 'Piala Dunia Antarklub FIFA yang sebelumnya dikenal sebagai Kejuaraan Dunia Antarklub FIFA adalah sebuah kompetisi sepak bola klub resmi yang diadakan FIFA', 'cwc.jpg', '2025-12-17 00:00:00', 'ilham');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(1, 'ilham', '72db86e4c73b9fabb4810562b236488e', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
