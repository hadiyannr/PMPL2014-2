-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2014 at 04:31 AM
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
  `idPengerjaan` int(11) NOT NULL,
  `idTryout` int(11) NOT NULL,
  `idSoal` int(11) NOT NULL,
  `isiJawaban` tinyint(1) DEFAULT NULL,
  `isTrue` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idPengerjaan`,`idTryout`,`idSoal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `idTryout` int(11) NOT NULL,
  `idSoal` int(11) NOT NULL,
  `idPengerjaan` int(11) NOT NULL,
  `nomor` varchar(5) DEFAULT NULL,
  `isJawaban` tinyint(1) DEFAULT NULL,
  `pernyataan` text NOT NULL,
  PRIMARY KEY (`idTryout`,`idSoal`,`idPengerjaan`),
  KEY `idTryout_idx` (`idTryout`),
  KEY `soal_opsi_idx` (`idTryout`,`idSoal`),
  KEY `pengerjaan_opsi_idx` (`idPengerjaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `fotoUrl` varchar(255) DEFAULT NULL,
  `jenisKelamin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`nama`),
  KEY `pengguna_id_idx` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `idTryout` int(11) NOT NULL,
  `pertanyaan` text,
  `nomor` int(11) NOT NULL,
  PRIMARY KEY (`idTryout`,`nomor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tryout`
--

CREATE TABLE IF NOT EXISTS `tryout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `waktuMulai` varchar(45) DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `konten`
--
ALTER TABLE `konten`
  ADD CONSTRAINT `category_fk` FOREIGN KEY (`idcategory`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `opsi`
--
ALTER TABLE `opsi`
  ADD CONSTRAINT `pengerjaan_opsi` FOREIGN KEY (`idPengerjaan`) REFERENCES `pengerjaantryout` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `soal_opsi` FOREIGN KEY (`idTryout`, `idSoal`) REFERENCES `soal` (`idTryout`, `nomor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `pengguna_id` FOREIGN KEY (`id`) REFERENCES `pengguna` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `tryout_id` FOREIGN KEY (`idTryout`) REFERENCES `tryout` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
