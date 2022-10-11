-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 06:15 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk`
--

-- --------------------------------------------------------

--
-- Table structure for table `flag`
--

CREATE TABLE `flag` (
  `id_flag` int(11) NOT NULL,
  `level` varchar(255) NOT NULL,
  `flags` varchar(255) NOT NULL,
  `points` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flag`
--

INSERT INTO `flag` (`id_flag`, `level`, `flags`, `points`) VALUES
(1, 'LEVEL1', 'YABUREKABURE', '20'),
(2, 'LEVEL2', 'WADOOHEKERBANGET', '20'),
(3, 'LEVEL3', 'KOKHEKERBANG', '20'),
(4, 'LEVEL4', 'AMPUNNBANGGG', '20'),
(5, 'LEVEL5', 'OKEHBANGJAGO', '20');

-- --------------------------------------------------------

--
-- Table structure for table `solved`
--

CREATE TABLE `solved` (
  `id_solved` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `solved_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `solved`
--

INSERT INTO `solved` (`id_solved`, `username`, `solved_level`) VALUES
(4, 'abdi', 'LEVEL2'),
(6, 'abdi', 'LEVEL1'),
(8, 'yaa123', 'LEVEL1'),
(10, 'yaa123', 'LEVEL2'),
(11, 'fiqih', 'LEVEL1'),
(12, 'fiqih', 'LEVEL2'),
(13, 'fiqih', 'LEVEL3'),
(14, 'hiyaa', 'LEVEL1'),
(15, 'abdi', 'LEVEL5'),
(16, 'abdi', 'LEVEL3'),
(17, 'hekerbang', 'LEVEL1'),
(18, 'iya', 'LEVEL1'),
(19, 'abdi', 'LEVEL4'),
(20, 'hekerbang', 'LEVEL1'),
(21, 'iya', 'LEVEL1'),
(22, 'bukan', 'LEVEL1'),
(23, 'wadoo', 'LEVEL1'),
(24, 'sipaling', 'LEVEL1'),
(25, 'okeokelah', 'LEVEL1'),
(26, 'iyahhh', 'LEVEL1'),
(27, 'hekerbang', 'LEVEL2'),
(28, 'iya', 'LEVEL2'),
(29, 'bukan', 'LEVEL2'),
(30, 'wadoo', 'LEVEL2'),
(31, 'sipaling', 'LEVEL2'),
(32, 'okeokelah', 'LEVEL2'),
(33, 'iyahhh', 'LEVEL2'),
(34, 'hekerbang', 'LEVEL3'),
(35, 'iya', 'LEVEL3'),
(36, 'bukan', 'LEVEL3'),
(37, 'wadoo', 'LEVEL3'),
(38, 'sipaling', 'LEVEL3'),
(39, 'okeokelah', 'LEVEL3'),
(40, 'iyahhh', 'LEVEL3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`) VALUES
(1, 'abdi', 'asu@just4fun.me', '123'),
(2, 'yaa123', 'oke@halo.com', '123'),
(3, 'fiqih', 'fiqih@ganteng.com', '123456'),
(4, 'hiyaa', 'oke@gmail.com', 'oke'),
(5, 'hekerbang', 'iya@akuheker.com', 'wadoo123'),
(6, 'iya', 'iya@akuheker1.com', 'wadoo123'),
(7, 'bukan', 'iya@akuheker2.com', 'wadoo123'),
(8, 'wadoo', 'iya@akuheker3.com', 'wadoo123'),
(9, 'sipaling', 'iya@akuheker4.com', 'wadoo123'),
(10, 'okeokelah', 'iya@akuheker5.com', 'wadoo123'),
(11, 'iyahhh', 'iya@akuheker6.com', 'wadoo123'),
(12, 'lodoang', 'iya@akuheker7.com', 'wadoo123'),
(14, 'ifan', 'ifan@ganteng.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `user_score`
--

CREATE TABLE `user_score` (
  `id_score` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_score`
--

INSERT INTO `user_score` (`id_score`, `username`, `score`) VALUES
(1, 'abdi', 100),
(2, 'yaa123', 40),
(3, 'fiqih', 60),
(4, 'hiyaa', 20),
(5, 'hekerbang', 60),
(6, 'iya', 60),
(7, 'bukan', 60),
(8, 'wadoo', 60),
(9, 'sipaling', 60),
(10, 'okeokelah', 60),
(11, 'iyahhh', 60);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flag`
--
ALTER TABLE `flag`
  ADD PRIMARY KEY (`id_flag`);

--
-- Indexes for table `solved`
--
ALTER TABLE `solved`
  ADD PRIMARY KEY (`id_solved`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_score`
--
ALTER TABLE `user_score`
  ADD PRIMARY KEY (`id_score`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `solved`
--
ALTER TABLE `solved`
  MODIFY `id_solved` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_score`
--
ALTER TABLE `user_score`
  MODIFY `id_score` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
