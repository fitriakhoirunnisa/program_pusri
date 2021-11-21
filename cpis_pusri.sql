-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2018 at 02:41 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpis_pusri`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `tgl_update` varchar(12) NOT NULL,
  `text` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `tgl_update`, `text`) VALUES
(4, '11/01', 'tentang seseorang'),
(5, '11/01', 'dan seseorang lainnya'),
(7, '12/01', 'lup'),
(9, '14/01', 'lupi lupi lupi'),
(10, '15/01', 'Pusri 2018'),
(11, '15/01', 'Pusri 2018 (2)'),
(12, '15/01', 'Pusri 2018 (3)'),
(13, '15/01', 'Pusri 2018 (4)'),
(14, '15/01', 'Pusri 2018 (5)'),
(15, '15/01', 'xsxsxsxsx'),
(16, '15/01', 'besok hari libur nasional'),
(17, '15/01', 'harga urea naik 5%'),
(18, '15/01', 'PT. Pupuk Sriwidjaja Palembang terletak di jalan M'),
(19, '15/01', 'Kantor Pusat PT. Pusri terletak di Palembang'),
(20, '15/01', 'Jalan Santai PT. Pupuk Sriwidjaja diadakan hari mi'),
(21, '15/01', 'Jangan pernah menyerah'),
(22, '15/01', 'contoh hari ini presentasi'),
(23, '04/04', 'ghfgfalfgalfgkjfgkfgsjkgfkjgfkafgafjgkfgkfgalkjfgk');

-- --------------------------------------------------------

--
-- Table structure for table `data_eksternal`
--

CREATE TABLE `data_eksternal` (
  `id` int(11) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `tgl_upload` varchar(12) NOT NULL,
  `keterangan` varchar(15) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_eksternal`
--

INSERT INTO `data_eksternal` (`id`, `nama_file`, `tgl_upload`, `keterangan`, `judul`, `deskripsi`) VALUES
(8, '4.pdf', '11-01-2018', 'Kurs Rupiah', 'lup', 'lup'),
(9, '5.pdf', '11-01-2018', 'Inflasi', 'inflasi 2015', 'inflasi 2015'),
(11, '7.pdf', '11-01-2018', 'Harga Gas', 'Harga gas 2018', 'harga gas 2018'),
(12, '8.pdf', '11-01-2018', 'Harga Urea', 'harga Urea 2018', 'harga Urea 2018'),
(13, '13.pdf', '15-01-2018', 'Harga Amonia', 'daks amonia', 'daks amonia');

-- --------------------------------------------------------

--
-- Table structure for table `download_log`
--

CREATE TABLE `download_log` (
  `id_dwnld` int(11) NOT NULL,
  `badge` varchar(10) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `folder` varchar(20) NOT NULL,
  `jenis_file` varchar(25) NOT NULL,
  `tgl_download` varchar(12) NOT NULL,
  `waktu_download` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `download_log`
--

INSERT INTO `download_log` (`id_dwnld`, `badge`, `nama_file`, `folder`, `jenis_file`, `tgl_download`, `waktu_download`) VALUES
(55, '81', '3.pdf', 'KPI', 'Proceeding', '14-01-2018', '20:26:53'),
(56, '81', '5.pdf', 'Data Eksternal', 'Inflasi', '14-01-2018', '20:27:45'),
(57, '81', '11.pdf', 'KPI', 'Evaluasi', '14-01-2018', '20:29:54'),
(58, '81', '1.pdf', 'RJP', 'Proceeding', '15-01-2018', '08:48:30'),
(59, '81', '1.pdf', 'RJP', 'Proceeding', '15-01-2018', '10:12:07'),
(60, '81', '1.pdf', 'RJP', 'Proceeding', '15-01-2018', '10:14:32'),
(61, '81', '1.pdf', 'RJP', 'Proceeding', '15-01-2018', '15:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `kpi`
--

CREATE TABLE `kpi` (
  `id` int(11) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `tgl_upload` varchar(12) NOT NULL,
  `keterangan` varchar(15) NOT NULL,
  `hak_akses` char(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kpi`
--

INSERT INTO `kpi` (`id`, `nama_file`, `tgl_upload`, `keterangan`, `hak_akses`, `judul`, `deskripsi`) VALUES
(8, '3.pdf', '11-01-2018', 'Proceeding', 'Pimpinan', 'kpi 2015', 'kpi 2015'),
(9, '11.pdf', '11-01-2018', 'Evaluasi', 'Pimpinan', 'eval 2018', 'eval 2018');

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE `login_log` (
  `id_login` int(11) NOT NULL,
  `badge` varchar(10) NOT NULL,
  `tgl_login` varchar(12) NOT NULL,
  `waktu_login` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_log`
--

INSERT INTO `login_log` (`id_login`, `badge`, `tgl_login`, `waktu_login`) VALUES
(1, '150706', '09-01-2018', '03:00:45'),
(2, '136', '09-01-2018', '03:23:52'),
(3, '150706', '09-01-2018', '04:43:25'),
(4, '136', '09-01-2018', '05:01:45'),
(5, '150706', '09-01-2018', '07:47:56'),
(6, '136', '09-01-2018', '07:58:51'),
(7, '150706', '09-01-2018', '08:00:25'),
(8, '136', '09-01-2018', '08:01:25'),
(9, '136', '09-01-2018', '20:06:51'),
(10, '150706', '09-01-2018', '20:31:38'),
(11, '150706', '09-01-2018', '20:34:41'),
(12, '150706', '09-01-2018', '02:36:50'),
(13, '81', '10-01-2018', '13:39:08'),
(14, '136', '10-01-2018', '22:30:39'),
(15, '150706', '10-01-2018', '23:55:14'),
(16, '136', '10-01-2018', '00:05:52'),
(17, '150706', '10-01-2018', '00:06:44'),
(18, '136', '10-01-2018', '00:07:40'),
(19, '150706', '11-01-2018', '08:14:29'),
(20, '150706', '11-01-2018', '09:54:24'),
(21, '150706', '11-01-2018', '09:56:49'),
(22, '150706', '11-01-2018', '10:03:16'),
(23, '150706', '11-01-2018', '10:06:32'),
(24, '150706', '11-01-2018', '10:07:21'),
(25, '150706', '11-01-2018', '10:09:17'),
(26, '150706', '11-01-2018', '10:10:51'),
(27, '150706', '11-01-2018', '10:11:47'),
(28, '150706', '11-01-2018', '10:13:08'),
(29, '150706', '11-01-2018', '10:14:18'),
(30, '150706', '11-01-2018', '10:15:11'),
(31, '150706', '11-01-2018', '10:17:05'),
(32, '150706', '11-01-2018', '10:17:51'),
(33, '150706', '11-01-2018', '10:33:15'),
(34, '136', '11-01-2018', '10:57:44'),
(35, '150706', '11-01-2018', '11:34:54'),
(36, '1181', '11-01-2018', '11:38:12'),
(37, '1181', '11-01-2018', '11:47:34'),
(38, '1181', '11-01-2018', '13:39:21'),
(39, '136', '11-01-2018', '13:52:08'),
(40, '1181', '11-01-2018', '13:55:41'),
(41, '136', '11-01-2018', '13:57:13'),
(42, '1181', '11-01-2018', '16:13:32'),
(43, '1181', '11-01-2018', '16:16:14'),
(44, '136', '11-01-2018', '16:17:27'),
(45, '1181', '11-01-2018', '17:42:36'),
(46, '81', '11-01-2018', '19:58:41'),
(47, '1181', '11-01-2018', '20:21:37'),
(48, '81', '11-01-2018', '20:25:39'),
(49, '1181', '11-01-2018', '20:26:58'),
(50, '81', '11-01-2018', '20:28:33'),
(51, '136', '11-01-2018', '20:30:07'),
(52, '81', '11-01-2018', '20:41:21'),
(53, '1181', '11-01-2018', '21:03:44'),
(54, '136', '11-01-2018', '21:36:15'),
(55, '81', '12-01-2018', '08:52:32'),
(56, '1181', '12-01-2018', '11:12:51'),
(57, '1181', '12-01-2018', '14:46:06'),
(58, '1181', '12-01-2018', '14:47:26'),
(59, '136', '12-01-2018', '14:53:47'),
(60, '136', '12-01-2018', '14:55:18'),
(61, '1181', '12-01-2018', '14:55:36'),
(62, '1181', '12-01-2018', '14:56:36'),
(63, '136', '12-01-2018', '14:57:02'),
(64, '1181', '12-01-2018', '15:00:18'),
(65, '136', '12-01-2018', '16:27:50'),
(66, '1181', '12-01-2018', '19:14:39'),
(67, '136', '12-01-2018', '21:15:34'),
(68, '1181', '12-01-2018', '21:41:03'),
(69, '136', '13-01-2018', '07:00:38'),
(70, '1181', '13-01-2018', '08:15:04'),
(71, '1181', '13-01-2018', '11:35:07'),
(72, '136', '13-01-2018', '13:16:11'),
(73, '1181', '13-01-2018', '23:15:18'),
(74, '1181', '14-01-2018', '11:42:47'),
(75, '1181', '14-01-2018', '13:17:17'),
(76, '1181', '14-01-2018', '17:33:20'),
(77, '1181', '14-01-2018', '18:07:13'),
(78, '1181', '14-01-2018', '18:15:13'),
(79, '81', '14-01-2018', '18:18:36'),
(80, '1181', '14-01-2018', '20:31:28'),
(81, '81', '14-01-2018', '21:27:27'),
(82, '1181', '14-01-2018', '22:46:47'),
(83, '81', '15-01-2018', '08:02:40'),
(84, '1181', '15-01-2018', '08:09:25'),
(85, '81', '15-01-2018', '08:32:31'),
(86, '81', '15-01-2018', '09:11:40'),
(87, '81', '15-01-2018', '09:13:05'),
(88, '81', '15-01-2018', '09:27:55'),
(89, '1181', '15-01-2018', '09:33:25'),
(90, '81', '15-01-2018', '09:35:20'),
(91, '81', '15-01-2018', '09:37:07'),
(92, '1181', '15-01-2018', '09:37:48'),
(93, '1181', '15-01-2018', '09:44:08'),
(94, '1181', '15-01-2018', '10:09:04'),
(95, '81', '15-01-2018', '10:09:55'),
(96, '81', '15-01-2018', '10:14:11'),
(97, '1181', '15-01-2018', '10:35:02'),
(98, '81', '15-01-2018', '10:40:25'),
(99, '1181', '15-01-2018', '10:43:18'),
(100, '81', '15-01-2018', '11:23:41'),
(101, '1181', '15-01-2018', '13:26:07'),
(102, '81', '15-01-2018', '14:54:59'),
(103, '1181', '15-01-2018', '14:55:24'),
(104, '81', '15-01-2018', '14:58:29'),
(105, '1181', '15-01-2018', '15:04:04'),
(106, '81', '15-01-2018', '15:11:03'),
(107, '1181', '15-01-2018', '15:28:30'),
(108, '81', '15-01-2018', '15:36:39'),
(109, '1181', '15-01-2018', '02:55:14'),
(110, '81', '15-01-2018', '03:23:31'),
(111, '1181', '15-01-2018', '03:55:22'),
(112, '1181', '08-02-2018', '13:32:37'),
(113, '1181', '04-04-2018', '23:51:47'),
(114, '81', '04-04-2018', '00:00:16'),
(115, '1181', '04-04-2018', '00:45:39'),
(116, '81', '04-04-2018', '01:11:43'),
(117, '81', '05-04-2018', '16:53:30'),
(118, '81', '06-04-2018', '00:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `rjp`
--

CREATE TABLE `rjp` (
  `id` int(11) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `tgl_upload` varchar(12) NOT NULL,
  `keterangan` varchar(15) NOT NULL,
  `hak_akses` char(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rjp`
--

INSERT INTO `rjp` (`id`, `nama_file`, `tgl_upload`, `keterangan`, `hak_akses`, `judul`, `deskripsi`) VALUES
(2, '1.pdf', '14-01-2018', 'Proceeding', 'Karyawan', 'Proceeding 2018', 'Proceeding 2018'),
(5, '12.pdf', '15-01-2018', 'Proceeding', 'Pimpinan', 'proceeding new', 'proceeding new');

-- --------------------------------------------------------

--
-- Table structure for table `rkap`
--

CREATE TABLE `rkap` (
  `id` int(11) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `tgl_upload` varchar(12) NOT NULL,
  `keterangan` varchar(15) NOT NULL,
  `hak_akses` char(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rkap`
--

INSERT INTO `rkap` (`id`, `nama_file`, `tgl_upload`, `keterangan`, `hak_akses`, `judul`, `deskripsi`) VALUES
(1, '3.pdf', '15-01-2018', 'Proceeding', 'Karyawan', 'rkap proceed', 'rkap proc'),
(2, '1.pdf', '15-01-2018', 'Proceeding', 'Pimpinan', 'ef', 'fef'),
(3, '4.pdf', '15-01-2018', 'Proceeding', 'Pimpinan', 'rkap', 'rkap'),
(4, '6.pdf', '04-04-2018', 'Proceeding', 'Pimpinan', 'jsjshskhdksadsjkdgksgd\r\njddshgdshg\r\ndhkdhkdjh\r\ndhd', 'dbjhcbdjcb');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `badge` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`badge`, `password`, `nama`, `jabatan`, `status`) VALUES
('0000', '$2y$10$fttF5iNZgmpLGT.rKoCf8uarZZCu.muVzEonM7rPo7ym/v1xBdPZu', 'midahh', 'Pimpinan', 'Aktif'),
('0136', '$2y$10$B2ErxacXUIN/jNYhhyqMaerjAhvpWxpWAetsJRV7sWVUkxRLotk.S', 'LUPINA SILLIANTA', 'Pimpinan', 'Non Aktif'),
('11', '$2y$10$3Ks1HeJYRbu2Ea6gO9pxueV/iPcHrhbeF3Zn84jiwDy5tpzSVd36C', 'arkanya aku', 'Pimpinan', 'Non Aktif'),
('111', '$2y$10$ObQrttIWO88E1T79MxsYzuMTluOw7R2Y281CSm6oLpT2ICndjrWjq', 'Ve', 'Karyawan', 'Non Aktif'),
('1118', '$2y$10$zMJKgoMYuzPkrHXvYg31SuXkGsdnjsVWS1hwiAyhXQHmecdHw5Tia', 'lupiii', 'Pimpinan', 'Aktif'),
('1181', '$2y$10$FbegPooKNYso3dH5vZTXrewmwRXv.qaVZGPCoyTkurSZs./6HTjsu', 'lupi', 'Admin', 'Aktif'),
('1234566', '$2y$10$i21zn8S6IqzwvmGKfykbv.xCn3.KnEGeozdZOMi.MUsLc2ZA4d.KC', 'sayaa', 'Karyawan', 'Aktif'),
('128', '$2y$10$6OUTb0IGs7t14N9q6vOJ.uMcZwo09RJihZRf43hCthYd4Rjxx39hK', 'mida', 'Pimpinan', 'Non Aktif'),
('1288', '$2y$10$Rq9vBtOEtBP2qa3sFyA9qe/SMyNns5IZpHsoAWVfsasfD0W8pnose', 'Mida', 'Karyawan', 'Aktif'),
('130', '$2y$10$.KuvIrcSNabYqRgtr5Pe8u5ValJ/7UjeKISA3VoAUizmDrZjBjyqu', 'fitria', 'Karyawan', 'Non Aktif'),
('1300', '$2y$10$Ih9vtFLm8PiiSLKe9muLTuHXupIOHdq8e5QNI2v/PD6uj2hfrE8k.', 'Fitria', 'Pimpinan', 'Aktif'),
('136', '$2y$10$IsMWc3FK6SmDMYxwfzShLeZvpZBFde4n2TITOzplCQ94gMwyiy0xW', 'lup', 'Karyawan', 'Non Aktif'),
('161197', '$2y$10$qNT/ZkxBPkr9F8zb7O2UQOnkwwVhw3VBVsSH4U4OCpmW9io1k.yze', 'mid', 'Pimpinan', 'Aktif'),
('18', '$2y$10$Vggg0asINsTTqKvlVnCDTOCTE4y0q3chM/ytxwEOI00vzrzEs3Zdy', 'lup', 'Karyawan', 'Non Aktif'),
('1818', '$2y$10$UBQJTqir2KesFFD9/3utROTv4QMDJ/I/Yj520mAHG6ABjg8sKFz46', 'Lupii', 'Karyawan', 'Aktif'),
('23541', '$2y$10$dC7/qcToSBCcQGqwVq5AQOs5lwotorMKbRu4xR3Fp8ZaHxAtd7FE2', 'sdsadasd', 'Karyawan', 'Aktif'),
('38748692829834012398651938561098356195619823561298', '$2y$10$bPKBzO4Ie1qON0e60hnpMeMaxtBn7VI/bO.qbloIRoxbk8V16y0Py', 'jsdbdfkdsfglfaugfufgreufgurfgurfgufgagfigfuigfufgu', 'Pimpinan', 'Aktif'),
('46326', '$2y$10$Zm3.ac2VIIp9mSqlJNZJBec/LT8gXUOQb5bFYHIsupQcjsicfox36', 'kdfdsfs', 'Pimpinan', 'Aktif'),
('56543', '$2y$10$zGMY2d3p2gv8pmvamuBcVOPyzsl6Jei9.WiClLkRJmtvqNcXp7NB6', 'terserrsh', 'Pimpinan', 'Aktif'),
('8080', '$2y$10$iRdK3xp4lLDHtYUEQg1WzOdK8wkI7x0tRO52e5ynG6G8Tm3rGT9L2', 'Putra', 'Pimpinan', 'Aktif'),
('81', '$2y$10$thMPivBklgknA/0fQ8PZQ.vwp9Pab.AJmErJaCM7dxi4WNvBiU9fG', 'Arka', 'Pimpinan', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_eksternal`
--
ALTER TABLE `data_eksternal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `download_log`
--
ALTER TABLE `download_log`
  ADD PRIMARY KEY (`id_dwnld`);

--
-- Indexes for table `kpi`
--
ALTER TABLE `kpi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_log`
--
ALTER TABLE `login_log`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `rjp`
--
ALTER TABLE `rjp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rkap`
--
ALTER TABLE `rkap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`badge`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `data_eksternal`
--
ALTER TABLE `data_eksternal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `download_log`
--
ALTER TABLE `download_log`
  MODIFY `id_dwnld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `kpi`
--
ALTER TABLE `kpi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `rjp`
--
ALTER TABLE `rjp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rkap`
--
ALTER TABLE `rkap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
