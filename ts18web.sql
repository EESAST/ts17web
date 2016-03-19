-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2016 at 02:33 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ts18web`
--
CREATE DATABASE IF NOT EXISTS `ts18web` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
USE `ts18web`;

-- --------------------------------------------------------

--
-- Table structure for table `battleresult`
--

CREATE TABLE IF NOT EXISTS `battleresult` (
  `id` int(11) NOT NULL,
  `team1` varchar(128) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `team2` varchar(128) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `battle_at` datetime NOT NULL,
  `result` varchar(128) COLLATE utf8mb4_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `battleresult`
--

INSERT INTO `battleresult` (`id`, `team1`, `team2`, `battle_at`, `result`) VALUES
(1, '哈哈哈', '呵呵呵', '2016-03-19 00:00:00', '哈哈哈 获胜'),
(2, '发达了空间发', '啊师傅', '2016-03-19 00:20:00', '发达了空间发 编译错误，啊师傅 编译成功'),
(3, '看见了似的', '恐惧阿斯顿', '2016-03-19 19:00:40', '看见了似的 编译错误，恐惧阿斯顿 编译错误'),
(4, 'fads ', 'ljaskdfj', '2016-03-20 00:00:00', 'fads 获胜'),
(5, 'fdsafas', '阿斯顿发撒的', '2016-03-31 00:00:00', '阿斯顿发撒的 获胜'),
(6, '阿斯顿发', '阿斯顿发尾服务', '2016-04-07 00:00:00', '阿斯顿发尾服务 获胜');

-- --------------------------------------------------------

--
-- Table structure for table `detailforum`
--

CREATE TABLE IF NOT EXISTS `detailforum` (
  `id` int(11) NOT NULL,
  `fatherindex` int(10) unsigned NOT NULL,
  `reply` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `author` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailforum`
--

INSERT INTO `detailforum` (`id`, `fatherindex`, `reply`, `author`, `created_at`) VALUES
(1, 2, 'hehehe', 'fcz', '2016-01-20 10:10:13'),
(2, 2, 'hahaha', 'fcz', '2016-01-20 10:10:32'),
(3, 2, 'hahaha', 'fcz', '2016-01-20 10:11:18'),
(4, 1, '不说不知道一说吓一跳', 'fcz', '2016-01-20 10:11:40'),
(5, 3, 'sad', 'fcz', '2016-01-20 06:21:45'),
(6, 4, 'sfgssdg', 'test7', '2016-01-31 02:06:14'),
(7, 10, 'agergwegqb', 'lzhbrian', '2016-02-01 13:04:05'),
(8, 7, 'asfdasdfaf', 'lzhbrian', '2016-02-01 13:04:11'),
(9, 7, 'nenerterrgw', 'lzhbrian', '2016-02-01 13:04:47'),
(10, 7, 'hltelkrler', 'lzhbrian', '2016-02-01 13:07:59'),
(11, 7, 'ml34kmhlkmh\r\n', 'lzhbrian', '2016-02-01 13:08:23'),
(12, 7, 'rgwge', 'lzhbrian', '2016-02-01 13:09:59'),
(13, 9, 'wefqwfq', 'lzhbrian', '2016-02-01 13:10:11'),
(14, 9, 'ntrnrtntryrt', 'lzhbrian', '2016-02-01 13:10:14'),
(15, 3, 'jhbhjhbhj', 'lzhbrian', '2016-02-01 13:13:10'),
(16, 7, 'fqwfewq', 'testtest', '2016-02-01 13:16:41'),
(17, 2, 'wefwe', 'testtest', '2016-02-01 13:16:50'),
(18, 10, 'fwefefew', 'testtest', '2016-02-01 13:17:02'),
(19, 12, '山东 v 达 vs v', 'testtest', '2016-02-01 13:21:55'),
(20, 14, '颗颗颗', 'testuser', '2016-02-02 02:31:56'),
(21, 14, 'hahah', 'lzhbrian', '2016-02-02 02:32:19'),
(22, 14, 'hahah ', 'testtest', '2016-02-02 02:32:34'),
(23, 10, 'qwekfhjweq', 'testtest', '2016-02-02 02:36:10'),
(24, 11, 'qwefqwefqf', 'testtest', '2016-02-02 02:36:18'),
(25, 12, 'bdsfbfdsfd', 'testabtmefor', '2016-02-02 03:20:30'),
(26, 13, '是短发是短发', 'testabtmefor', '2016-02-02 03:22:18'),
(27, 12, '是短发是短发', 'testabtmefor', '2016-02-02 03:22:38'),
(28, 11, '是短发撒地方', 'testabtmefor', '2016-02-02 03:24:10'),
(29, 15, '是反攻倒算的功夫', 'testabtmefor', '2016-02-03 10:04:05'),
(30, 15, 'VS大', 'testabtmefor', '2016-02-03 12:45:34'),
(31, 7, 'dfaaf', 'testabtmefor', '2016-02-03 12:48:11'),
(33, 11, 'weqfewfq', 'testtest', '2016-02-03 13:21:13'),
(34, 15, 'qewfqwfq ', 'lllbrian', '2016-02-06 09:30:02'),
(35, 15, 'qewfqwfq ', 'lllbrian', '2016-02-06 09:30:54'),
(36, 13, 'fqwefqwefeqf', 'lllbrian', '2016-02-06 09:31:01'),
(37, 11, 'weqfqwefeqwf', 'lllbrian', '2016-02-06 09:31:06'),
(38, 17, 'fwefqwfqwq', 'lllbrian', '2016-02-06 09:31:12'),
(39, 15, 'wqefqwefqfq', 'lllbrian', '2016-02-06 09:31:18'),
(41, 18, 'asdas', 'lllbrian', '2016-02-06 09:36:26'),
(42, 19, 'efwqwfwfwf', 'lllbrian', '2016-02-06 09:41:27'),
(43, 20, '撒发的发疯的身份撒的', 'testabtmefor', '2016-02-06 09:45:57'),
(44, 20, '请问放弃我放弃我', 'testabtmefor', '2016-02-06 09:46:00'),
(45, 22, '惹不起尔认为', 'test5', '2016-02-06 10:05:48'),
(47, 23, 'ewfewfwe ', 'test5', '2016-02-06 10:06:29'),
(48, 12, 'safsadf', 'test7', '2016-02-06 10:07:35'),
(49, 14, 'heheheh', 'test7', '2016-02-06 10:07:48'),
(50, 2, 'aksldhfjkashfjkahd我在回复', 'lzhbrian', '2016-02-06 10:40:30'),
(51, 11, '发烧空军飞机卡收费克拉结束的', 'lzhbrian', '2016-02-06 10:41:06'),
(52, 12, '上课减肥啦空间发挥空间发哈空间', 'lzhbrian', '2016-02-06 10:41:35'),
(53, 15, 'ewqrqehrqehrelkw', 'lzhbrian', '2016-02-06 10:48:58'),
(58, 15, 'fsbsdbbd', 'lzhbrian', '2016-02-06 13:02:29'),
(59, 11, 'sadfasf', 'testtestuser', '2016-02-06 13:14:28'),
(60, 11, 'sdflkjdahfjksahf', 'lzhbrian', '2016-03-09 12:47:17'),
(61, 30, 'gsfdgf ', 'lzhbrian', '2016-03-12 05:56:35'),
(62, 11, 'sdfadf', 'lzhbrian', '2016-03-12 08:25:35'),
(63, 25, 'sdaaf', 'lzhbrian', '2016-03-12 08:25:49'),
(64, 15, 'hfghghj', 'lzhbrian', '2016-03-12 11:54:14'),
(65, 15, 'hfghghj', 'lzhbrian', '2016-03-12 11:54:18'),
(66, 15, 'fdsaf', 'lzhbrian', '2016-03-12 15:05:28'),
(67, 33, 'nljlk\r\n', 'lzhbrian', '2016-03-12 16:23:02'),
(68, 33, 'kjbkjh', 'lzhbrian', '2016-03-12 16:23:13'),
(69, 15, 'fasdkjf\r\nasdfkbakjwheklljnl', 'lzhbrian', '2016-03-13 13:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `id` smallint(5) NOT NULL,
  `author` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `theme` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `kinds` enum('tucao','tactic','rule','bug','team') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `reply` int(10) unsigned NOT NULL DEFAULT '0',
  `plike` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `author`, `theme`, `content`, `kinds`, `reply`, `plike`, `created_at`, `updated_at`) VALUES
(1, 'fcz', '我好饿', '真的', 'tucao', 1, 0, '2016-01-20 10:03:15', '2016-01-20 10:11:40'),
(2, 'fcz', '我也饿', '呵呵呵呵', 'tucao', 5, 6, '2016-01-20 10:03:57', '2016-02-06 10:40:30'),
(3, 'fcz', 'asdfa', 'asfa', 'tucao', 2, 6, '2016-01-20 06:21:40', '2016-02-01 13:13:10'),
(5, 'lzhbrian', 'd', 'ds', 'tucao', 0, 0, '2016-02-01 12:39:20', '2016-02-01 12:39:20'),
(7, 'lzhbrian', 'sadcas', 'acsdcdad', 'tucao', 7, 7, '2016-02-01 12:46:56', '2016-02-03 12:48:11'),
(9, 'lzhbrian', 'sdfasf(bug)', 'afsfaf', 'tucao', 2, 0, '2016-02-01 12:52:52', '2016-02-01 13:10:14'),
(10, 'lzhbrian', 'asfasfasf(tactic)', 'lksdnlkjasnfsa', 'tactic', 3, 5, '2016-02-01 13:02:44', '2016-02-02 02:36:10'),
(11, 'testtest', '规则询问贴（rule）', 'fhkahfsjkdfhaldfa', 'rule', 8, 27, '2016-02-01 13:21:34', '2016-03-12 08:25:35'),
(12, 'testtest', 'bug（bug）', '看撒娇和防空军阿里合法的时间发 ', 'bug', 5, 19, '2016-02-01 13:21:49', '2016-02-06 10:41:35'),
(13, 'testtest', 'rule2（rule）', '封口机娃焕发健康时间考虑到哈伦裤放假啊哈', 'rule', 2, 14, '2016-02-01 13:22:21', '2016-02-06 09:31:01'),
(14, 'testtest', 'bug（bug）', '疯狂的萨和防空军撒发哈时间发；决定开始啦', 'bug', 4, 8, '2016-02-01 13:22:34', '2016-02-06 10:07:48'),
(15, '队式网站组', '队式网站组给大家拜年啦～', '祝大家三百六十行，行行出bug', 'tactic', 11, 889, '2016-02-02 03:22:07', '2016-03-13 13:09:00'),
(21, 'testabtmefor', 'bugbugbug快消失', 'hah', 'bug', 0, 1, '2016-02-06 09:58:29', '2016-02-06 09:58:29'),
(22, 'test5', 'hahaha我是乱发的', '看来发健身房卡号发大水', 'tactic', 1, 2, '2016-02-06 10:05:40', '2016-02-06 10:05:48'),
(23, 'test5', 'puppy', 'wefewfewf', 'bug', 1, 1, '2016-02-06 10:06:14', '2016-02-06 10:06:29'),
(24, 'test7', 'hahahahaha', 'wefwefw', 'bug', 0, 0, '2016-02-06 10:07:27', '2016-02-06 10:07:27'),
(25, 'test7', '第六个平台报错', '克赖斯基啊倒海翻江啊哭', 'bug', 1, 1, '2016-02-06 10:08:13', '2016-03-12 08:25:49'),
(28, 'testtestuser', 'safasf', 'afafdfa', 'tactic', 0, 2, '2016-02-06 13:14:35', '2016-02-06 13:14:35'),
(29, 'lzhbrian', '咕叽咕叽', '感觉很干净', 'bug', 0, 2, '2016-03-11 14:43:28', '2016-03-11 14:43:28'),
(30, 'lzhbrian', '我要招募队伍', '刷卡劳动法环境法', 'team', 1, 1, '2016-03-11 15:54:35', '2016-03-12 05:56:35'),
(31, 'lzhbrian', '撒地方', '是短发', 'team', 0, 1, '2016-03-12 07:30:34', '2016-03-12 07:30:34'),
(32, 'lzhbrian', '客家话客家话', '空间发的我', 'rule', 0, 1, '2016-03-12 07:38:02', '2016-03-12 07:38:02'),
(33, 'lzhbrian', 'sofa', 'asdf', 'bug', 2, 1, '2016-03-12 16:22:50', '2016-03-12 16:23:13'),
(34, 'lzhbrian', 'sadaasdfa', 'safsaf\r\nasdfasf\r\nasdfasf', 'bug', 0, 0, '2016-03-13 13:08:24', '2016-03-13 13:08:24'),
(35, 'heheh', 'bug统计帖', '<table border="3" width="80%" align="center">\n                <h2 align="center">平台</h2>\n                    <tr>\n                        <td align="center" width="20%"><b>用户名</b></td>\n                        <td align="center" width="30%"><b>提交时间</b></td>\n                        <td align="center" width="50%"><b>bug内容</b></td>\n                    </tr>\n                    <tr>\n                        <td align="center">ExactSeq</td>\n                        <td align="center">03-13 21:13:33</td>\n                        <td align="center">basic.h 参数 int -> double</td>\n                    </tr>\n                    <tr>\n                        <td align="center">zck15</td>\n                        <td align="center">03-14 08:35:36</td>\n                        <td align="center">basic.h kShieldTime 参数</td>\n                    </tr>\n                </table>\n\n                <table border="3" width="80%" align="center">\n                <h2 align="center">3D</h2>\n                    <tr>\n                        <td align="center" width="20%"><b>用户名</b></td>\n                        <td align="center" width="30%"><b>提交时间</b></td>\n                        <td align="center" width="50%"><b>bug内容</b></td>\n                    </tr>\n                    <tr>\n                        <td align="center">LordRevan</td>\n                        <td align="center">03-14 09:09:18</td>\n                        <td align="center">一方ai把另一方ai吃了回放器就会弹出，打不开rpy，提示unexpected error</td>\n                    </tr>\n                    <tr>\n                        <td align="center">Zero Weight</td>\n                        <td align="center">03-15 11:46:43</td>\n                        <td align="center">一放技能3D就卡死</td>\n                    </tr>\n                    <tr>\n                        <td align="center">1214065619</td>\n                        <td align="center">03-15</td>\n                        <td align="center">界面打开有时会接不上平台的接口。。</td>\n                    </tr>\n                </table>\n\n                 <p align="center">禁水；不定期更新，资料未统计完全</p>', 'bug', 0, 200, '2016-03-14 00:00:00', '2016-03-14 00:00:00'),
(36, 'lzhbrian', 'sadf', 'dsfaa', 'rule', 0, 0, '2016-03-18 03:15:51', '2016-03-18 03:15:51'),
(37, 'lzhbrian', 'sadf', 'dsfaa', 'team', 0, 0, '2016-03-18 03:21:36', '2016-03-18 03:21:36'),
(38, 'lzhbrian', 'sadf', 'dsfaa', 'bug', 0, 0, '2016-03-18 03:23:42', '2016-03-18 03:23:42'),
(39, 'lzhbrian', 'sadf', 'dsfaa', 'rule', 0, 0, '2016-03-18 03:24:02', '2016-03-18 03:24:02'),
(40, 'lzhbrian', 'safas', 'dfafaf', 'tactic', 0, 0, '2016-03-18 03:27:50', '2016-03-18 03:27:50'),
(41, 'lzhbrian', 'sdfasfd', 'asfdasfas', 'team', 0, 0, '2016-03-18 03:42:01', '2016-03-18 03:42:01'),
(42, 'lzhbrian', 'asdfas', 'fasdfa', 'rule', 0, 0, '2016-03-18 03:45:49', '2016-03-18 03:45:49'),
(43, 'lzhbrian', 'asdfas', 'fasdfa', 'team', 0, 0, '2016-03-18 03:46:38', '2016-03-18 03:46:38'),
(44, 'lzhbrian', 'afsdf', 'asdf', 'rule', 0, 0, '2016-03-18 03:47:06', '2016-03-18 03:47:06'),
(45, 'lzhbrian', 'afsdf', 'asdf', 'team', 0, 0, '2016-03-18 03:49:44', '2016-03-18 03:49:44'),
(46, 'lzhbrian', 'asdfasdf', 'asfasdf', 'bug', 0, 0, '2016-03-18 04:06:19', '2016-03-18 04:06:19'),
(47, 'lzhbrian', 'asdfasdf', 'asdfasdf', 'rule', 0, 0, '2016-03-18 04:07:13', '2016-03-18 04:07:13'),
(48, 'lzhbrian', 'asdfa', 'sdfasdfa', 'bug', 0, 0, '2016-03-18 04:08:24', '2016-03-18 04:08:24'),
(49, 'lzhbrian', 'asdfa', 'sdfasdfa', 'bug', 0, 0, '2016-03-18 04:09:50', '2016-03-18 04:09:50'),
(50, 'lzhbrian', 'asdfa', 'sdfasdfa', 'bug', 0, 0, '2016-03-18 04:19:48', '2016-03-18 04:19:48'),
(51, 'lzhbrian', 'asdfa', 'sdfasdfa', 'team', 0, 0, '2016-03-18 04:21:43', '2016-03-18 04:21:43'),
(52, 'lzhbrian', 'asdfa', 'sdfasdfa', 'bug', 0, 0, '2016-03-18 04:23:02', '2016-03-18 04:23:02'),
(53, 'lzhbrian', 'asdfa', 'sdfasdfa', 'team', 0, 0, '2016-03-18 04:26:33', '2016-03-18 04:26:33'),
(54, 'lzhbrian', 'asdfas', 'fasdfas', 'rule', 0, 0, '2016-03-18 04:37:55', '2016-03-18 04:37:55'),
(55, 'lzhbrian', '我在测试', '哈哈哈哈', 'bug', 0, 0, '2016-03-18 04:41:09', '2016-03-18 04:41:09'),
(56, 'lzhbrian', '在测试一次', 'lksjalfkj ', 'rule', 0, 0, '2016-03-18 04:43:42', '2016-03-18 04:43:42'),
(57, 'lllbrian', 'qwefqw', 'fqwfqwef', 'team', 0, 0, '2016-03-18 08:20:00', '2016-03-18 08:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `likehistory`
--

CREATE TABLE IF NOT EXISTS `likehistory` (
  `id` int(11) NOT NULL,
  `forumid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `likehistory`
--

INSERT INTO `likehistory` (`id`, `forumid`, `userid`) VALUES
(1, 17, 8),
(2, 15, 8),
(3, 15, 10),
(4, 11, 10),
(5, 17, 10),
(6, 6, 10),
(7, 18, 10),
(8, 20, 18),
(9, 22, 12),
(10, 23, 12),
(11, 21, 12),
(12, 6, 12),
(13, 15, 12),
(14, 12, 13),
(15, 26, 8),
(16, 11, 19),
(17, 28, 19),
(18, 2, 19),
(19, 22, 19),
(20, 28, 8),
(21, 14, 8),
(22, 3, 8),
(23, 29, 8),
(24, 30, 8),
(25, 13, 8),
(26, 11, 8),
(27, 12, 8),
(28, 33, 30),
(29, 25, 30),
(30, 31, 30),
(31, 15, 30),
(32, 29, 30),
(33, 7, 30),
(34, 13, 30),
(35, 32, 30);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `addedby` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `addedat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newss`
--

CREATE TABLE IF NOT EXISTS `newss` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `addedby` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `addedat` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newss`
--

INSERT INTO `newss` (`id`, `title`, `text`, `addedby`, `addedat`) VALUES
(1, '队式开赛啦！', 'RT，队式开赛啦！大家终于可以开始熬夜写代码了！', 'lzhbrian', '2016-03-13'),
(5, '组队方法', '由队长组队，并设置密钥，队员可通过输入密钥加入队伍。\r\n\r\n“队伍招募”请左转“论坛”->“队伍招募”', 'lzhbrian', '2016-03-11'),
(6, '新闻就是在这里发布的！', '寝室就要有无线网啦，大家兴奋不兴奋。祝大家三百六十行，行行出bug', 'lzhbrian', '2016-03-11'),
(7, '请先注册', '注册之后才能下载文件、组战队、还有水论坛哦！', 'lzhbrian', '2016-03-11'),
(16, '选手交流群', '<img src="images/xuanshoujiaoliuqun.jpg" style="width:150px;">', 'lzhbrian', '2016-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `sourcecodes`
--

CREATE TABLE IF NOT EXISTS `sourcecodes` (
  `id` int(11) NOT NULL,
  `team` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `uploaded_by` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `uploaded_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `sourcecodes`
--

INSERT INTO `sourcecodes` (`id`, `team`, `uploaded_by`, `uploaded_at`) VALUES
(1, '我最帅队', 'lzhbrian', '2016-03-18 08:04:00'),
(2, '我最帅队', 'lzhbrian', '2016-03-18 08:04:18'),
(3, 'fasdfasdf', 'lllbrian', '2016-03-18 08:06:08'),
(4, 'fasdfasdf', 'lllbrian', '2016-03-18 08:06:08'),
(5, 'fasdfasdf', 'lllbrian', '2016-03-18 08:15:58'),
(6, 'fasdfasdf', 'lllbrian', '2016-03-18 08:22:43'),
(7, 'fasdfasdf', 'lllbrian', '2016-03-18 08:24:36'),
(8, 'fasdfasdf', 'lllbrian', '2016-03-18 08:29:26'),
(9, 'fasdfasdf', 'lllbrian', '2016-03-18 08:31:48'),
(10, 'fasdfasdf', 'lllbrian', '2016-03-18 08:32:04'),
(11, 'fasdfasdf', 'lllbrian', '2016-03-18 08:32:37'),
(12, 'fasdfasdf', 'lllbrian', '2016-03-18 08:32:39'),
(13, 'fasdfasdf', 'lllbrian', '2016-03-18 08:32:44'),
(14, 'fasdfasdf', 'lllbrian', '2016-03-18 08:36:10'),
(15, 'fasdfasdf', 'lllbrian', '2016-03-18 08:36:13'),
(16, 'fasdfasdf', 'lllbrian', '2016-03-18 08:37:27'),
(17, 'fasdfasdf', 'lllbrian', '2016-03-18 08:41:18'),
(18, 'fasdfasdf', 'lllbrian', '2016-03-18 08:42:31'),
(19, 'fasdfasdf', 'lllbrian', '2016-03-18 08:44:49'),
(20, 'fasdfasdf', 'lllbrian', '2016-03-18 09:11:25'),
(21, 'fasdfasdf', 'lllbrian', '2016-03-18 09:11:41'),
(22, 'fasdfasdf', 'lllbrian', '2016-03-18 09:32:26'),
(23, 'fasdfasdf', 'lllbrian', '2016-03-18 09:32:47'),
(24, 'fasdfasdf', 'lllbrian', '2016-03-18 09:32:50'),
(25, 'fasdfasdf', 'lllbrian', '2016-03-18 09:33:40'),
(26, '我最帅队', 'lzhbrian', '2016-03-18 04:17:49'),
(27, '我最帅队', 'lzhbrian', '2016-03-19 07:55:05'),
(28, '我最帅队', 'lzhbrian', '2016-03-19 12:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` tinyint(3) unsigned NOT NULL,
  `teamname` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `leadername` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `member1name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `member2name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `member3name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `slogan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `key` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `teamname`, `leadername`, `member1name`, `member2name`, `member3name`, `slogan`, `key`, `status`) VALUES
(2, '嘿我真的好想你', 'fanchengze', 'fcz', '', '', '呵呵呵', '嘿嘿嘿', 1),
(3, '我的队伍最帅', 'test3', '', '', '', '哈哈哈', 'passkey', 1),
(6, 'fsa', 'sda', 'fas', '', '', 'asd', 'asd', 1),
(7, 'afsd', 'asdffnghn', 'hfg', '', '', 'asdf', '', 1),
(8, '我最帅队', 'lzhbrian', '', '', '', '呵呵呵', 'password', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` smallint(5) unsigned NOT NULL,
  `username` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `realname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `school` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `class` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `studentnumber` int(11) unsigned NOT NULL,
  `pic` enum('1','2','3','4','5','6') NOT NULL DEFAULT '1',
  `authKey` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `accessToken` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `teamname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `group` enum('admin','player') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `realname`, `school`, `class`, `studentnumber`, `pic`, `authKey`, `accessToken`, `teamname`, `status`, `created_at`, `updated_at`, `group`) VALUES
(9, 'username', '$2y$13$DeRxktOcMhejzgzRsVEHTeINMIbVfd7FD1sZ73bEZ4qkDCNMFcrDi', 'email3', '胡昌然', '清华大学', '无42', 2014011111, '1', 'KgR0qN7fzjlu9UkCxQgmkDFwQE3qc_gH', '', NULL, 1, '2016-01-27 14:29:35', '2016-01-27 14:29:35', 'player'),
(10, 'lllbrian', '$2y$13$5H0Z9QZKnUbSfQqfcB2kReZyzF3snW42b/qY0qVZCc9RUzgaMF9pG', 'lzhbrian@email', '林', '清华', '电子系无42', 2014, '2', 'XF1thgVEyPqnLFDSPv2xN3zS2hhXrSGi', '', '', 1, '2016-01-27 16:18:19', '2016-03-18 08:05:38', 'player'),
(11, 'dddd', '$2y$13$9CYoh0dFJ7mVaTyXHJ3y7elw90U/517XHcwc/DwPv.mOnygSggdmW', 'd', 'dd', 'd', 'd', 0, '1', 'VZVF0P60KzZ4PT3CE5PRflDOyLKASQpE', '', NULL, 1, '2016-01-27 16:19:28', '2016-01-27 16:19:28', 'player'),
(12, 'test5', '$2y$13$WNAaNzgA74uj3Fh3qZCjPuubn28p4i.Kc5FojNQUT.IijdS9ry0dC', 'j', 'j', 'jj', 'j', 0, '1', 'wzWQJ4ojE4x38TiqDJqc2gi7paDKWNY9', '', NULL, 1, '2016-01-27 16:20:57', '2016-01-27 16:20:57', 'player'),
(13, 'test7', '$2y$13$FEkdN9tO/nFArjm66W4kwOuo8UKqjEjKa0aNb4sbK1BzzxhetXQbS', 'dlzhbrian@gmail.com', '林子恒', '清华', 'w43', 2014011000, '1', 'XxealDI_uqjL-dBL_126Z42UBn-Fk6Yj', '', NULL, 1, '2016-01-30 13:43:47', '2016-01-30 13:43:47', 'player'),
(15, 'testtest', '$2y$13$3T/goqu.zzItVf0nMG/mTuDtvWf6B11WU2oQn3EV9NRHmPsWOJLPW', 'email@email.com', 'k', 'lsdaf', 'l', 2000, '1', '5iXMBvAdttWC6AegdBlHloUv2XpDUXk0', '', NULL, 1, '2016-02-01 11:50:46', '2016-02-01 11:50:46', 'player'),
(16, 'testtesttest', '$2y$13$7P/162Are4/dc0wBiV0qtOCHzjJpm1U.6g4KcLxFo42s085ns9BYO', 'email@email.com1', 'real', 'sis', 'asdf', 20123, '1', 'ravFilSvkQIhzGkawzdQyJXVt5keJS_k', '', NULL, 1, '2016-02-01 14:02:43', '2016-02-01 14:02:43', 'player'),
(17, 'testuser', '$2y$13$BFJO9rfWJgcLTNEXTm.2ZOfTAml/vgc6ZvSlV8.rxNfkdBDrNv1h.', 'email.email@email.com', 'jldksajlfk', 'lkfjsadkl', 'kfjalsk', 29321893, '1', 'MEpuXlb7zAtiwYKbhd6pgm01ldIj1RUM', '', NULL, 1, '2016-02-01 14:37:42', '2016-02-01 14:37:42', 'player'),
(18, 'testabtmefor', '$2y$13$.yIv8DtbXRi3nR9u5yLZLukIjOUkaK3PrJ1LaZ1MU4XoqYSMd6FUW', 'test@email.com', 'real', 'sdlkj', 'flksjda', 3029183, '1', '_HpXCeHCww9T0lZcs7EXKGYxbxeOYqFM', '', NULL, 1, '2016-02-02 03:20:16', '2016-02-02 03:20:16', 'player'),
(19, 'testtestuser', '$2y$13$JCqK7csSHtyH7hs6mbjxKOOuAKUV2FFrZf/bpIXT/6YeZjd/jJ9Ai', 'email.email@email.emal', 'lsadjk', 'kfjalsk', 'lkfjaslkd', 1821739, '1', '9_OfOvr2llgwJB8xajdaqIWrP6lpuKs2', '', NULL, 1, '2016-02-06 13:14:19', '2016-02-06 13:14:19', 'player'),
(20, 'hahaha', '$2y$13$jpnQEnNda8DoQsfhdiYxeO6gDU1TlMuJ8nxxl616LSLPa0taQA4tS', 'lz@g.com', '林子恒', '清华大学', '电子工程系－无42', 2014011054, '1', 'pzsHWBIIyVvpspoNDLnllmhWnFHqi0yn', '', NULL, 1, '2016-02-23 14:58:21', '2016-02-23 14:58:21', 'player'),
(21, 'sdafsadfas', '$2y$13$q4NyRzTbP0nwfhsXD7cpleXnH6XrgEx5fB43dkA2gQDBhIfYLCx3C', 'd@d.sdfasfda', 'sadf', 'asdf', 'asdf', 3412341, '1', 'Nip7xxqg-7zvb2hgDO2IvTjRfAYLNGJd', '', NULL, 1, '2016-03-12 06:45:49', '2016-03-12 06:45:49', 'player'),
(22, 'asvdadva', '$2y$13$eHPLk52JaDPPOyQs0Kdn7OLSdKel7CHfyG0Uu/Co7kUcUa/E1nxb2', 'asdf@dsaf.asdf', 'asfd', 'asdf', 'asdf', 2131231, '1', '6gUUOJrU63SJSDogy1-B9rkzAWCzj0Cr', '', NULL, 1, '2016-03-12 07:01:03', '2016-03-12 07:01:03', 'player'),
(23, 'asfasdfas', '$2y$13$idspk46d91/hCuemZqkwsOeNLeEM5P8QLA9vrQo4w7EBbPRjO061u', 'asdfas@fasdf.com', 'asdfljl', 'lkasjdf', 'qlkjdskf', 123123, '1', 'X1JKQw8C2XXqdglxxfmd59CwOXDTh8cf', '', NULL, 1, '2016-03-12 07:07:20', '2016-03-12 07:07:20', 'player'),
(24, '1231234', '$2y$13$lY2./C2t4WrPrghDrRJL9ud7NHDQsovGSWpjaTs1S.i/l6h0U28uq', 'asdf@ewqrqrqr.fasdf', 'fasd', 'fadsh', 'kfajshdf', 1232132321, '1', 'dPN3GxfqxirIc5rS9-nH5W7X8R22FxvA', '', NULL, 1, '2016-03-12 07:08:37', '2016-03-12 07:08:37', 'player'),
(25, 'eqwfqwfwq', '$2y$13$jP/EPI4kWkhRRpIF2fi3uumFoTG5FB0nDvFrS2Fw/9AncLDrJpbna', 'asdfa@fsafd.nfg', 'wergewr', 'gewrgwerg', 'rewgwegwe', 21312313, '1', 'HNgm60oFmA18nxJfd1dWEFzZofktIWML', '', NULL, 1, '2016-03-12 07:09:29', '2016-03-12 07:09:29', 'player'),
(26, 'eqwfqwfq', '$2y$13$xLLUt2DV/ze7DRhflC8VvObpEc/qV/6sO/69yaVsATsyoumCtt0H2', 'fdfads@fewfasd.csdca', 'wqefeqwf', 'qwefqwef', 'wqffewf', 1231313, '1', 'rhaWS5x1V4iohbzH-JpGQJ5jdPfLHSpH', '', NULL, 1, '2016-03-12 07:10:55', '2016-03-12 07:10:55', 'player'),
(27, 'sadfsdfas', '$2y$13$ptQ8.Sd07UGifZYgNCL8COuVUNNaHM94R0F1RkUs5pGyrvRxQYuQ.', 'fsdfa@fewfa.fsfda', 'wqfeqf', 'wqfeewqf', 'wefqf', 34124312, '1', 'iNNeWUwztMCYjQ4d3A9vFZPhnaH7LrPB', '', NULL, 1, '2016-03-12 07:23:00', '2016-03-12 07:23:00', 'player'),
(28, 'wqefqwef', '$2y$13$rMni022g5hrasP8/ai/4kuKdc7Ef8BYWnbMrXSeBYQIXPyP0CkXqW', 'flkadsjfl@lfjdsa.fsdf', 'ifhwf', 'iuhfiewufh', 'iufhwiufwe', 128731263, '1', 'A1ls7Iq5TUyHe00r15K_j0QGklBkfQJC', '', NULL, 1, '2016-03-12 07:23:54', '2016-03-12 07:23:54', 'player'),
(29, 'kghjgjh', '$2y$13$yUOsvE7W1RLLtupjMDF4kOMmCcGmU572E1ydRv847rWo9///znl12', 'gkjhgkhj@jhfhg.kjhj', 'jufh', 'jhgfjgh', 'tfhgjf', 1, '1', '85K42FKPTOIfxBH1RpFPydp_cRHFD8XO', '', '', 1, '2016-03-12 11:58:13', '2016-03-12 11:58:13', 'player'),
(30, 'lzhbrian', '$2y$13$LzrnGKIRHLs9itbifxACUOK0d6yqW6hBYv/VcgOiPHsRv1ZXehVMi', 'lzhbrian@gmail.com', '林子恒', '清华大学', '电子工程系－无42', 2014011054, '5', '2SudDw8vMYuONfs7uUx27QzNEx0qFxFe', '', '我最帅队', 1, '2016-03-12 17:40:42', '2016-03-18 08:00:36', 'player');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `battleresult`
--
ALTER TABLE `battleresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailforum`
--
ALTER TABLE `detailforum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likehistory`
--
ALTER TABLE `likehistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newss`
--
ALTER TABLE `newss`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

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
-- AUTO_INCREMENT for table `battleresult`
--
ALTER TABLE `battleresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `detailforum`
--
ALTER TABLE `detailforum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `likehistory`
--
ALTER TABLE `likehistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `newss`
--
ALTER TABLE `newss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `sourcecodes`
--
ALTER TABLE `sourcecodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
