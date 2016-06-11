-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2016 at 03:44 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `soal2`
--

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE IF NOT EXISTS `laporan` (
  `IDLaporan` int(11) NOT NULL AUTO_INCREMENT,
  `TanggalLaporan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Peserta` int(4) NOT NULL,
  `Mean` int(3) NOT NULL,
  `Max` int(3) NOT NULL,
  `Min` int(3) NOT NULL,
  `Deviation` int(3) NOT NULL,
  PRIMARY KEY (`IDLaporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `IDSiswa` int(11) NOT NULL AUTO_INCREMENT,
  `Identitas` varchar(20) NOT NULL,
  `NamaSiswa` varchar(100) NOT NULL,
  `KodeUnik` varchar(5) NOT NULL,
  `StatusUjian` varchar(10) NOT NULL,
  `Benar` varchar(3) NOT NULL,
  `Salah` varchar(3) NOT NULL,
  `Nilai` varchar(2) NOT NULL,
  PRIMARY KEY (`IDSiswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`IDSiswa`, `Identitas`, `NamaSiswa`, `KodeUnik`, `StatusUjian`, `Benar`, `Salah`, `Nilai`) VALUES
(1, 'Rodin', 'Dosen Rodin', '1234', 'DOSEN', '-', '-', '-'),
(2, '7193', 'Andrie', 'abcd', 'Sudah', '13', '11', '54'),
(3, '1111', 'Samsul', '1111', 'Sudah', '12', '12', '50'),
(4, '2222', 'Utama', '2222', 'Sudah', '18', '6', '75'),
(5, '3333', 'Arifin', '3333', 'Belum', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `IDSoal` int(11) NOT NULL AUTO_INCREMENT,
  `Soal` text NOT NULL,
  `Jawaban` varchar(2) NOT NULL,
  PRIMARY KEY (`IDSoal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`IDSoal`, `Soal`, `Jawaban`) VALUES
(1, 'Soal 1', 'C'),
(2, 'Soal 2', 'B'),
(3, 'Soal 3', 'A'),
(4, 'Soal 4', 'C'),
(5, 'Soal 5', 'C'),
(6, 'Soal 6', 'C'),
(7, 'Soal 7', 'C'),
(8, 'Soal 8', 'B'),
(9, 'Soal 9', 'A'),
(10, 'Soal 10', 'C'),
(11, 'Soal 11', 'C'),
(12, 'Soal 12', 'C'),
(13, 'Soal 13', 'C'),
(14, 'Soal 14', 'B'),
(15, 'Soal 15', 'A'),
(16, 'Soal 16', 'C'),
(17, 'Soal 17', 'C'),
(18, 'Soal 18', 'C'),
(19, 'Soal 19', 'C'),
(20, 'Soal 20', 'B'),
(21, 'Soal 21', 'A'),
(22, 'Soal 22', 'D'),
(23, 'Soal 23', 'A'),
(24, 'Soal 24', 'B');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
