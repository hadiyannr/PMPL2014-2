-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2014 at 04:53 
-- Server version: 5.6.14
-- PHP Version: 5.5.6

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `parent_id`, `title`, `description`, `listorder`, `is_locked`) VALUES
(8, NULL, 'Diskusi dan Belajar', 'Tempat berdiskusi pelajaran - pelajaran yang diujikan di ujian masuk', 0, 0),
(9, 8, 'Kemampuan Dasar', 'Tempat berdiskusi pelajaran - pelajaran kemampuan Dasar', 0, 0),
(10, 8, 'Kemampuan IPA', 'Tempat berdiskusi pelajaran - pelajaran kemampuan IPA', 0, 0),
(11, 8, 'Kemampuan IPS', 'Tempat berdiskusi pelajaran - pelajaran kemampuan IPS', 0, 0),
(12, 11, 'Ekonomi', 'Tempat berdiskusi pelajaran Ekonomi', 0, 0),
(13, 11, 'Sejarah', 'Tempat berdiskusi pelajaran Sejarah', 0, 0),
(14, 11, 'Geografi', 'Tempat berdiskusi pelajaran Geografi', 0, 0),
(15, 11, 'IPS Terpadu', 'Tempat berdiskusi pelajaran IPS Terpadu', 0, 0),
(16, 9, 'Matematika Dasar', 'Tempat berdiskusi pelajaran Matematika Dasar', 0, 0),
(17, 9, 'Bahasa Indonesia', 'Tempat berdiskusi pelajaran Bahasa Indonesia', 0, 0),
(18, 9, 'Bahasa Inggris', 'Tempat berdiskusi pelajaran Bahasa Inggris', 0, 0),
(19, 10, 'Matematika IPA', 'Tempat berdiskusi pelajaran Matematika IPA', 0, 0),
(20, 10, 'Fisika', 'Tempat berdiskusi pelajaran Fisika', 0, 0),
(21, 10, 'Kimia', 'Tempat berdiskusi pelajaran Kimia', 0, 0),
(22, 10, 'Biologi', 'Tempat berdiskusi pelajaran Biologi', 0, 0),
(25, NULL, 'Forum Santai', 'Tempat ngobrolnya calon anak UI', 0, 0),
(24, 23, 'Forum Santai', 'Tempat ngobrolnya calon anak UI', 0, 0),
(27, 25, 'Ngobrol Santai', 'Tempat ngobrolnya calon anak UI', 0, 0),
(28, 25, 'Pengalaman', 'Tempat sharing pengalaman', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Forumuser`
--

CREATE TABLE IF NOT EXISTS `Forumuser` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `siteid` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `signature` text,
  `firstseen` int(10) unsigned NOT NULL,
  `lastseen` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `siteid` (`siteid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `Forumuser`
--

INSERT INTO `Forumuser` (`id`, `siteid`, `name`, `signature`, `firstseen`, `lastseen`) VALUES
(6, '13', 'hanifnaufal', NULL, 1399813657, 1416305252),
(7, '16', 'adiyat', NULL, 1399963662, 1400689252),
(8, '18', 'farizikhwantri', NULL, 1400054780, 1400665147),
(9, '20', 'farahs', NULL, 1400057929, 1400057929),
(10, '19', 'apdhtg6', NULL, 1400662954, 1400674400),
(11, '25', 'satrio', NULL, 1400667798, 1400667798);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `idpengerjaan`, `idsoal`, `isiJawaban`) VALUES
(16, 12, 33, '0'),
(17, 16, 36, '0'),
(18, 18, 38, '2'),
(19, 18, 39, '1'),
(20, 18, 40, '3'),
(21, 18, 41, '4'),
(22, 18, 42, '0'),
(23, 21, 47, '1'),
(24, 21, 48, '1'),
(25, 21, 50, '1'),
(26, 21, 56, '0'),
(27, 21, 59, '1'),
(28, 21, 44, '1'),
(29, 21, 46, '1'),
(30, 21, 51, '1'),
(31, 21, 52, '1'),
(32, 21, 53, '1'),
(33, 21, 55, '1'),
(34, 21, 57, '1');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(3, 'Berita'),
(4, 'Informasi Fakultas & Jurusan');

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
  `imagepath` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_fk_idx` (`idcategory`),
  KEY `admin_konten_idx` (`idAdmin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id`, `idcategory`, `isi`, `judul`, `isPublished`, `idAdmin`, `imagepath`) VALUES
(26, 4, '</span></em></span></span></p>\n<p><span style="color: rgb(153, 51, 0);"><span style="font-size: x-small;"><em><span style="font-family: Verdana;">Gedung FKUI pada tahun 1920-an, tahun 1970-an, tahun 1990-an, dan hingga sekarang.</span></em></span></span></p>\n<hr />\n<p><span style="font-size: small;"><span style="font-family: Verdana;">Pepatah mengatakan pelajaran terbaik dapat diambil dari sejarah. Sejarah pula yang membuktikan bahwa kalangan intelektual medis turut berbakti dan memiliki kontribusi besar dalam perjuangan merebut kemerdekaan. Bertolak dari hal itu pula Fakultas Kedokteran Universitas Indonesia dapat berdiri sampai sekarang. Banyak para pejuang kemerdekaan berasal dari kampus perjuangan ini. Bagaimana sebenarnya napak tilas sejarah FKUI?<br />\n<br />\n<span style="color: rgb(51, 153, 102);"><strong>FKUI di Zaman Penjajahan</strong></span><br />\n<br />\n<img width="250" height="188" align="left" alt="" src="http://fk.ui.ac.id/userfiles/image/Sejarah-3.JPG" />Sejarah Fakultas Kedokteran Universitas Indonesia (FKUI) tidak terlepas dari sejarah pendidikan dokter di Indonesia yang dimulai sejak zaman penjajahan Belanda. Adapun momentum pendidikan kedokteran di Indonesia lahir pada tanggal <strong>2 Januari 1849 lewat Keputusan Gubernemen No. 22</strong>. Ketetapan itu menjadi titik awal penyelenggaraan pendidikan kedokteran di Indonesia (Nederlandsch Indie), yang ketika itu dilaksanakan di Rumah Sakit Militer.<br />\n</span></span><br />\n<span style="font-size: small;"><span style="font-family: Verdana;">Selang dua tahun kemudian, tepatnya pada bulan Januari 1851, dibuka&nbsp; Sekolah Pendidikan Kedokteran di Weltevreden dengan lama pendidikan dua tahun dan jumlah siswa 12 orang. Titik terang semakin terlihat ketika lulusan sekolah tersebut digelari <strong>Dokter Djawa</strong> melalui Surat Keputusan Gubernemen tanggal 5 Juni 1853 No. 10. Namun, sayangnya meski diberi titel dokter, lulusan sekolah tersebut &ldquo;hanya&rdquo; dipekerjakan sebagai Mantri Cacar.<br />\n<br />\nNyaris 10 tahun lamanya dokter-dokter Indonesia harus menunggu untuk memperoleh wewenang lebih dari sekadar Mantri Cacar. Pada tahun 1864, lama pendidikan kedokteran diubah menjadi 3 tahun dan lulusan yang dihasilkan dapat menjadi dokter yang berdiri sendiri, meskipun masih di bawah pengawasan dokter Belanda.<br />\n<br />\nSejarah kembali bergul</span></span><span style="font-size: small;"><span style="font-family: Verdana;">ir dan mencatat pertambahan waktu studi dokter Indonesia. Tahun 1875, lama pendidikan dokter menjadi 7 tahun termasuk pendidikan bahasa Belanda yang dijadikan sebagai bahasa pengantar. Lebih dari 20 tahun kemudian, tepatnya pada tahu</span></span><span style="font-size: small;"><span style="font-family: Verdana;">n 1898, barulah berdiri sekolah pendidikan kedokteran yang disebut <strong>STOVIA (School tot Opleiding voor Indische Artsen)</strong>. Para alumni ketika itu disebut Inlandse Arts.<br />\n<br />\nLama pendidikan kembali bertambah menjadi 9 tahun pada tanggal 1 Maret 1902, sekaligus mengiringi berdirinya gedung baru sekolah kedokteran di Hospitaalweg (sekara</span></span><span style="font-size: small;"><span style="font-family: Verdana;">ng Jl. Dr. Abdul Rahman Saleh 26). Masa pendidikan 9 tahun tersebut dibagi menjadi 2 tahun perkenalan dan 7 tahun pendidikan kedokteran.<br />\n<br />\nBaru setahun berselang, sejarah kembali mencatat banyak hal. Waktu studi kedokteran kembali bertambah, kali ini menjadi 10 tahun, bersamaan dengan disempurnakannya organisasi STOVIA pada tahun 1913. Adapun 10 tahun masa studi ini terdiri dari 3 tahun perkenalan dan 7 tahun pendidikan kedokteran. Nama alumni juga berubah menjadi Indische Arts pada waktu itu. Masih pada tahun yang sama, dibuka sekolah kedokteran dengan nama<strong> NIAS (Nederlands Indische Artsenschool)</strong> di Surabaya.<br />\n<br />\nUntuk memantapkan kualitas lulusan dalam hal praktik, pada akhir tahun 1919, didirikan Rumah Sakit Pusat <strong>CBZ (Centrale Burgerlijke Ziekenhuis, sekarang disebut RSCM)</strong> yang dipakai sebagai rumah sakit pendidikan oleh siswa STOVIA.<br />\n<br />\nKampus dengan dominasi warna putih yang ada saat ini tercatat selesai dibangun pada tanggal 5 Juli 1920. Pada tanggal yang sama pula seluruh fasilitas pendidikan dipindahkan ke gedung pendidikan yang baru di Jalan Salemba 6 sekarang.<br />\n<br />\n<img width="200" height="150" align="left" alt="" src="http://fk.ui.ac.id/userfiles/image/Sejarah-1.JPG" />Asa kembali membuncah di kalangan intelek kedokteran di Indonesia ketika pendidikan dokter diresmikan menjadi pendidikan tinggi dengan nama <strong>Geneeskundige Hooge School (GHS)</strong> pada tanggal 9 Agustus 1927. Yang menarik, sampai periode 1927, syarat pendidikan agar dapat mengikuti pendidikan dokter hanya setingkat SD. Barulah setelah GHS berdiri, syarat pendidikan menjadi setingkat SMA (ketika itu disebut Algemene Middelbare School atau AMS dan Hogere Burger School atau HBS).<br />\n<br />\nPada masa itu, STOVIA dan NIAS tetap ada namun periode pendidikan kembali menjadi 7 tahun dengan penghapusan masa perkenalan selama 3 tahun. Konsekuensinya, lulusan yang dapat diterima di kedua sekolah tersebut tidak boleh lebih rendah dari tingkat MULO (Meer Uitgebreid Lager Onder-wijs) bagian B.<br />\n<br />\nPada tanggal 8 Maret 1942, tanpa diduga-duga masa kolonialisme Belanda di Indonesia berakhir. Ketika itu, Belanda bertekuk lutut di bawah kaki tentara Jepang, sekaligus menandai masa pendudukan Jepang di Indonesia.<br />\n<br />\nKontroversi pun terjadi di kalangan mahasiswa kedokteran. Sebagian menyambut, sebagian lainnya menentang negara Asia Timur itu. Dua mahasiswa GHS, Soedjatmoko dan Soedarpo memilih untuk menunggu, sementara massa lainnya dipimpin oleh Chairul Saleh dan Azis Saleh pergi ke Tangerang untuk menyambut kedatangan Jepang. Meski demikian, kelompok mahasiswa itu tetap bersatu untuk menjamin berdirinya sekolah kedokteran.<br />\n<br />\nAdalah inisiatif seorang mahasiswa NIAS bernama Soejono Martosewojo yang memampukan sekolah kedokteran dapat kembali berdiri setelah sempat ditutup selama 6 bulan. Dengan dibantu perwakilan mahasiswa Jakarta-Surabaya serta didampingi oleh Dr. Abdul Rasjid dan beberapa dosen, Soejono mengajukan penggabungan konsep kurikulum eks-GHS dan eks-NIAS. Prof. Ogira Eiseibucho yang ketika itu menjabat sebagai Kepala Kantor Kesehatan Pemerintah Militer Jepang, menyetujui proposal tersebut.<br />\n<br />\nMenindaklanjuti hal tersebut, komite pendidikan segera dibentuk, selain untuk mengembangkan kurikulum pendidikan kedokteran, juga mempromosikan staf pengajar untuk menjadi dosen, asisten dosen, dan guru besar. Komite itu beranggotakan antara lain Prof. Dr. Achmad Mochtar, Prof. Dr. M. Sjaaf, Prof. Dr. Asikin Widjajakoesoemah, Prof. Dr. Hidayat, dan Prof. Dr. Soemitro, dengan Dr. Abdulrachman Saleh sebagai sekretaris.<br />\n<br />\nBersamaan dengan itu, terbentuk pula komite yang terdiri dari mahasiswa Jakarta, di antaranya Koestedjo, Kaligis, dan Imam Soedjoedi, serta mahasiswa Surabaya, misalnya Eri Soedewo, Soejono, Aka Gani dan Ibrahim Irsan. Komite ini mengembangkan rencana untuk menggabungkan eks-GHS dan eks-NIAS menjadi sekolah kedokteran dengan lama pendidikan 5 tahun. Penyesuaian penerimaan siswa pun dilakukan untuk menunjang sistem pendidikan tersebut.<br />\n<br />\nAkhirnya pada tanggal 29 April 1943, sekolah kedokteran bernama<strong> Ika Daigaku</strong> dibuka sebagai hadiah dari pemerintah Jepang untuk Indonesia, dengan Prof. Itagaki sebagai dekan fakultas.<br />\n<br />\n<span style="color: rgb(51, 153, 102);"><strong>FKUI di Era Pasca Kemerdekaan</strong></span><br />\n<br />\nGegap gempita kemerdekaan RI menjadi penghantar berubahnya nama sekolah menjadi Perguruan Tinggi Kedokteran Republik Indonesia, tepatnya pada bulan Februari 1946. Setahun kemudian, yaitu pada Februari 1947, Belanda yang kembali menginvasi Indonesia melangsungkan kegiatan pendidikan kedokteran dengan memakai nama <strong>Genesskundige Faculteit, Nood-Universiteit van Indonesie</strong>. Namun, pendidikan kedokteran pada Perguruan Tinggi Kedokteran Republik Indonesia tetap dilaksanakan ketika itu.<br />\n<br />\nTercatat pada tanggal <strong>2 Februari 1950</strong>, kedua institusi itu melebur menjadi satu. <strong>Perguruan Tinggi Kedokteran Republik Indonesia</strong> dan <strong>Geneeskundige Faculteit Nood-Universiteit van Indonesie</strong>, digabung dan disatukan dengan memakai nama <strong>Fakultas Kedokteran Universitas Indonesia</strong>. Penyatuan tersebut turut dipelopori penyerahan kedaulatan dari Pemerintah Belanda kepada Pemerintah Republik Indonesia.<br />\n<br />\nPada masa itu (era 1950-an), terdapat 28 jenis mata pelajaran dan bagian di FKUI, dengan jumlah mahasiswa sebanyak 288 orang dan masih terdapat beberapa orang dosen Belanda. Sebagian besar mata pelajaran juga masih diberikan dalam bahasa Belanda. Sarana pendidikan yang ada meliputi Kompleks Salemba 6, Kompleks Pegangsaan Timur 16, Rumah Sakit Umum Pusat dan Rumah Sakit Raden Saleh.<br />\n<br />\nBerkas sejarah tidak diketahui sebagian besar orang sejak masa itu. Beruntung ada Perhimpunan Sejarah Kedokteran Indonesia (Persekin) atau Indonesian Medical History Association yang mendalami mengenai perjalanan kaum intelektual medis di negeri ini. Selain itu ada pula Komunitas Prapatan 10 yang merupakan gabungan alumni fakultas kedokteran dan farmasi pada era sekolah pendidikan masih bernama Ika Daigaku dan Yakugaku. Adapun Prapatan 10 diambil dari nama asrama yang memang berlokasi di Jalan Prapatan No.10, Jakarta.<br />\n<br />\nYang menggelitik dari komunitas ini ialah jejak langkah para alumni yang mencetak sejarah tersendiri. Pada era penjajahan Jepang dengan sekolah kedokteran bernama Ika Daigaku, beberapa mahasiswa justru bergabung dengan kelompok eks NIAS di Surabaya dan eks GHS di Jakarta. Tidak hanya itu, sebagian alumni juga tidak melengkapi pendidikan hingga menyandang gelar dokter atau ahli farmasi, namun aktif menjalani profesi dalam bidang lain, seperti militer, diplomasi, ataupun pegawai pemerintahan. Bahkan, pada masa perang kemerdekaan 1945-1949, hampir semuanya rela berkorban jiwa dan raga hingga harus gugur di medan perang demi terwujudnya proklamasi 17 Agustus 1945.<br />\n<span style="color: rgb(51, 153, 102);"><strong><br />\nFKUI - tahun 1955 hingga saat ini</strong></span><br />\n<br />\n</span></span><span style="font-size: small;"><span style="font-family: Verdana;">Modernisasi  merambah kaum intelektual medis di Indonesia pada tahun 1946 dengan  waktu studi kedokteran selama 7 tahun. Dibukanya Nood Universiteit van  Indonesia menjadi gema pertama yang menandai dimulainya era modern  tersebut, dilanjutkan dengan berdirinya Perguruan Tinggi Kedokteran  Universitas Gajah Mada di Klaten tahun 1949. Uniknya, walau tercatat  kurikulum resmi selama 7 tahun, mahasiswa dibebaskan untuk menentukan  sendiri lama masa studinya. Bahkan, bila sang siswa telah siap ujian,  tanggal ujian pun dapat ia tentukan sendiri. Tak heran bila periode ini  disebut sebagai masa studi bebas (free study atau vrije studie).</span></span></p>\n<p><span style="font-size: small;"><span style="font-family: Verdana;">Selang beberapa waktu kemudian, Indonesia terpaksa menelan pil pahit kekurangan tenaga pengajar medis setelah dipulangkannya banyak staf pendidikan kedokteran bangsa Belanda pascakemerdekaan. Pendekatan dengan<strong> University of Carolina San Fransisco (UCSF)</strong> pun dilakukan oleh Prof. Sutomo demi mengatasi masalah ini. Akhirnya, setelah negosiasi panjang selama bertahun-tahun, kurikulum baru dapat disusun dengan bantuan UCSF pada tanggal 12 Maret 1955. Adapun kurikulum ini memiliki lama studi selama 6 tahun dan disebut dengan studi terpimpin (guided study).<br />\n<br />\nSistem pendidikan baru tersebut terdiri dari 1 tahun pelajaran premedik, 2 tahun pelajaran preklinik, 2 tahun pelajaran klinik, dan 1 tahun internship. Pada sistem kurikulum tersebut, memasuki tahun ke-4, mahasiswa akan menjalani rotasi klinik di Departemen IPD dan IKB masing-masing selama 12 minggu; Departemen Obsgin, IKA, dan Psikiatri-Neurologi selama masing-masing 8 minggu. Setelah lulus dari masa klinik, mahasiswa akan menjalani internship yang ketika itu dibagi menjadi dua, setengah tahun bidang medisch dan setengah tahun sisanya bidang chirurgisch. Yang menarik, internship seluruhnya dianggap sama dengan ujian dokter bagian II sehingga pada akhir tahun ke-6 tidak perlu diadakan ujian lagi. Para siswa akan memperoleh surat keterangan dari pihak yang diberi kuasa yang menyatakan bahwa ia telah menjalani internship &ldquo;dengan memuaskan, sudah cukup untuk pemberian ijazah dokter.&rdquo;<br />\n<br />\nMetode pengajaran tersebut bertahan selama kurang lebih 27 tahun. Sejarah kembali ditorehkan pada tahun 1982, ketika Consortium of Health Sciences (CHS) menerbitkan KIPDI 1. Hal-hal yang ditetapkan dalam KIPDI I tersebut sontak diterapkan departemen-departemen, yakni mengenai tujuan instruksional umum (TIU atau General Instructional Objectivesi/GIO) dan tujuan perilaku khusus (TPK atau Spesific Behavioral Objectives/SBO). TPK sendiri pada prinsipnya merupakan kurikulum yang diterapkan sejak tahun 1955.&nbsp; <br />\n<br />\nDiscipline based-curriculum kemudian menjadi penjuru sistem pendidikan kedokteran masing-masing departemen, yang berpedoman pada KIPDI 1 dengan pendekatan aspek kognitif, psikomotor, dan perilaku (attitude).<br />\n<br />\nSeakan terus berupaya mengembangkan sistem baku pendidikan kedokteran di Indonesia, CHS kembali menerbitkan KIPDI 2 pada tahun 1994, yang memaparkan dengan jelas mengenai Kerangka Konsep dan Orientasi Pendidikan. FKUI segera mengadopsi KIPDI 2 yang bersifat integrated and active learning tersebut dengan menyusun Kurikulum Fakultas yang pertama kalinya bersifat terintegrasi. Sayangnya, baru 3 semester kurikulum itu berjalan, yaitu tahun 1995-1997, sistem pendidikan kembali berubah di kampus ini. Adalah peralihan kepemimpinan yang memungkinkan hal itu tejadi. Pihak pimpinan FKUI ketika itu memutuskan untuk kembali ke kurikulum lama yang bersifat departemental dan pembelajaran pasif. Dengan demikian, sistem pendidikan kembali menjadi traditional curriculum atau department/ discipline based-lecturing. Ironisnya, ketika itu, Fakultas Kedokteran di Singapura justru mulai menerapkan kurikulum terintegasi tersebut.<br />\n<br />\nMemasuki milenium baru dan tantangan globalisasi yang semakin merambah dunia medis membuat FKUI bergegas membenahi diri. Puncaknya, pada tahun 2000, fakultas ini mendapat hibah kompetisi QUE P yang lantas menjadi lokomotif perubahan kurikulum. Hasilnya adalah Kurikulum Fakultas 2005 yang menggebrak berbagai sistem lama serta menghasilkan perubahan struktur organisasi sekaligus tata nilai di FKUI. Yang dimaksud adalah perubahan paradigma dan pola pikir. Sebelumnya, seorang pakar yang dianggap memiliki keterampilan tertinggi seakan diberi beban untuk memberi kuliah bagi mahasiswa. Sejak adanya Kurfak yang merampingkan jam kuliah ini, filosofi itu lambat laun memudar. Kurikulum tersebut menuntut staf pengajar untuk bertindak sebagai fasilitator (sama dengan sebutan tutor di fakultas kedokteran lain) yang menjadi elemen penting dalam pendidikan dokter. Mengapa penting? Karena fasilitator akan menjadi aktivator atau bahkan provokator yang dapat memprovokasi mahasiswa untuk belajar. Dengan demikian, menjadi staf pengajar tidak lagi identik dengan terbebani menyiapkan kuliah dan menjejali berupa-rupa ilmu kepada mahasiswa, tetapi berpartisipasi dalam mencetak dokter-dokter unggul yang berjiwa kritis, kreatif, dan inovatif.<br />\n<br />\nAkhirnya, sejarah mencatat kali kedua disusunnya kurikulum terintegrasi di kampus ini. Sejalan dengan Rencana Strategis (Renstra) FKUI, Kurfak 2005 yang kini disebut Kurikulum Berbasis Kompetensi FKUI 2005 dibakukan dan diterapkan hingga sekarang. Namun, bukan berarti jejak langkah FKUI berhenti sampai di sini. Dengan semangat yang sama seperti saat berdirinya dulu, semangat perjuangan kampus ini tak pernah padam untuk menggojlok, menata apik, serta mempercantik sistem pendidikan kedokteran demi mencetak dokter-dokter unggul kebanggaan bangsa. Karena bagi fakultas ini, kesehatan paripurna rakyat Indonesia akan terus diperjuangkan sampai kapan pun.<br />\n&nbsp;<br />\n[courtesy of dr. Rushdy Hoesein, M Hum dan dr. Muzakkir Tanzil, SpM(K)]<br />\nkontak email : hoeseinr@yahoo.com, muzakkir_tanzil@yahoo.com<br />\n</span></span></p></div>', 'Fakultas Kedokteran', 1, 18, 'FK.png'),
(27, 4, '<p>Fakultas Kedokteran Gigi Universitas Indonesia (FKGUI) membuka lembaran hidupnya pada tahun 1961, bertepatan dibukanya kesempatan kepada 71 pemuda-pemudi Indonesia untuk menuntut ilmu di FKGUI. Hasil ini sebenarnya usaha dari kalangan dokter gigi sejak 1954 dan dari mereka yang berminat memajukan ilmu kedokteran gigi.</p>\n<p>Mereka bermaksud mendirikan sebuah Fakultas Kedokteran Gigi di Jakarta, mengingat masih banyak dibutuhkan dokter gigi di tanah air. Waktu itu perbandingan antara dokter gigi dan penduduk 1 : 200.000, sementara lulusan dokter gigi tiap tahun sangat kecil yakni tidak lebih dari 35 orang yang berasal dari dua fakultas (FKG Unair dan FKG UGM).</p>\n<p>Disamping itu, Jakarta sebagai ibukota negara seharusnya mempunyai Fakultas Kedokteran Gigi sebagai cermin dari kegiatan profesi kedokteran gigi. Maka, FKG ini pun didirikan di UI dan diharapkan menjadi salah satu Fakultas Kedokteran Gigi Pembina di Indonesia.</p>\n<p>Rintisan diatas lalu dilanjutkan Prof. Dr. Ouw Eng Liang (alm) dan kawan-kawan dari bagian Gigi dan Mulut FKUI pada 1959 dengan mengajukan rencara terinci pendirian FKG di UI. Rencana itu mendapat dukungan pula dari Rektor UI Dr. Sudjono Djuned Pusponegoro dan Dekan FKUI Prof. Dr. M. Soekardjo .</p>\n<p>Tak lama kemudian keluarlah Surat Keputusan Menteri Pendidikan Pengajaran dan Kebudayaan RI No. 108049 tanggal 21 Desember 1960 tentang pendirian Fakultas Kedokteran Gigi di UI. Sejak itulah, lahir FKGUI yang merupakan Fakultas Kedokteran Gigi Negeri keempat di Indonesia dengan Prof. Dr. Ouw Eng Liang sebagai Dekan pertama.</p>\n<p style="text-align: center;"><a href="http://fkg.ui.ac.id/wp-content/uploads/2014/06/sejarah1.jpg"><img class="aligncenter size-full wp-image-2144729" src="http://fkg.ui.ac.id/wp-content/uploads/2014/06/sejarah1.jpg" alt=sejarah width=686 height=330 pagespeed_url_hash=1078588594 onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/></a></p>\n<p>Rintisan diatas lalu dilanjutkan Prof. Dr. Ouw Eng Liang (alm) dan kawan-kawan dari bagian Gigi dan Mulut FKUI pada 1959 dengan mengajukan rencara terinci pendirian FKG di UI. Rencana itu mendapat dukungan pula dari Rektor UI Dr. Sudjono Djuned Pusponegoro dan Dekan FKUI Prof. Dr. M. Soekardjo .</p>\n<p>Tak lama kemudian keluarlah Surat Keputusan Menteri Pendidikan Pengajaran dan Kebudayaan RI No. 108049 tanggal 21 Desember 1960 tentang pendirian Fakultas Kedokteran Gigi di UI. Sejak itulah, lahir FKGUI yang merupakan Fakultas Kedokteran Gigi Negeri keempat di Indonesia dengan Prof. Dr. Ouw Eng Liang sebagai Dekan pertama.</p>\n<p>Tahun 1961, FKGUI yang memiliki 2 Staf Pengajar Tetap, 37 Staf Pengajar Luar Biasa, dibantu 7 tenaga administrasi termasuk pesuruh secara resmi membuka pintunya bagi mahasiswa baru. Awalnya, FKGUI praktis tak mempunyai fasilitas gedung dan perlengkapan. Satu-satunya ruang adalah ruang pinjaman dari Rumah Sakit Dr. Cipto Mangunkusumo (RSCM) yaitu bagian Tata Usaha Ilmu Penyakit Gigi dan Mulut RSCM.</p>\n<p>Untuk kuliah tingkat persiapan, pelaksanaan dan tempatnya digabung bersama mahasiswa tingkat I FKUI. Sedangkan praktikum Anatomi Gigi menggunakan tempat penitipan sepeda RSCM (kini tempat parkir paviliun Cendrawasih RSCM). Pada 17 Oktober 1963, mengingat meningkatnya kebutuhan mahasiswa dan keterbatasan fasilitas, maka sebagian ruang depan Perpustakaan Rakyat milik Departemen Pendidikan Pengajaran dan Kebudayaan RI di Salemba 4 diserahkan kepada FKGUI.</p>\n<p>Namun, kuliah dan praktikum masih bergabung dengan FKUI. Tahun berikutnya, pada 1964, FKGUI mendapat ruang tambahan yaitu bagian belakang dari Perpustakaan Rakyat. Sebagian ruang itu digunakan untuk preklinik (praktikum) mahasiswa tingkat III sebagai persiapan kepaniteraan klinik di tingkat IV nanti.</p>\n', 'Fakultas Kedokteran Gigi', 1, 13, 'FKG.png'),
(28, 4, '</a>Pada tahun 1950, Universitas Indonesia yang berpusat di Jakarta mempunyai cabang di empat kota, yaitu Makassar, Surabaya, Bandung dan Bogor.</p>\n<p style="text-align: justify;">Fakultas MIPA UI saat itu bernama Fakultas Ilmu Pasti dan Ilmu Alam (FIPIA) dan merupakan bagian dari UI cabang Bandung, yang pada tahun 1959 menjadi Insitut Teknologi Bandung (ITB). Selanjutnya Menteri Pendidikan Pengajaran dan Kebudayaan RI dengan SK Nomor : 108094/UU tanggal 21 Desember 1960 mendirikan FIPIA UI di Jakarta terdiri dari Jurusan Matematika, Fisika, Kimia dan Biologi. Pada tahun 1965 didirikan dari Universitas Pajajaran. Berdasarkan Kepres No. 44/1982 nama FIPIA UI berubah menjadi FMIPA (Fakultas Matematika dan Ilmu Pengetahuan Alam) UI. Pada bulan Juli 1987 kampus FMIPA UI pindah dari kampus lama di jalan Salemba ke kampus baru di Depok.</p>', 'Fakultas Matematika & Ilmu Pengetahuan Alam', 1, 13, 'FMIPA.png'),
(29, 4, '<p>Sejarah Fakultas Teknik Universitas Indonesia (FTUI) berawal dari tawaran kaum muda Insinyur, yang tergabung dalam Perkumpulan Insinyur Indonesia (PII), kepada Presiden Republik Indonesia pertama Bung Karno, untuk membenahi jalan-jalan protokol di Jakarta yang rusak berat. Pada waktu itu Jakarta sedang mempersiapkan diri untuk Pekan Olah Raga Internasional GANEFO. Tawaran ini disambut dengan baik oleh Bung Karno. Jadilah kesempatan yang langka ini diberikan dan dengan syarat pekerjaan harus dapat diselesaikan dalam waktu dua minggu. Dipimpin oleh Ir. Slamet Bratanata, Ir. Roosseno, Ir. Sutami, dan Ir. Soehoed, tugas negara ini dapat selesai tepat pada waktunya. Setelah tugas membenahi jalan-jalan protokol selesai, insinyur-insinyur muda yang mempunyai semangat baja ini merasa masih ada “sesuatu” lagi yang harus dikerjakan. Tapi apa? Maka muncullah kemudian ide cemerlang, “mengapa tidak didirikan saja sebuah fakultas teknik di Jakarta sehingga orang tidak perlu jauh-jauh ke Bandung untuk menuntut ilmu”. Pada waktu diadakan acara menari lenso di Gedung Pembangunan (dahulu namanya Gedung Pola) untuk menghormati tamu-tamu kehormatan Ganefo, kesempatan yang baik itu tidak disiasiakan untuk menyampaikan ide tersebut kepada Bung Karno. Beliau mengatakan “datang saja besok ke Istana” dan benar saja ketika keesokan harinya menghadap Bung Karno di Istana, Bung Karno tanpa raguragu menyatakan persetujuannya dan bahkan langsung pada waktu itu juga menunjuk Prof. Ir. Roosseno sebagai Dekan pertama Fakultas Teknik. Bung Karno juga menginstruksikan agar Fakultas Teknik ini berada dibawah naungan Universitas Indonesia, dimana Rektornya pada waktu itu adalah dr. Syarief Thayeb.</p>\n<p><strong>FTUI Resmi Berdiri</strong></p>\n<p>dr. Syarief Thayeb ketika sudah menjabat Menteri Pendidikan Tinggi dan Ilmu Pengetahuan menerbitkan Surat Keputusan Nomor 76 tanggal 17 Juli 1964 tentang dibentuknya Fakultas Teknik. Berdirilah Fakultas Teknik secara resmi di Jakarta tanpa upacara peresmian ataupun selamatan, dibawah kibaran bendera Universitas Indonesia, jadilah Fakultas Teknik, Fakultas yang termuda saat itu. Dari sinilah bermula sejarah Fakultas Teknik Universitas Indonesia. Jurusan Sipil, Jurusan Mesin dan Jurusan Elektro dibuka pada tahap pertama. Masing-masing diketuai oleh Ir. Sutami untuk Jurusan Sipil, Ir. Ahmad Sayuti untuk Ketua Jurusan Mesin dan Ir. K. Hadinoto untuk Ketua Jurusan Elektro. Tahun berikutnya dibuka Jurusan Metalurgi dan Jurusan Arsitektur, dengan ketuanya masing-masing Dr.Ing. Purnomosidhi H dan Ir. Sunaryo S. Ir. Roosseno selaku Dekan pertama dibantu oleh Ir. Sutami selaku Pembantu Dekan Bidang Akademis, Ir. Slamet Bratanata selaku Pembantu Dekan Bidang Administrasi dan Keuangan serta Dr.Ing. Purnomosidhi H selaku Pembantu Dekan Bidang Kemahasiswaan dan Alumni. Awal kegiatan akademik FTUI pada tahun 1964 didukung oleh 30 tenaga dosen serta 11 tenaga nonakademis menyelenggarakan 32 mata ajaran. Mahasiswa tahun pertama yang lulus test dan diterima menjadi mahasiswa Fakultas Teknik Universitas Indonesia berjumlah 199 orang. Dalam jangka waktu lima setengah tahun, FTUI berhasil mewisuda 18 orang lulusan pertama sebagai Insinyur. Selanjutnya pada tahun 1985, program studi Teknik Gas dari Jurusan Metalurgi digabung dengan program studi Teknik Kimia dari Jurusan Mesin menjadi Jurusan Teknik Gas &amp; Petrokimia dengan ketua Jurusan Dr. Ir. H. Rachmantio. Jurusan Teknik Industri merupakan yang termuda, dibuka tahun 1999 dengan ketua Jurusan Ir. M. Dachyar, MSc. Istilah Jurusan kemudian diganti menjadi Departemen hingga saat ini.</p>\n					\n			\n', 'Fakultas Teknik', 1, 13, 'FT.png'),
(30, 4, '<p>Didirikan pada awal abad ke-20 pada 1909, Fakultas Hukum Universitas Indonesia (FHUI) adalah sekolah hukum tertua di Indonesia. Semenjak itu, FHUI menjadi kawah penggodokan ahli-ahli hukum yang memainkan peranan menentukan, tidak hanya dalam membangun sistem hukum, tetapi juga dalam mengukir sejarah bangsa.</p><p>Dari FHUI pula kecendekiawanan hukum di Indonesia lahir. Sebagai sekolah hukum tertua milik bangsa, sumbangsih FHUI bagi kelahiran dan tumbuh-kembangnya sistem hukum dan peradilan bangsa tidak lagi diragukan. Belajar sistem hukum dan peradilan Indonesia di FHUI akan terasa seperti mengalami sendiri bagaimana sistem-sistem itu dibuat.</p><p>Banyak lulusan FHUI telah meninggalkan jejak mereka pada taraf regional dan internasional. Beribu-ribu lainnya mengisi jabatan-jabatan di dunia peradilan Indonesia, profesi hukum dan akademisi hukum sepanjang masa. Sebagai satu-satunya sekolah hukum dan universitas yang menyandang nama bangsa, menjadi bagian dari sejarah bangsa telah menjadi tradisi bagi lulusan FHUI. Lebih dari sekadar sekolah hukum, FHUI adalah sebuah tradisi.</p>', 'Fakultas Hukum', 1, 13, 'FH.png'),
(31, 4, '<p>Berdirinya FEUI ditetapkan dengan SK. Menteri Pendidikan dan Kebudayaan No. 360/BPT/1951, dengan hanya satu jurusan yaitu Jurusan Ekonomi Perusahaan. Pada saat itu FEUI memiliki tujuh guru besar: Prof. Mr. Hazairin, Djokosoetono, Prof.Dr. A. Kraal, Prof. Dr. DH. Burger, Prof. Mr. Dr. WGL Lemaire dan Prof. Mr. Dr. WHE Noach. Sebagai hasil pengembangan dan pemindahan Jurusan Sosial Ekonomi dari Fakultas Hukum memiliki 3 jurusan, yaitu Umum, Sosiologi Ekonomi dan Ekonomi Perusahaan.</p>\r\n<p>Pada tahun ini ditandai sebagai dasar terbentuknya Departemen Ilmu Ekonomi yang kita kenal sekarang ini. Pada saat yang sama dibentuk dua bagian yaitu seminar Ekonomi Perusahaan yang dipimpin Oleh Prof. Dr. A. Kraal dan Balai Penyelidikan Ekonomi dan Masyarakat, yang setahun kemudian diubah menjadi Lembaga Penyelidikan Ekonomi dan Masyarakat, dengan ketua pertamanya Prof. Dr. Soemitro. Disamping itu, dibuka pula Perpustakaan Fakultas di Jalan Diponegoro dipimpin oleh Prof. Dr. PL. van der Vilde.</p>\r\n<p>Program studi yang ada di FEUI terdiri dari:</p>\r\n<ul>\r\n<li> Di bawah Koordinasi Departemen</li>\r\n</ul>\r\n<p style="padding-left: 60px;">1. S1 Reguler Ilmu Ekonomi<br />2. S1 Reguler Ilmu Ekonomi Islam<br />3. S2 Ilmu Ekonomi<br />4. Magister Perencanaan dan Kebijakan Publik (MPKP)<br />5. S3 Ilmu Ekonomi</p>\r\n<ul>\r\n<li> Di bawah Koordinasi Departemen Manajemen</li>\r\n</ul>\r\n<p style="padding-left: 60px;">1. S1 Reguler Manajemen<br />2. S1 Ekstensi Manajemen<br />3. S1 Reguler Bisnis Islam<br />4. S2 Ilmu Manajemen<br />5. Magister Manajemen (MM)<br />6. S3 Ilmu Manajemen</p>\r\n<ul>\r\n<li> Di Bawah Koordinasi Departemen Akuntansi</li>\r\n</ul>\r\n<p style="padding-left: 60px;">1. S1 Reguler Akuntansi<br />2. S1 Ekstensi Akuntansi<br />3. Pendidikan Profesi Akuntansi<br />4. S2 Ilmu Akuntansi<br />5. Magister Akuntansi (MAKSI)<br />6. S3 Ilmu Akuntansi</p>\r\n<p>&nbsp;</p>', 'Fakultas Ekonomi', 1, 13, 'FE.png'),
(32, 4, '<strong>SEJARAH FAKULTAS ILMU PENGETAHUAN BUDAYA UNIVERSITAS INDONESIA:</strong><br/>\n<strong>DARI FAKULTAS SASTRA </strong><strong>KE FAKULTAS ILMU PENGETAHUAN BUDAYA</strong></p>\n<p style="text-align: justify;">Fakultas Ilmu Pengetahuan Budaya Universitas Indonesia (FIB UI) semula bernama <strong>Fakultas Sastra Universitas Indonesia</strong>. Fakultas Sastra dibuka pada tanggal 1 Oktober 1940 berdasarkan SK pendirian dengan nama <em>Faculteit der Letteren end Wijsbegeerte</em>. Kuliah perdana dimulai pada tanggal 4 Desember 1940 di gedung Rechts Hogeschool di Jalan Merdeka Barat 13, Jakarta Pusat (sekarang menjadi Departemen Pertahanan dan Keamanan). Pada waktu itu Fakultas membuka empat jurusan, yaitu Jurusan Sastra Indonesia, Jurusan Ilmu-Ilmu Sosial, Jurusan Ilmu-ilmu Sejarah, dan Jurusan Ilmu Bangsa-Bangsa.</p>\n<p style="text-align: justify;">Pada tanggal 2 Februari 1950 Universiteit van Indonesie (semula bernama Nooduniversiteit) diambil alih oleh Balai Perguruan Tinggi Republik Indonesia (BPTRI), suatu badan yang dibentuk pemerintah, dan namanya diganti menjadi Universiteit van Indonesia. Sejak 1954 nama tersebut diubah lagi menjadi Universitas Indonesia yang di dalamnya termasuk <em>Faculteit der Letteren en Wijsbegeerte</em> yang pada tahun 1947 telah diubah menjadi Fakulteit Sastra dan Filsafat.</p>\n<p style="text-align: justify;">Jurusan-jurusan yang tersedia pada waktu itu adalah Jurusan Sastra Indonesia, Jurusan Prancis, Jurusan Cina, dan Jurusan Arkeologi. Keempat jurusan itu kemudian disesuaikan dengan kepentingan yang berkembang pada saat itu serta berdasarkan atas tersedianya tenaga pengajar. Oleh karena itu, kemudian dibentuk Jurusan Sastra Indonesia, Sastra Inggris, Sastra Cina, Sastra Prancis dan Jurusan Bebas. Sejalan dengan berdirinya Jurusan Antropologi pada tahun 1957, Jurusan Bebas dihapuskan, dan pada tahun 1961 jurusan itu secara resmi dibubarkan.</p>\n<p style="text-align: justify;">Sesuai dengan perkembangan ilmu dan kebutuhan masyarakat, FIB UI kemudian mengembangkan jumlah jurusan menjadi 14 jurusan, yakni Jurusan Sastra Indonesia; Jurusan Sastra Daerah (hanya terdiri atas Program Studi Jawa); Jurusan Sastra Asia Timur (terdiri atas Program Studi Cina dan Program Studi Jepang); Jurusan Sastra Asia Barat (hanya terdiri atas Program Studi Arab); Jurusan Sastra Germania (terdiri atas Program Studi Jerman dan Program Studi Belanda); Jurusan Sastra Inggris; Jurusan Sastra Roman (hanya terdiri atas Program Studi Prancis); Jurusan Sastra Slavia (hanya terdiri atas Program Studi Rusia); Jurusan Arkeologi; Jurusan Sejarah; Jurusan Filsafat; Jurusan Ilmu Perpustakaan; dan Jurusan Asia Selatan (dibuka pada tahun 1975, namun tidak pernah menerima mahasiswa, dan ditutup pada tahun 1978). Program Studi Bahasa dan Kebudayaan Korea dibuka pada tahun 2006.</p>\n<p style="text-align: justify;">Dalam perkembangan kemudian, muncul pemikiran untuk mengubah nama Fakultas Sastra menjadi Fakultas Ilmu Pengetahuan Budaya. Salah satu pertimbangan yang melandasi perubahan nama adalah bahwa kata sastra dewasa ini telah mengalami penyempitan makna. Kata sastra yang dalam bahasa Sanskerta berarti ‘budaya’ atau ‘ilmu’ (dan yang menjadi dasar semula penamaan fakultas ini) kini dimaknai masyarakat luas ‘bidang seni yang menggunakan bahasa sebagai medianya’. Dalam konteks itu, sastra dipandang sebagai buah karya sastrawan yang berupa novel, cerpen, puisi, atau drama. Karena itu, Fakultas Sastra diartikan sebagai fakultas yang mendidik para mahasiswa untuk menjadi sastrawan, padahal kenyataannya tidak demikian. Di lembaga ini (Fakultas Sastra UI) dikaji dan dikembangkan ilmu serta pengetahuan budaya yang mencakupi ilmu bahasa (linguistik), ilmu susastra, ilmu sejarah, ilmu perpustakaan, ilmu filsafat, dan arkeologi.</p>\n<p style="text-align: justify;">Melalui SK Rektor UI No. 266/SK/R/UI/2002 yang ditetapkan tanggal 27 Juni 2002, akhirnya Fakultas Sastra Universitas Indonesia secara resmi berganti nama menjadi <strong>Fakultas Ilmu Pengetahuan Budaya Universitas Indonesia</strong> (FIB UI). Sejak diresmikannya nama Fakultas Ilmu Pengetahuan Budaya Universitas Indonesia, diadakan penyesuaian yang seiring dengan rencana pengembangan Universitas Indonesia sebagai Universitas Riset sekaligus Badan Hukum Milik Negara (BHMN). Jurusan disesuaikan menjadi program studi sehingga kini terdapat lima belas program studi di FIB-UI. Sementara itu, dibentuk tujuh departemen, yaitu Departemen Arkeologi, Ilmu Sejarah, Linguistik, Ilmu Susastra, Ilmu Filsafat, Ilmu Perpustakaan dan Informasi, dan Kewilayahan yang tugas utamanya adalah merencanakan dan mengembangkan bidang masing-masing.</p>\n<p style="text-align: justify;">FIB UI pernah menempati berbagai tempat untuk melaksanakan perkuliahannya: tahun 1940 di Merdeka Barat 13, Jakarta Pusat; Jalan Diponegoro 82, Jakarta Pusat; lalu pada tahun 1960 pindah ke Kampus Rawamangun, Jakarta Timur; dan sejak tahun 1987 kegiatan perkuliahan dilaksanakan di Kampus Universitas Indonesia, Depok, Jawa Barat.</p>', 'Fakultas Ilmu Pengetahuan Budaya', 1, 13, 'FIB.png'),
(33, 4, 'Lahirnya Pendidikan Psikologi di Indonesia diawali oleh pidato ilmiah Prof. Dr. Slamet Iman Santoso dalam pengukuhannya sebagai Guru Besar Universitas Indonesia pada Dies Natalis Universitas Indonesia pada tahun 1952 di Fakultas Pengetahuan Teknik UI di Bandung (sekarang ITB).</p>\n<p style="color: #000000; text-align: justify;">Dalam pidato tersebut, beliau antara lain mengemukakan penggunaan pemeriksaan psikologis untuk mendeteksi the right man on the right place, dan menghindari the right man on the wrong place, the wrong man on the right place, serta the wrong man on the wrong place. Sebagai kelanjutan dari pidato tersebut, di lingkungan Kementerian Pendidikan, Pengadjaran, dan Kebudajaan (disingkat Kementerian PP&amp;K), pada tanggal 3 Maret 1953 diselenggarakan Kursus Asisten Psikologi, yang diketuai oleh Prof. Dr. Slamet Iman Santoso.</p>\n<p style="color: #000000; text-align: justify;">Tak lama setelah itu, masih dalam lingkungan Kementerian PP&amp;K, didirikan Lembaga Psikologi, yang kemudian berubah statusnya menjadi Lembaga Pendidikan Asisten Psikologi yang secara langsung berada di bawah pimpinan Universitas Indonesia. Pada tahun 1955, Pendidikan Psikologi Asisten Psikologi diubah statusnya menjadi Pendidikan Sarjana Psikologi, yang secara administratif berada di bawah Fakultas Kedokteran Universitas Indonesia.</p>\n<p style="color: #000000; text-align: justify;">Dalam SK Menteri Pendidikan, Pengadjaran &amp; Kebudajaan Republik Indonesia No. 108049/U.U. dinyatakan bahwa Fakultas Psikologi Universitas Indonesia dimulai tanggal 1 Djuli 1960. Dengan demikian, tahun 1960 merupakan tahun kelahiran Fakultas Psikologi Universitas Indonesia, dengan Dekan pertamanya Prof. Dr. Slamet Iman Santoso.</p>\n<p style="text-align: justify;">Hingga tahun 2014, Fakultas Psikologi Universitas Indonesia menyelenggarakan 2 program studi, yakni program studi Ilmu Psikologi (untuk jenjang Sarjana, Magister, Doktor), dan program studi Psikologi Profesi (untuk jenjang Magister). Program studi Ilmu Psikologi jenjang Sarjana sendiri pada awalnya terdiri dari 4 program kelas, yakni S1 Reguler, S1 Ekstensi, S1 Khusus Internasional (bekerjasama dengan University of Queensland, Austalia), dan S1 Paralel. Namun, semenjak tahun 2009 Fakultas Psikologi Universitas Indonesia tidak lagi menyelenggarakan program kelas S1 Ekstensi. Kemudian pada tahun 2000 Program Studi Psikologi Terapan (untuk jenjang magister) mulai diselenggarakan.</p>\n<p style="text-align: justify;">Berikut adalah nama para pimpinan Fakultas Psikologi UI yang menjabat menjadi Dekan sejak Fakultas Psikologi Universitas Indonesia berdiri:</p>', 'Fakultas Psikologi', 1, 13, 'PSIKO.png'),
(34, 4, '<br/>\nPada awalnya keberadaan FISIP UI dimulai dengan dibentuknya Jurusan Publisistik (sekarang Departemen Ilmu Komunikasi) pada Fakultas Hukum dan Ilmu Pengetahuan Masyarakat Universitas Indonesia (FH&#8208;IPK) pada tanggal 12 Desember 1959. Tujuan pembentukannya adalah untuk meningkatkan mutu pers dengan memberi kesempatan kepada untuk meningkatkan mutu pers dengan memberi kesempatan kepada para wartawan mengikuti pendidikan universitas di bidang jurnalistik.<br/>\n<br/>\nDalam perkembangannya dirasakan adanya kebutuhan untuk mengembangkan ilmu&#8208;ilmu sosial yang lainnya seperti sosiologi, ilmu politik dan ilmu administrasi karena perkembangan yang pesat baik dari segi keilmuan maupun pemanfaatan dalam kehidupan praktis di Indonesia. Setelah menyelenggarakan sejumlah lokakarya untuk mematangkan gagasan tersebut, maka pada tanggal 1 September 1962, semasa Dekan FH&#8208;IPK Prof. Sujono Hadinoto, SH, bidang ilmu yang tercakup dalam Bagian Ilmu Pengetahuan Kemasyarakatan secara resmi diperluas sehingga meliputi 6 (enam) jurusan yaitu Ilmu Publisistik, Ilmu Politik, Ilmu Administrasi, Sosiologi, Kriminologi, dan Ilmu Kesejahteraan Sosial.<br/>\n<br/>\nBerdasarkan Surat Keputusan Direktur Jenderal Perguruan Tinggi No. 42 tahun 1968, secara resmi Bagian Ilmu Pengetahuan Kemasyarakatan dipisahkan dari Fakultas Hukum dan Ilmu Pengetahuan Kemasyarakatan (FH IPK) dan mulai tanggal 1 Februari 1968 statusnya ditingkatkan menjadi Fakultas Ilmu Pengetahuan Kemasyarakatan Universitas Indonesia (FIPK UI) Universitas Indonesia yang berdiri sendiri. Sebagai Dekan pertama diangkat Prof. Dr. Selo Soemardjan untuk menjadi masa jabatan dua tahun.<br/>\n<br/>\nPada tahun 1970 dirasakan adanya kebutuhan untuk menyeragamkan nama dari fakultas&#8208;fakultas yang bergerak dalam bidang ilmu&#8208;ilmu sosial. Sehubungan dengan hal itu, dalam rapat sub konsorsium ilmu&#8208;ilmu sosial yang diselenggarakan pada tanggal 4&#8208;5 Agustus 1970, diusulkan perubahan nama menjadi Fakultas Ilmu&#8208;ilmu Sosial. Rapat ini dihadiri wakil&#8208;wakil dari Universitas Indonesia, Universitas Gadjah Mada, Universitas Hasanuddin, dan Universitas Padjadjaran. Sesuai dengan keputusan rapat, nama Fakultas Ilmu Pengetahuan Kemasyarakatan Universitas Indonesia kemudian berubah menjadi Fakultas Ilmu&#8208;ilmu Sosial Universitas Indonesia melalui Surat Keputusan Rektor Universitas Indonesia No.002/SK/R/BR/72. Status Fakultas Ilmu&#8208;ilmu Sosial Universitas Indonesia (FIS UI) sebagai salah satu yang berdiri sendiri diperkuat dengan Keputusan Menteri Pendidikan dan Kebudayaan No. 31/C/1972.<br/>\n<br/>\nPada tahun 1982 nama Fakultas Ilmu&#8208;Ilmu Sosial Universitas Indonesia (FIS UI) diubah menjadi Fakultas Ilmu Sosial dan Ilmu Politik Universitas Indonesia (FISIP UI) berdasarkan Keputusan Presiden Republik Indonesia No.44 tahun 1982. Pada saat yang sama, sistem kredit semester (SKS) mulai diterapkan dalam kurikulum fakultas, dan tiga program studi di jurusan sosiologi direstrukturisasi menjadi jurusan yang berdiri sendiri. Dengan demikian pada tahun 1982 ini FISIP UI memiliki 6 jurusan yaitu: Ilmu Komunikasi, Ilmu Politik, Ilmu Administrasi, Sosiologi, Kriminologi, dan ilmu Kesejahteraan Sosial.<br/>\n<br/>\nSetahun kemudian, yakni pada tahun 1983, jumlah jurusan di FISIP UI bertambah satu lagi dengan berpindahnya Jurusan Antropologi yang semula menjadi bagian Fakultas Sastra Universitas Indonesia ke FISIP UI. Pada tahun 1985, Jurusan Ilmu Hubungan Internasional dibuka sebagai pengembangan Program Studi Hubungan Internasional dan Kawasan dari Jurusan Ilmu Politik.<br/>\n<br/>\nBerdasarkan Keputusan Dekan nomor 007 tanggal 13 Januari 1995, FISIP memperluas program jenjang sarjana dengan membuka Program Sarjana Ekstensi. Kebijakan pembentukan Program Ekstensi ini diperkuat dengan Surat Keputusan Rektor Universitas Indonesia nomor 144/SK/R/UI/1995 tertanggal 29 Desember 1995. Secara resmi Program Ekstensi FISIP UI menerima mahasiswa angkatan pertama pada bulan Juni 1995 untuk Tiga program studi, yakni: Program Ilmu Komunikasi, Program Ilmu Politik, dan Program Ilmu Administrasi. Pada tahun 1997, dibuka Program Ekstensi Kriminologi.<br/>\n<br/>\nSejak tahun 2003, istilah jurusan di FISIP UI diubah menjadi departemen. Dengan demikian, sampai saat ini, FISIP UI memiliki 8 (delapan) departemen, yaitu Departemen Ilmu Komunikasi, Departemen Ilmu Politik, Departemen Ilmu Administrasi, Departemen Sosiologi, Departemen Kriminologi, Departemen Ilmu Kesejahteraan Sosial, Departemen Antropologi, dan Departemen Ilmu Hubungan Internasional.<br/>\n<br/>\nDari sejak berdirinya hingga sekarang ini, FISIP UI telah dipimpin oleh sepuluh dekan, yang berturut&#8208;turut adalah:<br/>\n1. Prof. Dr. Selo Soemardjan, alm (1968&#8208;1974)<br/>\n2. Prof. Dr. Hc. Miriam Budiardjo, MA, alm (1974&#8208;1979)<br/>\n3. Prof. Dr. R. Tobias Soebekti, MPA. Alm (1979&#8208;1982)<br/>\n4. Prof. Dr. Manasse Malo, alm (1982&#8208;1988)<br/>\n5. Prof. Dr. Juwono Sudarsono, MA. ( 1988&#8208;1994)<br/>\n6. Prof. Dr. Muhammad Budyatna (1994&#8208;1998)<br/>\n7. Prof. Kamanto Sunarto, SH, Ph,D. (1998&#8208;2001)<br/>\n8. Prof. Dr. Martani Huseini (2001&#8208;2003)<br/>\n9. Prof. Dr. der Soz. Gumilar Rusliwa Somantri (2003&#8208;2008)<br/>\n10. Prof. Dr. Bambang Shergi Laksmono, MSc (2008&#8208;2013)\n</span>\n', 'Fakultas Ilmu Sosial & Ilmu Politik', 1, 13, 'FISIP.png'),
(35, 4, '<p>Terbentuknya Fakultas Kesehatan Masyarakat Universitas Indonesia merupakan prakasa Doktor Mochtar, Kepala Departemen Kesehatan Masyarakat dan Komunitas Kedokteran FKUI. Bekerjasama dengan USAID, program yang pertama kali ditawarkan adalah SKM yang setara dengan Magister Kesehatan Masyarakat.</p>\n<p>Berdasarkan Surat Keputusan Menteri Perguruan Tinggi dan Ilmu Pengetahuan No. 26 Tahun 1965 tanggal 26 Februari 1965, diputuskan bahwa Fakultas Kesehatan Masyarakat dibentuk di bawah naungan Universitas Indonesia. Kemudian melalui Surat Keputusan Menteri Perguruan Tinggi dan Ilmu Pengetahuan No. 153 Tahun 1965, ditetapkan tanggal berdirinya FKM UI yaitu pada tanggal 1 Juli 1965.</p>\n<p>Pada tahun 1987 Program Sarjana Kesehatan Masyarakat dibuka guna memenuhi syarat sebagai fakultas sesuai dengan Undang-Undang Pendidikan di Indonesia. Selanjutnya sejak 1990 FKM UI menawarkan pendidikan magister di bidang Ilmu Kesehatan Masyarakat diikuti dengan dibukanya program magister lain seperti Kajian Administrasi Rumah Sakit, Epidemiologi dan Keselamatan dan Kesehatan Kerja. Pada tahun 1994 FKM UI membuka Diploma III (suatu program vokasi 3 tahunan setelah pendiidkan SMA dalam berbagai bidang kesehatan). Namun untuk memenuhi tuntutan visi universitas yang lebih mengedepankan riset dan menjadi universitas kelas dunia program tersebut ditutup pada tahun 2004. Saat ini program diploma di tingkat universitas diampu oleh Fakultas Vokasi UI.</p>\n<p>Di tahun 2013 FKM UI telah berkembang menjadi penyedia jasa pendidikan kesehatan masyarakat mulai dari Program Sarjana, Magister dan Doktor, serta memiliki 12 pusat kajian, 7 departemen dan 2 kelompok studi.</p>\n<p>Sesuai dengan tuntutan zaman dan perubahan yang tidak bisa dihindari, dengan menyandang predikat sebagai fakultas tertua dalam bidang kesehatan masyarakat, FKM UI terus melakukan perbaikan dan mengevaluasi diri agar tetap menjadi yang terdepan dalam ilmu kesehatan masyarakat</p>', 'Fakultas Kesehatan Masyarakat', 1, 13, 'FKM.png'),
(37, 3, '<p style="text-align: justify;">SIMAK adalah seleksi masuk Universitas Indonesia berupa ujian tulis yang terpadu untuk berbagai jenjang pendidikan dan program pendidikan. Pada artikel ini hanya membahas SIMAK UI untuk lulusan SMA/Sederajat. Bagi pendaftar lulusan SMA/Sederajat yang lulus sekolah melalui Ujian Nasional,&nbsp;<strong>atau</strong>&nbsp; memiliki&nbsp;ijasah Paket C&nbsp;<strong>atau</strong>&nbsp;memiliki sertifikat&nbsp;A Level&nbsp;<strong>atau&nbsp;</strong>IB Diploma&nbsp;<strong>atau</strong>&nbsp;sudah mendapatkan surat penyetaraan dari Departemen Pendidikan Nasional&nbsp;dapat mengikuti SIMAK UI.</p>\r\n<p style="text-align: justify;">Program pendidikan yang dapat dipilih pada jalur masuk SIMAK terdiri dari jenjang Vokasi (D3), S1 Reguler, S1 Paralel dan S1 Kelas Internasional. Peserta dapat memilih program Vokasi (D3), S1 Reguler dan S1 Paralel sekaligus hanya dengan satu kali ujian pada tanggal 22 Juni 2014. Bagi peserta yang memilih program S1 kelas Internasional mengikuti ujian di waktu yang berbeda yakni tanggal 15 Juni 2014. Jika peserta ingin mendaftar S1 Kelas Internasional sekaligus dengan program pendidikan lainnya, maka peserta membuat 2 pendaftaran dalam 1&nbsp;<em>account</em>.</p>\r\n<h3 class="heading-more open">&nbsp;</h3>\r\n<h3 class="heading-more open">Jadwal Pendaftaran</h3>\r\n<div class="learn-more-content" style="visibility: visible; display: block;">\r\n<p>Pendaftaran online di http://penerimaan.ui.ac.id tanggal 5 Mei &ndash; 6 Juni 2014</p>\r\n<p>Ujian S1 Kelas Internasional tanggal 15 Juni 2014</p>\r\n<p>Ujian Vokasi(D3), S1 Reguler, S1 Paralel tanggal 22 Juni 2014</p>\r\n<p>Pengumuman online di http://penerimaan.ui.ac.id tanggal&nbsp;23 Juli 2014</p>\r\n<p>&nbsp;</p>\r\n<h3 class="heading-more open">Alur Pendaftaran</h3>\r\n<h3 class="heading-more open"><img title="Alur Pendaftaran Simak UI" src="http://simak.ui.ac.id/wp-content/uploads/2014/04/Alur-Pendaftaran-S1.jpg" alt="Alur Pendaftaran Simak UI" width="900" height="636" /></h3>\r\n<p>&nbsp;</p>\r\n<h3 class="heading-more open">Biaya Pendaftaran</h3>\r\n<div class="learn-more-content" style="visibility: visible;">\r\n<p style="text-align: justify;">Biaya pendaftaran SIMAK UI S1 Vokasi (D3)/Reguler/S1 Paralel sebesar Rp.300.000 untuk 2 pilihan pertama. Jika peserta hanya memilih 1 prodi tetap membayar Rp.300.000. Setiap tambah prodi/jurusan selanjutnya dikenakan tambahan Rp. 50.000/prodi. Jika siswa memilih prodi kelompok IPA dan IPS sekaligus (IPC) maka dikenakan tambahan Rp. 50.000.</p>\r\n<p style="text-align: justify;">Ketentuan pemilihan prodi yakni Vokasi maksimal 3 pilihan, S1 Reguler maksimal 3 pilihan dan S1 Paralel maksimal 3 pilihan. Total maksimal pilihan adalah 8 program studi, bukan 9 pilihan. Jadi dalam satu formulir pendaftar dapat memilih beberapa prodi dari program pendidikan yang berbeda sekaligus. Prodi yang dipilih dapat berupa kelompok IPA seluruhnya, atau prodi kelompok IPS seluruhnya, atau terdiri dari beberapa prodi kelompok IPA dan prodi kelompok IPS sekaligus (IPC).</p>\r\n<p style="text-align: justify;">Biaya pendaftaran SIMAK UI S1 Kelas Internasional sebesar Rp. 1.000.000 untuk 1 pilihan. Pendaftar S1 Kelas Internasional hanya dapat memilih 1 program studi. Jika peserta mendaftar S1 Reguler/S1 Paralel/Vokasi sekaligus mendaftar S1 Kelas Internasional, maka dalam 1 account peserta membuat 2 pendaftaran dan mendapat 2 nomer pendaftaran. Biaya pendaftaran dibayarkan ke masing-masing no.pendaftaran tersebut. Panduan cara pembayaran dapat dilihat disini.</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n<h3 class="heading-more open">Jadwal dan Materi Ujian</h3>\r\n</div>\r\n<div class="learn-more-content" style="visibility: visible;">\r\n<p>Materi Ujian SIMAK UI Vokasi (D3), S1 Reguler dan S1 Paralel dan terdiri dari:</p>\r\n<p>07.30 &ndash; 09.30 Kemampuan IPA (KA): Matematika IPA, Fisika, Kimia, Biologi, dan IPA Terpadu</p>\r\n<p>10.30 &ndash; 12.30 Kemampuan Dasar (KD): Matematika Dasar, Bahasa Indonesia, dan Bahasa Inggris</p>\r\n<p>13.30 &ndash; 14.30 Kemampuan IPS (KS): Ekonomi, Sejarah, Geografi, dan IPS Terpadu</p>\r\n<p>Kelompok IPA mengikuti ujian KA dan KD</p>\r\n<p>Kelompok IPS mengikuti ujian KD dan KS</p>\r\n<p>Kelompok IPC mengikuti ujian KA dan KD dan KS</p>\r\n<p>&nbsp;</p>\r\n<p>Materi ujian SIMAK S1 Kelas Internasional terdiri dari :</p>\r\n<p>07.30 &ndash; 09.30 Kemampuan IPA : Mathematics for Natural Science, Biology, Physics, Chemistry, and Integrated Natural Sciences</p>\r\n<p>07.30 &ndash; 09.30 Kemampuan IPS : Basic Mathematics, Economy, Indonesia and The World A, Indonesia and The World B, and Integrated Social Sciences</p>\r\n<p>&nbsp;</p>\r\n<h3 class="heading-more open">Perlengkapan Ujian</h3>\r\n<div class="learn-more-content" style="visibility: visible;">\r\n<p>- Alat tulis: pensil 2B, penghapus, pulpen</p>\r\n<p>- Kartu ujian</p>\r\n<p>Pakaian pada saat ujian bebas rapi dan sopan.</p>\r\n<p>&nbsp;</p>\r\n<h3 class="heading-more open">Lokasi Ujian</h3>\r\n<div class="learn-more-content" style="visibility: visible;">\r\n<p style="text-align: justify;">Lokasi ujian SIMAK 22 Juni 2014 menggunakan sekolah-sekolah yang tersebar di beberapa kota besar di Indonesia, yakni:&nbsp;Jakarta Pusat/Timur/Selatan, Depok (<strong>bukan di kampus UI</strong>&nbsp;<strong>Depok</strong>), Bekasi, Tangerang Selatan, Serang, Bogor, Bandung, Cirebon, Jogjakarta, Surabaya, Makasar, Balikpapan, Medan, Padang, Bukittinggi, Pekanbaru, Palembang.</p>\r\n<p style="text-align: justify;">Lokasi ujian SIMAK Kelas Internasional 15 Juni 2014 di Kampus UI Depok.</p>\r\n<p style="text-align: justify;">&nbsp;</p>\r\n<p style="text-align: right;">sumber : simak.ui.ac.id</p>\r\n</div>\r\n</div>\r\n</div>', 'Simak UI 2014', 1, 13, 'image8.png');
INSERT INTO `konten` (`id`, `idcategory`, `isi`, `judul`, `isPublished`, `idAdmin`, `imagepath`) VALUES
(38, 3, '<div class="middlecol">\r\n<div class="soc">&nbsp;</div>\r\n<p>Proses pendaftaran Universitas Indonesia terdiri dari 9 tahap</p>\r\n<ol class="steps">\r\n<li>Membuat <strong><a href="http://penerimaan.ui.ac.id/id/register"><em>account</em></a></strong>di situs penerimaan UI\r\n<p class="small">Klik <em>link</em> <strong>Buat Account</strong> di kanan atas lalu isi formulir yang muncul</p>\r\n</li>\r\n<li>Mengunggah <strong>foto</strong>berwarna ukuran 4x6 cm\r\n<p class="small">Anda harus mengunggah foto sebelum dapat membuat pendaftaran</p>\r\n</li>\r\n<li>Membuat <strong>pendaftaran</strong>\r\n<p class="small">Anda dapat <em>login</em> menggunakan <em>username</em> dan <em>password</em> Anda, lalu pilih menu <strong>Buat Pendaftaran</strong> untuk membuat pendaftaran baru.</p>\r\n</li>\r\n<li>Melakukan <strong>verifikasi pendaftaran</strong>\r\n<p class="small">Verifikasi dilakukan untuk memastikan Anda telah mengecek bahwa isian formulir pendaftaran dan pilihan program studi Anda telah terisi dengan data yang benar serta telah mengetahui biaya pendidikan untuk program studi yang dipilih</p>\r\n</li>\r\n<li>Membayar <strong>biaya pendaftaran</strong>\r\n<p class="small">Biaya pendaftaran hanya dapat dibayarkan setelah Anda meng-<em>upload</em> foto dan melakukan verifikasi pendaftaran . <br /> <strong>Formulir pendaftaran dan pilihan program studi tidak dapat diubah lagi setelah Anda membayar biaya pendaftaran.</strong></p>\r\n</li>\r\n<li>Meng-<em>upload</em> <strong>berkas persyaratan</strong>pendaftaran\r\n<p class="small">Khusus untuk pendaftar Program Pascasarjana (S2, S3), Profesi, Spesialis, S1 Ekstensi dan yang memilih S1 Kelas Internasional</p>\r\n</li>\r\n<li>Meng-<em>download</em> <strong>kartu ujian masuk</strong>\r\n<p class="small">Kartu ini harus dibawa ketika ujian seleksi masuk</p>\r\n</li>\r\n<li>Mengikuti <strong>ujian seleksi masuk</strong> pada waktu yang telah ditentukan</li>\r\n<li>Setelah mengikuti ujian seleksi masuk, Anda dapat melihat hasil seleksi pada tanggal pengumuman</li>\r\n</ol>\r\n<p>Keterangan tambahan dapat dilihat pada panduan pendaftaran masing-masing jalur penerimaan di menu sebelah kiri.</p>\r\n<h3 class="coltitle">Cara Pembayaran Biaya Pendaftaran</h3>\r\n<p>Pembayaran biaya pendaftaran dilakukan melalui mekanisme <em>Host-to-host</em> Universitas Indonesia, dimana pendaftar dapat membayar biaya pendaftaran melalui ATM/Teller/Internet Banking beberapa bank seperti tertera pada daftar di bawah.</p>\r\n<p><strong>Pembayaran hanya dapat dilakukan setelah Anda mengunggah foto.<br /> Biaya pendaftaran yang sudah dibayarkan tidak dapat dikembalikan.</strong></p>\r\n<h4>Pilihan Cara Pembayaran</h4>\r\n<ul>\r\n<li>ATM: Bank BNI, Bank Permata, Bank Bukopin, Bank Mandiri, Bank BRI, Bank CIMB Niaga</li>\r\n<li><em>Internet Banking</em>: Bank Mandiri, Bank CIMB Niaga</li>\r\n<li>Teller: Bank BNI, Bank BTN, Bank CIMB Niaga, Bank Mandiri</li>\r\n<li>Self Service Terminal (SST): Bank CIMB Niaga</li>\r\n</ul>\r\n<h4>Cara Pembayaran Melalui ATM</h4>\r\n<h5>Bank BNI</h5>\r\n<ul>\r\n<li>Pilih menu <strong>Pembayaran</strong></li>\r\n<li>Pilih menu <strong>Berikutnya</strong></li>\r\n<li>Pilih menu <strong>Universitas</strong></li>\r\n<li>Pilih menu <strong>UI/Universitas Indonesia</strong></li>\r\n<li>Masukkan 9 angka nomor registrasi untuk <em>input</em> NPM (Nomor Pokok Mahasiswa)</li>\r\n<li>Layar akan menampilkan nomor registrasi, nama pendaftar, dan jumlah biaya yang akan dibayar</li>\r\n<li>Tekan "Ya/Benar" untuk melakukan pembayaran</li>\r\n</ul>\r\n<h5>ATM Bank Permata</h5>\r\n<ul>\r\n<li>Pilih menu <strong>Transaksi Lainnya</strong></li>\r\n<li>Pilih menu <strong>Pembayaran</strong></li>\r\n<li>Pilih menu <strong>Pendidikan</strong></li>\r\n<li>Masukkan nomor pelanggan sebagai berikut: Kode Institusi + Nomor Registrasi<br /> Contoh:<br /> 050 Kode Institusi UI<br /> 708000001 Nomor Registrasi</li>\r\n<li>Selanjutnya ikuti petunjuk pada mesin ATM</li>\r\n</ul>\r\n<h5>Bank Bukopin</h5>\r\n<ul>\r\n<li>Pilih menu Pembayaran</li>\r\n<li>Pilih menu Pendidikan</li>\r\n<li>Pilih menu Universitas Indonesia</li>\r\n<li>Masukkan nomor pendaftaran sebagai Nomor Pokok Mahasiswa</li>\r\n<li>Selanjutnya ikuti petunjuk pada mesin ATM</li>\r\n</ul>\r\n<h5>Bank Mandiri</h5>\r\n<ul>\r\n<li>ATM\r\n<ul>\r\n<li>Pilih menu Pembayaran/Pembelian</li>\r\n<li>Pilih Multi Payment</li>\r\n<li>Masukkan kode perusahaan 10003 (UI) lalu tekan BENAR</li>\r\n<li>Masukkan 9 angka nomor registrasi lalu tekan tombol BENAR</li>\r\n<li>Layar akan menampilkan identitas dan jumlah pembayaran; tekan 1 jika data sesuai</li>\r\n<li>Untuk melakukan eksekusi, tekan "YA", untuk pembatalan tekan "TIDAK"</li>\r\n</ul>\r\n</li>\r\n<li>Teller\r\n<ul>\r\n<li>Isi blanko <em>Multi Payment</em> dengan mencantumkan nomor pendaftaran dan nama pendaftar dengan tujuan pembayaran Universitas Indonesia</li>\r\n<li>Serahkan blanko ke teller untuk memproses pembayaran</li>\r\n</ul>\r\n</li>\r\n<li>Internet Banking\r\n<ul>\r\n<li>Login dengan User ID dan Password</li>\r\n<li>Pilih menu Pembayaran</li>\r\n<li>Pilih menu Pendidikan</li>\r\n<li>Pilih rekening yang akan digunakan untuk membayar</li>\r\n<li>Pilih Penyedia jasa: <strong>10003 Universitas Indonesia</strong></li>\r\n<li>Masukkan nomor pendaftaran Anda di isian Nomor Mahasiswa</li>\r\n<li>Klik "Lanjutkan", cek informasi yang muncul. Jika telah sesuai, masukan PIN yang degenerate oleh Token ke field yang tersedia. Pilih "Kirim"</li>\r\n<li>Muncul bukti validasi dari system, print atau save untuk digunakan sebagai bukti.</li>\r\n</ul>\r\n</li>\r\n</ul>\r\n<h5>Teller BNI atau BTN</h5>\r\n<ul>\r\n<li>Tanpa isi blanko langsung ke Teller minta "Host to Host Universitas Indonesia" atau "Online dengan BNI UI Depok"</li>\r\n<li>Sebutkan No pendaftaran</li>\r\n</ul>\r\n<h5>ATM BRI</h5>\r\n<ul>\r\n<li>Pilih menu <strong>transaksi lainnya</strong></li>\r\n<li>Pilih menu <strong>Pembayaran</strong></li>\r\n<li>Pilih <strong>Pendidikan</strong></li>\r\n<li>Pilih kode <strong>(UI: 008)</strong></li>\r\n<li>Masukkan kode UI bersama 9 angka nomor pendaftaran (contoh: 008123456789)</li>\r\n<li>Pilih Yes/OK</li>\r\n</ul>\r\n<h5>Bank CIMB Niaga</h5>\r\n<ul>\r\n<li>Pembayaran melalui ATM dan <em>Self-Service Terminal</em>(SST)<ol>\r\n<li><strong>Khusus ATM</strong>: Pilih menu <strong>Pilihan Transaksi</strong></li>\r\n<li>Pilih menu <strong>Pembayaran</strong></li>\r\n<li>Pilih menu <strong>Lanjut</strong></li>\r\n<li>Pilih menu <strong>Pendidikan Online</strong></li>\r\n<li>Pilih menu <strong>Universitas Indonesia</strong></li>\r\n<li>Masukkan <strong>9 digit nomor pendaftaran</strong></li>\r\n<li>Layar akan menampilkan identitas pendaftar, pastikan nama yang muncul adalah nama Anda</li>\r\n<li>Untuk melakukan pembayaran tekan "<strong>Proses</strong>", untuk pembatalan tekan "<strong>Batal</strong>"</li>\r\n</ol></li>\r\n<li>Pembayaran melalui <em>Teller</em><ol>\r\n<li>Isi blanko setoran dengan mencantumkan <strong>nomor pendaftaran</strong> dan <strong>nama pendaftar</strong></li>\r\n<li>Serahkan blanko ke <em>teller</em> untuk memproses pembayaran</li>\r\n</ol></li>\r\n<li>Pembayaran melalui CIMB <em>Clicks</em><ol>\r\n<li>Akses web Cimb <em>Clicks</em> di <a href="http://www.cimbclicks.co.id/">www.cimbclicks.co.id</a></li>\r\n<li>Masukkan User Id dan Password untuk log-in</li>\r\n<li>Pilih Menu "Bayar Tagihan"</li>\r\n<li>Pilih rekening sumber dana yang diinginkan</li>\r\n<li>Pilih Jenis Pembayaran &ndash; "Pendidikan"</li>\r\n<li>Pilih "Universitas Indonesia" pada kolom Nama Tagihan</li>\r\n<li>Masukkan Nomor Pendaftaran</li>\r\n<li>Layar konfirmasi akan menampilkan semua informasi pembayaran, Pastikan data pembayaran telah sesuai, masukkan mPIN.</li>\r\n<li>Bila transaksi berhasil, Simpan resi pembayaran sebagai bukti pembayaran yang sah.</li>\r\n</ol></li>\r\n</ul>\r\n<h4>Catatan</h4>\r\n<ul>\r\n<li>Pastikan Anda memasukkan nomor registrasi yang benar</li>\r\n<li>Periksa kesesuaian nama pendaftar yang muncul pada layar ATM</li>\r\n<li>Periksa kesesuaian jumlah biaya yang ditagihkan</li>\r\n<li>Simpan resi pembayaran ATM sebagai bukti pembayaran</li>\r\n<li>Periksa status pembayaran anda di situs penerimaan, dengan login, lihat pendaftaran</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p style="text-align: right;">sumber : penerimaan.ui.ac.id</p>\r\n</div>', 'Panduan Pendaftaran', 1, 13, 'image2.png'),
(39, 3, '<p style="text-align: justify;">Biaya Operasional Pendidikan merupakan komponen biaya penyelenggaraan kegiatan pembelajaran yang dibayarkan setiap semester oleh mahasiswa. Bagi mahasiswa program pendidikan S1 Reguler dari berbagai jalur masuk (SIMAK, SNMPTN dan SBMPTN) memiliki kesempatan untuk memilih skema Biaya Operasional Pendidikan Berkeadilan atau disingkat dengan BOP B. Skema ini memungkinkan mahasiswa membayar biaya pendidikan sesuai dengan kemampuan bayar orang tua, wali atau penanggung biaya pendidikan mahasiswa.<br /> Besaran&nbsp;BOP B yang dibayar per semester minimal Rp 100.000 dan maksimal Rp 5.000.000 untuk program studi kelompok IPS yakni&nbsp;FIB, FISIP, FPsi, FH, FE. Sedangkan&nbsp;untuk program studi kelompok IPA &nbsp;yakni&nbsp;FK, FKG, FT, FASILKOM, FKM, FMIPA, FIK, F.Farmasi&nbsp;minimal Rp 100.000 dengan maksimal Rp 7.500.000.</p>\r\n<p style="text-align: justify;">Penetapan besaran BOP B dilakukan setelah peserta melengkapi persyaratan ketika dinyatakan diterima sebagai mahasiswa S1 Reguler. Adapun kelengkapan yang menjadi pertimbangan penetapan adalah dengan mengisi formulir isian pengajuan BOP B yang disertai berkas pendukung yang antara lain terdiri dari:</p>\r\n<p>1. Surat keterangan dari lingkungan tempat tinggal<br /> 2. Bukti penghasilan perbulan/pertahun<br /> 3. Bukti pengeluaran perbulan/pertahun<br /> 4. dan sebagainya.</p>\r\n<p style="text-align: justify;">Formulir dan keterangan detail hanya muncul di akun pengumuman setelah seseorang dinyatakan diterima di S1 Reguler dan memilih skema BOP B &nbsp;sebagai skema pembayaran biaya pendidikan.</p>\r\n<p style="text-align: justify;">&nbsp;</p>\r\n<p style="text-align: right;">sumber : simak.ui.ac.id</p>', 'BOP Berkeadilan', 1, 13, 'image9.png'),
(40, 3, '<p style="text-align: justify;">Universitas Indonesia (UI) membebaskan uang pangkal bagi mahasiswa baru program pendidikan S1 Reguler tahun akademik 2014/2015. Pembebasan uang pangkal bagi mahasiswa program pendidikan S1 Reguler dimungkinkan karena kebijakan UI untuk mengalokasikan beban biaya uang pangkal dari dana BOPTN (Bantuan Operasional Perguruan Tinggi Negeri) yang diperoleh dari Kementerian Pendidikan dan Kebudayaan RI. Pada tahun akademik 2014/2015, seluruh mahasiswa baru program pendidikan S1 Reguler hanya akan dikenai Biaya Operasional Pendidikan Berkeadilan (BOP B) yang dibayar per semester minimal Rp 100.000 dengan maksimal Rp 5.000.000 untuk program studi kelompok IPS, atau minimal Rp 100.000 dengan maksimal Rp 7.500.000 untuk program studi kelompok IPA. Jumlah BOP B disesuaikan dengan kemampuan orang tua/wali mahasiswa sebagai penanggung biaya. Informasi BOP B dapat dilihat <a href="http://simak.ui.ac.id/uncategorized/simak.ui.ac.id/uncategorized/bop-berkeadilan.html">disini.</a></p>\r\n<p style="text-align: center;"><strong>Biaya pendidikan S1 Reguler SIMAK = S1 Reguler SBMPTN = S1 Reguler SNMPTN</strong></p>', 'S1 Reguler Bebas Uang Pangkal', 1, 13, 'image5.png'),
(41, 3, '<div class="post_content clearfix">\r\n<p style="text-align: justify;"><strong>Pendaftaran</strong> 12 Mei 2014 pukul 08.00 WIB &mdash; 6 juni 2014 pukul 22.00 WIB online di<a href="http://pendaftaran.sbmptn.or.id">&nbsp;http://pendaftaran.sbmptn.or.id</a></p>\r\n<p style="text-align: justify;">Panduan pendaftaran dapat dilihat di <a href="http://sbmptn.or.id/?mid=19">http://sbmptn.or.id</a></p>\r\n<p style="text-align: justify;"><strong>Biaya Pendaftaran</strong> : Rp. 100.000 (termasuk biaya ujian keterampilan bagi pendaftar prodi seni &amp; olahraga).<br /> - Biaya seleksi dibayarkan ke Bank Mandiri.<br /> - Jika dalam suatu daerah tidak ada kantor pelayanan Bank Mandiri, maka biaya seleksi dapat dibayarkan melalui Kantor Pos setempat atau ATM bersama.<br /> - Biaya seleksi yang sudah dibayarkan tidak dapat ditarik kembali dengan alasan apapun.</p>\r\n<p style="text-align: justify;"><strong>Peserta dapat memilih program studi</strong> sesuai dengan kelompok ujian yang diikuti, yaitu:<br /> - Kelompok ujian Saintek dapat memilih maksimal 3 (tiga) program studi dari kelompok program studi Saintek,<br /> - Kelompok ujian Soshum dapat memilih maksimal 3 (tiga) program studi dari kelompok program studi Soshum,<br /> - Kelompok ujian Campuran dapat memilih maksimal 3 (tiga) program studi yang merupakan campuran dari kelompok Saintek dan kelompok Soshum.<br /> - Peserta ujian yang hanya memilih 1 (satu) program studi dapat memilih program studi di PTN manapun.<br /> - Peserta ujian yang memilih 2 (dua) program studi atau lebih, salah satu pilihan program studi tersebut harus di PTN yang berada dalam satu wilayah dengan tempat peserta mengikuti ujian. Pilihan program studi yang lain dapat di PTN di luar wilayah tempat peserta mengikuti ujian.<br /> Daftar wilayah pendaftaran, program studi, daya tampung per PTN tahun 2014, dan jumlah peminat program studi per PTN tahun 2013 dapat dilihat di laman http://www.sbmptn.or.id mulai tanggal 14 April 2014. Urutan dalam pemilihan program studi menyatakan prioritas pilihan.</p>\r\n<p style="text-align: justify;"><strong>Jadwal ujian</strong> Tertulis</p>\r\n<p style="text-align: justify;">&nbsp;</p>\r\n<table id="wp-table-reloaded-id-49-no-1" style="border-color: #000000; border-width: 0px; border-style: solid;" border="0" rules="all" cellpadding="1">\r\n<thead>\r\n<tr class="row-1 odd"><th class="column-1">Tanggal</th><th class="column-2">Saintek</th><th class="column-3">Soshum</th><th class="column-4">Campuran (Saintek &amp; Soshum)</th></tr>\r\n</thead>\r\n<tbody>\r\n<tr class="row-2 even">\r\n<td class="column-1 rowspan-3" rowspan="3">Selasa, 17 Juni 2014</td>\r\n<td class="column-2">TKPA</td>\r\n<td class="column-3">TKPA</td>\r\n<td class="column-4">TKPA</td>\r\n</tr>\r\n<tr class="row-3 odd">\r\n<td class="column-2 rowspan-2" rowspan="2">TKD Saintek</td>\r\n<td class="column-3 rowspan-2" rowspan="2">TKD Soshum</td>\r\n<td class="column-4">TKD Saintek</td>\r\n</tr>\r\n<tr class="row-4 even">\r\n<td class="column-4">TKD Soshum</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br /> Tes Kemampuan dan Potensi Akademik (TKPA) terdiri dari Verbal, Numerikal, Figural, Matematika Dasar, Bahasa Indonesia, Bahasa Inggris.<br /> Tes Kemampuan Dasar Saintek (TKD Saintek) terdiri dari Matematika, Biologi, Kimia, dan Fisika.<br />Tes Kemampuan Dasar Sosial dan Humaniora (TKD Soshum) terdiri dari Sosiologi, Sejarah, Geografi, dan Ekonomi.\r\n<p>&nbsp;</p>\r\n<p style="text-align: justify;">Ujian Keterampilan<br /> * Ujian keterampilan diperuntukkan bagi peminat Program Studi bidang Seni dan Keolahragaan<br /> ** Universitas Indonesia tidak memiliki Program Studi bidang Seni dan Keolahragaan</p>\r\n<table id="wp-table-reloaded-id-50-no-1" style="border-width: 1px; border-style: solid;" border="0" rules="all" cellpadding="1">\r\n<thead>\r\n<tr class="row-1 odd"><th class="column-1">Tanggal</th><th class="column-2">Bidang Ilmu Seni</th><th class="column-3">Bidang Ilmu Olahraga</th></tr>\r\n</thead>\r\n<tbody>\r\n<tr class="row-2 even">\r\n<td class="column-1 rowspan-2" rowspan="2">Rabu dan/atau Kamis, 18 dan/atau 19 juni 2014</td>\r\n<td class="column-2">Tes pengetahuan bidang ilmu seni</td>\r\n<td class="column-3">Tes kesehatan</td>\r\n</tr>\r\n<tr class="row-3 odd">\r\n<td class="column-2">Tes keterampilan bidang ilmu seni</td>\r\n<td class="column-3">Tes kesegaran jasmani</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br />Ujian Keterampilan dapat diikuti di PTN terdekat yang memiliki program studi yang sesuai dengan pilihan peserta. Daftar PTN penyelenggara ujian keterampilan secara lengkap dapat dilihat pada http://www.sbmptn.or.id\r\n<p>&nbsp;</p>\r\n<p style="text-align: justify;"><strong>Pengumuman</strong> Hasil Ujian: Rabu, 16 Juli 2014 pukul 17.00 WIB di laman <a href="http://www.sbmptn.or.id">http://www.sbmptn.or.id</a></p>\r\n<p style="text-align: justify;"><strong>Info</strong> lebih lanjut dapat dilihat di : <a href="http://www.sbmptn.or.id">http://www.sbmptn.or.id</a><br /> Download&nbsp;<a href="http://simak.ui.ac.id/wp-content/plugins/download-monitor/download.php?id=38">Poster-SBMPTN-2014.pdf</a></p>\r\n<p style="text-align: right;"><!-- iframe plugin v.2.8 wordpress.org/plugins/iframe/ -->sumber : simak.ui.ac.id</p>\r\n</div>', 'SBMPTN 2014', 1, 13, 'image7.png'),
(42, 3, '<div class="post_content clearfix">\r\n<p>Seleksi Nasional Masuk Perguruan Tinggi Negeri (SNMPTN) adalah salah satu jalur masuk Universitas Indonesia untuk program pendidikan S1 REGULER. Jalur masuk ini didasarkan pada prestasi akademis siswa yang ditunjukkan dengan nilai rapor. Pengisian data nilai rapor siswa dilakukan oleh sekolah ke dalam sistem&nbsp;Pangkalan Data Sekolah dan Siswa (PDSS).</p>\r\n<p>Pendaftaran SNMPTN dilakukan secara online di <a href="https://web.snmptn.ac.id/">https://web.snmptn.ac.id/</a> mulai tanggal 17 Februari 2014 jam 08:00 &ndash; 31 Maret 2014 jam 23:59 WIB.</p>\r\n<p>Sebelum mendaftar yang harus dipersiapkan adalah:<br /> - data diri siswa<br /> - data diri orangtua/wali<br /> - foto berwarna terbaru dalam format .jpg dengan ukuran resolusi 400&times;600 pixel<br /> - membaca informasi persyaratan program studi <a href="https://web.snmptn.ac.id/ptn/31">disini</a><br /> - bagi peserta Bidikmisi, pastikan mengisi data di <a href="http://bidikmisi.dikti.go.id/">website Bidikmisi</a> sesuai dengan isian data di SNMPTN (Nama siswa, NISN, tgl.lahir, NPSN)</p>\r\n<p><strong>Biaya pendidikan <strong>S1 Reguler SNMPTN</strong>&nbsp;= S1 Reguler SBMPTN = <strong>&nbsp;S1 Reguler SIMAK&nbsp;</strong></strong>yakni bebas Uang Pangkal, hanya membayar Biaya Operasional Pendidikan (BOP) persemester. Universitas Indonesia (UI) membebaskan uang pangkal bagi mahasiswa baru program pendidikan S1 Reguler mulai tahun akademik 2013/2014. Pembebasan uang pangkal bagi mahasiswa program pendidikan S1 Reguler dimungkinkan karena kebijakan UI untuk mengalokasikan beban biaya uang pangkal dari dana BOPTN (Bantuan Operasional Perguruan Tinggi Negeri) yang diperoleh dari Kementerian Pendidikan dan Kebudayaan RI. Sejak tahun akademik 2013/2014, seluruh mahasiswa baru program pendidikan S1 Reguler hanya akan dikenai Biaya Operasional Pendidikan Berkeadilan (BOP-B) yang dibayar per semester minimal Rp 100.000 dengan maksimal Rp 5.000.000 untuk program studi kelompok IPS, atau minimal Rp 100.000 dengan maksimal Rp 7.500.000 untuk program studi kelompok IPA. Jumlah BOP-B disesuaikan dengan kemampuan orang tua/wali mahasiswa sebagai penanggung biaya.</p>\r\n<p>&nbsp;</p>\r\n<p style="text-align: right;">sumber : simak.ui.ac.id</p>\r\n</div>', 'SNMPTN 2014', 1, 13, 'image1.png'),
(43, 3, '<p style="text-align: justify;">Sebagai upaya meningkatkan kualifikasi akademik pendidik dan tenaga kependidikan Direktorat Jenderal Pendidikan Tinggi kembali membuka pendaftaran Beasiswa Pendidikan Pascasarjana Dalam Negeri (BPP-DN) untuk alokasi tahun 2014. Program beasiswa ini diperuntukkan bagi dosen tetap pada perguruan tinggi di lingkungan Kementerian Pendidikan dan Kebudayaan, tenaga kependidikan tetap pada perguruan tinggi negeri di lingkungan Kementerian Pendidikan dan Kebudayaan, PNS kantor Kopertis, dan PNS kantor pusat Ditjen Pendidikan Tinggi.</p>\r\n<p>Pendaftaran BPP-DN dilakukan secara <em>online</em> melalui laman <a href="http://beasiswa.dikti.go.id/bppdn/"><strong>http://beasiswa.dikti.go.id/bppdn </strong></a>dari tanggal 31 Maret &ndash; 30 Mei 2014.</p>\r\n<p>Untuk informasi lebih lanjut, silakan menghubungi alamat di bawah ini:<br /> Direktorat Pembinaan SDM UI<br /> Gedung PAU lantai 8<br /> Kampus UI Depok<br /> P : 021-7867222, 78841818 ext. 100342<br /> F : 021-78849063<br /> E : sdm-ui@ui.ac.id</p>', 'BPPDN 2014', 1, 13, 'image4.png'),
(44, 4, '<p></p>\n<div align="justify">Pendirian Fakultas Ilmu Komputer Universitas Indonesia tidak dapat dipisahkan dari pendirian Pusat Ilmu Komputer Universitas Indonesia (Pusilkom UI) pada tahun 1972. Lembaga ini didirikan dengan tujuan untuk mengembangkan ilmu komputer di Indonesia.</p>\n<p>Pemusatan sumber daya manusia, peralatan, dan fasilitas perpustakaan bidang ilmu komputer di Pusilkom UI mengakibatkan timbulnya desakan dari berbagai pihak kepada UI untuk menyelenggarakan program studi Ilmu Komputer. Dengan adanya sumber daya manusia yang telah dipersiapkan sebelumnya, baik melalui tugas belajar ke luar negeri maupun berbagai kegiatan pengembangan ilmu komputer yang dilakukan oleh stafnya, maka pada tahun 1986 Pusilkom UI mulai menyelenggarakan Program Studi Ilmu Komputer untuk jenjang S1, dilanjutkan dengan program studi yang sama untuk jenjang S2 pada tahun 1988. Semua program studi yang sudah ada kemudian bernaung di bawah Fakultas Ilmu Komputer UI (Fasilkom UI) yang secara resmi terbentuk pada tahun 1993.</p>\n<p>Dalam perkembangannya, Pusilkom UI kemudian menjadi unit usaha akademik Fasilkom UI pada tahun 2005. Unit ini merupakan wadah bagi para staf Fasilkom UI untuk melaksanakan kegiatan layanan dalam rangka pengabdian kepada masyarakat.</p>', 'Fakultas Ilmu Komputer', 1, 13, 'FASILKOM.png'),
(45, 4, '<p style="text-align: justify;"><a href="http://fik.ui.ac.id/new/wp-content/uploads/Gedung-lama.jpg"><img class="alignleft wp-image-2147118 size-full" src="http://fik.ui.ac.id/new/wp-content/uploads/Gedung-lama.jpg" alt="SONY DSC" width=1024 height=685 pagespeed_url_hash=4212992127 onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/></a>Sejarah lahirnya Fakultas Ilmu Keperawatan Universitas Indonesia (FIK UI) diawali dengan dibukanya Program Studi Ilmu Keperawatan yang berada di bawah Fakultas Kedokteran Universitas Indonesia. Landasan pendirian Program Studi ini karena tuntutan masyarakat yang meningkat terhadap pelayanan keperawatan profesional dan merujuk pada kebijaksanaan pengembangan tenaga kesehatan di Indonesia seperti tercantum dalam Sistem Kesehatan Nasional (SKN).</p>\n<p style="text-align: justify;">Dengan latar belakang pendidikan tinggi diharapkan dapat memberikan pengalaman belajar pada peserta didik untuk menumbuhkan dan membina sikap serta keterampilan profesional yang diperlukan sebagai seorang perawat profesional.</p>\n<p style="text-align: justify;">Pendirian Program Studi Ilmu Keperawatan (PSIK) merupakan hasil upaya bersama antara Departemen Pendidikan dan Kebudayaan, Departemen Kesehatan dan lembaga terkait lain yang pada bulan Januari 1983 telah melakukan Lokakarya Nasional Keperawatan yang menghasilkan rekomendasi untuk pengembangan tenaga keperawatan pada jenjang sarjana.</p>\n<p style="text-align: justify;">Fakultas Kedokteran Universitas Indonesia telah ditunjuk oleh Direktorat Pendidikan Tinggi Departemen Pendidikan dan Kebudayaan dengan SK Dirjen DIKTI No. 339/D2/1985 dan SK Dirjen DIKTI No. 07/DIKTI/Kep/1986 untuk menyelenggarakan pendidikan tinggi keperawatan dan merupakan pendidikan tinggi jenjang Sarjana yang pertama di Indonesia.</p>\n<p style="text-align: justify;">PSIK dimulai pada bulan Agustus 1985, menyelenggarakan dua jenis Program Strata I yaitu Program A menerima lulusan SMU dan Program B menerima lulusan D3 Keperawatan/AKPER. Untuk meningkatkan kesempatan bagi perawat yang bekerja mengikuti pendidikan, pada tahun akademik 1995 telah dibuka Program B Ekstensi yang diselenggarakan pada sore hari. Lama pendidikan untuk program A adalah 9 semester sedangkan program B adalah 5 semester dan lulusan kedua program ini adalah Sarjana Keperawatan yang disingkat S.Kp., dan lulusan telah memiliki kemampuan penuh sebagai perawat profesional.</p>\n<p style="text-align: justify;">Sesuai surat keputusan Menteri Pendidikan dan Kebudayaan RI nomor 0332/O/1995 tanggal 15 November 1995, PSIK telah disahkan menjadi Fakultas Ilmu Keperawatan Universitas Indonesia (FIK UI).</p>\n<p style="text-align: justify;">Pada tahun 1998, FIK UI menerapkan kurikulum Ners. Pada kurikulum Ners ini terdapat 2 (dua) tahap program pendidikan yaitu tahap program akademik dan tahap program profesi. Lulusan tahap akademik adalah Sarjana Keperawatan yang disingkat S.Kep., dan lulusan tahap profesi adalah Ners (sebagai perawat profesional). Penyebutan Program A, mulai tahun 2000 dinamakan Program Regular dan Program B menjadi Program Ekstensi yang diselenggarakan pada pagi dan sore hari.</p>\n<p style="text-align: justify;">Sejak bulan Oktober 2000, penyelenggaraan kegiatan pendidikan ilmu dasar dan ilmu keperawatan dasar terutama yang dikelola oleh Bagian Dasar Keperawatan dan Keperawatan Dasar dilaksanakan di kampus UI Depok. Pada Juli 2003, pembangunan gedung FIK UI Depok tahap II sedang dilanjutkan untuk menambah fasilitas pendidikan di kampus FIK UI Depok.</p>\n<p style="text-align: justify;">Sejak tahun 1996 FIK UI mempunyai 4 (empat) bagian yang terdiri dari :</p>\n<ul style="text-align: justify;">\n<li>Bagian Dasar Keperawatan &amp; Keperawatan Dasar</li>\n<li>Bagian Keperawatan Medikal Bedah</li>\n<li>Bagian Keperawatan Maternitas dan Anak</li>\n<li>Bagian Keperawatan Jiwa &amp; Maternitas.</li>\n</ul>\n<p style="text-align: justify;">Namun sejalan dengan perkembangan yang terjadi, khususnya terkait dengan UI sebagai BHMN, maka pada tahun 2004 FIK UI mengembangkan bagian menjadi kelompok keilmuwan keperawatan yang terdiri atas 6 (enam) kelompok keilmuwan yaitu:</p>\n<ol style="text-align: justify;">\n<li>Kelompok Keilmuwan Dasar Keperawatan &amp; Keperawatan Dasar,</li>\n<li>Kelompok Keilmuwan Keperawatan Medikal Bedah,</li>\n<li>Kelompok Keilmuwan Keperawatan Maternitas,</li>\n<li>Kelompok Keilmuwan Keperawatan Anak,</li>\n<li>Kelompok Keilmuwan Keperawatan Jiwa, dan</li>\n<li>Kelompok Keilmuwan Keperawatan Komunitas.</li>\n</ol>\n<p style="text-align: justify;">Untuk memenuhi kompleksitas pelayanan keperawatan yang bermutu, FIK UI membuka program pendidikan keperawatan pada jenjang Pascasarjana, yang dimulai dengan Program Magister Ilmu Keperawatan, Kekhususan Kepemimpinan dan Manajemen Keperawatan sejak Februari 1999 dan Program Spesialis Keperawatan Maternitas &amp; Keperawatan Komunitas sejak tahun 2003. Pada tahun 2005, kekhususan pada program Magister bertambah dengan Kekhususan Keperawatan Medikal Bedah dan Keperawatan Jiwa. Pada tahun 2008, FIK UI membuka Program Doktor yang merupakan program Doktor pertama dan satu-satunya di Indonesia. Sejak tahun 2014, sebutan Kelompok Keilmuan di FIK UI resmi berubah menjadi Departemen.</p>', 'Fakultas Ilmu Keperawatan', 1, 13, 'FIK.png'),
(46, 4, '<p>Farmasi merupakan suatu ilmu dan seni membuat obat dari bahan alam maupun sintetik yang cocok dan nyaman untuk didistribusikan serta digunakan dalam pencegahan dan pengobatan penyakit. Profesi ini memiliki pengetahuan tentang identifikasi, seleksi, preservasi, kombinasi, aksi farmakologi, analisis dan standardisasi obat dan bahan obat, serta cara distribusi, penyimpanan dan penggunaan yang tepat dan aman. Dengan perkataan lain, mereka yang berprofesi dalam bidang farmasi adalah seorang pakar obat yang menguasai ilmu dan pengetahuan tentang obat secara mendalam dari segala aspeknya.</p>\n<p>Farmasi UI didirikan dan mulai menerima mahasiswa angkatan pertama pada bulan September 1965. Jurusan yang semula berlokasi di Jl. Diponegoro Jakarta Pusat ini, tergabung dalam satu fakultas yang awalnya bernama Fakultas Ilmu Pasti dan Ilmu Alam (FIPIA) yang kemudian berdasarkan Kepres No. 44 tahun 1982 berubah menjadi Fakultas Matematika dan Ilmu Pengetahuan Alam (FMIPA). Pada tahun 1971- 1977 Jurusan Farmasi berlokasi di belakang Fakultas Ekonomi UI Jl. Salemba Raya No. 4 Jakarta Pusat, dan tahun 1977-1987 menempati gedung di belakang gedung Rektorat UI Jl. Salemba Raya No. 4 Jakarta Pusat. Pada tahun 1987, Jurusan Farmasi menempati gedung D FMIPA UI bersama Jurusan Matematika di Kampus Baru Universitas Indonesia, Depok. Sejak tahun 2000, di samping menempati gedung D, kegiatan administrasi Departemen Farmasi dipusatkan di Gedung C FMIPA UI.</p>\n<p>Pada saat kepindahan ke Depok (tahun 1987), Jurusan Farmasi baru mengelola Program Sarjana (S1) dan Program Apoteker dengan jumlah mahasiswa l.k. 200 orang dan jumlah dosen 30 orang.</p>\n<p>Dengan telah dikeluarkannya Peraturan Pemerintah Nomor 152 Tahun 2000, maka tahun 2001 merupakan awal era baru bagi Universitas Indonesia sebagai Badan Hukum Milik Negara (BHMN). Dengan status baru ini secara substansial seluruh Program Studi di lingkungan Universitas Indonesia mengalami perubahan mendasar, menjadi perguruan tinggi yang berbasis penelitian, dikelola secara lebih mandiri dan professional. Berdasarkan Keputusan Majelis Wali Amanat (MWA) Universitas Indonesia No. 01/SK/MWA-UI/2003, tanggal 18 Januari 2003, tentang ART-UI, maka Jurusan Farmasi FMIPA UI telah disesuaikan namanya menjadi Departemen Farmasi FMIPA UI.</p>\n<p>Selanjutnya guna menunjang pendirian Rumpun Ilmu Kesehatan yang terintegrasi di dalam lingkungan Universitas Indonesia, maka berdasarkan Keputusan Rektor Universitas Indonesia No. 2408A/SK/ R/2011, tanggal 29 November 2011, tentang Pembukaan Fakultas Farmasi Universitas Indonesia, maka Departemen Farmasi FMIPA UI berubah menjadi Fakultas Farmasi Universitas Indonesia (FF UI).</p>\n<p>Dewasa ini Fakultas Farmasi Universitas Indonesia mengelola 5 Program Studi dengan kekhususan sebagai berikut:<br/>\n1. Program Pendidikan Sarjana Farmasi,</p>\n<ul>\n<li>Program Pendidikan Sarjana Farmasi Reguler</li>\n<li>Program Pendidikan Sarjana Farmasi Nonreguler/Paralel</li>\n</ul>\n<p>2. Program Pendidikan Profesi Apoteker,</p>\n<p>3. Program Pendidikan Magister Ilmu Kefarmasian,</p>\n<ul>\n<li>Program Pendidikan Magister Farmasi kekhususan Biologi Farmasi</li>\n<li>Program Pendidikan Magister Farmasi kekhususan Farmasi Klinik</li>\n<li>Program Pendidikan Magister Farmasi kekhususan Kimia Farmasi</li>\n<li>Program Pendidikan Magister Farmasi kekhususan Teknologi Farmasi</li>\n</ul>\n<p>4. Program Pendidikan Magister Ilmu Herbal,</p>\n<ul>\n<li>Program Pendidikan Magister Ilmu Herbal kekhususan Herbal Medis</li>\n<li>Program Pendidikan Magister Ilmu Herbal kekhususan Herbal Estetika</li>\n<li>Program Pendidikan Magister Ilmu Herbal kekhususan Herbal Keperawatan</li>\n</ul>\n<p>5. Program Pendidikan Doktor Ilmu Farmasi</p>', 'Fakultas Farmasi', 1, 13, 'FARMASI.png'),
(47, 4, 'Pendidikan vokasi di Universitas Indonesia bertujuan menyiapkan peserta didik menjadi tenaga profesional pada bidang keahliannya. Terdapat 3 bidang/rumpun keahlian yaitu rumpun Kesehatan ; rumpun Pariwisata, Bisnis dan Perkantoran; rumpun Sain dan Teknologi. Saat ini terdapat 11 program studi, dan terus dikembangkan program studi lain untuk mengisi kebutuhan keterampilan-keterampilan khusus di industri dan pemerintahan. Program studi baru hanya dikembangkan untuk mengisi tenaga terampil pada bidang-bidang tertentu maupun lintas bidang studi sehingga lulusannya akan memiliki jalur karier yang spesifik dan hanya dapat diisi oleh para lulusan program vokasi.</p>\n<p style="text-align: justify;">Program vokasi merupakan pendidikan tinggi kejuruan diploma (D3 dan D4) dimana lulusannya diarahkan untuk menguasai kemampuan dalam bidang kerja tertentu sebagai tenaga kerja di industri, lembaga pemerintahan/swasta atau berwiraswasta. Pola pengajaran pada program ini lebih mengutamakan pada pengajaran keterampilan dan keahlian praktek dibandingkan dengan penguasaan teori. Para lulusan SMA ipa/ips dan SMK dapat mengikuti pendidikan ini agar dapat mengisi kebutuhan tenaga-tenaga ahli profesional di negeri sendiri dan di negara lain.</p>\n<p style="text-align: justify;">Program ini telah didukung oleh kerjasama antara Universitas Indonesia dengan industri-industri terkemuka di Indonesia untuk penyediaan kegiatan-kegiatan praktek lapangan dan magang. Oleh sebab itu, lulusannya sebagian besar langsung bekerja. Lama pendidikan vokasi di Universitas Indonesia ditempuh selama 3 tahun untuk program D3 dan pendidikan lanjutan 1 tahun untuk program D4 (<em>masih dalam proses</em>).</p>\n<p style="text-align: justify;">Untuk mengantisipasi persaiangan pasar kerja yang semakin ketat baik di Indonesia maupun di lingkungan negara-negara ASEAN, program vokasi Universitas Indonesia bekerjasama dengan beberapa Asosiasi Profesi untuk meningkatkan kemampuan para mahasiswanya melalui ujian sertifikasi profesi. Dengan demikian lulusan Program Vokasi Universitas Indonesia akan memiliki keunggulan karena selain mendapatkan ijazah Diploma juga dibekali Sertifikat Keahlian dari kerjasama antara Universitas Indonesia dan Asosiasi Profesi.</p>', 'Vokasi', 1, 13, 'VOKASI.png'),
(50, 3, '<p>Testing dulu</p>', 'Dummy News', 0, 13, '13.png'),
(64, 3, '<p>AAA</p>', 'AAA', 0, 13, '13.png');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=239 ;

--
-- Dumping data for table `opsi`
--

INSERT INTO `opsi` (`id`, `idsoal`, `isJawaban`, `nomor`, `pernyataan`) VALUES
(109, 27, 0, '0', '<p><img class="Wirisformula" src="http://siapmasukui.bl.ee/assets/80ce36fa/tiny_mce/plugins/tiny_mce_wiris/integration/showimage.php?formula=548bb060d59d08d3638a6feb73018275.png" alt="26 over 26 to the power of 8" align="middle" data-mathml="&laquo;math xmlns=&uml;http://www.w3.org/1998/Math/MathML&uml;&raquo;&laquo;mfrac&raquo;&laquo;mn&raquo;26&laquo;/mn&raquo;&laquo;msup&raquo;&laquo;mn&raquo;26&laquo;/mn&raquo;&laquo;mn&raquo;8&laquo;/mn&raquo;&laquo;/msup&raquo;&laquo;/mfrac&raquo;&laquo;/math&raquo;" /></p>'),
(110, 27, 1, '1', '<p><img class="Wirisformula" src="http://siapmasukui.bl.ee/assets/80ce36fa/tiny_mce/plugins/tiny_mce_wiris/integration/showimage.php?formula=8b7c754359100e233d9c6fe1a5ff6cfc.png" alt="52 over 26 to the power of 8" align="middle" data-mathml="&laquo;math xmlns=&uml;http://www.w3.org/1998/Math/MathML&uml;&raquo;&laquo;mfrac&raquo;&laquo;mn&raquo;52&laquo;/mn&raquo;&laquo;msup&raquo;&laquo;mn&raquo;26&laquo;/mn&raquo;&laquo;mn&raquo;8&laquo;/mn&raquo;&laquo;/msup&raquo;&laquo;/mfrac&raquo;&laquo;/math&raquo;" /></p>'),
(111, 27, 0, '2', '<p><img class="Wirisformula" src="http://siapmasukui.bl.ee/assets/80ce36fa/tiny_mce/plugins/tiny_mce_wiris/integration/showimage.php?formula=add7db0a85742462573460a5cd717bce.png" alt="fraction numerator 52 over denominator open parentheses begin display style 8 with 26 on top end style close parentheses end fraction" align="middle" data-mathml="&laquo;math xmlns=&uml;http://www.w3.org/1998/Math/MathML&uml;&raquo;&laquo;mfrac&raquo;&laquo;mn&raquo;52&laquo;/mn&raquo;&laquo;mfenced&raquo;&laquo;mstyle displaystyle=&uml;true&uml;&raquo;&laquo;mover&raquo;&laquo;mn&raquo;8&laquo;/mn&raquo;&laquo;mn&raquo;26&laquo;/mn&raquo;&laquo;/mover&raquo;&laquo;/mstyle&raquo;&laquo;/mfenced&raquo;&laquo;/mfrac&raquo;&laquo;/math&raquo;" /></p>'),
(112, 27, 0, '3', '<p><img class="Wirisformula" src="http://siapmasukui.bl.ee/assets/80ce36fa/tiny_mce/plugins/tiny_mce_wiris/integration/showimage.php?formula=08ac4479002682dd020e2e4a828ac659.png" alt="fraction numerator 26 over denominator open parentheses table row 26 row 8 end table close parentheses end fraction" align="middle" data-mathml="&laquo;math xmlns=&uml;http://www.w3.org/1998/Math/MathML&uml;&raquo;&laquo;mfrac&raquo;&laquo;mn&raquo;26&laquo;/mn&raquo;&laquo;mfenced&raquo;&laquo;mtable&raquo;&laquo;mtr&raquo;&laquo;mtd&raquo;&laquo;mn&raquo;26&laquo;/mn&raquo;&laquo;/mtd&raquo;&laquo;/mtr&raquo;&laquo;mtr&raquo;&laquo;mtd&raquo;&laquo;mn&raquo;8&laquo;/mn&raquo;&laquo;/mtd&raquo;&laquo;/mtr&raquo;&laquo;/mtable&raquo;&laquo;/mfenced&raquo;&laquo;/mfrac&raquo;&laquo;/math&raquo;" /></p>'),
(113, 27, 0, '4', '<p><img class="Wirisformula" src="http://siapmasukui.bl.ee/assets/80ce36fa/tiny_mce/plugins/tiny_mce_wiris/integration/showimage.php?formula=435e95d7b997363521fae6436252ac74.png" alt="1 over 8" align="middle" data-mathml="&laquo;math xmlns=&uml;http://www.w3.org/1998/Math/MathML&uml;&raquo;&laquo;mfrac&raquo;&laquo;mn&raquo;1&laquo;/mn&raquo;&laquo;mn&raquo;8&laquo;/mn&raquo;&laquo;/mfrac&raquo;&laquo;/math&raquo;" /></p>'),
(114, 28, 1, '0', '<p>inisiasi menyusui dini.</p>'),
(115, 28, 0, '1', '<p>pemberian ASI pada bayi yang lahir normal.</p>'),
(116, 28, 0, '2', '<p>manfaat program pemberian ASI eksklusif selama 6 bulan.</p>'),
(117, 28, 0, '3', '<p>kesuksesan program pemberian ASI eksklusif selama 6 bulan.</p>'),
(118, 28, 0, '4', '<p>kendala pelaksanaan program pemberian ASI eksklusif selama 6 bulan.</p>'),
(119, 32, 0, '0', '<p>Ini jawaban A[Edit jawaban A]</p>'),
(120, 32, 1, '1', '<p>Ini jawaban B[Edit jawaban B]</p>'),
(121, 32, 0, '2', '<p>Ini jawaban C[Edit jawaban C]</p>'),
(122, 32, 0, '3', '<p>Ini jawaban D[Edit jawaban D]</p>'),
(123, 32, 0, '4', '<p>Ini jawaban E[Edit jawaban E]</p>'),
(124, 33, 1, '0', '<p>Ini jawabannya</p>'),
(125, 33, 0, '1', '<p>Ini Bukan</p>'),
(126, 33, 0, '2', '<p>Ini juga bukan</p>'),
(127, 33, 0, '3', '<p>Ini juga bukan</p>'),
(128, 33, 0, '4', '<p>Apalagi Ini, juga bukan</p>'),
(129, 34, 0, '0', '<p>Halo</p>'),
(130, 34, 0, '1', '<p>Hai</p>'),
(131, 34, 1, '2', '<p>ini jawabannya</p>'),
(132, 34, 0, '3', '<p>Ini bukan jawaban</p>'),
(133, 34, 0, '4', '<p>bukan juga yang ini [jawaban]</p>'),
(134, 35, 0, '0', '<p>Ini jawaban A</p>'),
(135, 35, 1, '1', '<p>Ini jawaban B</p>'),
(136, 35, 0, '2', '<p>Ini jawaban C</p>'),
(137, 35, 0, '3', '<p>Ini jawaban D</p>'),
(138, 35, 0, '4', '<p>Ini jawaban E</p>'),
(139, 36, 1, '0', '<p>Ini Jawaban</p>'),
(140, 36, 0, '1', '<p>Ini bukan</p>'),
(141, 36, 0, '2', '<p>Bukan</p>'),
(142, 36, 0, '3', '<p>Bukan</p>'),
(143, 36, 0, '4', '<p>Bukan</p>'),
(144, 37, 0, '0', '<p>Kiri Bawah</p>'),
(145, 37, 0, '1', '<p>Kiri atas</p>'),
(146, 37, 1, '2', '<p>Kanan atas</p>'),
(147, 37, 0, '3', '<p>Kanan bawah</p>'),
(148, 37, 0, '4', '<p>ditengan homepage</p>'),
(149, 38, 0, '0', '<p>Opsi A</p>'),
(150, 38, 0, '1', '<p>Opsi B</p>'),
(151, 38, 1, '2', '<p>Opsi C&nbsp;</p>'),
(152, 38, 0, '3', '<p>Opsi D</p>'),
(153, 38, 0, '4', '<p>Opsi E</p>'),
(154, 39, 0, '0', '<p>Pilihan A</p>'),
(155, 39, 1, '1', '<p>Pilihan B</p>'),
(156, 39, 0, '2', '<p>Pilihan C</p>'),
(157, 39, 0, '3', '<p>Pilihan D</p>'),
(158, 39, 0, '4', '<p>Pilihan E</p>'),
(159, 40, 1, '0', '<p>Pilihan A</p>'),
(160, 40, 0, '1', '<p>Pilihan B</p>'),
(161, 40, 0, '2', '<p>Pilihan C</p>'),
(162, 40, 0, '3', '<p>Pilihan D</p>'),
(163, 40, 0, '4', '<p>Pilihan E</p>'),
(164, 41, 1, '0', '<p>Ini Opsi A</p>'),
(165, 41, 0, '1', '<p>Ini Opsi B</p>'),
(166, 41, 0, '2', '<p>Ini Opsi C</p>'),
(167, 41, 0, '3', '<p>Ini Opsi D</p>'),
(168, 41, 0, '4', '<p>Ini Opsi E</p>'),
(169, 42, 0, '0', '<p>Opsi A</p>'),
(170, 42, 1, '1', '<p>Opsi B</p>'),
(171, 42, 0, '2', '<p>Opsi C</p>'),
(172, 42, 0, '3', '<p>Opsi D</p>'),
(173, 42, 0, '4', '<p>Opsi E</p>'),
(174, 44, 0, '0', '<p>Non-verbal communication can be picked up easily in a foreign land.</p>'),
(175, 44, 1, '1', '<p>Non-verbal communication will be a start in learning a culture.</p>'),
(176, 44, 0, '2', '<p>Natives welcome good intention shown through non-verbal communication.</p>'),
(177, 44, 0, '3', '<p>Contrary to popular beliefs, nonverbal communication is not universal.</p>'),
(178, 44, 0, '4', '<p>Basic non-verbal communication is the same wherever you go.</p>'),
(179, 46, 0, '0', '<p>Sentence (3)</p>'),
(180, 46, 0, '1', '<p>Sentence (5)</p>'),
(181, 46, 0, '2', '<p>Sentence (7)</p>'),
(182, 46, 0, '3', '<p>Sentence (8)</p>'),
(183, 46, 1, '4', '<p>Sentence (10)</p>'),
(184, 47, 1, '0', '<p>inisiasi menyusui dini.</p>'),
(185, 47, 0, '1', '<p>pemberian ASI pada bayi yang lahir normal.</p>'),
(186, 47, 0, '2', '<p>manfaat program pemberian ASI eksklusif selama 6 bulan.</p>'),
(187, 47, 0, '3', '<p>kesuksesan program pemberian ASI eksklusif selama 6 bulan.</p>'),
(188, 47, 0, '4', '<p>kendala pelaksanaan program pemberian ASI eksklusif selama 6 bulan.</p>'),
(189, 48, 0, '0', '<p>Pencapaian target program pemberian ASI eksklusif selama 6 bulan dari tahun ke tahun terus menurun.</p>'),
(190, 48, 0, '1', '<p>Bayi yang lahir normal sebaiknya langsung dilekatkan dengan perut ibunya supaya dia dapat menyusu sendiri.</p>'),
(191, 48, 1, '2', '<p>Faktor utama kegagalan program pemberian ASI eksklusif terletak pada kegiatan Inisiasi Menyusu Dini.</p>'),
(192, 48, 0, '3', '<p>Target pencapaian program pemberian ASI eksklusif sebaiknya tidak terlalu tinggi</p>'),
(193, 48, 0, '4', '<p>Pemberian ASI pada bayi sangat bermanfaat bagi si ibu dan masyarakat pada umumnya</p>'),
(194, 50, 0, '0', '<p>pemberian ASI eksklusif selama 6 bulan setelah dilahirkan.</p>'),
(195, 50, 0, '1', '<p>pemberian ASI secara dini selama 6 bulan setelah dilahirkan</p>'),
(196, 50, 0, '2', '<p>pemberian ASI pada bayi lahir normal secara eksklusif selama enam bulan.</p>'),
(197, 50, 0, '3', '<p>usaha mendorong bayi menyusu sendiri secara dini.</p>'),
(198, 50, 1, '4', '<p>usaha mendorong bayi menemukan ASI dan menyusu secara mandiri segera setelah dilahirkan.</p>'),
(199, 51, 0, '0', '<p>government</p>'),
(200, 51, 0, '1', '<p>governed</p>'),
(201, 51, 0, '2', '<p>governing</p>'),
(202, 51, 1, '3', '<p>governmental</p>'),
(203, 51, 0, '4', '<p>govern</p>'),
(204, 52, 0, '0', '<p>approximation</p>'),
(205, 52, 0, '1', '<p>standard</p>'),
(206, 52, 0, '2', '<p>median</p>'),
(207, 52, 0, '3', '<p>estimate</p>'),
(208, 52, 1, '4', '<p>average</p>'),
(209, 53, 1, '0', '<p>Because</p>'),
(210, 53, 0, '1', '<p>Unless</p>'),
(211, 53, 0, '2', '<p>Before</p>'),
(212, 53, 0, '3', '<p>While</p>'),
(213, 53, 0, '4', '<p>As if</p>'),
(214, 55, 0, '0', '<p>consecutively</p>'),
(215, 55, 0, '1', '<p>simultaneously</p>'),
(216, 55, 0, '2', '<p>spontaneously</p>'),
(217, 55, 1, '3', '<p>separately</p>'),
(218, 55, 0, '4', '<p>repeatedly</p>'),
(219, 56, 0, '0', '<p>pneumonia.&nbsp;</p>'),
(220, 56, 0, '1', '<p>imunisasi pneumokok.</p>'),
(221, 56, 1, '2', '<p>vaksin pneumokok.</p>'),
(222, 56, 0, '3', '<p>penyakit yang disebabkan kuman Streptococcus pneumonia.</p>'),
(223, 56, 0, '4', '<p>vaksin pneumokok bagi anak-anak dan dewasa.</p>'),
(224, 57, 0, '0', '<p>consider</p>'),
(225, 57, 0, '1', '<p>considering</p>'),
(226, 57, 1, '2', '<p>considered</p>'),
(227, 57, 0, '3', '<p>considerate</p>'),
(228, 57, 0, '4', '<p>consideration</p>'),
(229, 59, 1, '0', '<p>Penyakit radang otak termasuk dalam jenis penyakit pneumonia.</p>'),
(230, 59, 0, '1', '<p>Anak berusia satu tahun dapat divaksinasi dengan vaksin konjugat.</p>'),
(231, 59, 0, '2', '<p>Jumlah pemberian vaksin pada anak-anak dan dewasa berbeda.</p>'),
(232, 59, 0, '3', '<p>Vaksinasi pneumokok membasmi kuman Streptococcus pneumonia.</p>'),
(233, 59, 0, '4', '<p>Kuman Streptococcus pneumonia dapatmenyebar di dalam dan ke luar tubuh.</p>'),
(234, 60, 0, '0', '<p>1</p>'),
(235, 60, 1, '1', '<p>2</p>'),
(236, 60, 0, '2', '<p>3</p>'),
(237, 60, 0, '3', '<p>4</p>'),
(238, 60, 0, '4', '<p>5</p>');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `pengerjaantryout`
--

INSERT INTO `pengerjaantryout` (`id`, `nilai`, `idPengguna`, `idTryout`, `isSubmitted`) VALUES
(10, NULL, 13, 9, 0),
(11, NULL, 13, 18, 0),
(12, 3, 13, 19, 1),
(13, NULL, 18, 19, 0),
(14, NULL, 18, 19, 0),
(15, NULL, 18, 19, 0),
(16, 3, 20, 21, 1),
(17, NULL, 18, 22, 0),
(18, 3, 18, 23, 1),
(19, 30, 19, 25, 1),
(20, 25, 18, 25, 1),
(21, 40, 25, 25, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `email`, `password`, `isAdmin`, `isActive`) VALUES
(13, 'hanifnaufal', 'hanifnaufal7557@gmail.com', 'bf58a6df9a32180d27ae20ef0fd1c5e2', 1, 1),
(16, 'adiyat', 'm_adiyat@hotmail.com', '04955c26fc28f43e987747a2b55e3213', 1, 1),
(20, 'farahs', 'farah.shafira@gmail.com', 'fbca093f770bbe7551324a57ce2e5187', 0, 1),
(18, 'farizikhwantri', 'farizikhwantri@gmail.com', 'ba86dca077c289427919d3e38260d573', 1, 1),
(19, 'apdhtg6', 'argapdh@yahoo.co.id', '2acbc5818c886b1614b07de042659ddf', 1, 1),
(24, 'farizcoba', 'farizikhwantri+blalala@gmail.com', '7f71521cf7514e9bddf2446d34394f5b', 0, 1),
(25, 'satrio', 'satrio.baskoro@cs.ui.ac.id', 'eec470e2f66e97a2ff82bcb62897375a', 0, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `author_id`, `thread_id`, `editor_id`, `content`, `created`, `updated`) VALUES
(15, 6, 8, NULL, 'bebas bebas', 1399948639, 1399948639),
(16, 6, 9, NULL, 'bebas bebas', 1399957268, 1399957268),
(17, 6, 9, NULL, 'hai', 1399957446, 1399957446),
(18, 7, 10, NULL, 'asdf', 1399963678, 1399963678),
(19, 7, 10, NULL, 'asdf', 1399963686, 1399963686),
(20, 6, 9, NULL, 'Halo\r\nHai', 1399986295, 1399986295),
(21, 6, 11, NULL, 'Tanya model soal tentang tes potensi akademik dong kk :3', 1400017742, 1400017742),
(22, 6, 12, NULL, 'bebas bebas', 1400050890, 1400050890),
(23, 6, 12, NULL, 'haihaha', 1400051446, 1400051604),
(24, 6, 12, NULL, 'hai', 1400051714, 1400051714),
(25, 7, 13, NULL, 'bebas bebashaha', 1400052746, 1400052829),
(26, 7, 13, NULL, 'hai', 1400052813, 1400052813),
(27, 6, 14, NULL, 'Test konten', 1400053460, 1400053460),
(28, 6, 15, NULL, 'Test 2\r\n', 1400053797, 1400053797),
(34, 9, 19, NULL, 'bebas bebas', 1400058559, 1400058559),
(30, 7, 16, NULL, 'bebas bebas', 1400053959, 1400053959),
(31, 6, 17, NULL, 'asd', 1400054210, 1400054210),
(35, 7, 20, NULL, 'membahas soal tryout 1', 1400652738, 1400652738),
(38, 8, 20, NULL, 'Ayo ayo :D', 1400665192, 1400665192),
(39, 10, 22, NULL, 'soal', 1400667984, 1400667984),
(41, 11, 19, NULL, 'dfadad', 1400668125, 1400668125);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nama`, `fotoUrl`, `jenisKelamin`, `idPengguna`, `tanggalLahir`, `targetJurusan`, `asalSma`) VALUES
(13, 'Hanif Naufal', '13.png', 1, 13, '1994-05-20', 'ARSITEKTUR', 'SMA N 1 Purwokerto'),
(14, 'Fariz', '18.jpeg', 1, 18, '1994-05-23', 'PENDIDIKAN DOKTER', 'SMA N 1 Padang'),
(15, 'Arga Padan David', '19.jpeg', 1, 19, '1993-03-29', 'ILMU PSIKOLOGI', 'SMAN 1 Depok'),
(16, 'Farah', NULL, 0, 20, '1993-02-12', 'ARSITEKTUR', ''),
(17, 'Fariz Ikhwantri', '24.jpeg', 1, 24, '1996-01-01', 'ARSITEKTUR', 'SMAN 1 Padang'),
(18, 'satrio', '25.jpeg', 1, 25, '1996-12-04', 'ILMU KOMPUTER', 'sma 81');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idtryout` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `nomor` int(11) NOT NULL,
  `isHasJawaban` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `tryout_soal_idx` (`idtryout`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `idtryout`, `pertanyaan`, `nomor`, `isHasJawaban`) VALUES
(27, 9, '<p style="text-align: justify;">Bacaan yang benar dalam soal ini adalah</p>', 1, 1),
(32, 17, '<p>Sikuli mengedit salah satu soal</p>', 11, 1),
(33, 19, '<p>Soal Testing sikuli part 1</p>', 1, 1),
(34, 19, '<p>soal testing sikuli part 2</p>', 2, 1),
(28, 9, '<p>Bacaan di atas membahas ...</p>', 21, 1),
(29, 9, '<p>untuk soal 21 - 23</p>\r\n<p style="text-align: justify;">Berbagai penelitian telah mengkaji manfaat pemberian air susu ibu (ASI). ASI eksklusif menurunkan mortalitas&nbsp;bayi dan morbiditas bayi, mengoptimalkan pertumbuhan bayi, membantu perkembangan kecerdasan anak, dan&nbsp;memperpanjang jarak kehamilan ibu. Di Indonesia, Kementerian Kesehatan Republik Indonesia melalui program&nbsp;perbaikan gizi masyarakat menargetkan cakupan ASI eksklusif 6 bulan sebesar 80%. Namun, angka ini sulit dicapai,&nbsp;bahkan tren prevalensi ASI eksklusif dari tahun ke tahun terus menurun. Data Survei Demografi dan Kesehatan&nbsp;Indonesia 1997&mdash;2007 memperlihatkan penurunan prevalensi ASI eksklusif dari 40,2% pada tahun 1997 menjadi 39,5%<br />dan 32% pada tahun 2003 dan 2007.</p>\r\n<p style="text-align: justify;"><br />Alasan kegagalan praktik ASI eksklusif bermacam-macam, antara lain budaya pemberian makanan pralaktal,&nbsp;keharusan pemberian tambahan susu formula karena ASI tidak keluar, penghentian pemberian ASI karena bayi atau&nbsp;ibu sakit, ibu harus bekerja, dan ibu yang ingin mencoba susu formula. Studi kualitatif Fikawati Syafiq melaporkan&nbsp;bahwa faktor kegagalan ASI eksklusif terjadi karena ibu kurang mempunyai pengetahuan dan pengalaman dan karena&nbsp;ibu tidak difasilitasi melakukan inisiasi menyusu dini (IMD).</p>\r\n<p style="text-align: justify;"><br />Bayi yang lahir normal dan diletakkan di perut ibu segera setelah lahir dengan kulit ibu melekat pada kulit bayi&nbsp;selama setidaknya 1 jam dalam 50 menit akan berhasil menyusu, sedangkan bayi lahir normal yang dipisahkan dari&nbsp;ibunya 50% tidak bisa menyusu sendiri. Berbagai studi juga melaporkan bahwa IMD terbukti meningkatkan&nbsp;keberhasilan ASI eksklusif.</p>\r\n<p>&nbsp;</p>', 21, 0),
(35, 17, '<p>Sikuli menulis soal</p>', 1, 1),
(37, 22, '<p>Soal user manual, kalau mau login, button login berada pada sebelah</p>', 1, 1),
(38, 23, '<p>Soal no 1</p>', 1, 1),
(39, 23, '<p>Soal no 2</p>', 2, 1),
(40, 23, '<p>Soal Ke 3</p>', 3, 1),
(41, 23, '<p>Untuk soal no4</p>', 4, 1),
(42, 23, '<p>Soal No 5</p>', 5, 1),
(43, 25, '<p style="text-align: justify;">.... (1) Every culture interprets body language, gestures, posture and carriage, vocal noises, and degree of eye contact differently. (2) A poor traveler might have expected that nodding his or her head up and down or giving a thumbs-up would indicate yes. (3) However, in the Middle East, nodding the head down indicates agreement, while nodding it upis a sign of disagreement. (4) In Japan, an up-and-down nod might just be a signal that someone is listening. (5) Yet, saying &rsquo;thank you&rsquo; to appreciate someone signals the same meaning. (6) The thumbs-up signal is vulgar in Iran. (7) Point with the wrong finger or with anything less than your entire hand and you risk offending somebody. (8) While some cultures value eye contact as a sign of respect, averting your eyes may be the sign of respect in others. (9) In some places, people value a certain degree of personal space in conversation, while those from the Middle East might get right up in your face when they want to converse. (10) Restrain the desire to pat a child on the head in Asia; there&rsquo;s a belief that such a touch would damage the child&rsquo;s soul. (11) Clearly body language expresses different things in other countries.</p>\r\n<p style="text-align: justify;">Gunakan <strong>Petunjuk A</strong> dalam menjawab soal nomor 41 dan 42.</p>', 41, 0),
(44, 25, '<p>The paragraph should begin with ...</p>', 41, 1),
(45, 25, '<p style="text-align: justify;">Berbagai penelitian telah mengkaji manfaat pemberian air susu ibu (ASI). ASI eksklusif menurunkan mortalitas&nbsp;bayi dan morbiditas bayi, mengoptimalkan pertumbuhan bayi, membantu perkembangan kecerdasan anak, dan&nbsp;memperpanjang jarak kehamilan ibu. Di Indonesia, Kementerian Kesehatan Republik Indonesia melalui program&nbsp;perbaikan gizi masyarakat menargetkan cakupan ASI eksklusif 6 bulan sebesar 80%. Namun, angka ini sulit dicapai,&nbsp;bahkan tren prevalensi ASI eksklusif dari tahun ke tahun terus menurun. Data Survei Demografi dan Kesehatan&nbsp;Indonesia 1997&mdash;2007 memperlihatkan penurunan prevalensi ASI eksklusif dari 40,2% pada tahun 1997 menjadi 39,5%&nbsp;dan 32% pada tahun 2003 dan 2007.&nbsp;</p>\r\n<p style="text-align: justify;">Alasan kegagalan praktik ASI eksklusif bermacam-macam, antara lain budaya pemberian makanan pralaktal,&nbsp;keharusan pemberian tambahan susu formula karena ASI tidak keluar, penghentian pemberian ASI karena bayi atau&nbsp;ibu sakit, ibu harus bekerja, dan ibu yang ingin mencoba susu formula. Studi kualitatif Fikawati Syafiq melaporkan&nbsp;bahwa faktor kegagalan ASI eksklusif terjadi karena ibu kurang mempunyai pengetahuan dan pengalaman dan karena&nbsp;ibu tidak difasilitasi melakukan inisiasi menyusu dini (IMD).&nbsp;</p>\r\n<p style="text-align: justify;">Bayi yang lahir normal dan diletakkan di perut ibu segera setelah lahir dengan kulit ibu melekat pada kulit bayi&nbsp;selama setidaknya 1 jam dalam 50 menit akan berhasil menyusu, sedangkan bayi lahir normal yang dipisahkan dari&nbsp;ibunya 50% tidak bisa menyusu sendiri. Berbagai studi juga melaporkan bahwa IMD terbukti meningkatkan&nbsp;keberhasilan ASI eksklusif.</p>', 21, 0),
(46, 25, '<p>Which of the following sentences is irrelevant?</p>', 42, 1),
(47, 25, '<p>Bacaan di atas membahas ...</p>', 21, 1),
(48, 25, '<p>Kesimpulan dari bacaan di atas adalah ...</p>', 22, 1),
(49, 25, '<p>A civil war is a war between organized groups within the same nation state or republic, or, less commonly, between two countries created from a formerly united nation state. The aim of one side may be to take control of the country or a region, to achieve independence for a region, or to change (43)_____ policies. Civil wars since the end of World War II have lasted on (44)_____ just over four years, a dramatic rise from the one-and-a-half year average of the 1900-1944 period. (45)_____ the rate of emergence of new civil wars has been relatively steady since the mid-19th century, the increasing length of those wars resulted in increasing numbers of wars ongoing at any one time. For example, there were no more than five civil wars underway (46)_____ in the first half of the 20th century, while over 20 concurrent civil wars were occurring at the end of the Cold War, before a significant decrease as conflicts strongly associated with the superpower rivalry came to an end. Since 1945, civil wars have resulted in the deaths of over 25 million people, as well<br />as the forced displacement of millions more. Civil wars have further resulted in economic collapse; Burma (Myanmar), Uganda and Angola are examples of nations that were (47)_____ to have promising futures before being engulfed in civil wars.</p>\r\n<p>Gunakan <strong>Petunjuk A</strong> dalam menjawab soal nomor 43 sampai nomor 47.</p>', 43, 0),
(50, 25, '<p>Maksud ungkapan inisiasi menyusu dini dalam teks&nbsp;di atas adalah ...</p>', 23, 1),
(51, 25, '<p>....</p>', 43, 1),
(52, 25, '<p>....</p>', 44, 1),
(53, 25, '<p>....</p>', 45, 1),
(54, 25, '<p style="text-align: justify;">Kepada anak-anak, orang berusia lanjut, serta orang dewasa yang mempunyai penyakit kronis, seperti penyakit&nbsp;paru obstruktif menahun, diabetes melitus, gagal ginjal kronik, sirosis hati, dan kanker sistem darah, dianjurkan&nbsp;imunisasi pneumokok. Juga bagi mereka yang pernah mengalami operasi limpa dianjurkan untuk menjalani imunisasi&nbsp;pneumokok. Pada anak, imunisasi ini perlu diberikan beberapa kali bergantung pada umur anak. Namun, pada orang&nbsp;dewasa cukup diberikan satu kali.</p>\r\n<p style="text-align: justify;">Terdapat dua macam vaksin pneumokok, yaitu vaksin polisakarida dan konjugat. Vaksin polisakarida dapat&nbsp;diberikan kepada anak yang berumur dua tahun, sedangkan jenis yang kedua dapat diberikan kepada anak yang&nbsp;usianya lebih muda. Vaksin ini menurunkan risiko penularan kuman Streptococcus pneumonia. Kuman ini, selainmenimbulkan penyakit yang relatif ringan, yaitu otitis media (infeksi pada telinga tengah) dan sinusitis, dapat juga&nbsp;menimbulkan penyakit yang berat, seperti pneumonia, meningitis (radang otak), dan bakteriemia (kuman ditemukan&nbsp;dalam darah). Sebagian orang mengandung kuman ini di tenggorok dan dapat menularkan kuman ini kepada orang&nbsp;lain melalui batuk dan bersin.</p>\r\n<p style="text-align: justify;">Penyakit meningitis dan bakteriemia disebut sebagai penyakit pneumonia invasif. Meskipun pneumonia tidak&nbsp;tergolong penyakit invasif, angka kematiannya tinggi, terutama pada anak dan orang berusia lanjut. Sekitar 52 persen&nbsp;orang yang berusia lanjut yang dirawat di Rumah Sakit Cipto Mangunkusumo menderita pneumonia.</p>', 24, 0),
(55, 25, '<p>....</p>', 46, 1),
(56, 25, '<p>Topik bacaan di atas adalah ...</p>', 24, 1),
(57, 25, '<p>....</p>', 47, 1),
(58, 25, '<p>Alligators, which often engage in violent fights over territories and mates, have made scientists puzzled why their wounds rarely get infected. Now researchers think the secret lies in the reptiles&rsquo; blood. Chemists in Louisiana found that blood from the American alligator can successfully destroy 23 strains of bacteria, including strains known to be resistant to antibiotics. In addition, the blood was able to deplete and destroy a significant amount of HIV, the virus that causes AIDS.<br />Study co-author Lancis Darville at Louisiana State University in Baton Rouge believes that peptides &ndash; fragments of proteins &ndash; within alligator blood help the animals stop fatal infections. Such peptides are also found in the skin of frogs and toads, as well as komodo, dragons and crocodiles. The scientists think that these peptides could one day lead to medicines that would provide humans with the same antibiotic protection. &rsquo;We are in the process of separating and identifying the specific peptides in alligator blood,&rsquo; said Darville. &rsquo;Once we sequence these peptides, we can obtain their<br />chemical structure to potentially create new drugs.&rsquo;<br />Study co-author Mark Merchant, a biochemist at Mc Neese State University in Lake Charles, Louisiana, was among the first to notice alligators&rsquo; unusual resistance. He was intrigued that, despite living in swampy environments where bacteria thrive, alligators that suffered frequent scratches and bruises rarely developed fatal infections. Merchant therefore created human and alligator serum-protein-rich blood plasma that has been able to remove clotting agents, and exposed each of them to 23 strains of bacteria. Human serum destroyed only eight of the bacterial strains while the alligator serum killed all 23. When the alligator was exposed to HIV, the researchers found that a good amount of the virus was destroyed.<br />The study team thinks that pills and creams containing alligator peptides could be available at level pharmacies within seven to ten years. Such products would be a solution to patients that need extra help preventing infections, such as diabetes patients with foot ulcers, burn victims and people suffering from auto-immune diseases. However, there may be potential problems before alligator-based medicines can reach drugstore shelves. For example, initial tests have revealed that higher concentrations of the alligator serum tend to be toxic to human cells.</p>\r\n<p>&nbsp;</p>\r\n<p>Gunakan <strong>Petunjuk A</strong> dalam menjawab soal nomor 48 sampai nomor 52.</p>', 48, 0),
(59, 25, '<p>Pernyataan yang tidak terdapat dalam bacaan di&nbsp;atas adalah ...</p>', 25, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`id`, `forum_id`, `subject`, `is_sticky`, `is_locked`, `view_count`, `created`) VALUES
(8, 29, 'test pak', 0, 0, 1, 1399948635),
(9, 31, 'test pak', 0, 0, 6, 1399957268),
(10, 22, 'asd', 0, 0, 5, 1399963678),
(12, 32, 'test pak', 0, 0, 7, 1400050890),
(13, 33, 'test pakhaha lol', 0, 0, 7, 1400052746),
(16, 34, 'test pakdrt', 0, 0, 2, 1400053959),
(19, 34, 'test pak', 0, 0, 11, 1400058559);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tryout`
--

INSERT INTO `tryout` (`id`, `waktuMulai`, `durasi`, `tanggal`, `nama`, `idAdmin`) VALUES
(25, '17:00:00', 60, '2014-05-21', 'Tryout SIMAK UI - Kemampuan Dasar 1', 19),
(17, '02:00:00', 119, '2014-05-14', 'Sikuli Test 2 Edit', 18),
(19, '00:00:00', 600, '2014-05-14', 'Sikuli Test 2 Part 1', 13),
(23, '18:00:00', 300, '2014-05-20', 'Manuals Quiz 1', 18),
(22, '12:00:00', 300, '2014-05-20', 'Manuals Quiz', 18);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
