-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2016 at 11:29 පෙ.ව.
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eVOTE`
--

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `choice_ID` int(10) UNSIGNED NOT NULL,
  `poll_ID` int(10) UNSIGNED NOT NULL,
  `choice` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`choice_ID`, `poll_ID`, `choice`) VALUES
(1, 1, 'Yes'),
(2, 1, 'No'),
(6, 3, 'Monday'),
(7, 3, 'Wednesday'),
(8, 3, 'Friday');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `remember_token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `description`, `remember_token`) VALUES
(1, 'CSE13', 'CSE 13 Family <3', 'cse13'),
(2, '13M2Rocks', 'Royal College 2012 A/L M2 Class', 'M2'),
(3, 'E_FAC13', 'fun club of engineering faculty', ''),
(30, 'Science class', 'science class paper marking team!', ''),
(31, 'ICE Group', 'ice voting group.', ''),
(32, 'Science bn', 'science class paper marking team!', ''),
(60, '345', '34', ''),
(61, 'sfsfd', '11111', ''),
(62, 'ajksndjn', 'kjndjkand', ''),
(63, 'new', 'new', ''),
(64, 'new2', 'new2', ''),
(65, 'new 3', 'new3', ''),
(66, 't final', 'jk', ''),
(67, 'new new', 'newest', ''),
(68, 'sdf', 'sdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `group_poll_user`
--

CREATE TABLE `group_poll_user` (
  `group_ID` int(10) UNSIGNED NOT NULL,
  `poll_ID` int(10) UNSIGNED NOT NULL,
  `user_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_poll_user`
--

INSERT INTO `group_poll_user` (`group_ID`, `poll_ID`, `user_ID`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `inqs`
--

CREATE TABLE `inqs` (
  `inq_ID` int(10) UNSIGNED NOT NULL,
  `pll_ID` int(10) UNSIGNED NOT NULL,
  `usr_ID` int(10) UNSIGNED NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inqs`
--

INSERT INTO `inqs` (`inq_ID`, `pll_ID`, `usr_ID`, `message`) VALUES
(1, 1, 1, 'What is this?'),
(2, 1, 1, 'again?');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` int(10) UNSIGNED NOT NULL,
  `pll_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `editable` enum('YES','NO') NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `pll_name`, `description`, `editable`, `deadline`) VALUES
(1, 'Podi Trip', 'This time we are planning to go on trip to Kandy what do you say?', 'NO', '2016-07-14'),
(2, 'CSE podi Trip', 'this time we planed a trip to Kandy. what do you guys say?', 'NO', '2016-05-31'),
(3, 'Network Mid', 'Tell me the convenience days for network mid.', 'YES', '2016-05-24'),
(6, 'test poll', 'testing!', 'NO', '2030-05-05'),
(7, 'test poll', 'testing!', 'NO', '2030-05-05'),
(8, 'test poll', 'testing!', 'NO', '2030-05-05'),
(9, 'test poll', 'testing!', 'NO', '2030-05-05'),
(10, 'test poll', 'testing!', 'NO', '2030-05-05'),
(11, 'test poll', 'testing!', 'NO', '2030-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `tel` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `tel`, `name`, `password`, `remember_token`) VALUES
(1, 919201680, 'nadun indunil', '1993oct07', 'qwe'),
(2, 0, 'Dulitha Dabare', '12345bjhb', '$2y$10$skIF/brHR5noVdbnYkaS1.HUzgdrlzIytWWwiqFtdBeXmGPiAcEA2'),
(3, 0, 'Udara Bibile', '12345', '$2y$10$U2PQcF8ZYSdI244WDJ8H2e2rzu4zLpg6uVZWfdqwb/kKPcKC8m.OK'),
(4, 0, 'Sithira Weeratunga', '12345', '$2y$10$IzdycBb9rGfIRUW5CE75IunRidlEo94ezMmrXeSRkxZGSj5LaO8ey'),
(5, 0, 'Sithira Weeratunga', '12345', '$2y$10$NJh5trfUReWiAVngyU372OT8xrt1yK5w.LO9mdNiSR3Gs1IsTsuti'),
(6, 0, 'Kamal Perera', '12345', NULL),
(7, 0, 'sasanka nandasiri', '$2y$10$MISwUuPY2jcSfIUYBMPrie3Sz6bb0khw2/KkIkbqBIwCr8KNaS9fG', NULL),
(9, 717440894, 'Dan Brown', '$2y$10$FIrU/Ucr3I/UmXo1Y2ZA/OADRHJRTcZEGfcOvxEJGd4gG189NkeH2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `group_ID` int(10) UNSIGNED NOT NULL,
  `user_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`group_ID`, `user_ID`) VALUES
(1, 1),
(1, 2),
(1, 9),
(2, 1),
(30, 1),
(32, 9),
(60, 9),
(61, 9),
(62, 9),
(63, 9),
(64, 9),
(65, 9),
(66, 9),
(67, 9),
(68, 9);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `v_ID` int(10) UNSIGNED NOT NULL,
  `user_ID` int(10) UNSIGNED NOT NULL,
  `poll_ID` int(10) UNSIGNED NOT NULL,
  `choice_ID` int(10) UNSIGNED NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`v_ID`, `user_ID`, `poll_ID`, `choice_ID`, `time`) VALUES
(1, 1, 1, 1, '2016-05-24'),
(3, 2, 1, 1, '2016-05-24'),
(2, 9, 1, 1, '2016-05-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`choice_ID`),
  ADD KEY `poll has choices` (`poll_ID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_poll_user`
--
ALTER TABLE `group_poll_user`
  ADD PRIMARY KEY (`group_ID`,`poll_ID`,`user_ID`),
  ADD KEY `pll_ID` (`poll_ID`),
  ADD KEY `usr_ID` (`user_ID`);

--
-- Indexes for table `inqs`
--
ALTER TABLE `inqs`
  ADD PRIMARY KEY (`inq_ID`),
  ADD KEY `pll_ID` (`pll_ID`),
  ADD KEY `usr_ID` (`usr_ID`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poll_ID` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`group_ID`,`user_ID`),
  ADD KEY `user_group_ibfk_2` (`user_ID`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`user_ID`,`poll_ID`),
  ADD UNIQUE KEY `v_ID` (`v_ID`),
  ADD KEY `ch_ID` (`choice_ID`),
  ADD KEY `pll_ID` (`poll_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `choice_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `inqs`
--
ALTER TABLE `inqs`
  MODIFY `inq_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `v_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `choices`
--
ALTER TABLE `choices`
  ADD CONSTRAINT `poll has choices` FOREIGN KEY (`poll_ID`) REFERENCES `polls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_poll_user`
--
ALTER TABLE `group_poll_user`
  ADD CONSTRAINT `group_poll_user_ibfk_1` FOREIGN KEY (`group_ID`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_poll_user_ibfk_2` FOREIGN KEY (`poll_ID`) REFERENCES `polls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_poll_user_ibfk_3` FOREIGN KEY (`user_ID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inqs`
--
ALTER TABLE `inqs`
  ADD CONSTRAINT `inqs_ibfk_1` FOREIGN KEY (`pll_ID`) REFERENCES `polls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inqs_ibfk_2` FOREIGN KEY (`usr_ID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_group`
--
ALTER TABLE `user_group`
  ADD CONSTRAINT `user_group_ibfk_1` FOREIGN KEY (`group_ID`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_group_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `vote has choices` FOREIGN KEY (`choice_ID`) REFERENCES `choices` (`choice_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`poll_ID`) REFERENCES `polls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
