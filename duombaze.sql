-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2019 at 07:01 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vartvald`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(5) NOT NULL,
  `question` text NOT NULL,
  `mark` int(2) NOT NULL,
  `answer_1` text NOT NULL,
  `answer_2` text NOT NULL,
  `answer_3` text DEFAULT NULL,
  `answer_4` text DEFAULT NULL,
  `correct` text NOT NULL,
  `fk_test` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `mark`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `correct`, `fk_test`) VALUES
(0, 'What would you do if it ________ on your wedding day?', 1, 'rained', 'will rain', 'would rain', 'none of the above', 'rained', 40),
(1, 'If she comes, I _____ call you.', 1, 'will', 'would', 'would have', 'none of the above', 'will', 40),
(2, 'If I eat peanut butter, I ________ sick.', 1, 'would have gotten', 'would get', 'get', 'none of the above', 'get', 40),
(0, 'I dislike ________ to the movies by myself.', 3, 'going', 'to go', 'to going', 'going/to go', 'going', 42),
(1, 'We started ________ dinner without you.', 2, 'to eat/eating', 'to eat', 'eating ', 'to eating', 'to eat/eating', 42),
(2, 'I can\'t imagine ________ my own house.', 5, 'buying', 'to buy', 'buying/to buy', 'none of the above', 'buying', 42);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(5) NOT NULL,
  `title` varchar(50) NOT NULL,
  `level` varchar(10) DEFAULT NULL,
  `fk_user` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `title`, `level`, `fk_user`) VALUES
(40, 'Conditionals Quiz', 'B2', 'feb07f05453367692d1ef0eb65a3293f'),
(42, '-ing Form Quiz', 'A2', 'feb07f05453367692d1ef0eb65a3293f');

-- --------------------------------------------------------

--
-- Table structure for table `test_attempts`
--

CREATE TABLE `test_attempts` (
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(20) NOT NULL,
  `id` int(5) NOT NULL,
  `title` varchar(70) DEFAULT NULL,
  `mark` int(2) NOT NULL,
  `top_mark` int(2) NOT NULL,
  `level` varchar(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `teacher` varchar(50) DEFAULT NULL,
  `fk_user` varchar(32) NOT NULL,
  `fk_test` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_attempts`
--

INSERT INTO `test_attempts` (`date`, `status`, `id`, `title`, `mark`, `top_mark`, `level`, `name`, `teacher`, `fk_user`, `fk_test`) VALUES
('2019-12-13 05:52:24', 'Išlaikyta', 51, 'Conditionals Quiz', 3, 3, 'B2', 'ignas', 'feb07f05453367692d1ef0eb65a3293f', 'c9fbb888c3e7999fdbc61afd9b3a8625', 40),
('2019-12-13 05:53:19', 'Išlaikyta', 52, '-ing Form Quiz', 5, 10, 'A2', 'ignas', 'feb07f05453367692d1ef0eb65a3293f', 'c9fbb888c3e7999fdbc61afd9b3a8625', 42),
('2019-12-13 05:53:57', 'Neišlaikyta', 53, 'Conditionals Quiz', 1, 3, 'B2', 'ignas', 'feb07f05453367692d1ef0eb65a3293f', 'c9fbb888c3e7999fdbc61afd9b3a8625', 40);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `userid` varchar(32) NOT NULL,
  `userlevel` tinyint(1) UNSIGNED DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `userid`, `userlevel`, `email`, `timestamp`) VALUES
('Administratorius', '16c354b68848cdbd8f54a226a0a55b21', 'a2fe399900de341c39c632244eaf8483', 9, 'demo@ktu.lt', '2019-12-12 17:16:35'),
('stud', 'c2acd92812ef99acd3dcdbb746b9a434', 'c7bc218860e82925cdff68c2959b0db6', 5, 'stud@stud.com', '2019-12-13 06:00:25'),
('Ignas', 'c2acd92812ef99acd3dcdbb746b9a434', 'c9fbb888c3e7999fdbc61afd9b3a8625', 5, 'ignas@mail.com', '2019-12-13 05:58:35'),
('petras', 'c2acd92812ef99acd3dcdbb746b9a434', 'f87d18075c3313d46b201ba3b139fa45', 4, 'petras@petras.lt', '2019-12-13 05:51:03'),
('destytojas', 'c2acd92812ef99acd3dcdbb746b9a434', 'feb07f05453367692d1ef0eb65a3293f', 4, 'dest@stud.lt', '2019-12-13 06:00:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_attempts`
--
ALTER TABLE `test_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `test_attempts`
--
ALTER TABLE `test_attempts`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
