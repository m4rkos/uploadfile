-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Set-2018 às 12:01
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "-03:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `sitebase`
--

CREATE TABLE `sitebase` (
  `id` int(11) NOT NULL,
  `nomeSite` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `urlBase` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `domin` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `opengraf` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opengrafOrigName` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `opengrafTypeFile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opengrafSize` bigint(20) NOT NULL,
  `g_maps` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `g_analytics` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cBy` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uBy` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ct` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ut` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sitebase`
--
ALTER TABLE `sitebase`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sitebase`
--
ALTER TABLE `sitebase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


/*Logs*/
create table log (
  id_ordem int(11) auto_increment primary key, 
  idLog varchar(25) NOT NULL, 
  cBy varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL, 
  ct timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
