-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2019 at 11:57 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_name`) VALUES
(1, 'Computer Science'),
(2, 'Statistics'),
(3, 'Biological Science'),
(4, 'Business Administration');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `faculty_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `faculty_name`) VALUES
(1, 'Science'),
(2, 'Art and Social Sciences');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `faculty` varchar(10) NOT NULL,
  `course` varchar(10) NOT NULL,
  `matric_number` varchar(20) NOT NULL,
  `graduation_year` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fullname`, `gender`, `faculty`, `course`, `matric_number`, `graduation_year`, `phone`, `email`, `address`, `photo`, `password`) VALUES
(1, 'Bashir Hassan', 'Male', 'Science', 'Computer S', 'UG/12/CSC/1066', '2020', '08061689497', 'bashhassan2020@gmail.com', 'Federal Lowcost Gombe', 'no_profile.png', '$2y$10$Qq2hrWqpW7enZcXkHc3Oe.H1Y3YiHQMDYABT0cMjvbR');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `status`, `subject`, `message`, `date`) VALUES
(1, 'Member', 'Vacant in Police', 'The Aim and Objective of the Association as it is contained in the Constitution, Article II; shall be to: <br>\r\n              1. Promote the welfare, standard, prestige and good name of the University. <br>\r\n ', '2019-11-08 12:11:21'),
(2, 'Member', 'Domain name change', 'The Aim and Objective of the Association as it is contained in the Constitution, Article II; shall be to: <br>\r\n              1. Promote the welfare, standard, prestige and good name of the University. <br>\r\n              2. Encourage a close relationship between the University authority, staff and students, the general public and the Association. <br>\r\n              3. Provide assistance to the various components of the University.\r\n              4. Provide service and donation to charities, religious, educational organizational and other non-profit bodies. <br>\r\n              5. Explore co-operation that have similar aims and objectives within and outside the Federal Republic of Nigeria. <br>\r\n           ', '2019-11-08 12:12:01'),
(3, 'Member', 'Confirmation ', 'The Aim and Objective of the Association as it is contained in the Constitution, Article II; shall be to: <br>\r\n              1. Promote the welfare, standard, prestige and good name of the University. <br>\r\n              2. Encourage a close relationship between the University authority, staff and students, the general public and the Association. <br>\r\n              3. Provide assistance to the various components of the University.\r\n              4. Provide service and donation to charities, religious, educational organizational and other non-profit bodies. <br>\r\n              5. Explore co-operation that have similar aims and objectives within and outside the Federal Republic of Nigeria. <br>\r\n              6. Institute a scholarship and provide financial assistance to the needy educational students. <br>\r\n              ', '2019-11-08 12:12:13'),
(4, 'Admin', 'General Members Meeting', 'The faculty of science is one of the three faculties that was established since the inception of the university 10 years ago and consists of the departments of biological sciences, biochemistry, chemistry, geography, geology, mathematics, microbiology and physics. actually the departments of biochemistry and microbiology were curved out of the department of biological sciences two sessions ago. at the moment the departments of geology, maths and the office of the dean occupy some of the quadrangular block of offices that is shared between the faculty and that of arts and social sciences. the other departments are located within the vicinity of the faculty except the departments of biochemistry and microbiology that are situated at the premises of the medical college about Â½ kilometre away from the faculty.', '2019-11-08 14:29:29'),
(5, 'Admin', 'General Members Meeting', 'The faculty of science is one of the three faculties that was established since the inception of the university 10 years ago and consists of the departments of biological sciences, biochemistry, chemistry, geography, geology, mathematics, microbiology and physics. actually the departments of biochemistry and microbiology were curved out of the department of biological sciences two sessions ago. at the moment the departments of geology, maths and the office of the dean occupy some of the quadrangular block of offices that is shared between the faculty and that of arts and social sciences.', '2019-11-08 14:33:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;