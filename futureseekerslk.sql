-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 05:11 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futureseekerslk`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `logo_dir` varchar(100) DEFAULT NULL,
  `contactNo` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `logo_dir`, `contactNo`, `email`) VALUES
(6, 'Soft-W', '1636873892_05345c46e7359e7aef11.png', '01125487621', 'softw@gmail.com'),
(12, 'MNM', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `user_account_id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `contactNo` varchar(20) NOT NULL,
  `jobPosition` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id`, `company_id`, `user_account_id`, `name`, `contactNo`, `jobPosition`, `email`) VALUES
(11, 6, 7, 'Peter Parker', '1124586973', 'HRM', 'hr@gmail.com'),
(17, 12, 24, 'Jhon Doe', '0778945249', 'HR Manager', 'hrm@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_jobdetails`
--

CREATE TABLE `jobseeker_jobdetails` (
  `job_seeker_id` int(10) NOT NULL,
  `job_details_id` int(10) NOT NULL,
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_details`
--

CREATE TABLE `job_details` (
  `id` int(10) NOT NULL,
  `employer_id` int(10) NOT NULL,
  `jobCategory` varchar(20) NOT NULL,
  `salary` double NOT NULL,
  `closingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `experience` int(20) NOT NULL,
  `typeOfEmployment` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `dateTime` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_seeker`
--

CREATE TABLE `job_seeker` (
  `id` int(10) NOT NULL,
  `user_account_id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contactNo` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `currentJobTitle` varchar(40) NOT NULL,
  `cv_file_dir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_seeker`
--

INSERT INTO `job_seeker` (`id`, `user_account_id`, `name`, `address`, `email`, `contactNo`, `dob`, `currentJobTitle`, `cv_file_dir`) VALUES
(2, 10, 'Glenn Maxwell', '31/A, Filler Drive, Sydney', 'gmaxwell@gmail.com', '9145789666', '1986-06-16', 'Intern', ''),
(3, 11, 'Mitchel Starc', '43/2A, Pears St, Melbourne', 'starcmitch@gmail.com', '9145789453', '1987-01-22', 'Intern', ''),
(6, 15, 'Dex Ryan', '34, 3rd Avenue, Colombo', 'ryan34@gmail.com', '965412874', '1984-10-18', 'Senior Software Engineer', ''),
(7, 20, 'Matt Murdock', '56, 3rd Avenue, Texas', 'hr@gmail.com', '9412547896', '1992-06-24', 'Senior Software Engineer', ''),
(8, 23, 'Michael Scoffield', '43/2A, Mason St, Colombo', 'mscoff@gmail.com', '914545542652', '1981-05-09', 'Structural Engineer', '');

-- --------------------------------------------------------

--
-- Table structure for table `system_admin`
--

CREATE TABLE `system_admin` (
  `id` int(10) NOT NULL,
  `user_account_id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_admin`
--

INSERT INTO `system_admin` (`id`, `user_account_id`, `name`) VALUES
(1, 21, 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(75) NOT NULL,
  `status` int(1) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `username`, `password`, `status`, `type`) VALUES
(7, 'petersp', 'spider123', 1, 'employer'),
(10, 'bigshow', 'maxxi32', 0, 'applicant'),
(11, 'mstarcc', 'starc11', 0, 'applicant'),
(15, 'dryan', 'ryan007', 1, 'applicant'),
(20, 'murmatt', 'matt09', 1, 'applicant'),
(21, 'admin1', 'admin1', 0, 'admin'),
(23, 'scoffm', 'scoff123', 1, 'applicant'),
(24, 'jdoe', 'doe123', 0, 'employer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmployerToCompany` (`company_id`),
  ADD KEY `EmployerToUserAccount` (`user_account_id`);

--
-- Indexes for table `jobseeker_jobdetails`
--
ALTER TABLE `jobseeker_jobdetails`
  ADD PRIMARY KEY (`job_seeker_id`,`job_details_id`),
  ADD KEY `JobSeekerJobDetailsToJobDetails` (`job_details_id`);

--
-- Indexes for table `job_details`
--
ALTER TABLE `job_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `JobDetailsToEmployer` (`employer_id`);

--
-- Indexes for table `job_seeker`
--
ALTER TABLE `job_seeker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `JobSeekerToUserAccount` (`user_account_id`);

--
-- Indexes for table `system_admin`
--
ALTER TABLE `system_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `SystemAdminToUserAccount` (`user_account_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `job_details`
--
ALTER TABLE `job_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_seeker`
--
ALTER TABLE `job_seeker`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `system_admin`
--
ALTER TABLE `system_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employer`
--
ALTER TABLE `employer`
  ADD CONSTRAINT `EmployerToCompany` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `EmployerToUserAccount` FOREIGN KEY (`user_account_id`) REFERENCES `user_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobseeker_jobdetails`
--
ALTER TABLE `jobseeker_jobdetails`
  ADD CONSTRAINT `JobSeekerJobDetailsToJobDetails` FOREIGN KEY (`job_details_id`) REFERENCES `job_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `JobSeekerJobDetailsToJobSeeker` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seeker` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_details`
--
ALTER TABLE `job_details`
  ADD CONSTRAINT `JobDetailsToEmployer` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_seeker`
--
ALTER TABLE `job_seeker`
  ADD CONSTRAINT `JobSeekerToUserAccount` FOREIGN KEY (`user_account_id`) REFERENCES `user_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `system_admin`
--
ALTER TABLE `system_admin`
  ADD CONSTRAINT `SystemAdminToUserAccount` FOREIGN KEY (`user_account_id`) REFERENCES `user_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
