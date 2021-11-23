-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 04:47 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `htc-rank`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_admin`
--

CREATE TABLE `tbl_account_admin` (
  `id` int(11) NOT NULL,
  `admin_image` varchar(100) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_contact` varchar(100) NOT NULL,
  `admin_address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_account_admin`
--

INSERT INTO `tbl_account_admin` (`id`, `admin_image`, `admin_username`, `admin_password`, `admin_name`, `admin_email`, `admin_contact`, `admin_address`) VALUES
(2, 'IMG_ADMIN20211118275.jpg', 'admin', 'admin', 'Caldoza, Edsun J.', 'edsunjcaldoza@gmail.com', '09393963696', 'Jaro, Leyte');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_staff`
--

CREATE TABLE `tbl_account_staff` (
  `id` int(11) NOT NULL,
  `staff_image` varchar(200) NOT NULL,
  `staff_username` varchar(100) NOT NULL,
  `staff_password` varchar(100) NOT NULL,
  `staff_name` varchar(200) NOT NULL,
  `staff_sex` varchar(50) NOT NULL,
  `staff_address` varchar(500) NOT NULL,
  `staff_date_birth` varchar(50) NOT NULL,
  `staff_email` varchar(100) NOT NULL,
  `staff_contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcement`
--

CREATE TABLE `tbl_announcement` (
  `id` int(11) NOT NULL,
  `announce_title` varchar(100) NOT NULL,
  `announce_details` varchar(500) NOT NULL,
  `announce_created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_announcement`
--

INSERT INTO `tbl_announcement` (`id`, `announce_title`, `announce_details`, `announce_created_at`) VALUES
(4, 'Submission of Grades', 'Submission of grades for the teachers', 'November 14, 2021, 5:55:07 PM'),
(5, 'Cards Day', 'Please visit our school to view the cards of your student enrolled in our institution', 'November 15, 2021, 7:32:31 AM'),
(7, 'Birthday ni Yanyan', 'Attend Kamo...', 'November 19, 2021, 2:40:42 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `id` int(11) NOT NULL,
  `class_sy` int(11) NOT NULL,
  `class_section` int(11) NOT NULL,
  `class_adviser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade`
--

CREATE TABLE `tbl_grade` (
  `id` int(11) NOT NULL,
  `grade_subject_id` int(11) NOT NULL,
  `grade_stud_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade_branch`
--

CREATE TABLE `tbl_grade_branch` (
  `id` int(11) NOT NULL,
  `gbranch_subject_id` int(11) NOT NULL,
  `gbranch_stud_id` int(11) NOT NULL,
  `gbranch_grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade_level`
--

CREATE TABLE `tbl_grade_level` (
  `id` int(11) NOT NULL,
  `gl_grade_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_populate_class`
--

CREATE TABLE `tbl_populate_class` (
  `id` int(11) NOT NULL,
  `pop_class_id` int(11) NOT NULL,
  `pop_stud_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quarter`
--

CREATE TABLE `tbl_quarter` (
  `id` int(11) NOT NULL,
  `q_quarter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school_details`
--

CREATE TABLE `tbl_school_details` (
  `id` int(11) NOT NULL,
  `school_logo` varchar(100) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `school_id` varchar(100) NOT NULL,
  `school_address` varchar(100) NOT NULL,
  `school_email` varchar(100) NOT NULL,
  `school_contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_school_details`
--

INSERT INTO `tbl_school_details` (`id`, `school_logo`, `school_name`, `school_id`, `school_address`, `school_email`, `school_contact`) VALUES
(1, 'IMG_ADMIN2021103192890.jpg', 'Holy Trinity College', '1800633', 'Alangalang, Leyte', 'htc@gmail.com', '09393963696');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school_year`
--

CREATE TABLE `tbl_school_year` (
  `id` int(11) NOT NULL,
  `sy_school_year` varchar(50) NOT NULL,
  `sy_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_section`
--

CREATE TABLE `tbl_section` (
  `id` int(11) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_grade_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `stud_id_num` int(50) NOT NULL,
  `stud_img` varchar(100) NOT NULL,
  `stud_name` varchar(100) NOT NULL,
  `stud_sex` varchar(50) NOT NULL,
  `stud_date_birth` varchar(50) NOT NULL,
  `stud_address` varchar(200) NOT NULL,
  `stud_username` varchar(100) NOT NULL,
  `stud_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `id` int(11) NOT NULL,
  `subject_class_id` int(11) NOT NULL,
  `subject_quarter_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `subject_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject_branch`
--

CREATE TABLE `tbl_subject_branch` (
  `id` int(11) NOT NULL,
  `sbranch_class_id` int(11) NOT NULL,
  `sbranch_quarter_id` int(11) NOT NULL,
  `sbranch_subject_id` int(11) NOT NULL,
  `sbranch_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject_branch_details`
--

CREATE TABLE `tbl_subject_branch_details` (
  `id` int(11) NOT NULL,
  `sbranch_main_subject_id` int(11) NOT NULL,
  `sbranch_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject_details`
--

CREATE TABLE `tbl_subject_details` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account_admin`
--
ALTER TABLE `tbl_account_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_account_staff`
--
ALTER TABLE `tbl_account_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_grade`
--
ALTER TABLE `tbl_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_grade_branch`
--
ALTER TABLE `tbl_grade_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_grade_level`
--
ALTER TABLE `tbl_grade_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_populate_class`
--
ALTER TABLE `tbl_populate_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_quarter`
--
ALTER TABLE `tbl_quarter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_school_details`
--
ALTER TABLE `tbl_school_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_school_year`
--
ALTER TABLE `tbl_school_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_section`
--
ALTER TABLE `tbl_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subject_branch`
--
ALTER TABLE `tbl_subject_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subject_branch_details`
--
ALTER TABLE `tbl_subject_branch_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subject_details`
--
ALTER TABLE `tbl_subject_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account_admin`
--
ALTER TABLE `tbl_account_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_account_staff`
--
ALTER TABLE `tbl_account_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_grade`
--
ALTER TABLE `tbl_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tbl_grade_branch`
--
ALTER TABLE `tbl_grade_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_grade_level`
--
ALTER TABLE `tbl_grade_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_populate_class`
--
ALTER TABLE `tbl_populate_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_quarter`
--
ALTER TABLE `tbl_quarter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_school_details`
--
ALTER TABLE `tbl_school_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_school_year`
--
ALTER TABLE `tbl_school_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_section`
--
ALTER TABLE `tbl_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_subject_branch`
--
ALTER TABLE `tbl_subject_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_subject_branch_details`
--
ALTER TABLE `tbl_subject_branch_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_subject_details`
--
ALTER TABLE `tbl_subject_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
