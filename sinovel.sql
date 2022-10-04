-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2022 at 05:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinovel`
--

-- --------------------------------------------------------

--
-- Table structure for table `novels`
--

CREATE TABLE `novels` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `novels`
--

INSERT INTO `novels` (`id`, `title`, `image`, `keterangan`, `created_date`) VALUES
(1, 'asdas', '6815121_download.png', 'dasdas', '2022-10-04 01:24:36'),
(2, 'asdasdasdasd', '1711601298_kisspng-logo-brand-line-book-top-view-5b246b0961df60.4461820515291133534009.jpg', 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd', '2022-10-04 01:24:48'),
(5, 'asdasd', '579294842_Untitled (20 × 40 cm) (40 × 20 cm).png', 'asdasd', '2022-10-04 01:33:35'),
(6, 'haha', '720376683_download.png', 'haha', '2022-10-04 01:35:14'),
(8, 'sdfdsfds', '1444036707_download (1).png', 'fffsdf', '2022-10-04 01:43:48'),
(10, 'asdasdas', '1780037217_download (1).png', 'dasdsssss', '2022-10-04 02:16:42'),
(11, '7', '855779797_kisspng-logo-brand-line-book-top-view-5b246b0961df60.4461820515291133534009.jpg', '7', '2022-10-04 02:51:13'),
(12, '8', '964624740_kisspng-logo-brand-line-book-top-view-5b246b0961df60.4461820515291133534009.jpg', '8', '2022-10-04 02:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_level` varchar(3) DEFAULT '1',
  `photo` varchar(255) NOT NULL DEFAULT 'default.svg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_level`, `photo`) VALUES
(11, 'Feisal', 'feisaldy26@gmail.com', '$2y$10$CE6KJkXwzQUXxRFiVWews.f/GarnzttAL/hzsNtabGe9QEbkmPodO', '1', 'default.svg'),
(12, 'Dharma', 'Dharma@gmail.com', '$2y$10$XDUDaCiF/Gj64echG4O7q.rLLsHuK0gzwooa1W6MDVix.hdVbsGAa', '2', 'default.svg'),
(13, 'Yuda', 'yuda@gmail.com', '$2y$10$9cndX5017le2b57EKYLI.e0TqRuljBLCxCCWVPWLvsuna/LpSFrp.', '2', 'default.svg'),
(14, 'Admin', 'admin@gmail.com', '$2y$10$LdpG1pfQDsWHZZRAoIVhHeR5b20tw7Q/bKCwvdpZn6c8clQyJHtW2', '10', 'default.svg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `novels`
--
ALTER TABLE `novels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `novels`
--
ALTER TABLE `novels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
