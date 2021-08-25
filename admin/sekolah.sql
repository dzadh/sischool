-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Des 2017 pada 15.16
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sischool`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE IF NOT EXISTS `sekolah` (
`ID` int(4) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Telepon` varchar(13) NOT NULL,
  `Visi` varchar(500) NOT NULL,
  `Misi` varchar(500) NOT NULL,
  `Logo` mediumtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`ID`, `Nama`, `Alamat`, `Telepon`, `Visi`, `Misi`, `Logo`) VALUES
(1, 'SMA IT Nur hidayah', 'Jl. Pandawa No.13, Pucangan, Kartasura, Kabupaten Sukoharjo, Jawa Tengah 57168', '', '', '', ''),
(2, 'SMAS AL ISLAM 1 SURAKARTA', 'JL. HONGGOWONGSO NO. 94, Panularan, Kec. Laweyan', '', '', '', ''),
(3, 'SMAS AL ISLAM 3 SURAKARTA', 'JL. HONGGOWONGSO NO. 28 A, SRIWEDARI, Kec. Laweyan Kota Surakarta', '', '', '', ''),
(4, 'SMAS AL MUAYYAD SURAKARTA', 'JL. KH. SAMANHUDI NO. 64, PURWOSARI, Kec. Laweyan', '', '', '', ''),
(5, 'SMAS BATIK 1 SURAKARTA', 'JL. SLAMET RIYADI NO. 445, Pajang, Kec. Laweyan', '', '', '', ''),
(6, 'SMAS BATIK 2 SURAKARTA', ' JL. SAM RATULANGI NO. 86, KERTEN, Kec. Laweyan', '', '', '', ''),
(7, 'SMAS MURNI SURAKARTA', 'JL. DR. WAHIDIN NO. 33, Penumping, Kec. Laweyan', '', '', '', ''),
(8, 'SMAS PANGUDI LUHUR ST, YOSEF', 'JL. LU. ADISUCIPTO (JL. KELENGKENG 1), KERTEN, Kec. Laweyan', '', '', '', ''),
(9, 'SMAS REGINA PACIS SURAKARTA', 'JL. LU. ADISUCIPTO NO. 45, Kerten, Kec. Laweyan', '', '', '', ''),
(10, 'SMAS SANTO PAULUS SURAKARTA', 'JL. DR. RAJIMAN NO 659 R, Pajang, Kec. Laweyan', '', '', '', ''),
(11, 'SMAS WIDYA BHAKTI SURAKARTA', ' JL. TANJUNG NO 75 KARANGASEM, KARANG ASEM, Kec. Laweyan', '', '', '', ''),
(12, 'SMAN 7 SURAKARTA', 'JL. MUH. YAMIN 79 SURAKARTA, TIPES, Kec. Serengan', '', '', '', ''),
(13, 'SMAS KRISTEN 1 SURAKARTA', 'JL. HONGGOWONGSO NO. 135, Kratonan, Kec. Serengan', '', '', '', ''),
(14, 'SMAS ISLAM 1 SURAKARTA', 'JL. BRIGJEN SUDIARTO 151, Joyosuran, Kec. Pasarkliwon', '', '', '', ''),
(15, 'SMAS ISLAM DIPONEGORO', 'JL. SERAYU VIII NO. 2 SEMANGGI, Pasar Kliwon, Kec. Pasarkliwon', '', '', '', ''),
(16, 'SMAS MTA SURAKARTA', 'JL. KYAI MOJO, Semanggi, Kec. Pasarkliwon', '', '', '', ''),
(17, 'SMAN 3 SURAKARTA', 'Jl. Prof. W.Z. Johanes no 58 Surakarta, Purwodiningratan, Kec. Jebres', '', '', '', ''),
(18, 'SMAN 8 SURAKARTA', 'JL. SUMBING VI/49, MOJOSONGO, Kec. Jebres', '', '', '', ''),
(19, 'SMAS KRISTEN WIDYA WACANA', 'Jl. Mertolulutan No. 26, Purwodiningratan, Kec. Jebres', '', '', '', ''),
(20, 'SMAS MUHAMMADIYAH 3 SURAKARTA', 'JL. KOL. SUTARTO NO. 62, JEBRES, Kec. Jebres', '', '', '', ''),
(21, 'SMAS PELITA NUSANTARA KASIH', 'JL. SURYA NO. 54-56, PURWODININGRATAN, Kec. Jebres', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
