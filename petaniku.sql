-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2019 at 04:56 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petaniku`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `nama_pemilik` varchar(128) NOT NULL,
  `tempat` varchar(128) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `nama_pemilik`, `tempat`, `harga`, `stok`, `gambar`) VALUES
(1, 'Beras', 'Maman Sudiarta', 'Ciawi, Bogor, Jawa Barat', 9000, 100, 'beras.jpg'),
(2, 'Bawang Merah', 'Didi', 'Cihideung ,Purwakarta, Jawa Barat', 30000, 20, 'bawang_merah.jpg'),
(3, 'Daun Bayam', 'Asep Junaedi', 'Nagreg, Bandung, Jawa Barat', 12000, 30, 'bayam.jpg'),
(4, 'Cabai', 'Eman', 'Cicalengka, Bandung, Jawa Barat', 30000, 70, 'cabai.jpg'),
(5, 'Jagung', 'Rustandi', 'Cipanas, Bogor, Jawa Barat', 11000, 60, 'jagung.jpg'),
(6, 'Kacang Merah', 'Rustandi', 'Cipanas, Bogor, Jawa Barat', 14000, 30, 'kacang_merah.jpg'),
(7, 'Kentang', 'Yusuf', 'Ciawi, Tasikmalaya, Jawa Barat', 10000, 120, 'kentang.jpg'),
(8, 'Kubis', 'Maman Sudiarta', 'Ciawi, Bogor, Jawa Barat', 4000, 150, 'kubis.jpg'),
(9, 'Wortel', 'Jojo', 'Kahuripan, Cilacap, Jawa Tengah', 10000, 100, 'wortel.jpg'),
(10, 'Tomat', 'Momo', 'Cibiru, Sumedang, Jawabarat', 12000, 200, 'tomat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `alamat_tujuan` varchar(255) NOT NULL,
  `harga_total` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_barang`, `id_user`, `jumlah_barang`, `alamat_tujuan`, `harga_total`, `tanggal`, `status`) VALUES
(1, 1, 1, 5, 'Ciawi', 45000, '2019-05-27 04:43:34', 'Belum dibayar'),
(2, 3, 2, 10, 'Sukapancar', 120000, '2019-05-27 04:49:26', 'Belum dibayar'),
(3, 5, 2, 5, 'Bojongkawung', 55000, '2019-05-27 04:52:34', 'Belum dibayar'),
(4, 6, 4, 5, 'Ciawi', 70000, '2019-05-27 06:02:25', 'Belum dibayar'),
(5, 2, 1, 5, 'Ciawi', 150000, '2019-05-27 06:09:55', 'Belum dibayar'),
(6, 3, 1, 5, 'KSDJS', 60000, '2019-05-27 06:15:14', 'Belum dibayar'),
(7, 2, 1, 5, 'Tasik', 150000, '2019-05-27 08:10:01', 'Belum dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Fuji Nugraha', 'fujinugraha16@gmail.com', '$2y$10$npEfajylZsw/1XCYD.CNSekjFwaMCJKN0YlTkGfEF0uOL4Nxlclca'),
(2, 'Salwa Marisa', 'salwamarisa20@gmail.com', '$2y$10$Q5EedxjBalEFWhUPkrIekuWEH5zuuCw/qATpexMBU3uKFfLEgkxi.'),
(3, '', '', '$2y$10$8opCpH60R3zRhhhwyPExj.EUozuBRMPppTSJO/ijnLUHeoMXmCaxC'),
(4, 'Ali Muhamad', 'alimuhammad23@gmail.com', '$2y$10$s3TUcW8vBdn7RhykNpuS4uqs7hMx8ytmt/iD3UDYZr41CxYdGTp.i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
