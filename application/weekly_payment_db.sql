-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 01:23 PM
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
  `kode_barang` varchar(10) DEFAULT NULL,
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

INSERT INTO `barang` (`id_barang`, `kode_barang`, `foto`, `nama`, `satuan`, `id_jenis`, `id_suplier`, `modal`, `harga`, `stok_barang`) VALUES
(1, NULL, 'default.jpg', 'Nama Barang A', 'M2', 1, 1, 1000, 1200, 10),
(2, NULL, 'default.jpg', 'Nama Barang B', 'M2', 2, 2, 2000, 2200, 20),
(3, NULL, 'avatar351.png', 'Semen Padang', 'M2', 1, 1, 1000, 1200, 12),
(4, NULL, 'avatar511.png', 'Semen Kalimantan', 'M2', 1, 1, 2000, 2200, 14);

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
  `potongan` int(3) NOT NULL,
  `minggu` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemakaian`
--

INSERT INTO `pemakaian` (`id`, `id_project`, `id_barang`, `tgl`, `vol`, `potongan`, `minggu`) VALUES
(1, 1, 1, '2021-06-01', 2, 10, 1),
(2, 1, 2, '2021-06-02', 3, 10, 2),
(3, 2, 1, '2021-06-28', 5, 10, 1),
(4, 2, 1, '2021-06-29', 5, 10, 1),
(5, 2, 1, '2021-06-29', 5, 10, 2),
(6, 2, 1, '2021-06-29', 5, 10, 3),
(7, 1, 3, '2021-06-08', 5, 10, 3),
(8, 1, 3, '2021-06-17', 5, 10, 4),
(9, 2, 3, '2021-06-23', 5, 10, 4),
(10, 4, 2, '2021-06-23', 3, 10, 1),
(11, 3, 2, '2021-06-23', 5, 10, 3),
(12, 3, 3, '2021-06-25', 2, 10, 2),
(13, 3, 4, '2021-06-17', 4, 10, 4),
(14, 4, 1, '2021-06-08', 2, 10, 1),
(15, 4, 3, '2021-06-08', 3, 10, 3),
(16, 3, 3, '2021-06-17', 1, 10, 1),
(17, 4, 1, '2011-07-14', 5, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(10) NOT NULL,
  `id_supplier` int(10) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `kode_faktur` varchar(10) NOT NULL,
  `tgl_pengiriman` date DEFAULT NULL,
  `alamat_pengiriman` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `id_supplier`, `tgl_pembelian`, `kode_faktur`, `tgl_pengiriman`, `alamat_pengiriman`) VALUES
(1, 1, '2021-06-01', 'P-01', '2021-06-02', 'Jl. Perdagangan 45'),
(2, 2, '2021-06-03', 'P-02', '2021-06-12', 'Jl. Perniagaan 57'),
(3, 1, '2021-06-23', '', '2021-06-24', 'Tes alamat'),
(4, 1, '2021-06-23', '', '2021-06-24', 'Tes alamat');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id` int(10) NOT NULL,
  `id_pembelian` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `unit_barang` int(10) NOT NULL,
  `harga_satuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id`, `id_pembelian`, `id_barang`, `unit_barang`, `harga_satuan`) VALUES
(1, 1, 1, 10, 1000),
(2, 1, 2, 30, 4000),
(3, 2, 3, 20, 2000),
(4, 2, 4, 40, 5000),
(5, 1, 2, 12, 300),
(6, 3, 2, 12, 300),
(7, 3, 3, 12, 3000);

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
(2, 'default.jpg', 'Project Rumah Jokowi', 2, 20000000, 0),
(3, 'avatar322.png', 'Rumah Perumahan Citra Garden', 4, 12000000, 0),
(4, 'avatar52.png', 'Perumahan Rumah Rumahan', 3, 17000000, 0);

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
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(20) NOT NULL,
  `alamat_supplier` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`) VALUES
(1, 'Supplier A', 'Jl. Kartini Mulai lelah No. 78 - Salatiga'),
(2, 'Supplier B', 'Jl. Banteng mulai gerah No. 67 - Salalima');

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
-- Stand-in structure for view `v_faktur`
-- (See below for the actual view)
--
CREATE TABLE `v_faktur` (
`id_pembelian` int(10)
,`id_supplier` int(10)
,`nama_supplier` varchar(20)
,`alamat_supplier` varchar(255)
,`alamat_pengiriman` varchar(255)
,`tgl_pengiriman` date
,`kode_faktur` varchar(10)
,`tgl_pembelian` date
,`jumlah_faktur` decimal(42,0)
,`jumlah_unit_barang` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pembelian`
-- (See below for the actual view)
--
CREATE TABLE `v_pembelian` (
`id_pembelian_detail` int(10)
,`id_pembelian` int(10)
,`id_barang` int(10)
,`unit_barang` int(10)
,`harga_satuan` int(11)
,`total_harga_barang` bigint(21)
,`id_supplier` int(10)
,`tgl_pembelian` date
,`kode_faktur` varchar(10)
,`tgl_pengiriman` date
,`alamat_pengiriman` varchar(255)
,`nama_supplier` varchar(20)
,`alamat_supplier` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `v_faktur`
--
DROP TABLE IF EXISTS `v_faktur`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_faktur`  AS SELECT `v_pembelian`.`id_pembelian` AS `id_pembelian`, `v_pembelian`.`id_supplier` AS `id_supplier`, `v_pembelian`.`nama_supplier` AS `nama_supplier`, `v_pembelian`.`alamat_supplier` AS `alamat_supplier`, `v_pembelian`.`alamat_pengiriman` AS `alamat_pengiriman`, `v_pembelian`.`tgl_pengiriman` AS `tgl_pengiriman`, `v_pembelian`.`kode_faktur` AS `kode_faktur`, `v_pembelian`.`tgl_pembelian` AS `tgl_pembelian`, sum(`v_pembelian`.`total_harga_barang`) AS `jumlah_faktur`, sum(`v_pembelian`.`unit_barang`) AS `jumlah_unit_barang` FROM `v_pembelian` GROUP BY `v_pembelian`.`id_pembelian` ;

-- --------------------------------------------------------

--
-- Structure for view `v_pembelian`
--
DROP TABLE IF EXISTS `v_pembelian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pembelian`  AS SELECT `pembelian_detail`.`id` AS `id_pembelian_detail`, `pembelian_detail`.`id_pembelian` AS `id_pembelian`, `pembelian_detail`.`id_barang` AS `id_barang`, `pembelian_detail`.`unit_barang` AS `unit_barang`, `pembelian_detail`.`harga_satuan` AS `harga_satuan`, `pembelian_detail`.`unit_barang`* `pembelian_detail`.`harga_satuan` AS `total_harga_barang`, `pembelian`.`id_supplier` AS `id_supplier`, `pembelian`.`tgl_pembelian` AS `tgl_pembelian`, `pembelian`.`kode_faktur` AS `kode_faktur`, `pembelian`.`tgl_pengiriman` AS `tgl_pengiriman`, `pembelian`.`alamat_pengiriman` AS `alamat_pengiriman`, `suplier`.`nama_supplier` AS `nama_supplier`, `suplier`.`alamat_supplier` AS `alamat_supplier` FROM ((`pembelian_detail` join `pembelian` on(`pembelian_detail`.`id_pembelian` = `pembelian_detail`.`id_pembelian`)) join `suplier` on(`pembelian`.`id_supplier` = `suplier`.`id_supplier`)) ;

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
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
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
  ADD PRIMARY KEY (`id_supplier`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  ADD CONSTRAINT `id_suplier` FOREIGN KEY (`id_suplier`) REFERENCES `suplier` (`id_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
