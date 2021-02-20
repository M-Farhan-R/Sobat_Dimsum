-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2021 at 03:04 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sobat_dimsum(main)`
--

-- --------------------------------------------------------

--
-- Table structure for table `ai_id_pesanan`
--

CREATE TABLE `ai_id_pesanan` (
  `No` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ai_id_pesanan`
--

INSERT INTO `ai_id_pesanan` (`No`) VALUES
(1),
(5),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43);

--
-- Triggers `ai_id_pesanan`
--
DELIMITER $$
CREATE TRIGGER `auto_id_pesanan` AFTER INSERT ON `ai_id_pesanan` FOR EACH ROW INSERT INTO id_pesanan VALUES(CONCAT('PSN', RIGHT(CONCAT('000',NEW.No), 3)))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `id_pesanan`
--

CREATE TABLE `id_pesanan` (
  `id_pesanan` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `id_pesanan`
--

INSERT INTO `id_pesanan` (`id_pesanan`) VALUES
('PSN009'),
('PSN010'),
('PSN011'),
('PSN012'),
('PSN013'),
('PSN014'),
('PSN015'),
('PSN016'),
('PSN017'),
('PSN018'),
('PSN019'),
('PSN020'),
('PSN021'),
('PSN022'),
('PSN023'),
('PSN024'),
('PSN025'),
('PSN026'),
('PSN027'),
('PSN028'),
('PSN029'),
('PSN030'),
('PSN031'),
('PSN032'),
('PSN033'),
('PSN034'),
('PSN035'),
('PSN036'),
('PSN037'),
('PSN038'),
('PSN039'),
('PSN040'),
('PSN041'),
('PSN042'),
('PSN043');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(8) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(10) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `kategori`, `deskripsi`, `harga`, `foto`) VALUES
(1, 'Dimsum Mozarella', 'Makanan', 'Dimsum dengan full daging ayam yang diberi isian serta topping keju mozarella', 3000, 'material/images/Mozarella.png'),
(2, 'Dimsum Udang', 'Makanan', 'Dimsum berisi potongan udang yang fresh dan di mix dengan ayam yang lezat', 3000, 'material/images/Udang.png'),
(13, 'Dimsum Ayam', 'Makanan', 'Dimsum yang berisi full daging ayam juice', 3000, 'material/images/Ayam.png'),
(15, 'Dimsum Nori', 'Makanan', 'Dimsum yang berisi 99% daging ayam diblalut kulit nori', 3000, 'material/images/Nori.png');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(6) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `total_harga` int(255) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `alamat_pembeli` varchar(255) NOT NULL,
  `no_telp_pembeli` int(15) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `feedback` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(5) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama_user` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `level_user` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `alamat`, `no_telp`, `level_user`) VALUES
('AD002', 'admin', 'admin', 'Alfiyandi Pandya', 'Jl. LAN Rusak No.45', '082116673009', 1),
('USR01', 'user', 'user', 'M Farhan', 'Jl. LAN Ribet No. 46', '082123456789', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ai_id_pesanan`
--
ALTER TABLE `ai_id_pesanan`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `id_pesanan`
--
ALTER TABLE `id_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD KEY `fk_pesanan` (`nama_menu`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ai_id_pesanan`
--
ALTER TABLE `ai_id_pesanan`
  MODIFY `No` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
