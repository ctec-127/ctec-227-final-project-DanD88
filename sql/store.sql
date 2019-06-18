-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2019 at 05:58 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Kettle'),
(3, 'Hops'),
(4, 'Bucket'),
(5, 'Fermentation'),
(6, 'Tools'),
(7, 'Yeast');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `ItemNum` int(20) NOT NULL,
  `prodName` varchar(60) NOT NULL,
  `OnHand` int(40) NOT NULL,
  `category` varchar(40) NOT NULL,
  `price` float NOT NULL,
  `ProdImage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `ItemNum`, `prodName`, `OnHand`, `category`, `price`, `ProdImage`) VALUES
(1, 856890, '2 Gallon Stainless Steel Brew Kettle ', 8, 'kettle', 24.99, 0),
(2, 339990, '5 Gallon Stainless Steel Brew Kettle ', 10, 'kettle', 34.99, 0),
(3, 9054, 'Citra Pellet Hops 8oz', 17, 'hops', 14.99, 0),
(4, 3043432, 'Cascade Pellet Hops 8oz ', 15, 'hops', 8.99, 0),
(5, 998833, 'Safale US-05 Ale Dry Yeast', 11, 'yeast', 4.99, 0),
(6, 9993922, 'Safale US-04 Ale Dry Yeast', 8, 'yeast', 4.99, 0),
(16, 45456465, 'brewers spoon', 1, 'tools', 5, 0),
(20, 54321, '7 gallon carboy plastic', 7, 'carboy', 20, 0),
(29, 7879, '10 gallon kettle', 5, 'Kettle', 45, 0),
(31, 8904354, '8oz Mosaic Hops', 4, 'Hops', 4.99, 0);

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` int(10) NOT NULL,
  `key_name` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `value` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`id`, `key_name`, `name`, `value`) VALUES
(1, 'user_role', 'Master', 'master'),
(3, 'user_role', 'User', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `page_name` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `user_id`, `page_name`, `date`) VALUES
(1, 0, 'Logout', '2019-06-06 06:36:35'),
(2, 0, 'Logout', '2019-06-06 06:37:03'),
(3, 0, 'Login', '2019-06-06 06:49:41'),
(4, 0, 'Login', '2019-06-06 06:50:06'),
(5, 0, 'Login', '2019-06-06 06:50:27'),
(6, 0, 'Login', '2019-06-06 06:50:42'),
(7, 0, 'Login', '2019-06-06 06:52:18'),
(8, 0, 'Login', '2019-06-06 06:52:29'),
(9, 0, 'Login', '2019-06-06 06:54:47'),
(10, 0, 'Login', '2019-06-06 06:55:40'),
(11, 0, 'Login', '2019-06-06 06:55:54'),
(12, 0, 'Login', '2019-06-06 18:52:58'),
(13, 0, 'Login', '2019-06-06 18:53:49'),
(14, 0, 'Login', '2019-06-06 18:54:35'),
(15, 0, 'Login', '2019-06-06 18:54:54'),
(16, 0, 'Login', '2019-06-06 19:07:08'),
(17, 0, 'Login', '2019-06-06 19:07:33'),
(18, 0, 'Login', '2019-06-06 20:15:49'),
(19, 0, 'Login', '2019-06-06 20:16:12'),
(20, 0, 'Login', '2019-06-06 20:23:41'),
(21, 0, 'Login', '2019-06-06 20:24:06'),
(22, 0, 'Login', '2019-06-06 20:24:49'),
(23, 0, 'Login', '2019-06-06 20:24:59'),
(24, 0, 'Login', '2019-06-06 20:29:28'),
(25, 0, 'Login', '2019-06-06 20:48:54'),
(26, 0, 'Login', '2019-06-06 20:49:19'),
(27, 0, 'Login', '2019-06-06 20:49:30'),
(28, 0, 'Login', '2019-06-06 21:01:26'),
(29, 0, 'Login', '2019-06-06 21:01:39'),
(30, 47, 'Home', '2019-06-06 21:14:20'),
(31, 47, 'Home', '2019-06-06 21:14:50'),
(32, 47, 'Home', '2019-06-06 21:15:13'),
(33, 47, 'Home', '2019-06-06 21:17:07'),
(34, 47, 'Home', '2019-06-06 21:17:31'),
(35, 47, 'Home', '2019-06-06 21:17:57'),
(36, 47, 'Home', '2019-06-06 21:18:56'),
(37, 0, 'Home', '2019-06-06 21:19:07'),
(38, 0, 'Login', '2019-06-06 21:19:11'),
(39, 0, 'Login', '2019-06-06 21:19:27'),
(40, 0, 'Home', '2019-06-06 21:19:27'),
(41, 0, 'Home', '2019-06-06 21:19:30'),
(42, 0, 'Login', '2019-06-06 21:20:04'),
(43, 0, 'Login', '2019-06-06 21:20:14'),
(44, 0, 'Home', '2019-06-06 21:26:45'),
(45, 0, 'Home', '2019-06-06 21:30:21'),
(46, 0, 'Login', '2019-06-06 21:30:44'),
(47, 0, 'Login', '2019-06-06 21:30:56'),
(48, 0, 'Home', '2019-06-06 21:30:57'),
(49, 0, 'Home', '2019-06-06 21:32:05'),
(50, 0, 'Home', '2019-06-06 21:33:33'),
(51, 0, 'Login', '2019-06-06 21:33:35'),
(52, 0, 'Login', '2019-06-06 21:33:47'),
(53, 0, 'Login', '2019-06-06 21:34:00'),
(54, 0, 'Home', '2019-06-06 21:34:00'),
(55, 0, 'Home', '2019-06-06 21:35:06'),
(56, 0, 'Home', '2019-06-06 21:36:34'),
(57, 0, 'Home', '2019-06-06 21:39:56'),
(58, 0, 'Home', '2019-06-06 21:41:37'),
(59, 0, 'Home', '2019-06-06 21:42:46'),
(60, 0, 'Login', '2019-06-06 21:42:50'),
(61, 0, 'Login', '2019-06-06 21:43:04'),
(62, 0, 'Home', '2019-06-06 21:43:04'),
(63, 0, 'Login', '2019-06-06 21:49:40'),
(64, 0, 'Home', '2019-06-06 21:49:45'),
(65, 0, 'Login', '2019-06-06 21:49:51'),
(66, 0, 'Login', '2019-06-06 21:50:05'),
(67, 0, 'Home', '2019-06-06 21:50:05'),
(68, 0, 'Home', '2019-06-06 21:50:52'),
(69, 0, 'Home', '2019-06-06 21:51:10'),
(70, 0, 'Home', '2019-06-06 22:01:38'),
(71, 0, 'Home', '2019-06-06 22:08:21'),
(72, 0, 'Login', '2019-06-06 22:08:25'),
(73, 0, 'Login', '2019-06-06 22:08:36'),
(74, 0, 'Home', '2019-06-06 22:08:36'),
(75, 0, 'Login', '2019-06-06 22:09:36'),
(76, 0, 'Login', '2019-06-06 22:10:08'),
(77, 0, 'Login', '2019-06-06 22:10:18'),
(78, 0, 'Home', '2019-06-06 22:10:18'),
(79, 0, 'Home', '2019-06-06 22:11:03'),
(80, 0, 'Login', '2019-06-06 22:11:45'),
(81, 0, 'Login', '2019-06-06 22:12:00'),
(82, 0, 'Home', '2019-06-06 22:12:00'),
(83, 0, 'Home', '2019-06-06 22:36:51'),
(84, 0, 'Home', '2019-06-06 22:36:54'),
(85, 0, 'Login', '2019-06-06 22:36:57'),
(86, 0, 'Login', '2019-06-06 22:37:22'),
(87, 0, 'Login', '2019-06-06 22:37:36'),
(88, 0, 'Home', '2019-06-06 22:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `profileimage`
--

CREATE TABLE `profileimage` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` varchar(15) NOT NULL,
  `profile_image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `first_name`, `last_name`, `password`, `role`, `profile_image`) VALUES
(52, 'DanDavidson88@gmail.com', 'Daniel', 'Davidson', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', '', ''),
(53, 'Davis@Davis.com', 'Bob', 'Davis', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', '', ''),
(54, 'Robnd.@gmail.com', 'Rob ', 'Daniels', '92a891f888e79d1c2e8b82663c0f37cc6d61466c508ec62b8132588afe354712b20bb75429aa20aa3ab7cfcc58836c734306b43efd368080a2250831bf7f363f', '', ''),
(57, 'solo@yahoo.com', 'Larry', 'Solo', '2a64d6563d9729493f91bf5b143365c0a7bec4025e1fb0ae67e307a0c3bed1c28cfb259fc6be768ab0a962b1e2c9527c5f21a1090a9b9b2d956487eb97ad4209', '', ''),
(59, 'feeaw@y.com', 'Chase ', 'ewe', '11961811bd4e11f23648afbd2d5c251d2784827147f1731be010adaf0ab38ae18e5567c6fd1bee50a4cd35fb544b3c594e7d677efa7ca01c2a2cb47f8fb12b17', '', ''),
(60, 'solo@gmail.com', 'Larry ', 'Solo', '2a64d6563d9729493f91bf5b143365c0a7bec4025e1fb0ae67e307a0c3bed1c28cfb259fc6be768ab0a962b1e2c9527c5f21a1090a9b9b2d956487eb97ad4209', '', ''),
(61, 'hansolo@gmail.com', 'Han', 'Solo', '11961811bd4e11f23648afbd2d5c251d2784827147f1731be010adaf0ab38ae18e5567c6fd1bee50a4cd35fb544b3c594e7d677efa7ca01c2a2cb47f8fb12b17', '', ''),
(62, 'jw@tmail.com', 'James', 'Wey', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', '', ''),
(72, 'master@gmail.com', 'Im', 'Master', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', 'master', ''),
(73, 'book@gmail.com', 'hook', 'booking', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', 'master', ''),
(74, 'boo@gmail.com', 'Bon', 'boo', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'master', ''),
(75, 'dan@gmail.com', 'Dan', 'David', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', 'master', ''),
(76, '123@gmail.com', 'Paul', 'Blace', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'master', ''),
(77, 'brown@gmail.com', 'Bob', 'Brown', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'master', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profileimage`
--
ALTER TABLE `profileimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `profileimage`
--
ALTER TABLE `profileimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
