-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2018 at 01:20 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edonation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `verification_code` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `verification_code`, `user_id`) VALUES
(3, 'Not Set', 9);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_list` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_list`) VALUES
(7, 'Stationery'),
(9, 'Books'),
(10, 'Food'),
(13, 'Bottle');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `donor_id` int(11) NOT NULL,
  `donor_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `zone` varchar(50) NOT NULL,
  `item_description` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donor_id`, `donor_name`, `email`, `contact_number`, `street`, `district`, `zone`, `item_description`, `status`, `user_id`) VALUES
(11, 'Sweta Prajapati', 'swetaprajapati806@gmail.com', '9860726807', 'Jyatha', 'Kathmandu', 'Bagmati', 'Not Set', 0, 88);

-- --------------------------------------------------------

--
-- Table structure for table `donorcategories`
--

CREATE TABLE `donorcategories` (
  `id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donororganization`
--

CREATE TABLE `donororganization` (
  `id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `organization_id` int(11) NOT NULL,
  `organization_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `zone` varchar(50) NOT NULL,
  `contact_number` bigint(20) NOT NULL,
  `website` varchar(25) NOT NULL,
  `pan_number` varchar(50) NOT NULL,
  `item_description` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `verification_code` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`organization_id`, `organization_name`, `email`, `street`, `district`, `zone`, `contact_number`, `website`, `pan_number`, `item_description`, `status`, `verification_code`, `user_id`) VALUES
(33, 'Care And Development', 'developmentcare27@gmail.com', 'Taukhel', 'Kathmandu', 'Bagmati', 147856557, 'www.caredevelopment.org', '7894568', 'pencils, copies and food', 1, 'Not Set', 20),
(34, 'Being Human', 'being@gmail.com', 'Thamel', 'Kathmandu', 'Bagmati', 14785689, 'www.facebook.com', '123445', 'Not Set', 1, 'Not Set', 21),
(35, 'Child Care Organization', 'childcare@gmail.com', 'Kupondole', 'Lalitpur', 'Bagmati', 1456898, 'www.childcare.org', '789456', 'Not Set', 1, 'Not Set', 22),
(39, 'Being Human', 'sss@gmail.com', 'Jyatha', 'Kathmandu', 'Bagmati', 98458, 'facebook.com', 'ssss', 'Not Set', 0, 'Not Set', 43),
(40, 'Being Human', 'sss@gmail.com', 'Jyatha', 'Kathmandu', 'Bagmati', 98458, 'facebook.com', 'ssss', 'Not Set', 0, 'Not Set', 44);

-- --------------------------------------------------------

--
-- Table structure for table `organizationcategories`
--

CREATE TABLE `organizationcategories` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizationcategories`
--

INSERT INTO `organizationcategories` (`id`, `organization_id`, `categories_id`) VALUES
(14, 33, 7),
(15, 33, 9),
(16, 33, 10);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Donor'),
(3, 'Receiver');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `role_id`) VALUES
(9, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(20, 'careDev', '2dcafd35aae3ed520762b03dfb0aec74', 3),
(21, 'being', 'being', 3),
(22, 'childcare', 'childcare', 3),
(28, '4444', '444', 3),
(29, 'www', 'www', 3),
(30, 'dddd', 'ddd', 3),
(31, 'sss', 'ssss', 3),
(32, 'tt', 'tt', 3),
(88, 'swetap', '0832fdea55d269147ae2e03037bae9c3', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `donorcategories`
--
ALTER TABLE `donorcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donororganization`
--
ALTER TABLE `donororganization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`organization_id`);

--
-- Indexes for table `organizationcategories`
--
ALTER TABLE `organizationcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `donorcategories`
--
ALTER TABLE `donorcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donororganization`
--
ALTER TABLE `donororganization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `organization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `organizationcategories`
--
ALTER TABLE `organizationcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
