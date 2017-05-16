-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2017 at 07:22 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembayaran_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_ulang_kenaikan`
--

CREATE TABLE `daftar_ulang_kenaikan` (
  `id_daftar` int(11) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_ulang_kenaikan`
--

INSERT INTO `daftar_ulang_kenaikan` (`id_daftar`, `nis`, `tahun`, `id_kelas`) VALUES
(1, '9998313570 / 89-89.064', '2015', 1),
(2, '9999842856 / 3310/371.104', '2016', 2),
(6, '9986946479 / 28/28.064', '2016', 9),
(7, '9990349569 / 24-24.043', '2016', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `id_detail` int(11) NOT NULL,
  `no_pembayaran` varchar(30) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembayaran`
--

INSERT INTO `detail_pembayaran` (`id_detail`, `no_pembayaran`, `id_jenis`, `biaya`) VALUES
(1, '14082016-1', 1, 100000),
(2, '14082016-1', 3, 100000),
(3, '14082016-1', 4, 100000),
(4, '14082016-1', 5, 100000),
(5, '14082016-1', 6, 100000),
(6, '14082016-1', 7, 100000),
(7, '14082016-1', 8, 100000),
(8, '14082016-1', 9, 100000),
(9, '14082016-1', 10, 100000),
(10, '14082016-1', 11, 100000),
(11, '14082016-1', 12, 100000),
(12, '14082016-1', 13, 100000),
(13, '14082016-1', 14, 10000),
(14, '14082016-1', 15, 20000),
(15, '14082016-1', 16, 85000),
(16, '14082016-1', 17, 70000),
(17, '14082016-1', 18, 80000),
(18, '14082016-1', 19, 70000),
(19, '14082016-1', 20, 80000),
(20, '14082016-1', 22, 400000),
(21, '14082016-1', 23, 50000),
(22, '14082016-1', 24, 60000),
(23, '14082016-1', 25, 110000),
(24, '14082016-1', 26, 50000),
(25, '14082016-1', 27, 250000),
(26, '18082016-1', 21, 350000),
(27, '20082016-1', 1, 100000),
(28, '20082016-1', 3, 100000),
(29, '20082016-1', 4, 100000),
(30, '20082016-1', 5, 100000),
(31, '20082016-1', 6, 100000),
(32, '20082016-1', 7, 100000),
(33, '20082016-1', 8, 100000),
(34, '20082016-1', 9, 100000),
(35, '20082016-1', 10, 100000),
(36, '20082016-1', 11, 100000),
(37, '20082016-1', 12, 100000),
(38, '20082016-1', 13, 100000),
(39, '21082016-1', 1, 100000),
(40, '21082016-1', 3, 100000),
(41, '21082016-1', 4, 100000),
(42, '21082016-1', 5, 100000),
(43, '21082016-1', 14, 10000),
(44, '21082016-1', 15, 20000),
(45, '21082016-1', 16, 85000),
(46, '21082016-1', 17, 70000),
(47, '21082016-1', 18, 80000),
(48, '21082016-1', 19, 70000),
(49, '21082016-1', 20, 80000),
(50, '21082016-1', 21, 350000),
(51, '21082016-1', 22, 400000),
(52, '21082016-1', 23, 50000),
(53, '21082016-1', 24, 60000),
(54, '21082016-1', 25, 110000),
(55, '21082016-2', 14, 10000),
(56, '21082016-2', 15, 20000),
(57, '21082016-2', 16, 85000),
(58, '21082016-2', 22, 400000),
(59, '21082016-2', 23, 50000),
(60, '21082016-2', 24, 60000),
(61, '21082016-2', 25, 110000),
(62, '21082016-2', 27, 250000),
(63, '21082016-3', 6, 100000),
(64, '21082016-3', 7, 100000),
(65, '21082016-3', 8, 100000),
(66, '21082016-3', 9, 100000),
(67, '21082016-3', 10, 100000),
(68, '22082016-1', 1, 100000),
(69, '24082016-1', 1, 100000),
(70, '24082016-1', 3, 100000),
(71, '31082016-1', 1, 100000),
(72, '31082016-1', 3, 100000),
(73, '31082016-1', 4, 100000),
(74, '31082016-1', 5, 100000),
(75, '31082016-1', 6, 100000),
(76, '31082016-1', 7, 100000),
(77, '31082016-1', 8, 100000),
(78, '31082016-1', 9, 100000),
(79, '31082016-1', 10, 100000),
(80, '31082016-1', 11, 100000),
(81, '31082016-1', 12, 100000),
(82, '31082016-1', 13, 100000),
(83, '31082016-1', 14, 10000),
(84, '31082016-1', 15, 20000),
(85, '31082016-1', 16, 85000),
(86, '31082016-1', 17, 70000),
(87, '31082016-1', 18, 80000),
(88, '31082016-1', 19, 70000),
(89, '31082016-1', 20, 80000),
(90, '31082016-1', 22, 400000),
(91, '31082016-1', 23, 50000),
(92, '31082016-1', 24, 60000),
(93, '31082016-1', 25, 110000),
(94, '04092016-1', 3, 100000),
(95, '04092016-1', 4, 100000),
(96, '04092016-1', 5, 100000),
(97, '04092016-1', 6, 100000),
(98, '05092016-1', 1, 100000),
(99, '17092016-2', 7, 100000),
(100, '17092016-2', 8, 100000),
(101, '17092016-2', 9, 100000),
(102, '17092016-2', 10, 100000),
(103, '17092016-2', 11, 100000),
(104, '17092016-2', 12, 100000),
(105, '17092016-2', 13, 100000),
(106, '17092016-2', 14, 10000),
(107, '17092016-2', 15, 20000),
(108, '17092016-2', 16, 85000),
(109, '13102016-1', 1, 100000),
(110, '13102016-1', 3, 100000),
(111, '13102016-1', 4, 100000),
(112, '13102016-1', 5, 100000),
(113, '13102016-1', 6, 100000),
(114, '13102016-1', 7, 100000),
(115, '13102016-1', 8, 100000),
(116, '13102016-1', 9, 100000),
(117, '13102016-1', 10, 100000),
(118, '13102016-1', 11, 100000),
(119, '13102016-1', 12, 100000),
(120, '13102016-1', 13, 100000),
(121, '13102016-1', 14, 10000),
(122, '13102016-1', 15, 20000),
(123, '13102016-1', 16, 85000),
(124, '13102016-1', 17, 70000),
(125, '13102016-1', 18, 80000),
(126, '13102016-1', 19, 70000),
(127, '13102016-1', 22, 400000),
(128, '13102016-1', 23, 50000),
(129, '13102016-1', 24, 60000),
(130, '13102016-1', 25, 110000),
(131, '13102016-1', 26, 50000),
(132, '13102016-1', 27, 250000),
(133, '13102016-1', 28, 250000),
(134, '13102016-2', 1, 100000),
(135, '13102016-2', 3, 100000),
(136, '13102016-2', 4, 100000),
(137, '13102016-2', 5, 100000),
(138, '13102016-2', 6, 100000),
(139, '13102016-2', 7, 100000),
(140, '13102016-2', 8, 100000),
(141, '13102016-2', 9, 100000),
(142, '13102016-2', 10, 100000),
(143, '13102016-2', 11, 100000),
(144, '13102016-2', 12, 100000),
(145, '13102016-2', 13, 100000),
(146, '13102016-2', 14, 10000),
(147, '13102016-2', 15, 20000),
(148, '13102016-2', 16, 85000),
(149, '13102016-2', 17, 70000),
(150, '13102016-2', 18, 80000),
(151, '13102016-2', 19, 70000),
(152, '13102016-2', 22, 400000),
(153, '13102016-2', 23, 50000),
(154, '13102016-2', 24, 60000),
(155, '13102016-2', 25, 110000),
(156, '13102016-2', 26, 50000),
(157, '13102016-2', 27, 250000),
(158, '13102016-2', 28, 250000),
(159, '13102016-2', 20, 80000),
(160, '19102016-1', 22, 400000),
(161, '19102016-1', 23, 50000),
(162, '19102016-1', 24, 60000),
(163, '19102016-1', 25, 110000),
(164, '19102016-1', 26, 50000),
(165, '19102016-1', 27, 250000),
(166, '19102016-1', 28, 250000),
(167, '19102016-2', 1, 100000),
(168, '19102016-2', 3, 100000),
(169, '19102016-2', 4, 100000),
(170, '22102016-1', 1, 100000),
(171, '22102016-1', 3, 100000),
(172, '22102016-1', 4, 100000),
(173, '22102016-1', 5, 100000),
(174, '22102016-1', 6, 100000),
(175, '22102016-2', 20, 80000),
(176, '22102016-3', 1, 100000),
(177, '22102016-3', 3, 100000),
(178, '22102016-3', 4, 100000),
(179, '22102016-3', 5, 100000),
(180, '22102016-3', 6, 100000),
(181, '22102016-3', 7, 100000),
(182, '22102016-3', 8, 100000),
(183, '22102016-3', 9, 100000),
(184, '22102016-3', 10, 100000),
(185, '22102016-3', 11, 100000),
(186, '22102016-3', 12, 100000),
(187, '22102016-3', 13, 100000),
(188, '22102016-3', 14, 10000),
(189, '22102016-3', 15, 20000),
(190, '22102016-3', 16, 85000),
(191, '22102016-3', 23, 50000),
(192, '22102016-3', 24, 60000),
(193, '22102016-3', 25, 110000),
(194, '22102016-3', 27, 250000),
(195, '22102016-4', 17, 70000),
(196, '22102016-4', 18, 80000),
(197, '22102016-5', 1, 100000),
(198, '22102016-5', 3, 100000),
(199, '22102016-5', 4, 100000),
(200, '22102016-5', 5, 100000),
(201, '31102016-1', 1, 100000),
(202, '31102016-1', 3, 100000),
(203, '31102016-1', 4, 100000),
(204, '31102016-1', 5, 100000),
(205, '09112016-1', 11, 100000),
(206, '09112016-1', 12, 100000),
(207, '09112016-1', 13, 100000),
(208, '09112016-2', 12, 100000),
(209, '09112016-2', 13, 100000),
(212, '21112016-1', 1, 100000),
(213, '21112016-1', 3, 100000),
(214, '29112016-1', 29, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pembayaran`
--

CREATE TABLE `jenis_pembayaran` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL,
  `biaya` int(11) NOT NULL,
  `angkatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pembayaran`
--

INSERT INTO `jenis_pembayaran` (`id_jenis`, `nama_jenis`, `biaya`, `angkatan`) VALUES
(1, 'SPP Januari', 100000, '2016'),
(3, 'SPP Februari', 100000, '2016'),
(4, 'SPP Maret', 100000, '2016'),
(5, 'SPP April', 100000, '2016'),
(6, 'SPP Mei', 100000, '2016'),
(7, 'SPP Juni', 100000, '2016'),
(8, 'SPP Juli', 100000, '2016'),
(9, 'SPP Agustus', 100000, '2016'),
(10, 'SPP September', 100000, '2016'),
(11, 'SPP Oktober', 100000, '2016'),
(12, 'SPP November', 100000, '2016'),
(13, 'SPP Desember', 100000, '2016'),
(14, 'PMI', 10000, '2016'),
(15, 'Qurban', 20000, '2016'),
(16, 'Pendaftaran Ulang', 85000, '2016'),
(17, 'MID SEMESTER GANJIL', 70000, '2016'),
(18, 'SEMESTER GANJIL', 80000, '2016'),
(19, 'MID SEMESTER GENAP', 70000, '2016'),
(20, 'SEMESTER GENAP', 80000, '2016'),
(21, 'UJIAN / UNAS', 350000, '2016'),
(22, 'PERAWATAN SEKOLAH', 400000, '2016'),
(23, 'OSIS', 50000, '2016'),
(24, 'PRAMUKA/PMR', 60000, '2016'),
(25, 'PHBN/PHBA', 110000, '2016'),
(26, 'PERPISAHAN', 50000, '2016'),
(27, 'SERAGAM', 250000, '2016'),
(28, 'PSG / PRAKERIN', 250000, '2016'),
(29, 'SERAGAM', 200000, '2015');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(3, 'Teknik Komputer Jaringan (TKJ)'),
(4, 'Tata Niaga (TN)'),
(5, 'Teknik Kendaraan Ringan (TKR)');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'X'),
(2, 'XI'),
(9, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `no_pembayaran` varchar(30) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `dibayar` int(11) DEFAULT NULL,
  `kembali` int(11) DEFAULT NULL,
  `kelas` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `angkatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`no_pembayaran`, `nis`, `tgl_bayar`, `id_user`, `total`, `dibayar`, `kembali`, `kelas`, `jurusan`, `angkatan`) VALUES
('04092016-1', '9974024117 / 52/52.064', '2016-09-04', 13, 400000, 400000, 0, 'XII', 'Teknik Komputer Jaringan (TKJ)', ''),
('05092016-1', '0003373807 / 104-104.064', '2016-10-13', 13, 100000, 200000, 100000, 'X', 'Teknik Komputer Jaringan (TKJ)', ''),
('09112016-1', '9974516670 / 35/35.064', '2016-11-09', 13, 300000, 300000, 0, 'XII', 'Teknik Komputer Jaringan (TKJ)', ''),
('09112016-2', '9974516433 / 45/45.064', '2016-11-09', 13, 200000, 200000, 0, 'XII', 'Teknik Komputer Jaringan (TKJ)', ''),
('13102016-1', '0000641253 / 40-40.043', '2016-10-13', 13, 2705000, 2750000, 45000, 'X', 'Teknik Kendaraan Ringan (TKR)', ''),
('13102016-2', '0004152866 / 90-90.064', '2016-10-11', 13, 2785000, 2785000, 0, 'X', 'Teknik Komputer Jaringan (TKJ)', ''),
('14082016-1', '9999915927 / 72/72.064', '2016-08-14', 1, 2535000, 2535000, 0, 'XI', 'Teknik Komputer Jaringan (TKJ)', ''),
('17092016-2', '9974024117 / 52/52.064', '2016-09-21', 13, 815000, 815000, 0, 'XII', 'Teknik Komputer Jaringan (TKJ)', ''),
('18082016-1', '9999915927 / 72/72.064', '2016-08-18', 11, 350000, 400000, 50000, 'XI', 'Teknik Komputer Jaringan (TKJ)', ''),
('19102016-1', '9998313570 / 89-89.064', '2016-10-19', 13, 1170000, 1170000, 0, 'X', 'Teknik Komputer Jaringan (TKJ)', ''),
('19102016-2', '9998313570 / 89-89.064', '2016-10-19', 13, 300000, 300000, 0, 'X', 'Teknik Komputer Jaringan (TKJ)', ''),
('20082016-1', '9999842856 / 3310/371.104', '2016-08-20', 11, 1200000, 1200000, 0, 'XI', 'Tata Niaga (TN)', ''),
('21082016-1', '9974516670 / 35/35.064', '2016-08-21', 11, 1785000, 1800000, 15000, 'XII', 'Teknik Komputer Jaringan (TKJ)', ''),
('21082016-2', '9974614827 / 54/54.064', '2016-08-21', 11, 985000, 1000000, 15000, 'XII', 'Teknik Komputer Jaringan (TKJ)', ''),
('21082016-3', '9974516670 / 35/35.064', '2016-08-21', 11, 500000, 500000, 0, 'XII', 'Teknik Komputer Jaringan (TKJ)', ''),
('21112016-1', '9999842856 / 3310/371.104', '2016-11-21', 14, 200000, 200000, 0, 'XI', 'Tata Niaga (TN)', '2016'),
('22082016-1', '9974024117 / 52/52.064', '2016-08-22', 13, 100000, 200000, 100000, 'XII', 'Teknik Komputer Jaringan (TKJ)', ''),
('22102016-1', '0003374038 / 97-97.064', '2016-10-22', 13, 500000, 500000, 0, 'X', 'Teknik Komputer Jaringan (TKJ)', ''),
('22102016-2', '0000641253 / 40-40.043', '2016-10-22', 13, 80000, 80000, 0, 'X', 'Teknik Kendaraan Ringan (TKR)', ''),
('22102016-3', '0003374071 / 3372-433.104', '2016-10-22', 13, 1785000, 1785000, 0, 'X', 'Tata Niaga (TN)', ''),
('22102016-4', '0003374071 / 3372-433.104', '2016-10-22', 13, 150000, 150000, 0, 'X', 'Tata Niaga (TN)', ''),
('22102016-5', '0003453771 / 3370-431.104', '2016-07-31', 13, 400000, 400000, 0, 'X', 'Tata Niaga (TN)', ''),
('24082016-1', '9974404953 / 51/51.064', '2016-08-24', 13, 200000, 200000, 0, 'XII', 'Teknik Komputer Jaringan (TKJ)', ''),
('29112016-1', '9998313570 / 89-89.064', '2016-11-29', 14, 200000, 200000, 0, 'X', 'Teknik Komputer Jaringan (TKJ)', '2015'),
('31082016-1', '0003252675 / 3366-427.104', '2016-08-31', 13, 2235000, 2235000, 0, 'X', 'Tata Niaga (TN)', ''),
('31102016-1', '9974516433 / 45/45.064', '2016-10-31', 13, 400000, 400000, 0, 'XII', 'Teknik Komputer Jaringan (TKJ)', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` longtext NOT NULL,
  `gambar` varchar(50) NOT NULL DEFAULT 'kosong.jpg',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `tgl`, `judul`, `isi`, `gambar`, `id_user`) VALUES
(1, '2016-08-11 17:43:10', 'Pembayaran PRAKERIN 2016', '<p>Mohon untuk segera melakukan pembayara PRAKERIN untuk siswa kelas XI semua jurusan. Terimakasih (Keuangan)</p>\r\n', 'unnamed.jpg', 5),
(3, '2016-08-11 17:42:54', 'Pembayaran Perpisahan', '<p>pengumuman khusus untuk kelas XII semua jurusan untuk segera melunasi keuangan perpisahan (wisuda).&nbsp;</p>\r\n\r\n<p>batas akhir pembayaran 20 juni 2016. terimakasih ( Keuangan)</p>\r\n', 'unnamed.jpg', 5),
(6, '2016-08-11 17:42:40', 'Pembayaran Daftar Ulang', '<p>Batas akhir pembayaran daftar ulang 18 juli 2016&nbsp;untuk siswa&nbsp;kelas XII TKJ dan XII TN&nbsp;</p>\r\n', 'unnamed.jpg', 5),
(10, '2016-08-11 17:42:23', 'Pembayaran semester ganjil', '<p>Mohon untuk segera melunasi keuangan ujian semester ganjil untuk siswa kelas X, XI, dan XII semua jurusan sebelum pelaksanaan ujian.&nbsp;</p>\r\n\r\n<p>(Keuangan)</p>\r\n', 'unnamed.jpg', 5),
(11, '2016-08-11 21:04:55', 'SPP 2016', '<p>Mohon segera melakukan pelunasan SPP untuk kelas XI TKR, XI TK dan XI TN sebelum pelaksaan PRAKERIN dimulai.</p>\r\n\r\n<p>&nbsp;silahkan melakukan pengecekan daftar tunggakan tiap siswa pada SIAKES masing-masing. (Keuangan)</p>\r\n', 'unnamed.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(30) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nama_wali` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `password` varchar(33) NOT NULL,
  `pp` varchar(100) NOT NULL DEFAULT 'kosong.jpg',
  `id_jurusan` int(11) NOT NULL,
  `status` enum('aktif','non aktif') NOT NULL DEFAULT 'aktif',
  `tahun_masuk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `id_kelas`, `nama`, `alamat`, `nama_wali`, `no_telp`, `password`, `pp`, `id_jurusan`, `status`, `tahun_masuk`) VALUES
('0000641253 / 40-40.043', 9, 'RIKI DWI SAPUTRO', 'Blitar', 'Iskak A', '081234450670', '12345', 'kosong.jpg', 5, 'aktif', ''),
('0003252675 / 3366-427.104', 1, 'MILLENIA SANDRA MULTIVISARI', 'Blitar', 'Ahmad Sodri', '085336890302', '12345', 'kosong.jpg', 4, 'aktif', ''),
('0003373807 / 104-104.064', 1, 'Lilik Lusi Oktaviani', 'Blitar', 'sudarsono', '081980345875', '12345', 'kosong.jpg', 3, 'aktif', ''),
('0003373808 / 105-105.064', 1, 'Luluk Llisa Oktaviana', 'Surabaya', 'Agus Sumarno', '085335679031', '12345', 'kosong.jpg', 3, 'aktif', ''),
('0003374038 / 97-97.064', 1, 'Dinda Widya Ningrum', 'Blitar', 'Harianto', '081336097834', '12345', 'kosong.jpg', 3, 'aktif', ''),
('0003374071 / 3372-433.104', 1, 'PIPIT NOFITA', 'Blitar', 'Ramdan Suhardi', '087775890320', '12345', 'kosong.jpg', 4, 'aktif', ''),
('0003453764 / 3357-418.104', 1, 'EKA MEY LINDA', 'Blitar', 'Sugono', '082343760934', '12345', 'kosong.jpg', 4, 'aktif', ''),
('0003453771 / 3370-431.104', 1, 'NOVI WINDI ANGGRAENI', 'Blitar', 'Ahmad sholikin', '081233570340', '12345', 'kosong.jpg', 4, 'aktif', ''),
('0003454997 / 3373-434.104', 1, 'PUTRI APRILIA', 'Blitar', 'Sugeng susono', '087756340200', '12345', 'kosong.jpg', 4, 'aktif', ''),
('0003503961 / 103-103.064', 1, 'Kristina Ayu wulandari', 'Blitar', 'Edi Sasmito', '085987345320', '12345', 'kosong.jpg', 3, 'aktif', ''),
('0003509160 / 26-26.043', 1, 'FERRY KRISDIANTO', 'Blitar', 'Sugito', '081243500234', '12345', 'kosong.jpg', 5, 'aktif', ''),
('0004151592 / 98-98.064', 1, 'Elsa Sulisetyo Ningsih', 'Blitar', 'sujono', '085855043970', '12345', 'kosong.jpg', 3, 'aktif', ''),
('0004152866 / 90-90.064', 1, 'Ahmad Dani', 'Malang', 'Toni', '085647214345', '12345', 'Cristiano-Ronaldo-and-Ricardo-Kaka-Real-Madrid-01.jpg', 3, 'aktif', ''),
('0004152867 / 3375-436.104', 1, 'RIANA TRIASIH', 'Blitar', 'Imron Hadi', '085555780390', '12345', 'kosong.jpg', 4, 'aktif', ''),
('0004457700 / 39-39.043', 1, 'RIDKY SAHPUTRA', 'Blitar', 'Dodik H', '085344589012', '12345', 'kosong.jpg', 5, 'aktif', ''),
('0004789973 / 96-96.064', 1, 'Deni Maulanaambari', 'Blitar', 'sumarsono', '085755690321', '12345', 'kosong.jpg', 3, 'aktif', ''),
('0004919919 / 32-32.043', 1, 'IRWAN ADI SAPUTRA', 'Blitar', 'Hadi s', '089786905432', '12345', 'kosong.jpg', 5, 'aktif', ''),
('0005449985 / 3379-440.104', 1, 'SITI AISYAH', 'Blitar', 'Rohman ', '089654900234', '12345', 'kosong.jpg', 4, 'aktif', ''),
('0005485243 / 28-28.043', 1, 'HENDIS RANHA', 'Blitar', 'Kusno', '081245890300', '12345', 'kosong.jpg', 5, 'aktif', ''),
('0005665179 / 92-92.064', 1, 'Ajeng Galuh Pramesti', 'Blitar', 'Ganjar wijanarko', '083337890345', '12345', 'kosong.jpg', 3, 'aktif', ''),
('0005743486 / 22-22.043', 1, 'ADITYA FEBRIANTO', 'Blitar', 'Suwadi', '081234704572', '12345', 'kosong.jpg', 5, 'aktif', ''),
('0005989051 / 95-95.064', 1, 'Ayu Wulandari', 'Blitar', 'Hartono', '0341234578', '12345', 'kosong.jpg', 3, 'aktif', ''),
('0006684582 / 3376-437.104', 1, 'RINDI ANTIKA', 'Blitar', 'Jarwato', '085320430221', '12345', 'kosong.jpg', 4, 'aktif', ''),
('0007113359 / 102-102.064', 1, 'Intan Sindy Chornelya', 'Blitar', 'Suhendri', '085945670245', '12345', 'kosong.jpg', 3, 'aktif', ''),
('0007172229 / 30-30.043', 1, 'HENGKI DADANG K', 'Blitar', 'Meseman', '085774230100', '12345', 'kosong.jpg', 5, 'aktif', ''),
('0007228353 / 93-93.064', 1, 'Alimatul Farida', 'Kesamben', 'Budi warsono', '081334604780', '12345', 'kosong.jpg', 3, 'aktif', ''),
('0007807676 / 25-25.043', 1, 'ERI FREDI MAHYUDI', 'Blitar', 'Cahyono Adi', '081443800765', '12345', 'kosong.jpg', 5, 'aktif', ''),
('0008127327 / 3358-419.104', 1, 'EKA SAPTA MARGALUN TTIYAS', 'Blitar', 'Hamdan Asrori', '081343786092', '12345', 'kosong.jpg', 4, 'aktif', ''),
('0008127327 / 3359-420.104', 1, 'ENI FITRIANA', 'Blitar', 'Sempu Edi', '087347640975', '12345', 'kosong.jpg', 4, 'aktif', ''),
('0008323956 / 27-27.043', 1, 'GANA ARISKA', 'Blitar', 'Basuki R', '081234900400', '12345', 'kosong.jpg', 5, 'aktif', ''),
('0008466417 / 34-34.043', 1, 'MOH ROSULI', 'Blitar', 'Ali Husron', '081334890200', '12345', 'kosong.jpg', 5, 'aktif', ''),
('0008888069 / 3384-445.104', 1, 'WINDY INDRIA LESTARI', 'Blitar', 'Bejo', '087977400300', '12345', 'kosong.jpg', 4, 'aktif', ''),
('0009075336 / 108-108.064', 1, 'Radin Raedi Rofii', 'Blitar', 'Budi Suswanto', '085387456092', '12345', 'kosong.jpg', 3, 'aktif', ''),
('0009218943 / 23-23.043', 1, 'ANDRI DIAN PANGESTU', 'Blitar', 'Suwardi', '081233098675', '12345', 'kosong.jpg', 5, 'aktif', ''),
('0009265044 / 91-91.064', 1, 'Aisyah Eka Wardani', 'Malang', 'Eka Suprapta', '0876543903467', '12345', 'kosong.jpg', 3, 'aktif', ''),
('0009294097 / 3385-446.104', 1, 'YUSVIN BINA PRIHATIN', 'Blitar', 'Zaeni', '087489012340', '12345', 'kosong.jpg', 4, 'aktif', ''),
('0009575627 / 3356-417.104', 1, 'DITA AYU NINGTYAS', 'Blitar', 'Sarmidi', '087456890112', '12345', 'kosong.jpg', 4, 'aktif', ''),
('0012694015 / 3365-426.104', 1, 'MAGHADIA PUTRI ARIYA SUSANTI', 'Blitar', 'Ari Santoso', '0853448799034', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9974024117 / 52/52.064', 9, 'Saiful Arifin', 'Blitar', 'Alinudin', '082345780456', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9974404953 / 51/51.064', 9, 'Risky Armiadi Putra', 'Blitar', 'Sugeng Santoso', '085342790476', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9974516433 / 45/45.064', 9, 'Mety Rahayuningtyas', 'Surabaya', 'David Purnomo', '08934578965', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9974516670 / 35/35.064', 9, 'Eva Yunita', 'Blitar', 'Sunarno', '095234780956', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9974614827 / 54/54.064', 9, 'Sepdiana Dwi Lestari', 'Blitar', 'Sugeng Hendarso', '085234674907', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9974614842 / 40/40.064', 9, 'Jerri Eka Prabowo', 'Blitar', 'Jarwoto', '08345890762', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9974614951 / 31/31.064', 9, 'Ella Novita Sari', 'Blitar', 'Supeno', '087645234690', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9974724975 / 3324/385.104', 2, 'IKA YULIANTI', 'Blitar', 'Totok N', '087775690212', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9975078566 / 38/38.064', 9, 'Hadi Purna Irawan', 'Blitar', 'Purnomo', '08934567890', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9975543017 / 61/61.064', 2, 'Aditya Prabandaru', 'Malang', 'Ibnu', '089456784321', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9976175577 / 58/58.064', 9, 'Wahyu Setiawan', 'Blitar', 'Sadeli', '081234787645', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9976175579 / 36/36.064', 9, 'Feri Harianto', 'Blitar', 'Heri Susono', '081234679043', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9978506126 / 49/49.064', 9, 'Restu Wicaksana', 'Blitar', 'Hadi Yuwono', '085342897165', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9979934865 / 27/27.064', 9, 'Ahmad Khozin Asrori', 'Malang', 'Ida', '087775908765', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9980987852 / 3323/384.104', 2, 'IKA ERPIANA', 'Blitar', 'Slamet Rinto', '081234890765', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9980987878 / 3330/391.104', 2, 'LUSIANA', 'Blitar', 'cipto Adi', '089775432100', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9982224715 / 88/88.064', 2, 'VALENTINUS ELTIKA YANA VANDUA', 'Blitar', 'Slamet', '087345690123', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9982648242 / 59/59.064', 9, 'Widya Niken Agustin', 'Blitar', 'Giono Pramto', '082344678901', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9984137319 / 3328/389.104', 2, 'JOKO RESCHIE YULIANTORO', 'Blitar', 'Antoro Adi', '085775391230', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9984203222 / 3368-429.104', 1, 'NOFIA SUTRIANA', 'Blitar', 'Hendarsono', '081233900430', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9984432857 / 48/48.064', 9, 'Rahmawati', 'Blitar', 'lasmin', '082345780765', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9984432944 / 31-31.043', 1, 'IRFAN DIKI WAHYUDI', 'Blitar', 'Wahyudi', '081345899009', '12345', 'kosong.jpg', 5, 'aktif', ''),
('9984433107 / 37/37.064', 9, 'Fitri Anggraeni', 'Blitar', 'Herlambang', '089648723578', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9984433122 / 3308/369.104', 2, 'AJENG WULANSARI', 'Blitar', 'Basri', '081334087568', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9984433127 / 3327/388.104', 2, 'IRAYATI', 'Blitar', 'juni Surono', '081234908357', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9984433129 / 46/46.064', 9, 'Nadya Veronica', 'Blitar', 'Hari susono', '08523456891', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9984433152 / 73/73.064', 2, 'Kesi Nurhidayah', 'Blitar', 'Darsono', '085342567429', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9984433182 / 57/57.064', 9, 'Tuntas Krido Saputro', 'Blitar', 'Kaseno', '089765432890', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9984433306 / 38-38.043', 1, 'NURYANTO', 'Blitar', 'Poniman', '081334590245', '12345', 'kosong.jpg', 5, 'aktif', ''),
('9984519198 / 33/33.064', 9, 'Erga Febriawan', 'Blitar', 'Hardianto', '085755904589', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9984519199 / 3318/379.104', 2, 'FEBRIANA', 'Blitar', 'Hamdani', '081678900543', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9984519204 / 3329/390.104', 2, 'LUPIYATI', 'Blitar', 'Darto', '0812348009444', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9984869787 / 41/41.064', 9, 'Kevin Wahyu Irfanda', 'Blitar', 'Fuadin', '085478901983', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9985179886 / 43/43.064', 9, 'Maria Dwi Suryaning Tyas', 'Blitar', 'Daman', '089389234768', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9985191102 / 3367-428.104', 1, 'MUSLIKAH', 'Blitar', 'Andrianto', '081234589003', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9985421527 / 3322/383.104', 2, 'HASTUPA RUDIANA', 'Blitar', 'Rudi S', '089765434000', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9985517630 / 35-35.043', 1, 'MUHAMMAD BAGAS ADITIONO', 'Blitar', 'Joko Susono', '085775342140', '12345', 'kosong.jpg', 5, 'aktif', ''),
('9985909168 / 3265/326.104', 9, 'Aditiya Eka Permadi', 'Blitar', 'Permadi', '089778957900282', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9986216671 / 3266/327.104', 9, 'Aisah Siti Nur Fauliyah', 'Blitar', 'Nur Hamdan', '081334780340', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9986438253 / 109-109.064', 1, 'Ramdhan Ghazali', 'Blitar', 'sumarno', '081233457980', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9986904842 / 37-37.043', 1, 'NANDA KHRISNA YUDHA', 'Blitar', 'Suwito', '089775801350', '12345', 'kosong.jpg', 5, 'aktif', ''),
('9986946479 / 28/28.064', 9, 'Citra Duwi Mustika', 'Malang', 'Edi', '085334087965', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9987307622 / 60/60.064', 2, 'Aditya Catur Prakoso', 'Malang', 'Bondan', '089345678214', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9987475522 / 47/47.064', 9, 'Omega Sinta Bela', 'Blitar', 'Heri Artanto', '081253760734', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9987475527 / 3263/324.104', 9, 'Adi Prasetyo', 'Blitar', 'Prasetyo Nur', '085755700100', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9987951014 / 3264/325.104', 9, 'Aditian Yulianto', 'Blitar', 'Yanto', '081234780100', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9987990772 / 34/34.064', 9, 'Erika Novita', 'Blitar', 'Aminan', '089456890234', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9987990775 / 56/56.064', 9, 'Tiasih Wahyuni', 'Blitar', 'Jiono', '085437908345', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9988580832 / 3319/380.104', 2, 'FITARIA MIFTAKHUL AFIFAH', 'Blitar', 'Sanusi', '085454700754', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9989306453 / 3311/372.104', 2, 'DESI ROMADHONI NADILA', 'Blitar', 'Udin Ansori', '089345900230', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9989388275 / 3307/368.104', 2, 'AGUNG WICAKSONO', 'Blitar', 'Ganjar S', '087654320980', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9989509822 / 64/64.064', 2, 'Cristian Dwi Hadi Winata', 'Blitar', 'Suprapto', '087345907268', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9989711306 / 29-29.043', 1, 'GILANG CHRISDIANTO', 'Blitar', 'Krisbianto', '089755908345', '12345', 'kosong.jpg', 5, 'aktif', ''),
('9990349569 / 24-24.043', 1, 'DEDIK ARIS SETIAWAN', 'Blitar', 'Suwandi', '085755500380', '12345', 'kosong.jpg', 5, 'aktif', ''),
('9991384817 / 53/53.064', 9, 'Santika', 'Blitar', 'Darsono', '081344897645', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9991486003 / 3371-432.104', 1, 'PANDAN TYASSARI', 'Blitar', 'Suwono', '085335890456', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9991565987 / 107-107.064', 1, 'Novita Panca Rahayu', 'Blitar', 'Suhendro', '085334768904', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9991565997 / 3364-245.105', 1, 'LUPI RAHAYU', 'Blitar', 'Rahmat Rozikin', '085434897600', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9991566065 / 33-33.043', 1, 'JEPRI EKA PUTRA', 'Blitar', 'Burhan Ali', '081334780965', '12345', 'kosong.jpg', 5, 'aktif', ''),
('9992631196 / 3380-441.104', 1, 'SRI WAHYUNI', 'Blitar', 'Boadi', '081234907590', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9993791593 / 62/62.064', 2, 'Alfan Santoso', 'Malang', 'Santoso', '085330894327', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9994111888 / 77/77.064', 2, 'Lulus Solekah', 'Blitar', 'Jodi', '082345679032', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9994450198 / 3362-423.104', 1, 'INDAH PRIHATIN', 'Blitar', 'Rohmat', '081234670954', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9994533680 / 3374-435.104', 1, 'PUTRI RAHAYU', 'Blitar', 'Indramaji', '082344908221', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9994533823 / 3312/373.104', 2, 'DHINI SETYA WULANDARI', 'Blitar', 'Sarno aji', '085344245908', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9994631373 / 3309/370.104', 2, 'AYU DEWI ANDANI', 'Blitar', 'Mochamad Agus', '087967890100', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9994632630 / 74/74.064', 2, 'Kiki Fandelia', 'Blitar', 'Adi Subroto', '081233457893', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9994667673 / 3320/381.104', 2, 'FITRI YULIANA', 'Blitar', 'Syamsyuri', '081245890756', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9994900686 / 3382-443.104', 1, 'VIONA MAULANA GIOVANTI', 'Blitar', 'Agus', '081234900781', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9995194279 / 3316/377.104', 2, 'ELSA CHAERUL AMALIA', 'Blitar', 'Syahroni', '-', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9995227660 / 3326/387.104', 2, 'INTAN RAHMA PUTRI', 'Blitar', 'Baharudin', '0857758805571', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9995351016 / 106-106.064', 1, 'Novella Eka Sariati', 'Blitar', 'Hendrata', '089775890631', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9995351029 / 3361-422.104', 1, 'FRIDA NANDA ARIYANI', 'Blitar', 'Muji', '085342786590', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9996358336 / 3321/382.104', 2, 'HARNIS DIAN KRISTANTI', 'Blitar', 'Widodo', '089765300201', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9996438188 / 3313/374.104', 2, 'DIAH ANIS SUSILOWATI', 'Blitar', 'Tri Armadi', '081233490780', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9996438252 / 100-100.064', 1, 'Idayat Desitasari', 'Blitar', 'Hari Susono', '085555930457', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9996681146 / 3378-439.104', 1, 'SISKA NURULAINI', 'Blitar ', 'Marlan', '081780467090', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9996768493 / 36-36.043', 1, 'MUHAMMAD SYAHRUL MUQINUN AMIN', 'Blitar', 'Roni Hamdana', '081234879640', '12345', 'kosong.jpg', 5, 'aktif', ''),
('9996853321 / 3325/386.104', 2, 'INDRI AYU DIQNA', 'Blitar', 'Erik Suryo', '081443890478', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9997094387 / 70/70.064', 2, 'Fadhilah Chorniatul Hazizah', 'Blitar', 'Hariono', '089767490321', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9997173788 / 75/75.064', 2, 'Laelatul Qomariyah', 'Blitar', 'jono', '089774874321', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9997352686 / 3381-442.104', 1, 'VELICIA AYU PRASETYA', 'Blitar', 'Suratno', '081334890765', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9998313570 / 89-89.064', 1, 'Adi Kurniawan', 'Malang', 'Seto Kurniawan', '085334786359', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9998319350 / 3314/375.104', 2, 'DIAN RAHMAWATI', 'Blitar', 'Jarno', '-', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9998319357 / 3369-430.104', 1, 'NOVA DWI IRFADILLAH', 'Blitar', 'Irfan hadi', '085755890321', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9998326069 / 71/71.064', 2, 'INESTYA DEVI APRILYA', 'Blitar', 'Jarwanto', '085334675097', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9998941346 / 30/30.064', 9, 'Ella Aprilia', 'Malang', 'Jono', '085336098355', '12345', '00-IG-RACHMANINDA.jpg', 3, 'aktif', ''),
('9999110330 / 3360-421.104', 1, 'FENDIKA INEKE PUTRI', 'Blitar', 'Harsono Sakri', '085234580943', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9999110330 / 99-99.064', 1, 'Fany Rudi Nur Santoso', 'Blitar', 'sujatmiko', '089456812457', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9999475511 / 3317/378.104', 2, 'ESTARIKA NANDA RESTINA', 'Blitar', 'Hendrik Nur', '081252340900', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9999619288 / 3377-438.104', 1, 'SEPTI EKA NURYANTI', 'Blitar', 'jasmuji', '085443890021', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9999665065 / 63/63.064', 2, 'Arip Maulana', 'Blitar', 'Sugiono', '089456789032', '12345', 'kosong.jpg', 3, 'aktif', ''),
('9999738620 / 3363-424.104', 1, 'INTAN AGUSTINA AVIRIYANTI', 'Blitar', 'Adi sucipto', '085443875460', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9999789305 / 41-41.043', 1, 'RIZKI SOFYANSYAH', 'Blitar', 'Teguh S', '081334900280', '12345', 'kosong.jpg', 5, 'aktif', '2016'),
('9999842856 / 3310/371.104', 2, 'BELLA ADE NURISTA', 'Blitar', 'Marjuki', '087338908200', '12345', 'kosong.jpg', 4, 'aktif', ''),
('9999915927 / 72/72.064', 2, 'Intan Dwi Puspitasari', 'Blitar', 'Harmadi', '087564321890', '12345', 'kosong.jpg', 3, 'aktif', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(33) NOT NULL,
  `status` enum('aktif','non aktif') NOT NULL,
  `level` enum('admin','tu','bendahara') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `password`, `status`, `level`) VALUES
(1, 'admin', 'Ilham Pradana Putra', '21232f297a57a5a743894a0e4a801fc3', 'aktif', 'admin'),
(5, 'bendahara', 'Noormalita Sari Dewi', '827ccb0eea8a706c4c34a16891f84e7b', 'aktif', 'bendahara'),
(11, 'Tu', 'Tinaksih', 'e10adc3949ba59abbe56e057f20f883e', 'non aktif', 'tu'),
(13, 'Tata Usaha', 'Ananda Ayu', '827ccb0eea8a706c4c34a16891f84e7b', 'aktif', 'tu'),
(14, 'alwi', 'Mochammad Alwi', '86df28556e29bfe0ab2431a6b07c3b01', 'aktif', 'tu'),
(15, 'momod', 'Si Momod', '843083511ae04e98ffae78cae6ca46b9', 'aktif', 'bendahara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_ulang_kenaikan`
--
ALTER TABLE `daftar_ulang_kenaikan`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `no_pembayaran` (`no_pembayaran`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no_pembayaran`),
  ADD KEY `nip` (`nis`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_ulang_kenaikan`
--
ALTER TABLE `daftar_ulang_kenaikan`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;
--
-- AUTO_INCREMENT for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_ulang_kenaikan`
--
ALTER TABLE `daftar_ulang_kenaikan`
  ADD CONSTRAINT `daftar_ulang_kenaikan_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `daftar_ulang_kenaikan_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD CONSTRAINT `detail_pembayaran_ibfk_1` FOREIGN KEY (`no_pembayaran`) REFERENCES `pembayaran` (`no_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pembayaran_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_pembayaran` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
