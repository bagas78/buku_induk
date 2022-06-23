-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 07:18 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_induk`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_detail_user`
--

CREATE TABLE `t_detail_user` (
  `detail_id` int(11) NOT NULL,
  `detail_id_user` int(11) DEFAULT NULL,
  `detail_jabatan` varchar(50) DEFAULT NULL,
  `detail_pendidikan` text DEFAULT NULL,
  `detail_alamat` text DEFAULT NULL,
  `detail_biodata` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_detail_user`
--

INSERT INTO `t_detail_user` (`detail_id`, `detail_id_user`, `detail_jabatan`, `detail_pendidikan`, `detail_alamat`, `detail_biodata`) VALUES
(1, 1, 'BOS', 'Pendidikan  Biologi', 'Kunir, wonodadi, Blitar', 'ini biodata ku'),
(2, 2, NULL, NULL, NULL, NULL),
(3, 3, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_dokumen`
--

CREATE TABLE `t_dokumen` (
  `dokumen_id` int(11) NOT NULL,
  `dokumen_user` text NOT NULL,
  `dokumen_name` text NOT NULL,
  `dokumen_file` text NOT NULL,
  `dokumen_deskripsi` text NOT NULL,
  `dokumen_type` text NOT NULL,
  `dokumen_tanggal` date NOT NULL DEFAULT curdate(),
  `dokumen_hapus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_dokumen`
--

INSERT INTO `t_dokumen` (`dokumen_id`, `dokumen_user`, `dokumen_name`, `dokumen_file`, `dokumen_deskripsi`, `dokumen_type`, `dokumen_tanggal`, `dokumen_hapus`) VALUES
(1, '3', 'File Foto', 'eccbc87e4b5ce2fe28308fd9f2a7baf3.png', 'Ini foto saya :)', 'image/png', '2022-06-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_kategori`
--

CREATE TABLE `t_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` text NOT NULL,
  `kategori_alpha` text NOT NULL,
  `kategori_sub` text NOT NULL,
  `kategori_hapus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_kategori`
--

INSERT INTO `t_kategori` (`kategori_id`, `kategori_nama`, `kategori_alpha`, `kategori_sub`, `kategori_hapus`) VALUES
(3, 'Muatan Nasional', 'A', '[\"\"]', 0),
(4, 'Muatan Kewilayahan', 'B', 'null', 0),
(5, 'Kelompok C (Permintaan)', 'C', '[\"Dasar Bidang Keahlian *)\",\"Dasar Program Keahlian *)\",\"Paket Keahlian *) Lintas Minat\\/Pendalaman Minat\"]', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_kelengkapan`
--

CREATE TABLE `t_kelengkapan` (
  `kelengkapan_id` int(11) NOT NULL,
  `kelengkapan_user` text NOT NULL DEFAULT '',
  `kelengkapan_data` text NOT NULL DEFAULT '',
  `kelengkapan_hapus` int(11) NOT NULL DEFAULT 0,
  `kelengkapan_tanggal` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_kelengkapan`
--

INSERT INTO `t_kelengkapan` (`kelengkapan_id`, `kelengkapan_user`, `kelengkapan_data`, `kelengkapan_hapus`, `kelengkapan_tanggal`) VALUES
(1, '3', '{\"a1\":\"15\",\"a2\":\"5\",\"a3\":\"0\",\"b1\":\"Merdeka Cell\",\"b2\":\"-\",\"b3\":\"Kademangan\",\"b4\":\"-\",\"b5\":\"Jualan Pulsa\",\"b6\":\"-\",\"c1\":\"Basket\",\"c2\":\"Pramuka\",\"c3\":\"Paskibra\",\"d1\":\"12\",\"d2\":\"kademangan\",\"d3\":\"lulus\",\"d4\":\"2022-06-23\"}', 0, '2022-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `t_pelajaran`
--

CREATE TABLE `t_pelajaran` (
  `pelajaran_id` int(11) NOT NULL,
  `pelajaran_nama` text NOT NULL,
  `pelajaran_kategori` text NOT NULL,
  `pelajaran_kategori_sub` text NOT NULL,
  `pelajaran_kkm` text NOT NULL,
  `pelajaran_tanggal` date NOT NULL DEFAULT curdate(),
  `pelajaran_hapus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pelajaran`
--

INSERT INTO `t_pelajaran` (`pelajaran_id`, `pelajaran_nama`, `pelajaran_kategori`, `pelajaran_kategori_sub`, `pelajaran_kkm`, `pelajaran_tanggal`, `pelajaran_hapus`) VALUES
(1, 'Pendidikan Agama dan Pekerti', '3', '', '70', '2022-06-13', 0),
(2, 'Pendidikan Pancasila dan Kewarganegaraan', '3', '', '70', '2022-06-13', 0),
(3, 'Bahasa Indonesia', '3', '', '70', '2022-06-13', 0),
(4, 'Matematika', '3', '', '70', '2022-06-13', 0),
(5, 'Sejarah Indonesia', '3', '', '70', '2022-06-13', 0),
(6, 'Bahasa Inggris', '3', '', '70', '2022-06-13', 0),
(8, 'Seni Budaya', '4', '', '70', '2022-06-14', 0),
(9, 'Pendidikan Jasmani Olah Raga & Kesehatan', '4', '', '70', '2022-06-14', 0),
(10, 'Muatan Peminatan Kejuruan', '4', '', '70', '2022-06-14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_penilaian`
--

CREATE TABLE `t_penilaian` (
  `penilaian_id` int(11) NOT NULL,
  `penilaian_user` text NOT NULL,
  `penilaian_semester` text NOT NULL,
  `penilaian_np_nilai` text NOT NULL,
  `penilaian_np_predikat` text NOT NULL,
  `penilaian_nk_nilai` text NOT NULL,
  `penilaian_nk_predikat` text NOT NULL,
  `penilaian_nss_mapel` text NOT NULL,
  `penilaian_type` set('text','file') NOT NULL DEFAULT '',
  `penilaian_file` text NOT NULL,
  `penilaian_tanggal` date NOT NULL DEFAULT curdate(),
  `penilaian_hapus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_penilaian`
--

INSERT INTO `t_penilaian` (`penilaian_id`, `penilaian_user`, `penilaian_semester`, `penilaian_np_nilai`, `penilaian_np_predikat`, `penilaian_nk_nilai`, `penilaian_nk_predikat`, `penilaian_nss_mapel`, `penilaian_type`, `penilaian_file`, `penilaian_tanggal`, `penilaian_hapus`) VALUES
(3, '3', '1', '85', 'B', '100', 'A', 'SB', 'text', '', '2022-06-21', 0),
(11, '3', '2', '', '', '', '', '', 'file', 'd3b0eb901da135ff4a4a5a3a3258a232.png', '2022-06-23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_pribadi`
--

CREATE TABLE `t_pribadi` (
  `pribadi_id` int(11) NOT NULL,
  `pribadi_siswa` text NOT NULL,
  `pribadi_data` text NOT NULL,
  `pribadi_tanggal` date NOT NULL DEFAULT curdate(),
  `pribadi_hapus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pribadi`
--

INSERT INTO `t_pribadi` (`pribadi_id`, `pribadi_siswa`, `pribadi_data`, `pribadi_tanggal`, `pribadi_hapus`) VALUES
(1, '3', '{\"a1\":\"Bagas Pramono\",\"a2\":\"Bagas\",\"a3\":\"laki-laki\",\"a4\":\"Blitar, 7 april 1996\",\"a5\":\"islam\",\"a6\":\"Indonesia\",\"a7\":\"2\",\"a8\":\"3\",\"a9\":\"0\",\"a10\":\"0\",\"a11\":\"-\",\"a12\":\"indonesia\",\"b1\":\"kademangan rt01 rw01\",\"b2\":\"085855011542\",\"b3\":\"orang_tua\",\"b4\":\"10\",\"c1\":\"a\",\"c2\":\"-\",\"c3\":\"-\",\"c4\":\"170\",\"c5\":\"80\",\"d1\":\"SMKN 1 KADEMANGAN\",\"d2\":\"091827190\",\"d3\":\"8496701\",\"d4\":\"4\",\"d5\":\"-\",\"d6\":\"-\",\"d7\":\"3A\",\"d8\":\"Menggombal\",\"d9\":\"Keren\",\"d10\":\"Siplah\",\"d11\":\"2022-06-14\",\"e1\":\"Supardi wicaksono\",\"e2\":\"Blitar, 4 April 1967\",\"e3\":\"Islam\",\"e4\":\"Mencari uang\",\"e5\":\"SMK\",\"e6\":\"Bank Titil\",\"e7\":\"100 juta\",\"e8\":\"kademangan rt01 rw01\",\"e9\":\"Masih hidup\",\"f1\":\"Sutiyah diningrat\",\"f2\":\"Kalimantan 9 agustus 1950\",\"f3\":\"Kejawen\",\"f4\":\"Memasak\",\"f5\":\"SMK\",\"f6\":\"Ibu rumah tangga\",\"f7\":\"150k\",\"f8\":\"kademangan rt01 rw01\",\"f9\":\"Masih hidup\",\"g1\":\"-\",\"g2\":\"-\",\"g3\":\"-\",\"g4\":\"-\",\"g5\":\"-\",\"g6\":\"-\",\"g7\":\"-\",\"g8\":\"kademangan rt01 rw01\",\"h1\":\"Menggambar\",\"h2\":\"Lompat tali\",\"h3\":\"Kemasyarakatan\",\"h4\":\"-\",\"i1\":\"2021\",\"i2\":\"3A\",\"i3\":\"MTS\",\"i4\":\"\",\"i5\":\"\",\"i6\":\"\",\"i7\":\"\",\"i8\":\"\",\"i9\":\"\",\"i10\":\"2022-06-13\",\"i11\":\"Jenuh\",\"i12\":\"-\",\"i13\":\"-\",\"i14\":\"-\",\"j1\":\"Universitas harapan bapak\",\"j2\":\"2022-06-28\",\"j3\":\"Bukacoding\",\"j4\":\"100.000.000\",\"k1\":\"eccbc87e4b5ce2fe28308fd9f2a7baf3_1.png\",\"k2\":\"eccbc87e4b5ce2fe28308fd9f2a7baf3_2.png\"}', '2022-06-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_email` text DEFAULT NULL,
  `user_password` text DEFAULT NULL,
  `user_kelas` text DEFAULT NULL,
  `user_tanggal` date DEFAULT NULL,
  `user_level` int(11) DEFAULT NULL,
  `user_foto` text DEFAULT NULL,
  `user_hapus` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_kelas`, `user_tanggal`, `user_level`, `user_foto`, `user_hapus`) VALUES
(1, 'Admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '2019-12-27', 1, 'lurah.png', 0),
(2, 'Petugas', 'petugas@gmail.com', 'afb91ef692fd08c445e8cb1bab2ccf9c', NULL, '2022-06-11', 2, NULL, 0),
(3, 'Siswa', 'siswa@gmail.com', 'bcd724d15cde8c47650fda962968f102', NULL, '2022-06-11', 3, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_detail_user`
--
ALTER TABLE `t_detail_user`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `t_dokumen`
--
ALTER TABLE `t_dokumen`
  ADD PRIMARY KEY (`dokumen_id`);

--
-- Indexes for table `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `t_kelengkapan`
--
ALTER TABLE `t_kelengkapan`
  ADD PRIMARY KEY (`kelengkapan_id`);

--
-- Indexes for table `t_pelajaran`
--
ALTER TABLE `t_pelajaran`
  ADD PRIMARY KEY (`pelajaran_id`);

--
-- Indexes for table `t_penilaian`
--
ALTER TABLE `t_penilaian`
  ADD PRIMARY KEY (`penilaian_id`);

--
-- Indexes for table `t_pribadi`
--
ALTER TABLE `t_pribadi`
  ADD PRIMARY KEY (`pribadi_id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_detail_user`
--
ALTER TABLE `t_detail_user`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_dokumen`
--
ALTER TABLE `t_dokumen`
  MODIFY `dokumen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_kelengkapan`
--
ALTER TABLE `t_kelengkapan`
  MODIFY `kelengkapan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_pelajaran`
--
ALTER TABLE `t_pelajaran`
  MODIFY `pelajaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_penilaian`
--
ALTER TABLE `t_penilaian`
  MODIFY `penilaian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t_pribadi`
--
ALTER TABLE `t_pribadi`
  MODIFY `pribadi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
