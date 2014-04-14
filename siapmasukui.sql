-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2014 at 02:24 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `idpengerjaan`, `idsoal`, `isiJawaban`) VALUES
(6, 6, 1, '0'),
(7, 6, 2, '0'),
(8, 6, 3, '2'),
(9, 6, 11, '0'),
(10, 6, 4, '0'),
(11, 6, 5, '0');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id`, `idcategory`, `isi`, `judul`, `isPublished`, `idAdmin`) VALUES
(3, 1, '<p>Berdirinya FEUI ditetapkan dengan SK. Menteri Pendidikan dan Kebudayaan No. 360/BPT/1951, dengan hanya satu jurusan yaitu Jurusan Ekonomi Perusahaan. Pada saat itu FEUI memiliki tujuh guru besar: Prof. Mr. Hazairin, Djokosoetono, Prof.Dr. A. Kraal, Prof. Dr. DH. Burger, Prof. Mr. Dr. WGL Lemaire dan Prof. Mr. Dr. WHE Noach. Sebagai hasil pengembangan dan pemindahan Jurusan Sosial Ekonomi dari Fakultas Hukum memiliki 3 jurusan, yaitu Umum, Sosiologi Ekonomi dan Ekonomi Perusahaan.</p>\r\n<p>Pada tahun ini ditandai sebagai dasar terbentuknya Departemen Ilmu Ekonomi yang kita kenal sekarang ini. Pada saat yang sama dibentuk dua bagian yaitu seminar Ekonomi Perusahaan yang dipimpin Oleh Prof. Dr. A. Kraal dan Balai Penyelidikan Ekonomi dan Masyarakat, yang setahun kemudian diubah menjadi Lembaga Penyelidikan Ekonomi dan Masyarakat, dengan ketua pertamanya Prof. Dr. Soemitro. Disamping itu, dibuka pula Perpustakaan Fakultas di Jalan Diponegoro dipimpin oleh Prof. Dr. PL. van der Vilde.</p>\r\n<p>Program studi yang ada di FEUI terdiri dari:</p>\r\n<ul>\r\n<li> Di bawah Koordinasi Departemen</li>\r\n</ul>\r\n<p style="padding-left: 60px;">1. S1 Reguler Ilmu Ekonomi<br />2. S1 Reguler Ilmu Ekonomi Islam<br />3. S2 Ilmu Ekonomi<br />4. Magister Perencanaan dan Kebijakan Publik (MPKP)<br />5. S3 Ilmu Ekonomi</p>\r\n<ul>\r\n<li> Di bawah Koordinasi Departemen Manajemen</li>\r\n</ul>\r\n<p style="padding-left: 60px;">1. S1 Reguler Manajemen<br />2. S1 Ekstensi Manajemen<br />3. S1 Reguler Bisnis Islam<br />4. S2 Ilmu Manajemen<br />5. Magister Manajemen (MM)<br />6. S3 Ilmu Manajemen</p>\r\n<ul>\r\n<li> Di Bawah Koordinasi Departemen Akuntansi</li>\r\n</ul>\r\n<p style="padding-left: 60px;">1. S1 Reguler Akuntansi<br />2. S1 Ekstensi Akuntansi<br />3. Pendidikan Profesi Akuntansi<br />4. S2 Ilmu Akuntansi<br />5. Magister Akuntansi (MAKSI)<br />6. S3 Ilmu Akuntansi</p>\r\n<p>&nbsp;</p>', 'Fakultas Ekonomi', 1, 4),
(4, 1, '<p>Fakultas Ilmu Komputer di Universitas Indonesia tidak dapat dilepaskan dari Pusat Ilmu Komputer Universitas Indonesia. Pada tahun 1972 Rektor Universitas Indonesia mendirikan suatu lembaga baru, yang diberi nama Pusat Ilmu Komputer Universitas Indonesia, dan sebagai Direkturnya ditunjuk Dr. Indro S. Suwandi, yang bertanggung jawab kepada Rektor. Adapun tujuan dari lembaga ini, sesuai dengan namanya, adalah untuk mengembangkan Ilmu Komputer di Indonesia, khususnya di Universitas Indonesia.</p>\r\n<p>Berdasarkan Peraturan Pemerintah No. 5/1980 yang mengatur unit organisasi pengelola fasilitas komputer di perguruan tinggi, maka pada tahun 1985 dibentuk UPT Komputer UI. Namun karena nama PUSILKOM seringkali lebih dikenal, dan ruang gerak kegiatannya jauh lebih luas daripada tugas dan fungsi UPT Komputer, maka nama dan fungsi PUSILKOM tetap dipertahankan.</p>\r\n<p>Pada tanggal 21 Oktober 1993, Fakultas Ilmu Komputer (Fasilkom) UI resmi terbentuk berdasarkan Surat Keputusan Mendikbud no. 0370/O/1993. Fasilkom UI bertekad menjadi institusi pendidikan, penelitian dan pelayanan yang bermutu internasional dalam bidang Ilmu dan Teknologi Komputer. Dengan demikian, sejak tahun 1993 pengelola an Program Studi Ilmu Komputer jenjang S1 dan S2 berpindah dari Pusilkom ke Fasilkom.</p>\r\n<p>Program Studi yang ditawarkan di Fasilkom UI :</p>\r\n<ol>\r\n<li>S1 Ilmu Komputer Reguler</li>\r\n<li>S1 Sistem Informasi Reguler</li>\r\n<li>S1 Ilmu Komputer Paralel</li>\r\n<li>S1 Sistem Informasi Paralel</li>\r\n<li>S1 Ilmu Komputer kelas internasional</li>\r\n<li>S2 Magister Ilmu Komputer</li>\r\n<li>S2 Magister Teknologi Informasi</li>\r\n<li>S3 Ilmu Komputer</li>\r\n</ol>', 'Fakultas Ilmu Komputer', 1, 4),
(6, 1, '', 'Fakultas Matematika & Ilmu Pengetahuan Alam', 1, 4),
(7, 1, '', 'Fakultas Kesehatan Masyarakat', 1, 4),
(8, 1, '', 'Fakultas Ilmu Sosial & Ilmu Politik', 1, 4),
(9, 1, '', 'Fakultas Psikologi', 1, 4),
(10, 1, '', 'Fakultas Ilmu Keperawatan', 1, 4),
(11, 1, '', 'Fakultas Farmasi', 1, 4),
(12, 1, '', 'Fakultas Ilmu Pengetahuan Budaya', 1, 4),
(13, 1, '', 'Fakultas Kedokteran', 1, 4),
(14, 1, '', 'Fakultas Kedokteran Gigi', 1, 4),
(15, 1, '', 'Fakultas Hukum', 1, 4),
(16, 2, '', 'SIMAK UI 2014', 1, 4),
(17, 2, '', 'SBNMPTN 2014', 0, 4),
(18, 1, '', 'Vokasi', 1, 4),
(19, 1, '', 'Fakultas Teknik', 1, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

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
(55, 11, 0, '4', 'ini e');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pengerjaantryout`
--

INSERT INTO `pengerjaantryout` (`id`, `nilai`, `idPengguna`, `idTryout`, `isSubmitted`) VALUES
(1, 100, 4, 4, 0),
(3, 90, 1, 4, 0),
(4, 85, 2, 4, 0),
(5, 57, 5, 4, 0),
(6, NULL, 4, 6, 0),
(7, NULL, 4, 7, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `email`, `password`, `isAdmin`, `isActive`) VALUES
(1, 'hanif', 'hanif@hanif.com', 'dingdong', 1, 1),
(2, 'user', 'user@user.com', 'user', 0, 0),
(4, 'hanifnaufal', 'hanif@naufal.com', '0d5ae719d9c263ff078793a4f0bf25fd', 1, 1),
(5, 'lala', 'lala@lala.com', '2e3817293fc275dbee74bd71ce6eb056', 0, 0),
(6, 'sisyltrg', 'argapdh@gmail.com', '0d5ae719d9c263ff078793a4f0bf25fd', 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nama`, `fotoUrl`, `jenisKelamin`, `idPengguna`, `tanggalLahir`, `targetJurusan`, `asalSma`) VALUES
(9, 'Muhammad Hanif Naufal', '4.jpeg', 1, 4, '1994-05-20', 'AKUNTANSI', 'SMA N 1 Purwokerto');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

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
(11, 6, 'ini soal tambahan', 11);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tryout`
--

INSERT INTO `tryout` (`id`, `waktuMulai`, `durasi`, `tanggal`, `nama`, `idAdmin`) VALUES
(4, '03:33:00', 120, '2014-03-20', 'A', NULL),
(5, '21:00:00', 20, '2014-04-03', 'B', NULL),
(6, '13:00:00', 240, '2014-04-08', 'C', 4),
(7, '00:00:00', 100, '2014-08-08', 'D', NULL);

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
-- Constraints for table `tryout`
--
ALTER TABLE `tryout`
  ADD CONSTRAINT `Tryout_admin` FOREIGN KEY (`idAdmin`) REFERENCES `pengguna` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
