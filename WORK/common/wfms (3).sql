-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2024 at 06:31 PM
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
  `month` int(5) NOT NULL,
  `present` int(10) NOT NULL DEFAULT 0,
  `absent` int(10) NOT NULL DEFAULT 0,
  `date` date DEFAULT NULL,
  `checkin_time` time NOT NULL,
  `late_login` int(10) NOT NULL DEFAULT 0,
  `early_login` int(10) NOT NULL DEFAULT 0,
  `status` enum('unverified','verified') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(2) UNSIGNED NOT NULL,
  `dep_name` varchar(10) NOT NULL,
  `created_by` int(5) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` enum('Active','hidden') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `dep_name`, `created_by`, `created_on`, `status`) VALUES
(1, 'IT', 1, '2024-06-27 09:08:48', 'Active'),
(2, 'Finance', 1, '2024-06-27 09:09:06', 'Active'),
(3, 'R&D', 1, '2024-07-04 08:38:11', 'Active'),
(4, 'Sales', 1, '2024-07-04 09:24:23', 'Active'),
(5, 'Marketting', 1, '2024-07-04 09:24:23', 'Active'),
(6, 'Quality', 1, '2024-07-04 09:24:55', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `employee_data`
--

CREATE TABLE `employee_data` (
  `employee_id` int(5) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `password` varchar(255) NOT NULL,
  `fk_department_id` int(2) UNSIGNED NOT NULL,
  `manager_id` int(5) DEFAULT NULL,
  `hire_date` date NOT NULL,
  `ctc` int(10) NOT NULL,
  `employee_code` varchar(13) NOT NULL,
  `location_id` int(5) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` int(10) NOT NULL,
  `position_id` int(3) NOT NULL,
  `status` enum('Active','verified_resigned','fired','on_leave','unverified_resigned') NOT NULL DEFAULT 'Active',
  `created_by` int(5) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_data`
--

INSERT INTO `employee_data` (`employee_id`, `first_name`, `last_name`, `gender`, `password`, `fk_department_id`, `manager_id`, `hire_date`, `ctc`, `employee_code`, `location_id`, `dob`, `email`, `phone`, `position_id`, `status`, `created_by`, `created_on`, `updated_on`, `updated_by`) VALUES
(1, 'Prakhar', 'Mittal', 'male', 'a669303db4de6bf21a0b5bad88751bf5', 1, 0, '2015-06-01', 10, '2022B3A70426P', 1, '2024-06-01', 'Prakhar@gmail.com', 999999999, 1, 'Active', 1, '2024-06-27 07:29:48', '2024-07-02 00:00:00', 1),
(3, 'Bill', 'Gates', 'male', '31e80aacf74f7171e536a1287ee13603', 2, 1, '2015-06-11', 20, '2022B3AA0321P', 2, '2024-06-01', 'bill@gmail.com', 2147483647, 2, 'Active', 1, '2024-06-28 00:00:00', '2024-07-10 00:00:00', 3),
(4, 'Tim', 'Cook', 'male', '5a64bf4be023a4f443d4a2373d73d679', 3, 1, '2024-06-25', 15, '2022B3AB0111P', 2, '2024-06-29', 'tim@gmail.com', 2147483647, 1, 'Active', 3, '2024-06-28 00:00:00', NULL, NULL),
(5, 'dfdsf', 'dsfsdf', 'male', '202cb962ac59075b964b07152d234b70', 1, 1, '2024-07-25', 1, '1', 1, '2024-07-03', 'dsffds@gmail.com', 1, 1, 'verified_resigned', 1, '2024-07-01 00:00:00', NULL, NULL),
(6, 'dfdsf', 'dsfsdf', 'male', '202cb962ac59075b964b07152d234b70', 1, 1, '2024-07-25', 1, '1', 1, '2024-07-03', 'dsffds@gmail.com', 1, 1, 'verified_resigned', 1, '2024-07-01 00:00:00', NULL, NULL),
(7, 'fsdf', 'dfdf', 'male', '674f3c2c1a8a6f90461e8a66fb5550ba', 2, 2, '2024-07-21', 2, '2', 2, '2024-08-01', '2@gmail.com', 2, 2, 'verified_resigned', 1, '2024-07-01 00:00:00', NULL, NULL),
(9, 'werewr', 'werwrwe', 'male', 'bde6e5a566037753ce6a20ba299c1550', 1, 1, '2024-07-23', 1, '1', 1, '2024-07-28', 'wr@gmail.com', 1, 1, 'Active', 1, '2024-07-02 00:00:00', NULL, NULL),
(10, 'yty', 'tyty', 'male', '6ebe76c9fb411be97b3b0d48b791a7c9', 1, 1, '2024-11-11', 1, '4', 1, '2004-11-11', 'b34@gmail.com', 1, 1, 'verified_resigned', 1, '2024-07-02 00:00:00', NULL, NULL),
(12, 'Tucker', 'Underwood', 'male', 'b362b3512066659b02ef72d9ba5d02cc', 1, 0, '2004-07-12', 0, 'Voluptates ip', 1, '2004-07-03', 'puvololero@mailinator.com', 1, 1, 'Active', 1, '2024-07-02 00:00:00', NULL, NULL),
(13, 'Tucker', 'Underwood', 'female', '193dc0382bf08d0cab5c2d08e71ffd52', 1, 0, '2013-07-05', 0, '12', 2, '2004-07-10', 'puvololero@mailinator.com', 1, 1, 'Active', 1, '2024-07-02 00:00:00', NULL, NULL),
(14, 'Tucker', 'Underwood', 'female', '193dc0382bf08d0cab5c2d08e71ffd52', 1, 0, '2024-07-05', 0, '12', 2, '2004-07-11', 'puvololero@mailinator.com', 1, 1, 'Active', 1, '2024-07-02 00:00:00', NULL, NULL),
(15, 'Tucker', 'Underwood', 'female', '193dc0382bf08d0cab5c2d08e71ffd52', 6, 0, '2024-07-09', 9, '12', 2, '2004-10-01', 'puvololero@mailinator.com', 1, 1, 'Active', 1, '2024-07-02 00:00:00', NULL, NULL),
(16, 'dfssd', 'dsfdsf', 'other', 'd47e6c38b3dfe905f8ba477c481c62fa', 5, 1, '2024-07-20', 11, '1', 1, '2004-07-26', 'dsf@gmail.com', 1, 1, 'Active', 1, '2024-07-02 00:00:00', NULL, NULL),
(17, 'ffd', 'dsfsdf', 'female', '202cb962ac59075b964b07152d234b70', 4, 1, '2024-07-28', 19, '1', 1, '2004-07-18', 'dsf@gmail.com', 1, 1, 'Active', 1, '2024-07-02 00:00:00', NULL, NULL),
(18, 'homelander', 'sadsad', 'male', '202cb962ac59075b964b07152d234b70', 1, 1, '2024-07-25', 4, '1', 1, '2024-08-03', 'f@gmail.com', 1, 1, 'Active', 1, '2024-07-05 00:00:00', NULL, NULL),
(19, 'homelander', 'sadsad', 'male', '202cb962ac59075b964b07152d234b70', 1, 1, '2024-07-25', 4, '1', 1, '2024-08-03', 'f@gmail.com', 1, 1, 'Active', 1, '2024-07-05 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `leave_id` int(5) NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `total_PTO` int(3) NOT NULL DEFAULT 5,
  `PTO_taken` int(3) NOT NULL,
  `total_SL` int(3) NOT NULL DEFAULT 5,
  `SL_taken` int(3) NOT NULL,
  `total_EL` int(3) NOT NULL DEFAULT 5,
  `EL_taken` int(3) NOT NULL,
  `total_CL` int(3) NOT NULL DEFAULT 5,
  `CL_taken` int(3) NOT NULL,
  `status` text DEFAULT NULL
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
  `leave_type` enum('PTO','CL','EL','SL') NOT NULL,
  `reason` varchar(100) NOT NULL,
  `request_date` date NOT NULL,
  `status` enum('approved','pending','denied') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(5) NOT NULL,
  `loc_name` varchar(50) NOT NULL,
  `created by` int(10) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `loc_name`, `created by`, `status`) VALUES
(1, 'Delhi', 1, 'Active'),
(2, 'Florida', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(10) NOT NULL,
  `user` int(5) NOT NULL,
  `summary` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL,
  `type` enum('Added Employee data','Deleted Employee data','Updated Employee data','Filled Position Request','Updated CTC information') NOT NULL,
  `affected` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user`, `summary`, `date_time`, `type`, `affected`) VALUES
(1, 1, 'created employee', '2024-07-01 12:08:55', '', 2),
(2, 5, 'Added an Employee', '2024-07-01 00:00:00', '', 5),
(3, 1, 'Added an Employee', '2024-07-01 00:00:00', '', 7),
(4, 1, 'Accepted Resignation', '0000-00-00 00:00:00', '', 7),
(5, 1, 'Accepted Resignation', '2024-07-02 00:00:00', '', 7),
(6, 1, 'Accepted Resignation', '2024-07-02 00:00:00', '', 7),
(7, 1, 'Accepted Resignation', '2024-07-02 00:00:00', 'Deleted Employee data', 7),
(8, 1, 'Added an Employee', '2024-07-02 00:00:00', '', 5),
(9, 1, 'Updated Information', '2024-07-02 00:00:00', 'Updated Employee data', 0),
(10, 1, 'Updated Information', '2024-07-02 00:00:00', 'Updated Employee data', 0),
(11, 1, 'Updated Information', '2024-07-02 00:00:00', 'Updated Employee data', 0),
(12, 1, 'Updated Employee Info', '2024-07-02 00:00:00', 'Updated Employee data', 0),
(13, 1, 'Added an Employee', '2024-07-02 00:00:00', 'Added Employee data', 10),
(14, 1, 'Accepted Resignation', '2024-07-02 00:00:00', 'Deleted Employee data', 10),
(15, 1, 'Updated Employee Info', '2024-07-02 00:00:00', 'Updated Employee data', 1),
(16, 1, 'Added an Employee', '2024-07-02 00:00:00', 'Added Employee data', 13),
(17, 1, 'Added an Employee', '2024-07-02 00:00:00', 'Added Employee data', 13),
(18, 1, 'Updated Employee Info', '2024-07-02 00:00:00', 'Updated CTC information', 0),
(19, 1, 'Updated Employee Info', '2024-07-02 00:00:00', 'Updated CTC information', 5),
(20, 1, 'Updated Employee Info', '2024-07-02 00:00:00', 'Updated CTC information', 5),
(21, 1, 'Updated Employee Info', '2024-07-02 00:00:00', 'Updated CTC information', 1),
(22, 1, 'Added an Employee', '2024-07-02 00:00:00', 'Added Employee data', 5),
(23, 1, 'Added an Employee', '2024-07-02 00:00:00', 'Added Employee data', 5),
(24, 1, 'Added an Employee', '2024-07-05 00:00:00', 'Added Employee data', 5),
(25, 1, 'Added an Employee', '2024-07-05 00:00:00', 'Added Employee data', 5),
(26, 1, 'Closed Request Partially', '2024-07-08 00:00:00', 'Filled Position Request', 0),
(27, 1, 'Closed Request Completely', '2024-07-08 00:00:00', 'Filled Position Request', 0),
(28, 1, 'Closed Request Partially', '2024-07-08 00:00:00', 'Filled Position Request', 0),
(29, 1, 'Closed Request Completely', '2024-07-08 00:00:00', 'Filled Position Request', 0),
(30, 1, 'Closed Request Partially', '2024-07-08 00:00:00', 'Filled Position Request', 0),
(31, 1, 'Closed Request Completely', '2024-07-08 00:00:00', 'Filled Position Request', 1),
(32, 1, 'Closed Request Completely', '2024-07-08 00:00:00', 'Filled Position Request', 1),
(33, 1, 'Closed Request Partially', '2024-07-08 00:00:00', 'Filled Position Request', 1),
(34, 1, 'Closed Request Completely', '2024-07-08 00:00:00', 'Filled Position Request', 1),
(35, 1, 'Closed Request Completely', '2024-07-08 00:00:00', 'Filled Position Request', 1),
(36, 3, 'changed Employee password', '2024-07-08 00:00:00', 'Updated Employee data', 3),
(37, 3, 'System Generated Password', '2024-07-10 00:00:00', 'Updated Employee data', 3),
(38, 3, 'System Generated Password', '2024-07-10 00:00:00', 'Updated Employee data', 3),
(39, 3, 'System Generated Password', '2024-07-10 00:00:00', 'Updated Employee data', 3),
(40, 3, 'System Generated Password', '2024-07-10 00:00:00', 'Updated Employee data', 3),
(41, 3, 'changed Employee password', '2024-07-10 00:00:00', 'Updated Employee data', 3);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(3) NOT NULL,
  `pos_name` varchar(50) NOT NULL,
  `created_by` int(5) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` enum('Active','hidden') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `pos_name`, `created_by`, `created_on`, `status`) VALUES
(1, 'Software Developer', 1, '2024-06-27 09:05:52', 'Active'),
(2, 'Accountant', 1, '2024-06-28 08:46:22', 'Active');

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
  `description` varchar(500) NOT NULL,
  `no_reqd` int(10) NOT NULL,
  `status` enum('Active','Closed') NOT NULL,
  `department_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position_request`
--

INSERT INTO `position_request` (`request_id`, `employee_id`, `date_time`, `project_id`, `position_id`, `description`, `no_reqd`, `status`, `department_id`) VALUES
(1, 1, '2024-07-05 06:21:22', 1, 1, 'Prakhar Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab, perspiciatis sed exercitationem in, rerum nesciunt libero dolorum, enim ass qui dolor ex eum doloribus repudiandae sunt impedit.', 0, 'Closed', 1),
(2, 1, '2024-07-05 06:24:39', 1, 2, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab, perspiciatis sed exercitationem in, rerum nesciunt libero dolorum, enim ass qui dolor ex eum doloribus repudiandae sunt impedit.', 4, 'Active', 2),
(3, 3, '2024-07-05 06:39:47', 1, 1, 'm ipsum, dolor sit amet consectetur adipisicing elit. Ab, perspiciatis sed exercitationem in, rerum nesciunt libero dolorum, enim ass qui dolor ex eum doloribus repudiandae sunt impedit.', 3, 'Active', 2),
(4, 4, '2024-07-05 06:39:47', 1, 1, 'm ipsum, dolor sit amet consectetur adipisicing elit. Ab, perspiciatis sed exercitationem in, rerum nesciunt libero dolorum, enim ass qui dolor ex eum doloribus repudiandae sunt impedit.', 1, 'Active', 4),
(5, 1, '2024-07-05 08:11:35', 1, 2, 'dsfsdfdsfdsfdsfsdfsf', 2, 'Active', 6),
(6, 1, '2024-07-05 08:11:35', 1, 1, 'sdfdsfdsfsdfdsfdsfdsfdsfdsf', 1, 'Active', 6);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(5) NOT NULL,
  `name` varchar(10) NOT NULL,
  `Heading` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `manager_id` int(5) NOT NULL,
  `employees_reqd` int(3) NOT NULL,
  `members_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `role` varchar(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` enum('Active','closed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `name`, `Heading`, `description`, `start_date`, `end_date`, `manager_id`, `employees_reqd`, `members_id`, `role`, `created_on`, `status`) VALUES
(1, '1st Projec', '', 'Making a wfms software', '2024-05-27', '2024-07-23', 1, 4, '1,3,4', '1', '2024-06-27 09:17:54', 'Active');

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
  `updated_by` int(5) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('Active','resigned','fired','on_leave') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `total_compensation`
--

INSERT INTO `total_compensation` (`compensation_id`, `fk_employee_id`, `base_salary`, `bonus`, `benefits`, `stocks`, `total`, `updated_by`, `updated_on`, `status`) VALUES
(1, 1, 1, 5, 1, 4, 10, 1, '2024-07-02 00:00:00', 'Active'),
(2, 5, 1, 1, 1, 1, 4, 0, '0000-00-00 00:00:00', 'Active'),
(3, 5, 1, 1, 3, 1, 6, 0, '0000-00-00 00:00:00', 'Active'),
(4, 5, 1, 1, 1, 1, 4, 0, '0000-00-00 00:00:00', 'Active'),
(5, 5, 1, 1, 1, 1, 4, 0, '0000-00-00 00:00:00', 'Active');

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
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `leave_request`
--
ALTER TABLE `leave_request`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `employee_id` (`employee_id`);

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
  ADD KEY `user` (`user`);

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
  MODIFY `department_id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee_data`
--
ALTER TABLE `employee_data`
  MODIFY `employee_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `leave_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_request`
--
ALTER TABLE `leave_request`
  MODIFY `leave_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `position_request`
--
ALTER TABLE `position_request`
  MODIFY `request_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `total_compensation`
--
ALTER TABLE `total_compensation`
  MODIFY `compensation_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
