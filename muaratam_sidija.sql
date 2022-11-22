-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 11, 2022 at 01:50 PM
-- Server version: 10.3.36-MariaDB-cll-lve
-- PHP Version: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `muaratam_sidija`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `tanggal`, `kegiatan`, `id_siswa`, `keterangan`) VALUES
(1, '2022-11-10', 'APEL PAGI', 7, 'HADIR'),
(2, '2022-11-10', 'APEL PAGI', 7, 'SAKIT');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `keterangan`) VALUES
(5, 'XIIIA - TNU', '');

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `catatan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `piket`
--

CREATE TABLE `piket` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `Keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `prodi`, `keterangan`) VALUES
(5, 'TNU', 'TEKNI NAVIGASI UDARA'),
(6, 'TBU', 'TEKNIK BANDAR UDARA'),
(7, 'MLLU', 'MANAJEMEN LALU LINTAS UDARA'),
(8, 'TPPU', 'TEKNIK PEMELIHARAAN PESAWAT UDARA');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nit` varchar(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` int(1) NOT NULL,
  `prodi` int(1) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nit`, `nama`, `kelas`, `prodi`, `foto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'C1234567890', 'AYNUN', 3, 2, '', '2022-11-10 05:03:31', '2022-11-10 05:03:31', '0000-00-00 00:00:00'),
(8, 'C1012113388', 'ADYTYA CANDRA PUTRA PRIANTAMA', 5, 5, '', '2022-11-10 19:11:48', '2022-11-10 19:11:48', '0000-00-00 00:00:00'),
(9, 'C1012113389', 'AGUNG PRATAMA', 5, 5, '', '2022-11-10 19:12:54', '2022-11-10 19:12:54', '0000-00-00 00:00:00'),
(10, 'C1012113390', 'ALI RIDHO', 5, 5, '', '2022-11-10 19:13:16', '2022-11-10 19:13:16', '0000-00-00 00:00:00'),
(11, 'C1012113391', 'ASNIATI', 5, 5, '', '2022-11-10 19:15:14', '2022-11-10 19:15:14', '0000-00-00 00:00:00'),
(12, 'C1012113392', 'ASTARINA HASTADINATA', 5, 5, '', '2022-11-10 19:21:32', '2022-11-10 19:21:32', '0000-00-00 00:00:00'),
(13, 'C1012113393', 'BAGUS RAHMAT TRIANTONO', 5, 5, '', '2022-11-10 19:22:01', '2022-11-10 19:22:01', '0000-00-00 00:00:00'),
(15, 'C1012113394', 'DEDE EKA FATURROHIM', 5, 5, '', '2022-11-10 19:27:18', '2022-11-10 19:27:18', '0000-00-00 00:00:00'),
(16, 'C1012113395', 'FARAH LU\'LU\' ANISAK', 5, 5, '', '2022-11-10 19:27:41', '2022-11-10 19:27:41', '0000-00-00 00:00:00'),
(17, 'C1012113396', 'FATHU RAHMAN AL-HAER', 5, 5, '', '2022-11-10 19:30:34', '2022-11-10 19:30:34', '0000-00-00 00:00:00'),
(18, 'C1012113397', 'FIKRI ALVIANSAH IBRAHIM', 5, 5, '', '2022-11-10 19:30:57', '2022-11-10 19:30:57', '0000-00-00 00:00:00'),
(19, 'C1012113398', 'GRAISYELDHA ICHAA ARRUUMDAPTA', 5, 5, '', '2022-11-10 19:31:18', '2022-11-10 19:31:18', '0000-00-00 00:00:00'),
(20, 'C1012113399', 'MUH. FADLULLAH SULTAN', 5, 5, '', '2022-11-10 19:31:42', '2022-11-10 19:31:42', '0000-00-00 00:00:00'),
(21, 'C1012113400', 'MUH. TAUFIQ BAKRI', 5, 5, '', '2022-11-10 19:40:05', '2022-11-10 19:40:05', '0000-00-00 00:00:00'),
(22, 'C1012113401', 'MUHAMAD RIZKI FAATIN', 5, 5, '', '2022-11-10 19:40:29', '2022-11-10 19:40:29', '0000-00-00 00:00:00'),
(23, 'C1012113402', 'MUHAMMAD RIFQI', 5, 5, '', '2022-11-10 19:40:49', '2022-11-10 19:40:49', '0000-00-00 00:00:00'),
(24, 'C1012113403', 'NEVIA NISSA CANDRA AYU KUMALA', 5, 5, '', '2022-11-10 19:41:10', '2022-11-10 19:41:10', '0000-00-00 00:00:00'),
(25, 'C1012113404', 'NUR HADHIJAH', 5, 5, '', '2022-11-10 19:41:27', '2022-11-10 19:41:27', '0000-00-00 00:00:00'),
(26, 'C1012113405', 'PUTU INDIRA PRAMESTI CAHYA', 5, 5, '', '2022-11-10 19:41:52', '2022-11-10 19:41:52', '0000-00-00 00:00:00'),
(27, 'C1012113406', 'RAIHAN ATHAYUDHA CANDRABUANA', 5, 5, '', '2022-11-10 19:42:11', '2022-11-10 19:42:11', '0000-00-00 00:00:00'),
(28, 'C1012113407', 'RINASYA WAHYUNING TYAS', 5, 5, '', '2022-11-10 19:42:36', '2022-11-10 19:42:36', '0000-00-00 00:00:00'),
(29, 'C1012113408', 'ROID HELMI MUFLIH RAFII', 5, 5, '', '2022-11-10 19:43:15', '2022-11-10 19:43:15', '0000-00-00 00:00:00'),
(30, 'C1012113409', 'TRI FAIQAH', 5, 5, '', '2022-11-10 19:43:33', '2022-11-10 19:43:33', '0000-00-00 00:00:00'),
(31, 'C1012113410', 'TRIFENA RACHEL SIAHAY ', 5, 5, '', '2022-11-10 19:43:53', '2022-11-10 19:43:53', '0000-00-00 00:00:00'),
(32, 'C1012113411', 'YOGA SETIAWAN', 5, 5, '', '2022-11-10 19:44:12', '2022-11-10 19:44:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_active`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '$2y$10$YqG43bFLAw0F/dUpiy7xZeCS6ROu2.PfdfPbEXCmG8g7lmNKMecs6', 1, 0, '2022-11-04 01:29:29', '2022-11-04 01:29:29', '0000-00-00 00:00:00'),
(2, 'masternoob', '$2y$10$jx57RWBdUTZ/uo19GFkBbe.og1Lb8zntxcI.Kl5AYaA6qEN5FysKW', 1, 1, '2022-11-07 03:41:58', '2022-11-07 03:41:58', '0000-00-00 00:00:00'),
(3, 'admin@fopsdim.com', '$2y$10$Xz6w0tEkw2UXf..1ELeDre69ORpnYYfknOFdKfouDFesFcnKcaWfi', 1, 1, '2022-11-10 02:53:46', '2022-11-10 02:53:46', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `piket`
--
ALTER TABLE `piket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `piket`
--
ALTER TABLE `piket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
