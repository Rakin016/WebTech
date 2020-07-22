-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2020 at 07:43 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `user_password`, `email`, `user_type`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `id` int(128) NOT NULL,
  `user_id` int(128) NOT NULL,
  `username` varchar(32) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `user_type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id`, `user_id`, `username`, `user_password`, `user_type`) VALUES
(2, 3, 'airtel1', '$2y$10$6TrJbtr/ht1TzYseh3XdrOhw6B3gq4MIjTc7Dfxm/nZ7tYUwiB/qi', 'employer'),
(3, 4, 'robi1', '$2y$10$P3s7N.U/2D1qD88VyXpydusSRxb38lbEeIgtWQSd0yesMOoYUQsdW', 'employer'),
(4, 5, 'demo1', '$2y$10$AZBOMPu86NihY0Hz0cyp1uSxpzMMULZyRVWh9IcE6gULFPp7nfVha', 'employer'),
(5, 6, 'vector1', '$2y$10$tvUMl9pmxl7vMjbvM8qlrudyMp6qW.MFAXpF21EXJ/fWeImSmnIBW', 'employer'),
(6, 7, 'baywatch1', '$2y$10$/CeljxGxHUrvVTM9wMOAbOUu.x6fzJ3XVOOT33CMyP3HR50XXiE.e', 'employer'),
(7, 8, 'thunder1', '$2y$10$ZKrqp3Lo5Tu4.pXTTv5hmOZ65AVomwfx9/pANn5IqdLtjAlL4J/tC', 'employer'),
(8, 9, 'toyota1', '$2y$10$dz9TpgcX1sGe39mzN80wb.ZpfduTN7Qijrv/4qNWs7w8Zv0d7rCOm', 'employer'),
(9, 10, 'pepsico1', '$2y$10$RyuIANBayvvpHSfsw8ASHuf2H.aoLmrXYZXPwzHsIYGS5Fvsys2sC', 'employer');

-- --------------------------------------------------------

--
-- Table structure for table `employer_details`
--

CREATE TABLE `employer_details` (
  `user_id` int(128) NOT NULL,
  `c_name` varchar(32) NOT NULL,
  `address` varchar(128) NOT NULL,
  `email` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `user_type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer_details`
--

INSERT INTO `employer_details` (`user_id`, `c_name`, `address`, `email`, `username`, `user_password`, `phone`, `user_type`) VALUES
(3, 'Airtel', 'Banani, Dhaka, Bangladesh', 'airtel@gmail.com', 'airtel1', '$2y$10$6TrJbtr/ht1TzYseh3XdrOhw6B3gq4MIjTc7Dfxm/nZ7tYUwiB/qi', '01687878977', 'employer'),
(4, 'Robi', 'Gulshan, Dhaka, Bangladesh', 'robi@gmail.com', 'robi1', '$2y$10$P3s7N.U/2D1qD88VyXpydusSRxb38lbEeIgtWQSd0yesMOoYUQsdW', '01854458596', 'employer'),
(5, 'Demo University', 'Adabor, Dhaka, Bangladesh', 'demou@gmail.com', 'demo1', '$2y$10$AZBOMPu86NihY0Hz0cyp1uSxpzMMULZyRVWh9IcE6gULFPp7nfVha', '92844544', 'employer'),
(6, 'Vector Architecture', 'Badda, Dhaka, Bangladesh', 'vector@gmail.com', 'vector1', '$2y$10$tvUMl9pmxl7vMjbvM8qlrudyMp6qW.MFAXpF21EXJ/fWeImSmnIBW', '9288754', 'employer'),
(7, 'Baywatch Hotel & Tourism', 'Chittagong, Bangladesh', 'baywatch@gmail.com', 'baywatch1', '$2y$10$/CeljxGxHUrvVTM9wMOAbOUu.x6fzJ3XVOOT33CMyP3HR50XXiE.e', '456549', 'employer'),
(8, 'Thunder Light', 'Khulna Bangladesh', 'thunder@gmail.com', 'thunder1', '$2y$10$ZKrqp3Lo5Tu4.pXTTv5hmOZ65AVomwfx9/pANn5IqdLtjAlL4J/tC', '6549644', 'employer'),
(9, 'Toyota Automobiles', 'Rajshahi, Bangladesh', 'toyota@gmail.com', 'toyota1', '$2y$10$dz9TpgcX1sGe39mzN80wb.ZpfduTN7Qijrv/4qNWs7w8Zv0d7rCOm', '6544654', 'employer'),
(10, 'Pepsico Bangladesh', 'Gazipur, Bangladesh', 'pepsico@gmail.com', 'pepsico1', '$2y$10$RyuIANBayvvpHSfsw8ASHuf2H.aoLmrXYZXPwzHsIYGS5Fvsys2sC', '9854455', 'employer');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `post` varchar(200) NOT NULL,
  `comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(128) NOT NULL,
  `user_id` int(128) NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `catagory` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `location` varchar(50) NOT NULL,
  `deadline` date NOT NULL,
  `vacancy` int(5) NOT NULL,
  `salary` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `user_id`, `title`, `type`, `catagory`, `description`, `location`, `deadline`, `vacancy`, `salary`) VALUES
(1, 3, 'Junior Software Engineer', 'part time', 'Software', 'We need a part-time software development engineers to work on our various ongoing projects. We require moderate programming skill with high knowledge about updated technology.', 'Banani, Dhaka', '2020-05-20', 10, '15000 BDT'),
(2, 4, 'Customer Care Executive', 'full time', 'Others', 'Dedicated and friendly people are required who will be able to deal with various service related problems coming from various customers.', 'Dhaka', '2020-06-10', 5, '30000 BDT'),
(3, 5, 'CS Lecturer', 'full time', 'Education', 'We need experience lecturers for our Computer Science Department.', 'Dhaka, Bangladesh', '2020-07-01', 2, '25000 BDT'),
(4, 6, 'Junior Architect', 'part time', 'Architect', 'We need highly motivated new architecture graduates. ', 'Dhaka, Bangladesh', '2020-06-15', 5, '15000 BDT'),
(5, 7, 'Customer Relationship Manger', 'full time', 'Hospitality', 'We need experienced and friendly people who can communicate with customers from home and abroad.', 'Chittagong, Bangladesh', '2020-07-01', 5, '40000 BDT'),
(6, 8, 'Junior Engineer', 'part time', 'Engineer', 'We need fresh EEE graduates for working on our various projects.', 'Khulna, Bangladesh', '2020-07-01', 5, '20000 BDT'),
(8, 0, '', 'full time', 'Others', 'We need few experienced security guards.', 'Dhaka, Bangladesh', '2020-06-01', 10, '15000 BDT');

-- --------------------------------------------------------

--
-- Table structure for table `job_seeker`
--

CREATE TABLE `job_seeker` (
  `id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_seeker`
--

INSERT INTO `job_seeker` (`id`, `user_id`, `username`, `user_password`, `user_type`) VALUES
(1, 4, 'rakin1', '$2y$10$go3yABHicFjQPMwNFLgk2uYSkGVIaz47I16Ut7clYS.UNRQmbF/PS', 'job_seeker'),
(2, 5, 'mead1', '$2y$10$B1XLT9XapXjhvsuiEaonuuehXB8qlL6GBePJ6E6m1TJ5tOkicJpoG', 'job_seeker'),
(3, 6, 'sakib1', '$2y$10$qKSpj7SxOa50y.tPo2O7SuenL1xSpCcpb4htO5ci2JrEtapVlc2Me', 'job_seeker'),
(4, 7, 'mahmud1', '$2y$10$dzW5UcS4A7L40K5P6l/AoOUCpKroBdD2dk8C9rRARcbbTNSNiRGMS', 'job_seeker');

-- --------------------------------------------------------

--
-- Table structure for table `js_details`
--

CREATE TABLE `js_details` (
  `user_id` int(200) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `b_group` varchar(5) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `js_details`
--

INSERT INTO `js_details` (`user_id`, `f_name`, `gender`, `dob`, `b_group`, `address`, `email`, `phone`, `username`, `user_password`, `user_type`) VALUES
(4, 'Md. Rakinur Rahman', 'male', '1996-12-01', 'B+', 'Dhaka Cant. Dhaka, Bangladesh', 'rakin016@gmail.com', '01687878977', 'rakin1', '$2y$10$go3yABHicFjQPMwNFLgk2uYSkGVIaz47I16Ut7clYS.UNRQmbF/PS', 'job_seeker'),
(5, 'Mead Ahmed Fahim', 'male', '2000-01-01', 'B+', 'Gazipur, Dhaka, bangladesh', 'mead@gmail.com', '01521493736', 'mead1', '$2y$10$B1XLT9XapXjhvsuiEaonuuehXB8qlL6GBePJ6E6m1TJ5tOkicJpoG', 'job_seeker'),
(6, 'MD. Sakib', 'male', '1998-04-01', 'B+', 'Bashundhara R/A, Dhaka, Bangladesh', 'sakib@gmail.com', '01715468547', 'sakib1', '$2y$10$qKSpj7SxOa50y.tPo2O7SuenL1xSpCcpb4htO5ci2JrEtapVlc2Me', 'job_seeker'),
(7, 'Abdullah Al Mahmud', 'male', '1997-02-28', 'A+', 'Bonosri, Dhaka, Bangladesh', 'mahmud@gmail.com', '01854458596', 'mahmud1', '$2y$10$dzW5UcS4A7L40K5P6l/AoOUCpKroBdD2dk8C9rRARcbbTNSNiRGMS', 'job_seeker');

-- --------------------------------------------------------

--
-- Table structure for table `js_qualifications`
--

CREATE TABLE `js_qualifications` (
  `id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `degrees` varchar(50) NOT NULL,
  `specialization` varchar(30) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `skill` varchar(200) NOT NULL,
  `oDegree` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `js_qualifications`
--

INSERT INTO `js_qualifications` (`id`, `user_id`, `degrees`, `specialization`, `experience`, `skill`, `oDegree`) VALUES
(1, 4, 'SSC,HSC,Honours', 'Engineer', '2 years', 'Public Speaking, Microsoft Office', ''),
(2, 5, 'SSC,HSC,Honours,Masters', 'Education', '5years', 'Managing both academic and administrative works', 'PhD(ongoing)'),
(3, 6, 'SSC,HSC,Honours', 'Architect', '3Years', 'AutoCAD(Advanced)', '');

-- --------------------------------------------------------

--
-- Table structure for table `validation`
--

CREATE TABLE `validation` (
  `id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `username` varchar(30) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `validation` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `validation`
--

INSERT INTO `validation` (`id`, `user_id`, `username`, `c_name`, `email`, `validation`) VALUES
(2, 3, 'airtel1', 'Airtel', 'airtel@gmail.com', 1),
(5, 4, 'robi1', 'Robi', 'robi@gmail.com', 1),
(6, 5, 'demo1', 'Demo Universiry', 'demou@gmail.com', 1),
(7, 6, 'vector1', 'Vector Architecture', 'vector@gmail.com', 1),
(9, 7, 'baywatch1', 'Baywatch Hotel & Tourism', 'baywatch@gmail.com', 1),
(10, 8, 'thunder1', 'Thunder Light', 'thunder@gmail.com', 1),
(11, 9, 'toyota1', 'Toyota Automobiles', 'toyota@gmail.com', 0),
(12, 10, 'pepsico1', 'Pepsico Bangladesh', 'pepsico@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `employer_details`
--
ALTER TABLE `employer_details`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `title_2` (`title`);

--
-- Indexes for table `job_seeker`
--
ALTER TABLE `job_seeker`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `js_details`
--
ALTER TABLE `js_details`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`user_id`);

--
-- Indexes for table `js_qualifications`
--
ALTER TABLE `js_qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `validation`
--
ALTER TABLE `validation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employer_details`
--
ALTER TABLE `employer_details`
  MODIFY `user_id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_seeker`
--
ALTER TABLE `job_seeker`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `js_details`
--
ALTER TABLE `js_details`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `js_qualifications`
--
ALTER TABLE `js_qualifications`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `validation`
--
ALTER TABLE `validation`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
