-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2020 at 02:03 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kpis_r_code`
--
CREATE DATABASE IF NOT EXISTS `kpis_r_code` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kpis_r_code`;

-- --------------------------------------------------------

--
-- Table structure for table `kpis_kpi`
--

DROP TABLE IF EXISTS `kpis_kpi`;
CREATE TABLE `kpis_kpi` (
  `kpi_id` int(11) NOT NULL,
  `kpi_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kpis_kpi`
--

INSERT INTO `kpis_kpi` (`kpi_id`, `kpi_title`) VALUES
(1, 'kpi1'),
(2, 'kpi2');

-- --------------------------------------------------------

--
-- Table structure for table `projections_prj`
--

DROP TABLE IF EXISTS `projections_prj`;
CREATE TABLE `projections_prj` (
  `prj_id` int(11) NOT NULL,
  `prj_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projections_prj`
--

INSERT INTO `projections_prj` (`prj_id`, `prj_title`) VALUES
(1, 'projections 1'),
(2, 'projections 2');

-- --------------------------------------------------------

--
-- Table structure for table `reports_rep`
--

DROP TABLE IF EXISTS `reports_rep`;
CREATE TABLE `reports_rep` (
  `rep_id` int(11) NOT NULL,
  `rep_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports_rep`
--

INSERT INTO `reports_rep` (`rep_id`, `rep_title`) VALUES
(1, 'report 1'),
(2, 'report 2');

-- --------------------------------------------------------

--
-- Table structure for table `users_usr`
--

DROP TABLE IF EXISTS `users_usr`;
CREATE TABLE `users_usr` (
  `usr_id` int(11) NOT NULL,
  `usr_name` varchar(255) NOT NULL,
  `usr_password` varchar(255) NOT NULL,
  `priv_admin` varchar(1) DEFAULT NULL,
  `kpis_ids` varchar(255) DEFAULT NULL,
  `projections_ids` varchar(255) DEFAULT NULL,
  `reports_ids` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_usr`
--

INSERT INTO `users_usr` (`usr_id`, `usr_name`, `usr_password`, `priv_admin`, `kpis_ids`, `projections_ids`, `reports_ids`) VALUES
(1, 'admin', 'admin', 'Y', NULL, NULL, NULL),
(2, 'user1', 'user1', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kpis_kpi`
--
ALTER TABLE `kpis_kpi`
  ADD PRIMARY KEY (`kpi_id`);

--
-- Indexes for table `projections_prj`
--
ALTER TABLE `projections_prj`
  ADD PRIMARY KEY (`prj_id`);

--
-- Indexes for table `reports_rep`
--
ALTER TABLE `reports_rep`
  ADD PRIMARY KEY (`rep_id`);

--
-- Indexes for table `users_usr`
--
ALTER TABLE `users_usr`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kpis_kpi`
--
ALTER TABLE `kpis_kpi`
  MODIFY `kpi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projections_prj`
--
ALTER TABLE `projections_prj`
  MODIFY `prj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reports_rep`
--
ALTER TABLE `reports_rep`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_usr`
--
ALTER TABLE `users_usr`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
