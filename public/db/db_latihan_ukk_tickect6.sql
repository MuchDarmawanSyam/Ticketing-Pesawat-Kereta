-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2019 at 12:36 AM
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

--
-- Dumping data for table `cart_tiket`
--

INSERT INTO `cart_tiket` (`id_cart_tiket`, `id_rute`, `id_penumpang`, `tgl_tandai`) VALUES
(1, 1, 1, '2019-09-20'),
(2, 3, 1, '2019-09-19'),
(3, 1, 1, '2019-09-21'),
(4, 1, 1, '2019-09-21'),
(5, 1, 1, '2019-09-21'),
(7, 6, 1, '2019-09-22'),
(17, 1, 21, '2019-09-24'),
(18, 1, 21, '2019-09-27'),
(20, 3, 20, '2019-10-07');

-- --------------------------------------------------------

--
-- Table structure for table `check_in`
--

CREATE TABLE `check_in` (
  `id_check_in` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_penumpang` int(11) NOT NULL,
  `tgl_check_in` date NOT NULL,
  `jam_check_in` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `img_carousel`
--

CREATE TABLE `img_carousel` (
  `id_carousel` int(11) NOT NULL,
  `img_src` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `ket2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img_carousel`
--

INSERT INTO `img_carousel` (`id_carousel`, `img_src`, `ket`, `ket2`) VALUES
(1, 'CAROUSEL_IMG_PESAWAT_GARUDA_INDONESIA.jpg', 'PHP', 'Slide 1'),
(2, 'CAROUSEL_IMG_Pesawat2.jpg', 'Javascript', 'Slide 2'),
(3, 'CAROUSEL_IMG_KERETA_API.png', 'Phyton', 'Slide 3'),
(4, 'CAROUSEL_IMG_Pesawat1.jpg', 'Ruby', 'Slide 4'),
(5, 'CAROUSEL_IMG_PESAWAT_LION_AIR.jpg', 'Java', 'Slide 5');

-- --------------------------------------------------------

--
-- Table structure for table `img_profil_penumpang`
--

CREATE TABLE `img_profil_penumpang` (
  `id_img_profil_penumpang` int(11) NOT NULL,
  `img_src` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img_profil_penumpang`
--

INSERT INTO `img_profil_penumpang` (`id_img_profil_penumpang`, `img_src`) VALUES
(1, 'PROFILE-DEFAULT.jpg'),
(2, 'Profile_38.jpg'),
(3, 'Profile_IMG-20180815-WA0049.jpg'),
(4, 'PROFILE-FB_IMG_15202339675891142.jpg'),
(5, 'Profile_FB_IMG_15158864854706658.jpg'),
(6, 'Profile_FB_IMG_15158864854706658.jpg'),
(7, 'PROFILE-_downloadfiles_wallpapers_1024_768_dark_windows_7218.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lap`
--

CREATE TABLE `lap` (
  `id_lap` int(15) NOT NULL,
  `id_check_in` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_rute` int(11) NOT NULL,
  `jml_penumpang_pesawat` int(11) NOT NULL,
  `jml_penumpang_kereta` int(11) NOT NULL,
  `jml_tiket_pesawat_terjual` int(11) NOT NULL,
  `jml_tiket_kereta_terjual` int(11) NOT NULL,
  `jml_pemasukan` bigint(20) NOT NULL,
  `jml_pegawai` int(11) NOT NULL
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
  `no_ktp` bigint(30) NOT NULL,
  `id_img_profil_penumpang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penumpang`
--

INSERT INTO `penumpang` (`id_penumpang`, `username`, `password`, `nama_penumpang`, `alamat_penumpang`, `tanggal_lahir`, `jenis_kelamin`, `telefone`, `no_ktp`, `id_img_profil_penumpang`) VALUES
(1, 'penumpang_wawan', 'penumpang_wawan', 'Much Darmawan', 'Jalan Tasangkapura No. 36', '2019-04-26', 'L', '082399541952', 0, 1),
(14, 'admin', '12', 'Much Darmawan', 'Jalan Tasangkapura', '2019-09-17', 'L', '88080232', 1221212, 1),
(19, 'komangjyoti_', '12345678', 'komang jyoti', 'btn walikota tanah hitam A.18', '2003-04-08', 'P', '0882248792536', 8888811, 3),
(20, 'triyan', 'triyan', 'Triyan Setiawan', 'Jalan Abe', '2019-09-11', 'L', '8343434', 808080, 4),
(21, 'egi', 'egi', 'Yanuar Galuh Megiasra', 'Jln Rep. Boecend', '2019-09-17', 'L', '83333', 21233, 5),
(22, 'testukk', 'testukk', 'Testukk', 'jln test', '2019-10-08', 'L', '8454554', 2112, 1),
(23, 'ukk', 'ukk', 'ukk', 'ukk', '2019-10-06', 'L', '821', 11212, 7);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL,
  `img_profil_petugas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `id_level`, `img_profil_petugas`) VALUES
(1, 'admin_wawan', 'admin_wawan', 'Much Darmawan', 1, 'PROFIL-ADMIN_IMG-20180403-WA0016.jpg'),
(2, 'petugas_wawan', 'petugas_wawan', 'Much Darmawan', 2, 'PROFIL-PETUGAS_Screenshot_2018-05-12-19-35-54_1.jpg'),
(4, 'petugas_wawan2', 'petugas_wawan2', 'Much Darmawan', 2, 'PROFIL-PETUGAS_DSCN1997.JPG'),
(5, 'petugas', 'petugas', 'Syam', 2, 'PROFIL-PETUGAS__downloadfiles_wallpapers_1024_768_dark_windows_7218.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id_rute` int(11) NOT NULL,
  `tujuan` varchar(75) NOT NULL,
  `asal` varchar(75) NOT NULL,
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

INSERT INTO `rute` (`id_rute`, `tujuan`, `asal`, `rute_awal`, `rute_akhir`, `harga`, `tgl_keberangkatan`, `jam_berangkat`, `status_keberangkatan`, `id_transportasi`) VALUES
(1, 'MAKASSAR', 'JAYAPURA', 'BANDARA SENTANI', 'BANDARA HASANUDDIN', 2700000, '2019-09-01', '19:00:00', 'Malam', 1),
(2, 'DOK V BAWAH', 'APO', 'APO - GOR', 'DOK V BAWAH - SMK N 1', 8000, '2019-09-01', '06:30:00', 'Pagi', 2),
(3, 'JAYAPURA', 'MAKASSAR', 'BANDARA HASANUDDIN', 'BANDARA SENTANI', 2500000, '2019-09-04', '16:45:00', 'Sore', 1),
(4, 'JAYAPURA', 'MAKASSAR', 'BANDARA HASANUDDIN', 'BANDARA SENTANI', 2500000, '2019-09-06', '05:00:00', 'Pagi', 1),
(5, 'SURABAYA', 'JAYAPURA', 'BANDARA SENTANI', 'BANDARA JUANDA', 2700000, '2019-09-06', '21:00:00', 'Malam', 1),
(6, 'DOK IX', 'APO', 'APO - GOR', 'DOK V BAWAH - DOK IX', 8000, '2019-09-15', '07:30:00', 'Pagi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tiket_dipesan`
--

CREATE TABLE `tiket_dipesan` (
  `id_tiket_dipesan` int(11) NOT NULL,
  `id_rute` int(11) NOT NULL,
  `jml_tiket_dipesan` int(4) NOT NULL,
  `id_pemesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tiket_tersedia`
--

CREATE TABLE `tiket_tersedia` (
  `id_tiket_tersedia` int(11) NOT NULL,
  `id_rute` int(11) NOT NULL,
  `jml_tiket_tersedia` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'KAI666', 200, 'Kereta Api', 2),
(3, 'LION717', 100, 'Lion Air 717', 3);

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
(2, 'Kereta Api', 'KAI 666'),
(3, 'Pesawat', 'Lion Air 717');

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
-- Indexes for table `check_in`
--
ALTER TABLE `check_in`
  ADD PRIMARY KEY (`id_check_in`),
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `id_penumpang` (`id_penumpang`);

--
-- Indexes for table `img_carousel`
--
ALTER TABLE `img_carousel`
  ADD PRIMARY KEY (`id_carousel`);

--
-- Indexes for table `img_profil_penumpang`
--
ALTER TABLE `img_profil_penumpang`
  ADD PRIMARY KEY (`id_img_profil_penumpang`);

--
-- Indexes for table `lap`
--
ALTER TABLE `lap`
  ADD PRIMARY KEY (`id_lap`),
  ADD KEY `id_check_in` (`id_check_in`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_rute` (`id_rute`);

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
  ADD PRIMARY KEY (`id_penumpang`),
  ADD KEY `id_img_profil_penumpang` (`id_img_profil_penumpang`);

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
-- Indexes for table `tiket_dipesan`
--
ALTER TABLE `tiket_dipesan`
  ADD PRIMARY KEY (`id_tiket_dipesan`),
  ADD KEY `id_rute` (`id_rute`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `tiket_tersedia`
--
ALTER TABLE `tiket_tersedia`
  ADD PRIMARY KEY (`id_tiket_tersedia`),
  ADD KEY `id_rute` (`id_rute`);

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
  MODIFY `id_cart_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `check_in`
--
ALTER TABLE `check_in`
  MODIFY `id_check_in` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `img_carousel`
--
ALTER TABLE `img_carousel`
  MODIFY `id_carousel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `img_profil_penumpang`
--
ALTER TABLE `img_profil_penumpang`
  MODIFY `id_img_profil_penumpang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lap`
--
ALTER TABLE `lap`
  MODIFY `id_lap` int(15) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_penumpang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tiket_dipesan`
--
ALTER TABLE `tiket_dipesan`
  MODIFY `id_tiket_dipesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tiket_tersedia`
--
ALTER TABLE `tiket_tersedia`
  MODIFY `id_tiket_tersedia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transportasi`
--
ALTER TABLE `transportasi`
  MODIFY `id_transportasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type_transportasi`
--
ALTER TABLE `type_transportasi`
  MODIFY `id_type_transportasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_tiket`
--
ALTER TABLE `cart_tiket`
  ADD CONSTRAINT `cart_tiket_ibfk_1` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id_rute`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cart_tiket_ibfk_2` FOREIGN KEY (`id_penumpang`) REFERENCES `penumpang` (`id_penumpang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `penumpang` (`id_penumpang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id_rute`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD CONSTRAINT `penumpang_ibfk_1` FOREIGN KEY (`id_img_profil_penumpang`) REFERENCES `img_profil_penumpang` (`id_img_profil_penumpang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
