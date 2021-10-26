-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2021 at 09:43 AM
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
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_account_admin`
--

INSERT INTO `tbl_account_admin` (`id`, `admin_email`, `admin_password`) VALUES
(1, 'admin@admin.com', 'password');

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
(6, 'IMG_STAFF2021101856600.jpg', '0pE4j8UAcz', 'asd', 'ksgV5QCzV1', 'Male', '86HJ0eTIKi', '2021-10-11', 'oxfmc@1361.com', '737029'),
(7, 'IMG_STAFF2021102128071.jpg', 'user@user.com', 'user', 'Caldoza, Edsun J.', 'Male', 'Jaro, Leyte', '2001-02-19', 'edsunjcaldoza@gmail.com', '9393963695'),
(8, 'IMG_STAFF202110252309.jpg', 'audrey@gmail.com', 'audrey', 'Murillo, Jenio', 'Male', 'jaro, Leyte', '2001-02-19', 'audrey@gmail.com', '0939393963696');

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
(1, 3, 4, 7),
(4, 3, 5, 7),
(5, 3, 6, 7),
(6, 3, 7, 8),
(7, 4, 4, 8);

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
(7, 4, 19, 100),
(8, 4, 17, 75),
(9, 6, 17, 80),
(10, 6, 19, 100),
(11, 7, 19, 80),
(13, 8, 17, 100),
(14, 7, 17, 100);

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
(1, 'Grade 2'),
(3, 'Grade 3'),
(4, 'Grade 1'),
(5, 'Grade 4'),
(6, 'Grade 12 - ICT'),
(7, 'Grade 12 - ABM');

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
(2, 4, 19),
(3, 1, 19),
(5, 1, 17),
(6, 6, 19),
(7, 6, 17);

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
(1, '1st Quarter'),
(3, '2nd Quarter'),
(4, '3rd Quarter'),
(5, '4th Quarter');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school_year`
--

CREATE TABLE `tbl_school_year` (
  `id` int(11) NOT NULL,
  `sy_school_year` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_school_year`
--

INSERT INTO `tbl_school_year` (`id`, `sy_school_year`) VALUES
(3, '2021-2022'),
(4, '2022-2023'),
(5, '2024-2025');

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
(4, 'Hope', 4),
(5, 'Faith', 1),
(6, 'Justice', 3),
(7, 'Hopeless', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `stud_id_num` int(50) NOT NULL,
  `stud_name` varchar(100) NOT NULL,
  `stud_sex` varchar(50) NOT NULL,
  `stud_date_birth` varchar(50) NOT NULL,
  `stud_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `stud_id_num`, `stud_name`, `stud_sex`, `stud_date_birth`, `stud_address`) VALUES
(17, 1800633, 'Caldoza, Edsun J.', 'Male', '2001-02-19', 'Jaro, Leyte'),
(19, 1800634, 'Murillo, Jenio', 'Male', '2001-02-19', 'Alangalang, Leyte'),
(21, 1800634, 'Deladia, Audrey Neil Lego', 'Male', '2001-02-19', 'Jaro, Leyte');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `id` int(11) NOT NULL,
  `subject_class_id` int(11) NOT NULL,
  `subject_quarter_id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`id`, `subject_class_id`, `subject_quarter_id`, `subject_name`, `subject_teacher`) VALUES
(2, 1, 3, 'Science', 6),
(3, 1, 3, 'Math', 8),
(4, 1, 1, 'Math 1', 7),
(5, 6, 1, 'Science', 8),
(6, 6, 1, 'Math', 7),
(7, 6, 1, 'Araling Panlipunan', 8),
(8, 1, 3, 'Filipino', 8);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account_admin`
--
ALTER TABLE `tbl_account_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_account_staff`
--
ALTER TABLE `tbl_account_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_grade`
--
ALTER TABLE `tbl_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_grade_level`
--
ALTER TABLE `tbl_grade_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_populate_class`
--
ALTER TABLE `tbl_populate_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_quarter`
--
ALTER TABLE `tbl_quarter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_school_year`
--
ALTER TABLE `tbl_school_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_section`
--
ALTER TABLE `tbl_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
