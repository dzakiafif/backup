-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2016 at 12:17 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `komaltech_bts`
--

-- --------------------------------------------------------

--
-- Table structure for table `documentation`
--

CREATE TABLE IF NOT EXISTS `documentation` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `form_state` varchar(500) NOT NULL,
  `username` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE IF NOT EXISTS `dokumen` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `filename` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `engineer`
--

CREATE TABLE IF NOT EXISTS `engineer` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `form_state` varchar(500) NOT NULL,
  `validate_state` int(11) DEFAULT '0',
  `username` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE IF NOT EXISTS `jawaban` (
  `id` int(15) NOT NULL,
  `jawaban` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(11) NOT NULL,
  `regional` int(11) NOT NULL,
  `poc` varchar(255) NOT NULL,
  `prodef` varchar(255) NOT NULL,
  `site_id` varchar(255) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `tower_id` int(11) NOT NULL,
  `tower_owner` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `fop` int(11) NOT NULL,
  `spv` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `existing_system` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `stats` int(11) NOT NULL,
  `subcont` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `regional`, `poc`, `prodef`, `site_id`, `site_name`, `tower_id`, `tower_owner`, `address`, `fop`, `spv`, `longitude`, `latitude`, `existing_system`, `remark`, `stats`, `subcont`) VALUES
(3, 1, 'MATARAM', 'SW/6971', 'B661', 'B661_SAJAN UTARA LOMTIM', 11, '', 'JL.SELONGKEN RT.02 KEC.SEMBALUN KAB.LOMBOK TIMUR,NTB', 0, '', '116.497184', '-8.316165', 'UL', 'Add 1 Pcs Cab.3900L (900), Add MCB 2x80A', 0, ''),
(4, 1, 'MATARAM', 'SW/6978', 'B660', 'B660_SEMBALUN BUMBUNG', 2, '', 'DSN. RAYA RURUNG TIMUR, RT 01/01 DS SEMBALUN BUMBUNG KEC SEMBALUN KAB LOMBOK TIMUR', 0, '', '116.54498', '-8.387851', 'UL+OL1+OL2+OL3', 'Add 1 Pcs Cab.3900L (900)(1800+1800)(1800), Add MCB 2x80A', 0, ''),
(5, 1, 'MATARAM', 'SW/6980', '2624821', '2624821_SESAIT', 3, '', 'DS SESAIT, KC KAYANGAN, LOMBAR', 1, '', '116.272687', '-8.289557', 'UL+OL1+OL2', 'Add 1 Pcs Cab.3900L (900)(1800+1800), Add 1 Set Semirigid, Add MCB 2x80A', 0, ''),
(6, 1, 'MATARAM', 'SW/6983', '2627', '2627_HUT PAWANG KUNYIT', 4, '', 'DS.BLENCONG RT.02 DSN.MUMBUL SARI', 1, '', '116.33612', '-8.268898', 'UL+OL1', 'Add 1 Pcs Cab.3900L (900)(1800), Add RRU 1800 at existing mounting (back to back), Dismantle Feeder OL1, Add DCDU-12B, Add MCB 4x80A', 0, ''),
(7, 1, 'MATARAM', 'SW/6995', '2637', '2637_HUT BAYAN', 5, '', 'DUSUN SRIMENGANTI, DESA ANYAR, KEC. BAYAN, KAB. LOMBOK BARAT, NTB', 1, '', '116.42521', '-8.2327', 'UL+OL1+OL2', 'Add 1 Pcs Cab.3900L (900)(1800+1800), Add 1 Set Semirigid, Dismantle Feeder OL2, Add MCB 2x80A', 0, ''),
(8, 1, 'MATARAM', 'SW/6996', '262D899', '262D899_LENDANG BAGIAN', 6, '', 'DUSUN SEMBARO, DESA GENGGELAN KC. GANGGA, KB. LOMBOK BARAT, NTB', 1, '', '116.197238', '-8.314215', 'UL+OL1+OL2+3G', 'Add 1 Pcs Cab.3900L (900)(1800+1800), Add 1 Set Semirigid, Dismantle Feeder OL2, Add MCB 2x80A', 0, ''),
(9, 1, 'MATARAM', 'SW/6997', '2624822', '2624822_SANTONG KAYANGAN', 7, '', 'DESA SANTONG, KC. KAYANGAN, KB. LOMBOK BARAT, NTB', 1, '', '116.286877', '-8.317635', 'UL+OL1+OL2', 'Add 1 Pcs Cab.3900L (900)(1800+1800), Add 1 Set Semirigid, Dismantle Feeder OL2, Add MCB 2x80A', 0, ''),
(10, 1, 'MATARAM', 'SW/6999', '262C325', '262C325_GILI INDAH TANJUNG', 8, '', 'DUSUN GILI AIR, DESA GILI INDAH RT. 01 KEC. PEMENANG KAB. LOMBOK UTARA NTB', 1, '', '116.080277', '-8.361991', 'UL+OL1+3G', 'Insert Module UL+OL1 at Cab.3900L (3G), Add MCB 2x80A', 0, ''),
(11, 1, 'MATARAM', 'SW/7000', '2621403', '2621403_GILI TRAWANGAN BEACH', 9, '', 'JL. GILI INDAH, KEC. TANJUNG, KAB. LOMBOK, NTB', 1, '', '116.04049', '-8.356823', 'UL', 'Add 1 Pcs Cab.3900AL (900), Add MCB 2x80A', 2, ''),
(12, 1, 'MATARAM', 'SW/7013', '2624820', '2624820_BENTEK', 10, '', 'JL DUSUN TODO DS BENTEK KC GANGA KB LOMBAR', 1, '', '116.179772', '-8.365582', 'UL+OL1+OL2+3G', 'Add 1 Pcs Cab.3900L (900)(1800+1800), Add 1 Set Semirigid, Dismantle Feeder OL2, Add MCB 2x80A', 0, ''),
(13, 1, 'MATARAM', 'SW/7014', '262D220', '262D220_GILI INDAH', 11, '', 'DUSUN GILI INDAH, KC. PEMENANG, KB. LOMBOK BARAT, NTB', 1, '', '116.058508', '-8.349861', 'UL+OL1+OL2+3G', 'Add 1 Pcs Cab.3900L+Existing Enclosure (900)(1800+1800), Add 1 Set Semirigid, Add MCB 2x80A', 2, ''),
(14, 1, 'MATARAM', 'SW/7016', '2626', '2626_HUT GILI TERAWANGAN', 12, '', 'GILITRAWANGAN ISLAND', 1, '', '116.03622', '-8.356068', 'UL+OL1+OL2+OL3+3G', 'Add 1 Pcs Cab.3900L (900)(1800+1800)(1800), Add 1 Set Semirigid, Add MCB 2x80A', 0, ''),
(15, 1, 'MATARAM', 'SW/6325', '2602', '2602_HUT SENGGIGI', 13, '', 'JL RAYA SENGGIGI -BATU LAYAR - LOMBOK BARAT', 2, '', '116.06218', '-8.515975', 'UL+OL1+3G', 'Add 1 Pcs Cab.3900L (900+1800), Add MCB 2x80A', 0, ''),
(16, 1, 'MATARAM', 'SW/6336', '2622288', '2622288_SENGGIGI LOMBAR', 14, '', 'JL. GURU RUM, DUSUN SENGGIGI, DESA SENGGIGI, KEC. BATULAYAR, KAB. LOMBOK BARAT, NTB', 2, '', '116.04961', '-8.496', 'UL+OL1+OL2+3G', 'Add 1 Pcs Cab.3900L+New Enclosure (900)(1800+1800), Add 1 Set Semirigid, Add MCB 2x80A', 2, ''),
(17, 1, 'MATARAM', 'SW/6337', 'PC853', 'PC853_SHERATON SENGGIGI BEACH RESORT', 15, '', 'JL. RAYA SENGGIGI KM. 8 SENGGIGI LOMBOK', 3, '', '116.04388', '-8.49422', 'OL1', 'Add 1 Pcs Cab.3900A ex-Axis (1800), Add New Recti OHE, Remove IDU from cabinet 2106 to New Recti OHE', 1, ''),
(18, 1, 'MATARAM', 'SW/6339', '262C343', '262C343_BUKIT SENGGIGI ROAD', 16, '', 'BATU BOLON, KEC. BATU LAYAR, KAB. LOMBOK BARAT, NTB', 3, '', '116.057636', '-8.508777', 'UL+OL1+3G', 'Add 1 Pcs Cab.3900L (900+1800), Add MCB 2x80A', 0, ''),
(19, 1, 'MATARAM', 'SW/6340', '2623690', '2623690_BUKIT SENGGIGI UTARA', 17, '', 'DESA SENGGIGI, KEC. BATU LAYAR, KAB. LOMBOK BARAT, NTB (83355)', 2, '', '116.058472', '-8.501722', 'UL+3G', 'Add 1 Pcs Cab.3900AL (900), Add MCB 2x80A', 2, ''),
(20, 1, 'MATARAM', 'SW/6341', '2622269', '2622269_BUKIT SENGIGI UTARA', 18, '', 'JL. RAYA SENGGIGI, DUSUN DUDUK, DESA BATULAYAR BARAT, KEC. BATULAYAR, KAB. LOMBOK BARAT, NTB', 2, '', '116.060639', '-8.51069', 'UL+3G', 'Add 1 Pcs Cab.3900AL (900), Add MCB 2x80A', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `id` int(15) NOT NULL,
  `pertanyaan` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'dito', 'ditolaksono', '$2y$10$NuKhyHU2iGBFhb8/2GEfWuSrrMiSw02CndUy7m2v8.yybxBBbih3u', 0, '2016-04-08 03:27:52', '2016-04-08 03:27:52'),
(6, 'Jimmy Fish', 'jimmyfish', '$2y$10$poVVUdXe1q65M9b0jwZWO.MKPmD.axL1gLt6eM/Y5haDftS.duENu', 1, '2016-04-15 23:40:31', '2016-04-15 23:40:31'),
(11, 'yanna', 'yanna', '$2y$10$Ulc5QhdHP/FZEihw.EheKe4f4pkgRQwXlX7X9W6AZEnHeIVu/xB.m', 3, '2016-05-05 14:42:39', '2016-05-05 14:42:39'),
(12, 'afif', 'afif', '$2y$10$MpGUW4M2Su5LmOiljYhxGe5d3/YUtaZMabMO9YtGzVG8zlzU4gxMC', 2, '2016-05-05 14:51:39', '2016-05-05 14:51:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documentation`
--
ALTER TABLE `documentation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `engineer`
--
ALTER TABLE `engineer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documentation`
--
ALTER TABLE `documentation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `engineer`
--
ALTER TABLE `engineer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
