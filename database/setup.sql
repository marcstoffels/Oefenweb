-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 21, 2019 at 08:06 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `webquiz`
--
CREATE DATABASE IF NOT EXISTS `webquiz` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `webquiz`;

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

DROP TABLE IF EXISTS `assignments`;
CREATE TABLE `assignments` (
  `assignment_id` int(5) NOT NULL,
  `question` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answerA` int(5) NOT NULL,
  `answerB` int(5) NOT NULL,
  `answerC` int(5) NOT NULL,
  `answerD` int(5) NOT NULL,
  `correct_answer` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='This is the assignments table';

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignment_id`, `question`, `answerA`, `answerB`, `answerC`, `answerD`, `correct_answer`) VALUES
(1, '25 X 2', 50, 48, 52, 46, 50),
(2, '3 X 3', 12, 9, 6, 15, 9),
(3, '10 X 23', 240, 220, 250, 230, 230),
(4, '4 X 12', 36, 48, 60, 50, 48),
(5, '14 X 2', 28, 26, 24, 22, 28),
(6, '8 X 7', 64, 49, 63, 56, 56),
(7, '15 X 4', 45, 56, 60, 64, 60),
(8, '2 X 2', 5, 4, 3, 6, 4),
(9, '12 X 12', 144, 132, 120, 156, 144),
(10, '9 X 8', 80, 83, 64, 72, 72);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE `games` (
  `game_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `score` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='This is the games table';

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(5) UNSIGNED NOT NULL COMMENT 'User Id',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='This is the Users table';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'User Id', AUTO_INCREMENT=83;
