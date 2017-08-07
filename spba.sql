-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2017 pada 07.58
-- Versi Server: 5.5.34
-- Versi PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `spba`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nip` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nip`, `nama`, `password`, `email`) VALUES
(1, 985391, 'mas boni', 'ae3e781cc45917736a1abbc1ea187064', 'binamas_walay@mail.com'),
(4, 241353673, 'merdeka', '73bc028d72089a482fc4e86a02268f0e', 'merdeka45@wakwa.com'),
(5, 9258163, 'bi ijah', 'e8f71c3bb581e7617f472828df27f615', 'yake@ya.com'),
(6, 110502134, 'Ahmad', '544b0074102d00bd9a9dd3840a44450e', 'email.ahmad@gmail.com'),
(7, 9361922, 'Gina', '9d3ffe80ecb0c09cd856df495f5dcd29', 'ginaginu@waw.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `coba`
--

CREATE TABLE IF NOT EXISTS `coba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pelanggaran` varchar(100) NOT NULL,
  `poin` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `oleh` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data untuk tabel `coba`
--

INSERT INTO `coba` (`id`, `pelanggaran`, `poin`, `nama`, `oleh`) VALUES
(21, 'Tidak membawa Kaos kaki', 10, 'Khan', 'kosim'),
(22, 'Memakai sepatu atau alas kaki ke dalam kelas', 10, 'Khan', 'kosim'),
(25, 'Tidak memakai seragam sesuai dengan ketentuan yang berlaku', 10, 'Amir', 'kosim'),
(26, 'Tidak membawa Kaos kaki', 10, 'Amir', 'kosim'),
(29, 'Memakai sepatu atau alas kaki ke dalam kelas', 10, 'Akhmad', 'kosim'),
(31, 'Tidak memakai seragam sesuai dengan ketentuan yang berlaku', 10, 'e', 'kosim'),
(32, 'Tidak memakai seragam sesuai dengan ketentuan yang berlaku', 10, 'jone', 'kosim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `id_guru` int(11) NOT NULL AUTO_INCREMENT,
  `nip` int(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama`, `password`, `email`) VALUES
(1, 202223311, 'Sinta', '0e9ef8082576d1402931ad1508115b9e', 'cintad11ia@wae.com'),
(2, 112345, 'Jaka', '0cfd87a92785b4ed53859a2af3eeb9a7', 'kamukok@yae.com'),
(3, 1249407, 'Rista', 'a4ca719c3fa51b57bff8716f5ebe028d', 'mantap@jiwa.com'),
(4, 1123452, 'Dahlan', '00ecd9c321d6a312142d5a0e91662985', 'dahlan@mail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggaran`
--

CREATE TABLE IF NOT EXISTS `pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) NOT NULL,
  `poin` int(4) NOT NULL,
  PRIMARY KEY (`id_pelanggaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `pelanggaran`
--

INSERT INTO `pelanggaran` (`id_pelanggaran`, `jenis`, `poin`) VALUES
(8, 'Tidak membawa sepatu', 10),
(9, 'Memakai sepatu atau alas kaki ke dalam kelas', 10),
(10, ' Main bola dan olah raga besar lainnya', 20),
(11, 'Meninggalkan jam pelajaran tanpa ijin guru piket', 10),
(12, 'Berada dalam asrama pada jam sekolah tanpa ijin guru piket', 15),
(16, 'Terlambat masuk ke kelas', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggaran_siswa`
--

CREATE TABLE IF NOT EXISTS `pelanggaran_siswa` (
  `id_pel_sis` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(2) NOT NULL,
  `id_siswa` int(5) NOT NULL,
  `id_pelanggaran` int(3) NOT NULL,
  `pemberi` int(3) NOT NULL,
  `tgl_pelanggaran` date NOT NULL,
  PRIMARY KEY (`id_pel_sis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=163 ;

--
-- Dumping data untuk tabel `pelanggaran_siswa`
--

INSERT INTO `pelanggaran_siswa` (`id_pel_sis`, `level`, `id_siswa`, `id_pelanggaran`, `pemberi`, `tgl_pelanggaran`) VALUES
(97, 0, 4, 8, 6, '0000-00-00'),
(98, 0, 4, 9, 6, '0000-00-00'),
(99, 0, 7, 9, 6, '0000-00-00'),
(100, 0, 7, 6, 6, '0000-00-00'),
(101, 0, 7, 5, 6, '0000-00-00'),
(102, 0, 7, 8, 6, '0000-00-00'),
(103, 1, 2, 5, 4, '0000-00-00'),
(104, 1, 2, 6, 4, '0000-00-00'),
(105, 1, 2, 7, 4, '0000-00-00'),
(106, 1, 2, 9, 4, '0000-00-00'),
(107, 0, 7, 9, 1, '0000-00-00'),
(108, 0, 7, 8, 1, '0000-00-00'),
(109, 0, 7, 6, 1, '0000-00-00'),
(110, 0, 2, 8, 1, '0000-00-00'),
(111, 0, 2, 6, 1, '0000-00-00'),
(112, 0, 2, 9, 1, '0000-00-00'),
(113, 0, 2, 8, 6, '0000-00-00'),
(114, 0, 2, 6, 6, '0000-00-00'),
(124, 1, 3, 12, 4, '2017-06-10'),
(125, 1, 3, 10, 4, '0000-00-00'),
(126, 1, 3, 9, 4, '2017-06-08'),
(127, 1, 3, 6, 4, '0000-00-00'),
(128, 1, 3, 6, 4, '0000-00-00'),
(129, 1, 3, 9, 4, '0000-00-00'),
(130, 1, 3, 10, 4, '0000-00-00'),
(131, 1, 3, 12, 4, '2017-06-22'),
(132, 1, 7, 11, 4, '0000-00-00'),
(133, 1, 7, 9, 4, '0000-00-00'),
(134, 1, 7, 16, 4, '0000-00-00'),
(135, 1, 7, 8, 4, '0000-00-00'),
(136, 0, 5, 6, 6, '0000-00-00'),
(137, 0, 5, 7, 6, '0000-00-00'),
(139, 1, 4, 7, 2, '0000-00-00'),
(140, 1, 4, 6, 2, '0000-00-00'),
(141, 1, 4, 8, 2, '0000-00-00'),
(142, 1, 4, 12, 2, '0000-00-00'),
(143, 1, 4, 17, 2, '0000-00-00'),
(144, 0, 2, 16, 6, '0000-00-00'),
(145, 0, 2, 8, 6, '0000-00-00'),
(146, 0, 2, 9, 6, '0000-00-00'),
(147, 0, 2, 10, 6, '0000-00-00'),
(148, 0, 2, 11, 6, '0000-00-00'),
(149, 0, 2, 12, 6, '0000-00-00'),
(150, 0, 2, 16, 6, '0000-00-00'),
(151, 0, 2, 9, 6, '0000-00-00'),
(152, 0, 2, 10, 6, '0000-00-00'),
(153, 0, 2, 10, 6, '0000-00-00'),
(154, 0, 2, 12, 6, '0000-00-00'),
(155, 0, 2, 16, 6, '0000-00-00'),
(156, 0, 8, 11, 6, '2017-06-01'),
(157, 0, 8, 9, 6, '2017-06-02'),
(158, 0, 8, 10, 6, '2017-06-03'),
(159, 0, 7, 11, 6, '2017-06-01'),
(160, 0, 7, 8, 6, '2017-06-03'),
(161, 0, 7, 11, 6, '2017-06-04'),
(162, 0, 7, 10, 6, '2017-06-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nisn` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama`, `password`) VALUES
(1, '12040138', 'jono', 'ef9322a1a342a36856e9e8929b19437a'),
(2, '456789', 'Merdeka45', 'f05c159834f64eafd0444d07c64bd359'),
(3, '123456', 'Edwin', 'c33367701511b4f6020ec61ded352059'),
(4, '123457', 'Zaenal', '4df81bb93a24156c89466af856bf7514'),
(5, '869824', 'Alan', '02558a70324e7c4f269c69825450cec8'),
(6, '869825', 'James', 'b4cc344d25a2efe540adbf2678e2304c'),
(7, '869826', 'Rangga', '8548f94355812264e1975eede11fa762'),
(8, '869827', 'Iman', '5be9a68073f66a56554e25614e9f1c9a'),
(9, '869829', 'Hendra', 'a04cca766a885687e33bc6b114230ee9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_siswa`
--

CREATE TABLE IF NOT EXISTS `status_siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `jum_pelanggaran` int(11) NOT NULL,
  `poin` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindak_lanjut`
--

CREATE TABLE IF NOT EXISTS `tindak_lanjut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pel_sis` int(3) NOT NULL,
  `tindak1` varchar(200) NOT NULL,
  `tindak2` varchar(200) NOT NULL,
  `tindak3` varchar(200) NOT NULL,
  `tindak4` varchar(200) NOT NULL,
  `tgl_tindak1` date NOT NULL,
  `tgl_tindak2` date NOT NULL,
  `tgl_tindak3` date NOT NULL,
  `tgl_tindak4` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `tindak_lanjut`
--

INSERT INTO `tindak_lanjut` (`id`, `id_pel_sis`, `tindak1`, `tindak2`, `tindak3`, `tindak4`, `tgl_tindak1`, `tgl_tindak2`, `tgl_tindak3`, `tgl_tindak4`) VALUES
(13, 162, 'Bimbingan supaya tidak bermain bola lagi', 'Bimbingan supaya tidak bermain bola untuk kesekian kali nya', '', '', '2017-06-14', '2017-06-15', '0000-00-00', '0000-00-00'),
(14, 155, 'Bimbingan untuk tepat waktu', 'Bimbingan untuk lebih peka terhadap waktu', '', '', '2017-06-08', '2017-06-10', '0000-00-00', '0000-00-00'),
(16, 111, 'jajaja', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(17, 124, 'Peringatan 12', '', '', '', '2017-06-07', '0000-00-00', '0000-00-00', '0000-00-00'),
(18, 124, 'Peringatan 12', '', '', '', '2017-06-07', '0000-00-00', '0000-00-00', '0000-00-00'),
(19, 126, 'Pelanggaran 13', '', '', '', '2017-06-09', '0000-00-00', '0000-00-00', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
