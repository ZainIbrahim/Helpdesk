-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2018 at 03:50 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk1.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `ptj` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `title`, `phone_number`, `ptj`) VALUES
(3, 'zain', 'zain@gmail.com', 'hello', 0, '000043'),
(12, 'Khalid', 'khalid@gmail.com', 'Mr', 178497849, ''),
(13, 'Zuraya', 'zaraya@gmail.com', 'ms', 109884535, '');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `faq_title` varchar(30) NOT NULL,
  `faq_body` varchar(300) NOT NULL,
  `name_of_person_in_charge` varchar(30) NOT NULL,
  `phone_number` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `faq_title`, `faq_body`, `name_of_person_in_charge`, `phone_number`) VALUES
(1, 'dsfsdf', 'sdfs', 'fsfs', 4214),
(2, 'fs', '', '', 0),
(3, '', '', '', 0),
(4, '', '', '', 0),
(5, '', '', '', 0),
(6, 'feff', 'ef', '', 0),
(7, 'dddd', 'ddd', 'dd', 11),
(8, 'yyyy', 'yyy', 'yyy', 543),
(9, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `reply_body` varchar(10000) NOT NULL,
  `date_and_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `reply_id`, `reply_body`, `date_and_time`) VALUES
(1, 26, 'OK. here is the reply', '2018-07-06 01:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(100) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(423) NOT NULL,
  `title` varchar(20) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `issue_title` varchar(20) NOT NULL,
  `issue_desc` varchar(10000) NOT NULL,
  `date_and_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL DEFAULT 'unresolved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `name`, `email`, `title`, `phone_number`, `issue_title`, `issue_desc`, `date_and_time`, `status`) VALUES
(12, 'zain', 'zain@gmail.com', 'Mr', 176847237, 'Windows 10 updating ', 'Ut porttitor dui eu massa sagittis malesuada. Duis ultrices elementum nulla. Maecenas ut metus libero. Donec pharetra ornare porttitor. Morbi eget ornare augue, non scelerisque tellus. Sed leo metus, ', '2018-06-22 02:59:25', 'unresolved'),
(23, 'Khalid', 'khalid@gmail.com', 'Mr', 178497849, 'Troubleshoot windows', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor est mauris, non pellentesque arcu hendrerit accumsan. Curabitur ultrices est purus, eu vestibulum velit vulputate vel. Sed id fermen', '2018-06-22 08:35:07', 'unresolved'),
(26, 'Zuraya', 'zaraya@gmail.com', 'ms', 109884535, 'Internship', 'For It students', '2018-07-06 01:53:30', 'resolved');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `phone_number` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `password`, `phone_number`) VALUES
(1, 'fsfsff', 'sfsf', 'sfsf', 'ffdsd', 43242),
(31, 'zuraya', 'wati', 'zurayawati@gmail.com', '93049094', 17);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'zain', 'zain', 'zain1234'),
(2, 'Ahmed', 'ahmed', '1234'),
(6, 'ali', 'ali', 'ali');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reply_id` (`reply_id`),
  ADD KEY `reply_id_2` (`reply_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`(255));

--
-- Indexes for table `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`reply_id`) REFERENCES `ticket` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
