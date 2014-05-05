-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2014 at 05:33 AM
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
-- Table structure for table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `listorder` smallint(5) unsigned NOT NULL,
  `is_locked` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_forum_forum` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `parent_id`, `title`, `description`, `listorder`, `is_locked`) VALUES
(1, NULL, 'Announcements', 'Announcements', 0, 1),
(2, 1, 'New releases', 'Announcements about new releases', 10, 0),
(3, NULL, 'Support', '', 20, 0),
(4, 3, 'Installation and configuration', 'Problems with installation and/or configuration, incompatibility issues, etc.', 10, 0),
(5, 3, 'Bugs', 'Things not working at all, or not as they should', 20, 0),
(6, 3, 'Missing features', 'Fetures you think should be included in a future release', 0, 0),
(7, 3, 'Supporthaha', 'ini forum baru childnya support', 40, 0);

-- --------------------------------------------------------

--
-- Table structure for table `forumuser`
--

CREATE TABLE IF NOT EXISTS `forumuser` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `siteid` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `signature` text,
  `firstseen` int(10) unsigned NOT NULL,
  `lastseen` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `siteid` (`siteid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `forumuser`
--

INSERT INTO `forumuser` (`id`, `siteid`, `name`, `signature`, `firstseen`, `lastseen`) VALUES
(1, 'admin', 'admin', NULL, 0, 0),
(2, 'demo', 'demo', NULL, 0, 0),
(5, '4', 'hanifnaufal', NULL, 1399110652, 1399111068);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `idpengerjaan`, `idsoal`, `isiJawaban`) VALUES
(6, 6, 1, '0'),
(7, 6, 2, '0'),
(8, 6, 3, '2'),
(9, 6, 11, '0'),
(10, 6, 4, '0'),
(11, 6, 5, '0'),
(12, 8, 14, '0'),
(13, 8, 15, '0'),
(14, 9, 18, '0'),
(15, 9, 19, '0');

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
  `idAdmin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_fk_idx` (`idcategory`),
  KEY `admin_konten_idx` (`idAdmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id`, `idcategory`, `isi`, `judul`, `isPublished`, `idAdmin`) VALUES
(3, 1, '<p>Berdirinya FEUI ditetapkan dengan SK. Menteri Pendidikan dan Kebudayaan No. 360/BPT/1951, dengan hanya satu jurusan yaitu Jurusan Ekonomi Perusahaan. Pada saat itu FEUI memiliki tujuh guru besar: Prof. Mr. Hazairin, Djokosoetono, Prof.Dr. A. Kraal, Prof. Dr. DH. Burger, Prof. Mr. Dr. WGL Lemaire dan Prof. Mr. Dr. WHE Noach. Sebagai hasil pengembangan dan pemindahan Jurusan Sosial Ekonomi dari Fakultas Hukum memiliki 3 jurusan, yaitu Umum, Sosiologi Ekonomi dan Ekonomi Perusahaan.</p>\r\n<p>Pada tahun ini ditandai sebagai dasar terbentuknya Departemen Ilmu Ekonomi yang kita kenal sekarang ini. Pada saat yang sama dibentuk dua bagian yaitu seminar Ekonomi Perusahaan yang dipimpin Oleh Prof. Dr. A. Kraal dan Balai Penyelidikan Ekonomi dan Masyarakat, yang setahun kemudian diubah menjadi Lembaga Penyelidikan Ekonomi dan Masyarakat, dengan ketua pertamanya Prof. Dr. Soemitro. Disamping itu, dibuka pula Perpustakaan Fakultas di Jalan Diponegoro dipimpin oleh Prof. Dr. PL. van der Vilde.</p>\r\n<p>Program studi yang ada di FEUI terdiri dari:</p>\r\n<ul>\r\n<li> Di bawah Koordinasi Departemen</li>\r\n</ul>\r\n<p style="padding-left: 60px;">1. S1 Reguler Ilmu Ekonomi<br />2. S1 Reguler Ilmu Ekonomi Islam<br />3. S2 Ilmu Ekonomi<br />4. Magister Perencanaan dan Kebijakan Publik (MPKP)<br />5. S3 Ilmu Ekonomi</p>\r\n<ul>\r\n<li> Di bawah Koordinasi Departemen Manajemen</li>\r\n</ul>\r\n<p style="padding-left: 60px;">1. S1 Reguler Manajemen<br />2. S1 Ekstensi Manajemen<br />3. S1 Reguler Bisnis Islam<br />4. S2 Ilmu Manajemen<br />5. Magister Manajemen (MM)<br />6. S3 Ilmu Manajemen</p>\r\n<ul>\r\n<li> Di Bawah Koordinasi Departemen Akuntansi</li>\r\n</ul>\r\n<p style="padding-left: 60px;">1. S1 Reguler Akuntansi<br />2. S1 Ekstensi Akuntansi<br />3. Pendidikan Profesi Akuntansi<br />4. S2 Ilmu Akuntansi<br />5. Magister Akuntansi (MAKSI)<br />6. S3 Ilmu Akuntansi</p>\r\n<p>&nbsp;</p>', 'Fakultas Ekonomi', 1, 4),
(4, 1, '', 'Fakultas Ilmu Komputer', 1, 4),
(6, 1, '', 'Fakultas Matematika & Ilmu Pengetahuan Alam', 1, 4),
(7, 1, '', 'Fakultas Kesehatan Masyarakat', 1, 4),
(8, 1, '', 'Fakultas Ilmu Sosial & Ilmu Politik', 1, 4),
(9, 1, '', 'Fakultas Psikologi', 1, 4),
(10, 1, '', 'Fakultas Ilmu Keperawatan', 1, 4),
(11, 1, '', 'Fakultas Farmasi', 1, 4),
(12, 1, '<p>ISI</p>', 'Fakultas Ilmu Pengetahuan Budaya', 1, 4),
(13, 1, '', 'Fakultas Kedokteran', 1, 4),
(14, 1, '', 'Fakultas Kedokteran Gigi', 1, 4),
(15, 1, '', 'Fakultas Hukum', 1, 4),
(16, 2, '', 'SIMAK UI 2014', 1, 4),
(17, 2, '', 'SBNMPTN 2014', 0, 4),
(18, 1, '', 'Vokasi', 1, 4),
(19, 1, '', 'Fakultas Teknik', 1, 4),
(20, 2, '<p style="text-align: justify;">Test aosdjasdjkl alaksjdklajsdlkajs laksdjlkasjd alksdjklasjd alksdjlkasjd alksdjlkasdj alksdjlkasdjk Test aosdjasdjkl alaksjdklajsdlkajs laksdjlkasjd alksdjklasjd alksdjlkasjd alksdjlkasdj alksdjlkasdjk Test aosdjasdjkl alaksjdklajsdlkajs laksdjlkasjd alksdjklasjd alksdjlkasjd alksdjlkasdj alksdjlkasdjk Test aosdjasdjkl alaksjdklajsdlkajs laksdjlkasjd alksdjklasjd alksdjlkasjd alksdjlkasdj alksdjlkasdjk Test aosdjasdjkl alaksjdklajsdlkajs laksdjlkasjd alksdjklasjd alksdjlkasjd alksdjlkasdj alksdjlkasdjk Test aosdjasdjkl alaksjdklajsdlkajs laksdjlkasjd alksdjklasjd alksdjlkasjd alksdjlkasdj alksdjlkasdjk Test aosdjasdjkl alaksjdklajsdlkajs laksdjlkasjd alksdjklasjd alksdjlkasjd alksdjlkasdj alksdjlkasdjk</p>', 'test', 0, 4),
(22, 2, '<p>WASDRCGBML;.''</p>', 'AS', 1, 4),
(24, 1, '<p>123</p>', '123', 0, 4),
(25, 1, '<p>kakaka</p>', 'kakaka', 0, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `opsi`
--

INSERT INTO `opsi` (`id`, `idsoal`, `isJawaban`, `nomor`, `pernyataan`) VALUES
(1, 1, 1, '0', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(2, 1, 0, '1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(3, 1, 0, '2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(4, 1, 0, '3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(5, 1, 0, '4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(6, 2, 1, '0', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(7, 2, 0, '1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(8, 2, 0, '2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(9, 2, 0, '3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(10, 2, 0, '4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(11, 3, 1, '0', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(12, 3, 0, '1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(13, 3, 0, '2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(14, 3, 0, '3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(15, 3, 0, '4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(16, 4, 1, '0', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(17, 4, 0, '1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(18, 4, 0, '2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(19, 4, 0, '3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(20, 4, 0, '4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(21, 5, 1, '0', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(22, 5, 0, '1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(23, 5, 0, '2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(24, 5, 0, '3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(25, 5, 0, '4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(26, 6, 1, '0', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(27, 6, 0, '1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(28, 6, 0, '2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(29, 6, 0, '3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(30, 6, 0, '4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(31, 7, 1, '0', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(32, 7, 0, '1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(33, 7, 0, '2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(34, 7, 0, '3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(35, 7, 0, '4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(36, 8, 1, '0', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(37, 8, 0, '1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(38, 8, 0, '2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(39, 8, 0, '3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(40, 8, 0, '4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(41, 9, 1, '0', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(42, 9, 0, '1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(43, 9, 0, '2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(44, 9, 0, '3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(45, 9, 0, '4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(46, 10, 1, '0', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(47, 10, 0, '1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(48, 10, 0, '2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(49, 10, 0, '3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(50, 10, 0, '4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae '),
(51, 11, 0, '0', 'ini a'),
(52, 11, 0, '1', 'ini b'),
(53, 11, 0, '2', 'ini c'),
(54, 11, 0, '3', 'ini d'),
(55, 11, 0, '4', 'ini e'),
(66, 14, 1, '0', 'a'),
(67, 14, 0, '1', 'b'),
(68, 14, 0, '2', 'c'),
(69, 14, 0, '3', 'd'),
(70, 14, 0, '4', 'e'),
(71, 15, 0, '0', 'a'),
(72, 15, 0, '1', 'b'),
(73, 15, 1, '2', 'c'),
(74, 15, 0, '3', 'd'),
(75, 15, 0, '4', 'e'),
(81, 18, 1, '0', 'a'),
(82, 18, 0, '1', 'b'),
(83, 18, 0, '2', 'c'),
(84, 18, 0, '3', 'd'),
(85, 18, 0, '4', 'e'),
(86, 19, 0, '0', 'a'),
(87, 19, 1, '1', 'b'),
(88, 19, 0, '2', 'c'),
(89, 19, 0, '3', 'd'),
(90, 19, 0, '4', 'e'),
(104, 26, 0, '0', 'qwerty'),
(105, 26, 1, '1', 'qwerty'),
(106, 26, 0, '2', 'qwerty'),
(107, 26, 0, '3', 'qwerty'),
(108, 26, 0, '4', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `pengerjaantryout`
--

CREATE TABLE IF NOT EXISTS `pengerjaantryout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nilai` int(11) DEFAULT NULL,
  `idPengguna` int(11) NOT NULL,
  `idTryout` int(11) NOT NULL,
  `isSubmitted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pengerjaan_pengguna_idx` (`idPengguna`),
  KEY `pengerjaan_tryout_idx` (`idTryout`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pengerjaantryout`
--

INSERT INTO `pengerjaantryout` (`id`, `nilai`, `idPengguna`, `idTryout`, `isSubmitted`) VALUES
(1, 100, 4, 4, 0),
(3, 90, 1, 4, 0),
(4, 85, 2, 4, 0),
(5, 57, 5, 4, 0),
(6, 2, 4, 6, 0),
(7, 3, 4, 7, 0),
(8, 2, 6, 7, 1),
(9, 2, 6, 8, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `email`, `password`, `isAdmin`, `isActive`) VALUES
(1, 'hanif', 'hanif@hanif.com', 'dingdong', 1, 1),
(2, 'user', 'user@user.com', 'user', 0, 0),
(4, 'hanifnaufal', 'hanif@naufal.com', '0d5ae719d9c263ff078793a4f0bf25fd', 1, 1),
(5, 'lala', 'lala@lala.com', '2e3817293fc275dbee74bd71ce6eb056', 0, 0),
(6, 'farah86', 'farah.shafira@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0, 1),
(7, 'daftar', 'arga.padan@ui.ac.id', 'e10adc3949ba59abbe56e057f20f883e', 0, 0),
(8, 'contoh12', 'muhamad.adiyat@ui.ac.id', '827ccb0eea8a706c4c34a16891f84e7b', 0, 0),
(9, 'daftar678', 'aaa@aa.com', '6dcfda78d3e8bc6136fde44ee4bb0362', 0, 0),
(11, 'argapdh', 'argapdh@yahoo.co.id', 'e10adc3949ba59abbe56e057f20f883e', 0, 0),
(12, 'asdfg', 'muhamad.adiyat@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(10) unsigned NOT NULL,
  `thread_id` int(10) unsigned NOT NULL,
  `editor_id` int(10) unsigned DEFAULT NULL,
  `content` text NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `updated` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_post_author` (`author_id`),
  KEY `FK_post_editor` (`editor_id`),
  KEY `FK_post_thread` (`thread_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `author_id`, `thread_id`, `editor_id`, `content`, `created`, `updated`) VALUES
(1, 1, 1, NULL, 'The first release is a fact!', 0, 0),
(2, 2, 2, NULL, 'This obviously can''t be right.', 0, 0),
(3, 2, 3, NULL, 'When posting a new thread, the creation date is set to Jan 1, 1970 01:00:00 AM...', 0, 0),
(4, 2, 3, NULL, 'This should be fixed now!', 2012, 2012),
(5, 2, 3, NULL, 'Oops! Let''s try that again...\r\nThis should be fixed now!', 1349540442, 1349540442),
(6, 2, 4, NULL, 'I believe it shows the the last thread instead...', 1349540563, 1349540563),
(7, 2, 4, NULL, 'Fixed!', 1349561144, 1349561144),
(8, 1, 4, NULL, 'Test reply', 1349563344, 1349563344),
(9, 1, 4, NULL, 'Another test reply, locking thread', 1349563360, 1349563360),
(10, 1, 4, NULL, 'Opps. Locking thread for real now', 1349564868, 1349564868),
(11, 1, 3, NULL, 'Thread locked, maybe', 1349564945, 1349632036),
(12, 1, 5, NULL, 'Allow users to define a signature, and add this to posts by them.', 1349570366, 1349570366),
(13, 1, 6, NULL, 'Add BB code support, and some sort of wysiwyg editor', 1349570413, 1349570413),
(14, 1, 7, NULL, 'Allow attachments to be added to posts\r\n\r\nSome *examples* of **markup**\r\n\r\ninline use of `code` is possible too!\r\n\r\nLet''s see what a\r\n> blockquote looks like\r\nwithin a pargraph\r\n\r\n    [php showLineNumbers=1]\r\n    echo ''It can highlight code too!'';\r\n', 1349578699, 1349578699);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `fotoUrl` varchar(255) DEFAULT NULL,
  `jenisKelamin` tinyint(1) DEFAULT NULL,
  `idPengguna` int(11) DEFAULT NULL,
  `tanggalLahir` date DEFAULT NULL,
  `targetJurusan` varchar(200) DEFAULT NULL,
  `asalSma` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pengguna_id_idx` (`id`),
  KEY `profil_pengguna_idx` (`idPengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nama`, `fotoUrl`, `jenisKelamin`, `idPengguna`, `tanggalLahir`, `targetJurusan`, `asalSma`) VALUES
(9, 'Muhammad Hanif Naufal', '4.jpeg', 1, 4, '1994-05-05', 'TEKNIKSIPIL', 'SMA N 1 Purwokerto'),
(10, 'Farah S', '6.jpeg', 0, 6, '2014-04-01', 'TEKNIK INDUSTRI', '68'),
(11, 'asdfg', NULL, 1, 12, '1996-01-01', 'TEKNIK ELEKTRO', 'sma mana saja');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `idtryout`, `pertanyaan`, `nomor`) VALUES
(1, 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, quo iusto numquam accusamus cumque ut consectetur dicta? Ad, voluptate cumque voluptas qui iste explicabo earum tenetur ut quae est quisquam?', 1),
(2, 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, quo iusto numquam accusamus cumque ut consectetur dicta? Ad, voluptate cumque voluptas qui iste explicabo earum tenetur ut quae est quisquam?', 2),
(3, 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, quo iusto numquam accusamus cumque ut consectetur dicta? Ad, voluptate cumque voluptas qui iste explicabo earum tenetur ut quae est quisquam?', 3),
(4, 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, quo iusto numquam accusamus cumque ut consectetur dicta? Ad, voluptate cumque voluptas qui iste explicabo earum tenetur ut quae est quisquam?', 4),
(5, 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, quo iusto numquam accusamus cumque ut consectetur dicta? Ad, voluptate cumque voluptas qui iste explicabo earum tenetur ut quae est quisquam?', 5),
(6, 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, quo iusto numquam accusamus cumque ut consectetur dicta? Ad, voluptate cumque voluptas qui iste explicabo earum tenetur ut quae est quisquam?', 6),
(7, 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, quo iusto numquam accusamus cumque ut consectetur dicta? Ad, voluptate cumque voluptas qui iste explicabo earum tenetur ut quae est quisquam?', 7),
(8, 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, quo iusto numquam accusamus cumque ut consectetur dicta? Ad, voluptate cumque voluptas qui iste explicabo earum tenetur ut quae est quisquam?', 8),
(9, 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, quo iusto numquam accusamus cumque ut consectetur dicta? Ad, voluptate cumque voluptas qui iste explicabo earum tenetur ut quae est quisquam?', 9),
(10, 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, quo iusto numquam accusamus cumque ut consectetur dicta? Ad, voluptate cumque voluptas qui iste explicabo earum tenetur ut quae est quisquam?', 10),
(11, 6, 'ini soal tambahan', 11),
(14, 7, '<p>jawaban a</p>', 1),
(15, 7, '<p>ini c</p>', 2),
(18, 8, '<p>jawaban a</p>', 1),
(19, 8, '<p>jawaban b</p>', 2),
(26, 8, '<p>qwerty</p>', 12);

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE IF NOT EXISTS `thread` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `forum_id` int(10) unsigned NOT NULL,
  `subject` varchar(120) NOT NULL,
  `is_sticky` tinyint(1) unsigned NOT NULL,
  `is_locked` tinyint(1) unsigned NOT NULL,
  `view_count` bigint(20) unsigned NOT NULL,
  `created` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_thread_forum` (`forum_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`id`, `forum_id`, `subject`, `is_sticky`, `is_locked`, `view_count`, `created`) VALUES
(1, 2, 'First release', 1, 0, 28, 0),
(2, 5, 'Subject is allowed to be blank when creating a new thread', 0, 0, 4, 0),
(3, 5, 'Post date is not set', 0, 1, 16, 0),
(4, 5, 'Forum view does not show correct last post', 0, 1, 11, 1349540563),
(5, 6, 'User signatures', 0, 0, 1, 1349570366),
(6, 6, 'BB Code', 0, 0, 1, 1349570413),
(7, 5, 'Attachments', 0, 0, 21, 1349578699);

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
  `idAdmin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Tryout_admin_idx` (`idAdmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tryout`
--

INSERT INTO `tryout` (`id`, `waktuMulai`, `durasi`, `tanggal`, `nama`, `idAdmin`) VALUES
(4, '00:00:00', 1, '2014-03-20', 'A', 4),
(6, '13:00:00', 240, '2014-04-08', 'C', 4),
(7, '17:00:00', 1, '2014-04-16', 'D', 4),
(8, '16:35:00', 30, '2014-04-17', 'simak ui 3', 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `FK_forum_forum` FOREIGN KEY (`parent_id`) REFERENCES `forum` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `admin_konten` FOREIGN KEY (`idAdmin`) REFERENCES `pengguna` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `category_fk` FOREIGN KEY (`idcategory`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `opsi`
--
ALTER TABLE `opsi`
  ADD CONSTRAINT `soal_opsi` FOREIGN KEY (`idsoal`) REFERENCES `soal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengerjaantryout`
--
ALTER TABLE `pengerjaantryout`
  ADD CONSTRAINT `pengerjaan_pengguna` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pengerjaan_tryout` FOREIGN KEY (`idTryout`) REFERENCES `tryout` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_post_author` FOREIGN KEY (`author_id`) REFERENCES `forumuser` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_post_editor` FOREIGN KEY (`editor_id`) REFERENCES `forumuser` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_post_thread` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `profil_pengguna` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `tryout_soal` FOREIGN KEY (`idtryout`) REFERENCES `tryout` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thread`
--
ALTER TABLE `thread`
  ADD CONSTRAINT `FK_thread_forum` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tryout`
--
ALTER TABLE `tryout`
  ADD CONSTRAINT `Tryout_admin` FOREIGN KEY (`idAdmin`) REFERENCES `pengguna` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
