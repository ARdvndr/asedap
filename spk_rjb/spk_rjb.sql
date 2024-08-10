-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2024 at 11:06 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_rjb`
--

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id_kel` int(11) NOT NULL,
  `nama_kel` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk_kel` varchar(10) NOT NULL,
  `alamat_kel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`id_kel`, `nama_kel`, `tgl_lahir`, `jk_kel`, `alamat_kel`) VALUES
(1, 'Ilham', '1980-03-05', 'Laki-Laki', 'Jl. Raya'),
(3, 'Nur', '1983-09-15', 'Perempuan', 'Jl. Depok'),
(4, 'Muh', '1991-01-02', 'Laki-Laki', 'Jl. jl');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kr` varchar(3) NOT NULL,
  `nama_kr` varchar(30) NOT NULL,
  `nilai_bobot` int(2) NOT NULL,
  `jenis_kr` varchar(11) NOT NULL,
  `tipe_kr` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kr`, `nama_kr`, `nilai_bobot`, `jenis_kr`, `tipe_kr`) VALUES
('C01', 'Penghasilan', 20, 'Kualitatif', 'Cost'),
('C02', 'Tanggungan', 30, 'Kualitatif', 'Benefit'),
('C03', 'Pekerjaan', 25, 'Kualitatif', 'Cost'),
('C04', 'Kesehatan', 10, 'Kualitatif', 'Cost'),
('C05', 'Status Rumah', 15, 'Kualitatif', 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `parameter`
--

CREATE TABLE `parameter` (
  `id_parameter` int(11) NOT NULL,
  `nilai_asli` varchar(50) NOT NULL,
  `nilai_parameter` int(11) NOT NULL,
  `id_kr` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parameter`
--

INSERT INTO `parameter` (`id_parameter`, `nilai_asli`, `nilai_parameter`, `id_kr`) VALUES
(1, '1', 1, 'C02'),
(2, '2', 2, 'C02'),
(3, '> 3', 3, 'C02'),
(4, '< 1.000.000', 1, 'C01'),
(5, '1.000.000 - 3.000.000', 2, 'C01'),
(6, '> 3.000.000', 3, 'C01'),
(7, 'Menetep', 5, 'C05'),
(8, 'Sementara', 1, 'C05'),
(9, 'Obat Bebas', 1, 'C04'),
(10, 'Puskesmas', 2, 'C04'),
(11, 'Rumah Sakit', 3, 'C04'),
(12, 'Tidak Bekerja', 1, 'C03'),
(13, 'Wirausaha', 2, 'C03'),
(14, 'Pegawai Negeri Sipil', 3, 'C03');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_kel` int(11) NOT NULL,
  `id_kr` varchar(3) NOT NULL,
  `tgl_sel` date NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_kel`, `id_kr`, `tgl_sel`, `nilai`) VALUES
(16, 1, 'C01', '2021-04-14', 1),
(17, 1, 'C02', '2021-04-14', 2),
(18, 1, 'C03', '2021-04-14', 3),
(19, 1, 'C04', '2021-04-14', 1),
(20, 1, 'C05', '2021-04-14', 5),
(21, 3, 'C01', '2021-04-14', 2),
(22, 3, 'C02', '2021-04-14', 3),
(23, 3, 'C03', '2021-04-14', 1),
(24, 3, 'C04', '2021-04-14', 2),
(25, 3, 'C05', '2021-04-14', 5),
(31, 4, 'C01', '2021-04-14', 3),
(32, 4, 'C02', '2021-04-14', 1),
(33, 4, 'C03', '2021-04-14', 2),
(34, 4, 'C04', '2021-04-14', 3),
(35, 4, 'C05', '2021-04-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id_kel`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kr`);

--
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`id_parameter`),
  ADD KEY `id_kr` (`id_kr`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_kel` (`id_kel`),
  ADD KEY `id_kr` (`id_kr`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id_kel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `id_parameter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_kel`) REFERENCES `keluarga` (`id_kel`),
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_kr`) REFERENCES `kriteria` (`id_kr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
