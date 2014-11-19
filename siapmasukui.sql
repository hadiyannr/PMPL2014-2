-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2014 at 11:37 
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
(4, 'Injuran ');

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
(26, 4, '<p>tambah teks</p>', 'Fakultas Kedokteran Biasa', 1, 18, '13.png'),
(27, 4, '', 'Fakultas Kedokteran Gigi', 1, 13, '13.png'),
(28, 4, '', 'Fakultas Matematika & Ilmu Pengetahuan Alam', 1, 13, '13.png'),
(29, 4, '', 'Fakultas Teknik', 1, 13, '13.png'),
(30, 4, '', 'Fakultas Hukum', 1, 13, '13.png'),
(31, 4, '<p>Berdirinya FEUI ditetapkan dengan SK. Menteri Pendidikan dan Kebudayaan No. 360/BPT/1951, dengan hanya satu jurusan yaitu Jurusan Ekonomi Perusahaan. Pada saat itu FEUI memiliki tujuh guru besar: Prof. Mr. Hazairin, Djokosoetono, Prof.Dr. A. Kraal, Prof. Dr. DH. Burger, Prof. Mr. Dr. WGL Lemaire dan Prof. Mr. Dr. WHE Noach. Sebagai hasil pengembangan dan pemindahan Jurusan Sosial Ekonomi dari Fakultas Hukum memiliki 3 jurusan, yaitu Umum, Sosiologi Ekonomi dan Ekonomi Perusahaan.</p>\r\n<p>Pada tahun ini ditandai sebagai dasar terbentuknya Departemen Ilmu Ekonomi yang kita kenal sekarang ini. Pada saat yang sama dibentuk dua bagian yaitu seminar Ekonomi Perusahaan yang dipimpin Oleh Prof. Dr. A. Kraal dan Balai Penyelidikan Ekonomi dan Masyarakat, yang setahun kemudian diubah menjadi Lembaga Penyelidikan Ekonomi dan Masyarakat, dengan ketua pertamanya Prof. Dr. Soemitro. Disamping itu, dibuka pula Perpustakaan Fakultas di Jalan Diponegoro dipimpin oleh Prof. Dr. PL. van der Vilde.</p>\r\n<p>Program studi yang ada di FEUI terdiri dari:</p>\r\n<ul>\r\n<li> Di bawah Koordinasi Departemen</li>\r\n</ul>\r\n<p style="padding-left: 60px;">1. S1 Reguler Ilmu Ekonomi<br />2. S1 Reguler Ilmu Ekonomi Islam<br />3. S2 Ilmu Ekonomi<br />4. Magister Perencanaan dan Kebijakan Publik (MPKP)<br />5. S3 Ilmu Ekonomi</p>\r\n<ul>\r\n<li> Di bawah Koordinasi Departemen Manajemen</li>\r\n</ul>\r\n<p style="padding-left: 60px;">1. S1 Reguler Manajemen<br />2. S1 Ekstensi Manajemen<br />3. S1 Reguler Bisnis Islam<br />4. S2 Ilmu Manajemen<br />5. Magister Manajemen (MM)<br />6. S3 Ilmu Manajemen</p>\r\n<ul>\r\n<li> Di Bawah Koordinasi Departemen Akuntansi</li>\r\n</ul>\r\n<p style="padding-left: 60px;">1. S1 Reguler Akuntansi<br />2. S1 Ekstensi Akuntansi<br />3. Pendidikan Profesi Akuntansi<br />4. S2 Ilmu Akuntansi<br />5. Magister Akuntansi (MAKSI)<br />6. S3 Ilmu Akuntansi</p>\r\n<p>&nbsp;</p>', 'Fakultas Ekonomi', 1, 13, '13.png'),
(32, 4, '', 'Fakultas Ilmu Pengetahuan Budaya', 1, 13, '13.png'),
(33, 4, '', 'Fakultas Psikologi', 1, 13, '13.png'),
(34, 4, '', 'Fakultas Ilmu Sosial & Ilmu Politik', 1, 13, '13.png'),
(35, 4, '', 'Fakultas Kesehatan Masyarakat', 1, 13, '13.png'),
(37, 3, '<p style="text-align: justify;">SIMAK adalah seleksi masuk Universitas Indonesia berupa ujian tulis yang terpadu untuk berbagai jenjang pendidikan dan program pendidikan. Pada artikel ini hanya membahas SIMAK UI untuk lulusan SMA/Sederajat. Bagi pendaftar lulusan SMA/Sederajat yang lulus sekolah melalui Ujian Nasional,&nbsp;<strong>atau</strong>&nbsp; memiliki&nbsp;ijasah Paket C&nbsp;<strong>atau</strong>&nbsp;memiliki sertifikat&nbsp;A Level&nbsp;<strong>atau&nbsp;</strong>IB Diploma&nbsp;<strong>atau</strong>&nbsp;sudah mendapatkan surat penyetaraan dari Departemen Pendidikan Nasional&nbsp;dapat mengikuti SIMAK UI.</p>\r\n<p style="text-align: justify;">Program pendidikan yang dapat dipilih pada jalur masuk SIMAK terdiri dari jenjang Vokasi (D3), S1 Reguler, S1 Paralel dan S1 Kelas Internasional. Peserta dapat memilih program Vokasi (D3), S1 Reguler dan S1 Paralel sekaligus hanya dengan satu kali ujian pada tanggal 22 Juni 2014. Bagi peserta yang memilih program S1 kelas Internasional mengikuti ujian di waktu yang berbeda yakni tanggal 15 Juni 2014. Jika peserta ingin mendaftar S1 Kelas Internasional sekaligus dengan program pendidikan lainnya, maka peserta membuat 2 pendaftaran dalam 1&nbsp;<em>account</em>.</p>\r\n<h3 class="heading-more open">&nbsp;</h3>\r\n<h3 class="heading-more open">Jadwal Pendaftaran</h3>\r\n<div class="learn-more-content" style="visibility: visible; display: block;">\r\n<p>Pendaftaran online di http://penerimaan.ui.ac.id tanggal 5 Mei &ndash; 6 Juni 2014</p>\r\n<p>Ujian S1 Kelas Internasional tanggal 15 Juni 2014</p>\r\n<p>Ujian Vokasi(D3), S1 Reguler, S1 Paralel tanggal 22 Juni 2014</p>\r\n<p>Pengumuman online di http://penerimaan.ui.ac.id tanggal&nbsp;23 Juli 2014</p>\r\n<p>&nbsp;</p>\r\n<h3 class="heading-more open">Alur Pendaftaran</h3>\r\n<h3 class="heading-more open"><img title="Alur Pendaftaran Simak UI" src="http://simak.ui.ac.id/wp-content/uploads/2014/04/Alur-Pendaftaran-S1.jpg" alt="Alur Pendaftaran Simak UI" width="900" height="636" /></h3>\r\n<p>&nbsp;</p>\r\n<h3 class="heading-more open">Biaya Pendaftaran</h3>\r\n<div class="learn-more-content" style="visibility: visible;">\r\n<p style="text-align: justify;">Biaya pendaftaran SIMAK UI S1 Vokasi (D3)/Reguler/S1 Paralel sebesar Rp.300.000 untuk 2 pilihan pertama. Jika peserta hanya memilih 1 prodi tetap membayar Rp.300.000. Setiap tambah prodi/jurusan selanjutnya dikenakan tambahan Rp. 50.000/prodi. Jika siswa memilih prodi kelompok IPA dan IPS sekaligus (IPC) maka dikenakan tambahan Rp. 50.000.</p>\r\n<p style="text-align: justify;">Ketentuan pemilihan prodi yakni Vokasi maksimal 3 pilihan, S1 Reguler maksimal 3 pilihan dan S1 Paralel maksimal 3 pilihan. Total maksimal pilihan adalah 8 program studi, bukan 9 pilihan. Jadi dalam satu formulir pendaftar dapat memilih beberapa prodi dari program pendidikan yang berbeda sekaligus. Prodi yang dipilih dapat berupa kelompok IPA seluruhnya, atau prodi kelompok IPS seluruhnya, atau terdiri dari beberapa prodi kelompok IPA dan prodi kelompok IPS sekaligus (IPC).</p>\r\n<p style="text-align: justify;">Biaya pendaftaran SIMAK UI S1 Kelas Internasional sebesar Rp. 1.000.000 untuk 1 pilihan. Pendaftar S1 Kelas Internasional hanya dapat memilih 1 program studi. Jika peserta mendaftar S1 Reguler/S1 Paralel/Vokasi sekaligus mendaftar S1 Kelas Internasional, maka dalam 1 account peserta membuat 2 pendaftaran dan mendapat 2 nomer pendaftaran. Biaya pendaftaran dibayarkan ke masing-masing no.pendaftaran tersebut. Panduan cara pembayaran dapat dilihat disini.</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n<h3 class="heading-more open">Jadwal dan Materi Ujian</h3>\r\n</div>\r\n<div class="learn-more-content" style="visibility: visible;">\r\n<p>Materi Ujian SIMAK UI Vokasi (D3), S1 Reguler dan S1 Paralel dan terdiri dari:</p>\r\n<p>07.30 &ndash; 09.30 Kemampuan IPA (KA): Matematika IPA, Fisika, Kimia, Biologi, dan IPA Terpadu</p>\r\n<p>10.30 &ndash; 12.30 Kemampuan Dasar (KD): Matematika Dasar, Bahasa Indonesia, dan Bahasa Inggris</p>\r\n<p>13.30 &ndash; 14.30 Kemampuan IPS (KS): Ekonomi, Sejarah, Geografi, dan IPS Terpadu</p>\r\n<p>Kelompok IPA mengikuti ujian KA dan KD</p>\r\n<p>Kelompok IPS mengikuti ujian KD dan KS</p>\r\n<p>Kelompok IPC mengikuti ujian KA dan KD dan KS</p>\r\n<p>&nbsp;</p>\r\n<p>Materi ujian SIMAK S1 Kelas Internasional terdiri dari :</p>\r\n<p>07.30 &ndash; 09.30 Kemampuan IPA : Mathematics for Natural Science, Biology, Physics, Chemistry, and Integrated Natural Sciences</p>\r\n<p>07.30 &ndash; 09.30 Kemampuan IPS : Basic Mathematics, Economy, Indonesia and The World A, Indonesia and The World B, and Integrated Social Sciences</p>\r\n<p>&nbsp;</p>\r\n<h3 class="heading-more open">Perlengkapan Ujian</h3>\r\n<div class="learn-more-content" style="visibility: visible;">\r\n<p>- Alat tulis: pensil 2B, penghapus, pulpen</p>\r\n<p>- Kartu ujian</p>\r\n<p>Pakaian pada saat ujian bebas rapi dan sopan.</p>\r\n<p>&nbsp;</p>\r\n<h3 class="heading-more open">Lokasi Ujian</h3>\r\n<div class="learn-more-content" style="visibility: visible;">\r\n<p style="text-align: justify;">Lokasi ujian SIMAK 22 Juni 2014 menggunakan sekolah-sekolah yang tersebar di beberapa kota besar di Indonesia, yakni:&nbsp;Jakarta Pusat/Timur/Selatan, Depok (<strong>bukan di kampus UI</strong>&nbsp;<strong>Depok</strong>), Bekasi, Tangerang Selatan, Serang, Bogor, Bandung, Cirebon, Jogjakarta, Surabaya, Makasar, Balikpapan, Medan, Padang, Bukittinggi, Pekanbaru, Palembang.</p>\r\n<p style="text-align: justify;">Lokasi ujian SIMAK Kelas Internasional 15 Juni 2014 di Kampus UI Depok.</p>\r\n<p style="text-align: justify;">&nbsp;</p>\r\n<p style="text-align: right;">sumber : simak.ui.ac.id</p>\r\n</div>\r\n</div>\r\n</div>', 'Simak UI 2014', 1, 13, 'image8.png'),
(38, 3, '<div class="middlecol">\r\n<div class="soc">&nbsp;</div>\r\n<p>Proses pendaftaran Universitas Indonesia terdiri dari 9 tahap</p>\r\n<ol class="steps">\r\n<li>Membuat <strong><a href="http://penerimaan.ui.ac.id/id/register"><em>account</em></a></strong>di situs penerimaan UI\r\n<p class="small">Klik <em>link</em> <strong>Buat Account</strong> di kanan atas lalu isi formulir yang muncul</p>\r\n</li>\r\n<li>Mengunggah <strong>foto</strong>berwarna ukuran 4x6 cm\r\n<p class="small">Anda harus mengunggah foto sebelum dapat membuat pendaftaran</p>\r\n</li>\r\n<li>Membuat <strong>pendaftaran</strong>\r\n<p class="small">Anda dapat <em>login</em> menggunakan <em>username</em> dan <em>password</em> Anda, lalu pilih menu <strong>Buat Pendaftaran</strong> untuk membuat pendaftaran baru.</p>\r\n</li>\r\n<li>Melakukan <strong>verifikasi pendaftaran</strong>\r\n<p class="small">Verifikasi dilakukan untuk memastikan Anda telah mengecek bahwa isian formulir pendaftaran dan pilihan program studi Anda telah terisi dengan data yang benar serta telah mengetahui biaya pendidikan untuk program studi yang dipilih</p>\r\n</li>\r\n<li>Membayar <strong>biaya pendaftaran</strong>\r\n<p class="small">Biaya pendaftaran hanya dapat dibayarkan setelah Anda meng-<em>upload</em> foto dan melakukan verifikasi pendaftaran . <br /> <strong>Formulir pendaftaran dan pilihan program studi tidak dapat diubah lagi setelah Anda membayar biaya pendaftaran.</strong></p>\r\n</li>\r\n<li>Meng-<em>upload</em> <strong>berkas persyaratan</strong>pendaftaran\r\n<p class="small">Khusus untuk pendaftar Program Pascasarjana (S2, S3), Profesi, Spesialis, S1 Ekstensi dan yang memilih S1 Kelas Internasional</p>\r\n</li>\r\n<li>Meng-<em>download</em> <strong>kartu ujian masuk</strong>\r\n<p class="small">Kartu ini harus dibawa ketika ujian seleksi masuk</p>\r\n</li>\r\n<li>Mengikuti <strong>ujian seleksi masuk</strong> pada waktu yang telah ditentukan</li>\r\n<li>Setelah mengikuti ujian seleksi masuk, Anda dapat melihat hasil seleksi pada tanggal pengumuman</li>\r\n</ol>\r\n<p>Keterangan tambahan dapat dilihat pada panduan pendaftaran masing-masing jalur penerimaan di menu sebelah kiri.</p>\r\n<h3 class="coltitle">Cara Pembayaran Biaya Pendaftaran</h3>\r\n<p>Pembayaran biaya pendaftaran dilakukan melalui mekanisme <em>Host-to-host</em> Universitas Indonesia, dimana pendaftar dapat membayar biaya pendaftaran melalui ATM/Teller/Internet Banking beberapa bank seperti tertera pada daftar di bawah.</p>\r\n<p><strong>Pembayaran hanya dapat dilakukan setelah Anda mengunggah foto.<br /> Biaya pendaftaran yang sudah dibayarkan tidak dapat dikembalikan.</strong></p>\r\n<h4>Pilihan Cara Pembayaran</h4>\r\n<ul>\r\n<li>ATM: Bank BNI, Bank Permata, Bank Bukopin, Bank Mandiri, Bank BRI, Bank CIMB Niaga</li>\r\n<li><em>Internet Banking</em>: Bank Mandiri, Bank CIMB Niaga</li>\r\n<li>Teller: Bank BNI, Bank BTN, Bank CIMB Niaga, Bank Mandiri</li>\r\n<li>Self Service Terminal (SST): Bank CIMB Niaga</li>\r\n</ul>\r\n<h4>Cara Pembayaran Melalui ATM</h4>\r\n<h5>Bank BNI</h5>\r\n<ul>\r\n<li>Pilih menu <strong>Pembayaran</strong></li>\r\n<li>Pilih menu <strong>Berikutnya</strong></li>\r\n<li>Pilih menu <strong>Universitas</strong></li>\r\n<li>Pilih menu <strong>UI/Universitas Indonesia</strong></li>\r\n<li>Masukkan 9 angka nomor registrasi untuk <em>input</em> NPM (Nomor Pokok Mahasiswa)</li>\r\n<li>Layar akan menampilkan nomor registrasi, nama pendaftar, dan jumlah biaya yang akan dibayar</li>\r\n<li>Tekan "Ya/Benar" untuk melakukan pembayaran</li>\r\n</ul>\r\n<h5>ATM Bank Permata</h5>\r\n<ul>\r\n<li>Pilih menu <strong>Transaksi Lainnya</strong></li>\r\n<li>Pilih menu <strong>Pembayaran</strong></li>\r\n<li>Pilih menu <strong>Pendidikan</strong></li>\r\n<li>Masukkan nomor pelanggan sebagai berikut: Kode Institusi + Nomor Registrasi<br /> Contoh:<br /> 050 Kode Institusi UI<br /> 708000001 Nomor Registrasi</li>\r\n<li>Selanjutnya ikuti petunjuk pada mesin ATM</li>\r\n</ul>\r\n<h5>Bank Bukopin</h5>\r\n<ul>\r\n<li>Pilih menu Pembayaran</li>\r\n<li>Pilih menu Pendidikan</li>\r\n<li>Pilih menu Universitas Indonesia</li>\r\n<li>Masukkan nomor pendaftaran sebagai Nomor Pokok Mahasiswa</li>\r\n<li>Selanjutnya ikuti petunjuk pada mesin ATM</li>\r\n</ul>\r\n<h5>Bank Mandiri</h5>\r\n<ul>\r\n<li>ATM\r\n<ul>\r\n<li>Pilih menu Pembayaran/Pembelian</li>\r\n<li>Pilih Multi Payment</li>\r\n<li>Masukkan kode perusahaan 10003 (UI) lalu tekan BENAR</li>\r\n<li>Masukkan 9 angka nomor registrasi lalu tekan tombol BENAR</li>\r\n<li>Layar akan menampilkan identitas dan jumlah pembayaran; tekan 1 jika data sesuai</li>\r\n<li>Untuk melakukan eksekusi, tekan "YA", untuk pembatalan tekan "TIDAK"</li>\r\n</ul>\r\n</li>\r\n<li>Teller\r\n<ul>\r\n<li>Isi blanko <em>Multi Payment</em> dengan mencantumkan nomor pendaftaran dan nama pendaftar dengan tujuan pembayaran Universitas Indonesia</li>\r\n<li>Serahkan blanko ke teller untuk memproses pembayaran</li>\r\n</ul>\r\n</li>\r\n<li>Internet Banking\r\n<ul>\r\n<li>Login dengan User ID dan Password</li>\r\n<li>Pilih menu Pembayaran</li>\r\n<li>Pilih menu Pendidikan</li>\r\n<li>Pilih rekening yang akan digunakan untuk membayar</li>\r\n<li>Pilih Penyedia jasa: <strong>10003 Universitas Indonesia</strong></li>\r\n<li>Masukkan nomor pendaftaran Anda di isian Nomor Mahasiswa</li>\r\n<li>Klik "Lanjutkan", cek informasi yang muncul. Jika telah sesuai, masukan PIN yang degenerate oleh Token ke field yang tersedia. Pilih "Kirim"</li>\r\n<li>Muncul bukti validasi dari system, print atau save untuk digunakan sebagai bukti.</li>\r\n</ul>\r\n</li>\r\n</ul>\r\n<h5>Teller BNI atau BTN</h5>\r\n<ul>\r\n<li>Tanpa isi blanko langsung ke Teller minta "Host to Host Universitas Indonesia" atau "Online dengan BNI UI Depok"</li>\r\n<li>Sebutkan No pendaftaran</li>\r\n</ul>\r\n<h5>ATM BRI</h5>\r\n<ul>\r\n<li>Pilih menu <strong>transaksi lainnya</strong></li>\r\n<li>Pilih menu <strong>Pembayaran</strong></li>\r\n<li>Pilih <strong>Pendidikan</strong></li>\r\n<li>Pilih kode <strong>(UI: 008)</strong></li>\r\n<li>Masukkan kode UI bersama 9 angka nomor pendaftaran (contoh: 008123456789)</li>\r\n<li>Pilih Yes/OK</li>\r\n</ul>\r\n<h5>Bank CIMB Niaga</h5>\r\n<ul>\r\n<li>Pembayaran melalui ATM dan <em>Self-Service Terminal</em>(SST)<ol>\r\n<li><strong>Khusus ATM</strong>: Pilih menu <strong>Pilihan Transaksi</strong></li>\r\n<li>Pilih menu <strong>Pembayaran</strong></li>\r\n<li>Pilih menu <strong>Lanjut</strong></li>\r\n<li>Pilih menu <strong>Pendidikan Online</strong></li>\r\n<li>Pilih menu <strong>Universitas Indonesia</strong></li>\r\n<li>Masukkan <strong>9 digit nomor pendaftaran</strong></li>\r\n<li>Layar akan menampilkan identitas pendaftar, pastikan nama yang muncul adalah nama Anda</li>\r\n<li>Untuk melakukan pembayaran tekan "<strong>Proses</strong>", untuk pembatalan tekan "<strong>Batal</strong>"</li>\r\n</ol></li>\r\n<li>Pembayaran melalui <em>Teller</em><ol>\r\n<li>Isi blanko setoran dengan mencantumkan <strong>nomor pendaftaran</strong> dan <strong>nama pendaftar</strong></li>\r\n<li>Serahkan blanko ke <em>teller</em> untuk memproses pembayaran</li>\r\n</ol></li>\r\n<li>Pembayaran melalui CIMB <em>Clicks</em><ol>\r\n<li>Akses web Cimb <em>Clicks</em> di <a href="http://www.cimbclicks.co.id/">www.cimbclicks.co.id</a></li>\r\n<li>Masukkan User Id dan Password untuk log-in</li>\r\n<li>Pilih Menu "Bayar Tagihan"</li>\r\n<li>Pilih rekening sumber dana yang diinginkan</li>\r\n<li>Pilih Jenis Pembayaran &ndash; "Pendidikan"</li>\r\n<li>Pilih "Universitas Indonesia" pada kolom Nama Tagihan</li>\r\n<li>Masukkan Nomor Pendaftaran</li>\r\n<li>Layar konfirmasi akan menampilkan semua informasi pembayaran, Pastikan data pembayaran telah sesuai, masukkan mPIN.</li>\r\n<li>Bila transaksi berhasil, Simpan resi pembayaran sebagai bukti pembayaran yang sah.</li>\r\n</ol></li>\r\n</ul>\r\n<h4>Catatan</h4>\r\n<ul>\r\n<li>Pastikan Anda memasukkan nomor registrasi yang benar</li>\r\n<li>Periksa kesesuaian nama pendaftar yang muncul pada layar ATM</li>\r\n<li>Periksa kesesuaian jumlah biaya yang ditagihkan</li>\r\n<li>Simpan resi pembayaran ATM sebagai bukti pembayaran</li>\r\n<li>Periksa status pembayaran anda di situs penerimaan, dengan login, lihat pendaftaran</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p style="text-align: right;">sumber : penerimaan.ui.ac.id</p>\r\n</div>', 'Panduan Pendaftaran', 1, 13, 'image2.png'),
(39, 3, '<p style="text-align: justify;">Biaya Operasional Pendidikan merupakan komponen biaya penyelenggaraan kegiatan pembelajaran yang dibayarkan setiap semester oleh mahasiswa. Bagi mahasiswa program pendidikan S1 Reguler dari berbagai jalur masuk (SIMAK, SNMPTN dan SBMPTN) memiliki kesempatan untuk memilih skema Biaya Operasional Pendidikan Berkeadilan atau disingkat dengan BOP B. Skema ini memungkinkan mahasiswa membayar biaya pendidikan sesuai dengan kemampuan bayar orang tua, wali atau penanggung biaya pendidikan mahasiswa.<br /> Besaran&nbsp;BOP B yang dibayar per semester minimal Rp 100.000 dan maksimal Rp 5.000.000 untuk program studi kelompok IPS yakni&nbsp;FIB, FISIP, FPsi, FH, FE. Sedangkan&nbsp;untuk program studi kelompok IPA &nbsp;yakni&nbsp;FK, FKG, FT, FASILKOM, FKM, FMIPA, FIK, F.Farmasi&nbsp;minimal Rp 100.000 dengan maksimal Rp 7.500.000.</p>\r\n<p style="text-align: justify;">Penetapan besaran BOP B dilakukan setelah peserta melengkapi persyaratan ketika dinyatakan diterima sebagai mahasiswa S1 Reguler. Adapun kelengkapan yang menjadi pertimbangan penetapan adalah dengan mengisi formulir isian pengajuan BOP B yang disertai berkas pendukung yang antara lain terdiri dari:</p>\r\n<p>1. Surat keterangan dari lingkungan tempat tinggal<br /> 2. Bukti penghasilan perbulan/pertahun<br /> 3. Bukti pengeluaran perbulan/pertahun<br /> 4. dan sebagainya.</p>\r\n<p style="text-align: justify;">Formulir dan keterangan detail hanya muncul di akun pengumuman setelah seseorang dinyatakan diterima di S1 Reguler dan memilih skema BOP B &nbsp;sebagai skema pembayaran biaya pendidikan.</p>\r\n<p style="text-align: justify;">&nbsp;</p>\r\n<p style="text-align: right;">sumber : simak.ui.ac.id</p>', 'BOP Berkeadilan', 1, 13, 'image9.png'),
(40, 3, '<p style="text-align: justify;">Universitas Indonesia (UI) membebaskan uang pangkal bagi mahasiswa baru program pendidikan S1 Reguler tahun akademik 2014/2015. Pembebasan uang pangkal bagi mahasiswa program pendidikan S1 Reguler dimungkinkan karena kebijakan UI untuk mengalokasikan beban biaya uang pangkal dari dana BOPTN (Bantuan Operasional Perguruan Tinggi Negeri) yang diperoleh dari Kementerian Pendidikan dan Kebudayaan RI. Pada tahun akademik 2014/2015, seluruh mahasiswa baru program pendidikan S1 Reguler hanya akan dikenai Biaya Operasional Pendidikan Berkeadilan (BOP B) yang dibayar per semester minimal Rp 100.000 dengan maksimal Rp 5.000.000 untuk program studi kelompok IPS, atau minimal Rp 100.000 dengan maksimal Rp 7.500.000 untuk program studi kelompok IPA. Jumlah BOP B disesuaikan dengan kemampuan orang tua/wali mahasiswa sebagai penanggung biaya. Informasi BOP B dapat dilihat <a href="http://simak.ui.ac.id/uncategorized/simak.ui.ac.id/uncategorized/bop-berkeadilan.html">disini.</a></p>\r\n<p style="text-align: center;"><strong>Biaya pendidikan S1 Reguler SIMAK = S1 Reguler SBMPTN = S1 Reguler SNMPTN</strong></p>', 'S1 Reguler Bebas Uang Pangkal', 1, 13, 'image5.png'),
(41, 3, '<div class="post_content clearfix">\r\n<p style="text-align: justify;"><strong>Pendaftaran</strong> 12 Mei 2014 pukul 08.00 WIB &mdash; 6 juni 2014 pukul 22.00 WIB online di<a href="http://pendaftaran.sbmptn.or.id">&nbsp;http://pendaftaran.sbmptn.or.id</a></p>\r\n<p style="text-align: justify;">Panduan pendaftaran dapat dilihat di <a href="http://sbmptn.or.id/?mid=19">http://sbmptn.or.id</a></p>\r\n<p style="text-align: justify;"><strong>Biaya Pendaftaran</strong> : Rp. 100.000 (termasuk biaya ujian keterampilan bagi pendaftar prodi seni &amp; olahraga).<br /> - Biaya seleksi dibayarkan ke Bank Mandiri.<br /> - Jika dalam suatu daerah tidak ada kantor pelayanan Bank Mandiri, maka biaya seleksi dapat dibayarkan melalui Kantor Pos setempat atau ATM bersama.<br /> - Biaya seleksi yang sudah dibayarkan tidak dapat ditarik kembali dengan alasan apapun.</p>\r\n<p style="text-align: justify;"><strong>Peserta dapat memilih program studi</strong> sesuai dengan kelompok ujian yang diikuti, yaitu:<br /> - Kelompok ujian Saintek dapat memilih maksimal 3 (tiga) program studi dari kelompok program studi Saintek,<br /> - Kelompok ujian Soshum dapat memilih maksimal 3 (tiga) program studi dari kelompok program studi Soshum,<br /> - Kelompok ujian Campuran dapat memilih maksimal 3 (tiga) program studi yang merupakan campuran dari kelompok Saintek dan kelompok Soshum.<br /> - Peserta ujian yang hanya memilih 1 (satu) program studi dapat memilih program studi di PTN manapun.<br /> - Peserta ujian yang memilih 2 (dua) program studi atau lebih, salah satu pilihan program studi tersebut harus di PTN yang berada dalam satu wilayah dengan tempat peserta mengikuti ujian. Pilihan program studi yang lain dapat di PTN di luar wilayah tempat peserta mengikuti ujian.<br /> Daftar wilayah pendaftaran, program studi, daya tampung per PTN tahun 2014, dan jumlah peminat program studi per PTN tahun 2013 dapat dilihat di laman http://www.sbmptn.or.id mulai tanggal 14 April 2014. Urutan dalam pemilihan program studi menyatakan prioritas pilihan.</p>\r\n<p style="text-align: justify;"><strong>Jadwal ujian</strong> Tertulis</p>\r\n<p style="text-align: justify;">&nbsp;</p>\r\n<table id="wp-table-reloaded-id-49-no-1" style="border-color: #000000; border-width: 0px; border-style: solid;" border="0" rules="all" cellpadding="1">\r\n<thead>\r\n<tr class="row-1 odd"><th class="column-1">Tanggal</th><th class="column-2">Saintek</th><th class="column-3">Soshum</th><th class="column-4">Campuran (Saintek &amp; Soshum)</th></tr>\r\n</thead>\r\n<tbody>\r\n<tr class="row-2 even">\r\n<td class="column-1 rowspan-3" rowspan="3">Selasa, 17 Juni 2014</td>\r\n<td class="column-2">TKPA</td>\r\n<td class="column-3">TKPA</td>\r\n<td class="column-4">TKPA</td>\r\n</tr>\r\n<tr class="row-3 odd">\r\n<td class="column-2 rowspan-2" rowspan="2">TKD Saintek</td>\r\n<td class="column-3 rowspan-2" rowspan="2">TKD Soshum</td>\r\n<td class="column-4">TKD Saintek</td>\r\n</tr>\r\n<tr class="row-4 even">\r\n<td class="column-4">TKD Soshum</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br /> Tes Kemampuan dan Potensi Akademik (TKPA) terdiri dari Verbal, Numerikal, Figural, Matematika Dasar, Bahasa Indonesia, Bahasa Inggris.<br /> Tes Kemampuan Dasar Saintek (TKD Saintek) terdiri dari Matematika, Biologi, Kimia, dan Fisika.<br />Tes Kemampuan Dasar Sosial dan Humaniora (TKD Soshum) terdiri dari Sosiologi, Sejarah, Geografi, dan Ekonomi.\r\n<p>&nbsp;</p>\r\n<p style="text-align: justify;">Ujian Keterampilan<br /> * Ujian keterampilan diperuntukkan bagi peminat Program Studi bidang Seni dan Keolahragaan<br /> ** Universitas Indonesia tidak memiliki Program Studi bidang Seni dan Keolahragaan</p>\r\n<table id="wp-table-reloaded-id-50-no-1" style="border-width: 1px; border-style: solid;" border="0" rules="all" cellpadding="1">\r\n<thead>\r\n<tr class="row-1 odd"><th class="column-1">Tanggal</th><th class="column-2">Bidang Ilmu Seni</th><th class="column-3">Bidang Ilmu Olahraga</th></tr>\r\n</thead>\r\n<tbody>\r\n<tr class="row-2 even">\r\n<td class="column-1 rowspan-2" rowspan="2">Rabu dan/atau Kamis, 18 dan/atau 19 juni 2014</td>\r\n<td class="column-2">Tes pengetahuan bidang ilmu seni</td>\r\n<td class="column-3">Tes kesehatan</td>\r\n</tr>\r\n<tr class="row-3 odd">\r\n<td class="column-2">Tes keterampilan bidang ilmu seni</td>\r\n<td class="column-3">Tes kesegaran jasmani</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br />Ujian Keterampilan dapat diikuti di PTN terdekat yang memiliki program studi yang sesuai dengan pilihan peserta. Daftar PTN penyelenggara ujian keterampilan secara lengkap dapat dilihat pada http://www.sbmptn.or.id\r\n<p>&nbsp;</p>\r\n<p style="text-align: justify;"><strong>Pengumuman</strong> Hasil Ujian: Rabu, 16 Juli 2014 pukul 17.00 WIB di laman <a href="http://www.sbmptn.or.id">http://www.sbmptn.or.id</a></p>\r\n<p style="text-align: justify;"><strong>Info</strong> lebih lanjut dapat dilihat di : <a href="http://www.sbmptn.or.id">http://www.sbmptn.or.id</a><br /> Download&nbsp;<a href="http://simak.ui.ac.id/wp-content/plugins/download-monitor/download.php?id=38">Poster-SBMPTN-2014.pdf</a></p>\r\n<p style="text-align: right;"><!-- iframe plugin v.2.8 wordpress.org/plugins/iframe/ -->sumber : simak.ui.ac.id</p>\r\n</div>', 'SBMPTN 2014', 1, 13, 'image7.png'),
(42, 3, '<div class="post_content clearfix">\r\n<p>Seleksi Nasional Masuk Perguruan Tinggi Negeri (SNMPTN) adalah salah satu jalur masuk Universitas Indonesia untuk program pendidikan S1 REGULER. Jalur masuk ini didasarkan pada prestasi akademis siswa yang ditunjukkan dengan nilai rapor. Pengisian data nilai rapor siswa dilakukan oleh sekolah ke dalam sistem&nbsp;Pangkalan Data Sekolah dan Siswa (PDSS).</p>\r\n<p>Pendaftaran SNMPTN dilakukan secara online di <a href="https://web.snmptn.ac.id/">https://web.snmptn.ac.id/</a> mulai tanggal 17 Februari 2014 jam 08:00 &ndash; 31 Maret 2014 jam 23:59 WIB.</p>\r\n<p>Sebelum mendaftar yang harus dipersiapkan adalah:<br /> - data diri siswa<br /> - data diri orangtua/wali<br /> - foto berwarna terbaru dalam format .jpg dengan ukuran resolusi 400&times;600 pixel<br /> - membaca informasi persyaratan program studi <a href="https://web.snmptn.ac.id/ptn/31">disini</a><br /> - bagi peserta Bidikmisi, pastikan mengisi data di <a href="http://bidikmisi.dikti.go.id/">website Bidikmisi</a> sesuai dengan isian data di SNMPTN (Nama siswa, NISN, tgl.lahir, NPSN)</p>\r\n<p><strong>Biaya pendidikan <strong>S1 Reguler SNMPTN</strong>&nbsp;= S1 Reguler SBMPTN = <strong>&nbsp;S1 Reguler SIMAK&nbsp;</strong></strong>yakni bebas Uang Pangkal, hanya membayar Biaya Operasional Pendidikan (BOP) persemester. Universitas Indonesia (UI) membebaskan uang pangkal bagi mahasiswa baru program pendidikan S1 Reguler mulai tahun akademik 2013/2014. Pembebasan uang pangkal bagi mahasiswa program pendidikan S1 Reguler dimungkinkan karena kebijakan UI untuk mengalokasikan beban biaya uang pangkal dari dana BOPTN (Bantuan Operasional Perguruan Tinggi Negeri) yang diperoleh dari Kementerian Pendidikan dan Kebudayaan RI. Sejak tahun akademik 2013/2014, seluruh mahasiswa baru program pendidikan S1 Reguler hanya akan dikenai Biaya Operasional Pendidikan Berkeadilan (BOP-B) yang dibayar per semester minimal Rp 100.000 dengan maksimal Rp 5.000.000 untuk program studi kelompok IPS, atau minimal Rp 100.000 dengan maksimal Rp 7.500.000 untuk program studi kelompok IPA. Jumlah BOP-B disesuaikan dengan kemampuan orang tua/wali mahasiswa sebagai penanggung biaya.</p>\r\n<p>&nbsp;</p>\r\n<p style="text-align: right;">sumber : simak.ui.ac.id</p>\r\n</div>', 'SNMPTN 2014', 1, 13, 'image1.png'),
(43, 3, '<p style="text-align: justify;">Sebagai upaya meningkatkan kualifikasi akademik pendidik dan tenaga kependidikan Direktorat Jenderal Pendidikan Tinggi kembali membuka pendaftaran Beasiswa Pendidikan Pascasarjana Dalam Negeri (BPP-DN) untuk alokasi tahun 2014. Program beasiswa ini diperuntukkan bagi dosen tetap pada perguruan tinggi di lingkungan Kementerian Pendidikan dan Kebudayaan, tenaga kependidikan tetap pada perguruan tinggi negeri di lingkungan Kementerian Pendidikan dan Kebudayaan, PNS kantor Kopertis, dan PNS kantor pusat Ditjen Pendidikan Tinggi.</p>\r\n<p>Pendaftaran BPP-DN dilakukan secara <em>online</em> melalui laman <a href="http://beasiswa.dikti.go.id/bppdn/"><strong>http://beasiswa.dikti.go.id/bppdn </strong></a>dari tanggal 31 Maret &ndash; 30 Mei 2014.</p>\r\n<p>Untuk informasi lebih lanjut, silakan menghubungi alamat di bawah ini:<br /> Direktorat Pembinaan SDM UI<br /> Gedung PAU lantai 8<br /> Kampus UI Depok<br /> P : 021-7867222, 78841818 ext. 100342<br /> F : 021-78849063<br /> E : sdm-ui@ui.ac.id</p>', 'BPPDN 2014', 1, 13, 'image4.png'),
(44, 4, '', 'Fakultas Ilmu Komputer', 1, 13, '13.png'),
(45, 4, '', 'Fakultas Ilmu Keperawatan', 1, 13, '13.png'),
(46, 4, '', 'Fakultas Farmasi', 1, 13, '13.png'),
(47, 4, '', 'Vokasi', 1, 13, '13.png'),
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
