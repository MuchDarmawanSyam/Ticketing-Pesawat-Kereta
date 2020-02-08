-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 10:23 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_ukk_tickect`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_tiket`
--

CREATE TABLE `cart_tiket` (
  `id_cart_tiket` int(11) NOT NULL,
  `id_rute` int(11) NOT NULL,
  `id_penumpang` int(11) NOT NULL,
  `tgl_tandai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'administrator'),
(2, 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `kode_pemesanan` varchar(50) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `tempat_pemesanan` varchar(75) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_kursi` varchar(5) NOT NULL,
  `id_rute` int(11) NOT NULL,
  `tujuan` varchar(75) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `jam_checkin` time NOT NULL,
  `jam_berangkat` time NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `kode_pemesanan`, `tanggal_pemesanan`, `tempat_pemesanan`, `id_pelanggan`, `kode_kursi`, `id_rute`, `tujuan`, `tanggal_berangkat`, `jam_checkin`, `jam_berangkat`, `total_bayar`, `id_petugas`) VALUES
(1, 'KRT0645-1-13092019KAI666', '2019-09-13', 'Tasangkapura', 1, 'D-25', 2, 'DOK V BAWAH - SMK N 1', '2019-09-16', '06:30:00', '06:45:00', 8000, 2),
(2, 'PWT000-2-12092019BOEING777', '2019-09-12', 'Tasangkapura', 1, 'D-25', 2, 'MAKASSAR', '2019-09-16', '23:30:00', '00:00:00', 2700000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `penumpang`
--

CREATE TABLE `penumpang` (
  `id_penumpang` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `nama_penumpang` varchar(75) NOT NULL,
  `alamat_penumpang` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `no_ktp` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penumpang`
--

INSERT INTO `penumpang` (`id_penumpang`, `username`, `password`, `nama_penumpang`, `alamat_penumpang`, `tanggal_lahir`, `jenis_kelamin`, `telefone`, `no_ktp`) VALUES
(1, 'penumpang_wawan', 'penumpang_wawan', 'Much Darmawan', 'Jalan Tasangkapura No. 36', '2019-04-26', 'L', '082399541952', 0),
(14, 'admin', '12', 'Much Darmawan', 'Jalan Tasangkapura', '2019-09-17', 'L', '88080232', 1221212);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `id_level`) VALUES
(1, 'admin_wawan', 'admin_wawan', 'Much Darmawan', 1),
(2, 'petugas_wawan', 'petugas_wawan', 'Much Darmawan', 2),
(4, 'petugas_wawan2', 'petugas_wawan2', 'Much Darmawan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id_rute` int(11) NOT NULL,
  `tujuan` varchar(75) NOT NULL,
  `rute_awal` varchar(75) NOT NULL,
  `rute_akhir` varchar(75) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `tgl_keberangkatan` date NOT NULL,
  `jam_berangkat` time NOT NULL,
  `status_keberangkatan` enum('Pagi','Siang','Sore','Malam') NOT NULL,
  `id_transportasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id_rute`, `tujuan`, `rute_awal`, `rute_akhir`, `harga`, `tgl_keberangkatan`, `jam_berangkat`, `status_keberangkatan`, `id_transportasi`) VALUES
(1, 'MAKASSAR', 'BANDARA SENTANI', 'BANDARA HASANUDDIN', 2700000, '2019-09-01', '19:00:00', 'Malam', 1),
(2, 'DOK V BAWAH', 'APO - GOR', 'DOK V BAWAH - SMK N 1', 8000, '2019-09-01', '06:30:00', 'Pagi', 2),
(3, 'JAYAPURA', 'BANDARA HASANUDDIN', 'BANDARA SENTANI', 2500000, '2019-09-04', '16:45:00', 'Sore', 1),
(4, 'JAYAPURA', 'BANDARA HASANUDDIN', 'BANDARA SENTANI', 2500000, '2019-09-06', '05:00:00', 'Pagi', 1),
(5, 'SURABAYA', 'BANDARA SENTANI', 'BANDARA JUANDA', 2700000, '2019-09-06', '21:00:00', 'Malam', 1),
(6, 'DOK IX', 'APO - GOR', 'DOK V BAWAH - DOK IX', 8000, '2019-09-15', '07:30:00', 'Pagi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transportasi`
--

CREATE TABLE `transportasi` (
  `id_transportasi` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `jumlah_kursi` int(4) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_type_transportasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportasi`
--

INSERT INTO `transportasi` (`id_transportasi`, `kode`, `jumlah_kursi`, `keterangan`, `id_type_transportasi`) VALUES
(1, 'GarudaBoeing777', 50, 'Pesawat', 1),
(2, 'KAI666', 200, 'Kereta Api', 2);

-- --------------------------------------------------------

--
-- Table structure for table `type_transportasi`
--

CREATE TABLE `type_transportasi` (
  `id_type_transportasi` int(11) NOT NULL,
  `nama_type` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_transportasi`
--

INSERT INTO `type_transportasi` (`id_type_transportasi`, `nama_type`, `keterangan`) VALUES
(1, 'Pesawat', 'Boeing 777'),
(2, 'Kereta Api', 'KAI 666');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_tiket`
--
ALTER TABLE `cart_tiket`
  ADD PRIMARY KEY (`id_cart_tiket`),
  ADD KEY `id_rute` (`id_rute`),
  ADD KEY `id_penumpang` (`id_penumpang`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_rute` (`id_rute`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`id_penumpang`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`),
  ADD KEY `id_tranportasi` (`id_transportasi`);

--
-- Indexes for table `transportasi`
--
ALTER TABLE `transportasi`
  ADD PRIMARY KEY (`id_transportasi`),
  ADD KEY `id_type_transportasi` (`id_type_transportasi`);

--
-- Indexes for table `type_transportasi`
--
ALTER TABLE `type_transportasi`
  ADD PRIMARY KEY (`id_type_transportasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_tiket`
--
ALTER TABLE `cart_tiket`
  MODIFY `id_cart_tiket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penumpang`
--
ALTER TABLE `penumpang`
  MODIFY `id_penumpang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transportasi`
--
ALTER TABLE `transportasi`
  MODIFY `id_transportasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type_transportasi`
--
ALTER TABLE `type_transportasi`
  MODIFY `id_type_transportasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `penumpang` (`id_penumpang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id_rute`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rute`
--
ALTER TABLE `rute`
  ADD CONSTRAINT `rute_ibfk_1` FOREIGN KEY (`id_transportasi`) REFERENCES `transportasi` (`id_transportasi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transportasi`
--
ALTER TABLE `transportasi`
  ADD CONSTRAINT `transportasi_ibfk_1` FOREIGN KEY (`id_type_transportasi`) REFERENCES `type_transportasi` (`id_type_transportasi`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
