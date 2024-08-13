-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2024 at 06:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bayukartawan_ukk_rpl_2024`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(9) NOT NULL,
  `nama_mahasiswa` varchar(30) NOT NULL,
  `program_studi` varchar(20) NOT NULL,
  `tahun_masuk` int(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `program_studi`, `tahun_masuk`, `username`, `password`) VALUES
(1, '', '', 0, 'dffsdf', 'asfsa'),
(2, '', '', 0, 'dffsdf', 'asfsa'),
(3, 'bayu', '', 0, 'bayu', '123'),
(5, 'bayu', '', 0, 'wewr', '123'),
(6, 'bayu1211', 'tknik', 2344, 'tutu', '2323'),
(7, 'bayu kartawan', 'teknik informatika', 2020, 'bayu123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_topik`
--

CREATE TABLE `pengajuan_topik` (
  `id_topik` int(34) NOT NULL,
  `nim` int(9) NOT NULL,
  `dosen_pembimbing_utama` varchar(30) NOT NULL,
  `topik_1` varchar(225) NOT NULL,
  `topik_2` varchar(225) NOT NULL,
  `topik_3` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan_topik`
--

INSERT INTO `pengajuan_topik` (`id_topik`, `nim`, `dosen_pembimbing_utama`, `topik_1`, `topik_2`, `topik_3`) VALUES
(1, 3, '', '', '', ''),
(2, 3, '', 'sdgvsdfgdfhdfhghdfgjj', '', ''),
(3, 3, '', 'Masukkan Topik assdfasfaf1', '', ''),
(23, 3, '', 'Masukkan Topik 1', 'Masukkan Topik 2', 'Masukkan Topik 3'),
(24, 6, '', 'Masukkan Topik 1weteqwtwt', 'Masukkan Topik 2wetwtwet', 'Masukkan Topik 3wetwtwt'),
(25, 7, 'contoh', 'Masukkan Topik 1', 'Masukkan Topik 2', 'Masukkan Topik 3');

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `kode_prodi` int(34) NOT NULL,
  `nama_prodi` varchar(34) NOT NULL,
  `nama_koordinator_prodi` varchar(34) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`kode_prodi`, `nama_prodi`, `nama_koordinator_prodi`, `username`, `password`) VALUES
(123, 'yuyu', 'yaya', 'yaya', '123'),
(1235, 'yuyu', 'yaya', 'yiyi', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `pengajuan_topik`
--
ALTER TABLE `pengajuan_topik`
  ADD PRIMARY KEY (`id_topik`),
  ADD KEY `FK_nim` (`nim`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`kode_prodi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `nim` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengajuan_topik`
--
ALTER TABLE `pengajuan_topik`
  MODIFY `id_topik` int(34) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `kode_prodi` int(34) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1236;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengajuan_topik`
--
ALTER TABLE `pengajuan_topik`
  ADD CONSTRAINT `FK_nim` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
