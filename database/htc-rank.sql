-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2021 at 03:48 AM
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
(2, 'IMG_ADMIN2021111864806.jpg', 'admin', 'admin', 'Caldoza, Edsun J.', 'edsunjcaldoza@gmail.com', '09393963696', 'Jaro, Leyte');

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
(16, 'IMG_STAFF2021111768542.jpg', 'edsuncaldoza', 'edsuncaldoza', 'Caldoza, Edsun J.', 'Male', 'Jaro, Leyte', '2001-02-19', 'edsunjcaldoza@gmail.com', '09393963696'),
(17, 'IMG_STAFF2021111410755.png', 'edsun', 'edsun', 'Caldoza, Edsun J. 2', 'Male', 'Jaro, Leyte', '2001-02-19', 'edsunjcaldoza@gmail.com', '09393963696'),
(18, 'IMG_STAFF2021111837385.jpg', 'edsun3', 'edsun3', 'Caldoza, Edsun J.', 'Male', 'Jaro, Leyte', '2001-02-19', 'edsunjcaldoza@gmail.com', '09393963696');

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
(5, 'Cards Day', 'Please visit our school to view the cards of your student enrolled in our institution', 'November 15, 2021, 7:32:31 AM');

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
(13, 6, 8, 16),
(14, 6, 9, 17),
(15, 7, 8, 16),
(16, 7, 9, 17);

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
(45, 16, 24, 97),
(47, 24, 24, 97),
(48, 24, 25, 98),
(50, 26, 24, 92),
(51, 26, 25, 80),
(52, 29, 24, 100),
(53, 29, 25, 75);

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
(8, 'Grade 1'),
(9, 'Grade 2');

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
(14, 8, 24),
(16, 8, 23),
(17, 10, 24),
(18, 11, 25),
(19, 13, 24),
(20, 13, 25),
(21, 14, 22),
(22, 14, 23);

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
(7, '1st Quarter'),
(8, '2nd Quarter'),
(9, '3rd Quarter'),
(10, '4th Quarter');

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
(6, '2021-2022', 'Active'),
(7, '2022-2023', 'Not Active'),
(8, '2023-2024', 'Not Active');

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
(8, 'Faith', 8),
(9, 'Hope', 9);

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
(22, 12345, 'IMG_STUDENT2021111522771.png', 'Murillo, Jenio B.', 'Male', '1987-09-23', 'Alangalang, Leyte', '12345', '12345'),
(23, 67890, 'IMG_STUDENT2021111489841.png', 'Cadapan, Mark Ryan M.', 'Male', '1986-09-03', 'Jaro, Leyte', '67890', '67890'),
(24, 1800633, 'IMG_STUDENT2021111249999.png', 'Caldoza, Edsun J', 'Male', '2001-02-19', 'Jaro, Leyte', '1800633', '1800633'),
(25, 1800634, '', 'Collantes, Arjehn Paul M', 'Male', '2001-02-19', 'Sta. Rita, Samar', '1800634', '1800634');

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
(16, 8, 7, 3, 16),
(18, 8, 7, 2, 16),
(19, 8, 8, 2, 16),
(20, 8, 8, 3, 16),
(21, 9, 7, 2, 16),
(22, 11, 7, 2, 16),
(23, 11, 7, 3, 16),
(24, 13, 7, 2, 16),
(26, 13, 7, 3, 17),
(27, 15, 7, 2, 16),
(28, 15, 7, 3, 16),
(29, 13, 8, 2, 16),
(30, 13, 8, 3, 17);

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
(2, 'Math'),
(3, 'Science');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_grade`
--
ALTER TABLE `tbl_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_grade_level`
--
ALTER TABLE `tbl_grade_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_populate_class`
--
ALTER TABLE `tbl_populate_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_quarter`
--
ALTER TABLE `tbl_quarter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_school_details`
--
ALTER TABLE `tbl_school_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_school_year`
--
ALTER TABLE `tbl_school_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_section`
--
ALTER TABLE `tbl_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_subject_details`
--
ALTER TABLE `tbl_subject_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
