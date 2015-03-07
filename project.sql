-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2015 at 07:20 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`comment_id` int(4) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `catagory` varchar(255) NOT NULL,
  `project_id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
`project_id` int(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `catagory` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `mainfile` varchar(255) NOT NULL,
  `filelink` varchar(255) NOT NULL,
  `user_id` int(4) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `title`, `description`, `catagory`, `image`, `mainfile`, `filelink`, `user_id`, `date`) VALUES
(13, 'demo', 'demo demo demo demo demo demo demo demo demo demodemo demo demo demo demo', 'major', 'SG_2695_Screenshot (39).png', 'SuGa_9810_Screenshot (35).png', 'aaa', 4, '2015-03-02 06:37:36'),
(14, 'demo 2', 'demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2 demo 2', 'other', 'SG_3142_Screenshot (5).png', 'SuGa_9759_Screenshot (35).png', '', 4, '2015-03-02 06:51:25'),
(15, 'demo 3', 'demo 3 demo 3 demo 3 demo 3 demo 3 demo 3 demo 3 demo 3 demo 3 demo 3 demo 3 demo 3 demo 3 demo 3 demo 3 demo 3 demo 3 demo 3 demo 3 demo 3 demo 3 demo 3 demo 3', 'minor', 'SG_6330_Screenshot (30).png', 'SuGa_6422_Screenshot (35).png', 'facebook.com', 6, '2015-03-02 07:02:16'),
(16, 'The Student Information System in C', 'The Student Information System in C The Student Information System in C The Student Information System in C The Student Information System in C', 'c', 'SG_4089_Screenshot (25).png', 'SuGa_8011_Screenshot (36).png', '', 6, '2015-03-02 09:47:26'),
(17, 'addd', 'lakhdn kakhsd ahsd asdh', 'other', 'SG_9576_Screenshot (6).png', 'SuGa_3344_Screenshot (40).png', '.j', 4, '2015-03-06 06:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(4) NOT NULL,
  `firstname` varchar(225) NOT NULL,
  `lastname` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `email`, `username`, `password`, `date`) VALUES
(4, 'Sujan', 'Gainju', 'imsujan276@gmail.com', 'imsujan276', '7c317006772feabda0d5623317f7fea1', '2015-02-23 13:45:23'),
(5, 'zarin', 'ekith', 'zarin@gmail.com', 'zarin_ekith', 'cf0ab4cf8ac0e1f585f496ed1ebdb6e0', '2015-02-24 09:59:56'),
(6, 'suresh', 'gainju', 'dboysuresh@gmail.com', 'imsuresh23', 'c2da3a63074a4a0d207402ff831262a1', '2015-03-02 07:01:23'),
(9, 'su', 'su', 'abc@abc.com', 'sujan276', 'ac4e0e3b8a02976a3ee82ab7b7de7745', '2015-03-05 09:43:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`comment_id`), ADD UNIQUE KEY `project_id` (`project_id`), ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
 ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`,`email`,`username`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `email_2` (`email`,`username`), ADD UNIQUE KEY `email_3` (`email`,`username`), ADD UNIQUE KEY `email_4` (`email`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `comment_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
MODIFY `project_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`),
ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
