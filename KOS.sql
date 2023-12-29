-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2022 at 03:23 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_kost` int(11) NOT NULL,
  `judul` varchar(40) NOT NULL,
  `foto_kamar` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `id_kost`, `judul`, `foto_kamar`) VALUES
(4, 2, 'nomer 7', '2224052022162030.jpeg'),
(5, 3, 'nomer 3', '2324052022163334.jpeg'),
(6, 5, 'nomer 4', '2524052022164034.jpg'),
(7, 6, 'nomer 5', '2607062022050203.jpg'),
(11, 13, '10', '91312072022122251.png'),
(12, 14, '2', '101412072022122521.png');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `nomor_kamar` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_pemilik`, `nomor_kamar`, `deskripsi`, `foto`, `status`) VALUES
(3, 2, 5, 'meja, lemari ,ac', '229072022080610.jpg', 1),
(4, 2, 1, 'AC, kamar mandi dalam', '229072022104420.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kost`
--

CREATE TABLE `kost` (
  `id_kost` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tersedia` int(2) NOT NULL,
  `status` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `fasilitas` text NOT NULL,
  `harga_3bulan` int(9) NOT NULL,
  `harga_6bulan` int(9) NOT NULL,
  `harga_pertahun` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kost`
--

INSERT INTO `kost` (`id_kost`, `id_pemilik`, `nama`, `alamat`, `tersedia`, `status`, `fasilitas`, `harga_3bulan`, `harga_6bulan`, `harga_pertahun`) VALUES
(2, 2, 'Galih Ilham Kusuma', 'kp.gandaria kec.tanjungbaru', 2, 'Laki-laki', '1', 1500000, 3000000, 6000000),
(3, 2, 'Khusnul Annisya Mard', 'Kp.rawa kuda kec.jatireja', 3, 'Perempuan', '5', 1800000, 3600000, 7200000),
(5, 2, 'Diki Dermawan', 'Kp.Cikedokan Kec.Durenjaya', 4, 'Laki-laki', 'Kasur ', 2000000, 4000000, 8000000),
(6, 2, 'Suherman Adi Satriyo', 'Kp.Bogelsalam Kec.Duren Jaya Kota Bekasi', 5, 'Laki-laki', 'Non fasilitas', 3000000, 6000000, 12000000),
(11, 2, 'dedi hendra', 'kampung cendol', 7, 'Laki-laki', 'ac, meja', 1500000, 3000000, 6000000),
(12, 9, 'sari suhenra', 'karawang', 7, 'Laki-laki', 'kasur', 1200000, 2400000, 4800000),
(13, 9, 'darma', 'tanah kusir', 10, 'Laki-laki', 'meja\r\nbangku \r\nac', 1000000, 2000000, 3000000),
(14, 10, 'nadi', 'kp kusire', 2, 'Laki-laki', 'meja \r\nbangku', 2000000, 4000000, 6000000),
(17, 2, 'jonathan', 'cikarang', 1, '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `nama`, `alamat`, `telepon`, `email`, `username`, `password`) VALUES
(1, 'kostmamahgalih', 'kp.tanahbaru rt/rw 009/04 desa', '089666782047', 'pemilik@gmail.com', 'pemilik', 'd5a2f6019bea83e7b0df2a541c4200c0'),
(2, 'ikhsan masrdiansyah', 'kp.ceger ', '089666142087', 'ikhsanalfatih46@gmail.com', 'ikhsan mardiansyah', 'd5a2f6019bea83e7b0df2a541c4200c0'),
(6, 'Sugiyanti', 'Kp.Rawa Belong Rt/Rw 003/002 D', '081212191314', 'sugiyanti23@gmail.com', 'sugiyanti2022', '944b2843964a5b336f3c95e410573756'),
(7, 'mamah galih', 'kp.tanah baru rt.09 kec.cikut ', '081212191314', 'ikhsanalfatih46@gmail.com', 'mamahgalih', '936390ac2915cf0ecfed64f6f9489e0f'),
(9, 'deigo', 'lippo cikarang', '0810283123', 'deigo@gmail.com', 'deigo', 'e10adc3949ba59abbe56e057f20f883e'),
(10, 'maya', 'kp jubril', '0897767679', 'maya@gmail.com', 'maya123', '53f3529c89813116de32ba2262593d3a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`),
  ADD KEY `fk_kost` (`id_kost`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_pemilik` (`id_pemilik`);

--
-- Indexes for table `kost`
--
ALTER TABLE `kost`
  ADD PRIMARY KEY (`id_kost`),
  ADD KEY `fk_pemilik` (`id_pemilik`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kost`
--
ALTER TABLE `kost`
  MODIFY `id_kost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galeri`
--
ALTER TABLE `galeri`
  ADD CONSTRAINT `galeri_ibfk_1` FOREIGN KEY (`id_kost`) REFERENCES `kost` (`id_kost`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `pemilik` (`id_pemilik`);

--
-- Constraints for table `kost`
--
ALTER TABLE `kost`
  ADD CONSTRAINT `kost_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `pemilik` (`id_pemilik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
