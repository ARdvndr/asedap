-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 12:44 AM
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
-- Database: `aromacafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` varchar(9) NOT NULL,
  `id_customer` varchar(5) NOT NULL,
  `tanggal` datetime NOT NULL,
  `lama_sewa` varchar(2) NOT NULL,
  `id_tempat` varchar(4) NOT NULL,
  `id_paket` varchar(4) NOT NULL,
  `jml_org` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `bukti_bayar` varchar(100) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_customer`, `tanggal`, `lama_sewa`, `id_tempat`, `id_paket`, `jml_org`, `total`, `tgl_pesan`, `bukti_bayar`, `status`) VALUES
('B00000001', 'C0001', '2021-04-28 13:00:00', '10', 'T001', 'P013', 100, 14000000, '2021-04-17 00:25:09', 'B00000001.jpg', 'Selesai'),
('B00000002', 'C0001', '2021-04-29 07:00:00', '1', 'T001', 'P014', 90, 4900000, '2021-04-17 01:20:42', 'B00000002.jpg', 'Selesai'),
('B00000003', 'C0001', '2021-04-29 10:00:00', '5', 'T003', 'P004', 100, 10500000, '2021-04-17 04:57:11', NULL, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(13) NOT NULL,
  `jkel` enum('L','P') NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `alamat`, `tlp`, `jkel`, `email`, `password`) VALUES
('C0001', 'Apa', 'Jl. ', '08123456789', 'L', 'apa@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `detail_paket`
--

CREATE TABLE `detail_paket` (
  `id_detail` int(11) NOT NULL,
  `id_paket` varchar(4) NOT NULL,
  `id_makanan` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_paket`
--

INSERT INTO `detail_paket` (`id_detail`, `id_paket`, `id_makanan`) VALUES
(31, 'P009', 'M008'),
(32, 'P009', 'M009'),
(33, 'P009', 'M010'),
(34, 'P010', 'M009'),
(35, 'P010', 'M011'),
(36, 'P010', 'M012'),
(37, 'P011', 'M013'),
(38, 'P011', 'M014'),
(39, 'P011', 'M015'),
(40, 'P011', 'M016'),
(41, 'P011', 'M017'),
(42, 'P012', 'M018'),
(43, 'P012', 'M022'),
(44, 'P013', 'M019'),
(45, 'P013', 'M022'),
(46, 'P014', 'M020'),
(47, 'P014', 'M022'),
(48, 'P015', 'M021'),
(49, 'P015', 'M023'),
(50, 'P015', 'M024'),
(51, 'P015', 'M025'),
(52, 'P015', 'M026'),
(53, 'P016', 'M027'),
(54, 'P016', 'M029'),
(55, 'P017', 'M028'),
(56, 'P017', 'M029'),
(57, 'P018', 'M030'),
(58, 'P018', 'M031'),
(59, 'P018', 'M032'),
(60, 'P004', 'M033'),
(61, 'P004', 'M001'),
(62, 'P004', 'M034'),
(63, 'P004', 'M035'),
(64, 'P004', 'M026'),
(65, 'P005', 'M037'),
(66, 'P005', 'M038'),
(67, 'P005', 'M001'),
(68, 'P005', 'M035'),
(69, 'P005', 'M026'),
(70, 'P006', 'M039'),
(71, 'P006', 'M037'),
(72, 'P006', 'M038'),
(73, 'P006', 'M013'),
(74, 'P006', 'M035'),
(75, 'P006', 'M040'),
(76, 'P006', 'M005'),
(77, 'P007', 'M045'),
(78, 'P007', 'M044'),
(79, 'P007', 'M013'),
(80, 'P007', 'M043'),
(81, 'P007', 'M042'),
(82, 'P007', 'M040'),
(83, 'P007', 'M041'),
(84, 'P007', 'M005'),
(85, 'P008', 'M046'),
(86, 'P008', 'M048'),
(87, 'P008', 'M001'),
(88, 'P008', 'M047'),
(89, 'P008', 'M049'),
(90, 'P008', 'M040'),
(91, 'P008', 'M050'),
(92, 'P008', 'M005'),
(93, 'P002', 'M006'),
(94, 'P002', 'M001'),
(95, 'P002', 'M004'),
(96, 'P002', 'M003'),
(97, 'P002', 'M005'),
(98, 'P001', 'M002'),
(99, 'P001', 'M001'),
(100, 'P001', 'M004'),
(101, 'P001', 'M003'),
(102, 'P001', 'M005'),
(103, 'P003', 'M007'),
(104, 'P003', 'M001'),
(105, 'P003', 'M004'),
(106, 'P003', 'M003'),
(107, 'P003', 'M005');

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `id_makanan` varchar(4) NOT NULL,
  `nama_makanan` varchar(40) NOT NULL,
  `jenis_makanan` varchar(10) NOT NULL,
  `foto_makanan` varchar(100) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id_makanan`, `nama_makanan`, `jenis_makanan`, `foto_makanan`) VALUES
('M001', 'Nasi Putih', 'Main', 'NasiPutih.jpeg'),
('M002', 'Ayam Geprek', 'Main', 'AyamGeprek.jpg'),
('M003', 'Lalapan + Sambal', 'Pelengkap', 'Lalapan+Sambal.jpg'),
('M004', 'Tempe + Tahu', 'Main', 'Tempe+Tahu.jpg'),
('M005', 'Mineral Water', 'Minuman', 'MineralWater.jpg'),
('M006', 'Ayam Kremes + Serundeng', 'Main', 'AyamKremes+Serundeng.jpg'),
('M007', 'Ayam BBQ + Ayam Asam Manis', 'Main', 'AyamBBQ+AyamAsamManis.jpg'),
('M008', 'Spaghetti Bolognese', 'Main', 'default.jpg'),
('M009', 'Garden Salad', 'Pelengkap', 'default.jpg'),
('M010', 'Garlic Bread', 'Dessert', 'default.jpg'),
('M011', 'Spaghetti Aglio Olio', 'Main', 'default.jpg'),
('M012', 'Grilled Chicken', 'Main', 'default.jpg'),
('M013', 'Nasi Putih / Nasi Goreng', 'Main', 'default.jpg'),
('M014', 'Roast Beef', 'Main', 'default.jpg'),
('M015', 'BBQ Chicken', 'Main', 'default.jpg'),
('M016', 'Roast Potato', 'Main', 'default.jpg'),
('M017', 'Steamed Vegetable', 'Main', 'default.jpg'),
('M018', 'Hot Dog', 'Main', 'default.jpg'),
('M019', 'Chicken Burger', 'Main', 'default.jpg'),
('M020', 'Beef Burger', 'Main', 'default.jpg'),
('M021', 'Fried Chicken', 'Main', 'default.jpg'),
('M022', 'Potato Salad / French Fries', 'Main', 'default.jpg'),
('M023', 'French Fries / Nasi Putih', 'Main', 'default.jpg'),
('M024', 'Steamed Vegetable (Wortel dan Buncis)', 'Pelengkap', 'default.jpg'),
('M025', 'Brown Gravy', 'Pelengkap', 'default.jpg'),
('M026', 'Ice Tea / Mineral Water', 'Minuman', 'default.jpg'),
('M027', 'Chicken Burrito', 'Main', 'default.jpg'),
('M028', 'Beef Burritos', 'Main', 'default.jpg'),
('M029', 'French Fries', 'Main', 'default.jpg'),
('M030', 'Enchiladas', 'Main', 'default.jpg'),
('M031', 'Mexican Rice', 'Main', 'default.jpg'),
('M032', 'Salad', 'Pelengkap', 'default.jpg'),
('M033', 'Beef Broccoli', 'Main', 'default.jpg'),
('M034', 'Stir Fry', 'Main', 'default.jpg'),
('M035', 'Krupuk Udang', 'Pelengkap', 'default.jpg'),
('M037', 'Beef Black Pepper', 'Main', 'default.jpg'),
('M038', 'Capcay', 'Main', 'default.jpg'),
('M039', 'Ayam Asam Manis', 'Main', 'default.jpg'),
('M040', 'Buah Melon / Semangka', 'Dessert', 'default.jpg'),
('M041', 'Ice Lemon Tea', 'Minuman', 'default.jpg'),
('M042', 'Krupuk', 'Pelengkap', 'default.jpg'),
('M043', 'Sop Ayam', 'Main', 'default.jpg'),
('M044', 'Beef Black Pepper / Teriyaki', 'Main', 'default.jpg'),
('M045', 'Ayam Asam Manis / Rica Rica', 'Main', 'default.jpg'),
('M046', 'Ayam BBQ', 'Main', 'default.jpg'),
('M047', 'Tuna Asam Manis', 'Main', 'default.jpg'),
('M048', 'Karedok', 'Main', 'default.jpg'),
('M049', 'Rica – Rica', 'Pelengkap', 'default.jpg'),
('M050', 'Black Coffee', 'Minuman', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` varchar(4) NOT NULL,
  `jenis_paket` varchar(10) NOT NULL,
  `nama_paket` varchar(20) NOT NULL,
  `harga_paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `jenis_paket`, `nama_paket`, `harga_paket`) VALUES
('P001', 'Indonesian', 'Paket 1', 45000),
('P002', 'Indonesian', 'Paket 2', 45000),
('P003', 'Indonesian', 'Paket 3', 55000),
('P004', 'Indonesian', 'Paket 4', 55000),
('P005', 'Indonesian', 'Paket 5', 55000),
('P006', 'Indonesian', 'Paket 6', 65000),
('P007', 'Indonesian', 'Paket 7', 85000),
('P008', 'Indonesian', 'Paket 8', 95000),
('P009', 'Italian', 'Paket 1', 30000),
('P010', 'Italian', 'Paket 2', 30000),
('P011', 'Italian', 'Paket 3', 95000),
('P012', 'American', 'Paket 1', 35000),
('P013', 'American', 'Paket 2', 40000),
('P014', 'American', 'Paket 3', 45000),
('P015', 'American', 'Paket 4', 45000),
('P016', 'Mexican', 'Paket 1', 25000),
('P017', 'Mexican', 'Paket 2', 30000),
('P018', 'Mexican', 'Paket 3', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE `tempat` (
  `id_tempat` varchar(4) NOT NULL,
  `nama_tempat` varchar(20) NOT NULL,
  `foto_tempat` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempat`
--

INSERT INTO `tempat` (`id_tempat`, `nama_tempat`, `foto_tempat`, `deskripsi`) VALUES
('T001', 'Aula Depan', 'Aula_Depan.jpg', 'Aula yang terdapat di dekat pintu masuk'),
('T002', 'Aula Tengah', 'Aula_Tengah.jpg', 'Aula dengan bar table'),
('T003', 'Aula Belakang', 'Aula_Belakang.jpg', 'Aula yg terletak dibelakang dengan taman');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_tempat` (`id_tempat`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `detail_paket`
--
ALTER TABLE `detail_paket`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_makanan` (`id_makanan`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_paket`
--
ALTER TABLE `detail_paket`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`id_tempat`) REFERENCES `tempat` (`id_tempat`);

--
-- Constraints for table `detail_paket`
--
ALTER TABLE `detail_paket`
  ADD CONSTRAINT `detail_paket_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`),
  ADD CONSTRAINT `detail_paket_ibfk_2` FOREIGN KEY (`id_makanan`) REFERENCES `makanan` (`id_makanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
