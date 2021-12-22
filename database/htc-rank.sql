-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 03:35 AM
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
-- Table structure for table `tbl_account_registrar`
--

CREATE TABLE `tbl_account_registrar` (
  `id` int(11) NOT NULL,
  `reg_image` varchar(500) NOT NULL,
  `reg_username` varchar(100) NOT NULL,
  `reg_password` varchar(100) NOT NULL,
  `reg_name` varchar(100) NOT NULL,
  `reg_sex` varchar(50) NOT NULL,
  `reg_address` varchar(100) NOT NULL,
  `reg_birth_date` varchar(100) NOT NULL,
  `reg_email` varchar(100) NOT NULL,
  `reg_contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_account_registrar`
--

INSERT INTO `tbl_account_registrar` (`id`, `reg_image`, `reg_username`, `reg_password`, `reg_name`, `reg_sex`, `reg_address`, `reg_birth_date`, `reg_email`, `reg_contact`) VALUES
(3, 'IMG_REG202112154644.png', 'edsun', '$2y$10$heXmuVQMHK9Kk.d7g673Y.0Ff/pN3BXnR5mM1tcSZHmhDHizQkt1G', 'Edsun', 'Male', 'Jaro', '2001-02-19', 'edsunjcaldoza@gmail.com', '09393963696');

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

--
-- Dumping data for table `tbl_account_staff`
--

INSERT INTO `tbl_account_staff` (`id`, `staff_image`, `staff_username`, `staff_password`, `staff_name`, `staff_sex`, `staff_address`, `staff_date_birth`, `staff_email`, `staff_contact`) VALUES
(21, 'IMG_STAFF2021120710386.png', 'user1', '$2y$10$VcFOIvnAnZ30JR9CENwsB.Caq6H302C2nSffKJ1vWKT06Aej/yVyK', 'Caldoza, Edsun J.', 'Male', 'Jaro, Leyte', '2001-02-19', 'user1@gmail.com', '09393963696');

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
(7, 'Birthday ni Yanyan', 'Attend Kamo...', 'November 19, 2021, 2:40:42 PM'),
(8, 'LOL', 'LOL', 'December 9, 2021, 10:19:42 PM');

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

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`id`, `class_sy`, `class_section`, `class_adviser`) VALUES
(25, 15, 18, 21),
(26, 15, 18, 21),
(27, 15, 18, 21);

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

--
-- Dumping data for table `tbl_grade`
--

INSERT INTO `tbl_grade` (`id`, `grade_subject_id`, `grade_stud_id`, `grade`) VALUES
(77, 55, 37, 90);

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

--
-- Dumping data for table `tbl_grade_branch`
--

INSERT INTO `tbl_grade_branch` (`id`, `gbranch_subject_id`, `gbranch_stud_id`, `gbranch_grade`) VALUES
(17, 31, 37, 97),
(18, 32, 37, 89),
(19, 36, 37, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade_level`
--

CREATE TABLE `tbl_grade_level` (
  `id` int(11) NOT NULL,
  `gl_grade_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_grade_level`
--

INSERT INTO `tbl_grade_level` (`id`, `gl_grade_level`) VALUES
(16, 'Grade 1'),
(17, 'Grade 2'),
(18, 'Grade 3'),
(19, 'Grade 4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `id` int(11) NOT NULL,
  `log_desc` varchar(500) NOT NULL,
  `log_ts` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`id`, `log_desc`, `log_ts`) VALUES
(11, 'Deleted Subject Branch', 'December 9, 2021, 10:31:59 PM'),
(12, 'Added Registrar Account - Edsun Registrar', 'December 15, 2021, 8:48:06 PM'),
(13, 'Updated Registrar Account - Edsun Registrar', 'December 15, 2021, 8:54:58 PM'),
(14, 'Updated Registrar Account - Edsun Registrar', 'December 15, 2021, 8:55:10 PM'),
(15, 'Deleted A Registrar Account', 'December 15, 2021, 8:56:15 PM'),
(16, 'Added Registrar Account - Registrar', 'December 15, 2021, 8:57:27 PM'),
(17, 'Deleted A Registrar Account', 'December 15, 2021, 8:57:33 PM'),
(18, 'Added Registrar Account - Edsun', 'December 15, 2021, 9:00:36 PM'),
(19, 'Updated Registrar Account - Edsun', 'December 15, 2021, 9:12:03 PM'),
(20, 'Updated Registrar Account - Edsun', 'December 15, 2021, 9:12:17 PM'),
(21, 'Updated Registrar Account - Edsun', 'December 15, 2021, 9:31:57 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_populate_class`
--

CREATE TABLE `tbl_populate_class` (
  `id` int(11) NOT NULL,
  `pop_class_id` int(11) NOT NULL,
  `pop_stud_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_populate_class`
--

INSERT INTO `tbl_populate_class` (`id`, `pop_class_id`, `pop_stud_id`) VALUES
(30, 25, 37);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quarter`
--

CREATE TABLE `tbl_quarter` (
  `id` int(11) NOT NULL,
  `q_quarter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_quarter`
--

INSERT INTO `tbl_quarter` (`id`, `q_quarter`) VALUES
(21, '1st Quarter'),
(22, '2nd Quarter'),
(23, '3rd Quarter');

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

--
-- Dumping data for table `tbl_school_year`
--

INSERT INTO `tbl_school_year` (`id`, `sy_school_year`, `sy_status`) VALUES
(15, '2020-2021', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_section`
--

CREATE TABLE `tbl_section` (
  `id` int(11) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_grade_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_section`
--

INSERT INTO `tbl_section` (`id`, `s_name`, `s_grade_level`) VALUES
(18, 'Justice', 16);

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

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `stud_id_num`, `stud_img`, `stud_name`, `stud_sex`, `stud_date_birth`, `stud_address`, `stud_username`, `stud_password`) VALUES
(37, 1800635, '', 'Caldoza, Edsun J', 'Male', '2001-02-19', 'Jaro, Leyte', '1800635', '$2y$10$JNj78t4QPkB0sUltFIn1vOf7GmgakwQkZ7cIQ4SsjtVWqfFCWzUf6'),
(38, 1800633, '', 'Caldoza, Edsun J', 'Male', '2001-02-19', 'Jaro, Leyte', '1800633', '$2y$10$WmqDmwl0TkBjd2fzK9ESbuSSvrr20C2Q7oeSlbwHH/mSLHp5KLo2.'),
(39, 123, '', 'Caldoza,', 'Male', '2001-02-19', 'Jaro, Leyte', '123', '$2y$10$As/qSk53XsODE/zrGINSrOvCtIXfFFL36YBHmTROdklJK4WZJ40AS');

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

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`id`, `subject_class_id`, `subject_quarter_id`, `subject_id`, `subject_teacher`) VALUES
(55, 25, 21, 12, 21);

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

--
-- Dumping data for table `tbl_subject_branch`
--

INSERT INTO `tbl_subject_branch` (`id`, `sbranch_class_id`, `sbranch_quarter_id`, `sbranch_subject_id`, `sbranch_teacher`) VALUES
(40, 25, 21, 17, 21),
(41, 25, 22, 16, 21),
(43, 25, 22, 18, 21),
(48, 25, 23, 19, 21),
(49, 25, 21, 16, 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject_branch_details`
--

CREATE TABLE `tbl_subject_branch_details` (
  `id` int(11) NOT NULL,
  `sbranch_main_subject_id` int(11) NOT NULL,
  `sbranch_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subject_branch_details`
--

INSERT INTO `tbl_subject_branch_details` (`id`, `sbranch_main_subject_id`, `sbranch_name`) VALUES
(16, 12, 'Music'),
(17, 12, 'Arts'),
(18, 12, 'PE'),
(19, 12, 'Health');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject_details`
--

CREATE TABLE `tbl_subject_details` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subject_details`
--

INSERT INTO `tbl_subject_details` (`id`, `subject_name`) VALUES
(12, 'MAPEH'),
(13, 'Science');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account_admin`
--
ALTER TABLE `tbl_account_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_account_registrar`
--
ALTER TABLE `tbl_account_registrar`
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
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
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
-- AUTO_INCREMENT for table `tbl_account_registrar`
--
ALTER TABLE `tbl_account_registrar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_account_staff`
--
ALTER TABLE `tbl_account_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_grade`
--
ALTER TABLE `tbl_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_grade_branch`
--
ALTER TABLE `tbl_grade_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_grade_level`
--
ALTER TABLE `tbl_grade_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_populate_class`
--
ALTER TABLE `tbl_populate_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_quarter`
--
ALTER TABLE `tbl_quarter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_school_details`
--
ALTER TABLE `tbl_school_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_school_year`
--
ALTER TABLE `tbl_school_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_section`
--
ALTER TABLE `tbl_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_subject_branch`
--
ALTER TABLE `tbl_subject_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_subject_branch_details`
--
ALTER TABLE `tbl_subject_branch_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_subject_details`
--
ALTER TABLE `tbl_subject_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
