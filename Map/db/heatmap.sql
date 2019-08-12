-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2019 at 04:20 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heatmap`
--

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `disease_id` int(11) NOT NULL,
  `disease_name` text NOT NULL,
  `barangay_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`disease_id`, `disease_name`, `barangay_id`) VALUES
(1, 'Malaria', 1),
(2, 'Dengue', 1),
(3, 'Dengue', 1),
(4, 'Cancer', 3),
(5, 'Malaria', 3),
(6, 'Cancer', 3);

-- --------------------------------------------------------

--
-- Table structure for table `map_tbl`
--

CREATE TABLE `map_tbl` (
  `id` int(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `latitude` varchar(10) DEFAULT NULL,
  `longitude` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `validate` int(11) DEFAULT '1',
  `disease` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map_tbl`
--

INSERT INTO `map_tbl` (`id`, `address`, `latitude`, `longitude`, `date`, `validate`, `disease`) VALUES
(1, 'pasig', '14.581417', '121.077222', '2019-07-24', 1, 'dengue'),
(2, 'pasig', '14.581417', '121.077222', '2019-07-24', 1, 'dengue'),
(3, 'pasig', '14.581417', '121.077222', '2019-07-24', 1, 'dengue'),
(4, 'pasig', '14.581417', '121.077222', '2019-07-24', 1, 'dengue'),
(5, 'pasig', '14.581417', '121.077222', '2019-07-24', 1, 'dengue'),
(6, 'pasig', '14.581417', '121.077222', '2019-07-24', 1, 'dengue'),
(7, 'pasig', '14.581417', '121.077222', '2019-07-24', 1, 'dengue'),
(8, 'pasig', '14.574694', '121.035748', '2019-07-24', 1, 'HIV'),
(9, 'pasig', '14.581417', '121.077222', '2019-07-24', 1, 'dengue'),
(10, 'pasig', '14.574694', '121.035748', '2019-07-24', 1, 'dengue'),
(11, 'san juan', '14.602847', '121.045293', '2019-07-24', 1, 'HIV'),
(12, 'san juan', '14.602847', '121.045293', '2019-07-24', 1, 'dengue'),
(13, 'san juan', '14.602847', '121.045293', '2019-07-24', 1, 'dengue'),
(14, 'san juan', '14.602847', '121.045293', '2019-07-24', 1, 'dengue'),
(15, 'san juan', '14.602847', '121.045293', '2019-07-24', 1, 'dengue'),
(16, 'san juan', '14.553007', '121.045293', '2019-07-24', 1, 'dengue'),
(17, 'san juan', '14.602847', '121.045293', '2019-07-24', 1, 'dengue'),
(18, 'san juan', '14.602847', '121.045293', '2019-07-24', 1, 'dengue'),
(19, 'taguig', '14.553007', '121.043233', '2019-07-24', 1, 'rashes'),
(20, 'taguig', '14.573355', '121.032711', '2019-07-24', 1, 'rashes'),
(21, 'taguig', '14.573355', '121.032711', '2019-07-24', 1, 'rashes'),
(22, 'taguig', '14.573355', '121.032711', '2019-07-24', 1, 'rashes'),
(23, 'taguig', '14.584569', '121.035244', '2019-07-24', 1, 'rashes'),
(24, 'taguig', '14.584569', '121.035244', '2019-07-24', 1, 'rashes'),
(25, 'taguig', '14.584569', '121.035244', '2019-07-24', 1, 'rashes'),
(26, 'taguig', '14.553007', '121.043233', '2019-07-24', 1, 'rashes'),
(27, 'taguig', '14.553007', '121.043233', '2019-07-24', 1, 'rashes');

-- --------------------------------------------------------

--
-- Table structure for table `pinpoint`
--

CREATE TABLE `pinpoint` (
  `id` int(11) NOT NULL,
  `address` text NOT NULL,
  `disease` text NOT NULL,
  `lat` varchar(11) NOT NULL,
  `lng` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinpoint`
--

INSERT INTO `pinpoint` (`id`, `address`, `disease`, `lat`, `lng`) VALUES
(1, 'Bagong Ilog', 'Malaria, Dengue, Cancer', '14.566135', ' 121.069239'),
(2, 'Bagong Katipunan	', 'Malaria, Cancer, Dengue', '14.558970', '121.074432'),
(3, 'Bambang	', 'Malaria, Cancer, Dengue', '14.556416', '121.079713'),
(4, 'Buting	', 'Malaria, Dengue, Cancer', '14.554919', '121.067351'),
(5, 'San Antonio	', 'Malaria,Dengue,Cancer', '14.583695', '121.061768');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`disease_id`);

--
-- Indexes for table `map_tbl`
--
ALTER TABLE `map_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinpoint`
--
ALTER TABLE `pinpoint`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `disease_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `map_tbl`
--
ALTER TABLE `map_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pinpoint`
--
ALTER TABLE `pinpoint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
