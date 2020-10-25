-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: fdb20.awardspace.net
-- Generation Time: 12-Set-2019 às 12:14
-- Versão do servidor: 5.7.20-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3140125_banco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dado`
--

CREATE TABLE `dado` (
  `recebe` char(20) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dado`
--

INSERT INTO `dado` (`recebe`, `ID`) VALUES
('', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste`
--

CREATE TABLE `teste` (
  `ID` int(11) NOT NULL,
  `Nome` char(20) COLLATE latin1_bin NOT NULL,
  `Data` char(20) COLLATE latin1_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Extraindo dados da tabela `teste`
--

INSERT INTO `teste` (`ID`, `Nome`, `Data`) VALUES
(1, 'Usuario 1', '01/09/2019 15:19:13'),
(2, 'Usuario 2', '01/09/2019 15:20:00'),
(8, 'Usuario 8', '01/09/2019 16:16:10'),
(4, 'Usuario 4', '01/09/2019 15:20:35'),
(5, 'Usuario 5', '01/09/2019 15:20:47'),
(6, 'Usuario 6', '01/09/2019 15:21:28'),
(7, 'Usuario 7', '01/09/2019 15:31:35'),
(9, 'Usuario 9', '01/09/2019 16:18:30'),
(27, 'Usuario 27', '04/09/2019 16:06:36'),
(42, 'Usuario 42', '09/09/2019 15:11:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dado`
--
ALTER TABLE `dado`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `teste`
--
ALTER TABLE `teste`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dado`
--
ALTER TABLE `dado`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
