-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2019 at 04:43 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warung_kelontong`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'jennie', '$2y$10$NobJ4hVZDHbbjP5Iv.kKNeDfMchYrrxRcx5B96YI5s//Hem3mIft2'),
(3, 'admin', '$2y$10$qgO3vJICWSZVjU7T0Zcvau51fKc8ebCbHxyXMaiNVkqUlB2lKR.wi'),
(4, 'admin2', '$2y$10$VYc2eV7Zbi2QeezertqaPOzuX038xTGTxpqkZRP4i6z7UO9Y6rMzS');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `supply` varchar(100) NOT NULL,
  `harga_beli` int(100) NOT NULL,
  `harga_jual` int(100) NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `jenis`, `supply`, `harga_beli`, `harga_jual`, `jumlah`) VALUES
(6, 'Indomie', 'Makanan', 'Andi ', 2500, 3000, 26),
(7, 'sampurna', 'Rokok', 'Bayu', 22000, 23000, 32),
(8, 'Gula', 'Bahan pokok', 'Ani', 11000, 11500, 11),
(9, 'LeMineral600ml', 'Makanan', 'Ana', 2000, 3000, 19),
(10, 'Aqua', 'Makanan', 'Ani', 3000, 4000, 49),
(11, 'Minyak1liter', 'bahanpokok', 'Ani', 11000, 12000, 60);

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`id`, `username`, `password`) VALUES
(9, 'Serly Ananda', '$2y$10$uiwP.tdu9OzwTDdTQIRIMOaCaTNQAwMtUIbAuzCDQBvf2dnexGJw2'),
(11, 'Sandi Saputra', '$2y$10$CCQ4JvImcjYr/QdYgryc8euoIFaKnCKTwMq9NEiW1lxMEquhtza3C'),
(12, 'Ahahaaha', '$2y$10$ZOUti1jMmZuO6HdWb1X2fuljmmsoInSUEB2w1JcBPHBBiPXQu0gaa'),
(13, 'Kim Jongin', '$2y$10$1gjXrC74zJqYs0EPvQCiD.uELiSe0YNHcTyRqIRdAiBqNNSC4IxnK'),
(14, 'Ana Putri', '$2y$10$f.TZmiVmDSePQkjq2B4jReiQH5WP4/557NpfVGejsKZG5Ubh6P4G6'),
(15, 'Amanda P', '$2y$10$Uw3TcqvWDhvnzcu7aMcHD.2hmniocurRxI4BeOGI8h.JrJoAGJsZe');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(100) NOT NULL,
  `umur` int(10) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jk`, `umur`, `no_hp`, `alamat`) VALUES
(1, 'Amanda P', 'Perempuan', 18, '0812737373845', 'Jl. Merak'),
(2, 'Serly Ananda', 'Perempuan', 35, '082392837412', 'Jl.Mawar'),
(3, 'Kim Jongin', 'Perempuan', 26, '089683928492', 'Jl.Melati'),
(5, 'Sandi Saputra', 'Laki-laki', 45, '081398029384', 'Jl. Merak'),
(6, 'Ana putri', 'Perempuan', 50, '081293839273', 'Jl.Mawar');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `buyer` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga_jual` int(100) NOT NULL,
  `jmlh` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `tanggal`, `buyer`, `nama`, `harga_jual`, `jmlh`, `total`, `ket`) VALUES
(5, '0000-00-00', 'Amanda P', 'Indomie', 3000, 3, 9000, 'Utang'),
(6, '0000-00-00', 'Serly Ananda', 'Gula', 11500, 4, 46000, 'Utang'),
(7, '0000-00-00', 'Serly Ananda', 'sampurna', 23000, 2, 46000, 'Lunas'),
(15, '0000-00-00', 'Sandi Saputra', 'sampurna', 23000, 1, 23000, 'Utang'),
(77, '0000-00-00', 'Amanda P', 'Indomie', 3000, 3, 9000, 'Lunas'),
(79, '0000-00-00', 'Amanda P', 'Indomie', 3000, 3, 9000, 'Lunas'),
(85, '0000-00-00', 'Sandi Saputra', 'Indomie', 3000, 4, 12000, 'Lunas'),
(87, '0000-00-00', 'Serly Ananda', 'Indomie', 3000, 2, 6000, 'Lunas'),
(88, '0000-00-00', 'Ana putri', 'Indomie', 3000, 3, 9000, 'Lunas'),
(89, '0000-00-00', '--Pilih pelanggan--', 'Indomie', 3000, 2, 6000, 'Lunas'),
(90, '0000-00-00', '--Pilih pelanggan--', 'Indomie', 3000, 2, 6000, 'Lunas'),
(91, '0000-00-00', '--Pilih pelanggan--', 'Indomie', 3000, 5, 15000, 'Lunas'),
(99, '2019-03-07', 'Serly Ananda', 'sampurna', 0, 5, 115000, 'Lunas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
