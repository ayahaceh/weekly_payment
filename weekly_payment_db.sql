-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 05:58 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weekly_payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nama` text NOT NULL,
  `satuan` varchar(25) DEFAULT NULL,
  `id_jenis` int(5) NOT NULL,
  `id_suplier` int(5) NOT NULL,
  `modal` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `foto`, `nama`, `satuan`, `id_jenis`, `id_suplier`, `modal`, `harga`, `stok_barang`) VALUES
(1, 'default.jpg', 'Nama Barang A', 'M2', 1, 1, 1000, 1200, 10),
(2, 'default.jpg', 'Nama Barang B', 'M2', 2, 2, 2000, 2200, 20),
(3, 'avatar351.png', 'Semen Padang', 'M2', 1, 1, 1000, 1200, 12),
(4, 'avatar511.png', 'Semen Kalimantan', 'M2', 1, 1, 2000, 2200, 14);

-- --------------------------------------------------------

--
-- Table structure for table `costumer`
--

CREATE TABLE `costumer` (
  `id_costumer` int(11) NOT NULL,
  `nama_costumer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `costumer`
--

INSERT INTO `costumer` (`id_costumer`, `nama_costumer`) VALUES
(1, 'Budi Anduk'),
(2, 'Si Buta dari Goa Hantu'),
(3, 'Rony Permadi'),
(4, 'Saiful Riza');

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
(1, 'Jenis A'),
(2, 'Jenis B');

-- --------------------------------------------------------

--
-- Table structure for table `pemakaian`
--

CREATE TABLE `pemakaian` (
  `id` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `vol` int(11) NOT NULL,
  `potongan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemakaian`
--

INSERT INTO `pemakaian` (`id`, `id_project`, `id_barang`, `tgl`, `vol`, `potongan`) VALUES
(1, 1, 1, '2021-06-01', 20, 10),
(2, 1, 2, '2021-06-02', 30, 10),
(3, 2, 1, '2021-06-28', 5, 10),
(4, 2, 1, '2021-06-29', 5, 10),
(5, 2, 1, '2021-06-29', 5, 10),
(6, 2, 1, '2021-06-29', 5, 10),
(7, 2, 3, '2021-06-08', 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_project`, `id_barang`, `tgl`, `jumlah`) VALUES
(1, 1, 1, '2021-06-01', 1000),
(2, 1, 2, '2021-06-02', 500),
(3, 2, 2, '2021-06-01', 3000),
(4, 2, 1, '2021-06-02', 400);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nama_project` text NOT NULL,
  `id_costumer` int(5) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `lunas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `foto`, `nama_project`, `id_costumer`, `harga`, `lunas`) VALUES
(1, 'default.jpg', 'Project Rumah Hantu', 1, 15000000, 0),
(2, 'default.jpg', 'Project Rumah Jokowi', 2, 20000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ref_lunas`
--

CREATE TABLE `ref_lunas` (
  `id` int(2) NOT NULL,
  `pelunasan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_lunas`
--

INSERT INTO `ref_lunas` (`id`, `pelunasan`) VALUES
(1, 'Belum Selesai'),
(2, 'Sudah Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `ref_satuan`
--

CREATE TABLE `ref_satuan` (
  `id` int(11) NOT NULL,
  `nama_satuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_satuan`
--

INSERT INTO `ref_satuan` (`id`, `nama_satuan`) VALUES
(1, 'm2'),
(2, 'Kg'),
(3, 'm3'),
(4, 'Kotak');

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
(1, 'Supplier A'),
(2, 'Supplier B');

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
(82, 'KD231', '28-07-2019', 1, 1, 1, 1, 1, 500000, 100000, 0),
(88, 'KD937', '29-07-2019', 2, 2, 2, 1, 1, 400000, 50000, 1),
(89, 'KD441', '30-07-2019', 2, 1, 1, 2, 1, 15000, 2000, 0),
(90, 'KD788', '30-07-2019', 1, 2, 2, 2, 1, 500000, 100000, 0),
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
(1, 'admin', 'admin', 'avatar0411.png', 1),
(2, 'user', '123', 'avatar6.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `weekly_payment`
--

CREATE TABLE `weekly_payment` (
  `id_weekly_payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`id_costumer`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `pemakaian`
--
ALTER TABLE `pemakaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_suplier` (`id_costumer`);

--
-- Indexes for table `ref_lunas`
--
ALTER TABLE `ref_lunas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_satuan`
--
ALTER TABLE `ref_satuan`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `costumer`
--
ALTER TABLE `costumer`
  MODIFY `id_costumer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pemakaian`
--
ALTER TABLE `pemakaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ref_lunas`
--
ALTER TABLE `ref_lunas`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ref_satuan`
--
ALTER TABLE `ref_satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
