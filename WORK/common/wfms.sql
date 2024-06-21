-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 08:34 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(2) NOT NULL,
  `name` int(10) NOT NULL,
  `created_by` int(5) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` enum('Active','hidden') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_data`
--

CREATE TABLE `employee_data` (
  `employee_id` int(5) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `fk_department_id` int(2) NOT NULL,
  `manager_id` int(5) NOT NULL,
  `hire_date` date NOT NULL,
  `ctc` int(10) NOT NULL,
  `employee_code` varchar(10) NOT NULL,
  `location` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` int(10) NOT NULL,
  `salary_base` int(7) NOT NULL,
  `position_id` int(3) NOT NULL,
  `status` enum('Active','resigned','fired','on_leave') NOT NULL,
  `created_by` int(5) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `name` varchar(10) NOT NULL,
  `created_by` int(5) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` enum('Active','hidden') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `role` int(11) NOT NULL,
  `created_by` int(5) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` enum('Active','closed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `created_by` int(5) NOT NULL,
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
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `employee_data`
--
ALTER TABLE `employee_data`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `id_departmentmatch` (`fk_department_id`);

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
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `position_request`
--
ALTER TABLE `position_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `total_compensation`
--
ALTER TABLE `total_compensation`
  ADD PRIMARY KEY (`compensation_id`),
  ADD KEY `ctc_idmatch` (`fk_employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_data`
--
ALTER TABLE `employee_data`
  MODIFY `employee_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `position_request`
--
ALTER TABLE `position_request`
  MODIFY `request_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `total_compensation`
--
ALTER TABLE `total_compensation`
  MODIFY `compensation_id` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
