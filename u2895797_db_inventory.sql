-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2023 at 10:16 PM
-- Server version: 10.5.20-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u2895797_db_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` int(20) NOT NULL,
  `token_stok` text DEFAULT NULL,
  `token_pengeluaran` text DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `harga_item` varchar(30) DEFAULT NULL,
  `jumlah_keluar` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `token_stok`, `token_pengeluaran`, `judul`, `harga_item`, `jumlah_keluar`) VALUES
(8, 'snMyVGPPJgYUYDz1221185732', '2U8Hdhaa7m2wstJ1223192326', 'aa', '10000', '20'),
(9, 'snMyVGPPJgYUYDz1221185732', '2U8Hdhaa7m2wstJ1223192326', 'aa', '10000', '15'),
(10, 'snMyVGPPJgYUYDz1221185732', '2U8Hdhaa7m2wstJ1223192326', 'aa', '10000', '30'),
(14, 'snMyVGPPJgYUYDz1221185732', '2U8Hdhaa7m2wstJ1223192326', 'aa', '10000', '135'),
(15, 'qAfy83chhOlnvGP1223213046', 'vSSgv8kFBj4Y8W01223212145', 'Lorem Ipsum is simply', '5000', '15'),
(16, 'qAfy83chhOlnvGP1223213046', '2U8Hdhaa7m2wstJ1223192326', 'Lorem Ipsum is simply', '5000', '5'),
(17, 'QNxsxUSd7yUoLSf1228101837', 'QHddB8UoM9XRw361228101901', 'KIT BAN', '45000', '12');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_lap` int(10) NOT NULL,
  `keterangan` char(50) DEFAULT '0',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_lap`, `keterangan`, `start_date`, `end_date`, `status`) VALUES
(3, 'last november', '2021-12-27', '2021-12-27', '0000-00-00'),
(4, 'desember', '2021-12-01', '2021-12-27', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(10) NOT NULL,
  `token_pengeluaran` text DEFAULT NULL,
  `kode` varchar(15) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `oleh` varchar(30) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  `noted` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `token_pengeluaran`, `kode`, `tanggal`, `oleh`, `status`, `noted`) VALUES
(1, '2U8Hdhaa7m2wstJ1223192326', '0001', '2021-12-09', 'kevin', '1', 'Lorem Ipsum is simply Lorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simplyLorem Ipsum is simply'),
(2, 'vSSgv8kFBj4Y8W01223212145', '0002', '2021-12-23', 'admin', '1', NULL),
(3, 'QHddB8UoM9XRw361228101901', '0003', '2021-12-28', 'wiji', '1', 'DIKIRIM PAGI INI JUGA ');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(5) NOT NULL,
  `idrole` varchar(20) NOT NULL,
  `remark` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `idrole`, `remark`) VALUES
(1, 'user', 'user'),
(2, 'role', 'role'),
(3, 'report', 'report'),
(4, 'stok', 'stok'),
(5, 'pengeluaran', 'pengeluaran'),
(6, 'transaksi', 'transaksi');

-- --------------------------------------------------------

--
-- Table structure for table `role_access`
--

CREATE TABLE `role_access` (
  `idaccess` int(20) NOT NULL,
  `idrole` varchar(30) NOT NULL,
  `token` text NOT NULL,
  `access` int(5) NOT NULL,
  `dlt` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_access`
--

INSERT INTO `role_access` (`idaccess`, `idrole`, `token`, `access`, `dlt`) VALUES
(21, 'user', 'Tasdasodjp32432464Gasdoewrdjjdisj', 1, 1),
(22, 'role', 'Tasdasodjp32432464Gasdoewrdjjdisj', 1, 1),
(23, 'report', 'Tasdasodjp32432464Gasdoewrdjjdisj', 1, 1),
(24, 'stok', 'Tasdasodjp32432464Gasdoewrdjjdisj', 1, 1),
(25, 'pengeluaran', 'Tasdasodjp32432464Gasdoewrdjjdisj', 1, 1),
(26, 'transaksi', 'Tasdasodjp32432464Gasdoewrdjjdisj', 1, 1),
(35, 'user', 'OJNpmRRh9AdrCiK1228102739', 1, 1),
(36, 'role', 'OJNpmRRh9AdrCiK1228102739', 1, 1),
(37, 'report', 'OJNpmRRh9AdrCiK1228102739', 1, 1),
(38, 'stok', 'OJNpmRRh9AdrCiK1228102739', 1, 1),
(39, 'pengeluaran', 'OJNpmRRh9AdrCiK1228102739', 1, 1),
(40, 'transaksi', 'OJNpmRRh9AdrCiK1228102739', 1, 1),
(44, 'transaksi', 'Rf0vzgjb4jhSRTg0709215957', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) DEFAULT NULL,
  `remark` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `remark`) VALUES
(1, 'Sent'),
(2, 'Draf'),
(3, 'Failed');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `idstok` int(11) NOT NULL,
  `token` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `jumlah` varchar(25) DEFAULT NULL,
  `harga` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`idstok`, `token`, `tanggal`, `title`, `jumlah`, `harga`) VALUES
(1, 'snMyVGPPJgYUYDz1221185732', '2021-12-21', 'aa', '200', '10000'),
(5, 'qAfy83chhOlnvGP1223213046', '2021-12-23', 'Lorem Ipsum is simply', '100', '5000'),
(6, 'QNxsxUSd7yUoLSf1228101837', '2021-12-28', 'KIT BAN', '23', '45000'),
(7, 'G3SU2MVkSbElsv21228102950', '2021-12-28', 'PINK LAVA', '30', '35000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `idUser` int(10) NOT NULL,
  `token_user` text NOT NULL,
  `name` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `level` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`idUser`, `token_user`, `name`, `username`, `password`, `level`) VALUES
(1, 'Tasdasodjp32432464Gasdoewrdjjdisj', 'Admin', 'admin', '0cc175b9c0f1b6a831c399e269772661', 1),
(2, 'OJNpmRRh9AdrCiK1228102739', 'vio', 'vio', '202cb962ac59075b964b07152d234b70', 1),
(3, 'Rf0vzgjb4jhSRTg0709215957', 'fehri', 'fehri', '0cc175b9c0f1b6a831c399e269772661', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` int(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `kategory` varchar(5) DEFAULT NULL,
  `pay_in` varchar(50) DEFAULT NULL,
  `pay_out` varchar(50) DEFAULT NULL,
  `dlt` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `tanggal`, `deskripsi`, `kategory`, `pay_in`, `pay_out`, `dlt`) VALUES
(1, '2021-12-25', 'pembayaran invoice ', '1', '20000', '', 1),
(2, '2021-12-25', 'pembelian bahan ', '2', '', '5000', 1),
(3, '2021-12-25', 'pemasukan aa ', '1', '30000', '', 1),
(4, '2021-12-25', 'pemasukan bb ', '1', '25000', '', 1),
(5, '2021-12-25', 'pengeluaran ', '2', '', '15000', 1),
(6, '2021-12-25', 'pembelian bahan aaa', '2', '', '5000', 1),
(7, '2021-12-25', 'pembelian bahan ', '1', '10000', '', 1),
(8, '2022-01-05', 'pembayaran a', '1', '50000', '', 0),
(9, '2022-01-05', 'pembayaran b', '1', '30000', '', 0),
(10, '2022-01-05', 'pembelian a ', '2', '', '20000', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_lap`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_access`
--
ALTER TABLE `role_access`
  ADD PRIMARY KEY (`idaccess`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`idstok`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`idUser`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_lap` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role_access`
--
ALTER TABLE `role_access`
  MODIFY `idaccess` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `idstok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `idUser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
