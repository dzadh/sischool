-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 28 Des 2017 pada 05.49
-- Versi Server: 5.6.11
-- Versi PHP: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `sischool`
--
CREATE DATABASE IF NOT EXISTS `sischool` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sischool`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `favorit`
--

CREATE TABLE IF NOT EXISTS `favorit` (
  `ID_Sekolah` int(4) NOT NULL,
  `Foto` mediumtext NOT NULL,
  PRIMARY KEY (`ID_Sekolah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `ID_Sekolah` int(4) NOT NULL,
  `NIP` int(20) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Jabatan` varchar(50) NOT NULL,
  `Foto` mediumtext NOT NULL,
  PRIMARY KEY (`ID_Sekolah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE IF NOT EXISTS `sekolah` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(100) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Telepon` varchar(13) NOT NULL,
  `Visi` varchar(500) NOT NULL,
  `Misi` varchar(500) NOT NULL,
  `Logo` mediumtext NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `favorit`
--
ALTER TABLE `favorit`
  ADD CONSTRAINT `favorit_ibfk_1` FOREIGN KEY (`ID_Sekolah`) REFERENCES `sekolah` (`ID`);

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`ID_Sekolah`) REFERENCES `sekolah` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
