-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2023 at 04:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learnqurancore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trashed_on` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `image`, `role`, `status`, `added_on`, `trashed_on`) VALUES
(1, 'admin1', 'admin@mail.com', '0e7517141fb53f21ee439b355b5a1d0a', 'manager.png', 1, 1, '2023-02-15 07:18:00', ''),
(2, 'Editor', 'editor@mail.com', '9888593f48ba9b1a34b7465709975c8a', '', 2, 1, '2023-02-09 11:16:28', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trashed_on` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `status`, `added_on`, `trashed_on`) VALUES
(1, 'Regular Courses', 1, '2023-02-13 07:27:40', ''),
(2, 'Addition Courses', 1, '2023-02-14 06:39:58', ''),
(3, 'Learning Material', 1, '2023-02-16 07:23:32', '');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trashed_on` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `subcategory_id`, `title`, `description`, `image`, `status`, `added_on`, `trashed_on`) VALUES
(1, 1, 'Norani-Q-Chapter No 1', '&lt;p&gt;Chapter No 1&lt;/p&gt;', '933703372_Norani-Qaida.jpeg', 1, '2023-02-14 06:48:29', ''),
(2, 1, 'Norani-Q-Chapter No 2', '&lt;p&gt;Harakat (Movements)&lt;/p&gt;', '396567201_Norani-Qaida.jpeg', 1, '2023-02-14 06:48:58', ''),
(3, 1, 'Norani-Q-Chapter No 3', '&lt;p&gt;Exercises Mud-Shud&lt;/p&gt;', '629443712_Norani-Qaida.jpeg', 1, '2023-02-14 06:49:27', ''),
(4, 3, 'Ehsanul Qawaid', '&lt;p&gt;Ehsanul Qawaid&lt;/p&gt;', '913161131_Ahsan-Al-Qawaed.jpeg', 1, '2023-02-14 06:54:08', ''),
(5, 4, '1-Kalima Tayyibah', '&lt;p&gt;Read Kalima Tayyibah.&lt;/p&gt;', '243796490_Read Kalima Tayyibah..jpeg', 1, '2023-02-14 06:55:21', '');

-- --------------------------------------------------------

--
-- Table structure for table `chaptersdetails`
--

CREATE TABLE `chaptersdetails` (
  `id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trashed_on` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chaptersdetails`
--

INSERT INTO `chaptersdetails` (`id`, `subcategory_id`, `chapter_id`, `title`, `image`, `status`, `added_on`, `trashed_on`) VALUES
(1, 1, 1, 'Page No 1', '489079858_Page No 1.jpeg', 1, '2023-02-14 06:56:32', ''),
(2, 1, 1, 'Page No 2', '534358642_Page No 2.jpeg', 1, '2023-02-14 06:56:50', ''),
(3, 1, 1, 'Page No 3', '790457131_Page No 3.jpeg', 1, '2023-02-14 06:57:06', '');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_time` datetime NOT NULL,
  `student_time` datetime NOT NULL,
  `date` date NOT NULL,
  `day` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `activate_time` datetime NOT NULL,
  `leave_time` datetime NOT NULL,
  `start_time` datetime NOT NULL,
  `absent_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `taken_time` datetime NOT NULL,
  `onleave_time` datetime NOT NULL,
  `re_schedule_day` varchar(255) NOT NULL,
  `re_schedule_time` varchar(255) NOT NULL,
  `class_status` tinyint(4) NOT NULL DEFAULT 9,
  `approvel` tinyint(4) NOT NULL DEFAULT 1,
  `added_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trashed_on` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class_status`
--

CREATE TABLE `class_status` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_status`
--

INSERT INTO `class_status` (`id`, `title`, `status`, `added_on`) VALUES
(1, 'Activate', 1, '2023-02-21 14:15:00'),
(2, 'Leave', 1, '2023-02-21 14:15:00'),
(3, 'Start', 1, '2023-02-21 14:17:37'),
(4, 'Absent', 1, '2023-02-21 14:17:37'),
(5, 'End', 1, '2023-02-21 14:17:37'),
(6, 'Taken', 1, '2023-02-21 14:17:37'),
(7, 'Re-schedule', 1, '2023-02-21 14:17:37'),
(8, 'On Leave', 1, '2023-02-21 14:20:11'),
(9, 'Pending', 1, '2023-02-21 14:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `qualification` text NOT NULL,
  `address` text NOT NULL,
  `course_status` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trashed_on` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`, `image`, `father_name`, `nationality`, `phone`, `gender`, `qualification`, `address`, `course_status`, `added_by`, `status`, `added_on`, `trashed_on`) VALUES
(1, 'Student', 'Student@mail.com', 'cd41287b93a9317b6b2d1da8bec1def1', '350555891_3-DUAS.jpeg', 'StudentF', 'Pakistani', '0000000000', 2, 'CS', '&lt;p&gt;Address&lt;/p&gt;', 1, 2, 1, '2023-02-21 11:18:00', ''),
(2, 'student2', 'student2@mail.com', 'a0b965b1344ad21b7afd6386fee756ef', '', 'student2F', 'Indian', '000000000000', 1, 'Matric', '&lt;p&gt;india&lt;/p&gt;', 0, 1, 1, '2023-02-21 11:18:48', '');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `age` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trashed_on` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `title`, `description`, `age`, `image`, `status`, `added_on`, `trashed_on`) VALUES
(1, 1, 'Norani Qaida', '&lt;p&gt;Norani Qaida&lt;/p&gt;', '5', '164010855_Norani-Qaida.jpeg', 1, '2023-02-14 06:41:34', ''),
(3, 1, 'Ahsan Al Qawaed', '&lt;p&gt;For Beginners&lt;/p&gt;', '10', '197086666_Ahsan-Al-Qawaed.jpeg', 1, '2023-02-14 06:43:19', ''),
(4, 2, '6 Kalmas', '&lt;p&gt;all 6 kalmas&lt;/p&gt;', '9', '270442778_6-kalmas.jpeg', 1, '2023-02-14 06:44:25', ''),
(5, 2, 'Duas Section 1', '&lt;p&gt;Basic Duas Section 1 for Beginners&lt;/p&gt;', '1', '838008285_Duas.png', 1, '2023-02-14 06:45:15', ''),
(6, 2, 'Duas Section 2', '&lt;p&gt;Basic Duas Section 1 for Beginners&lt;/p&gt;', '1', '979800098_Duas.png', 1, '2023-02-14 06:45:49', ''),
(7, 3, '3 Duas', '&lt;p&gt;A Shiny Day&lt;/p&gt;', '5', '941984478_3-DUAS.jpeg', 1, '2023-02-16 07:25:18', ''),
(8, 0, '', '', '', '', 1, '2023-02-16 11:12:35', ''),
(9, 0, '', '', '', '', 1, '2023-02-16 11:19:29', ''),
(10, 0, '', '', '', '', 1, '2023-02-16 11:19:39', '');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `phone1` varchar(255) NOT NULL,
  `phone2` varchar(255) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `qualification` text NOT NULL,
  `experience` text NOT NULL,
  `address` text NOT NULL,
  `bank_account_title` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_branch_code` varchar(255) NOT NULL,
  `bank_account_number` varchar(255) NOT NULL,
  `zoom_username` varchar(255) NOT NULL,
  `zoom_id` varchar(255) NOT NULL,
  `zoom_password` varchar(255) NOT NULL,
  `added_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trashed_on` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `password`, `image`, `father_name`, `cnic`, `nationality`, `phone1`, `phone2`, `gender`, `marital_status`, `qualification`, `experience`, `address`, `bank_account_title`, `bank_name`, `bank_branch_code`, `bank_account_number`, `zoom_username`, `zoom_id`, `zoom_password`, `added_by`, `status`, `added_on`, `trashed_on`) VALUES
(1, 'teacher1', 'teacher1@mail.com', '8f31d9f0cad22c1c4c3d6d52a18b3822', '268416464_Ahsan-Al-Qawaed.jpeg', 'Teacher Father', '00000000000', 'pakistani', '000000000000000', '000000000000000', 1, 'Single', 'BSCS', '&lt;p&gt;4 Years&lt;/p&gt;', '&lt;p&gt;address&lt;/p&gt;', 'teacher', 'HBL', '1481', '000000000000', 'teacher', '0000000000000', '000000000000', 1, 1, '2023-02-21 10:56:10', ''),
(3, 'teacher2', 'teacher2@mail.com', '1e3b004fd3d4d8713e2476a6706a1c14', '836416072_VantageDroidCoursePage.jpg', 'teacher2f', '00000000000', 'American', '0000000000000000000', '000000000000000', 2, 'Divorced', 'BSSE', '&lt;p&gt;3 Years&lt;/p&gt;', '&lt;p&gt;address&lt;/p&gt;', 'teacher2', 'HBL2', '00000000', '000000000', 'teacher2', '0000000', '0000000000000000', 1, 1, '2023-02-21 11:10:23', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trashed_on` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chaptersdetails`
--
ALTER TABLE `chaptersdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_status`
--
ALTER TABLE `class_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chaptersdetails`
--
ALTER TABLE `chaptersdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_status`
--
ALTER TABLE `class_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
