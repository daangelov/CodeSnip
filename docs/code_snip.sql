-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2018 at 05:34 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `code_snip`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE `login_log` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `ip_address` varchar(46) DEFAULT NULL,
  `created_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_log`
--

INSERT INTO `login_log` (`id`, `username`, `ip_address`, `created_on`, `status`) VALUES
(0, 'admin', '::1', '2018-03-22 12:54:39', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 16:14:36', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 16:47:27', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 16:47:36', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 16:50:10', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 16:50:39', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 16:51:05', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 16:51:12', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 16:52:33', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 16:53:28', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 16:54:28', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 16:55:31', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 16:55:54', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 16:56:57', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 17:07:24', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 17:27:16', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 17:27:19', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 17:27:21', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 17:27:25', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 17:28:15', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 17:29:11', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 17:30:57', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 17:31:10', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 17:42:11', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 17:44:28', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 17:46:50', 'Success Login'),
(0, 'admin', '::1', '2018-03-26 17:49:43', 'Success Login'),
(0, 'admin', '::1', '2018-03-27 12:46:07', 'Success Login'),
(0, 'admin', '::1', '2018-03-27 12:46:27', 'Success Login'),
(0, 'admin', '::1', '2018-03-27 14:05:07', 'Success Login'),
(0, 'admin', '::1', '2018-03-27 15:50:42', 'Success Login'),
(0, 'admin', '::1', '2018-03-27 17:30:39', 'Wrong password'),
(0, 'admin', '::1', '2018-03-27 17:30:43', 'Success Login'),
(0, 'admin', '::1', '2018-03-27 17:37:31', 'Success Login'),
(0, 'admin', '::1', '2018-03-27 17:37:54', 'Success Login'),
(0, 'tester', '::1', '2018-03-27 17:46:17', 'Not confirmed'),
(0, 'admin', '::1', '2018-03-27 17:46:26', 'Success Login'),
(0, 'tester', '::1', '2018-03-27 17:46:49', 'Success Login'),
(0, 'admin', '::1', '2018-03-27 17:46:57', 'Success Login'),
(0, 'admin', '::1', '2018-03-27 17:47:26', 'Success Login'),
(0, 'admin', '::1', '2018-03-27 17:57:13', 'Success Login'),
(0, 'admin', '::1', '2018-03-28 09:21:50', 'Success Login'),
(0, 'admin', '::1', '2018-03-28 09:33:01', 'Success Login'),
(0, 'admin', '::1', '2018-03-28 09:44:43', 'Success Login'),
(0, 'admin', '::1', '2018-03-28 09:51:02', 'Success Login'),
(0, 'admin', '::1', '2018-03-28 09:52:27', 'Success Login'),
(0, 'admin', '::1', '2018-03-28 16:42:39', 'Success Login'),
(0, 'admin', '::1', '2018-03-28 17:15:01', 'Success Login'),
(0, 'admin', '::1', '2018-03-28 17:31:10', 'Success Login');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` varchar(40) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_data` text,
  `ip_address` varchar(46) DEFAULT NULL,
  `created_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `user_id`, `session_data`, `ip_address`, `created_on`, `updated_on`) VALUES
('mmimj57qpd5ml5ameu68j2c3uj', 8, 'logged|i:1;user_id|s:1:\"8\";username|s:5:\"admin\";email|s:15:\"admin@admin.com\";firstname|s:5:\"admin\";lastname|s:5:\"admin\";user_status|s:1:\"1\";user_type|s:1:\"1\";', '::1', '2018-03-28 17:15:09', '2018-03-28 17:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `type` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `status`, `type`) VALUES
(8, 'admin', '$2y$10$z/KTMcSVreiwtV1smIL9uO3OWZj2Z9HAqxoIeJcMm6bof5Qg2AM8q', 'admin', 'admin', 'admin@admin.com', 1, 1),
(9, 'test', '$2y$10$npPiZXBGO416pR6TYqhwfOeH7KjaEcCtojW0hN/L0QRL.VN6zMH6a', 'test', 'test', 'test@test.bg', 0, 0),
(10, 'test2', '$2y$10$PSMeY7qZB/xzUr..Hd6jNuJlPCQkEB9.KePwoNC8hreKoUpsoQIla', 'test2', 'test2', 'test2@test.test', 1, 0),
(11, 'test3', '$2y$10$QkMMJ28w.Rr0vyX5MINBv.Ra6n1a3npCC1BUfqphGxaK1LZtNeUp6', 'test3', 'test3', 'test3@test3.bg', 1, 0),
(12, 'tester', '$2y$10$kA6fl/F7i4N8/f5mA24wneLki5KZ3p0OkRAnu7A/3UisZEJs1vs6i', 'Ð”Ñ€Ð°Ð³Ð¾Ð¼Ð¸Ñ€', 'ÐÐ½Ð³ÐµÐ»Ð¾Ð²', 'dragomir.angelov@abv.bg', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
