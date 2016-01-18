-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2015 at 07:01 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `DubDate`
--

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE IF NOT EXISTS `interests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `interest` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `user_id`, `interest`) VALUES
(1, 4, 'We like to go berry picking!'),
(2, 6, 'We like to cook together'),
(3, 7, 'We like bowling'),
(4, 8, 'We like to visit the zoo'),
(5, 5, 'We LOVEEE horseback riding');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE IF NOT EXISTS `matches` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user1_id` int(10) NOT NULL,
  `user2_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `user1_id`, `user2_id`) VALUES
(2, 4, 1),
(3, 1, 6),
(4, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `match_id` int(10) NOT NULL,
  `sender_id` int(10) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `match_id` (`match_id`),
  KEY `match_id_2` (`match_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `match_id`, `sender_id`, `message`) VALUES
(1, 2, 1, 'asdf'),
(2, 2, 1, 'asdf'),
(3, 2, 1, 'sadf'),
(4, 2, 4, 'asdf'),
(5, 2, 1, 'jkl'),
(6, 2, 1, 'asdfjkl;'),
(7, 2, 4, 'asdflkl'),
(8, 3, 1, 'asdf'),
(9, 3, 1, 'asdf'),
(10, 0, 4, 'hiii');

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE IF NOT EXISTS `proposals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `proposee_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `user_id`, `proposee_id`) VALUES
(2, 1, 5),
(8, 4, 9),
(9, 1, 8),
(10, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `viewNum` int(10) unsigned NOT NULL,
  `name1` varchar(255) NOT NULL,
  `name2` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `hash`, `viewNum`, `name1`, `name2`) VALUES
(1, 'Jack_and_Jill', '$2y$10$X5cVyYNK3/sKBWv5YNoIperj1DkMt6fHdmlie2474TADEY1PCGeAa', 10, 'Jack', 'Jill'),
(2, 'John_and_Kate', '$2y$10$dj/Z9dYIOFdUK1JZzEMOJ.Rbx.9zQyLkhdQ7Ct0CEIH.bUq14MmHS', 1, 'John', 'Kate'),
(3, 'johnette', '$2y$10$4kjAwmd85LRHbQxlQyAqjOFJxs1hE2rI78ip735LXh2YJUrcHivvi', 5, 'John', 'Janette'),
(4, 'Still', '$2y$10$87IG00djr///VKjE.TiTR.GzaGki25x3xqaV146sEPHRkp08eUcIu', 10, 'Stephanie', 'Will'),
(5, 'K_squared', '$2y$10$r9gcCPKpsWaVFNUR25t2x.0v0syJ9dlOjCWIwOhWcnSKeL9sT7duG', 1, 'Katie', 'Kyle'),
(6, 'Mattalie', '$2y$10$vrOItESpBs4RoJIwzYnyNOlchBpdVXGAEOjJNIdwvO1kcONXZ9oo.', 1, 'Matt', 'Natalie'),
(7, 'Scolly', '$2y$10$ejR2.HFsYBJzIQ034MV53.COknDfljeTEm4B/RmfJ5Q8Y6qxC1b4m', 1, 'Scott', 'Molly'),
(8, 'Jeresa', '$2y$10$LD00pKNG.ZJiKdp.wCTA9O8SzOVx9/HmRw2caiElbl0W1kc5Nz9lC', 1, 'John', 'Teresa'),
(9, 'yo and yo', '$2y$10$v2TQBviJSOhmAyJ8nntVtOFxpUNwk.PxMOOxiOQG5fw72YLP1VCiu', 5, 'yo', 'yo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
