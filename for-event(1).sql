-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2018 at 11:27 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `for-event`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`) VALUES
(1, 'ahmed.d.hamdallah@gmail.com', 'Efinance');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `page` varchar(45) NOT NULL,
  `sport_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `parent_id`, `page`, `sport_id`) VALUES
(1, 'Sports', 0, 'sports.php', NULL),
(2, 'Football', 1, 'sports.php', NULL),
(3, 'B', 1, 'sports.php', NULL),
(4, 'C', 1, 'sports.php', NULL),
(5, 'D', 1, 'sports.php', NULL),
(6, 'E', 1, 'sports.php', NULL),
(7, 'F', 1, 'sports.php', NULL),
(8, 'G', 2, 'sports.php', NULL),
(9, 'h', 1, 'sports.php', NULL),
(10, 's', 8, 'sports.php', NULL),
(11, 'aaa', 2, 'sports.php', NULL),
(12, 'Media', 0, 'media.php', NULL),
(14, 'Politics', 0, 'politics.php', NULL),
(15, 'asd', 2, 'sports.php', NULL),
(16, 'fggg', 1, 'sports.php', NULL),
(20, 'Arts', 12, 'media.php', NULL),
(21, 'asss', 12, '', NULL),
(22, 'roma', 14, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`id`, `cat_name`, `content`, `created_date`, `image`, `title`, `category_id`) VALUES
(1, '1', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '2018-05-11 20:25:28', '49C83CC700000578-0-image-a-192_1520105431964.jpg', 'football', NULL),
(2, '2', 'ssssssssss', '2018-05-11 20:30:54', '49C83CC700000578-0-image-a-192_1520105431964.jpg', 'gerrard', NULL),
(3, '2', 'adasdad', '2018-05-13 15:29:18', '49C83CC700000578-0-image-a-192_1520105431964.jpg', 'sport', NULL),
(4, '20', 'adssd', '2018-05-13 15:58:18', '1 n5fcTaXL5SNrBqSYph0xAw.jpeg', 'music', NULL),
(36, '8', 'asdasdaD', '2018-05-13 20:57:44', '1 n5fcTaXL5SNrBqSYph0xAw.jpeg', 'basket', NULL),
(37, '12', 'asdasdaD', '2018-05-13 21:15:48', '1 n5fcTaXL5SNrBqSYph0xAw.jpeg', 'basketball', NULL),
(38, '14', 'asdd', '2018-05-13 21:17:39', 'png_steps_by_paradise234-d5kvomt.png', 'nano', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sport_id` (`sport_id`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`id`);

--
-- Constraints for table `sport`
--
ALTER TABLE `sport`
  ADD CONSTRAINT `sport_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
