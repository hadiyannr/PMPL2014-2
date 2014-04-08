-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2014 at 12:52 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id`, `idcategory`, `isi`, `judul`, `isPublished`, `idAdmin`) VALUES
(1, 1, '<p>Ini konten</p>\r\n<p>Coba kontennya diisi dums..<br />coba lorem deh..</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptatibus, a, quod accusamus nemo dicta laborum vitae rerum ipsum quaerat earum reiciendis aut nulla quo asperiores voluptates nihil labore veniam!<br />Culpa, earum, ab laborum doloremque odio facere et labore reiciendis eius odit accusantium delectus perspiciatis laudantium tempora in voluptas quas saepe accusamus sit error! Aliquam odio unde eveniet explicabo repellat!<br />Doloribus, voluptatum, molestias, magni hic a harum reprehenderit ut repellat velit facere quaerat omnis ea tempore! Accusantium, deserunt, quos praesentium eligendi temporibus molestiae quibusdam eaque beatae atque libero id maxime!<br />Impedit, qui, voluptas, distinctio quam soluta ullam natus perferendis alias praesentium iure recusandae commodi temporibus veritatis cupiditate laudantium maiores error voluptate atque aliquam ad doloremque veniam nesciunt dolores odit dignissimos!<br />Minima, quaerat, cum sint non quod perspiciatis autem et alias culpa similique quo magni voluptas esse in impedit rem accusamus sit ullam eius quos. Culpa possimus amet reiciendis numquam eligendi.<br />Temporibus, modi, fugit, nisi veritatis explicabo dolore adipisci culpa accusamus molestiae maiores vero eum praesentium et non repudiandae. Aliquid et illum vel vitae consectetur porro est quia ex culpa dolore.<br />Consequatur, quam, atque, neque, unde esse culpa ex nesciunt voluptatibus itaque aut est odio velit recusandae similique nemo laborum quibusdam voluptates pariatur quo commodi quae id fugiat enim animi accusamus.<br />Sapiente, impedit iste error vitae magni ea maiores. Eius, soluta, ullam, perferendis quidem rem neque impedit harum dolores quasi officia necessitatibus molestiae aliquid maiores! Minus ipsam quasi autem temporibus commodi!<br />Placeat, laborum, nam, recusandae voluptates itaque nihil neque iure consequatur nostrum inventore ut repudiandae animi vitae quisquam veniam facilis laboriosam autem. Fuga, rem, omnis suscipit doloremque repudiandae molestias itaque sapiente?<br />Nisi, minus, eum, quia incidunt animi architecto quidem harum neque repellendus deserunt est similique voluptate blanditiis ab consequatur iure labore sint veniam debitis nihil. Soluta sit nostrum dignissimos accusamus ducimus.<br />Esse, facilis, laborum, quo tempore beatae dolores sequi deserunt fugit voluptatem veniam corrupti cupiditate expedita aut nam necessitatibus tenetur explicabo! Reiciendis dicta expedita dolorem! Eius, error quibusdam id dolorum distinctio?<br />Ipsam, nam, veritatis molestias quod quibusdam neque numquam itaque explicabo quo cupiditate unde repudiandae incidunt natus nisi quas excepturi voluptatibus animi praesentium a accusantium! Totam, dicta excepturi pariatur quia vitae.<br />Ratione, eveniet laudantium excepturi enim non dolores consequuntur cumque provident. Aliquid, eligendi, rem quibusdam quae asperiores repellat ipsum molestiae natus eaque sed unde itaque quia? Commodi, ipsum necessitatibus doloribus fuga.<br />Aliquid, earum, ut, aliquam nulla odit necessitatibus tempora optio quaerat unde cum suscipit expedita ipsam ea facere corporis labore laboriosam esse dolores non dolorem quisquam nihil quis voluptas perferendis ipsa!<br />Similique, perferendis, recusandae, magnam sint praesentium quod non enim fugiat saepe quisquam assumenda deserunt eligendi veritatis incidunt tempore doloremque libero doloribus nisi ad laudantium dignissimos quae natus. Deserunt, enim, blanditiis.<br />Vero, aliquid in expedita et architecto sint facilis optio dicta excepturi adipisci. Blanditiis, autem, quidem, quasi, asperiores qui beatae cum officiis optio quam distinctio praesentium totam mollitia alias veritatis non.<br />Sapiente, vel quam quae eos natus voluptatum eveniet dolor doloribus saepe beatae deserunt quis et quisquam illo amet quasi laudantium molestiae voluptatibus asperiores deleniti nostrum quas magni accusantium omnis veritatis.</p>', 'Ini lorem', 1, 4),
(2, 1, '<blockquote>\r\n<p>Ini fakultas Baling baling&Atilde;<img title="Cool" src="http://localhost/siapmasukui/assets/f59c1a9e/tiny_mce/plugins/emotions/img/smiley-cool.gif" alt="Cool" border="0" /></p>\r\n</blockquote>', 'Fakultas Baling Baling', 1, NULL);

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
  PRIMARY KEY (`id`),
  KEY `pengerjaan_pengguna_idx` (`idPengguna`),
  KEY `pengerjaan_tryout_idx` (`idTryout`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pengerjaantryout`
--

INSERT INTO `pengerjaantryout` (`id`, `nilai`, `idPengguna`, `idTryout`) VALUES
(1, 100, 4, 4),
(3, 90, 1, 4),
(4, 85, 2, 4),
(5, 57, 5, 4),
(6, NULL, 4, 6),
(7, NULL, 4, 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `email`, `password`, `isAdmin`, `isActive`) VALUES
(1, 'hanif', 'hanif@hanif.com', 'dingdong', 1, 1),
(2, 'user', 'user@user.com', 'user', 0, 0),
(4, 'hanifnaufal', 'hanif@naufal.com', '0d5ae719d9c263ff078793a4f0bf25fd', 1, 1),
(5, 'lala', 'lala@lala.com', '2e3817293fc275dbee74bd71ce6eb056', 0, 0);

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
