-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 06:23 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reviewer`
--

DROP DATABASE IF EXISTS reviewer;
CREATE DATABASE reviewer;
USE reviewer;

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `website_id` int(100) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dislikes`
--

INSERT INTO `dislikes` (`website_id`, `user_id`) VALUES
(1, 5),
(3, 1),
(3, 2),
(3, 6),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `website_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`website_id`, `user_id`) VALUES
(1, 1),
(1, 2),
(1, 6),
(1, 9),
(3, 4),
(3, 5),
(4, 1),
(4, 4),
(4, 8),
(5, 1),
(5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(100) NOT NULL,
  `website_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `rating` int(10) NOT NULL,
  `description` text NOT NULL,
  `dtoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `website_id`, `user_id`, `rating`, `description`, `dtoi`) VALUES
(1, 1, 1, 7, 'kamal hai bhai', '2020-03-28 09:08:25'),
(3, 1, 4, 1, 'sahi to hai\"<?php hi ;`', '2020-03-28 09:45:32'),
(4, 4, 2, 10, 'bhai sab se sahi hai\r\n', '2020-03-28 10:06:56'),
(5, 1, 2, 8, 'ZAHER ', '2020-03-28 10:11:56'),
(6, 1, 2, 8, 'kaaaaaaaaaaaaaaaaaaaaaaamaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaal', '2020-03-28 10:12:14'),
(7, 5, 6, 10, 'mast hai ye', '2020-03-29 08:07:13'),
(8, 5, 2, 5, 'good but good\"s website...\r\nnice nut nice\"s website', '2020-03-29 08:26:35'),
(9, 5, 4, 10, 'yaeh very/////////////////// good website', '2020-03-29 08:30:30'),
(10, 3, 2, 9, 'like this website', '2020-04-01 06:44:50'),
(11, 4, 4, 7, 'i like it very much', '2020-04-01 07:59:55'),
(12, 1, 9, 10, 'Bhohot saaf jagah hai', '2020-04-02 06:13:28'),
(13, 1, 9, 10, 'Nice Very Very Very NiceðŸ˜ðŸ˜ðŸ˜', '2020-04-02 06:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(20) NOT NULL,
  `dob` timestamp(6) NULL DEFAULT NULL,
  `dtoi` timestamp(6) NULL DEFAULT NULL,
  `role` varchar(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `gender`, `email`, `country`, `dob`, `dtoi`, `role`, `username`, `password`) VALUES
(1, 'Shahrukh', 'Siddiqui', 'Male', 'shahrukhsiddiqui366@gmail.com', 'India', '2000-12-08 18:30:00.000000', '2020-04-02 05:34:59.579083', 'user', 'sk', '123'),
(2, 'Ram', 'Kumar', 'Male', 'ramkumar@gmail.com', 'India', '1988-07-03 18:30:00.000000', '2020-03-27 08:29:06.863912', 'user', 'ram', '123'),
(4, 'Fatema', 'Khan', 'Female', 'fatemakhan@gmail.com', 'Pakistan', '2001-07-13 18:30:00.000000', '2020-03-27 09:22:04.054744', 'user', 'fatema', '123'),
(5, 'Sam', 'Rathod', 'Male', 'sam@gmail.com', 'India', '1999-06-15 18:30:00.000000', '2020-03-28 08:06:01.973245', 'user', 'sam', '123'),
(6, 'Farukh', 'Siddiqui', 'Male', 'farukh@gmail.com', 'India', '2006-12-17 18:30:00.000000', '2020-03-29 08:06:33.475244', 'user', 'fk', '123'),
(7, 'Ramesh', 'Patel', 'Male', 'ramesh@gmail.com', 'Nepal', '2000-07-02 18:30:00.000000', '2020-04-02 02:13:10.000000', 'user', 'rr', '123'),
(8, 'Priya', 'Angel', 'other', 'angelpriya@gmail.com', 'Russia', '1999-12-31 18:30:00.000000', '2020-04-02 05:50:56.000000', 'user', 'ap', '123'),
(9, 'Kanta', 'Sharma', 'Female', 'kanta@gmail.com', 'Nepal', '1992-08-13 18:30:00.000000', '2020-04-02 06:12:02.000000', 'user', 'kanta', '123');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `logourl` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dtoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `name`, `description`, `logourl`, `user_id`, `dtoi`) VALUES
(1, 'Youtube', 'Great for viewing videos.', '1_youtube.png', 1, '2020-03-28 09:06:59'),
(3, 'Facebook', 'good website for chatting and social connection.', 'fb.png', 4, '2020-03-28 09:25:05'),
(4, 'Google', 'Vast company.', 'google.png', 2, '2020-03-28 10:06:21'),
(5, 'Wikipedia', 'Great website to search anything.\r\nit\'s like encyclopedia.', 'wiki.jpg', 1, '2020-03-29 07:38:11'),
(6, 'Cisco', 'Networking training and learning website', 'cisco_logo.png', 8, '2020-04-02 08:11:37');

-- --------------------------------------------------------

--
-- Stand-in structure for view `website_detail_statistic`
-- (See below for the actual view)
--
CREATE TABLE `website_detail_statistic` (
`id` int(100)
,`logourl` varchar(50)
,`name` varchar(50)
,`description` text
,`dtoi` timestamp
,`rating` decimal(14,4)
,`reviews` bigint(21)
,`likes` bigint(21)
,`dislikes` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `website_dislikes`
-- (See below for the actual view)
--
CREATE TABLE `website_dislikes` (
`id` int(100)
,`dislikes` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `website_likes`
-- (See below for the actual view)
--
CREATE TABLE `website_likes` (
`id` int(100)
,`likes` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `website_likes_dislikes`
-- (See below for the actual view)
--
CREATE TABLE `website_likes_dislikes` (
`id` int(100)
,`likes` bigint(21)
,`dislikes` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `website_detail_statistic`
--
DROP TABLE IF EXISTS `website_detail_statistic`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `website_detail_statistic`  AS  (select `w`.`id` AS `id`,`w`.`logourl` AS `logourl`,`w`.`name` AS `name`,`w`.`description` AS `description`,`w`.`dtoi` AS `dtoi`,avg(`r`.`rating`) AS `rating`,count(`r`.`website_id`) AS `reviews`,`wld`.`likes` AS `likes`,`wld`.`dislikes` AS `dislikes` from ((`website` `w` left join `review` `r` on((`w`.`id` = `r`.`website_id`))) left join `website_likes_dislikes` `wld` on((`w`.`id` = `wld`.`id`))) group by `r`.`website_id`) ;

-- --------------------------------------------------------

--
-- Structure for view `website_dislikes`
--
DROP TABLE IF EXISTS `website_dislikes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `website_dislikes`  AS  (select `w`.`id` AS `id`,count(`d`.`website_id`) AS `dislikes` from (`website` `w` join `dislikes` `d` on((`w`.`id` = `d`.`website_id`))) group by `w`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `website_likes`
--
DROP TABLE IF EXISTS `website_likes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `website_likes`  AS  (select `w`.`id` AS `id`,count(`l`.`website_id`) AS `likes` from (`website` `w` join `likes` `l` on((`w`.`id` = `l`.`website_id`))) group by `w`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `website_likes_dislikes`
--
DROP TABLE IF EXISTS `website_likes_dislikes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `website_likes_dislikes`  AS  (select `w`.`id` AS `id`,`wl`.`likes` AS `likes`,`wd`.`dislikes` AS `dislikes` from ((`website` `w` left join `website_likes` `wl` on((`w`.`id` = `wl`.`id`))) left join `website_dislikes` `wd` on((`w`.`id` = `wd`.`id`)))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD UNIQUE KEY `website_id` (`website_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD UNIQUE KEY `website_id` (`website_id`,`user_id`),
  ADD KEY `user_id relationship` (`user_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `website_id` (`website_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD CONSTRAINT `dislikes_ibfk_1` FOREIGN KEY (`website_id`) REFERENCES `website` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dislikes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `user_id relationship` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `website_id relationship` FOREIGN KEY (`website_id`) REFERENCES `website` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `website_id` FOREIGN KEY (`website_id`) REFERENCES `website` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
