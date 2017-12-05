-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2017 at 05:32 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fmri_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `3d_brain`
--

CREATE TABLE `3d_brain` (
  `brain_id` int(11) NOT NULL,
  `function` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `addsuggestions`
--

CREATE TABLE `addsuggestions` (
  `user_id` int(11) NOT NULL,
  `brain_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `content` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `age` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contact` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brain_details`
--

CREATE TABLE `brain_details` (
  `brain_id` int(11) NOT NULL,
  `br_area_id` int(11) NOT NULL,
  `functionality` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `broadman_area`
--

CREATE TABLE `broadman_area` (
  `br_area_id` int(11) NOT NULL,
  `area_nme` varchar(45) DEFAULT NULL,
  `functionality` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comm_id` int(11) NOT NULL,
  `content` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `media` binary(1) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `discussion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `discussion_id` int(11) NOT NULL,
  `content` varchar(225) NOT NULL,
  `date` datetime DEFAULT NULL,
  `media` binary(1) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(10) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `bio` varchar(50) DEFAULT NULL,
  `websites` varchar(50) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `profile_image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `role`, `bio`, `websites`, `user_id`, `profile_image`) VALUES
(1, 'a student', 'I am Maneesha Rajaratne.', 'https://mash96techblog.wordpress.com/', 23, 'dv366024a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `content` varchar(225) DEFAULT NULL,
  `media` binary(1) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `comm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `research_article`
--

CREATE TABLE `research_article` (
  `article_id` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `title` varchar(45) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userdiscussion`
--

CREATE TABLE `userdiscussion` (
  `user_id` int(11) NOT NULL,
  `discussion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `cnfrm_doc` tinyblob NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `active` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `email`, `cnfrm_doc`, `username`, `password`, `active`) VALUES
(23, 'Maneesha', 'maneesharajaratne@gmail.com', 0x66696c65732f7765656b20315f323031372e706466, 'maneesha96', '827ccb0eea8a706c4c34a16891f84e7b', 0);

-- --------------------------------------------------------

--
-- Table structure for table `view_rsrch_article`
--

CREATE TABLE `view_rsrch_article` (
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `3d_brain`
--
ALTER TABLE `3d_brain`
  ADD PRIMARY KEY (`brain_id`);

--
-- Indexes for table `addsuggestions`
--
ALTER TABLE `addsuggestions`
  ADD PRIMARY KEY (`user_id`,`brain_id`),
  ADD KEY `fk_User_has_3d_brain_3d_brain1` (`brain_id`),
  ADD KEY `fk_User_has_3d_brain_User1` (`user_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brain_details`
--
ALTER TABLE `brain_details`
  ADD PRIMARY KEY (`brain_id`,`br_area_id`),
  ADD KEY `fk_3d_brain_has_broadman_area_broadman_area1` (`br_area_id`),
  ADD KEY `fk_3d_brain_has_broadman_area_3d_brain` (`brain_id`);

--
-- Indexes for table `broadman_area`
--
ALTER TABLE `broadman_area`
  ADD PRIMARY KEY (`br_area_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comm_id`),
  ADD KEY `fk_comment_Admin1` (`admin_id`),
  ADD KEY `fk_comment_discussion1` (`discussion_id`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`discussion_id`),
  ADD KEY `fk_discussion_Admin1` (`admin_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`,`comm_id`),
  ADD KEY `fk_reply_Admin1` (`admin_id`),
  ADD KEY `fk_reply_comment1` (`comm_id`);

--
-- Indexes for table `research_article`
--
ALTER TABLE `research_article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `fk_research_article_Admin1` (`admin_id`);

--
-- Indexes for table `userdiscussion`
--
ALTER TABLE `userdiscussion`
  ADD PRIMARY KEY (`user_id`,`discussion_id`),
  ADD KEY `fk_User_has_discussion_discussion1` (`discussion_id`),
  ADD KEY `fk_User_has_discussion_User1` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `view_rsrch_article`
--
ALTER TABLE `view_rsrch_article`
  ADD PRIMARY KEY (`user_id`,`article_id`),
  ADD KEY `fk_User_has_research_article_research_article1` (`article_id`),
  ADD KEY `fk_User_has_research_article_User1` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `addsuggestions`
--
ALTER TABLE `addsuggestions`
  ADD CONSTRAINT `fk_User_has_3d_brain_3d_brain1` FOREIGN KEY (`brain_id`) REFERENCES `3d_brain` (`brain_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_User_has_3d_brain_User1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `brain_details`
--
ALTER TABLE `brain_details`
  ADD CONSTRAINT `fk_3d_brain_has_broadman_area_3d_brain` FOREIGN KEY (`brain_id`) REFERENCES `3d_brain` (`brain_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_3d_brain_has_broadman_area_broadman_area1` FOREIGN KEY (`br_area_id`) REFERENCES `broadman_area` (`br_area_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_Admin1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_discussion1` FOREIGN KEY (`discussion_id`) REFERENCES `discussion` (`discussion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `discussion`
--
ALTER TABLE `discussion`
  ADD CONSTRAINT `fk_discussion_Admin1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `fk_reply_Admin1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reply_comment1` FOREIGN KEY (`comm_id`) REFERENCES `comment` (`comm_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `research_article`
--
ALTER TABLE `research_article`
  ADD CONSTRAINT `fk_research_article_Admin1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `userdiscussion`
--
ALTER TABLE `userdiscussion`
  ADD CONSTRAINT `fk_User_has_discussion_User1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_has_discussion_discussion1` FOREIGN KEY (`discussion_id`) REFERENCES `discussion` (`discussion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `view_rsrch_article`
--
ALTER TABLE `view_rsrch_article`
  ADD CONSTRAINT `fk_User_has_research_article_User1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_User_has_research_article_research_article1` FOREIGN KEY (`article_id`) REFERENCES `research_article` (`article_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
