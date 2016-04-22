-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2016 at 03:21 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newtodo`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(48) NOT NULL,
  `email` varchar(24) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(1, 'Neko', 'nemanjavitnere@gmail.com', 'poruka'),
(2, 'Nemanja', 'nemanjavitnere@gmail.com', 'please to meet you'),
(3, 'test2', '24444', '555555');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `id` int(11) NOT NULL,
  `list_name` varchar(255) NOT NULL,
  `list_body` text NOT NULL,
  `list_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `list_name`, `list_body`, `list_user_id`, `create_date`) VALUES
(1, 'Books', 'All tasks about books', 1, '2016-04-05 17:10:26'),
(3, 'Programming', 'All programming tasks', 1, '2016-04-03 11:51:28'),
(4, 'Family', 'This is list based for family tasks', 1, '2016-04-03 12:20:21'),
(5, 'Friends', 'All tasks about friends and free time spended with them', 1, '2016-04-04 19:03:12'),
(6, 'Test', 'nesto oko test zadataka', 4, '2016-04-19 10:25:03'),
(7, 'food', 'something we want to try from frozen food', 5, '2016-04-19 10:30:49'),
(9, 'Work', 'List about work tasks', 4, '2016-04-19 11:15:32');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_body` text NOT NULL,
  `list_id` int(11) NOT NULL,
  `due_date` date NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_complete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `task_body`, `list_id`, `due_date`, `create_date`, `is_complete`) VALUES
(4, 'Wordpress', 'Create first page for client in CMS', 1, '2016-04-05', '2016-04-04 19:01:12', 1),
(6, 'Family visit', 'Spending some tome with family', 3, '2016-04-10', '2016-04-04 19:05:14', 0),
(8, 'Saxon Sagas', 'Read the new 9th book of serie', 1, '2016-06-15', '2016-04-05 17:16:46', 0),
(9, 'Visit', 'Visit a sister tomorow', 4, '2016-04-06', '2016-04-05 17:25:32', 0),
(12, 'prvi zadatak', 'nesto za odraditi', 6, '2016-04-20', '2016-04-19 10:25:26', 1),
(15, 'Some other task', '', 4, '2016-04-08', '2016-04-19 11:23:13', 0),
(16, 'Procitati stepskog vuka', '', 1, '2016-04-16', '2016-04-21 09:35:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `register_date`) VALUES
(1, 'Nemanja', 'Vitnere', 'nemanjakolar@gmail.com', 'Vitnere', '897a7e220e7efa507ef74d6330e371b4', '2016-03-27 09:09:10'),
(2, 'Rypere', 'Strigoi', 'nemanjavitnere@gmail.com', 'root', 'f359a06712e6e64f7af28a493673a138', '2016-03-27 10:28:07'),
(3, 'Test', 'test2', 'nemanjakolar@gmail.com', 'admin', '200ceb26807d6bf99fd6f4f0d1ca54d4', '2016-03-28 19:41:26'),
(4, 'R2D2', 'droid', 'nemanjavitnere@gmail.com', 'R2D2', 'e10adc3949ba59abbe56e057f20f883e', '2016-04-19 10:24:23'),
(5, 'Sookie', 'Northman', 'anitaeric@yahoo.com', 'sookie', '80401a8df2c947ad536cd955fae56ba5', '2016-04-19 10:29:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
