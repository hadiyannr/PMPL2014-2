-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2014 at 04:41 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siapmasukui`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE IF NOT EXISTS `jawaban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpengerjaan` int(11) NOT NULL,
  `idsoal` int(11) NOT NULL,
  `isiJawaban` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jawabaan_pengerjaan_idx` (`idpengerjaan`),
  KEY `soal_jawab_idx` (`idsoal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Injuran'),
(2, 'Berita');

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE IF NOT EXISTS `konten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcategory` int(11) NOT NULL,
  `isi` text,
  `judul` varchar(99) NOT NULL,
  `isPublished` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_fk_idx` (`idcategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id`, `idcategory`, `isi`, `judul`, `isPublished`) VALUES
(1, 1, 'digndong', 'lalalal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `opsi`
--

CREATE TABLE IF NOT EXISTS `opsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsoal` int(11) NOT NULL,
  `isJawaban` tinyint(1) DEFAULT NULL,
  `nomor` varchar(10) NOT NULL,
  `pernyataan` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `soal_opsi_idx` (`idsoal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `opsi`
--

INSERT INTO `opsi` (`id`, `idsoal`, `isJawaban`, `nomor`, `pernyataan`) VALUES
(35, 21, 0, '0', 'a'),
(36, 21, 0, '1', 'b'),
(37, 21, 0, '2', 'c'),
(38, 21, 0, '3', 'd'),
(39, 21, 0, '4', 'e'),
(40, 1, 0, '0', 'lala1'),
(41, 1, 0, '1', 'lala2'),
(42, 1, 0, '2', 'lala3'),
(43, 1, 0, '3', 'lala4'),
(44, 1, 0, '4', 'lala51');

-- --------------------------------------------------------

--
-- Table structure for table `pengerjaantryout`
--

CREATE TABLE IF NOT EXISTS `pengerjaantryout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nilai` varchar(45) DEFAULT NULL,
  `idPengguna` int(11) NOT NULL,
  `idTryout` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pengerjaan_pengguna_idx` (`idPengguna`),
  KEY `pengerjaan_tryout_idx` (`idTryout`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `email`, `password`, `isAdmin`, `isActive`) VALUES
(1, 'hanif', 'hanif@hanif.com', 'dingdong', 1, 1),
(2, 'user', 'user@user.com', 'user', 0, 0),
(4, 'hanifnaufal', 'hanif@naufal.com', '0d5ae719d9c263ff078793a4f0bf25fd', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `fotoUrl` varchar(255) DEFAULT NULL,
  `jenisKelamin` tinyint(1) DEFAULT NULL,
  `idpengguna` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pengguna_id_idx` (`id`),
  KEY `pengguna_id_idx1` (`idpengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idtryout` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `nomor` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idtryout` (`idtryout`,`nomor`),
  UNIQUE KEY `idtryout_2` (`idtryout`,`nomor`),
  KEY `tryout_soal_idx` (`idtryout`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `idtryout`, `pertanyaan`, `nomor`) VALUES
(1, 1, 'ini soal tapi udah diganti\r\n', 1),
(2, 2, 'Ini soal to 2 no 1\r\nudah diedit\r\n', 1),
(21, 1, 'Ini soal dingdong', 2),
(22, 1, 'qwertyui', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tryout`
--

CREATE TABLE IF NOT EXISTS `tryout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `waktuMulai` time NOT NULL,
  `durasi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tryout`
--

INSERT INTO `tryout` (`id`, `waktuMulai`, `durasi`, `tanggal`, `nama`) VALUES
(1, '23:00:00', 120, '0000-00-00', 'DingDong tryout'),
(2, '09:38:00', 1, '2014-03-06', 'Lalala'),
(3, '09:59:00', 120, '2014-03-27', 'Tryout lalalallalal');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawabaan_pengerjaan` FOREIGN KEY (`idpengerjaan`) REFERENCES `pengerjaantryout` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `soal_jawab` FOREIGN KEY (`idsoal`) REFERENCES `soal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `konten`
--
ALTER TABLE `konten`
  ADD CONSTRAINT `category_fk` FOREIGN KEY (`idcategory`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `opsi`
--
ALTER TABLE `opsi`
  ADD CONSTRAINT `soal_opsi` FOREIGN KEY (`idsoal`) REFERENCES `soal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pengerjaantryout`
--
ALTER TABLE `pengerjaantryout`
  ADD CONSTRAINT `pengerjaan_pengguna` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pengerjaan_tryout` FOREIGN KEY (`idTryout`) REFERENCES `tryout` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `pengguna_id` FOREIGN KEY (`idpengguna`) REFERENCES `pengguna` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `tryout_soal` FOREIGN KEY (`idtryout`) REFERENCES `tryout` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
