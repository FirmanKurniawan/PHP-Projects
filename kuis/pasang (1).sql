-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 05. Mei 2015 jam 20:21
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pasang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasang4d`
--

CREATE TABLE IF NOT EXISTS `pasang4d` (
  `idpasang4d` int(11) NOT NULL AUTO_INCREMENT,
  `id_player` varchar(100) NOT NULL,
  `no_faktur_4d` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `totalbayar` text NOT NULL,
  PRIMARY KEY (`idpasang4d`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 DELAY_KEY_WRITE=1 AUTO_INCREMENT=103 ;

--
-- Dumping data untuk tabel `pasang4d`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `pasang4ddetail`
--

CREATE TABLE IF NOT EXISTS `pasang4ddetail` (
  `idpasang4ddetail` int(11) NOT NULL AUTO_INCREMENT,
  `id_player` varchar(100) NOT NULL,
  `no_faktur_4d` int(11) NOT NULL,
  `tebak` int(4) NOT NULL,
  `taruhan` text NOT NULL,
  `bayar` text NOT NULL,
  PRIMARY KEY (`idpasang4ddetail`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;

--
-- Dumping data untuk tabel `pasang4ddetail`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
