-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 09:22 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(1, 1, 'BOS SEJATI', 'Pendidikan  Biologi', 'Kunir, wonodadi, Blitar', 'ini biodata ku'),
(2, 2, '', '', '', ''),
(3, 3, '', '', '', ''),
(5, 4, '', '', '', ''),
(6, 5, NULL, NULL, NULL, NULL),
(8, 9, 'Murid Teladan', '', '', '');

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
-- Table structure for table `t_import`
--

CREATE TABLE `t_import` (
  `import_id` int(11) NOT NULL COMMENT 'Primary Key',
  `import_nama` text NOT NULL DEFAULT '',
  `import_umur` text NOT NULL DEFAULT '',
  `import_tinggi` text NOT NULL DEFAULT '',
  `import_berat` text NOT NULL DEFAULT '',
  `import_hapus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='datatable demo table';

--
-- Dumping data for table `t_import`
--

INSERT INTO `t_import` (`import_id`, `import_nama`, `import_umur`, `import_tinggi`, `import_berat`, `import_hapus`) VALUES
(5, 'bagas', '25', '172', '80', 0),
(6, 'laila', '24', '150', '41', 1),
(7, 'bagas', '25', '172', '80', 0),
(8, 'laila', '24', '150', '41', 0);

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
(3, 'Muatan Nasional', 'A', '', 0),
(4, 'Muatan Kewilayahan', 'B', '', 0),
(5, 'Kelompok C (Peminatan)', 'C', '[\"Dasar Bidang Keahlian \",\"Dasar Program Keahlian \",\"Paket Keahlian \"]', 0);

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
-- Table structure for table `t_lintas`
--

CREATE TABLE `t_lintas` (
  `lintas_id` int(11) NOT NULL,
  `lintas_user` text NOT NULL,
  `lintas_semester` text NOT NULL,
  `lintas_file` text NOT NULL,
  `lintas_type` text NOT NULL,
  `lintas_deskripsi` text NOT NULL,
  `lintas_tanggal` date NOT NULL DEFAULT curdate(),
  `lintas_hapus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_lintas`
--

INSERT INTO `t_lintas` (`lintas_id`, `lintas_user`, `lintas_semester`, `lintas_file`, `lintas_type`, `lintas_deskripsi`, `lintas_tanggal`, `lintas_hapus`) VALUES
(1, '3', '2', 'eccbc87e4b5ce2fe28308fd9f2a7baf3.png', 'image/png', 'Piagam Jakarta', '2022-07-05', 0);

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
(7, 'Seni Budaya', '4', '', '70', '2022-06-14', 0),
(8, 'Pendidikan Jasmani Olah Raga & Kesehatan', '4', '', '70', '2022-06-14', 0),
(9, 'Muatan Peminatan Kejuruan', '4', '', '70', '2022-06-14', 0),
(17, 'sub 1', '5', '0', '70', '2022-07-02', 1),
(18, 'sub 2', '5', '1', '70', '2022-07-02', 1),
(19, 'sub 3', '5', '2', '70', '2022-07-02', 1),
(20, 'sub 2.1', '5', '1', '70', '2022-07-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_peminatan`
--

CREATE TABLE `t_peminatan` (
  `peminatan_id` int(11) NOT NULL,
  `peminatan_user` text DEFAULT NULL,
  `peminatan_tahun` text DEFAULT NULL,
  `peminatan_semester` text DEFAULT NULL,
  `peminatan_data` text DEFAULT NULL,
  `peminatan_tanggal` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_peminatan`
--

INSERT INTO `t_peminatan` (`peminatan_id`, `peminatan_user`, `peminatan_tahun`, `peminatan_semester`, `peminatan_data`, `peminatan_tanggal`) VALUES
(15, '4', '1', '1', '{\"c1\":\"Simulasi dan  komunikasi digital\",\"c1_np_kkm\":70,\"c1_np_angka\":60,\"c1_np_predikat\":\"A\",\"c1_nk_kkm\":70,\"c1_nk_angka\":80,\"c1_nk_predikat\":\"A\",\"c1_nss_mapel\":\"SB\",\"c2\":\"Gambar teknik otomotif\",\"c2_np_kkm\":70,\"c2_np_angka\":60,\"c2_np_predikat\":\"A\",\"c2_nk_kkm\":70,\"c2_nk_angka\":80,\"c2_nk_predikat\":\"A\",\"c2_nss_mapel\":\"SB\",\"c3\":\"Bahasa jawa\",\"c3_np_kkm\":70,\"c3_np_angka\":60,\"c3_np_predikat\":\"A\",\"c3_nk_kkm\":70,\"c3_nk_angka\":80,\"c3_nk_predikat\":\"A\",\"c3_nss_mapel\":\"SB\"}', '2023-03-22'),
(16, '4', '1', '1', '{\"c1\":\"Fisika\",\"c1_np_kkm\":70,\"c1_np_angka\":60,\"c1_np_predikat\":\"A\",\"c1_nk_kkm\":70,\"c1_nk_angka\":80,\"c1_nk_predikat\":\"A\",\"c1_nss_mapel\":\"SB\",\"c2\":\"Teknik dasar otomotif\",\"c2_np_kkm\":70,\"c2_np_angka\":60,\"c2_np_predikat\":\"A\",\"c2_nk_kkm\":70,\"c2_nk_angka\":80,\"c2_nk_predikat\":\"A\",\"c2_nss_mapel\":\"SB\",\"c3\":\"Bimbingan dan konseling\",\"c3_np_kkm\":70,\"c3_np_angka\":60,\"c3_np_predikat\":\"A\",\"c3_nk_kkm\":70,\"c3_nk_angka\":80,\"c3_nk_predikat\":\"A\",\"c3_nss_mapel\":\"SB\"}', '2023-03-22'),
(17, '4', '1', '1', '{\"c1\":\"Kimia\",\"c1_np_kkm\":70,\"c1_np_angka\":60,\"c1_np_predikat\":\"A\",\"c1_nk_kkm\":70,\"c1_nk_angka\":80,\"c1_nk_predikat\":\"A\",\"c1_nss_mapel\":\"SB\",\"c2\":\"Pekerjaan dasar otomotif\",\"c2_np_kkm\":70,\"c2_np_angka\":60,\"c2_np_predikat\":\"A\",\"c2_nk_kkm\":70,\"c2_nk_angka\":80,\"c2_nk_predikat\":\"A\",\"c2_nss_mapel\":\"SB\",\"c3\":\"PGRI\",\"c3_np_kkm\":70,\"c3_np_angka\":60,\"c3_np_predikat\":\"A\",\"c3_nk_kkm\":70,\"c3_nk_angka\":80,\"c3_nk_predikat\":\"A\",\"c3_nss_mapel\":\"SB\"}', '2023-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `t_penilaian`
--

CREATE TABLE `t_penilaian` (
  `penilaian_id` int(11) NOT NULL,
  `penilaian_user` text NOT NULL,
  `penilaian_tahun` text NOT NULL DEFAULT '',
  `penilaian_semester` text NOT NULL,
  `penilaian_data` text NOT NULL,
  `penilaian_type` set('text','file') NOT NULL DEFAULT '',
  `penilaian_file` text NOT NULL,
  `penilaian_tanggal` date NOT NULL DEFAULT curdate(),
  `penilaian_hapus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_penilaian`
--

INSERT INTO `t_penilaian` (`penilaian_id`, `penilaian_user`, `penilaian_tahun`, `penilaian_semester`, `penilaian_data`, `penilaian_type`, `penilaian_file`, `penilaian_tanggal`, `penilaian_hapus`) VALUES
(3, '3', '1', '1', '{\"semester\":\"1\",\"user\":\"3\",\"status\":\"1\",\"type\":\"text\",\"1_np_angka\":\"10\",\"1_np_predikat\":\"A\",\"1_nk_angka\":\"10\",\"1_nk_predikat\":\"A\",\"1_nss_mapel\":\"SB\",\"2_np_angka\":\"20\",\"2_np_predikat\":\"B\",\"2_nk_angka\":\"20\",\"2_nk_predikat\":\"B\",\"2_nss_mapel\":\"B\",\"3_np_angka\":\"30\",\"3_np_predikat\":\"C\",\"3_nk_angka\":\"30\",\"3_nk_predikat\":\"C\",\"3_nss_mapel\":\"C\",\"4_np_angka\":\"40\",\"4_np_predikat\":\"D\",\"4_nk_angka\":\"40\",\"4_nk_predikat\":\"D\",\"4_nss_mapel\":\"K\",\"5_np_angka\":\"50\",\"5_np_predikat\":\"A\",\"5_nk_angka\":\"50\",\"5_nk_predikat\":\"A\",\"5_nss_mapel\":\"SB\",\"6_np_angka\":\"60\",\"6_np_predikat\":\"B\",\"6_nk_angka\":\"60\",\"6_nk_predikat\":\"B\",\"6_nss_mapel\":\"B\",\"8_np_angka\":\"70\",\"8_np_predikat\":\"C\",\"8_nk_angka\":\"70\",\"8_nk_predikat\":\"C\",\"8_nss_mapel\":\"C\",\"9_np_angka\":\"80\",\"9_np_predikat\":\"D\",\"9_nk_angka\":\"80\",\"9_nk_predikat\":\"D\",\"9_nss_mapel\":\"K\",\"10_np_angka\":\"90\",\"10_np_predikat\":\"A\",\"10_nk_angka\":\"90\",\"10_nk_predikat\":\"A\",\"10_nss_mapel\":\"SB\",\"17_0_np_angka\":\"10\",\"17_0_np_predikat\":\"A\",\"17_0_nk_angka\":\"10\",\"17_0_nk_predikat\":\"A\",\"17_0_nss_mapel\":\"SB\",\"18_1_np_angka\":\"20\",\"18_1_np_predikat\":\"B\",\"18_1_nk_angka\":\"20\",\"18_1_nk_predikat\":\"B\",\"18_1_nss_mapel\":\"B\",\"20_1_np_angka\":\"30\",\"20_1_np_predikat\":\"C\",\"20_1_nk_angka\":\"30\",\"20_1_nk_predikat\":\"C\",\"20_1_nss_mapel\":\"C\",\"19_2_np_angka\":\"40\",\"19_2_np_predikat\":\"D\",\"19_2_nk_angka\":\"40\",\"19_2_nk_predikat\":\"D\",\"19_2_nss_mapel\":\"K\"}', 'text', '', '2022-06-21', 0),
(11, '3', '1', '2', '', 'file', '65445862c29c42c6436210648aaecbe7.jpg', '2022-06-23', 0),
(32, '5', '3', '1', '{\"semester\":\"1\",\"user\":\"5\",\"status\":\"1\",\"tahun\":\"3\",\"type\":\"text\",\"1_np_angka\":\"60\",\"1_np_predikat\":\"C\",\"1_nk_angka\":\"90\",\"1_nk_predikat\":\"B\",\"1_nss_mapel\":\"B\",\"2_np_angka\":\"60\",\"2_np_predikat\":\"C\",\"2_nk_angka\":\"90\",\"2_nk_predikat\":\"B\",\"2_nss_mapel\":\"B\",\"3_np_angka\":\"60\",\"3_np_predikat\":\"C\",\"3_nk_angka\":\"90\",\"3_nk_predikat\":\"B\",\"3_nss_mapel\":\"B\",\"4_np_angka\":\"60\",\"4_np_predikat\":\"C\",\"4_nk_angka\":\"90\",\"4_nk_predikat\":\"B\",\"4_nss_mapel\":\"B\",\"5_np_angka\":\"60\",\"5_np_predikat\":\"C\",\"5_nk_angka\":\"90\",\"5_nk_predikat\":\"B\",\"5_nss_mapel\":\"B\",\"6_np_angka\":\"60\",\"6_np_predikat\":\"C\",\"6_nk_angka\":\"90\",\"6_nk_predikat\":\"B\",\"6_nss_mapel\":\"B\",\"7_np_angka\":\"60\",\"7_np_predikat\":\"C\",\"7_nk_angka\":\"90\",\"7_nk_predikat\":\"B\",\"7_nss_mapel\":\"B\",\"8_np_angka\":\"60\",\"8_np_predikat\":\"C\",\"8_nk_angka\":\"90\",\"8_nk_predikat\":\"B\",\"8_nss_mapel\":\"B\",\"9_np_angka\":\"60\",\"9_np_predikat\":\"C\",\"9_nk_angka\":\"90\",\"9_nk_predikat\":\"B\",\"9_nss_mapel\":\"B\"}', 'text', '', '2022-10-10', 0),
(33, '4', '1', '1', '{\"semester\":1,\"user\":\"4\",\"status\":\"1\",\"type\":\"text\",\"1_np_angka\":70,\"1_np_predikat\":\"B\",\"1_nk_angka\":100,\"1_nk_predikat\":\"C\",\"1_nss_mapel\":\"SB\",\"2_np_angka\":70,\"2_np_predikat\":\"B\",\"2_nk_angka\":100,\"2_nk_predikat\":\"C\",\"2_nss_mapel\":\"SB\",\"3_np_angka\":70,\"3_np_predikat\":\"B\",\"3_nk_angka\":100,\"3_nk_predikat\":\"C\",\"3_nss_mapel\":\"SB\",\"4_np_angka\":70,\"4_np_predikat\":\"B\",\"4_nk_angka\":100,\"4_nk_predikat\":\"C\",\"4_nss_mapel\":\"SB\",\"5_np_angka\":70,\"5_np_predikat\":\"B\",\"5_nk_angka\":100,\"5_nk_predikat\":\"C\",\"5_nss_mapel\":\"SB\",\"6_np_angka\":70,\"6_np_predikat\":\"B\",\"6_nk_angka\":100,\"6_nk_predikat\":\"C\",\"6_nss_mapel\":\"SB\",\"7_np_angka\":70,\"7_np_predikat\":\"B\",\"7_nk_angka\":100,\"7_nk_predikat\":\"C\",\"7_nss_mapel\":\"SB\",\"8_np_angka\":70,\"8_np_predikat\":\"B\",\"8_nk_angka\":100,\"8_nk_predikat\":\"C\",\"8_nss_mapel\":\"SB\",\"9_np_angka\":70,\"9_np_predikat\":\"B\",\"9_nk_angka\":100,\"9_nk_predikat\":\"C\",\"9_nss_mapel\":\"SB\"}', 'text', '', '2022-10-10', 0),
(40, '3', '3', '1', '{\"semester\":1,\"user\":\"3\",\"status\":\"1\",\"type\":\"text\",\"1_np_angka\":50,\"1_np_predikat\":\"D\",\"1_nk_angka\":80,\"1_nk_predikat\":\"A\",\"1_nss_mapel\":\"C\",\"2_np_angka\":50,\"2_np_predikat\":\"D\",\"2_nk_angka\":80,\"2_nk_predikat\":\"A\",\"2_nss_mapel\":\"C\",\"3_np_angka\":50,\"3_np_predikat\":\"D\",\"3_nk_angka\":80,\"3_nk_predikat\":\"A\",\"3_nss_mapel\":\"C\",\"4_np_angka\":50,\"4_np_predikat\":\"D\",\"4_nk_angka\":80,\"4_nk_predikat\":\"A\",\"4_nss_mapel\":\"C\",\"5_np_angka\":50,\"5_np_predikat\":\"D\",\"5_nk_angka\":80,\"5_nk_predikat\":\"A\",\"5_nss_mapel\":\"C\",\"6_np_angka\":50,\"6_np_predikat\":\"D\",\"6_nk_angka\":80,\"6_nk_predikat\":\"A\",\"6_nss_mapel\":\"C\",\"7_np_angka\":50,\"7_np_predikat\":\"D\",\"7_nk_angka\":80,\"7_nk_predikat\":\"A\",\"7_nss_mapel\":\"C\",\"8_np_angka\":50,\"8_np_predikat\":\"D\",\"8_nk_angka\":80,\"8_nk_predikat\":\"A\",\"8_nss_mapel\":\"C\",\"9_np_angka\":50,\"9_np_predikat\":\"D\",\"9_nk_angka\":80,\"9_nk_predikat\":\"A\",\"9_nss_mapel\":\"C\"}', 'text', '', '2022-10-15', 0),
(41, '5', '3', '1', '{\"semester\":\"1\",\"user\":\"5\",\"status\":\"1\",\"tahun\":\"3\",\"type\":\"text\",\"1_np_angka\":\"60\",\"1_np_predikat\":\"C\",\"1_nk_angka\":\"90\",\"1_nk_predikat\":\"B\",\"1_nss_mapel\":\"B\",\"2_np_angka\":\"60\",\"2_np_predikat\":\"C\",\"2_nk_angka\":\"90\",\"2_nk_predikat\":\"B\",\"2_nss_mapel\":\"B\",\"3_np_angka\":\"60\",\"3_np_predikat\":\"C\",\"3_nk_angka\":\"90\",\"3_nk_predikat\":\"B\",\"3_nss_mapel\":\"B\",\"4_np_angka\":\"60\",\"4_np_predikat\":\"C\",\"4_nk_angka\":\"90\",\"4_nk_predikat\":\"B\",\"4_nss_mapel\":\"B\",\"5_np_angka\":\"60\",\"5_np_predikat\":\"C\",\"5_nk_angka\":\"90\",\"5_nk_predikat\":\"B\",\"5_nss_mapel\":\"B\",\"6_np_angka\":\"60\",\"6_np_predikat\":\"C\",\"6_nk_angka\":\"90\",\"6_nk_predikat\":\"B\",\"6_nss_mapel\":\"B\",\"7_np_angka\":\"60\",\"7_np_predikat\":\"C\",\"7_nk_angka\":\"90\",\"7_nk_predikat\":\"B\",\"7_nss_mapel\":\"B\",\"8_np_angka\":\"60\",\"8_np_predikat\":\"C\",\"8_nk_angka\":\"90\",\"8_nk_predikat\":\"B\",\"8_nss_mapel\":\"B\",\"9_np_angka\":\"60\",\"9_np_predikat\":\"C\",\"9_nk_angka\":\"90\",\"9_nk_predikat\":\"B\",\"9_nss_mapel\":\"B\"}', 'text', '', '2022-10-15', 0);

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
(1, '3', '{\"a1\":\"Naruto Uzumaki\",\"a2\":\"Uzumaki\",\"a3\":\"laki-laki\",\"a4\":\"Blitar, 7 april 1996\",\"a5\":\"islam\",\"a6\":\"Indonesia\",\"a7\":\"2\",\"a8\":\"3\",\"a9\":\"0\",\"a10\":\"0\",\"a11\":\"-\",\"a12\":\"indonesia\",\"b1\":\"kademangan rt01 rw01\",\"b2\":\"085855011542\",\"b3\":\"orang_tua\",\"b4\":\"10\",\"c1\":\"a\",\"c2\":\"-\",\"c3\":\"-\",\"c4\":\"170\",\"c5\":\"80\",\"d1\":\"SMKN 1 KADEMANGAN\",\"d2\":\"091827190\",\"d3\":\"8496701\",\"d4\":\"4\",\"d5\":\"-\",\"d6\":\"-\",\"d7\":\"3A\",\"d8\":\"Menggombal\",\"d9\":\"Keren\",\"d10\":\"Siplah\",\"d11\":\"2022-06-14\",\"e1\":\"Supardi wicaksono\",\"e2\":\"Blitar, 4 April 1967\",\"e3\":\"Islam\",\"e4\":\"indonesia\",\"e5\":\"SMK\",\"e6\":\"Bank Titil\",\"e7\":\"100 juta\",\"e8\":\"kademangan rt01 rw01\",\"e9\":\"Masih hidup\",\"f1\":\"Sutiyah diningrat\",\"f2\":\"Kalimantan 9 agustus 1950\",\"f3\":\"Kejawen\",\"f4\":\"indonesia\",\"f5\":\"SMK\",\"f6\":\"Ibu rumah tangga\",\"f7\":\"150k\",\"f8\":\"kademangan rt01 rw01\",\"f9\":\"Masih hidup\",\"g1\":\"-\",\"g2\":\"-\",\"g3\":\"-\",\"g4\":\"-\",\"g5\":\"-\",\"g6\":\"-\",\"g7\":\"-\",\"g8\":\"kademangan rt01 rw01\",\"h1\":\"Menggambar\",\"h2\":\"Lompat tali\",\"h3\":\"Kemasyarakatan\",\"h4\":\"-\",\"i1\":\"2021\",\"i2\":\"3A\",\"i3\":\"MTS\",\"i4\":\"\",\"i5\":\"\",\"i6\":\"\",\"i7\":\"\",\"i8\":\"\",\"i9\":\"\",\"i10\":\"2022-06-13\",\"i11\":\"Jenuh\",\"i12\":\"-\",\"i13\":\"-\",\"i14\":\"-\",\"j1\":\"Universitas harapan bapak\",\"j2\":\"2022-06-28\",\"j3\":\"Bukacoding\",\"j4\":\"100.000.000\",\"k1\":\"eccbc87e4b5ce2fe28308fd9f2a7baf3_1.png\",\"k2\":\"eccbc87e4b5ce2fe28308fd9f2a7baf3_2.png\",\"id\":\"3\"}', '2022-06-12', 0),
(7, '4', '{\"a1\":\"Sasuke Uciha\",\"a2\":\"Sasuke\",\"a3\":\"laki-laki\",\"a4\":\"Blitar, 7 April 1996\",\"a5\":\"Islam\",\"a6\":\"Indonesia\",\"a7\":\"2\",\"a8\":\"3\",\"a9\":\"0\",\"a10\":\"0\",\"a11\":\"Anak Yatim\",\"a12\":\"Bahasa Indonesia\",\"b1\":\"sumberjo\",\"b2\":\"085855011542\",\"b3\":\"orang_tua\",\"b4\":\"7 km\",\"c1\":\"ab\",\"c2\":\"Covid19\",\"c3\":\"Tidak ada\",\"c4\":\"172 cm\",\"c5\":\"80 kg\",\"d1\":\"SMKN 1 KADEMANGAN\",\"d2\":\"64672881991\",\"d3\":\"738827892901\",\"d4\":\"12 tahun\",\"d5\":\"tidak ada\",\"d6\":\"tidak ada\",\"d7\":\"TKJ 1\",\"d8\":\"System komputer\",\"d9\":\"Teknik Jaringan Komputer\",\"d10\":\"Komputer\",\"d11\":\"2022-01-02\",\"e1\":\"Fugaku Uchiha\",\"e2\":\"Blitar, 22\\/02\\/1968\",\"e3\":\"Islam\",\"e4\":\"Indonesia\",\"e5\":\"STM\",\"e6\":\"Pemimpin Clan uciha\",\"e7\":\"2 Juta\",\"e8\":\"Konoha Gakure\",\"e9\":\"Meninggal Dunia\",\"f1\":\"Mikoto\",\"f2\":\"Blitar, 18\\/05\\/1968\",\"f3\":\"Islam\",\"f4\":\"Indonesia\",\"f5\":\"SMEA\",\"f6\":\"Ibu Rumah Tangga\",\"f7\":\"2 Juta\",\"f8\":\"Konoha Kagure\",\"f9\":\"Meninggal\",\"g1\":\"tidak ada\",\"g2\":\"tidak ada\",\"g3\":\"tidak ada\",\"g4\":\"tidak ada\",\"g5\":\"tidak ada\",\"g6\":\"tidak ada\",\"g7\":\"tidak ada\",\"g8\":\"tidak ada\",\"h1\":\"Melukis\",\"h2\":\"Renang\",\"h3\":\"Karang Taruna\",\"h4\":\"tidak ada\",\"i1\":\"tidak ada\",\"i2\":\"tidak ada\",\"i3\":\"tidak ada\",\"i4\":\"tidak ada\",\"i5\":\"tidak ada\",\"i6\":\"tidak ada\",\"i7\":\"tidak ada\",\"i8\":\"tidak ada\",\"i9\":\"tidak ada\",\"i10\":\"2022-01-08\",\"i11\":\"tidak ada\",\"i12\":\"tidak ada\",\"i13\":\"tidak ada\",\"i14\":\"tidak ada\",\"j1\":\"Unisba\",\"j2\":\"2022-03-01\",\"j3\":\"Egnos Pratama\",\"j4\":\"2,5 Juta\",\"k1\":\"\",\"k2\":\"\",\"id\":\"4\"}', '2022-10-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_sekolah`
--

CREATE TABLE `t_sekolah` (
  `sekolah_id` int(11) NOT NULL,
  `sekolah_nama` text NOT NULL,
  `sekolah_nss` text NOT NULL,
  `sekolah_alamat` text NOT NULL,
  `sekolah_desa` text NOT NULL,
  `sekolah_kecamatan` text NOT NULL,
  `sekolah_kabupaten` text NOT NULL,
  `sekolah_provinsi` text NOT NULL,
  `sekolah_nama_kepala` text NOT NULL,
  `sekolah_nip_kepala` text NOT NULL,
  `sekolah_tahun_pelajaran` text NOT NULL,
  `sekolah_logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_sekolah`
--

INSERT INTO `t_sekolah` (`sekolah_id`, `sekolah_nama`, `sekolah_nss`, `sekolah_alamat`, `sekolah_desa`, `sekolah_kecamatan`, `sekolah_kabupaten`, `sekolah_provinsi`, `sekolah_nama_kepala`, `sekolah_nip_kepala`, `sekolah_tahun_pelajaran`, `sekolah_logo`) VALUES
(2, 'SEKOLAH HARAPAN BAPAK', '1010150619/20233178', 'Jl. Raya Pondok Bali ', 'Karang Mulya', 'Legonkulon', 'Subang', 'Jawa Barat', 'Irman Sutandi, S.Pd', '19610825 198410 1 001', '2022/2023', '231e89e2d236e0da945943ebfa67e3c4.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_tahun`
--

CREATE TABLE `t_tahun` (
  `tahun_id` int(11) NOT NULL,
  `tahun_text` text NOT NULL DEFAULT '',
  `tahun_tanggal` date NOT NULL DEFAULT curdate(),
  `tahun_hapus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_tahun`
--

INSERT INTO `t_tahun` (`tahun_id`, `tahun_text`, `tahun_tanggal`, `tahun_hapus`) VALUES
(1, '2022', '2022-10-15', 0),
(2, '2021', '2022-10-15', 0),
(3, '2023', '2022-10-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_nis` text DEFAULT NULL,
  `user_nisn` text DEFAULT NULL,
  `user_email` text DEFAULT NULL,
  `user_password` text DEFAULT NULL,
  `user_tanggal` date DEFAULT curdate(),
  `user_level` int(11) DEFAULT NULL,
  `user_foto` text DEFAULT NULL,
  `user_status` set('aktif','keluar','mengundurkan','meninggal') DEFAULT 'aktif',
  `user_alasan` text DEFAULT '-',
  `user_hapus` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`user_id`, `user_name`, `user_nis`, `user_nisn`, `user_email`, `user_password`, `user_tanggal`, `user_level`, `user_foto`, `user_status`, `user_alasan`, `user_hapus`) VALUES
(1, 'Admin', NULL, NULL, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '2019-12-27', 1, 'lurah.png', NULL, NULL, 0),
(2, 'Kakashi Sensei', NULL, NULL, 'petugas@gmail.com', 'afb91ef692fd08c445e8cb1bab2ccf9c', '2022-06-11', 2, 'main-qimg-c1973646f5d407b3a17cffb33f8d2305-lq.jpg', NULL, NULL, 0),
(3, 'Naruto Uzumaki', '181901001', '128116417', 'naruto@gmail.com', 'cf9ee5bcb36b4936dd7064ee9b2f139e', '2022-10-15', 3, 'naruto-1.png', 'aktif', '-', 0),
(4, 'Sasuke Uciha', '181901002', '128116418', 'sasuke@gmail.com', '93207db25ad357906be2fd0c3f65f3dc', '2022-10-15', 3, 'download.jpg', 'keluar', 'Kabur ke tempat orochimaru', 0),
(5, 'Sakura Haruno', '181901003', '128116419', 'sakura@gmail.com', '149afd631693c895f81e508eb5aaef37', '2022-10-10', 3, 'sakura-sakura-haruno-8426495-640-481.jpg', 'aktif', '-', 0),
(9, 'Bagas Pramono', '12345', '123', 'bagas@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2023-03-18', 3, NULL, 'aktif', '-', 0),
(10, 'Diah Anggreeni', '123456', '1234', 'diah@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2023-03-18', 3, NULL, 'aktif', '-', 0);

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
-- Indexes for table `t_import`
--
ALTER TABLE `t_import`
  ADD PRIMARY KEY (`import_id`);

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
-- Indexes for table `t_lintas`
--
ALTER TABLE `t_lintas`
  ADD PRIMARY KEY (`lintas_id`);

--
-- Indexes for table `t_pelajaran`
--
ALTER TABLE `t_pelajaran`
  ADD PRIMARY KEY (`pelajaran_id`);

--
-- Indexes for table `t_peminatan`
--
ALTER TABLE `t_peminatan`
  ADD PRIMARY KEY (`peminatan_id`);

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
-- Indexes for table `t_sekolah`
--
ALTER TABLE `t_sekolah`
  ADD PRIMARY KEY (`sekolah_id`);

--
-- Indexes for table `t_tahun`
--
ALTER TABLE `t_tahun`
  ADD PRIMARY KEY (`tahun_id`);

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
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_dokumen`
--
ALTER TABLE `t_dokumen`
  MODIFY `dokumen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_import`
--
ALTER TABLE `t_import`
  MODIFY `import_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_kelengkapan`
--
ALTER TABLE `t_kelengkapan`
  MODIFY `kelengkapan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_lintas`
--
ALTER TABLE `t_lintas`
  MODIFY `lintas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_pelajaran`
--
ALTER TABLE `t_pelajaran`
  MODIFY `pelajaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `t_peminatan`
--
ALTER TABLE `t_peminatan`
  MODIFY `peminatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `t_penilaian`
--
ALTER TABLE `t_penilaian`
  MODIFY `penilaian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `t_pribadi`
--
ALTER TABLE `t_pribadi`
  MODIFY `pribadi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_sekolah`
--
ALTER TABLE `t_sekolah`
  MODIFY `sekolah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_tahun`
--
ALTER TABLE `t_tahun`
  MODIFY `tahun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
