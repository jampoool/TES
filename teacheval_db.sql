-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 05:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teacheval_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `adminID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `adminpassword` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `date_created` date NOT NULL,
  `date_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`adminID`, `username`, `adminpassword`, `status`, `date_created`, `date_updated`) VALUES
(1, '1', '123', 0, '2023-11-18', '2023-12-05'),
(2, 'admin', '123', 0, '0000-00-00', '2023-12-05'),
(3, 'paul', '123', 0, '2023-12-05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `categoryID` int(11) NOT NULL,
  `guidanceID` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `date_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblclass`
--

CREATE TABLE `tblclass` (
  `classID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `subID` int(11) NOT NULL,
  `teachID` int(11) NOT NULL,
  `classCode` varchar(10) NOT NULL,
  `className` varchar(25) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `date_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblclass`
--

INSERT INTO `tblclass` (`classID`, `adminID`, `subID`, `teachID`, `classCode`, `className`, `status`, `date_created`, `date_updated`) VALUES
(3, 2, 10, 4, 'BSIT', 'BSIT-2', 0, '2023-12-05', NULL),
(4, 2, 7, 123, 'CRIM', 'CRIMINOLOGY-2', 0, '2023-12-05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblguidancestaff`
--

CREATE TABLE `tblguidancestaff` (
  `guidance_ID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `G_fname` varchar(50) NOT NULL,
  `G_lname` varchar(50) NOT NULL,
  `G_emailAdd` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `date_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblguidancestaff`
--

INSERT INTO `tblguidancestaff` (`guidance_ID`, `adminID`, `G_fname`, `G_lname`, `G_emailAdd`, `password`, `status`, `date_created`, `date_updated`) VALUES
(756, 1, 'adsa', 'asd', 'ads', ' dsa', 0, '2023-11-18', NULL),
(2002, 2, 'admin ', 'guidance', 'guidance', 'guidance', 0, '2023-12-10', NULL),
(2454, 2, 'Jaybert', 'Sabsalon', 'sabsalon@gmail.com', ' 123', 0, '2023-12-02', NULL),
(17253, 2, 'sample2', 'sample2', 'sample2', '2', 0, '2023-12-02', NULL),
(20015, 1, '20015', '20015', '20015', ' 20015', 0, '2023-11-21', NULL),
(111111, 2, 'sample3', 'sample3', 'sample3', '3', 0, '2023-12-02', NULL),
(192037, 2, 'sample1', 'sample1', 'sample1', '1', 0, '2023-12-02', NULL),
(200166, 2, 'Bhern', 'Dumapias', 'bherndumapias@gmail.com', 'dumapias123', 0, '2023-11-18', '2023-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `tblquestion`
--

CREATE TABLE `tblquestion` (
  `questionID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `questionNo` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `studentID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `stud_fname` varchar(50) NOT NULL,
  `stud_lname` varchar(50) NOT NULL,
  `stud_emailAdd` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `date_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`studentID`, `adminID`, `stud_fname`, `stud_lname`, `stud_emailAdd`, `password`, `status`, `date_created`, `date_updated`) VALUES
(200166, 2, 'Jan Paul', 'Polinar', 'janpauldaguman-it@srcb.edu.ph', ' 123', 0, '2023-11-22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentclasses`
--

CREATE TABLE `tblstudentclasses` (
  `studentClassesID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `studID` int(11) NOT NULL,
  `classID` int(11) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE `tblsubject` (
  `subject_ID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `subCode` varchar(10) NOT NULL,
  `subName` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `date_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`subject_ID`, `adminID`, `subCode`, `subName`, `status`, `date_created`, `date_updated`) VALUES
(6, 1, '369', 'Math', 0, '2023-11-22', NULL),
(7, 1, '4812', 'RS', 0, '2023-11-22', NULL),
(8, 1, '51015', 'Web System', 0, '2023-11-22', NULL),
(9, 1, '61218', 'asdasd', 0, '2023-11-22', NULL),
(10, 1, '71421', 'qweqweq', 0, '2023-11-22', NULL),
(11, 1, '81624', 'zxcxzczc', 0, '2023-11-22', NULL),
(123, 2, 'MA3', 'Math 3', 0, '2023-12-03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblteacher`
--

CREATE TABLE `tblteacher` (
  `teacher_ID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `T_fname` varchar(50) NOT NULL,
  `T_lname` varchar(50) NOT NULL,
  `T_emailAdd` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `date_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblteacher`
--

INSERT INTO `tblteacher` (`teacher_ID`, `adminID`, `T_fname`, `T_lname`, `T_emailAdd`, `password`, `status`, `date_created`, `date_updated`) VALUES
(4, 2, 'Jan Paul1', 'Daguman1', 'daguman1@gmail.com', ' 1231', 0, '2023-11-21', '2023-11-21'),
(123, 2, 'Raniel', 'Dagoc', 'dagoc@gmail.com', ' 123', 0, '2023-12-05', NULL),
(2064, 2, 'Darlene', 'Maglangit', 'Maglangit@gmail.com', ' 123', 0, '2023-11-21', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `tblclass`
--
ALTER TABLE `tblclass`
  ADD PRIMARY KEY (`classID`),
  ADD KEY `FK_subject` (`subID`),
  ADD KEY `FK_teacher` (`teachID`);

--
-- Indexes for table `tblguidancestaff`
--
ALTER TABLE `tblguidancestaff`
  ADD PRIMARY KEY (`guidance_ID`);

--
-- Indexes for table `tblquestion`
--
ALTER TABLE `tblquestion`
  ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `tblstudentclasses`
--
ALTER TABLE `tblstudentclasses`
  ADD PRIMARY KEY (`studentClassesID`);

--
-- Indexes for table `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`subject_ID`);

--
-- Indexes for table `tblteacher`
--
ALTER TABLE `tblteacher`
  ADD PRIMARY KEY (`teacher_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblclass`
--
ALTER TABLE `tblclass`
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblquestion`
--
ALTER TABLE `tblquestion`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstudentclasses`
--
ALTER TABLE `tblstudentclasses`
  MODIFY `studentClassesID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblclass`
--
ALTER TABLE `tblclass`
  ADD CONSTRAINT `FK_subject` FOREIGN KEY (`subID`) REFERENCES `tblsubject` (`subject_ID`),
  ADD CONSTRAINT `FK_teacher` FOREIGN KEY (`teachID`) REFERENCES `tblteacher` (`teacher_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
