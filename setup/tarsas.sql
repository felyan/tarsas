-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2017 at 10:05 AM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tarsas`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user_id`, `post`, `date`) VALUES
(3, 16, 'Szia, Hogy vagy?', '2017-03-01 10:09:04'),
(4, 17, 'Á, ne is kérdezd! :P :( :D', '2017-03-01 10:09:04'),
(5, 16, 'Minden oké', '2017-03-01 10:32:45'),
(6, 16, 'fdsafdas', '2017-03-01 10:33:55'),
(7, 16, 'Hali', '2017-03-01 19:35:19'),
(8, 16, 'skjdfh', '2017-03-15 07:49:35'),
(9, 16, 'ksd', '2017-03-16 10:32:44'),
(10, 16, 'Szia Benó!', '2017-03-16 11:21:04'),
(11, 16, 'Hali!', '2017-03-18 09:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `location` varchar(20) NOT NULL,
  `description` mediumtext NOT NULL,
  `free_place` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `user_id`, `game_id`, `date_start`, `date_end`, `location`, `description`, `free_place`) VALUES
(1, 16, 1, '2017-05-17 09:00:00', '2017-03-17 10:00:00', '8200 Veszprém, Gábor', 'fdafdas fd', 2),
(2, 17, 5, '2017-04-18 10:00:00', '2017-03-18 10:00:00', '8183 Papkeszi, Bajcs', '', 2),
(3, 16, 9, '2017-04-30 14:00:00', '2017-03-30 19:00:00', '8200 Veszprém, Gábor', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `event_has_user`
--

CREATE TABLE IF NOT EXISTS `event_has_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `event_has_user`
--

INSERT INTO `event_has_user` (`id`, `user_id`, `event_id`) VALUES
(1, 16, 1),
(2, 16, 2),
(4, 17, 1),
(7, 17, 2);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_type_id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `member_min` int(2) DEFAULT NULL,
  `member_max` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `game_type_id`, `name`, `member_min`, `member_max`) VALUES
(1, 1, 'Catan', 2, 5),
(2, 1, 'Carcasson', 2, 5),
(3, 2, 'Uno', 2, 10),
(4, 2, 'Canasta', 2, 4),
(5, 2, 'Römi', 2, 6),
(6, 1, 'Gazdálkodj okosan', 2, 6),
(7, 1, 'Dixit', 2, 6),
(8, 1, 'Élve fogd el', 2, 4),
(9, 1, 'Ki az úr a tengeren', 2, 6),
(10, 4, 'Activity', 4, 20);

-- --------------------------------------------------------

--
-- Table structure for table `game_type`
--

CREATE TABLE IF NOT EXISTS `game_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `game_type`
--

INSERT INTO `game_type` (`id`, `name`) VALUES
(1, 'Tábla'),
(2, 'Kártya'),
(3, 'Szerep'),
(4, 'Házibuli'),
(5, 'Szabadtéri');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `fullname` varchar(45) DEFAULT NULL,
  `cim` text NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `cim`, `email`, `password`) VALUES
(1, 'nusi_a', 'Kiss Anna', '', 'anna@valami.hu', 'nusi78'),
(16, 'nusi', 'Kiss Anna', '8200 Veszprém, Gábor Áron utca 1/B', 'anna@gmail.com', '690939867dbcf9c09e445096233a2937bfdaa58b'),
(17, 'mate', 'Máté', '8183 Papkeszi, Bajcsy Zsilinszky utca 13.', 'mate@gmail.com', '690939867dbcf9c09e445096233a2937bfdaa58b'),
(19, 'arpad', 'Németh Árpád', '8200 Veszprém, Valami u 7.', 'arpad@gmail.com', '690939867dbcf9c09e445096233a2937bfdaa58b'),
(21, 'mate', 'Máté', '', 'mate@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(22, '', '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(23, 'mate', 'Máté', '', 'mate@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(24, 'mate', 'Máté', '', 'mate@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(25, 'mate', 'Máté', '', 'mate@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(26, 'mate', 'Máté', '', 'mate@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(27, 'mate', 'Máté', '', 'mate@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(28, 'mate', 'Máté', '', 'mate@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(29, 'mate', 'Máté', '', 'mate@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(30, 'mate', 'Máté', '', 'mate@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(31, 'mate', 'Máté', '', 'mate@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(32, 'mate', 'Máté', '', 'mate@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_game`
--

CREATE TABLE IF NOT EXISTS `user_has_game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `sajat` tinyint(1) NOT NULL,
  `szivesen` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_has_games_games1_idx` (`game_id`),
  KEY `fk_user_has_games_user_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `user_has_game`
--

INSERT INTO `user_has_game` (`id`, `user_id`, `game_id`, `sajat`, `szivesen`) VALUES
(1, 16, 1, 1, 1),
(2, 16, 9, 0, 1),
(10, 17, 2, 1, 0),
(11, 17, 9, 1, 0),
(12, 17, 1, 0, 1),
(13, 17, 2, 0, 1),
(14, 17, 2, 1, 0),
(15, 17, 9, 1, 0),
(16, 17, 1, 0, 1),
(17, 17, 2, 0, 1),
(18, 17, 2, 1, 0),
(19, 17, 9, 1, 0),
(20, 17, 1, 0, 1),
(21, 17, 2, 0, 1),
(22, 17, 2, 1, 0),
(23, 17, 9, 1, 0),
(24, 17, 1, 0, 1),
(25, 17, 2, 0, 1),
(26, 17, 2, 1, 0),
(27, 17, 9, 1, 0),
(28, 17, 1, 0, 1),
(29, 17, 2, 0, 1),
(30, 17, 2, 1, 0),
(31, 17, 9, 1, 0),
(32, 17, 1, 0, 1),
(33, 17, 2, 0, 1),
(34, 17, 2, 1, 0),
(35, 17, 9, 1, 0),
(36, 17, 1, 0, 1),
(37, 17, 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_game_types`
--

CREATE TABLE IF NOT EXISTS `user_has_game_types` (
  `user_id` int(11) NOT NULL,
  `game_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_has_game_types`
--

INSERT INTO `user_has_game_types` (`user_id`, `game_type_id`) VALUES
(16, 1),
(16, 2),
(16, 3),
(16, 4),
(18, 1),
(18, 4),
(20, 1),
(20, 3),
(17, 1),
(17, 2),
(17, 1),
(17, 2),
(17, 1),
(17, 2),
(17, 1),
(17, 2),
(17, 1),
(17, 2),
(17, 1),
(17, 2),
(17, 1),
(17, 2),
(17, 1),
(17, 2),
(17, 1),
(17, 2),
(17, 1),
(17, 2),
(17, 1),
(17, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_has_game`
--
ALTER TABLE `user_has_game`
  ADD CONSTRAINT `fk_user_has_games_games1` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_games_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
