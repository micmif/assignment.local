-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 20, 2019 at 06:27 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notes`
--

CREATE TABLE `tbl_notes` (
  `note_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `note` varchar(1500) NOT NULL,
  `tbl_users_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `post_content` varchar(200) NOT NULL,
  `time` int(11) NOT NULL,
  `tbl_users_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_submission`
--

CREATE TABLE `tbl_submission` (
  `sub_id` int(11) NOT NULL,
  `sub_title` varchar(50) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `sub_date` int(11) NOT NULL,
  `tbl_users_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(200) NOT NULL,
  `salt` varchar(100) DEFAULT NULL,
  `creation_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_auth`
--

CREATE TABLE `tbl_user_auth` (
  `auth_code` varchar(200) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `expiration` int(11) DEFAULT NULL,
  `tbl_users_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_details`
--

CREATE TABLE `tbl_user_details` (
  `name` varchar(250) NOT NULL,
  `surname` varchar(250) NOT NULL,
  `tbl_users_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  ADD PRIMARY KEY (`note_id`),
  ADD KEY `fk_tbl_notes_tbl_users1_idx` (`tbl_users_id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `fk_tbl_post_tbl_users1_idx` (`tbl_users_id`);

--
-- Indexes for table `tbl_submission`
--
ALTER TABLE `tbl_submission`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `fk_tbl_submission_tbl_users1_idx` (`tbl_users_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_auth`
--
ALTER TABLE `tbl_user_auth`
  ADD KEY `fk_tbl_user_auth_tbl_users_idx` (`tbl_users_id`);

--
-- Indexes for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  ADD KEY `fk_tbl_user_details_tbl_users1_idx` (`tbl_users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  MODIFY `note_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `post_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_submission`
--
ALTER TABLE `tbl_submission`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  ADD CONSTRAINT `fk_tbl_notes_tbl_users1` FOREIGN KEY (`tbl_users_id`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `fk_tbl_post_tbl_users1` FOREIGN KEY (`tbl_users_id`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_submission`
--
ALTER TABLE `tbl_submission`
  ADD CONSTRAINT `fk_tbl_submission_tbl_users1` FOREIGN KEY (`tbl_users_id`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_user_auth`
--
ALTER TABLE `tbl_user_auth`
  ADD CONSTRAINT `fk_tbl_user_auth_tbl_users` FOREIGN KEY (`tbl_users_id`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  ADD CONSTRAINT `fk_tbl_user_details_tbl_users1` FOREIGN KEY (`tbl_users_id`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
