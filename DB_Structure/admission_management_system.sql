-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2016 at 11:30 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admission_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` text NOT NULL,
  `admin_password` varchar(135) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_name`, `admin_email`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'Ayan', ''),
(2, 'user', '123', 'aoyan gfgfg', 'aoyan@gmail.com'),
(3, 'dfgdfg', '343214', 'gtdfg', 'sdfsdfds'),
(4, 'sdfsdf', '0284bb853a649751efbca489e6132b12', 'sdsf', 'sdfsd'),
(5, 'new', '202cb962ac59075b964b07152d234b70', 'new', 'aoyan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(11) NOT NULL,
  `batch_name` text NOT NULL,
  `batch_course_fkey` int(110) NOT NULL,
  `batch_day` text NOT NULL,
  `batch_time` text NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `batch_name`, `batch_course_fkey`, `batch_day`, `batch_time`, `is_deleted`) VALUES
(6, 'B37', 11, 'Sun-Tues-Thurs', '5:30PM-9:30PM', 0),
(8, 'B34', 11, 'Sat-Mon-Wed', '1:30PM-5:30PM', 0),
(9, 'B36', 11, 'Sat-Mon-Wed', '9AM-1PM', 0),
(10, 'test', 12, 'Sat-Mon-Wed', '9AM-1PM', 0),
(14, 'tytey', 12, 'Sat-Mon-Wed', '9AM-1PM', 1),
(15, 'etytey', 12, 'Sat-Mon-Wed', '', 1),
(16, 'eyety', 12, 'Sat-Mon-Wed', '5:30PM-9:30PM', 1),
(17, 'terytery', 14, 'Sat-Mon-Wed', '5:30PM-9:30PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`) VALUES
(11, 'web development PHP'),
(12, 'Dot Net'),
(13, 'Graphics Design'),
(14, 'Android App Develpment');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `student_info_id` int(100) NOT NULL,
  `student_info_seid` text NOT NULL,
  `student_info_course_fkey` int(100) NOT NULL,
  `student_info_name` text NOT NULL,
  `student_info_gender` text NOT NULL,
  `student_info_national_id_number` varchar(300) NOT NULL,
  `student_info_date_of_birth` text NOT NULL,
  `student_info_present_address` text NOT NULL,
  `student_info_permanent_address` text NOT NULL,
  `student_info_home_district` text NOT NULL,
  `student_info_mobile_number` text NOT NULL,
  `student_info_email` varchar(300) NOT NULL,
  `student_info_religion` text NOT NULL,
  `student_info_ethnic_group` text NOT NULL,
  `student_info_education_level` text NOT NULL,
  `student_info_highest_class_completed` text NOT NULL,
  `student_info_completed_year` text NOT NULL,
  `student_info_currently_employed` text NOT NULL,
  `student_info_family_monthly_income` text NOT NULL,
  `student_info_physically_challenged` text NOT NULL,
  `student_info_mother_name` text NOT NULL,
  `student_info_mother_education_level` text NOT NULL,
  `student_info_mother_occupation` varchar(100) NOT NULL,
  `student_info_father_name` text NOT NULL,
  `student_info_father_occupation` varchar(100) NOT NULL,
  `student_info_father_annual_income` text NOT NULL,
  `student_info_family_own_home` text NOT NULL,
  `student_info_family_own_land` varchar(100) NOT NULL,
  `student_info_number_of_brother_and_sister` text NOT NULL,
  `student_info_photo` text NOT NULL,
  `student_info_aproved` int(11) NOT NULL DEFAULT '0',
  `student_info_batch_fkey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`student_info_id`, `student_info_seid`, `student_info_course_fkey`, `student_info_name`, `student_info_gender`, `student_info_national_id_number`, `student_info_date_of_birth`, `student_info_present_address`, `student_info_permanent_address`, `student_info_home_district`, `student_info_mobile_number`, `student_info_email`, `student_info_religion`, `student_info_ethnic_group`, `student_info_education_level`, `student_info_highest_class_completed`, `student_info_completed_year`, `student_info_currently_employed`, `student_info_family_monthly_income`, `student_info_physically_challenged`, `student_info_mother_name`, `student_info_mother_education_level`, `student_info_mother_occupation`, `student_info_father_name`, `student_info_father_occupation`, `student_info_father_annual_income`, `student_info_family_own_home`, `student_info_family_own_land`, `student_info_number_of_brother_and_sister`, `student_info_photo`, `student_info_aproved`, `student_info_batch_fkey`) VALUES
(3, '5425245', 11, 'cxxcvxcv', 'Male', '13412354', '11/01/2016', 'xgvcxv', 'xvcx', 'xcvxcv', 'cx24525', 'fssd@sdf.dgdgf', 'Islam', 'fgfd', 'fdgfdg', 'fdgfdg', 'fdgfd', 'Yes', 'fdgdf', 'No', 'dfsdf', 'sdfsdf', 'sdfs', '', 'dsfsdf', 'sdfsdf', 'Yes', 'Yes', 'sdfsdf', '', 1, 6),
(4, '634563', 11, 'er', '', '', '', '', '', '', '', '', 'Religion', '', '', '', '', '', '', ',movement,seeing,hearing,speech,test', '', '', '', '', '', '', '', '', '', '', 1, 6),
(5, '1404503', 11, 'sdfsd', 'Male', '543453345', '11/16/2016', 'jhjlhlnkl', 'jhojlnolnln', 'hjohjl', '54644', 'hkhg@khk.com', 'Islam', 'sunni', 'dfgdfg', 'fdgdfg', 'fdgdfg', 'Yes', 'gdfg', 'No,', 'gdfdfg', 'dfgdfg', 'fdgdfg', 'fdgdfg', 'fdgdf', 'fdgfdg', 'Yes', 'Yes', 'df2', 'empty', 1, 6),
(6, '245245', 11, 'fsgsdfdsf', 'Male', 'sfs3422', '11/08/2016', 'sdfsdf', 'sdfsdf', 'sdfsdf', '32432423', '3fas@sfsd.sfsdf', 'Islam', 'sunni', 'sfsdfd', 'dfsdfsd', 'sdfsdf', 'Yes', 'sdfsdf', 'No,', 'dfdafd', 'dsfsdf', 'sdfds', 'dfdsf', 'dsfsdfdsf', 'fdf', 'Yes', 'Yes', '3', '../../../resources/upload/16_11_30_12_11_41_1480509880.6564.jpg', 1, 6),
(7, '324234', 12, 'sfdsfsd', 'Male', '4214234', '11/08/2016', 'rwewer', 'werwerwewe', 'ewrwer', 'werewr', 'werewr@sfs.dfs', 'Islam', 'sdfs', 'sfs', 'sdfsd', 'sdfsd', 'Yes', 'sfs', 'Yes->,movement,seeing,hearing,speech,sdfsd', 'sdfsd', 'sdfs', 'dfsf', 'sdfs', 'sdfds', 'fsdfsd', 'Yes', 'Yes', '2', '../../../resources/upload/16_11_30_03_11_28_1480520547.8198.jpg', 1, 10),
(8, '', 12, 'hjgfhu', '', 'hgfgfh', '', 'gfh', '', '', '', '', 'Religion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'empty', 1, 10),
(9, 'fghfh', 11, 'fghfgh', '', 'hjfg', '', '', '', '', '', '', 'Religion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'empty', 1, 6),
(10, '24245', 11, 'sdfsdfsdfds', '', '', '', '', '', '', '', '', 'Religion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'empty', 1, 8),
(11, '234234', 12, 'gfxdgfdg', '', '', '', '', '', '', '', '', 'Religion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'empty', 1, 10),
(12, '34534543', 12, 'sfdsds', '', '', '', '', '', '', '', '', 'Religion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'empty', 1, 10),
(13, '1343124314', 11, 'fsdfsdf', '', '', '', '', '', '', '', '', 'Religion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'empty', 1, 6),
(14, '145045', 11, 'Kazi Naimul Houe', 'Male', '24524542545', '12/13/2016', 'ertretret', 'erererter', 'ertertrt', '2342343', '', 'Islam', '', 'sfddsfdsds', 'dfddd', '45454', 'No', '424324', 'No,', 'sdfsd', 'dsfdsf', 'sdfdf', 'dsfsdf', 'dsfdsf', 'dsfdsf', 'Yes', 'Yes', '4', '../../../resources/upload/16_12_02_09_12_26_1480669646.0309.png', 1, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`student_info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `student_info_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
