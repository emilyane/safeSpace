-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 23, 2020 at 09:42 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safeSpace`
--
CREATE DATABASE IF NOT EXISTS `safeSpace` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `safeSpace`;

-- --------------------------------------------------------

--
-- Table structure for table `accomodation`
--

DROP TABLE IF EXISTS `accomodation`;
CREATE TABLE `accomodation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commune` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `language_spoken` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accomodation`
--

INSERT INTO `accomodation` (`id`, `user_id`, `title`, `street_address`, `commune`, `phone`, `description`, `date_start`, `date_end`, `language_spoken`) VALUES
(1, NULL, 'Warm Bedroom with 3 meals', 'Rue Malibran 121', 'Ixelles', '0484048', 'A friendly place to stay for a few nights', '2020-04-23 11:22:22', '2020-04-24 11:22:22', 'french, english');

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commune` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_start` datetime NOT NULL,
  `time_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organisation_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `user_id`, `title`, `description`, `street_address`, `commune`, `time_start`, `time_end`, `photo`, `organisation_name`) VALUES
(1, NULL, 'French lessons', 'Free beginner\'s french courses', 'rue malibran 121', 'ixelles', '2020-04-23 07:23:25', 'n/a', NULL, 'French Club BXL');

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200422165512', '2020-04-22 16:57:03'),
('20200422170309', '2020-04-22 17:03:16'),
('20200422170356', '2020-04-22 17:04:02'),
('20200422171628', '2020-04-22 17:16:36'),
('20200422171949', '2020-04-22 17:20:03'),
('20200422172532', '2020-04-22 17:26:47'),
('20200422172623', '2020-04-22 17:36:32'),
('20200422174907', '2020-04-22 17:50:21'),
('20200422175131', '2020-04-22 17:51:53'),
('20200422195553', '2020-04-22 19:56:03'),
('20200422204311', '2020-04-22 20:43:43'),
('20200422204648', '2020-04-22 20:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commune` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organisation_affiliation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `name`, `last_name`, `street_address`, `commune`, `phone_number`, `organisation_affiliation`, `is_admin`, `photo`) VALUES
(1, 'user0@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$K+G5q87RVVqT5nRwAnoP3g$oVXyid2q05nkOH2sZqt2jWvmvG5R4UnVy0sLh35gnPQ', 'Emily0', 'user0', 'Avenue de Diamant 15', 'Schaerbeek', NULL, NULL, NULL, NULL),
(2, 'user1@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$9zCD75ZoT9eD6/IEuZLtwg$k1O6QfzsweXMOw8QBFZFg+mkCkRC9CFozQsoTFuuF+o', 'Emily1', 'user1', 'Avenue de Diamant 15', 'Schaerbeek', NULL, NULL, NULL, NULL),
(3, 'user2@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$3inwSg4iHn7IViZxORZG2A$ktZb6/3q4RpSzYtc8woCK/N06cqZWL3hSfIhBvc1lJk', 'Emily2', 'user2', 'Avenue de Diamant 15', 'Schaerbeek', NULL, NULL, NULL, NULL),
(4, 'user3@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$Amtq2TWhY7DjxzRSk/lnUw$YdNzmSHR4U1ZS6DgenanalbktnM6kL6lM6sy4pI+NUw', 'Emily3', 'user3', 'Avenue de Diamant 15', 'Schaerbeek', NULL, NULL, NULL, NULL),
(5, 'user4@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$I6tWLCWFQuEI6d+l2s6oIg$3uO1yo7FDnW2AeGgRYO/U/abXBhhY9WdER4ULNNCc5g', 'Emily4', 'user4', 'Avenue de Diamant 15', 'Schaerbeek', NULL, NULL, NULL, NULL),
(6, 'blaba@gmail.com', '[\"ROLE_USER\"]', 'pass', 'emily', 'smith', 'bublba 121', 'ixelles', '0928393839', NULL, NULL, NULL),
(9, 'emilyanesmith', '[\"ROLE_USER\"]', '010101', 'emily', 'smith', 'hahahaha1010', 'ixelles', '04356053', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomodation`
--
ALTER TABLE `accomodation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_520D81B3A76ED395` (`user_id`);

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AC74095AA76ED395` (`user_id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomodation`
--
ALTER TABLE `accomodation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accomodation`
--
ALTER TABLE `accomodation`
  ADD CONSTRAINT `FK_520D81B3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `FK_AC74095AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
