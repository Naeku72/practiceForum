-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2018 at 04:03 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` tinyint(15) NOT NULL,
  `category_title` varchar(150) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `last_post_date` datetime NOT NULL,
  `last_user_posted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_title`, `category_description`, `last_post_date`, `last_user_posted`) VALUES
(10, 'Drug Reactions ', 'In this category we discuss issues related to drug reactions. Feel free to ask a question or contribute to the discussions in here', '2018-07-17 10:11:37', 0),
(11, 'Doctors and Breast Cancer Surgeons', 'In this category we help each other find the nearest available Breast Cancer Surgeons and Doctors', '2018-06-23 16:03:49', 1),
(12, 'Meet Ups ', 'In this category we plan our meet ups so that we can meet and help support each other.', '0000-00-00 00:00:00', 0),
(13, 'Find your nearest Breast Cancer Clinic', 'In this category we help each other find the nearest Breast Cancer clinics or help centres', '0000-00-00 00:00:00', 0),
(15, 'Diagnosis', 'In this category we discuss how breast cancer is diagnosed and also how to deal with the results waiting period ', '2018-07-13 18:11:59', 1),
(16, 'I have Breast Cancer, what next for me?', 'In this category, you can ask questions on how to deal with the fact that you have breast cancer and also be able to support others dealing with the same issue. You Are Not Alone.  ', '0000-00-00 00:00:00', 0),
(17, 'Other Questions', 'Feel free to ask and respond to other questions not dealt with in the previous categories. ', '0000-00-00 00:00:00', 0),
(37, 'Test Add Cat', 'Test Desc', '0000-00-00 00:00:00', 0),
(46, 'Test Cat Add 2', 'Test Desc 2', '0000-00-00 00:00:00', 0),
(55, 'Test Add Cat 4', 'Test Desc 4', '0000-00-00 00:00:00', 0),
(62, 'Test Add Cat 3', 'Test Desc 3', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `complaint` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meme`
--

CREATE TABLE `meme` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meme`
--

INSERT INTO `meme` (`id`, `username`, `password`, `email`, `phone`) VALUES
(1, 'admin', '12345', 'naekujoy@gmail.com', '0718592124');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(15) NOT NULL,
  `category_id` tinyint(10) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_creator` varchar(11) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `topic_id`, `post_creator`, `post_content`, `post_date`) VALUES
(15, 9, 6, '1', 'Test Content', '2018-06-16 14:11:29'),
(16, 9, 7, '1', 'Second test content to check if topic title is updating correctly', '2018-06-17 19:35:43'),
(17, 15, 8, '1', 'Test Content for this Topic', '2018-06-17 19:42:14'),
(18, 15, 9, '1', 'How are you?', '2018-06-19 20:19:42'),
(19, 15, 9, '1', 'Test Reply 2', '2018-06-22 09:00:41'),
(20, 15, 9, '1', 'Test Reply number 2', '2018-06-22 09:03:10'),
(21, 14, 10, '1', 'Ductal carcinoma in situ (DCIS) is non-invasive breast cancer. Ductal means that the cancer starts inside the milk ducts, carcinoma refers to any cancer that begins in the skin or other tissues (including breast tissue) that cover or line the internal organs, and in situ means \"in its original place.\" DCIS is called \"non-invasive\" because it hasnâ€™t spread beyond the milk duct into any normal surrounding breast tissue. DCIS isnâ€™t life-threatening, but having DCIS can increase the risk of developing an invasive breast cancer later on.\r\n\r\nWhen you have had DCIS, you are at higher risk for the cancer coming back or for developing a new breast cancer than a person who has never had breast cancer before. Most recurrences happen within the 5 to 10 years after initial diagnosis. The chances of a recurrence are under 30%.\r\n\r\nWomen who have breast-conserving surgery (lumpectomy) for DCIS without radiation therapy have about a 25% to 30% chance of having a recurrence at some point in the future. Including radiation therapy in the treatment plan after surgery drops the risk of recurrence to about 15%. Learn what additional steps you can take to lower your risk of a new breast cancer diagnosis or a recurrence in the Lower Your Risk section. If breast cancer does come back after earlier DCIS treatment, the recurrence is non-invasive (DCIS again) about half the time and invasive about half the time. (DCIS itself is NOT invasive.)\r\n\r\nAccording to the American Cancer Society, about 60,000 cases of DCIS are diagnosed in the United States each year, accounting for about 1 out of every 5 new breast cancer cases.\r\n\r\nThere are two main reasons this number is so large and has been increasing over time:\r\n\r\n- People are living much longer lives. As we grow older, our risk of breast cancer increases.\r\n\r\n- More people are getting mammograms, and the quality of the mammograms has improved. With better screening, more cancers are being spotted early.', '2018-06-22 20:08:44'),
(22, 15, 8, '1', 'heyo!', '2018-06-23 16:01:15'),
(23, 11, 10, '1', 'Content Number 5', '2018-06-23 16:03:29'),
(24, 11, 10, '1', 'v gubhiuj0phb', '2018-06-23 16:03:49'),
(25, 0, 0, '1', 'aaaaa', '2018-07-13 13:38:50'),
(26, 0, 0, '1', 'aaa', '2018-07-13 13:39:51'),
(28, 0, 0, '1', 'wqeqwe', '2018-07-13 13:54:53'),
(29, 0, 0, '1', 'mi ndo printer !!!', '2018-07-13 13:56:41'),
(33, 0, 0, '1', 'mi ndo printer !!!', '2018-07-13 13:57:39'),
(34, 0, 0, '1', 'a', '2018-07-13 13:58:21'),
(39, 0, 0, '1', 'Ayo!! ', '2018-07-14 12:17:28'),
(40, 0, 0, '1', 'Hello There, Im just trying out a new feature i added. ', '2018-07-14 12:19:18'),
(41, 0, 0, '1', 'Another one', '2018-07-14 12:45:49'),
(42, 0, 0, '2', 'Wassup!! How are you doing?\n', '2018-07-17 10:10:10'),
(43, 0, 0, '2', 'Heyo!', '2018-07-17 10:10:42'),
(44, 10, 12, 'joy1', 'Checking the working of some functionality', '2018-07-17 10:11:37'),
(45, 0, 0, '2', 'Now to see if the replies are appearing on the topics page', '2018-07-17 10:12:21'),
(46, 0, 0, '2', 'Ayo', '2018-07-17 10:19:21'),
(47, 0, 0, '2', 'Ayo', '2018-07-17 10:19:22'),
(48, 0, 0, 'joy1', 'Test 2', '2018-07-17 11:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(15) NOT NULL,
  `category_id` tinyint(10) NOT NULL,
  `topic_title` varchar(150) NOT NULL,
  `topic_creator` varchar(100) NOT NULL,
  `topic_last_user` varchar(100) DEFAULT NULL,
  `topic_date` datetime NOT NULL,
  `topic_reply_date` datetime NOT NULL,
  `topic_views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `category_id`, `topic_title`, `topic_creator`, `topic_last_user`, `topic_date`, `topic_reply_date`, `topic_views`) VALUES
(6, 9, '0', '1', NULL, '2018-06-16 14:11:29', '2018-06-16 14:11:29', 3),
(7, 9, 'Test Topic 2', '1', NULL, '2018-06-17 19:35:43', '2018-06-17 19:35:43', 3),
(8, 15, 'First Test Topic For This Category', '1', '1', '2018-06-17 19:42:14', '2018-06-23 16:01:15', 45),
(9, 15, 'Wassup!! ', '1', '1', '2018-06-19 20:19:42', '2018-06-22 09:03:10', 36),
(10, 11, 'Test Topic 1', '1', '1', '2018-06-23 16:03:29', '2018-06-23 16:03:49', 7),
(12, 10, 'New Test Topic', 'joy1', NULL, '2018-07-17 10:11:37', '2018-07-17 10:11:37', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `forum_notification` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `password`, `email`, `phone`, `forum_notification`) VALUES
(1, 'Admin', 'Admin', 'admin', '123', 'naekujoy@gmail.com', '0718592124', '1'),
(2, 'Joy', 'Naeku', 'joy1', '1234', 'naekujoy@gmail.com', '0718592124', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `meme`
--
ALTER TABLE `meme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` tinyint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
