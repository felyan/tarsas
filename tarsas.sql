-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 20, 2017 at 04:20 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tarsas`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `user_id` int(11) NOT NULL,
  `post` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `user_id` int(11) NOT NULL,
  `games_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(20) NOT NULL,
  `free_place` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `game_type_id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `member_min` int(2) DEFAULT NULL,
  `member_max` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `game_type` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `fullname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `email`, `password`) VALUES
(1, 'nusi', 'Kiss Anna', 'anna@valami.hu', 'nusi78'),
(16, 'nusi', 'Kiss Anna', 'anna@gmail.com', 'b8181647ad92d86232b6c2a289117d860f833d63');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_games`
--

CREATE TABLE `user_has_games` (
  `user_id` int(11) NOT NULL,
  `games_id` int(11) NOT NULL,
  `sajat` tinyint(1) NOT NULL,
  `szivesen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_has_game_types`
--

CREATE TABLE `user_has_game_types` (
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
(16, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_type`
--
ALTER TABLE `game_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_has_games`
--
ALTER TABLE `user_has_games`
  ADD PRIMARY KEY (`user_id`,`games_id`),
  ADD KEY `fk_user_has_games_games1_idx` (`games_id`),
  ADD KEY `fk_user_has_games_user_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `game_type`
--
ALTER TABLE `game_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_has_games`
--
ALTER TABLE `user_has_games`
  ADD CONSTRAINT `fk_user_has_games_games1` FOREIGN KEY (`games_id`) REFERENCES `game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_games_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
