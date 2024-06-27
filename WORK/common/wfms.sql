-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 09:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wfms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(10) NOT NULL,
  `employee_id` int(5) NOT NULL,
  `date` date NOT NULL,
  `checkin_time` time NOT NULL,
  `status` enum('unverified','verified') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `employee_id`, `date`, `checkin_time`, `status`) VALUES
(1, 1, '2024-06-27', '09:00:00', 'unverified');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(2) UNSIGNED NOT NULL,
  `name` varchar(10) NOT NULL,
  `created_by` int(5) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` enum('Active','hidden') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `name`, `created_by`, `created_on`, `status`) VALUES
(1, 'IT', 1, '2024-06-27 09:08:48', 'Active'),
(2, 'Finance', 1, '2024-06-27 09:09:06', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `employee_data`
--

CREATE TABLE `employee_data` (
  `employee_id` int(5) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fk_department_id` int(2) UNSIGNED NOT NULL,
  `manager_id` int(5) NOT NULL,
  `hire_date` date NOT NULL,
  `ctc` int(10) NOT NULL,
  `employee_code` varchar(10) NOT NULL,
  `location_id` int(5) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` int(10) NOT NULL,
  `salary_base` int(7) NOT NULL,
  `position_id` int(3) NOT NULL,
  `status` enum('Active','resigned','fired','on_leave') NOT NULL,
  `created_by` int(5) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_data`
--

INSERT INTO `employee_data` (`employee_id`, `first_name`, `last_name`, `password`, `fk_department_id`, `manager_id`, `hire_date`, `ctc`, `employee_code`, `location_id`, `dob`, `email`, `phone`, `salary_base`, `position_id`, `status`, `created_by`, `created_on`) VALUES
(1, 'Prakhar', 'Mittal', 'a669303db4de6bf21a0b5bad88751bf5', 1, 0, '2024-06-01', 100, '2022B3A704', 1, '2024-06-01', 'Prakhar@gmail.com', 999999999, 50, 1, 'Active', 1, '2024-06-27 07:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `leave_request`
--

CREATE TABLE `leave_request` (
  `leave_id` int(5) NOT NULL,
  `employee_id` int(5) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `leave_type` enum('PTO','CL','ML','SL') NOT NULL,
  `reason` varchar(100) NOT NULL,
  `request_date` date NOT NULL,
  `created_by` int(5) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` enum('approved','pending','denied') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created by` int(10) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `name`, `created by`, `status`) VALUES
(1, 'Delhi', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(10) NOT NULL,
  `employee_id` int(5) NOT NULL,
  `message` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_by` int(5) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` enum('Active','hidden') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `name`, `created_by`, `created_on`, `status`) VALUES
(1, 'Software Developer', 1, '2024-06-27 09:05:52', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `position_request`
--

CREATE TABLE `position_request` (
  `request_id` int(5) NOT NULL,
  `employee_id` int(5) NOT NULL,
  `date_time` datetime NOT NULL,
  `project_id` int(5) NOT NULL,
  `position_id` int(3) NOT NULL,
  `status` enum('Active','resigned','fired','on_leave') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(5) NOT NULL,
  `name` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `department_id` int(2) NOT NULL,
  `manager_id` int(5) NOT NULL,
  `employees_reqd` int(3) NOT NULL,
  `members_id` int(5) NOT NULL,
  `role` varchar(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` enum('Active','closed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `name`, `description`, `start_date`, `end_date`, `department_id`, `manager_id`, `employees_reqd`, `members_id`, `role`, `created_on`, `status`) VALUES
(1, '1st Projec', 'Making a wfms software', '2024-05-27', '2024-07-23', 1, 1, 4, 0, '1', '2024-06-27 09:17:54', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(5) NOT NULL,
  `employee_id` int(5) NOT NULL,
  `project_id` int(5) NOT NULL,
  `description` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `assigned_by` int(5) NOT NULL,
  `report` varchar(10) NOT NULL COMMENT 'only store file name here',
  `created_on` datetime NOT NULL,
  `status` enum('Active','resigned','fired','on_leave') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `total_compensation`
--

CREATE TABLE `total_compensation` (
  `compensation_id` int(5) NOT NULL,
  `fk_employee_id` int(5) NOT NULL,
  `base_salary` int(10) NOT NULL,
  `bonus` int(10) NOT NULL,
  `benefits` int(10) NOT NULL,
  `stocks` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `created_by` int(5) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` enum('Active','resigned','fired','on_leave') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `total_compensation`
--

INSERT INTO `total_compensation` (`compensation_id`, `fk_employee_id`, `base_salary`, `bonus`, `benefits`, `stocks`, `total`, `created_by`, `created_on`, `status`) VALUES
(1, 1, 100, 0, 0, 0, 100, 1, '2024-06-27 09:17:27', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `attendance_idmatch` (`employee_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `employee_data`
--
ALTER TABLE `employee_data`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`,`employee_code`,`email`,`phone`),
  ADD UNIQUE KEY `employee_id_2` (`employee_id`),
  ADD UNIQUE KEY `employee_id_3` (`employee_id`),
  ADD KEY `manager_id` (`manager_id`,`position_id`,`created_by`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `dept_empl` (`fk_department_id`);

--
-- Indexes for table `leave_request`
--
ALTER TABLE `leave_request`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `employee_id` (`employee_id`,`created_by`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `created by` (`created by`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `notif_idmatch` (`employee_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `position_request`
--
ALTER TABLE `position_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `assigned_by` (`assigned_by`);

--
-- Indexes for table `total_compensation`
--
ALTER TABLE `total_compensation`
  ADD PRIMARY KEY (`compensation_id`),
  ADD KEY `fk_employee_id` (`fk_employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_data`
--
ALTER TABLE `employee_data`
  MODIFY `employee_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `position_request`
--
ALTER TABLE `position_request`
  MODIFY `request_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `total_compensation`
--
ALTER TABLE `total_compensation`
  MODIFY `compensation_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_data`
--
ALTER TABLE `employee_data`
  ADD CONSTRAINT `dept_empl` FOREIGN KEY (`fk_department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
