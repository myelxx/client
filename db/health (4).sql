-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2019 at 06:50 AM
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
-- Database: `health`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email_address` varchar(45) NOT NULL,
  `password` text NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(45) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `player_id` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `email_address`, `password`, `first_name`, `last_name`, `birth_date`, `address`, `contact_no`, `Gender`, `player_id`, `status`) VALUES
(2, 'Rex ', 'marckenneth.lomio@gmail.com', '123', 'Rex', 'Dionglay', '2019-07-03', '853 Guinhawa st.', '50156656-3500', 'Female', 'f71f9c23-3aa5-4974-abd6-dddc363ea0b9', 0),
(6, 'jsjf', 'mkclomio@yahoo.com', '123', 'jsjf', 'jsjeh', '2019-08-12', 'jfjdjsks', '645454', 'Gender', 'f71f9c23-3aa5-4974-abd6-dddc363ea0b9	', 0),
(7, 'hhbn', 'ass@gmail.com', '$2y$10$GhuVKAj/qFFNMTTtASUhJ.owV/FzbMRF6PQ8yodNzIeb1SgsdF7Hy', 'gcttc', 'jvyyv', '2019-08-17', 'ghhjjjjj', '12555', 'Male', 'f71f9c23-3aa5-4974-abd6-dddc363ea0b9', 0);

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `ID` int(11) NOT NULL,
  `a_what` varchar(200) NOT NULL,
  `a_when` varchar(45) NOT NULL,
  `a_where` varchar(200) NOT NULL,
  `a_who` varchar(45) NOT NULL,
  `image` varchar(200) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`ID`, `a_what`, `a_when`, `a_where`, `a_who`, `image`, `date_created`) VALUES
(4, 'HAKHAK', '2019-07-06', 'barangka drive court', 'LGU', 'http://192.168.1.15/adminsample/images/im2.jfif', '0000-00-00'),
(5, 'Tayo ay mag lilinis ng mga kanal, gulong na m', '2019-08-03', 'Simula sa Barangka drive hanggang bagong sila', 'Local goverment units ng mandaluyong at konse', 'http://192.168.1.15/adminsample/images/dfd.jpg', '0000-00-00'),
(6, 'OPLAN SITA', '2019-08-03', 'Simula sa Barangka drive hanggang bagong sila', 'Local goverment units ng mandaluyong at konse', 'http://192.168.1.15/adminsample/images/dfd.jpg', '0000-00-00'),
(8, 'hi', '2019-08-22', 'ggsg', 'hi', 'images/53164955_1029472497240189_3989476056171020288_n.jpg', '2019-08-18'),
(9, 'ha', '2019-08-19', 'halaman', 'ha', 'images/dfd.jpg', '2019-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_details`
--

CREATE TABLE `announcement_details` (
  `id` int(11) NOT NULL,
  `name` varchar(5) DEFAULT NULL,
  `greetings` varchar(100) DEFAULT NULL,
  `first` varchar(100) DEFAULT NULL,
  `second` varchar(100) DEFAULT NULL,
  `third` varchar(100) DEFAULT NULL,
  `fourth` varchar(100) DEFAULT NULL,
  `fifth` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement_details`
--

INSERT INTO `announcement_details` (`id`, `name`, `greetings`, `first`, `second`, `third`, `fourth`, `fifth`) VALUES
(1, 'EN', 'Good day!', 'We would like to announce that there will be a ', ' happening on ', ' at ', 'held by ', NULL),
(2, 'TG', 'Magandang araw!', 'Gusto ko lang inanunsyo na magkakaaroon ng ', ' sa', ' sa ', 'inorganisa ng', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `disease_id` int(11) NOT NULL,
  `disease_name` text NOT NULL,
  `symptoms` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`disease_id`, `disease_name`, `symptoms`) VALUES
(1, 'Dengue', 'Cold, Fever, Chicken Pox, '),
(3, 'Mallaria', 'Cold, Fever, Chicken Pox, '),
(4, 'stete', 'Cough, Cold, ha, ');

-- --------------------------------------------------------

--
-- Table structure for table `disease_symptoms`
--

CREATE TABLE `disease_symptoms` (
  `disease_id` int(11) DEFAULT NULL,
  `symptoms_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease_symptoms`
--

INSERT INTO `disease_symptoms` (`disease_id`, `symptoms_id`) VALUES
(1, 1),
(1, 2),
(3, 2),
(21, 2),
(21, 3),
(21, 6),
(21, 7),
(22, 2),
(22, 3),
(22, 6),
(22, 7),
(1, 1),
(1, 3),
(1, 4),
(1, 2),
(1, 3),
(1, 4),
(3, 1),
(3, 5),
(3, 7),
(4, 1),
(4, 2),
(4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `health_tips`
--

CREATE TABLE `health_tips` (
  `ID` int(11) NOT NULL,
  `Title` varchar(45) NOT NULL,
  `health_tips` varchar(255) NOT NULL,
  `source` varchar(45) NOT NULL,
  `images` text NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `health_tips`
--

INSERT INTO `health_tips` (`ID`, `Title`, `health_tips`, `source`, `images`, `date_created`) VALUES
(3, 'Allergies', '1. Buy this kind of medicine\r\n2. Drink this kind of medicine', 'www.nhs.uk/conditions/allergies/prevention/', 'http://192.168.1.15/adminsample/images/im2.jfif', '0000-00-00'),
(4, 'Any', '1. Buy this kind of medicine\r\n2. Drink this kind of medicine', 'www.nhs.uk/conditions/allergies/prevention/', 'http://192.168.1.15/adminsample/images/im2.jfif', '0000-00-00'),
(5, 'Anyyy', '1. Buy this kind of medicine\r\n2. Drink this kind of medicine', 'www.nhs.uk/conditions/allergies/prevention/', 'http://192.168.1.15/adminsample/images/im2.jfif', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `outbreak`
--

CREATE TABLE `outbreak` (
  `outbreak_id` int(11) NOT NULL,
  `total_cases` int(11) NOT NULL,
  `disease_name` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `contact_no` int(11) NOT NULL,
  `address` text NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `date_created` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `disease_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `firstname`, `lastname`, `contact_no`, `address`, `latitude`, `longitude`, `date_created`, `status`, `disease_id`) VALUES
(1, 'marc', 'kenneth', 9128312, 'hakdog', '14.5794', '121.0359', '2019-08-18', 1, 1),
(2, 'dora', 'kenneth', 9128312, 'hakdog', '14.5794', '121.0359', '2019-08-18', 1, 1),
(3, 'dora', 'kenneth', 9128312, 'hakdog', '14.5794', '121.0359', '2019-08-18', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `symptoms_id` int(11) NOT NULL,
  `symptoms_name` text NOT NULL,
  `disease_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`symptoms_id`, `symptoms_name`, `disease_id`) VALUES
(1, 'Cough', 1),
(2, 'Cold', 1),
(3, 'Fever', 1),
(4, 'Chicken Pox', 1),
(5, 'h', NULL),
(7, 'ha', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `announcement_details`
--
ALTER TABLE `announcement_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`disease_id`);

--
-- Indexes for table `health_tips`
--
ALTER TABLE `health_tips`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `outbreak`
--
ALTER TABLE `outbreak`
  ADD PRIMARY KEY (`outbreak_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`symptoms_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `announcement_details`
--
ALTER TABLE `announcement_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `disease_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `health_tips`
--
ALTER TABLE `health_tips`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `outbreak`
--
ALTER TABLE `outbreak`
  MODIFY `outbreak_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `symptoms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
