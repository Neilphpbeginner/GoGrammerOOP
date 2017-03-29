-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2017 at 06:09 PM
-- Server version: 5.7.17-0ubuntu0.16.10.1
-- PHP Version: 7.0.13-0ubuntu0.16.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guitarwars`
--

-- --------------------------------------------------------

--
-- Table structure for table `aliens_abduction`
--

CREATE TABLE `aliens_abduction` (
  `abduction_id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `when_it_happened` date DEFAULT NULL,
  `how_long` varchar(30) DEFAULT NULL,
  `how_many` varchar(30) DEFAULT NULL,
  `alien_description` varchar(100) DEFAULT NULL,
  `what_they_did` varchar(100) DEFAULT NULL,
  `fang_spotted` varchar(10) DEFAULT NULL,
  `other` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aliens_abduction`
--

INSERT INTO `aliens_abduction` (`abduction_id`, `first_name`, `last_name`, `when_it_happened`, `how_long`, `how_many`, `alien_description`, `what_they_did`, `fang_spotted`, `other`, `email`) VALUES
(1, 'Alf', 'Nader', '2000-07-12', 'one week', 'at least 12', 'It was a big non-recyclable shiny disc full of what appeared to be mutated labor union officials.', 'Swooped down from the sky and snatched me up with no warning.', 'no', 'That\'s it.', 'ralph@nader.com'),
(2, 'Don', 'Quayle', '1991-09-14', '37 seconds', 'dunno', 'They looked like donkeys made out of metal with some kind of jet packs attached to them.', 'I was sitting there eating a baked potatoe when "Zwoosh!", this beam of light took me away.', 'yes', 'I really do love potatos.', 'dq@iwasvicepresident.com'),
(5, 'Sally', 'Jones', '2008-05-11', '1 day', 'four', 'green with six tentacles', 'We just talked and played with a dog', 'yes', 'I may have seen your dog. Contact me.', 'sally@gregs-list.net'),
(8, 'Shill', 'Watner', '2008-07-05', '2 hours', 'don\'t know', 'There was a bright light in the sky, followed by a bark or two.', 'They beamed me toward a gas station in the desert.', 'yes', 'I was out of gas, so it was a pretty good abduction.', 'shillwatner@imightbecaptkirk.com');

-- --------------------------------------------------------

--
-- Table structure for table `guitarwars`
--

CREATE TABLE `guitarwars` (
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(32) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `screenshot` varchar(64) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `approve` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guitarwars`
--

INSERT INTO `guitarwars` (`date`, `name`, `score`, `screenshot`, `id`, `approve`) VALUES
('2008-04-22 12:37:34', 'Paco Jastorius', 127650, 'pacosscore.gif', 1, 1),
('2008-04-22 19:27:54', 'Nevil Johansson', 98430, 'nevilsscore.gif', 2, 1),
('2008-04-23 07:12:53', 'Belita Chevy', 282470, 'belitasscore.gif', 3, 1),
('2008-04-23 12:09:50', 'Kenny Lavitz', 64930, 'kennysscore.gif', 4, 1),
('2008-04-24 06:13:52', 'Phiz Lairston', 186580, 'phizsscore.gif', 5, 1),
('2008-04-25 05:22:19', 'Jean Paul Jones', 243260, 'jeanpaulsscore.gif', 6, 1),
('2008-04-25 09:49:23', 'Jacob Scorcherson', 389740, 'jacobsscore.gif', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mismatch_category`
--

CREATE TABLE `mismatch_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(48) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mismatch_category`
--

INSERT INTO `mismatch_category` (`category_id`, `name`) VALUES
(1, 'Appearance'),
(2, 'Entertainment'),
(3, 'Food'),
(4, 'People'),
(5, 'Activities');

-- --------------------------------------------------------

--
-- Table structure for table `mismatch_response`
--

CREATE TABLE `mismatch_response` (
  `response_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `response` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mismatch_response`
--

INSERT INTO `mismatch_response` (`response_id`, `user_id`, `topic_id`, `response`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 2),
(3, 1, 3, 2),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 1, 6, 1),
(7, 1, 7, 2),
(8, 1, 8, 2),
(9, 1, 9, 1),
(10, 1, 10, 1),
(11, 1, 11, 1),
(12, 1, 12, 2),
(13, 1, 13, 1),
(14, 1, 14, 2),
(15, 1, 15, 1),
(16, 1, 16, 2),
(17, 1, 17, 1),
(18, 1, 18, 1),
(19, 1, 19, 2),
(20, 1, 20, 1),
(21, 1, 21, 1),
(22, 1, 22, 2),
(23, 1, 23, 1),
(24, 1, 24, 2),
(25, 1, 25, 1),
(26, 7, 1, 1),
(27, 7, 2, 2),
(28, 7, 3, 1),
(29, 7, 4, 2),
(30, 7, 5, 1),
(31, 7, 6, 2),
(32, 7, 7, 1),
(33, 7, 8, 1),
(34, 7, 9, 2),
(35, 7, 10, 2),
(36, 7, 11, 1),
(37, 7, 12, 2),
(38, 7, 13, 1),
(39, 7, 14, 1),
(40, 7, 15, 2),
(41, 7, 16, 1),
(42, 7, 17, 2),
(43, 7, 18, 2),
(44, 7, 19, 2),
(45, 7, 20, 1),
(46, 7, 21, 2),
(47, 7, 22, 2),
(48, 7, 23, 1),
(49, 7, 24, 1),
(50, 7, 25, 2),
(51, 2, 1, 1),
(52, 2, 2, 1),
(53, 2, 3, 2),
(54, 2, 4, 2),
(55, 2, 5, 2),
(56, 2, 6, 2),
(57, 2, 7, 2),
(58, 2, 8, 2),
(59, 2, 9, 1),
(60, 2, 10, 1),
(61, 2, 11, 2),
(62, 2, 12, 1),
(63, 2, 13, 1),
(64, 2, 14, 2),
(65, 2, 15, 2),
(66, 2, 16, 2),
(67, 2, 17, 1),
(68, 2, 18, 2),
(69, 2, 19, 1),
(70, 2, 20, 2),
(71, 2, 21, 1),
(72, 2, 22, 2),
(73, 2, 23, 2),
(74, 2, 24, 1),
(75, 2, 25, 1),
(76, 11, 1, 1),
(77, 11, 2, 1),
(78, 11, 3, 1),
(79, 11, 4, 1),
(80, 11, 5, 1),
(81, 11, 6, 2),
(82, 11, 7, 1),
(83, 11, 8, 1),
(84, 11, 9, 2),
(85, 11, 10, 2),
(86, 11, 11, 2),
(87, 11, 12, 1),
(88, 11, 13, 1),
(89, 11, 14, 1),
(90, 11, 15, 2),
(91, 11, 16, 1),
(92, 11, 17, 2),
(93, 11, 18, 2),
(94, 11, 19, 1),
(95, 11, 20, 2),
(96, 11, 21, 2),
(97, 11, 22, 1),
(98, 11, 23, 2),
(99, 11, 24, 1),
(100, 11, 25, 2),
(101, 12, 1, 2),
(102, 12, 2, 2),
(103, 12, 3, 1),
(104, 12, 4, 1),
(105, 12, 5, 1),
(106, 12, 6, 2),
(107, 12, 7, 2),
(108, 12, 8, 1),
(109, 12, 9, 2),
(110, 12, 10, 1),
(111, 12, 11, 1),
(112, 12, 12, 2),
(113, 12, 13, 2),
(114, 12, 14, 2),
(115, 12, 15, 2),
(116, 12, 16, 1),
(117, 12, 17, 1),
(118, 12, 18, 2),
(119, 12, 19, 1),
(120, 12, 20, 1),
(121, 12, 21, 1),
(122, 12, 22, 2),
(123, 12, 23, 1),
(124, 12, 24, 2),
(125, 12, 25, 2),
(126, 8, 1, 2),
(127, 8, 2, 2),
(128, 8, 3, 1),
(129, 8, 4, 1),
(130, 8, 5, 2),
(131, 8, 6, 1),
(132, 8, 7, 1),
(133, 8, 8, 2),
(134, 8, 9, 1),
(135, 8, 10, 1),
(136, 8, 11, 2),
(137, 8, 12, 2),
(138, 8, 13, 2),
(139, 8, 14, 2),
(140, 8, 15, 1),
(141, 8, 16, 1),
(142, 8, 17, 1),
(143, 8, 18, 2),
(144, 8, 19, 1),
(145, 8, 20, 1),
(146, 8, 21, 1),
(147, 8, 22, 1),
(148, 8, 23, 2),
(149, 8, 24, 2),
(150, 8, 25, 1),
(151, 3, 1, 1),
(152, 3, 2, 1),
(153, 3, 3, 1),
(154, 3, 4, 2),
(155, 3, 5, 2),
(156, 3, 6, 2),
(157, 3, 7, 1),
(158, 3, 8, 1),
(159, 3, 9, 2),
(160, 3, 10, 1),
(161, 3, 11, 1),
(162, 3, 12, 1),
(163, 3, 13, 1),
(164, 3, 14, 1),
(165, 3, 15, 1),
(166, 3, 16, 2),
(167, 3, 17, 2),
(168, 3, 18, 2),
(169, 3, 19, 1),
(170, 3, 20, 1),
(171, 3, 21, 1),
(172, 3, 22, 1),
(173, 3, 23, 1),
(174, 3, 24, 2),
(175, 3, 25, 2),
(176, 4, 1, 1),
(177, 4, 2, 2),
(178, 4, 3, 1),
(179, 4, 4, 1),
(180, 4, 5, 2),
(181, 4, 6, 1),
(182, 4, 7, 1),
(183, 4, 8, 2),
(184, 4, 9, 1),
(185, 4, 10, 2),
(186, 4, 11, 2),
(187, 4, 12, 1),
(188, 4, 13, 2),
(189, 4, 14, 2),
(190, 4, 15, 1),
(191, 4, 16, 1),
(192, 4, 17, 2),
(193, 4, 18, 1),
(194, 4, 19, 1),
(195, 4, 20, 2),
(196, 4, 21, 2),
(197, 4, 22, 1),
(198, 4, 23, 2),
(199, 4, 24, 1),
(200, 4, 25, 1),
(201, 5, 1, 2),
(202, 5, 2, 2),
(203, 5, 3, 2),
(204, 5, 4, 1),
(205, 5, 5, 1),
(206, 5, 6, 2),
(207, 5, 7, 2),
(208, 5, 8, 2),
(209, 5, 9, 1),
(210, 5, 10, 1),
(211, 5, 11, 2),
(212, 5, 12, 1),
(213, 5, 13, 2),
(214, 5, 14, 1),
(215, 5, 15, 2),
(216, 5, 16, 2),
(217, 5, 17, 1),
(218, 5, 18, 1),
(219, 5, 19, 2),
(220, 5, 20, 1),
(221, 5, 21, 2),
(222, 5, 22, 2),
(223, 5, 23, 1),
(224, 5, 24, 1),
(225, 5, 25, 1),
(226, 6, 1, 2),
(227, 6, 2, 1),
(228, 6, 3, 2),
(229, 6, 4, 1),
(230, 6, 5, 2),
(231, 6, 6, 1),
(232, 6, 7, 1),
(233, 6, 8, 1),
(234, 6, 9, 2),
(235, 6, 10, 1),
(236, 6, 11, 1),
(237, 6, 12, 2),
(238, 6, 13, 2),
(239, 6, 14, 2),
(240, 6, 15, 1),
(241, 6, 16, 2),
(242, 6, 17, 1),
(243, 6, 18, 1),
(244, 6, 19, 2),
(245, 6, 20, 1),
(246, 6, 21, 1),
(247, 6, 22, 2),
(248, 6, 23, 2),
(249, 6, 24, 2),
(250, 6, 25, 1),
(251, 9, 1, 2),
(252, 9, 2, 1),
(253, 9, 3, 1),
(254, 9, 4, 2),
(255, 9, 5, 2),
(256, 9, 6, 2),
(257, 9, 7, 2),
(258, 9, 8, 2),
(259, 9, 9, 1),
(260, 9, 10, 1),
(261, 9, 11, 2),
(262, 9, 12, 1),
(263, 9, 13, 2),
(264, 9, 14, 1),
(265, 9, 15, 2),
(266, 9, 16, 1),
(267, 9, 17, 1),
(268, 9, 18, 1),
(269, 9, 19, 2),
(270, 9, 20, 1),
(271, 9, 21, 1),
(272, 9, 22, 2),
(273, 9, 23, 2),
(274, 9, 24, 1),
(275, 9, 25, 1),
(276, 10, 1, 1),
(277, 10, 2, 2),
(278, 10, 3, 2),
(279, 10, 4, 2),
(280, 10, 5, 2),
(281, 10, 6, 2),
(282, 10, 7, 1),
(283, 10, 8, 2),
(284, 10, 9, 2),
(285, 10, 10, 1),
(286, 10, 11, 1),
(287, 10, 12, 2),
(288, 10, 13, 1),
(289, 10, 14, 2),
(290, 10, 15, 1),
(291, 10, 16, 1),
(292, 10, 17, 1),
(293, 10, 18, 1),
(294, 10, 19, 1),
(295, 10, 20, 1),
(296, 10, 21, 1),
(297, 10, 22, 1),
(298, 10, 23, 1),
(299, 10, 24, 2),
(300, 10, 25, 2),
(301, 13, 1, 2),
(302, 13, 2, 1),
(303, 13, 3, 2),
(304, 13, 4, 2),
(305, 13, 5, NULL),
(306, 13, 6, 1),
(307, 13, 7, 1),
(308, 13, 8, 2),
(309, 13, 9, 1),
(310, 13, 10, 1),
(311, 13, 11, 2),
(312, 13, 12, 1),
(313, 13, 13, 1),
(314, 13, 14, 1),
(315, 13, 15, 2),
(316, 13, 16, 2),
(317, 13, 17, 1),
(318, 13, 18, 2),
(319, 13, 19, 1),
(320, 13, 20, 1),
(321, 13, 21, 2),
(322, 13, 22, 2),
(323, 13, 23, 1),
(324, 13, 24, 1),
(325, 13, 25, 2),
(326, 14, 1, 2),
(327, 14, 2, 2),
(328, 14, 3, 2),
(329, 14, 4, 2),
(330, 14, 5, 1),
(331, 14, 6, 1),
(332, 14, 7, 1),
(333, 14, 8, 2),
(334, 14, 9, 1),
(335, 14, 10, 1),
(336, 14, 11, 1),
(337, 14, 12, 1),
(338, 14, 13, 2),
(339, 14, 14, 2),
(340, 14, 15, 2),
(341, 14, 16, 2),
(342, 14, 17, 1),
(343, 14, 18, 2),
(344, 14, 19, 1),
(345, 14, 20, 1),
(346, 14, 21, 2),
(347, 14, 22, 2),
(348, 14, 23, 2),
(349, 14, 24, 1),
(350, 14, 25, 2),
(351, 15, 1, 2),
(352, 15, 2, 2),
(353, 15, 3, 2),
(354, 15, 4, 1),
(355, 15, 5, 1),
(356, 15, 6, 1),
(357, 15, 7, 2),
(358, 15, 8, 1),
(359, 15, 9, 2),
(360, 15, 10, 2),
(361, 15, 11, 2),
(362, 15, 12, 2),
(363, 15, 13, 1),
(364, 15, 14, 2),
(365, 15, 15, 2),
(366, 15, 16, 2),
(367, 15, 17, 2),
(368, 15, 18, 2),
(369, 15, 19, 2),
(370, 15, 20, 2),
(371, 15, 21, 1),
(372, 15, 22, 1),
(373, 15, 23, 1),
(374, 15, 24, 2),
(375, 15, 25, 1),
(376, 18, 1, 1),
(377, 18, 2, 2),
(378, 18, 3, 1),
(379, 18, 4, 2),
(380, 18, 5, 1),
(381, 18, 6, 2),
(382, 18, 7, 1),
(383, 18, 8, 2),
(384, 18, 9, 1),
(385, 18, 10, 2),
(386, 18, 11, 1),
(387, 18, 12, 2),
(388, 18, 13, 1),
(389, 18, 14, 2),
(390, 18, 15, 1),
(391, 18, 16, 2),
(392, 18, 17, 1),
(393, 18, 18, 2),
(394, 18, 19, 1),
(395, 18, 20, 2),
(396, 18, 21, 1),
(397, 18, 22, 2),
(398, 18, 23, 1),
(399, 18, 24, 2),
(400, 18, 25, 1),
(401, 17, 1, 2),
(402, 17, 2, 2),
(403, 17, 3, 2),
(404, 17, 4, 2),
(405, 17, 5, 2),
(406, 17, 6, 1),
(407, 17, 7, 2),
(408, 17, 8, 2),
(409, 17, 9, 1),
(410, 17, 10, 2),
(411, 17, 11, 1),
(412, 17, 12, 2),
(413, 17, 13, 1),
(414, 17, 14, 1),
(415, 17, 15, 1),
(416, 17, 16, 2),
(417, 17, 17, 1),
(418, 17, 18, 2),
(419, 17, 19, 1),
(420, 17, 20, 1),
(421, 17, 21, 2),
(422, 17, 22, 1),
(423, 17, 23, 2),
(424, 17, 24, 2),
(425, 17, 25, 1),
(426, 19, 1, 1),
(427, 19, 2, 1),
(428, 19, 3, 1),
(429, 19, 4, 2),
(430, 19, 5, 1),
(431, 19, 6, 2),
(432, 19, 7, 1),
(433, 19, 8, 2),
(434, 19, 9, 1),
(435, 19, 10, 2),
(436, 19, 11, 1),
(437, 19, 12, 1),
(438, 19, 13, 1),
(439, 19, 14, 1),
(440, 19, 15, 1),
(441, 19, 16, 1),
(442, 19, 17, 1),
(443, 19, 18, 1),
(444, 19, 19, 1),
(445, 19, 20, 1),
(446, 19, 21, 1),
(447, 19, 22, 1),
(448, 19, 23, 1),
(449, 19, 24, 1),
(450, 19, 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mismatch_topic`
--

CREATE TABLE `mismatch_topic` (
  `topic_id` int(11) NOT NULL,
  `name` varchar(48) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mismatch_topic`
--

INSERT INTO `mismatch_topic` (`topic_id`, `name`, `category_id`) VALUES
(1, 'Tattoos', 1),
(2, 'Gold chains', 1),
(3, 'Body piercings', 1),
(4, 'Cowboy boots', 1),
(5, 'Long hair', 1),
(6, 'Reality TV', 2),
(7, 'Professional wrestling', 2),
(8, 'Horror movies', 2),
(9, 'Easy listening music', 2),
(10, 'The opera', 2),
(11, 'Sushi', 3),
(12, 'Spam', 3),
(13, 'Spicy food', 3),
(14, 'Peanut butter & banana sandwiches', 3),
(15, 'Martinis', 3),
(16, 'Howard Stern', 4),
(17, 'Bill Gates', 4),
(18, 'Barbara Streisand', 4),
(19, 'Hugh Hefner', 4),
(20, 'Martha Stewart', 4),
(21, 'Yoga', 5),
(22, 'Weightlifting', 5),
(23, 'Cube puzzles', 5),
(24, 'Karaoke', 5),
(25, 'Hiking', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mismatch_user`
--

CREATE TABLE `mismatch_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `join_date` datetime DEFAULT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `city` varchar(32) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `picture` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mismatch_user`
--

INSERT INTO `mismatch_user` (`user_id`, `username`, `password`, `join_date`, `first_name`, `last_name`, `gender`, `birthdate`, `city`, `state`, `picture`) VALUES
(1, 'sidneyk', '745c52f30f82d4323292dcca9eea0aee87feecc5', '2008-06-03 14:51:46', 'Sidney', 'Kelsow', 'F', '1984-07-19', 'Tempe', 'AZ', 'sidneypic.jpg'),
(2, 'nevilj', '12a20bcb5ed139a5f3fc808704897762cbab74ec', '2008-06-03 14:52:09', 'Nevil', 'Johansson', 'M', '1973-05-13', 'Reno', 'NV', 'nevilpic.jpg'),
(3, 'alexc', '676a6666682bd41bef5fd1c1f629fa233b1307a4', '2008-06-03 14:53:05', 'Alex', 'Cooper', 'M', '1974-09-13', 'Boise', 'ID', 'alexpic.jpg'),
(4, 'sdaniels', '1ff915f2fae864032e44cbe5a6cdd858500c9df7', '2008-06-03 14:58:40', 'Susannah', 'Daniels', 'F', '1977-02-23', 'Pasadena', 'CA', 'susannahpic.jpg'),
(5, 'ethelh', '53a56acb2a52f3815a2518e75029b071c298477a', '2008-06-03 15:00:37', 'Ethel', 'Heckel', 'F', '1943-03-27', 'Wichita', 'KS', 'ethelpic.jpg'),
(6, 'oklugman', 'df00f36c0b795c30a0409778d7f9db27a970f74f', '2008-06-03 15:00:48', 'Oscar', 'Klugman', 'M', '1968-06-04', 'Providence', 'RI', 'oscarpic.jpg'),
(7, 'belitac', '7c19dd287e03ae31ce190c4043b5a7f9795c41dc', '2008-06-03 15:01:08', 'Belita', 'Chevy', 'F', '1975-07-08', 'El Paso', 'TX', 'belitapic.jpg'),
(8, 'jasonf', '3da70cd115b7c3a7cebc2b5282706f07d185de9e', '2008-06-03 15:01:19', 'Jason', 'Filmington', 'M', '1969-09-24', 'Hollywood', 'CA', 'jasonpic.jpg'),
(9, 'dierdre', '08447be571e1c113f2f175472753ca5f5af454f3', '2008-06-03 15:01:51', 'Dierdre', 'Pennington', 'F', '1970-04-26', 'Cambridge', 'MA', 'dierdrepic.jpg'),
(10, 'baldpaul', '230dcb28e2d1dc19ec14990721e85cd5c5234245', '2008-06-03 15:02:02', 'Paul', 'Hillsman', 'M', '1964-12-18', 'Charleston', 'SC', 'paulpic.jpg'),
(11, 'jnettles', 'e511d793f532dbe0e0483538e11977f7b7c33b28', '2008-06-03 15:02:13', 'Johan', 'Nettles', 'M', '1981-11-03', 'Athens', 'GA', 'johanpic.jpg'),
(12, 'rubyr', '062e4a8476b1063e05caa69958e36a905f887619', '2008-06-03 15:02:24', 'Ruby', 'Reasons', 'F', '1972-09-18', 'Conundrum', 'AZ', 'rubypic.jpg'),
(13, 'theking', 'b4f283414a963c09f49cfde4a5eeba9752196247', '2008-06-05 14:19:20', 'Elmer', 'Priestley', 'M', '1979-01-08', 'Tupelo', 'MS', 'elmerpic.jpg'),
(14, 'owenb', '36be76e87571bf1566c6a388097c4e163df19ec9', '2008-06-26 08:25:48', 'Owen', 'Bugsby', 'M', '1982-06-22', 'Kokomo', 'IN', 'owenpic.jpg'),
(17, 'Neill', '170e6cef53efe8ff47a6ec6f8cbb61c5f226456c', '2017-01-05 05:13:09', 'Neil', 'Lemmer', 'M', '1982-11-12', 'Vereeniging', 'gu', 'download (1).jpg'),
(19, 'Neill2', '170e6cef53efe8ff47a6ec6f8cbb61c5f226456c', '2017-01-09 16:50:01', 'Neil', 'Lemmer', 'M', '1982-11-12', 'vereeniging', 'ga', NULL),
(20, 'Samantha', '170e6cef53efe8ff47a6ec6f8cbb61c5f226456c', '2017-02-02 08:49:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Karli', '170e6cef53efe8ff47a6ec6f8cbb61c5f226456c', '2017-02-03 14:00:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Neels098', '170e6cef53efe8ff47a6ec6f8cbb61c5f226456c', '2017-02-12 21:02:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Neil4', '170e6cef53efe8ff47a6ec6f8cbb61c5f226456c', '2017-02-14 12:23:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Neels3', '170e6cef53efe8ff47a6ec6f8cbb61c5f226456c', '2017-02-14 12:27:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Neels098', '170e6cef53efe8ff47a6ec6f8cbb61c5f226456c', '2017-02-14 12:30:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Neels0982', '170e6cef53efe8ff47a6ec6f8cbb61c5f226456c', '2017-02-14 12:43:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Neill5', '170e6cef53efe8ff47a6ec6f8cbb61c5f226456c', '2017-02-14 16:19:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Neil99', '170e6cef53efe8ff47a6ec6f8cbb61c5f226456c', '2017-02-14 17:09:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Neil099', '170e6cef53efe8ff47a6ec6f8cbb61c5f226456c', '2017-02-14 17:19:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Neill000', '170e6cef53efe8ff47a6ec6f8cbb61c5f226456c', '2017-02-14 17:25:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `riskyjobs`
--

CREATE TABLE `riskyjobs` (
  `job_id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` mediumtext,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` varchar(5) DEFAULT NULL,
  `company` varchar(30) DEFAULT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riskyjobs`
--

INSERT INTO `riskyjobs` (`job_id`, `title`, `description`, `city`, `state`, `zip`, `company`, `date_posted`) VALUES
(1, 'Custard Walker', 'We need people willing to test the theory that you can walk on custard.\r\n\r\nWe\'re going to fill a swimming pool with custard, and you\'ll walk on it. \r\n\r\nCustard and other kinds of starchy fluids are known as non-Newtonian fluids. They become solid under high pressure (your feet while you walk) while remaining in their liquid form otherwise.\r\n\r\nTowel provided, own bathing suit, a must.\r\n\r\nNote: if you stand on for too long on the custard\'s surface, you will slowly sink. We are not liable for any custard sinkages.', 'Albuquerque', 'NM', '87101', 'Pie Technologies', '2008-07-24 09:25:27'),
(2, 'Shark Trainer', 'Training sharks to do cute tricks for the audiences at our new water theme park.\r\n\r\nYou\'ll spend time alone in the water with our shiver of sharks. You\'ll train the sharks at night, dawn and dusk when there are no visitors to the theme park. You\'ll also play with the sharks by splashing and making erratic movements.', 'Orlando', 'FL', '32801', 'SharkBait, Inc.', '2008-04-28 09:25:27'),
(3, 'Voltage Checker', 'You\'ll be out in the field checking a.c. and d.c. voltages in the range of 3 to 250 or more volts. You\'ll be equipped with a hand-held light emitting diode to indicate all voltages. You\'ll also check the polarity of d.c. voltages.', 'Durham', 'NC', '27701', 'Shock Systems, LLC', '2008-06-28 09:25:27'),
(4, 'Antenna Installer', 'You\'ll be installing antennas and other metallic broadcast receiving equipment on the roofs of Miami\'s highest buildings. You\'ll be kitted out in our highest quality safety gear: polyester boiler suit and plastic sneakers.', 'Miami', 'FL', '33109', 'Heightened Attenuation, Inc.', '2008-09-04 09:25:27'),
(5, 'Elephant Proctologist', 'Needed: experienced proctologist willing to work with large animals. Elephants at our zoo (in San Francisco) have been noted as having abnormally reddened posteriors. We seek experienced and trained professionals willing to diagnose, treat, and follow up with our valuable elephants.\r\n\r\nBenefits include an annual pass to the zoo.', 'San Francisco', 'CA', '94102', 'Bay Area Pacaderm Project', '2008-07-29 09:25:27'),
(6, 'Airplane Engine Cleaner', 'Jet airplanes needing engines cleaned. In need of clean-minded individuals willing to handle rust and grime removal, as well as occasional disposal of high-flying bird carcasses. Must be alert and able to communicate effectively, as we sometimes have anxious pilots eager to take off.', 'Ft. Hood', 'TX', '76544', 'Turbinators', '2008-08-17 09:25:27'),
(7, 'Matador', 'Bustling dairy farm looking for part-time matador to entertain spirited bull with mild case of ADD. Semaphore experience highly desirable.', 'Rutland', 'VT', '05701', 'Mad About Milk Dairies', '2008-03-11 10:11:17'),
(8, 'Paparazzo', 'Top celebrity photography firm looking for seasoned paparazzo to stalk temperamental lip-syncing pop star with history of road rage. Benefits do not include health insurance. ', 'Beverly Hills', 'CA', '90210', 'Diva Pursuit, LLC', '2008-03-24 09:25:27'),
(9, 'Tightrope Walker', 'Fledgling big top looking for three-ring professional with 1-3 years of experience to perform tightrope acrobatics with pudgy elephant. Willingness to sweep excrement a big plus. Excellent benefits including medical and dental plans, 401 (k), stock ownership and discount purchase plan, prescription coverage, merchandise discount, short and long term disability insurance, life and business travel insurance, vision discount plan, auto and home insurance discounts, medical care and dependent care reimbursement, educational assistance, paid vacation and holidays, and adoption assistance. Flexible starting salaries based on skills and abilities, experience and geographic market. Promotion opportunities based on performance The only thing stopping you from the highest wire in the big tent is your desire and work ethic...and your balance! Other duties include planning & organizing wires, handling minor elephant administration, processing comment cards from children. Leading by example (don\'t fall!), showing initiative and a sense of urgency and being results-driven help acrobatic professionals become successful. If you want to be challenged and your talent needs mentoring and opportunity, Bingling Brothers can offer you a fast track to success!', 'Laredo', 'TX', '78040', 'Bingling Brothers Circus', '2008-11-14 09:43:59'),
(10, 'Crocodile Dentist', 'Do you love animals and hate plaque?  Well, then this might be the job for you!  Our crocodile farm is in need of a Dentist to shine up the smiles of our beloved pets for an upcoming photo shoot with Reptile Weekly magazine.  An ideal candidate will have dental expertise, a positive attitude, and health insurance.', 'Everglades City', 'FL', '34139', 'Ravenous Reptiles', '2008-07-14 09:25:27'),
(11, 'Mime', 'We need some fresh new faces. Full health insurance and shin pads provided. Must love kids.', 'New York', 'NY', '10001', 'Mime-R-Us', '2008-11-02 09:25:27'),
(12, 'Pet Food Tester', 'We pride ourselves on how good our pet food tastes. Now you can help make our products even better. We’re hiring pet food tasters, apply now!', 'St. Louis', 'MO', '63101', 'Pet Harvest', '2008-11-09 09:25:27'),
(13, 'Prize Fighter', 'Up and coming super fly gnat weight boxer needs an opponent to help build his winning record. Slow feet, sloppy hands, and a glass jaw are preferred. No experience required. This is not a full-time salaried position. We\'ll meet you in the alley behind the rink to share the purse. Let Ron King make you a championship fighter, or at least help you lost to one!', 'Branson', 'MO', '65615', 'Ron King Promotions', '2008-11-14 09:31:08'),
(14, 'Toreador', 'Lovely bovines waiting for your superior non-violent cape waving skills. Must pass basic bull fighting aptitude test.', 'Boise', 'ID', '83701', 'Get The Horns, LLC', '2008-11-14 19:49:31'),
(15, 'Electric Bull Repairer', 'Hank\'s Honky Tonk needs an experienced electric bull repairer. Free rides (after you fix it) and half off hot wings are some of the benefits.', 'Allamuchy', 'NJ', '07820', 'Hank\'s Honky Tonk', '2008-07-27 09:22:28'),
(16, 'Master Cat Juggler', 'Are you a practitioner of the lost art of cat juggling? Banned in forty contries, only the Jim Ruiz Circus has refined cat juggling for the sophisticated tastes of the modern audience. Ply your trade with premiere cat jugglers at our circus, the only place on earth to master synchronized cat juggling. It\'s true, juggling them is even harder than herding them. We are an equal opportunity employer, and look forward to adding you to our team. Please be prepared to undergo a thorough battery of tests to prove your deft handling of felines. Only the cream of the crop will be accepted into our Master Cat Juggler program.', 'Apache Junction', 'AZ', '85220', 'Jim Ruiz Circus', '2008-11-14 19:13:35'),
(17, 'Tightrope Tester', 'If the thought of dangling for hours on end from great heights is your idea of a good time, then this job just may be for you. Every one of our tightropes goes through a rigorous 43 point test, culminating in a real live human hanging for a prolonged period of time. That could be you! We do provide safety nets but you\'ll need to bring your own helmet and gloves. Here at our manufacturing facility in Big Top, Montana, we offer an incredible employment package with benefits ranging from Bring Your Pet to Work Week and Formal Fridays. We will need three references, including your verified maximum hang time and number of past falls. We\'re the circus behind the circus!', 'Big Top', 'MT', '59923', 'Taut Enterprises, Inc.', '2008-11-14 19:17:16'),
(18, 'Firefighter', 'The City of Dataville is hiring firefighters. No experience required - you will be trained. Non-smokers preferred. You must be physically fit and not afraid of heights (or heat). Although not required, familiarity with the working end of an axe is a plus.', 'Dataville', 'OH', '45448', 'City of Dataville', '2008-05-22 07:54:32'),
(19, 'Golf Ball Picker Upper', 'Want to combine your love of golf and stunt driving into one exciting career? We have an opening for a golf ball picker upper that just might be for you. Get behind the wheel of the Range Raker 2000, and drive our golf range picking up balls while dodging the best efforts of fellow golfers to hit you. It\'s all part of the service we offer, and your job will be to serve as a challenging target while picking up balls.', 'Arkadelphia', 'AL', '35033', 'Tee-Off Golf', '2008-08-12 02:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `riskyjobs_suerbase`
--

CREATE TABLE `riskyjobs_suerbase` (
  `riskuid` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email_address` varchar(40) DEFAULT NULL,
  `phone_no` int(10) DEFAULT NULL,
  `job_description` varchar(25) DEFAULT NULL,
  `resume` varchar(140) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riskyjobs_suerbase`
--

INSERT INTO `riskyjobs_suerbase` (`riskuid`, `first_name`, `last_name`, `email_address`, `phone_no`, `job_description`, `resume`) VALUES
(1, 'Neil', 'Lemmer', 'lemmer.neil@gmail.com', 833820899, 'Administrator Site', 'Hello my name is Neil'),
(2, 'Neil', 'Lemmer', 'lemmer.neil@gmail.com', 833820899, 'Administrator Site', 'Hello my name is neil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aliens_abduction`
--
ALTER TABLE `aliens_abduction`
  ADD PRIMARY KEY (`abduction_id`);

--
-- Indexes for table `guitarwars`
--
ALTER TABLE `guitarwars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `mismatch_category`
--
ALTER TABLE `mismatch_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `mismatch_response`
--
ALTER TABLE `mismatch_response`
  ADD PRIMARY KEY (`response_id`);

--
-- Indexes for table `mismatch_topic`
--
ALTER TABLE `mismatch_topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `mismatch_user`
--
ALTER TABLE `mismatch_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `riskyjobs`
--
ALTER TABLE `riskyjobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `riskyjobs_suerbase`
--
ALTER TABLE `riskyjobs_suerbase`
  ADD PRIMARY KEY (`riskuid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aliens_abduction`
--
ALTER TABLE `aliens_abduction`
  MODIFY `abduction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `guitarwars`
--
ALTER TABLE `guitarwars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mismatch_category`
--
ALTER TABLE `mismatch_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mismatch_response`
--
ALTER TABLE `mismatch_response`
  MODIFY `response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=451;
--
-- AUTO_INCREMENT for table `mismatch_topic`
--
ALTER TABLE `mismatch_topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `mismatch_user`
--
ALTER TABLE `mismatch_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `riskyjobs`
--
ALTER TABLE `riskyjobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `riskyjobs_suerbase`
--
ALTER TABLE `riskyjobs_suerbase`
  MODIFY `riskuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
