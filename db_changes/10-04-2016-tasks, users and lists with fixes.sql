-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2016 at 02:00 PM
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
(2, 'Work', 'This is the list for work based tasks', 1, '2016-04-03 10:13:11'),
(3, 'Programming', 'All programming tasks', 1, '2016-04-03 11:51:28'),
(4, 'Family', 'This is list based for family tasks', 1, '2016-04-03 12:20:21'),
(5, 'Friends', 'All tasks about friends and free time spended with them', 1, '2016-04-04 19:03:12');

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
(2, 'Sport activity', 'Recreation with friends', 4, '2016-04-05', '2016-04-04 19:01:12', 0),
(3, 'Practice programing', 'Practice your PHP and MySql skils.Work in Codeigniter on myTodo Task Manger', 2, '2016-04-08', '2016-04-04 19:01:12', 0),
(4, 'Wordpress', 'Create first page for client in CMS', 1, '2016-04-05', '2016-04-04 19:01:12', 1),
(5, 'Friends stuff', 'Watch movies with friends', 4, '2016-04-07', '2016-04-04 19:01:12', 0),
(6, 'Family visit', 'Spending some tome with family', 3, '2016-04-10', '2016-04-04 19:05:14', 0),
(8, 'Saxon Sagas', 'Read the new 9th book of serie', 1, '2016-06-15', '2016-04-05 17:16:46', 0),
(9, 'Visit', 'Visit a sister tomorow', 4, '2016-04-06', '2016-04-05 17:25:32', 0),
(10, 'Read LOTR', 'Read again Lord of the Rings', 1, '2016-04-15', '2016-04-05 17:26:29', 0);

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
(3, 'Test', 'test2', 'nemanjakolar@gmail.com', 'admin', '200ceb26807d6bf99fd6f4f0d1ca54d4', '2016-03-28 19:41:26');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
