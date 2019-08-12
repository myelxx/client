-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2019 at 03:31 PM
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
  `brgy` varchar(45) NOT NULL,
  `land_line` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `email_address`, `password`, `first_name`, `last_name`, `birth_date`, `address`, `brgy`, `land_line`, `contact_no`, `Gender`) VALUES
(2, 'rex', 'rex@gmail.com', '123', 'Rex', 'Dionglay', '2019-07-03', 'fsgsgsgs', 'idkz', '535353', '559', 'Female'),
(3, 'Dominicz', 'cuadra@gmail.com', '$2y$10$AZAAdYkBtmHBki9FmhQb3OtrAeeUM4FASp.0.9PdGJuqTo7uDm4n2', 'Dominic', 'Cuadra', '2019-07-22', 'guinhawa st', 'barangka drive', '222', '222', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `android_php_post`
--

CREATE TABLE `android_php_post` (
  `id` int(5) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `encrypted_password` varchar(80) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `ID` int(11) NOT NULL,
  `a_what` varchar(200) NOT NULL,
  `a_when` date NOT NULL,
  `a_where` varchar(200) NOT NULL,
  `a_who` varchar(45) NOT NULL,
  `image` varchar(200) NOT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`ID`, `a_what`, `a_when`, `a_where`, `a_who`, `image`, `date_created`) VALUES
(4, 'Libre tuli ', '2019-08-15', 'barangka drive court', 'LGU', 'images/im2.jfif', '2019-08-12 19:06:06'),
(37, 'Libre tuliIZZZZ', '2019-08-17', 'barangka drive court', 'LGU', 'images/dfd.jpg', '2019-08-12 19:10:34'),
(38, '00', '2019-08-26', '00', 'yy', 'images/im1.png', '2019-08-12 00:00:00'),
(40, 'new', '2019-08-23', 'new', 'newz', 'images/im1.png', '2019-08-12 19:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `crowd_patient`
--

CREATE TABLE `crowd_patient` (
  `patients_id` int(50) NOT NULL,
  `symptoms_id` varchar(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `date_input` date NOT NULL,
  `Symptoms` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crowd_patient`
--

INSERT INTO `crowd_patient` (`patients_id`, `symptoms_id`, `first_name`, `last_name`, `barangay`, `address`, `date_input`, `Symptoms`) VALUES
(1, '1', 'mej', 'mej', 'san andres', 'plantrees', '2019-08-14', 'mallaria'),
(3, '1', 'mej', 'mej', 'san andres', 'plantrees', '2019-08-15', 'mallaria');

-- --------------------------------------------------------

--
-- Table structure for table `health_tips`
--

CREATE TABLE `health_tips` (
  `ID` int(11) NOT NULL,
  `Title` varchar(45) NOT NULL,
  `health_tips` varchar(255) NOT NULL,
  `source` varchar(45) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `health_tips`
--

INSERT INTO `health_tips` (`ID`, `Title`, `health_tips`, `source`, `image`, `date_created`) VALUES
(2, 'Rushes Vommiting', '<p>1. Buy this kind of medicine</p><p>2. Drink this kind of medicine</p><p>3.GSG</p><p>4.KLFSKLGS</p><p>5.</p>', 'Health workers', 'images/53164955_1029472497240189_3989476056171020288_n.jpg', '2019-08-12 19:11:58'),
(3, 'Sample Vommiting', '<p>1. Buy this kind of medicine</p><p>2. Drink this kind of medicine</p>', 'Health workers', 'images/Black, White and Turquoise Headset DJ Monophonic Logo.png', '2019-08-10 15:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `heatmap`
--

CREATE TABLE `heatmap` (
  `id` int(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `latitude` varchar(10) DEFAULT NULL,
  `longitude` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `validate` int(1) DEFAULT NULL,
  `disease` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `heatmap`
--

INSERT INTO `heatmap` (`id`, `address`, `latitude`, `longitude`, `date`, `validate`, `disease`) VALUES
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
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `ID` int(11) NOT NULL,
  `notif` varchar(200) NOT NULL,
  `notif_from` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`ID`, `notif`, `notif_from`) VALUES
(1, '', ''),
(2, '', ''),
(3, 'Medical mission', 'mandaluyong city');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `ID` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `birthdate` varchar(45) NOT NULL,
  `contact_no` varchar(45) NOT NULL,
  `symp1` varchar(45) NOT NULL,
  `symp2` varchar(45) NOT NULL,
  `datechk` varchar(45) NOT NULL,
  `Gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`ID`, `name`, `address`, `birthdate`, `contact_no`, `symp1`, `symp2`, `datechk`, `Gender`) VALUES
(15, 'Dominic', '853 Guinhawa st.', '2019-04-03', '12312312312', 'asdasdasdasd', 'asdasdasdas', '\r\n       2019-04-17', 'male'),
(16, 'Dominic', '853 Guinhawa st.', '2019-04-03', '12312312312', 'asdasdasdasd', 'asdasdasdas', '\r\n       2019-04-17', 'male'),
(18, 'zara salas', 'san miguel street', '2019-03-23', '2324234234', 'nilalagnat', 'nilalagnat', '\r\n       2019-05-09', 'female'),
(19, 'Angelito jamila', 'pangdang', '2019-05-04', '092989996555', 'nerbyos', 'gutier', '\r\n       2019-05-03', 'male'),
(20, 'Angelito jamila', 'pangdang', '2019-05-04', '092989996555', 'nerbyos', 'gutier', '\r\n       2019-05-03', 'male'),
(21, 'Dominic Cuadra', '853 Guinhawa st.', '2019-06-11', '123221', 'nilalagnat', 'rushes', '\r\n       2019-06-14', 'male'),
(22, 'Dominic Cuadra', '853 Guinhawa st.', '2019-06-11', '123221', 'nilalagnat', 'rushes', '\r\n       2019-06-14', 'male'),
(23, 'Dominic', '853 Guinhawa st.', '2019-06-04', '12312312312', 'nilalagnat', 'gutier', '2019-06-26', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `ID` int(50) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `birthdate` varchar(45) NOT NULL,
  `City` varchar(45) NOT NULL,
  `Contact_no` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`ID`, `username`, `password`, `first_name`, `last_name`, `birthdate`, `City`, `Contact_no`) VALUES
(1, 'superadmin', '12345', 'dominic', 'cuadra', 'march 11 1994', 'Mandaluyong', 920899655),
(2, 'superadmin', '12345', 'dominic', 'cuadra', 'march 11 1994', 'Mandaluyong', 920899655);

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `symptoms_id` varchar(11) NOT NULL,
  `rushes` varchar(1) NOT NULL,
  `Vomiting` varchar(1) NOT NULL,
  `Swollen_glands` varchar(1) NOT NULL,
  `Seizures` varchar(1) NOT NULL,
  `Nausea` varchar(1) NOT NULL,
  `Muscle_pain` varchar(1) NOT NULL,
  `Jaundice` varchar(1) NOT NULL,
  `Fever` varchar(1) NOT NULL,
  `Dry_cough` varchar(1) NOT NULL,
  `Diarrhea` varchar(1) NOT NULL,
  `Chills` varchar(1) NOT NULL,
  `Dehydration` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`symptoms_id`, `rushes`, `Vomiting`, `Swollen_glands`, `Seizures`, `Nausea`, `Muscle_pain`, `Jaundice`, `Fever`, `Dry_cough`, `Diarrhea`, `Chills`, `Dehydration`) VALUES
('1', '1', '1', '1', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `text`, `image`) VALUES
(1, 'yow', 'Black, White and Turquoise Headset DJ Monophonic Logo.png'),
(2, 'yes', 'image1.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `birthdate` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `brgy` varchar(45) NOT NULL,
  `contact_no` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `first_name`, `last_name`, `password`, `gender`, `birthdate`, `address`, `brgy`, `contact_no`) VALUES
(1, 'Bill', 'Arcilla', 'qweqwe123', 'Male', '1998-11-11', 'manila', 'Barangka', '091231231'),
(2, 'Louice', 'Cuadra', 'qweqwe123', 'Male', '1998-11-11', 'manila', 'Hagdang Bato', '091231231');

-- --------------------------------------------------------

--
-- Table structure for table `users_crowd`
--

CREATE TABLE `users_crowd` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_crowd`
--

INSERT INTO `users_crowd` (`id`, `name`, `email`, `password`) VALUES
(1, 'doms', 'mj@gmail.com', '123'),
(2, 'mek', 'mek@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `android_php_post`
--
ALTER TABLE `android_php_post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `crowd_patient`
--
ALTER TABLE `crowd_patient`
  ADD PRIMARY KEY (`patients_id`);

--
-- Indexes for table `health_tips`
--
ALTER TABLE `health_tips`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `heatmap`
--
ALTER TABLE `heatmap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`symptoms_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users_crowd`
--
ALTER TABLE `users_crowd`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `android_php_post`
--
ALTER TABLE `android_php_post`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `crowd_patient`
--
ALTER TABLE `crowd_patient`
  MODIFY `patients_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `health_tips`
--
ALTER TABLE `health_tips`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `heatmap`
--
ALTER TABLE `heatmap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_crowd`
--
ALTER TABLE `users_crowd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
