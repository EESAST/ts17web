-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2016 at 03:21 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ts17web`
--

-- --------------------------------------------------------

--
-- Table structure for table `detailforum`
--

CREATE TABLE IF NOT EXISTS `detailforum` (
  `index` int(11) NOT NULL,
  `fatherindex` int(10) unsigned NOT NULL,
  `reply` text CHARACTER SET gb2312 NOT NULL,
  `author` text CHARACTER SET gb2312 NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailforum`
--

INSERT INTO `detailforum` (`index`, `fatherindex`, `reply`, `author`, `created_at`) VALUES
(1, 2, 'hehehe', 'fcz', '2016-01-20 10:10:13'),
(2, 2, 'hahaha', 'fcz', '2016-01-20 10:10:32'),
(3, 2, 'hahaha', 'fcz', '2016-01-20 10:11:18'),
(4, 1, '不说不知道一说吓一跳', 'fcz', '2016-01-20 10:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `index` smallint(5) NOT NULL,
  `author` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `theme` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `content` text CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `reply` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`index`, `author`, `theme`, `content`, `reply`, `created_at`, `updated_at`) VALUES
(1, 'fcz', '我好饿', '真的', 1, '2016-01-20 10:03:15', '2016-01-20 10:11:40'),
(2, 'fcz', '我也饿', '呵呵呵呵', 3, '2016-01-20 10:03:57', '2016-01-20 10:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `addedby` varchar(50) NOT NULL,
  `addedat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newss`
--

CREATE TABLE IF NOT EXISTS `newss` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET gb2312 NOT NULL,
  `text` text CHARACTER SET gb2312 NOT NULL,
  `addedby` varchar(50) CHARACTER SET gb2312 NOT NULL,
  `addedat` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newss`
--

INSERT INTO `newss` (`id`, `title`, `text`, `addedby`, `addedat`) VALUES
(3, '21312', '发撒反对', '士大夫', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `sourcecodes`
--

CREATE TABLE IF NOT EXISTS `sourcecodes` (
  `id` int(11) NOT NULL,
  `team` varchar(50) CHARACTER SET gb2312 NOT NULL,
  `uploadedby` varchar(50) CHARACTER SET gb2312 NOT NULL,
  `uploadedat` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sourcecodes`
--

INSERT INTO `sourcecodes` (`id`, `team`, `uploadedby`, `uploadedat`) VALUES
(1, '嘿我真的好想你', 'fcz', '2016-01-18 00:00:00'),
(2, '嘿我真的好想你', 'fcz', '2016-01-18 03:14:45'),
(3, '嘿我真的好想你', 'fcz', '2016-01-20 09:17:44'),
(4, '嘿我真的好想你', 'fcz', '2016-01-20 10:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` tinyint(3) unsigned NOT NULL,
  `teamname` varchar(128) CHARACTER SET gb2312 NOT NULL,
  `leadername` varchar(128) CHARACTER SET gb2312 NOT NULL,
  `member1name` varchar(128) CHARACTER SET gb2312 NOT NULL,
  `member2name` varchar(128) CHARACTER SET gb2312 NOT NULL,
  `member3name` varchar(128) CHARACTER SET gb2312 NOT NULL,
  `slogan` text CHARACTER SET gb2312 NOT NULL,
  `key` text CHARACTER SET gb2312 NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `teamname`, `leadername`, `member1name`, `member2name`, `member3name`, `slogan`, `key`, `status`) VALUES
(2, '嘿我真的好想你', 'fanchengze', 'fcz', '', '', '呵呵呵', '嘿嘿嘿', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` smallint(5) unsigned NOT NULL,
  `username` varchar(32) CHARACTER SET utf8 NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `realname` text CHARACTER SET gb2312 NOT NULL,
  `school` text CHARACTER SET gb2312 NOT NULL,
  `class` text CHARACTER SET gb2312 NOT NULL,
  `studentnumber` int(10) unsigned NOT NULL,
  `authKey` text NOT NULL,
  `accessToken` text NOT NULL,
  `teamname` text CHARACTER SET gb2312,
  `status` int(11) NOT NULL,
  `created_at` text NOT NULL,
  `updated_at` text NOT NULL,
  `group` enum('admin','player') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `realname`, `school`, `class`, `studentnumber`, `authKey`, `accessToken`, `teamname`, `status`, `created_at`, `updated_at`, `group`) VALUES
(1, 'fcz', '123456', '1@f.com', 'fcz', 'fcz', 'fc', 2, '', '', '嘿我真的好想你', 1, '2015-10-07 03:54:15', '2015-10-07 03:54:28', 'player'),
(2, 'fanchengze', '123456', 'fancz2002@gmail.com', '范承泽', '清华大学', '无47班', 2014011199, '', '', '嘿我真的好想你', 1, '2016-01-17 09:42:19', '2016-01-17 09:42:45', 'player');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailforum`
--
ALTER TABLE `detailforum`
  ADD PRIMARY KEY (`index`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`index`);

--
-- Indexes for table `newss`
--
ALTER TABLE `newss`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `sourcecodes`
--
ALTER TABLE `sourcecodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailforum`
--
ALTER TABLE `detailforum`
  MODIFY `index` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `index` smallint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `newss`
--
ALTER TABLE `newss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sourcecodes`
--
ALTER TABLE `sourcecodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
