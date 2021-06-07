-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 11, 2019 at 02:32 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id10171691_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nama` text NOT NULL,
  `id_jenis` int(5) NOT NULL,
  `id_suplier` int(5) NOT NULL,
  `modal` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `foto`, `nama`, `id_jenis`, `id_suplier`, `modal`, `harga`, `stok_barang`) VALUES
(26, 'bape.jpg', 'T-shirt Bape', 7, 5, 400000, 500000, 10),
(27, 'offwhite.jpg', 'T-shirt Off White', 7, 7, 500000, 600000, 10),
(28, 'sweater.jpg', 'Sweater', 6, 10, 350000, 400000, 10),
(29, 'supreme.jpg', 'Sweater Supreme', 6, 6, 2000000, 3000000, 10),
(30, 'uniqlo.jpg', 'T-shirt Uniqlo x Kaws', 7, 9, 500000, 600000, 10),
(31, 'tas-gucci.jpg', 'Tas Gucci', 8, 8, 600000, 700000, 10),
(32, 'fanta.jpg', 'Fanta', 2, 11, 13000, 15000, 10),
(33, 'pepsi.jpg', 'Pepsi', 2, 10, 13000, 15000, 10),
(34, 'coklat.jpg', 'Coklat', 1, 10, 20000, 22000, 10),
(35, 'batu2.jpg', 'Bata', 9, 6, 300000, 400000, 10),
(36, 'rokok.jpg', 'Rokok Djarum Super', 3, 10, 15000, 16000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis` int(11) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `jenis_barang`) VALUES
(1, 'makanan'),
(2, 'minuman'),
(3, 'rokok'),
(6, 'Sweater'),
(7, 'T-shirt'),
(8, 'Tas'),
(9, 'Accesoris');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`) VALUES
(5, 'A Bathing Ape'),
(6, 'Supreme'),
(7, 'Off White'),
(8, 'Gucci'),
(9, 'Uniqlo'),
(10, 'Indomaret'),
(11, 'Alfamaret');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(10) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `id_barang` int(5) NOT NULL,
  `id_suplier` int(5) NOT NULL,
  `id_jenis` int(5) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(20) NOT NULL,
  `laba` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `tanggal`, `id_barang`, `id_suplier`, `id_jenis`, `id_user`, `jumlah`, `total_harga`, `laba`, `status`) VALUES
(82, 'KD231', '28-07-2019', 26, 5, 7, 8, 1, 500000, 100000, 0),
(88, 'KD937', '29-07-2019', 28, 10, 6, 8, 1, 400000, 50000, 1),
(89, 'KD441', '30-07-2019', 32, 11, 2, 12, 1, 15000, 2000, 0),
(90, 'KD788', '30-07-2019', 26, 5, 7, 12, 1, 500000, 100000, 0),
(91, 'KD670', '30-07-2019', 26, 5, 7, 12, 1, 500000, 100000, 0),
(92, 'KD969', '30-07-2019', 27, 7, 7, 12, 1, 600000, 100000, 0),
(93, 'KD418', '30-07-2019', 28, 10, 6, 12, 1, 400000, 50000, 0),
(94, 'KD601', '30-07-2019', 31, 8, 8, 12, 1, 700000, 100000, 0),
(95, 'KD962', '30-07-2019', 36, 10, 3, 12, 1, 16000, 1000, 0),
(96, 'KD148', '30-07-2019', 29, 6, 6, 12, 1, 3000000, 1000000, 0),
(97, 'KD881', '30-07-2019', 35, 6, 9, 12, 3, 1200000, 300000, 0),
(98, 'KD882', '30-07-2019', 34, 10, 1, 12, 1, 22000, 2000, 1),
(99, 'KD949', '06-08-2019', 36, 10, 3, 8, 1, 16000, 1000, 0),
(100, 'KD437', '06-08-2019', 35, 6, 9, 12, 1, 400000, 100000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `foto` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `uname`, `pass`, `foto`, `status`) VALUES
(8, 'admin', 'admin', 'avatar0411.png', 1),
(12, 'user', '123', 'avatar6.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_suplier` (`id_suplier`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `id_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_barang` (`id_jenis`),
  ADD CONSTRAINT `id_suplier` FOREIGN KEY (`id_suplier`) REFERENCES `suplier` (`id_suplier`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `id_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
