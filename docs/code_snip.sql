-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2018 at 02:03 PM
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
(0, 'admin', '::1', '2018-03-28 17:31:10', 'Success Login'),
(0, 'admin', '::1', '2018-03-30 16:36:25', 'Success Login'),
(0, 'admin', '::1', '2018-04-04 17:19:35', 'Success Login'),
(0, 'admin', '::1', '2018-04-05 12:41:50', 'Success Login'),
(0, 'admin', '127.0.0.1', '2018-04-05 13:21:09', 'Success Login'),
(0, 'admin', '::1', '2018-04-05 14:26:14', 'Success Login'),
(0, 'admin', '::1', '2018-04-10 16:03:39', 'Success Login'),
(0, 'admin', '::1', '2018-04-10 16:39:10', 'Success Login'),
(0, 'admin', '::1', '2018-04-10 16:39:31', 'Success Login'),
(0, 'admin', '::1', '2018-04-10 16:48:31', 'Success Login'),
(0, 'admin', '::1', '2018-04-10 16:49:30', 'Success Login'),
(0, 'admin', '::1', '2018-04-10 16:58:36', 'Success Login'),
(0, 'admin', '::1', '2018-04-10 16:58:40', 'Success Login'),
(0, 'admin', '::1', '2018-04-10 16:59:36', 'Success Login'),
(0, 'admin', '::1', '2018-04-10 16:59:40', 'Success Login'),
(0, 'admin', '::1', '2018-04-10 17:16:06', 'Success Login'),
(0, 'admin', '::1', '2018-04-11 13:45:27', 'Success Login'),
(0, 'admin', '::1', '2018-04-11 14:50:26', 'Success Login'),
(0, 'admin', '::1', '2018-04-12 09:26:12', 'Success Login'),
(0, 'admin', '::1', '2018-04-12 09:29:32', 'Success Login'),
(0, 'admin', '::1', '2018-04-12 09:31:20', 'Success Login'),
(0, 'admin', '::1', '2018-04-12 11:51:23', 'Success Login'),
(0, 'admin', '::1', '2018-04-13 15:24:43', 'Success Login'),
(0, 'admin', '::1', '2018-04-27 09:29:33', 'Success Login'),
(0, 'admin', '::1', '2018-04-30 13:22:15', 'Success Login'),
(0, 'admin', '::1', '2018-04-30 16:50:18', 'Success Login'),
(0, 'admin', '::1', '2018-05-08 14:00:12', 'Success Login'),
(0, 'admin', '::1', '2018-05-08 17:11:40', 'Success Login'),
(0, 'admin', '::1', '2018-05-09 09:35:55', 'Success Login'),
(0, 'admin', '::1', '2018-05-09 12:35:13', 'Success Login');

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
('9u92eo33srqf9h9i05as7r26nc', 0, '', '::1', '2018-05-09 14:02:06', '2018-05-09 14:02:14'),
('mmimj57qpd5ml5ameu68j2c3uj', 8, 'logged|i:1;user_id|s:1:\"8\";username|s:5:\"admin\";email|s:15:\"admin@admin.com\";firstname|s:5:\"admin\";lastname|s:5:\"admin\";user_status|s:1:\"1\";user_type|s:1:\"1\";', '::1', '2018-05-09 12:20:38', '2018-05-09 14:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `snippet`
--

CREATE TABLE `snippet` (
  `id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `text` text,
  `lang` varchar(32) NOT NULL DEFAULT 'built_in',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  `status` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `snippet`
--

INSERT INTO `snippet` (`id`, `creator_id`, `title`, `text`, `lang`, `created_on`, `updated_on`, `is_public`, `status`) VALUES
(2, 8, 'My second snippet', '#include &lt;iostream&gt;\r\nusing namespace std;\r\n\r\n// main() is where program execution begins.\r\nint main() {\r\n   cout &lt;&lt; &quot;Hello World&quot;; // prints Hello World\r\n   return 0;\r\n}\r\n// Now tab can be use to ident', 'cpp', '2018-03-27 15:25:41', '2018-03-27 15:25:41', 1, 1),
(6, 8, 'NEW', 'import java.util.Scanner;\r\n\r\npublic class ScannerAndKeyboard\r\n{\r\n	public static void main(String[] args)\r\n	{	Scanner s = new Scanner(System.in);\r\n		System.out.print( &quot;Enter your name: &quot;  );\r\n		String name = s.nextLine();\r\n		System.out.println( &quot;Hello &quot; + name + &quot;!&quot; );\r\n	}\r\n       	System.out.println(&quot;Don\'t use this to edit your code unless it is a minor change&quot;);\r\n}', 'JAVA', '2018-04-11 17:31:38', '2018-04-11 17:31:38', 1, 1);

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
  `type` smallint(6) NOT NULL DEFAULT '0',
  `status` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `type`, `status`) VALUES
(8, 'admin', '$2y$10$z/KTMcSVreiwtV1smIL9uO3OWZj2Z9HAqxoIeJcMm6bof5Qg2AM8q', 'admin', 'admin', 'admin@admin.com', 10, 1),
(9, 'test', '$2y$10$npPiZXBGO416pR6TYqhwfOeH7KjaEcCtojW0hN/L0QRL.VN6zMH6a', 'test', 'test', 'test@test.bg', 0, 2),
(10, 'test2', '$2y$10$PSMeY7qZB/xzUr..Hd6jNuJlPCQkEB9.KePwoNC8hreKoUpsoQIla', 'test2', 'test2', 'test2@test.test', 0, 2),
(11, 'test3', '$2y$10$QkMMJ28w.Rr0vyX5MINBv.Ra6n1a3npCC1BUfqphGxaK1LZtNeUp6', 'test3', 'test3', 'test3@test3.bg', 0, 1),
(12, 'tester', '$2y$10$kA6fl/F7i4N8/f5mA24wneLki5KZ3p0OkRAnu7A/3UisZEJs1vs6i', 'Ð”Ñ€Ð°Ð³Ð¾Ð¼Ð¸Ñ€', 'ÐÐ½Ð³ÐµÐ»Ð¾Ð²', 'dragomir.angelov@abv.bg', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `snippet`
--
ALTER TABLE `snippet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_creator_id` (`creator_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `snippet`
--
ALTER TABLE `snippet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `snippet`
--
ALTER TABLE `snippet`
  ADD CONSTRAINT `fk_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
