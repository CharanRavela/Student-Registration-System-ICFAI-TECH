-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 08:32 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `password`) VALUES
('admin', 'pass123');

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `name` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  `DELETED` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`name`, `status`, `DELETED`) VALUES
('ML04', 4, 'N'),
('NL32', 2, 'N'),
('ML10', 3, 'Y'),
('302', 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `classroom_details`
--

CREATE TABLE `classroom_details` (
  `CRNO` int(11) DEFAULT NULL,
  `cid` varchar(50) DEFAULT NULL,
  `section` int(11) DEFAULT NULL,
  `DELETED` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classroom_details`
--

INSERT INTO `classroom_details` (`CRNO`, `cid`, `section`, `DELETED`) VALUES
(118, 'AO311', 1, 'N'),
(118, 'AO311', 2, 'N'),
(117, 'AO311', 3, 'N'),
(116, 'AO311', 4, 'N'),
(116, 'AO312', 1, 'N'),
(117, 'AO312', 2, 'N'),
(119, 'AO312', 3, 'N'),
(119, 'AO312', 4, 'N'),
(124, 'CE313/ME313', 1, 'N'),
(113, 'CE314', 1, 'N'),
(113, 'CE315', 1, 'N'),
(113, 'CE316', 1, 'N'),
(113, 'CE317', 1, 'N'),
(114, 'CE402', 1, 'N'),
(114, 'CE419', 1, 'N'),
(102, 'CHEM111', 1, 'Y'),
(102, 'CHEM111', 2, 'N'),
(105, 'CHEM111', 3, 'N'),
(213, 'CHEM111', 4, 'N'),
(117, 'CS312', 1, 'N'),
(117, 'CS312', 2, 'N'),
(117, 'CS312', 3, 'N'),
(119, 'CS313', 1, 'N'),
(119, 'CS313', 2, 'N'),
(116, 'CS313', 3, 'N'),
(116, 'CS314', 1, 'N'),
(118, 'CS314', 2, 'N'),
(118, 'CS314', 3, 'N'),
(118, 'CS315', 1, 'N'),
(117, 'CS315', 2, 'N'),
(117, 'CS315', 3, 'N'),
(321, 'CS406', 1, 'N'),
(325, 'CS413', 1, 'N'),
(321, 'CS418', 1, 'N'),
(325, 'DS311', 1, 'N'),
(325, 'DS313', 1, 'N'),
(325, 'DS314', 1, 'N'),
(325, 'DS321', 1, 'N'),
(325, 'DS325', 1, 'N'),
(321, 'DS404', 1, 'N'),
(321, 'DS411', 1, 'N'),
(321, 'DS414', 1, 'N'),
(126, 'EC311/CS311', 1, 'N'),
(116, 'EC311/CS311', 2, 'N'),
(116, 'EC311/CS311', 3, 'N'),
(120, 'EC312', 1, 'N'),
(120, 'EC313', 1, 'N'),
(120, 'EC315', 1, 'N'),
(316, 'EC406', 1, 'N'),
(316, 'EC414', 1, 'N'),
(316, 'EC422', 1, 'N'),
(110, 'EGL112', 1, 'N'),
(110, 'EGL112', 2, 'N'),
(105, 'EGL112', 3, 'N'),
(105, 'EGL112', 4, 'N'),
(203, 'EN214', 1, 'N'),
(203, 'EN214', 2, 'N'),
(305, 'EN214', 3, 'N'),
(305, 'EN214', 4, 'N'),
(212, 'ES211', 1, 'N'),
(302, 'ES211', 2, 'N'),
(302, 'ES211', 3, 'N'),
(212, 'ES211', 4, 'N'),
(203, 'ES212', 1, 'N'),
(203, 'ES212', 2, 'N'),
(212, 'ES212', 3, 'N'),
(212, 'ES212', 4, 'N'),
(203, 'ES231', 1, 'N'),
(203, 'ES231', 2, 'N'),
(305, 'ES231', 3, 'N'),
(305, 'ES231', 4, 'N'),
(126, 'EVS117', 1, 'N'),
(213, 'EVS117', 2, 'N'),
(213, 'EVS117', 3, 'N'),
(110, 'EVS117', 4, 'N'),
(302, 'MA215', 1, 'N'),
(302, 'MA215', 2, 'N'),
(203, 'MA215', 3, 'N'),
(203, 'MA215', 4, 'N'),
(305, 'MA216', 1, 'N'),
(305, 'MA216', 2, 'N'),
(212, 'MA216', 3, 'N'),
(212, 'MA216', 4, 'N'),
(104, 'MATH113', 1, 'N'),
(105, 'MATH113', 2, 'N'),
(110, 'MATH113', 3, 'N'),
(104, 'MATH113', 4, 'N'),
(124, 'ME311', 1, 'N'),
(124, 'ME312', 1, 'N'),
(124, 'ME313', 1, 'N'),
(124, 'ME314', 1, 'N'),
(304, 'ME403', 1, 'N'),
(304, 'ME410', 1, 'N'),
(304, 'ME412', 1, 'N'),
(316, 'ME413', 1, 'N'),
(304, 'MECHC422', 1, 'N'),
(304, 'ME425', 1, 'N'),
(304, 'MEC221', 1, 'N'),
(304, 'MEC311', 1, 'N'),
(325, 'MEC312', 1, 'N'),
(316, 'MEC408', 1, 'N'),
(212, 'MG217', 1, 'N'),
(302, 'MG217', 2, 'N'),
(302, 'MG217', 3, 'N'),
(212, 'MG217', 4, 'N'),
(213, 'PHY114', 1, 'N'),
(126, 'PHY114', 2, 'N'),
(102, 'PHY114', 3, 'N'),
(126, 'PHY114', 4, 'N'),
(102, 'TA115-1', 1, 'N'),
(104, 'TA115-1', 2, 'N'),
(104, 'TA115-2', 1, 'N'),
(105, 'TA115-2', 2, 'N'),
(105, 'TA116', 1, 'N'),
(126, 'TA116', 2, 'N'),
(105, 'TA116', 3, 'N'),
(104, 'TA116', 4, 'N'),
(120, 'EC314', 1, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` varchar(30) DEFAULT NULL,
  `c_name` varchar(60) DEFAULT NULL,
  `L` int(11) DEFAULT NULL,
  `P` int(11) DEFAULT NULL,
  `U` int(11) DEFAULT NULL,
  `section` int(11) DEFAULT NULL,
  `fid` int(11) DEFAULT NULL,
  `yearof` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `c_name`, `L`, `P`, `U`, `section`, `fid`, `yearof`) VALUES
('AO311', 'Operations Research', 3, 0, 3, 1, 1, 3),
('AO311', 'Operations Research', 3, 0, 3, 2, 2, 3),
('AO311', 'Operations Research', 3, 0, 3, 3, 3, 3),
('AO311', 'Operations Research', 3, 0, 3, 4, 4, 3),
('AO312', 'Control Systems', 3, 0, 3, 1, 5, 3),
('AO312', 'Control Systems', 3, 0, 3, 2, 6, 3),
('AO312', 'Control Systems', 3, 0, 3, 3, 7, 3),
('AO312', 'Control Systems', 3, 0, 3, 4, 8, 3),
('CE313/ME313', 'Fluid Mechanics', 2, 2, 3, 1, 9, 3),
('CE314', 'Soil Mechanics', 3, 2, 4, 1, 11, 3),
('CE315', 'Analysis of Structures', 3, 0, 3, 1, 12, 3),
('CE316', 'Water Supply and Waste Water Engineering', 3, 0, 3, 1, 13, 3),
('CE317', 'Water Resource Engineering', 3, 0, 3, 1, 14, 3),
('CE402', 'Design of Special Concrete Structures', 3, 0, 3, 1, 14, 4),
('CE419', 'Advanced Transportation', 3, 0, 3, 1, 13, 4),
('CHEM111', 'Chemistry', 3, 0, 3, 1, 15, 1),
('CHEM111', 'Chemistry', 3, 0, 3, 2, 16, 1),
('CHEM111', 'Chemistry', 3, 0, 3, 3, 16, 1),
('CHEM111', 'Chemistry', 3, 0, 3, 4, 17, 1),
('CS312', 'Data Structures', 3, 0, 3, 1, 18, 3),
('CS312', 'Data Structures', 3, 0, 3, 2, 19, 3),
('CS312', 'Data Structures', 3, 0, 3, 3, 20, 3),
('CS313', 'Operating System', 3, 0, 3, 1, 20, 3),
('CS313', 'Operating System', 3, 0, 3, 2, 21, 3),
('CS313', 'Operating System', 3, 0, 3, 3, 22, 3),
('CS314', 'Theory of Computation', 3, 0, 3, 1, 23, 3),
('CS314', 'Theory of Computation', 3, 0, 3, 2, 24, 3),
('CS314', 'Theory of Computation', 3, 0, 3, 3, 21, 3),
('CS315', 'Computer Graphics', 3, 2, 4, 1, 25, 3),
('CS315', 'Computer Graphics', 3, 2, 4, 2, 26, 3),
('CS315', 'Computer Graphics', 3, 2, 4, 3, 27, 3),
('CS406', 'Network Security', 3, 0, 3, 1, 28, 4),
('CS413', 'Software Engineering', 3, 0, 3, 1, 29, 4),
('CS418', 'Advanced Computer Architecture', 3, 0, 3, 1, 22, 4),
('DS311', 'Artificial Intelligence', 3, 0, 3, 1, 26, 4),
('DS313', 'Introduction to Data Science', 3, 0, 3, 1, 23, 4),
('DS314', 'Data Warehousing and Mining', 3, 0, 3, 1, 19, 3),
('DS321', 'Machine Learning', 3, 2, 4, 1, 30, 4),
('DS325', 'Neural NETWORK and Fuzzy Logic', 3, 0, 3, 1, 25, 4),
('DS404', 'Big Data Systems', 3, 0, 3, 1, 24, 4),
('DS411', 'Internet of Things', 3, 0, 3, 1, 31, 4),
('DS414', 'Fundamentals of Blockchain Technology', 3, 0, 3, 1, 22, 4),
('EC311/CS311', 'Microprocessor Programming and Interfacing', 3, 0, 3, 1, 32, 3),
('EC311/CS311', 'Microprocessor Programming and Interfacing', 3, 0, 3, 2, 5, 3),
('EC311/CS311', 'Microprocessor Programming and Interfacing', 3, 0, 3, 3, 33, 3),
('EC312', 'Communication Systems', 3, 2, 4, 1, 33, 3),
('EC313', 'Electromagnetic Fields and Waves', 3, 0, 3, 1, 34, 3),
('EC314', 'Microelectronis Circuits', 3, 0, 3, 1, 35, 3),
('EC315', 'Digital Signal Processing', 3, 0, 3, 1, 36, 3),
('EC406', 'Mobile Communiation', 3, 0, 3, 1, 36, 4),
('EC414', 'VLSI design for testability', 3, 0, 3, 1, 32, 4),
('EC422', 'Image Processing', 3, 0, 3, 1, 37, 4),
('EGL112', 'English Language Skills', 3, 0, 3, 1, 38, 1),
('EGL112', 'English Language Skills', 3, 0, 3, 2, 39, 1),
('EGL112', 'English Language Skills', 3, 0, 3, 3, 38, 1),
('EGL112', 'English Language Skills', 3, 0, 3, 4, 39, 1),
('EN214', 'Principles of Economics', 3, 0, 3, 1, 41, 2),
('EN214', 'Principles of Economics', 3, 0, 3, 2, 41, 2),
('EN214', 'Principles of Economics', 3, 0, 3, 3, 41, 2),
('EN214', 'Principles of Economics', 3, 0, 3, 4, 41, 2),
('ES211', 'Electrical Sciences I', 3, 0, 3, 1, 42, 2),
('ES211', 'Electrical Sciences I', 3, 0, 3, 2, 43, 2),
('ES211', 'Electrical Sciences I', 3, 0, 3, 3, 7, 2),
('ES211', 'Electrical Sciences I', 3, 0, 3, 4, 8, 2),
('ES212', 'Structural and Properties of Materials', 3, 0, 3, 1, 10, 2),
('ES212', 'Structural and Properties of Materials', 3, 0, 3, 2, 44, 2),
('ES212', 'Structural and Properties of Materials', 3, 0, 3, 3, 45, 2),
('ES212', 'Structural and Properties of Materials', 3, 0, 3, 4, 46, 2),
('ES231', 'Engineering Mechanics', 3, 0, 3, 1, 10, 2),
('ES231', 'Engineering Mechanics', 3, 0, 3, 2, 47, 2),
('ES231', 'Engineering Mechanics', 3, 0, 3, 3, 48, 2),
('ES231', 'Engineering Mechanics', 3, 0, 3, 4, 49, 2),
('EVS117', 'Envinormental Science', 2, 0, 2, 1, 17, 1),
('EVS117', 'Envinormental Science', 2, 0, 2, 2, 16, 1),
('EVS117', 'Envinormental Science', 2, 0, 2, 3, 15, 1),
('EVS117', 'Envinormental Science', 2, 0, 2, 4, 15, 1),
('MA215', 'Complex variables', 3, 0, 3, 1, 50, 2),
('MA215', 'Complex variables', 3, 0, 3, 2, 51, 2),
('MA215', 'Complex variables', 3, 0, 3, 3, 1, 2),
('MA215', 'Complex variables', 3, 0, 3, 4, 2, 2),
('MA216', 'Differential Equations and Fourier Series', 3, 0, 3, 1, 3, 2),
('MA216', 'Differential Equations and Fourier Series', 3, 0, 3, 2, 4, 2),
('MA216', 'Differential Equations and Fourier Series', 3, 0, 3, 3, 50, 2),
('MA216', 'Differential Equations and Fourier Series', 3, 0, 3, 4, 51, 2),
('MATH113', 'Linear Algebra', 3, 0, 3, 1, 51, 1),
('MATH113', 'Linear Algebra', 3, 0, 3, 2, 3, 1),
('MATH113', 'Linear Algebra', 3, 0, 3, 3, 4, 1),
('MATH113', 'Linear Algebra', 3, 0, 3, 4, 50, 1),
('ME311', 'Applied Thermodynamics', 2, 2, 3, 1, 52, 3),
('ME312', 'Kinematics of Machines', 3, 0, 3, 1, 54, 3),
('ME313', 'Production Techniques', 3, 2, 4, 1, 45, 3),
('ME314', 'Machine Drawing', 2, 2, 3, 1, 56, 3),
('ME403', 'Computer Aided Manufacturing', 3, 0, 3, 1, 58, 4),
('ME410', 'Unconvenctional Machining', 3, 0, 3, 1, 55, 4),
('ME412', 'Automotive Engineering', 3, 0, 3, 1, 47, 4),
('ME413', 'Refrigiration and Air Conditioning', 2, 2, 3, 1, 44, 4),
('MECHC422', 'Additive Manufracturing Processes and Applications', 2, 2, 3, 1, 49, 4),
('ME425', 'Jet Propulsion and Rocket Engineering', 3, 0, 3, 1, 10, 4),
('MEC221', 'Elements of Mechatronics', 3, 0, 3, 1, 56, 2),
('MEC311', 'Intoduction to Robotics', 3, 0, 3, 1, 59, 3),
('MEC312', 'Materials foe Mechatronics Systems', 3, 0, 3, 1, 45, 3),
('MEC408', 'Mobile Robotics', 3, 0, 3, 1, 54, 4),
('MG217', 'Principles of Management', 3, 0, 3, 1, 60, 2),
('MG217', 'Principles of Management', 3, 0, 3, 2, 61, 2),
('MG217', 'Principles of Management', 3, 0, 3, 3, 60, 2),
('MG217', 'Principles of Management', 3, 0, 3, 4, 58, 2),
('PHY114', 'Physics I', 3, 0, 3, 1, 18, 1),
('PHY114', 'Physics I', 3, 0, 3, 2, 46, 1),
('PHY114', 'Physics I', 3, 0, 3, 3, 34, 1),
('PHY114', 'Physics I', 3, 0, 3, 4, 48, 1),
('TA115-1', 'Engineering Graphics', 2, 4, 4, 1, 9, 1),
('TA115-1', 'Engineering Graphics', 2, 4, 4, 2, 59, 1),
('TA115-2', 'Workshop Practice', 2, 4, 4, 1, 52, 1),
('TA115-2', 'Workshop Practice', 2, 4, 4, 2, 55, 1),
('TA116', 'Computer Programming I', 3, 0, 3, 1, 31, 1),
('TA116', 'Computer Programming I', 3, 0, 3, 2, 62, 1),
('TA116', 'Computer Programming I', 3, 0, 3, 3, 27, 1),
('CS491/CE491/EC491/ME491', 'Special Project', 3, 0, 3, 1, 63, 4),
('TA116', 'Computer Programming 1', 3, 0, 3, 4, 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE `course_details` (
  `cid` varchar(25) DEFAULT NULL,
  `section` int(11) DEFAULT NULL,
  `c_hours` int(11) DEFAULT NULL,
  `c_days` varchar(10) DEFAULT NULL,
  `roomno` int(11) DEFAULT NULL,
  `c_commonhour` varchar(20) DEFAULT NULL,
  `yearof` int(11) DEFAULT NULL,
  `strength` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`cid`, `section`, `c_hours`, `c_days`, `roomno`, `c_commonhour`, `yearof`, `strength`) VALUES
('AO311', 1, 4, 'M W F', 118, 'T1', 3, 40),
('AO311', 2, 4, 'T TH S', 118, 'T1', 3, 40),
('AO311', 3, 5, 'M W F', 117, 'T1', 3, 40),
('AO311', 4, 5, 'T TH S', 116, 'T1', 3, 40),
('AO312', 1, 5, 'M W F', 116, 'W1', 3, 40),
('AO312', 2, 5, 'T TH S', 117, 'W1', 3, 40),
('AO312', 3, 4, 'M W F', 119, 'W1', 3, 40),
('AO312', 4, 4, 'T TH S', 119, 'W1', 3, 40),
('CE313/ME313', 1, 6, 'T TH', 124, 'S7', 3, 40),
('CE314', 1, 3, 'M W F', 113, 'T8', 3, 40),
('CE315', 1, 2, 'M W F', 113, 'TH1', 3, 40),
('CE316', 1, 2, 'T TH S', 113, 'M8', 3, 40),
('CE317', 1, 6, 'M W F', 113, 'F8', 3, 40),
('CE402', 1, 1, 'M W F', 114, 'W1', 4, 40),
('CE419', 1, 6, 'T TH S', 114, 'S6', 4, 40),
('CHEM111', 1, 2, 'M W F', 102, 'W1', 1, 39),
('CHEM111', 2, 4, 'T TH S', 102, 'W1', 1, 40),
('CHEM111', 3, 6, 'T TH S', 105, 'W1', 1, 39),
('CHEM111', 4, 3, 'M W F', 213, 'W1', 1, 40),
('CS312', 1, 3, 'M W F', 117, 'TH1', 3, 40),
('CS312', 2, 3, 'T TH S', 117, 'TH1', 3, 40),
('CS312', 3, 6, 'M W F', 117, 'TH1', 3, 40),
('CS313', 1, 2, 'M W F', 119, 'F8', 3, 40),
('CS313', 2, 6, 'T TH S', 119, 'F8', 3, 40),
('CS313', 3, 7, 'M W F', 116, 'F8', 3, 40),
('CS314', 1, 3, 'T TH S', 116, 'S1', 3, 40),
('CS314', 2, 6, 'M W F', 118, 'S1', 3, 40),
('CS314', 3, 2, 'T TH S', 118, 'S1', 3, 40),
('CS315', 1, 3, 'M W F', 118, 'F1', 3, 40),
('CS315', 2, 2, 'T TH S', 117, 'F1', 3, 40),
('CS315', 3, 2, 'M W F', 117, 'F1', 3, 40),
('CS406', 1, 4, 'T TH S', 321, 'T4', 4, 40),
('CS413', 1, 6, 'M W F', 325, 'F6', 4, 40),
('CS418', 1, 5, 'M W F', 321, 'M5', 4, 40),
('DS311', 1, 8, 'T TH S', 325, 'T8', 4, 40),
('DS313', 1, 7, 'T TH S', 325, 'S7', 4, 40),
('DS314', 1, 6, 'T TH S', 325, 'S6', 3, 40),
('DS321', 1, 2, 'M W F', 325, 'F8', 4, 40),
('DS325', 1, 5, 'M W F', 325, 'W5', 4, 40),
('DS404', 1, 2, 'M W F', 321, 'F2', 4, 40),
('DS411', 1, 5, 'T TH S', 321, 'S1', 4, 40),
('DS414', 1, 1, 'M W F', 321, 'W1', 4, 40),
('EC311/CS311', 1, 3, 'M W F', 126, 'M8', 3, 40),
('EC311/CS311', 2, 2, 'M W F', 116, 'M8', 3, 40),
('EC311/CS311', 3, 2, 'T TH S', 116, 'M8', 3, 40),
('EC312', 1, 7, 'T TH S', 120, 'W6', 3, 40),
('EC313', 1, 6, 'T TH S', 120, 'F8', 3, 40),
('EC315', 1, 8, 'T TH S', 120, 'S1', 3, 40),
('EC406', 1, 2, 'T TH S', 316, 'T2', 4, 40),
('EC414', 1, 1, 'M W F', 316, 'M1', 4, 40),
('EC422', 1, 3, 'M W F', 316, 'M8', 4, 40),
('EGL112', 1, 5, 'M W F', 110, 'S8', 1, 38),
('EGL112', 2, 5, 'T TH S', 110, 'S8', 1, 40),
('EGL112', 3, 2, 'M W F', 105, 'S8', 1, 40),
('EGL112', 4, 3, 'T TH S', 105, 'S8', 1, 40),
('EN214', 1, 3, 'M W F', 203, 'T1', 2, 40),
('EN214', 2, 3, 'T TH S', 203, 'T1', 2, 40),
('EN214', 3, 2, 'M W F', 305, 'T1', 2, 40),
('EN214', 4, 2, 'T TH S', 305, 'T1', 2, 39),
('ES211', 1, 3, 'M W F', 212, 'M1', 2, 39),
('ES211', 2, 3, 'T TH S', 302, 'M1', 2, 40),
('ES211', 3, 2, 'M W F', 302, 'M1', 2, 40),
('ES211', 4, 2, 'T TH S', 212, 'M1', 2, 40),
('ES212', 1, 6, 'M W F', 203, 'S1', 2, 40),
('ES212', 2, 6, 'T TH S', 203, 'S1', 2, 39),
('ES212', 3, 5, 'M W F', 212, 'S1', 2, 40),
('ES212', 4, 5, 'T TH S', 212, 'S1', 2, 40),
('ES231', 1, 2, 'M W F', 203, 'TH1', 2, 39),
('ES231', 2, 2, 'T TH S', 203, 'TH1', 2, 40),
('ES231', 3, 3, 'M W F', 305, 'TH1', 2, 40),
('ES231', 4, 3, 'T TH S', 305, 'TH1', 2, 40),
('EVS117', 1, 3, 'T TH', 126, 'F1', 1, 39),
('EVS117', 2, 8, 'W F', 213, 'F1', 1, 39),
('EVS117', 3, 6, 'T TH', 213, 'F1', 1, 40),
('EVS117', 4, 6, 'W F', 110, 'F1', 1, 40),
('MA215', 1, 8, 'M W F', 302, 'F1', 2, 40),
('MA215', 2, 7, 'T TH S', 302, 'F1', 2, 40),
('MA215', 3, 7, 'M W F', 203, 'F1', 2, 39),
('MA215', 4, 8, 'T TH S', 203, 'F1', 2, 40),
('MA216', 1, 7, 'M W F', 305, 'W1', 2, 40),
('MA216', 2, 7, 'T TH S', 305, 'W1', 2, 40),
('MA216', 3, 4, 'M W F', 212, 'W1', 2, 39),
('MA216', 4, 4, 'T TH S', 212, 'W1', 2, 40),
('MATH113', 1, 2, 'T TH S', 104, 'S1', 1, 39),
('MATH113', 2, 3, 'M W F', 105, 'S1', 1, 40),
('MATH113', 3, 3, 'T TH S', 110, 'S1', 1, 40),
('MATH113', 4, 6, 'M W F', 104, 'S1', 1, 38),
('ME311', 1, 2, 'M W', 124, 'T8', 3, 40),
('ME312', 1, 6, 'M W F', 124, 'TH1', 3, 40),
('ME313', 1, 7, 'M W F', 124, 'F7', 3, 40),
('ME314', 1, 3, 'M W', 124, 'F1', 3, 40),
('ME403', 1, 1, 'T TH S', 304, 'TH1', 4, 40),
('ME410', 1, 2, 'T TH S', 304, 'TH3', 4, 40),
('ME412', 1, 4, 'T TH S', 304, 'M8', 4, 40),
('ME413', 1, 3, 'TH S', 316, 'F8', 4, 40),
('MECHC422', 1, 5, 'T TH', 304, 'W5', 4, 40),
('ME425', 1, 4, 'M W F', 304, 'W4', 4, 40),
('MEC221', 1, 1, 'M W F', 304, 'M1', 2, 40),
('MEC311', 1, 6, 'T TH S', 304, 'S8', 3, 40),
('MEC312', 1, 1, 'M W F', 325, 'W1', 3, 40),
('MEC408', 1, 4, 'M W F', 316, 'F4', 4, 40),
('MG217', 1, 2, 'M W F', 212, 'T1', 2, 40),
('MG217', 2, 2, 'T TH S', 302, 'T1', 2, 40),
('MG217', 3, 3, 'M W F', 302, 'T1', 2, 40),
('MG217', 4, 3, 'T TH S', 212, 'T1', 2, 40),
('PHY114', 1, 6, 'M W F', 213, 'T1', 1, 40),
('PHY114', 2, 2, 'T TH S', 126, 'T1', 1, 38),
('PHY114', 3, 3, 'T TH S', 102, 'T1', 1, 39),
('PHY114', 4, 6, 'M W F', 126, 'T1', 1, 40),
('TA115-1', 1, 4, 'M W', 102, 'TH1', 1, 39),
('TA115-1', 2, 4, 'T TH', 104, 'TH1', 1, 39),
('TA115-2', 1, 5, 'M W', 104, 'TH1', 1, 40),
('TA115-2', 2, 5, 'T TH', 105, 'TH1', 1, 39),
('TA116', 1, 2, 'T TH S', 105, 'M1', 1, 40),
('TA116', 2, 6, 'T TH S', 126, 'M1', 1, 39),
('TA116', 3, 4, 'M W F', 105, 'M1', 1, 39),
('TA116', 4, 2, 'M W F', 104, 'M1', 1, 39),
('CS491/CE491/EC491/ME491', 1, 0, 'NA', 0, 'NA', 4, 40),
('EC314', 1, 2, 'M W F', 120, 'F1', 3, 40);

-- --------------------------------------------------------

--
-- Table structure for table `course_time`
--

CREATE TABLE `course_time` (
  `cid` varchar(25) DEFAULT NULL,
  `c_hours` int(11) DEFAULT NULL,
  `c_days` varchar(10) DEFAULT NULL,
  `roomno` int(11) DEFAULT NULL,
  `c_commonhour` varchar(20) DEFAULT NULL,
  `section` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_time`
--

INSERT INTO `course_time` (`cid`, `c_hours`, `c_days`, `roomno`, `c_commonhour`, `section`) VALUES
('AO311', 4, 'M W F', 118, 'T1', NULL),
('AO311', 4, 'T TH S', 118, 'T1', NULL),
('AO311', 5, 'M W F', 117, 'T1', NULL),
('AO311', 5, 'T TH S', 116, 'T1', NULL),
('AO312', 5, 'M W F', 116, 'W1', NULL),
('AO312', 5, 'T TH S', 117, 'W1', NULL),
('AO312', 4, 'M W F', 119, 'W1', NULL),
('AO312', 4, 'T TH S', 119, 'W1', NULL),
('CE313/ME313', 6, 'T TH', 124, 'S7', NULL),
('CE314', 3, 'M W F', 113, 'T8', NULL),
('CE315', 2, 'M W F', 113, 'TH1', NULL),
('CE316', 2, 'T TH S', 113, 'M8', NULL),
('CE317', 6, 'M W F', 113, 'F8', NULL),
('CE402', 1, 'M W F', 114, 'W1', NULL),
('CE419', 6, 'T TH S', 114, 'S6', NULL),
('CHEM111', 2, 'M W F', 102, 'W1', NULL),
('CHEM111', 4, 'T TH S', 102, 'W1', NULL),
('CHEM111', 6, 'T TH S', 105, 'W1', NULL),
('CHEM111', 3, 'M W F', 213, 'W1', NULL),
('CS312', 3, 'M W F', 117, 'TH1', NULL),
('CS312', 3, 'T TH S', 117, 'TH1', NULL),
('CS312', 6, 'M W F', 117, 'TH1', NULL),
('CS313', 2, 'M W F', 119, 'F8', NULL),
('CS313', 6, 'T TH S', 119, 'F8', NULL),
('CS313', 7, 'M W F', 116, 'F8', NULL),
('CS314', 3, 'T TH S', 116, 'S1', NULL),
('CS314', 6, 'M W F', 118, 'S1', NULL),
('CS314', 2, 'T TH S', 118, 'S1', NULL),
('CS315', 3, 'M W F', 118, 'F1', NULL),
('CS315', 2, 'T TH S', 117, 'F1', NULL),
('CS315', 2, 'M W F', 117, 'F1', NULL),
('CS406', 4, 'T TH S', 321, 'T4', NULL),
('CS413', 6, 'M W F', 325, 'F6', NULL),
('CS418', 5, 'M W F', 321, 'M5', NULL),
('DS311', 8, 'T TH S', 325, 'T8', NULL),
('DS313', 7, 'T TH S', 325, 'S7', NULL),
('DS314', 6, 'T TH S', 325, 'S6', NULL),
('DS321', 2, 'M W F', 325, 'F8', NULL),
('DS325', 5, 'M W F', 325, 'W5', NULL),
('DS404', 2, 'M W F', 321, 'F2', NULL),
('DS411', 5, 'T TH S', 321, 'S1', NULL),
('DS414', 1, 'M W F', 321, 'W1', NULL),
('EC311/CS311', 3, 'M W F', 126, 'M8', NULL),
('EC311/CS311', 2, 'M W F', 116, 'M8', NULL),
('EC311/CS311', 2, 'T TH S', 116, 'M8', NULL),
('EC312', 7, 'T TH S', 120, 'W6', NULL),
('EC313', 6, 'T TH S', 120, 'F8', NULL),
('EC315', 8, 'T TH S', 120, 'S1', NULL),
('EC406', 2, 'T TH S', 316, 'T2', NULL),
('EC414', 1, 'M W F', 316, 'M1', NULL),
('EC422', 3, 'M W F', 316, 'M8', NULL),
('EGL112', 5, 'M W F', 110, 'S8', NULL),
('EGL112', 5, 'T TH S', 110, 'S8', NULL),
('EGL112', 2, 'M W F', 105, 'S8', NULL),
('EGL112', 3, 'T TH S', 105, 'S8', NULL),
('EN214', 3, 'M W F', 203, 'T1', NULL),
('EN214', 3, 'T TH S', 203, 'T1', NULL),
('EN214', 2, 'M W F', 305, 'T1', NULL),
('EN214', 2, 'T TH S', 305, 'T1', NULL),
('ES211', 3, 'M W F', 212, 'M1', NULL),
('ES211', 3, 'T TH S', 302, 'M1', NULL),
('ES211', 2, 'M W F', 302, 'M1', NULL),
('ES211', 2, 'T TH S', 212, 'M1', NULL),
('ES212', 6, 'M W F', 203, 'S1', NULL),
('ES212', 6, 'T TH S', 203, 'S1', NULL),
('ES212', 5, 'M W F', 212, 'S1', NULL),
('ES212', 5, 'T TH S', 212, 'S1', NULL),
('ES231', 2, 'M W F', 203, 'TH1', NULL),
('ES231', 2, 'T TH S', 203, 'TH1', NULL),
('ES231', 3, 'M W F', 305, 'TH1', NULL),
('ES231', 3, 'T TH S', 305, 'TH1', NULL),
('EVS117', 3, 'T TH', 126, 'F1', NULL),
('EVS117', 6, 'T TH', 213, 'F1', NULL),
('MA215', 8, 'M W F', 302, 'F1', NULL),
('MA215', 7, 'T TH S', 302, 'F1', NULL),
('MA215', 7, 'M W F', 203, 'F1', NULL),
('MA215', 8, 'T TH S', 203, 'F1', NULL),
('MA216', 7, 'M W F', 305, 'W1', NULL),
('MA216', 7, 'T TH S', 305, 'W1', NULL),
('MA216', 4, 'M W F', 212, 'W1', NULL),
('MA216', 4, 'T TH S', 212, 'W1', NULL),
('MATH113', 2, 'T TH S', 104, 'S1', NULL),
('MATH113', 3, 'M W F', 105, 'S1', NULL),
('MATH113', 3, 'T TH S', 110, 'S1', NULL),
('MATH113', 6, 'M W F', 104, 'S1', NULL),
('ME311', 2, 'M W', 124, 'T8', NULL),
('ME312', 6, 'M W F', 124, 'TH1', NULL),
('ME313', 7, 'M W F', 124, 'F7', NULL),
('ME314', 3, 'M W', 124, 'F1', NULL),
('ME403', 1, 'T TH S', 304, 'TH1', NULL),
('ME410', 2, 'T TH S', 304, 'TH3', NULL),
('ME412', 4, 'T TH S', 304, 'M8', NULL),
('ME413', 3, 'TH S', 316, 'F8', NULL),
('MECHC422', 5, 'T TH', 304, 'W5', NULL),
('ME425', 4, 'M W F', 304, 'W4', NULL),
('MEC221', 1, 'M W F', 304, 'M1', NULL),
('MEC311', 6, 'T TH S', 304, 'S8', NULL),
('MEC312', 1, 'M W F', 325, 'W1', NULL),
('MEC408', 4, 'M W F', 316, 'F4', NULL),
('MG217', 2, 'M W F', 212, 'T1', NULL),
('MG217', 2, 'T TH S', 302, 'T1', NULL),
('MG217', 3, 'M W F', 302, 'T1', NULL),
('MG217', 3, 'T TH S', 212, 'T1', NULL),
('PHY114', 6, 'M W F', 213, 'T1', NULL),
('PHY114', 2, 'T TH S', 126, 'T1', NULL),
('PHY114', 3, 'T TH S', 102, 'T1', NULL),
('PHY114', 6, 'M W F', 126, 'T1', NULL),
('TA115', 4, 'M W', 102, 'TH1', NULL),
('TA115', 4, 'T TH', 104, 'TH1', NULL),
('TA115', 5, 'M W', 104, 'TH1', NULL),
('TA115', 5, 'T TH', 105, 'TH1', NULL),
('TA116', 2, 'T TH S', 105, 'M1', NULL),
('TA116', 6, 'T TH S', 126, 'M1', NULL),
('TA116', 4, 'M W F', 105, 'M1', NULL),
('TA116', 2, 'M W F', 104, 'M1', NULL),
('CS491/CE491/EC491/ME491', NULL, NULL, NULL, NULL, NULL),
('EC314', 2, 'M W F', 120, 'F1', NULL),
('EVS117', 8, 'W F', 213, 'F1', NULL),
('EVS117', 6, 'W F', 110, 'F1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` int(11) NOT NULL,
  `F_name` varchar(20) DEFAULT NULL,
  `DELETED` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `F_name`, `DELETED`) VALUES
(1, 'Srinivasa Rau', 'N'),
(2, 'Subba Rao', 'N'),
(3, 'Jyothi ranjan Nayak', 'N'),
(4, 'Ramana vijaya Kumar', 'N'),
(5, 'Sucharitha', 'N'),
(6, 'Dharavath Kishan', 'N'),
(7, 'Viswanathan Nair', 'N'),
(8, 'Sudheer', 'N'),
(9, 'Shaik Himam', 'N'),
(10, 'Pavan Kishore', 'N'),
(11, 'IV Sharma', 'N'),
(12, 'Srinivasa Reddy', 'N'),
(13, 'Sarit Chanda', 'N'),
(14, 'Priya S Natesh', 'N'),
(15, 'Srilalitha', 'N'),
(16, 'Gowri Shankar Brahma', 'N'),
(17, 'Renurani', 'N'),
(18, 'Mahindra Shinde', 'N'),
(19, 'Vairachilai', 'N'),
(20, 'Pavan Kumar', 'N'),
(21, 'Shubhangi V Urkude', 'N'),
(22, 'Sandeep Kumar Panda', 'N'),
(23, 'Shanta', 'N'),
(24, 'Deevena Raju', 'N'),
(25, 'SN Mohanty', 'N'),
(26, 'Brahma Naidu', 'N'),
(27, 'Sirisha', 'N'),
(28, 'Seetharamulu', 'N'),
(29, 'Rohini Pinapatruni', 'N'),
(30, 'Sayaji Hande', 'N'),
(31, 'Radha', 'N'),
(32, 'Naresh Kumar Reddy', 'N'),
(33, 'T N Murthy', 'N'),
(34, 'Elizabeth Zacharias', 'N'),
(35, 'Kishore Kumar', 'N'),
(36, 'Syed Shakeel Hashmi', 'N'),
(37, 'Vikram', 'N'),
(38, 'Loreina Pagag', 'N'),
(39, 'Swathi', 'N'),
(40, 'RamaKrishna', 'N'),
(41, 'Sanjeev Kumar', 'N'),
(42, 'Sree Ranjani', 'N'),
(43, 'Kishan Dharavat', 'N'),
(44, 'Parvat Ranjan Pati', 'N'),
(45, 'Srinivasa Rao', 'N'),
(46, 'Leela Chelikani', 'N'),
(47, 'Ashok Kumar', 'N'),
(48, 'Shreecharan', 'N'),
(49, 'Manmadhachary', 'N'),
(50, 'Sudhamsu Mohan Reddy', 'N'),
(51, 'Anjanna Matta', 'N'),
(52, 'Raghunatha Reddy', 'N'),
(53, 'Priyanka Chattoraj', 'N'),
(54, 'Tharakeshwar', 'N'),
(55, 'Vivekananda', 'N'),
(56, 'Barla Madhavi', 'N'),
(57, 'venu Gopal', 'N'),
(58, 'A Chandrasekhar', 'N'),
(59, 'Govardhan', 'N'),
(60, 'Srikanth', 'N'),
(61, 'Avanish Malladi', 'N'),
(62, 'Bala Murali', 'N'),
(63, 'NA', 'N'),
(74, 'Risheek', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `semester3`
--

CREATE TABLE `semester3` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) NOT NULL,
  `period2` varchar(30) NOT NULL,
  `period3` varchar(30) NOT NULL,
  `period4` varchar(30) NOT NULL,
  `period5` varchar(30) NOT NULL,
  `period6` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester3`
--

INSERT INTO `semester3` (`day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
('monday', 'AM261<br>SH', 'CO207<br>', 'EL211<br>MS', '-<br>-', '-<br>-', '-<br>-, -, -'),
('tuesday', 'CO207<br>', 'CO203<br>', 'AM261<br>SH', '-<br>-', '-<br>-', '-<br>-, -, -'),
('wednesday', 'CO203<br>', 'CO206<br>NA', 'CO207<br>', '-<br>-', '-<br>-', 'CO292<br>, MHK, FA'),
('thursday', 'CO203<br>', 'CO206<br>NA', 'EL211<br>MS', '-<br>-', '-<br>-', 'CO293<br>, TA, IZ'),
('friday', 'CO206<br>NA', 'EL211<br>MS', 'AM261<br>SH', 'CO203<br>', '-<br>-', '-<br>-, -, -'),
('saturday', 'EL211<br>MS', 'AM261<br>SH', 'CO207<br>', 'CO206<br>NA', '-<br>-', '-<br>-, -, -');

-- --------------------------------------------------------

--
-- Table structure for table `semester5`
--

CREATE TABLE `semester5` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) NOT NULL,
  `period2` varchar(30) NOT NULL,
  `period3` varchar(30) NOT NULL,
  `period4` varchar(30) NOT NULL,
  `period5` varchar(30) NOT NULL,
  `period6` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester5`
--

INSERT INTO `semester5` (`day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
('monday', 'ME340<br>FT', 'CO309<br>AMK', 'CO310<br>FA', '-<br>-', '-<br>-', 'CO394<br>, MRW, '),
('tuesday', 'CO309<br>AMK', 'EL340<br>MS', 'ME340<br>FT', '-<br>-', '-<br>-', 'CO393<br>, FA, '),
('wednesday', 'CO309<br>AMK', 'EL340<br>MS', 'CO308<br>IZ', '-<br>-', '-<br>-', '-<br>-, -, -'),
('thursday', 'EL340<br>MS', 'CO308<br>IZ', 'CO310<br>FA', 'CO309<br>AMK', '-<br>-', '-<br>-, -, -'),
('friday', 'CO308<br>IZ', 'CO310<br>FA', 'ME340<br>FT', 'EL340<br>MS', '-<br>-', 'CO394<br>, MRW, '),
('saturday', 'CO310<br>FA', 'ME340<br>FT', 'CO308<br>IZ', '-<br>-', '-<br>-', 'CO393<br>, FA, ');

-- --------------------------------------------------------

--
-- Table structure for table `semester7`
--

CREATE TABLE `semester7` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) NOT NULL,
  `period2` varchar(30) NOT NULL,
  `period3` varchar(30) NOT NULL,
  `period4` varchar(30) NOT NULL,
  `period5` varchar(30) NOT NULL,
  `period6` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester7`
--

INSERT INTO `semester7` (`day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
('monday', 'CO445<br>MHK', 'CO451<br>', 'CO448<br>NA', 'CO431<br>', 'CO460<br>TA', 'CO494<br>IZ, MSU, SB'),
('tuesday', 'CO451<br>', 'CO448<br>NA', 'CO431<br>', 'CO460<br>TA', 'CO406<br>', 'CO493<br>NA, MRW, AMK'),
('wednesday', 'CO431<br>', 'CO460<br>TA', 'CO406<br>', 'CO448<br>NA', '-<br>-', 'CO494<br>IZ, MSU, SB'),
('thursday', 'CO406<br>', 'CO445<br>MHK', 'CO460<br>TA', '-<br>-', '-<br>-', 'CO493<br>NA, MRW, AMK'),
('friday', 'CO445<br>MHK', 'CO451<br>', '-<br>-', '-<br>-', 'CO406<br>', '-<br>-, -, -'),
('saturday', 'CO445<br>MHK', 'CO451<br>', 'CO448<br>NA', 'CO431<br>', '-<br>-', '-<br>-, -, -');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `semid` int(11) DEFAULT NULL,
  `belong_to_year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`semid`, `belong_to_year`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 3),
(6, 3),
(7, 4),
(8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(11) NOT NULL,
  `S_name` varchar(20) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `branch` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `phno` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `registered` varchar(10) DEFAULT NULL,
  `DELETED` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `S_name`, `year`, `semester`, `branch`, `password`, `phno`, `email`, `registered`, `DELETED`) VALUES
(1, 'Krishna', 4, 7, 'CSE', 'FST', '1236759840', 'Krishna@gmail.com', 'Y', 'N'),
(2, 'Kashyap', 4, 7, 'ESE', 'FST', '1236759840', 'Kashyap@gmail.com', 'N', 'N'),
(3, 'Manoj', 4, 7, 'ME', 'FST', '1236759840', 'Manoj@gmail.com', 'Y', 'N'),
(4, 'Pruthvi', 3, 5, 'CSE', 'FST', '1236759840', 'Pruthvi@gmail.com', 'N', 'N'),
(5, 'Srinivas', 2, 3, 'ESE', 'FST', '1236759840', 'Srinivas@gmail.com', 'N', 'N'),
(6, 'Vinay', 4, 2, 'M.E', 'FST', '7811912097', 'Vinay@gmail.com', 'N', 'N'),
(7, 'Risheek', 4, 2, 'C.S.E', 'FST', '9104160156', 'Risheek@gmail.com', 'N', 'N'),
(8, 'Ashish', 4, 2, 'M.E', 'FST', '1234567890', 'ghsaks@gmail.com', 'Y', 'N'),
(9, 'manuu', 4, 2, 'CIVIL', 'FST', '2132178261', 'adfs@gmail.com', 'N', 'N'),
(10, 'Sripad', 1, 2, 'C.S.E', 'FST', '3253567823', 'ASFSAf@gmail.com', 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `student_course_details`
--

CREATE TABLE `student_course_details` (
  `sid` int(11) DEFAULT NULL,
  `cid` varchar(30) DEFAULT NULL,
  `section` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course_details`
--

INSERT INTO `student_course_details` (`sid`, `cid`, `section`) VALUES
(10, 'TA116', 2),
(10, 'EVS117', 1),
(10, 'PHY114', 2),
(10, 'EGL112', 1),
(10, 'MATH113', 4),
(10, 'TA115-1', 1),
(1, 'TA116', 4),
(1, 'PHY114', 3),
(1, 'EGL112', 1),
(1, 'CHEM111', 3),
(1, 'MATH113', 1),
(1, 'TA115-1', 2),
(3, 'TA116', 3),
(3, 'EVS117', 2),
(3, 'PHY114', 2),
(3, 'CHEM111', 1),
(3, 'TA115-2', 2),
(3, 'MATH113', 4),
(8, 'EN214', 4),
(8, 'ES212', 2),
(8, 'MA215', 3),
(8, 'ES211', 1),
(8, 'ES231', 1),
(8, 'MA216', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_code` varchar(10) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `course_type` varchar(15) NOT NULL,
  `semester` int(1) NOT NULL,
  `department` varchar(50) NOT NULL,
  `isAlloted` int(1) NOT NULL,
  `allotedto` text NOT NULL,
  `allotedto2` text NOT NULL,
  `allotedto3` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_code`, `subject_name`, `course_type`, `semester`, `department`, `isAlloted`, `allotedto`, `allotedto2`, `allotedto3`) VALUES
('CO445', 'Network Security', 'THEORY', 7, 'Computer Engg. Dept.', 1, 'T012', '', ''),
('CO451', 'Computer Network Design', 'THEORY', 7, 'Computer Engg. Dept.', 1, 'T003', '', ''),
('CO494', 'Embedded  Systems Lab', 'LAB', 7, 'Computer Engg. Dept.', 1, 'T008', 'T001', 'T004'),
('CO493', 'Networking Lab', 'LAB', 7, 'Computer Engg. Dept.', 1, 'T002', 'T007', 'T011'),
('CO394', 'Minor Project', 'LAB', 5, 'Computer Engg. Dept.', 1, 'T005', 'T007', 'T003'),
('CO393', 'Software Lab I', 'LAB', 5, 'Computer Engg. Dept.', 1, 'T003', 'T013', 'T005'),
('CO292', ' Data Structures Lab', 'LAB', 3, 'Computer Engg. Dept.', 1, 'T003', 'T012', 'T013'),
('CO293', 'Programming Lab', 'LAB', 3, 'Computer Engg. Dept.', 1, 'T006', 'T009', 'T008'),
('CO431', 'Internet Tools', 'THEORY', 7, 'Computer Engg. Dept.', 1, 'T005', '', ''),
('CO406', 'Compiler Design', 'THEORY', 7, 'Computer Engg. Dept.', 1, 'T003', '', ''),
('CO206', 'Logic Theory & Computer Organisation', 'THEORY', 3, 'Computer Engg. Dept.', 1, 'T002', '', ''),
('EL211', 'Electronic Devices & Circuits', 'THEORY', 3, 'Electronics Engg. Dept.', 1, 'T014', '', ''),
('CO207', 'Data Structures & Algorithm', 'THEORY', 3, 'Computer Engg. Dept.', 1, 'T003', '', ''),
('CO309', 'Microprocessor Theory & Applications', 'THEORY', 5, 'Computer Engg. Dept.', 1, 'T011', '', ''),
('EL340', 'Communication Engineering', 'THEORY', 5, 'Electronics Engg. Dept.', 1, 'T014', '', ''),
('CO308', 'Digital Electronics', 'THEORY', 5, 'Computer Engg. Dept.', 1, 'T008', '', ''),
('CO310', 'Operating Systems', 'THEORY', 5, 'Mechanical Engg. Dept.', 1, 'T013', '', ''),
('ME340', 'Economics & Management', 'THEORY', 5, 'Computer Engg. Dept.', 1, 'T015', '', ''),
('CO448', 'Embedded Systems', 'THEORY', 7, 'Computer Engg. Dept.', 1, 'T010', '', ''),
('CO460', 'Computer Architecture', 'THEORY', 7, 'Computer Engg. Dept.', 1, 'T009', '', ''),
('CO203', 'Object Oriented Programming', 'THEORY', 3, 'Computer Engg. Dept.', 1, 'T006', '', ''),
('c2099', 's1', 'THEORY', 4, 'Computer Engg.', 1, 'T013', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `t001`
--

CREATE TABLE `t001` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) DEFAULT NULL,
  `period2` varchar(30) DEFAULT NULL,
  `period3` varchar(30) DEFAULT NULL,
  `period4` varchar(30) DEFAULT NULL,
  `period5` varchar(30) DEFAULT NULL,
  `period6` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t001`
--

INSERT INTO `t001` (`day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
('monday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', 'CO494'),
('tuesday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('wednesday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', 'CO494'),
('thursday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('friday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('saturday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `t002`
--

CREATE TABLE `t002` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) DEFAULT NULL,
  `period2` varchar(30) DEFAULT NULL,
  `period3` varchar(30) DEFAULT NULL,
  `period4` varchar(30) DEFAULT NULL,
  `period5` varchar(30) DEFAULT NULL,
  `period6` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t002`
--

INSERT INTO `t002` (`day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
('monday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('tuesday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', 'CO493'),
('wednesday', '-<br>-', 'CO206<br>NL32', '-<br>-', '-<br>-', '-<br>-', '-'),
('thursday', '-<br>-', 'CO206<br>NL32', '-<br>-', '-<br>-', '-<br>-', 'CO493'),
('friday', 'CO206<br>NL32', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('saturday', '-<br>-', '-<br>-', '-<br>-', 'CO206<br>NL32', '-<br>-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `t004`
--

CREATE TABLE `t004` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) DEFAULT NULL,
  `period2` varchar(30) DEFAULT NULL,
  `period3` varchar(30) DEFAULT NULL,
  `period4` varchar(30) DEFAULT NULL,
  `period5` varchar(30) DEFAULT NULL,
  `period6` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t004`
--

INSERT INTO `t004` (`day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
('monday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', 'CO494'),
('tuesday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('wednesday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', 'CO494'),
('thursday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('friday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('saturday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `t007`
--

CREATE TABLE `t007` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) DEFAULT NULL,
  `period2` varchar(30) DEFAULT NULL,
  `period3` varchar(30) DEFAULT NULL,
  `period4` varchar(30) DEFAULT NULL,
  `period5` varchar(30) DEFAULT NULL,
  `period6` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t007`
--

INSERT INTO `t007` (`day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
('monday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', 'CO394'),
('tuesday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', 'CO493'),
('wednesday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('thursday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', 'CO493'),
('friday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', 'CO394'),
('saturday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `t008`
--

CREATE TABLE `t008` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) DEFAULT NULL,
  `period2` varchar(30) DEFAULT NULL,
  `period3` varchar(30) DEFAULT NULL,
  `period4` varchar(30) DEFAULT NULL,
  `period5` varchar(30) DEFAULT NULL,
  `period6` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t008`
--

INSERT INTO `t008` (`day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
('monday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', 'CO494'),
('tuesday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('wednesday', '-<br>-', '-<br>-', 'CO308<br>ML10', '-<br>-', '-<br>-', 'CO494'),
('thursday', '-<br>-', 'CO308<br>ML10', '-<br>-', '-<br>-', '-<br>-', 'CO293'),
('friday', 'CO308<br>ML10', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('saturday', '-<br>-', '-<br>-', 'CO308<br>ML10', '-<br>-', '-<br>-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `t009`
--

CREATE TABLE `t009` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) DEFAULT NULL,
  `period2` varchar(30) DEFAULT NULL,
  `period3` varchar(30) DEFAULT NULL,
  `period4` varchar(30) DEFAULT NULL,
  `period5` varchar(30) DEFAULT NULL,
  `period6` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t009`
--

INSERT INTO `t009` (`day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
('monday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', 'CO460<br>ML04', '-'),
('tuesday', '-<br>-', 'CO203<br>NL32', '-<br>-', 'CO460<br>ML04', '-<br>-', '-'),
('wednesday', 'CO203<br>NL32', 'CO460<br>ML04', '-<br>-', '-<br>-', '-<br>-', '-'),
('thursday', 'CO203<br>NL32', '-<br>-', 'CO460<br>ML04', '-<br>-', '-<br>-', 'CO293'),
('friday', '-<br>-', '-<br>-', '-<br>-', 'CO203<br>NL32', '-<br>-', '-'),
('saturday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `t010`
--

CREATE TABLE `t010` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) DEFAULT NULL,
  `period2` varchar(30) DEFAULT NULL,
  `period3` varchar(30) DEFAULT NULL,
  `period4` varchar(30) DEFAULT NULL,
  `period5` varchar(30) DEFAULT NULL,
  `period6` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t010`
--

INSERT INTO `t010` (`day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
('monday', '-<br>-', '-<br>-', 'CO448<br>ML04', '-<br>-', '-<br>-', '-'),
('tuesday', '-<br>-', 'CO448<br>ML04', '-<br>-', '-<br>-', '-<br>-', '-'),
('wednesday', '-<br>-', '-<br>-', '-<br>-', 'CO448<br>ML04', '-<br>-', '-'),
('thursday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('friday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('saturday', '-<br>-', '-<br>-', 'CO448<br>ML04', '-<br>-', '-<br>-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `t011`
--

CREATE TABLE `t011` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) DEFAULT NULL,
  `period2` varchar(30) DEFAULT NULL,
  `period3` varchar(30) DEFAULT NULL,
  `period4` varchar(30) DEFAULT NULL,
  `period5` varchar(30) DEFAULT NULL,
  `period6` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t011`
--

INSERT INTO `t011` (`day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
('monday', '-<br>-', 'CO309<br>ML10', '-<br>-', '-<br>-', '-<br>-', '-'),
('tuesday', 'CO309<br>ML10', '-<br>-', '-<br>-', '-<br>-', '-<br>-', 'CO493'),
('wednesday', 'CO309<br>ML10', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('thursday', '-<br>-', '-<br>-', '-<br>-', 'CO309<br>ML10', '-<br>-', 'CO493'),
('friday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('saturday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `t012`
--

CREATE TABLE `t012` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) DEFAULT NULL,
  `period2` varchar(30) DEFAULT NULL,
  `period3` varchar(30) DEFAULT NULL,
  `period4` varchar(30) DEFAULT NULL,
  `period5` varchar(30) DEFAULT NULL,
  `period6` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t012`
--

INSERT INTO `t012` (`day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
('monday', 'CO445<br>ML04', 'CO451<br>ML04', '-<br>-', 'CO431<br>ML04', '-<br>-', '-'),
('tuesday', 'CO451<br>ML04', '-<br>-', 'CO431<br>ML04', '-<br>-', 'CO406<br>ML04', '-'),
('wednesday', 'CO431<br>ML04', '-<br>-', 'CO406<br>ML04', '-<br>-', '-<br>-', 'CO292'),
('thursday', 'CO406<br>ML04', 'CO445<br>ML04', '-<br>-', '-<br>-', '-<br>-', '-'),
('friday', 'CO445<br>ML04', 'CO451<br>ML04', '-<br>-', '-<br>-', 'CO406<br>ML04', '-'),
('saturday', 'CO445<br>ML04', 'CO451<br>ML04', '-<br>-', 'CO431<br>ML04', '-<br>-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `t013`
--

CREATE TABLE `t013` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) DEFAULT NULL,
  `period2` varchar(30) DEFAULT NULL,
  `period3` varchar(30) DEFAULT NULL,
  `period4` varchar(30) DEFAULT NULL,
  `period5` varchar(30) DEFAULT NULL,
  `period6` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t013`
--

INSERT INTO `t013` (`day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
('monday', '-<br>-', '-<br>-', 'CO310<br>ML10', '-<br>-', '-<br>-', '-'),
('tuesday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', 'CO393'),
('wednesday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', 'CO292'),
('thursday', '-<br>-', '-<br>-', 'CO310<br>ML10', '-<br>-', '-<br>-', '-'),
('friday', '-<br>-', 'CO310<br>ML10', '-<br>-', '-<br>-', '-<br>-', '-'),
('saturday', 'CO310<br>ML10', '-<br>-', '-<br>-', '-<br>-', '-<br>-', 'CO393');

-- --------------------------------------------------------

--
-- Table structure for table `t014`
--

CREATE TABLE `t014` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) DEFAULT NULL,
  `period2` varchar(30) DEFAULT NULL,
  `period3` varchar(30) DEFAULT NULL,
  `period4` varchar(30) DEFAULT NULL,
  `period5` varchar(30) DEFAULT NULL,
  `period6` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t014`
--

INSERT INTO `t014` (`day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
('monday', '-<br>-', '-<br>-', 'EL211<br>NL32', '-<br>-', '-<br>-', '-'),
('tuesday', '-<br>-', 'EL340<br>ML10', '-<br>-', '-<br>-', '-<br>-', '-'),
('wednesday', '-<br>-', 'EL340<br>ML10', '-<br>-', '-<br>-', '-<br>-', '-'),
('thursday', 'EL340<br>ML10', '-<br>-', 'EL211<br>NL32', '-<br>-', '-<br>-', '-'),
('friday', '-<br>-', 'EL211<br>NL32', '-<br>-', 'EL340<br>ML10', '-<br>-', '-'),
('saturday', 'EL211<br>NL32', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `t015`
--

CREATE TABLE `t015` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) DEFAULT NULL,
  `period2` varchar(30) DEFAULT NULL,
  `period3` varchar(30) DEFAULT NULL,
  `period4` varchar(30) DEFAULT NULL,
  `period5` varchar(30) DEFAULT NULL,
  `period6` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t015`
--

INSERT INTO `t015` (`day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
('monday', 'ME340<br>ML10', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('tuesday', '-<br>-', '-<br>-', 'ME340<br>ML10', '-<br>-', '-<br>-', '-'),
('wednesday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('thursday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('friday', '-<br>-', '-<br>-', 'ME340<br>ML10', '-<br>-', '-<br>-', '-'),
('saturday', '-<br>-', 'ME340<br>ML10', '-<br>-', '-<br>-', '-<br>-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `t016`
--

CREATE TABLE `t016` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) DEFAULT NULL,
  `period2` varchar(30) DEFAULT NULL,
  `period3` varchar(30) DEFAULT NULL,
  `period4` varchar(30) DEFAULT NULL,
  `period5` varchar(30) DEFAULT NULL,
  `period6` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t016`
--

INSERT INTO `t016` (`day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
('monday', 'AM261<br>NL32', 'CO207<br>NL32', '-<br>-', '-<br>-', '-<br>-', '-'),
('tuesday', 'CO207<br>NL32', '-<br>-', 'AM261<br>NL32', '-<br>-', '-<br>-', '-'),
('wednesday', '-<br>-', '-<br>-', 'CO207<br>NL32', '-<br>-', '-<br>-', '-'),
('thursday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('friday', '-<br>-', '-<br>-', 'AM261<br>NL32', '-<br>-', '-<br>-', '-'),
('saturday', '-<br>-', 'AM261<br>NL32', 'CO207<br>NL32', '-<br>-', '-<br>-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `faculty_number` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `alias` varchar(10) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `emailid` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`faculty_number`, `name`, `alias`, `designation`, `contact_number`, `emailid`) VALUES
('T016', 'XXXXX', 'SH', 'Professor', '12345678', 'xxxxx@gmail.com'),
('T015', 'yyyyy', 'FT', 'Associate Professor', '12345678', 'yyyyyyy@gmail.com'),
('T014', 'qqqqqqqqq', 'MS', 'Assistant Professor', '12345678', 'qqqqqqqq@gmail.com'),
('T013', 'wwwwwwwwwwww', 'FA', 'Assistant Professor', '12345678', 'wwwwwwwww@gmail.com'),
('T011', 'eeeeeeeeee', 'AMK', 'Assistant Professor', '12345678', 'eeeeeeeee@gmail.com'),
('T012', 'rrrrrrrrrrr', 'MHK', 'Assistant Professor', '12345678', 'rrrrrrrrrrrr@gmail.com'),
('T007', 'tttttttttt', 'MRW', 'Associate Professor', '12345678', 'ttttttttt@gmail.com'),
('T008', 'yyyyyyyyyyy', 'IZ', 'Associate Professor', '12345678', 'yyyyyyy@gmail.com'),
('T009', 'uuuuuuuuuuu', 'TA', 'Assistant Professor', '12345678', 'uuuuuuu@gmail.com'),
('T010', 'iiiiiiii', 'NA', 'Assistant Professor', '12345678', 'iiiiiiii@gmail.com'),
('T004', 'dddddddddd', 'SB', 'Professor', '12345678', 'dddd@gmail.com'),
('T002', 'fffffffff', 'NA', 'Professor', '12345678', 'ffffff@gmail.com'),
('T001', 'hhhhhhhh', 'MSU', 'Professor', '12345678', 'hhhh@gmail.com'),
('Test', 'Test', 'test', 'Professor', '7989952096', 'test@test.com'),
('2', 'Risheek', 'dsa', 'Assistant Professor', '658766863', 'sdsafa@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `day` varchar(10) NOT NULL,
  `period1` varchar(30) DEFAULT NULL,
  `period2` varchar(30) DEFAULT NULL,
  `period3` varchar(30) DEFAULT NULL,
  `period4` varchar(30) DEFAULT NULL,
  `period5` varchar(30) DEFAULT NULL,
  `period6` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
('friday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('monday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('saturday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('thursday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('tuesday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-'),
('wednesday', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-<br>-', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
